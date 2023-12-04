<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">welcome</span>
                    <h2 class="title">to Boleto </h2>
                </div>
                <form class="account-form" action="index.php?act=sign_up" method="post">
                    <div class="form-group">
                        <label for="email1">Username<span>*</span></label>
                        <input type="text" placeholder="Enter Your Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email1">Name<span>*</span></label>
                        <input type="text" placeholder="Enter Your Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email1">Email<span>*</span></label>
                        <input type="email" placeholder="Enter Your Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Phone<span>*</span></label>
                        <input type="number" placeholder="Phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="pass1">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
      
                    <div class="form-group text-center">
                        <input type="submit" value="Sign Up" name="btn_signup">
                    </div>
                </form>
                <div class="option">
                    Already have an account? <a href="index.php?act=login">Login</a>
                </div>
                <div class="or"><span>Or</span></div>
                <ul class="social-icons">
                    <li>
                        <a href="#0">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0" class="active">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                </ul>
                <?php 
                    if (isset($thongbao) && $thongbao != "") {
                        echo $thongbao;
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->