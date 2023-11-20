<?php foreach ($list_showdate as $time) {
extract($time);}
?>
<!-- ==========Window-Warning-Section========== -->
<section class="window-warning inActive">
    <div class="lay"></div>
<!--    <div class="warning-item">-->
<!--        <h6 class="subtitle">Welcome! </h6>-->
<!--        <h4 class="title">Select Your Seats</h4>-->
<!--        <div class="thumb">-->
<!--            <img src="assets/images/movie/seat-plan.png" alt="movie">-->
<!--        </div>-->
<!--        <a href="index.php?act=film_seat&id=--><?php //echo $start_time?><!--" class="custom-button seatPlanButton">Seat Plans<i class="fas fa-angle-right"></i></a>-->
<!--    </div>-->
</section>
<!-- ==========Window-Warning-Section========== -->

<!-- ==========Banner-Section========== -->
<section class="details-banner hero-area bg_img" data-background="assets/images/banner/banner03.jpg">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-content">
                <h3 class="title">Venus</h3>
                <div class="tags">
                    <a href="#0">English</a>
                    <a href="#0">Hindi</a>
                    <a href="#0">Telegu</a>
                    <a href="#0">Tamil</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->
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
<!--            <div class="form-group">-->
<!--                <div class="thumb">-->
<!--                    <img src="assets/images/ticket/cinema.png" alt="ticket">-->
<!--                </div>-->
<!--                <span class="type">cinema</span>-->
<!--                <select class="select-bar">-->
<!--                    --><?php //foreach ($list_showdate as $time) {
//                        ?>
<!--                        <option value="Awaken">--><?php //echo $time['cinema']?><!--</option>-->
<!--                    --><?php
//                    }?>
<!--                </select>-->
<!--            </div>-->
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
                            <a href="#0" class="name"><?php echo $time['name_film']?></a>
                            <div class="location-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div class="movie-schedule">
                            <?php foreach ($list_showdate as $time) {
                                ?>
                                <div class="item">
                                    <a href="index.php?act=film_seat&id=<?php echo $time['id']?>&date=<?php echo $time['show_date']?>"><?php echo $time['start_time']?></a>
                                </div>
                                <?php
                            }?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->