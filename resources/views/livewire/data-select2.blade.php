{{--<div>--}}
{{--    <select class="form-select select-{{ $componentId }}" id="data-select-{{ $componentId }}" wire:model="defaultSelected" data-control="select2" data-placeholder="Select an option">--}}
{{--        <option value="">Select an option</option>--}}
{{--        @foreach ($options as $item)--}}
{{--            <option value="{{ $item[$valueField] }}"  {{ $defaultSelected == $item[$valueField] ? 'selected' : '' }}>--}}
{{--                {{ $item[$labelField] }}--}}
{{--            </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--</div>--}}
{{--<script>--}}
{{--    document.addEventListener('livewire:init', () => {--}}
{{--        console.log('init')--}}
{{--        Livewire.hook('request', () => {--}}
{{--            console.log('requ')--}}
{{--            const selectElement = $('#data-select-{{ $componentId }}');--}}
{{--            selectElement.select2();--}}

{{--            $(selectElement).on('change', function (e) {--}}
{{--                @this.set('dataSelected',  e.target.value);--}}
{{--            });--}}
{{--        })--}}

{{--    })--}}
{{--</script>--}}

{{--@push('scripts')--}}
{{--    <script wire:ignore>--}}
{{--        (function() {--}}
{{--            const selectElementId = `#data-select-{{ $componentId }}`;--}}
{{--            const selectElement = $(selectElementId);--}}

{{--            // Initialize select2 if not already initialized--}}
{{--            if (!selectElement.hasClass('select2-initialized')) {--}}
{{--                selectElement.select2();--}}
{{--                selectElement.addClass('select2-initialized');--}}

{{--                $(selectElement).on('change', function (e) {--}}
{{--                @this.set('dataSelected', e.target.value);--}}
{{--                });--}}
{{--            }--}}
{{--        })();--}}
{{--    </script>--}}
{{--@endpush--}}

<div>
    <select
        class="form-select select-{{ $componentId }}"
        id="data-select-{{ $componentId }}"
        wire:model="dataSelected"
        data-control="select2"
        data-placeholder="Select an option"
    >
        <option value="">Select an option</option>
        @foreach ($options as $item)
            <option value="{{ $item[$valueField] }}" {{ $defaultSelected == $item[$valueField] ? 'selected' : '' }}>
                {{ $item[$labelField] }}
            </option>
        @endforeach
    </select>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {

            Livewire.hook('morph.updated', ({ el, component }) => {
                // Check if the element is a Select2 element
                if (el.querySelector('.form-select.select-{{ $componentId }}')) {
                    // Initialize Select2
                    initSelect2();
                }
            });


            function initSelect2() {
                const selectElementId = `#data-select-{{ $componentId }}`;
                const selectElement = $(selectElementId);

                // Destroy any existing Select2 instance
                if (selectElement.hasClass('select2-initialized')) {
                    selectElement.select2('destroy');
                }

                // Initialize Select2
                selectElement.select2({
                    placeholder: selectElement.data('placeholder'),
                    allowClear: true,
                });

                // Mark as initialized
                selectElement.addClass('select2-initialized');

                // Sync value with Livewire
                selectElement.on('change', function (e) {
                @this.set('dataSelected', e.target.value);
                });
            }

            // Initialize Select2 on page load
            initSelect2();
        });
    </script>
@endpush

