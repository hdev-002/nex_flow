<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <base href="../../../" />
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://google.com" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('metronic/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

    <style>
        @media (min-width: 992px) {
            .custom-bg-primary{
                background-color: #f1f1f4 !important;
            }
            .custom-pd {
                -webkit-padding-start: calc(16.25rem + calc(1rem * 1)); padding-inline-start: calc(16.25rem + calc(1rem * 1));
            }

            .custom-header{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: calc(4rem * 1);
                z-index: 1000;
                inset-inline: 0;
            }

            .custom-sidebar{
                position: fixed;
                top: calc(4rem * 1);
                /*left: 0;*/
                height: calc(100dvh - 0px);
                z-index: calc(100 + 1);
                width: calc(20rem * 1);
                overflow: auto;
                border-radius: 0;
                padding-left: 25px;
            }

            .custom-padding-left-0{
                padding-left: 0 !important;
            }
        }
    </style>
    @stack('styles')
    <!-- Styles -->
    @livewireStyles
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body"  data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default custom-bg-primary">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid bg-gray-200" id="kt_app_page">
        @if($hasHeader)
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header border-bottom border-gray-400 custom-header">
            <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between p-sm-0" id="kt_app_header_container">
                    <!--begin::Header logo-->
                    <div class="app-header-logo d-flex align-items-center me-lg-9">
                        <!--begin::Mobile toggle-->
                        {{--                    <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px ms-n2 me-2 d-flex d-lg-none" id="kt_app_header_menu_toggle">--}}
                        {{--                        <i class="ki-outline ki-abstract-14 fs-1"></i>--}}
                        {{--                    </div>--}}
                        <!--end::Mobile toggle-->
                        <!--begin::Logo image-->
                        <a href="index.html">
                            <span class="fw-bolder text-dark fs-2qx">NexFlow</span>
{{--                            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/demo44.svg') }}" class="h-25px theme-light-show" />--}}
{{--                            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/demo44-dark.svg') }}" class="h-25px theme-dark-show" />--}}
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Header logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                        <!--begin::Menu wrapper-->
                        <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                            <!--begin::Menu holder-->
                            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}">
                                <!--begin::Menu-->
                                <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-600 menu-state-gray-900 menu-arrow-gray-500 fw-semibold fw-semibold fs-6 align-items-stretch my-5 my-lg-0 px-2 px-lg-0" id="#kt_app_header_menu" data-kt-menu="true">
                                    <!--begin:Menu item-->

                                    <!--end:Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Menu holder-->
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-lg-4" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    {{--                                <img class="symbol symbol-35px symbol-md-40px" src="assets/media/avatars/300-5.jpg" alt="users" />--}}
                                    <div class="symbol-label fs-3 text-primary-emphasis border border-gray-300">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5 bg-primary">
                                                <div class="symbol-label fs-3 text-primary-emphasis ">
                                                    {{ substr(Auth::user()->name, 0, 1) }}
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5"> {{ Auth::user()->name }}
                                                </div>
                                                <span class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</span>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="{{ route('profile.show') }}"  class="menu-link px-5">Profile</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="{{ route('api-tokens.index') }}"  class="menu-link px-5">API Token</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Mode
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
													<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
												</span></span>
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-outline ki-night-day fs-2"></i>
														</span>
                                                    <span class="menu-title">Light</span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-outline ki-moon fs-2"></i>
														</span>
                                                    <span class="menu-title">Dark</span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-0">
                                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-outline ki-screen fs-2"></i>
														</span>
                                                    <span class="menu-title">System</span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    @php
                                        $currentLocal =  Session::get('locale', config('app.locale'));
                                    @endphp
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Language
												<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                                        @if($currentLocal == 'mm')
                                                        မြန်မာ
                                                    @elseif($currentLocal == 'en')
                                                        English
                                                    @elseif($currentLocal == 'sm_mm')
                                                        Smart Burmese
                                            @else

                                            @endif
                                            {{--												<img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>--}}
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('change.language', 'en') }}" class="menu-link d-flex px-5 {{$currentLocal == 'en' ? 'active' : ''}}">
													<span class="symbol symbol-20px me-4">
{{--														<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />--}}
													</span>English</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('change.language', 'sm_mm') }}" class="menu-link d-flex px-5 {{$currentLocal == 'sm_mm' ? 'active' : ''}}">
													<span class="symbol symbol-20px me-4">
{{--														<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />--}}
													</span>Smart Burmese</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('change.language', 'mm') }}" class="menu-link d-flex px-5 {{$currentLocal == 'mm' ? 'active' : ''}}">
													<span class="symbol symbol-20px me-4">
{{--														<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />--}}
													</span>မြန်မာ</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>

                                        <a href="#"  class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Log Out') }}
                                        </a>

                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Sidebar menu toggle-->
                            <div class="app-navbar-item d-flex align-items-center d-lg-none ms-1 me-n2">
                                <a href="#" class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                                    <i class="ki-outline ki-burger-menu-2 fs-1"></i>
                                </a>
                            </div>
                            <!--end::Sidebar menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
        @endif
        <!--begin::Wrapper-->
        <div class="app-wrapper d-flex mt-20" id="kt_app_wrapper">
            <!--begin::Wrapper container-->
            <div class="app-container container-fluid d-flex custom-padding-left-0">
                @if($hasSidebar && $navigationItems)
                    <!--begin::Sidebar-->
                    <div id="kt_app_sidebar"
                         class="app-sidebar flex-column border-gray-300 border-top-0 border-left-0 border-bottom-0 border border-right custom-sidebar"
                         data-kt-drawer="true"
                         data-kt-drawer-name="app-sidebar"
                         data-kt-drawer-activate="{default: true, lg: false}"
                         data-kt-drawer-overlay="true"
                         data-kt-drawer-width="auto"
                         data-kt-drawer-direction="end"
                         data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

                    <!--begin::Sidebar secondary menu-->
                        <div id="kt_app_sidebar_menu" data-kt-menu="true" class="menu menu-sub-indention menu-rounded  menu-active-bg menu-title-gray-600 menu-icon-gray-500 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 ms-lg-n7 px-2 px-lg-0">
                            <div id="kt_app_sidebar_menu_wrapper" class=" px-1 px-lg-5" wire:scroll >
                                <!--end:Menu item-->
{{--                                <!--begin:Menu item-->--}}
{{--                                <div class="menu-item">--}}
{{--                                    <!--begin:Menu content-->--}}
{{--                                    <div class="menu-content">--}}
{{--                                        <span class="menu-section fs-5 fw-bolder ps-1 py-1">Navigations</span>--}}
{{--                                    </div>--}}
{{--                                    <!--end:Menu content-->--}}
{{--                                </div>--}}
{{--                                <!--end:Menu item-->--}}
                                @forelse($navigationItems as $key=>$item)
                                    @if (!empty($item['children']))
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion  {{ collect($item['children'])->contains(fn($child) => request()->routeIs($child['route_name'])) ? 'show' : '' }}">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                            @if($item['icon'])
                                                    <span class="menu-icon">
                                                    {!! $item['icon'] !!}
                                                </span>
                                                @endif
											<span class="menu-title text-gray-900">   {{ $item['name'] }} </span>
											<span class="menu-arrow"></span>
										</span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                @foreach ($item['children'] as $child)
                                                    @if(Illuminate\Support\Facades\Route::has($child['route_name']))
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link {{ request()->routeIs($child['route_name']) ? 'active' : '' }}" href="{{ route($child['route_name']) }}" >
                                                    <span class="menu-bullet">
														<span class="bullet bullet-dot text-gray-900"></span>
													</span>
                                                                <span class="menu-title text-gray-900   ">{{ $child['name'] }}</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    @endif
                                                @endforeach
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                    @else
                                        @if(Illuminate\Support\Facades\Route::has($item['route_name']))
                                            <!--begin:Menu item-->
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link {{ request()->routeIs($item['route_name']) ? 'active' : '' }}"  href="{{ route($item['route_name']) }}" >
                                                    @if($item['icon'])
                                                        <span class="menu-icon text-gray-900">
                                                    {!! $item['icon'] !!}
                                                </span>
                                                    @endif
                                                    <span class="menu-title text-gray-900">{{ $item['name'] }}</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->
                                        @endif
                                    @endif
                                @empty
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                    <span class="menu-link">
                                        <span class="menu-title text-danger-emphasis">No Navigation</span>
                                    </span>
                                    </div>
                                    <!--end:Menu item-->
                                @endforelse



                            </div>
                        </div>
                        <!--end::Sidebar secondary menu-->
                    </div>
                    <!--end::Sidebar-->
                @endif
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid custom-pd">
                        <div class="d-block d-md-flex flex-column-fluid flex-lg-row-auto justify-content-center pt-5 m-0">
                        <!--begin::Content-->
                        {{ $slot }}
                        <!--end::Content-->
                        </div>
                    </div>
                    <!--end::Content wrapper-->

                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true" wire:scroll>
    <i class="ki-outline ki-arrow-up"></i>
</div>
<!--end::Scrolltop-->
<!--begin::Modals-->
@stack('modals')
<!--end::Modals-->
<!--begin::Javascript-->

<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
{{--<script src="{{ asset('metronic/assets/js/custom/apps/users-management/users/list/table.js') }}"></script>--}}
{{--<script src="{{ asset('metronic/assets/js/custom/apps/users-management/users/list/export-users.js') }}"></script>--}}
{{--<script src="{{ asset('metronic/assets/js/custom/apps/users-management/users/list/add.js') }}"></script>--}}
<script src="{{ asset('metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->

@stack('scripts')
@livewireScripts

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

</script>


@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

@if(session('info'))
    <script>
        toastr.info("{{ session('info') }}");
    </script>
@endif

@if(session('warning'))
    <script>
        toastr.warning("{{ session('warning') }}");
    </script>
@endif

@include('js.shortcut')
<script src="https://cdn.jsdelivr.net/npm/livewire-v3/dist/livewire.min.js"></script>


</body>
<!--end::Body-->
</html>
