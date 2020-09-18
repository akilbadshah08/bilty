<div class="m-content">
 <div class="m-portlet">
  <?php $this->load->view('trip/header') ?>
  <div class="m-portlet__head">
   <div class="m-portlet__head-caption">
    <div class="col-lg-10 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
        <h3 class="m-portlet__head-text text-dark">
         <?php  echo $page_title ?>
        </h3> 
    </div>

    <div class="m-separator m-separator--dashed d-xl-none"></div>
    </div>
  </div>
<?php echo form_open(current_url(), ["id"=> "saveform","class"=>"form-horizontal"]); ?>
    <div class="m-portlet__body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
   

        <div class="form-group m-form__group row">
           
                <label for="example-text-input" class="col-3 col-form-label">
                 Company/Name of Person
                </label>
                <div class="col-5">
                <?php $value=isset($trip['ex_source_company'])?$trip['ex_source_company']:''; ?>    
                <input type="text" name="trip[ex_source_company]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>
                 <div class="form-group m-form__group row">
           
                <label for="example-text-input" class="col-3 col-form-label">
                 Amount 
                </label>
                <div class="col-5">
                <?php $value=isset($trip['ex_source_credit'])?$trip['ex_source_credit']:''; ?>    
                <input type="text" name="trip[ex_source_credit]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>   

      
    </div>
    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row" style="padding-bottom: 19px;">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
                    <!-- END FORM-->
               
                <!-- END VALIDATION STATES-->
         
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>