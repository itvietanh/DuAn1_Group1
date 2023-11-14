<!-- ==========Movie-Main-Section========== -->
<section class="movie-section padding-top padding-bottom bg-two">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
                <div class="widget-1 widget-facility">
                    <div class="widget-1-body">
                        <ul>
                            <li>
                                <a href="#0">
                                    <span class="img"><img src="<?php echo $path?>assets/images/sidebar/icons/sidebar01.png" alt="sidebar"></span>
                                    <span class="cate">24X7 Care</span>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <span class="img"><img src="<?php echo $path?>assets/images/sidebar/icons/sidebar02.png" alt="sidebar"></span>
                                    <span class="cate">100% Assurance</span>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <span class="img"><img src="<?php echo $path?>assets/images/sidebar/icons/sidebar03.png" alt="sidebar"></span>
                                    <span class="cate">Our Promise</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="<?php echo $path?>assets/images/sidebar/banner/banner01.jpg" alt="banner">
                        </a>
                    </div>
                </div>
                <div class="widget-1 widget-trending-search">
                    <h3 class="title">Trending Searches</h3>
                    <div class="widget-1-body">
                        <ul>
                            <li>
                                <h6 class="sub-title">
                                    <a href="#0">mars</a>
                                </h6>
                                <p>Movies</p>
                            </li>
                            <li>
                                <h6 class="sub-title">
                                    <a href="#0">alone</a>
                                </h6>
                                <p>Movies</p>
                            </li>
                            <li>
                                <h6 class="sub-title">
                                    <a href="#0">music event</a>
                                </h6>
                                <p>event</p>
                            </li>
                            <li>
                                <h6 class="sub-title">
                                    <a href="#0">NBA Games 2020</a>
                                </h6>
                                <p>Sports</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="<?php echo $path?>assets/images/sidebar/banner/banner02.jpg" alt="banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">movies</h2>
                        <a class="view-all" href="movie-grid.html">View All</a>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        <?php
                            foreach ($list_film as $value) {
                                extract($value); ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="index.php?act=ct_phim">
                                                <img src="<?php echo $path?>assets/images/movie/movie01.jpg" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0">
                                                <a href="index.php?act=ct_phim">alone</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <div class="thumb">
                                                        <img src="<?php echo $path?>assets/images/movie/tomato.png" alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <img src="<?php echo $path?>assets/images/movie/cake.png" alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>

                    </div>
                </div>
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">events</h2>
                        <a class="view-all" href="events.html">View All</a>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        <div class="col-sm-6 col-lg-4">
                            <div class="event-grid">
                                <div class="movie-thumb c-thumb">
                                    <a href="#0">
                                        <img src="<?php echo $path?>assets/images/event/event01.jpg" alt="event">
                                    </a>
                                    <div class="event-date">
                                        <h6 class="date-title">28</h6>
                                        <span>Dec</span>
                                    </div>
                                </div>
                                <div class="movie-content bg-one">
                                    <h5 class="title m-0">
                                        <a href="#0">Digital Economy Conference 2020</a>
                                    </h5>
                                    <div class="movie-rating-percent">
                                        <span>327 Montague Street</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="event-grid">
                                <div class="movie-thumb c-thumb">
                                    <a href="#0">
                                        <img src="<?php echo $path?>assets/images/event/event02.jpg" alt="event">
                                    </a>
                                    <div class="event-date">
                                        <h6 class="date-title">28</h6>
                                        <span>Dec</span>
                                    </div>
                                </div>
                                <div class="movie-content bg-one">
                                    <h5 class="title m-0">
                                        <a href="#0">web design conference 2020</a>
                                    </h5>
                                    <div class="movie-rating-percent">
                                        <span>327 Montague Street</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="event-grid">
                                <div class="movie-thumb c-thumb">
                                    <a href="#0">
                                        <img src="<?php echo $path?>assets/images/event/event03.jpg" alt="event">
                                    </a>
                                    <div class="event-date">
                                        <h6 class="date-title">28</h6>
                                        <span>Dec</span>
                                    </div>
                                </div>
                                <div class="movie-content bg-one">
                                    <h5 class="title m-0">
                                        <a href="#0">digital thinkers meetup</a>
                                    </h5>
                                    <div class="movie-rating-percent">
                                        <span>327 Montague Street</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="article-section">
                    <div class="section-header-1">
                        <h2 class="title">sports</h2>
                        <a class="view-all" href="sports.html">View All</a>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        <div class="col-sm-6 col-lg-4">
                            <div class="sports-grid">
                                <div class="movie-thumb c-thumb">
                                    <a href="#0">
                                        <img src="<?php echo $path?>assets/images/sports/sports01.jpg" alt="sports">
                                    </a>
                                    <div class="event-date">
                                        <h6 class="date-title">28</h6>
                                        <span>Dec</span>
                                    </div>
                                </div>
                                <div class="movie-content bg-one">
                                    <h5 class="title m-0">
                                        <a href="#0">football league tournament</a>
                                    </h5>
                                    <div class="movie-rating-percent">
                                        <span>327 Montague Street</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="sports-grid">
                                <div class="movie-thumb c-thumb">
                                    <a href="#0">
                                        <img src="<?php echo $path?>assets/images/sports/sports02.jpg" alt="sports">
                                    </a>
                                    <div class="event-date">
                                        <h6 class="date-title">28</h6>
                                        <span>Dec</span>
                                    </div>
                                </div>
                                <div class="movie-content bg-one">
                                    <h5 class="title m-0">
                                        <a href="#0">world cricket league 2020</a>
                                    </h5>
                                    <div class="movie-rating-percent">
                                        <span>327 Montague Street</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="sports-grid">
                                <div class="movie-thumb c-thumb">
                                    <a href="#0">
                                        <img src="<?php echo $path?>assets/images/sports/sports03.jpg" alt="sports">
                                    </a>
                                    <div class="event-date">
                                        <h6 class="date-title">28</h6>
                                        <span>Dec</span>
                                    </div>
                                </div>
                                <div class="movie-content bg-one">
                                    <h5 class="title m-0">
                                        <a href="#0">basket ball tournament 2020</a>
                                    </h5>
                                    <div class="movie-rating-percent">
                                        <span>327 Montague Street</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Main-Section========== -->