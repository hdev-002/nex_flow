<x-app-layout>
    <!--begin::Content container-->
    <div class="app-container container-xxl">
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
                            <!--begin::Clock-->
                            @php
                               $timezone = App\Facades\Settings::get('timezone', 'UTC');

                            @endphp
                            <div class="">
                                <div class="clock-container">
                                    <div class="clock-display">
                                        <div class="fs-2x fw-bold" id="clock">Loading...</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Clock-->
                            <script>
                                const timezone = "{{ $timezone }}";
                            
                                function updateClock() {
                                    const now = new Date();
                                    document.getElementById('clock').textContent = 
                                        new Date(now.getTime()).toLocaleTimeString('en-US', { 
                                            timeZone: timezone,
                                            hour: '2-digit',
                                            minute: '2-digit',
                                            second: '2-digit'
                                        });
                                }
                        
                                // Update clock every second
                                setInterval(updateClock, 1000);
                                updateClock(); // Initial update
                            </script>
                        </div>
                        <!--end::Heading-->
                    </div>
                </div>
            </div>
            <!--end::Welcome card-->
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <livewire:dashboard-stats />
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
                        <div class="row g-5">
                            <!--begin::Col-->
                            <div class="col-4">
                                <a href="{{ route('users.list')}}" class="card bg-light-dark bg-hover-light-dark card-xl-stretch mb-xl-8 text-center py-5">
                                    <div class="card-body p-0">
                                        <i class="ki-duotone ki-user-square fs-3x text-dark mb-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        <div class="fw-bold fs-6 text-gray-800">Manage Users</div>
                                    </div>
                                </a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <a href="{{ route('locations.list')}}" class="card bg-light-dark bg-hover-light-dark card-xl-stretch mb-xl-8 text-center py-5">
                                    <div class="card-body p-0">
                                        <i class="ki-duotone ki-office-bag fs-3x text-dark mb-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        <div class="fw-bold fs-6 text-gray-800">Business Locations</div>
                                    </div>
                                </a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <a href="{{ route('plugins.marketplace')}}" class="card bg-light-dark bg-hover-light-dark card-xl-stretch mb-xl-8 text-center py-5">
                                    <div class="card-body p-0">
                                        <i class="ki-duotone ki-abstract-26 fs-3x text-dark mb-3"><span class="path1"></span><span class="path2"></span></i>
                                        <div class="fw-bold fs-6 text-gray-800">App Store</div>
                                    </div>
                                </a>
                            </div>
                            <!--end::Col-->
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
</x-app-layout>
