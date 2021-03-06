<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="container-fluid" style="padding:10px;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Ads </h1>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">Add Ads </h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/ads/ads/add_ads/list_ads'); ?>" method="post" enctype="multipart/form-data" >
            <div class="box-body">
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Title *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "title" class="form-control" id="inputEmail3" placeholder="Enter Title" required autocomplete="off">
                    <input type="hidden" name="status" value="1" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label"> Image *</label>
                    <div class=" col-sm-12">
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="exampleInputFile" required>
                            <label class="custom-file-label" for="exampleInputFile">Choose Images</label>
                        </div>
                        </div>
                    </div>
              </div>
               <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Field</label>
                  <div class="col-sm-12">
                    <input type="text" name= "field" class="form-control" id="inputEmail3" placeholder="Enter Title"  autocomplete="off">
                    
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Location</label>
                  <div class="col-sm-12">
                    <input type="text" name= "location" class="form-control" id="inputEmail3" placeholder="Enter Location"  autocomplete="off">
                    
                  </div>
                </div>
            </div>
			

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm pull-right ">Add Ads </button>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>

<?php $this->load->view('admin/include/footer.php'); ?>