<?php

	$id = (isset($_GET['id'])) ? (int)filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : 0;

	if ($id > 0) {
		require_once('db.php');
		$res = false;
	    $query = 'SELECT * FROM tasks WHERE id = ?';
	    $stmt = $pdo->prepare($query);
	    $stmt->bindParam(1, $id);
	    if ($stmt->execute()) {
		    $res = $stmt->fetch(PDO::FETCH_ASSOC);
		    if (!$res) {
	        	$pdo_errores = 'La tarea no se encuentra disponible.';
		    }
	    }
	    else {
	        $pdo_errores = 'index.php (línea '.__line__.'). Imposible recuperar la tarea: '.implode('|',$pdo->errorInfo());
	    }
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <?php require_once('includes/head.php'); ?>
		<title>Editar tarea</title>
	</head>
	<body>

		<?php require_once('includes/header.php'); ?>

		<?php if($res) : ?>
			<div class="contenedor">
				<div class="fila">
					<div class="columna-6">
						<h2 class="margin0">Editar tarea con ID <?php echo $id; ?></h2>
					</div>
					<div class="columna-6">
						<a href="index.php" class="boton-cancelar">Cancelar</a>
					</div>
				</div>
			</div>

			<div class="contenedor">
				<div class="fila">
					<div class="columna-12">
						<form id="editar-tarea" class="ajax">
							<label>Nombre</label>
							<input type="text" id="nombre" name="nombre" value="<?php echo $res['task_name']; ?>">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="hidden" name="accion" value="editar">
							<button type="submit" class="displayBlock marginTop30 boton-crear">Editar</button>
						</form>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php require_once('includes/footer.php'); ?>

	</body>
</html>
