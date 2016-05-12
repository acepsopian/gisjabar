<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafik extends MY_Controller {

	public function index() {
		$this->load->view('simgisjabar/site/grafik/grafik_perpropinsi');
	}

	}