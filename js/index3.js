$(document).ready(function(){
    
    $(".delete-partido").on("click",function(e){

        e.preventDefault();

        if(confirm("Estas seguro que quiere eliminar este partido?"))
        {
            let id=$(this).data("id");
            window.location.href="../PagesAdmin/PartidoDelete.php?id="+id;

        }

    });


});