<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
<div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">Promote</h4>
    <hr>
    
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>front/promote"  enctype="multipart/form-data">
            
            <div class="col-sm-12 form-group">
                <label for="look">Duration</label>
                <input type="hidden" name="post_data" value="<?php echo $data; ?>">
                <input type="text" class="form-control input_box buisness days" name="duration"  placeholder="Enter No of Days">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">City</label>
                <input type="text" class="form-control input_box buisness city" name="city"  placeholder="Enter City">
            </div>
            <h5 style="margin-left:50px;">Or</h5>
            <div class="col-sm-12 form-group">
                <label for="look">State</label>
                <input type="text" class="form-control input_box buisness state" name="state"  placeholder="Enter State">
            </div>
            <hr class="hor">
            <div class="col-sm-12 form-group">
                <label for="look">Amount</label>
                <input type="text" class="form-control input_box buisness amount" name="amount"  placeholder="Enter amount">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Tax</label>
                <input type="text" class="form-control input_box buisness tax" name="tax"  placeholder="Enter Tax">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Payable Amount</label>
                <input type="text" class="form-control input_box buisness" name="payable"  placeholder="Enter Payable">
            </div>
            <div class="set_button">
                <div class="buttons">
                    <div class="reset">Reset</div>
                </div>
                <div class="buttons">
                    <button type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
    </div>

</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.reset',function(){
        $('.buisness').val('');
    });
    $(document).on('keyup','.city',function(){
        var price = 20;
        var days = Number($('.days').val());
        var amount = price*days;
        var tax = amount*18/100;
        $('.tax').val(tax);
        $('.amount').val(amount);
    });
     $(document).on('keyup','.state',function(){
        var price = 100;
        var days = Number($('.days').val());
        var amount = price*days;
        var tax = amount*18/100;
        $('.tax').val(tax);
        $('.amount').val(amount);
    });
</script>