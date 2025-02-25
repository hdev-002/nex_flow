<div class="card card-flush h-100" x-data="{ showModal: false }" @click="showModal = true" :class="'cursor-pointer'">
    <div x-show="showModal" class="modal fade show" tabindex="-1" aria-modal="true" role="dialog" style="display: block; background: rgba(0,0,0,0.5);" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" @click.outside="showModal = false">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="btn-close" @click="showModal = false"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 mb-2 lh-1">{{ $value }}</span>
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">{{ $title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header pt-5 mb-6">
        @if(isset($title))
        <div class="card-title d-flex flex-column">
            @if(isset($value))
            <span class="fs-2hx fw-bold text-dark me-2 mb-2 lh-1">{{ $value }}</span>
            @endif
            <span class="text-gray-500 pt-1 fw-semibold fs-6">{{ $title }}</span>
        </div>
        @endif
        @if(isset($toolbar))
        <div class="card-toolbar">
            {{ $toolbar }}
        </div>
        @endif
    </div>
    @if(isset($body))
    <div class="card-body pt-5">
        {{ $body }}
    </div>
    @endif
</div>