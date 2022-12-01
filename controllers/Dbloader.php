<?php
if(isset($_POST['jatekosgomb'])){
    if(file_exists('./Files/labdarugo.txt'))
    {
            try{
                $dbh = new PDO('mysql:host=localhost;dbname=nb1', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
                $filename = new SplFileObject('files/labdarugo.txt');

            while(!$filename->eof())
                {
                    $line = $filename->fgets();

                    list($id,$mezszam,$klubid,$posztid,$utonev,$vezeteknev,$szulido,$magyar,$kulfoldi,$ertek) = explode("\t",$line);            

                    $sql = "INSERT INTO `labdarugok` VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindValue(1,$id,PDO::PARAM_STR);
                    $stmt->bindValue(2,$mezszam,PDO::PARAM_STR);
                    $stmt->bindValue(3,$klubid,PDO::PARAM_STR);
                    $stmt->bindValue(4,$posztid,PDO::PARAM_STR);
                    $stmt->bindValue(5,$utonev,PDO::PARAM_STR);
                    $stmt->bindValue(6,$vezeteknev,PDO::PARAM_STR);
                    $stmt->bindValue(7,$szulido,PDO::PARAM_STR);
                    $stmt->bindValue(8,$magyar,PDO::PARAM_STR);
                    $stmt->bindValue(9,$kulfoldi,PDO::PARAM_STR);
                    $stmt->bindValue(10,$ertek,PDO::PARAM_STR);
                    $stmt->execute();
                }
            }  
            catch (PDOException $e) 
            {
            $uzenet = "Hiba: ".$e->getMessage();
            }

        }else
        {
            echo "<script> alert('Nem elérhető a forrás.');</script>";
        }

    }

if(isset($_POST['klubgomb'])){  
    if(file_exists('./Files/klub.txt'))
    {    
        try{
            
            $dbh = new PDO('mysql:host=localhost;dbname=nb1', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $filename = new SplFileObject('files/klub.txt');

            while(!$filename->eof())
            {
                $line = $filename->fgets();

                list($id,$csapatnev) = explode("\t",$line);            

                $sql = "INSERT INTO `klub` VALUES (?,?)";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(1,$id,PDO::PARAM_STR);
                $stmt->bindValue(2,$csapatnev,PDO::PARAM_STR);
                $stmt->execute();
            }
        }  
        catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        }
    }else
    {
        echo "<script> alert('Nem elérhető a forrás.');</script>";
    } 
}

if(isset($_POST['posztgomb'])){
    if(file_exists('./Files/poszt.txt'))
    {  
        try{
            $dbh = new PDO('mysql:host=localhost;dbname=nb1', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $filename = new SplFileObject('files/poszt.txt');

            while(!$filename->eof())
            {
                $line = $filename->fgets();

                list($id,$posztnev) = explode("\t",$line);            

                $sql = "INSERT INTO `poszt` VALUES (?,?)";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(1,$id,PDO::PARAM_STR);
                $stmt->bindValue(2,$posztnev,PDO::PARAM_STR);
                $stmt->execute();
            }
        }  
        catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        }
    }
    else
    {
        echo "<script> alert('Nem elérhető a forrás.');</script>";
    }
}
?>