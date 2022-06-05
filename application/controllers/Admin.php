<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php

class Admin extends CI_controller{
  protected $table = "tbl_cart";
  protected $table2 = "tbl_comment";
  public function  __construct(){
	 		parent::__construct();
	 		$this->load->database();
	 		$this->load->model('admin_model');
	 		$this->load->library('session');
	 		$this->load->helper('url','text');
      $this->load->helper('security');
	 		$this->load->library('form_validation');
      $this->load->library("pagination");
	}

  public function index(){
       if(!$this->session->userdata('logged_in')){
         redirect('admin/AdminLogin');
       }else{
         $data['title'] = "Admin Board";
         $this->load->view('admin/header');
         $this->load->view('admin/admin_index');
         $this->load->view('admin/footer');
         //$this->load->view('admin/search_user');
       }

  }

   public function InsertCountry(){
     if(!$this->session->userdata('logged_in')){
     redirect('admin/AdminLogin');
     }else{
	      if(!empty($this->input->post('country'))){
	         foreach ($this->input->post('country') as $key => $value){
	         $this->db->insert('tbl_country',$value);
	         }
	         $this->session->set_flashdata('country_created','Country Created');
	         redirect(base_url('admin/InsertCountry'));
	      }
          $this->load->view('admin/header');
	        $this->load->view('admin/country');
          $this->load->view('admin/footer');


     }

   	      // $this->form_validation->set_rules('country','Country','required');
   	      // if($this->form_validation->run()==FALSE){
          //   $this->load->view('admin/country');
   	      // }else{
   	      // 	   if($_POST){
	         //       $country = $this->input->post('country');
	         //       $CheckCountry = $this->admin_model->check_country($country);
	         //       if($CheckCountry){
		        //  $this->session->set_flashdata('country_existed','Country '.$country.'  already exist');
	         //        $this->load->view('admin/country');
	         //        }else{

	         //              foreach ($this->input->post('addmore') as $key => $value){
	         //               $insert_country = $this->admin_model->InsertCountry($country);
	         //              }

	         //        $this->session->set_flashdata('country_created','Country Created');
	         //        redirect(base_url('admin/InsertCountry'));
	         //       }
        	 //      }

        	 //  }



     }


   public function product(){
     // if(!$this->session->userdata('logged_in')){
     // redirect('admin/AdminLogin');
     // }else{
     	 $data['title'] = "Upload Product";
     	 $this->form_validation->set_rules('prod_name','Prod_name'.'required');
     	 $this->form_validation->set_rules('prod_price','Prod_price','required');
     	 $this->form_validation->set_rules('prod_brand','Prod_brand'.'required');
   	   if(isset($_POST['submit'])){
   	      if($this->form_validation->run()){
   	       //image upload------------------------------------
             $config['upload_path'] ='./uploads';
             $config['allowed_types'] ='gif|jpg|png|jpeg';
             $config['max_size'] ='3048';
             $config['max_width'] = '30000';
             $config['max_height'] ='60000';
             $this->load->library('upload',$config);
                if(!$this->upload->do_upload()){
	              $errors = array('error'=>$this->upload->display_errors());
	              $userfile = 'noimage.jpg';
	              }else{
	               $data = array('upload_data'=>$this->upload->data());
	               $userfile = $_FILES['userfile']['name'];
	               }
	              // close image upload ---------------------------
	               $pname =  $this->input->post('prod_name');
	               $pprice = $this->input->post('prod_price');
	               $pbrand = $this->input->post('prod_brand');
	               $UploadProd = $this->admin_model->UploadProduct($userfile,$pname,$pprice,$pbrand);
                   if($UploadProd){
		               $this->session->set_flashdata('Upload_success'.'Product Uploaded Successfully');
		               redirect(base_url('admin/product'));
		               }else{
		               $this->session->set_flashdata('Upload_error'.'Product Uploaded Failed');
		               redirect(base_url('admin/product'));
		               }
                 }
                }else{
                   $this->load->view('admin/header',$data);
    		           $this->load->view('admin/product',$data);
                   $this->load->view('admin/footer',$data);
                  }
                //}
              }

          //============display record for delete =============
           public function userprofile(){
	          //$data['displaycart'] = $this->admin_model->GetCartProd('tbl_cart'); ;
	   		    //$this->load->view('admin/userprofile',$data);
            if(!$this->session->userdata('logged_in')){
            redirect(base_url('admin/adminlogin'));
            }else{
            $config = array();
            $config["base_url"] = base_url() . "admin/userprofile";
            $config["total_rows"] = $this->admin_model->get_count();
            $config["per_page"] =5;
            $config["uri_segment"] = 3;
            $config['attributes'] = array('class' => 'pagination-links');
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data["links"] = $this->pagination->create_links();
            $data['displaycart'] = $this->admin_model->get_cart($config["per_page"], $page);
            $this->load->view('admin/header');
            $this->load->view('admin/userprofile', $data);
            $this->load->view('admin/footer');
            }

            // $config = array();
            //  $config["base_url"] = base_url() . "tbl_cart";
            //  $config["total_rows"] = $this->admin_model->get_count();
            //  $config["per_page"] = 10;
            //  $config["uri_segment"] = 2;
            //  $this->pagination->initialize($config);
            //  $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            //  $data["links"] = $this->pagination->create_links();
            //  $data['displaycart'] = $this->admin_model->get_count($config["per_page"], $page);
            //  $this->load->view('admin/userfile', $data);
               }
              public function allprofile(){
                if($this->session->userdata('logged_in')){
                //$this->data['comment'] = $this->admin_model->GetAllComment('tbl_comment');
                $this->data['title'] = " All Users Profile";
                $this->load->view('admin/header');
                $this->load->view('admin/allprofile',$this->data);
                $this->load->view('admin/footer');
                }else{
                redirect((base_url('admin/adminlogin')));
              }
            }

             public function viewcomment(){
               if(!$this->session->userdata('logged_in')){
               redirect(base_url('admin/adminlogin'));
               }else{
               $config = array();
               $config["base_url"] = base_url() . "admin/viewcomment";
               $config["total_rows"] = $this->admin_model->get_count();
               $config["per_page"] =5;
               $config["uri_segment"] = 3;
               $config['attributes'] = array('class' => 'pagination-links');
               $this->pagination->initialize($config);

               $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

               $this->data["links"] = $this->pagination->create_links();
               $this->data['comment'] = $this->admin_model->GetAllComment($config["per_page"], $page);
               $this->data['title'] = " Comment ";
               $this->load->view('admin/header');
               $this->load->view('admin/viewcomment',$this->data);
               $this->load->view('admin/footer');
               }
             }
             public function DeleteFromCart($id){
   	         $this->admin_model->DeleteCartByID($id);
   	         redirect('admin/userprofile');
              }

             public function activeuserscart(){
               if(!$this->session->userdata('logged_in')){
               redirect('admin/AdminLogin');
               }else{
               $this->data['title']='update cart';
  	       	   $user_id = $this->session->userdata('id')->id;
  	       	   $this->data['ActiveUserCart'] = $this->admin_model->UserCart($user_id);
               $this->load->view('admin/header',$this->data);
  	       	   $this->load->view('admin/activeuserscart',$this->data);
               $this->load->view('admin/footer',$this->data);
              }
       	    }

             public function DeleteActiveCart($id){
       	      $this->admin_model->DeleteActiveCart($id);
       	      redirect('admin/activeuserscart');
            }
    //===================== delete record ================

 //=============update active record ========================
            public function update(){
   	        $dim = $this->admin_model->UpdateCart();
   	        if($dim){
   	        $this->session->set_flashdata('user_updated','Cart Updated');
   	        redirect('admin/activeuserscart');
	   	        }
            }
      //====================================================================
          public function search_user(){
            if(!$this->session->userdata('logged_in')){
            redirect('admin/AdminLogin');
            }else{
  		    	$this->data['title'] = 'Search User ';
  		    	$email = $this->input->post('email');
  		    	$this->data['userprofile'] = $this->admin_model->SearchUser($email);
  		    	$this->data['searchproduct'] = $this->admin_model->GetCart($email);
            $this->load->view('admin/header');
            $this->load->view('admin/search_user',$this->data);
            $this->load->view('admin/footer');
           // $q = $this->input->get('q');
          // echo json_encode($this->admin_model->GetCart($q));
         }
       }
	        public function update_shipping(){
           if(!$this->session->userdata('logged_in')){
           redirect('admin/AdminLogin');
           }else{
	 	       $userid = $this->session->userdata('id')->id;
	     	   $data['GetShipping'] = $this->admin_model->GetShippingById('tbl_shipping',$userid);
	     	   $data['image'] = $this->db->get_where('tbl_users',array('id'=>$userid))->row();
           $this->load->view('admin/header');
	 	       $this->load->view('admin/update_shipping',$data);
           $this->load->view('admin/footer');
           }
	       }
           public function insert_update(){
    	      $userid = $this->session->userdata('id');
    	      $location = $this->input->post('current_location');
    	      $update = $this->admin_model->update_set('tbl_shipping',$userid,$location);
    	      if($update){
    	      $this->session->set_flashdata('location_msg','Locationupdated');
    	      redirect('admin/update_shipping');
    	      }else{
    	       var_dump("cannot pdate");die;
    	      }
        }

    public function adminlogin(){

            $this->data['title']="admin login";
            if($_POST){
            $username = $this->input->post('username');
            $password =$this->input->post('password');
            $user_type = $this->admin_model->getusertype('tbl_admin_login',$username);
            $this->session->set_userdata('adminid',$user_type->id);
            $admin = $this->admin_model->AdminLogin('tbl_admin_login',$username,$password);
            //$admin = $this->db->get_where('tbl_admin_login',array('username'=>$username,'password'=>$this->myhash($password)))->row();

               if($admin){
                $data_arr = array(
                  'id'=>$id,
                  'username'=>$username,
                  'usertype'=>$user_type->usertype,
                   'firstname'=>$user_type->firstname,
                  'logged_in'=>true
                );

                $this->session->set_userdata($data_arr);
                redirect(base_url('admin'));
              }else{
              $this->session->set_flashdata('error','Enter correct username or password');
              redirect(base_url('admin/adminlogin'));
               }
             }else{
             $this->load->view('admin/adminlogin',$this->data);
             }
         }

         public function deletecomment($id){
         $delete  = $this->admin_model->deletecomment($id);
          if($delete){
            redirect(base_url('admin/viewcomment'));
          }

         }

   public function admin_logout(){
     $this->session->unset_userdata('username');
     $this->session->unset_userdata('logged_in');
     redirect('admin/adminlogin');
   }



    public function seller_reg(){
        $config = array(
            array(
              'field' => 'firstname',
              'label' => 'Firstname',
              'rules' => 'required'
            ),
            array(
              'field' => 'othernames',
              'label' => 'Othernames',
              'rules' => 'required',
             ),
              array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|callback_check_email_exists'
              ),
              array(
               'field' => 'username',
               'label' => 'Username',
               'rules' => 'required'
              ),

              array(
                  'field' => 'password',
                  'label' => 'Password',
                  'rules' => 'required|min_length[3]',
                  'errors' => array(
                          'required' => 'You must provide a %s.',
                  ),
              ),
            array(
                  'field' => 'conf_password',
                  'label' => 'Confirm pasword',
                  'rules' => 'matches[password]'
              )

          );

        $this->form_validation->set_rules($config);
         if($_POST){
          if($this->form_validation->run('config')== TRUE){
             $this->data['firstname'] = $this->input->post('firstname');
             $this->data['othernames'] = $this->input->post('othernames');
             $this->data['email'] = $this->input->post('email');
             //image upload------------------------------------
                         $config['upload_path'] ='./assets/admin_uploads/';
                         $config['allowed_types'] ='gif|jpg|png|jpeg|pdf';
                         $config['file_name'] = $this->data['firstname'];
                         $config['max_size'] ='2048';
                         $config['max_width'] = '5000';
                         $config['max_height'] ='60000';


                         $this->load->library('upload',$config);
                         if(!$this->upload->do_upload()){
                           $errors = array('error'=>$this->upload->display_errors());
                           $this->data['userfile'] = 'noimage.jpg';
                           var_dump($errors);die;
                          }else{
                           $data = array('upload_data'=>$this->upload->data());
                           // $userfile = $_FILES['userfile']['name'];
                          $this->data['userfile'] = $_FILES['userfile']['name'];

                          }

              //close image upload ---------------------------
             $this->data['username']  = $this->input->post('username');
             $this->data['usertype'] = "SELLER";
             $this->data['password'] = $this->myhash($this->input->post('password'));

             $InsertSeller = $this->admin_model->CreateSeller('tbl_admin_login',$this->data);
              if($InsertSeller){
                $this->data['msg_insert'] = " Image uploade";
                $this->load->view('admin/seller_reg',$this->data);
              }else{
                $this->data['msg_insert'] = " Cannot Upload Image";
                $this->load->view('admin/seller_reg',$this->data);
              }
          }else{
            $this->load->view('admin/seller_reg');
          }
       }else{
          $this->load->view('admin/seller_reg');
      }
   }

    public function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists','This email '.$email . ' Already exist');
      if($this->admin_model->check_email_exists($email)){
        return true;
      }else{
        return false;
      }

    }

    public function change_pass(){
        if($_POST){
          $adminid = $this->session->userdata('adminid');
          $this->form_validation->set_rules($this->validate());
          if($this->form_validation->run()==TRUE){
             $email  = $this->input->post('email');
             $password = $this->input->post('password');
             $passconf = $this->input->post('passconf');
             $found =  $this->admin_model->CheckEmailExist('tbl_admin_login',$email);
              if($found){
                 if($password == $passconf){
                    // $test = $this->admin_model->changepassword('tbl_admin_login',$passconf,$adminid);
                     $data = array(
                       'password'=>$this->myhash($passconf)
                     );
                     $this->db->where('id',$adminid);
                     $this->db->update('tbl_admin_login',$data);

                     $this->session->set_flashdata('err_mismatch',' Password changed successfully');
                     redirect(base_url('admin/change_pass'));


                 }else{
                   $this->session->set_flashdata('err_mismatch',' Password Mismatch');
                   redirect(base_url('admin/change_pass'));
                 }
             }else{
               $this->session->set_flashdata('err_mismatch',' that email does not exist');
               redirect(base_url('admin/change_pass'));
             }
          }else{
            $this->load->view('admin/header');
            $this->load->view('admin/change_pass');
            $this->load->view('admin/footer');
         }
      }else{
        $this->load->view('admin/header');
        $this->load->view('admin/change_pass');
        $this->load->view('admin/footer');
     }
  }


   private function validate(){
      $validate = array(
        array(
          'field'=>'email',
          'label'=>'Email',
          'rules' => 'required|trim|xss_clean'
        ),
        array(
          'field'=>'password',
          'label'=>'Password',
          'rules'=>'trim|required|xss_clean'
        ),
        array(
          'field'=>'passconf',
          'label'=>'Passwordconf',
          'rules'=>'trim|required|xss_clean'
        )
      );
      return $validate;

   }

   public function myhash($string){
       return hash("sha512", $string . config_item("encryption_key"));
       }

}
?>
