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
                 Bilty No
                </label>
                <div class="col-5">
                <?php $value=isset($bilty['bilty_no'])?$bilty['bilty_no']:''; ?>    
                <input type="text" name="bilty[bilty_no]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>

                    <div class="form-group m-form__group row">
           
                <label for="example-text-input" class="col-3 col-form-label">
                 Consignee
                </label>
                <div class="col-5">
                <?php $value=isset($bilty['consignee'])?$bilty['consignee']:''; ?>    
                <input type="text" name="bilty[consignee]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>

                    <div class="form-group m-form__group row">
           
                <label for="example-text-input" class="col-3 col-form-label">
                 Consignor
                </label>
                <div class="col-5">
                <?php $value=isset($bilty['consignor'])?$bilty['consignor']:''; ?>    
                <input type="text" name="bilty[consignor]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>

                    <div class="form-group m-form__group row">
           
                <label for="example-text-input" class="col-3 col-form-label">
                 Address
                </label>
                <div class="col-5">
                <?php $value=isset($bilty['address'])?$bilty['address']:''; ?>    
                <input type="text" name="bilty[address]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>
                    <div class="form-group m-form__group row">
           
                <label for="example-text-input" class="col-3 col-form-label">
                 Date
                </label>
                <div class="col-5">
                <?php $value=isset($bilty['date'])?$bilty['date']:''; ?>    
                <input type="date" name="bilty[date]" value="<?php echo $value ?>" data-required="1"  class="form-control m-input">
               </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 From
                </label>
                <div class="col-5">
                <?php echo $value=isset($trip['trip_from'])?$trip['trip_from']:''; ?>   
                <input type="hidden" name="bilty[trip_from]" value="<?php echo $trip['trip_from'] ?>"> 
               </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 To
                </label>
                <div class="col-5">
                <?php echo $value=isset($trip['trip_to'])?$trip['trip_to']:''; ?>   
                <input type="hidden" name="bilty[trip_to]" value="<?php echo $trip['trip_to'] ?>"> 
               </div>
            </div>

            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-3 col-form-label">
                 Truck_no
                </label>
                <div class="col-5">
                <?php echo $value=isset($trip['truck_no'])?$trip['truck_no']:''; ?>   
                <input type="hidden" name="bilty[truck_no]" value="<?php echo $trip['truck_no'] ?>"> 
               </div>
            </div>
            <table class="table">
              <tr>
                <th>Sno</th>
                <th>Said to contain</th>
                <th>Weight</th>
                <th>Rate</th>
                <th>Price</th>
                </tr> 
                <?php $grand_total=0; $grand_weight=0; for($i=1;$i<=10;$i++){ ?>
                  <tr>
                    <th><input type="hidden" name="detail[sno][<?php echo $i ?>]" value="<?php echo $i ?>" ><?php echo $i ?></th>
                    <?php $value=isset($detail['contain'][$i])?$detail['contain'][$i]:""; ?>
                    <td><input type="text" class="form-control m-input" name="detail[contain][<?php echo $i ?>]" value="<?php echo $value ?>" ></td>
                    <?php $value=isset($detail['weight'][$i])?$detail['weight'][$i]:"0.00";
                        $grand_weight=$grand_weight+$value; 
                     ?>
                    <td><input type="text" class="weight-change form-control m-input" name="detail[weight][<?php echo $i ?>]" value="<?php echo $value ?>" ></td>
                    <?php $value=isset($detail['rate'][$i])?$detail['rate'][$i]:"0.00";                    ?>
                    <td><input type="text" class="form-control m-input" name="detail[rate][<?php echo $i ?>]" value="<?php echo $value ?>" ></td>
                    <?php $value=isset($detail['price'][$i])?$detail['price'][$i]:"0.00";
                           $grand_total=$grand_total+$value; 
                     ?>
                    <td><input type="text"  class="form-control price-change m-input" name="detail[price][<?php echo $i ?>]" value="<?php echo $value ?>" ></td>
                  </tr>
                 <?php } ?> 
               
            </table>
            <div class="form-group m-form__group row">

               <label for="example-text-input" class="col-3 col-form-label">
                Total Weight
                </label>
               <div class="col-3">
                <input type="text" readonly="" class="grand_weight text-right form-control m-input" name="bilty[total_weight]" value="<?php echo $grand_weight ?>">
               </div>
              <label for="example-text-input" class=" col-3 col-form-label">
                 Grand Total
                </label>
                <div class="col-3">
                <input type="text" readonly="" class="grand_total text-right form-control m-input" name="bilty[total_price]" value="<?php echo $grand_total ?>">
               </div>
            </div>

            <input type="hidden" name="bilty[trip_id]" class="form-control m-input" value="<?php echo $trip['trip_id'] ?>">



      
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