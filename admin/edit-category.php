<?php
include("../include/config.php");
session_start();

// ตรวจสอบว่า 'id' ถูกส่งมาหรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // ดึงข้อมูลหมวดหมู่จากฐานข้อมูล
    $sql = "SELECT * FROM category WHERE cat_id = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    // ถ้าไม่พบข้อมูล
    if (!$result) {
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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .card {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        h2 {
            font-size: 1.8em;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <h2>แก้ไขหมวดหมู่</h2>
            
            <!-- ฟอร์มแก้ไขหมวดหมู่ -->
            <form action="edit-category-api.php" method="POST">
                <input type="hidden" name="cat_id" value="<?php echo $result['cat_id']; ?>">

                <div class="mb-3">
                    <label for="cat_name" class="form-label">ชื่อหมวดหมู่:</label>
                    <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $result['cat_name']; ?>" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
