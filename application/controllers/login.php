<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('vet_model','vet_model');
        $this->load->model('user_model','um');
       
    }
	public function index()
	{
        if(isset($_SESSION['userID'])){
            redirect('vetclinic','refresh');
        }
		$this->form_validation->set_rules('uname','Username','required', array('required' => 'Invalid Username or Password.'));
        if($this->form_validation->run()==TRUE)
            $this->form_validation->set_rules('pass','Password','callback_verifyLogin');
        if($this->form_validation->run()==FALSE){
            $this->load->view('clinic/login');
        }
        else {
            // if($this->session->userdata('isDoctor')>0)
            //     echo 'DOCTOR!';
            // else
            //     echo 'NOT DOCTOR!';
            // print_r($_SESSION['isDoctor']);
            redirect('vetclinic','refresh');        
        }
	}
    
    public function verifyLogin($password) {
        $username = $this->input->post('uname');
        
        $condition = array('username'=>$username, 'password'=>$password);
        $this->load->model('user_model','User');
        $result_array = $this->User->read($condition);
        
        if($result_array){
            foreach($result_array as $row){
                $this->session->set_userdata('userID', $row['userID']);
                $this->session->set_userdata('username', $row['username']);
                $this->session->set_userdata('isDoctor', $row['isDoctor']);
                
                /*$sess_data=array(
                    'username' => $row['username'],
                    'isDoctor' => $row['isDoctor']
                );*/
                //$this->session->set_userdata('logged_in', $sess_data);
            }
            return true;
        }
        else{
            $this->form_validation->set_message('verifyLogin','Invalid Username or Password.');
            return false;
        }
    }


    public function change_user(){
            $data=array('userID'=>$this->input->post('userID'),
                    'username'=>$this->input->post('username'));
            
            $this->form_validation->set_rules('username', 'username', 'trim|required');

                if($this->form_validation->run()){
                    $this->um->update($data);
                        $this->session->set_userdata('username',$data['username']);
                   $this->session->set_flashdata('confirm', 'Saved Succesfully!');
                }
                else{
                    
            
                     $this->session->set_flashdata('error', 'Please enter a Valid username');
                }

                redirect('vetclinic/accountsettings');




    }
    public function confirmpass($condition){

 $condition = array('userid'=>$this->input->post('userID'), 'password'=>$this->input->post('password'));
             $pass=$this->um->read($condition);
             if($pass==null){

                 $this->form_validation->set_message('password','Invalid Password.');

             }
                else{
                    return true;
                }


    }
    public function changepass(){
        //Array ( [userID] => 1 [password] => 1 [password_change] => 2 [password_confirm] => 3 )
          
       
       $this->form_validation->set_rules('password', 'Current password', 'trim|required|callback_confirmpass');
         $this->form_validation->set_rules('password_change', 'new password', 'trim|required');
       $this->form_validation->set_rules('password_confirm', 'confirm password', 'trim|required|matches[password_change]');
        if($this->form_validation->run()==FALSE){
                $record_data['title']='Change password';
        $record_data['notif']=$this->vet_model->notification();
        $record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
        $record_data['eventCounter'] = count($record_data['events']);
        $record_data['items'] = $this->vet_model->getAllZeroitems();    
                $this->load->view('include/header2',$record_data);
               $this->load->view('clinic/changepassword',['record_dat'=>$record_data]);
        }
        else {
            $data=array('userID'=>$this->input->post('userID'),
                'password'=>$this->input->post('password_confirm'));
                $this->um->updatepass($data);
            redirect('vetclinic/changepassword','refresh');        
        }




    }



    public function create(){
           // print_r($_POST);
//Array ( [username] => 123 [password] => 123 [password_confirm] => 123 )
       $this->form_validation->set_rules('username', 'Current password', 'trim|required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'new password', 'trim|min_length[5]|required');
       $this->form_validation->set_rules('password_confirm2', 'confirm password', 'trim|min_length[5]|required|matches[password]');
        if($this->form_validation->run()==FALSE){
                $record_data['title']='Change password';
        $record_data['notif']=$this->vet_model->notification();
        $record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
        $record_data['eventCounter'] = count($record_data['events']);
        $record_data['items'] = $this->vet_model->getAllZeroitems();    
                $this->load->view('include/header2',$record_data);
               $this->load->view('clinic/adduser',['record_dat'=>$record_data]);
        }
        else {

            $data=array('username'=>$this->input->post('username'),
                'password'=>$this->input->post('password_confirm2'));

                $this->um->create($data);
                     $this->session->set_flashdata('success', 'user '.$data['username'].' Succesfully added!');
            redirect('vetclinic/adduser','refresh');        
        }










    }
    
    public function logout(){
        session_destroy();
        redirect(base_url());
    
       }
}
