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
                success: function (response){
                    alert(response['success']);
                    modifiable.remove();
                }
            });
        }
    });



    $('table').on('click', '.update', function(event){
        event.preventDefault();
        $(this).toggleClass('update validate').text('Valider');
        $(this).closest('tr').find('td').siblings('td').not(':last-child').each(function(){
            var contenu = $(this).text();
            $(this).html('<input />').find('input').val(contenu);
        });
    });

    $('table').on('click', '.validate', function(event){
        event.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");
        $(this).toggleClass('update validate').text('Modifier');
        var numero = $(this).closest('tr').find('td.numero input').val();
        var denomination = $(this).closest('tr').find('td.denomination input').val();
        var adresse = $(this).closest('tr').find('td.adresse input').val();
        var telephone = $(this).closest('tr').find('td.telephone input').val();

        $.ajax({
            url: url + '/' + id,
            data : {
                "id": id,
                "_token": token,
                numero: numero,
                denomination: denomination,
                adresse: adresse,
                telephone: telephone
            },
            method: 'post',
            success: (response) => {
                if (response['valeur'] == 1){
                    alert(response['success']);
                    $(this).closest('tr').find('td').siblings('td').not(':last-child').each(function(){
                        var contenu = $(this).find('input').val();
                        $(this).text(contenu);
                    });
                }
            }
        });

    });

});
