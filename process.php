<?php

	require_once('db.php');

	$id           = (isset($_POST['id']) && strlen($_POST['id'])>0 ) ? trim(filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT)) : null;
	$accion       = (isset($_POST['accion']) && strlen($_POST['accion'])>0 ) ? trim(htmlspecialchars($_POST['accion'])) : null;
	$nombre       = (isset($_POST['nombre']) && strlen($_POST['nombre'])>0 ) ? trim(htmlspecialchars($_POST['nombre'])) : null;
	$AJAX_return  = false;
	$AJAX_msg     = null;


	if ($accion !== null) {
		try {

			if ($accion==='crear') {
			    $query = 'INSERT INTO tasks (task_name) VALUES (?)';
			    $stmt = $pdo->prepare($query);
			    $stmt->bindParam(1, $nombre);
			    $stmt->execute();
				$AJAX_return = true;
				$AJAX_msg = 'Tarea creada satisfactoriamente.<br>Redirigiendo al inicio...';
			}

			elseif ($accion==='eliminar') {
			    $query = 'DELETE FROM tasks WHERE id = ?';
			    $stmt = $pdo->prepare($query);
			    $stmt->bindParam(1, $id);
			    $stmt->execute();
				$AJAX_return = true;
				$AJAX_msg = 'Tarea '.$id.' eliminada correctamente.';
			}

		}
		catch(PDOException $e) {
	        $AJAX_msg = 'PDOException. Imposible ejecutar acción ('.$accion.'): '.$e->getMessage();
		}
		catch(Exception $e) {
	        $AJAX_msg = 'Exception. Imposible ejecutar acción ('.$accion.'): '.$e->getMessage();
		}
	}


	$respuesta_ajax = array(
		'id'      => $id,
		'accion'  => $accion,
		'return'  => $AJAX_return,
		'msg'     => $AJAX_msg,
	);
	echo json_encode($respuesta_ajax);
