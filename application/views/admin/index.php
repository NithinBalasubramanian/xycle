<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
  
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 ">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
   
    <!-- Card Body -->
    <div class="card-body row">
      <div class="col-md-3 mb-5">
       <div class="card-header white">No of User </div>
       <div class="card-body text-center card-background">
       <h1>
       <?php $cus_count=$this->Admin_model->table_column('user');
          echo count($cus_count);
           ?>
          </h1>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
</div>
</div>

<?php $this->load->view('admin/include/footer.php'); ?>