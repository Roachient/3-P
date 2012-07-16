<?php
    session_start();
    $sql = "delete from posts where id=?";

    $db = new mysqli("127.0.0.1", "root", "", "blog");

    $stmt = new mysqli_stmt($db, $sql);

    $stmt->bind_param("i", $_GET["post_id"]);
    $stmt->execute();
    $returnVal = $stmt->affected_rows;

    $stmt->close();
    $db->close();

    echo $returnVal;

?>
