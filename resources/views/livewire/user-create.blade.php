<div>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center"><a href="{{ route('users.list') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a><span class="fw-bolder fs-2 ms-2">User</span></span>


        {{--            <a href="#" class="btn btn-sm btn-flex btn-secondary align-self-center px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">--}}
        {{--                <i class="ki-outline ki-plus-square fs-3"></i>Invite</a>--}}
    </div>
    <!--begin::Form-->
    <form  wire:submit.prevent="createUser">
        <div class="card card-flush pt-3 mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-3">
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="fv-row col-12 col-md-6 mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="name" class="form-control form-control-sm mb-1 mb-lg-0" placeholder="Full name">
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
                            <input type="email"  wire:model="email" class="form-control form-control-sm mb-1 mb-lg-0" placeholder="example@domain.com">
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
                                <input class="form-control form-control-sm"
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

                <!--end::Form-->
            </div>
        </div>
        <!--begin::Actions-->
        <div class="text-start">
            {{--            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>--}}
            <button type="submit" class="btn btn-sm btn-dark" data-kt-users-modal-action="submit">
                <span class="indicator-label">Save</span>
                <span class="indicator-progress" wire:loading>Saving...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
</div>
