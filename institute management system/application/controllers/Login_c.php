<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller {

    
    function __construct(){
        parent::__construct();
        
        //load google login library
        $this->load->library('Google');
        // Load linkedin config
        $this->load->config('linkedin');
        
        //load user model
        $this->load->model('user');
        $this->load->model('branch');
        $this->load->model('clientmodel');
    }
    

    public function index()
    {
           include_once APPPATH."libraries/linkedin-oauth-client/http.php";
        include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
        
        
        if(!$this->session->userdata('loggedIn') == true){

          $data['loginURL'] = $this->google->loginURL();
          $data['oauthURL'] = $this->config->item('linkedin_redirect_url').'?oauth_init=1';
        
        //load google login view
        $this->load->view('client/login',$data);
        }
        else
        {
            redirect(base_url('student/dashboard'));
        }
    }
    public function google_log(){
        //redirect to profile page if user already logged in
        if($this->session->userdata('loggedIn') == true){
            redirect(base_url('student/dashboard'));
          //  header("Location:user_authentication/profile");
        }
        
        if(isset($_GET['code'])){
            //authenticate user
            $this->google->getAuthenticate();
            
            //get user info from google
            $gpInfo = $this->google->getUserInfo();
            
            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['first_name']     = $gpInfo['given_name'];
            $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
            
            //insert or update user data to the database
            $userID = $this->user->checkUser($userData);
            // print($userID);exit;
            //store status & user info in session
            $this->session->set_userdata('loggedIn', true);

            $this->session->set_userdata('sid', $userID);
            $this->session->set_userdata('sname',$gpInfo['given_name']);
            
            $this->session->set_userdata('userData', $userData);
            
            //redirect to profile page
           // redirect('user_authentication/profile/');
            // header("Location:   profile");
            redirect(base_url('student/dashboard'));
        }
        
        //google login url
        $data['loginURL'] = $this->google->loginURL();
        
        //load google login view
        $this->load->view('client/login',$data);
    }
    
    // public function dasboard(){
    //     //redirect to login page if user not logged in
    //     if(!$this->session->userdata('loggedIn')){
    //       //  redirect('');
    //         // header("Location:user_authentication");
    //         redirect('login_c/google_log');
    //     }
        
    //     //get user info from session
    //     $data['userData'] = $this->session->userdata('userData');
        
    //     //load user profile view
    //     $this->load->view('client/profile/dashboard',$data);
    // }
    public function dasboard(){

        //redirect to login page if user not logged in
        if(!$this->session->userdata('loggedIn')){
          //  redirect('');
            // header("Location:user_authentication");
            redirect('student');

        }
        
        //get user info from session
        $s = $this->session->userdata('sid');

        $con = ['student_id'=>$s];
        $sname = $this->clientmodel->get_selected_data('tbl_student',$con);

        $data = $this->clientmodel->get_selected_data('tbl_student_branch_course',$con);

        for ($i=0; $i < count($data) ; $i++) { 
            
            $con1 = ['course_id'=>$data[$i]['course_id']];
            $data[$i] = $this->clientmodel->get_selected_data('tbl_course',$con1);
        }
            $data1['data'] = $data;
            
            $data1['snm'] = $sname[0]['first_name']." ".$sname[0]['last_name'];

        $this->load->view('client/profile/dashboard',$data1);
    }
    
    public function logout(){
        //delete login status & user info from session
        $this->session->unset_userdata('loggedIn');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        
        //redirect to login page
       // redirect('/user_authentication/');
 // header("Location:index");
            redirect(base_url('student'));
    }
    
    public function link_log(){
        $userData = array();
        
        //Include the linkedin api php libraries
        include_once APPPATH."libraries/linkedin-oauth-client/http.php";
        include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
        
        
        //Get status and user info from session
        $oauthStatus = $this->session->userdata('loggedIn');
        $sessUserData = $this->session->userdata('userData');
        
        if(isset($oauthStatus) && $oauthStatus == 'true'){
            //User info from session
            $userData = $sessUserData;
        }elseif((isset($_REQUEST["oauth_init"]) && $_REQUEST["oauth_init"] == 1) || (isset($_REQUEST['oauth_token']) && isset($_REQUEST['oauth_verifier']))){
            $client = new oauth_client_class;
            $client->client_id = $this->config->item('linkedin_api_key');
            $client->client_secret = $this->config->item('linkedin_api_secret');
            $client->redirect_uri = $this->config->item('linkedin_redirect_url');
            $client->scope = $this->config->item('linkedin_scope');
            $client->debug = false;
            $client->debug_http = true;
            $application_line = __LINE__;
            
            //If authentication returns success
            if($success = $client->Initialize()){
                if(($success = $client->Process())){
                    if(strlen($client->authorization_error)){
                        $client->error = $client->authorization_error;
                        $success = false;
                    }elseif(strlen($client->access_token)){
                        $success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
                        'GET',
                        array('format'=>'json'),
                        array('FailOnAccessError'=>true), $userInfo);
                    }
                }
                $success = $client->Finalize($success);
            }
            
            if($client->exit) exit;
    
            if($success){
                //Preparing data for database insertion
                $first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
                $last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
                $userData = array(
                    'oauth_provider'=> 'linkedin',
                    'oauth_uid'     => $userInfo->id,
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'email'         => $userInfo->emailAddress,
                    'picture_url'   => $userInfo->pictureUrl
                );
                
                //Insert or update user data
                $userID = $this->user->checkUser($userData);
                
                //Store status and user profile info into session
                $this->session->set_userdata('loggedIn','true');
                $this->session->set_userdata('userData',$userData);
                $this->session->set_userdata('sid', $userID);
                    $this->session->set_userdata('sname',$first_name);

                
                //Redirect the user back to the same page
                redirect(base_url('student'));

            }else{
                 $data['error_msg'] = 'Some problem occurred, please try again later!';
            }
        }elseif(isset($_REQUEST["oauth_problem"]) && $_REQUEST["oauth_problem"] <> ""){
            $data['error_msg'] = $_GET["oauth_problem"];
            redirect('student');
        }else{
            $data['oauthURL'] = $this->config->item('linkedin_redirect_url').'?oauth_init=1';
        }
        
        $data['userData'] = $userData;
        
        // Load login & profile view
        $this->load->view('client/login',$data);
    }







    // send mail

 public function send_mail($post) { 
        
         $this->load->library('email');
        //$to_email = array('samirrana1112@gmail.com', 'samirrana1011@gmail.com');
        $to_email=$post['email'];
                
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
        <title>Welcome to institute</title>
    </head>
    <body>

       <h1> Verify Link :</h1>
       <a href="'.base_url('student/email_verification/').$post['token'].'">Clik Here</a>
        
    </body>
    </html>';


$this->email->to($to_email);
$this->email->from('samtech1011@gmail.com','institute');
$this->email->subject('Your Verification Link');
$this->email->message($htmlContent);
$this->load->helper('url');
//Send mail 
if($this->email->send())
{
      $date = date('Y-m-d H:i:s', time());

            $post['created'] = $date;

            $post['modified']= $date;
            $post['password']=md5($post['password']);
    $this->branch->add('tbl_student',$post);
}

  }

public function verify($token='')
{

    $token=$this->uri->segment(3);

        $con=['token'=>$token,'is_verified'=>1];
        $data=$this->branch->Get_single_row('tbl_student',$con);
    if(!empty($data))
    {
        if($data->token==$token)
        {

            $con=['email'=>$data->email];
            $data=['is_verified'=>0];
            if($this->user->Update_data('tbl_student',$data,$con))
            {
    $this->session->set_flashdata("feedback","Your Account is Not Actived,Please Try Again");
    $this->session->set_flashdata("feedback_c","error");
    $this->load->view('client/done');     
        }
            else{
                $this->session->set_flashdata("feedback","Your Account is Actived");
                $this->session->set_flashdata("feedback_c","success");
                $this->load->view('client/done');     
            
            }
             
        }
        else
        {
            
    $this->session->set_flashdata("feedback","Your Account is Not Actived,Please Try Again");
    $this->session->set_flashdata("feedback_c","error");
    $this->load->view('client/done');     

        }
    }
    else
    {
    $this->session->set_flashdata("feedback","Already Activeted");
    $this->session->set_flashdata("feedback_c","error");
    $this->load->view('client/done');     

    }
    
}

public function check_mail()
    {
        $email = $this->input->post('email');

        $this->load->model("branch");
        $con=["is_verified=1 or is_verified=0"];
        $fetch = $this->branch->Get_data('tbl_student',$con);
        
             foreach ($fetch as $value) {
                
                 if($value['email'] == $email)
                 {
                    echo "This email already exist";
                 
                 }


         }
    }





     public function register()
    {
        $this->load->view('client/register');
    }
    public function get_register_data()
    {
    
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Lc5KVQUAAAAAMAwrd_X0wmBendBZMuyLh3-Iufx';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        
        if($responseData->success):
            //contact form submission code
             $post=$this->input->post();
             unset($post['g-recaptcha-response']);
                 unset($post['submit']);
        
        $token=md5(time().rand(0,99999999));
        $post['is_verified']=1;
        $post['token']=$token;   
        $this->send_mail($post);
 $this->session->set_flashdata("feedback","verification link send on your email ,please Active it"); 
 $this->session->set_flashdata("feedback_c","success");
                   
redirect(base_url('student/signup'));
        else:
            
     $this->session->set_flashdata("feedback","Robot verification failed, please try again.");
     $this->session->set_flashdata("feedback_c","error");   
        redirect(base_url('student/signup'));        

        endif;
    else:
     $this->session->set_flashdata("feedback","Robot verification failed, please try again.");
     $this->session->set_flashdata("feedback_c","error");
redirect(base_url('student/signup'));            
    endif;

       
    }


    public function login()
    {    
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = md5($this->input->post('password'));
            
            $con=['email'=>$email,'password'=>$password];
            $result = $this->clientmodel->Get_single_row('tbl_student',$con);

             if(!empty($result))
            {
                
             $con=['email'=>$email,'password'=>$password,'is_verified'=>0];
             $result1 = $this->clientmodel->Get_single_row('tbl_student',$con);

                 if(!empty($result1))
                 {
                 $this->session->set_userdata('loggedIn','true');
                // $this->session->set_userdata('userData',$userData);
                $this->session->set_userdata('sid', $result->student_id);
                $this->session->set_userdata('sname',$result->first_name);

                            redirect(base_url('student/dashboard'));
                 }
                 else
                 {
   $this->session->set_flashdata("feedback1","Your Email Is Not Verfied");
     $this->session->set_flashdata("feedback_c1","error");
redirect(base_url('student'));     
                 }
            }else
            {
    
$this->session->set_flashdata("feedback1","Invalid Email Or Password");
$this->session->set_flashdata("feedback_c1","error");
redirect(base_url('student'));
            }
            
     

    }
   
   public function account()
   {

    $sid = $this->session->userdata('sid');

    $con = ['student_id'=>$sid];
    $data['data'] = $this->clientmodel->get_selected_data('tbl_student',$con);

    $data['course'] = $this->clientmodel->student_purchase_course($sid);

    $this->load->view('client/profile/profile',$data);
   }


   public function changepassword()
   {
        $this->load->view('client/changepassword');
   }

   public function send_link()
   {
         $email = $this->security->xss_clean($this->input->post('email'));
          
            
            $con=['email'=>$email];
            $result = $this->clientmodel->Get_single_row('tbl_student',$con);

            if(!empty($result))
            {
                
             $con=['email'=>$email,'is_verified'=>0];
             $result1 = $this->clientmodel->Get_single_row('tbl_student',$con);

                 if(!empty($result1))
                 {

                        $token=md5(time().rand(0,99999999));
                        $post['token']=$token;
                        $post['email']=$email;
                        $this->send_mail_password($post);
                       $this->session->set_flashdata("feedback1","verification link send on your email ,please Active it"); 
 $this->session->set_flashdata("feedback_c1","success");
              $this->load->view('client/changepassword');

                 }
                 else
                 {
   $this->session->set_flashdata("feedback1","Your Email Is Not Verfied");
     $this->session->set_flashdata("feedback_c1","error");
redirect(base_url('student'));     
                 }
            }else
            {
    
$this->session->set_flashdata("feedback1","Invalid Email");
$this->session->set_flashdata("feedback_c1","error");
redirect(base_url('student'));
            }
            
   }
    public function send_mail_password($post) { 
        
         $this->load->library('email');
        //$to_email = array('samirrana1112@gmail.com', 'samirrana1011@gmail.com');
        $to_email=$post['email'];
                
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
        <title>Welcome to institute</title>
    </head>
    <body>

       <h1> Verify Link :</h1>
       <a href="'.base_url('login_c/updatepassword/').$post['token'].'">Clik Here</a>
        
    </body>
    </html>';


$this->email->to($to_email);
$this->email->from('samtech1011@gmail.com','institute');
$this->email->subject('Your Verification Link');
$this->email->message($htmlContent);
$this->load->helper('url');
//Send mail 
if($this->email->send())
{
      $date = date('Y-m-d H:i:s', time());

            $post['modified']= $date;

            $this->session->set_userdata('settoken',$post);
    //$this->branch->Update_data('tbl_student',$post);
}

  }


  public function updatepassword()
  {

        $post = $this->session->userdata('settoken');

         $token1=$this->uri->segment(3);

        
        if($post['token']==$token1)
        {

           $this->load->view('client/update_password');
             
        }
        else
        {
            if(isset($_SESSION['settoken']))
            {
                    $this->session->set_flashdata("feedback1","Your Email Is Not Verfied");
                     $this->session->set_flashdata("feedback_c1","error");
                     $this->session->unset_userdata('settoken');
                    $this->load->view('client/changepassword');
            }
            else
            {

                redirect('student/change-password');
            }
     
        }
    
    
    
  }
  public function changepassword_field()
  {

        $pass = $this->input->post('change_password');
         $post = $this->session->userdata('settoken');

         $this->session->unset_userdata('settoken');
         $con = ['email'=>$post['email']];
         $data = ['password'=>$pass];

          if($this->user->Update_data('tbl_student',$data,$con))
            {
               
    $this->session->set_flashdata("feedback1","Something wrong has been done,Please Try Again");
    $this->session->set_flashdata("feedback_c1","error");
            redirect('student/change-password');
      }
            else{
                   
                $this->session->set_flashdata("feedback1","Your Password is changed");
                $this->session->set_flashdata("feedback_c1","success");
redirect('student/change-password');
            }
             
        
  }


}




