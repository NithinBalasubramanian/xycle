<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php  $user_id=$this->session->userdata('user_id'); 
$user_plan = $this->session->userdata('plan');
$user_data=$this->Admin_model->table_column('profile','user_id',$user_id);
foreach($user_data as $user_row){
    $user_name = $user_row['user_name']; 
} ?>

<div class="main_content">
    <div class="new_icon">
        <a href="<?php echo base_url(); ?>View/front/my_post" class="new_icon1" style="color:#000000;">
            <i class="fa fa-clipboard content_icon" aria-hidden="true"></i>
            <p class="icon_sub1">Post</p>
        </a>
        <a href="<?php echo base_url(); ?>View/front/my_saved_post" class="new_icon2">
            <i class="fa fa-file-text content_icon" aria-hidden="true"></i>
            <p class="icon_sub">Saved</p>
        </a>
        <a href="<?php echo base_url(); ?>View/front/my_shared_post"  class="new_icon3">
            <i class="fa fa-clipboard content_icon" aria-hidden="true"></i>
            <p class="icon_sub">Shared</p>
        </a>
    </div>
     <?php  $user_id=$this->session->userdata('user_id');
     $card_data=$this->Admin_model->table_column_desc('ecard','user_id',$user_id);
     $i=1;
     $k=1;
        if(count($card_data)>0){
        foreach($card_data as $row){ ?>
    <div class="post">
    <?php $pro_data=$this->Admin_model->table_column('profile','user_id',$row['user_id']);
        foreach($pro_data as $row1){ 
            $user_plan_get_id = $this->Admin_model->table_column('user','user_id',$row['user_id']);
            foreach($user_plan_get_id as $plan_row){
                $plan= $plan_row['plan_type'];
            }
            if($user_plan == '1'){
                $f=1;
            if($i == 1 || $i%2 == 0){ ?>
            <div class="post_content">
            <?php 
            $ad_count = $this->Admin_model->table_column('ads');
            if(count($ad_count) < $k){
                $k =1;
                $f=1;
            }
            $ads = $this->Admin_model->table_column('ads');
            foreach($ads as $ad_row){ 
                if($k == $f){ ?>
        <div class="admin_ad">
            <div class="ad_top">
                <div class="title"><?php echo $ad_row['title'];?></div>
                <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
            </div>
            <div class="ad_img">
                <img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $ad_row['img']; ?>" alt="">
            </div>
        </div>
                <?php } $f++;} ?>
        </div>
            <?php $k++;} ?>
            <?php } ?>
        <div class="top_part">
            <div class="post_profile">
                <div class="post_profile_img">
                    <?php if($row1['img'] != ''){ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row1['img']; ?>" alt="img" >
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                    <?php } ?>
                </div>
                <div class="post_profile_name">
                    <div class="name" style="text-transform:uppercase;"><?php echo $row1['user_name']; ?>
                    <p><?php echo $row1['designation']; ?></p></div>
                </div>
            </div>
            <div class="post_drop">
                <i class="fa fa-ellipsis-v icon_2 drop_on" aria-hidden="true"></i>
            <div class="over_icon none" style="color:#20BA1A;">
            <?php $saved_data = $this->Admin_model->table_column('saved','user_id',$user_id,'saved_id',$row['id']);
                if(count($saved_data) == 0){ ?>
                <p data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" class="save_cont save_<?php echo $row['id'];?> save_this">Save</p>
                <?php }else{ ?>
                    <p data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" class="save_cont remove_<?php echo $row['id'];?> remove_this">Saved</p>
                <?php } ?>
                <?php $share_data = $this->Admin_model->table_column('shared','user_id',$user_id,'shared_id',$row['id']);
                if(count($share_data) == 0){ ?>
                <p data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" class="save_cont share_<?php echo $row['id'];?> share_this">Share</p>
                <?php }else{ ?>
                    <p data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" class="save_cont disshare_<?php echo $row['id'];?> disshare_this">Shared</p>
                <?php } ?>
                 <p class="copy_url_<?php echo $i; ?>" style="display:none;"><?php echo base_url(); ?>View/front/<?php if($row['post_type'] == 'e_card'){ ?>e_card_disp<?php }elseif($row['post_type'] =='promo' ){ ?>promo_disp<?php } ?>/<?php echo $row['id']; ?></p><p class="copy_this">Copy link</p><input type="hidden" value="<?php echo $i; ?>">
                <?php 
                if($row['user_id'] == $user_id){ ?>
                <p><a href="<?php echo base_url(); ?>View/front/e_cart_edit/<?php echo $row['id'];?>">Edit</a></p>
                <p>Analytics</p>
                <p>Promote</p>
                <p><a href="<?php echo base_url(); ?>Front/delete_data/<?php echo $row['id'];?>/home">Delete</a></p>
                <?php } ?>
            </div>
            </div>
        </div>
        <?php } ?>
        <div class="post_middle_part">
        <?php if($row['post_type'] == 'e_card'){ ?>
        <div class="main_e_card" id="page_pdf">
        <?php if($plan == 1){ ?>
                <div class="sub_img" style="background-image:url('<?php echo base_url(); ?>assets/admin/img/x_green.png');"></div>
                <div class="sub_img" style="background-image:url('<?php echo base_url(); ?>assets/user/ecard/profile/<?php echo $row['logo']; ?>');"></div>
            <?php }else{ ?>
            <div class="main_img" style="background-image:url('<?php echo base_url(); ?>assets/user/ecard/profile/<?php echo $row['logo']; ?>');">
            </div>
            <?php } ?>
            <div class="ecart_profile"  style="background-color:<?php echo $row['color']; ?>;">
                <div class="post_profile_img">
                    <?php if($row['profile_img'] != ""){ ?>
                <img src="<?php echo base_url(); ?>assets/user/ecard/profile/<?php echo $row['profile_img']; ?>" alt="img" style ="width:90%;height:120px;border-radius:20px;margin-top:-30px;padding:10px;">
                    <?php }else{ ?>
                        <?php if($row1['img'] != ''){ ?>
                            <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row1['img']; ?>" alt="img" style ="width:90%;height:120px;border-radius:20px;margin-top:-30px;padding:10px;">
                        <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" style ="width:90%;height:120px;border-radius:20px;margin-top:-30px;padding:10px;">
                     <?php } ?>
                        
                    <?php } ?>
            </div>
                <div class="post_profile_name1" style="width:60%;height:100%;">
                    <div class="name" style=" padding:5px;width:95%;height:90%;text-transform:uppercase; "><p style="color:white;"><?php echo $row['person_name']; ?></p>
                    <i style="color:white;font-size:13px;"><?php echo $row['designation']; ?></i>
                </div>
            </div>
        </div>
        <div class="ecart_content_main" style="color:<?php echo $row['color']; ?>;">
            <div class="name" style=" padding:5px;width:95%;height:90%; "><h5 style="color:black;"><?php echo $row['buisness_name']; ?></h5>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['address']; ?></p>
            <p><?php echo $row['description']; ?></p>
            <h6 class="num" style=" font-weight: bold;margin-top: 25px;color:black;">Contact</h6>
            <div class="links">
                <div class="con_icon">
                    <p class="one"><i class="fa fa-phone phone" aria-hidden="true"></i></p>
                </div>
                <div class="con_icon">
                    <p class="two"><i class="fa fa-envelope phone" aria-hidden="true"></i></p>
                </div>
                <div class="con_icon">
                    <p class="three"><i class="fa fa-chevron-circle-up phone" aria-hidden="true"></i></p>
                </div>
            </div>
            <div class="view_on_touch">
                <?php echo $row['mobile']; ?>
            </div>
            <div class="view_on_touch">
                <?php echo $row['email']; ?>
            </div>
            <div class="view_on_touch">
                <?php echo $row['website']; ?>
            </div>
           <!-- <p><i class="fa fa-phone phone" aria-hidden="true"></i> <?php echo $row['mobile']; ?></p>
            <p><i class="fa fa-envelope phone" aria-hidden="true"></i> <?php echo $row['email']; ?></p>
            <p><i class="fa fa-chevron-circle-up phone" aria-hidden="true"></i> <?php echo $row['website']; ?></p> -->
        </div>
</div>
<p>Follow Me On</p>
    <div class="links">
        <?php if( $row['insta'] != ""){ ?>
        <a class="insta icons" href="<?php echo $row['insta']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <?php } 
        if( $row['fb'] != ""){ ?>
        <a class="fb icons"  href="<?php echo $row['fb']; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <?php } 
        if( $row['twitter'] != ""){ ?>
        <a class="twitter icons"  href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <?php } 
        if( $row['watsapp'] != ""){ ?>
        <a class="watsapp icons" href="<?php echo $row['watsapp']; ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        <?php } 
        if( $row['youtube'] != ""){ ?>
        <a class="youtube icons" href="<?php echo $row['youtube']; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        <?php } 
        if( $row['linkedin'] != ""){ ?>
        <a class="linked icons" href="<?php echo $row['linkedin']; ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        <?php }  ?>
    </div>
    </div>
        <?php }elseif($row['post_type'] == 'promo'){ ?>
           <div class="promo_cont">
                    <h5><?php echo $row['buisness_name']; ?></h5>
                    <p><?php echo $row['description']; ?></p>
                    <video width="100%" height="250px" controls>
                    <source src="<?php echo base_url(); ?>assets/user/ecard/video/<?php echo $row['promo_video']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
           </div>
        <?php } ?>
        </div>
        <div class="post_bottom_part">
            <div class="post_bottom_options">
            <?php $like_data = $this->Admin_model->table_column('liked','user_id',$user_id,'like_id',$row['id']);
                if(count($like_data) == 0){ ?>
                <div class="like_cont like_icon_<?php echo $row['id'];?> like_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>">
                <i class="fa fa-thumbs-o-up icon_2" aria-hidden="true"></i>
                <div class="text">Like</div>
                </div>
                <div class="save_cont dislike_icon_<?php echo $row['id'];?> dislike_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" style="display:none;">
                <i class="fa fa-thumbs-up icon_2" aria-hidden="true"></i>
                <div class="text">Liked</div>
                </div>
                <?php }else{ ?>
                <div class="save_cont dislike_icon_<?php echo $row['id'];?> dislike_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" >
                <i class="fa fa-thumbs-up icon_2" aria-hidden="true"></i>
                <div class="text">Liked</div>
                </div>
                <div class="save_cont like_icon_<?php echo $row['id'];?> like_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" style="display:none;">
                <i class="fa fa-thumbs-o-up icon_2" aria-hidden="true"></i>
                <div class="text">Like</div>
                </div>
                <?php } ?>
            </div>
            <div class="post_bottom_options comment_this">
                <i class="fa fa-commenting-o icon_2" aria-hidden="true"></i>
                <div class="text">Comment</div>
            </div>
            <div class="post_bottom_options ">
            <?php $share_data = $this->Admin_model->table_column('shared','user_id',$user_id,'shared_id',$row['id']);
                if(count($share_data) == 0){ ?>
                <div class="like_cont share_icon_<?php echo $row['id'];?> share_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>">
                <i class="fa fa-share-alt icon_2" aria-hidden="true"></i>
                <div class="text">Share</div>
                </div>
                <div class="save_cont disshare_icon_<?php echo $row['id'];?> disshare_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" style="display:none;">
                <i class="fa fa-share-alt-square icon_2" aria-hidden="true"></i>
                <div class="text">Shared</div>
                </div>
                <?php }else{ ?>
                <div class="save_cont disshare_icon_<?php echo $row['id'];?> disshare_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" >
                <i class="fa fa-share-alt-square icon_2" aria-hidden="true"></i>
                <div class="text">Shared</div>
                </div>
                <div class="save_cont share_icon_<?php echo $row['id'];?> share_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" style="display:none;">
                <i class="fa fa-share-alt icon_2" aria-hidden="true"></i>
                <div class="text">Share</div>
                </div>
                <?php } ?>
            </div>
            <div class="post_bottom_options">
            <?php $saved_data = $this->Admin_model->table_column('saved','user_id',$user_id,'saved_id',$row['id']);
                if(count($saved_data) == 0){ ?>
                <div class="save_cont save_icon_<?php echo $row['id'];?> save_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>">
                <i class="fa fa-bookmark-o icon_2" aria-hidden="true" ></i>
                <div class="text">Save</div>
                </div>
                <div class="save_cont remove_icon_<?php echo $row['id'];?> remove_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" style="display:none;">
                <i class="fa fa-bookmark icon_2 " aria-hidden="true"></i>
                <div class="text">Saved</div>
                </div>
                <?php }else{ ?>
                <div class="save_cont remove_icon_<?php echo $row['id'];?> remove_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" >
                <i class="fa fa-bookmark icon_2 " aria-hidden="true"></i>
                <div class="text">Saved</div>
                </div>
                <div class="save_cont save_icon_<?php echo $row['id'];?> save_this"  data-cont_id="<?php echo $row['id'];?>" data-own_id="<?php echo $row1['user_id'];?>" style="display:none;">
                <i class="fa fa-bookmark-o icon_2" aria-hidden="true" ></i>
                <div class="text">Save</div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="comment_div">
        <form method="post" id="comment_on">
            <input type="hidden" name="comment_id" value="<?php echo $row['id'];?>" >
            <input type="hidden" name="own_id" value="<?php echo $row1['user_id'];?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <input type="hidden" name="" id="" value="<?php echo $user_name; ?>">
            <textarea type="input" name="comment" class="col-md-10 comment1 " row="4" placeholder="Enter Comments Here"></textarea>
            <button type="submit"><i class="fa fa-paper-plane icon_2" aria-hidden="true"></i></button>
        </form>
        </div>
        <div class="comment_ajax"></div>
        <?php $comment_data = $this->Admin_model->table_column('comment','comment_on',$row['id']);
        if(count($comment_data) > 0 ) { ?>
        <div class="comment_view">
            <?php foreach($comment_data as $com){
                $own_data = $this->Admin_model->table_column('profile','user_id',$com['user_id']);
                foreach($own_data as $own_name){ ?>
            <p><b><?php echo $own_name['user_name']; ?></b> : <?php echo $com['comment']; ?></p>
            <?php } } ?>
        </div>
        <?php }else{ ?>
            <div class="else_to"></div>
        <?php } ?>
    </div>
        <?php } ?>
        <?php }else{ ?>
            <div class="post text-center" style="height:500px;padding:20px;">
            <?php $main_ad = $this->Admin_model->table_column_limit_desc('ads','1');
                    foreach($main_ad as $ad_row){ ?>
                     <div class="admin_ad">
                    <div class="ad_top">
                        <div class="title"><?php echo $ad_row['title'];?></div>
                        <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
                    </div>
                    <div class="ad_img">
                        <img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $ad_row['img']; ?>" alt="">
                    </div>
                </div>
                    <?php } ?>
                No posts Found
            </div>
        <?php } ?>
   
</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.one',function(){
        $(this).parent().parent().next().toggleClass('view_this');
    });
    $(document).on('click','.two',function(){
        $(this).parent().parent().next().next().toggleClass('view_this');
    });
    $(document).on('click','.three',function(){
        $(this).parent().parent().next().next().next().toggleClass('view_this');
    });
    $(document).on('click','.comment_this',function(){
        $(this).parent().next().toggleClass('view_this');
    });
    function copy(copy_this)
    {
        var $inp=$('<input>');
        $("body").append($inp);
        $inp.val($(""+copy_this).text()).select();
        document.execCommand("copy");
        $inp.val("");
        $inp.remove();
    }
    $(document).on('click','.copy_this',function(){
        var count=$(this).next().val();
        copy('.copy_url_'+count);
        $(this).html('copied');
    });
    $(document).on('click','.save_this',function(){
        var own_id = $(this).data('own_id');
        var cont_id = $(this).data('cont_id');
        var tablename = 'saved';
                    $('.save_'+cont_id).html('Saved');
                    $('.save_'+cont_id).removeClass('save_this');
                    $('.save_'+cont_id).addClass('remove_this');
                    $('.save_'+cont_id).addClass('remove_'+cont_id);
                    $('.save_icon_'+cont_id).css('display','none');
                    $('.remove_icon_'+cont_id).css('display','block');
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/save',
            type: 'POST',
            dataType: "json",
            data: "own_id=" + own_id +"&cont_id="+cont_id+"&tablename="+tablename ,
            beforeSend: function(){
                $('.save_'+cont_id).html('Saving...');
            },
            success: function(data) {
                if(data == 1){
                   
               }
            }
        });
    });
    $(document).on('click','.remove_this',function(){
        var own_id = $(this).data('own_id');
        var cont_id = $(this).data('cont_id');
        var tablename = 'saved';
                    $('.remove_'+cont_id).html('Save');
                    $('.remove_icon_'+cont_id).css('display','none');
                    $('.save_icon_'+cont_id).css('display','block');
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/remove',
            type: 'POST',
            dataType: "json",
            data: "own_id=" + own_id +"&cont_id="+cont_id+"&tablename="+tablename ,
            success: function(data) {
                if(data == 1){
                
               }
            }
        });
    });
    $(document).on('click','.like_this',function(){
        var own_id = $(this).data('own_id');
        var cont_id = $(this).data('cont_id');
        var tablename = 'liked';
            $('.like_icon_'+cont_id).css('display','none');
            $('.dislike_icon_'+cont_id).css('display','block');
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/like',
            type: 'POST',
            dataType: "json",
            data: "own_id=" + own_id +"&cont_id="+cont_id+"&tablename="+tablename ,
            success: function(data) {
                if(data == 1){
                    
               }
            }
        });
    });
    $(document).on('click','.dislike_this',function(){
        var own_id = $(this).data('own_id');
        var cont_id = $(this).data('cont_id');
        var tablename = 'liked';
            $('.dislike_icon_'+cont_id).css('display','none');
            $('.like_icon_'+cont_id).css('display','block');
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/dislike',
            type: 'POST',
            dataType: "json",
            data: "own_id=" + own_id +"&cont_id="+cont_id+"&tablename="+tablename ,
            success: function(data) {
                if(data == 1){
                    
               }
            }
        });
    });
    $(document).on('click','.share_this',function(){
        var own_id = $(this).data('own_id');
        var cont_id = $(this).data('cont_id');
        var tablename = 'shared';
        var base_url = "<?php echo base_url(); ?>";
            $('.share_'+cont_id).html('Shared');
            $('.share_'+cont_id).removeClass('share_this');
            $('.share_'+cont_id).addClass('disshare_this');
            $('.share_'+cont_id).addClass('disshare_'+cont_id);
            $('.share_icon_'+cont_id).css('display','none');
            $('.disshare_icon_'+cont_id).css('display','block');
		$.ajax({
            url: base_url+'Front/share',
            type: 'POST',
            dataType: "json",
            data: "own_id=" + own_id +"&cont_id="+cont_id+"&tablename="+tablename ,
            beforeSend: function(){
                $('.share_'+cont_id).html('Sharing...');
            },
            success: function(data) {
                if(data == 1){
                
               }
            }
        });
    });
    $(document).on('click','.disshare_this',function(){
        var own_id = $(this).data('own_id');
        var cont_id = $(this).data('cont_id');
        var tablename = 'shared';
        var base_url = "<?php echo base_url(); ?>";
                $('.disshare_'+cont_id).html('Share');
                $('.disshare_icon_'+cont_id).css('display','none');
                $('.share_icon_'+cont_id).css('display','block');
		$.ajax({
            url: base_url+'Front/disshare',
            type: 'POST',
            dataType: "json",
            data: "own_id=" + own_id +"&cont_id="+cont_id+"&tablename="+tablename ,
            success: function(data) {
                if(data == 1){
                    
               }
            }
        });
    });
</script>
<script>
	 $(document).on('submit','#comment_on',function(e){
        e.preventDefault();
        var comment = $(this).children().next().next().next().next().val();
        var user_data = $(this).children().next().next().next().val();
        var formData = new FormData(this);
		var url= "<?php echo base_url(); ?>Front/comment";
        $.ajax({
            type:'POST',
            url: url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            datatype: 'JSON',
            success:function(data){
               
            },
            error: function(data){
            }
        });
            $('.comment_div').removeClass('view_this');
            $(this).children().next().next().next().next().val('');
            $(this).parent().next().append('<p><b>'+user_data+'</b> : '+comment+'</p>');
            $(this).parent().next().css('padding','10px');
    });
	</script>
     <script>
        $(document).on('click','.close_ad',function(){
            $(this).parent().parent().parent().remove();
        });
    </script>