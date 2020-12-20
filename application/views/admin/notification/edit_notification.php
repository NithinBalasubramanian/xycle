<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="container-fluid" style="padding:10px;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Notification </h1>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">Edit Notification </h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url(); ?>Update_all/notification/notification/<?php echo $edit_id; ?>/list_notification/list_notification" method="post" enctype="multipart/form-data" >
   <?php $profile=$this->Admin_model->table_column($tablename='notification',$column='id',$val=$edit_id);
    if(count($profile) > 0)
    {
        foreach($profile as $row)
        { ?>
            <div class="box-body">
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Plan Member</label>
                  <div class="col-sm-12">
                   <select class="form-control" name="plan">
                   <?php $plan=$this->Admin_model->table_column('plan','id',$row['plan']);
                   if(count($plan) > 0)
                   {
                       foreach($plan as $row_plan)
                       { 
                          ?>
                             <option value="<?php echo $row_plan['id']; ?>"><?php echo $row_plan['plan']; ?></option>
                 <?php }
                   }
                   ?>
                   <?php $plan=$this->Admin_model->table_column('plan');
                   if(count($plan) > 0)
                   {
                       foreach($plan as $row_plan)
                       { ?>
                             <option value="<?php echo $row_plan['id']; ?>"><?php echo $row_plan['plan']; ?></option>
                 <?php }
                   }
                   
                   ?>
                   </select>
                    <input type="hidden" name="status" value="1" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-10 control-label">Notification</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="notification" row="4" value="<?php echo $row['notification']; ?>"><?php echo $row['notification']; ?></textarea>
                    
                  </div>
                </div>
              </div>
               
                
            </div>
			

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm pull-right ">Edit Notification </button>
              </div>
  <?php }
    }
    
    
    
    ?>
            
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('admin/include/footer.php'); ?>