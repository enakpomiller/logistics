<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
 class Users_model extends CI_Model{
 protected $table = "tbl_cart";
 	 // public function create($table,$data_arr){
		 //         $this->db->insert($table,$data_arr);
		 //         $insertid = $this->db->insert_id();
		 //         return $insertid;
   //        }

    public function create($name,$country,$email,$enc_password,$userfile,$date){
       $data_arr = array(
       	'name'=>$name,
       	'country'=>$country,
       	'email'=>$email,
       	'password'=>$enc_password,
       	'userfile'=>$userfile,
       	'date'=>$date
       );
       $this->db->insert('tbl_users',$data_arr);
       $insertid = $this->db->insert_id();
       return $insertid;
       }
    public function check_email_exists($email){
       	$query = $this->db->get_where('tbl_users',array('email'=>$email));
       	if(empty($query->row_array())){
       	return true;
       	}else{
       	return false;
         }
         }

    public function InsertCode($table,$InsertCode){
        $query = $this->db->insert($table,$InsertCode);
        if($query){
        	return true;
        }else{
        return false;
        }
      }
    public function login_user($email,$password){
       	$this->db->where('email',$email);
       	$this->db->where('password', $password);
       	$result = $this->db->get('tbl_users');
       	if($result->num_rows()==1){
       	return $result->row(0)->id;
       	}else{
       	return false;
       	}
		 //$query = $this->db->get_where('tbl_users', array('email'=>$email, 'password'=>$password));
		//return $query->row_array();
		 }
    public function getSingleUser($id){
      	$this->db->select('*');
      	$this->db->from('tbl_users');
      	$this->db->where('id',$id);
      	$query = $this->db->get();
      	return $query->row();
       }
    public function GetAllCountries(){
    		$this->db->select('*');
    		$this->db->from('tbl_country');
    		$query = $this->db->get();
    		return $query->result();
    		}

    public function GetAllProduct(){
       	$this->db->select('tbl_product.id,tbl_product.userfile,tbl_product.prod_name,tbl_product.prod_price,tbl_product.prod_brand');
        $this->db->from('tbl_product');
        $query = $this->db->get();
        return $query->result();
        }
     public function GetSingleProduct($id){
         // $query = $this->db->get_where('tbl_product',array('id'=>$id));
         // return $query->row();
       	$this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
        }
      public function AddIntoCart($table,$data){
    		$this->db->insert($table,$data);
    		$count = $this->db->affected_rows();
    		return $count;
        }
      public  function GetCart($UserId ){
		  //$response = array();
        $this->db->order_by('id','DESC');
    		$this->db->select('prod_name,prod_price,prod_brand,prod_quantity');
        $this->db->where('user_id',$UserId);
    		$response = $this->db->get('tbl_cart')->result();
      	// $response = $q->result();
       	return $response;
        }
         // public function verify_userid($table,$email,$userid){
         // 	  $this->db->select('*');
         // 	  $this->db->from($table);
         // 	  $this->db->where('email',$email);
         // 	  $this->db->where('id',$userid);
         // 	  $query = $this->db->get();
         // 	  return $query->row();
         //
         // }
      public function check_email_exist($table,$email){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('email',$email);
        $query = $this->db->get();
        return $query->row();
        }
      public function verify_email_code($email,$Givetoken){
    	  $data = array(
    	  'verify_code'=>$Givetoken
    	   );
    	  $this->db->where('email',$email);
    	  return $this->db->update('tbl_users',$data);
       }
      public function GetToken($table,$verify_code){
      	$this->db->select('*');
      	$this->db->from($table);
      	$this->db->where('verify_code',$verify_code);
      	$query = $this->db->get();
      	return $query->row();
        }
      public function UpdatePassword($Gettoken, $hashed){
        $data = array(
        'password'=>$hashed
         );
         $this->db->where('verify_code',$Gettoken);
         return $this->db->update('tbl_users',$data);
        }
       public function GetCartProd($table,$UserId){
        // $this->db->limit(10);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('user_id',$UserId);
        $query =  $this->db->get();
       //$data['count']=$query->num_rows();
        return $query->result();
        }

        public function GetActiveCart($UserId){
    	    $this->db->select('*');
    	    $this->db->from('tbl_users');
    	    $this->db->join('tbl_cart','tbl_users.id=tbl_cart.user_id');
    	    $this->db->where('user_id',$UserId);
    	    $query = $this->db->get();
    	    if($query){
          return $query->result();
    	     	}
          }
         public function GetUser($table,$UserId){
       	  $query = $this->db->get_where($table,array('id'=>$UserId));
       	  return $query->row();
           }
         public function InsertIntoShipping($table,$data){
          $this->db->insert($table,$data);
          $insertid = $this->db->insert_id();
          return $insertid;
          }
         public function GetVerifyUser($time){
         	  $this->db->select('*');
         	  $this->db->from('tbl_users');
         	  $this->db->join('tbl_shipping','tbl_users.id=tbl_shipping.user_id');
         	  // $this->db->where('user_id',$UserId);
         	  $this->db->where('created_at',$time);
         	  $query = $this->db->get();
         	  return $query->result();
            }
          public function InsertIntoShipment($table,$data){
         	    $this->db->insert($table,$data);
         	    return true;
            }
          public function  GetTrackingId( $TrackingCode){
         	    $this->db->select('*');
         	    $this->db->from('tbl_users');
         	    $this->db->join('tbl_users_shipment','tbl_users.id=tbl_users_shipment.user_id');
         	    $this->db->join('tbl_shipping','tbl_users.id=tbl_shipping.user_id');
         	    $this->db->where('tracking_code', $TrackingCode);
         	    $query = $this->db->get();
         	    return $query->row();
         	     // $query = $this->db->get_where('tbl_users_shipment',array('tracking_code'=>$dim));
         	     // return $query->row();
            }
           public function GetShipment($table,$UserId){
              $this->db->select('*');
              $this->db->from($table);
              $this->db->where('user_id',$UserId);
              $query = $this->db->get();
              return $query->row();
            }
           public function SingleProduct($id){
      	 	   $query = $this->db->get_where('tbl_product',array('id'=>$id));
      	 	   return $query->row();
              }
            public function CreateComment($table,$comment){
                $this->db->insert($table,$comment);
                return true;
               }
                 // public function PutComment($table,$data){
                 //$this->db->insert($table,$data);
                 //return $this->db->affected_rows()==1;
                 // }

              public function get_count(){
                return $this->db->count_all($this->table);
               }

                // public function get_cart($limit,$start,$UserId){
                //   $this->db->limit($limit,$start);
                //   $this->db->where('user_id',$UserId);
                //   $query = $this->db->get($this->table);
                //   return $query->result();
                // }

                // public function displaysingletcart($table,$UserId){
                //   $this->db->select('*');
                //   $this->db->from($table);
                //   $this->db->where('user_id',$UserId);
                //   $query = $this->db->get();
                //   return $query->result();
                // }
              public function deletecart($id)
              {
                $this->db->where('id',$id);
                $this->db->delete('tbl_cart');
                return true;
              }
              public function InsetIntoWallet($table,$data)
                {
                $this->db->insert($table,$data);
                $insertid = $this->db->insert_id();
                return $insertid;;
               }

              public function getwalletval($UserId){
                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->join('itbl_wallet','tbl_users.id=itbl_wallet.user_id');
                $this->db->where('itbl_wallet.user_id',$UserId);
                $this->db->where('tbl_users.id',$UserId);
                $query = $this->db->get();
                return $query->result();
              }
             public function getuser_namel($table,$UserId)
             {
              $this->db->select('name,userfile');
              $this->db->from($table);
              $this->db->where('id',$UserId);
              $query = $this->db->get();
              return $query->row();
             }


             public function myhash($string){
              return  hash("sha512", $string . config_item("encryption_key"));
                  }

}

?>
