<?php
if (is_array($edit_film)) {
    extract($edit_film);
}
//echo "<pre>";
//print_r($edit_film['id']);
?>

<div class="container">
    <main>
        <div class="card">
            <form action="index.php?act=update_film" class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <h4 class="card-title">Sửa Thông Tin Phim</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="name" value="<?php echo $name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Ngày Khởi Chiếu</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="lname" name="rel_date" value="<?php echo $rel_date?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Thể Loại Phim</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="genre">
                                <option value="">--- Lựa Chọn ---</option>
                                <?php foreach ($list_genre as $value) {
                                    extract($value);
                                    ?>
                                    <option value="<?php echo $id?>" <?php if ($edit_film['id_genre'] == $id) echo "selected"?>><?php echo $name?></option>

                                    <?php
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Banner</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" id="cono1">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php if(isset($edit_film['id']) && $edit_film['id'] > 0) echo $edit_film['id']?>">
                        <input type="submit" class="btn btn-primary" name="btn_update" value="Cập Nhật">
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
