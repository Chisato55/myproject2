<?php
session_start();
include("../include/config.php");

// รับค่า ID ของสินค้าที่ต้องการลบ
$pro_id = $_GET['id'];

// ตรวจสอบการรับค่า ID
if ($pro_id) {
    try {
        // คำสั่ง SQL เพื่อทำการลบสินค้า
        $sql = "DELETE FROM products WHERE pro_id = :id"; // Use pro_id instead of id
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $pro_id, PDO::PARAM_INT);
        $query->execute();

        // แสดงข้อความสำเร็จและไปยังหน้าจัดการสินค้า
        echo "<script>alert('ลบสินค้าสำเร็จ'); window.location.href = 'manage_product.php';</script>";
    } catch (Exception $e) {
        // ถ้ามีข้อผิดพลาดในการลบ ให้แสดงข้อความผิดพลาด
        echo "<script>alert('เกิดข้อผิดพลาดในการลบสินค้า: " . $e->getMessage() . "'); window.location.href = 'manage_product.php';</script>";
    }
} else {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการลบ'); window.location.href = 'manage_product.php';</script>";
}
?>
