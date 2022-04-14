<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});
</script>
<style>
  .opecity{
    opacity:1!important;
  }
</style>
<!-- Page Heading -->
<div class="clearfix card-header">
    <div class="float-right">
      <a href="<?php echo base_url('/user/work_from_home/add/')?>" class="btn btn-primary btn-circle">
        <i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom" title="Add work from home"></i>
      </a>
    </div>
    <div class="float-left">
      <h1 class="h3 mb-2 text-gray-800 ">Work From Home  Management</h1>
    </div><br>
</div>

<!--Show Flash Messages Success/Error Message-->

<?php

if($this->session->flashdata('work_from_home')) {
$message = $this->session->flashdata('work_from_home');
?>
<div class="<?php echo $message['class']?> opecity"><?php echo $message['message']; ?>

</div>
<?php
}

?>
<!-- Menu List-->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="clearfix card-header">
      <div class="float-left">
      <h6 class="m-0 font-weight-bold text-primary">Work From Home List</h6>
      </div>
      <!-- <div class="float-right">
        <select name="menu_type_search" id="menu_type_search" class="form-control" onchange="getmenu(this.value,'dataTable tbody','table')">
          <option value="BM">Backend Menu</option>
          <option value="FM">Frontend Menu</option>
        </select>
      </div>       -->
    </div>
  </div>
</div>

            
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered text-gray-900" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Work From Home From</th>
            <th>Work From Home  To</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>Work From Home From</th>
          <th>Work From Home  To</th>
          <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($data['wfh'] as $wfh){?>
          <tr>
            <td><?php echo $wfh->wfh_date_from?></td>
            <td><?php echo $wfh->wfh_date_to?></td>
            <td>
              <a href="<?php echo base_url();?>user/work_from_home/edit/<?php echo $wfh->id?>"><i class="far fa-edit"></i></a> 
              <a href="javascript:void(0)" onclick="remove_element('<?php echo $wfh->id;?>','work_from_home')"><i class="far fa-trash-alt"></i></a>
              
           </td>
          </tr>  
          <?php } ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>
  



