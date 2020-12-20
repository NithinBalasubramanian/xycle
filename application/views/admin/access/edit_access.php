<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="container-fluid" style="padding:10px;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Access </h1>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">Edit Access </h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url(); ?>Update_all/access/access/<?php echo $edit_id; ?>/list_access/list_access" 
    method="post" enctype="multipart/form-data" >
    <?php $profile=$this->Admin_model->table_column('access','id',$edit_id);
    
    if(count($profile) > 0)
    {
        foreach($profile as $row)
        { ?>
            <div class="box-body">
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Select Plan</label>
                  <div class="col-sm-12">
                   <select class="form-control" name="plan">
                   <?php $plan=$this->Admin_model->table_column('plan','id',$row['plan']);
                   if(count($plan) > 0)
                   {
                       foreach($plan as $row_plan)
                       { 
                           $plan=$row_plan['id'];?>
                             <option value="<?php echo $row_plan['id']; ?>"><?php echo $row_plan['plan']; ?></option>
                 <?php }
                   }
                   ?>
                   <?php $plan=$this->Admin_model->table_column('plan');
                   if(count($plan) > 0)
                   {
                       foreach($plan as $row_plan)
                       { 
                           if($row_plan['id'] != $plan){?>
                             <option value="<?php echo $row_plan['id']; ?>"><?php echo $row_plan['plan']; ?></option>
                 <?php } }
                   }
                   ?>
                   </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Select Create Fields</label>
                  <div class="col-sm-12">
                   <select class="form-control" name="fields">
                   <option value="<?php echo $row['fields']?>"><?php echo $row['fields']?></option>
                    <option value="E-Buisness Card">E-Buisness Card</option>
                    <option value="E-Brochure">E-Brochure</option>
                    <option value="Catelogue">Catelogue</option>
                    <option value="Promo Video">Promo Video</option>
                    <option value="Profile">Profile</option>
                   </select>
                  </div>
                </div>
              </div>
               <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-10 control-label">Count (If unlimited leave it NULL)</label>
                  <div class="col-sm-12">
                    <input type="text" name= "count" class="form-control" id="inputEmail3" value="<?php echo $row['count']?>">
                    
                  </div>
                </div>
                
            </div>
			

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm pull-right ">Add Access </button>
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