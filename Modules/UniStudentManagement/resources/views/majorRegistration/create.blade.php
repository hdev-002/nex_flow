@php
    $moduleName = "UniStudentManagement";
@endphp
<x-app-layout :navigationSection="$navSection" :moduleName="$moduleName">
    <livewire:unistudentmanagement::student-create for="major-registration" />
</x-app-layout>


