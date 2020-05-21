<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <button
                style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;"
                type="button" id="kt_sweetalert_demo_81" href="index.php">

            </button>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
                id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item  " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">

                        <?php

                            $link = $_SERVER['PHP_SELF'];
                            $link_array = explode('/',$link);
                            $page = end($link_array);

                            if ($page == "change_weight.php") { ?>

                        <button
                            style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;"
                            type="button">

                        </button>

                        <?php }else{ ?>
                        <button
                            style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;"
                            type="button" id="kt_sweetalert_demo_8" href="index.php">

                        </button>
                        <?php   } ?>


                    </div>
                </div>



                <!-- end:: Aside -->

                <!-- begin:: Aside Menu -->


                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                            class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu"
                            class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-tab ">
                            <ul class="kt-menu__nav ">

                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><span
                                        style="font-size: 20px;font-family: 'Fira Code'" class="kt-menu__link-text">Code
                                        Cultivator - A Code Complexity Tool</span></li>


                            </ul>


                        </div>
                    </div>

                    <!-- end: Header Menu -->


                </div>

                <!-- end:: Header -->