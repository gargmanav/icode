<?php
  
  class Model_welcome extends CI_Model
  {




      public function buy_now(){


      
          $ins_arr=Array(

            'name'  => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile'  => $this->input->post('mobile'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'city'  => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'product_name' => $this->input->post('product_name'),
            'message' => $this->input->post('message'),                        
          );
          $this->db->insert('buy_now',$ins_arr);
          $buy_now_id=$this->db->insert_id();
          $buy_now_id1=$this->db->insert_id();
         
          $detail=Array(

          'table_id'  => $buy_now_id,
          'table_name'=> 'buy_now',
          'status'  => 'pending',
          'template_id' => '1',
          );
          $this->db->insert('send_mail',$detail);

          $detail1=Array(

          'table_id'  => $buy_now_id1,
          'table_name'=> 'buy_now',
          'status'  => 'pending',
          'template_id' => '2',
          );
          $this->db->insert('send_mail',$detail1);

      

      $this->mail_cron();

      }



    public function queries(){

        $ins_arr=Array(

            'name'  => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'message'  => $this->input->post('message'),            
          );
        $this->db->insert('queries',$ins_arr);
        $queries_id=$this->db->insert_id();
        $queries_id1=$this->db->insert_id();
         
        $detail=Array(

        'table_id'  => $queries_id,
        'table_name'=> 'queries',
        'status'  => 'pending',
        'template_id' => '1',
        );
        $this->db->insert('send_mail',$detail);

        $detail1=Array(

        'table_id'  => $queries_id1,
        'table_name'=> 'queries',
        'status'  => 'pending',
        'template_id' => '2',
        );
        $this->db->insert('send_mail',$detail1);







      $this->mail_cron();
    }
        function text_replace($temp,$username){
      $var=$this->db->get('mail_replace')->result_array();
      // print_r($var);
        foreach ($var as $key) {
          // print_r($key);
          // $key['']
          $temp= str_replace("|*".$key['name']."*|",$key['replace_to'],$temp);
          // $change =word_censor($temp,"|*".$key['name']."|*" ,$key['replace_to']);
          // echo $temp;
        }
        return $temp;
    }
  function mail_cron(){
    $this->db->where('status','pending');
    $dat=$this->db->get('send_mail')->result_array();
    if($dat){
      foreach ($dat as $data) {
        $acb=array('status'=>'Processing',);
        $this->db->where('id',$data['id']);
        $this->db->update('send_mail',$acb);
        $this->db->where('id',$data['template_id']);
        $daa=$this->db->get('template')->row_array();
        $temp=$daa['message'];
        $subject=$daa['subject'];
        $this->db->where('id',$data['table_id']);
        $user=$this->db->get($data['table_name'])->row_array();
        $username=$user['name'];
        $change=$this->text_replace($temp,$username);
        // echo $change;
        // print_r($user);
        if($data['template_id'] == "2"){
          if($data['table_name'] == 'queries'){
        $use= "<table><td><b>Name</b></td><td>".$user['name']."</td><tr><td><b>Email</b></td><td>".$user['email']."</td><tr><td><b>Query</b></td><td>".$user['message']."</td></table>";
      }else{
        $use= "<table><td><b>Name</b></td><td>".$user['name']."</td><tr><td><b>Email</b></td><td>".$user['email']."</td><tr><td><b>Query</b></td><td>".$user['message']."</td><tr><td><b>Mobile</b></td><td>".$user['mobile']."</td><tr><td><b>Country</b></td><td>".$user['country']."</td><tr><td><b>State</b></td><td>".$user['state']."</td><tr><td><b>City</b></td><td>".$user['city']."</td><tr><td><b>Pincode</b></td><td>".$user['pincode']."</td><tr><td><b>Product Name</b></td><td>".$user['product_name']."</td><tr><td><b>Date</b></td><td>".$user['created_at']."</td></table>";
      }
          $body= str_replace("|*Query Array*|",$use,$change);
        // print_r($body);
        // echo '<br><br>';
          // print_r($use);
           if($subject && $body && $user){
              // echo"yes";
              $result=$this->email
              ->from('info@brajsolar.com')
              ->reply_to('')
              ->to('ankitgautamvri@gmail.com')
              ->cc('mohit.osculant@gmail.com')
              ->subject($subject)
              ->message($body)
              ->send(FALSE);
               print_r($result);
               if($result== 1){
                $arr=array('status'=>'Send',);
                $this->db->where('id',$data['id']);
                $this->db->update('send_mail',$arr);
                echo 'Mail Send...';
               }else{
                echo "Result not found";
              }
            }else{
              echo "subject and body not found";
            }
        }else{
        $body=$change;
         if($subject && $body && $user){
              // echo"yes";
              $result=$this->email
              ->from('info@brajsolar.com')
              ->reply_to('')
              ->to($user['email'])
              ->cc('mohit.osculant@gmail.com')
              ->subject($subject)
              ->message($body)
              ->send(FALSE);
               print_r($result);
               if($result== 1){
                $arr=array('status'=>'Send',);
                $this->db->where('id',$data['id']);
                $this->db->update('send_mail',$arr);
                echo 'Mail Send...';
               }else{
                echo "Result not found";
              }
            }else{
              echo "subject and body not found";
            }


        }
        // exit();
        // print_r($body);
        // print_r($subject);
           
      }
    }
  }



       public function getproduct_info(){

       $this->db->limit(3);  
       $key =  $this->db->get('products')->result_array();
       return $key;

    }

    public function getcat_info(){

      $this->db->distinct();
      $this->db->select('category');
      $key =  $this->db->get('products')->result_array();
       return $key;

    }



    public function getproducts_list($p_info){

      if($p_info['type']== "All_product"){

        $key =  $this->db->get('products')->result_array();
       return $key;

      }else{

      $this->db->where('category', $p_info['type']);
       $key =  $this->db->get('products')->result_array();
       return $key;
     }

    }



    public function getproduct_details($p_info){

      $this->db->where('id', $p_info['p_id']);
       $key =  $this->db->get('products')->row_array();
       return $key;


    }




  }
  ?>