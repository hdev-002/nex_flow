@php
    $moduleName = "UniStudentManagement";
    $navSection = 'students';
@endphp
<x-app-layout :navigationSection="$navSection" :moduleName="$moduleName">
    <livewire:unistudentmanagement::student-update :id="$id" for="draft" />
</x-app-layout>


