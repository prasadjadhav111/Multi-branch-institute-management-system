<?php

/**
* 
*/
class Student extends CI_Controller
{
	
	 public function __construct()
    {
        parent::__construct();
      $this->load->model('branch');
    }

    public function test_course()
    {

        $this->session->unset_userdata('result');
        $cnm = $this->uri->segment(2);

        $con = ['course_name'=>$cnm];
        $cid = $this->branch->Get_data('tbl_course',$con);
        $data['data'] = $this->branch->view_test($cid[0]['course_id']);
       
        $this->load->view("client/weektest",$data);
    }

    function exampaper()
    {

                    //take a subject name ffrom segment
                    $sname = $this->uri->segment(3);

                    $con1 = ['subject_name' => $sname];
                    $y = $this->branch->Get_data('tbl_subject',$con1);

                    //take subject id 
                    $chapid = $y[0]['subject_id'];

            //take array of user question which student have faced        
         $fetch = $this->session->userdata('user_que');

         //new random question  will fetch
         $data['val'] = $this->branch->testval($chapid);


         //heck question repeat or not
           foreach ($fetch as $v) {
             
          if($v['que_id'] == $data['val'][0]['que_id'])
          {
                $data['val'] = $this->branch->questiontest($chapid,$v['que_id']);            
                break;
         }
         
        
         }

         //check qusetion mark
         if($data['val'][0]['que_mark']==1)
                {
                    if($_SESSION['m1'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m1'] = $_SESSION['m1'] - 1;    
                    }
                    
                }
                else if($data['val'][0]['que_mark']==2)
                {
                    if($_SESSION['m2'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m2'] = $_SESSION['m2'] - 1;    
                    }
                    
                }
                else if($data['val'][0]['que_mark']==3)
                {

                    if($_SESSION['m3'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m3'] = $_SESSION['m3'] - 1;    
                    }
                    
                }
                else if($data['val'][0]['que_mark']==4)
                {
                    if($_SESSION['m4'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                       $_SESSION['m4'] = $_SESSION['m4'] - 1;
                    }
                }
                else
                {
                    if($_SESSION['m5'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m5'] = $_SESSION['m5'] - 1;
                    }   
                }
          

       
                $this->session->set_userdata('que',$data);
          
            if(isset($_SESSION['user_que']))
            {

            foreach ($data['val'] as $key => $value) {
                $_SESSION['user_que'][] = $value;

            }
            }
            else{
                $this->session->set_userdata('user_que',$data);

            }

                $tid = $this->session->userdata('test');
                    $d = $this->branch->selectfield('tbl_online_test',$tid);
                    $total= $d[0]['number_of_que'];

                    $this->session->set_userdata('no_que',$total);
          
                $_SESSION['num']++;
                $data['num'] = $this->session->userdata('num');
                $data['total_que'] = $this->session->userdata('no_que');

            $this->load->view("client/questionpaper",$data);

    }

    public function questionpaper()
    {
           $r = $w = $n = 0;

        if(isset( $_SESSION['count']) &&  $_SESSION['count'] != $_SESSION['no_que'])
        {
       
        $data=$this->session->userdata('que');
        
        $this->session->unset_userdata('que');
        
        foreach ($data['val'] as $key => $value) {

            if(isset($_SESSION['user_ans']))
            {
                $_SESSION['user_ans'] .=  $_POST[$value['que_id']];
            }
            else
            {
                $this->session->set_userdata('user_ans', $_POST[$value['que_id']]);
            }
            
            if($value['ans'] == $_POST[$value['que_id']])
            {

                if(isset($_SESSION['obtain_marks']))
                {
                        $_SESSION['obtain_marks'] = $_SESSION['obtain_marks'] +  $value['que_mark'];
                }
                else
                {
                    $this->session->set_userdata('obtain_marks', $value['que_mark']);    
                }
                
                $r = 1;

            }
            elseif ($_POST[$value['que_id']] == 5) {
                    $n =  1;
            }
            else
            {
                $w =  1;
            }            
        }

        if(isset($_SESSION['right']))
        {
            $_SESSION['right'] = $_SESSION['right'] + $r;
          
        }
        else
        {
        $this->session->set_userdata('right',$r);
        
        }


            $stuid=$this->session->userdata('sid');
            $con = array('user_id'=>$stuid,'test_id'=>$_SESSION['test']);
            $on_stu = array('right_ans'=>$_SESSION['right']);
            $this->branch->Update_data('tbl_online_user',$on_stu,$con);


        if(isset($_SESSION['not_attempt']))
        {
            $_SESSION['not_attempt'] = $_SESSION['not_attempt'] + $n;
        
        }
        else
        {
        $this->session->set_userdata('not_attempt',$n);
        }

        if(isset($_SESSION['wrong']))
        {
            $_SESSION['wrong'] = $_SESSION['wrong'] + $w;
        
        }
        else
        {
        $this->session->set_userdata('wrong',$w);
        }

        $_SESSION['count']++;

        if($_SESSION['count']==$_SESSION['no_que'])
        {
            $d['right'] = $_SESSION['right'];
            $d['not_attempt'] = $_SESSION['not_attempt'];
            $d['wrong'] = $_SESSION['wrong'];
    

            
             $dd = $_SESSION['user_ans'];

             $uans = array_map('intval', str_split($dd));
             $d['uans'] = $uans;

            $this->session->unset_userdata('user_ans');

            if(isset($_SESSION['obtain_marks']))
            {
                $d['ob'] = $_SESSION['obtain_marks'];

           }
            else
            {
                
                 $d['ob'] = '0';
    
            }
            
            $d['userque'] = $_SESSION['user_que'];
           
           $t =0;
            foreach ($d['userque'] as $value) {
                $t = $t + $value['que_mark'];
            }

            $d['total_marks'] = $t;
            
            $tid = $this->session->userdata('test');
            $con = ['test_id'=>$tid];
            $tn = $this->branch->Get_data('tbl_online_test',$con);

            $d['test_name'] = $tn[0]['test_name'];
            
            $per = ($d['ob']/$d['total_marks'])*100;

            $rank = array('student_id'=>$stuid,'test_id'=>$tid,'percentage'=>$per);

            $this->branch->add('tbl_test_rank',$rank);

            $this->branch->delete_data('tbl_online_user',array('user_id'=>$stuid));

            $this->session->unset_userdata('user_que');
            $this->session->unset_userdata('chapnm');
            $this->session->unset_userdata('test');
            $this->session->unset_userdata('m1');
            $this->session->unset_userdata('m2');
            $this->session->unset_userdata('m3');
            $this->session->unset_userdata('m4');
            $this->session->unset_userdata('m5');
            $this->session->unset_userdata('no_que');
            $this->session->unset_userdata('chap');
            $this->session->unset_userdata('que');
            $this->session->unset_userdata('count');
           $this->session->unset_userdata('num');
           $this->session->unset_userdata('user_ans');
           $this->session->unset_userdata('right');
           $this->session->unset_userdata('not_attempt');
           $this->session->unset_userdata('wrong');
           $this->session->unset_userdata('obtain_marks');


           $con = ['student_id'=>$this->session->userdata('sid')];
           $d['snm'] = $this->branch->Get_data('tbl_student',$con); 
           $d['tnm'] = $this->session->userdata('testname');

            $this->session->set_userdata('result',$d);
            $d = $this->session->userdata('result');

            $this->session->unset_userdata('testname');
             $this->load->view("client/result",$d);

        }
        else
        {
         $d=$this->session->userdata('chapnm');
         
        redirect(base_url()."online-test/question-paper/$d");
        }       
     
     }
     //first comes in else part 
         else
         {


            if(isset($_SESSION['count']) && isset($_SESSION['no_que']) && $_SESSION['count']==$_SESSION['no_que'])
            {
                echo $_SESSION['count'];
         echo $_SESSION['no_que']; exit; 
                
            }
            //first comes in this part
            else
            {

                if(isset($_SESSION['result']))
                {
                    $d = $this->session->userdata('result');
                    $this->load->view("client/result",$d);
                }
                else
                {

                $c =0;
                $n =1;

                //take a value from url
                    $sname = $this->uri->segment(3);
                    $tname = $this->uri->segment(4);

                                        $this->session->set_userdata('testname',$tname);


                 //set session of chapter name   
                    $this->session->set_userdata('chapnm',$sname);


                    $con1 = ['subject_name' => $sname];
                    $y = $this->branch->Get_data('tbl_subject',$con1);

                    //take subject id through subjet name 
                    $chapid = $y[0]['subject_id'];


                    $con2 = ['test_name' => $tname];
                    $y1 = $this->branch->Get_data('tbl_online_test',$con2);

                    //take test id through test name
                    $tid = $y1[0]['test_id'];
                
                    //set session of test id
                    $this->session->set_userdata('test',$tid);

                    //take a total number of questions in test through test id
                    $d = $this->branch->selectfield('tbl_online_test',$tid);
                    $total= $d[0]['number_of_que'];

                    if($total == 5)
                    {
                        $this->session->set_userdata('m1',1);
                        $this->session->set_userdata('m2',1);
                        $this->session->set_userdata('m3',1);
                        $this->session->set_userdata('m4',1);
                        $this->session->set_userdata('m5',1);
                    }
                    else if($total == 25)
                    {
                        $this->session->set_userdata('m1',5);
                        $this->session->set_userdata('m2',5);
                        $this->session->set_userdata('m3',5);
                        $this->session->set_userdata('m4',5);
                        $this->session->set_userdata('m5',5);   
                    }
                    else if($total == 50)
                    {
                        $this->session->set_userdata('m1',10);
                        $this->session->set_userdata('m2',10);
                        $this->session->set_userdata('m3',10);
                        $this->session->set_userdata('m4',10);
                        $this->session->set_userdata('m5',10);   
                    }
                    else if($total == 75)
                    {
                        $this->session->set_userdata('m1',15);
                        $this->session->set_userdata('m2',15);
                        $this->session->set_userdata('m3',15);
                        $this->session->set_userdata('m4',15);
                        $this->session->set_userdata('m5',15);   
                    }
                    else
                    {
                        $this->session->set_userdata('m1',20);
                        $this->session->set_userdata('m2',20);
                        $this->session->set_userdata('m3',20);
                        $this->session->set_userdata('m4',20);
                        $this->session->set_userdata('m5',20);
                    }


                    //set total questions in session
                    $this->session->set_userdata('no_que',$total);

                  //set chapter id in session 
                 $this->session->set_userdata('chap',$chapid);


                 //take random question
                $data['val'] = $this->branch->testval($chapid);
                // print("<pre>");
                // print_r($data);exit;
               // print_r($data);exit;

                if($data['val'][0]['que_mark']==1)
                {
                    if($_SESSION['m1'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m1'] = $_SESSION['m1'] - 1;    
                    }
                    
                }
                else if($data['val'][0]['que_mark']==2)
                {
                    if($_SESSION['m2'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m2'] = $_SESSION['m2'] - 1;    
                    }
                    
                }
                else if($data['val'][0]['que_mark']==3)
                {

                    if($_SESSION['m3'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m3'] = $_SESSION['m3'] - 1;    
                    }
                    
                }
                else if($data['val'][0]['que_mark']==4)
                {
                    if($_SESSION['m4'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                       $_SESSION['m4'] = $_SESSION['m4'] - 1;
                    }
                }
                else
                {
                    if($_SESSION['m5'] == 0)
                    {
                        $d=$this->session->userdata('chapnm');
                        redirect(base_url()."student/exampaper/$d");
                    }
                    else
                    {
                        $_SESSION['m5'] = $_SESSION['m5'] - 1;
                    }   
                }

                //store that question in session
            $this->session->set_userdata('que',$data);
 
            //store that question for user manage
            $this->session->set_userdata('user_que',$data['val']);

            //take student id from sid session
            $si=$this->session->userdata('sid');

        //online student giving test manage   
            $on_stu = array('user_id'=>$si,'right_ans'=>0,'test_id'=>$_SESSION['test']);
            $this->branch->add('tbl_online_user',$on_stu);

            //set session for count and nnum
            $this->session->set_userdata('count',$c);

            //for number of question
            $this->session->set_userdata('num',$n);  

            $data['num'] = $this->session->userdata('num');
            $data['total_que'] = $this->session->userdata('no_que');
             $this->load->view("client/questionpaper",$data);
        }
        }
    }
  }

  public function online_check()
  {


        $data = $this->branch->fetch_sort_data();
        
        echo json_encode($data);
  }

    public function testrank()
    {

         $tname = $this->uri->segment(3);
   
         $con2 = ['test_name' => $tname];
          $y1 = $this->branch->Get_data('tbl_online_test',$con2);

          $testid = $y1[0]['test_id'];

        
        $data['val'] = $this->branch->stu_rank($testid);


        $this->load->view('client/ranking',$data);

    }

}
?>