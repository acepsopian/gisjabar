<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MY_Controller {

	public function before() {
		parent::before();
		$this->load->model('mdl_golongan');
		$this->load->model('mdl_map');
	}

	public function index() {
		$jumGolongan = $this->mdl_golongan->getGolCount();
		for($i=1;$i<=$jumGolongan;$i++){
			$data['bidang'][$i] = $this->mdl_golongan->getBidangByGol('0'.$i);
		}
		$this->load->view('simgisjabar/site/layout',$data);
	}

	public function layout_header(){
		$this->load->view('simgisjabar/site/header');
	}
	
	public function get_bidang($gol){
		$data['bidang'] = $this->mdl_golongan->getBidangByGol($gol);
		$data['result'] = '<select id="filter_bid" onchange="getFilKelompok()">';
		$data['result'] .= '<option value="nol">-- Bidang Aset  --</option>';
		foreach($data['bidang']->result() as $bid){
			$data['result'] .= '<option value="'.$bid->bidang.'">'.$bid->nm_bidang.'</option>';
		}
		$data['result'] .= '</select>';
		echo $data['result'];
	}
	
	public function get_kelompok($bid){
		$data['kelompok'] = $this->mdl_golongan->getKelompokByBid($bid);
		$data['result'] = '<select id="filter_kel" onchange="getFilSubkel()">';
		$data['result'] .= '<option value="nol">-- Kelompok Aset  --</option>';
		foreach($data['kelompok']->result() as $kel){
			$data['result'] .= '<option value="'.$kel->kelompok.'">'.$kel->nm_kelompok.'</option>';
		}
		$data['result'] .= '</select>';
		echo $data['result'];
	}
	
	public function get_subkel($kel){
		$data['kelompok'] = $this->mdl_golongan->getSubkelByKel($kel);
		$data['result'] = '<select id="filter_sub" onchange="getFilBarang()">';
		$data['result'] .= '<option value="nol">-- Sub-Kelompok Aset  --</option>';
		foreach($data['kelompok']->result() as $kel){
			$data['result'] .= '<option value="'.$kel->kd_kelompok.'">'.$kel->nm_kelompok.'</option>';
		}
		$data['result'] .= '</select>';
		echo $data['result'];
	}
	
	public function get_barang($sub){
		$data['barang'] = $this->mdl_golongan->getBarangBySub($sub);
		$data['result'] = '<select id="filter_brg">';
		$data['result'] .= '<option value="nol">-- Barang Aset  --</option>';
		foreach($data['barang']->result() as $brg){
			$data['result'] .= '<option value="'.$brg->kd_brg.'">'.$brg->nm_brg.'</option>';
		}
		$data['result'] .= '</select>';
		echo $data['result'];
	}
	
	public function get_filter(){
		$data['gol'] = $this->input->post('gol');
		$data['bid'] = $this->input->post('bid');
		$data['kel'] = $this->input->post('kel');
		$data['sub'] = $this->input->post('sub');
		$data['brg'] = $this->input->post('brg');
		$data['reg'] = $this->input->post('reg');
		
		$res = array('status'=>true);
		$res['aset'] = $this->mdl_golongan->getFilter($data)->result_array();
		$res['legend'] = $this->mdl_map->get_nm_kelompok($data['bid'])->result_array();
				
		echo json_encode($res);
	}
	
	public function get_unit_filter(){
		$data['fil'] = $this->input->post('fil');
		
		$res = array('status'=>true);
		$res['aset'] = $this->mdl_golongan->getUnitFilter($data)->result_array();
		$res['legend'] = $this->mdl_golongan->getUnitFilter($data)->result_array();
				
		echo json_encode($res);
	}
	
	public function get_detail($opt=''){
		$data['no_reg']=$this->input->post('no_reg');
		$data['bidang']=$this->input->post('category');
		$gol = substr($data['bidang'],0,2);
	
		$data['aset'] = $this->mdl_map->get_detail_aset($data['no_reg'],$gol)->row();
		
		if($opt=='save'){
			$data['data_map_latitude']=$this->input->post('lat');
			$data['data_map_longitude']=$this->input->post('lon');
			$this->load->view('simgisjabar/site/new/aset', $data);
		}else{
			if($opt=='scnd'){
				$this->load->view('simgisjabar/site/detail/aset1', $data);
			}else{
				$this->load->view('simgisjabar/site/detail/aset', $data);
			}
		}
	}
	
	public function get_unit_detail($opt=''){
		$data['kd_uskpd']=$this->input->post('kd_uskpd');
	
		if($opt=='save'){
			$data['unit'] = $this->mdl_map->get_unit_detail($data)->row();
			$data['data_map_latitude']=$this->input->post('lat');
			$data['data_map_longitude']=$this->input->post('lon');
			$this->load->view('simgisjabar/site/new/uskpd', $data);
		}else{
			$id=$this->input->post('bid');
			$data['gol']= substr($id,0,2);
			$data['bid']= substr($id,0,4);
			$data['unit'] = $this->mdl_map->get_unit_detail($data)->row();
			$data['asets'] = $this->mdl_map->get_spesific_aset($data);
			$this->load->view('simgisjabar/site/detail/uskpd', $data);
		}
	}
	
	public function save_detail(){
		$data['no_reg']=$this->input->post('no_reg');
		$data['bidang']=$this->input->post('category');
		$data['data_map_latitude']=$this->input->post('lat');
		$data['data_map_longitude']=$this->input->post('lon');
	
		if(substr($data['bidang'],0,2)=='01'){
		   $data['aset'] = $this->mdl_map->set_detail_kiba($data);
		}
		else if(substr($data['bidang'],0,2)=='02'){
		   $data['aset'] = $this->mdl_map->set_detail_kibb($data);
		}
		else if(substr($data['bidang'],0,2)=='03'){
		   $data['aset'] = $this->mdl_map->set_detail_kibc($data);
		}
		else if(substr($data['bidang'],0,2)=='04'){
		   $data['aset'] = $this->mdl_map->set_detail_kibd($data);
		}
		else if(substr($data['bidang'],0,2)=='05'){
		   $data['aset'] = $this->mdl_map->set_detail_kibe($data);
		}
		else if(substr($data['bidang'],0,2)=='06'){
		   $data['aset'] = $this->mdl_map->set_detail_kibf($data);
		}
		
		//echo $data['aset'];
		//$this->load->view('simgisjabar/site/detail/aset', $data);
	}
		
	public function save_unit_detail(){
		$data['kd_uskpd']=$this->input->post('kd_uskpd');
		$data['data_map_latitude']=$this->input->post('lat');
		$data['data_map_longitude']=$this->input->post('lon');
	
		$data['unit'] = $this->mdl_map->set_detail_uskpd($data);
		
		echo $data['unit'];
		//$this->load->view('simgisjabar/site/detail/aset', $data);
	}
	
	public function printTematik($category){
		$data['category'] = $category;
		$this->load->view('simgisjabar/site/print',$data);
	}
}
