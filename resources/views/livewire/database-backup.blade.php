<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Database Backup</h3>
    </div>
    <div class="card-body">
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

            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="card-title">Generate Backup</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="backupPassword" class="form-label">Backup Password</label>
                        <input type="password" class="form-control" id="backupPassword" wire:model="password">
                    </div>
                    <div class="d-flex gap-3">
                        <button wire:click="generateBackup" class="btn btn-primary" @if($isGenerating) disabled @endif>
                            @if($isGenerating)
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Generating...
                            @else
                            Generate Backup
                            @endif
                        </button>

                        @if($backupPath)
                        <button wire:click="downloadBackup" class="btn btn-success">
                            Download Backup
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title">Restore Database</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="uploadAndRestore">
                        <div class="mb-3">
                            <label for="backupFile" class="form-label">Upload Backup File</label>
                            <input type="file" class="form-control" id="backupFile" wire:model="uploadedBackup" accept=".sqlite">
                            @error('uploadedBackup') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="restorePassword" class="form-label">Backup Password</label>
                            <input type="password" class="form-control" id="restorePassword" wire:model="password">
                        </div>
                        <button type="submit" class="btn btn-warning" @if($isRestoring) disabled @endif>
                            @if($isRestoring)
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Restoring...
                            @else
                            Restore from File
                            @endif
                        </button>
                    </form>
                </div>
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
                                    <input type="password" class="form-control form-control-sm" placeholder="Password" wire:model="password">
                                    <button 
                                        wire:click="restoreBackup('{{ $backup['name'] }}')"
                                        class="btn btn-warning btn-sm"
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
    </div>
</div>