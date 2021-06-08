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
function reestablecerPassword(){
    //Envía al servidor la petición para reestablecer contraseña de usuario

    var form_paswrecovery = $("#frm_resetpassword").serialize();
    //var loader_gif = "<img src='assets/images/ajax-loader.gif'>";
    
    $.ajax({
        type:"POST",
        url:"db/data-user.php",
        data:{ new_passw: form_paswrecovery },
        beforeSend: function(){
            //$("#reg-resp").html( loader_gif );
            $("#reg-resp").removeClass( "frm_success" ).removeClass( "frm_error" );
        },
        success: function( response ){
            console.log( response );
            $("#reg-resp").html("");
            res = jQuery.parseJSON( response );
            if( res.exito == 1 ){
                $("#reg-resp").addClass( "frm_success" );
                $("#reg-resp").html( res.mje );
            } else {
                $("#reg-resp").addClass( "frm_error" );
                $("#reg-resp").html( res.mje );
            }  
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

function enviarDatosContacto( datos ){
    //Envía al servidor los datos del formulario de contacto
    var form_co = $(datos).serialize();
    
    $.ajax({
        type:"POST",
        url:"database/data-user.php",
        data:{ form_ctc: form_co },
        success: function( response ){
            
            res = jQuery.parseJSON( response );
            scroll_To();
            mensajeAlerta( "#alert-msgs", res.mje );
            $("#frm_contacto")[0].reset();
            if( res.exito != 1 ){
                $("#frm_contacto")[0].reset();
                activarBoton( "#btn_contacto", true );  
            }
        }
    });
}

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

    if ( $('#frm_resetpassword').exists() ) {
        
        $('#frm_resetpassword').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Debe indicar contraseña'
                        }
                    }
                },
                cnf_password: {
                    validators: {
                        notEmpty: {
                            message: 'Debe indicar contraseña'
                        },
                        identical: {
                            field: 'password',
                            message: 'Las contraseñas deben coincidir'
                        },
                    }
                }
            }
        });

        $('#frm_resetpassword').bootstrapValidator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
           
          } else {
            reestablecerPassword();
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
    /*
    $('#frm_login_bar').bootstrapValidator({
        
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
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Debe indicar contraseña'
                    }
                }
            }
        }
    });

    $('#frm_login_bar').bootstrapValidator().on('submit', function (e) {
      if (e.isDefaultPrevented()) {
        alert("prevent");  
      } else {
        iniciarSesion( $("#frm_login_bar") );
        return false;
      }
    });
    */

});