<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('generateBreadcrumbsFromUri')) {
    function generateBreadcrumbsFromUri()
    {
        // Initialize breadcrumbs with a default root value
        $breadcrumbs = [
            ['name' => 'Apps', 'url' => url('/dashboard')], // "Apps" as root
        ];

        // Get URI segments
        $segments = request()->segments();

        if (empty($segments)) {
            return $breadcrumbs; // If no segments, return the default "Apps"
        }

        $path = '';

        foreach ($segments as $index => $segment) {
            $path .= '/' . $segment;

            // Add each URI segment as a breadcrumb
            $breadcrumbs[] = [
                'name' => ucfirst(str_replace('-', ' ', $segment)), // Capitalize and replace dashes with spaces
                'url' => url($path),
            ];
        }

        return $breadcrumbs;
    }
}



if (!function_exists('generatePageTitle')) {
    function generatePageTitle()
    {
        // Get the current route name
        $routeName = Route::currentRouteName();

        // Default title
        $pageTitle = '';

        switch ($routeName) {
            case 'users.list':
                $pageTitle = 'Users List';
                break;
            case 'users.create':
                $pageTitle = 'Create User';
                break;
            case 'dashboard':
                $pageTitle = 'Dashboard';
                break;
            default:
                // Use URI segments for title generation
                $segments = request()->segments();
                $pageTitle = ucfirst(str_replace('-', ' ', end($segments))); // Last segment as title
                $pageTitle = $pageTitle ?: 'Dashboard'; // Fallback to Dashboard
                break;
        }

        return $pageTitle;
    }
}
