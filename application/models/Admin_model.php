<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php

 class Admin_model extends CI_Model{
     protected $table = "tbl_cart";
     protected $table2 = "tbl_comment";

 	   public function InsertCountry($data){
			  $data_arr = array(
			  'country'=>$data
			);
			  return $this->db->insert('tbl_country',$data_arr);
			  $InsertCountry = $this->db->insert_id();
			  return  $InsertCountry;
			}

	   public function check_country($country){

	   	       $this->db->select('tbl_country.country');
	   	       $this->db->from('tbl_country');
	   	       $this->db->where('country',$country);
	   	       $query = $this->db->get();
	   	       return $query->row();
				     	// $this->db->where('country',$country);
				     	// $result = $this->db->get('tbl_country');
				     	// if($result->num_rows()==1){
				     	// return $result->row(0)->id;
				     	// }else{
				     	// return false;
				     	// }

        }

    public function UploadProduct($userfile,$pname,$pprice,$pbrand){
	    $data = array(
	    	'userfile'=>$userfile,
	    	'prod_name'=>$pname,
	    	'prod_price'=>$pprice,
	    	'prod_brand'=>$pbrand,
	    	'created_at'=>date('M-D-Y')
	    );
	    return $this->db->insert('tbl_product',$data);
    }

     public function GetCartProd($table){
    	  // $this->db->select('*');
    	  // $this->db->from($table);
    	  // $this->db->where('user_id',$UserId);
    	  // $query =  $this->db->get();
    	  // $data['count']=$query->num_rows();
    	  // return $query->result();
	          $this->db->select('*');
	          $this->db->from('tbl_cart');
	          $query = $this->db->get();
	          return $query->result();
            }
          public function GetAllFromCart(){
 	         $this->db->select('tbl_cart.id');
 	         $this->db->from('tbl_cart');
 	         $query = $this->db->get();
 	         return $query->result();
                }
           public function DeleteCartByID($id){
     	      $this->db->where('id', $id);
            $this->db->delete('tbl_cart');
            return true;
             }
           public function UserCart($user_id){
     	      $this->db->select('*');
     	      $this->db->from('tbl_cart');
     	      $this->db->where('user_id',$user_id);
     	      $query = $this->db->get();
     	      return $query->result();
             }
          public function  DeleteActiveCart($id){
	    	   $this->db->where('id',$id);
	    	   $this->db->delete('tbl_cart');
	    	   return true;
           }
          public function UpdateCart(){
   			    $data_arr = array(
		    	'prod_name'=>$this->input->post('prod_name'),
		    	'prod_price'=>$this->input->post('prod_price'),
		    	'prod_brand'=>$this->input->post('prod_brand'),
		    	'prod_quantity'=>$this->input->post('prod_quantity')
   			    );
   			    $this->db->where('id',$this->input->post('id'));
   			    return $this->db->update('tbl_cart',$data_arr);

                }
           public function SearchUser($email){
	     	   // $this->db->select('*');
	     	   // $this->db->from('tbl_users');
	     	   // $this->db->join('tbl_cart','tbl_users.id=tbl_cart.user_id');
	     	   // $this->db->where('email',$email);
	     	   // $query = $this->db->get();
	     	   // return $query->result();

   				$this->db->select('*');
   				$this->db->from('tbl_users');
   				$this->db->where('email',$email);
   				$query = $this->db->get();
   				return $query->result();
               }
   public function GetCart($email){
   	       $this->db->select('*');
	     	   $this->db->from('tbl_users');
	     	   $this->db->join('tbl_cart','tbl_users.id=tbl_cart.user_id');
	     	   $this->db->where('email',$email);
	     	   $query = $this->db->get();
	     	   $data['count']=$query->num_rows();
	     	   return $query->result();

			        // $this->db->select('id, name as text');
			        // $this->db->like('name', $str);
			        // $query = $this->db->get('tbl_users');
			        // return $query->result();
   	         }
   public function GetShippingById($table,$userid){
   		    $this->db->select('*');
   		    $this->db->from($table);
   		    $this->db->where('user_id',$userid);
   		    $query = $this->db->get();
   		    return $query->row();
          }
      public function update_set($table,$userid,$location){
  	        $data = array(
  	        	'current_location'=>$location
  	        );
  	        $this->db->where('user_id',$userid);
  	        return $this->db->update($table,$data);
         }
      public function AdminLogin($table,$username,$password){
          $this->db->where('username',$username);
          $this->db->where('password',$password);
          $result = $this->db->get($table);
          if($result->num_rows()==1){
          return true;
          }else{
          return false;
          }
         }
     public function getusertype($table,$username){
        $query = $this->db->get_where($table,array('username'=>$username));
        return $query->row();
     }
         public function get_count(){
           return $this->db->count_all($this->table);
         }
         public function get_cart($limit,$start){
           $this->db->limit($limit,$start);
           $query = $this->db->get($this->table);
           return $query->result();
         }

         // public function GetAllComment($table){
         // $this->db->order_by('id','DESC');
         //   $this->db->select('*');
         //   $this->db->from($table);
         //   $query = $this->db->get();
         //   return $query->result();
         // }

         public function GetAllComment($limit,$start){
           $this->db->order_by('id','DESC');
           $this->db->limit($limit,$start);
           $query = $this->db->get($this->table2);
           return $query->result();
         }
         public function deletecomment($id){
           $this->db->where('id',$id);
           $this->db->delete('tbl_comment');
           return true;
         }

      public function CreateSeller($table, $data){
        $this->db->insert($table, $data);
        return true;
      }

      public function check_email_exists($email){
        $query = $this->db->get_where('tbl_admin_login',array('email'=>$email));
        if(empty($query->row_array())){
          return true;
        }else{
          return false;
        }
      }

      public function CheckEmailExist($table,$data){
        $query = $this->db->get_where($table,array('email'=>$data));
        return $query->row();
      }

      public function changepassword($table,$passconf,$adminid){
           $data = array(
             'password'=>$passconf
           );
           $this->db->where('id',$adminid);
           $this->db->update($table,$data);
           return true;
      }



    }

?>
