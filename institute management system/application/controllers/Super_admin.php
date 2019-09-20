<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller {


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
			if($this->session->userdata('roletext')!='super_admin')
			{
				redirect(base_url());  
			}
		}
   	 }
   	 public function index()
   	 {
   	 	dashboard();
   	 }
	public function search_branch()
	{
	
		$con=['is_deleted'=>0];
        $data['data'] = $this->branch->Get_data('tbl_branch',$con);
        $data['op']="HOME/SEARCH BRANCH";
		$this->load->view('superadmin/search_branch',$data);
	}
	public function role()
	{
		$data['data']  = $this->branch->fetch_all_data('tbl_role');
		$data['op']="HOME/MANAGE ROLE";
		$this->load->view('superadmin/role',$data);
	}
	public function fetch_role()
	{
		extract($_POST);
        $con = [
            'role_id' => $id
        ];
        $this->load->model('branch');
        $data = $this->branch->Get_selected_data('tbl_role', $con);
        echo json_encode($data);
	}
	public function add_branch_head()
	{
		$data['role']  = $this->branch->fetch_all_data('tbl_role');
		$data['branch']=$this->branch->fetch_all_data('tbl_branch');
		$data['op']  ="HOME/ADD USER";
		$this->load->view('superadmin/add_branch_head',$data);
		

	}

	public function store_branch_head()
	{
	$config=[
			'upload_path' => './uploads/branch_head',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
	$this->load->library('form_validation');

	$this->load->library('upload',$config);
	$this->form_validation->set_error_delimiters("<p class='text-danger'><b>","</b></p>");



		if($this->form_validation->run('add_branch_head')  && $this->upload->do_upload() )
		{	
			$post=$this->input->post();
			unset($post['admin_state']);
			unset($post['admin_city']);
			unset($post['submit']);
	
			$this->load->model('branch');
			$data=$this->upload->data();
			$full_p=$data['file_name'];
			$str=md5(rand(0,9));
			$pwd=substr($str,5,10);
			$post['master_admin_password']=md5($pwd);
			$post['master_admin_image']=$full_p;
			$post['is_deleted']=0;


			
			$this->send_mail($post,$pwd);

		}
		else
		{
		// $upload_error=$this->upload->display_errors();
		$data['role']  = $this->branch->fetch_all_data('tbl_role');
		$data['branch']=$this->branch->fetch_all_data('tbl_branch');
		$data['op']  ="HOME/ADD BRANCH HEAD";
		$data['upload_error']=$this->upload->display_errors();
		
		
		$this->load->view('superadmin/add_branch_head',$data);
		}
	}


    public function send_mail($post,$pwd) { 
      	
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
$this->email->from('samtech1011@gmail.com','MyWebsite');
$this->email->subject('Your Password');
$this->email->message($htmlContent);
$this->load->helper('url');
$this->email->attach('files/sam.pdf');
//Send mail 
if($this->email->send())
{

	if($this->branch->add('tbl_master_admin',$post))
	{
				$this->session->set_flashdata("feedback","Branch Head  Create Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
	}
	else
	{
		echo "Please connetc net";
	}
	redirect(base_url('super_admin/search_branch_head'));
}

  }

	public function add_branch()
	{
		$op['op']="HOME/ADD BRANCH";
		$this->load->view('superadmin/add_branch',$op);

	}
	public function add_role()
	{
		$post=$this->input->post();
		unset($post['action']);
		
		if(!$this->branch->add("tbl_role",$post))
			{
				$this->session->set_flashdata("feedback","Role Added Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Role Failed To add,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('super_admin/role'));

	}
	public function dashboard()
	{
		$data['op']="HOME";

		$con1 = ['is_deleted'=>0];
		$d1 = $this->branch->Get_data('tbl_branch',$con1);
		$c1 = ['master_admin_branch'=>$d1[0]['branch_id']];
		$data['tot_branch']=$this->branch->getCount('tbl_branch');

		$data['tot_members']=$this->branch->getcc('tbl_master_admin',$con1);

		$data['tot_students']=$this->branch->getCount('tbl_student');
		
		$con = ['role'=>'faculty'];
		$d = $this->branch->Get_data('tbl_role',$con);
		$c = ['master_admin_role_id'=>$d[0]['role_id'],'is_deleted'=>0];
		$data['tot_facs']=$this->branch->getcc('tbl_master_admin',$c);

		$data['tot_courses']=$this->branch->getCount('tbl_course');
		$data['tot_subjects']=$this->branch->getCount('tbl_subject');

		$data['tot_events']=$this->branch->getcc('tbl_event',$con1);
		
		$data['tot_roles']=$this->branch->getCount('tbl_role');

		$data['tot_fac_stu'] = $this->branch->getfaculty();

		$data['popularcourse'] = $this->branch->popularcourse();

		$data['yearwise_stu'] = $this->branch->yearwise_stu();


			// 		echo "<pre>";
			// print_r($data['yearwise_stu']);exit;

		$this->load->view('superadmin/index1',$data);

	}
	

	public function store_branch()
	{
	$config=[
			'upload_path' => './uploads/branch_image',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
	$this->load->library('form_validation');

	$this->load->library('upload',$config);
	$this->form_validation->set_error_delimiters("<p class='text-danger'><b>","</b></p>");


		if($this->form_validation->run('add_branch')  && $this->upload->do_upload() )
		{	
			$post=$this->input->post();
			unset($post['state']);
			unset($post['city']);
			unset($post['submit']);
	
			$this->load->model('branch');
			$data=$this->upload->data();
			$full_p=$data['file_name'];
			$post['branch_image']=$full_p;
			$post['is_deleted']=0;
			
		
			
			if(!$this->branch->add("tbl_branch",$post))
			{
				$this->session->set_flashdata("feedback","Article Added Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Article Failed To add,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('super_admin/search_branch'));
		}
		else
		{
		$upload_error=$this->upload->display_errors();
		$this->load->view('superadmin/add_branch',compact('upload_error'));
		}
	
}


	public function update_branch($id=NULL)
	{
		 if($id == null)
            {
                redirect(base_url('Super_admin/search_branch'));
            }
			$config=[
			'upload_path' => './uploads/branch_image',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
	$this->load->library('form_validation');
	$this->load->library('upload',$config);
	$this->form_validation->set_error_delimiters("<p class='text-danger'><b>","</b></p>");

	
	$this->load->model('branch');
			
		if($this->form_validation->run('add_branch') )
		{
		if($this->upload->do_upload())
		{
		$post=$this->input->post();
			unset($post['submit']);
			unset($post['state']);
			unset($post['city']);
			unset($post['b_state']);
			unset($post['b_city']);
			unlink(FCPATH.'uploads/branch_image/'.$this->input->post('branch_image'));
			$data=$this->upload->data();

			$full_p=$data['file_name'];
			$post['branch_image']=$full_p;
			
			 $con = [
            'branch_id' => $id
        	];	
			if(!$this->branch->Update_data('tbl_branch',$post,$con))
			{
				$this->session->set_flashdata("feedback","Article Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Article Failed To Update,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('Super_admin/search_branch'));
			
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
            'branch_id' => $id
        	];	
        	unset($post['name']);
			 if(!$this->branch->Update_data('tbl_branch',$post,$con))
			{
				$this->session->set_flashdata("feedback","Branch Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Branch Failed To Update,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('Super_admin/search_branch'));
			
				
		}
			
	
		}
		else
		{
		$this->load->model('branch');
		$con = [
            'branch_id' => $id
        ];
	$data['data']=$this->branch->Get_single_row('tbl_branch',$con);
	$data['op']="HOME/UPDATE BRANCH";

	$data['upload_error']=$this->upload->display_errors();
		
		$this->load->view('superadmin/update_branch',$data);
		}

	}
	
	public function fetch_single_data()
	{
		 extract($_POST);
        $con = [
            'branch_id' => $id
        ];
        	$this->load->model('branch');
        $data = $this->branch->Get_selected_data('tbl_branch', $con);
        echo json_encode($data);
    }

	
	

    public function delete_branch($id=NULL)
	{
		 if($id == null)
            {
                redirect(base_url('Super_admin/search_branch'));
            }
		$this->load->model('branch');
		$con = [
            'branch_id' => $id
        ];
			$post=['is_deleted'=>1];
			if(!$this->branch->Update_data('tbl_branch',$post,$con))
			{
				$this->session->set_flashdata("feedback","Braanch Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		
		$this->session->set_flashdata("feedback","Branch Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('Super_admin/search_branch'));

	}
	public function delete_branch_head($id=NULL)
	{
		 if($id == null)
            {
                redirect(base_url('Super_admin/search_branch_head'));
            }
		$this->load->model('branch');
		$con = [
            'master_admin_id' => $id
        ];
			$post=['is_deleted'=>1];
			if(!$this->branch->Update_data('tbl_master_admin',$post,$con))
			{
				$this->session->set_flashdata("feedback","Braanch Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		
		$this->session->set_flashdata("feedback","Branch Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
		

			}
			redirect(base_url('Super_admin/search_branch_head'));

	}
	public function get_event_des()
	{
		$d = $this->input->post('event_id');
		$con = ['event_id'=>$d];
		$data=$this->branch->get_event_des('tbl_event',$con);
		echo json_encode($data);
	}
	public function check_mail()
	{
		$email = $this->input->post('b_email');

		$this->load->model("branch");
		$con=['is_deleted'=>0];
        $fetch = $this->branch->Get_data('tbl_branch',$con);
		
			 foreach ($fetch as $value) {
				
			 	 if($value['branch_email'] == $email)
			 	 {
			 	 	echo "This email already exist";
			 	 
			 	 }

		 }
	}
	public function update_role()
	{
		$post=$this->input->post();
		unset($post['action']);
		unset($post['role_id']);
		
		$this->load->model('branch');
		$con=['role_id'=>$this->input->post('role_id')];
		
		
		if(!$this->branch->Update_data('tbl_role',$post,$con))
			{
				$this->session->set_flashdata("feedback","Role Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Role Failed To Update,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
			}
			redirect(base_url('super_admin/role'));

	}
	public function delete_role($id)
	{
		$con=['role_id'=>$id];
	if(!$this->branch->delete_data('tbl_role',$con))
	{
				$this->session->set_flashdata("feedback","Role Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
		$this->session->set_flashdata("feedback","Role Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");
			}
	redirect(base_url('super_admin/role'));	
	}
	
public function cal()
	{

		$this->load->model('branch');
		$con=['is_deleted'=>0];
		$data['data']=$this->branch->Get_data_event('tbl_event',$con);
		$data['op']='HOME/MANAGE EVENT';
		 $this->load->view('superadmin/cal',$data);
	}
	public function addevent()
	{
		
		$config=[
			'upload_path' => './uploads/event_image',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
	$this->load->library('upload',$config);


		if($this->upload->do_upload())
		{	
			$post=$this->input->post();

			$this->load->model('branch');
			$data=$this->upload->data();
			$full_p=$data['file_name'];
			$post['event_image']=$full_p;
			$post['is_deleted']=0;
			
		$this->load->model('branch');
		$this->branch->add('tbl_event',$post);
		redirect(base_url('super_admin/cal'));
		}
		
	}

	public function editevent()
	{
		$data=$this->input->post();
		$eid = $data['id'];
		unset($data['id']);
		$con=['event_id'=>$eid];
		 $this->load->model('branch');

		if(isset($data['delete']))
		{
		 	$post=['is_deleted'=>1];
		$this->branch->Update_data('tbl_event',$post,$con);
		
		}
		else
		{
			$config=[
			'upload_path' => './uploads/event_image',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
		$this->load->library('upload',$config);

					if($this->upload->do_upload())
					{	
					$post=$this->input->post();

					$this->load->model('branch');
					$data=$this->upload->data();
					$full_p=$data['file_name'];
					$post['event_image']=$full_p;
					

					unlink(FCPATH.'uploads/event_image/'.$this->input->post('event_imaged'));
					unset($post['event_imaged']);
					unset($post['id']);

					// print_r($post);exit;
					$this->branch->Update_data('tbl_event',$post,$con);
					redirect(base_url('super_admin/cal'));
					}
					else
					{
							$post=$this->input->post();
							unset($post['event_imaged']);
							unset($post['id']);


							$this->branch->Update_data('tbl_event',$post,$con);
							redirect(base_url('super_admin/cal'));
				
					}
		 
		 }

		 redirect(base_url('super_admin/cal'));
	}
	public function search_branch_head()
	{

		$data['data']=$this->branch->get_branch_head();
		$data['op']="HOME/SEARCH USER";
		$this->load->view('superadmin/search_branch_head',$data);
	}
	public function updateevent()
	{
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$data = array('event_start' =>$start , 'event_end' =>$end);
		
				$con=['event_id'=>$id];

		 $this->load->model('branch');

		
		 $this->branch->Update_data('tbl_event',$data,$con);
		 echo "ok";

		 //redirect(base_url('super_admin/cal'));
	}
	public function update_branch_head($id)
	{


			$config=[
			'upload_path' => './uploads/branch_head',
			'allowed_types' => 'jpg|gif|png|jpeg',
				];
	$this->load->library('form_validation');
	$this->load->library('upload',$config);
	$this->form_validation->set_error_delimiters("<p class='text-danger'><b>","</b></p>");

	
	$this->load->model('branch');
			
		if($this->form_validation->run('update_branch_head') )
		{
		if($this->upload->do_upload())
		{
		$post=$this->input->post();
			unset($post['submit']);
			unset($post['state']);
			unset($post['city']);
			unset($post['b_state']);
			unset($post['b_city']);

			unlink(FCPATH.'uploads/branch_head/'.$this->input->post('master_admin_image'));
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
			redirect(base_url('Super_admin/search_branch_head'));
			
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
			redirect(base_url('Super_admin/search_branch_head'));
			
				
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


	$data['op']="HOME/UPDATE USER";

	// $data['upload_error']=$this->upload->display_errors();
		
		$this->load->view('superadmin/update_branch_head',$data);
		}

	}
	public function add_course()
	{
		$data['data']  = $this->branch->fetch_all_data('tbl_course');
		$data['op']="HOME/MANAGE COURSE";
		$this->load->view('superadmin/add_course',$data);
	}
	
	public function add_course_detail()
	{
		

				$post=$this->input->post();
		 		unset($post['submit']);

				$data1 = $this->set_upload_options('userfile1');
				$data2 = $this->set_upload_options('userfile2');

				$post['course_display_pic']=$data1['file_name'];
				$post['course_cover_pic']= $data2['file_name'];


		if(!$this->branch->add("tbl_course",$post))
		{

				$this->session->set_flashdata("feedback","Course Added Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
				$this->session->set_flashdata("feedback","Course Failed To add,Please Try Again Later");
				$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('super_admin/add_course'));
	}

private function set_upload_options($filename)
{   
    $config=[
			'upload_path' => './uploads/course_image',
			'allowed_types' => 'jpg|gif|png|jpeg',

			];
					$this->load->library('upload',$config);
					$this->upload->do_upload($filename);

					return $this->upload->data();
}

	public function retrive_course()
	{
		 $id = $this->input->post('course_id');
		 $con = ['course_id'=>$id];
		$data = $this->branch->Get_selected_data('tbl_course', $con);
        echo json_encode($data);
	}

	public function update_course()
	{

		// echo "<pre>";
		// print_r($data=$this->input->post());exit;
		$d=$this->input->post();
		$data1 = $this->set_upload_options('userfile1');
		$data2 = $this->set_upload_options('userfile2');

		if($d['course_display_pic']!= "" || $d['course_cover_pic']!= "")
		{
									if($data1['file_name'] == "" && $data2['file_name'] == "")
									{
											$full_dis_path = $d['course_display_pic'];
											$full_cover_path = $d['course_cover_pic'];
									}
									elseif ($data1['file_name'] == "" && $data2['file_name'] != "") {
									
											unlink(FCPATH.'uploads/course_image/'.$this->input->post('course_cover_pic'));
											$full_dis_path = $d['course_display_pic'];
											$full_cover_path=$data2['file_name'];
									}
									elseif ($data2['file_name'] == "" && $data1['file_name'] != "") {
									
											unlink(FCPATH.'uploads/course_image/'.$this->input->post('course_display_pic'));
											$full_cover_path = $d['course_cover_pic'];
											$full_dis_path=$data1['file_name'];
									}
									else
									{
										unlink(FCPATH.'uploads/course_image/'.$this->input->post('course_display_pic'));
										unlink(FCPATH.'uploads/course_image/'.$this->input->post('course_cover_pic'));

											$full_dis_path=$data1['file_name'];
											$full_cover_path=$data2['file_name'];
									}
								
		}
		else
		{
			unlink(FCPATH.'uploads/course_image/'.$this->input->post('course_display_pic'));
			unlink(FCPATH.'uploads/course_image/'.$this->input->post('course_cover_pic'));

				$full_dis_path=$data1['file_name'];
				$full_cover_path=$data2['file_name'];
				
		}


				$d['course_display_pic']=$full_dis_path;
				$d['course_cover_pic']=$full_cover_path;


		$con=['course_id'=>$this->input->post('course_id')];

		if(!$this->branch->Update_data('tbl_course',$d,$con))
		{
				$this->session->set_flashdata("feedback","Course Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
			$this->session->set_flashdata("feedback","Course Failed To Update,Please Try Again Later");
			$this->session->set_flashdata("feedback_c","alert-danger");
		}
			redirect(base_url('super_admin/add_course'));

	}
	public function delete_course($id)
	{
		$con=['course_id'=>$id];

		if(!$this->branch->delete_data('tbl_course',$con))
		{
				$this->session->set_flashdata("feedback","course Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
	
		$this->session->set_flashdata("feedback","course Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");

		}
			redirect(base_url('super_admin/add_course'));
	}

	public function add_subject()
	{

		$data['data']  = $this->branch->fetch_subject();
		$data['op']="HOME/MANAGE SUBJECT";
		$this->load->view('superadmin/add_subject',$data);
	}

	
	public function add_subject_detail()
	{
		$post=$this->input->post();

		if(!$this->branch->add("tbl_subject",$post))
			{
				$this->session->set_flashdata("feedback","Subject Added Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
				$this->session->set_flashdata("feedback","Subject Failed To add,Please Try Again Later");
				$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('super_admin/add_subject'));
	}
	public function retrive_subject()
	{

		  $id = $this->input->post('subject_id');
		  $con = ['subject_id'=>$id];
	
		 $data = $this->branch->Get_selected_data('tbl_subject', $con);
    
         echo json_encode($data);
	}

	

	public function get_course()
	{
			$data = $this->branch->fetch_all_data('tbl_course');
			echo json_encode($data);
	}

	public function fetch_course()
	{
			 $id = $this->input->post('subject_id');
			 $con = ['subject_id'=>$id];

			$course = $this->branch->fetch_all_data('tbl_course');
			$test = $this->branch->Get_selected_data('tbl_subject', $con);

			$data = array('c'=>$course,'t'=>$test);

			echo json_encode($data);
	}

	public function update_subject()
	{

		$data=$this->input->post();

		$con=['subject_id'=>$this->input->post('subject_id')];

		if(!$this->branch->Update_data('tbl_subject',$data,$con))
		{
				$this->session->set_flashdata("feedback","Subject Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
			$this->session->set_flashdata("feedback","Subject Failed To Update,Please Try Again Later");
			$this->session->set_flashdata("feedback_c","alert-danger");
		}
			redirect(base_url('super_admin/add_subject'));

	}
	public function delete_subject($id)
	{
		$con=['subject_id'=>$id];

		if(!$this->branch->delete_data('tbl_subject',$con))
		{
				$this->session->set_flashdata("feedback","subject Delete Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
	
		$this->session->set_flashdata("feedback","subject Failed To Delete,Please Try Again Later");
		$this->session->set_flashdata("feedback_c","alert-danger");

		}
			redirect(base_url('super_admin/add_subject'));
	}

	public function add_syllabus()
	{
		$data['op']="HOME/MANAGE SYLLABUS";
		$this->load->view('superadmin/add_syllabus',$data);
	}

	public function get_subject()
	{
			$id = $this->input->post('course_id');
			$val = array('course_id' => $id);
			$data = $this->branch->Get_selected_data('tbl_subject',$val);
			echo json_encode($data);
	}
	public function add_syllabus_detail()
	{
			$post=$this->input->post();

		if(!$this->branch->add("tbl_syllabus",$post))
			{
				$this->session->set_flashdata("feedback","Subject Added Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
			}
			else
			{
				$this->session->set_flashdata("feedback","Subject Failed To add,Please Try Again Later");
				$this->session->set_flashdata("feedback_c","alert-danger");
			}

			redirect(base_url('super_admin/add_syllabus'));
	}

	public function fetch_course_s()
	{
			 $id = $this->input->post('syllabus_id');
			 $con = ['syllabus_id'=>$id];

			$course = $this->branch->fetch_all_data('tbl_course');
			$test = $this->branch->Get_selected_data('tbl_syllabus', $con);

			$data = array('c'=>$course,'t'=>$test);

			echo json_encode($data);
	}
	public function get_syllabus()
	{
		$cid = $this->input->post('course_id');

		$data = $this->branch->get_syllabus_data($cid);

		echo json_encode($data);

	}

	public function delete_syllabus()
	{
		$id = $this->input->post('syllabus_id');
		$con = ['syllabus_id'=>$id];
		$this->branch->delete_data('tbl_syllabus',$con);
		echo "record is deleted";
	}

	public function fetch_syllabus()
	{
			$id = $this->input->post('syllabus_id');
			$val = array('syllabus_id' => $id);
			$data = $this->branch-> Get_selected_data('tbl_syllabus',$val);
			echo json_encode($data);
	}

	public function fetch_subject_s()
	{
			 
			 $sid = $this->input->post('syllabus_id');
			 $cid = $this->input->post('course_id');

			 $con = ['syllabus_id'=>$sid];
			$test = $this->branch->Get_selected_data('tbl_syllabus', $con);
			 
			// $conn = ['course_id'=>$cid];
			 $subject = $this->branch->fetch_syllabus_data($cid);
			
			 $data = array('s'=>$subject,'t'=>$test);
			 echo json_encode($data);
	}

	public function update_syllabus_detail()
	{

		$data=$this->input->post();
		unset($data["submit"]);
		//print_r($data);exit;

		$con=['syllabus_id'=>$this->input->post('syllabus_id')];

		if(!$this->branch->Update_data('tbl_syllabus',$data,$con))
		{
				$this->session->set_flashdata("feedback","syllabus Update Sucessfully");
				$this->session->set_flashdata("feedback_c","alert-success");
		}
		else
		{
			$this->session->set_flashdata("feedback","syllabus Failed To Update,Please Try Again Later");
			$this->session->set_flashdata("feedback_c","alert-danger");
		}
			redirect(base_url('super_admin/add_syllabus'));

	}

	function download_function()
	{
    $this->load->helper('download');
    $data = file_get_contents(APPPATH .'controllers/upload/project_name/bc68gdas9jfeh9yfj/'.$this->uri->segment(3)); // Read the file's contents
    $name = $this->uri->segment(3);
    force_download($name, $data);
	}

	function download_syllabus()
	{
		$cid = $this->uri->segment(3);
		$data['data'] = $this->branch->download_syllabus_detail($cid);

		$this->load->view("superadmin/print_syllabus",$data);
	}

	public function profile()
	{
		$this->load->view('superadmin/profile');
	}

	public function branchwise_students()
	{
		$data['op']='HOME/STUDENT REPORT';
		$this->load->view('superadmin/reports/branchwise_student',$data);
	}

	public function select_branch()
	{
		$data = $this->branch->fetch_all_data('tbl_branch');
		echo json_encode($data);
	}
	public function select_course()
	{
		$data = $this->branch->fetch_all_data('tbl_course');
		echo json_encode($data);
	}

	public function branch_students()
	{
		$bid = $this->input->post('bid');

		$data = $this->branch->branch_student($bid);

		echo json_encode($data);
	}
	public function course_students()
	{
		$bid = $this->input->post('bid');

		$data = $this->branch->course_student($bid);

		echo json_encode($data);
	}

	public function from_date_students()
	{
		$fdate = $this->input->post('bid');

		$data = $this->branch->fdate_student($fdate);

		echo json_encode($data);	
	}
	public function to_date_students()
	{
		$tdate = $this->input->post('bid');

		$data = $this->branch->tdate_student($tdate);

		echo json_encode($data);	
	}
	public function branch_course_students()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		
		$data = $this->branch->branch_course_student($bid,$cid);

		echo json_encode($data);	
	}
	public function fdate_branch_course_students()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$did = $this->input->post('did');

		$data = $this->branch->fdate_branch_course_student($bid,$cid,$did);

		echo json_encode($data);		
	}

	public function fdate_branch_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		
		$data = $this->branch->branch_fdate_student($bid,$did);

		echo json_encode($data);	

	}

	public function tdate_branch_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		
		$data = $this->branch->branch_tdate_student($bid,$did);

		echo json_encode($data);	

	}
	public function fdate_course_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		
		$data = $this->branch->course_fdate_student($bid,$did);

		echo json_encode($data);		
	}
	public function tdate_course_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');
		
		$data = $this->branch->course_tdate_student($bid,$did);

		echo json_encode($data);		
	}
	public function fdate_tdate_students()
	{
		$bid = $this->input->post('bid');
		$did = $this->input->post('did');

		$data = $this->branch->fdate_tdate_student($bid,$did);

		echo json_encode($data);	
	}
	public function fdate_tdate_branch_course_students()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$did = $this->input->post('did');
		$tid = $this->input->post('tid');

		$data = $this->branch->fdate_tdate_branch_course_student($bid,$cid,$did,$tid);

		echo json_encode($data);	
	}

	public function tdate_branch_course_students()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$did = $this->input->post('did');

		$data = $this->branch->tdate_branch_course_student($bid,$cid,$did);

		echo json_encode($data);		
	}

	public function fdate_branch_tdate_students()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$did = $this->input->post('did');

		$data = $this->branch->fdate_branch_tdate_student($bid,$cid,$did);

		echo json_encode($data);	
	}
	public function fdate_course_tdate_students()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$did = $this->input->post('did');

		$data = $this->branch->fdate_course_tdate_student($bid,$cid,$did);

		echo json_encode($data);	
	}
	public function branches_report()
	{
		$data['op']='HOME/BRANCH REPORT';
		$this->load->view('superadmin/reports/branch',$data);

	}
	public function courses_report()
	{
		$data['op']='HOME/COURSE REPORT';
		$this->load->view('superadmin/reports/courses',$data);

	}
	public function branches_heads_report()
	{

		$data['op']='HOME/BRANCH HEAD REPORT';
		$this->load->view('superadmin/reports/branch_head',$data);

	}
	public function branches_head()
	{
		$data = $this->branch->branch_heads();
		echo json_encode($data);
	}

	public function branches_faculty_report()
	{
		$data['op']='HOME/BRANCH FACULTY REPORT';
		$this->load->view('superadmin/reports/branch_faculty',$data);

	}
	public function select_subject()
	{
		$cid = $this->input->post('cnm');
		$data = $this->branch->Get_data('tbl_subject',['course_id'=>$cid]);
		echo json_encode($data);
	}
	public function branch_faculties()
	{
		$bid = $this->input->post('bid');
		$data = $this->branch->branch_faculties($bid);
		echo json_encode($data);
	}
	public function course_faculties()
	{
		$bid = $this->input->post('bid');
		$data = $this->branch->course_faculties($bid);
		echo json_encode($data);
	}
	public function branch_course_subject_faculties()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
		$sid = $this->input->post('sid');

		$data = $this->branch->branch_course_subject_faculties($bid,$cid,$sid);
		echo json_encode($data);
	}
	public function branch_course_faculties()
	{
		$bid = $this->input->post('bid');
		$cid = $this->input->post('cid');
	
		$data = $this->branch->branch_course_faculties($bid,$cid);
		echo json_encode($data);
	}
	public function course_subject_faculties()
	{
		$cid = $this->input->post('cid');
		$sid = $this->input->post('sid');

		$data = $this->branch->course_subject_faculties($cid,$sid);
		echo json_encode($data);
	}
	public function all_events_report()
	{
		$data['op']='HOME/ALL EVENETS REPORT';
		$this->load->view('superadmin/reports/all_events',$data);
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
	public function syllabus_report()
	{
		$data['op']='HOME/SYLLABUS REPORT';
		$this->load->view('superadmin/reports/syllabus',$data);
	}
}
