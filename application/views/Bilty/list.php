<div class="m-content">
 <div class="m-portlet">
    <?php $this->load->view('trip/header') ?>
  <div class="m-portlet__body">
    <a class="btn btn-info" style="float:right" href="<?php echo site_url('admin/bilty/add/'.$this->uri->segment(4)) ?>">Add</a><br>
          <table class="m-datatable" id="html_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th title="Field #1">
                                               Bilty ID
                                            </th>
                                            <th title="Field #2">
                                               Truck No
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th title="Field #3">
                                             Consignee
                                            </th>
                                            <th title="Field #3">
                                             Consignor
                                            </th>
                                            <th title="Field #3">
                                             Address
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th title="Field #4">
                                               Action
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 

                                            if(!empty($bilties))
                                            foreach ($bilties as $key => $value) { ?>
                                        <tr>
                                               <td> <?php echo $value['bilty_id'] ?> </td>
                                                <td>
                                                   <?php echo $value['truck_no'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['date'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['consignee'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['consignor'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['address'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['total_price'] ?>
                                                </td>
                                               <td>
                                                    <a href="<?php echo site_url('admin/bilty/edit/'.$value['trip_id'].'/'.$value['bilty_id']) ?>">Edit</a>
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