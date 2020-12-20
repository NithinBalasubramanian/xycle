<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="container-fluid" style="padding:10px;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Ads </h1>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">Edit Ads </h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url(''); ?>Update_all/ads/ads/<?php echo $edit_id; ?>/edit_ads/list_ads" method="post" enctype="multipart/form-data" >
    <?php $profile=$this->Admin_model->table_column('ads','id',$edit_id);
    if(count($profile) > 0)
    {
        foreach($profile as $row)
        { ?>
            <div class="box-body">
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Title *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "title" class="form-control" id="inputEmail3" value="<?php echo $row['title']; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label"> Image *</label>
                    <div class=" col-sm-12">
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="exampleInputFile" >
                            <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
                        </div>
                        </div>
                    </div>
              </div>
              <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Field</label>
                  <div class="col-sm-12">
                    <input type="text" name= "field" class="form-control" id="inputEmail3" value="<?php echo $row['field']; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Location</label>
                  <div class="col-sm-12">
                    <input type="text" name= "location" class="form-control" id="inputEmail3" value="<?php echo $row['location']; ?>">
                  </div>
                </div>
            </div>
			

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm pull-right ">Edit Ads </button>
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