/*
 * BimboTinto - Función de usuarios
 *
 */
/* ----------------------------------------------------------------------------------- */
function casillaDisponible( pos ){
    // Devuelve la casilla disponible de una posición
    var pos_dsp = "ninguna";
    $( "." + pos ).each(function() {
        if( $(this).html() == "" ) {
            pos_dsp = ( $(this).attr("id") );
            return false;
        }
    });
    
    return pos_dsp;
}
/* ----------------------------------------------------------------------------------- */
function casillaJugador( jugador, pos ){
    // Devuelve la casilla disponible de una posición
    var pos_jgd = "";

    $( "." + pos ).each(function() {
        console.log( jugador + " " + pos );
        if( $(this).html() == jugador ) {
            
        }
    });
    
    return pos_jgd;
}
/* ----------------------------------------------------------------------------------- */
function posicionSeleccionado( jugador, pos ){
    // Devuelve verdadero si un jugador ya fue asignado a una posición
    var pos_jgd = "ninguna";
    
    $( "." + pos ).each(function() {
        if( $(this).html() == jugador ) {
            $(this).html("");
            pos_jgd = $(this).attr("id");
        }
    });
    
    return pos_jgd;
}
/* ----------------------------------------------------------------------------------- */
function asignarJugadorPosicion( jugador, pos ){
    var casilla = casillaDisponible( pos );
    $( "#" + casilla ).html( jugador );

    return casilla;
}
/* ----------------------------------------------------------------------------------- */
function alineacionCompleta(){
    // Devuelve verdadero si la alineación fue llenada por completo
    var completo = true;
    
    $( ".etiq_jugador" ).each(function() {
        if( $(this).html() == "" ) {
            completo = false;
        }
    });
    if( $("#porteropos").html() == "" ) completo = false;
    
    if ( completo ){
        var idx = 1;
        $( "#ch_jg0" ).val( $( "#porteropos" ).html() ); /* Asignación de checkbox para portero */
        $( ".etiq_jugador" ).each(function() {
            /* Asignación de checkbox para el resto de los jugadores */
            $( "#ch_jg" + idx ).val( $(this).html() );
            idx++;
        });
        $( ".chjugador" ).prop('checked', true);
        
    }  
    //console.log("COMPLETO: "+completo);
    siguientePaso( completo );
    
    return completo;
}
/* ----------------------------------------------------------------------------------- */
function pasoCompleto( idvalor ){
    // Devuelve verdadero si está seleccionado quien marca el primer gol
    var completo = $( idvalor ).val() != "";
    siguientePaso( completo );

    return completo;
}
/* ----------------------------------------------------------------------------------- */
function siguientePaso( completo ){
    // Si el paso previo está completo se muestra el botón para el siguiente paso
    if( completo )
        $(".btn_siguiente_paso").fadeIn( 900 );
    else
        $(".btn_siguiente_paso").fadeOut();
}
/* ----------------------------------------------------------------------------------- */
function guardarAlineacion(){
    // Invoca al servidor para guardar los jugadores de la alineación

    var form_alineacion = $("#frm_alineacion").serialize();
    //var loader_gif = "<img src='assets/images/ajax-loader.gif'>";
    
    $.ajax({
        type:"POST",
        url:"db/data-jornadas.php",
        data:{ form_aln: form_alineacion },
        beforeSend: function(){
            
        },
        success: function( response ){
            console.log(response);
            $("#reg-resp").html( "" );
            res = jQuery.parseJSON( response );
            
            if( res.exito == 1 ){
                window.location = "primer-gol.php";
            } else {
                $("#reg-resp").addClass( "frm_error" );
                $("#reg-resp").html( res.mje );
            } 
        }
    });
}
/* ----------------------------------------------------------------------------------- */
function guardarPrediccion( p, idvalor ){
    // Invoca al servidor para guardar la predicción: primer gol | ganador del encuentro

    $.ajax({
        type:   "POST",
        url:    "db/data-jornadas.php",
        data:   { reg_prediccion: p, valor: $( idvalor ).val() },
        beforeSend: function(){
            
        },
        success: function( response ){
            console.log(response);
            $("#reg-resp").html( "" );
            res = jQuery.parseJSON( response );
            
            if( res.exito == 1 ){
                if( p == "primergol" )
                    window.location = "ganador-encuentro.php";
                if( p == "ganador" )
                    window.location = "jornada.php";
            } else {
                $("#reg-resp").addClass( "frm_error" );
                $("#reg-resp").html( res.mje );
            } 
        }
    });
}
/* ----------------------------------------------------------------------------------- */
$( document ).ready(function() {

    $("#enl_premios").on( "click", function(){
        $("#reglas_bimbotinto").fadeOut();
        $("#premio_bimbotinto").fadeIn();
    });	

    $("#enl_reglas").on( "click", function(){
        $("#reglas_bimbotinto").fadeIn();
        $("#premio_bimbotinto").fadeOut();
    }); 
    
	/* Selección de jugadores en la alineación */
    $('.jgseleccion').on('click', function(){
        var jugador     = $(this).attr( "data-jg" );
        var posicion    = $(this).attr( "data-trg" );

        pos_j           = posicionSeleccionado( jugador, posicion );
        
        if( pos_j == "ninguna" ){
            
            pos_a = asignarJugadorPosicion( jugador, posicion );
            if( pos_a != "ninguna"){
                $(this).find('.item:first').addClass("item_s");
                cambiarFranela( pos_a, true );
            }

        }else{
            $(this).find('.item:first').removeClass("item_s");
            cambiarFranela( pos_j, false );
        }
        
        alineacionCompleta();
    });
    
    /*....................................................*/
    
    /* Selección de jugador del primer gol */
    $('.jg_gol').on('click', function(){
        var jugador     = $(this).attr( "data-jg" );
        $("#jugador_primer_gol").val( jugador );
        pasoCompleto( "#jugador_primer_gol" );
    });

    /*....................................................*/
    
    /* Selección de ganador del partido */
    $('.eq_jornada').on('click', function(){
        var equipo     = $(this).attr( "data-equipo" );
        $("#ganador").val( equipo );
        pasoCompleto( "#ganador" );
    });

    /* Clic en Paso 1 */
    $('.paso_alineacion').on('click', function(){
        if( alineacionCompleta() ){
            guardarAlineacion();
        }
    });

    $("#rpassword").on('click', function(){
        $("#form_password").fadeIn();
    });

    $(".jugador_alineado").on('click', function(){
        $(".jugador_alineado").removeClass("sel_pgol");
        $(this).toggleClass( "sel_pgol" );
    });

    /* Clic en Paso 2 */
    $('.paso_primer_gol').on('click', function(){
        if( pasoCompleto( "#jugador_primer_gol" ) ){
            guardarPrediccion( "primergol", "#jugador_primer_gol" );
        }
    });

    /* Clic en Paso 3 */
    $('.paso_ganador').on('click', function(){
        if( pasoCompleto( "#ganador" ) ){
            guardarPrediccion( "ganador", "#ganador" );
        }
    });

});
/* ----------------------------------------------------------------------------------- */