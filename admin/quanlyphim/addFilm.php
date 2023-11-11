<div class="container">
    <div class="card">
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
            <div class="card-body">
                <h4 class="card-title">Thêm Phim</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phim</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="name" placeholder="Nhập tên Film">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Ngày Khởi Chiếu</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="lname" name="rel_date" placeholder="Ngày Công Chiếu">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Thể Loại Phim</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 160px !important;" name="" id="">
                            <option value="">--- Lựa Chọn ---</option>
                            <?php foreach ($list_genre as $value) {
                                extract($value);
                                ?>
                                <option value="<?php echo $id?>"><?php echo $name?></option>
                                <?php
                            }?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Khung Giờ Chiếu</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="width: 160px !important;" name="" id="">
                            <option value="">--- Lựa Chọn ---</option>
                            <?php foreach ($list_showTime as $value) {
                                extract($value);
                                ?>
                                <option value="<?php echo $id?>"><?php echo "$start_time" . " - " . "$end_time"?></option>
                            <?php
                            }?>
                        </select>
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
