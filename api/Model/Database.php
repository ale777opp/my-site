<?php
class Database
{
    protected $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );
            //var_dump($stmt );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
        /*    
            if( $params ) {
                //var_dump(count($params));
                if (count($params)==2) {
                    $stmt->bind_param($params[0], $params[1]);
                } else {
                    $stmt->bind_param($params[0], $params[1], $params[2]);
                }
            }
       */     
            switch(count($params)) {
                case 1: $stmt->bind_param('i', $params[0]); 
                break;
                case 2: $stmt->bind_param('ii', $params[0], $params[1]); 
                break;
            default: break;
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }
}