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
            $moduleConfigPath = base_path("app/Modules/{$moduleName}/Config/{$fileName}.php");

            if (file_exists($moduleConfigPath)) {
                return include $moduleConfigPath;
            }
        }

        return config('navigation.' . $fileName, []);
    }
}
