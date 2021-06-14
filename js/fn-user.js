/*
 * BimboTinto - Función de usuarios
 *
 */
/* ----------------------------------------------------------------------------------- */
function registrarUsuario(){
	//Envía al servidor la petición de registro de un nuevo usuario
	var form = $("#frm_register");
	var form_usr = form.serialize();
    //var loader_gif = "<img src='assets/images/ajax-loader.gif'>";
	
	$.ajax({
        type:"POST",
        url:"db/data-user.php",
        data:{ form_nu: form_usr },
        beforeSend: function(){
            
        },
        success: function( response ){
            console.log(response);
            $("#reg-resp").html( "" );
            res = jQuery.parseJSON( response );
            
            if( res.exito == 1 ){
                window.location = "inicio.php";
            } else {
                $("#reg-resp").addClass( "frm_error" );
                $("#reg-resp").html( res.mje );
            } 
        }
    });
}
/* ----------------------------------------------------------------------------------- */
function enviarPassword( frm ){
    //Envía al servidor la petición para reestablecer contraseña de usuario

    var form_paswrecovery = $( frm ).serialize();
    //var loader_gif = "<img src='img/ajax-loader.gif'>";
    console.log(form_paswrecovery);
    $.ajax({
        type:"POST",
        url:"db/data-user.php",
        data:{ env_passw: form_paswrecovery },
        beforeSend: function(){
            $("#reg-resp").html("");
            $("#log-resp").removeClass( "frm_success" ).removeClass( "frm_error" );
        },
        success: function( response ){
            
            console.log( response );
            
            res = jQuery.parseJSON( response );
            if( res.exito == 1 ){
                $("#log-resp").addClass( "frm_success" );
                $("#log-resp").html( res.mje );
                $("#log-resp").fadeIn();
                $( frm ).get(0).reset();
            } else {
                $("#log-resp").addClass( "frm_error" );
                $("#log-resp").html( res.mje );
                $("#log-resp").fadeIn();
            }  

            $("#reg-resp").html("");
        }
    });
}

/* ----------------------------------------------------------------------------------- */
function enviarFactura( frm ){
    //Invoca al servidor para enviar una factura de participante
    var fdata = new FormData( document.getElementById( "frm_factura" ) );

    console.log("CLI");
    $.ajax({
        type: 'POST',
        url: 'db/data-user.php',
        data: { frmfac: fdata },
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
            /*$('.envfac').attr( "disabled", "disabled" );*/
            $('#frm_factura').css("opacity",".5");
        },
        success: function( response ){ 
            console.log(response);
        }
    });
}
/* ----------------------------------------------------------------------------------- */
function log_in(){
    //Invoca al servidor para iniciar sesión de usuario
    var form = $('#frm_login');
    $.ajax({
        type:"POST",
        url:"db/data-user.php",
        data:form.serialize(), //data invocación: usr_login (index.php)
        beforeSend: function(){
            //$("#reg-resp").html( loader_gif );
            $("#log-resp").hide();
            $("#log-resp").removeClass( "frm_success" ).removeClass( "frm_error" );
        },
        success: function( response ){
            console.log( response );
            res = jQuery.parseJSON( response );
            if( res.exito == 1 ){
                window.location = "inicio.php";
            } else {

                $("#log-resp").addClass( "frm_error" );
                $("#log-resp").html( res.mje );
                $("#log-resp").fadeIn();
            } 
        }
    });
}
/* ----------------------------------------------------------------------------------- */

// ================================================================================== //
jQuery.fn.exists = function(){ return ($(this).length > 0); }
// ================================================================================== //

$( document ).ready(function() {	
    
	$("#enl_frmlogin").on( "click", function(){
        $(".form_registro").fadeOut();
        $(".form_ingreso").fadeIn();
    });

    $("#enl_frmregistro").on( "click", function(){
        $(".form_ingreso").fadeOut();
        $("#form_password").fadeOut();
        $("#log-resp").fadeOut();
        $(".form_registro").fadeIn();
    });

    $("#btn_login_dd").on( "click", function(){
        iniciarSesion( $("#frm_login_bar"), "min" );
    });
    /* ......................................................................*/
    $('#enl_frmfactura').on('click', function(){
        $("#formulario_factura").show( 900 );
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#info_factura").offset().top
        }, 900);
    });
    /* ......................................................................*/
    if ( $('#frm_register').exists() ) {
        
        $('#frm_register').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nombre: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar tu nombre'
                        }
                    }
                },
                apellido: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar tu apellido'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar un email'
                        },
                        emailAddress: {
                            message: 'Debes indicar un email válido'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar contraseña'
                        }
                    }
                },
                cnf_password: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar contraseña'
                        },
                        identical: {
                            field: 'password',
                            message: 'Las contraseñas deben coincidir'
                        },
                    }
                },
                acceptterms: {
                    validators: {
                        notEmpty: {
                            message: 'Debe marcar la casilla de confirmación'
                        }
                    }
                }
            }
        });

        $('#frm_register').bootstrapValidator().on('submit', function (e) {
    	  if (e.isDefaultPrevented()) {
    	   
    	  } else {
    	  	registrarUsuario();
    	  	return false;
    	  }
    	});
    }
    /* ......................................................................*/
    if ( $('#frm_login').exists() ) {
        
        $('#frm_login').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar un email'
                        },
                        emailAddress: {
                            message: 'Debes indicar un email válido'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar contraseña'
                        }
                    }
                }
            }
        });

        $('#frm_login').bootstrapValidator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
           
          } else {
            log_in();
            return false;
          }
        });
    }
    /* ......................................................................*/
    if ( $('#frm_factura').exists() ) {
        
        $('#frm_factura').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                archivo_factura: {
                    validators: {
                        notEmpty: {
                            message: 'Debes indicar un archivo'
                        }
                    }
                }
            }
        });

        $('#frm_factura').bootstrapValidator().on('submit', function (e) {
            /*if (e.isDefaultPrevented()) {
            
            } else {
                
            }*/
        });
    }
    /* ......................................................................*/
    if ( $('#frm_password').exists() ) {
        
        $('#frm_password').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Debe indicar un email'
                        },
                        emailAddress: {
                            message: 'Debe indicar un email válido'
                        }
                    }
                }
            }
        });

        $('#frm_password').bootstrapValidator().on('submit', function (e) {
            if ( e.isDefaultPrevented() ) {
        
            } else {
                enviarPassword( $("#frm_password") );
                return false;
            }
        });
    }
    /* ......................................................................*/
    /*$('#frm_factura').ajaxForm({ 
        // Invocación asíncrona para enviar segundo sustento sobre una nominación
        // dato de invocacion: "seg_sustento"

        type: "POST",
        url: 'db/data-user.php',
        beforeSubmit : function(){
            console.log("BFORE");
        },
        success:    function(response) { 
            console.log(response);
        }
    });*/
});