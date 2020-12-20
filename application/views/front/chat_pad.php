<?php $this->load->view('front/include/header.php'); ?>
<?php $user_id=$this->session->userdata('user_id');
$pro_data=$this->Admin_model->table_column('profile','user_id',$data);
        foreach($pro_data as $row1){ ?>
   
 <div class="first">
        <div class="top_part">
            <div class="post_profile">
                <div class="arrow">
                    <a href="<?php echo base_url(); ?>View/front/chat"><i class="fa fa-arrow-left arr_left" aria-hidden="true"></i></a>
                </div>
                <div class="post_profile_img1">
                <?php if($row1['img'] != ''){ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row1['img']; ?>" alt="img" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                <?php } ?>
                </div>
                <div class="post_profile_name1">
                    <div class="name" style="text-transform:uppercase;"><?php echo $row1['user_name']; ?>
                    <p><?php echo $row1['designation']; ?></div>
                </div>
            </div>
            <div class="post_drop1">
                <i class="fa fa-ellipsis-v icon_2 drop_on" aria-hidden="true"></i>
            </div>
        </div>
        </div>
<div class="main_content1">
    <div class="post_content1" >
       
        <div class="second">
        <div class="post_middle_part1" id="chat_content">
        <div class="chatt" id="chat_load" >
            
        </div>
        </div>
        </div>
    </div>
</div>
<div class="third">
            <div class="comment_div1 " >
            <form method="post" id="chat_submit">
             <div class="fileDiv"><i class="fa fa-paperclip icon_21" aria-hidden="true"></i>
                <input type="file" name="file" class="upload_attachmentfile"/></div>
                <input type="hidden" name="chat_to" value="<?php echo $data; ?>">
                <textarea type="input" name="chat" class="col-md-10 comment11 " row="4" placeholder="Chat Here"></textarea>
                <button type="submit"><i class="fa fa-paper-plane icon_22" aria-hidden="true"></i></button>
            </form>
            </div>
        </div>

        <?php } ?>

<?php $this->load->view('front/include/footer_chat.php'); ?>
<script>
     $(document).on('submit','#chat_submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
		var url= "<?php echo base_url(); ?>Front/chat";
        $.ajax({
            type:'POST',
            url: url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('.comment11').val("");
                $('.upload_attachmentfile').val("");
            }
        });
    });
    function repeat()
    {
        var sender_id = "<?php echo $data; ?>";
        var receiver_id = "<?php echo $user_id; ?>";
        var base_url = "<?php echo base_url(); ?>";
        var tablename = 'chat';
		$.ajax({
            url: base_url+'Front/load_chat',
            type: 'POST',
            data: "sender_id=" + sender_id +"&receiver_id="+receiver_id+"&tablename="+tablename ,
            success: function(data) {
                $('#chat_load').html(data);
            }
        });
    }
    setInterval(() => {
        repeat()
    }, 500);
    function ScrollDown(){
	var elmnt = document.getElementById("chat_content");
    var h = elmnt.scrollHeight;
   $('#chat_content').animate({scrollTop: h}, 1000);
}
window.onload = ScrollDown();
</script>
