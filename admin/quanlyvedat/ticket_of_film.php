    <!-- Show hết vé đặt của 1 phim: Thực hiện phía role là nhân viên -->

<main>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quản lý vé đặt</h5>
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Tên Người Dùng</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Tên Phim</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Phòng Chiếu</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Rạp Chiếu</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Ngày Chiếu</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Khung Giờ Chiếu</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Ghế Ngồi</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Ngày Đặt</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Số Lượng Vé</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Trạng Thái</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Tổng Giá</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($list_orderTicketOfFilm as $value) {
                                            extract($value); ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo $username ?></td>
                                                <td><?php echo $name_film ?></td>
                                                <td><?php echo $name_room ?></td>
                                                <td><?php echo $name_cinema ?></td>
                                                <td><?php echo $show_date ?></td>
                                                <td><?php echo "$start_time" . " - " . "$end_time" ?></td>
                                                <td class="sorting_1"><?php echo $seat_order ?></td>
                                                <td><?php echo $order_date ?></td>
                                                <td><?php echo $quantity ?></td>
                                                <?php if ($status == "Chờ thanh toán") { ?>
                                                   <td style="color: red; font-weight: 700;"><?php echo $status ?></td>
                                                   <?php
                                                } else {
                                                    ?>
                                                    <td style="color: green; font-weight: 700;"><?php echo $status ?></td>
                                                    <?php
                                                }
                                                ?>
                                                
                                                <td><?php echo $price ?></td>
                                                <td>
                                                    <!-- <a href="index.php?act=edit_film&id=<?php echo $id ?>"><input class="btn btn-primary" type="button" name="btn_edit" value="Sửa"></a> | <a onclick="return confirm('Bạn có muốn xóa phim này không?')" href="index.php?act=delete_film&id=<?php echo $id ?>"><input class="btn btn-primary" type="button" name="btn_delete" value="Xóa"></a> -->
                                                    <?php
                                                    if ($status == 'Chờ thanh toán') { ?>
                                                        <a onclick="return confirm('Bạn có muốn thanh toán vé này không?')" href="index.php?act=confirmPayment&id_order=<?php echo $id_order ?>"><input type="button" class="btn btn-primary" style="margin: 20px 0 0 0" value="Xác nhận thanh toán"></a>
                                                    <?php
                                                    }
                                                    ?>
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