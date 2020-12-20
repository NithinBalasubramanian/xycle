	
<div class="bottom">
    <div class="bottom_menu">
        <div class="bottom_icon">
            <a href="<?php echo base_url(); ?>View/front/add_post"><p>Create </p></a>
        </div>
        <div class="bottom_icon">
            <a href="<?php echo base_url(); ?>View/front/my_post"><p>My Content</p></a>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>/assets/front/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>/assets/front/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>/assets/front/login/js/main.js"></script>

    <script>
        $(document).on('click','.side',function(){
            $('.sidebar').toggleClass('block');
            $('.menu').toggleClass('none');
            $('.close').toggleClass('block');
        });
    </script>
      <script>
        $(document).on('click','.close_ad',function(){
            $(this).parent().parent().parent().remove();
        });
    </script>
    <script>
        $(document).on('click','.drop_on',function(){
            $(this).next().toggleClass('block');
        });
    </script>
    <script>
      function ads(){
        var base_url = '<?php echo base_url(); ?>';
		$.ajax({
            url: base_url+'Front/load_ads',
            type: 'POST',
            success: function(data) {
                $('.admin_ad').html(data);
            }
        });
    }
    setInterval(() => {
        ads()
    }, 5000);
    function ads_2(){
        var base_url = '<?php echo base_url(); ?>';
		$.ajax({
            url: base_url+'Front/load_ads_2',
            type: 'POST',
            success: function(data) {
                $('.admin_ad_1').html(data);
            }
        });
    }
    setInterval(() => {
        ads_2()
    }, 5000);
</script>
</body>
</html>