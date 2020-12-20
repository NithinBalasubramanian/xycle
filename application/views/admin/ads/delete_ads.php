


<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Delete Ads </h1>
  <!--<a href="<?php echo base_url();?>View/customer/add_customer" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Customer</a>-->
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">Delete Ads Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>User Id</th>
                  <th>Title</th>
                  <th>Field</th>
                  <th>Location</th>
                  <th>Image</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $customer = $this->Admin_model->table_column($tablename='ads','status','0');
				if(count($customer) >0) {
          $i=1;
				foreach($customer as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo $row["user_id"]; ?></td>
                  <td><?php echo StrToUpper($row["title"]); ?></td>
                  <td><?php echo $row["field"]; ?></td>
                  <td><?php echo $row["location"]; ?></td>
                   <td><img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $row['img']; ?>" width="100px" height="100px"></td>
                    <td><?php echo $row["date_created"]; ?></td>
                   <!-- <td><label class="switch">
                        <input type="checkbox" class="switchery btn btn-sucess" data-rowid="<?php echo $row['id']; ?>" value="<?php echo $row['status']; ?>" <?php if($row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label></td>-->
                 <td>
                 <button type="button" class="switchery btn btn-success" data-rowid="<?php echo $row['id']; ?>" value="<?php echo $row['status']; ?>" <?php if($row['status'] != 0){?> >block</button> <?php  } ?>
                 </td>
                 
       <?php $i++; } ?>
        <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>

</div>

</div>
<script>
  function pop_function(){
    document.querySelector('#pop_up').style.display='block';
  }
</script>
<script>
$(document).ready(function(){
    
$('.switchery').on('click', function (event) {
   alert("hii");
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
        url: base_url+"Admin/status",
        type: 'POST',
        dataType: 'json',
        data : {
            'id' : $(this).attr("data-rowid"),
            'tablename' : 'ads'
        },
        success: function(data) {
            //console.log(data);
        }
    }); 
});
});
</script>
<?php $this->load->view('admin/include/footer.php');?>