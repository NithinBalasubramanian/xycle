<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
    <div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">Promo Video</h4>
    <hr>
    <?php $this_data=$this->Admin_model->table_column('ecard','id',$data);
    foreach($this_data as $row){ ?>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>Front/promo_edit/<?php echo $data; ?>"  enctype="multipart/form-data">
            
            <div class="col-sm-12 form-group">
                <label for="look">Title</label>
                <input type="hidden" name="edit_id" value="<?php echo $data; ?>">
                <input type="text" class="form-control input_box buisness" name="buisness_name"  placeholder="Enter Title" value="<?php echo $row['buisness_name']; ?>" placeholder="Enter Buisness Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Description</label>
                <textarea type="text" class="form-control input_box description" name="description" placeholder="Enter Description" row="10"> <?php echo $row['description']; ?></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Upload Video</label>
                <input type="file" class="form-control input_box video" name="video" placeholder="Upload Video">
            </div>
            
            <div class="set_button">
                <div class="buttons">
                    <div class="reset">Reset</div>
                </div>
                <div class="buttons">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <?php } ?>

</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.reset',function(){
        $('.buisness').val('');
        $('.video').val('');
        $('.description').val('');
    });
</script>