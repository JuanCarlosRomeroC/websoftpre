<?php

class UndTributaria extends Controllers {

	function __construct(){
		parent::__construct();
	}

	function undtributaria(){
		$UserName = Session::getSession("usuario");
		if($UserName!=""){
			$this->view->render_section($this,'undtributaria');
		}else{
			header("Location:".URL);
		}
	}

	function consulta(){
		$this->model->setId($_REQUEST['id']);
		$res = $this->model->consultaModel();
		$res = $res[0];
		if($res!=NULL){	  
            $cadena="A#".$res['id']."#".$res['denominacion']."#".$res['valor']."#".$res['fechav']."#".$res['descripcion'];
		}else{
			$cadena="B#";
		}
		echo $cadena;
	}

	function listado(){
		echo $this->model->listadoModel();
    }

    function add(){
        $this->model->setDenominacion($_REQUEST['denominacion']);
        $this->model->setValor($_REQUEST['valor']);
        $this->model->setFechaV($_REQUEST['fechav']);
		$this->model->setIdUser($_REQUEST['id_usuario']);
		$this->model->setDescripcion($_REQUEST['descripcion']);
		if($this->model->save()){
            echo '<div class="alert alert-success alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Inclusión Satisfactoria</strong>
				</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Registro no agregado</strong>
				</div>';	
        }
	}

	function update(){
		$this->model->setId($_REQUEST['id']);
		$this->model->setDenominacion($_REQUEST['denominacion']);
        $this->model->setValor($_REQUEST['valor']);
        $this->model->setFechaV($_REQUEST['fechav']);
		$this->model->setIdUser($_REQUEST['id_usuario']);
		$this->model->setDescripcion($_REQUEST['descripcion']);
		if($this->model->update()){
            echo '<div class="alert alert-success alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Actualización Satisfactoria</strong>
				</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Registro no Actualizado</strong>
				</div>';	
        }
	}

}