<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Dashboard | RMK</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin_template/assets/images/favicon.ico')}}">

        <!-- Plugins css -->
        <link href="{{asset('admin_template/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
         <!-- third party css -->
        <link href="{{asset('admin_template/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin_template/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{asset('admin_template/assets/css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{asset('admin_template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{asset('admin_template/assets/css/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="{{asset('admin_template/assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
        <link href="{{asset('admin_template/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- icons -->
        <link href="{{asset('admin_template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        {{-- style umum --}}
        <link href="{{asset('css/styleumum.css')}}" rel="stylesheet">
    </head>

    <body data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>
     <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="d-none d-lg-block">
                            <form class="app-search">
                                <div class="app-search-box dropdown">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                        <!-- item-->
                                        <div class="dropdown-header noti-title">
                                            <h5 class="text-overflow mb-2">Found 22 results</h5>
                                        </div>
            
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-home mr-1"></i>
                                            <span>Analytics Report</span>
                                        </a>
            
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-aperture mr-1"></i>
                                            <span>How can I help you?</span>
                                        </a>
                            
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-settings mr-1"></i>
                                            <span>User profile settings</span>
                                        </a>
            
                                    </div>  
                                </div>
                            </form>
                        </li>
    
                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
    
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>
            
                        {{-- Start Notification --}}
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>
    
                                <div class="noti-scroll" data-simplebar>
    
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="{{asset('admin_template/assets/images/users/user-1.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>
    
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>
    
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="{{asset('admin_template/assets/images/users/user-4.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>
    
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>
    
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>
    
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>
    
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>
    
                            </div>
                        </li>
                        {{-- End Notification --}}
    
                        {{-- Start Avatar/Profile --}}
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('admin_template/assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    Geneva <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </li>
                        {{-- End Avatar/Profile --}}
    
                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('images/logo/logoMinartaMini.png')}}" alt="" height="24">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                {{-- <img src="{{asset('admin_template/assets/images/logo-dark.png')}}" alt="" height="20"> --}}
                                <img src="{{asset('images/logo/logoMinarta.png')}}" alt="" height="30">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
    
                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset('images/logo/logoMinartaMini.png')}}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('images/logo/logoMinarta.png')}}" alt="" height="30">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            {{-- start topnav --}}
            <div class="topnav shadow-lg">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link arrow-none" href="{{route('dashboard')}}" id="topnav-dashboard" >
                                        <i class="fe-airplay mr-1"></i> Dashboard
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe-grid mr-1"></i> Data <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                        <a href="{{route('laptops')}}" class="dropdown-item"><i class="fe-monitor mr-1"></i> Laptops</a>
                                        <a href="{{route('computers')}}" class="dropdown-item"><i class="fe-monitor mr-1"></i> PC/Computer</a>
                                        <a href="{{route('equip_computer')}}" class="dropdown-item"><i class="fe-monitor mr-1"></i> Equip Device</a>
                                        <a href="{{route('users')}}" class="dropdown-item"><i class="fe-users mr-1"></i> Users</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="basicdata-icon"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-cpu mr-1"></i> Basic Data <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="basicdata-icon">
                                                <a href="{{route('positions')}}" class="dropdown-item">Position</a>
                                                <a href="{{route('jobs')}}" class="dropdown-item">Job</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe-layers mr-1"></i> Components <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-extendedui"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-pocket mr-1"></i> Extended UI <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-extendedui">
                                                <a href="extended-nestable.html" class="dropdown-item">Nestable List</a>
                                                <a href="extended-range-slider.html" class="dropdown-item">Range Slider</a>
                                                <a href="extended-dragula.html" class="dropdown-item">Dragula</a>
                                                <a href="extended-animation.html" class="dropdown-item">Animation</a>
                                                <a href="extended-sweet-alert.html" class="dropdown-item">Sweet Alert</a>
                                                <a href="extended-tour.html" class="dropdown-item">Tour Page</a>
                                                <a href="extended-scrollspy.html" class="dropdown-item">Scrollspy</a>
                                                <a href="extended-loading-buttons.html" class="dropdown-item">Loading Buttons</a>
                                            </div>
                                        </div>
                                        <a href="widgets.html" class="dropdown-item"><i class="fe-gift mr-1"></i> Widgets</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-bookmark mr-1"></i> Forms <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                <a href="forms-elements.html" class="dropdown-item">General Elements</a>
                                                <a href="forms-advanced.html" class="dropdown-item">Advanced</a>
                                                <a href="forms-validation.html" class="dropdown-item">Validation</a>
                                                <a href="forms-pickers.html" class="dropdown-item">Pickers</a>
                                                <a href="forms-wizard.html" class="dropdown-item">Wizard</a>
                                                <a href="forms-masks.html" class="dropdown-item">Masks</a>
                                                <a href="forms-summernote.html" class="dropdown-item">Summernote</a>
                                                <a href="forms-quilljs.html" class="dropdown-item">Quilljs Editor</a>
                                                <a href="forms-file-uploads.html" class="dropdown-item">File Uploads</a>
                                                <a href="forms-x-editable.html" class="dropdown-item">X Editable</a>
                                                <a href="forms-image-crop.html" class="dropdown-item">Image Crop</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-bar-chart-2 mr-1"></i> Charts <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                                <a href="charts-apex.html" class="dropdown-item">Apex Charts</a>
                                                <a href="charts-flot.html" class="dropdown-item">Flot Charts</a>
                                                <a href="charts-morris.html" class="dropdown-item">Morris Charts</a>
                                                <a href="charts-chartjs.html" class="dropdown-item">Chartjs Charts</a>
                                                <a href="charts-peity.html" class="dropdown-item">Peity Charts</a>
                                                <a href="charts-chartist.html" class="dropdown-item">Chartist Charts</a>
                                                <a href="charts-c3.html" class="dropdown-item">C3 Charts</a>
                                                <a href="charts-sparklines.html" class="dropdown-item">Sparklines Charts</a>
                                                <a href="charts-knob.html" class="dropdown-item">Jquery Knob Charts</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-grid mr-1"></i> Tables <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                <a href="tables-basic.html" class="dropdown-item">Basic Tables</a>
                                                <a href="tables-datatables.html" class="dropdown-item">Data Tables</a>
                                                <a href="tables-editable.html" class="dropdown-item">Editable Tables</a>
                                                <a href="tables-responsive.html" class="dropdown-item">Responsive Tables</a>
                                                <a href="tables-footables.html" class="dropdown-item">FooTable</a>
                                                <a href="tables-bootstrap.html" class="dropdown-item">Bootstrap Tables</a>
                                                <a href="tables-tablesaw.html" class="dropdown-item">Tablesaw Tables</a>
                                                <a href="tables-jsgrid.html" class="dropdown-item">JsGrid Tables</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icons"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-cpu mr-1"></i> Icons <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                                <a href="icons-two-tone.html" class="dropdown-item">Two Tone Icons</a>
                                                <a href="icons-feather.html" class="dropdown-item">Feather Icons</a>
                                                <a href="icons-mdi.html" class="dropdown-item">Material Design Icons</a>
                                                <a href="icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                                <a href="icons-font-awesome.html" class="dropdown-item">Font Awesome 5</a>
                                                <a href="icons-themify.html" class="dropdown-item">Themify</a>
                                                <a href="icons-simple-line.html" class="dropdown-item">Simple Line</a>
                                                <a href="icons-weather.html" class="dropdown-item">Weather</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-map"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-map mr-1"></i> Maps <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-map">
                                                <a href="maps-google.html" class="dropdown-item">Google Maps</a>
                                                <a href="maps-vector.html" class="dropdown-item">Vector Maps</a>
                                                <a href="maps-mapael.html" class="dropdown-item">Mapael Maps</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ui" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe-settings mr-1"></i> Tools <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ui">
                                        <a href="{{route('scanqr')}}" class="dropdown-item"><i class="mdi mdi-qrcode-scan mr-1"></i> Scan QR</a>
                                        <a href="{{route('laptops')}}" class="dropdown-item"><i class="mdi mdi-key-outline mr-1"></i> Change Password</a>
                                    </div>
                                </li>
                            </ul> <!-- end navbar-->
                        </div> <!-- end .collapsed-->
                    </nav>
                </div> <!-- end container-fluid -->
            </div> 
            <!-- end topnav-->
            
            {{-- MAIN PAGE --}}
            {{$slot}}
            {{-- MAIN PAGE --}}
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
    
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-2" data-toggle="tab" href="#chat-tab" role="tab">
                            <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2" data-toggle="tab" href="#tasks-tab" role="tab">
                            <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-0">
                    <div class="tab-pane" id="chat-tab" role="tabpanel">
                
                        <form class="search-bar p-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>

                        <h6 class="font-weight-medium px-3 mt-2 text-uppercase">Group Chats</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                                <span class="mb-0 mt-1">App Development</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                                <span class="mb-0 mt-1">Office Work</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                                <span class="mb-0 mt-1">Personal Group</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                <span class="mb-0 mt-1">Freelance</span>
                            </a>
                        </div>

                        <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Favourites <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-right mdi mdi-plus-circle"></i></a></h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-10.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Andrew Mackie</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-1.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status away"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Rory Dalyell</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-9.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status busy"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Jaxon Dunhill</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h6 class="font-weight-medium px-3 mt-3 text-uppercase">Other Chats <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-right mdi mdi-plus-circle"></i></a></h6>

                        <div class="p-2 pb-4">
                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-2.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Jackson Therry</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-4.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status away"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Charles Deakin</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-5.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Ryan Salting</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">If several languages coalesce the grammar of the resulting.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-6.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status online"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Sean Howse</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-7.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status busy"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Dean Coward</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item">
                                <div class="media">
                                    <div class="position-relative mr-2">
                                        <img src="{{asset('admin_template/assets/images/users/user-8.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic">
                                        <i class="mdi mdi-circle user-status away"></i>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h6 class="mt-0 mb-1 font-14">Hayley East</h6>
                                        <div class="font-13 text-muted">
                                            <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <div class="text-center mt-3">
                                <a href="javascript:void(0);" class="btn btn-sm btn-white">
                                    <i class="mdi mdi-spin mdi-loading mr-2"></i>
                                    Load more
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="tasks-tab" role="tabpanel">
                        <h6 class="font-weight-medium p-3 m-0 text-uppercase">Working Tasks</h6>
                        <div class="px-2">
                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>
                        </div>

                        <h6 class="font-weight-medium px-3 mb-0 mt-4 text-uppercase">Upcoming Tasks</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>
                        </div>

                        <div class="p-3 mt-2">
                            <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create Task</a>
                        </div>

                    </div>
                    <div class="tab-pane active" id="settings-tab" role="tabpanel">
                        <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">Theme Settings</span>
                        </h6>

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                            </div>

                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                                    id="light-mode-check" checked />
                                <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                                    id="dark-mode-check" />
                                <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                                <label class="custom-control-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                                <label class="custom-control-label" for="boxed-check">Boxed</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Layout Positon</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="menus-position" value="fixed" id="fixed-check"
                                    checked />
                                <label class="custom-control-label" for="fixed-check">Fixed</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="menus-position" value="scrollable"
                                    id="scrollable-check" />
                                <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                            </div>

                            <!-- Topbar -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="topbar-color" value="dark" id="darktopbar-check"
                                    checked />
                                <label class="custom-control-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="custom-control-label" for="lighttopbar-check">Light</label>
                            </div>


                            <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

                            <a href="https://1.envato.market/uboldadmin"
                                class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-basket mr-1"></i> Purchase Now</a>

                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{asset('admin_template/assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('admin_template/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{asset('admin_template/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/mohithg-switchery/switchery.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
        <script src="{{asset('admin_template/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
        <!-- third party js ends -->
        <script src="{{asset('admin_template/assets/js/pages/materialdesign.init.js')}}"></script>
        <!-- Datatables init -->
        <script src="{{asset('admin_template/assets/js/pages/datatables.init.js')}}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{asset('admin_template/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- App js-->
        <script src="{{asset('admin_template/assets/js/app.min.js')}}"></script>
        <!-- QR reader -->
        <script src="{{asset('js/qr-reader.js')}}"></script>
        <!-- Apex Charts JS -->
        <script src="{{asset('admin_template/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
        
        

        @if(isset($customjs))
            <script src="{{asset('js/'.$customjs)}}"></script>
        @endif 
    </body>
    
</html>