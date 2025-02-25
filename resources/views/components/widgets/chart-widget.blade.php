<x-widgets.base-widget
    :title="$title"
    :value="$value"
>
    @isset($toolbar)
        <x-slot:toolbar>
            {{ $toolbar }}
        </x-slot>
    @endisset

    <x-slot:body>
        <div id="{{ $chartId }}" class="min-h-300px"></div>
        @push('scripts')
        <script>
            var {{ $chartId }} = new ApexCharts(document.querySelector("#{{ $chartId }}"), {!! $options !!});
            {{ $chartId }}.render();
        </script>
        @endpush
    </x-slot>
</x-widgets.base-widget>