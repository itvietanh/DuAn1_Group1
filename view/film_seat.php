<?php
    foreach ($list_showdate as $value) {
        extract($value);
    }
?>

<section class="details-banner hero-area bg_img seat-plan-banner" data-background="assets/images/banner/banner04.jpg" style="background-image: url(&quot;assets/images/banner/banner04.jpg&quot;);">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-content style-two">
                <h3 class="title" style="font-size: 24px"><?php echo $name_film?></h3>
                <div class="tags">
                    <a href="#0">City Walk</a>
                    <a href="#0">English - 2D</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-title bg-one">
    <div class="container">
        <div class="page-title-area">
            <div class="item md-order-1">
                <a href="index.php?act=ct_phim&id=<?php echo $id_film?>" class="custom-button back-button">
                    <i class="flaticon-double-right-arrows-angles"></i>back
                </a>
            </div>
            <div class="item date-item">
                <span class="date"><?php echo $date?></span>
            </div>
            <div class="item">
                <h5 class="title"><?php echo $time?></h5>
            </div>
        </div>
    </div>
</section>

<div class="seat-plan-section padding-bottom padding-top">
    <div class="container">
        <div class="screen-area">
            <h4 class="screen">screen</h4>
            <div class="screen-thumb">
                <img src="assets/images/movie/screen-thumb.png" alt="movie">
            </div>
            <h5 class="subtitle">Seat</h5>
            <form action="" method="post">
                <div class="screen-wrapper">
                    <ul class="seat-area">
                        <li class="seat-line">
                            <ul class="seat--area seat-title">
                                <li class="front-seat">
                                    <?php foreach ($seat as $key => $value) {
                                        ?>
                                        <ul>
                                            <span><?php echo $key?></span>
                                            <?php foreach ($value as $key2 => $value2) {
                                                ?>
                                                <li class="single-seat">
<!--                                                    <img src="assets/images/movie/seat01.png" alt="seat">-->
                                                    <span class="sit-num"><?php echo $key . $value2?></span>
                                                </li>
                                                <?php
                                            }?>
                                        </ul>
                                        <?php
                                    }?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="proceed-book bg_img" data-background="assets/images/movie/movie-bg-proceed.jpg" style="background-image: url(&quot;assets/images/movie/movie-bg-proceed.jpg&quot;);">
                    <div class="proceed-to-book">
                        <div class="book-item">
                            <span>You have Choosed Seat</span>
                            <h3 class="title" id="title-seat"></h3>
                        </div>
<!--                        <div class="book-item">-->
<!--                            <span>total price</span>-->
<!--                            <h3 class="title">$150</h3>-->
<!--                        </div>-->

                        <div class="book-item">
                            <button type="submit" class="custom-button">Proceed</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>

<script>
    let seat = document.getElementsByClassName('single-seat');
    for (let i =0; i < seat.length; i++) {
        seat[i].addEventListener("click", function (event) {
            let target = event.target;
            target.style.backgroundColor ="#fff";
            target.style.color ="#000";
            let span = target.childNodes[3];
            span.tagName = "selected_seats";
            console.log(span);
            let title = target.parentElement.childNodes[1];
            let seatNumber = span.innerHTML;
            toggleSeat(seatNumber, target);
        })
    }
    let selectedSeats = [];
    function toggleSeat(seatNumber, target) {
        let index = selectedSeats.indexOf(seatNumber);
        if (index !== -1) {
            target.style.backgroundColor ="";
            target.style.color ="#fff";
            selectedSeats.splice(index, 1);
        } else {
            selectedSeats.push(seatNumber);
        }
        updateSeatInfo(seatNumber);
    }

    function updateSeatInfo(seatNumber) {
        // Hiển thị thông tin về tất cả các ghế đã chọn
        let titleSeat = document.getElementById('title-seat');
        titleSeat.textContent = `Đã chọn các ghế: ${selectedSeats.join(', ')}`;
        // Cập nhật số ghế đã chọn trên từng ô ghế
        let seats = document.querySelectorAll('.single-seat');
        seats.forEach(seat => {
            seat.classList.toggle('selected', selectedSeats.includes(seatNumber));
            console.log(seat)
        });
    }
</script>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy danh sách các ghế đã chọn
        $selectedSeats = $_POST['selected_seats'];
        echo "Đã đặt ghế thành công. Các ghế đã chọn: " . implode(', ', $selectedSeats);
        die();
    } else {
        // Redirect hoặc xử lý lỗi nếu không phải là phương thức POST
//        header("Location: ../index.php");
        exit();
    }
?>
