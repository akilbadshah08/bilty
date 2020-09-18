<div class="m-content">
 <div class="m-portlet">
  <div class="m-portlet__head">
   <div class="m-portlet__head-caption">
    <div class="col-lg-10 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
         <h3 class="m-subheader__title m-subheader__title--separator">
        <?php echo $page_title ?>
        </h3>
        <table class="table"><tr>
         <?php echo isset($trip['trip_id'])?"<th>Trip ID:</th>"."<td>".$trip['trip_id']."</td>":''; ?>

         <?php echo isset($trip['truck_no'])?"<th>Truck No:</th>"."<td>".$trip['truck_no']."</td>":''; ?>

         <?php echo isset($trip['start_date'])?"<th>Start Date:</th>"."<td>".$trip['start_date']."</td>":''; ?> 


         <?php echo isset($trip['end_date'])?"<th>End Date:</th>"."<td>".$trip['end_date']."</td>":''; ?> 
        </tr></table> 
    </div>

    <div class="m-separator m-separator--dashed d-xl-none"></div>
    </div>
  </div>
  <div class="m-portlet__body">
          <table class="m-datatable" id="html_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th title="Field #1">
                                               Trip ID
                                            </th>
                                            <th title="Field #2">
                                               Truck No
                                            </th>
                                            <th title="Field #3">
                                             From
                                            </th>
                                            <th title="Field #3">
                                             To
                                            </th>
                                            <th title="Field #3">
                                             Start Date
                                            </th>
                                            <th title="Field #3">
                                             End Date
                                            </th>
                                            <th>
                                                Total Bilties
                                            </th>
                                            <th>
                                                Total Biltiy Amount Recived
                                            </th>
                                            <th>
                                                Total Expenses
                                            </th>
                                            <th title="Field #4">
                                               Action
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 

                                            if(!empty($trips))
                                            foreach ($trips as $key => $value) { ?>
                                        <tr>
                                               <td> <?php echo $value['trip_id'] ?> </td>
                                                <td>
                                                   <?php echo $value['truck_no'] ?>
                                                </td>
                                                <td>
                                                     <?php echo $value['trip_from'] ?> 
                                                </td>
                                                <td>
                                                     <?php echo $value['trip_to'] ?> 
                                                </td>
                                                <td>
                                                     <?php echo $value['start_date'] ?> 
                                                </td>
                                                <td>
                                                     <?php echo $value['end_date'] ?> 
                                                </td>
                                                <td>
                                                     <?php echo "2650" ?> 
                                                </td>
                                                <td> 
                                                    <?php echo "2500" ?>
                                                </td>
                                                <td>
                                                    <?php echo "25000" ?>
                                                </td>
                                               <td>
                                                    <a href="<?php echo site_url('admin/trip/edit/'.$value['trip_id']) ?>">View</a> | <a href="<?php echo site_url('admin/bilty/index/'.$value['trip_id']) ?>">Bilties</a> | <a href="<?php echo site_url('admin/trip/expenses/'.$value['trip_id']) ?>">Expenses</a> | <a href=" href="<?php echo site_url('trip/external/'.$value['trip_id']) ?>>Extarnal Income</a>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

<style type="text/css">
    .col-lg-10.m-portlet__head-title {
    padding-top: 20px;
}
</style>