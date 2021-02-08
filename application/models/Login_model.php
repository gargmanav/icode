<?php
class Login_model extends CI_Model{
 
  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('bill_users');
    return $result;
  }

 function insert_signUp()
    {
 	   $arr1=$this->input->post();
     //      // print_r($arr1);
      // $this->db->where('name',$arr1['name']);
      $this->db->where('mobile',$arr1['phone_no']);
      $this->db->where('email',$arr1['email']);
      // $this->db->where('address',$arr1['address']);
      $queryResult=$this->db->get('bill_users');  
      $foundRows = $queryResult->num_rows();
      // print_r($queryResult);
      // echo $foundRows;
      if($foundRows >= 1) {
      	$last=array(
      		'value'="You are already registered",);
        return json_encode($last);
      } else {
            
          $arr = Array(
                 'name'  => $arr1['name'],
                 'mobile'  => $arr1['phone_no'],
                 'email'  => $arr1['email'],
                 // 'addresss'  => $arr1['address'],
                 'password'  =>$arr1['password'],
                 'status'  => 'New',
    
          );
            $this->db->insert('bill_users',$arr);
            $last_id=$this->db->insert_id();
            // $this->db->where('id',$last_id);
            // $arrr=$this->db->get('app_users');
            return json_encode($last_id);
          }
    }
    
    function logout(){
    	$user_id=$this->input->post('user_id');
    	$this->db->where('id',$user_id);
      	$queryResult=$this->db->get('bill_users');  
      	$foundRows = $queryResult->num_rows();
      	// print_r($queryResult);
      		// echo $foundRows;
      	if($foundRows >= 1) {
      $last=array(
      		'value'="user not found",);
        return json_encode($last);
      } else {
            
          $arr = Array(
                 // 'name'  => $arr1['name'],
                 // 'mobile'  => $arr1['phone_no'],
                 // 'email'  => $arr1['email'],
                 // 'addresss'  => $arr1['address'],
                 // 'password'  =>$arr1['password'],
                 'status'  => 'inactive',
    
          );
            $this->db->update('bill_users',$arr);
            // $last_id=$this->db->insert_id();
            // $this->db->where('id',$last_id);
            // $arrr=$this->db->get('app_users');

      $last=array(
      		'value'="sucess logout",);
        return json_encode($last);
            // return json_encode($last_id);
          }
        

    }


}