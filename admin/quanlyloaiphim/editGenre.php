<?php extract($edit_genre)?>

<div class="container">
    <main>
        <div class="card">
            <form action="index.php?act=update_genre" class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <h4 class="card-title">Sửa Tên Loại Phim</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Thể Loại Phim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="name" value="<?php echo $edit_genre['name']?>">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php if(isset($edit_genre['id']) && $edit_genre['id'] > 0) echo $edit_genre['id']?>">
                        <input type="submit" class="btn btn-primary" name="btn_update" value="Cập Nhật">
                        <a href="index.php?act=list_genre"><input class="btn btn-primary" type="button" name="list_genre" value="Danh Sách Loại Phim"></a>

                    </div>
                </div>
            </form>
            <div class="col-sm-12 col-md-5">
            </div>
            <?php
            if (isset($thongbao) && ($thongbao) != "") {
                echo $thongbao;
            }
            ?>
        </div>
    </main>
</div>
