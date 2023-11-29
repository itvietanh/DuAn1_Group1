<?php
foreach ($list_showdate as $value) {
    extract($value);
}
if (!empty($list_orderTicket)) {
    foreach ($list_orderTicket as $key => $seats) {
        $bookedSeats[] = $seats['seat_order'];
    }
    $check_seat = implode(",", $bookedSeats);
    // $close_seat = explode(",", $check_seat);
}

?>

<section class="details-banner hero-area bg_img seat-plan-banner" data-background="assets/images/banner/banner04.jpg" style="background-image: url(&quot;assets/images/banner/banner04.jpg&quot;);">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-content style-two">
                <h3 class="title" style="font-size: 24px"><?php echo $name_film ?></h3>
                <div class="tags">
                    <a href="#0"><?= $date ?></a>
                    <a href="#0"><?= $time ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-title bg-one">
    <div class="container">
        <div class="page-title-area">
            <div class="item md-order-1">
                <a href="index.php?act=ct_phim&id=<?php echo $id_film ?>" class="custom-button back-button">
                    <i class="flaticon-double-right-arrows-angles"></i>back
                </a>
            </div>
            <div class="item date-item">
                <h5 class="date"><?php echo $room ?></h5>
            </div>
            <div class="item">
                <h5 class="date">Rạp Chiếu : <?php echo $cinema ?></h5>
            </div>
        </div>
    </div>
</section>

<div class="seat-plan-section padding-bottom padding-top">
    <div class="container">
        <div class="screen-area">
            <div class="screen-thumb">
                <img src="assets/images/movie/screen-thumb.png" alt="movie">
            </div>
            <h5 class="subtitle">Màn Hình Chiếu</h5>
            <div  class="status_seat" style="display: flex;justify-content: center;">
                <div class="status" style="display: flex;margin: 1em; align-items: center;">
                    <div style="border-radius: 5px;width: 20px;height: 20px;border: 1px solid gray;margin-right: 5px"></div>
                    <span style="color: white"> Ghế trống</span>
                </div>
                <div class="status" style="display: flex;margin: 1em; align-items: center;">
                    <div style="border-radius: 5px;width: 20px;height: 20px;border: 1px solid gray;margin-right: 5px;background-color: rgb(255, 255, 255);"></div>
                    <span style="color: white"> Ghế đang chọn</span>
                </div>
                <div class="status" style="display: flex;margin: 1em; align-items: center;">
                    <div style="border-radius: 5px;width: 20px;height: 20px;border: 1px solid gray;margin-right: 5px;background-color: #ff3131;"></div>
                    <span style="color: white"> Ghế đã được chọn</span>
                </div>
            </div>
            <form action="" method="post">
                <div class="screen-wrapper">
                    <ul class="seat-area">
                        <li class="seat-line">
                            <ul class="seat--area seat-title">
                                <li class="front-seat">
                                    <?php foreach ($seat as $key => $value) {
                                    ?>
                                        <ul>
                                            <span><?php echo $key ?></span>
                                            <?php foreach ($value as $key2 => $value2) {
                                            ?>
                                            
                                                <li class="single-seat">
                                                    <!--                                                    <img src="assets/images/movie/seat01.png" alt="seat">-->
                                                    <span class="sit-num"><?php echo $key . $value2 ?></span>
                                                </li>
                                            <?php
                                            } ?>
                                        </ul>
                                    <?php
                                    } ?>
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

                <div class="book-item">
                    <form action="index.php?act=checkout&id=<?php echo $time ?>&date=<?php echo $date ?>&id_film=<?php echo $id_film ?>" method="post">
                        <input type="hidden" id="select_seat" name="selected_seats">
                        <input type="hidden" id="mul_price" name="price">
                        <input type="hidden" id="hidden_quantity" name="hidden_quantity">
                        <?php if (!isset($_SESSION['account'])) { ?>
                            <p style='color: red'>Bạn phải đăng nhập để đặt vé !!!</p> <?php
                            } else { ?>
                            <div class="book-item">
                                <span>total price</span>
                                <input type="hidden" id="hidden_price" value="<?php echo $price['price'] ?>">
                                <input type="hidden" name="time" value="<?php echo $time ?>">
                                <input type="hidden" name="name_film" value="<?php echo $name_film ?>">
                                <input type="hidden" name="show_date" value="<?php echo $date ?>">
                                <input type="hidden" name="id_film" value="<?php echo $id_film ?>">
                                <input type="hidden" name="id_showTime" value="<?php echo $id ?>">
                                <input type="hidden" name="id_room" value="<?php echo $id_room ?>">
                                <input type="hidden" name="id_cinema" value="<?php echo $id_cinema ?>">
                                <input type="hidden" name="room" value="<?php echo $room ?>">
                                <input type="hidden" name="cinema" value="<?php echo $cinema ?>">
                                <h3 class="title" id="price"></h3>
                            </div>
                            <input type="submit" class="custom-button" name="order" value="Order">
                        <?php
                        } ?>
                    </form>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    let seat = document.getElementsByClassName('single-seat');
    let hidden_price = document.getElementById('hidden_price');
    let price = document.getElementById('price');
    let quantity = 0;
    for (let i = 0; i < seat.length; i++) {
        seat[i].addEventListener("click", function(event) {
            let target = event.target;
            target.style.backgroundColor = "#fff";
            target.style.color = "#000";
            let span = target.childNodes[3];
            span.tagName = "selected_seats";
            // let title = target.parentElement.childNodes[1];
            let seatNumber = span.innerHTML;
            toggleSeat(seatNumber, target);

        })
    }
    let check = [];
    let seat_close;
    for (let i = 0; i < seat.length; i++) {
        seat_close = seat[i].childNodes[3].innerText;
        check.push(seat_close);
    }

    let selectedSeats = [];
    <?php if (!empty($check_seat)) {
    ?>
        let bookedSeats = <?php echo json_encode($check_seat); ?>;
        for (let i = 0; i < check.length; i++) {
            if (bookedSeats.includes(check[i])) {
                console.log(check[i]);
                seat[i].style.backgroundColor = "red";
                seat[i].style['pointer-events'] = "none";
                seat[i].style['box-shadow'] = "none";
            }
            
        }
        function checkSeatStatus(check) {
            return bookedSeats.includes(check);
        }

    <?php
    } ?>

    function toggleSeat(seatNumber, target) {
        <?php if (!empty($check_seat)) {
        ?>
            console.log(check);
            if (checkSeatStatus(check)) {

                for (let i = 0; i < seat.length; i++) {
                    seat[i].style.backgroundColor = "red";

                }
                alert('Ghế đã được đặt. Vui lòng chọn ghế khác.');
                return;
            }
        <?php
        } ?>

        let index = selectedSeats.indexOf(seatNumber);
        if (index !== -1) {
            target.style.backgroundColor = "";
            target.style.color = "#fff";
            selectedSeats.splice(index, 1);
        } else {
            quantity++;
            let hidden_quantity = document.getElementById('hidden_quantity');
            hidden_quantity.value = quantity;

            selectedSeats.push(seatNumber);
        }
        let select_seat = document.getElementById("select_seat");
        select_seat.value = selectedSeats.join(', ');
        console.log(select_seat.value)
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
        });

        let count_seat = selectedSeats.length;
        let mul = Number(hidden_price.value) * Number(count_seat);
        price.innerText = mul;
        let mul_price = document.getElementById('mul_price');
        mul_price.value = price.innerText;

    }
</script>
<?php
//if (isset($_POST['selected_seats']) && $_POST['selected_seats']) {
//    $seat_order = $_POST['selected_seats'];
//    $id_account = $_SESSION['account']['id'];
//    $id_film = $_GET['id_film'];
//    $id_showTimeFrame = $_GET['id'];
//    $show_date = $_GET['date'];
//    $order_date = date("Y-m-d h:i:sa");
//    $price = $_POST['price'];
//    insert_orderSeat($seat_order, $id_account, $order_date, $id_showTimeFrame, $show_date, $price, $id_film);
//    header("Location: index.php?act=checkout");
//}
?>