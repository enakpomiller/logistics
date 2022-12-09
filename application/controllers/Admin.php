<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php

class Admin extends CI_controller{
  protected $table = "tbl_cart";
  protected $table2 = "tbl_comment";
      public function  __construct(){
    	 		parent::__construct();
    	 		$this->load->database();
    	 		$this->load->model('admin_model');
    	 		// $this->load->library('session');
    	 		$this->load->helper('url','text');
          $this->load->helper('security');
    	 		$this->load->library('form_validation');
          $this->load->library("pagination");
          $this->load->library('csvimport');
          $this->load->library('session');
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
       $this->form_validation->set_rules('category','category'.'required');
   	   if(isset($_POST['submit'])){
   	      if($this->form_validation->run()){
   	       //image upload------------------------------------
             $config['upload_path'] = 'uploads';
             $config['allowed_types'] ='gif|jpg|png|jpeg|GIF|JPEG|PNG|GIF|JPG';
             $config['max_size'] ='3048';
             $config['max_width'] = '60000';
             $config['max_height'] ='60000';
             $this->load->library('upload',$config);
                if(!$this->upload->do_upload()){
	              $errors = array('error'=>$this->upload->display_errors());
	              $userfile = 'noimage.jpg';
	              }else{
	               $data = array('upload_data'=>$this->upload->data());
	               $userfile =  $_FILES['userfile']['name'];
	               }
	              // close image upload ---------------------------
	               $pname =  $this->input->post('prod_name');
	               $pprice = $this->input->post('prod_price');
	               $pbrand = $this->input->post('prod_brand');
                 $pcategory = $this->input->post('category');
	               $UploadProd = $this->admin_model->UploadProduct($userfile,$pname,$pprice,$pbrand,$pcategory);
                   if($UploadProd){
                     $data['msg_success'] = " Product Uploaded Successfully ";
                     $this->load->view('admin/header',$data);
                     $this->load->view('admin/product',$data);
                     $this->load->view('admin/footer',$data);
		               // $this->session->set_flashdata('Upload_success'.'Product Uploaded Successfully');
		               // redirect(base_url('admin/product'));
		               }else{
		               $this->session->set_flashdata('Upload_error'.'Product Uploaded Failed');
		               redirect(base_url('admin/product'));
		               }
                 }else{
                   echo " fill all the feilds ";
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
                $this->data['title'] = " All Users Profile";
                $seller_id = $this->session->id;
                $this->data['prodDetails']= $this->admin_model->prodDetails();
                $this->data['ON'] =  $this->db->get_where('tbl_admin_login',array('id'=>$_SESSION['ON']))->row();
                //$this->data['comment'] = $this->admin_model->GetAllComment('tbl_comment');
                $this->data['allsellers'] = $this->admin_model->GetAllSellers('tbl_admin_login');
                $this->data['allsellersproduct'] = $this->admin_model->GetAllSellersProduct();
                //$this->data['sellerprod'] = $this->admin_model->GetFewProduct();
                  $this->load->view('admin/header');
                  $this->load->view('admin/allprofile',$this->data);
                  $this->load->view('admin/footer');
                }else{
                redirect((base_url('admin/adminlogin')));
              }
            }


      public function search_for_seller_prod(){
           if($this->session->userdata('logged_in')){
              $getby = $this->input->post('load');
              $input = $this->input->post('find');
              $search = $this->admin_model->GetSellerId($input);
              if($search){
                $test  =  $this->db->get_where('tbl_admin_login',array('tracking_code'=>$input))->row();
                $demo  =   $this->db->get_where('seller_prod_details',array('seller_id'=>$test->id))->result();
                $this->data['prod_img'] = $demo;
                $this->data['prod_details'] = $search;
                $this->data['seller_info']= $this->admin_model->GetSellerNmae($input);
                $this->load->view('admin/viewseller',$this->data);
              }else{
                 $this->data['mgs_error']= " tracking code ".$input." not valid ";
                 $this->load->view('admin/viewseller',$this->data);
              }
            }else{
               echo " back to admin ";
            }
      }


    public function settings(){

            if($_POST){
              $id = $this->input->post('id');
              $config = $this->input->post('activity');
              $test = $this->admin_model->ResetSellerStatus($id,$config);
              $on_off = $this->db->get_where('tbl_admin_login',array('id'=>$id))->row();
              if($test){
                if($on_off->status=="on"){
                  $_SESSION['ON'] = $on_off->id;
                  //echo $on_off->firstname ." user activated";
                 echo json_encode(array('statusCode'=>200));
                 redirect('admin/allprofile');
                 }else{
                  echo json_encode(array('statusCode'=>201));
                  redirect('admin/allprofile');
                 }
              }else{
                echo " not found ";
              }
             }else{
             return redirect(base_url('admin/allprofile'));
            }

       }


           public function updateseller(){
                 $id = $this->input->post('id');
                 $fname = $this->input->post('firstname');
                 $oname  = $this->input->post('othernames');
                 $email = $this->input->post('email');
                 $usertype = $this->input->post('usertype');
                 $update = $this->admin_model->updateSingleRecord($fname,$oname,$email,$usertype,$id);
                 if($update){
                    $this->session->set_flashdata('msg_success',' Record Update was successful');
                    redirect(base_url('admin/allprofile'));
                 }else{
                   echo " cannot update ";
                   redirect(base_url('admin/allprofile'));
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
    	      $user_customer  = $this->session->id;
            $userid =   $user_customer->id;
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

          if($_POST){
            $username = $this->input->post('username');
            $password =$this->input->post('password');
            $user_type = $this->admin_model->getusertype('tbl_admin_login',$username);
            // $this->session->set_userdata('adminid',$user_type->id);
            // $admin = $this->admin_model->AdminLogin('tbl_admin_login',$username,$password);
            $seller_login = $this->db->get_where('tbl_admin_login',array('username'=>$username,'password'=>$this->myhash($password),'status'=>'on'))->row();
            $admin_login = $this->db->get_where('tbl_admin_login',array('username'=>$username,'password'=>$this->myhash($password),'usertype'=>'admin'))->row();
               if($seller_login){
                $data_arr = array(
                  'id'=>$seller_login->id,
                  'username'=>$seller_login->username,
                  'usertype'=>$seller_login->usertype,
                   'firstname'=>$seller_login->firstname,
                   'othernames'=>$seller_login->othernames,
                   'userfile'=>$seller_login->userfile,
                  'logged_in'=>true
                );
                 // echo "<pre>"; print_r($data_arr);die;
                $this->session->set_userdata($data_arr);
                $this->session->set_userdata('admin_id',$seller_login->id);
                $this->session->set_userdata('seller_id',$seller_login->id);
                redirect(base_url('admin'));
              }elseif($admin_login){
                    $data_arr = array(
                      'id'=>$admin_login->id,
                      'username'=>$admin_login->username,
                      'usertype'=>$admin_login->usertype,
                       'firstname'=>$admin_login->firstname,
                       'othernames'=>$admin_login->othernames,
                       'userfile'=>$admin_login->userfile,
                      'logged_in'=>true
                    );
                     // echo "<pre>"; print_r($data_arr);die;
                    $this->session->set_userdata($data_arr);
                    $this->session->set_userdata('admin_id',$admin_login->id);
                    $this->session->set_userdata('seller_id',$admin_login->id);
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
                         $config['allowed_types'] ='gif|jpg|png|jpeg|pdf|webp';
                         // $config['file_name'] = $this->data['firstname'];
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
             $this->data['tracking_code'] = rand(000000,999999);
             $this->data['status'] = '1';

             $InsertSeller = $this->admin_model->CreateSeller('tbl_admin_login',$this->data);
              if($InsertSeller){
                // $this->data['msg_insert'] = " Image uploade";
                // $this->load->view('admin/seller_reg',$this->data);
                $this->session->set_flashdata('msg','<div class="alert alert-success"> Account created successfully please login  </div>');
                return redirect(base_url('admin/adminlogin'));
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
  $adminid = $this->session->userdata('seller_id');
          if($_POST['type']==1){

            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('passconf','Passconf','required');
             if($this->form_validation->run()==TRUE){
             $email  = $this->input->post('email');
             $password = $this->input->post('password');
             $passconf = $this->input->post('passconf');
             $found = $this->admin_model->CheckEmailExist('tbl_admin_login',$email);
               if($found){
                 if($password == $passconf){
                    //$test = $this->admin_model->changepassword('tbl_admin_login',$passconf,$adminid);
                     $data = array(
                       'password'=>$this->myhash($passconf)
                     );
                     $this->db->where('id',$adminid);
                     $update = $this->db->update('tbl_admin_login',$data);
                     // $this->data['msg_success'] = "<div class='alert alert-success' style='width:40%;'> PASSWORD CHANGED SUCCESSFULLY </div>";
                     // $this->load->view('admin/header');
                     // $this->load->view('admin/change_pass',$this->data);
                     // $this->load->view('admin/footer');
                     // echo json_encode(array('statusCode'=>200));
                    echo json_encode(array("statusCode"=>200));
                    redirect(base_url('admin/change_pass'));

                 }else{

                    // $this->data['msg_error'] = "<div class='alert alert-danger' style='width:40%;'> password mismatch </div>";
                    // $this->load->view('admin/header');
                    // $this->load->view('admin/change_pass',$this->data);
                    // $this->load->view('admin/footer');
                     // echo json_encode(array('statusCode'=>201));
                     // var_dump(" false "); die;
                      echo json_encode(array("statusCode"=>201));
                     //return redirect(base_url('admin/change_pass'));

                 }
             }else{
               echo json_encode(array('success' => false));
               return redirect(base_url('admin/change_pass'));
               // $this->data['msg_error'] = "<div class='alert alert-danger' style='width:40%;'> Incorrect Email </div>";
               // $this->load->view('admin/header');
               // $this->load->view('admin/change_pass',$this->data);
               // $this->load->view('admin/footer');
             }
          }else{
            print " fill the form ";
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


 public function multiple_upload(){
   $this->data['title'] = ' UPLOAD PRODUCT';
    if($_POST){
      $this->data['prod_name'] = $this->input->post('prod_name');
      $this->data['prod_price'] = $this->input->post('prod_price');
      $this->data['prod_brand'] = $this->input->post('prod_name');
      $post = $this->input->post();
      for ($i = 0; $i < count($post['prod_name']); $i++)
         {
        $data=array('prod_name' => $post['prod_name'][$i],
        'seller_id'=>$this->session->userdata('admin_id'),
        'prod_price' => $post['prod_price'][$i],
        'prod_brand' => $post['prod_brand'][$i],);
         $seller_lastid = $this->admin_model->sellerdetails('seller_prod_details',$data);
         $this->session->set_userdata('key',$seller_lastid);

         }

      // start multiple file upload
             $data = array();
              $errorUploadType = $statusMsg = '';
              // If file upload form submitted
              if($this->input->post('fileSubmit')){
                  // If files are selected to upload
                  if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){
                      $filesCount = count($_FILES['files']['name']);
                      for($i = 0; $i < $filesCount; $i++){
                          $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                          $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                          $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                          $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                          // File upload configuration

                          // $uploadPath = './uploads';
                          $config['upload_path'] = './assets/admin2/';
                          $config['allowed_types'] = 'jpg|jpeg|png|gif';
                          // Load and initialize upload library
                          $this->load->library('upload', $config);
                          $this->upload->initialize($config);
                          // Upload file to server
                          if($this->upload->do_upload('file')){
                              // Uploaded file data
                              $fileData = $this->upload->data();
                              $uploadData[$i]['seller_id'] = $this->session->userdata('seller_id');
                              $uploadData[$i]['prod_id'] =  $seller_lastid;
                              $uploadData[$i]['file_name'] = $fileData['file_name'];
                              $uploadData[$i]['created_at'] = date("Y-M-D H:i:s");
                          }else{
                              $errorUploadType .= $_FILES['file']['name'].' | ';
                          }
                      }
                      $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):'';
                      if(($uploadData)){
                         // echo "<pre>"; print_r($uploadData); die;
                          // Insert files data into the database
                         $insert = $this->admin_model->insert_multiple_files($uploadData);
                         //echo "<pre>"; print_r($insert); die;
                         $this->data['msg'] = '<span style="color:green;">Product uploaded successfully.</span>';
                         $this->load->view('admin/header');
                         $this->load->view('admin/multiple_upload',$this->data);
                         $this->load->view('admin/footer');
                        //$statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.';
                      }else{
                          $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                      }
                  }else{
                      $this->data['msg'] = '<span style="color:red;">Please select product files to upload.</span>';
                      $this->load->view('admin/header');
                      $this->load->view('admin/multiple_upload',$this->data);
                      $this->load->view('admin/footer');
                      // redirect(base_url('admin/multiple_upload'));
                  }
               }



         // end multiple upload

        //Get files data from the database
           // $this->data['files'] = $this->admin_model->getRows();
           // echo "<pre>"; print_r($this->data['files']); die;

        // Pass the files data to view
          //$this->data['statusMsg'] = $statusMsg;
      // end start multiple
 }
 else{
   $this->load->view('admin/header');
   $this->load->view('admin/multiple_upload',$this->data);
   $this->load->view('admin/footer');
   }
 }


 function view_seller_prod(){
     $key = $this->session->userdata('key');
     $seller_id = $this->session->userdata('seller_id');
     $this->data['title'] = " PRODUCTS ";
     //$this->data['seller_product'] = $this->admin_model->getSellerProduct($key);
     $this->data['seller_product'] = $this->admin_model->getRows($seller_id);
     //echo "<pre>"; print_r($this->data['seller_product']); die;
     $this->data['all_prod'] = $this->admin_model->getAll();
     $this->data['get_product'] = $this->admin_model->fewProduct($seller_id);

     $this->load->view('admin/header');
     $this->load->view('admin/view_seller_prod',$this->data);
     $this->load->view('admin/footer');

  }
  function update_seller(){
     $this->data['title'] = " Update Product ";
     $seller_id = $this->session->userdata('seller_id');
     $this->data['seller_record'] = $this->admin_model->GetsingleSellerRecord('tbl_admin_login',$seller_id);
     $this->data['seller_product'] = $this->admin_model->getRows($seller_id);
     $this->data['get_product'] = $this->admin_model->fewProduct($seller_id);
     // echo "<pre>"; print_r($this->data['get_product2']); die;
     $this->load->view('admin/header');
     $this->load->view('admin/update_seller',$this->data);
     $this->load->view('admin/footer');
   }

public function delete_seller_product(){
          $ids = $this->input->post('ids');
          $this->db->where_in('id', explode(",", $ids));
          $this->db->delete('seller_prod_details');
          echo json_encode(['success'=>"Item Deleted successfully."]);

}
public function update_single_seller_product(){
          $id = $this->input->post('id');
          $data['prod_name'] = $this->input->post('prod_name');
          $data['prod_price'] = $this->input->post('prod_price');
          $data['prod_brand'] = $this->input->post('prod_brand');
          $this->db->where('id',$id);
          $test = $this->db->update('seller_prod_details',$data);
          if($test){
          $this->session->set_flashdata('msg_updated',json_encode(['success'=>"Item updatedsuccessfully."]));
          return redirect(base_url('admin/update_seller'));
          }else{
          echo json_decode(['success'=>"Item  cannot updatedsuccessfully."]);
          }
   }
  public function update_batch_seller_product(){
          $ids = $this->input->post('ids');
          $data['prod_name'] = $this->input->post('prod_name');
          $data['prod_price'] = $this->input->post('prod_price');
          $data['prod_brand'] = $this->input->post('prod_brand');
          $this->db->where_in('id', explode(",", $ids));
          //$this->db->where('id',$ids);
          $test = $this->db->update('seller_prod_details',$data);
          if($test){
            var_dump($test); die;
          echo json_encode(['success'=>"Item updatedsuccessfully."]);
          }else{
         echo json_decode(['success'=>"Itemcannot update."]);
          }
   }

public function bulk_update(){
      $this->load->view('admin/header');
      $this->load->view('admin/bulk_update');
      $this->load->view('admin/footer');
}

 function download_to_csv(){
   $usertype = $this->session->userdata('seller_id');

     //csv file name
     $filename = 'bulk_update_'.date('Ymd').'.csv';
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$filename");
     header("Content-Type: application/csv; ");
     // get data
     $usersData = $this->admin_model->getUserDetails();
     // file creation
     $file = fopen('php://output', 'w');
     $header = array("prod_name","prod_price","prod_brand","seller_id");
     fputcsv($file, $header);
     // foreach ($usersData as $key=>$line){
     // 	fputcsv($file,$line);
     // }
     fclose($file);
     exit;
     //end
 }

        function import_csv(){
          if(isset($_POST)){
            if(isset($_FILES["csvFile"])) {
              // var_dump($_FILES);
              // var_dump($_POST); exit;
              $config['upload_path'] = 'assets/admin2/';
              $config['allowed_types'] = 'text/plain|text/csv|csv';
              $config['max_size'] = '2048';
              $config['file_name'] = 'product_list.csv';
              $config['mime'] = $_FILES["csvFile"]['type'];
              $config['overwrite'] = TRUE;
              //$this->upload->initialize($config);
              $this->load->library('upload', $config);
              if(!$this->upload->do_upload("csvFile")) {
                 $this->upload->display_errors();
                 redirect(base_url("admin/bulk_update"));
              } else {

                $file_data = $this->upload->data();
                // $file_path =  'uploads/csv/staff_list.csv';
                $file_path =  'assets/admin2/product_list.csv';
                // $file_path =  $file_data['full_path'];
                $headers = ['prod_name',	'prod_price',	'prod_brand','seller_id'];
                // $csv_array = $this->csvimport->get_array($file_path);
                // echo "<pre>"; var_dump($csv_array); exit;

                $handle = fopen($file_path, "r");
                if ($handle) {
                  for ($i = 1; $row = fgetcsv($handle); ++$i) {

                    //$type = $_POST['usertype'];
                    $insert_data = array(
                      "prod_name" => $row[0],
                      "prod_price" => $row[1],
                      "prod_brand" => $row[2],
                      "seller_id" =>$row[3]
                    );
                    if($i > 1){
                      // echo "<pre>"; print_r($insert_data); die;
                      $this->admin_model->insert_csv($insert_data);
                    }
                  }
                  // echo "<pre>"; var_dump($insert_data); exit;
                  fclose($handle);
                  // $type = ($_POST['entry_mode'] == 'UTME') ? 'UTME' : 'DIRECT ENTRY';
                  //$this->session->set_flashdata('csv_success', $type . ' list was uploaded sucessfully');
                      // $this->session->set_flashdata('csv_success', ' list was uploaded sucessfully');
                      $this->data['csv_insert'] = "<div class='text-center alert alert-success'> Product uploaded (CSV) </div>";
                      $this->load->view('admin/header');
                      $this->load->view('admin/bulk_update',$this->data);
                      $this->load->view('admin/footer');
                } else {
                   //$this->session->set_flashdata('csv_error', 'Import Error :(  Try again');
                   $this->data['csv_insert'] = "<div class='text-center alert alert-danger'> Error! Unable to Upload (CSV) File </div>";
                   $this->load->view('admin/header');
                   $this->load->view('admin/bulk_update',$this->data);
                   $this->load->view('admin/footer');
                }

              }
            } else {
              $this->session->set_flashdata('csv_error', 'Import Error :(  File Not Found');
              redirect(base_url("admin/bulk_update"));
            }
          }else{
            $this->load->view('admin/header');
            $this->load->view('admin/bulk_update');
            $this->load->view('admin/footer');
          }
        }




   // private function validate(){
   //    $validate = array(
   //      array(
   //        'field'=>'email',
   //        'label'=>'Email',
   //        'rules' => 'required|trim|xss_clean'
   //      ),
   //      array(
   //        'field'=>'password',
   //        'label'=>'Password',
   //        'rules'=>'trim|required|xss_clean'
   //      ),
   //      array(
   //        'field'=>'passconf',
   //        'label'=>'Passwordconf',
   //        'rules'=>'trim|required|xss_clean'
   //      )
   //    );
   //    return $validate;
   //
   // }






   public function myhash($string){
       return hash("sha512", $string . config_item("encryption_key"));
       }

}
?>
