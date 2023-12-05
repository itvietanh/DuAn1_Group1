<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <h2 class="title">Đổi mật khẩu mới</h2>
                </div>
                <form class="account-form" method="post">
                    <div class="form-group">
                        <label for="email2">Mật khẩu mới<span>*</span></label>
                        <input type="number" placeholder="Nhập mật khẩu mới" name="password" value="">
                        <?php 
                            if (isset($_SESSION['error']['password_new']) && $_SESSION['error']['password_new'] != "") {
                                echo '<p class=error>' . $_SESSION['error']['password_new'] . '</p>';
                            } 
                        ?>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="btn_change" value="Gửi">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->
<?php ob_end_flush();?>