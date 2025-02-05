<?php
include("../include/config.php");
session_start();

// ตรวจสอบว่า 'id' ถูกส่งมาหรือไม่
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // ดึงข้อมูลหมวดหมู่จากฐานข้อมูล
    $sql = "SELECT * FROM category WHERE cat_id = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    // ถ้าไม่พบข้อมูล
    if(!$result) {
        echo "ไม่พบหมวดหมู่ที่ต้องการแก้ไข";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>

    <h2>แก้ไขหมวดหมู่</h2>

    <!-- ฟอร์มแก้ไขหมวดหมู่ -->
    <form action="edit-category-api.php" method="POST">
        <input type="hidden" name="cat_id" value="<?php echo $result['cat_id']; ?>">
        
        <div>
            <label for="cat_name">ชื่อหมวดหมู่:</label>
            <input type="text" id="cat_name" name="cat_name" value="<?php echo $result['cat_name']; ?>" required>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        </div>
    </form>

</body>
</html>

