<div>
{{--    <h2>Default Applications</h2>--}}
    <div class="row gap-0">
        @foreach($defaultApps as $app)
            <div class="col col-12 col-md-6 col-lg-4 mb-6">
                <a href="{{ route('users.list') }}">
                    <!--begin::Payment address-->
                    <div class="card card-flush py-4 flex-row-fluid position-relative">
                        <!--begin::Background-->
                        <div class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                            @if($app->icon)
                                {!! $app->icon !!}
                            @else
                                <i class="ki-solid ki-two-credit-cart" style="font-size: 12em"></i>
                            @endif
                        </div>
                        <!--end::Background-->
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ $app->name ?? 'Unknown' }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">V1.0.0
                            <br>HDev02
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Payment address-->
                </a>
            </div>
        @endforeach
    </div>
</div>
