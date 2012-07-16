<?php session_start(); ?>   
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
        <script type="text/javascript" src="blogs.js"></script>
        <link rel="stylesheet" type="text/css" href="blog.css" />
        <link rel="stylesheet" type="text/css" href="css/excite-bike/jquery-ui-1.8.16.custom.css" />
        <title>All Blogs</title>
    </head>
    <body>
        <input id="btnAddBlog" type="button" value="Add a post"></input>
        <ul id="blogs"><h3>Blogs from all users:</h3>
            <?php
                $username = $_SESSION["USERNAME"];
                $post_user = $_SESSION["USERNAME"];
                $db = new mysqli("127.0.0.1", "root", "", "blog");
                $sql = "SELECT * FROM posts"; //WHERE username = $username";    
                $stmt = new mysqli_stmt($db, $sql);
                $stmt->execute();
                $stmt->bind_result($id, $username, $title, $description, $created);
                while($stmt->fetch()) {
                    echo '<li id="' . $id . '">' . 'Id: ' . $id . ' Title: ' . $title . ' Description: ' . $description
                    . '  ' . '<input class="btnAddComments" type="button" value="Add a Comment"></input>' . '  '
                    . '  ';
                    del($username);
                    $records = com($id);
                    echo($records);
                }       
                function com($postId){
                    $post_user = $username;
                    $username2 = $_SESSION["USERNAME"];
                    $db2 = new mysqli("127.0.0.1", "root", "", "blog");
                    $sql2 = "SELECT p.username, c.post_id, c.description FROM posts p, comments c WHERE p.id = c.post_id and c.post_id = $postId";    
                    $stmt2 = new mysqli_stmt($db2, $sql2);
                    $stmt2->execute();
                    $stmt2->bind_result($user, $post_id, $description);
                    while($stmt2->fetch()) {
                            $stmt_c .= '<li id="' . $user . '" class="usr" >' . ' Post Id: ' . $post_id . ' Description: ' . $description . '</li>';
                    }
                    return ($stmt_c);                    
                    $stmt2->close();
                    }
                    
                function del($username){
                    $sessionusername = $_SESSION["USERNAME"];
                    if ($username == $session[username]){
                        echo '<input class="btnDeleteBlog" type="button" value="Delete a BlogPost"></input>';
                    } else {
                        echo '<div class="usr2">You cannot delete this post.</div>';
                    }
                }
            ?>
        </ul>
        <ul id="comments">
        </ul>
            <div id="createPost"   title="Create a new Post" style="display:none">
                <div id=$id >Post Title:</div>
                <div><input maxlength="50" type="text" id="txtTitle" /></div>
                <div>Post Description (500 characters max):</div>
                <div>
                    <textarea id="txtDescription" rows="5" cols="60"></textarea>
                </div>
            </div>
            <div id="blog"></div>
            <div id="createComment" title="Create a new Comment" style="display:none">
                <div id="USERNAME" style="display:none"></div>
                
                <div>Comment Description (500 characters max):</div>
                <div>
                    <textarea id="txtComDescription" rows="5" cols="60"></textarea>
                </div>
            </div>
    </body>
</html>

