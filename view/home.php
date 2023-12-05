<!-- ==========Movie-Main-Section========== -->
<section class="movie-section padding-top padding-bottom bg-two">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <?php include "view/aside.php";?>
            <div class="col-lg-9">
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">Phim Hoạt Hình</h2>
                    </form>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                    <?php foreach ($list_film_cartoon as $value) {
                        extract($value);?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="index.php?act=ct_phim&id=<?php echo $id?>">
                                            <img src="<?php echo $path_image . $image?>" alt="movie">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="index.php?act=ct_phim&id=<?php echo $id?>"><?php echo $film?></a>
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
                    }?>
                    </div>
                </div>
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">Phim Hành Động</h2>
                        <!-- <a class="view-all" href="index.php?act=film_by_genre&id=<?php echo $genre?>">View All</a> -->
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        <?php foreach ($list_film_action as $value) {
                            extract($value);?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="index.php?act=ct_phim&id=<?php echo $id?>">
                                            <img src="<?php echo $path_image . $image?>" alt="movie">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="index.php?act=ct_phim&id=<?php echo $id?>"><?php echo $film?></a>
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
                        }?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ==========Movie-Main-Section========== -->