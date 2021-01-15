$("document").ready(function () {
  var dni_state = false;
  chequearUsuario = () => {
    if (!$("#dni").val() == "") {
      console.log("Chequeo DNI");

      var dniUsuario = $("#dni").val();

      if (dniUsuario == "") {
        dni_state = false;
        return false;
      }
      //se utiliza $.ajax(), a la cual se le pasa un objeto {}, con la información
      $.ajax({
        type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
        url: "index.php", //url guarda la ruta hacia donde se hace la peticion
        data: { dni_check: 1, dni: dniUsuario }, // data recive un objeto con la informacion que se enviara al servidor
        success: function (respuesta) {
          //success es una funcion que se utiliza si el servidor retorna informacion
          datos = JSON.parse(respuesta);
          $("#boton").html(
            `<p>${datos.saludo}</p><a href='${datos.URLdescuento}' target="_blank">Ir</a>`
          );
        },
      });
    } else {
      console.log("DNI vacío");
      $("#boton").html(
        `<p class="error">Debe ingresar un DNI</p><a href="#" id="btn_dni">CONSULTAR</a>`
      );
    }
  };

  $("#dni").on("blur", function () {
    chequearUsuario();
  });

  $("#btn_dni").on("click", function (event) {
    event.preventDefault();
    console.log("Click");
    chequearUsuario();
  });
});
