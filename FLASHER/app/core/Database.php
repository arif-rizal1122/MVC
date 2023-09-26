<?php



class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // database handler
    private $dbh;
    // database query
    private $stmt;

    public function __construct()
    {
        // data source name = identitas dari server kita
        $dsn = 'mysql:host='. $this->host .';dbname=' . $this->db_name;

        $option = [
            // Ini agar database nya koneksi terus terjaga/optimasi
            PDO::ATTR_PERSISTENT => true,
            // ini model error nya exeption
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    // diatas ini adalah cara connection

    // function di bawah ini untuk menjalankan query yg dibuat generic
    public function query($query){
        $this->stmt= $this->dbh->prepare($query);
    }

    // membunding data
    public function bind($param, $value, $type = null)
    {
        // jika $type nya = null maka jalankan
        if( is_null($type)) {

        // jika $value nya = int maka cetak
            
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
            
        // jika $value nya = boolean maka cetak
                 case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                    
        // jika $value nya = null maka cetak
                 case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                    
        // selain dari itu $type nya = string / default  
                  default : 
                     $type = PDO::PARAM_STR;  
                    
            }
        }

        // yg sudah di bunding
        $this->stmt->bindValue($param, $value, $type);

    }
         // execute
         public function execute(){
            $this->stmt->execute();
         }

         // tentukan setelah dieksekusi satu aja tau ingin  banyak hasilnya

         public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
         }

         // INI JIKA INGIN MENENTUKAN SATU DATA SAJA
         public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
         }

         // rowCount() untuk menghitung baru bertapa baris yg berubah di db

         // rowCount yg ini punya kita
         public function rowCount()
         {
            // rowCount yg ini punya PDO::
            return $this->stmt->rowCount();
         }

}