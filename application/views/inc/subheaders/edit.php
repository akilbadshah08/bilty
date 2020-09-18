<style type="text/css">
  label{
  font-weight: 400;
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
<div class="m-content">
<div class="m-portlet">
<div class="m-portlet__head">
  <div class="m-portlet__head-caption">
    <div class="col-lg-8 m-portlet__head-title" style="margin-top: 15px;float:left;">
      <span class="m-portlet__head-icon m--hide">
      <i class="la la-gear"></i>
      </span>
      <h3 class="m-portlet__head-text">
        <?php echo $page_title ?>
      </h3>
    </div>
    <div class="col-lg-4 m-portlet__head-title" style="text-align: end;margin-top: 27px; ">
      <?php 
        $head=isset($head)?$head:'';
         switch($head){
             case 'agency_user':
             ?> <a  href="<?php echo site_url('admin/'.$this->module_slug.'/add/'.$agent_id) ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin: 5px;" >
      <span>
      <i class="fa fa-plus"></i> 
      <span>
      Add New
      </span>
      </span>
      </a>
      <a href="<?php echo site_url('admin/'.$this->module_slug.'/index/'.$agent_id) ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
        <span>
          <!--       <i class="fa fa-plus"></i>  -->
          <span>
          back
          </span>
        </span>
      </a>
      <?php
        break;
        default:
        ?>  <a href="<?php echo site_url('admin/'.$this->module_slug.'/add') ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style="margin: 5px;" >
      <span>
      <i class="fa fa-plus"></i>
      <span>
      Add New
      </span>
      </span>
      </a>
      <a href="<?php echo site_url('admin/'.$this->module_slug) ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
      <span>
      <span>
      back
      </span>
      </span>
      </a>
      <?php
        } ?>
      <div class="m-separator m-separator--dashed d-xl-none"></div>
    </div>
  </div>
</div>