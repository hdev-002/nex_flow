<div>
    <!-- Saving Indicator -->
    <div class="text-secondary-emphasis fs-5 mt-2" wire:loading wire:target="saveDraft">
        <i class="fa fa-spinner fa-spin"></i> Saving...
    </div>

    <!-- Saved Indicator -->
    @if ($status === 'saved')
        <div class="text-secondary-emphasis fs-5 mt-2">
            <i class="ki-outline ki-cloud"></i> Saved
        </div>
    @endif
</div>

@push('scripts')
    <script>
        window.addEventListener('reset-status', () => {
            setTimeout(() => {
                Livewire.find(
                    '{{ $this->getId() }}'
                ).set('status', null);
            }, 3000); // Reset status after 3 seconds
        });
    </script>
@endpush
