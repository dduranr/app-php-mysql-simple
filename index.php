<?php
	require_once('db.php');
    $all_tasks = []; 
    $query = 'SELECT * FROM tasks ORDER BY id ASC';
    $stmt1 = $pdo->prepare($query);
    if ($stmt1->execute()) {
        if($stmt1->rowCount()>0) {
            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    			$all_tasks[$row['id']]['id'] = $row['id'];
    			$all_tasks[$row['id']]['task_name'] = $row['task_name'];
    			$all_tasks[$row['id']]['created_at'] = $row['created_at'];
            }
            $stmt1->closeCursor();
        }
    }
    else {
        $pdo_errores = 'index.php (línea '.__line__.'). Imposible recuperar las tareas: '.implode('|',$pdo->errorInfo());
    }
?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <?php require_once('includes/head.php'); ?>
		<title>Lista de tareas</title>
	</head>
	<body>

		<?php require_once('includes/header.php'); ?>

		<div class="contenedor">
			<div class="fila">
				<div class="columna-6">
					<h2 class="margin0">Lista de tareas</h2>
				</div>
				<div class="columna-6">
					<a href="add.php" class="boton-crear">Crear tarea</a>
				</div>
			</div>
		</div>

		<div class="contenedor">
			<div class="fila">
				<div class="columna-12">
					<table border="1">
						<thead>
							<tr>
								<th>ID</th>
								<th>Task name</th>
								<th>Created at</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($all_tasks as $id => $val) : ?>
                                <tr>
                                    <td><?php echo $val['id']; ?></td>
                                    <td><?php echo $val['task_name']; ?></td>
                                    <td><?php echo $val['created_at']; ?></td>
                                    <td>
                                    	<a id="btn-editar-<?php echo $id; ?>" href="edit.php?id=<?php echo $id; ?>">
                                    		<img src="assets/img/editar.png" alt="">
                                    	</a>
                                    </td>
                                    <td>
                                    	<button id="btn-eliminar-<?php echo $id; ?>" data-id="<?php echo $id; ?>" onClick="administrarTarea(this.getAttribute('data-id'), 'eliminar')">Eliminar</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Task name</th>
								<th>Created at</th>
								<th></th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<?php require_once('includes/footer.php'); ?>

	</body>
</html>
