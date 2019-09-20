<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function __construct()
   	 {
      parent::__construct();
       $this->load->model('clientmodel');
       $this->load->library('Google');
        // Load linkedin config
        $this->load->config('linkedin');
        
   	 
     }
	public function index()
	{
		$data['ad'] = $this->clientmodel->get_admin_detail();
		
		$data['data']=$this->clientmodel->group_by_function(); 
		
		$this->load->view('client/index',$data);
	}
	public function event()
	{
    	$data['event'] = $this->clientmodel->Get_data('tbl_event');	
		$this->load->view('client/event',$data);
	}
	public function course()
	{
		$this->load->library('pagination');
		$config = [
				'base_url' => base_url('courses'),
				'per_page' => 2,
				'total_rows' => $this->clientmodel->total_rows('tbl_course'),
				'full_tag_open' => "<div class='pagination ppp'><ul>",
				'full_tag_close' => "</div></ul>",
				'next_tag_open' => "<li class='next'>",
				'next_tag_close' => "</li>",
				'prev_tag_open' => "<li class='prev'>",
				'prev_tag_close' => "</li>",
				'num_tag_open' => "<li>",
				'num_tag_close' => "</li>",
				'cur_tag_open' => "<li class='active'><a>",
				'cur_tag_close' => '</a></li>',
				'next_link' => 'Next',
			   'prev_link' => 'Prev',
               'first_link' => 'First',
               'last_link' => 'Last',
               'first_tag_open' => "<li class='next'>",
               'first_tag_close' => '</li>',
               'last_tag_open' => "<li class='prev'>",
               'last_tag_close' => '</li>'

		];
		$this->pagination->initialize($config);
		$data['data']=$this->clientmodel->get_limit_data('tbl_course',$config['per_page'],$this->uri->segment(2));

		

		$this->load->view('client/course',$data);	
	}
	public function course_details()
	{
		$course = $this->uri->segment(2);
		$con=['course_name'=>$course];
		$data1=$this->clientmodel->Get_single_row('tbl_course',$con);

        $con1=['course_id'=>$data1->course_id];
        $tot_test=$this->clientmodel->getcc('tbl_online_test',$con1);

        
        $tot_student=$this->clientmodel->getcc('tbl_student_branch_course',$con1);
        
        
        $tot_lessons=$this->clientmodel->getcc('tbl_syllabus',$con1);

		if($data1)
		{
		$syllabus=$this->clientmodel->get_syllabus_course_details($data1->course_id);
            
		$data['data']=$data1;
		$data['syllabus']=$syllabus;

			if($this->session->userdata('sid')!="")
			{

					$data['course'] = $this->clientmodel->student_branch($this->session->userdata('sid'));
                if($data['course'])
                {
                    foreach ($data['course'] as $value) {
                    
                            if($value['course_name']==$data['data']->course_name)
                            {
                                $data['flag']=1;
                                break;
                            }   
                            else
                            {
                                $data['flag']=0;
                            }
                            
                    }
                    
                }
                else {
                              $data['flag']=0;
                }
                    

				    $data['tot_test']=$tot_test;
                    $data['tot_student']=$tot_student;
                    $data['tot_lessons']=$tot_lessons;
                    
                	$this->load->view('client/course_details',$data);
			}
			else

			{
                    $data['tot_test']=$tot_test;
                    $data['tot_student']=$tot_student;
                    $data['tot_lessons']=$tot_lessons;
				$this->load->view('client/course_details',$data);
			}
		}
		else
		{
	 
    	redirect(base_url('courses'));

		}
	}

	public function course_enroll($cname='')
	{
		$data['cname']=$this->uri->segment(3);
		$data['branch']=$this->clientmodel->Get_data('tbl_branch');
		$con=['student_id'=>$this->session->userdata('sid')];

		$data['student']=$this->clientmodel->Get_single_row('tbl_student',$con);

		
		if(!$this->session->userdata('loggedIn') == true){

          $data['loginURL'] = $this->google->loginURL();
          $data['oauthURL'] = $this->config->item('linkedin_redirect_url').'?oauth_init=1';
        
        //load google login view
        // $this->load->view('client/login',$data);
          redirect(base_url('student'));
        }
        else
        {
        	// print('<pre>');
        	// print_r($data);exit;
        	$this->load->view('client/enroll',$data);
        }
	}


	 public function enroll()
    {

    	// $post=$this->input->post();
    	$con1=['course_name'=>$this->input->post('productinfo')];
		$data=$this->clientmodel->Get_single_row('tbl_course',$con1);
		// $post['amount']=$data->course_fee;
		// print_r($post);exit;

    $MERCHANT_KEY = "fB7m8s";

	// Change the Merchant Salt as provided by Payumoney
	$SALT = "eRis5Chv";

 $firstname =$this->input->post('first_name');
 $email =$this->input->post('email');
 $phone =$this->input->post('phone');
 $amount =$data->course_fee;
 $productinfo =$this->input->post('productinfo');
  date_default_timezone_set('Asia/Kolkata');
          
$txnid =time().rand(1000,99999);
$surl = "http://localhost/academy/course/payment-receipt";
$furl = "http://localhost/academy/course/payment-fail";
$udf1=$this->session->userdata('sid');
$udf2=$this->input->post('branch');
$udf3=$data->course_id;

$hashseq=$MERCHANT_KEY.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|'.$udf3.'||||||||'.$SALT;
 $hash =strtolower(hash("sha512", $hashseq)); 

 $data5['MERCHANT_KEY']=$MERCHANT_KEY;
 $data5['hash']=$hash;
 $data5['txnid']=$txnid;
 $data5['amount']=$amount;
 $data5['firstname']=$firstname;
 $data5['email']=$email;
 $data5['phone']=$phone;
 $data5['productinfo']=$productinfo;
 $data5['udf1']=$udf1;
 $data5['udf2']=$udf2;
 $data5['udf3']=$udf3;
 $data5['surl']=$surl;
$data5['furl']=$furl;


        $this->load->view('client/payumoney',$data5);
	

    }

    public function fail()
    {
   
    	$this->load->view('client/fail');
    }
    public function success()
    {
    	if(isset($_POST['status'])){
   		 if($_POST['status']=="success"){
   			$payumoney=$this->input->post();
			$data['transaction_id']=$payumoney['txnid'];
			$data['user_id']=$payumoney['udf1'];
			$data['status']=$payumoney['status'];

			$data1['student_id']=$payumoney['udf1'];
			$data1['branch_id']=$payumoney['udf2'];
			$data1['course_id']=$payumoney['udf3'];
			

			$this->clientmodel->add('tbl_transaction',$data);
			$this->clientmodel->add('tbl_student_branch_course',$data1);

			$con=['branch_id'=>$payumoney['udf2']];
			$res=$this->clientmodel->Get_single_row('tbl_branch',$con);
						

			$trans['transaction_id']=$payumoney['txnid'];
			$trans['name']=$payumoney['firstname'];
			$trans['mobile']=$payumoney['phone'];
			$trans['email']=$payumoney['email'];
			$trans['course']=$payumoney['productinfo'];
			$trans['fee']=$payumoney['amount'];
			$trans['branch']=$res->branch_name;
			$trans['time']=$payumoney['addedon'];
			$trans['charge']=$payumoney['additionalCharges'];
			$trans['total']=$payumoney['net_amount_debit'];

			$this->load->view('client/success',$trans);
					
   		 }
   		}
	    	
    }

    public function contactus()
    {
    	$con = ['branch_name'=>'Head_Branch'];
    	$data['branch'] = $this->clientmodel->get_selected_data('tbl_branch',$con);

    	$this->load->view('client/contact',$data);
    }

    public function branch_detail()
    {
    	$data['branch'] = $this->clientmodel->Get_data('tbl_branch');
    	$this->load->view('client/branches',$data);
    }
    public function profile()
    {
    	$this->load->view('client/profile');
    }

    public function users()
    {
    	$data['subject'] = $this->clientmodel->Get_data('tbl_subject');
    	$data['branch'] = $this->clientmodel->Get_data('tbl_branch');
    	$data['course']=$this->clientmodel->Get_data('tbl_course');
    //	$data['data'] = $this->clientmodel->get_course_detail();

    	$this->load->library('pagination');
		$config = [
				'base_url' => base_url('/client/users'),
				'per_page' => 6,
				'total_rows' => $this->clientmodel->total_rows_user(),
				'full_tag_open' => "<div class='pagination ppp'><ul>",
				'full_tag_close' => "</div></ul>",
				'next_tag_open' => "<li class='next'>",
				'next_tag_close' => "</li>",
				'prev_tag_open' => "<li class='prev'>",
				'prev_tag_close' => "</li>",
				'num_tag_open' => "<li>",
				'num_tag_close' => "</li>",
				'cur_tag_open' => "<li class='active'><a>",
				'cur_tag_close' => '</a></li>',
				'next_link' => 'Next',
			   'prev_link' => 'Prev',
               'first_link' => 'First',
               'last_link' => 'Last',
               'first_tag_open' => "<li class='next'>",
               'first_tag_close' => '</li>',
               'last_tag_open' => "<li class='prev'>",
               'last_tag_close' => '</li>'
		];
		//echo $config['per_page'];exit;
		$this->pagination->initialize($config);

		if($this->uri->segment(3)=="")
		{
			$offset = 0;
		}
		else
		{
			$offset = $this->uri->segment(3);
		}
		$data['data']=$this->clientmodel->get_users_detail($config['per_page'],$offset);
		

    	
  
    		$this->load->view('client/users',$data);
    	
    }

function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
    public function user_profile()
    {
    	$unm = $this->uri->segment(2);
        // $hash =strtolower(hash("sha512", $unm));
        // echo $hash;exit; 
        $unm=$this->my_simple_crypt($unm,'d');

    	$data['data'] = $this->clientmodel->get_faculty_detail($unm);
        // echo "<pre>";
        // print_r($data['data']);exit;
    	$data['sub'] = $this->clientmodel->taken_subject($data['data'][0]['faculty_id']);

    	$this->load->view('client/user_profile',$data);
    }
    public function user_profile_ajax()
    {
        $unm = $this->uri->segment(2);
        
        $data['data'] = $this->clientmodel->get_faculty_detail_ajax($unm);
        // echo "<pre>";
        // print_r($data['data']);exit;
        $data['sub'] = $this->clientmodel->taken_subject($data['data'][0]['faculty_id']);

        $this->load->view('client/user_profile',$data);
    }

    public function admin_profile()
    {
    	$unm = $this->uri->segment(2);
    	$data['ad'] = $this->clientmodel->get_selected_admin_detail($unm);
    	$this->load->view('client/admin_profile',$data);
    }

    public function branch_faculty_detail()
    {
    	$perpage = 6;
    	$page = '';
    	$output = '';


    		$page = $_POST['page2'];

    		if($page == 0)
    		{
    			$page = 1;
    		}

    	$start = ($page - 1)*$perpage;

    	$brnm = $this->input->post('br');

    	$totalp = $this->clientmodel->branch_faculty_detail($brnm);
    	$total = ceil($totalp/6);
     		
    	$data['user'] = $this->clientmodel->branch_pagination($brnm,$start,$perpage);
       	$data['total'] = $total;
       	echo json_encode($data);

    }

    public function course_faculty_detail()
    {
    	$perpage = 2;
    	$page = '';
    	$output = '';


    		$page = $_POST['page1'];

    		if($page == 0)
    		{
    			$page = 1;
    		}

    	$start = ($page - 1)*$perpage;

    	$crnm = $this->input->post('cr');

    	$totalp = $this->clientmodel->course_faculty_detail($crnm);
    	$total = ceil($totalp/2);
     		
    	$data['user'] = $this->clientmodel->course_pagination($crnm,$start,$perpage);
       	$data['total'] = $total;
       	echo json_encode($data);
    }

    public function subject_faculty_detail()
    {

    	$perpage = 4;
    	$page = '';
    	$output = '';


    		$page = $_POST['page'];

    		if($page == 0)
    		{
    			$page = 1;
    		}

    	$start = ($page - 1)*$perpage;

    	$srnm = $this->input->post('br');

    	$totalp = $this->clientmodel->subject_faculty_detail($srnm);
    	$total = ceil($totalp/4);
     		
    	$data['user'] = $this->clientmodel->subject_pagination($srnm,$start,$perpage);
       	$data['total'] = $total;
       	echo json_encode($data);
    
    }

    public function search_instructor()
    {
    	$s = $this->input->post('search');
    	$data['user'] = $this->clientmodel->search_instructor($s);
       	echo json_encode($data);
    }

    public function search_course_ajax()
    {

    	$s = $this->input->post('search');
    	$data = $this->clientmodel->search_course_ajax('tbl_course',$s);
       	echo json_encode($data);
    }

    public function loadd()
    {
			$data['data'] = $this->clientmodel->search_course_ajax('tbl_course','b');
			$this->load->view('test',$data);

    }
  public function view_branch($bname)
  {
    $con = ['branch_name'=>$bname];
        $data['data'] = $this->clientmodel->Get_single_row('tbl_branch',$con);

    $this->load->view('client/branch_details',$data);
  } 
}
?>