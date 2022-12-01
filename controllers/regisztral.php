<?php

class Regisztral_Controller
{
    public $baseName = 'regisztral';
    public function main(array $vars) // az adatok (mint paraméterek) továbbítása a regisztrációs oldalról
    {
        $regisztalModel = new Regisztral_Model;

        // Továbbítja az adatokat a modellnek, ahol a set_user metódusban ellenőrzi a beírt adatokat.
        $retData = $regisztalModel->set_user($vars);

        // Amennyiben hiba történt, visszatölti a regisztrációs oldalt.
        if($retData['eredmeny'] == "ERROR")
        {
			$this->baseName = "regisztracio";
        }

        // $baseName-ben szerelő adat alapján tölti be a nézetet.
        $view = new View_Loader($this->baseName.'_main');

        // A $baseName alapján meghatározott nézetnek továbbíja az adatokat
        // a $retData változóban ami a nézeten a $viewData.
        foreach($retData as $name => $value)
        {
			$view->assign($name, $value);
        }
    }

}

?>