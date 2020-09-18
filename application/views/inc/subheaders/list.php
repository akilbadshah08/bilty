    <style type="text/css">
        .m-datatable.m-datatable--default > .m-datatable__table > .m-datatable__body .m-datatable__row > .m-datatable__cell > span {
            overflow: visible;
            overflow-x: visible;
            overflow-y: visible;
        }

</style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                         <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    <?php echo $page_title ?>
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
                                                 Home
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                               <?php echo $page_title ?>
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                           <?php echo $page_title ?>
                                        </h3>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="m-portlet__body">
                                <!--begin: Search Form -->
                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                        <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span>
                                                                <i class="la la-search"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                             <?php 
                                            $head=isset($head)?$head:'';
                                            switch($head){
                                                case 'agency_user':
                                                ?> <a href="<?php echo site_url('admin/'.$this->module_slug.'/add/'.$agent_id) ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                        <span>
                                                           <i class="fa fa-plus"></i> 
                                                            <span>
                                                               Add New
                                                            </span>
                                                        </span>
                                                    </a>
                                            <?php
                                                break;
                                                default:
                                                ?>  <a href="<?php echo site_url('admin/'.$this->module_slug.'/add') ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                        <span>
                                                           <i class="fa fa-plus"></i>
                                                            <span>
                                                               Add New
                                                            </span>
                                                        </span>
                                                    </a>
                                                <?php
                                            } ?>
                                           
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>