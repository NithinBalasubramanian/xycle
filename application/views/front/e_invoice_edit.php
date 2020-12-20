<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php $e_inv_data = $this->Admin_model->table_column('ecard','id',$data);
    foreach($e_inv_data as $row){ 
      $e_data = $this->Admin_model->table_column('e_invoice','ecard_id',$data);
      foreach($e_data as $row_1){  ?>
<div class="main_content" >
    <div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">E - Invoice</h4>
    <hr>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>front/invoice_edit/<?php echo $data; ?>/<?php echo $row_1['id']; ?>"  enctype="multipart/form-data">
        <div class="col-sm-12 form-group">
                <label for="look">File Name</label>
                <input type="text" class="form-control input_box reset_val" name="file_name" value="<?php echo $row_1['file_name']; ?>" placeholder="Title Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Logo Picture</label>
                <input type="file" class="form-control input_box reset_val" name="logo_pic" placeholder="Logo Picture">
            </div>
            <h3 class="col-md-12  pt-2 pb-2">From </h3>
            <div class="col-sm-12 form-group">
                <label for="look">Name</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="inv_from"  value="<?php echo $row_1['inv_from']; ?>"  placeholder="Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Email</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_email"  value="<?php echo $row_1['from_email']; ?>"  placeholder="Email Id">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Address</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_address"  value="<?php echo $row_1['from_address']; ?>"  placeholder="Address">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Phone</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_phone"  value="<?php echo $row_1['from_phone']; ?>"   placeholder="Phone">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Business Number</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_bus_phone"  value="<?php echo $row_1['from_bus_phone']; ?>"   placeholder="Business Number">
            </div>
            <h3 class="col-md-12 pt-2 pb-2">Bill To </h3>
            <div class="col-sm-12 form-group">
                <label for="look"></label>
                <input type="text" class="form-control input_box reset_val" row="3" name="inv_to"  value="<?php echo $row_1['inv_to']; ?>" placeholder="Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Email</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="to_email"  value="<?php echo $row_1['to_email']; ?>" placeholder="Email Id">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Address</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="to_address" value="<?php echo $row_1['to_address']; ?>"  placeholder="Address">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Phone</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="to_phone" value="<?php echo $row_1['to_phone']; ?>"  placeholder="Phone">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Invoice #</label>
                <input type="text" class="form-control input_box reset_val" name="invoice" value="<?php echo $row_1['invoice']; ?>"  placeholder="Invoice #">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Date</label>
                <input type="date" class="form-control input_box reset_val" name="date" value="<?php echo $row['date']; ?>"  placeholder="Date">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Payment Terms</label>
                <input type="text" class="form-control input_box reset_val" name="payment_terms" value="<?php echo $row_1['payment_terms']; ?>"  placeholder="Payment Terms">
            </div>
             <input type="hidden" value="1" name="count" class="count">
            
             <div class="myDiv" style="width:100%;">
             <?php  $inv_sub = $this->Admin_model->table_column('invoice_sub','inv_id',$row_1['id']);
                                foreach($inv_sub as $row_2){ ?>
             <hr  class="hor">
            <div class="col-sm-12 form-group">
                <label for="look">Item Details</label>
                <textarea type="text" class="form-control input_box reset_val item_1" row="3" name="item_details[]"  style="width:80%" placeholder="Item Details"><?php echo $row_2['item_detail']; ?></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Quantity</label>
                <input type="text" class="form-control input_box quantity_1 reset_val" name="qty[]" style="width:80%" value="<?php echo $row_2['qty']; ?>" placeholder="Enter Quantity">
             </div>
             <div class="col-sm-12 form-group">
                <label for="look">Rate</label>
                <input type="text" class="form-control input_box rate_1 reset_val rate" name="rate[]"  placeholder="Rate" value="<?php echo $row_2['rate']; ?>" style="width:80%">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Amount</label>
                <input type="text" class="form-control input_box amount_1 reset_val" name="amount[]"  placeholder="Amount" value="<?php echo $row_2['amount']; ?>" style="width:80%">
            </div>
      <?php } ?>
            <hr  class="hor">
            </div>
           <div class="col-sm-12 form-group">
            <a href="javascript:void(0);" class="addCF col-sm-1" style="width:20%;">
                <button type="button" style="" id="btn1" class="btn btn-success btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add More</button></a>
            </div>
           
            <div class="col-sm-12 form-group">
                <label for="look">Other Charges</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="other_charges" value="<?php echo $row_1['other_charges']; ?>"  placeholder="Other Charges" >
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Total</label>
                <input type="text" class="form-control input_box reset_val" name="total" value="<?php echo $row_1['total']; ?>"  placeholder="Total" >
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Amount Paid</label>
                <input type="text" class="form-control input_box reset_val" name="amount_paid" value="<?php echo $row_1['amount_paid']; ?>"  placeholder="Amount Paid" >
            </div>
            <div class="col-sm-12 form-group" >
                <label for="look">Balance Due</label><span style="margin-left:20px;"></span>
               <input type="text" class="form-control input_box reset_val" name="due" value="<?php echo $row_1['due']; ?>"  placeholder="Balance Due" >
                
            </div>
           <div class="set_button">
                <div class="buttons" style="margin: 0px auto;width:70%;">
                    <button type="submit">Create Invoice</button>
                </div>
            </div>
        </form>
    </div>
    </div>

</div>
      <?php } } ?>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.add',function(){
       var count = Number($('.count').val());
       var pres_count = count+1;
       $('.myDiv').append('<div><div class="col-sm-12 form-group"><label for="look">Item Details</label><textarea type="text" class="form-control input_box reset_val item_'+pres_count+'" row="3"name="item_details[]"  style="width:80%" placeholder="Item Details"></textarea></div><div class="col-sm-12 form-group"><label for="look">Quantity</label><input type="text" class="form-control input_box reset_val quantity_'+pres_count+'" style="width:80%" name="qty[]"  placeholder="Enter Quantity"></div><div class="col-sm-12 form-group"><label for="look">Rate</label><input type="text" class="form-control input_box reset_val rate rate_'+pres_count+'" name="rate[]"  placeholder="Rate" style="width:80%"></div><div class="col-sm-12 form-group"><label for="look">Amount</label><div style="width:100%;display:flex;"><input type="text" class="form-control input_box reset_val amount_'+pres_count+'" name="amount[]"  placeholder="Amount" style="width:80%"><a href="javascript:void(0);" class="Remove col-sm-1" style="width:20%;"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button></a></div></div><hr class="hor"></div>');
       $('.count').val(pres_count);
    });


$(document).on('click', "a.Remove", function() { 
    var count = Number($('.count').val());
    $(this).parent().parent().parent().remove();
    $('.count').val(count-1);
});
$(document).on('keyup','.rate',function(){
    var rate = $(this).val();
    var qty = $(this).parent().prev().find('input').val();
    var amount = rate*qty;
    $(this).parent().next().find('input').val(amount);
});

</script>