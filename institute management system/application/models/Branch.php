<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Branch extends CI_Model{


	public function Get_data($tbl,$con){
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->result_array();
    }
    public function Get_data_event($tbl,$con){
       $this->db->select(array('event_id','event_name','event_color','event_start','event_end','event_image'));
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->result_array();
    }
    public function add($tbl,$data){
       $this->db->insert($tbl,$data);
    }
      public function get_test_detail($fid)
      {
            $data = $this->db->query("select test_id,test_name,c.course_name,s.subject_name,number_of_que from tbl_online_test o,tbl_course c ,tbl_faculty_branch_course tf,tbl_subject s where o.faculty_id= '$fid' and o.faculty_id=tf.faculty_id and  o.course_id = tf.course_id and  o.course_id = c.course_id and o.subject_id = tf.subject_id and o.subject_id = s.subject_id ");
            return $data->result_array();

      }
      public function get_event_des($tbl,$con){
       $this->db->select(array('event_des','event_image','event_start','event_end'));
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->result_array();
    }
     public function  Get_selected_data($tbl,$con){
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->result_array();
    }
    public function  Get_single_row($tbl,$con){
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->row();
    }
     public function  delete_data($tbl,$con){
        $this->db->where($con);
        $this->db->delete($tbl);
    }
    public function Update_data($tbl,$data,$con){
        $this->db->where($con);
        $this->db->update($tbl,$data);
    }


    public function fetch_all_data($tbl){

        $d = $this->db->get($tbl);
        return $d->result_array();
    }

    public function get_branch_head()
    {
    $data=$this->db->query('select master_admin_id,master_admin_name,master_admin_gender,role,branch_name,master_admin_state,master_admin_city,master_admin_address,master_admin_dob,master_admin_join_date,master_admin_contact,master_admin_email,master_admin_image from tbl_role tr,tbl_master_admin trm,tbl_branch tb where tr.role_id=trm.master_admin_role_id and tb.branch_id=trm.master_admin_branch and trm.is_deleted = 0');  
     return $data->result_array();  
    }

    function getCount($tbl){
    return $this->db->get($tbl)->num_rows();
    }

    function getcc($tbl,$con){
        $this->db->where($con);
    return $this->db->get($tbl)->num_rows();
    }
    public function fetch_subject()
    {
         $data = $this->db->query("select s.subject_id,s.subject_name,c.course_name from tbl_course c , tbl_subject s where s.course_id = c.course_id ");
            return $data->result_array();
    }
    public function fetchrole($r)
    {
        $this->db->select(array('role_id','role'));
        $this->db->where('role','faculty');
        $d = $this->db->get($r);
        return $d->result_array();
    }
     public function fetchbranch($id)
    {
        $d = $this->db->query("select tb.branch_id,branch_name from tbl_branch tb , tbl_master_admin tmb  where  tb.branch_id = tmb.master_admin_branch and tmb.master_admin_id = '$id' ");
        return $d->result_array();
    }

    public function get_faculty()
    {
        $this->db->select('master_admin_id');
        $this->db->order_by('master_admin_created_date','desc');
        $this->db->limit(1);
        $data = $this->db->get('tbl_master_admin');
        return $data->result_array();
    }
    public function get_branch_faculty($id,$rid)
    {
        $data=$this->db->query("select master_admin_id,master_admin_name,master_admin_gender,role,branch_name,master_admin_state,master_admin_city,master_admin_address,master_admin_dob,master_admin_join_date,master_admin_contact,master_admin_email,master_admin_image from tbl_role tr,tbl_master_admin trm,tbl_branch tb where tr.role_id=trm.master_admin_role_id and tb.branch_id=trm.master_admin_branch and trm.is_deleted = 0 and trm.master_admin_branch=$id and trm.master_admin_role_id=$rid");  
     return $data->result_array();  
    
    }

    public function get_course_detail($id)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,course_name,subject_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb where ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and ta.master_admin_branch = '$id'");

        return $data->result_array();
    }
    public function get_select_faculty_course($id)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,course_name,subject_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb where fb.faculty_id = '$id' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id");

        return $data->result_array();
    }    

    public function one_value($tbl,$con)
    {
        $this->db->select('course_id');
        $this->db->where($con);
        $thid->db->get($tbl);
    }
     public function add_multiple_record($tbl,$con)
    {
        $data = $thid->db->insert_batch($tbl,$con);
        return $data->result_array();
    }
    public function view_que($fid)
    {
        $data = $this->db->query("select que_id,course_name,subject_name,question,op1,op2,op3,op4,ans,que_mark,que_time from tbl_faculty_branch_course tf,tbl_course tc,tbl_subject ts,tbl_question_bank tq where tf.faculty_id = '$fid' and tf.course_id = tq.course_id and tf.subject_id = tq.chapter_id and tq.course_id = tc.course_id and tq.chapter_id = ts.subject_id and ts.course_id = tc.course_id");
        return $data->result_array();
    }

    public function view_test($cid)
    {
        $data = $this->db->query("select test_id,test_name,course_name,subject_name,number_of_que,tt.subject_id from tbl_course tc , tbl_subject ts , tbl_online_test tt where tt.course_id = '$cid' and tc.course_id = ts.course_id and tc.course_id = tt.course_id and ts.subject_id = tt.subject_id ");
        return $data->result_array();
    }

    function testval($cid)
    {
                $this->db->where('chapter_id',$cid);
                $this->db->order_by('rand()');
                $this->db->limit(1);
                $data=$this->db->get('tbl_question_bank');
                return $data->result_array();
    }
    function selectfield($tbl,$tid)
    {
                $this->db->select('number_of_que');
                $this->db->where('test_id',$tid);
                $data=$this->db->get($tbl);
                return $data->result_array();
    }
     function get_faculty_course($bid,$fid)
    {
        $data=$this->db->query("select a.course_id,course_name from tbl_course a,tbl_faculty_branch_course b where b.faculty_id=$fid and b.branch_id=$bid and a.course_id=b.course_id");
        return $data->result_array();

    }
    function get_faculty_subject($bid,$fid,$cid){
     $data=$this->db->query("select a.subject_id,subject_name from tbl_subject a,tbl_faculty_branch_course b where b.faculty_id=$fid and b.branch_id=$bid and b.course_id=$cid and a.subject_id=b.subject_id");
        return $data->result_array();

    }

    function questiontest($cid,$qid)
    {

        $this->db->where('chapter_id',$cid);
        $this->db->where('que_id <>',$qid);
        $this->db->order_by('rand()');
        $this->db->limit(1);
         $data=$this->db->get('tbl_question_bank');
        return $data->result_array();

    }
    function stu_rank($tid)
    {
        $data = $this->db->query("select course_name,test_name,first_name,last_name, tr.percentage from tbl_test_rank tr,tbl_student ts,tbl_online_test tt,tbl_course tc where tt.test_id = '$tid' and tr.test_id = tt.test_id and tr.student_id = ts.student_id and tt.course_id=tc.course_id order by percentage desc");
        return $data->result_array();
    }

    public function fetch_sort_data(){

        $d = $this->db->query("select first_name,last_name,right_ans from tbl_student ts , tbl_online_user tou where tou.user_id = ts.student_id order by right_ans desc");

        return $d->result_array();
    }

    public function get_syllabus_data($cid)
    {
          $data = $this->db->query("select syllabus_id,tsy.subject_id,subject_name,tsy.course_id,syllabus_content from tbl_subject ts , tbl_syllabus tsy where tsy.course_id = '$cid' and tsy.course_id = ts.course_id and tsy.subject_id = ts.subject_id");
          return $data->result_array();
    }
     public function fetch_syllabus_data($cid)
    {
          $data = $this->db->query("select syllabus_id,tsy.subject_id,subject_name,tsy.course_id,syllabus_content from tbl_subject ts , tbl_syllabus tsy where tsy.course_id = '$cid'and tsy.course_id = ts.course_id and tsy.subject_id = ts.subject_id");
          return $data->result_array();
    }

    public function download_syllabus_detail($cid)
    {
        $data = $this->db->query("select syllabus_id,tsy.subject_id,subject_name,course_name,tsy.course_id,syllabus_content from tbl_subject ts,tbl_course tc,tbl_syllabus tsy where tsy.course_id = '$cid'and tsy.course_id = ts.course_id and tsy.course_id = tc.course_id and tsy.subject_id = ts.subject_id and ts.course_id = tc.course_id ");
          return $data->result_array();
    }
     public function get_students_email($bid,$cid)
    {
       $data=$this->db->query("select email from tbl_student st,tbl_student_branch_course bc where bc.branch_id=$bid and bc.course_id=$cid and st.student_id=bc.student_id");
       return $data->result_array();
       
    }
    public function get_assignment()
    {
    $data=$this->db->query("select assignment_id,assignment_title as title,course_name as course,subject_name as subject,assignment_description as description,assignment_attachment as file,assignment_created_date as dateofc from tbl_assignment a,tbl_course b,tbl_subject c where a.course_id=b.course_id and a.subject_id=c.subject_id");
        return $data->result_array();

    }
   

    public function get_fbc_details($id)
    {
        $data = $this->db->query("select faculty_id , branch_name , course_name , subject_name from tbl_faculty_branch_course tfbc , tbl_course tc , tbl_subject ts , tbl_branch tb where tfbc.faculty_id = '$id' and tfbc.course_id = tc.course_id and tfbc.branch_id = tb.branch_id and tfbc.subject_id = ts.subject_id and ts.course_id = tc.course_id");
        return $data->result_array();


    }

    public function group_by_stud()
    {

        $data = $this->db->query("select branch_name , count(*) as students from tbl_student_branch_course ts, tbl_branch tb WHERE ts.branch_id = tb.branch_id  GROUP by tb.branch_id ORDER BY students DESC");
        return $data->result_array();

    }

    public function count_questions($tbl,$con)
    {
                $this->db->where($con);
        $data = $this->db->get($tbl);   
        return $data->num_rows();
    }

    public function getfaculty()
    {
         $data = $this->db->query("select branch_name ,(select count(*) as students from tbl_student_branch_course ts WHERE ts.branch_id = tb.branch_id ) students , (select count(*) as faculty from tbl_faculty_branch_course tf  WHERE tf.branch_id = tb.branch_id ) faculties from tbl_branch tb GROUP by tb.branch_id ");
        return $data->result_array();
    }

    public function popularcourse()
    {
        $data = $this->db->query("select course_name ,(select count(*) as students from tbl_student_branch_course ts WHERE ts.course_id = tc.course_id ) students from tbl_course tc group by tc.course_id");
        return $data->result_array();
    }

    public function yearwise_stu()
    {
        $data = $this->db->query("select year(timestamp) as year , count(*) as students from tbl_transaction tt where tt.status = 'success' group by year(timestamp)");
        return $data->result_array();   
    }

    public function admin_yearwise_stu($brid)
    {
        $data = $this->db->query("select year(purchase_date) as year , count(*) as students from tbl_student_branch_course tsb where tsb.branch_id='$brid' group by year(purchase_date)");
        return $data->result_array();   
    }

    public function branch_student($bid)
    {
        $data = $this->db->query("select DISTINCT ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_branch tb ,tbl_student_branch_course tsb ,tbl_course tc where tsb.branch_id = '$bid' and tsb.branch_id = tb.branch_id and tsb.student_id = ts.student_id and tc.course_id = tsb.course_id");
        return $data->result_array();
    }
    public function course_student($bid)
    {
        $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb,tbl_branch tb where tsb.course_id = '$bid' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tb.branch_id = tsb.branch_id");
        return $data->result_array();
    }
    public function branch_course_student($bid,$cid)
    {
         $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.course_id = '$cid' and tsb.branch_id = '$bid' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();

    }
    public function fetch_student_branch_wise($bid)
    {
        $data = $this->db->query("select distinct a.student_id,first_name,last_name,email,mobile,picture_url,status from  tbl_student a,tbl_student_branch_course b where a.student_id=b.student_id and b.branch_id=$bid");
        return $data->result_array();   
    }
     public function fetch_student_course_wise($bid)
    {
        $data = $this->db->query("select distinct a.student_id,first_name,last_name,email,mobile,picture_url,status from  tbl_student a,tbl_student_branch_course b where a.student_id=b.student_id and b.course_id=$bid");
        return $data->result_array();   
    }
    public function branch_heads()
    {
                $data = $this->db->query("select ta.* ,branch_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta where tr.role = 'admin' and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id ");
        return $data->result_array();
    }
    public function fdate_student($fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created ,purchase_date,branch_name,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb ,tbl_branch tb where substr(tsb.purchase_date,1,10) > '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tsb.branch_id = tb.branch_id");
        return $data->result_array();
    }
    public function tdate_student($fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created ,purchase_date,branch_name,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb ,tbl_branch tb where substr(tsb.purchase_date,1,10) < '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tsb.branch_id = tb.branch_id");
        return $data->result_array();
    }
    public function fdate_branch_course_student($bid,$cid,$fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.course_id = '$cid' and tsb.branch_id = '$bid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();

    }
    public function branch_fdate_student($bid,$fd)
    {
         $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.branch_id = '$bid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();

    }
    public function branch_tdate_student($bid,$fd)
    {
         $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.branch_id = '$bid' and substr(tsb.purchase_date,1,10) < '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();

    }
    public function course_fdate_student($bid,$fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb,tbl_branch tb where tsb.course_id = '$bid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tb.branch_id = tsb.branch_id");
        return $data->result_array();   
    }
    public function course_tdate_student($bid,$fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb,tbl_branch tb where tsb.course_id = '$bid' and substr(tsb.purchase_date,1,10) < '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tb.branch_id = tsb.branch_id");
        return $data->result_array();   
    }
    public function fdate_tdate_branch_course_student($bid,$cid,$fd,$td)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.course_id = '$cid' and tsb.branch_id = '$bid' and substr(tsb.purchase_date,1,10) > '$fd' and substr(tsb.purchase_date,1,10) < '$td' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();        
    }
    public function tdate_branch_course_student($bid,$cid,$fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.course_id = '$cid' and tsb.branch_id = '$bid' and substr(tsb.purchase_date,1,10) < '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();

    }
    public function fdate_branch_tdate_student($bid,$cid,$fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where  tsb.branch_id = '$bid' and substr(tsb.purchase_date,1,10) < '$cid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();        
    }
    public function fdate_course_tdate_student($bid,$cid,$fd)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where  tsb.course_id = '$bid' and substr(tsb.purchase_date,1,10) < '$cid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();        
    }
    public function fdate_tdate_student($fd,$td)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where substr(tsb.purchase_date,1,10) > '$fd' and substr(tsb.purchase_date,1,10) < '$td' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
             return $data->result_array();        
    }

    public function branch_faculties($bid)
    {
              $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.branch_id = '$bid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();
    }
    public function course_faculties($bid)
    {
              $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.course_id = '$bid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();
    }
    public function admin_course_faculties($bid,$brid)
    {
              $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.course_id = '$bid' and tf.branch_id = '$brid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();
    }
    public function branch_course_subject_faculties($bid,$cid,$sid)
    {
        $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.course_id = '$cid' and tf.branch_id = '$bid' and tf.subject_id = '$sid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();   
    }
    public function branch_course_faculties($bid,$cid)
    {
        $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.course_id = '$cid' and tf.branch_id = '$bid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();   
    }
    public function course_subject_faculties($cid,$sid)
    {
        $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.course_id = '$cid' and tf.subject_id = '$sid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();   
    }
    public function admin_course_subject_faculties($cid,$sid,$brid)
    {
        $data = $this->db->query("select ta.* ,branch_name,course_name,subject_name from tbl_branch tb,tbl_role tr,tbl_master_admin ta , tbl_faculty_branch_course tf , tbl_course tc, tbl_subject ts where tr.role = 'faculty' and tf.course_id = '$cid' and tf.branch_id = '$brid' and tf.subject_id = '$sid' and tf.branch_id = ta.master_admin_branch and tf.course_id = tc.course_id and tf.subject_id = ts.subject_id and tc.course_id = ts.course_id and tr.role_id = ta.master_admin_role_id and ta.master_admin_branch = tb.branch_id and tf.faculty_id = ta.master_admin_id");
        return $data->result_array();   
    }
    public function upcoming_event()
    {
              $data = $this->db->query("select * from tbl_event where substr(event_start,1,10) > CURDATE()");
        return $data->result_array();   
    }
    public function ce_event()
    {
              $data = $this->db->query("select * from tbl_event where substr(event_start,1,10) < CURDATE()");
        return $data->result_array();   
    }
    public function admin_fdate_course_tdate_student($bid,$cid,$fd,$brid)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.branch_id = '$brid' and tsb.course_id = '$bid' and substr(tsb.purchase_date,1,10) < '$cid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
        return $data->result_array();        
    }
    public function admin_course_fdate_student($bid,$fd,$brid)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb,tbl_branch tb where tsb.branch_id = '$brid' and tsb.course_id = '$bid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tb.branch_id = tsb.branch_id");
        return $data->result_array();   
    }
    public function admin_course_tdate_student($bid,$fd,$brid)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb,tbl_branch tb where tsb.branch_id = '$brid' and tsb.course_id = '$bid' and substr(tsb.purchase_date,1,10) < '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tb.branch_id = tsb.branch_id");
        return $data->result_array();   
    }
    public function admin_fdate_tdate_student($fd,$td,$brid)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb , tbl_branch tb where tsb.branch_id = '$brid' and substr(tsb.purchase_date,1,10) > '$fd' and substr(tsb.purchase_date,1,10) < '$td' and tsb.branch_id = tb.branch_id and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id");
             return $data->result_array();        
    }
    public function admin_fdate_student($fd,$brid)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created ,purchase_date,branch_name,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb ,tbl_branch tb where tsb.branch_id = '$brid' and substr(tsb.purchase_date,1,10) > '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tsb.branch_id = tb.branch_id");
        return $data->result_array();
    }
    public function admin_tdate_student($fd,$brid)
    {
            $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created ,purchase_date,branch_name,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb ,tbl_branch tb where tsb.branch_id = '$brid' and substr(tsb.purchase_date,1,10) < '$fd' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tsb.branch_id = tb.branch_id");
        return $data->result_array();
    }
    public function admin_course_student($bid,$brid)
    {
        $data = $this->db->query("select ts.student_id,first_name,last_name,email,mobile,created,branch_name,purchase_date,course_name from tbl_student ts,tbl_course tc ,tbl_student_branch_course tsb,tbl_branch tb where tsb.branch_id = '$brid' and tsb.course_id = '$bid' and tsb.course_id = tc.course_id and tsb.student_id = ts.student_id and tb.branch_id = tsb.branch_id");
        return $data->result_array();
    }
    public function faculty_course($fid)
    {
        $data=$this->db->query("select a.course_id,course_name from tbl_course a,tbl_faculty_branch_course b where b.faculty_id=$fid and a.course_id=b.course_id");
        return $data->result_array();

    }
    public function test_details($fid)
    {
        $data=$this->db->query("select test_name, number_of_que, course_name , subject_name from tbl_online_test tot , tbl_course tc,tbl_subject ts where tot.faculty_id = $fid and tot.course_id = tc.course_id and tot.subject_id = ts.subject_id and ts.course_id = tc.course_id");
        return $data->result_array();

    }
    public function assign_details($fid)
    {
        $data=$this->db->query("select tot.*, course_name , subject_name from tbl_assignment tot , tbl_course tc , tbl_subject ts where tot.faculty_id = $fid and tot.course_id = tc.course_id and tot.subject_id = ts.subject_id and ts.course_id = tc.course_id");
        return $data->result_array();

    }
    public function tot_questions($fid)
    {
            $data=$this->db->query("select subject_name , count(*) as question from tbl_faculty_branch_course tot ,tbl_question_bank tq , tbl_subject ts where tot.faculty_id = $fid and tot.course_id = tq.course_id and tot.subject_id = tq.chapter_id and tq.chapter_id = ts.subject_id group by chapter_id");
        return $data->result_array();
    }
}
?>