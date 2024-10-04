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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tareas</title>
		<link rel="stylesheet" type="text/css" href="assets/css/estilos.css?1">
	</head>
	<body>

        <?php if( strlen($pdo_errores)>0) : ?>
        <div class="contenedor bg-danger">
            <div class="fila">
                <div class="columna-12">
                    <h3>¡ERROR!</h3>
                    <p><?php echo $pdo_errores; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

		<div class="contenedor">
			<div class="fila">
				<div class="columna-6">
					<h2>Lista de tareas</h2>
				</div>
				<div class="columna-6">
					<button id="crear-tarea">Crear tarea</button>
				</div>
			</div>
		</div>

		<div class="contenedor">
			<div class="fila">
				<div class="columna-12">
					<table border="1" class="width100">
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
                                    <td><button>Editar</button></td>
                                    <td><button>Eliminar</button></td>
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

	</body>
</html>
