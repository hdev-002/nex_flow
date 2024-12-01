<!-- resources/views/livewire/users-create.blade.php -->

<div class="mt-9">
    <div class="card card-flush pt-3 mb-5 mb-lg-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
    <!--begin::Form-->
    <form  wire:submit.prevent="createUser">
        <!--begin::Scroll-->
        <div class="d-flex flex-column px-5 px-lg-10">
            <div class="row">
                <!--begin::Input group-->
                <div class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" wire:model="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name">
                    <!--end::Input-->
                    @error('name')<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email"  wire:model="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com">
                    <!--end::Input-->
                    @error('email')<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <!--end::Input group-->
            </div>
            <!--begin::Main wrapper-->
            <div class="fv-row" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Label-->
                    <label class="form-label fw-semibold fs-6 mb-2">
                        New Password
                    </label>
                    <!--end::Label-->

                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid"
                               type="password" placeholder="" wire:model="password" name="new_password" autocomplete="off" />

                        <!--begin::Visibility toggle-->
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                              data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                    <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
                        <!--end::Visibility toggle-->
                    </div>
                    <!--end::Input wrapper-->

                    <!--begin::Highlight meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Highlight meter-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Hint-->
                <div class="text-muted">
                    Use 8 or more characters with a mix of letters, numbers & symbols.
                </div>
                <!--end::Hint-->
                @error('password')<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <!--end::Main wrapper-->


        </div>
        <!--end::Scroll-->
        <!--begin::Actions-->
        <div class="text-center pt-10">
            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                <span class="indicator-label">Create</span>
                <span class="indicator-progress" wire:loading>Please wait...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
        </div>
    </div>

</div>
