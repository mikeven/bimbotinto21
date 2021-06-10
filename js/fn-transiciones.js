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
function imagenPaso( img, efect ){
    
    if( efect == "y-mov" ){
        var tl = gsap.timeline({ repeat: -1, repeatDelay: 0 });

            tl.to( img, { duration: 1, y: -10, scale: 1, ease: Power2.easeInOut } ).
               to( img, { duration: 1, y: 0, scale: 1, ease: Power2.easeInOut } );
    }
    if( efect == "fade" ){
        var tl = gsap.timeline({ repeat: -1, repeatDelay: 5 });

            tl.to( img, { duration: 0.2, opacity: 0, y: -10, scale: 1.03, ease: Power2.easeInOut } ).
               to( img, { duration: 0.5, opacity: 1, y: 0, scale: 1, ease: Power2.easeInOut } );
    }
    if( efect == "escalfade" ){
        var tl = gsap.timeline({ repeat: -1, repeatDelay: 10 });

        tl.to( img, { duration: 0.2, opacity: 0, scale: 1.5, ease: Power2.easeInOut } ).
           to( img, { duration: 0.5, opacity: 1, scale: 1, ease: Power2.easeInOut } );
    }
}
/* ----------------------------------------------------------------------------------- */
function scaleAn( elem ){
    var tl = gsap.timeline({ });
    tl.to( elem, { duration: 0.2, scale: 1.1, y: -5, ease: Power2.easeInOut } ).
       to( elem, { duration: 0.2, scale: 1, y: 0, ease: Power2.easeInOut } );
}
function listaJugadores(){
    var dly = 0;

    for ( j = 0; j <= 11; j++ ){
        dly += 0.1;
        gsap.to( "#jonce" + j, { delay: dly, duration: 1, opacity: 1, ease: "back.in(1)", 
                                 onComplete: scaleAn, onCompleteParams: ["#jonce" + j] } );
    }
}
/* ----------------------------------------------------------------------------------- */
function equiposJornada(){
    var dly = 0;

    for ( j = 1; j <= 3; j++ ){
        dly += 0.1;
        gsap.to( "#eqjor" + j, { delay: dly, duration: 1, opacity: 1, ease: "back.in(1)", 
                                 onComplete: scaleAn, onCompleteParams: ["#eqjor" + j] } );
    }
}
/* ----------------------------------------------------------------------------------- */
function resumenJornada(){
    var dly = 0;

    for ( j = 0; j <= 12; j++ ){
        dly += 0.1;
        gsap.to( "#rjor" + j, { delay: dly, duration: 1, opacity: 1, ease: "back.in(1)", 
                                 onComplete: scaleAn, onCompleteParams: ["#rjor" + j] } );
    }  
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

function animarPremio(){
    gsap.to( ".enc_premio", { duration: 0.2, scale: 1.5, opacity: 0 });
    gsap.to( ".enc_premio", { delay:0.2, duration: 0.4, scale: 1, opacity: 1 } );
    gsap.to( ".franelapremio", { duration: 0.2, scale: 1.5, opacity: 0 });
    gsap.to( ".franelapremio", { delay:0.2, duration: 0.4, scale: 1, opacity: 1 } );
    gsap.to( ".pie_premio", { duration: 0.2, scale: 1.5, opacity: 0 });
    gsap.to( ".pie_premio", { delay:0.2, duration: 0.4, scale: 1, opacity: 1 } );

    var tf = gsap.timeline({ repeat: -1, repeatDelay: 5 });
    tf.to( "#imgfranela", { duration: 1, scale: 1.5, y: -5, ease: Power2.easeInOut } ).
       to( "#imgfranela", { duration: 1, scale: 1, y: 0, ease: "bounce.out" } );
}
/* ----------------------------------------------------------------------------------- */
$( document ).ready(function() {	
    
	
});
/* ----------------------------------------------------------------------------------- */