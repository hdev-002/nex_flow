<div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Backup & Restore</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Manage your database backups and restore points</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="d-flex flex-column gap-3">
                @if($error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endif
    
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
    
                @if($backupPath)
                <div class="alert alert-success">
                    Backup generated successfully!
                </div>
                @endif
    
            
    
                <div class="p-4 mt-4">
                    <div class="fv-row col-12 col-md-6  mb-7 fv-plugins-icon-container">
                        <!--begin::Input-->
                        <input type="text"  wire:model="password" class="form-control form-control-sm mb-1 mb-lg-0" placeholder="Password">
                        <!--end::Input-->
                    </div>
                    <form wire:submit.prevent="uploadAndRestore" class="card-body p-0">
                        <div class="upload-area mb-4">
                            <div class="custom-file-upload position-relative">
                                <input type="file" 
                                    class="form-control form-control-lg border-dashed rounded-3 py-3" 
                                    id="backupFile" 
                                    wire:model="uploadedBackup" 
                                    accept=".sqlite">
                            </div>
                            @error('uploadedBackup') 
                                <div class="text-danger small mt-2">
                                    <i class="bi bi-exclamation-circle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-end">
                            @if($backupPath)
                            <button wire:click="downloadBackup" 
                                    class="btn btn-dark px-4 btn-sm me-3">
                                <i class="bi bi-download me-1"></i>
                                Download
                            </button>
                            @endif

                            <button wire:click="generateBackup" class="btn btn-sm btn-dark me-3" @if($isGenerating) disabled @endif>
                                @if($isGenerating)
                                <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                                Generating...
                                @else
                                <i class="bi bi-shield-lock me-1"></i>
                                Generate Backup
                                @endif
                            </button>
                           
                            <button type="submit" 
                                class="btn btn-dark btn-sm px-4 py-2" 
                                @if($isRestoring) disabled @endif>
                                @if($isRestoring)
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    Restoring Database...
                                @else
                                    <i class="bi bi-arrow-clockwise me-2"></i>
                                    Restore Database
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
    
                @if(count($backups) > 0)
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Backup File</th>
                                <th>Size</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $backup)
                            <tr>
                                <td>{{ $backup['name'] }}</td>
                                <td>{{ $backup['size'] }}</td>
                                <td>{{ $backup['date'] }}</td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <button 
                                            wire:click="restoreBackup('{{ $backup['name'] }}')"
                                            class="btn btn-dark btn-sm"
                                            onclick="return confirm('Are you sure you want to restore this backup? This will overwrite your current database.')"
                                            @if($isRestoring) disabled @endif
                                        >
                                            @if($isRestoring)
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Restoring...
                                            @else
                                            Restore
                                            @endif
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
    
            {{-- <div class="table-responsive" wire:sortable="updateWidgetOrder">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-50px"></th>
                            <th class="min-w-150px">Widget Title</th>
                            <th class="min-w-140px">Data Type</th>
                            <th class="min-w-120px">Visibility</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                 
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>

</div>