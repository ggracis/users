$("document").ready(function () {
  var dni_state = false;

  chequearUsuario = () => {
    var dniUsuario = $("#dni").val();
    if (dniUsuario == "") {
      dni_state = false;
      return;
    }
    //se utiliza $.ajax(), a la cual se le pasa un objeto {}, con la información
    $.ajax({
      type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
      url: "register.php", //url guarda la ruta hacia donde se hace la peticion
      data: { dni_check: 1, dni: dniUsuario }, // data recive un objeto con la informacion que se enviara al servidor
      success: function (respuesta) {
        //success es una funcion que se utiliza si el servidor retorna informacion
        datos = JSON.parse(respuesta);
        $("#boton").html(
          `<p>${datos.saludo}</p><a href='${datos.URLdescuento}' target="_blank">Ir</a>`
        );
      },
    });
  };

  $("#dni").on("blur", function () {
    chequearUsuario();
  });

  $("#chequear").click(function () {
    console.log("Chequeo");
    chequearUsuario();
  });
});
