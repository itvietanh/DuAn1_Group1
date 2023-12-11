<?php 
foreach ($list_orderTicket as $value) {
extract($value);
}
?>

<style>
        body {
            
        }
        .ticket {
            width: 500px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 120px auto;
        }
        .ticket-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        .movie-title {
            font-size: 20px;
            margin: 10px 0;
        }
        .ticket-details {
            font-size: 14px;
            margin: 10px 0;
        }
        .barcode {
            margin-top: 20px;
        }
    </style>
<body>
    <div class="container">

        <div class="ticket">
            <div class="ticket-header">
                <h2>Vé FPOLY CINEMA</h2>
            </div>
            <div class="movie-title">
                <strong><?=$name_film?></strong>
            </div>
            <div class="ticket-details">
                <p>Ngày chiếu: <?=$order_date?></p>
                <p>Chỗ ngồi: <?=$seat_order?></p>
                <p>Khung giờ: <?=$start_time?></p>
                <p>Phòng chiếu: <?=$name_room?></p>
                <p>Số lượng: <?=$quantity?></p>
                <p>Tổng giá: <?=$price?></p>
                <!-- Add more ticket details here -->
            </div>
            <div class="barcode">
                <!-- Add barcode image or code here -->
                <img src=".<?=$qr_code?>" alt="qrcode">
            </div>
            <a onclick="return confirm('Bạn có muốn in vé này không?')" href="index.php?act=print_ticket&id_order=<?php echo $id_order ?>"><input type="button" class="btn btn-primary" id="btn_confirm" style="margin: 0 0 0 0; background: #fd9351; border: none;" value="Xác nhận in vé"></a>
        </div>
    </div>
</body>
</html>
</html>