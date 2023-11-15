<div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
<!--    <div class="widget-1 widget-banner">-->
<!--        <div class="widget-1-body">-->
<!--            <a href="#0">-->
<!--                <img src="http://localhost/DuAn1_Group1/assets/images/sidebar/banner/banner01.jpg" alt="banner">-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
    <div class="widget-1 widget-trending-search">
        <h3 class="title">Thể Loại</h3>
        <div class="widget-1-body">
            <ul>
                <?php foreach ($list_genre as $value) {
                    extract($value); ?>
                    <li>
                        <h6 class="sub-title">
                            <a href="index.php?act=film_by_genre&id=<?php echo $id?>"><?php echo $name?></a>
                        </h6>
                    </li>
                <?php
                }?>

<!--                <li>-->
<!--                    <h6 class="sub-title">-->
<!--                        <a href="#0">alone</a>-->
<!--                    </h6>-->
<!--                    <p>Movies</p>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <h6 class="sub-title">-->
<!--                        <a href="#0">music event</a>-->
<!--                    </h6>-->
<!--                    <p>event</p>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <h6 class="sub-title">-->
<!--                        <a href="#0">NBA Games 2020</a>-->
<!--                    </h6>-->
<!--                    <p>Sports</p>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
<!--    <div class="widget-1 widget-banner">-->
<!--        <div class="widget-1-body">-->
<!--            <a href="#0">-->
<!--                <img src="http://localhost/DuAn1_Group1/assets/images/sidebar/banner/banner02.jpg" alt="banner">-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
</div>