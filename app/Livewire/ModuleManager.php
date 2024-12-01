<?php

namespace App\Livewire;


use App\Models\Application;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Artisan;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Storage;
use ZipArchive;


class ModuleManager extends Component
{
    use WithFileUploads;

    public $moduleFile;
    public $modules = [];
    public $showModal = false;
    public $installedModules = [];
    public $moduleSizes = [];
    public $moduleName;
    public $statusMessage = '';
    public $uploadedModules = [];

    public function mount(){
        $this->loadModules(); // Load modules dynamically
        $this->refreshInstalledModules();
    }

//    public function loadModules()
//    {
//        // Dynamically get list of modules from storage/app/modules
//        $modulePaths = File::directories(storage_path('app/modules'));
//
//        foreach ($modulePaths as $path) {
//            // Extract the module name from the directory path
//            $moduleName = pathinfo($path, PATHINFO_FILENAME);
//            $this->modules[] = $moduleName;
//
//            // Calculate the total size of the module folder
//            $this->moduleSizes[$moduleName] = $this->calculateDirectorySize($path);
//        }
//    }

    public $conflicts = [];

    public function loadModules()
    {
        // Detect modules in storage/app/modules
        $modulePaths = File::directories(storage_path('app/modules'));
        $this->modules = []; // Reset modules

        foreach ($modulePaths as $path) {
            $moduleName = pathinfo($path, PATHINFO_FILENAME);
            $this->modules[] = $moduleName;
            $this->moduleSizes[$moduleName] = $this->calculateDirectorySize($path);
        }

        // Detect conflicts by comparing with applications table
        $installedApps = Application::where('type', 'module')->pluck('name')->toArray();
        foreach ($installedApps as $appName) {
            if (!in_array($appName, $this->modules)) {
                $this->conflicts[] = $appName; // Log conflict for missing module files
            }
        }
    }


    protected function calculateDirectorySize($path)
    {
        $size = 0;

        // Recursively get the size of each file within the directory
        foreach (File::allFiles($path) as $file) {
            $size += $file->getSize();
        }

        return $size;
    }

    // Ensure the 'modules' directory exists
    public function ensureModulesDirectoryExists()
    {
        $modulesDirectory = storage_path('app/modules');

        // Check if the directory exists, if not, create it
        if (!File::exists($modulesDirectory)) {
            File::makeDirectory($modulesDirectory, 0755, true); // 0755 = rwx for owner, rx for others
        }
    }

    public function refreshInstalledModules()
    {
        // Check installed modules and update $installedModules
        foreach ($this->modules as $module) {
            $modulePath = base_path("Modules/{$module}");
            $this->installedModules[$module] = File::exists($modulePath);
        }
    }

    // Show the modal
    public function showUploadModal()
    {
        $this->reset(['moduleFile', 'statusMessage']);  // Clear previous data
        $this->showModal = true;
    }

    // Close the modal
    public function closeModal()
    {
        $this->showModal = false;
    }


    // Method to upload and install the module
    public function uploadAndInstallModule()
    {
        $this->ensureModulesDirectoryExists();  // Make sure the 'modules' directory exists

        // Validate the file
        $this->validate([
            'moduleFile' => 'required|mimes:zip|max:10240', // Limit to 10MB
        ]);

        $filename = $this->moduleFile->getClientOriginalName();
        $path = $this->moduleFile->storeAs('modules', $filename);

        $zip = new \ZipArchive;
        $extractPath = storage_path('app/modules/' . pathinfo($filename, PATHINFO_FILENAME));

        // Extract the module ZIP
        if ($zip->open(Storage::path($path)) === true) {
            $zip->extractTo($extractPath);
            $zip->close();

            // Check if it's a valid module (you could add more validation here)
            if (is_dir($extractPath . '/module.json')) {
                $this->statusMessage = "Module uploaded and extracted successfully!";
                $this->loadModules();
                $this->installModule($extractPath);
            } else {
                $this->loadModules();
                // Clean up if invalid module
                Storage::delete($path);
                $this->statusMessage = "Invalid module ZIP file.";
            }

            $this->closeModal();
        } else {
            $this->statusMessage = "Failed to extract the ZIP file.";
        }
    }

    // Method to install the module
    public function installModule($moduleName)
    {

        $modulePath = storage_path('app/modules/'.$moduleName);

        if (!File::isDirectory($modulePath)) {
            $this->statusMessage = "The provided module path is not a valid directory!";
            return;
        }

        $destination = base_path('Modules/' . $moduleName);

        // Move extracted files to the Modules directory
        File::copyDirectory($modulePath, $destination);

        // Run module migrations, if any
        Artisan::call('module:migrate', ['module' => $moduleName]);

        // You could add more installation steps like running seeders, configs, etc.

        // Add a new application entry
        // Before creating a new application entry
        $appData = [
            'name' => $moduleName,
            'description' => 'Description for ' . $moduleName,
            'icon' => '<i class="ki-solid ki-shield-tick" style="font-size: 12em"></i>',
            'type' => 'module',
            'status' => 'active',
        ];

        Application::updateOrCreate(
            ['name' => $moduleName, 'type' => 'module'], // Check for existing entry
            $appData // Update or create new
        );


        $this->statusMessage = "Module '{$moduleName}' installed successfully!";
        $this->resetModuleList(); // Refresh the list of modules
        $this->refreshInstalledModules();
        $this->loadModules();
    }

    // Method to uninstall the module
    public function uninstallModule($moduleName)
    {
        if (Module::find($moduleName)) {
            // Uninstall module logic (you may want to remove migrations, configs, etc.)
//            Artisan::call('module:migrate:rollback', ['module' => $moduleName]);

            // Remove module directory
            File::deleteDirectory(base_path('Modules/' . $moduleName));

            // Clear cached autoload and configurations
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('clear-compiled');
            Artisan::call('optimize:clear');

            $this->statusMessage = "Module '{$moduleName}' uninstalled successfully!";
            $this->resetModuleList(); // Refresh the list of modules
            $this->refreshInstalledModules();
        } else {
            $this->statusMessage = "Module '{$moduleName}' not found.";
        }
    }

    // Method to remove the module from uploaded (not installed) directory
    public function removeModule($moduleName)
    {
        $modulePath = storage_path('app/modules/' . $moduleName);

        if (File::exists($modulePath)) {
            File::deleteDirectory($modulePath);
            $this->statusMessage = "Module '{$moduleName}' removed from uploads.";
            $this->resetModuleList(); // Refresh the list of modules
        } else {
            $this->statusMessage = "Module '{$moduleName}' not found in uploads.";
        }
    }

    // Method to upgrade the module (in this case, we will remove old version and install new one)
    public function upgradeModule($moduleName)
    {
        $this->removeModule($moduleName);
        $this->statusMessage = "Module '{$moduleName}' removed. Please upload the new version.";
    }

    // Method to reset the uploaded module list
    public function resetModuleList()
    {
        $this->uploadedModules = $this->getUploadedModules();
    }

    // Method to get the list of uploaded modules
    public function getUploadedModules()
    {
        $this->ensureModulesDirectoryExists();  // Make sure the 'modules' directory exists

        $modulesPath = storage_path('app/modules/');
        $modules = [];

        // Get the list of directories in the uploaded modules folder
        $files = File::directories($modulesPath);
        foreach ($files as $file) {
            $modules[] = basename($file);
        }

        return $modules;
    }

    public function resolveConflict($appName, $action)
    {
        if ($action === 'delete') {
            // Delete the orphaned application entry from the database
            Application::where('name', $appName)->delete();
            $this->statusMessage = "Database entry for '{$appName}' removed successfully.";
        } elseif ($action === 'ignore') {
            // Simply ignore the conflict for now
            $this->statusMessage = "Conflict for '{$appName}' ignored.";
        }

        // Refresh conflict list and modules after resolution
        $this->loadModules();
        $this->refreshInstalledModules();
    }


    // Render the component view
    public function render()
    {
        $this->resetModuleList(); // Refresh the list of uploaded modules

        return view('livewire.module-manager');
    }
}
