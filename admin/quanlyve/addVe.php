<div class="container">
    <main>
        <div class="card">
            <form action="index.php?act=add_ticket" class="form-horizontal" method="post">
                <h4 class="card-title">Thêm Vé</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giá Vé</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="fname" name="price" placeholder="Nhập thêm giá vé">
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
                                <option value="<?=$id?>"><?=$name?></option>
                                <?php
                            }
                        ?>
                     </select>
                </div>
                <div class="border-top">
                    <input type="submit" class="btn btn-primary" name="btn_add" value="Thêm Ve">
                    <a href="index.php?act=quanlyve"><input class="btn btn-primary" type="button" name="list_ticket" value="Danh Sách Ve"></a>
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