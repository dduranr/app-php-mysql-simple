<?php

	require_once('db.php');

	$id           = (isset($_POST['id']) && strlen($_POST['id'])>0 ) ? trim(filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT)) : null;
	$accion       = (isset($_POST['accion']) && strlen($_POST['accion'])>0 ) ? trim(htmlspecialchars($_POST['accion'])) : null;
	$AJAX_return  = false;
	$AJAX_errores = null;


	if ($accion !== null) {
		try {
			if ($accion==='eliminar') {
			    $query = 'DELETE FROM tasks WHERE id = ?';
			    $stmt = $pdo->prepare($query);
			    $stmt->bindParam(1, $id);
			    $stmt->execute();
				$AJAX_return = true;
			}
		}
		catch(PDOException $e) {
	        $AJAX_errores = 'PDOException. Imposible ejecutar acción ('.$accion.'): '.$e->getMessage();
		}
		catch(Exception $e) {
	        $AJAX_errores = 'Exception. Imposible ejecutar acción ('.$accion.'): '.$e->getMessage();
		}
	}


	$respuesta_ajax = array(
		'id'      => $id,
		'accion'  => $accion,
		'return'  => $AJAX_return,
		'errores' => $AJAX_errores,
	);
	echo json_encode($respuesta_ajax);
