<?php extract($ticket)?>

<div class="container">
    <main>
        <div class="card">
            <form action="index.php?act=update_ticket" class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <h4 class="card-title">Sửa Vé</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giá Vé</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="fname" name="price" value="<?php echo $price?>">
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phim</label>
                     <select name="id_film" id="">
                        <option value=""> ----- Lựa Chọn ----- </option>
                        <?php 
                            foreach ($list_film as  $value) {
                                extract($value);
                                ?>
                                <option value="<?=$id?>" <?php if($id == $_GET['id_film']) echo "selected";?>><?=$name?></option>
                                <?php
                            }
                        ?>
                     </select>
                </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="hidden" name="id_ticket" value="<?=$_GET['id']?>">
                        <input type="submit" class="btn btn-primary" name="btn_update" value="Cập Nhật Vẽ">
                        <a href="index.php?act=list_ticket"><input class="btn btn-primary" type="button" name="list_ticket" value="Danh Sách Vẽ"></a>

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