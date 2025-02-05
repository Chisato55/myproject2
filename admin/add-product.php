<?php
session_start();
include("../include/config.php");

// ตรวจสอบการส่งข้อมูล
if (isset($_POST['submit'])) {
    $pro_name = trim($_POST['pro_name']);
    $pro_price = trim($_POST['pro_price']);

    // ตรวจสอบว่า pro_name และ pro_price ไม่ว่าง
    if (empty($pro_name) || empty($pro_price)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
    } elseif (!is_numeric($pro_price) || $pro_price <= 0) {
        echo "<script>alert('กรุณากรอกราคาเป็นตัวเลขที่ถูกต้องและมากกว่าศูนย์');</script>";
    } else {
        try {
            // คำสั่ง SQL เพื่อเพิ่มสินค้า
            $sql = "INSERT INTO products (pro_name, pro_price) VALUES (:pro_name, :pro_price)"; // Use 'products' table
            $query = $dbh->prepare($sql);
            $query->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
            $query->bindParam(':pro_price', $pro_price, PDO::PARAM_STR);

            $query->execute();

            // แสดงข้อความสำเร็จและไปยังหน้าจัดการสินค้า
            echo "<script>alert('เพิ่มสินค้าสำเร็จ'); window.location.href = 'manage_product.php';</script>";
        } catch (PDOException $e) {
            // แสดงข้อความข้อผิดพลาดในกรณีที่ไม่สามารถเพิ่มสินค้าได้
            echo "<script>alert('เกิดข้อผิดพลาด: " . $e->getMessage() . "');</script>";
        }
    }
}
?>

<form method="POST" action="">
    <div>
        <label>ชื่อสินค้า</label>
        <input type="text" name="pro_name" required>
    </div>
    <div>
        <label>ราคา</label>
        <input type="text" name="pro_price" required>
    </div>

    <button type="submit" name="submit" class="btn btn-success">เพิ่มสินค้า</button>
</form>
