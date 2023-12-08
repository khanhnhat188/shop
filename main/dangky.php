<?php
session_start();
// Kiểm tra nếu có dữ liệu được gửi đi từ form
if (isset($_POST['dangky'])) {
    // Lấy dữ liệu từ form
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);
    $ap = $_POST['diachi'];
    // Lấy giá trị từ form
    $tinhThanhPho = $_POST['tinh_thanhpho'];
    $huyen = $_POST['huyen'];
    $xa = $_POST['xa'];

    // Kết hợp giá trị thành một chuỗi
    $diachi = "$ap, $xa, $huyen, $tinhThanhPho";
    // Thực hiện truy vấn SQL để thêm dữ liệu vào cơ sở dữ liệu
    $sql_dangky = "INSERT INTO dangky(tenkhachhang, email, dienthoai, matkhau, diachi) 
                   VALUES ('$ten', '$email', '$dienthoai', '$matkhau', '$diachi')";
    $query_dangky = mysqli_query($conn, $sql_dangky);
    if ($query_dangky) {
        $_SESSION['dangky'] = $ten;
        header('location:index.php?quanly=giohang');
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
                                    <input type="text" name="ten" class="form-control form-control-lg" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="matkhau">Mật khẩu</label>
                                    <input type="password" name="matkhau" class="form-control form-control-lg"
                                        required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="dienthoai">Điện thoại</label>
                                    <input type="text" name="dienthoai" class="form-control form-control-lg" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="tinh_thanhpho">Tỉnh/Thành phố</label>
                                    <select name="tinh_thanhpho" id="city" class="form-control form-control-lg"
                                        required></select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="huyen">Huyện</label>
                                    <select name="huyen" id="district" class="form-control form-control-lg" required></select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="xa">Xã</label>
                                    <select name="xa" id="ward" class="form-control form-control-lg" required></select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="diachi">Ấp, Khu Vực</label>
                                    <input type="text" name="diachi" class="form-control form-control-lg" required />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="dangky"
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng
                                        ký</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#"
                                        class="fw-bold text-body"><u>Login here</u></a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
    const host = "https://provinces.open-api.vn/api/";
var callAPI = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data, "city");
        });
}
callAPI('https://provinces.open-api.vn/api/?depth=2');
var callApiDistrict = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.districts, "district");
        });
}
var callApiWard = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.wards, "ward");
        });
}

var renderData = (array, select) => {
    let row = ' <option disable value="">Chọn</option>';
    array.forEach(element => {
        row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
    });
    document.querySelector("#" + select).innerHTML = row
}

$("#city").change(() => {
    callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
    printResult();
});
$("#district").change(() => {
    callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
    printResult();
});
$("#ward").change(() => {
    printResult();
})

var printResult = () => {
    if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
        $("#ward").find(':selected').data('id') != "") {
        let result = $("#city option:selected").text() +
            " | " + $("#district option:selected").text() + " | " +
            $("#ward option:selected").text();
        $("#result").text(result)
    }

}
	</script>