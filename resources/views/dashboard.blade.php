<x-app-layout>
<div class=""
<!--begin::Content container-->
<div class="app-container container-xxl px-10 py-8">
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Welcome card-->
        <div class="card">
            <div class="card-body p-lg-20">
                <div class="d-flex flex-column flex-center">
                    <!--begin::Heading-->
                    <div class="mb-7 text-center">
                        <h3 class="fs-2qx fw-bolder mb-3 animate animation-slide-in-down animation">Welcome {{ auth()->user()->name }}</h3>
                        <div class="fs-3 text-gray-500 mb-5">Your Business Dashboard Overview</div>
                    </div>
                    <!--end::Heading-->
                </div>
            </div>
        </div>
        <!--end::Welcome card-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget-->
            <div class="card card-flush h-100">
                <div class="card-header pt-5 mb-6">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 mb-2 lh-1">69</span>
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Active Users</span>
                    </div>
                </div>
            </div>
            <!--end::Card widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget-->
            <div class="card card-flush h-100">
                <div class="card-header pt-5 mb-6">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 mb-2 lh-1">15</span>
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Business Locations</span>
                    </div>
                </div>
            </div>
            <!--end::Card widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget-->
            <div class="card card-flush h-100">
                <div class="card-header pt-5 mb-6">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 mb-2 lh-1">24</span>
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Active Applications</span>
                    </div>
                </div>
            </div>
            <!--end::Card widget-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget-->
            <div class="card card-flush h-100">
                <div class="card-header pt-5 mb-6">
                    <div class="card-title d-flex flex-column">
                        <span class="fs-2hx fw-bold text-dark me-2 mb-2 lh-1">4</span>
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Active Modules</span>
                    </div>
                </div>
            </div>
            <!--end::Card widget-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6">
            <!--begin::Card-->
            <div class="card card-flush h-md-100">
                <!--begin::Card header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Quick Actions</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <div class="d-flex flex-stack h-50px">
                        <a href="#" class="text-primary fw-semibold fs-6 me-4">Manage Users</a>
                        <a href="#" class="text-primary fw-semibold fs-6 me-4">Business Locations</a>
                        <a href="#" class="text-primary fw-semibold fs-6">Module Manager</a>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-6">
            <!--begin::Card-->
            <div class="card card-flush h-md-100">
                <!--begin::Card header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Recent Activities</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5">
                    <div class="timeline-label">
                        <div class="timeline-item">
                            <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <div class="timeline-content fw-semibold text-gray-600 ps-3">New user registered</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-label fw-bold text-gray-800 fs-6">10:00</div>
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <div class="timeline-content fw-semibold text-gray-600 ps-3">System updated</div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<!--end::Content container-->
</div>
</x-app-layout>
