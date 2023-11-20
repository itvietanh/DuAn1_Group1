<div class="container">
    <main>
        <div class="card">
            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <h4 class="card-title">Thêm Khung Giờ Chiếu Cho Phim</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="name" disabled value="<?php echo $film['name']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Khung Giờ Chiếu</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="showTimeFrame">
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
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="submit" class="btn btn-primary" name="btn_add" value="Thêm Phim">
                        <a href="index.php?act=list_film"><input class="btn btn-primary" type="button" name="list_film" value="Danh Sách Phim"></a>
                    </div>
                </div>
            </form>
            <?php
            if (isset($thongbao) && ($thongbao) != "") {
                echo $thongbao;
            }
            ?>
        </div>
    </main>
</div>
