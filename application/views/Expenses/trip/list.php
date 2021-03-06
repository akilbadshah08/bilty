<div class="m-content">
 <div class="m-portlet">
      <?php $this->load->view('trip/header') ?>
  <div class="m-portlet__body">
    <a class="btn btn-info" style="float:right" href="<?php echo site_url('admin/trip/add_expenses/'.$this->uri->segment(4)) ?>">Add</a><br>
          <table class="m-datatable" id="html_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th title="Field #1">
                                               Expenses ID
                                            </th>
                                            <th>
                                              Expenses on
                                            </th>
                                            <th>
                                              Description 
                                            </th>
                                            <th>
                                              Mode 
                                            </th>
                                            <th>
                                              Date
                                            </th>
                                            <th>
                                              Ref ID
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

                                            if(!empty($expenses))
                                            foreach ($expenses as $key => $value) { ?>
                                        <tr>
                                               <td> <?php echo $value['expenses_id'] ?> </td>
                                                <td>
                                                    <?php echo $value['expenses_on'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['description'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['mode'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['ref_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['date'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['amount'] ?>
                                                </td>
                                               <td>
                                                    <a href="<?php echo site_url('admin/trip/edit_expenses/'.$value['trip_id'].'/'.$value['expenses_id']) ?>">Edit</a>
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