<?php 

    class App {

        // Property untuk controller, method dan parameter default
        protected $controller = 'home';
        protected $method = 'index';
        protected $params = []; // Berupa array

        public function __construct() {
            // url berisi apapun yang diketik di url
            $url = $this->parseURL();

            // Controller
            if ( isset($url[0]) ) {
                if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
                    $this->controller = $url[0];
                    unset($url[0]);
                }
            }

            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            // Method
            if ( isset($url[1]) ) {
                if ( method_exists($this->controller,$url[1]) ) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Params
            if ( !empty($url) ) {
                $this->params = array_values($url);
            }

            // Jalankan controller & method, serta mengirimkan params jika ada
            call_user_func_array([$this->controller, $this->method],$this->params);
        }

        // Mengambil URL dan memecah sesuai keinginan
        public function parseURL() {
            // Jika ada url di address nya
            if ( isset($_GET['url']) ) {
                // Menyimpan data url di dalam variabel url
                $url = rtrim($_GET['url'],'/'); // rtrim dengan delimiter / menghapus / diakhir
                $url = filter_var($url,FILTER_SANITIZE_URL); // Membersihkan url dari karakter karakter aneh
                $url = explode('/',$url); // Memecah url dengan tanda /
                // Mengembalikan url
                return $url;
            }
        }

    }

?>