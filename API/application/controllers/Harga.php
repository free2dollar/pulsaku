<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Harga extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data harga
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

    //Menambahkan data Harga
    function index_post() {
        $data = array(
                    'kode'           => $this->post('kode'),
                    'id_operator'    => $this->post('id_operator'),
                    'nominal'        => $this->post('nominal'),
                    'harga'          => $this->post('harga'),
                    'status'         => $this->post('status'));
        $insert = $this->db->insert('Harga', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data Harga yang telah ada
	function index_put() {
        $kode = $this->put('kode');
        $data = array(
            'id_operator'    => $this->put('id_operator'),
            'nominal'        => $this->put('nominal'),
            'harga'          => $this->put('harga'),
            'status'         => $this->put('status'));
        $this->db->where('kode', $kode);
        $update = $this->db->update('Harga', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Delete data Harga
    function index_delete() {
        $kode = $this->delete('kode');
        $this->db->where('kode', $kode);
        $delete = $this->db->delete('Harga');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>