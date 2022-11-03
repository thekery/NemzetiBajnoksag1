<?php

class Regisztral_Model
{
	public function set_user($vars){
        $retData['eredmeny'] = "";
        try {
			$connection = Database::getConnection();
			$sql = "select bejelentkezes, email from felhasznalok where bejelentkezes='".$vars['login']."'OR email='".$vars['email']."'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($felhasznalo)==0)
            {
                $newconnection = Database::getConnection();
                $sqlInsert = "insert into felhasznalok (id, csaladi_nev, utonev, bejelentkezes, jelszo, email ,jogosultsag)
                values(0, :csaladi_nev , :utonev, :bejelentkezes, :jelszo, :email, :jogosultsag)";
                $sth = $newconnection->prepare($sqlInsert);
                $sth->execute(array( ':csaladi_nev' => $vars['veznev'],':utonev' => $vars['utonev'],
                                     ':bejelentkezes' => $vars['login'], ':jelszo' => sha1($vars['password']), 
                                     ':email' => $vars['email'], ':jogosultsag' => "_1_"));
                $retData['eredmény'] = "OK";
                $retData['uzenet'] = " Sikeres regisztráció! ";               
            }
            else
            {         
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = " Ilyen felhasználó névvel vagy e-mail címmel már regisztráltak. "; 
            }
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}


}
?>