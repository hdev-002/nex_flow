<div>
    <select class="form-select select-{{ $componentId }}" id="nrc-select-{{ $componentId }}" wire:model="selectedNrc" data-control="select2" data-placeholder="Select an option">
        <option value="">Select an option</option>
        <option value="fasd">afdda</option>
        <option>afdda</option>
        <option>afdda</option>
    </select>

</div>


@push('scripts')
    <script>
        $('#nrc-select-{{ $componentId }}').on('change', function (e) {
        @this.set('selectedNrc',  e.target.value);
        });
    </script>
@endpush

