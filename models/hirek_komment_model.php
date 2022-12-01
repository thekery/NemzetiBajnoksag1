<?php

class Hirek_Komment_Model{

    public function get_comments(){
        $retData['eredmeny'] = "";
        try
        {
            $connection = Database::getConnection();
            $sql = "select id, comment_tartalom, comment_idopont, hir_id, user_name from kommentek order by comment_idopont desc";
            $stmt = $connection->query($sql);
            $retData['kommentdata'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $retData['eredmeny'] = "OK";
        }
        catch (PDOException $e)
        {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
        }
        return $retData;
    }


    //  ------- Hírek táblában tárolása ---------------

    public function set_comments($vars){

        $retData['eredmeny'] = "";
        try
        {

            $newconnection = Database::getConnection();
            $sqlInsert = "insert into kommentek (id, comment_tartalom, comment_idopont, hir_id, user_name)
                values(0, :comment_tartalom , :comment_idopont, :hir_id, :user_name)";
            $sth = $newconnection->prepare($sqlInsert);
            $sth->execute(array(':comment_tartalom' => $vars['kom'], ':comment_idopont' => date('Y.m.d H:i:s'),
                ':hir_id' => $vars['hirid'] ,':user_name' => $_SESSION['userfirstname'] ));



            $retData['eredmeny'] = "OK";
        }
        catch (PDOException $e)
        {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
        }
        return $retData;


    }

}

?>