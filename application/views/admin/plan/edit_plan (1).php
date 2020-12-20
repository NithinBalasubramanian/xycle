<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Plan</h1>
<!--  <button type="button" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm " style="float:right" data-toggle="modal" data-target="#add_area">-->
<!--  Add Area-->
<!--</button>-->
  <a href="<?php echo base_url();?>View_admin/plan/list_plan" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Plan</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Plan Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url(); ?>Update_all/plan/plan/<?php echo $edit_id; ?>/list_plan/list_plan" method="post" enctype="multipart/form-data" >
       
        <?php $profile=$this->Admin_model->table_column($tablename='plan',$column='id',$val=$edit_id);
        if(count($profile) > 0)
        {
            foreach($profile as $row)
            { ?>
               <div class="box-body">
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Plan</label>
                  <div class="col-sm-12">
                    <input type="text" name= "plan" class="form-control" id="inputEmail3" value="<?php echo $row['plan']; ?>" required autocomplete="off">
                  </div>
                </div>
              </div>
            </div> 
            
            <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm pull-right ">Edit Plan </button>
              </div>
              <!-- /.box-footer -->
    <?php   }
        }
        ?>
            
			

              
            </form>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('admin/include/footer');?>