<?php 

    // Menjalankan session jika belum ada session id di aplikasi
    if ( !session_id() ) {
        session_start();
    }

    // Memanggil file init.php
    require_once '../app/init.php';

    // Instansiasi class App
    $app = new App;

?>