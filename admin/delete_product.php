<?php 
session_start();
include("../include/config.php");
error_reporting(0);

if(isset($_GET['did'])) {
  $did = $_GET['did'];
  $sql = "DELETE FROM products WHERE pro_id=:did";
  $query = $dbh->prepare($sql);
  $query->bindParam(':did', $did, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Product has been deleted')</script>";
  echo "<script>window.location.href='manage_product.php'</script>";
}
?>