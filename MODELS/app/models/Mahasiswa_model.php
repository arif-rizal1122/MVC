<?php


class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama" => "Doddy Ferdiansyah",
    //         "nrp" => "13323349",
    //         "email" => "doddy@gmil.com",
    //         "jurusan" => "teknik informatika"
    //     ],
    //     [
    //         "nama" => "alstarr mvc",
    //         "nrp" => "13323349",
    //         "email" => "star@gmil.com",
    //         "jurusan" => "teknik industri"
    //     ],
    //     [
    //         "nama" => "ssb ntbv",
    //         "nrp" => "13323349",
    //         "email" => "ssb@gmil.com",
    //         "jurusan" => "teknik mesin"
    //     ]
    // ];
    private $dbh; // database handler
    private $stmt; //
    

    public function __construct(){
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        
        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }

    }

    // public function getAllMahasiswa(){
    //     return $this->mhs;
    // }

    public function getAllMahasiswa(){
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');

        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}