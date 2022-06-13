<?php
/* Template Name: Login */
?>
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>../css/login.css">
<div class="login-title"> <h1>Trang đăng nhập</h1></div>
<main id="site-content">
    <div class="section-inner">

        <?php
        $home_url = get_home_url();
        if ( is_user_logged_in() ) {

            echo 'Bạn đã đăng nhập rồi. <a href="'.wp_logout_url($home_url).'">Đăng xuất</a> ?';

        } else {

            $args = array(
                'redirect' => $home_url,
            );

            wp_login_form( $args );
                    
        }
        ?>
  <a class="reset-pass-link" href=" http://localhost/webhoctap/quen-mat-khau/">Quên mật khẩu</a>
    </div>
</main>






    

