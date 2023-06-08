
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

class Users extends CI_controller{
       public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->model('users_model');
            //$this->load->helper('url','form','text');
            $this->load->helper(array('form', 'url','text'));
            $this->load->helper('cookie');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->library("pagination");
            // $this->load->library('ms_graph');
       
          
         }

       public function index(){
              $UserId= $this->session->userdata('id');
              $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
              $this->load->view('template/header',$data);
              $this->load->view('template/slider');
              $this->load->view('pages/body');
              $this->load->view('template/footer');
      
        }

      public function signup (){
          if($this->uri->uri_string()==="users/signup"){ 
              $data['countries'] = $this->users_model->GetAllCountries();
              $this->form_validation->set_rules('name','Name','required');
              $this->form_validation->set_rules('country','Country','required');
              $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
              $this->form_validation->set_rules('password','Password','required|min_length[6]');
              $this->form_validation->set_rules('conf_password','Confirm pasword','matches[password]');
              $this->form_validation->set_rules('userfile', 'Image', 'trim');
               if($this->form_validation->run()==FALSE){
                  $this->load->view('template/header');
                  $this->load->view('pages/typo',$data);
                  $this->load->view('template/footer');
                }else {
                  if($_POST){
                   // $data['name']=$this->input->post('name');
                   // $data['country']=$this->input->post('country');
                   // $data['email']=$this->input->post('email');
                   // $data['password']=md5($this->input->post('password'));
                   // $data['date']= $this->input->post('date');
                   $name=$this->input->post('name');
                   $country=$this->input->post('country');
                   $email =$this->input->post('email');
                   $password = $this->myhash($this->input->post('password'));
                   // $enc_password = $this->input->post('password');

                   // $enc_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

                   //image upload------------------------------------
                    $config['upload_path'] ='./assets/uploads/';
                    $config['allowed_types'] ='gif|jpg|png|jpeg|pdf';
                    $config['max_size'] ='2048';
                    $config['max_width'] = '5000';
                    $config['max_height'] ='60000';

                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload()){
                      $errors = array('error'=>$this->upload->display_errors());
                      $userfile = 'noimage.jpg';
                      var_dump($errors);die;
                    }else{
                      $data = array('upload_data'=>$this->upload->data());
                      $userfile = $_FILES['userfile']['name'];
                    }
                      //close image upload ---------------------------
                      $date = $this->input->post('date');
                      // $data_arr=$this->security->xss_clean($data);
                      // $InsertId=$this->users_model->create('tbl_users',$data_arr);
                      $InsertId = $this->users_model->create($name,$country,$email,$password,$userfile,$date);
                      $this->session->set_userdata($InsertId);
                     if($InsertId){ 
                        $InsertCode['user_id'] = $InsertId;
                        $InsertCode['email'] = $this->input->post('email');
                        $InsertCode['code'] = rand(0,10000);
                        $this->users_model->InsertCode('tbl_code',$InsertCode);
                     }
                      $this->session->set_flashdata('msg_success','USERS CREATED! PLEASE LOGIN');
                      //json_encode(array('statusCode'=>200));
                      redirect('login/Login_user');
                      // $this->load->view('template/header');
                      // $this->load->view('pages/typo');
                      // $this->load->view('template/footer');
                }else{
                  $this->load->view('template/header');
                  $this->load->view('pages/typo');
                  $this->load->view('template/footer');
                }
              }

          }else{
              echo " 404 page not found ";
           }
       }

      public function login_user(){
                //$this->users_model->get_image();
                     $UserId = $this->session->userdata('id')->id;
                     $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                     $this->form_validation->set_rules('email','Email','required');
                     $this->form_validation->set_rules('password','Password','required');
                     if($this->form_validation->run()==FALSE){
                         $this->load->view('template/header',$data);
                         $this->load->view('pages/login_user');
                         $this->load->view('template/footer');
                       }elseif($_POST){
                         $email = $this->input->post('email');
                         $password  = $this->input->post('password');
                         // var_dump($password);die;

                        //$id = $this->users_model->login_user($email,$password);

                        $id= $this->db->get_where('tbl_users',array('email'=>$email,'password'=>$this->myhash($password)))->row();
                        $getOneUser = $this->users_model->getSingleUser($id->id);
                              if($id){
                              $data_arr = array(
                              'id'=>$id,
                              'email'=>$email,
                              'logged_in'=>true
                               );
                               $this->session->set_userdata($data_arr);
                               $this->session->set_userdata('image',$getOneUser->userfile);
                               $this->session->set_userdata('name',$getOneUser->name);
                               //$this->session->set_flashdata('success',' login successful');
                               redirect('users/product');
                              }else {
                              $this->session->set_flashdata('error',' wrong username or password ');
                              redirect('users/login_user');
                           }
                       }else{
                              $this->session->set_flashdata('error',' please login ');
                              redirect('login/login_user');
                   }

        }

      // public function login_user(){

      //     $usertype = "staff";
      //     $UserId = $this->session->userdata('id');
      //     $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
      //     if($_POST){
      //       $this->form_validation->set_rules('email','Email','required');
      //       $this->form_validation->set_rules('password','Password','required');
      //       if($this->form_validation->run()){
      //         $email = $this->input->post('email');
      //         $password = $this->input->post('password');
      //         $user_login = $this->db->get_where('tbl_users',array('email'=>$email,'password'=>$this->myhash($password)))->row();

      //         if( $user_login){
      //           $data_arr = array(
      //             'id'=>$id,
      //             'email'=>$email,
      //             'logged_in'=>TRUE
      //           );
      //           $this->session->set_userdata($data_arr);
      //           $this->session->set_userdata('image',$getOneUser->userfile);
      //           $this->session->set_userdata('name',$getOneUser->name);
      //           //$this->session->set_flashdata('success',' login successful');
      //           redirect('users/product');
      //         }else{
      //           $this->session->set_flashdata('error',' wrong username or password ');
      //          redirect(base_url('users/login_user'));
      //         }
      //       }else{
      //         $this->load->view('template/header',$data);
      //         $this->load->view('pages/login_user');
      //         $this->load->view('template/footer');
      //       }
      //     }else{
      //       $this->load->view('template/header',$data);
      //       $this->load->view('pages/login_user');
      //       $this->load->view('template/footer');
      //     }

      //   }

          public function check_email_exists($email){
              $this->form_validation->set_message('check_email_exists','that email already exist');
              if($this->users_model->check_email_exists($email)){
              return true;
              }else{
              return false;
                }
              }
           public function about(){
            if($this->uri->uri_string()=="users/about"){
              $UserId= $this->session->userdata('id');
              $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
              $this->load->view('template/header',$data);
              $this->load->view('pages/about');
              $this->load->view('template/footer');
            }else{
              echo " 4004 page not found ";
            }
            
               }

            public function product(){
              if(!$this->session->userdata('logged_in')){
                  $this->session->set_flashdata('msg_loggin','Please Login');
                  redirect('login/Login_user');
              }else{
                  if($_POST){
                      $data['user_id']= $this->input->post('user_id');
                      $data['product_id']= $this->input->post('product_id');
                      $data['userfile'] = $this->input->post('userfile');
                      $data['prod_name'] = $this->input->post('prod_name');
                      $data['prod_price'] = $this->input->post('prod_price');
                      $data['prod_brand'] = $this->input->post('prod_brand');
                      $data['prod_quantity'] = $this->input->post('prod_quantity');
                      $data['created_at'] = date("M-D-Y");
                      $AddIntoCart = $this->users_model->AddIntoCart('tbl_cart',$data);
                    if($AddIntoCart){
                       $UserId = $this->input->post('user_id');
                         $data = array(
                           'user_id'=> $UserId ,
                           'prod_price'=> $data['prod_price'],
                           'quantity'=>$data['prod_quantity'],
                           'wallet_amt'=>number_format($data['prod_price'] / 50 * $data['prod_quantity'])
                         );
                         $this->users_model->InsetIntoWallet('tbl_wallet',$data);
                         $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                         $this->session->set_flashdata('prod_inserted','Product Inserted into Cart');
                         redirect('users/product');
                          //$this->load->view('pages/product',$data);
                     }else{
                       $this->session->set_flashdata('prod_error','Product Creation failed');
                       redirect(base_url('users/product'));
                     }
                   }
                    $unique_id = $this->session->userdata('id');
                    $UserId = $unique_id->id;
                    $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                    // var_dump( $data['demo']);die;
                    $data['countries'] = $this->users_model->GetAllCountries();
                    $this->session->set_userdata('prod_id',$data['countries']);
                    $data['GetProd']= $this->users_model->GetAllProduct();
                    $this->load->view('template/header',$data);
                    $this->load->view('pages/product',$data);
                    $this->load->view('template/footer');
              }
            }


              public function ViewEachProduct($id){
               $data['title'] = 'Product Profile';
               $UserId= $this->session->userdata('id');
               $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
               $data['countries'] = $this->users_model->GetAllCountries();
               $data['GetSingleProduct']=$this->users_model->GetSingleProduct($id);
               $this->load->view('template/header',$data);
               $this->load->view('pages/eachproduct',$data);
               $this->load->view('template/footer');
                }
              
            public function contact(){
              if($this->uri->uri_string()==="users/contact"){
                $UserId= $this->session->userdata('id');
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/contact',$data);
                $this->load->view('template/footer');
              
              }else{
               echo " 404 page not found ";
              }
             
            }

              public  function generateRandomString($length = 10) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return  $randomString;
                }

               public function checkout(){
                  // $UserId= $this->session->userdata('id');
                  // $data['userprofile'] = $this->users_model->GetActiveCart($UserId);
                  // $data['oneuser'] = $this->users_model->GetUser('tbl_users',$UserId);

                if($_POST['type']==1){
                    $data['user_id'] = $this->session->userdata('id');
                    $data['s_name'] = $this->input->post('s_name');
                    $data['s_email'] = $this->input->post('s_email');
                    $data['s_country'] = $this->input->post('s_country');
                    $data['s_state'] = $this->input->post('s_state');
                    $data['s_land_mass'] = $this->input->post('s_land_mass');
                    $data['created_at'] =  date("i:sa");
                    // echo "<pre>"; print_r($data); die;
                    $time = $this->session->set_userdata( $data['created_at']);
                    $this->session->set_userdata('s_email',$data['s_email']);
                    $shipping = $this->users_model->InsertIntoShipping('tbl_shipping',$data);
                      if($shipping){
                      echo json_encode(array("statusCode"=>200));
                       //redirect(base_url('users/very_shipping'));
                      }else{
                       echo json_encode(array("statusCode"=>201));
                        //redirect(base_url('users/login_user'));
                      }
                      }else{
                      $UserId = $this->session->userdata('id');
                      $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                      $data['title_name'] = "Shipping Details ";
                      $data['countries'] = $this->users_model->GetAllCountries();
                      $this->session->set_userdata('data',$data);
                      $this->load->view('template/header',$data);
                      $this->load->view('pages/checkout',$data);
                      $this->load->view('template/footer');
                    }
                 }

           public function very_shipping (){
                $data['title_name'] = "Shipping Details ";
                $UserId = $this->session->userdata('id');
                $time =  date("i:sa");
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);

                $data['getship'] = $this->users_model->GetVerifyUser($time);

                $this->load->view('template/header',$data);
                $this->load->view('pages/very_shipping',$data);
                $this->load->view('template/footer');
            }

           public function pay_from_wallet(){
              $verify_amt = $this->session->userdata('very_amt');
              $wallet = $this->input->post('wallet');
              if($_POST){
               if($verify_amt == $wallet){
               // echo "<pre>"; print_r('they match');die;
               //redirect(base_url('users/very_shipping'));
               }else{
                // $this->data['demo'] = " Sorry! Insuffficent wallet ballance";
                $this->load->view('template/header');
                $this->load->view('pages/very_shipping',$this->data);
                $this->load->view('template/footer');
              }
             }else{
              $this->load->view('template/header');
              $this->load->view('pages/very_shipping');
              $this->load->view('template/footer');
           }
        }
         public function viewcart(){
            $UserId = $this->session->userdata('id');
            $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
            $this->load->view('template/header',$data);
            $this->load->view('pages/viewcart',$data);
            $this->load->view('template/footer');

           }

          public function deleteusercart($id){
              $deletecart=$this->users_model->deletecart($id);
              if($deletecart){
              redirect(base_url('users/viewcart'));
              }else{
              print_r("cannot delete");
              }
             }

           public function export_csv(){
                  /* file name */
                    $UserId = $this->session->userdata('id');
                    $demo = $this->users_model->GetCart($UserId);
                    //   echo "<pre>";
                    //   print_r($value); die;
                    $filename = 'viewcart'.date('Ymd').'.csv';
                    header("Content-Description: File Transfer");
                    header("Content-Disposition: attachment; filename=$filename");
                    header("Content-Type: application/csv; ");
                     /* get data */
                    /* file creation */
                    // $file = fopen('php:/* output','w');
                    $file = fopen('php://output', 'w');
                    $header = array("prod_name","prod_price","prod_brand","prod_quantity");
                    fputcsv($file, $header);
                    foreach ($demo as $key => $value) {
                      // code...
                      $body = array($value->prod_name, $value->prod_price, $value->prod_brand, $value->prod_quantity);
                      fputcsv($file,$body);
                    }
                    fclose($file);
                    exit;
             }


               public function services(){
                $UserId= $this->session->userdata('id');
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/services');
                $this->load->view('template/footer');
                 }
               public function ourwork(){
                $UserId= $this->session->userdata('id');
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/ourwork');
                $this->load->view('template/footer');
                }
               public function process(){
                $UserId= $this->session->userdata('id');
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/process');
                $this->load->view('template/footer');
                   }
               public function typo(){
                $this->load->view('template/header');
                $this->load->view('pages/typo');
                $this->load->view('template/footer');
                  }

               public function flutter_response(){
                 $code = $this->generateRandomString();
                 $this->session->set_userdata('code',$code);
                 $status = $this->input->get('status',TRUE);
                 $ref = $this->input->get('tx_ref',TRUE);
                   if($tatus){
                  $curl = curl_init();

                  curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/123456/verify",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer {{SEC_KEY}}"
                  ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;

                redirect('users/flutter_response');

              }else{
                $UserId = $this->session->userdata('id');
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/flutter_response');
                $this->load->view('template/footer');
              }

              }


         public function tracking(){
            $this->load->library('email');
            if($_POST){
               $data['user_id'] = $this->session->userdata('id');
               $data['tracking_code'] = $this->generateRandomString();
               // echo "<pre>"; print_r($data); die;
               $this->users_model->InsertIntoShipment('tbl_users_shipment',$data);
               $code = $data['tracking_code'];
             // mail configuration------------------------------
                    $config = array();
                    $config['useragent'] = "CodeIgniter";
                    $config['protocol'] = "smtp";
                    $config['smtp_host'] = "ssl://smtp.gmail.com";
                    $config['smtp_port'] = "465";
                    $config['mailtype'] = 'html';
                    $config['smtp_user'] = 'ennaxtechnologies@gmail.com';
                    $config['smtp_pass'] = 'Ennax8899xx';
                    $config['charset'] = 'utf-8';

                    $config['newline'] = "\r\n";
                    $config['wordwrap'] = TRUE;

                    $this->email->initialize($config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");

                    //Email content
                    $htmlContent ='<center> <div style="background:#ffffff;width:40%;text-align:center;padding:30px;"><h1> Ennax Technologies</h1> <h2>Tracking Code</h2> <br><h2 style="color:grey;">'.$code.'</h2></div></center>';
                    //$htmlContent .= '<p>This email has sent via Gmail SMTP server from CodeIgniter application.</p>';

                    //$this->email->to('enakpomiller8899@gmail.com');
                    $this->email->to($email = $this->session->userdata('s_email'));
                    $this->email->from('ennaxtechnologies@gmail.com','Ennax Tech');
                    $this->email->subject(' Tracking ');
                    $this->email->message($htmlContent);
                    //Send email
                    if ($this->email->send()){
                     // var_dump(" email send");die;

                    }else {
                    var_dump(($this->email->print_debugger())); die;
                        }
                    #END OF EMAIL

                    }
                    redirect('users/flutter_response');
                }

        public function trackshipment(){
            if(!$this->session->userdata('logged_in')){
            redirect('login/Login_user','refresh');
            }else{
             if($_POST){
                 $UserId = $this->session->userdata('id');
                 $TrackingCode = $this->input->post('trackcode');
                 $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                 $data['track'] = $this->users_model->GetTrackingId($TrackingCode,$UserId);
                 $data['GetShipment'] = $this->users_model->GetShipment('tbl_shipping',$UserId);
                 if($UserId==$data['track']->user_id){
                     $this->load->view('template/header',$data);
                     $this->load->view('pages/trackshipment',$data);
                     $this->load->view('template/footer');
                 }else{
                  $this->session->set_flashdata('error_tracking','Incorrect tracking code');
                  redirect('users','refresh');
                 }
               }else{ redirect(base_url('users','refresh')); }
              }
            }

      public function like_prod(){
        if($_POST){
          $search_key  = $this->input->post('search');
          var_dump($search_key);die;
               $result = $this->users_model->get_like_product($search_key);
               if($result){
                echo json_encode(array("statusCode"=>200));
                }else{
                 echo json_encode(array("statusCode"=>201));
               }
        }else{
          $this->load->view('template/header');
          $this->load->view('pages/like_prod');
          $this->load->view('template/footer');
        }


       }

      // public function like_prod(){
      //   $this->load->view('template/header');
      //   $this->load->view('pages/like_prod');
      //   $this->load->view('template/footer');
      // }

      
        public function comment(){
          $id = $this->uri->segment(3);
          $UserId = $this->session->userdata('id');
          $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
          $data['result'] = $this->users_model->SingleProduct($id);

          if($_POST){
            // echo "<pre>"; print_r($_POST);die;
               $comment['prod_id'] = $this->input->post('prod_id');
               $comment['prod_title'] = $this->input->post('prod_title');
               $comment['name'] = $this->input->post('name');
               $comment['body'] = $this->input->post('content');
               $comment['userfile'] = $this->input->post('userfile');
               $comment['date'] = $this->input->post('date');
               $InsertComment = $this->users_model->CreateComment('tbl_comment',$comment);
                if($InsertComment){
                   echo json_encode(array("statusCode"=>200));
                 }else{
                  echo json_encode(array("statusCode"=>201));
                 }
           }else{
             $data['getcomment'] = $this->db->get_where('tbl_comment',(array('prod_id'=>$id )))->result();
             $this->load->view('template/header',$data);
             $this->load->view('pages/comment',$data);
             $this->load->view('template/footer');
          }
        }


       public function single_prod(){
            if($this->session->userdata('logged_in')==FALSE){
                redirect(base_url('users/login_user'));
             }
            $id = $this->uri->segment(3);
            $this->session->set_userdata('prod_id',$id);
            $UserId = $this->session->userdata('id');
            $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
            $data['prod_details'] = $this->users_model->SingleProduct($id);
            if($_POST){
                $data = array(
                  'user_id' => $this->input->post('user_id'),
                  'product_id' =>$this->input->post('product_id'),
                  'userfile' => $this->input->post('userfile'),
                  'prod_name' => $this->input->post('prod_name'),
                  'prod_price' => $this->input->post('prod_price'),
                  'prod_brand' => $this->input->post('prod_brand'),
                  'category' => $this->input->post('category'),
                  'prod_quantity' => $this->input->post('prod_quantity'),
                  'created_at' => $this->input->post('date')
                );
              $AddIntoCart = $this->users_model->AddIntoCart('tbl_cart',$data);
                 if($AddIntoCart){
                   $UserId = $this->input->post('user_id');
                    $data_cart = array(
                      'user_id'=> $UserId ,
                      'prod_price'=> $data['prod_price'],
                      'quantity'=>$data['prod_quantity'],
                      'wallet_amt'=>number_format($data['prod_price'] / 50 * $data['prod_quantity'])
                    );
                    $this->users_model->InsetIntoWallet('tbl_wallet',$data_cart);

                    $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                    $this->session->set_flashdata('prod_inserted','Product Inserted into Cart');
                    redirect('users/single_prod');
                    //$this->load->view('pages/product',$data);
                 }else{
                  $this->session->set_flashdata('failed',' Product creation failed');
                  return redirect(base_url('users/single_prod'));
                }
             }else{
                $get_view_prod = $this->db->get_where('tbl_product',array('id'=>$id))->row();
                 if(isset($id)){
                    $num_views = $counter =  1;
                    $data_arr = array(
                    'product_id' => $get_view_prod->id,
                    'user_id' =>$this->session->userdata('id'),
                    'prod_name'  => json_encode(array($get_view_prod->prod_name)),
                    'prod_price' => $get_view_prod->prod_price,
                    'userfile' => $get_view_prod->userfile,
                    'no_views' => $num_views
                   );
                   $ExistProd = $this->db->get_where('tbl_viewed_prod',array('product_id'=>$id))->row();
                     if(isset($id) && ($ExistProd)){
                       $num_views+=$ExistProd->no_views;
                       $get_view_prod = $this->db->get_where('tbl_product',array('id'=>$id))->row();
                       $views= $this->users_model->update_view_prod('tbl_viewed_prod',$get_view_prod,$num_views,$id);
                       $data['num_views'] = $ExistProd->no_views;
                       $data['num_likes'] = $this->db->get_where('tbl_viewed_prod',array('product_id'=>$id))->row()->likes;
                     }else{
                       $this->users_model->insert_into_viewprod('tbl_viewed_prod',$data_arr);
                     }

                 }else{
                   var_dump(" product not set "); die;
                 }
                   $get_prod_name = $this->db->get_where('tbl_product',array('id'=>$id))->row()->category;
                   $viewed_prod = $this->db->get_where('tbl_product',array('id'=>$id))->row();
                   $data['similar'] = $this->users_model->get_same_prod('tbl_product',$get_prod_name);
                   $data['cust_feedback'] = $this->users_model->get_feedback($id);
                   $data['single_img'] = $this->users_model->get_single_image($id);
                   $this->load->view('template/header',$data);
                   $this->load->view('pages/single_prod',$data);
                   $this->load->view('template/footer');

             }
        }


     public function no_likes(){
            if($this->input->post('type')==1){
              //$views = $this->db->get_where('tbl_product',array('id'=>$id))->row();
              $prod_id = $this->session->userdata('prod_id');
              $likes= 1;
              $check_likes = $this->db->get_where('tbl_viewed_prod',array('product_id'=>$prod_id))->row();
                if($check_likes->likes=='0'){
                  $UpdateLikes = $this->users_model->UpdateCountLikes('tbl_viewed_prod', $prod_id,$likes);
                }elseif($check_likes->likes!='0'){
                    $new_like = $this->db->get_where('tbl_viewed_prod',array('product_id'=>$prod_id))->row();
                    $num_likes = '1' + $new_like->likes;
                    $this->users_model->ReUpdateLikes('tbl_viewed_prod', $prod_id,$num_likes);
                    $count_likes = $this->db->get_where('tbl_viewed_prod',array('product_id'=>$prod_id))->row();
                    $like = $count_likes->likes;
                   //redirect(base_url('users/single_prod?like='.$like.' '));
                 }
                   echo json_encode(array("statusCode"=>200));


            }else{
              echo json_encode(array("statusCode"=>201));
              echo " cannot post ";
            }
       }



    public function wallet(){
      $this->data['title'] = 'user wallet';
      $UserId = $this->session->userdata('id');
      $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
      $this->data['user_name']= $this->users_model->getuser_namel('tbl_users',$UserId);
      $this->data['getwallet']= $this->users_model->getwalletval($UserId);
      if($this->data['getwallet']){
          $this->load->view('template/header',$data);
          $this->load->view('pages/wallet',$this->data);
          $this->load->view('template/footer');
      }else{
          $this->data['getwallet'] = " ? ";
          $this->load->view('template/header');
          $this->load->view('pages/wallet',$this->data);
          $this->load->view('template/footer');
      }
     }



     public function book(){
      $this->load->view('template/header');
      $this->load->view('pages/book');
      $this->load->view('template/footer');
    }

       public function make_payment(){

            $this->data['title'] = " Make Payment";
            $UserId = $this->session->userdata('id');
            $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);

          if($_POST){
               $verify_amt = $this->session->userdata('very_amt');
               $wallet = $this->input->post('wallet');
             if($verify_amt == $wallet)
                {
                  $this->data['msg'] = " Wallet Payment Successful";
                  $this->load->view('template/header',$data);
                  $this->load->view('pages/make_payment',$this->data);
                  $this->load->view('template/footer');
                }else{
                    $this->data['msg'] =  "  Insuffficent Wallet Ballance ". " ".'&#8358;'.number_format(($this->session->userdata('wallet_ballance')),2) ;
                    $this->load->view('template/header',$data);
                    $this->load->view('pages/make_payment',$this->data);
                    $this->load->view('template/footer');
                }
             }else{
                $this->load->view('template/header',$data);
                $this->load->view('pages/make_payment',$this->data);
                $this->load->view('template/footer');
             }
         }

     public function search_product(){
        if($_POST){
          $search = $this->input->post('search');
           if(!empty($search )){ 
              $this->db->like('category',$search);
              //$this->db->or_like('prod_price');
              //$this->db->or_like('prod_name',$search);
              $this->data['keyprod'] = $this->db->get('tbl_product')->result();
              if($this->data['keyprod']){
                   $this->load->view('pages/display_search',$this->data);
              }
              else{
                $this->load->view('pages/display_search',$this->data);
                // echo "<center> <img src='".base_url('assets/error_img/search.png')."' style='width:30%;'> </center>";
                // echo "<h4> <p class='text-center text-danger pt-4' style='position:relative;top:20px;'>  Please Enter A Product Key Word</p></h4>  ";
              }
           }else{
              echo "<center> <img src='".base_url('assets/error_img/notfound.png')."' style='width:30%;'> </center>";
              echo "<p class='text-center text-danger'>  Please Enter A Product Name </p> ";
           }
           
        }else{
          $this->data['title'] = " search product ";
          $this->load->view('template/header',$data);
          $this->load->view('pages/search_product',$this->data);
          //$this->load->view('template/footer');
        }
      }

    public function test (){
      sleep(3);
      $response = new stdClass;
      $response->status = "success";
      die(json_encode($response));
    }

          // public function viewcart(){
          //    // $UserId= $this->session->userdata('id');
          //    // $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
          //    // // pagination
          //    // if(!$this->session->userdata('logged_in')){
          //    // redirect(base_url('login/login_user'));
          //    // }else{
          //    //   // pagination
          //    //       // $config = array();
          //    //       // $config["base_url"] = base_url() . "users/viewcart";
          //    //       // $config["total_rows"] = $this->users_model->get_count();
          //    //       // $config["per_page"] =5;
          //    //       // $config["uri_segment"] = 3;
          //    //       // $config['attributes'] = array('class' => 'pagination-links');
          //    //       // $this->pagination->initialize($config);
          //    //       // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          //    //       //
          //    //       // $data["links"] = $this->pagination->create_links();
          //    //       // $data['displaycart'] = $this->users_model->get_cart($config["per_page"], $page,$UserId);
          //    //
          //    //       $this->load->view('template/header',$data);
          //    //       $this->load->view('pages/viewcart',$data);
          //    //        //$this->load->view('template/footer');
          //    // }
          //    // // end pagination
          //    // }


      public function myhash($string){
             return  hash("sha512", $string . config_item("encryption_key"));
              }

}

?>
