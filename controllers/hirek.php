<?php

class Hirek_Controller
{

    public $baseName = 'hirek';
	
    public function main(array $vars) //hirek_main-ről érkeznek az adatok a POST metód által.
	{
        if($vars!=null){
        $kommentModelIn = new Hirek_Komment_Model;
        $kommentModelIn->set_comments($vars);
        }

        $hirekModel = new Hirek_model;
        $kommentModelOut = new Hirek_Komment_Model;

        $retData = $hirekModel->get_news();
        $retData['komments'] = $kommentModelOut->get_comments();

        if($retData['eredmeny'] == "ERROR")
        {
            $this->baseName = "error404";
        }

        // nézet betöltése
        $view = new View_Loader($this->baseName."_main");

        foreach($retData as $name => $value)
            $view->assign($name, $value);

    }
}
?>