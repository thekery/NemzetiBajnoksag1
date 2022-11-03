<?php

class Regisztral_Controller
{
    public $baseName = 'regisztral';
    public function main(array $vars)
    {
        $regisztalModel = new Regisztral_Model;
        $retData = $regisztalModel->set_user($vars);

        if($retData['eredmeny'] == "ERROR")
        {
			$this->baseName = "regisztracio";
        }
        $view = new View_Loader($this->baseName.'_main');
        
        foreach($retData as $name => $value)
			$view->assign($name, $value);
    }

}

?>