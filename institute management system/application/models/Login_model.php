<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

  function loginMe($email, $password)
    {
       
       $user=$this->db->query("select master_admin_id,master_admin_name,master_admin_role_id,role, master_admin_branch,master_admin_created_date,master_admin_image from tbl_master_admin a,tbl_role b where a.master_admin_role_id=b.role_id and master_admin_email='$email' and master_admin_password='$password' ");
        return $user->row();
      
    }

    function lastLogin($loginInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_last_login', $loginInfo);
        $this->db->trans_complete();
    }

     public function  Get_single_row($tbl,$con){
        $this->db->where($con);
        $data=$this->db->get($tbl);
        return $data->row();
    }

      public function Update_data($tbl,$data,$con){
        $this->db->where($con);
        $this->db->update($tbl,$data);
    }

}



?>