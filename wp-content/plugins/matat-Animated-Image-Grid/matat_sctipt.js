/**
 * Created by amit on 1/2/2016.
 */
( function( $ ) {

    $('.delete').click(function (e){
        e.preventDefault();


        var img_id=$(this).data('id');

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                'action': 'matat_img_delete',
                'id': img_id,

            },
            success: function (response) {

                location.reload();
            }
        });



    });




} )( jQuery );
