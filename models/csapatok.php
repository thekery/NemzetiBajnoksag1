<?php

class Csapatok{

    /**
     * @return Klubbok
     */
    public function getklubbok(){

        $klubarray = array(
            "hibakod"=>0,
            "uzi"=>"",
            "klubbok"=>array()
        );

        try {
            $newconnection = new PDO('mysql:host=localhost;dbname=nb1','root', '',
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	        $newconnection->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

            $sql = "select id, klubnev from klub order by id ASC";
            $sth = $newconnection->prepare($sql);
            $sth->execute(array());
            $klubarray["klubbok"] = $sth->fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            $klubarray["hibakod"] = 1;
            $klubarray["uzenet"] = $e->getMessage();
        }
        return $klubarray;
    }

    /**
     * @param integer $klubid
     * @return Jatekosok
     */

    public function getjatekosok($klubid){

        $klubarray = array(
            "hibakod"=>0,
            "uzi"=>"",
            "klubid"=>"",
            "klubnev"=>"",
            "poszt"=>"",
            "jatekosok"=>array()
        );

        try {
            $newcon = new PDO('mysql:host=localhost;dbname=nb1','root', '',
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $newcon->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

            $klubarray["klubid"] = $klubid;

            $sql = "select id, klubnev from klub where id = :klubid";
            $sth = $newcon->prepare($sql);
            $sth->execute(array(":klubid" => $klubid));
            $klub = $sth->fetch(PDO::FETCH_ASSOC);
            $klubid = $klub['id'];
            $klubarray["klubnev"] = $klub["klubnev"];

            $sql2 = "select l.id, mezszam, utonev, vezeteknev, posztid, szulido, magyar, kulfoldi, ertek, p.posztnev, p.id from labdarugok as l inner join poszt as p 
                         where klubid = :klubid and l.posztid = p.id order by vezeteknev";
            $sth2 = $newcon->prepare($sql2);
            $sth2->execute(array(":klubid" => $klub['id']));
            $klubarray["jatekosok"] = $sth2->fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            $klubarray["hibakod"] = 1;
            $klubarray["uzenet"] = $e->getMessage();
        }
        return $klubarray;



    }

}

class Klub{

    /**
     * @var integer
     */
    public $klubid;

    /**
     * @var string
     */
    public $klubnev;
}

class Klubbok{

    /**
     * @var integer
     */
    public $hibakod;

    /**
     * @var string
     */
    public $uzi;

    /**
     * @var Klub[]
     */
    public $klubbok;
}

class Jatekos{

    /**
     * @var integer
     */
    public $jatekosid;

    /**
     * @var integer
     */
    public $mezszam;

    /**
     * @var integer
     */
     public $klubid;

    /**
     * @var integer
     */
    public $posztid;

    /**
     * @var string
     */
    public $utonev;

    /**
     * @var string
     */
    public $vezeteknev;

    /**
     * @var string
     */
    public $szulido;

    /**
     * @var integer
     */
    public $magyar;

    /**
     * @var integer
     */
    public $kulfoldi;

    /**
     * @var integer
     */
    public $ertek;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $posztnev;
}

class Jatekosok{

    /**
     * @var integer
     */
    public $hibakod;

    /**
     * @var string
     */
    public $uzi;

    /**
     * @var integer
     */
    public $klubid;

    /**
     * @var string
     */
    public $klubnev;

    /**
     * @var Jatekos[]
     */
    public $jatekosok;
}
?>