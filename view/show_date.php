<!-- ==========Window-Warning-Section========== -->
<section class="window-warning inActive">
    <div class="lay"></div>
    <div class="warning-item">
        <h6 class="subtitle">Welcome! </h6>
        <h4 class="title">Select Your Seats</h4>
        <div class="thumb">
            <img src="assets/images/movie/seat-plan.png" alt="movie">
        </div>
        <a href="movie-seat-plan.html" class="custom-button seatPlanButton">Seat Plans<i class="fas fa-angle-right"></i></a>
    </div>
</section>
<!-- ==========Window-Warning-Section========== -->

<!-- ==========Banner-Section========== -->
<!--<section class="details-banner hero-area bg_img" data-background="assets/images/banner/banner03.jpg">-->
<!--    <div class="container">-->
<!--        <div class="details-banner-wrapper">-->
<!--            <div class="details-banner-content">-->
<!--                <h3 class="title">Venus</h3>-->
<!--                <div class="tags">-->
<!--                    <a href="#0">English</a>-->
<!--                    <a href="#0">Hindi</a>-->
<!--                    <a href="#0">Telegu</a>-->
<!--                    <a href="#0">Tamil</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- ==========Banner-Section========== -->
<section class="details-banner bg_img" data-background="http://localhost/DuAn1_Group1/assets/images/banner/banner03.jpg" style="background-image: url(&quot;http://localhost/DuAn1_Group1/assets/images/banner/banner03.jpg&quot;);">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-thumb">
                <img src="../uploads/doreamon.jpg" alt="movie">
                <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                    <img src="http://localhost/DuAn1_Group1/assets/images/movie/video-button.png" alt="movie">
                </a>
            </div>
            <div class="details-banner-content offset-lg-3">
                <h3 class="title">Doreamon: Vùng Đất Lý Tưởng Trên Bầu Trời</h3>
                <div class="tags">
                    <a href="#0">English</a>
                    <a href="#0">Hindi</a>
                    <a href="#0">Telegu</a>
                    <a href="#0">Tamil</a>z
                </div>
                <a href="#0" class="button">horror</a>
                <div class="social-and-duration">
                    <div class="duration-area">
                        <div class="item">
                            <i class="fas fa-calendar-alt"></i><span>2023-11-09</span>
                        </div>
                        <div class="item">
                            <i class="far fa-clock"></i><span>2 hrs 50 mins</span>
                        </div>
                    </div>
                    <ul class="social-share">
                        <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ==========Book-Section========== -->
<section class="book-section bg-one">
    <div class="container">
        <form class="ticket-search-form two" action="index.php?act=show_date" method="post">
            <div class="form-group">
                <div class="thumb">
                    <img src="assets/images/ticket/date.png" alt="ticket">
                </div>
                <span class="type">date</span>
                <select class="select-bar" name="choose_date">
                    <?php foreach ($list_date as $value) {
                        extract($value);?>
                        <option value="<?php echo $date?>"><?php echo $date?></option>
                    <?php
                    }?>
                </select>
            </div>
            <div class="form-group">
                <div class="thumb">
                    <img src="assets/images/ticket/cinema.png" alt="ticket">
                </div>
                <span class="type">cinema</span>
                <select class="select-bar">
                    <option value="Awaken">Awaken</option>
                    <option value="Venus">Venus</option>
                    <option value="wanted">wanted</option>
                    <option value="joker">joker</option>
                    <option value="fid">fid</option>
                    <option value="kidio">kidio</option>
                    <option value="mottus">mottus</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $id?>" name="id_film">
                <input type="submit" name="send" value="Xem Suất Chiếu">
            </div>
        </form>
    </div>
</section>
<!-- ==========Book-Section========== -->

<!-- ==========Movie-Section========== -->
<div class="ticket-plan-section padding-bottom padding-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 mb-5 mb-lg-0">
                <ul class="seat-plan-wrapper bg-five">
                    <li>
                        <div class="movie-name">
                            <div class="icons">
                                <i class="far fa-heart"></i>
                                <i class="fas fa-heart"></i>
                            </div>
                            <a href="#0" class="name">Genesis Cinema</a>
                            <div class="location-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div class="movie-schedule">
                            <?php foreach ($list_showdate as $time) {
                                extract($time);
                                ?>
                                <div class="item">
                                    <?php echo $start_time?>
                                </div>
                            <?php
                            }?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-10">
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="assets/images/sidebar/banner/banner03.jpg" alt="banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->