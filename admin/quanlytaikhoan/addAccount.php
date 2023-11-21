<div class="container">
    <main>
        <div class="card">
            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="card-body">
                    <h4 class="card-title">Thêm Tài Khoản</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="username" placeholder="Nhập Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="password" placeholder="Nhập password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="name" placeholder="Nhập tên">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="lname" name="email" placeholder="Nhập tên">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="lname" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="submit" class="btn btn-primary" name="btn_add" value="Thêm Tài Khoản">
                        <a href="index.php?act=list_account"><input class="btn btn-primary" type="button" name="list_account" value="Danh Sách Tài Khoản"></a>
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
