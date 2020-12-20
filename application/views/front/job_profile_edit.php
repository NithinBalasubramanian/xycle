<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php $e_inv_data = $this->Admin_model->table_column('ecard','id',$data);
    foreach($e_inv_data as $row){ 
      $e_data = $this->Admin_model->table_column('job_profile','ecart_id',$data);
      foreach($e_data as $row_1){  ?>
<div class="main_content" >
    <div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">Job Profile</h4>
    <hr>
    <h5 style="text-align:center;">Create Your <span style="color:#20BA1A;">Job Profile</span> Here</h5>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>front/job_profile_edit/<?php echo $data; ?>/<?php echo $row_1['id']; ?>"  enctype="multipart/form-data">
            
            <div class="col-sm-12 form-group">
                <label for="look">Title</label>
                <input type="text" class="form-control input_box title" name="title" value="<?php echo $row_1['header_title']; ?>" placeholder="Enter Title">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Header Image</label><span style="margin-left:20px;"></span>
                <input type="file" class="form-control input_box profile_img" name="profile_img" placeholder="Header Image">
            </div>
            <div class="myDiv">
            <?php $sub_cont = $this->Admin_model->table_column('job_profile_sub','job_profile_id',$row_1['id']);
                    foreach($sub_cont as $row_3){ ?>
                <hr  class="hor">
            <div class="col-sm-12 form-group">
                <label for="look">Sub Heading</label>
                <input type="text" class="form-control input_box title" name="sub_head[]"  placeholder="Sub Heading" value="<?php echo $row_3['sub_heading']; ?>" style="width:80%">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Description</label>
                <textarea type="text" class="form-control input_box description" row="3" name="sub_description[]"  placeholder="Enter Description" style="width:80%"><?php echo $row_3['sub_description']; ?></textarea>
            </div>
            <div class="col-sm-12 form-group" >
           
                <label for="look">Image</label><span style="margin-left:20px;"></span>
                 <div style="width:100%;display:flex;">
                <input type="file" class="form-control input_box profile_img" name="sub_img[]" placeholder="Image" style="width:80%">
                </div>
            </div>
                    <?php } ?>
            <hr  class="hor">
        </div>
            <a href="javascript:void(0);" class="addCF col-sm-1" style="width:20%;">
                <button type="button" style="" id="btn1" class="btn btn-success btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
             Add More</button> </a>
            <div class="col-sm-12 form-group">
                <label for="look">Notes</label>
                <textarea type="text" class="form-control input_box description" row="3"name="note"  placeholder="Enter Notes" style="width:80%"><?php echo $row_1['notes']; ?></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Terms</label>
                <textarea type="text" class="form-control input_box description" row="3"name="term"  placeholder="Enter Terms" style="width:80%"><?php echo $row_1['terms']; ?></textarea>
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
      <?php } } ?>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.reset',function(){
        $('.promo_video').val('');
        $('.description').val('');
        $('.title').val('');
    });
</script>
<script>
$(document).ready(function(){
	$(".addCF").click(function(){
    $(".myDiv").append('<div ><div class="col-sm-12 form-group"><label for="look">Sub Heading</label><input type="text" class="form-control input_box title" name="sub_head[]"  placeholder="Sub Heading" style="width:80%"> </div><div class="col-sm-12 form-group"><label for="look">Description</label><textarea type="text" class="form-control input_box description" row="3" name="sub_description[]"  placeholder="Enter Description" style="width:80%"></textarea></div><div class="col-sm-12 form-group" ><label for="look">Image</label><span style="margin-left:20px;"></span><div style="width:100%;display:flex;"> <input type="file" class="form-control input_box profile_img" name="sub_img[]" placeholder="Image" style="width:80%"><a href="javascript:void(0);" class="Remove col-sm-1" style="width:20%;"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button></a></div></div><hr class="hor">');
    });
});
$(document).on('click', "a.Remove", function() { 
    $(this).parent().parent().parent().remove();
});

</script>