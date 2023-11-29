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
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Password</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Role</th>
                                    <th></th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($list_account as $value) {
                                    extract($value); ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo $id?></td>
                                        <td><?php echo $username?></td>
                                        <td><?php echo $password?></td>
                                        <td><?php echo $name?></td>
                                        <td><?php echo $email?></td>
                                        <td><?php echo $phone?></td>
                                        <td><?php echo $role?></td>
                                        <td>
                                            <?php 
                                            if ($role == 0) {
                                                echo "ADMIN";
                                            } else if ($role == 1) {
                                                echo "NHÂN VIÊN";
                                            } else {
                                                echo "KHÁCH HÀNG";
                                            }
                                            ?> 
                                        </td>
                                        <td>
                                            <a href="index.php?act=edit_account&id=<?php echo $id?>"><input class="btn btn-primary" type="button" name="btn_edit" value="Sửa"></a> | <a onclick="return confirm('Bạn có muốn xóa tài khoản này không?')" href="index.php?act=delete_account&id=<?php echo $id?>"><input class="btn btn-primary" type="button" name="btn_delete" value="Xóa"></a>
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
                            <a href="index.php?act=add_account"><input class="btn btn-primary" type="button" name="add_account" value="Thêm Tài Khoản"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
