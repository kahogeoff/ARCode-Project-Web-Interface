<?php
if (! defined ( 'BASEPATH' )) {
	exit ( 'No direct script access allowed' );
}
/**
 */
class Upload_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( array (
				'form',
				'url',
				'file' 
		) );
	}
	public function file_view() {
		$this->load->view ( 'file_view', array (
				'error' => ' ' 
		) );
	}
	public function do_upload() {
		$base_path = "uploads";
		$file_name = date ( 'Y-m-d' );
		
		$length = 16;
		
		$randomString = substr ( str_shuffle ( ",.!?@#$%^&*()0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ), 0, $length );
		
		$file_pass = hash ( "sha256", $file_name . "_data_" . $randomString );
		
		$tmp_folder_name = "./" . $base_path . "/" . $file_name;
		mkdir ( $tmp_folder_name );
		
		$model_config = array (
				'upload_path' => $tmp_folder_name,
				'allowed_types' => "obj|xml|jpg|png",
				'overwrite' => TRUE,
				'max_size' => "10240000" 
		);
		
		$this->load->library ( 'upload', $model_config );
		
		if ($this->upload->do_upload ( "3Dfile" )) {
			$data = array (
					'upload_data' => $this->upload->data ( "3Dfile" ) 
			);
			// $this->load->view('upload_success',$data);
		} else {
			$error = array (
					'error' => $this->upload->display_errors () 
			);
			$this->load->view ( 'file_view', $error );
		}
		
		if ($this->upload->do_upload ( "XMLfile" )) {
			$data = array (
					'upload_data' => $this->upload->data ( "XMLfile" ) 
			);
			// $this->load->view('upload_success',$data);
		} else {
			$error = array (
					'error' => $this->upload->display_errors () 
			);
			$this->load->view ( 'file_view', $error );
		}
		
		$this->load->library ( 'ciqrcode' );
		
		$params ['data'] = $this->config->base_url () . $base_path . "/" . $file_name . "_data.pak";
		$params ['level'] = 'H';
		$params ['size'] = 10;
		$params ['savename'] = $tmp_folder_name . "/" . 'qrcode.png';
		$this->ciqrcode->generate ( $params );
		
		system ( 'cd ' . $tmp_folder_name . ' && zip -P ' . $file_pass . ' -r ../' . $file_name . '_data.pak *' );
		echo $randomString;
		/*
		 * $this->load->library('zip');
		 * $this->zip->read_dir($tmp_folder_name."/",FALSE);
		 * $this->zip->archive($tmp_folder_name.'.zip');
		 * $this->zip->clear_data();
		 */
		
		delete_files ( $tmp_folder_name, TRUE );
		rmdir ( $tmp_folder_name );
		
		$this->load->view ( 'upload_success', $data );
	}
}

?>