<?php
include("../include/config.php");
session_start();

// ตรวจสอบว่า 'cat_id' และ 'cat_name' ถูกส่งมาหรือไม่
if(isset($_POST['cat_id']) && isset($_POST['cat_name'])){
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    
    // สร้างคำสั่ง SQL เพื่ออัปเดตข้อมูล
    $sql = "UPDATE category SET cat_name = :cat_name WHERE cat_id = :cat_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cat_name', $cat_name, PDO::PARAM_STR);
    $query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
    $query->execute();
    
    // แจ้งเตือนการอัปเดตสำเร็จและกลับไปที่หน้า manage_category.php
    echo "<script>alert('หมวดหมู่ถูกแก้ไขเรียบร้อยแล้ว'); window.location.href='manage_category.php';</script>";
}
?>
