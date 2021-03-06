<div class="m-content">
 <div class="m-portlet">
  <?php $this->load->view('trip/header') ?>
  
<?php echo form_open(current_url(), ["id"=> "saveform","class"=>"form-horizontal"]); ?>
    <div class="m-portlet__body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
   
             <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 Expenses On
                </label>
                <div class="col-5">
                <?php 
                  $value=isset($expenses['expenses_on'])?$expenses['expenses_on']:'';
                  $expenses_on=['diesel' => "Diesel", 'toll' => 'toll','other' => 'Other'];
                 ?>    
                <select class="form-control" name='expenses[expenses_on]'>
                  <?php foreach ($expenses_on as $key => $lvalue) { ?>
                    <option <?php echo $value==$key?"selected":"" ?> value="<?php echo $key ?>"><?php echo $lvalue ?></option>
                  <?php } ?>
                </select>
               </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 Description
                </label>
                <div class="col-5">
                <?php $value=isset($expenses['description'])?$expenses['description']:''; ?>    
                <input type="text" name="expenses[description]" required="" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>            

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 Amount
                </label>
                <div class="col-5">
                <?php $value=isset($expenses['amount'])?$expenses['amount']:''; ?>    
                <input type="text" name="expenses[amount]" required="" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 Mode
                </label>
                <div class="col-5">
                <?php 
                  $value=isset($expenses['mode'])?$expenses['mode']:'';
                  $mode_list=['cash' => "Cash", 'bank-sbi' => 'Bank SBI'];
                 ?>    
                <select class="form-control" name='expenses[mode]'>
                  <?php foreach ($mode_list as $key => $lvalue) { ?>
                    <option <?php echo $value==$key?"selected":"" ?> value="<?php echo $key ?>"><?php echo $lvalue ?></option>
                  <?php } ?>
                </select>
               </div>
            </div>
            <input type="hidden" name="expenses[expenses_or_assets]" value="expenses">
            <input type="hidden" name="expenses[truck_no]" value="<?php echo $trip['truck_no'] ?>">
            <input type="hidden" name="expenses[trip_id]" value="<?php echo $trip['trip_id'] ?>">
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 Ref ID
                </label>
                <div class="col-5">
                <?php $value=isset($expenses['ref_id'])?$expenses['ref_id']:''; ?>    
                <input type="text" name="expenses[ref_id]" required="" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
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