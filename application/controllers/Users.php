
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php

class Users extends CI_controller{
       public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('users_model');
        //$this->load->helper('url','form','text');
        $this->load->helper(array('form', 'url','text'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        // $this->load->library('ms_graph');
         }

       public function index(){
        $UserId= $this->session->userdata('id')->id;
        $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
        $this->load->view('template/header',$data);
        $this->load->view('template/slider');
        $this->load->view('pages/body');
        $this->load->view('template/footer');
         }

        public function signup (){
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
                $UserId= $this->session->userdata('id')->id;
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/about');
                $this->load->view('template/footer');
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
                           $UserId = $this->input->post('user_id')->id;
                             $data = array(
                               'user_id'=> $UserId ,
                               'prod_price'=> $data['prod_price'],
                               'quantity'=>$data['prod_quantity'],
                               'wallet_amt'=>number_format($data['prod_price'] / 50 * $data['prod_quantity'])
                             );
                             $this->users_model->InsetIntoWallet('itbl_wallet',$data);

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
              $UserId= $this->session->userdata('id')->id;
              $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
              $this->load->view('template/header',$data);
              $this->load->view('pages/contact',$data);
              $this->load->view('template/footer');
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

                if($_POST){
                    $data['user_id'] = $this->session->userdata('id')->id;
                    $data['s_name'] = $this->input->post('s_name');
                    $data['s_email'] = $this->input->post('s_email');
                    $data['s_country'] = $this->input->post('s_country');
                    $data['s_state'] = $this->input->post('s_state');
                    $data['s_land_mass'] = $this->input->post('s_land_mass');
                    $data['created_at'] =  date("i:sa");
                    $time = $this->session->set_userdata( $data['created_at']);
                    $this->session->set_userdata('s_email',$data['s_email']);
                    $shipping = $this->users_model->InsertIntoShipping('tbl_shipping',$data);
                      if($shipping){
                      redirect(base_url('users/very_shipping'));
                      }else{
                        die("wrong");
                      }
                      }else{
                      $UserId = $this->session->userdata('id')->id;
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
            $UserId = $this->session->userdata('id')->id;
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
             $UserId= $this->session->userdata('id')->id;
             $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
             $this->load->view('template/header',$data);
             $this->load->view("pages/viewcart",$data);
             $this->load->view('template/footer');
           }

          public function deleteusercart($id){
              $deletecart=$this->users_model->deletecart($id);
              if($deletecart){
              redirect(base_url('users/viewcart',''));
              }else{
              print_r("cannot delete");
              }
             }

           public function export_csv(){
                  /* file name */
                    $UserId = $this->session->userdata('id')->id;
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
                $UserId= $this->session->userdata('id')->id;
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/services');
                $this->load->view('template/footer');
                 }
               public function ourwork(){
                $UserId= $this->session->userdata('id')->id;
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/ourwork');
                $this->load->view('template/footer');
                }
               public function process(){
                $UserId= $this->session->userdata('id')->id;
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
                 $code= $this->generateRandomString();
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
                $UserId = $this->session->userdata('id')->id;
                $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                $this->load->view('template/header',$data);
                $this->load->view('pages/flutter_response');
                $this->load->view('template/footer');
              }

              }


         public function tracking(){
           $this->load->library('email');
            if($_POST){
               $data['user_id'] = $this->session->userdata('id')->id;
               $data['tracking_code'] = $this->generateRandomString();
               $this->users_model->InsertIntoShipment('tbl_users_shipment',$data);
               $code =$data['tracking_code'];
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
                 $UserId = $this->session->userdata('id')->id;
                 $TrackingCode = $this->input->post('trackcode');
                 $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                 $data['track'] = $this->users_model->GetTrackingId( $TrackingCode,$UserId);
                 $data['GetShipment'] = $this->users_model->GetShipment('tbl_shipping',$UserId);
                 if($UserId==$data['track']->user_id){
                 $this->load->view('template/header',$data);
                 $this->load->view('pages/trackshipment',$data);
                 //$this->load->view('template/footer');
                 }else{
                 $this->session->set_flashdata('error_tracking','Incorrect tracking code');
                  redirect('users','refresh');
                 }
               }else{ redirect(base_url('users','refresh')); }
              }
            }

        public function comment($id){
            $UserId = $this->session->userdata('id')->id;
            $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
            $data['result'] = $this->users_model->SingleProduct($id);
            if($_POST){
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('body','Message','required');
            $comment['prod_id'] = $this->input->post('prod_id');
            $comment['prod_title'] = $this->input->post('prod_title');
            $comment['name'] = $this->input->post('name');
            $comment['body'] = $this->input->post('body');
            $comment['userfile'] = $this->input->post('userfile');
            $comment['date'] = $this->input->post('date');
            // echo "<pre>"; print_r($comment); die;
            if($this->form_validation->run()===TRUE){
               $InsertComment = $this->users_model->CreateComment('tbl_comment',$comment);
               if($InsertComment){
                $this->session->set_flashdata('item','comment sent');
                 $this->load->view('template/header',$data);
                 $this->load->view('pages/comment',$data);
                 $this->load->view('template/footer');
                 echo json_encode(array("statusCode"=>200));
               }else{
                 echo json_encode(array("statusCode"=>201));
                // // $messge = array('message' => 'Wrong password enter','class' => 'alert alert-danger fade in');
                // // $this->session->set_flashdata('item',$messge );
                // redirect('users/comment','refresh');
               }

                }else{
                  $msg_sent = $this->session->set_flashdata('error','Comment Sent! thank you ');
                  $this->load->view('template/header',$data);
                  $this->load->view('pages/comment',$data);
                  $this->load->view('template/footer');
                }
            }else{
              $this->load->view('template/header',$data);
              $this->load->view('pages/comment',$data);
              $this->load->view('template/footer');
            }
        }

          public function wallet(){
            $this->data['title'] = 'user wallet';
            $UserId = $this->session->userdata('id')->id;
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

          public function make_payment(){
            $this->data['title'] = " Make Payment";
            $UserId = $this->session->userdata('id')->id;
            $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
            if($_POST){
               $verify_amt = $this->session->userdata('very_amt');
               $wallet = $this->input->post('wallet');
              if($verify_amt == $wallet){
                $this->data['msg'] = " Wallet Payment Successful";
                $this->load->view('template/header',$data);
                $this->load->view('pages/make_payment',$this->data);
                $this->load->view('template/footer');
             }else{
                  $this->data['msg'] =  "  Insuffficent Wallet Ballance ". " ".'&#8358;'.number_format(($this->session->userdata('wallet_ballance')),2) ;
                  $this->load->view('template/header',$data);
                  $this->load->view('template/header');
                  $this->load->view('pages/make_payment',$this->data);
                  $this->load->view('template/footer');
            }
           }else{
              $this->load->view('template/header',$data);
              $this->load->view('pages/make_payment',$this->data);
              $this->load->view('template/footer');
         }
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
