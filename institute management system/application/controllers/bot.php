<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot extends CI_Controller {

	public function index()
	{
		$data = ['yy'];
		$this->load->view('client/include/bot',$data);
	}

	public function test()
	{
		$post = $this->input->post();
		echo json_encode($post);
		
	}
	public function get_allcourse()
	{
		$data = $this->branch->fetch_all_data('tbl_course');
		echo json_encode($data);
	}
	public function popular_course()
	{
		$data = $this->clientmodel->popular_course();
	
		echo json_encode($data);
	}
	public function total_course()
	{
				$data=$this->branch->getCount('tbl_course');
				echo json_encode($data);
	}
	public function duration_course()
	{
		$dur = $this->input->post('dur');
		$unit = $this->input->post('unit');

		$con = ['course_duration'=>$dur,'course_duration_type'=>$unit];
				$data=$this->branch->Get_data('tbl_course',$con);
				echo json_encode($data);
	}
	public function total_branches()
	{
				$data=$this->branch->getCount('tbl_branch');
				echo json_encode($data);
	}
	public function upcoming_event()
	{
				$data = $this->branch->upcoming_event();
				echo json_encode($data);
	}
	public function ce_events()
	{
			$data = $this->branch->ce_event();
		echo json_encode($data);
	}
	public function all_events()
	{
		$data = $this->branch->fetch_all_data('tbl_event');
		echo json_encode($data);	
	}
}

?>