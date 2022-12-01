<?php

class Hirek_model{

	public function get_news(){

        $retData['eredmeny'] = "";
        try 
		{
			$connection = Database::getConnection();
			$sql = "select id, cim, tartalom, hiridopont, user_name from hirek";
			$stmt = $connection->query($sql);
			$retData['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $retData['eredmeny'] = "OK";
            
        }
		catch (PDOException $e) 
		{
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}


	public function set_news(){


	}
}

