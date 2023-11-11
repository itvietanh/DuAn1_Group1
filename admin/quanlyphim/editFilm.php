<?php
extract($edit_film);
?>

<div class="container">
    <div class="card">
        <form class="form-horizontal">
            <div class="card-body">
                <h4 class="card-title">Sửa Thông Tin Phim</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phim</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" value="<?php echo $name?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Ngày Khởi Chiếu</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="lname" value="<?php echo $rel_date?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Thể Loại Phim</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lname" value="<?php echo $id_genre?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Khung Giờ Chiếu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" value="<?php echo "$start_time" . " - " . "$end_time"?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Banner</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="cono1">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
