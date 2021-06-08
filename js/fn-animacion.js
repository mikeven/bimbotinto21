/*
 * BimboTinto - Función de usuarios
 *
 */
/* ----------------------------------------------------------------------------------- */
function cambiarFranela( pos, v ){

	if( v ){
        $( ".fr" + pos ).attr( "src", "img/vinotinto.png" );
        //$( ".fr" + pos ).addClass("imgfranela2");
    }
    else{
        //$( ".fr" + pos ).removeClass("imgfranela2");
        $( ".fr" + pos ).attr( "src", "img/blanca.png" );
    }
}