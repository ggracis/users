<?php include('process.php'); ?>
<html>
	<head>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">  
		<link rel="stylesheet" href="styles.css">
		<title>CAME EDUCATIVA - PAGO</title>
	</head>
<body>
	<form id="register_form">
	  <h1>Verficar descuentos</h1>
	 
	  <div>
	 	<input type="number" name="dni" placeholder="DNI" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="dni" require="required">
	    <div id="boton">
		<p>Escriba su DNI para verificar descuentos</p>			<a href="#" id="btn_dni" >CONSULTAR</a>
		</div>
	  </div>
	</form>
</body>
</html>
<!-- scripts -->
<script src="jquery-3.5.1.min.js"></script>

<script src="scripts.js"></script>
