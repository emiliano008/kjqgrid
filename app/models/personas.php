<?php

class Personas extends ActiveRecord {

	    //protected $schema = 'personas';

        public function initialize() {
           $this->debug = false;
        }
        public function getPersonas($page=1)
        {
                return $this->paginate('per_page: 20', "page: $page");
        }
        public function getPersona($id)
        {
                return $this->find_first("conditions: id = '".$id."'");//("page: $page", "per_page: $ppage");
        }
        public function getPersonasDoc($doc)
        {
                return $this->find_first("conditions: nrodoc = '".$doc."'");
        }
		
	
}
