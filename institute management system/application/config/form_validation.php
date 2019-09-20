<?php

$config = [

		'add_branch'		=>	[
														[
															'field'	=>	'branch_name',
															'label'	=>	'Branch Name',
															'rules'	=>	'required|trim'
														],
														// [
														// 	'field'	=>	'branch_state',
														// 	'label'	=>	'Branch State',
														// 	'rules'	=>	'required'
														//  ],

														// [
														// 	'field'	=>	'branch_city',
														// 	'label'	=>	'Branch City',
														// 	'rules'	=>	'required'
														// ],
														
														[
															'field'	=>	'branch_address',
															'label'	=>	'Branch Address',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'branch_pincode',
															'label'	=>	'Branch Pincode',
															'rules'	=>	'required|numeric'
														],
														[
															'field'	=>	'branch_establish_date',
															'label'	=>	'Branch Established Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'branch_contact',
															'label'	=>	'Branch Contact',
															'rules'	=>	'required|numeric'
														],
														[
															'field'	=>	'branch_email',
															'label'	=>	'Branch Email',
															'rules'	=>	'required|valid_email'
														],
														


								],

		'add_branch_head'		=>	[
														[
															'field'	=>	'master_admin_name',
															'label'	=>	'Branch Head Name',
															'rules'	=>	'required|trim'
														],
														[
														
															'field'	=>	'master_admin_gender',
															'label'	=>	'Branch Head Gender',
															'rules'	=>	'required'
														 ],
														
														[
															'field'	=>	'master_admin_address',
															'label'	=>	'Branch Head Address',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_dob',
															'label'	=>	'Branch Head Birth Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_join_date',
															'label'	=>	'Branch Head join Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_contact',
															'label'	=>	'Branch Head Contact',
															'rules'	=>	'required|numeric'
														],
														[
															'field'	=>	'master_admin_email',
															'label'	=>	'Branch Head Email',
															'rules'	=>	'required|valid_email'
														],
														

								],

		'admin_login'			=>	[
														[
															'field'	=>	'uname',
															'label'	=>	'User Name',
															'rules'	=>	'required|trim',
														],
														[
															'field'	=>	'pwd',
															'label'	=>	'Password   1011',
															'rules'	=>	'required',
														]
									],



		'faculty_validation_up'			=>	[
														[
															'field'	=>	'master_admin_name',
															'label'	=>	'Faculty Name',
															'rules'	=>	'required|trim',
														],
														[
														
															'field'	=>	'master_admin_gender',
															'label'	=>	'Faculty Gender',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'master_admin_role_id',
															'label'	=>	'User Role',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'master_admin_branch',
															'label'	=>	'Faculty Branch',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'b_state',
															'label'	=>	'Faculty State',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'b_city',
															'label'	=>	'Faculty City',
															'rules'	=>	'required'
														 ],
														
														 [
															'field'	=>	'master_admin_address',
															'label'	=>	'Faculty Address',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_dob',
															'label'	=>	'Faculty Birth Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_join_date',
															'label'	=>	'Faculty join Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_contact',
															'label'	=>	'Faculty Contact',
															'rules'	=>	'required|numeric'
														],
														[
															'field'	=>	'master_admin_email',
															'label'	=>	'Faculty Email',
															'rules'	=>	'required|valid_email'
														],
														
														
									],
			'update_branch_head'		=>	[
														[
															'field'	=>	'master_admin_name',
															'label'	=>	'Branch Head Name',
															'rules'	=>	'required|trim'
														],
														[
															'field'	=>	'master_admin_address',
															'label'	=>	'Branch Head Address',
															'rules'	=>	'required|trim'
														],
														[
															'field'	=>	'master_admin_contact',
															'label'	=>	'Branch Head Contact',
															'rules'	=>	'required|numeric'
														],
														[
															'field'	=>	'master_admin_email',
															'label'	=>	'Branch Head Email',
															'rules'	=>	'trim|required|valid_email'
														],
														// [
														// 	'field'	=>	'master_admin_dob',
														// 	'label'	=>	'Branch Head Birth Date',
														// 	'rules'	=>	'required'
														// ],
														// [
														// 	'field'	=>	'master_admin_join_date',
														// 	'label'	=>	'Branch Head join Date',
														// 	'rules'	=>	'required'
														// ],
												],

			'faculty_validation'			=>	[
														[
															'field'	=>	'master_admin_name',
															'label'	=>	'Faculty Name',
															'rules'	=>	'required|trim',
														],
														[
														
															'field'	=>	'master_admin_gender',
															'label'	=>	'Faculty Gender',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'master_admin_role_id',
															'label'	=>	'User Role',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'master_admin_branch',
															'label'	=>	'Faculty Branch',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'admin_state',
															'label'	=>	'Faculty State',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'admin_city',
															'label'	=>	'Faculty City',
															'rules'	=>	'required'
														 ],
														  [
														
															'field'	=>	'course_id',
															'label'	=>	'Faculty Course',
															'rules'	=>	'required'
														 ],
														 [
														
															'field'	=>	'subject_id',
															'label'	=>	'Faculty Subject',
															'rules'	=>	'required'
														 ],
														 [
															'field'	=>	'master_admin_address',
															'label'	=>	'Faculty Address',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_dob',
															'label'	=>	'Faculty Birth Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_join_date',
															'label'	=>	'Faculty join Date',
															'rules'	=>	'required'
														],
														[
															'field'	=>	'master_admin_contact',
															'label'	=>	'Faculty Contact',
															'rules'	=>	'required|numeric'
														],
														[
															'field'	=>	'master_admin_email',
															'label'	=>	'Faculty Email',
															'rules'	=>	'required|valid_email'
														],
														
														
									]


];
						


 ?>