<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="container-fluid" style="padding:10px;">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Plan </h1>
</div>
 
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">Add Plan </h6>
     
</div>
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/plan/plan/add_plan/list_plan'); ?>" method="post" enctype="multipart/form-data" >
            <div class="box-body">
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-12 control-label">Plan</label>
                  <div class="col-sm-10">
                    <input type="text" name= "plan" class="form-control" id="inputEmail3" style="width:100%;" placeholder="Enter Plan" required autocomplete="off">
                    <input type="hidden" name="status" value="1" >
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputEmail3" class="col-sm-6 control-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" name= "amount" class="form-control overall" id="inputEmail3 " placeholder="Enter Amount" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
			   <div class="form-group col-md-12">
                  <label for="inputEmail3" class="col-sm-6 control-label">Discount</label>
                  <div class="col-sm-10">
                    <input type="text" name= "discount" class="form-control discount" id="inputEmail3 " placeholder="Enter Discount"  autocomplete="off">
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputEmail3" class="col-sm-6 control-label">Final Price</label>
                  <div class="col-sm-10">
                    <input type="text" name= "final" class="form-control final" id="inputEmail3 " placeholder="Enter Final Price" autocomplete="off">
                  </div>
                </div>
              
            </div>
            <div class="row">
			   <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-12 control-label">Valid Month</label>
                  <div class="col-sm-10">
                    <input type="text" name= "valid" class="form-control" id="inputEmail3" placeholder="Enter Valid Month" required autocomplete="off">
                  </div>
                </div>
            </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm pull-right ">Add Plan </button>
              </div>
            </form>
    </div>
  </div>
</div>
</div>

</div>

<?php $this->load->view('admin/include/footer.php'); ?>
<script>
 $(document).on('keyup','.discount',function(){
        var discount=Number($(this).val());
        var overall=Number($('.overall').val());
        var dis_amount=(overall*discount)/100;
        var final=overall-dis_amount;
        $('.final').val(final);
    });

</script>
