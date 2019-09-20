<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {



	public function __construct()
   	 {
        parent::__construct();
      $this->load->model('branch');
      if(! $this->session->userdata('isLoggedIn') ) 
		{
			 redirect(base_url('login'));  
		}
		else if($this->session->userdata('isLoggedIn') ) 
		{
			if($this->session->userdata('roletext')!='faculty')
			{
				redirect(base_url());  
			}
		}
   	 }
	
	public function dashboard()
	{
		$data['op']="HOME";
		$con1 = ['is_deleted'=>0];
		$id = $this->session->userdata('userid');
		$con = ['faculty_id'=>$id];
		$data['tot_tk_sub']=$this->branch->getcc('tbl_faculty_branch_course',$con);
		$data['tot_test']=$this->branch->getcc('tbl_online_test',$con);
		$data['tot_assign']=$this->branch->getcc('tbl_assignment',$con);
		
		$data['tot_events']=$this->branch->getcc('tbl_event',$con1);
				$data['yearwise_stu'] = $this->branch->tot_questions($id);


		$this->load->view('faculty/index1',$data);
			
	}

	public function view_events()
	{
		$this->load->model('branch');
		$data['data']=$this->branch->fetch_all_data('tbl_event');
		//print_r($data);exit;
		$data['op']='HOME/VIEW EVENTS';
		$this->load->view('faculty/event',$data);

	}
	public function add_online_test()
	{
		$fid = $this->session->userdata('userid');
		$data['data']  = $this->branch->get_test_detail($fid);
		$data['op']="HOME/MANAGE TEST";

		$this->load->view('faculty/add_onlinetest',$data);
	}

	public function get_course()
	{
			$data = $this->branch->fetch_all_data('tbl_course');
			echo json_encode($data);
	}
	public function get_subject()
	{
			$id = $this->input->post('course_id');
			$val = array('course_id' => $id);
			$data = $this->branch-> Get_selected_data('tbl_subject',$val);
			echo json_encode($data);
	}

	public function add_test()
	{
		
		$fid = $this->session->userdata('userid');
		$post=$this->input->post();
		$post['faculty_id'] = $fid;

		//echo $post['number_of_que'];exit;

		$con = ['course_id'=>$post['course_id'],'chapter_id'=>$post['subject_id']];
			$total = $this->branch->count_questions('tbl_question_bank',$con);
			
	if($total >= $post['number_of_que'])
	{
		if(!$this->branch->add("tbl_online_test",$post))
			{
				$this->session->set_flashdata("feedback","TEST Added Sucessfully");
				$this->session->set_flashdata("fe
					$fid = edback_c","alert-success");
			}
			else
			{
				$this->session->set_flashdata("feedback","TEST Failed To add,Please Try Again Later");
				$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('faculty/add_online_test'));
	}
	else
	{
			$this->session->set_flashdata("feedback","Not Sufficient Questions are available for Test please first fall Add Some Questions ");
				$this->session->set_flashdata("feedback_c","alert-danger");
				redirect(base_url('faculty/add_online_test'));
	}
	}

	public function retrive_test()
	{
		 $id = $this->input->post('test_id');
		 $con = ['test_id'=>$id];
		$data = $this->branch->Get_selected_data('tbl_online_test', $con);
        echo json_encode($data);
	}

	public function fetch_course()
	{
			 $id = $this->input->post('test_id');
			 $con = ['test_id'=>$id];

			$course = $this->branch->fetch_all_data('tbl_course');

			$test = $this->branch->Get_selected_data('tbl_online_test', $con);

			$data = array('c'=>$course,'t'=>$test);
			echo json_encode($data);
	}

	public function fetch_subject()
	{
			 $id = $this->input->post('test_id');
			 $con = ['test_id'=>$id];
			$test = $this->branch->Get_selected_data('tbl_online_test', $con);
			 
			  $course = ['course_id'=>$test[0]['course_id']];

			 $subject = $this->branch->Get_selected_data('tbl_subject',$course);
			
			 $data = array('s'=>$subject,'t'=>$test);
			 echo json_encode($data);
	}

	public function update_test()
	{
		$data=$this->input->post();

		$con=['test_id'=>$this->input->post('test_id')];

		if(!$this->branch->Update_data('tbl_online_test',$data,$con))
		{
				$this->session->set_flashdata("feedback","Test Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
			$this->session->set_flashdata("feedback","Test Failed To Update,Please Try Again Later");
			$this->session->set_flashdata("feedback_c","alert-danger");
		}
			redirect(base_url('faculty/add_online_test'));

	}
	public function delete_test($id)
	{
		$con=['test_id'=>$id];

		if(!$this->branch->delete_data('tbl_online_test',$con))
		{
				$this->session->set_flashdata("feedback","Test Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
	
		$this->session->set_flashdata("feedback","Test Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");

		}
			redirect(base_url('faculty/add_online_test'));
	}

	public function add_questions()
	{
		$data['op']  = "HOME/ADD QUESTIONS";
		$data['course'] = $this->branch->fetch_all_data('tbl_course');
		$this->load->view('faculty/add_questions',$data);
	}
	public function get_sub()
	{
		
		 $id = $this->input->post('course_id');
	// 	exit;
		$val = array('course_id' => $id);
		$data = $this->branch->Get_data('tbl_subject',$val);
		echo json_encode($data);
	 }

	 public function add_question_detail()
	 {
	 	$val = $this->input->post();
	 	foreach ($val['val'] as $v) {
	 	$data = $this->branch->add('tbl_question_bank',$v);
	 	}
		
			

			redirect(base_url('faculty/add_questions'));
	 }

	 public function view_questions()
	 {
	 	$fid = $this->session->userdata('userid');
	 	$data['op']  = "HOME/VIEW QUESTIONS";
	 	$data['data'] = $this->branch->view_que($fid);
	 	$this->load->view('faculty/view_questions',$data);
	 }
	 public function delete_question($id)
	{
		$con=['que_id'=>$id];

		if(!$this->branch->delete_data('tbl_question_bank',$con))
		{
				$this->session->set_flashdata("feedback","Question Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
	
		$this->session->set_flashdata("feedback","Test Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");

		}
			redirect(base_url('faculty/view_questions'));
	}
	public function assignment()
	{
		$data['data']=$this->branch->get_assignment();
		// print_r($data);exit;`
		$data['op']='HOME/MANAGE ASSIGMNENT';
		$this->load->view('faculty/assignment',$data);
	}

	public function fetch_faculty_course()
	{

		$fid=$this->session->userdata('userid');
		$bid=$this->session->userdata('branch_id');
		
		$data=$this->branch->get_faculty_course($bid,$fid);
		echo json_encode($data);
	}
	public function fetch_faculty_subject()
	{
		$fid=$this->session->userdata('userid');
		$bid=$this->session->userdata('branch_id');
		$cid=$this->input->post('course_id');
		$data=$this->branch->get_faculty_subject($bid,$fid,$cid);
		echo json_encode($data);
	}
	public function add_assignment()
	{
		$bid=$this->session->userdata('branch_id');
		$cid=$this->input->post('course_id');
		$data1=$this->branch->get_students_email($bid,$cid);
		// print_r($this->input->post());exit;
	
	 $config['upload_path'] = './uploads/assignment';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
    $config['max_size'] = '4096';
    $config['max_width'] = '1024';
    $config['max_height'] = '1024';
    $config['encrypt_name'] = true;
    
	$this->load->library('upload',$config);
		if($this->upload->do_upload())
		{
			$post=$this->input->post();
	
		unset($post['action']);
	//	unlink(FCPATH.'uploads/branch_image/'.$this->input->post('branch_image'));
		$data=$this->upload->data();
		$full_p=$data['file_name'];
		$post['assignment_attachment']=$full_p;
		$post['is_deleted']=0;
		$post['faculty_id']=$this->session->userdata('userid');
				
        }	
        else
        {
        
        $this->session->set_flashdata("feedback","FILE TYPED NOT ALLOWD");
		$this->session->set_flashdata("feedback_c","alert-danger");
		
			redirect(base_url('faculty/assignment'));
		
    	}
      
	foreach($data1 as $row) {
	 $this->send_mail($row['email'],$post);
    }
  		
   

        if(!$this->branch->add("tbl_assignment",$post))
			{
				$this->session->set_flashdata("feedback","Assignment Send Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Assignment Failed To Send,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('faculty/assignment'));
		
		
          
        


         
	
	}

	
 public function send_mail($data,$post) { 
 $this->load->library('email');
$to_email = $data;
        
//SMTP & mail configuration
$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'onlineacademy.in@gmail.com',
    'smtp_pass' => 's12345678910@',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
);
$this->email->initialize($config);
$this->email->set_mailtype("html");
$this->email->set_newline("\r\n");


//Email content
// $htmlContent = '<h1>Sending email via SMTP server</h1>';
// $htmlContent .= '<font color="red">WithAttchment</font>';
// $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';
// $htmlContent .= '<a href="https://www.google.com">Click Here</a>';
$em="samir";
$htmlContent = '
    <html>
    <head>
        <title>'.$post['assignment_title'].'</title>
    </head>
    <body>
    	<h4>'.$post['assignment_description'].'</h4>
      	
    </body>
    </html>';


$this->email->to($to_email);
$this->email->from('onlineacademy.in@gmail.com','Assignment');
$this->email->subject($post['assignment_title']);
$this->email->message($htmlContent);
$this->load->helper('url');
$this->email->attach(FCPATH.'uploads/assignment/'.$post['assignment_attachment']);
   
         //Send mail 
         if($this->email->send())
         {

         }
         else
         {
       $this->session->set_flashdata("feedback","Problem With Sending Email,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		 redirect(base_url('faculty/assignment'));
      	}
      } 

      public function download($filename){
        if(!empty($filename)){
            //load download helper
            $this->load->helper('download');
            
            
            //file path
            $file = 'uploads/assignment/'.$filename;
            
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function fetch_assignment_description()
    {
    	extract($_POST);
        $con = [
            'assignment_id' => $id
        ];
       
        $data = $this->branch->Get_selected_data('tbl_assignment', $con);
        echo json_encode($data);
    }
    public function fac_profile()
	{
		$id = $this->session->userdata('userid');

		$conn = ['master_admin_id' => $id];
		$data['data'] = $this->branch->Get_data('tbl_master_admin',$conn);

		$con = ['branch_id' => $data['data'][0]['master_admin_branch']];
		$data['branch'] = $this->branch->Get_data('tbl_branch',$con);
		
		$con1 = ['role_id' => $data['data'][0]['master_admin_role_id']];
		$data['role'] = $this->branch->Get_data('tbl_role',$con1);
	
		$data['fbc'] = $this->branch->get_fbc_details($id);

		
		$this->load->view('faculty/faculty_profile',$data);
	}

	public function course_report()
	{
		$data['op']='HOME/COURSE REPORT';
		$this->load->view('faculty/reports/course',$data);
	}
	public function select_course()
	{
		$data = $this->branch->fetch_all_data('tbl_course');
		echo json_encode($data);
	}
	public function syllabus_report()
	{
		$data['op']='HOME/SYLLABUS REPORT';
		$this->load->view('faculty/reports/syllabus',$data);
	}
	public function faculty_course()
	{
		$id = $this->session->userdata('userid');
		$data = $this->branch->faculty_course($id);
		echo json_encode($data);
	}
	public function get_syllabus()
	{
		$cid = $this->input->post('course_id');

		$data = $this->branch->get_syllabus_data($cid);

		echo json_encode($data);

	}
	public function test_report()
	{
		$data['op']='HOME/TEST REPORT';
		$this->load->view('faculty/reports/test',$data);
	}

	public function test_detail()
	{
		$id = $this->session->userdata('userid');
		$data = $this->branch->test_details($id);
		echo json_encode($data);
	}
	public function assignment_report()
	{
		$data['op']='HOME/ASSIGMNENT REPORT';
		$this->load->view('faculty/reports/assignment',$data);	
	}

	public function assign_detail()
	{
		$id = $this->session->userdata('userid');
		$data = $this->branch->assign_details($id);
		echo json_encode($data);
	}
	public function all_events_report()
	{
		$data['op']='HOME/EVENTS REPORT';
		$this->load->view('faculty/reports/event',$data);
	}
	public function all_events()
	{
		$data = $this->branch->fetch_all_data('tbl_event');
		echo json_encode($data);	
	}
	public function upcoming_events()
	{
			$data = $this->branch->upcoming_event();
		echo json_encode($data);
	}
	public function ce_events()
	{
			$data = $this->branch->ce_event();
		echo json_encode($data);
	}
}
