<div>
    @if (session()->has('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-100 text-red-700 px-4 py-2 mb-4">
        {{ session('error') }}
    </div>
@endif

    <div class="container-fluid">
        <div class="row g-4">
            @foreach ($modules as $app)
                <div class="col-12">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <!-- App Header with Icon and Title -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="symbol symbol-50px me-3">
                                    {{-- @if($app->icon)
                                        <img src="{{ $app->icon }}" alt="{{ $app->name }} icon" class="w-100 h-100 rounded">
                                    @else --}}
                                        <div class="symbol-label fs-2 fw-semibold bg-light-primary text-primary">
                                            {{ substr($app->name, 0, 2) }}
                                        </div>
                                    {{-- @endif --}}
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0 d-flex align-items-center flex-wrap">
                                        <span class="me-2">{{ $app->name }}</span>
                                        {{-- @if($app->verified) --}}
                                            <i class="ki-duotone ki-verify fs-1 text-primary" data-bs-toggle="tooltip" title="Verified Application">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        {{-- @endif --}}
                                    </h5>
                                    <div class="text-muted small">{{ $app->author ?? "SoeNova" }}</div>
                                </div>
                            </div>

                            <!-- App Description -->
                            <p class="card-text text-gray-600 mb-4">{{ $app->description }}</p>

                            <!-- App Meta Information -->
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                <div class="text-muted small mb-2 mb-sm-0">
                                    <i class="ki-duotone ki-calendar fs-6 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    {{ $app->created_at->format('M d, Y') }}
                                </div>
                                <div class="text-muted small">
                                    <i class="ki-duotone ki-arrow-down-circle fs-6 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <i class="ki-duotone ki-cloud-download fs-6 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    {{ number_format($app->download_count) }}
                                </div>
                            </div>

                            <!-- Install Button -->
                            @if (session()->has('error'.$app))
                                <div class="alert alert-danger mb-3">
                                    {{ session('error'.$app) }}
                                </div>
                            @endif

                        @if ($app->status === 'installed')          
                            <div class="d-flex gap-2">
                                <button wire:click="updateModule('{{ $app->id }}')" class="btn btn-secondary flex-grow-1 d-flex align-items-center justify-content-center">
                                    <i class="ki-duotone ki-refresh fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <span wire:loading.remove wire:target="updateModule('{{ $app->id }}')">Update</span>
                                    <span wire:loading wire:target="updateModule('{{ $app->id }}')">Updating...</span>
                                </button>
                        
                                {{-- <button wire:click="uninstallModule('{{ $app->id }}')" class="btn btn-danger w-50 d-flex align-items-center justify-content-center">
                                    <i class="ki-duotone ki-trash fs-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button> --}}
                            </div>
                        @else
                            <button wire:click="installModule('{{ $app->id }}')" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                <i class="ki-duotone ki-cloud-download fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span wire:loading.remove wire:target="installModule('{{ $app->id }}')">Install Application</span>
                                <span wire:loading wire:target="installModule('{{ $app->id }}')">Installing...</span>
                            </button>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>