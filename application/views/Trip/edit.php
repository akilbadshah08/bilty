<?php $this->load->view('admin/inc/subheaders/add',['page_title' =>$page_title]) ?>
         <?php echo form_open('#', ["id"=> "city","class"=>"form-horizontal"]); ?>
                                        <div class="m-portlet__body">
                                               <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                       
                                          <div class="alert alert-success <?php echo !isset($_GET['r'])?'display-hide':'' ?>">
                                                <button class="close" data-close="alert"></button> <?php echo $this->module_name ?> <?php echo isset($_GET['r'])?$_GET['r']:'' ?> successful! 
                                            </div>

                                            <div class="form-group m-form__group row">
                                               
                                                    <label for="example-text-input" class="col-3 col-form-label">
                                                     City Name
                                                    </label>
                                                    <div class="col-5">
                                                    <input type="text" name="city[city_name]" data-required="1" value="<?php echo $city['city_name'] ?>" class="form-control m-input">
                                                   </div>
                                                </div>
                                            <div class="form-group m-form__group row">
                                                 
                                                     <label for="example-text-input" class="col-3 col-form-label">
                                                    City Code
                                                    </label>
                                                    <div class="col-5">
                                                    <input type="text" name="city[city_code]" data-required="1" value="<?php echo $city['city_code'] ?>" class="form-control m-input">
                                                   </div>
                                                </div>
                                              <div class="form-group m-form__group row">  
                                               
                                                     <label for="example-text-input" class="col-3 col-form-label">
                                                       Select State
                                                    </label>
                                                      <div class="col-5">
                                                        <select class="form-control m-select3" id='customer_id1' name="city[state_id]">
                                                            <option value="">Select...</option>
                                                     <?php foreach ($states as $rkey => $state) { ?>

                                                          <option <?php echo $city['state_id']==$state['state_id']?"selected":'' ?> value="<?php echo $state['state_id'] ?>" ><?php echo $state['state_name'] ?> </option>
                                                           <?php } ?>
                                                        </select>
                                                      </div>
                                                   <!--  <span class="m-form__help">
                                                       Landline Number
                                                    </span> -->
                                                </div>

                                                 <input type="hidden" value="<?php echo $city['city_id'] ?>" name="id" data-required="1" id="id" class="form-control" /> 
                                           
        
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