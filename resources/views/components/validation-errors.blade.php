@if ($errors->any())
{{--    <div {{ $attributes }}>--}}
{{--        <div class="fw-bold text-danger">{{ __('Whoops! Something went wrong.') }}</div>--}}

{{--        <ul class="mt-3 list-disc list-inside text-sm text-danger">--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}

    <!--begin::Alert-->
    <div class="alert alert-danger d-flex align-items-center p-2 {{ $attributes }}">
        <!--begin::Icon-->
        <i class="ki-duotone ki-shield-tick fs-2hx text-danger-emphasis me-2"><span class="path1"></span><span class="path2"></span></i>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Title-->
{{--            <h4 class="mb-1 text-danger-emphasis">{{ __('Whoops! Something went wrong.') }}</h4>--}}
            <!--end::Title-->

            <!--begin::Content-->
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Alert-->
@endif
