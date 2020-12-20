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
        <form class="row cart" method="post" action="<?php echo base_url(); ?>Front/meme_edit/<?php echo $data; ?>"  enctype="multipart/form-data">
            <div class="col-sm-12 form-group">
                <label for="look">Choose File</label>
                <input type="file" name="meme_img" class="form-control reset_data">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Choose Template</label>
                <div style="width:100%;display:flex;">
                <div class="checkbox2" style="width:40%;text-align:center;">
                <label>
                <input type="radio" name="mode" value="light" <?php if($row['mode']=='light'){ ?>checked <?php } ?>>Light</label>
                </div>
                <div class="checkbox1" style="width:40%;text-align:center;">
                    <label><input type="radio" name="mode" value="dark"  <?php if($row['mode']=='dark'){ ?>checked <?php } ?>>   Dark</label>
                </div>
                </div>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Text Top</label>
                <input type="text" class="form-control input_box reset_data" name="title_top"  placeholder="Text Top"  value="<?php echo $row['meme_top']; ?>" >
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Text Bottom</label>
                <input type="text" class="form-control input_box reset_data" name="title_bottom"  placeholder="Text Bottom"  value="<?php echo $row['meme_bottom']; ?>" >
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
        $('.reset_data').val('');
    });
</script>