<?php
include './connect/conn.php';
require './carbon/vendor/autoload.php';
use Carbon\Carbon;

$subday = carbon::now('Asia/Ho_Chi_Minh')->subDays(365)-> toDateString();
$now = carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$sql = "SELECT * FROM thongke WHERE ngaydat BETWEEN '$subday' AND '$now' ORDER BY ngaydat ASC";
$query = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($query)){
    $char_data[] = array(
        'date' => $row['ngaydat'],
        'order' => $row['donhang'],
        'sales' => $row['doanhthu'],
        'quantity' => $row['soluong']
    );
}
echo json_encode($char_data);
?>