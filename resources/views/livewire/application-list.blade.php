<div>
    <div class="container-fluid">
        <div class="row g-4">
            @foreach($applications as $app)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <!-- App Header with Icon and Title -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="symbol symbol-50px me-3">
                                    @if($app->icon)
                                        <img src="{{ $app->icon }}" alt="{{ $app->name }} icon" class="w-100 h-100 rounded">
                                    @else
                                        <div class="symbol-label fs-2 fw-semibold bg-light-primary text-primary">
                                            {{ substr($app->name, 0, 2) }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h5 class="card-title mb-0 d-flex align-items-center">
                                        {{ $app->name }}
                                        @if($app->verified)
                                            <i class="ki-duotone ki-verify fs-1 text-primary ms-2" data-bs-toggle="tooltip" title="Verified Application">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        @endif
                                    </h5>
                                    <div class="text-muted small">By {{ $app->author }}</div>
                                </div>
                            </div>

                            <!-- App Description -->
                            <p class="card-text text-gray-600 mb-4">{{ $app->description }}</p>

                            <!-- App Meta Information -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="text-muted small">
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
                                    {{ number_format($app->download_count) }} downloads
                                </div>
                            </div>

                            <!-- Install Button -->
                            <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                <i class="ki-duotone ki-cloud-download fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Install Application
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>