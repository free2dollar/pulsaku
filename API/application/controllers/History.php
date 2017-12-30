<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class History extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data Daftar Pembeli
    function index_get() {
        $id_trx = $this->get('id_trx');
        if ($id_trx == '') {
            $daftar_pembeli = $this->db->get('daftar_pembeli')->result();
        } else {
            $this->db->where('id_trx', $id_trx);
            $daftar_pembeli = $this->db->get('daftar_beli')->result();
        }
        $this->response($daftar_pembeli, 200);
    }

    //Menambahkan data Daftar Pembeli
    function index_post() {
        $data = array(
                    'id_trx'            => $this->post('id_trx'),
                    'nm_pembeli'        => $this->post('nm_pembeli'),
                    'kode'              => $this->post('kode'),
                    'tgl_beli'          => $this->post('tgl_beli'),
                    'jam_beli'          => $this->post('jam_beli'),
                    'jam_expr'          => $this->post('jam_expr'),
                    'jenis_pembayaran'  => $this->post('jenis_pembayaran'),
                    'status'            => $this->post('status')
                );
        $insert = $this->db->insert('daftar_pembeli', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data Daftar Pembeli yang telah ada
	function index_put() {
        $id_trx = $this->put('id_trx');
        $data = array(
            'nm_pembeli'        => $this->put('nm_pembeli'),
            'kode'              => $this->put('kode'),
            'tgl_beli'          => $this->put('tgl_beli'),
            'jam_beli'          => $this->put('jam_beli'),
            'jam_expr'          => $this->put('jam_expr'),
            'jenis_pembayaran'  => $this->put('jenis_pembayaran'),
            'status'            => $this->put('status')
        );
        $this->db->where('id_trx', $id_trx);
        $update = $this->db->update('daftar_pembeli', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Delete data Daftar Pembeli
    function index_delete() {
        $id_trx = $this->delete('id_trx');
        $this->db->where('id_trx', $id_trx);
        $delete = $this->db->delete('daftar_pembeli');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>