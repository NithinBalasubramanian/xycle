


<?php $this->load->view('admin/include/header_part.php'); ?>
<?php $this->load->view('admin/include/header_menu.php'); ?>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h6 class="modal-title">Upgrade Your Status</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <label>Plan Type</label>

          <select class="form-control">
          <option>Choose One</option>
          <?php $plan=$this->Admin_model->table_column('plan');
          if(count($plan) > 0)
          {
              foreach($plan as $row_plan)
              { ?>
                 <option value="<?php echo $row_plan['id']; ?>"><?php echo $row_plan['plan']; ?></option>
       <?php  }
          }
          
          ?>
           
          </select><br>
          <textarea class="form-control" name="text" row="4" Placeholder="Enter Text Here"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>




<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Customer </h1>
  <!--<a href="<?php echo base_url();?>View/customer/add_customer" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Customer</a>-->
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Customer Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover ">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>User Type</th>
                  <th>Plan Type</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  <th>Language</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $customer = $this->Admin_model->table_column($tablename='user');
				if(count($customer) >0) {
          $i=1;
				foreach($customer as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo strtoupper($row["username"]); ?></td>
                  <td><?php echo $row["user_type"]; ?></td>
                  <?php $plan=$this->Admin_model->table_column('plan','id',$row["plan_type"]); 
                     foreach($plan as $plan_row){ ?>
                        <td><?php echo $plan_row["plan"]; ?></td>
                      <?php 
                      } ?>
                   <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                     <td><?php echo $row["language"]; ?></td>
                      <td><?php echo $row["date"]; ?></td>
                  
                  <td><?php if($row['status'] == '0'){ ?><button class="btn btn-sm btn-success verify verify_<?php echo $row['id']; ?>" data-val="0" data-id="<?php echo $row['id']; ?>">Unblock</button><?php }else{ ?><button class="btn btn-sm btn-danger verify verify_<?php echo $row['id']; ?>" data-val="1" data-id="<?php echo $row['id']; ?>">Block</button><?php } ?>
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">Upgrade</button></td>
                 <!-- <td><a href="<?php echo base_url();?>View/customer/edit_customer/<?php echo $row['id'];?>"  onclick="pop_function();" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="<?php echo base_url();?>Admin/delete/user/customer/<?php echo $row['id'];?>/list_customer" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td>-->
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

<?php $this->load->view('admin/include/footer.php');?>
<script>
	$(document).on('click','.verify',function(){
		var val=$(this).data('val');
        var id=$(this).data('id');
        var tablename='user';
		var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Admin/verify',
            type: 'POST',
            dataType: "json",
            data: "val=" + val +"&id="+id+"&tablename="+tablename ,
            beforeSend: function(){
                $('.verify_'+id).html('blocking.....');
            },
            success: function(data) {
                if(data.status == '0'){
                    $('.verify_'+id).data('val', data.status);
                    $('.verify_'+id).removeClass('btn-danger');
                    $('.verify_'+id).addClass('btn-success');
                    $('.verify_'+id).html('Unblock');
                }else{
                    $('.verify_'+id).data('val', data.status);
                    $('.verify_'+id).removeClass('btn-success');
                    $('.verify_'+id).addClass('btn-danger');
                    $('.verify_'+id).html('Block');
                }
            }
        });
	});

</script>