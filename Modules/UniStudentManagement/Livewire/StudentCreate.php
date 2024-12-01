<?php

namespace Modules\UniStudentManagement\Livewire;

use App\MajorType;
use App\Models\Nrc;
use App\UniversityType;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\UniStudentManagement\Models\Student;

class StudentCreate extends Component
{
    public $for;
    public $is_major_register = false;
    public $nrcs = [];

    public $business_location_id, $student_code, $name, $student_nrc_code, $student_nrc_no;
    public $date_of_birth, $grade_10_desk_id, $grade_10_total_mark, $grade_10_passed_year;
    public $father_name, $father_nrc_code, $father_nrc_no, $mother_name, $mother_nrc_code, $mother_nrc_no;
    public $student_phone, $parent_phone, $address, $note, $current_attendance_year, $approval_no;
    public $ar_wa_tha_no, $type, $major, $get_university, $created_by;
    public $registerType;
    public $majorType;
    public $uniType;
    public $age;




    protected $rules = [
//        'business_location_id' => 'required|integer',
//        'student_code' => 'required|string|unique:students,student_code',
//        'name' => 'required|string|min:3',
//        'date_of_birth' => 'nullable|date',
        'grade_10_total_mark' => 'nullable|numeric|min:240|max:600',
         'grade_10_passed_year' => 'nullable|digits:4|integer|min:1900|max:2100',
//        'current_attendance_year' => 'nullable|string',
//        'type' => 'nullable|string',
//        'major' => 'nullable|string',
//        // Add other validation rules as needed
    ];

    public function mount($for = null)
    {
        $this->for = $for;
        $this->nrcs = Nrc::select('name_mm', 'nrc_code','id')->get();
        $this->registerType = [
            ['key' => 'distance', 'value' => 'Distance'],
            ['key' => 'day', 'value' => 'Day'],
            ['key' => 'vip', 'value' => 'VIP'],
            ];
        $this->majorType = collect(MajorType::cases())->map(function ($major) {
            return [
                'key' => $major->name,
                'value' => $major->value,
            ];
        });
        $this->uniType = collect(UniversityType::cases())->map(function ($major) {
            return [
                'key' => $major->name,
                'value' => $major->value,
            ];
        });

    }

    protected $listeners = [
        'studentNrcSelect' => 'handleStudentNrcSelected',
        'fatherNrcSelect' => 'handleFatherNrcSelected',
        'motherNrcSelect' => 'handleMotherNrcSelected',
        'registerTypeSelect' => 'handleRegisterTypeSelected',
        'majorTypeSelect' => 'handleMajorTypeSelected',
        'uniTypeSelect' => 'handleUniTypeSelected',
    ];

    public function handleStudentNrcSelected($nrcData)
    {
        $this->student_nrc_code = $nrcData;

        $this->saveAsDraft();
    }

    public function handleFatherNrcSelected($nrcData)
    {
        $this->father_nrc_code = $nrcData;
        $this->saveAsDraft();
    }

    public function handleMotherNrcSelected($nrcData)
    {
        $this->mother_nrc_code = $nrcData;
        $this->saveAsDraft();
    }

    public function handleRegisterTypeSelected($data){
        $this->type = $data;
        $this->saveAsDraft();
    }

    public function handleMajorTypeSelected($data){
        $this->major = $data;
        $this->saveAsDraft();
    }

    public function handleUniTypeSelected($data){
        $this->get_university = $data;
        $this->saveAsDraft();
    }


    public function updating($property, $value){
        if ($property == 'student_nrc_no' || $property == 'father_nrc_no' || $property == 'mother_nrc_no') {
            if (!preg_match('/^\d{6}$/', $value)) {
                $this->student_nrc_no = null;
                $this->addError($property, 'The NRC number must be a 6-digit number.');
            } else {
                $this->resetErrorBag($property);
            }
        }

        if ($property == 'student_phone' || $property == 'parent_phone') {
            if (!preg_match('/^\+?[0-9]{1,4}?[-. ]?(\(?\d{1,3}?\)?[-. ]?)?(\d{1,4}){1,2}[-. ]?\d{1,4}$/', $value)) {
                $this->addError($property, 'Please enter a valid phone number.');
            } else {
                $this->resetErrorBag($property);
            }
        }
    }

    public function updated($property, $value){
        $this->saveAsDraft();
    }

    public function updatedGrade10TotalMark($value)
    {
        if ($value < 240 || $value > 600) {
            $this->grade_10_total_mark = null;
            $this->addError('grade_10_total_mark', 'The value must be between 240 and 600.');
        } else {
            $this->resetErrorBag('grade_10_total_mark');
        }
    }

    public function updatedGrade10PassedYear(){
        $this->validateOnly('grade_10_passed_year', [
            'grade_10_passed_year' => 'nullable|digits:4|integer|min:1900|max:2100',
        ]);
    }

    public function updatedDateOfBirth()
    {
        $this->validateOnly('date_of_birth', [
            'date_of_birth' => [
                'required',
                'regex:/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/', // Validates DD-MM-YYYY format
                function ($attribute, $value, $fail) {
                    // Convert the value into day, month, year
                    [$day, $month, $year] = explode('-', $value);

                    // Validate if it's a real date
                    if (!checkdate($month, $day, $year)) {
                        $fail('The date of birth must be a valid date.');
                        return;
                    }

                    // Check if the person is at least 15 years old
                    $dob = \Carbon\Carbon::createFromFormat('d-m-Y', $value);
                    $minDate = now()->subYears(15);
                    $this->age = $dob->age;

                    if ($dob->greaterThan($minDate)) {
                        $fail('You must be at least 15 years old.');
                    }
                },
            ],
        ]);
    }




    public function generateStudentCode()
    {
        $date = now()->format('Y');
        $latestCode = Student::withTrashed()
            ->latest('id')
            ->value('student_code');

        $lastSerial = 0;
        if ($latestCode) {
            $lastSerial = (int) Str::afterLast($latestCode, '-');
        }

        $newSerial = str_pad($lastSerial + 1, 6, '0', STR_PAD_LEFT);

        $this->student_code = "STU-{$date}-{$newSerial}";
    }

    public function saveAsDraft()
    {
        $this->loading = true;
       if ($this->name !== null) {

           // Ensure student_code is generated before saving
           if (!$this->student_code) {
               $this->generateStudentCode();  // Generate the student code if not already set
           }

           // Save as draft
           Student::updateOrCreate(
               ['student_code' => $this->student_code],  // Ensure student_code is set
               [
                   'name' => $this->name,
                   'student_code' => $this->student_code,
                   'level' => $this->for == "major-registration" ? 0 : null,
                   'student_nrc_code' => $this->student_nrc_code,
                   'student_nrc_no' => $this->student_nrc_no,
                   'date_of_birth' => $this->date_of_birth,
                   'grade_10_desk_id' => $this->grade_10_desk_id,
                   'grade_10_total_mark' => $this->grade_10_total_mark,
                   'grade_10_passed_year' => $this->grade_10_passed_year,
                   'father_name' => $this->father_name,
                   'father_nrc_code' => $this->father_nrc_code,
                   'father_nrc_no' => $this->father_nrc_no,
                   'mother_name' => $this->mother_name,
                   'mother_nrc_code' => $this->mother_nrc_code,
                   'mother_nrc_no' => $this->mother_nrc_no,
                   'student_phone' => $this->student_phone,
                   'parent_phone' => $this->parent_phone,
                   'address' => $this->address,
                   'note' => $this->note,
                   'is_major_registered' => $this->for == "major-registration" ? 1 : $this->is_major_register,
                   'current_attendance_year' => $this->current_attendance_year,
                   'approval_no' => $this->approval_no,
                   'ar_wa_tha_no' => $this->ar_wa_tha_no,
                   'type' => $this->type,
                   'major' => $this->major,
                   'get_university' => $this->get_university,
                   'draft' => true,
                   'created_by' => auth()->id(),
               ]
           );



           // Optional: Add a success message after saving
//           session()->flash('message', 'Draft saved successfully.');
       }

    }

    public function discardData()
    {
        Student::where('student_code', $this->student_code)->delete();
        $this->reset();
    }

    public function createStudent()
    {

        $this->validate();
        Student::updateOrCreate(
            ['student_code' => $this->student_code],
            [
                'name' => $this->name,
                'student_code' => $this->student_code,
                'level' => $this->for == "major-registration" ? 0 : null,
                'student_nrc_code' => $this->student_nrc_code,
                'student_nrc_no' => $this->student_nrc_no,
                'date_of_birth' => $this->date_of_birth,
                'grade_10_desk_id' => $this->grade_10_desk_id,
                'grade_10_total_mark' => $this->grade_10_total_mark,
                'grade_10_passed_year' => $this->grade_10_passed_year,
                'father_name' => $this->father_name,
                'father_nrc_code' => $this->father_nrc_code,
                'father_nrc_no' => $this->father_nrc_no,
                'mother_name' => $this->mother_name,
                'mother_nrc_code' => $this->mother_nrc_code,
                'mother_nrc_no' => $this->mother_nrc_no,
                'student_phone' => $this->student_phone,
                'parent_phone' => $this->parent_phone,
                'address' => $this->address,
                'note' => $this->note,
                'is_major_registered' => $this->for == "major-registration" ? 1 : $this->is_major_register,
                'current_attendance_year' => $this->current_attendance_year,
                'approval_no' => $this->approval_no,
                'ar_wa_tha_no' => $this->ar_wa_tha_no,
                'type' => $this->type,
                'major' => $this->major,
                'get_university' => $this->get_university,
                'draft' => false,
                'created_by' => auth()->id(),
            ]
        );

        $message = $this->for == "major-registration" ? 'Major created successfully.' : 'Student created successfully.';

        $this->reset();
        session()->flash('success', $message);
        return $this->redirect('/unistudentmanagement/major-registration', navigate: false);
    }

    public function render()
    {
        return view('unistudentmanagement::livewire.student-create');
    }
}
