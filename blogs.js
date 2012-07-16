
$(document).ready (function(){
    $("#btnAddBlog").click(function() {
    $("#createPost").dialog(
                            {
                            modal:true,
                            height: 375,
                            width: 650,
                            buttons: {
                                    "Cancel": function() {
                                        $( this ).dialog( "close" );
                                    },
                                    "Create Post": function() {
                                        var title = $("#txtTitle").val();
                                        var description = $("#txtDescription").val();
                                        $.get("addBlog.php", {"title": title, "description": description},function(response){
                                        $("<li>").attr("id", response).text("Title", title) + ("Description", description).appendTo($("#blogs"));
                                    })
                                        $( this ).dialog( "close" );
                                    } 
                                    }
        })
    })
    
    $(".btnAddComments").click(function(){
    var parent = $(this).parent();
    var post_id = $(this).parent().attr("id");
    var username = $(this).parent().attr("USERNAME");
    $("#createComment").dialog(
                            {
                            modal:true,
                            height: 375,
                            width: 650,
                            buttons: {
                                    "Cancel": function() {
                                        $( this ).dialog( "close" );
                                    },
                                    "Create Comment": function() {
                                        var id = $.get("allBlogs", {"USERNAME":username, "id":post_id});
                                        var description = $("#txtComDescription").val();
                                        $.get("addComment.php", {"USERNAME": username, "post_id": post_id, "description": description},function(response){
                                        $("<li>").attr("id", response).text("Description " + description).appendTo($("#comments"));
                                    })
                                        $( this ).dialog( "close" );
                                    } 
                                    }
        })
    })

    
    $(".btnDeleteBlog").click(function(){
    var parent = $(this).parent();
    var post_id = $(this).parent().attr("id");
    var username = $(this).parent().attr("USERNAME");
    var post_user = $(this).parent().attr("post_user");
    if(username == post_user){
        $.get("deleteBlogs.php", {"post_id": post_id}, function(response){
            //remove the post from the html
            parent.remove();
        });
    }
    })
    
    
});

 



