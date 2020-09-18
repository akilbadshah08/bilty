
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo WEBSITE_NAME ?> | <?php echo $page_title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for managed datatable samples" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url() ?>assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />

        <!--end::Web font -->
        <!--begin::Base Styles -->
        <link href="<?php echo base_url() ?>assets-2/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url() ?>assets-3/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
<!--      <link href="--><?php //echo base_url() ?><!--/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
      <link href="<?php echo base_url() ?>assets-2/demo/demo7/base/style.bundle.css" rel="stylesheet" type="text/css" />
    
     

        <link href="<?php echo base_url() ?>assets/layouts/layout4/css/custome_layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets-3/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets-2/demo/demo7/base/custom.css" rel="stylesheet" type="text/css" />

      
          <link href="<?php echo base_url() ?>assets-2/demo/demo7/base/style.bundle.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo base_url() ?>assets-2/demo/demo7/base/custom.css" rel="stylesheet" type="text/css" />
          

        <!--end::Base Styles -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets-2/demo/demo7/media/img/logo/favicon.ico" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        
        <script>
            window.is_admin = true;
        </script>
    </head>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
    <style type="text/css">
        .m-aside-left--minimize .m-aside-menu .m-menu__nav > .m-menu__item > .m-menu__link .m-menu__link-text 
        {
               /* display: table-footer-group !important;*/
             /*   font-size: inherit !important;*/
        }
        
        .m-aside-menu .m-menu__nav > .m-menu__item.m-menu__item--bottom-2 {
                position: absolute !important;
                bottom: 146px;

        }

        .m-aside-menu .m-menu__nav > .m-menu__item.m-menu__item--bottom-1 {
            position: absolute !important;
            bottom: auto;
           margin-top: 73px !important;
        }
        .m-aside-menu .m-menu__nav > .m-menu__item.m-menu__item--hover.m-menu__item--submenu-fullheight:not([data-menu-submenu-mode='accordion']) > .m-menu__submenu {
            position: absolute !important; 
        }

        .m-header-menu.m-header-menu--skin-light .m-menu__nav > .m-menu__item > .m-menu__link .m-menu__link-text {
                color: #676c7b;
                font-size: inherit;
            }
            .m-nav .m-nav__item > .m-nav__link .m-nav__link-title > .m-nav__link-wrap .m-nav__link-text {
               /* padding-right: 0.8rem;*/
                font-size: inherit;
            }
            .btn:not(:disabled):not(.disabled) {
             /*   cursor: pointer;*/
                font-size: inherit;
            }
            .m-menu__link-text{
                font-size: inherit !important;
                display: table-footer-group;
            }
            .m-brand--minimize .m-brand .m-brand__logo {
                display: block !important;
            }
        
  span#personal_aadhar_number-error {
      color: red;
  }
  span#personal_pan_number-error {
      color: red;
  }
  span#personal_email-error {
    color: red;
}
span#personal_mobile-error {
   color:red;
}
label#co_applicant_relation-error{
    color:red;
}
label#co_applicant_mobile-error{
    color:red;
}
label#co_applicant_pan_number-error{
    color:red;
}
label#co_applicant_aadhar_number-error
{
    color:red;
}
span#occupation_office_gst_number-error{
    color:red;
}
</style>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">
         <input type="hidden" id="site_url" value="<?php echo site_url() ?>">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- BEGIN: Header -->
            <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="#" class="m-brand__logo-wrapper">
                                        <img alt="" src="https://www.mokshafinance.com/application/libraries/timthumb.php?src=https://cdn3.shopvii.com/729/579/Moksha_Logo_1_Web.png&w=73&h=98&q=100&zc=3&a=tc"/>
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                    </a>
                                    <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
            <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <!-- BEGIN: Horizontal Menu -->
                            <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
                                <i class="la la-close"></i>
                            </button>
                            <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
                           
                            </div>
                            <!-- END: Horizontal Menu -->               
                <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-light" id="m_quicksearch" data-search-type="default">
                                    <!--BEGIN: Search Form -->
                                   <!--  <form class="m-header-search__form">
                                        <div class="m-header-search__wrapper">
                                            <span class="m-header-search__icon-search" id="m_quicksearch_search">
                                                <i class="flaticon-search"></i>
                                            </span>
                                            <span class="m-header-search__input-wrapper">
                                                <input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
                                            </span>
                                            <span class="m-header-search__icon-close" id="m_quicksearch_close">
                                                <i class="la la-remove"></i>
                                            </span>
                                            <span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
                                                <i class="la la-remove"></i>
                                            </span>
                                        </div>
                                    </form> -->
                                    <!--END: Search Form -->
    <!--BEGIN: Search Results -->
                                   <!--  <div class="m-dropdown__wrapper">
                                        <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__scrollable m-scrollable" data-max-height="300" data-mobile-max-height="200">
                                                    <div class="m-dropdown__content m-list-search m-list-search--skin-light"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--BEGIN: END Results -->
                                </div>
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                         <li class="m-nav__item m-topbar__notifications m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center  m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
                                        
                                          <!--   <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center">
                                                        <span class="m-dropdown__header-title">
                                                            9 New
                                                        </span>
                                                        <span class="m-dropdown__header-subtitle">
                                                            User Notifications
                                                        </span>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                                        Alerts
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
                                                                        Events
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
                                                                        Logs
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                                    <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                                                            <div class="m-list-timeline__items">
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        12 new users registered
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        Just now
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        System shutdown
                                                                                        <span class="m-badge m-badge--success m-badge--wide">
                                                                                            pending
                                                                                        </span>
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        14 mins
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        New invoice received
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        20 mins
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        DB overloaded 80%
                                                                                        <span class="m-badge m-badge--info m-badge--wide">
                                                                                            settled
                                                                                        </span>
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        1 hr
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        System error -
                                                                                        <a href="#" class="m-link">
                                                                                            Check
                                                                                        </a>
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        2 hrs
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span href="" class="m-list-timeline__text">
                                                                                        New order received
                                                                                        <span class="m-badge m-badge--danger m-badge--wide">
                                                                                            urgent
                                                                                        </span>
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        7 hrs
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        Production server down
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        3 hrs
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        Production server up
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        5 hrs
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                                    <div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                                                            <div class="m-list-timeline__items">
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                    <a href="" class="m-list-timeline__text">
                                                                                        New order received
                                                                                    </a>
                                                                                    <span class="m-list-timeline__time">
                                                                                        Just now
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                                    <a href="" class="m-list-timeline__text">
                                                                                        New invoice received
                                                                                    </a>
                                                                                    <span class="m-list-timeline__time">
                                                                                        20 mins
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                    <a href="" class="m-list-timeline__text">
                                                                                        Production server up
                                                                                    </a>
                                                                                    <span class="m-list-timeline__time">
                                                                                        5 hrs
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                    <a href="" class="m-list-timeline__text">
                                                                                        New order received
                                                                                    </a>
                                                                                    <span class="m-list-timeline__time">
                                                                                        7 hrs
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                    <a href="" class="m-list-timeline__text">
                                                                                        System shutdown
                                                                                    </a>
                                                                                    <span class="m-list-timeline__time">
                                                                                        11 mins
                                                                                    </span>
                                                                                </div>
                                                                                <div class="m-list-timeline__item">
                                                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                    <a href="" class="m-list-timeline__text">
                                                                                        Production server down
                                                                                    </a>
                                                                                    <span class="m-list-timeline__time">
                                                                                        3 hrs
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                                    <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                                        <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                            <span class="">
                                                                                All caught up!
                                                                                <br>
                                                                                No new logs.
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </li> 
                                      <!--   <li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                                <span class="m-nav__link-icon">
                                                    <span class="m-nav__link-icon-wrapper">
                                                        <i class="flaticon-share"></i>
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center">
                                                        <span class="m-dropdown__header-title">
                                                            Quick Actions
                                                        </span>
                                                        <span class="m-dropdown__header-subtitle">
                                                            Shortcuts
                                                        </span>
                                                    </div>
                                                    <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                        <div class="m-dropdown__content">
                                                            <div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
                                                                <div class="m-nav-grid m-nav-grid--skin-light">
                                                                    <div class="m-nav-grid__row">
                                                                        <a href="#" class="m-nav-grid__item">
                                                                            <i class="m-nav-grid__icon flaticon-file"></i>
                                                                            <span class="m-nav-grid__text">
                                                                                Generate Report
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="m-nav-grid__item">
                                                                            <i class="m-nav-grid__icon flaticon-time"></i>
                                                                            <span class="m-nav-grid__text">
                                                                                Add New Event
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="m-nav-grid__row">
                                                                        <a href="#" class="m-nav-grid__item">
                                                                            <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                            <span class="m-nav-grid__text">
                                                                                Create New Task
                                                                            </span>
                                                                        </a>
                                                                        <a href="#" class="m-nav-grid__item">
                                                                            <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                            <span class="m-nav-grid__text">
                                                                                Completed Tasks
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->
                                        <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__userpic m--hide">
                                                    <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                </span>
                                                <span class="m-nav__link-icon m-topbar__usericon">
                                                    <span class="m-nav__link-icon-wrapper" style="border-radius: 30px !important">
                                                        <i class="flaticon-user-ok"></i>
                                                    </span>
                                                </span>
                                                <span class="m-topbar__username m--hide">
                                                    Nick
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center">
                                                        <div class="m-card-user m-card-user--skin-light">
                                                            <div class="m-card-user__pic">
                                                                <img src="<?php echo base_url() ?>assets-2/app/media/img/users/head.png" class="m--img-rounded m--marginless" alt=""/ style="border-radius: 40px !important;" class="m--img-rounded m--marginless" alt=""/>
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">
                                                                   <?php echo $createdby=$this->session->userdata('a_name'); ?>  
                                                                </span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                    <?php echo $createdby=$this->session->userdata('a_email'); ?> 
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__section m--hide">
                                                                    <span class="m-nav__section-text">
                                                                        Section
                                                                    </span>
                                                                </li>
                                                        
                                                                <!-- <li class="m-nav__item">
                                                                    <a href="profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Activity
                                                                        </span>
                                                                    </a>
                                                                </li> -->
                                                                <!-- <li class="m-nav__item">
                                                                    <a href="profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Messages
                                                                        </span>
                                                                    </a>
                                                                </li> -->
                                                               <!--  <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-info"></i>
                                                                        <span class="m-nav__link-text">
                                                                            FAQ
                                                                        </span>
                                                                    </a>
                                                                </li> -->
                                                               <!--  <li class="m-nav__item">
                                                                    <a href="profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Support
                                                                        </span>
                                                                    </a>
                                                                </li> -->
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="<?php echo site_url('login/logout') ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        Logout
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                       <!--  <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-nav__link-icon m-nav__link-icon-alt">
                                                    <span class="m-nav__link-icon-wrapper">
                                                        <i class="flaticon-grid-menu"></i>
                                                    </span>
                                                </span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->        
        <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="    padding: 0 47px 0 135px;">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-light " style="margin-top: -70px;" >
                    <!-- BEGIN: Brand -->
                    <div class="m-brand  m-brand--skin-light ">
                        <a href="#" class="m-brand__logo" style="margin-top: 8px;">
                            <img alt="" src="https://www.mokshafinance.com/application/libraries/timthumb.php?src=https://cdn3.shopvii.com/729/579/Moksha_Logo_1_Web.png&w=73&h=98&q=100&zc=3&a=tc"/>
                        </a>

                    </div>
                    <!-- END: Brand -->
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light "  data-menu-vertical="true" data-menu-scrollable="true"data-menu-dropdown-timeout="500">
                            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                           
                       <?php $menu=[
                                [
                                    'icon'=>'flaticon-truck',
                                    'parent'=>'Trip',
                                    'child'=>[["name" => "All Trips",'func' => 'trip'],["name" => "Add Trip",'func' => 'trip/add']],
                                ],
                                [
                                    'icon'=>'flaticon-coins',
                                    'parent'=>'Other Expenses',
                                    'child'=>[["name" => "All Expenses",'func' => 'expenses'],["name" => "Add Expenses",'func' => 'expenses/add']],
                                ],
                                [
                                    'icon'=>'flaticon-up-arrow',
                                    'parent'=>'Reporting',
                                    'child'=>[
                                        ["name" => "Expenses",'func' => '#'],
                                        ["name" => "Bilties",'func' => '#'],
                                        ["name" => "Trips",'func' => '#'],
                                    ]    
                                ]
                            ];
                            foreach($menu as $key => $value) {    
                        ?>
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-0" aria-haspopup="true"  data-menu-submenu-toggle="click">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon <?php echo $value['icon'] ?>"></i>
                                    <span class="m-menu__link-text">
                                        <?php echo $value['parent']; ?>
                                    </span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--up">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <?php 
                                            foreach ($value['child'] as $ckey => $child) { ?>
                                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                                         <?php if( isset($child['is_popup']) && $child['is_popup']) {
                                                            ?>
                                                            <a  href="#" data-toggle="modal" data-target="<?php echo $child['func']; ?>" class="m-menu__link ">
                                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="m-menu__link-text">
                                                                    <?php echo  $child['name'] ?>
                                                                </span>
                                                            </a>
                                                            <?php
                                                        } else { ?>
                                                            <a  href="<?php echo admin_url($child['func']) ?>" class="m-menu__link ">
                                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="m-menu__link-text">
                                                                    <?php echo  $child['name'] ?>
                                                                </span>
                                                            </a>
                                                        <?php } ?>
                                                        </li> 
                                           <?php  }
                                         ?>
                                      
                                    </ul>
                                </div>
                            </li>
                           
                            <?php } ?>


                         


                           
                        </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>
                <div class="m-aside-menu-overlay"></div>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                   <!--  <div class="m-subheader ">
                        <div class="d-flex align-items-center"> -->
                          <!--   <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Dashboard
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="#" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Dashboard
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Manage Orders
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Latest Orders
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- <div>
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                        <i class="la la-plus m--hide"></i>
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav">
                                                        <li class="m-nav__section m-nav__section--first m--hide">
                                                            <span class="m-nav__section-text">
                                                                Quick Actions
                                                            </span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                <span class="m-nav__link-text">
                                                                    Activity
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                <span class="m-nav__link-text">
                                                                    Messages
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                <span class="m-nav__link-text">
                                                                    FAQ
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-text">
                                                                    Support
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                                Submit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                     <!--    </div>
                    </div> -->
            <style type="text/css">
                span.required {
                display: none;
            }   
            </style>