<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
    <div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">E - Invoice</h4>
    <hr>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>front/invoice"  enctype="multipart/form-data">
            
            <div class="col-sm-12 form-group">
                <label for="look">File Name</label>
                <input type="text" class="form-control input_box reset_val" name="file_name"  placeholder="Title Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Logo Picture</label>
                <input type="file" class="form-control input_box reset_val" name="logo_pic" placeholder="Logo Picture">
            </div>
            <h3 class="col-md-12  pt-2 pb-2">From </h3>
            <div class="col-sm-12 form-group">
                <label for="look">Name</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="inv_from"  placeholder="Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Email</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_email"  placeholder="Email Id">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Address</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_address"  placeholder="Address">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Phone</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_phone"  placeholder="Phone">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Business Number</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="from_bus_phone"  placeholder="Business Number">
            </div>
            <h3 class="col-md-12 pt-2 pb-2">Bill To </h3>
            <div class="col-sm-12 form-group">
                <label for="look"></label>
                <input type="text" class="form-control input_box reset_val" row="3" name="inv_to"  placeholder="Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Email</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="to_email"  placeholder="Email Id">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Address</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="to_address"  placeholder="Address">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Phone</label>
                <input type="text" class="form-control input_box reset_val" row="3" name="to_phone"  placeholder="Phone">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Invoice #</label>
                <input type="text" class="form-control input_box reset_val" name="invoice"  placeholder="Invoice #">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Date</label>
                <input type="date" class="form-control input_box reset_val" name="date"  placeholder="Date">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Payment Terms</label>
                <input type="text" class="form-control input_box reset_val" name="payment_terms"  placeholder="Payment Terms">
            </div>
             <input type="hidden" value="1" name="count" class="count">
            
             <div class="myDiv" style="width:100%;">
             <hr  class="hor">
            <div class="col-sm-12 form-group">
                <label for="look">Item Details</label>
                <input type="text" class="form-control input_box reset_val item_1" row="3" name="item_details[]"  style="width:80%" placeholder="Item Details">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Quantity</label>
                <input type="text" class="form-control input_box quantity_1 reset_val" name="qty[]" style="width:80%" placeholder="Enter Quantity">
             </div>
             <div class="col-sm-12 form-group">
                <label for="look">Rate</label>
                <input type="text" class="form-control input_box rate rate_1 reset_val" name="rate[]"  placeholder="Rate" style="width:80%"  autocomplete="off">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Amount</label>
                <input type="text" class="form-control input_box amount_1 reset_val" name="amount[]"  placeholder="Amount" style="width:80%">
            </div>
            <hr  class="hor">
            </div>
           <div class="col-sm-12 form-group">
            <a href="javascript:void(0);" class="addCF col-sm-1" style="width:20%;">
                <button type="button" style="" id="btn1" class="btn btn-success btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add More</button></a>
            </div>
           <input type="hidden" class="hid_total" value="0">
            <div class="col-sm-12 form-group">
                <label for="look">Other Charges</label>
                <textarea type="text" class="form-control input_box reset_val other" row="3" name="other_charges"  placeholder="Other Charges" ></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Total</label>
                <input type="text" class="form-control input_box reset_val total" name="total"  placeholder="Total" >
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Amount Paid</label>
                <input type="text" class="form-control input_box reset_val paid" name="amount_paid"  placeholder="Amount Paid" >
            </div>
            <div class="col-sm-12 form-group" >
                <label for="look">Balance Due</label><span style="margin-left:20px;"></span>
               <input type="text" class="form-control input_box reset_val due" name="due"  placeholder="Balance Due" >
                
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


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.add',function(){
       var count = Number($('.count').val());
       var pres_count = count+1;
       $('.myDiv').append('<div><div class="col-sm-12 form-group"><label for="look">Item Details</label><textarea type="text" class="form-control input_box reset_val item_'+pres_count+'" row="3"name="item_details[]"  style="width:80%" placeholder="Item Details"></textarea></div><div class="col-sm-12 form-group"><label for="look">Quantity</label><input type="text" class="form-control input_box reset_val quantity_'+pres_count+'" style="width:80%" name="qty[]"  placeholder="Enter Quantity"></div><div class="col-sm-12 form-group"><label for="look">Rate</label><input type="text" class="form-control input_box reset_val rate  rate_'+pres_count+'" name="rate[]"  placeholder="Rate" style="width:80%" autocomplete="off"></div><div class="col-sm-12 form-group"><label for="look">Amount</label><div style="width:100%;display:flex;"><input type="text" class="form-control input_box reset_val amount_'+pres_count+'" name="amount[]"  placeholder="Amount" style="width:80%"><a href="javascript:void(0);" class="Remove col-sm-1" style="width:20%;"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button></a></div></div><hr class="hor"></div>');
       $('.count').val(pres_count);
       var total=$('.total').val();
       $('.hid_total').val(total);
    });


$(document).on('click', "a.Remove", function() { 
    var count = Number($('.count').val());
    $(this).parent().parent().parent().remove();
    $('.count').val(count-1);
});
$(document).on('keyup','.rate',function(){
    var rate = $(this).val();
    var qty = $(this).parent().prev().find('input').val();
    var hid_total = Number($('.hid_total').val());
    var amount = rate*qty;
    var overall = hid_total+amount;
    $('.total').val(overall);
    $(this).parent().next().find('input').val(amount);
});
$(document).on('change','.other',function(){
    var other = Number($(this).val());
    var total = Number($('.total').val());
    var amount = other+total;
    $('.total').val(amount);
});
$(document).on('keyup','.paid',function(){
    var paid = Number($(this).val());
    var total = Number($('.total').val());
    var due = total-paid;
    $('.due').val(due);
});

</script>