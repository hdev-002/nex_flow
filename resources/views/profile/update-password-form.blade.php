<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0"> {{ __('Update Password') }}
                <br>
                <span class="text-gray-500 fs-6">{{ __('Ensure your account is using a long, random password to stay secure.') }}</span>
            </h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form wire:submit="updatePassword" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label for="current_password" class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Current Password') }}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input id="current_password" type="password" wire:model="state.current_password" autocomplete="current-password" class="form-control form-control-lg form-control-solid">
                        <div for="current_password" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label for="password" class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('New Password') }}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input id="password" type="password" wire:model="state.password" autocomplete="new-password" class="form-control form-control-lg form-control-solid">
                        <div for="password" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label for="password_confirmation" class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('Confirm Password') }}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input id="password_confirmation" type="password" wire:model="state.password_confirmation" autocomplete="new-password" class="form-control form-control-lg form-control-solid">
                        <div for="password_confirmation" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>


                <button type="submit"    class="btn btn-dark" > {{ __('Save') }}</button>
            </div>
            <!--end::Actions-->
            <input type="hidden"></form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
