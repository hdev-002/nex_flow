@php
    $section = 'users';
@endphp
<x-app-layout :navigationSection="$section">
    <livewire:user-update :userId="$id" />
</x-app-layout>
