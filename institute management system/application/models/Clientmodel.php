<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clientmodel extends CI_Model{


	public function Get_data($tbl){
        $data=$this->db->get($tbl);
        return $data->result_array();
    }
    public function get_selected_data($tbl,$con)
    {
          $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->result_array();
    }
     public function  Get_single_row($tbl,$con){
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->row();
    }
    public function get_syllabus_details()
    {
         $data = $this->db->query("select subject_name,syllabus_content from tbl_subject a,tbl_syllabus b where a.subject_id=b.subject_id");
            return $data->result_array();

    }
    public function get_syllabus_course_details($id)
    {
         $data = $this->db->query("select subject_name,syllabus_content from tbl_subject a,tbl_syllabus b where b.course_id='$id' and a.subject_id=b.subject_id");
            return $data->result_array();

    }
    public function add($tbl,$data){
       $this->db->insert($tbl,$data);
    }

    public function group_by_function()
    {
        $data = $this->db->query("select count(*) as students , ts.course_id,course_name,course_display_pic,course_duration,course_duration_type,course_fee from tbl_student_branch_course ts, tbl_course tc WHERE ts.course_id = tc.course_id  GROUP by ts.course_id ORDER BY students DESC");
        return $data->result_array();
    }
   public function get_order_by($tbl,$order,$field)
   {
        $this->db->order_by($field,$order);
        $data = $this->db->get($tbl); 
        return $data->result();
   }
    public function get_course_detail()
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,master_admin_id,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date");

        return $data->result_array();
    }
     public function get_faculty_detail($unm)
    {
        $data = $this->db->query("select DISTINCT faculty_id,master_admin_name,master_admin_join_date,master_admin_id,master_admin_email,master_admin_contact,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ta.master_admin_email = '$unm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date");

        return $data->result_array();
    }
     public function get_faculty_detail_ajax($unm)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_join_date,master_admin_id,master_admin_email,master_admin_contact,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ta.master_admin_id = '$unm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date");

        return $data->result_array();
    }
    public function get_users_detail($limit,$offset)
    {
        $data = $this->db->query("select faculty_id,master_admin_id,master_admin_name,master_admin_join_date,master_admin_email,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date LIMIT $limit OFFSET $offset ");

        return $data->result_array();
    }

    public function get_admin_detail()
    {
        $data = $this->db->query("select master_admin_id,master_admin_name,master_admin_join_date,master_admin_image,master_admin_contact,master_admin_email,master_admin_created_date,role,branch_name from tbl_branch tb,tbl_master_admin ta , tbl_role tr where  tr.role = 'admin' and ta.is_deleted = 0 and  ta.master_admin_role_id = tr.role_id  and ta.master_admin_branch = tb.branch_id");

        return $data->result_array();   
    }
    public function get_selected_admin_detail($unm)
    {
        $data = $this->db->query("select master_admin_name,master_admin_join_date,master_admin_image,master_admin_id,master_admin_contact,master_admin_email,master_admin_created_date,role,branch_name from tbl_branch tb,tbl_master_admin ta , tbl_role tr where ta.master_admin_id = '$unm' and tr.role = 'admin' and ta.master_admin_role_id = tr.role_id  and ta.master_admin_branch = tb.branch_id");

        return $data->result_array();   
    }

    public function taken_subject($fid)
    {
        $data = $this->db->query("select faculty_id,tf.subject_id,subject_name from tbl_subject ts,tbl_faculty_branch_course tf where tf.faculty_id = '$fid' and tf.subject_id = ts.subject_id");
        return $data->result_array();   

    }

    public function branch_faculty_detail($brnm)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_id,master_admin_email,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name, master_admin_join_date from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where tb.branch_name='$brnm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date ");
        return $data->num_rows();
    }

    public function course_faculty_detail($crnm)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_id,master_admin_join_date,master_admin_email,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where tc.course_name='$crnm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date");
        return $data->num_rows();
    }

     public function subject_faculty_detail($srnm)
    {
        $data = $this->db->query("select faculty_id,master_admin_join_date,master_admin_name,master_admin_id,master_admin_email,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ts.subject_name='$srnm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date");
        return $data->num_rows();
    }
    
    public function total_rows($tbl)
    {
                    $data=$this->db->get($tbl);
                    return $data->num_rows();
    }
    public function total_rows_user()
    {
                    $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date");
                    return $data->num_rows();
    }

    public function get_limit_data($tbl,$limit,$offset)
    {
                    $this->db->limit($limit,$offset);
                    $data=$this->db->get($tbl);
                    return $data->result_array();
    }
    public function student_branch($sid)
    {
        $data = $this->db->query("select course_name,student_id from tbl_student_branch_course tbc,tbl_course tc where tbc.student_id = '$sid' and tbc.course_id = tc.course_id");
        return $data->result_array();
    }
    public function subject_pagination($srnm,$start,$per_page)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,master_admin_id,master_admin_join_date,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where ts.subject_name='$srnm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date LIMIT $start,$per_page");
        return $data->result_array();

    }

    public function course_pagination($crnm,$start,$per_page)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,master_admin_id,master_admin_join_date,course_name,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where tc.course_name='$crnm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date LIMIT $start,$per_page");
        return $data->result_array();
    }
    public function branch_pagination($brnm,$start,$per_page)
    {
        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,master_admin_id,course_name,master_admin_created_date,subject_name,master_admin_image,master_admin_join_date,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where tb.branch_name='$brnm' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date LIMIT $start,$per_page");
        return $data->result_array();
    }
    public function search_instructor($s)
    {

        $data = $this->db->query("select faculty_id,master_admin_name,master_admin_email,course_name,master_admin_id,master_admin_created_date,subject_name,master_admin_image,branch_name from tbl_master_admin ta,tbl_course tc,tbl_subject ts,tbl_faculty_branch_course fb,tbl_branch tb where tb.branch_name like '$s%' and ta.master_admin_id = fb.faculty_id and tc.course_id = fb.course_id and ts.subject_id = fb.subject_id and tb.branch_id = fb.branch_id order by master_admin_created_date ");
        return $data->result_array();
    }
    public function search_course_ajax($tbl,$s)
    {
            $this->db->like('course_name',$s);
                    $data=$this->db->get($tbl);
                    return $data->result_array();
    }
    public function student_purchase_course($sid)
    {
        $data = $this->db->query("select course_name,student_id,course_duration,course_duration_type,purchase_date,course_fee from tbl_student_branch_course tbc,tbl_course tc where tbc.student_id = '$sid' and tbc.course_id = tc.course_id");
        return $data->result_array();
    }

    public function popular_course()
    {
        $data = $this->db->query("select count(*) as students , course_name from tbl_student_branch_course ts, tbl_course tc WHERE ts.course_id = tc.course_id  GROUP by ts.course_id ORDER BY students DESC LIMIT 1");
        return $data->result_array();
    
    }

    
    function getcc($tbl,$con){
        $this->db->where($con);
    return $this->db->get($tbl)->num_rows();
    }
    
 }