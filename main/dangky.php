<?php
    // Kiểm tra nếu có dữ liệu được gửi đi từ form
    if(isset($_POST['dangky'])){
        // Lấy dữ liệu từ form
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = $_POST['matkhau'];
        $diachi = $_POST['diachi'];

        // Thực hiện truy vấn SQL để thêm dữ liệu vào cơ sở dữ liệu
        $sql_dangky = "INSERT INTO dangky(tenkhachhang, email, dienthoai, matkhau, diachi) VALUES ('$ten', '$email', '$dienthoai', '$matkhau', '$diachi')";
        $query_dangky = mysqli_query($conn, $sql_dangky);

        // Kiểm tra xem truy vấn có thành công không
        if($query_dangky){
            echo '<script>alert("Đăng ký thành công"); window.location="index.php";</script>';
        } else {
            echo '<script>alert("Đăng ký thất bại");</script>';
        }
    }
?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Dang ky</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Dang ky</p>
        </div>
    </div>
</div>

<section class="bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Thông tin đăng ký</h2>
                            <form method="POST" action="">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="ten">Họ và tên</label>
                                    <input type="text" name="ten" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="matkhau">Mật khẩu</label>
                                    <input type="password" name="matkhau" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="dienthoai">Điện thoại</label>
                                    <input type="text" name="dienthoai" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="diachi">Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control form-control-lg" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="dangky"
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng
                                        ký</button>
                                </div>
                                
                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                                        class="fw-bold text-body"><u>Login here</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
