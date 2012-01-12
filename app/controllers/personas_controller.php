<?php
/**
 * Personas 
 * 
 */
          //Carga del modelo Personas, porque tenemos la autocarga de modelos desactivada (off)
  
        Load::models('personas');

 class PersonasController extends ApplicationController 
 {
 	  public $controlador = 'personas';
	
           /**
           * Obtiene una lista para paginar los Personas
          */
           public function index($page=1) 
 	       {
               $personas = new Personas();
               $this->listPersonas = $personas->find();//('per_page: 20', "page: $page");

		   }
            public function autocomplete($busqueda="Bla") {
                if (Input::isAjax()) { //solo devolvemos los estados si se accede desde ajax
            // autocomplete coloca al final de la url coloca una variable get term
            // con los datos ingresados en el input  
                   $busqueda = Input::get('term');  
                   $estados = Load::model('personas')->obtener_json($busqueda);
                  die($estados); // solo devolvemos los datos, sin template ni vista
                 }
                  die;   
				  var_dump($_GET['term'],Input::get('term'));die;                
           }

           /**
            * Crea un Registo
            */
           public function create ()
           {
               if(Input::hasPost('personas')){
 
 		    $personas = new Persona(Input::post('personas'));
    
                $personas->fechanacimiento = Date("d-m-Y", strtotime($personas->fechanacimiento));
 		    if(!$personas->save()){
 			Flash::error('Falló Operación');
 		    }else{
 			Flash::valid('Operación exitosa');
 			//Eliminamos el POST, si no queremos que se vean en el form
                         return Router::redirect('personas/edit/'.$personas->id);
 		    }
 
               }
           }
           /**
            * Edita un Registro
            */
 	public function edit($id = NULL)
 	{
  	    $personas = new Personas();
 	    if($id != NULL){
 		//Aplicando la autocarga de objeto, para comenzar la edición
 		$this->personas = $personas->find($id);
 	    }
 	    //se verifica si se ha enviado el formulario (submit)
 	    if(Input::hasPost('personas')){
       
                $personas->fechanacimiento = Date("d-m-Y", strtotime($personas->fechanacimiento));
 		if(!$personas->update(Input::post('personas'))){
 		    Flash::error('Falló Operación');
 		} else {
 		    Flash::valid('Operación exitosa');
 		    //enrutando por defecto al index del controller
 		    return Router::redirect();
 		}
 	    }
 	}

           /**
            * Eliminar un articulo
            * 
            * @param int $id
            */
 	  public function del($id = NULL)
 	  {
 	      if ($id) {
 		  $personas = new Personas();
 		  if (!$personas->delete($id)) {
 		      Flash::error('Falló Operación');
 		  }else{
 		      Flash::valid('Operación exitosa');
 		  }
 	      }
 	      //enrutando por defecto al index del controller
 	      return Router::redirect();
	  }
 	  public function hacerreceta($id = NULL)
 	  {
 	      if ($id) {
 		  return Router::redirect('receta/create/'.$id);
 		  
 	      }
	  }

 	  public function verHistoria($id = NULL)
 	  {
 	      if ($id) {
 		  return Router::redirect('hclinica/index/'.$id);
 		  
 	      }
	  }
}
// 
// //---------------- telefonos --------------------------------------------
//           public function addTelefono ()
//           {
//               if(Input::hasPost('telefonos')){
// 
// 		    $telefonos = new Telefonos(Input::post('telefonos'));   
//                     $telefonos->persona_id = Input::post('personas.id');
// 		    if(!$telefonos->save()){
// 			Flash::error('Falló Operación');
// 		    }else{
// 			  $perstel = new Perstelef();
// 			  $perstel->telefono_id = Input::post('telefonos.id');
// 			  $perstel->persona_id = Input::post('personas.id');
// 			  $perstel->tipocontacto_id = Input::post('telefonos.tipocontaco_id');
// 			  if(!$perstel->save()){
// 				Flash::error('Falló Operación');
// 			  }else{
// 
// 			  }
// 			Input::delete();
// 		    }
// 
//               }
//           }
// //---------------- direccion --------------------------------------------
//           public function addDireccion ()
//           {
//               if(Input::hasPost('direcciones')){
// 
// 		    $telefonos = new Telefonos(Input::post('telefonos'));   
//                     $telefonos->persona_id = Input::post('personas.id');
// 		    if(!$telefonos->save()){
// 			Flash::error('Falló Operación');
// 		    }else{
// 			  $perstel = new Perstelef();
// 			  $perstel->telefono_id = Input::post('telefonos.id');
// 			  $perstel->persona_id = Input::post('personas.id');
// 			  $perstel->tipocontacto_id = Input::post('telefonos.tipocontaco_id');
// 			  if(!$perstel->save()){
// 				Flash::error('Falló Operación');
// 			  }else{
// 
// 			  }
// 			Input::delete();
// 		    }
// 
//               }
//           }
// 
//       }
// 	