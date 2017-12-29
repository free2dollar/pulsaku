<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Harga extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $kode = $this->get('kode');
        if ($kode == '') {
            $harga = $this->db->get('Harga')->result();
        } else {
            $this->db->where('kode', $kode);
            $harga = $this->db->get('Harga')->result();
        }
        $this->response($harga, 200);
    }


    //Masukan function selanjutnya disini
}
?>