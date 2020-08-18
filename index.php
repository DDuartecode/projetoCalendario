<?php
		include_once 'calendario.php';
?>

<!DOCTYPE HTML>
<html lang="pt-BR">

	<head>
		<meta charset = UTF-8>
		<title>Calendário de eventos</title>
		<ink href="css/style.css" type="text/css" rel="stylesheet"  />
	</head>


	<body>

		<div class="calendario">
			<?php montaCalendario();?>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
	</body>

</html>