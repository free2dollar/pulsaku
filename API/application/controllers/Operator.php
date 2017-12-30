<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Operator extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data Operator
    function index_get() {
        $id_operator = $this->get('id_operator');
        if ($id_operator == '') {
            $operator = $this->db->get('Operator')->result();
        } else {
            $this->db->where('id_operator', $id_operator);
            $operator = $this->db->get('Operator')->result();
        }
        $this->response($operator, 200);
    }

    //Menambahkan data Operator
    function index_post() {
        $data = array(
                    'id_operator'           => $this->post('id_operator'),
                    'jenis_operator'    => $this->post('jenis_operator'));
        $insert = $this->db->insert('Operator', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data Operator yang telah ada
	function index_put() {
        $id_operator = $this->put('id_operator');
        $data = array(
            'jenis_operator'         => $this->put('jenis_operator'));
        $this->db->where('id_operator', $id_operator);
        $update = $this->db->update('Operator', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Delete data Operator
    function index_delete() {
        $id_operator = $this->delete('id_operator');
        $this->db->where('id_operator', $id_operator);
        $delete = $this->db->delete('Operator');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>