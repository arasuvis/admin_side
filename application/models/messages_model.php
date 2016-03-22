<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Messages_model extends CI_Model {

    var $name   = '';
    var $message = '';
    var $contact = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }

    function get_login($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        /*$this->db->where('username' , $username);
        $this->db->where('password' , $password);
        $query = $this->db->get('login');*/
        //$query = $this->db->get_where('login', array('username' => $username , 'password' =>$password) );
        
        $sql = $this->db->query("SELECT username,password FROM login 
        WHERE username='$username' AND password='$password'");

        //die($sql);

        $result = $sql->result();

        if(!empty($result))
        {
                return '1';
        }
        else
        {
                return '2';
        }
        //die();
        //return $query->result();
    }
    
    function get_all_entries()
    {
       
        $query = $this->db->get('messages');
        return $query->result();
    }

    function insert_entry($data)
    {		
		$this->email   = $data['email']; // please read the below note
        $this->password = $data['password'];
        $this->name = $data['name'];
		 $this->phone_number = $data['phone_number'];
        $this->address = $data['address'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->insert('messages', $this);
    }

    function update_entry($data)
    {
      $this->email   = $data['email']; // please read the below note
        $this->password = $data['password'];
        $this->name = $data['name'];
		 $this->phone_number = $data['phone_number'];
        $this->address = $data['address'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
		//print_r($data['id']);
		//exit;
        $this->db->update('messages', $this, array('id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('messages', array('id' => $id));
    }

    function get_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get('messages', 1);
        return $query->result();
    }
	
	 function get_all_relations()
    {       
		$query = $this->db->get('relations');
        return $query->result();
    }




}