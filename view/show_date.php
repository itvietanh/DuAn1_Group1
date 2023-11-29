<?php foreach ($list_showdate as $time) {
    extract($time);
}
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
    <!--        <a href="index.php?act=film_seat&id=--><?php //echo $start_time
                                                        ?><!--" class="custom-button seatPlanButton">Seat Plans<i class="fas fa-angle-right"></i></a>-->
    <!--    </div>-->
</section>
<!-- ==========Window-Warning-Section========== -->

<!-- ==========Banner-Section========== -->
<section class="details-banner hero-area bg_img" data-background="url(assets/images/banner/banner04.jpg" style="background-image: url('assets/images/banner/banner04.jpg');">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-content">
                <h3 style="font-size: 24px"><?php if(!isset($name_film))  {echo "<h3>". "Lịch chiếu hiện đang trống, quay lại sau!" . "</h3>";} else { echo $name_film;} ?></h3>
                <div class="tags">
                    <a href="#0"><?= $date ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->
<section class="book-section bg-one">
    <div class="container">
        <form class="ticket-search-form two" action="index.php?act=show_date&id_cinema=<?=$id_cinema?>" method="post">
            <div class="form-group">
                <div class="thumb">
                    <img src="assets/images/ticket/date.png" alt="ticket">
                </div>
                <span class="type">Ngày Chiếu</span>
                <select class="select-bar" name="choose_date" required>
                    <option value="">--- Lựa Chọn ---</option>
                    <?php foreach ($list_date as $value) {
                        extract($value); ?>
                        <option value="<?php echo $date ?>" <?php if($date == $show_date) echo 'selected'?>><?php echo $date ?></option>
                    <?php
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <div class="thumb">
                    <img src="assets/images/ticket/date.png" alt="ticket">
                </div>
                <span class="type">Phòng Chiếu</span>
                <select class="select-bar" name="choose_room" required>
                    <option value="">--- Lựa Chọn ---</option>
                    <?php foreach ($list_room as $value) {
                        extract($value); ?>
                        <option value="<?php echo $id;?>" <?php if($id == $id_room) echo 'selected'?>><?php echo $name_room ?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $id_film;?>" name="id_film">
                <input type="hidden" value="<?php if(isset($_GET['id_cinema'])) echo $_GET['id_cinema']?>" name="id_cinema">
                <input type="submit" name="btn_show" value="Xem Suất Chiếu" id="btn_show">
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
                            <a href="#0" class="name" style="font-size: 14px;"><?php if(!isset($cinema)) { echo "Phòng không có lịch chiếu!";} else { echo 'Rạp: '.$cinema;} ?></a>
                            <div class="location-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div class="movie-schedule">
                            <?php foreach ($list_showdate as $time) {
                                if (!isset($_SESSION['account'])) { ?>
                                    <div class="item">
                                        <a href="index.php?act=login"><?php echo $time['start_time'] ?></a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="item">
                                        <a href="index.php?act=film_seat&id=<?php echo $time['id'] ?>&date=<?php echo $time['show_date'] ?>&id_film=<?php echo $id_film ?>&room=<?php echo $id_room?>&cinema=<? echo $id_cinema?>"><?php echo $time['start_time'] ?></a>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->