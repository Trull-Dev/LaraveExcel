$(document).ready( function () {


    $('.delete').on('click', function(event){
        event.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).data('id');
        var modifiable = $(this).closest('.modifiable');
        var token = $("meta[name='csrf-token']").attr("content");
        var confirmation = confirm('Êtes-vous certain de vouloir supprimer?');

        if (confirmation == true){
            $.ajax({
                url: url + '/' + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    alert("Suppression réussie");
                    modifiable.remove();
                }
            });
        }
    });



    $('.update').on('click', function(event){
        event.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");

    })


});
