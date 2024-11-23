<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Card-->
    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
         style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/media/illustrations/sketchy-1/4.png')">
        <!--begin::Card header-->
        <div class="card-header pt-10">
            <div class="d-flex align-items-center">
                <!--begin::Icon-->
                <div class="symbol symbol-circle me-5">
                    <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                        <i class="ki-outline ki-abstract-47 fs-2x text-primary"></i>
                    </div>
                </div>
                <!--end::Icon-->
                <!--begin::Title-->
                <div class="d-flex flex-column">
                    <h2 class="mb-1">Applications Manager</h2>
                    <div class="text-muted fw-bold">
                        <span class="mx-3">2.6 GB</span>
                        <span class="mx-3">|</span>758 items
                    </div>
                </div>
                <!--end::Title-->
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pb-0">

        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Card-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header pt-8">
                @if ($statusMessage)
                    <div class="alert alert-info">{{ $statusMessage }}</div>
                @endif
            <div class="card-title">
                <!--begin::Search-->
{{--                <div class="d-flex align-items-center position-relative my-1">--}}
{{--                    <i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>--}}
{{--                    <input type="text" data-kt-filemanager-table-filter="search"--}}
{{--                           class="form-control form-control-solid w-250px ps-15"--}}
{{--                           placeholder="Search Files &amp; Folders">--}}
{{--                </div>--}}
                <!--end::Search-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-flex btn-primary" wire:click="showUploadModal">
                        <i class="ki-outline ki-folder-up fs-2"></i>Import App
                    </button>

                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none"
                     data-kt-filemanager-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">
                        Delete Selected
                    </button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Table header-->
            <div class="d-flex flex-stack">
                <!--begin::Folder path-->
                <div class="">

                </div>
                <!--end::Folder path-->
                <!--begin::Folder Stats-->
                <div class="badge badge-lg badge-primary">
                    <span id="kt_file_manager_items_counter">82 items</span>
                </div>
                <!--end::Folder Stats-->
            </div>
            <!--end::Table header-->
            <!--begin::Table-->
            <div id="kt_file_manager_list_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div id="" class="table-responsive">
                    <div class="dt-scroll">
                        <div class="dt-scroll-head"
                             style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                            <div class="dt-scroll-headInner"
                                 style="box-sizing: content-box; width: 1089.5px; padding-right: 5px;">
                                <table data-kt-filemanager-table="folders"
                                       class="table align-middle table-row-dashed fs-6 gy-5 dataTable"
                                       style="margin-left: 0px; width: 1089.5px;">
                                    <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0" role="row">
                                        <th class="min-w-250px dt-orderable-none" data-dt-column="1" rowspan="1"
                                            colspan="1"><span class="dt-column-title">Name</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="min-w-10px dt-orderable-none" data-dt-column="2" rowspan="1"
                                            colspan="1"><span class="dt-column-title">Size</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="min-w-125px dt-orderable-none" data-dt-column="3" rowspan="1"
                                            colspan="1"><span class="dt-column-title">Version</span><span
                                                class="dt-column-order"></span></th>
                                        <th class="w-125px dt-orderable-none" data-dt-column="4" rowspan="1"
                                            colspan="1"><span class="dt-column-title"></span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                    </thead>
                                    <colgroup>
                                        <col data-dt-column="0" style="width: 36.390625px;">
                                        <col data-dt-column="1" style="width: 481.515625px;">
                                        <col data-dt-column="2" style="width: 130.109375px;">
                                        <col data-dt-column="3" style="width: 316.515625px;">
                                        <col data-dt-column="4" style="width: 125px;">
                                    </colgroup>
                                </table>
                            </div>
                        </div>
                        <div class="dt-scroll-body" style="position: relative; overflow: auto; max-height: 700px;">
                            <table id="kt_file_manager_list" data-kt-filemanager-table="folders"
                                   class="table align-middle table-row-dashed fs-6 gy-5 dataTable"
                                   style="width: 1089.53125px;">
                                <colgroup>
                                    <col data-dt-column="0" style="width: 36.390625px;">
                                    <col data-dt-column="1" style="width: 481.515625px;">
                                    <col data-dt-column="2" style="width: 130.109375px;">
                                    <col data-dt-column="3" style="width: 316.515625px;">
                                    <col data-dt-column="4" style="width: 125px;">
                                </colgroup>
                                <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0" role="row">

                                    <th class="min-w-250px dt-orderable-none" data-dt-column="1" rowspan="1"
                                        colspan="1">
                                        <div class="dt-scroll-sizing"><span class="dt-column-title">Name</span><span
                                                class="dt-column-order"></span></div>
                                    </th>
                                    <th class="min-w-10px dt-orderable-none" data-dt-column="2" rowspan="1" colspan="1">
                                        <div class="dt-scroll-sizing"><span class="dt-column-title">Size</span><span
                                                class="dt-column-order"></span></div>
                                    </th>
                                    <th class="min-w-125px dt-orderable-none" data-dt-column="3" rowspan="1"
                                        colspan="1">
                                        <div class="dt-scroll-sizing"><span class="dt-column-title">Version</span><span
                                                class="dt-column-order"></span></div>
                                    </th>
                                    <th class="w-125px dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1">
                                        <div class="dt-scroll-sizing"><span class="dt-column-title"></span><span
                                                class="dt-column-order"></span></div>
                                    </th>
                                </tr>
                                </thead>

                                <tbody class="fw-semibold text-gray-600">


                                    @if(count($uploadedModules) > 0)
                                    @foreach ($uploadedModules as $module)

                                <tr>

                                    <td data-order="account">
                                        <div class="d-flex align-items-center">
																<span class="icon-wrapper">
																	<i class="ki-outline ki-folder fs-2x text-primary me-4"></i>
																</span>
                                            <a href="apps/file-manager/files/.html"
                                               class="text-gray-800 text-hover-primary">{{ $module }}</a>
                                        </div>
                                    </td>
                                    <td>{{ number_format($moduleSizes[$module] / 1024, 2) }} KB</td>
                                    <td data-order="Invalid date">v1.0.0</td>
                                    <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                        <div class="d-flex justify-content-end">
                                            <!--begin::More-->
                                            <div class="ms-2">
                                                <button type="button" wire:key="module-{{ $module }}"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">
                                                    <i class="ki-outline ki-dots-square fs-5 m-0"></i>
                                                </button>
                                                <!--begin::Menu-->
                                                <div  wire:key="module-{{ $module }}"
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                    data-kt-menu="true">
                                                    @if($installedModules[$module] ?? false)
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a wire:click="uninstallModule('{{ $module }}')" class="menu-link px-3">Uninstall</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    @else
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a wire:click="installModule('{{ $module }}')" class="menu-link px-3">Install</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    @endif
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a wire:click="upgradeModule('{{ $module }}')" class="menu-link px-3"
                                                           data-kt-filemanager-table="rename">Upgrade</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a wire:click="removeModule('{{ $module }}')" class="menu-link text-danger px-3"
                                                           data-kt-filemanager-table-filter="delete_row">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach
                                @else
                                    <p class="text-center my-6 text-gray-700">No uploaded applications found.</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="dt-scroll-foot" style="overflow: hidden; border: 0px; width: 100%;">
                            <div class="dt-scroll-footInner">
                                <table data-kt-filemanager-table="folders"
                                       class="table align-middle table-row-dashed fs-6 gy-5 dataTable"
                                       style="margin-left: 0px;">
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="" class="row">
                    <div id=""
                         class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                    <div id=""
                         class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                </div>
            </div>

            @if(!empty($conflicts))
                <h4>Conflicts Detected</h4>
                <ul>
                    @foreach($conflicts as $conflict)
                        <li>
                            {{ $conflict }} is missing module files.
                            <button wire:click="resolveConflict('{{ $conflict }}', 'delete')">Delete Entry</button>
                            <button wire:click="resolveConflict('{{ $conflict }}', 'ignore')">Ignore</button>
                        </li>
                    @endforeach
                </ul>
            @endif

            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->



    <!--begin::Modal - Upload File-->
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" aria-hidden="true" style="background: rgba(0,0,0,0.5);">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form wire:submit.prevent="uploadAndInstallModule">
                        <div class="modal-header">
                            <h2 class="fw-bold">Upload Applications File</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" wire:click="closeModal()">
                                <i class="ki-outline ki-cross fs-1"></i>
                            </div>
                        </div>
                        <div class="modal-body pt-10 pb-15 px-lg-17">
                            <div class="form-group">
                                <input type="file" id="moduleFile" wire:model="moduleFile" class="form-control">
                                <span class="form-text fs-6 text-muted">Max file size is 1MB per file.</span>
                                @error('moduleFile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" wire:click="closeModal()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    @endif
    <!--end::Modal - Upload File-->

</div>
