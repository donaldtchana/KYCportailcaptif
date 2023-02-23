<?php 

Class Validator{
	private $data;
	private $errors = array();
	private $messages = array();

	public function __construct($data = array(), $rules = array(), $messages = array()){
		$this->data = $data;
		$this->messages = $messages;
		foreach ($rules as $field_name => $field_rules) {
			$rules = explode("|", $field_rules);
			foreach ($rules as $rule) {

				$this->$rule($field_name);

			}
		}
	}

	public function required($field_name){
		if(preg_match("/(file|image)/", $field_name)){
			$check = @$_FILES[$field_name]['name'];
		}else { 
			$check = @$this->data[$field_name]; 
		}
		if(empty($check)){
			if(empty($this->messages[$field_name])){
				$f_name = str_replace("_"," ",$field_name);
				$this->errors[$field_name] = $f_name . " est obligatoire.";
			}else{ 
				$this->errors[$field_name] = $this->messages[$field_name]; 
			}
		}
	}

	public function email($field_name,$text=''){
		if(!filter_var($this->data[$field_name], FILTER_VALIDATE_EMAIL)){
			$this->errors[$field_name] = $this->data[$field_name] . " n'est pas une adresse mail valide.";
		}
	}

	public function number($field_name,$text=''){
		if(!is_numeric($this->data[$field_name])){
			$f_name = str_replace("_"," ",$field_name);
			$this->errors[$field_name] = "Uniquement les nombres sont permis dans le champ " . ucfirst($f_name);
		}
	}

	public function run(){
		if(empty($this->errors)){
			return true;
		}else{
			return false;
		}
	}

	public function get_all_errors(){
		return $this->errors;
	}

}

?>