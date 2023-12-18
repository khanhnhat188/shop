<?php
    $sql_lietke_sp = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($conn,$sql_lietke_sp);
?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">Danh sách sản phẩm</h4>
                            </div>
                            <div class="card-body">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style = "width: 20%">Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Tóm tắt</th>
                                            <th>Hình ảnh</th>
                                            <th>Chỉnh sửa</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        $i = 0;
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['tensanpham'] ?></td>
                                            <td><?php echo $row['giasp'] ?></td>
                                            <td><?php echo $row['tomtat'] ?></td>
                                            <td><img src="<?php echo $row['hinhanh'] ?>" height="100"
                                                    width="100"></td>
                                            <td>
                                                <a href="?action=qlsanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                                        </tr>
                                        <?php
}
?>
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->
            </div> <!-- container -->

        </div> <!-- content -->

        <script src="assets/js/vendor.min.js"></script>

        <!-- Datatables js -->
        <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
        <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Datatable Demo Aapp js -->
        <script src="assets/js/pages/datatable.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

    </html>