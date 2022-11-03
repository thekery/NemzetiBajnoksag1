<?php

class Regisztral_Model
{
	public function set_user($vars) // POST methoddal küldött $vars tömbben szereplő adatokat.
    {
        $retData['eredmeny'] = "";
        try 
        {
            // A beírt felhasználónév és e-mail cím összehasonlítása a táblával
			$connection = Database::getConnection();
			$sql = "select bejelentkezes, email from felhasznalok where bejelentkezes='".$vars['login']."'OR email='".$vars['email']."'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Ha nincs azaz 0, akkor adja hozzá egyébként már van ilyen felhasználónév vagy e-mail cím.
            if(count($felhasznalo)==0) 
            {
                // Felhasználó regisztrálása
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
                // Hiba - Már regisztráltak a megadott felhasználónévvel vagy e-mail címmel.
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = " Ilyen felhasználó névvel vagy e-mail címmel már regisztráltak. "; 
            }
		}
		catch (PDOException $e) 
        {
                    // Adatbázis hiba esetén kíírja az oldal a hibát.
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}
?>