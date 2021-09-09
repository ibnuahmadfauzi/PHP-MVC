<?php 

    class Mahasiswa_model {
        // private $mhs = [
        //     [
        //         "nama" => "Ibnu Ahmad Fauzi",
        //         "nim" => "19104410028",
        //         "email" => "ibnu7897@gmail.com",
        //         "jurusan" => "Teknik Informatika"
        //     ],
        //     [
        //         "nama" => "Asad Abiyyi",
        //         "nim" => "19104410022",
        //         "email" => "asad@gmail.com",
        //         "jurusan" => "Sistem Informasi"
        //     ],
        //     [
        //         "nama" => "Danang Eko Widyanto",
        //         "nim" => "19104410027",
        //         "email" => "danang@gmail.com",
        //         "jurusan" => "Desain Komunikasi Visual"
        //     ]
        // ];

        // private $dbh; // Database handler
        // private $stmt; // Statement

        // public function __construct() {
        //     // Data source name
        //     $dsn = 'mysql:host=localhost;dbname=phpmvc';
        //     try {
        //         $this->dbh = new PDO($dsn,'root','');
        //     } catch(PDOException $e) {
        //         die ( $e->getMessage() );
        //     }
        // }

        private $table = 'mahasiswa';
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllMahasiswa() {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
        }

        public function getMahasiswaById($id) {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id',$id);
            return $this->db->single();
        }

        public function tambahDataMahasiswa($data) {
            $query = "INSERT INTO mahasiswa
                        VALUES
                        ('', :nama, :nim, :email, :jurusan)";
            $this->db->query($query);
            $this->db->bind('nama',$data['nama']);
            $this->db->bind('nim',$data['nim']);
            $this->db->bind('email',$data['email']);
            $this->db->bind('jurusan',$data['jurusan']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function hapusDataMahasiswa($id) {
            $query = "DELETE FROM mahasiswa WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function ubahDataMahasiswa($data) {
            $query = "UPDATE mahasiswa SET
                        nama = :nama,
                        nim = :nim,
                        email = :email,
                        jurusan = :jurusan
                        WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('nama',$data['nama']);
            $this->db->bind('nim',$data['nim']);
            $this->db->bind('email',$data['email']);
            $this->db->bind('jurusan',$data['jurusan']);
            $this->db->bind('id',$data['id']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function cariDataMahasiswa() {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword',"%$keyword%");
            return $this->db->resultSet();
        }
    }

?>