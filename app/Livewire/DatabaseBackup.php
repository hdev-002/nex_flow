<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class DatabaseBackup extends Component
{
    use WithFileUploads;

    public $isGenerating = false;
    public $backupPath = null;
    public $error = null;
    public $isRestoring = false;
    public $backups = [];
    public $uploadedBackup;
    public $password = '';

    protected function verifyPassword($password)
    {
        return $password === env('BACKUP_PASSWORD');
    }

    public function uploadAndRestore()
    {
        if (!$this->verifyPassword($this->password)) {
            $this->error = 'Invalid password';
            return;
        }

        $this->isRestoring = true;
        $this->error = null;

        try {
            $tempPath = $this->uploadedBackup->getRealPath();
            $currentDbPath = database_path('database.sqlite');

            // Create a temporary backup of current database
            $tempBackup = database_path('database_temp_' . time() . '.sqlite');
            File::copy($currentDbPath, $tempBackup);

            try {
                // Restore the database
                File::copy($tempPath, $currentDbPath);
                // Remove temporary backup on success
                File::delete($tempBackup);
                session()->flash('success', 'Database restored successfully from uploaded file');
            } catch (\Exception $e) {
                // If restore fails, try to recover from temp backup
                if (File::exists($tempBackup)) {
                    File::copy($tempBackup, $currentDbPath);
                    File::delete($tempBackup);
                }
                throw $e;
            }
        } catch (\Exception $e) {
            $this->error = 'Failed to restore backup: ' . $e->getMessage();
        }

        $this->isRestoring = false;
        $this->reset(['uploadedBackup', 'password']);
        $this->loadBackups();
    }

    public function generateBackup()
    {
        if (!$this->verifyPassword($this->password)) {
            $this->error = 'Invalid backup password';
            return;
        }

        $this->isGenerating = true;
        $this->error = null;
        $this->backupPath = null;

        try {
            $filename = 'backup_' . Carbon::now()->format('Y_m_d_His') . '.sqlite';
            $backupPath = storage_path('app/backups/' . $filename);
            
            // Ensure backup directory exists
            if (!File::exists(storage_path('app/backups'))) {
                File::makeDirectory(storage_path('app/backups'), 0755, true);
            }

            // Copy current database file
            File::copy(database_path('database.sqlite'), $backupPath);
            
            $this->backupPath = $filename;
            $this->reset('password');
        } catch (\Exception $e) {
            $this->error = 'Failed to generate backup: ' . $e->getMessage();
        }

        $this->isGenerating = false;
    }

    public function downloadBackup()
    {
        if (!$this->verifyPassword($this->password)) {
            $this->error = 'Invalid backup password';
            return;
        }

        if (!$this->backupPath) {
            $this->error = 'No backup file available for download';
            return;
        }

        $this->reset('password');
        return response()->download(storage_path('app/backups/' . $this->backupPath));
    }

    public function mount()
    {
        $this->loadBackups();
    }

    public function loadBackups()
    {
        $backupDir = storage_path('app/backups');
        if (File::exists($backupDir)) {
            $this->backups = collect(File::files($backupDir))
                ->map(function($file) {
                    return [
                        'name' => $file->getFilename(),
                        'size' => number_format($file->getSize() / 1024, 2) . ' KB',
                        'date' => Carbon::createFromTimestamp($file->getMTime())->format('Y-m-d H:i:s')
                    ];
                })
                ->sortByDesc('date')
                ->values()
                ->toArray();
        }
    }

    public function restoreBackup($filename)
    {
        if (!$this->verifyPassword($this->password)) {
            $this->error = 'Invalid backup password';
            return;
        }

        $this->isRestoring = true;
        $this->error = null;

        try {
            $backupPath = storage_path('app/backups/' . $filename);
            $currentDbPath = database_path('database.sqlite');

            if (!File::exists($backupPath)) {
                throw new \Exception('Backup file not found');
            }

            // Create a temporary backup of current database
            $tempBackup = database_path('database_temp_' . time() . '.sqlite');
            File::copy($currentDbPath, $tempBackup);

            try {
                // Restore the database
                File::copy($backupPath, $currentDbPath);
                // Remove temporary backup on success
                File::delete($tempBackup);
                session()->flash('success', 'Database restored successfully from ' . $filename);
            } catch (\Exception $e) {
                // If restore fails, try to recover from temp backup
                if (File::exists($tempBackup)) {
                    File::copy($tempBackup, $currentDbPath);
                    File::delete($tempBackup);
                }
                throw $e;
            }
        } catch (\Exception $e) {
            $this->error = 'Failed to restore backup: ' . $e->getMessage();
        }

        $this->isRestoring = false;
        $this->reset('password');
        $this->loadBackups();
    }

    public function render()
    {
        return view('livewire.database-backup')->layout('layouts.app');
    }
}