    <style type="text/css">
        .m-datatable.m-datatable--default > .m-datatable__table > .m-datatable__body .m-datatable__row > .m-datatable__cell > span {
            overflow: visible;
            overflow-x: visible;
            overflow-y: visible;
        }
label{
        font-weight: 400;
}
}
</style>


    <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                   <!--   <div class="m-subheader ">
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
                    </div> -->
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
                                

                                    <div class="m-portlet__head" style="padding-top: 24px;">
                                        <div class="m-portlet__head-tools">
                                             <?php if($this->uri->segment(3)=='add'){ ?>  
                                         
                                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist" style="border-bottom: 0px solid #ebedf2 !important;">
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link active" href="#" role="tab">
                                                        <i class="flaticon-share m--hide"></i>
                                                        Personal
                                                    </a>
                                                </li>
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link "  href="#tab_1_2" role="tab">
                                                       Occupation
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link "  href="#tab_1_3" role="tab">
                                                       Loan
                                                    </a>
                                                </li>

                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link"  href="#tab_1_4" role="tab">
                                                       Step 
                                                    </a>
                                                </li>
                                            </ul>



                                             <?php } else if($this->uri->segment(3)=='edit'){ ?>   
                                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist" style="border-bottom: 0px solid #ebedf2 !important;">
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link <?php echo $step==1?"active":"" ?>" href="<?php echo site_url('admin/lead/edit/'.$lead_id.'/1') ?>" role="tab">
                                                        <i class="flaticon-share m--hide"></i>
                                                        Personal
                                                    </a>
                                                </li>
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link <?php echo $step==2?"active":"" ?>"  href="<?php echo site_url('admin/lead/edit/'.$lead_id.'/2') ?>" role="tab">
                                                       Occupation
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link <?php echo $step==3?"active":"" ?>"  href="<?php echo site_url('admin/lead/edit/'.$lead_id.'/3') ?>" role="tab">
                                                       Loan 
                                                    </a>
                                                </li>

                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link <?php echo $step==4?"active":"" ?>"  href="<?php echo site_url('admin/lead/edit/'.$lead_id.'/4') ?>" role="tab">
                                                       Step 
                                                    </a>
                                                </li> 
                                                
                                            </ul>
                                            <?php } ?>
                                        </div>
                                    </div>