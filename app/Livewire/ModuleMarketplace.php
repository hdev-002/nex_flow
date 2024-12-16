<?php

namespace App\Livewire;

use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\Module;
use Nwidart\Modules\Facades\Module as ModuleManager;
use Symfony\Component\Process\Process;

class ModuleMarketplace extends Component
{
    public $type;
    public $modules;
    public $messages = [];

    public $updateStatus = 'Checking...';

    public function mount($type)
    {
        $this->type = $type; //marketplace, installed
        $this->fetchModules();
    }

    public function fetchModules()
    {
        $allModules = Module::all();

        if ($this->type === 'installed') {
            // Filter only installed modules that have corresponding files
            $this->modules = $allModules->filter(function ($module) {
                $modulePath = base_path("Modules/{$module->name}");
                return ModuleManager::has($module->name) && is_dir($modulePath);
            });
        } else {
            // Show all modules for marketplace
            $this->modules = $allModules;
        }

        // Map each module's status
        $this->modules = $this->modules->map(function ($module) {
//            $module->status = ModuleManager::has($module->name) ? 'installed' : 'not-installed';
            return $module;
        });
    }

    public function installModule($moduleId)
    {
        $module = Module::find($moduleId);

        if (!$module) {
            session()->flash('error'.$module, "Module not found.");
            return;
        }

        $process = new Process(["git", "ls-remote", $module->repository]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error'.$module, "Can't connect to application server while installing plugin.");
            return;
        }else{
            $this->addMessage('success', "Checking app URL");
        }

        // Check if the branch exists in the repository
        $process = new Process(["git", "ls-remote", "--heads", $module->repository, $module->branch]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error'.$module, "The branch {$module->branch} does not exist in the repository.");
            return;
        }else{
            $this->addMessage('success', "Connecting application server");
        }
        $this->dispatch('check-repo-end');

        $this->dispatch('start-install', ['module' => $module->name]);

        $modulePath = base_path("Modules/{$module->name}");
        if (File::exists($modulePath)) {
            File::deleteDirectory($modulePath);
            $this->addMessage('warning', "Existing old plugin folder deleted.");
        }

        // Clone the module repository based on the selected branch
        $process = new Process(["git", "clone", "-b", $module->branch, $module->repository, $modulePath]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error'.$module, "Failed to install module: {$process->getErrorOutput()}");
            return;
        }

        // Enable the module
        ModuleManager::enable($module->name);
        $this->addMessage('success', "Plugin enabled");


        // Update module status in the database
        $module->update(['status' => 'installed']);

        $this->fetchModules();
        session()->flash('success'.$module, "Installed successfully.");
        $this->addMessage('success', "{$module->name} Plugin installed");

    }

    public function updateModule($moduleId)
    {
        $module = Module::find($moduleId);

        if (!$module) {
            session()->flash('error', "Module not found.");
            return;
        }

        $this->updateStatus = 'Checking...';

        $process = new Process(["git", "ls-remote", $module->repository]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error', "Git repository is invalid or unreachable: {$process->getErrorOutput()}");
            return;
        }

        // Check if the branch exists in the repository
        $process = new Process(["git", "ls-remote", "--heads", $module->repository, $module->branch]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error', "The branch {$module->branch} does not exist in the repository.");
            return;
        }
        $this->updateStatus = 'Updating...';
        $this->dispatch('start-update', ['module' => $module->name]);

        $modulePath = base_path("Modules/{$module->name}");

        // Pull the latest changes from the current branch
        $process = new Process(["git", "-C", $modulePath, "checkout", $module->branch]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error', "Failed to update module: {$process->getErrorOutput()}");
            return;
        }

        $process = new Process(["git", "-C", $modulePath, "pull"]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error', "Failed to pull updates for module: {$process->getErrorOutput()}");
            return;
        }

        $module->update(['status' => 'installed']);

        $this->fetchModules();
        session()->flash('success'.$module, "Updated successfully.");
    }

    public function uninstallModule($moduleId)
    {
        $module = Module::find($moduleId);
        $module->update(['status' => 'not-installed']);

        if (!$module) {
            session()->flash('error', "Module not found.");
            return;
        }

        $modulePath = base_path("Modules/{$module->name}");

        if (!is_dir($modulePath)) {
            session()->flash('error', "Module folder does not exist.");
            return;
        }

        // Disable the module
        ModuleManager::disable($module->name);

        // Delete the module folder
//        $this->deleteDirectory($modulePath);

        // Update module status in the database

        $this->fetchModules();
        session()->flash('success', "Module {$module->name} uninstalled successfully.");
    }

    public function downgradeModule($moduleId, $branch)
    {
        $module = Module::find($moduleId);

        if (!$module) {
            session()->flash('error', "Module not found.");
            return;
        }

        $this->dispatchBrowserEvent('start-downgrade', ['module' => $module->name]);

        $modulePath = base_path("Modules/{$module->name}");

        // Checkout the specific branch to downgrade
        $process = new Process(["git", "-C", $modulePath, "checkout", $branch]);
        $process->run();

        if (!$process->isSuccessful()) {
            session()->flash('error', "Failed to downgrade module: {$process->getErrorOutput()}");
            return;
        }

        // Update the module branch in the database
        $module->update(['branch' => $branch]);

        $this->fetchModules();
        session()->flash('success', "Module {$module->name} downgraded successfully.");
    }


    public function render()
    {
        return view('livewire.module-marketplace', [
            'modules' => $this->modules,
        ]);
    }

    private function addMessage($type, $message)
    {
        $this->messages[] = ['type' => $type, 'message' => $message];
    }
}
