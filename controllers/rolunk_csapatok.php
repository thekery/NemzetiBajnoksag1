<?php

class Rolunk_Csapatok_Controller{

    public $baseName = 'rolunk_csapatok';

    public function main(array $vars)
    {

        $view = new View_Loader($this->baseName."_main");


    }
}

?>