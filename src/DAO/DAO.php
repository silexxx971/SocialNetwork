<?php

namespace App\src\DAO;

use PDO;
use Exception;


abstract class DAO
{
    
    private $connection;

    public function checkConnection()
    {
    
        if($this->connection == null){
            return $this->getConnection();
        }
  
        return $this->connection;
    }

    
    private function getConnection()
    {
        
       try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            return $this->connection;
        }
      
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }

    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        
        return $result;
    }
}