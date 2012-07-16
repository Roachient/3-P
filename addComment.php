<?php session_start();
    $username = $_SESSION["USERNAME"];
    $postId = $_GET["post_id"];
    $descDesc = $_GET["description"];
    
    //echo $username;
    $sql = "INSERT INTO comments(USERNAME, post_id, description) VALUES(?,?,?)";
    $db = new mysqli("127.0.0.1", "root", "", "blog");
    $stmt = new mysqli_stmt($db, $sql);

    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $username, $postId, $descDesc);
    $stmt->execute();
    echo $stmt->insert_id;
    $stmt->close();
    $db->close();
    
    ?>