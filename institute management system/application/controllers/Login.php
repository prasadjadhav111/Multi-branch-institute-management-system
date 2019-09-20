<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
      $this->load->model('login_model');
    }
     
    public function index()
    {
        $this->isLoggedIn();
    }

     public function change_password()
    {
        $this->load->view('change_password');
    }
    public function verification()
    {
        $this->load->view('otp');
    }
    
    public function check_email()
    {
        $email=$this->input->post('email');
        $this->load->model('login_model');
        $con=['master_admin_email'=>$email];
        $res=$this->login_model->Get_single_row('tbl_master_admin',$con);

        if($res)
        {
            $this->send_mail($email);
        }
        else
        {
        $this->session->set_flashdata("feedback","Email Is Not Registerd");
        $this->session->set_flashdata("feedback_c","alert-danger");
       
        }

        // if(!$this->branch->add("tbl_role",$post))
        //     {
        //         $this->session->set_flashdata("feedback","Role Added Sucessfully");
        //         $this->session->set_flashdata("feedback_c","alert-success");
        //     }
        //     else
        //     {
        // $this->session->set_flashdata("feedback","Role Failed To add,Please Try Again Later");
        // $this->session->set_flashdata("feedback_c","alert-danger");
        //     }

            redirect(base_url('login/change_password'));

    }
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
             $usr=$this->session->userdata ( 'roletext' ).'/dashboard';
            redirect(base_url($usr));
        }
    }

 public function loginMe(){

 $email = $this->security->xss_clean($this->input->post('email'));
            $password = md5($this->input->post('password'));
            
            $result = $this->login_model->loginMe($email, $password);
            
            if(!empty($result))
            {
             
            
                 
                 $sessionArray = array('userid'=>$result->master_admin_id, 
                                        'role'=>$result->master_admin_role_id, 
                                        'roletext'=>$result->role,
                                        'branch_id'=>$result->master_admin_branch,
                                        'username'=>$result->master_admin_name,  
                                        'img'=>$result->master_admin_image,
                                       'lastLogin'=>$result->master_admin_created_date,                 
                                        'isLoggedIn' => TRUE
                                );
                 $this->session->set_userdata($sessionArray); 
             
                 unset($sessionArray['userid'],$sessionArray['img'],$sessionArray['branch_id'],$sessionArray['isLoggedIn'],$sessionArray['lastLogin']);

                $loginInfo = array("userId"=>$result->master_admin_id, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());
            $this->login_model->lastLogin($loginInfo);
   
                $role1=$result->role;

                 if($role1=="super_admin")
                 {
                    // print_r($result);exit;
                    // echo $role1."samir";exit;
                       redirect(base_url('super_admin/dashboard'));
                 }
                else if($role1=="admin")
                {
                 // echo $role1."samir123";exit;
                     redirect(base_url('admin/dashboard'));   
                }     
                else if($role1=="faculty")
                {
                    redirect(base_url('faculty/dashboard'));
                }   
            }
            else
            {
                $this->session->set_flashdata("feedback","Email or password mismatch");
                $this->session->set_flashdata("feedback_c","alert-danger");
    
                  // redirect(base_url('login/change_password'));
                redirect(base_url('login'));
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url('login'));
        }





         public function send_mail($email) { 
        
                $this->load->library('email');
                //$to_email = array('samirrana1112@gmail.com', 'samirrana1011@gmail.com');
                $to_email=$email;
        
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
 $token=md5(time().rand(0,99999999));
 $otp=substr($token,5,9);
$htmlContent = '
    <html>
    <head>
        <title>Password Recovery</title>
    </head>
    <body>

       
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
            <tr>
            <th>Email:</th><td>'.$email.'</td>
            </tr>
            <tr>
            <th>OTP:</th> <td>'.$otp.'</td>
               
            </tr>
           
        </table>
         <h1>Thanks  for joining with us!</h1>

    </body>
    </html>';


$this->email->to($to_email);
$this->email->from('onlineacademy.in@gmail.com','Academy');
$this->email->subject('Your OTP');
$this->email->message($htmlContent);
$this->load->helper('url');
//$this->email->attach('files/sam.pdf');
//Send mail 
if($this->email->send())
{
 $this->session->set_userdata('otp',$otp); 
 $this->session->set_userdata('email',$email); 
             
   

                $this->session->set_flashdata("feedback","Check Your Email For OTP");
                $this->session->set_flashdata("feedback_c","alert-success");
    
    redirect(base_url('login/verification'));
}

  }

    function verify()
    {
        // 
        if ($this->session->userdata('otp')!=NULL) {

            $motp=$this->input->post('otp');
        $otp=$this->session->userdata('otp');
        if($motp==$otp)
        {
             $this->session->set_userdata('otp_verify',"yes");
             $this->load->view('reset'); 

        }
        else
        {
        $this->session->set_flashdata("feedback","OTP Verification Failed");
        $this->session->set_flashdata("feedback_c","alert-danger");
        redirect(base_url('login/change_password'));
        }
        }
        else
        {
         redirect(base_url('login/change_password'));  
        }
    }

    function reset()
    {
        $pwd=$this->input->post('password');
        $email=$this->session->userdata('email');
        $con=['master_admin_email'=>$email];
        $data=['master_admin_password'=>md5($pwd)];
        $this->load->model('login_model');
       
        $this->login_model->Update_data('tbl_master_admin',$data,$con);



                $this->session->set_flashdata("feedback","Password Change Sucessfully");
                $this->session->set_flashdata("feedback_c","alert-success");
    
    redirect(base_url('login/change_password'));
    }
}
