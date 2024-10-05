<!DOCTYPE html>
<html lang="es">
	<head>
        <?php require_once('includes/head.php'); ?>
		<title>Nueva tarea</title>
	</head>
	<body>

		<?php require_once('includes/header.php'); ?>

		<div class="contenedor">
			<div class="fila">
				<div class="columna-6">
					<h2 class="margin0">Nueva tarea</h2>
				</div>
				<div class="columna-6">
					<a href="index.php" class="boton-cancelar">Cancelar</a>
				</div>
			</div>
		</div>

		<div class="contenedor">
			<div class="fila">
				<div class="columna-12">
					<form id="crear-tarea" class="ajax">
						<label>Nombre</label>
						<input type="text" id="nombre" name="nombre">
						<input type="hidden" name="accion" value="crear">
						<button type="submit" class="displayBlock marginTop30 boton-crear">Crear</button>
					</form>
				</div>
			</div>
		</div>

		<?php require_once('includes/footer.php'); ?>

	</body>
</html>
