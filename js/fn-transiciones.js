/*
 * BimboTinto - Función sobre transiciones
 *
 */
/* ----------------------------------------------------------------------------------- */
function ircaja(){
    gsap.to( "#esquema_aln", { duration: 1, y: 800, ease: "back.in(1)" } );
    gsap.to( "#esquema_aln", { duration: 4, opacity: 0, ease: "back" });

    gsap.to( "#panel_jugadores", { duration: 4, rotationY:180, ease: "back" });
}
/* ----------------------------------------------------------------------------------- */
function flipsrc( p, v ){
    //
    if( v )
        $( ".fr" + p ).attr( "src", "img/vinotinto.png" );
    else
        $( ".fr" + p ).attr( "src", "img/blanca.png" );
}
/* ----------------------------------------------------------------------------------- */
function cambiarFranela( pos, v ){

    gsap.to( ".fr" + pos, { duration: 0.2, scale: 1.5, opacity: 0, onComplete: flipsrc, onCompleteParams: [pos,v] } );
    gsap.to( ".fr" + pos, { delay:0.2, duration: 0.4, scale: 1, opacity: 1 } );
}
/* ----------------------------------------------------------------------------------- */
$( document ).ready(function() {	
    
	
});
/* ----------------------------------------------------------------------------------- */