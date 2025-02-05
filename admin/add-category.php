<?php 
session_start();
include("../include/config.php");

// ตรวจสอบการส่งฟอร์ม
if(isset($_POST['submit'])){
  $categoryName = $_POST['category_name']; // รับข้อมูลหมวดหมู่จากฟอร์ม

  // สร้างคำสั่ง SQL เพื่อเพิ่มหมวดหมู่
  $sql = "INSERT INTO category (cat_name) VALUES (:category_name)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
  $query->execute();

  // แจ้งเตือนการเพิ่มหมวดหมู่สำเร็จ
  echo "<script>alert('เพิ่มหมวดหมู่เรียบร้อยแล้ว'); window.location.href='manage_category.php';</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>เพิ่มหมวดหมู่</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="container">
      <h2 class="mt-5">เพิ่มหมวดหมู่ใหม่</h2>
      <form method="POST">
        <div class="mb-3">
          <label for="category_name" class="form-label">ชื่อหมวดหมู่</label>
          <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">เพิ่มหมวดหมู่</button>
        <a href="manage_category.php" class="btn btn-secondary">กลับ</a>
      </form>
    </div>
  </body>
</html>
