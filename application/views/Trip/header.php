
  <div class="m-portlet__head">
   <div class="m-portlet__head-caption">
    <div class="col-lg-12 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
        <br>
      <?php if($this->uri->segment(3)=='edit' || $this->uri->segment(2)=='bilty' || $this->uri->segment(3)=='expenses' || $this->uri->segment(3)=='add_expenses' || $this->uri->segment(3)=='edit_expenses' || $this->uri->segment(3)=='external'){ ?>
        <div class="row">
        <h3 class="col-lg-4">Trip from <?php echo isset($trip['trip_from'])?$trip['trip_from']:"" ?>-<?php echo isset($trip['trip_from'])?$trip['trip_to']:"" ?></h3>
        <table class="table col-lg-6"><tr>
         <?php echo isset($trip['trip_id'])?"<th>Trip ID:</th>"."<td>".$trip['trip_id']."</td>":''; ?>

         <?php echo isset($trip['truck_no'])?"<th>Truck No:</th>"."<td>".$trip['truck_no']."</td>":''; ?>

         <?php echo isset($trip['start_date'])?"<th>Start Date:</th>"."<td>".$trip['start_date']."</td>":''; ?> 


         <?php echo isset($trip['end_date'])?"<th>End Date:</th>"."<td>".$trip['end_date']."</td>":''; ?> 
        </tr></table> 
        </div>
    <?php } else if($this->uri->segment(3)=='add'){  ?>
        <h3>Add New Trip</h3>
    <?php  } ?>
    </div>

    <div class="m-separator m-separator--dashed d-xl-none"></div>
    </div>
  </div>


<div class="m-portlet__head">
   <div class="m-portlet__head-caption">
    <div class="col-lg-3 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
        <?php if($this->uri->segment(2)=='trip' && $this->uri->segment(3)=='add'){ ?>
        <a href="<?php echo site_url('admin/trip/add/') ?>" class="<?php echo current_url()==site_url('admin/trip/add')?"active":'' ?>  m-portlet__head-text text-dark">
         Trip
        </a> 
        <?php } else { ?>
        <a href="<?php echo site_url('admin/trip/edit/'.$this->uri->segment(4)) ?>" class="<?php echo current_url()==site_url('admin/trip/edit/'.$this->uri->segment(4))?"active":'' ?> m-portlet__head-text text-dark">
         Trip
        </a>
        <?php } ?>
    </div>
    <div class="col-lg-3 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
        <?php if($this->uri->segment(2)=='trip' && $this->uri->segment(3)=='add'){ ?>
        <a href="#" class="m-portlet__head-text text-dark">
         Bilty
        </a> 
        <?php } else { ?>
        <a href="<?php echo site_url('admin/bilty/index/'.$this->uri->segment(4)) ?>" class="<?php echo current_url()==site_url('admin/bilty/index/'.$this->uri->segment(4))?"active":'' ?> m-portlet__head-text text-dark">
         Bilty
        </a>
        <?php } ?>
    </div>
        <div class="col-lg-3 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
        <?php if($this->uri->segment(2)=='trip' && $this->uri->segment(3)=='add'){ ?>
        <a href="#" class="m-portlet__head-text text-dark">
         Expenses
        </a> 
        <?php } else { ?>
        <a  href="<?php echo site_url('admin/trip/expenses/'.$this->uri->segment(4)) ?>" class="<?php echo current_url()==site_url('admin/trip/expenses/'.$this->uri->segment(4))?"active":'' ?> m-portlet__head-text text-dark">
         Expenses
        </a>
        <?php } ?>
    </div>
    <div class="col-lg-3 m-portlet__head-title" style="float:left;">
        <span class="m-portlet__head-icon m--hide">
         <i class="la la-gear"></i>
        </span>
                <?php if($this->uri->segment(2)=='trip' && $this->uri->segment(3)=='add'){ ?>
        <a href="#" class="m-portlet__head-text text-dark">
         External Income
        </a> 
        <?php } else { ?>
        <a href="<?php echo site_url('admin/trip/external/'.$this->uri->segment(4)) ?>" class="<?php echo current_url()==site_url('admin/trip/external/'.$this->uri->segment(4))?"active":'' ?> m-portlet__head-text text-dark">
         External Income
        </a>
        <?php } ?> 
    </div>

    <div class="m-separator m-separator--dashed d-xl-none"></div>
    </div>
  </div>
  

<style type="text/css">
.m-portlet__head table td, .m-portlet__head .table th {
    border-top: 0    
    }
a.m-portlet__head-text.text-dark.active {
    color: red !important;
}
</style>