/*
 * BimboTinto - Función de usuarios
 *
 */
/* ----------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------- */
function removeItemFromArr( arr, item ) {
    var i = arr.indexOf( item );
 
    if ( i !== -1 ) { arr.splice( i, 1 ); }
}

function cargarSelect( arr ) {

    $("#primer_gol").html("");
    jQuery('<option/>', { value: 'Ninguno', html: 'Ninguno' }).appendTo('#primer_gol');
    for( var i=0; i< arr.length; i++ ) {
        jQuery('<option/>', { value: arr[i], html: arr[i] }).appendTo('#primer_gol');
    }
}

/* ----------------------------------------------------------------------------------- */
$( document ).ready(function() {
    //var alineacion = new Array();

    $("#seljornada").on('change', function(){
        $( ".valjornada" ).val( $(this).val() );
    });

    $("#toggleJ").on( "click", function(){
        $("#Jtoggle").fadeToggle();
    });
    /*$(".chrjug").on( "click", function(){
        if( $(this).prop( "checked" ) ){
            if( alineacion.length <= 11 )
                alineacion.push( $(this).val() );
        }
        else
            removeItemFromArr( alineacion, $(this).val() );

        cargarSelect( alineacion );
        //console.log( alineacion );  
    });*/

});
/* ----------------------------------------------------------------------------------- */