
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
              // $this->load->library('email');
              $Givetoken = rand(0,50000);
              // $token = $this->generateRandomString();
              if($_POST){

                 $userid = $this->session->userdata('id');
                 $email= $this->input->post('email');
                        // if (!$this->input->is_ajax_request()) {
                        //     exit('No direct script access allowed');
                        // }
                 //$verify = $this->users_model->verify_userid('tbl_users',$email,$userid)->id;
                 $check_emailexist= $this->users_model->check_email_exist('tbl_users',$email);


                 // if($check_emailexist){
                 //   // // mail configuration------------------------------
                 //          $config = array();
                 //          $config['useragent'] = "CodeIgniter";
                 //          $config['protocol'] = "smtp";
                 //          $config['smtp_host'] = "ssl://smtp.gmail.com";
                 //          $config['smtp_port'] = "465";
                 //          $config['mailtype'] = 'html';
                 //          $config['smtp_user'] = 'ennaxtechnologies@gmail.com';
                 //          $config['smtp_pass'] = 'Ennax8899xx';
                 //          $config['charset'] = 'utf-8';
                 //
                 //          $config['newline'] = "\r\n";
                 //          $config['wordwrap'] = TRUE;
                 //
                 //          $this->email->initialize($config);
                 //          $this->email->set_mailtype("html");
                 //          $this->email->set_newline("\r\n");
                 //
                 //          //Email content
                 //          $htmlContent ='<center> <div style="background:skyblue;width:40%;text-align:center;padding:30px;"><h1> Ennax Technologies</h1> <h2>Token</h2> <br><h2 style="color:green;">'.$Givetoken.'</h2></div></center>';
                 //          //$htmlContent .= '<p>This email has sent via Gmail SMTP server from CodeIgniter application.</p>';
                 //
                 //          //$this->email->to('enakpomiller8899@gmail.com');
                 //          $this->email->to($email = $this->input->post('email')) ;
                 //          $this->email->from('ennaxtechnologies@gmail.com','Ennax Tech');
                 //          $this->email->subject('Please read ');
                 //          $this->email->message($htmlContent);
                 //
                 //          //Send email
                 //          if ($this->email->send()) {
                 //              $email= $this->input->post('email');
                 //
                 //              $this->users_model->verify_email_code($email,$Givetoken);
                 //              $this->session->set_flashdata('otpsent',' otp has been sent to your email');
                 //              redirect('login/ChangePassword');
                 //              }else {
                 //              var_dump(($this->email->print_debugger())); die;
                 //             }
                 //          #END OF EMAIL
                 //            }else{
                 //          // $this->session->set_flashdata('wrongemail',' wrong email ');
                 //          redirect('login/verify_email','refresh');
                 //       }




              if($check_emailexist){

                    /*  start phpmailer */

                    /* Load PHPMailer library */
                    $this->load->library('phpmailer_lib');

                    /* PHPMailer object */
                    $mail = $this->phpmailer_lib->load();

                    /* SMTP configuration */
                    $mail->isSMTP();
                    $mail->Host     = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ennaxtechnologies@gmail.com';
                    $mail->Password = 'Ennax8899xx';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port     = 465;

                    $mail->setFrom('ennaxtechnologies@gmail.com', 'Logistics');
                    $mail->addReplyTo('ennaxtechnologies@gmail.com', 'CodexWorld');

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
                    $mailContent = '<center> <div style="border:1px solid blue;width:40%;text-align:center;padding:30px;"><h1> Ennax Technologies</h1> <h2>Token</h2> <br><h2 style="background:cyian;padding:20pxpx;width:30%;margin:auto;">'.$Givetoken.'</h2></div></center>';
                    $mail->Body = $mailContent;

                    /* Send email */
                    if(!$mail->send()){
                        echo 'Mail could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                      $email= $this->input->post('email');

                      $this->users_model->verify_email_code($email,$Givetoken);
                      $this->session->set_flashdata('otpsent',' otp has been sent to your email');
                      redirect('login/ChangePassword');

                     //echo 'Mail has been sent';
                    }
                    /* end oho mailer */

                  }else{
                    redirect('login/verify_email','refresh');
                  }


               }

               $this->load->view('template/header');
               $this->load->view('pages/verify_email',$data);
               $this->load->view('template/footer');

           }



      public function changepassword(){
        if($_POST){
          $this->form_validation->set_rules('verify_code','verify_code','required|trim');
          $this->form_validation->set_rules('password','Password','required|trim');
          $this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]');
            if($this->form_validation->run()){
              $verify_code = $this->input->post('verify_code');
              $password = $this->input->post('password');
              $conf_password = $this->input->post('conf_password');
              $Gettoken = $this->users_model->GetToken('tbl_users',$verify_code)->verify_code;
                if($Gettoken){
                  if($password == $conf_password){
                    $hashed = $this->myhash2($conf_password);
                    $updatepass = $this->users_model->UpdatePassword($Gettoken,$hashed);
                    $this->session->set_flashdata('msg_success','Login with your new password ');
                    redirect('login/login_user');
                   }else{
                     var_dump("password mismatch");
                 }

                }else{
                  $this->session->set_flashdata('msg_error','Email does not exist!');
                  redirect('login/changepassword');
                }
            }else{
              $this->load->view('template/header');
              $this->load->view('pages/changepassword');
              $this->load->view('template/footer');
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
