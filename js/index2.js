$(document).ready(function(){
    
    $(".delete-candidato").on("click",function(e){

        e.preventDefault();

        if(confirm("Estas seguro que quiere eliminar esta estudiante?"))
        {
            let id=$(this).data("id");
            window.location.href="../PagesAdmin/CandidatosDelete.php?id="+id;

        }

    });


});