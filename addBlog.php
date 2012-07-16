<?php
    session_start();
    $username = $_SESSION["USERNAME"];
    $postTitle = $_GET["title"];
    $postDesc = $_GET["description"];
    
    echo $username;
    $sql = "INSERT INTO posts(username, title, description) VALUES(?,?,?)";
    $db = new mysqli("127.0.0.1", "root", "", "blog");
    $stmt = new mysqli_stmt($db, $sql);

    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $username, $postTitle, $postDesc);
    echo $postDesc;
    $stmt->execute();
    
    $stmt->close();
    $db->close();
    
?>
