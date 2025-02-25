<!--begin::Content container-->
<div class="app-container container-xxl">
    <div class="d-flex align-items-center justify-content-between mb-5">
        <span class="d-flex align-items-center gap-3">
            <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('dashboard') }}" class="btn btn-icon btn-custom btn-active-light-primary w-40px h-40px">
                <i class="fa-solid fa-arrow-left fs-4"></i>
            </a>
            <h1 class="fw-bold m-0">Business Settings</h1>
            {{-- <span wire:loading class="badge badge-light-primary d-inline-flex align-items-center gap-2 py-2">
                <i class="fa fa-spinner fa-spin"></i> Saving...
            </span> --}}
        </span>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success d-flex align-items-center p-5 mb-7">
            <i class="ki-duotone ki-shield-tick fs-2x text-success me-4"><span class="path1"></span><span class="path2"></span></i>
            <div class="d-flex flex-column">
                <span class="fw-semibold">{{ session('message') }}</span>
            </div>
        </div>
    @endif

    <div class="card card-flush shadow-sm mb-5">
        <div class="card-header py-5">
            <div class="card-title">
                <h2 class="fw-bold m-0">Business Configuration</h2>
            </div>
            <div class="card-toolbar">
                <span class="text-gray-600">Manage your business configuration and preferences</span>
            </div>
        </div>

        <div class="card-body p-0">
            <div x-data="{ activeTab: @entangle('activeTab') }" class="px-9 pt-5 pb-8">
                <div class="nav d-flex gap-8 fs-4 fw-semibold mb-8">
                    <button @click="activeTab = 'general'" 
                        :class="{'fw-bolder': activeTab === 'general'}"
                        class="btn btn-clear px-0 pb-4 text-gray-800 hover:text-gray-700">
                
                        General Settings
                    </button>
                    <button @click="activeTab = 'logos'" 
                        :class="{'fw-bolder': activeTab === 'logos'}"
                        class="btn btn-clear px-0 pb-4 text-gray-800 hover:text-gray-700">
                   
                        Logo Settings
                    </button>
                    <button @click="activeTab = 'localization'"
                        :class="{'fw-bolder': activeTab === 'localization'}"
                        class="btn btn-clear px-0 pb-4 text-gray-800 hover:text-gray-700">
                      
                        Localization
                    </button>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div x-show="activeTab === 'general'" class="tab-pane fade show active" role="tabpanel">
                        <form wire:submit.prevent="saveGeneralSettings" class="form">
                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Business Name</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">The name of your business as it appears everywhere</div>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" class="form-control form-control-sm" wire:model="businessName" placeholder="Enter business name">
                                    @error('businessName') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Business Email</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Primary contact email for your business</div>
                                </div>
                                <div class="col-xl-8">
                                    <input type="email" class="form-control form-control-sm" wire:model="businessEmail" placeholder="Enter business email">
                                    @error('businessEmail') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Business Phone</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Primary contact phone number</div>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" class="form-control form-control-sm" wire:model="businessPhone" placeholder="Enter business phone">
                                    @error('businessPhone') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Business Address</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Physical location of your business</div>
                                </div>
                                <div class="col-xl-8">
                                    <textarea class="form-control form-control-lg" rows="3" wire:model="businessAddress" placeholder="Enter business address"></textarea>
                                    @error('businessAddress') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm">
                                    <span class="indicator-label">Save General Settings</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div x-show="activeTab === 'logos'" class="tab-pane fade show active" role="tabpanel">
                        <form class="form">
                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Light Logo</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Logo used in light mode</div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="d-flex flex-column gap-5">
                                        @if($lightLogo)
                                            <div class="bg-light rounded p-5 d-inline-block">
                                                <img src="{{ Storage::url($lightLogo) }}" alt="Light Logo" class="mw-200px">
                                            </div>
                                        @endif
                                        <div class="d-flex flex-column gap-2">
                                            <input type="file" class="form-control form-control-sm" wire:model="tempLightLogo" accept="image/*">
                                            @error('tempLightLogo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                            <div class="text-muted fs-7">Allowed file types: png, jpg, jpeg. Max size: 2MB</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Dark Logo</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Logo used in dark mode</div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="d-flex flex-column gap-5">
                                        @if($darkLogo)
                                            <div class="bg-dark rounded p-5 d-inline-block">
                                                <img src="{{ Storage::url($darkLogo) }}" alt="Dark Logo" class="mw-200px">
                                            </div>
                                        @endif
                                        <div class="d-flex flex-column gap-2">
                                            <input type="file" class="form-control form-control-sm" wire:model="tempDarkLogo" accept="image/*">
                                            @error('tempDarkLogo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                            <div class="text-muted fs-7">Allowed file types: png, jpg, jpeg. Max size: 2MB</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div x-show="activeTab === 'localization'" class="tab-pane fade show active" role="tabpanel">
                        <form wire:submit.prevent="saveLocalizationSettings" class="form">
                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Timezone</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Select your business timezone</div>
                                </div>
                                <div class="col-xl-8">
                                    <select class="form-select form-select-sm" wire:model="timezone">
                                        <option value="UTC">UTC</option>
                                        <option value="Asia/Yangon">Asia/Yangon</option>
                                    </select>
                                    @error('timezone') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Date Format</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Choose how dates are displayed</div>
                                </div>
                                <div class="col-xl-8">
                                    <select class="form-select form-select-sm" wire:model="dateFormat">
                                        <option value="Y-m-d">YYYY-MM-DD</option>
                                        <option value="d/m/Y">DD/MM/YYYY</option>
                                        <option value="m/d/Y">MM/DD/YYYY</option>
                                    </select>
                                    @error('dateFormat') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Currency Symbol</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Symbol used for monetary values</div>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" class="form-control form-control-sm" wire:model="currencySymbol" placeholder="Enter currency symbol">
                                    @error('currencySymbol') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-xl-4">
                                    <label class="fs-6 fw-semibold">Default Language</label>
                                    <div class="fs-7 fw-normal text-gray-600 mt-1">Primary language for the application</div>
                                </div>
                                <div class="col-xl-8">
                                    <select class="form-select form-select-sm" wire:model="defaultLanguage">
                                        <option value="en">English</option>
                                        <option value="mm">Myanmar</option>
                                        <option value="sm_mm">Shan-Myanmar</option>
                                    </select>
                                    @error('defaultLanguage') <div class="invalid-feedback d-block mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm">
                                    <span class="indicator-label">Save Localization Settings</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Content container-->