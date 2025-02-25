<div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Navigation Menu Settings</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Customize your sidebar navigation menu</span>
            </h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-light-success me-3" wire:click="exportToJson">
                    <i class="ki-duotone ki-file-down fs-2"></i>Export to JSON
                </button>
                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_item">
                    <i class="ki-duotone ki-plus fs-2"></i>Add Menu Item
                </button>
            </div>
        </div>
        <div class="card-body py-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive" wire:sortable="updateOrder">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-150px">Title</th>
                            <th class="min-w-140px">Route</th>
                            <th class="min-w-120px">Icon</th>
                            <th class="min-w-120px">Visibility</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr wire:sortable.item="{{ $item->id }}" wire:key="nav-{{ $item->id }}" class="{{ $item->parent_id ? 'child-item' : '' }}">
                                <td class="d-flex align-items-center">
                                    @if($item->parent_id)
                                        <div class="ms-4">└─</div>
                                    @endif
                                    <div class="{{ $item->parent_id ? 'ms-2' : '' }}">{{ $item->title }}</div>
                                </td>
                                <td>{{ $item->route_name }}</td>
                                <td><i class="{{ $item->icon }}"></i></td>
                                <td>
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" 
                                            wire:click="toggleVisibility({{ $item->id }})" 
                                            {{ $item->is_visible ? 'checked' : '' }}/>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light me-1" 
                                            wire:click="moveItem({{ $item->id }}, 'up')" 
                                            {{ $loop->first ? 'disabled' : '' }}>
                                        <i class="ki-duotone ki-arrow-up fs-2"><span class="path1"></span><span class="path2"></span></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-sm btn-light me-1" 
                                            wire:click="moveItem({{ $item->id }}, 'down')" 
                                            {{ $loop->last ? 'disabled' : '' }}>
                                        <i class="ki-duotone ki-arrow-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-sm btn-light-primary me-1"
                                            wire:click="editItem({{ $item->id }})" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#kt_modal_add_item">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-sm btn-light-danger"
                                            wire:click="deleteItem({{ $item->id }})">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div wire:ignore.self class="modal fade" tabindex="-1" id="kt_modal_add_item">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">{{ $editingItem ? 'Edit' : 'Add' }} Menu Item</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>

                <form wire:submit.prevent="saveItem">
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <input type="text" wire:model="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter menu title"/>
                            @error('title') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Route Name</label>
                            <select wire:model="route_name" class="form-select form-select-solid">
                                <option value="">Select a route</option>
                                @foreach($available_routes as $route)
                                    <option value="{{ $route }}">{{ $route }}</option>
                                @endforeach
                            </select>
                            @error('route_name') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Icon</label>
                            <div class="position-relative">
                                <select wire:model="icon" class="form-select form-select-solid icon-select" data-control="select2" data-placeholder="Select an icon">
                                    <option value=""></option>
                                    @foreach($available_icons as $category => $icons)
                                        <optgroup label="{{ $category }}">
                                            @foreach($icons as $iconClass => $iconName)
                                                <option value="{{ $iconClass }}" data-icon="{{ $iconClass }}">{{ $iconName }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                @if($icon)
                                    <div class="position-absolute top-50 end-0 translate-middle-y me-5">
                                        <i class="{{ $icon }} fs-2"></i>
                                    </div>
                                @endif
                            </div>
                            @error('icon') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        @push('scripts')
                        <script>
                            document.addEventListener('livewire:initialized', function () {
                                $(document).ready(function() {
                                    function formatOption(option) {
                                        if (!option.id) return option.text;
                                        return $('<span><i class="' + $(option.element).data('icon') + ' fs-5 me-2"></i>' + option.text + '</span>');
                                    }

                                    $('.icon-select').select2({
                                        templateResult: formatOption,
                                        templateSelection: formatOption,
                                        escapeMarkup: function(m) { return m; }
                                    });

                                    $('.icon-select').on('change', function (e) {
                                        @this.set('icon', $(this).val());
                                    });
                                });

                                Livewire.hook('morph.updated', ({ el, component }) => {
                                    $('.icon-select').select2({
                                        templateResult: formatOption,
                                        templateSelection: formatOption,
                                        escapeMarkup: function(m) { return m; }
                                    });
                                });
                            });
                        </script>
                        @endpush

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Parent Menu</label>
                            <select wire:model="parent_id" class="form-select form-select-solid">
                                <option value="">None</option>
                                @foreach($items->where('parent_id', null) as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-7">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" wire:model="is_visible"/>
                                <label class="form-check-label fw-semibold fs-6">Visible</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>