<?php
    try {
        $user="root";
        $pass="";
        $port=3306;
        $database="groupalhakim";
        $db = new PDO("mysql:host=127.0.0.1;port=$port;dbname=$database;", $user, $pass);
        $GLOBALS["db"] = $db;
        $lastYear = select("SELECT annee_fin FROM anneescolaire ORDER BY id DESC LIMIT 1");
        $dateNow = Date("Y");
        /*if($lastYear[0][0] == $dateNow)
        {
            $begin = $lastYear[0][0];
            $end = $dateNow+1;
            $db->exec("INSERT INTO anneescolaire (annee_debut,annee_fin) VALUES ('$begin','$end')");
        }*/


    } catch (PDOException  $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    function select($requet)
    {
        try {
            $stmt = $GLOBALS["db"]->prepare($requet);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $GLOBALS["list"] = $result;
            return $GLOBALS["list"];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return "null";
        }
    }

?>