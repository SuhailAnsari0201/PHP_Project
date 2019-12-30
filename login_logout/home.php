<?php
session_start(); 
if($_SESSION['status'] != true){
    header("Location:login.php");
}
?>
<div>
    <h1>Welcome</h1>
    <a href="logout.php">logout</a>
</div>