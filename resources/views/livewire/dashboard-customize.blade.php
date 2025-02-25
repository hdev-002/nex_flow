<div><div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Dashboard Widgets</span>
            <span class="text-muted mt-1 fw-semibold fs-7">Customize your dashboard widgets</span>
        </h3>
    </div>
    <div class="card-body py-3">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive" wire:sortable="updateWidgetOrder">
            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                <thead>
                    <tr class="fw-bold text-muted">
                        <th class="min-w-50px"></th>
                        <th class="min-w-150px">Widget Title</th>
                        <th class="min-w-140px">Data Type</th>
                        <th class="min-w-120px">Visibility</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($widgets as $widget)
                        <tr wire:key="widget-{{ $widget['id'] }}">
                            <td style="cursor: pointer">
                                <i class="ki-duotone ki-dots-square fs-2"  wire:click="startEditing({{ $widget['id'] }})">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </td>
                            <td>{{ $widget['title'] }}</td>
                            <td>{{ $availableDataTypes[$widget['value_type']] }}</td>
                            <td>
                                <div class="form-check form-switch form-check-custom form-check-success form-check-solid me-10">
                                    <input class="form-check-input h-20px w-30px" type="checkbox" 
                                        wire:click="toggleVisibility({{ $widget['id'] }})" 
                                        @if($widget['visible']) checked @endif>
                                </div>
                            </td>
                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($editingWidget)
    <div class="modal fade show d-block" tabindex="-1" aria-modal="true" role="dialog" style="background: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Widget</h5>
                    <button type="button" class="btn-close" wire:click="$set('editingWidget', null)"></button>
                </div>
                <form wire:submit.prevent="saveWidget">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label required">Widget Title</label>
                            <input type="text" class="form-control form-control-sm @error('editingWidget.title') is-invalid @enderror" 
                                wire:model.defer="editingWidget.title">
                            @error('editingWidget.title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Data Type</label>
                            <select class="form-select form-select-sm @error('editingWidget.value_type') is-invalid @enderror" 
                                wire:model.defer="editingWidget.value_type">
                                <option value="">Select Data Type</option>
                                @foreach($availableDataTypes as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('editingWidget.value_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" 
                                wire:model.defer="editingWidget.visible">
                            <label class="form-check-label">Visible on Dashboard</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" 
                            wire:click="$set('editingWidget', null)">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
</div>