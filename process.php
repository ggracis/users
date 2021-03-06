<?php 
    //$db = mysqli_connect('localhost', 'root', '', 'test');
    $db = mysqli_connect('localhost', 'root', '', 'came_educativa');

    // URL por defecto
    $URLdescuento = 'https://portalpagos.camepagos.com.ar/payment?code=$2y$13$ComCQxSj5RCUbZHa2c/N7.Xds1TzIe97ci8KLjQXWnlV6oj1tce2.&continue=pp';

    if (isset($_POST['dni_check'])) {
    $dni = $_POST['dni'];
    //  $sql = "SELECT * FROM usuarios WHERE dni='$dni'";
  	$sql = "SELECT * FROM alumnos WHERE dni='$dni'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
        // Si encuentra un resultado en la base de datos
        $fila = $results->fetch_assoc();

        // Seteo las variables con lo que esta en la BD
        $descuento = $fila['descuento'];
        $dni = $fila['dni'];
        $nombre = $fila['nombre'];
        
        // Segun el descuento de la BD cambio la URL
            if ($descuento==40){
                $URLdescuento = "http://www.descuento40.com";
            }; 
            if ($descuento==50){
                $URLdescuento = "http://www.descuento50.com";
            }; 
       
        // Armo un array con los resultados
        $arrRespuesta = array(
            "URLdescuento" => $URLdescuento,
            "descuento" => $descuento,
            "saludo" => "Hola ".$nombre." DNI: (".$dni.") vos tenes un ".$descuento."% de descuento"
        );         
        // Devuelvo el array
        echo json_encode($arrRespuesta);   
          
  	}else{
          // Si no lo encuentra devuelve el array con descuento 0
        $arrRespuesta = array(
            "URLdescuento" => $URLdescuento,
            "saludo" => "Continuar con el proceso de compra"
        );
        echo json_encode($arrRespuesta);  
      }
      //return;
  	exit();
  }
 // Joya
?>