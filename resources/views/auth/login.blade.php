<x-guest-layout>
    <x-authentication-card>
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">Demo Buiness</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Access Your Business</div>
            <!--end::Subtitle=-->
        </div>

        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-danger">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="form w-100">
            @csrf

            <div>
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control h-35px h-md-40px" type="email" name="email" :value="old('email')" required autofocus autocomplete="off" placeholder="Enter email" />
            </div>

                <div class="fv-row mt-7" data-kt-password-meter="true">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <div class="position-relative mb-3">
                    <input id="password" class="form-control h-35px h-md-40px" type="password" name="password" required placeholder="Enter Password"
                           autocomplete="off" />

                    <!--begin::Visibility toggle-->
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                          data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
                    <!--end::Visibility toggle-->
                </div>
            </div>

            <div class="block mt-7">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4">


                <button class="w-100 btn btn-primary" wire:negative>
                    {{ __('Sign in') }}
                </button>
                <div class="d-flex align-items-start justify-content-end mt-2">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
