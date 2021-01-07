<?php

class EnlacesPaginas{

	public function enlacesPaginasModel($enlacesModel){

		if($enlacesModel == "nosotros" || 
		   $enlacesModel == "servicios" || 
		   $enlacesModel == "contactenos" || 
		   $enlacesModel == "ofertas" ||
		   $enlacesModel == "novedades"){

			$module = "views/modules/".$enlacesModel.".php";

		}

		else if($enlacesModel == "index" ){

			$module = "views/modules/inicio.php";

		}

		else{

			$module = "views/modules/inicio.php";

		}

		return $module;

	}

}


?>