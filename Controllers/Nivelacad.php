<?php

class Nivelacad extends Controllers {

	function __construct(){
		parent::__construct();
	}

	function nivelacad(){
		$UserName = Session::getSession("usuario");
		if($UserName!=""){
			$this->view->render_section($this,'nivelacad');
		}else{
			header("Location:".URL);
		}
	}

	function consulta(){
		$this->model->setId($_REQUEST['id']);
		$res = $this->model->consultaModel();
		$res = $res[0];
		if($res!=NULL){	  
            $cadena="A#".$res['id_nivel_academico']."#".$res['descripcion']."#".$res['formula'];
		}else{
			$cadena="B#";
		}
		echo $cadena;
	}

	function listado(){
		echo $this->model->listadoModel($_REQUEST['id_entidad']);
    }

    function add(){
		$this->model->setIdEntidad($_REQUEST['id_entidad']);
		$this->model->setIdUser($_REQUEST['id_usuario']);
		$this->model->setDescripcion($_REQUEST['descripcion']);
		$this->model->setFormula($_REQUEST['formula']);
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
		$this->model->setIdEntidad($_REQUEST['id_entidad']);
		$this->model->setIdUser($_REQUEST['id_usuario']);
		$this->model->setDescripcion($_REQUEST['descripcion']);
		$this->model->setFormula($_REQUEST['formula']);
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

?>