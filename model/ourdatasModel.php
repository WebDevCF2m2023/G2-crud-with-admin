<?php

function getAllOurdatas(PDO $db): array|string{
    $sql = "SELECT * FROM ourdatas ORDER BY idourdatas DESC;";

    try{
        $query = $db->query($sql);
        if($query->rowCount() === 0) return "Pas encore de datas";
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }catch(Exception $e){
        return $e->getMessage();
    }
}

function getOurDataById(PDO $db, int $id): array|string{
    $sql = "SELECT * FROM ourdatas WHERE idourdatas = ?;";
    try{
        $prepare = $db->prepare($sql);
        $prepare->execute([$id]);
        $result = $prepare->fetch();
        $prepare->closeCursor();
        if(!is_array($result)) return "La data avec l'id $id n'éxiste pas.";
        return $result;
    }catch(Exception $e){
        return ["error" => $e->getMessage()];
    }
}

function deleteOurDataById(PDO $db, int $id): void{
    $sql = "DELETE FROM ourdatas WHERE idourdatas = ?";
    try{
        $prepare = $db->prepare($sql);
        $prepare->execute([$id]);
        $prepare->closeCursor();
    }catch(Exception $e){
        
    }
}

function addOurDatas(PDO $db, string $title, string $ourdesc, float $latitude, float $longitude): bool|string{
    $sql = "INSERT INTO ourdatas(title, ourdesc, latitude, longitude) VALUES(?, ?, ?, ?);";
    try{
        $prepare = $db->prepare($sql);
        $prepare->execute([$title, $ourdesc, $latitude, $longitude]);
        $prepare->closeCursor();
    }catch(Exception $e){
        return $e->getMessage();
    }
    return true;
}

function updateOurData(PDO $db, int $id, string $title, string $ourdesc, float $latitude, float $longitude): bool|string{
    $sql = "UPDATE ourdatas SET title = ?, ourdesc = ?, latitude = ?, longitude = ? WHERE idourdatas = ?";
    try{
        $prepare = $db->prepare($sql);
        $prepare->execute([$title, $ourdesc, $latitude, $longitude, $id]);
        $prepare->closeCursor();
    }catch(Exception $e){
        return $e->getMessage();
    }
    return true;
}