<?php

if (!function_exists('getNavigation')) {
    /**
     * Retrieve navigation configuration based on module and section.
     *
     * @param string $fileName Name of the navigation section (file name).
     * @param string|null $moduleName Optional module name.
     * @return array Navigation configuration array.
     */
    function getNavigation(string $fileName, ?string $moduleName = null): array
    {
        if ($moduleName) {
            $moduleConfigPath = base_path("Modules/{$moduleName}/config/{$fileName}.php");

            if (file_exists($moduleConfigPath)) {
                return include $moduleConfigPath;
            }
        }

        return config('navigation.' . $fileName, []);
    }
}


if (!function_exists('getNavigationAll')) {
    /**
     * Retrieve navigation configuration based on module and section.
     *
     * @return array Navigation configuration array.
     */
    function getNavigationAll(): array
    {
        $navigation = [];

        // Step 1: Load main configuration files from config/navigation/
        $mainConfigFiles = glob(config_path('navigation/*.php')); // All files in config/navigation
        foreach ($mainConfigFiles as $file) {
            $navigation = array_merge($navigation, include $file);
        }

        // Step 2: Load module-specific configuration files
        $modulesPath = base_path('Modules'); // Path to Modules directory
        $moduleDirs = glob($modulesPath . '/*', GLOB_ONLYDIR); // All module directories
        foreach ($moduleDirs as $moduleDir) {
            $moduleConfigFile = $moduleDir . '/config/sidebar.php'; // Sidebar file in module
            if (file_exists($moduleConfigFile)) {
                $navigation = array_merge($navigation, include $moduleConfigFile);
            }
        }

        return $navigation;
    }
}
