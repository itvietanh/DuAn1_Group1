<div class="container">
    <div class="card">
        <form class="form-horizontal" method="post">
                <h4 class="card-title">Thêm Thể Loại Phim</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Thể Loại Phim</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="name" placeholder="Nhập Thể Loại Film">
                    </div>
                </div>
            <div class="border-top">
                <input type="submit" class="btn btn-primary" name="btn_add" value="Thêm Thể Loại Phim">
            </div>
        </form>
        <div class="col-sm-12 col-md-5">
            <a href="index.php?act=list_genre"><input type="button" name="list_genre" value="Danh Sách Loại Phim"></a>
        </div>
        <?php
        if (isset($thongbao) && ($thongbao) != "") {
            echo $thongbao;
        }
        ?>
    </div>
</div>
