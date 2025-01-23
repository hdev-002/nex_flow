<div>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center"><a href="{{ route('locations.list') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a><span class="fw-bolder fs-2 ms-2">#{{ $code }}</span></span>


        {{--            <a href="#" class="btn btn-sm btn-flex btn-secondary align-self-center px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">--}}
        {{--                <i class="ki-outline ki-plus-square fs-3"></i>Invite</a>--}}
    </div>
    <!--begin::Form-->
    <form  wire:submit.prevent="updateLocation">
        <div wire:ignore.self class="card card-flush pt-3 mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-3">
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="name" class="form-control form-control-sm mb-1 mb-lg-0" placeholder="Full name">
                            <!--end::Input-->
                            @error('name')<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div wire:ignore class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">
                            <label class="fw-semibold fs-6 mb-2">Parent Location</label>
                            <select
                                class="form-select form-select-sm select-parent-id"
                                id="data-select-parent-id"
                                wire:model="parent_id"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option value="">Select an option</option>
                                @foreach ($parentLocations as $location)
                                    <option value="{{ $location['id'] }}" @selected($location['id'] === $parent_id)>
                                        {{ $location['name'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('parent_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="row">
                        <!--begin::Input group-->
                        <div wire:ignore class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">
                            <label class="fw-semibold fs-6 mb-2">Type</label>
                            <select
                                class="form-select form-select-sm select-location-type"
                                id="data-select-location-type"
                                wire:model="location_type"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option value="">Select an option</option>
                                @foreach ($locationTypes as $type)
                                    <option value="{{ $type['id'] }}"  @selected($type['id'] === $location_type)>
                                        {{ $type['name'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('location_type')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">

                            <div class="form-check mt-10">
                                <input wire:model.lazy="status" wire:click="$refresh" @checked($status) class="form-check-input" type="checkbox" id="flexCheckDefault" />

                                <label class="form-check-label" for="flexCheckDefault">
                                    Active
                                </label>
                            </div>

                            @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->
                    </div>

                </div>
                <!--end::Scroll-->

                <!--end::Form-->
            </div>
        </div>
        <!--begin::Actions-->
        <div class="text-start">
            {{--            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>--}}
            <button type="submit" class="btn btn-sm btn-dark" wire:loading.attr="disabled">
                <span class="indicator-label">Save</span>
                <span class="indicator-progress" wire:target="updateLocation" wire:loading>Saving...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            function initializeSelect2(selectElementId, livewireProperty) {
                const selectElement = $(selectElementId);

                // Initialize Select2
                selectElement.select2({
                    placeholder: selectElement.data('placeholder'),
                    allowClear: true,
                });

                // Sync value with Livewire
                selectElement.on('change', function (e) {
                    @this.set(livewireProperty, e.target.value || null);
                });

                // Reinitialize Select2 after Livewire updates
                Livewire.hook('morph.updated', (el, component) => {
                    if (el instanceof HTMLElement && el.querySelector(selectElementId)) {
                        selectElement.select2('destroy').select2({
                            placeholder: selectElement.data('placeholder'),
                            allowClear: true,
                        });
                    }
                });
            }

            initializeSelect2('#data-select-location-type', 'location_type');
            initializeSelect2('#data-select-parent-id', 'parent_id');
        });
    </script>
@endpush
