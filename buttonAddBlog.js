$(document).ready (function(){
        $("#btnAddBlog").click(function() {
        $("#createPost").dialog(
                                {
                                modal:true,
                                height: 375,
                                width: 650,
                                buttons: {
                                        "Canel": function() {
                                            $( this ).dialog( "close" );
                                        },
                                        "Create Post": function() {
                                            var title = $("#txtTitle").val();
                                            var description = $("#txtDescription").val();
                                            $.get("addBlog.php", {"title": title, "description": description},function(response){
                                            alert("Title: " + title);
                                            alert("Description: " + description);
                                        });
                                        }
                                        }
            });
        })    
})

function getSelection(){

}