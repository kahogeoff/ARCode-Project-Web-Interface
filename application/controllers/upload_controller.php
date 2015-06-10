<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 */
class Upload_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url',
            'file'
        ));
    }

    public function file_view() {
        $this->load->view('upload/file_view', array(
            'error' => ''
        ));
    }

    public function do_upload($user_name = '') {
        $file_name = date('Y-m-d');
        $time = date('his');

        $length = 16;

        $randomString = substr(str_shuffle(",.!?@#$%^&*()0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

        $file_pass = hash("sha256", $user_name . "_data_" . $randomString);

        $tmp_folder_name = "./uploads/" . $file_name.'_'.$time;
        mkdir($tmp_folder_name);

        $upload_config = array(
            'upload_path' => $tmp_folder_name,
            'allowed_types' => "xml|obj|jpg|png",
            'overwrite' => TRUE,
            'max_size' => "10240000"
        );

        $this->load->library('upload', $upload_config);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('3Dfile', '3D model', 'callback_handle_model_upload');
        $this->form_validation->set_rules('XMLfile', 'Data file', 'callback_handle_data_upload');

        if ($this->form_validation->run() === FALSE) {
            delete_files($tmp_folder_name, TRUE);
            rmdir($tmp_folder_name);
            $this->load->view('upload/file_view', array(
            'error' => ''
        ));
        } else {
            //$base_path = "uploads";

            $this->load->library('ciqrcode');

            $encoded_path = "arcode;".base64_encode($this->config->base_url() . "uploads/" . $user_name . '_' . $file_name . '_' . $time . "_data.pak");

            $params ['data'] = $encoded_path;
            $params ['level'] = 'M';
            $params ['size'] = 10;
            $params ['savename'] = $tmp_folder_name . "/" . 'qrcode.png';
            $this->ciqrcode->generate($params);

            $im = file_get_contents($tmp_folder_name . "/" . 'qrcode.png');
            $imdata = base64_encode($im);

            exec('cd ' . $tmp_folder_name . ' && zip -P ' . $file_pass . ' -r ../' . $user_name . '_' . $file_name . '_' . $time . '_data.pak *');
            //echo $randomString;
            $db_data = array(
                'Upload_Date' => $file_name,
                'Upload_User' => $user_name,
                'File_Name' => $user_name . '_' . $file_name . '_' . $time . "_data.pak",
                'QR_Image' => $imdata,
                'Random_Code' => base64_encode($randomString),
                'Note' => htmlentities($this->input->post('note'))
            );

            $this->load->model('Upload_model');
            $this->Upload_model->insert_filepath_data($db_data);

            delete_files($tmp_folder_name, TRUE);
            rmdir($tmp_folder_name);

            $this->load->view('upload/upload_success');
        }
    }

    public function do_remove($id) {
        $this->load->model('Upload_model');
        $target = $this->Upload_model->remove_filepath_data($id);
        unlink("./uploads/" . $target);
        $this->load->view('items/remove_result');
    }

    public function view_upload_list() {
        $this->load->model('Upload_model');
        $data['info'] = $this->Upload_model->get_filepath_data();

        $this->load->view('items/index', $data);
    }

    public function view_upload_item($id) {
        $this->load->model('Upload_model');
        $data['info_item'] = $this->Upload_model->get_filepath_data($id);

        $this->load->view('items/view', $data);
    }
    
    public function get_data_for_unity($name) {
        $this->load->model('Upload_model');
        $data['info_item'] = $this->Upload_model->get_filepath_data_for_unity($name);
        $this->load->view('items/UnityRequest', $data);
    }

    function handle_model_upload() {
        if (isset($_FILES['3Dfile']) && !empty($_FILES['3Dfile']['name'])) {

            if ($this->upload->do_upload("3Dfile")) {
                $data = array(
                    'upload_data' => $this->upload->data("3Dfile")
                );
                // $this->load->view('upload_success',$data);
            } else {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('upload/file_view', $error);
            }
            return true;
        } else {
            $this->form_validation->set_message('handle_model_upload', "<strong>Error:</strong> %s is missing!");
            return false;
        }
    }

    function handle_data_upload() {
        if (isset($_FILES['XMLfile']) && !empty($_FILES['XMLfile']['name'])) {

            if ($this->upload->do_upload("XMLfile")) {
                $data = array(
                    'upload_data' => $this->upload->data("XMLfile")
                );
                // $this->load->view('upload_success',$data);
            } else {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('upload/file_view', $error);
            }

            return true;
        } else {
            $this->form_validation->set_message('handle_data_upload', "<strong>Error:</strong> %s is missing!");
            return false;
        }
    }

}

?>