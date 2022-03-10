<?php
    class DB{
    //property
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $database = "db_restoran";
    //method
    public function __construct()
    {
        echo 'function construct';
    }

    public function selectData()
    {
        echo 'select data';
    }

    public function  getDatabase()
    {
        return $this->database;
    }

    public function tampil()
    {
        $this->selectData();
    }

    public function insertData()
    {
        echo "static function";
    }
}
    DB::insertData();
    $db = new DB;

?>
<!--Author fhmiwhyuda-->