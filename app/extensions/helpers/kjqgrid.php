<?php
/**
 * Helpers
 * PHP version 5
 * LICENSE
 *
 * This source file is subject to the GNU/GPL that is bundled
 * with this package in the file docs/LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to emiliano@markisich.com.ar so we can send you a copy immediately.
 *
 * @author Markisich Emiliano <emiliano@markisich.com.ar>
 * (este es mi primer aporte al SoftWare Libre)
 */
 /**
 * Libreria Mostrar datos en una grilla
 * es una adaptacion de jqGrid a kumbia.  
 * Version 0.1
 */

//require  '/var/www/spiritb2/sicaoe/app/libs/datagrid/arrays.php';

class kjqGrid{
    public $contador	=	array();
    /**
     * titulo del datagrid
    * @var string
    */
   public $title_caption		=	'';
   /**
    * Si desea que poder obtener un order by por campo
    * para esto debe recibir el field y el order
    * default = false
    * @var bool
    */
   public $formatOption		=	array();
   /**
    * Si desea que poder obtener un order by por campo
    * para esto debe recibir el field y el order
    * default = false
    * @var bool
    */
   public $key		=	array();
   /**
    * Si desea que poder obtener un order by por campo
    * para esto debe recibir el field y el order
    * default = false
    * @var bool
    */
   public $order_fields	=	false;
   /**
    * Array de datos q se obtienen de un find
    * @var array
    */
   public $data_source	=	array();
   /**
    * url: url para la accion que efectua la paginacion,
    * por defecto "module/controller/page/" y se envia por parametro el numero de pagina. 
    * por defecto busca en el mismo controller y action
    * @var string
    */
   public $url		=	'';
   /**
    * show: número de paginas que se mostraran en el paginador, por defecto 10. 
    * @var integer
    */
   public $show		=	10;
   /**
    * Paginator a utilizar. por defecto usa el classic
    *   Classic -   Digg -   Extended -   Punbb -   Simple
    * @var unknown_type
    */
   public $paginator_name =	'default';
   /**
    *URL donde se guardaran registros
  */
   public $save	=	'';
   /**
    * Si existe un formulario para editar
    * el registro debe indicar el controller_name y action_name
    * por defecto envia el id
    * @var string
    */
   public $edit			=	'';
   /**
    * Si existe un metodo para eliminar
    * el registro debe indicar el controller_name y action_name
    * por defecto envia el id
    * @var string
    */
   public $delete			=	'';
   /**
    *crea una imagen con el link para ir al formulario create
  */
   public $create			=	'';
   /**
    * NO FUNCIONAL 
    * @param $name
    public $auto_delete		=	false;
    
    /**
    * Crear un autofiltro
    *
    */
   public $auto_filter	=	false;
   
   public $btn_save	=	'Guardar';
   
   public $btn_caption	=	'Buscar';
    /**
     * Mensaje personalizado antes de elminar
     * alert javascript.
     * elimar el {campo}
     */
    public $delete_confirm	=	'';
    /**
     * 
     * Tipos de mimes para las opciones
     * img: action
     */
    public	$array_mimes	=	array();
    
     
    public $get_fields_and_headers	=	array();
    /**
     * Modelo actual
     * @var string
     */
    public $model		=	'';
    
    /**
     * campos que se van a mostrar de la base de datos
     * @var array
     */
    public $fields		=	array();
    /**
     * titulos o cabezeras que se mostra en la table <th></th>
     * @var array
     */
    public $headers		=	array();
    /**
     * usa paginador true or false
     * @var bool
     */
    public $use_paginator	=	false;
    /**
     * campo relacionado a mostrar para los campos _id
     * 
     * @var unknown_type
     */
    public $values			=	array();
    /**
     * Tipos de datos para los campos
     * array($id => $type);
     * @var unknown_type
     */
    public $type			=	array();
    public $params			=	array();
    /**
     * Array de campos para su valor a mostrar
    */
    public $array_alias		=	array();
    /**
     *Array para asignar clases a cada campo de la grilla
   */
    public $array_class		=	array();
    /**
     * Array para mostrar una imagen segun el valor del campo
   */
    public $array_image		=	array();
    /**
     *Array para generar los select del auto filtro
     **/
    public $array_select	=	array("0" => "Seleccione ...");
    /**
     *Se crea un chek al principio, esta experimental
   */
    public $set_check		=	FALSE;
    /**
     *Contador para nombrar nuevas columnas
   */
    public $cont_cols		=	0;
    /**
     *calculos para las columnas de las grillas
   */

    /**
     *Cambia el valor a mostrar según la $field del array $data.
     */
    public function setAlias($field, $data=array()){
	if(!$this->existData()) return false;
        if(array_key_exists($field, $this->fields)){
            array_push_associative($this->array_alias, array($field => $data));
        } else {
            throw new KumbiaException("No se pudo asignar el Alias, porque el campo: \"$field\" no existe.");
	}
    }
    /**
     *Cambia el titulo a mostrar según la key del array $data.
     */    
    public function setCaption($field, $caption){
        if(!$this->existData()) return false;
	if(array_key_exists($field, $this->headers)){
	    $replace = array($field => $caption);
	    $this->headers = array_replace($this->headers, $replace);
        } else {
            throw new KumbiaException("No se pudo cambiar el nombre de la cabecera, porque el campo: \"$field\" no existe.");
	}
    }
    /**
     * asigna un campo a mostrar de la tabla _id
     * @param $campo_id
     * @param $campo
     */
    public function setValue($field_id, $field){
	if(!$this->existData()) return false;
        if(array_key_exists($field_id, $this->fields)){
            array_push_associative($this->values, array($field_id => $field));
        } else {
            throw new KumbiaException("No se pudo mostrar la asosiación, porque el campo: \"$field_id\" no existe.");
	}
    }
    /**
     *Cambia el titulo a mostrar según la key del array $data.
     */    
    public function setFormatoption($field, $formato){
         $this->formatOption = array($field => $formato);
    }
    public function getformatOption($field){
         return  @$this->formatOption[$field];
    }

    public function setkey($field, $formato){
         $this->key = array($field => $formato);
    }
    public function getkey($field){
         return  @$this->key[$field];
    }


    public function __construct($datos) {
	$this->data_source = $datos;
	$this->url = Router::get('controller') . '/'; /*. Router::get('action');*/
	//$this->headers = "kjgh";
// 	if($this->existData()){
//      $this        
// 	}
    }

    public function xml(){
         $code = '<Listado>';
         $code .= '<Request>';
         $code .= '<IsValid>True</IsValid>';
       	 $code .= '<ItemSearchRequest>';
	 $code .= '<SearchIndex>'."Titulo" .'</SearchIndex>';
	 $code .= '</ItemSearchRequest>';
         $code .= '</Request>';
	 $code .= '<userdata name="debe"> 240.00 </userdata>';
         $code .= '<Items>';
         foreach ($this->data_source as $item): 
            $code .= '<Item>';
		$code .= '<DetailPageURL></DetailPageURL>';
		$code .= '<ItemAttributes>';
                    foreach ($this->fields as $campo):
                           $var = $item->$campo;
			   $code .="<$campo> $var </$campo>";
		    endforeach;       
		$code .= '</ItemAttributes>';
            $code .= '</Item>';
         endforeach; 
       $code .= '</Items>';
       $code .= '</Listado>';
       return $code;
    }

}




?>
