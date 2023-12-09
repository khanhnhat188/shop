<?php
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']);
                $sql = "SELECT * FROM dangky WHERE email='$email' AND matkhau='$matkhau' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        if($result && mysqli_num_rows($result) > 0){
            $row_dangnhap = mysqli_fetch_array($result);
            $_SESSION['dangky'] = $row_dangnhap['tenkhachhang'];
            $_SESSION['id_dangky'] = $row_dangnhap['id_dangky'];
            /* header("location:index.php?quanly=giohang"); */
            echo '<script>location.href="index.php?quanly=giohang"</script>';
            exit(); // Kết thúc kịch bản sau khi chuyển hướng
        } else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng")</script>';
        }
    }
   
?>


<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng nhập</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Đăng nhập</p>
        </div>
    </div>
</div>

<section class="bg-image">
    <div class="mask d-flex align-items-center gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Thông tin đăng nhập</h2>
                            <form method="POST" action="">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="Email" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" minlength="4" maxlength="8" size="8" for="matkhau">Mật
                                        khẩu</label>
                                    <input type="password" name="matkhau" class="form-control form-control-lg"
                                        placeholder="Mật khẩu" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="dangnhap"
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng
                                        nhập</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>