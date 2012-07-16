<?php
session_start();

$db = new mysqli("127.0.0.1", "root", "", "blog");

$sql = "select count(*) from users where username = ? and password = ?";

$stmt = $db->prepare($sql);

$stmt->bind_param("ss", $_POST["txtUsername"], ($_POST["txtPassword"]));

$stmt->execute();

$stmt->bind_result($recordCount);

$stmt->fetch();

if($recordCount > 0){
    $_SESSION["USERNAME"] = $_POST["txtUsername"];
    header("Location:allBlogs.php");
} else {
    header("Location.login.html");
}

?>