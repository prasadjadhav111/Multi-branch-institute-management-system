<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			if($this->session->userdata('roletext')!='admin')
			{
				redirect(base_url());  
			}
		}
   	 }
	
	public function dashboard()
	{
		$data['op']="HOME";

		$con1 = ['is_deleted'=>0];
		$brid = $this->session->userdata('branch_id');
		$con = ['branch_id'=>$brid];

		$data['tot_students']=$this->branch->getcc('tbl_student_branch_course',$con);
		
		$con = ['role'=>'faculty'];
		$d = $this->branch->Get_data('tbl_role',$con);

		$c = ['master_admin_role_id'=>$d[0]['role_id'],'master_admin_branch'=>$brid];
		$data['tot_facs']=$this->branch->getcc('tbl_master_admin',$c);

		$data['tot_courses']=$this->branch->getCount('tbl_course');

		$data['tot_events']=$this->branch->getcc('tbl_event',$con1);
		
		// $data['tot_fac_stu'] = $this->branch->getfaculty();

		// $data['popularcourse'] = $this->branch->popularcourse();

		 $data['yearwise_stu'] = $this->branch->admin_yearwise_stu($brid);
		
		$this->load->view('admin/index1',$data);
	  
	}
public function view_events()
	{
		$this->load->model('branch');
		$data['data']=$this->branch->fetch_all_data('tbl_event');
		//print_r($data);exit;
		$data['op']='HOME/VIEW EVENTS';
		$this->load->view('admin/event',$data);

	}
	public function add_faculty()
	{
		$sessionArray = array();
		$r = $this->session->userdata('userid');
		
		$data['course'] = $this->branch->fetch_all_data('tbl_course');
		
		$data['role']  = $this->branch->fetchrole('tbl_role');
		$data['branch']=$this->branch->fetchbranch($r);
		$data['op']  ="HOME/ADD FACULTY";

		$this->load->view('admin/add_faculty',$data);
	}
	public function add_faculty_detail()
	{
		$config=[
					'upload_path' => './uploads/branch_faculty',
					'allowed_types' => 'jpg|gif|png|jpeg',
				];

			$this->load->library('upload',$config);
			$this->form_validation->set_error_delimiters("<p class='text-danger'><b>","</b></p>");

			
		if($this->form_validation->run('faculty_validation') && $this->upload->do_upload())
		{

			
			$post=$this->input->post();
			unset($post['admin_state']);
			unset($post['admin_city']);
			unset($post['a_state']);
			unset($post['a_city']);
			unset($post['submit']);
			unset($post['cid']);
			unset($post['subnm']);
			unset($post['subid']);
			


			 $val =array('branch_id'=>$post['branch_id'],'course_id'=>$post['course_id'],'subject_id'=>$post['subject_id']);
			
			unset($post['branch_id']);
			unset($post['course_id']);
			unset($post['subject_id']);

			$data=$this->upload->data();
			$full_p=$data['file_name'];
			$str=md5(rand(0,9));
			$pwd=substr($str,5,10);
			$post['master_admin_password']=getHashedPassword($pwd);
			$post['master_admin_image']=$full_p;
			$post['is_deleted']=0;

			$this->send_mail($post,$pwd,$val);
		}
		else
		{
						

			$sessionArray = array();
			$r = $this->session->userdata('userid');
			$data['course'] = $this->branch->fetch_all_data('tbl_course');
			$data['role']  = $this->branch->fetchrole('tbl_role');
			$data['branch']=$this->branch->fetchbranch($r);
			$data['op']  ="HOME/ADD FACULTY";
			$data['upload_error']=$this->upload->display_errors();
			
			

			$this->load->view('admin/add_faculty',$data);
		}

	}

	  public function send_mail($post,$pwd,$val) { 
      	
 				$this->load->library('email');
				//$to_email = array('samirrana1112@gmail.com', 'samirrana1011@gmail.com');
				$to_email=$post['master_admin_email'];
        
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

$htmlContent = '
    <html>
    <head>
        <title>Welcome to Samtech</title>
    </head>
    <body>

       
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
            <tr>
            <th>Email:</th><td>'.$post['master_admin_email'].'</td>
            </tr>
            <tr>
            <th>Password:</th> <td>'.$pwd.'</td>
               
            </tr>
           
        </table>
         <h1>Thanks  for joining with us!</h1>

    </body>
    </html>';


$this->email->to($to_email);
$this->email->from('onlineacademy.in@gmail.com','MyWebsite');
$this->email->subject('Your Password');
$this->email->message($htmlContent);
$this->load->helper('url');
//$this->email->attach('files/sam.pdf');
//Send mail 
if($this->email->send())
{

	$this->branch->add('tbl_master_admin',$post);
	

		 $r = $this->branch->get_faculty();
		 $val['faculty_id'] = $r[0]['master_admin_id'];

		  $get['faculty_id'] = $val['faculty_id'];
		 $get['branch_id'] = $val['branch_id'];
		 $get['course_id'] = $val['course_id'];
		 $get['subject_id'] = $val['subject_id'];
	
			$this->branch->add('tbl_faculty_branch_course',$get);

				$this->session->set_flashdata("feedback","Faculty Create Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
	
	redirect(base_url('admin/search_faculty'));
}

  }

  public function search_faculty()
  {
  	$data['op']  ="HOME/VIEW FACULTY";
  	$id=$this->session->userdata('branch_id');
  	$con=['role'=>'faculty'];
  	$rid=$this->branch->Get_single_row('tbl_role',$con);
  	$data['data']=$this->branch->get_branch_faculty($id,$rid->role_id);

  	$this->load->view('admin/search_faculty',$data);
  }

  public function update_faculty($id)
  {

  	
  	$config=[
			'upload_path' => './uploads/branch_faculty',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
	$this->load->library('upload',$config);
	$this->form_validation->set_error_delimiters("<p class='text-danger'><b>","</b></p>");

	
	$this->load->model('branch');
			
		if($this->form_validation->run('faculty_validation_up') )
		{
		if($this->upload->do_upload())
		{
		$post=$this->input->post();
			unset($post['submit']);
			unset($post['state']);
			unset($post['city']);
			unset($post['b_state']);
			unset($post['b_city']);

			unlink(FCPATH.'uploads/branch_faculty'.$this->input->post('master_admin_image'));
			$data=$this->upload->data();

			$full_p=$data['file_name'];
			$post['master_admin_image']=$full_p;
			
			 $con = [
            'master_admin_id' => $id
        	];	
			if(!$this->branch->Update_data('tbl_master_admin',$post,$con))
			{
				$this->session->set_flashdata("feedback","Article Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Article Failed To Update,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('admin/search_faculty'));
			
		}
		else
		{
			$post=$this->input->post();
			unset($post['submit']);
			unset($post['state']);
			unset($post['city']);
			unset($post['b_state']);
			unset($post['b_city']);

			$this->load->model('branch');
			
			 $con = [
            'master_admin_id' => $id
        	];	
        	unset($post['name']);
			 if(!$this->branch->Update_data('tbl_master_admin',$post,$con))
			{
				$this->session->set_flashdata("feedback","Branch Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Branch Failed To Update,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('admin/search_faculty'));
			
				
		}
			
	
		}
		else
		{
		$this->load->model('branch');
		$con = [
            'master_admin_id' => $id
        ];
	$data['data']=$this->branch->Get_single_row('tbl_master_admin',$con);
			$data['role']  = $this->branch->fetch_all_data('tbl_role');
			$data['branch']  = $this->branch->fetch_all_data('tbl_branch');


	$data['op']="HOME/UPDATE FACULTY";

	$data['upload_error']=$this->upload->display_errors();
		
		$this->load->view('admin/update_faculty',$data);
		}

  }
   public function delete_faculty($id)
	{
		$this->load->model('branch');
		$con = [
            'master_admin_id' => $id
        ];
			$post=['is_deleted'=>1];
			if(!$this->branch->Update_data('tbl_master_admin',$post,$con))
			{
				$this->session->set_flashdata("feedback","faculty Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		
		$this->session->set_flashdata("feedback","faculty Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('admin/search_faculty'));

	}

	public function get_sub()
	{
		
		 $id = $this->input->post('course_id');
	// 	exit;
		$val = array('course_id' => $id);
		$data = $this->branch->Get_data('tbl_subject',$val);
		echo json_encode($data);
	 }

	 public function course_alloc()
	 {

	 	$id=$this->session->userdata('branch_id');
	 	$data['op']  ="HOME/FACULTY COURSE ALLOCATION";
	 	$this->load->model('branch');
	 	$data['data'] = $this->branch->get_course_detail($id);
  		$this->load->view('admin/course_alloc',$data);

	 }
	 public function retrive_course_alloc()
	 {

	 	$id = $this->input->post('faculty_id');
		$data = $this->branch->get_select_faculty_course($id);
        echo json_encode($data);
	 }
	 public function fetch_course_alloc()
	 {
	 	 $id = $this->input->post('faculty_id');
	 	 $con = ['faculty_id'=>$id];

			$test = $this->branch->Get_selected_data('tbl_faculty_branch_course', $con);
			$course = $this->branch->fetch_all_data('tbl_course');


			$data = array('c'=>$course,'t'=>$test);
			echo json_encode($data);
	 }
	 public function fetch_subject_alloc()
	{
			 $id = $this->input->post('faculty_id');
			 $con = ['faculty_id'=>$id];
			$test = $this->branch->Get_selected_data('tbl_faculty_branch_course', $con);
			 
			  $course = ['course_id'=>$test[0]['course_id']];

			 $subject = $this->branch->Get_selected_data('tbl_subject',$course);
			
			 $data = array('s'=>$subject,'t'=>$test);
			 echo json_encode($data);
	}
	public function get_subject()
	{
			$id = $this->input->post('course_id');
			$val = array('course_id' => $id);
			$data = $this->branch-> Get_selected_data('tbl_subject',$val);
			echo json_encode($data);
	}
	public function update_course_alloc()
	{
		$data=$this->input->post();

		unset($data['master_admin_email']);
		unset($data['master_admin_name']);
		$con=['faculty_id'=>$this->input->post('faculty_id')];

		if(!$this->branch->Update_data('tbl_faculty_branch_course',$data,$con))
		{
				$this->session->set_flashdata("feedback","course allocation Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
			$this->session->set_flashdata("feedback","course allocation Failed To Update,Please Try Again Later");
			$this->session->set_flashdata("feedback_c","alert-danger");
		}
			redirect(base_url('admin/course_alloc'));

	}
	public function delete_course_alloc($id)
	{
		$con=['faculty_id'=>$id];

		if(!$this->branch->delete_data('tbl_faculty_branch_course',$con))
		{
				$this->session->set_flashdata("feedback","course allocation Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
	
		$this->session->set_flashdata("feedback","course allocation Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");

		}
			redirect(base_url('admin/course_alloc'));
	}
	public function profile()
	{
		$id = $this->session->userdata('userid');

		$conn = ['master_admin_id' => $id];
		$data['data'] = $this->branch->Get_data('tbl_master_admin',$conn);

		$con = ['branch_id' => $data['data'][0]['master_admin_branch']];
		$data['branch'] = $this->branch->Get_data('tbl_branch',$con);
		
		$con1 = ['role_id' => $data['data'][0]['master_admin_role_id']];
		$data['role'] = $this->branch->Get_data('tbl_role',$con1);
		

		$this->load->view('admin/admin_profile',$data);
	}

	
	public function maxstudent()
	{
		$data = $this->branch->group_by_stud();
		echo json_encode($data);
	}

	public function student_details()
	{
		$bid=$this->session->userdata('branch_id');
		$data['data']=$this->branch->fetch_student_branch_wise($bid);
		$data['op']='HOME/MANAGE STUDENT';
		$this->load->view('admin/student',$data);
	}


	public function course_wise()
	{
		
		$this->load->view('admin/reports/course_wise');
	 } 

	 public function student_status_on()
	 {
	 	$id=$this->input->post('data');
	 	$con=['student_id'=>$id];
	 	$data=['status'=>1];
	 	$res=$this->branch->Update_data('tbl_student',$data,$con);
	 	echo json_encode($res);
	 }

	 public function student_status_off()
	 {
	 	$id=$this->input->post('data');
	 	$con=['student_id'=>$id];
	 	$data=['status'=>0];
	 	$res=$this->branch->Update_data('tbl_student',$data,$con);
	 	echo json_encode($res);
	 }
public function fetch_student()
	 {
	 	extract($_POST);
        $con = [
            'student_id' => $id
        ];
        $this->load->model('branch');
        $data = $this->branch->Get_selected_data('tbl_student', $con);
        echo json_encode($data);
	 }
	 public function update_student()
	 {
	 	$data=$this->input->post();
	 	$con=['student_id'=>$data['student_id']];
	 	unset($data['student_id']);
		$data=$this->branch->Update_data('tbl_student',$data,$con);
		$this->student_details();

	 }
	 public function student_report()
	{
		$data['op']='HOME/STUDENT REPORT';
		$this->load->view('admin/reports/students_report',$data);
	}
	public function select_course()
	{
		$data = $this->branch->fetch_all_data('tbl_course');
		echo json_encode($data);
	}
	public function fdate_course_tdate_students()
	{

		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$did = $this->input->post('did');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->admin_fdate_course_tdate_student($bid,$cid,$did,$brid);

		echo json_encode($data);	
	}
	public function fdate_course_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		$brid=$this->session->userdata('branch_id');
		
		$data = $this->branch->admin_course_fdate_student($bid,$did,$brid);

		echo json_encode($data);		
	}
	public function tdate_course_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		$brid=$this->session->userdata('branch_id');
			
		$data = $this->branch->admin_course_tdate_student($bid,$did,$brid);

		echo json_encode($data);		
	}
	public function fdate_tdate_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->admin_fdate_tdate_student($bid,$did,$brid);

		echo json_encode($data);	
	}
	public function course_students()
	{
		$bid = $this->input->post('bid');
		$brid=$this->session->userdata('branch_id');
		$data = $this->branch->admin_course_student($bid,$brid);
		
		echo json_encode($data);
	}

	public function from_date_students()
	{
		$fdate = $this->input->post('bid');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->admin_fdate_student($fdate,$brid);

		echo json_encode($data);	
	}
	public function to_date_students()
	{
		$tdate = $this->input->post('bid');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->admin_tdate_student($tdate,$brid);

		echo json_encode($data);	
	}
	public function all_events_report()
	{
		$data['op']='HOME/EVENTS REPORT';
		$this->load->view('admin/reports/all_events',$data);
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
	public function courses_report()
	{
		$data['op']='HOME/COURSE REPORT';
		$this->load->view('admin/reports/courses',$data);

	}
	public function faculty_report()
	{
		$data['op']='HOME/FACULTY REPORT';
		$this->load->view('admin/reports/faculty',$data);		
	}
	public function select_subject()
	{
		$cid = $this->input->post('cnm');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->Get_data('tbl_subject',['course_id'=>$cid]);
		echo json_encode($data);
	}
	public function course_faculties()
	{
		$bid = $this->input->post('bid');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->admin_course_faculties($bid,$brid);
		echo json_encode($data);
	}
	public function course_subject_faculties()
	{
		$cid = $this->input->post('cid');
		$sid = $this->input->post('sid');
		$brid=$this->session->userdata('branch_id');

		$data = $this->branch->admin_course_subject_faculties($cid,$sid,$brid);
		echo json_encode($data);
	}

	public function syllabus_report()
	{
		$data['op']='HOME/SYLLABUS REPORT';
		$this->load->view('admin/reports/syllabus',$data);
	}
	public function get_syllabus()
	{
		$cid = $this->input->post('course_id');

		$data = $this->branch->get_syllabus_data($cid);

		echo json_encode($data);

	}

}