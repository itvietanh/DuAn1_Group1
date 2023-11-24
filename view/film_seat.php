<?php
    foreach ($list_showdate as $value) {
        extract($value);
    }
    $select = [];
//    echo "<pre>";
//    print_r($list_orderTicket);
//    die();
    if (!empty($list_orderTicket)) {
        foreach ($list_orderTicket as $key => $seats) {
            $bookedSeats = $seats['seat_order'].", ";
            print_r($bookedSeats);
        }
    }
?>

<section class="details-banner hero-area bg_img seat-plan-banner" data-background="assets/images/banner/banner04.jpg" style="background-image: url(&quot;assets/images/banner/banner04.jpg&quot;);">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-content style-two">
                <h3 class="title" style="font-size: 24px"><?php echo $name_film?></h3>
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

                        <div class="book-item">
                            <form action="" method="post">
                                <input type="hidden" id="select_seat" name="selected_seats">
                                <input type="hidden" id="mul_price" name="price">
                                <input type="hidden" id="hidden_quantity" name="hidden_quantity">
                                <?php if (!isset($_SESSION['account'])) { ?>
                                    <p style='color: red'>Bạn phải đăng nhập để đặt vé !!!</p> <?php
                                } else { ?>
                                    <div class="book-item">
                                        <span>total price</span>
                                        <input type="hidden" id="hidden_price" value="<?php echo $price['price']?>">
                                        <h3 class="title" id="price"></h3>
                                    </div>
                                    <a href=""><input type="submit" class="custom-button" value="Order"></a>
                                    <?php
                                }?>
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
    let num_seat = Array.from(document.querySelectorAll(".sit-num"));
    let quantity = 0;
    console.log(num_seat)
    for (let i = 0; i < seat.length; i++) {
        seat[i].addEventListener("click", function (event) {
            let target = event.target;
            target.style.backgroundColor ="#fff";
            target.style.color ="#000";
            let span = target.childNodes[3];
            span.tagName = "selected_seats";
            // let title = target.parentElement.childNodes[1];
            let seatNumber = span.innerHTML;
            toggleSeat(seatNumber, target);
        })
    }
    let selectedSeats = [];
    <?php if (!empty($bookedSeats)) {
        ?>
    let bookedSeats = <?php echo json_encode($bookedSeats); ?>;
    console.log(bookedSeats)
    function checkSeatStatus(seatNumber) {
        return bookedSeats.includes(seatNumber);
    }
    <?php
    }?>

    function toggleSeat(seatNumber, target) {
        <?php if (!empty($bookedSeats)) {
            ?>
        if (checkSeatStatus(seatNumber)) {
            target.style.backgroundColor = "red";
            alert('Ghế đã được đặt. Vui lòng chọn ghế khác.');
            return;
        }
            <?php
    }?>

        let index = selectedSeats.indexOf(seatNumber);
        if (index !== -1) {
            target.style.backgroundColor ="";
            target.style.color ="#fff";
            selectedSeats.splice(index, 1);
        } else {
            quantity++;
            let hidden_quantity = document.getElementById('hidden_quantity');
            hidden_quantity.value = quantity;
            console.log(hidden_quantity)
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
        console.log(mul_price)

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