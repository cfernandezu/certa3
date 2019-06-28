<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Medoo\Medoo;

return function (App $app) {

	$app->get('/', function ($request, $response) {
		
		return $this->view->render($response, 'usuarios.html'); 
			
	});

	$app->post('/actusuario', function ($request, $response) {
		$op=$_POST["operacion"];
		$dbp = new \Modelo\alumnoc($this);

		if ($op=="grabar") {
			$dbp->agregar($_POST["codigo"] ,$_POST["rut"],$_POST["nombre"], $_POST["apellido"],$_POST["carrera"],$_POST["usuario"],$_POST["pass"]);
		}
		if ($op=="modificar") {
			$dbp->modificar($_POST["codigo"] ,$_POST["rut"],$_POST["nombre"], $_POST["apellido"],$_POST["carrera"],$_POST["usuario"],$_POST["pass"]);
		}
		if ($op=="eliminar") {
			$dbp->eliminar($_POST["codigo"]);

		}
		return $this->view->render($response, 'usuarios_detalle.html',['alumnos'=>$dbp->listado()]);


	});

  $app->get('/detalleAlumnos', function ($request, $response) {
		$dbp = new \Modelo\alumnoc($this);
		return $this->view->render($response, 'usuarios_detalle.html', ['alumnos'=>$dbp->listado()]);
	});


};

