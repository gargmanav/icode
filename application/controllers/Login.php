<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  function __construct(){
    parent::__construct();
    // $this->load->model('login_model');
  }
 
  function index(){
    // print_r($this->session->userdata());
  //  if($this->session->userdata('logged_in') !== TRUE){
  //  $this->load->view('online/signup'); 

  // }else{
  //   $this->switching();
   
  //   // $this->logout();
  // }
  }
 
  function auth(){
    $email    = $this->input->post('email');
    $password =$this->input->post('passsword');
    $validate = $this->login_model->validate($email,$password);
    // print_r($validate);
    // if($validate->num_rows() > 0){

	// $data  = $validate->row_array();
        
        // $user_id=$data['id'];
        // $name  = $data['name'];
        // $email = $data['email'];
        // $sesdata = array(
        //     'user_id'   => $user_id,
        //     'username'  => $name,
        //     'email'     => $email,
        //     'logged_in' => TRUE,
        // );
        // $this->session->set_userdata($sesdata);
        
        // $this->session->set_flashdata('msg','Sucess'); 
        // // prireturn "sucess";
        // // print_r($this->session->userdata());
        // $this->index();
        // // print_r($validate);
        //  // print_r($sesdata);
        // // return $sesdata;
        // // access login for admin
        
      // }
    // else if($validate->num_rows() == 0){
      // echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        // redirect('login');
    // }else{
      // echo "Something went Wrong! Please try again";
     	
    // }
  }// switch to swicthing
  
  // function switching(){

    
             // $from = $this->session->userdata('username');
             // $this->db->where('id',$this->session->userdata('user_id'));
             // $req = $this->db->get('app_users')->row_array();

             // $user_id      =  $this->session->userdata('user_id');
             // $email        =  $this->session->userdata('email');
// print_r($this->session->userdata());
// echo $user_id;
// print_r($sesdata);
// if($this->session->userdata('logged_in') !== 1){
//   // echo "yes";
// $this->load->view('online/signup');
// }
             // $sta =array(
             //       'message'    => "Log In".' '.$this->session->userdata('user_id').' at '.$email.' on '.date('Y-m-d H:i:s') ,
             //       'user_id' 	=>$user_id,
             //   );  
             // $this->db->insert('app_activity',$sta);


    // $level    = $this->session->userdata('level');
    // $category = $this->session->userdata('user_type');
// echo $level;
 //    if($user_id !== '0'){
 //    redirect('control_shop/dashboard');
	// }else{
	// 	redirect('control_shop');

 //        }

	// }


	public function signUp()
	{
		$this->load->model('Login_model');
	 	$qur=$this->login_model->insert_signUp();

	 	// echo $qur;
	 	// print_r($qur);
	 	// if($qur > 0 ){
	 		// print_r(expression);
	 	 // echo "if";	
	 	// 	$user_id=$qur['id'];
   //      $name  = $qur['name'];
   //      $email = $qur['email'];
   //      $mobile = $qur['mobile'];
   //      // $user_type = $data['user_category'];
   //      $sesdata = array(
   //          'user_id'   => $user_id,
   //          'username'  => $name,
   //          'email'     => $email,
   //          'mobile'     => $mobile,
   //          // 'user_type' => $user_type,
   //          // 'sessionn'  => '2020-21',
   //          'logged_in' => TRUE
   //      );
        
   //      $this->session->set_userdata($sesdata);
   //      $this->switching();
	 	// }else{
	 	// 	   redirect('login');
	 	// }
	 }


  function logout(){
      $this->load->model('Login_model');
	 	$qur=$this->login_model->logout();

  }


}
