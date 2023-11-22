<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">hello</span>
                    <h2 class="title">welcome back</h2>
                </div>
                <form class="account-form" method="post">
                    <div class="form-group">
                        <label for="email2">Email<span>*</span></label>
                        <input type="email" placeholder="Enter Your Email" name="email" id="email2" required>
                    </div>
                    <div class="form-group">
                        <label for="pass3">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password" id="pass3" required>
                    </div>
                    <div class="form-group checkgroup">
                        <input type="checkbox" id="bal2" required checked>
                        <label for="bal2">remember password</label>
                        <a href="#0" class="forget-pass">Forget Password</a>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="btn_login" value="log in">
                    </div>
                </form>
                <div class="option">
                    Don't have an account? <a href="index.php?act=sign_up">sign up now</a>
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
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->
<?php ob_end_flush();?>