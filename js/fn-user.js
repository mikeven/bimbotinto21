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
/*function log_in(){
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
}*/

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
    

    //Formulario Registro de usuarios: Mostrar campo nombre empresa si tipo de cliente es empresa
    $("#t-cliente-r").on( "change", function(){
        if( $(this).val() != "Particular" ){
            $("#r-nempresa").fadeIn(120);
        }else{
            $("#r-nempresa").fadeOut(120);
        }
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
    if ( $('#frm_contacto').exists() ) {
        
        $('#frm_contacto').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nombre: {
                    validators: {
                        notEmpty: {
                            message: 'Debe indicar su nombre'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Debe indicar un email'
                        },
                        emailAddress: {
                            message: 'Debe indicar un email válido'
                        }
                    }
                },
                mensaje: {
                    validators: {
                        notEmpty: {
                            message: 'Debe escribir mensaje'
                        }
                    }
                }
            }
        });

        $('#frm_contacto').bootstrapValidator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
            
            } else {
                enviarDatosContacto( $(this) );
                return false;
            }
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

});