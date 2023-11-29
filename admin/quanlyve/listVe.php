<div class="container">
    <main>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quản lý Vẽ</h5>
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177.337px;">ID Ticket</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283.625px;">Phim</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283.625px;">Giá Vé</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106.25px;">Thao Tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($list_ticket as $value) {
                                        extract($value); ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $id_ticket?></td>
                                            <td><?php echo $name_film?></td>
                                            <td><?php echo $price?></td>
                                            <td><a href="index.php?act=edit_ticket&id=<?php echo $id_ticket?>&id_film=<?php echo $id_film?>"><input class="btn btn-primary" type="button" name="btn_edit" value="Sửa"></a> | <a onclick="return confirm('Bạn có muốn xóa loại vẽ này không?')" href="index.php?act=delete_ticket&id=<?php echo $id_ticket?>"><input class="btn btn-primary" type="button" name="btn_delete" value="Xóa"></a></td>
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
                                <a href="index.php?act=add_ticket"><input class="btn btn-primary" type="button" name="add_ticket" value="Thêm Vé"></a>
                            </div>
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>