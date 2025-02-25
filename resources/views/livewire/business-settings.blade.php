<!--begin::Content container-->
<div class="app-container container-xxl">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center">
            <a href="{{ route('dashboard') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a>
            <span class="fw-bolder fs-2 ms-2">Business Settings</span>
            <span wire:loading class="text-secondary-emphasis ms-2"> <i class="fa fa-spinner fa-spin"></i> Saving...</span>
        </span>
    </div>

    @if (session()->has('message'))
        <!--begin::Alert-->
        <div class="alert alert-success d-flex align-items-center p-5 mb-10">
            <!--begin::Icon-->
            <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
            <!--end::Icon-->
            <!--begin::Content-->
            <div class="d-flex flex-column">
                <span>{{ session('message') }}</span>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Alert-->
    @endif

    <!--begin::Card-->
    <div class="card card-flush pt-3 mb-5 flex-row-fluid shadow-sm">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h3 class="fw-bolder fs-3">Business Configuration</h3>
            </div>
            <div class="card-toolbar">
                <span class="text-gray-600">Manage your business configuration and preferences</span>
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body p-0">
            <div x-data="{ activeTab: @entangle('activeTab') }">
                <!--begin::Tabs wrapper-->
                <div class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                    <!--begin::Tab item-->
                    <button @click="activeTab = 'general'" 
                        :class="{'active': activeTab === 'general'}"
                        class="nav-link text-active-primary pb-4 mx-4">
                        <i class="ki-duotone ki-gear fs-2 me-2"></i>
                        General Settings
                    </button>
                    <!--end::Tab item-->

                    <!--begin::Tab item-->
                    <button @click="activeTab = 'logos'" 
                        :class="{'active': activeTab === 'logos'}"
                        class="nav-link text-active-primary pb-4 mx-4">
                        <i class="ki-duotone ki-picture fs-2 me-2"></i>
                        Logo Settings
                    </button>
                    <!--end::Tab item-->
                    <button @click="activeTab = 'localization'"
                        :class="{'active': activeTab === 'localization'}"
                        class="nav-link text-active-primary pb-4 mx-4">
                        <i class="ki-duotone ki-globe fs-2 me-2"></i>
                        Localization
                    </button>
                    <!--end::Tab item-->
                </div>
                <!--end::Tabs wrapper-->

                <!--begin::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin::General settings-->
                    <div x-show="activeTab === 'general'" class="tab-pane fade show active p-10" role="tabpanel">
                        <form wire:submit.prevent="saveGeneralSettings" class="form">
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Business Name</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" wire:model="businessName">
                                    @error('businessName') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Business Email</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="email" class="form-control form-control-solid" wire:model="businessEmail">
                                    @error('businessEmail') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Business Phone</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" wire:model="businessPhone">
                                    @error('businessPhone') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Business Address</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <textarea class="form-control form-control-solid" rows="3" wire:model="businessAddress"></textarea>
                                    @error('businessAddress') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Footer-->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Save General Settings</span>
                                </button>
                            </div>
                            <!--end::Footer-->
                        </form>
                    </div>
                    <!--end::General settings-->

                    <!--begin::Logo settings-->
                    <div x-show="activeTab === 'logos'" class="tab-pane fade show active p-10" role="tabpanel">
                        <form class="form">
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Light Logo</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <div class="d-flex flex-column">
                                        @if($lightLogo)
                                            <div class="mb-5">
                                                <img src="{{ Storage::url($lightLogo) }}" alt="Light Logo" class="mw-200px">
                                            </div>
                                        @endif
                                        <input type="file" class="form-control form-control-solid" wire:model="tempLightLogo" accept="image/*">
                                        @error('tempLightLogo') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Dark Logo</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <div class="d-flex flex-column">
                                        @if($darkLogo)
                                            <div class="mb-5">
                                                <img src="{{ Storage::url($darkLogo) }}" alt="Dark Logo" class="mw-200px">
                                            </div>
                                        @endif
                                        <input type="file" class="form-control form-control-solid" wire:model="tempDarkLogo" accept="image/*">
                                        @error('tempDarkLogo') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </form>
                    </div>
                    <!--end::Logo settings-->
                    <!--begin::Localization settings-->
                    <div x-show="activeTab === 'localization'" class="tab-pane fade show active p-10" role="tabpanel">
                        <form wire:submit.prevent="saveLocalizationSettings" class="form">
                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Timezone</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select class="form-select form-select-solid" wire:model="timezone">
                                        <option value="UTC">UTC</option>
                                        <option value="Asia/Yangon">Asia/Yangon</option>
                                    </select>
                                    @error('timezone') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Date Format</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select class="form-select form-select-solid" wire:model="dateFormat">
                                        <option value="Y-m-d">YYYY-MM-DD</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                    </select>
                                    @error('dateFormat') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Currency Symbol</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid" wire:model="currencySymbol">
                                    @error('currencySymbol') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Default Language</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9 fv-row">
                                    <select class="form-select form-select-solid" wire:model="defaultLanguage">
                                        <option value="en">English</option>
                                        <option value="mm">Myanmar</option>
                                        <option value="sm_mm">Shan-Myanmar</option>
                                    </select>
                                    @error('defaultLanguage') <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                            <!--begin::Footer-->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Localization Settings</span>
                                </button>
                            </div>
                            <!--end::Footer-->
                        </form>
                    </div>
                    <!--end::Localization settings-->
                </div>
                <!--end::Tab content-->
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Content container-->