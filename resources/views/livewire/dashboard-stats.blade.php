<div class="row" wire:sortable="updateWidgetOrder">
    @foreach($widgets as $widget)
        @if($widget['visible'])
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10"">
                <div class="card card-flush h-md-100 shadow-none border-1 border-gray-400">
                    <div class="card-header pt-5">
                        <div class="card-title d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2 counted" data-kt-countup="true" data-kt-countup-value="{{ $widget['count'] }}">{{ $widget['count'] }}</span>
                                @if(isset($widget['trend']) && $widget['trend'] > 0)
                                    <span class="badge badge-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-white me-1"></i>{{ $widget['trend'] }}%
                                    </span>
                                @endif
                            </div>
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">{{ $widget['title'] }}</span>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end pt-0">
                        <div class="d-flex align-items-center flex-column mt-3 w-100">
                            <div class="d-flex justify-content-between fw-bold fs-6 text-gray-400 w-100 mt-auto mb-2">
                                <span>Last 30 days</span>
                                <span>{{ isset($widget['change']) ? ($widget['change'] > 0 ? '+' : '') . $widget['change'] : 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>