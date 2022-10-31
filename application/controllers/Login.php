
  <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <?php

  class Login extends CI_controller{
     public function __construct(){
          parent::__construct();         $this->load->database();
          $this->load->model('users_model');
          $this->load->helper('url','form','text');
          $this->load->library('session');
          $this->load->library('form_validation');
           }


      public function index(){

           }

         public function login_user(){
                 //$this->users_model->get_image();
                  if($_POST['type']==1){
                      $unique_id = $this->session->userdata('id');
                      $UserId = $unique_id ->id;
                      $data['demo'] = $this->users_model->GetCartProd('tbl_cart',$UserId);
                      $this->form_validation->set_rules('email','Email','required');
                      $this->form_validation->set_rules('password','Password','required');
                    if($this->form_validation->run()==FALSE){
                          $this->load->view('template/header',$data);
                          $this->load->view('pages/login_user');
                          $this->load->view('template/footer');
                     }else{
                          $email = $this->input->post('email');
                          $password = $this->input->post('password');
                          //$id = $this->users_model->login_user($email,$password);
                          $id = $this->db->get_where('tbl_users',array('email'=>$email,'password'=>$this->myhash($password)))->row();
                          $getOneUser = $this->users_model->getSingleUser($id->id);
                        if($id){
                               $data_arr = array(
                               'id'=>$id,
                               'email'=>$email,
                               'logged_in'=>true
                                );
                                $this->session->set_userdata($data_arr);
                                $this->session->set_userdata('id',$id);
                                $this->session->set_userdata('image',$getOneUser->userfile);
                                $this->session->set_userdata('name',$getOneUser->name);
                                $this->session->set_flashdata('success',' login successful');
                                echo json_encode(array("statusCode"=>200));
                        }else{
                          echo json_encode(array("statusCode"=>201));
                        }
                    }
                              // $this->session->set_flashdata('error',' please login ');
                              // redirect('login/login_user');
                  }else{
                    $this->load->view('template/header');
                    $this->load->view('pages/login_user');
                    $this->load->view('template/footer');
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

        public function verify_email(){
                $this->load->library('email');
                $Givetoken = rand(0,50000);
                // $token = $this->generateRandomString();
              if($_POST){
                   $userid = $this->session->userdata('id');
                   $email= $this->input->post('email');
                   //$verify = $this->users_model->verify_userid('tbl_users',$email,$userid)->id;
                   $check_emailexist= $this->users_model->check_email_exist('tbl_users',$email);


                    if($check_emailexist){
                      // SMTP
                         // echo json_encode(array("statusCode"=>200));
                         // // // mail configuration------------------------------
                                // $this->load->library('email');
                                // $config = array();
                                // $config['useragent'] = "CodeIgniter";
                                // $config['protocol'] = "smtp";
                                // $config['smtp_host'] = "takonajie.com";
                                // //$config['smtp_port'] = "465";
                                // $config['smtp_port'] = "587";
                                // $config['mailtype'] = 'html';
                                // $config['smtp_user'] = 'miller@takonajie.com';
                                // $config['smtp_pass'] = 'miller@takonajie.com';
                                // $config['charset'] = 'utf-8';
                                // $config['newline'] = "\r\n";
                                // $config['wordwrap'] = TRUE;
                                //
                                // $this->email->initialize($config);
                                // $this->email->set_mailtype("html");
                                // $this->email->set_newline("\r\n");
                                //
                                // $htmlContent .= '
                                //    <html>
                                //    <head>
                                //    <title></title>
                                //    </head>
                                //    <body style="background:#e1e5e8;height:700px;">
                                //       <center> <p> &nbsp;&nbsp; &nbsp;&nbsp;
                                //         <div style="background:white;height:600px;width:70%;">
                                //            &nbsp;&nbsp;
                                //           <h1 style="font-size:4vw;color:#15c;"> Logistic Services </h1>
                                //           <hr></hr>
                                //          <h1 style="font-size:2vw">  OTP </h1>
                                //          &nbsp;&nbsp;
                                //         <h1 style="font-size:2vw;background:#fe9900;width:25%;padding:10px 20px;border-radius:5px;">'.$Givetoken.'</h1>
                                //         </div>
                                //       </center>
                                //    </body>
                                //  </html>
                                //
                                //  ';
                                //
                                // //$this->email->to('enakpomiller8899@gmail.com');
                                // $this->email->to($email = $this->input->post('email')) ;
                                // $this->email->from('miller@takonajie.com','Ennax Tech');
                                // $this->email->subject('Please read ');
                                // $this->email->message($htmlContent);
                                //
                                // //Send email
                                // if($this->email->send()){
                                //
                                //     $email= $this->input->post('email');
                                //       var_dump(" email sent "); die;
                                //     $this->users_model->verify_email_code($email,$Givetoken);
                                //     $this->session->set_flashdata('otpsent',' otp has been sent to your email');
                                //     redirect(base_url('login/chanhepassword'));
                                //     }else {
                                //     var_dump(($this->email->print_debugger())); die;
                                //    }
                          // #END OF EMAIL


                   // php mailer
                      /*  start phpmailer */
                      /* Load PHPMailer library */
                             echo json_encode(array("statusCode"=>200));
                              $this->load->library('phpmailer_lib');

                              /* PHPMailer object */
                              $mail = $this->phpmailer_lib->load();
                              /* SMTP configuration */
                              $mail->isSMTP();
                              // $mail->isMail();
                              $mail->Host     = 'takonajie.com';
                              $mail->SMTPAuth = true;
                              $mail->Username = 'miller@takonajie.com';
                              $mail->Password = 'miller@takonajie.com';
                              $mail->SMTPSecure = 'ssl';
                              $mail->Port     = 465;

                              $mail->setFrom('miller@takonajie.com', 'Logistics');
                              $mail->addReplyTo('takonajie.com', 'CodexWorld');

                              /* Add a recipient */
                              $mail->addAddress($email = $this->input->post('email'));

                              /* Add cc or bcc */
                              $mail->addCC('cc@gmail.com');
                              $mail->addBCC('bcc@gmail.com');

                              /* Email subject */
                              $mail->Subject = 'Logistics';

                              /* Set email format to HTML */
                              $mail->isHTML(true);

                              /* Email body content */
                              $mailContent = '<center> <div style="border:1px solid blue;width:40%;text-align:center;padding:30px;"> <h2>Token</h2> <br><h2 style="background:cyian;padding:20pxpx;width:30%;margin:auto;">'.$Givetoken.'</h2></div></center>';
                              $mail->Body = $mailContent;

                              /* Send email */
                              if(!$mail->send()){
                                  echo 'Mail could not be sent.';
                                  echo 'Mailer Error: ' . $mail->ErrorInfo;
                              }else{
                                //var_dump(" mail has been sent"); die;
                                $email= $this->input->post('email');
                                $this->users_model->verify_email_code($email,$Givetoken);
                                $this->session->set_flashdata('mismatch','<div class="alert alert-warning"> otp has been sent to your email </div>');
                                //redirect('login/ChangePassword');

                               //echo 'Mail has been sent';
                              }
                              // /* end oho mailer */


                  } else{
                      // var_dump("wrong email"); die;
                       echo json_encode(array("statusCode"=>201));
                      //$this->session->set_flashdata("failed",' cannot send email ');
                     // redirect('login/verify_email');

                  }
            }else{
              $this->load->view('template/header');
              $this->load->view('pages/verify_email',$data);
              $this->load->view('template/footer');
            }
        }


  public function changepassword(){
            // $this->form_validation->set_rules('verify_code','code verification','required|trim');
            // $this->form_validation->set_rules('password','Password','required|trim');
            // $this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');

                if($_POST){
                    $verify_code = $this->input->post('verify_code');
                    $password = $this->input->post('password');
                    $conf_password = $this->input->post('conf_password');
                    $token  = $this->users_model->GetToken('tbl_users',$verify_code);
                    $Gettoken = $token->verify_code;
                      if($token && $password === $conf_password){
                           $this->users_model->UpdatePassword($Gettoken,$hashed=$this->myhash($password));
                           $this->session->set_flashdata('mismatch','<div class="alert alert-success">PASSWORD CHANGEED SUCCESSFULLY CLICK ON LOGIN </div>'. " <a class='btn btn-primary' href='".base_url('login/login_user')."'> login </a> ");
                           redirect(base_url('login/changepassword'));
                      }else if(!$token && $password === $conf_password){
                            $this->session->set_flashdata('mismatch','<div class="alert alert-danger"> INCORRECT TOKEN</div>');
                            redirect(base_url('login/changepassword'));
                      }else if($token && $password !=$conf_password){
                            $this->session->set_flashdata('mismatch','<div class="alert alert-danger"> PASSWORD MISMATCH</div>');
                            redirect(base_url('login/changepassword'));
                      }else{
                        $this->session->set_flashdata('mismatch','<div class="alert alert-danger"> PLEASE CHECK YOUR ENTRIES </div>');
                        redirect(base_url('login/changepassword'));
                      }

                }else{
                    $this->load->view('template/header');
                    $this->load->view('pages/changepassword');
                    $this->load->view('template/footer');
                }

   }

    public function logout(){
          $this->session->unset_userdata('id');
          $this->session->unset_userdata('email');
          $this->session->unset_userdata('logged_in');
          $this->session->set_flashdata('logout',' you are know logged out');
          redirect(base_url('users'));
    }


    public function myhash($string) {
  		    return  hash("sha512", $string . config_item("encryption_key"));

   }



  }

     ?>
