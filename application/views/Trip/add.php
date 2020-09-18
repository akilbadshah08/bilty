<div class="m-content">
 <div class="m-portlet">
  <?php $this->load->view('trip/header') ?>
  
<?php echo form_open(current_url(), ["id"=> "saveform","class"=>"form-horizontal"]); ?>
    <div class="m-portlet__body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
   

        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-3 col-form-label">
           Start Date
          </label>
          <div class="col-5">
          <?php $value=isset($trip['start_date'])?$trip['start_date']:''; ?>    
          <input type="date" name="trip[start_date]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
         </div>
      </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">
            End Date
            </label>
            <div class="col-5">
                <?php $value=isset($trip['end_date'])?$trip['end_date']:''; ?>
                <input type="date" name="trip[end_date]" value="<?php echo $value ?>" data-required="1" class="form-control m-input">
           </div>
          </div>
                <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">
            From
            </label>
            <div class="col-5">
                <?php 
                $value=isset($trip['trip_from'])?$trip['trip_from']:'';
                $cities=['mumbai' => "Mumbai", 'indore' => 'Indore'];
                 ?>
                <select class="form-control" name='trip[trip_from]'>
                  <?php foreach ($cities as $key => $lvalue) { ?>
                    <option <?php echo $value==$key?"selected":"" ?> value="<?php echo $key ?>"><?php echo $lvalue ?></option>
                  <?php } ?>
                </select>
           </div>
          </div>
          
                  <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-3 col-form-label">
            To
            </label>
            <div class="col-5">
                <?php $value=isset($trip['trip_to'])?$trip['trip_to']:''; ?>
                    
                <select class="form-control" name='trip[trip_to]'>
                  <?php foreach ($cities as $key => $lvalue) { ?>
                    <option <?php echo $value==$key?"selected":"" ?> value="<?php echo $key ?>"><?php echo $lvalue ?></option>
                  <?php } ?>
                </select>
           </div>
          </div>  
  <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                Truck No
                </label>
                <div class="col-5">
                    <?php $value=isset($trip['truck_no'])?$trip['truck_no']:''; ?>
                <input type="text" name="trip[truck_no]" value="<?php echo $value ?>" data-required="1" class="form-control m-input">
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
        </div>
        </div>

                    <!-- END FORM-->
               
                <!-- END VALIDATION STATES-->
         
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>