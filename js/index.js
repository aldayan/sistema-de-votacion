$(document).ready(function(){
    
    $(".delete-PE").on("click",function(e){

        e.preventDefault();

        if(confirm("Estas seguro que quiere eliminar esta estudiante?"))
        {
            let id=$(this).data("id");
            window.location.href="../PagesAdmin/PuestoEdelete.php?id="+id;

        }

    });


});