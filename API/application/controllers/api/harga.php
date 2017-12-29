<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Harga extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('kode');
        if ($id == '') {
            $harga = $this->db->get('harga')->result();
        } else {
            $this->db->where('kode', $kode);
            $harga = $this->db->get('harga')->result();
        }
        $this->response($harga, 200);
    }


    //Masukan function selanjutnya disini
}
?>