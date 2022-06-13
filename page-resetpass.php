<?php
/* Template Name: ResetPass */
?>
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>../css/reset.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
(function($){  
	$(document).ready(function(){
		var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
		$('#hk-forgotpwd').submit(function(e) {
			e.preventDefault();
			var data = {};
			var ArrayForm = $(this).serializeArray();
			$.each(ArrayForm, function() {
				data[this.name] = this.value;
			});

			$.ajax({
				type: "POST",
				url: ajaxUrl,
				data: {
					'action': 'ForgotPassword',
					'userData': data
				},
				dataType: "html",
				beforeSend: function() {},
				success: function (response) {
					$('#hk-message').html(response);
					if (response == 'success') {
						$("#hk-forgotpwd")[0].reset();
						$('#hk-message').hide();
						$('#hk-success').show();
					}
				}
			});
		});
	});
})(jQuery);
</script>

<main id="site-content">
    <div class="section-inner">

        <?php
        $home_url = get_home_url();
        if ( is_user_logged_in() ) {

            echo 'Bạn đã đăng nhập rồi. <a href="'.wp_logout_url($home_url).'">Đăng xuất</a> ?';

        } else {
        ?>
            <h1>Quên mật khẩu</h1>
            <hr>
            <form id="hk-forgotpwd" action="<?php echo get_home_url() . '/quen-mat-khau'; ?>">
                <?php wp_nonce_field( 'form_forgot_password' ); ?>
                <div id="hk-message"></div>
                <p style="display:none" id="hk-success">
                    Đã gửi thông tin khôi phục password vào email của bạn. Hãy kiểm tra email!
                </p>
                <p>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </p>
                <p class="text-center mb-0">
                    <button class="form-submit" type="submit">
                        Lấy lại mật khẩu
                    </button>
                </p>
            </form>

        <?php } ?>

    </div>
</main>

