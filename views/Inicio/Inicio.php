<!-- Include jQuery Validate plugin -->
<style>
  .form-group{
    margin-
  }
</style>
<div class="content-wrapper">
    <div class="page-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Inicio votación</h1>
        <p>Sistema para Votar.</p>
      </div>
      <div>
        <ul class="breadcrumb">
          <li><i class="fa fa-home fa-lg"></i></li>
          <li><a href="#">Votación</a></li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h3 class="card-title">Sistema de Votacion</h3>                    
        </div>
      </div>      
    </div>
    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">              
                <div class="col-lg-12">
                  <div class="well bs-component">
                    <form id="ingresarVoto" class="form">
                      <fieldset>  
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="rut">Rut</label>
                          <div class="col-lg-10">
                            <input required name="rut" class="form-control" id="rut" type="text" placeholder="Digite su Rut">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="nombre">Nombre</label>
                          <div class="col-lg-10">
                            <input required name="nombre"  minlength="3" maxlength="50" class="form-control" id="nombre" type="text" placeholder="Digite su Nombre">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="apellidos">Apellidos</label>
                          <div class="col-lg-10">
                            <input required name="apellidos"  minlength="3" maxlength="50" class="form-control" id="apellidos" type="text" placeholder="Digite sus Apellidos">
                          </div>
                        </div>  
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="alias">Alias</label>
                          <div class="col-lg-10">
                            <input name="alias" required class="form-control"  minlength="2" maxlength="50" id="alias" type="text" placeholder="Digite su Alias">
                          </div>
                        </div>                    
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="email">Email</label>
                          <div class="col-lg-10">
                            <input required name="email" class="form-control" id="email" type="email" placeholder="Ingrese su Email">
                          </div>
                        </div>                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="select">Seleccione su Región</label>
                          <div class="col-lg-10">
                            <select  name="idRegion" required class="form-control" id="selectRegion">
                             <option value="">Selecione...</option>
                            </select>                          
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="selectComuna">Seleccione su Comuna</label>
                          <div class="col-lg-10">
                            <select name="idComuna" required class="form-control" id="selectComuna">
                             <option value="">Selecione...</option>
                            </select>                          
                          </div>
                        </div>                                                    
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="select">Seleccione su Candidato</label>
                          <div class="col-lg-10">
                            <select name="idCandidato" required class="form-control" id="selectCandidato">
                             <option value="">Selecione...</option>
                            </select>                          
                          </div>
                        </div>
                      
                        <div class="form-group"> 
                        <label class="col-lg-2 control-label" for="select">Como se enteró de nosotros</label>                         
                          <div class="col-lg-2">                           
                            <div class="checkbox">
                              <label>
                                <input id="web" value="1" class="checkbox-atrr" name="web" type="checkbox">Web
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">                           
                            <div class="checkbox">
                              <label>
                                <input id="tv"  value="1"class="checkbox-atrr" name="tv" type="checkbox">Tv
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">                           
                            <div class="checkbox">
                              <label>
                                <input id="redesSociales" value="1" class="checkbox-atrr" name="redesSociales" type="checkbox">Redes Sociales
                              </label>
                            </div>
                          </div>
                          <div class="col-lg-2">                           
                            <div class="checkbox">
                              <label>
                                <input id="amigo"  value="1"class="checkbox-atrr" name="amigo" type="checkbox">Amigos
                              </label>
                            </div>
                          </div>
                        </div> 
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">                            
                            <button id="votar"  value="1" class="btn btn-primary" type="submit">Votar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
  </div>
</div>

<script>  
    $(document).ready(function() {
        //Primera carga traer Regiones
        cargarRegion();
        // Cargar candidatos
        cargarCandidatos();

        //si cambia el select Region se cargan las Comunas
        $('#selectRegion').change(function(){
          // remuevo options antiguos
          $('#selectComuna').find('option:not(:first)').remove();

          var idRegion = $('#selectRegion').val();
          
          if(idRegion == "") {
            alert("debe seleccionar una Region Valida");
            return;
          }          
          //llamar a la comunaByIdRrgion para cargar selectComunas
          $.ajax({
            type: 'GET',
            url: '?c=comuna&a=getComunasByIdRegion&id='+idRegion,
            dataType: 'json',
            success: function(response) {
                // Manejo de la respuesta exitosa
                if (response.error) {
                    console.error('Error:', response.error);
                } else {                    
                    // cargar el Select de Candidatos
                    var select = $('#selectComuna');
                    $.each(response, function(index, opcion) {
                        select.append($('<option>', {
                            value: opcion.ID,
                            text: opcion.NOMBRE
                        }));
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores 
                console.error('Error de AJAX:',jqXHR, textStatus, errorThrown);
            }
          }); 
        });
        
        
        // votar btn click      
        $('#votar').click(function(e) {                                           
            e.preventDefault();           
            //validar formulario todos los campos             
            if(validarFormulario()){
              console.log("formulario valido");
              var formData = $('.form').serialize();              
              // Realiza la solicitud AJAX
              $.ajax({
                  type: 'POST',
                  url: '?c=inicio&a=InsertarVoto', 
                  data: formData,
                  dataType: 'json',
                  success: function(response) {
                                        
                      // se ocurre un error muestra el mensaje
                      if (response.error) {
                        Swal.fire({
                          title: "Error",
                          text:response.msj,
                          icon: "error"
                        }); 
                      } else {                          
                        Swal.fire({
                          title: "Exito",
                          text:response.msj,
                          icon: "success"
                        }); 
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                      // Manejo de errores de AJAX
                      console.error('Error de AJAX:'); 
                      console.error({jqXHR});
                      console.error( {textStatus});
                      console.error( {errorThrown});
                  }
              });
            } else{             
            }          
      });
      function usuarioVoto() {
       
        var rut = $('#rut').val();
        $.ajax({
          type: 'POST',
          url: '?c=persona&a=validarVoto', // Reemplaza con la URL de tu script PHP para procesar el formulario
          data: "rut="+rut,
          dataType: 'json',
          success: function(response) {            
              console.log({response});
              // Manejo de la respuesta exitosa
              if (response.error) {
                  console.error('Error:', response.error);
              } else {
                  console.log("Existe:" , response.existe);
                  if(response.existe > 0) {
                    Swal.fire({
                      title: "Error",
                      text: "El rut " + rut + " ya votó.",
                      icon: "error"
                    }); 
                    return false;
                  }  else {
                    return true;
                  }                
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              // Manejo de errores de AJAX
              console.error('Error de AJAX:', textStatus, errorThrown);
              return false;
          }
        });
      }
      // Funciones 
      function cargarRegion(){
        $.ajax({
            type: 'GET',
            url: '?c=region&a=getRegiones',
            dataType: 'json',
            success: function(response) {
                // Manejo de la respuesta exitosa
                if (response.error) {
                    console.error('Error:', response.error);
                } else {                    
                    // cargar el Select de Candidatos
                    var select = $('#selectRegion');
                    $.each(response, function(index, opcion) {
                        select.append($('<option>', {
                            value: opcion.ID,
                            text: opcion.NOMBRE
                        }));
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores de AJAX
                console.error('Error de AJAX:',jqXHR, textStatus, errorThrown);
            }
        }); 
      }      
      
      function cargarCandidatos() {
        // Primera carga traer candidatos
        $.ajax({
            type: 'GET',
            url: '?c=persona&a=getAllCandidatos',
            dataType: 'json',
            success: function(response) {
                // Manejo de la respuesta exitosa
                if (response.error) {
                    console.error('Error:', response.error);
                } else {                    
                    // cargar el Select de Candidatos
                    var select = $('#selectCandidato');
                    $.each(response, function(index, opcion) {
                        select.append($('<option>', {
                            value: opcion.ID,
                            text: opcion.NOMBRE
                        }));
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores de AJAX
                console.error('Error de AJAX:',jqXHR, textStatus, errorThrown);
            }
        }); 
      }

      function validarFormulario(){
        var nombre = $('#nombre').val();
        var rut = $('#rut').val();
        var apellidos = $('#apellidos').val();
        var alias = $('#alias').val();
        var email = $('#email').val();            
        var idRegion = $('#selectRegion').val();   
        var idComuna = $('#selectComuna').val();    
        var idCandidato = $('#selectCandidato').val();            
        //validar rut      
        if (rut === '' || rut.length < 3) {                                
          Swal.fire({
            title: "Error",
            text: "El rut debe tener más de 3 caracteres y no puede estar vacío.",
            icon: "error"
          }); 
          return false;
        } 
        // validar que contenga el -
        if (rut.indexOf('-') === -1) {
            // Mostrar un mensaje de error y detener el envío del formulario                
            Swal.fire({
              title: "Error",
              text: "El Rut debe contener el carácter '-' ",
              icon: "error"
            }); 
            return false;
        }
        
        if (!validarRut(rut)) {
          Swal.fire({
            title: "Error",
            text: "El rut no tiene el formato correcto.",
            icon: "error"
          }); 
          return false;
        }

        // Realiza la validación nombre
        if (nombre === '' || nombre.length < 3) {                                
            Swal.fire({
            title: "Error",
            text: "El nombre debe tener más de 3 caracteres y no puede estar vacío.",
            icon: "error"
          }); 
            return false;
        }

        // validar apellidos
        if (apellidos === '' || apellidos.length < 3) {                                
          Swal.fire({
            title: "Error",
            text: "Los apellidos deben tener más de 3 caracteres y no puede estar vacío.",
            icon: "error"
          }); 
          return false;
        }
        // validar el alias
        if (alias === '' || alias.length < 3) {                                
          Swal.fire({
            title: "Error",
            text: "El alias debe tener más de 3 caracteres y no puede estar vacío.",
            icon: "error"
          }); 
          return false;
        }                       
        // Realiza la validación
        if ($.trim(email) === '' || !validarEmail(email)) {
            // Muestra un mensaje de error y detiene el envío del formulario               
            Swal.fire({
            title: "Error",
            text: "Ingrese una dirección de correo electrónico válida.",
            icon: "error"
          });              
          return false;
        }  
        // validar region
        if (idRegion == '') {                                
          Swal.fire({
            title: "Error",
            text: "Debe seleccionar una región.",
            icon: "error"
          }); 
          return false;
        }   
        
        if (idComuna == '') {                                
          Swal.fire({
            title: "Error",
            text: "Debe seleccionar una comuna.",
            icon: "error"
          }); 
          return false;
        }  
        // validar candidato          
        if (idCandidato == '') {                                
          Swal.fire({
            title: "Error",
            text: "Debe seleccionar un candidato.",
            icon: "error"
          }); 
          return false;
        }

        // validar que haya apretado mas de un check
        var checkboxesMarcados = $('.checkbox-atrr:checked').length;
        // Verificar si hay al menos 2 checkboxes marcados
        if (checkboxesMarcados < 2) {
          Swal.fire({
              title: "Error",
              text: "Debe seleccionar al menos 2 casillas de como se entero de nosotros .",
              icon: "error"
            }); 
            return false;
        }
        return true; 
      }

      function validarEmail(email) {
        // Utiliza una expresión regular para verificar el formato del correo electrónico
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

      function validarRut(rut) {
        // Eliminar guiones del Rut
        rut = rut.replace(/-/g, '');

        // Separar el cuerpo del Rut y el dígito verificador
        var cuerpo = rut.slice(0, -1);
        var dv = rut.slice(-1).toUpperCase();

        // Verificar si el cuerpo del Rut es numérico
        if (!/^[0-9]+$/.test(cuerpo)) {
            return false;
        }

        // Calcular el dígito verificador esperado
        var suma = 0;
        var multiplicador = 2;

        for (var i = cuerpo.length - 1; i >= 0; i--) {
            suma += parseInt(cuerpo.charAt(i)) * multiplicador;

            multiplicador = multiplicador === 7 ? 2 : multiplicador + 1;
        }

        var dvEsperado = 11 - (suma % 11);
        dvEsperado = dvEsperado === 10 ? 'K' : (dvEsperado === 11 ? '0' : dvEsperado.toString());

        // Comparar el dígito verificador esperado con el proporcionado
        return dv === dvEsperado;
      }
      // Fin Funciones
    });
</script>