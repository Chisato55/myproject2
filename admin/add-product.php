<?php
session_start();
include("../include/config.php");

// ตรวจสอบการส่งข้อมูล
if (isset($_POST['submit'])) {
    $pro_name = trim($_POST['pro_name']);
    $pro_price = trim($_POST['pro_price']);

    // ตรวจสอบว่า pro_name และ pro_price ไม่ว่าง
    if (empty($pro_name) || empty($pro_price)) {
        $error_message = "กรุณากรอกข้อมูลให้ครบถ้วน";
    } elseif (!is_numeric($pro_price) || $pro_price <= 0) {
        $error_message = "กรุณากรอกราคาเป็นตัวเลขที่ถูกต้องและมากกว่าศูนย์";
    } else {
        try {
            // คำสั่ง SQL เพื่อเพิ่มสินค้า
            $sql = "INSERT INTO products (pro_name, pro_price) VALUES (:pro_name, :pro_price)"; 
            $query = $dbh->prepare($sql);
            $query->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
            $query->bindParam(':pro_price', $pro_price, PDO::PARAM_STR);

            $query->execute();

            // แสดงข้อความสำเร็จและไปยังหน้าจัดการสินค้า
            $success_message = "เพิ่มสินค้าสำเร็จ";
        } catch (PDOException $e) {
            // แสดงข้อความข้อผิดพลาดในกรณีที่ไม่สามารถเพิ่มสินค้าได้
            $error_message = "เกิดข้อผิดพลาด: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>เพิ่มสินค้า</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
                        <?php endif; ?>

                        <?php if (!empty($success_message)): ?>
                            <div class="alert alert-success text-center"><?php echo $success_message; ?></div>
                            <script>
                                setTimeout(() => {
                                    window.location.href = "manage_product.php";
                                }, 2000);
                            </script>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">ชื่อสินค้า</label>
                                <input type="text" name="pro_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ราคา</label>
                                <input type="text" name="pro_price" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success w-100">เพิ่มสินค้า</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
