<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="container-fluid" style="padding:10px;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List  User </h1>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow ">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List  User </h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body" style="padding:8px;">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $customer = $this->Admin_model->table_column($tablename='user','user_type','user');
				if(count($customer) >0) {
          $i=1;
				foreach($customer as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo $row["user_id"]; ?></td>
                  <td><?php echo strtoupper($row["username"]); ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row['country_code']; ?> <?php echo $row['phone']; ?></td>
                 <td><a href="<?php echo base_url(); ?>Admin/make_admin/<?php echo $row["user_id"]; ?>" class="btn btn-sm btn-success">Admin</a> </td>
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

<?php $this->load->view('admin/include/footer.php'); ?>