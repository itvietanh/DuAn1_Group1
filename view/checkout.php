<?php
    extract($list_infoOrder);
?>

<!-- ==========Movie-Section========== -->
<div class="movie-facility padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-widget checkout-card mb-0">
                    <h5 class="title">Payment Option </h5>
                    <ul class="payment-option">
                        <li class="active">
                            <a href="#0">
                                <img src="assets/images/payment/card.png" alt="payment">
                                <span>Credit Card</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <img src="assets/images/payment/card.png" alt="payment">
                                <span>Debit Card</span>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <img src="assets/images/payment/paypal.png" alt="payment">
                                <span>paypal</span>
                            </a>
                        </li>
                    </ul>
                    <h6 class="subtitle">Enter Your Card Details </h6>
                    <form class="payment-card-form">
                        <div class="form-group w-100">
                            <label for="card1">Card Details</label>
                            <input type="text" id="card1">
                            <div class="right-icon">
                                <i class="flaticon-lock"></i>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="card2"> Name on the Card</label>
                            <input type="text" id="card2">
                        </div>
                        <div class="form-group">
                            <label for="card3">Expiration</label>
                            <input type="text" id="card3" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label for="card4">CVV</label>
                            <input type="text" id="card4" placeholder="CVV">
                        </div>
                        <div class="form-group check-group">
                            <input id="card5" type="checkbox" checked>
                            <label for="card5">
                                <span class="title">QuickPay</span>
                                <span class="info">Save this card information to my Boleto  account and make faster payments.</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="custom-button" value="make payment">
                        </div>
                    </form>
                    <p class="notice">
                        By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="booking-summery bg-one">
                    <h4 class="title">Thông Tin Vé Đặt</h4>
                    <ul>
                        <li>
                            <h6 class="subtitle">Tên Phim</h6>
                            <span class="info"><?php echo $name_film?></span>
                        </li>
                        <li>
                            <h6 class="subtitle"><span>Lịch Chiếu</span><span>Số Vé</span></h6>
                            <div class="info"><span><?php echo "$show_date" . ", " . "$start_time";?></span> <span><?php echo $quantity?></span></div>
                        </li>
                        <li>
                            <h6 class="subtitle">Ghế Ngồi</h6>
                            <span class="info"><?php echo $seat_order?></span>
                        </li>
                        <li>
                            <h6 class="subtitle mb-0"><span>Giá Vé</span><span><?php echo $ticket_price['price']?></span></h6>
                        </li>
                    </ul>
                </div>
                <div class="proceed-area  text-center">
                    <h6 class="subtitle"><span>Tổng Tiền</span><span><?php echo $price?></span></h6>
                    <a href="#0" class="custom-button back-button">Thanh Toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->