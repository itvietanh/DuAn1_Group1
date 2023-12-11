<?php if ($_SESSION['account']['role'] == 0) {
?>
        <main style="margin: 30px 30px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quản lý phim</h5>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="zero_config_length"><label>Show <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <form action="index.php?act=quanlyphim" method="post">
                                        <div id="zero_config_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="text" name="kyw" class="form-control form-control-sm" placeholder="" aria-controls="zero_config">
                                            </label>
                                            <input type="submit" class="btn btn-primary" name="filer" value="Tìm kiếm">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Tên Phim</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Ngày Khởi Chiếu</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thể Loại</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Banner</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($list_film as $value) {
                                                extract($value); ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?php echo $id ?></td>
                                                    <td><?php echo $name ?></td>
                                                    <td><?php echo $rel_date ?></td>
                                                    <td><?php echo $id_genre ?></td>
                                                    <td><img src="<?php echo $image ?>"></td>
                                                    <td>
                                                        <a href="index.php?act=edit_film&id=<?php echo $id ?>"><input class="btn btn-primary" type="button" name="btn_edit" value="Sửa"></a> | <a onclick="return confirm('Bạn có muốn xóa phim này không?')" href="index.php?act=delete_film&id=<?php echo $id ?>"><input class="btn btn-primary" type="button" name="btn_delete" value="Xóa"></a> <br>
                                                        <a href="index.php?act=showTimeFrame&id_film=<?php echo $id ?>"><input type="button" class="btn btn-primary" style="margin: 20px 0 0 0" value="Thêm Lịch Chiếu"></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <a href="index.php?act=add_film"><input class="btn btn-primary" type="button" name="add_film" value="Thêm Phim"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    <div class="container">
    </div>
<?php
} else {
?>
    <div class="container">
        <main>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quản lý phim</h5>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="zero_config_length"><label>Show <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <form action="index.php?act=quanlyphim" method="post">
                                        <div id="zero_config_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="text" name="kyw" class="form-control form-control-sm" placeholder="" aria-controls="zero_config">
                                            </label>
                                            <input type="submit" class="btn btn-primary" name="filer" value="Tìm kiếm">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Tên Phim</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Ngày Khởi Chiếu</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thể Loại</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Banner</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($list_film as $value) {
                                                extract($value); ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?php echo $id ?></td>
                                                    <td><?php echo $name ?></td>
                                                    <td><?php echo $rel_date ?></td>
                                                    <td><?php echo $id_genre ?></td>
                                                    <td><img src="<?php echo $image ?>"></td>
                                                    <td>
                                                        <a href="index.php?act=quanlyvedatofphim&id_film=<?php echo $id ?>"><input type="button" class="btn btn-primary" style="margin: 20px 0 0 0" value="Danh sách vé đạt phim"></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <a href="index.php?act=add_film"><input class="btn btn-primary" type="button" name="add_film" value="Thêm Phim"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
<?php
}

?>