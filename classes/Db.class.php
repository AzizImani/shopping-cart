<?php
class DB{
    private $host = "localhost";
    private $userName ="root";
    private $password = "";
    private $database = "ecommerce";
    private $conn;
    public function __construct($host = null, $userName =null, $password = null,$database = null){
        if($host != null)
        {
            $this->host = $host;
            $this->userName = $userName;
            $this->password = $password;
        }
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->userName, $this->password,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                ));
        }catch(PDOException $e){
            die("<h3>Connection to database failed</h3>");
        }
    }

    public function  query($q,$data = array()){
        $query = $this->conn->prepare($q);
        $query->execute($data);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getConnection()
    {
        return $this->conn;
    }
}