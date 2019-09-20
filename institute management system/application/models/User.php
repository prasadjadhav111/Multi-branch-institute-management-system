<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
        $this->tableName = 'tbl_student';
        $this->primaryKey = 'student_id';
    }
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $query = $this->db->get();
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
             date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s', time());
            $data['modified'] =$date;
            
            $update = $this->db->update($this->tableName,$data,array('student_id'=>$result['student_id']));
            $userID = $result['student_id'];
        }else{

            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s', time());

            $data['created'] = $date;

            $data['modified']= $date;
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:false;
    }

        public function Update_data($tbl,$data,$con){
        $this->db->where($con);
        $this->db->update($tbl,$data);
    }


}