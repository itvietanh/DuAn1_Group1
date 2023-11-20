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
                                <div id="zero_config_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero_config"></label></div>
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
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Khung Giờ Chiếu</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Banner</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thao Tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($list_film as $value) {
                                        extract($value); ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $id?></td>
                                            <td><?php echo $name?></td>
                                            <td><?php echo $rel_date?></td>
                                            <td><?php echo $id_genre?></td>
                                            <td><?php echo "$start_time" . " - " . "$end_time"?></td>
                                            <td><img src="<?php echo $image?>"></td>
                                            <td>
                                                <a href="index.php?act=edit_film&id=<?php echo $id?>"><input class="btn btn-primary" type="button" name="btn_edit" value="Sửa"></a> | <a onclick="return confirm('Bạn có muốn xóa phim này không?')" href="index.php?act=delete_film&id=<?php echo $id?>"><input class="btn btn-primary" type="button" name="btn_delete" value="Xóa"></a>
                                                <a href=""><input type="button" class="btn btn-primary" style="margin: 20px 0 0 0" value="Thêm Lịch Chiếu"></a>
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
                            <!--                        <div class="col-sm-12 col-md-7">-->
                            <!--                            <div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate">-->
                            <!--                                <ul class="pagination">-->
                            <!--                                    <li class="paginate_button page-item previous disabled" id="zero_config_previous"><a href="#" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>-->
                            <!--                                    <li class="paginate_button page-item active"><a href="#" aria-controls="zero_config" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>-->
                            <!--                                    <li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>-->
                            <!--                                    <li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>-->
                            <!--                                    <li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>-->
                            <!--                                    <li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>-->
                            <!--                                    <li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>-->
                            <!--                                    <li class="paginate_button page-item next" id="zero_config_next"><a href="#" aria-controls="zero_config" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>
