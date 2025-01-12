<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-200">

    <div class="d-block d-md-flex flex-column-fluid flex-lg-row-auto justify-content-center p-0 m-0 p-md-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body rounded-1 mt-15 mt-md-0 w-md-400px p-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-4">
                {{ $slot }}
            </div>

            <!--begin::Footer-->
            <div class="d-flex flex-center flex-wrap pt-5">
                <div class="fs-6 text-gray-600 text-center pt-5">
                    <span class="fs-6 text-gray-500">Powered by <span class="fw-bold">HDev</span></span>
                </div>
        </div>
    </div>
</div>
