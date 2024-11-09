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
    <meta property="og:url" content="https://keenthemes.com/metronic" />
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

    <!-- Styles -->
    @livewireStyles
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @if($hasHeader)
        <!--begin::Header-->
        <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
            <!--begin::Header container-->
            <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                <!--begin::Header logo-->
                <div class="app-header-logo d-flex align-items-center me-lg-9">
                    <!--begin::Mobile toggle-->
{{--                    <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px ms-n2 me-2 d-flex d-lg-none" id="kt_app_header_menu_toggle">--}}
{{--                        <i class="ki-outline ki-abstract-14 fs-1"></i>--}}
{{--                    </div>--}}
                    <!--end::Mobile toggle-->
                    <!--begin::Logo image-->
                    <a href="index.html">
                        <img alt="Logo" src="{{ asset('metronic/assets/media/logos/demo44.svg') }}" class="h-25px theme-light-show" />
                        <img alt="Logo" src="{{ asset('metronic/assets/media/logos/demo44-dark.svg') }}" class="h-25px theme-dark-show" />
                    </a>
                    <!--end::Logo image-->
                </div>
                <!--end::Header logo-->
                <!--begin::Header wrapper-->
                <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                    <!--begin::Menu wrapper-->
                    <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                        <!--begin::Menu holder-->
{{--                       Removed--}}
                        <!--end::Menu holder-->
                    </div>
                    <!--end::Menu wrapper-->
                    <!--begin::Navbar-->
                    <div class="app-navbar flex-shrink-0">
                        <!--begin::Action-->
{{--                        <div class="app-navbar-item">--}}
{{--                            <a href="#" class="btn btn-flex flex-center btn-sm fw-bold btn-dark py-3 w-40px h-40px w-md-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">--}}
{{--                                <i class="ki-outline ki-verify d-inline-flex d-md-none fs-2 p-0 m-0"></i>--}}
{{--                                <span class="d-none d-md-inline ps-lg-1">Upgrade Plan</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <!--end::Action-->

                        <!--begin::User menu-->
                        <div class="app-navbar-item ms-1 ms-lg-4" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
{{--                                <img class="symbol symbol-35px symbol-md-40px" src="assets/media/avatars/300-5.jpg" alt="user" />--}}
                                <div class="symbol-label fs-3 text-primary-emphasis">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </div>
                            <!--begin::User account menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5 bg-primary-subtle">
                                            <div class="symbol-label fs-3 text-primary-emphasis">
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
                                    <a href="{{ route('profile.show') }}" wire:navigate class="menu-link px-5">Profile</a>
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
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Language
												<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
												<img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="account/settings.html" class="menu-link d-flex px-5 active">
													<span class="symbol symbol-20px me-4">
														<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
													</span>English</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="account/settings.html" class="menu-link d-flex px-5">
													<span class="symbol symbol-20px me-4">
														<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
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

                                    <a href="#" wire:navigate class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
        <div class="app-wrapper d-flex" id="kt_app_wrapper">
            <!--begin::Wrapper container-->
            <div class="app-container container-fluid d-flex">
                @if($hasSidebar)
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Sidebar secondary menu-->
                    <div id="kt_app_sidebar_menu" data-kt-menu="true" class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-500 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 ms-lg-n7 px-2 px-lg-0">
                        <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-y px-1 px-lg-5" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky" data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-release="#kt_app_stats" data-kt-sticky-width="250px" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header, #kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="20px">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu content-->
                                <div class="menu-content">
                                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Apps</span>
                                </div>
                                <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->


                            @foreach($navigationItems as $item)
                                {{--                            @if($item->children->isNotEmpty()) data-toggle="collapse" @endif--}}
                                @if($item->children->isNotEmpty())
                                    <!--begin:Menu item-->
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <!--begin:Menu link-->
                                        <span class="menu-link">
											<span class="menu-icon">
                                              @if($item->icon)
                                                    <img src="{{ asset('icons/' . $item->icon) }}" alt="{{ $item->name }} icon">
                                                @else
                                                    <i class="ki-outline ki-rocket fs-2"></i>
                                                @endif
											</span>
											<span class="menu-title">   {{ $item->name }} </span>
											<span class="menu-arrow"></span>
										</span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            @foreach($item->children as $child)
                                                @if(Illuminate\Support\Facades\Route::has($child->route_name ))
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="{{ route($child->route_name) }}" wire:navigate>
                                                    <span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
                                                        <span class="menu-title">    {{ $child->name }} </span>
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
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="{{ $item->url ?? '#' }}">
											<span class="menu-icon">
												<i class="ki-outline ki-calendar-8 fs-2"></i>
											</span>
                                            <span class="menu-title">{{ $item->name }}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                @endif
                            @endforeach



                        </div>
                    </div>
                    <!--end::Sidebar secondary menu-->
                </div>
                <!--end::Sidebar-->
                @endif
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        @if($hasToolbar)
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
                            <!--begin::Toolbar wrapper-->
                            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                    <!--begin::Breadcrumb-->
                                    @php
                                        $breadcrumbs = generateBreadcrumbsFromUri() ?? []; // Default to empty array if null
                                    @endphp
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                                        @foreach($breadcrumbs as $index => $breadcrumb)
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                                            @if($index !== count($breadcrumbs) - 1)
                                                <a href="{{ $breadcrumb['url'] }}" class="text-gray-700">{{ $breadcrumb['name'] }}</a>
                                            @else
                                                <span class="text-gray-500">{{ $breadcrumb['name'] }}</span>
                                            @endif
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        @if($index !== count($breadcrumbs) - 1)
                                            <li class="breadcrumb-item">
                                                <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                                            </li>
                                        @endif
                                        <!--end::Item-->
                                        @endforeach
                                    </ul>
                                    <!--end::Breadcrumb-->
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                                        {{ generatePageTitle() }}
                                    </h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <a href="#" class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-light h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">History</a>
                                    <a href="#" class="btn btn-sm btn-flex btn-secondary align-self-center px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                        <i class="ki-outline ki-plus-square fs-3"></i>Invite</a>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Toolbar-->
                        @endif
                        <!--begin::Content-->
                        {{ $slot }}
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <!--begin::Copyright-->
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2024&copy;</span>
                            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">HDev O2</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Footer-->
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
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
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
<script src="{{ asset('metronic/assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
<script src="{{ asset('metronic/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('metronic/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->

@livewireScripts
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
