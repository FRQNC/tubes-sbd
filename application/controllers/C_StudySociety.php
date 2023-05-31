<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_StudySociety extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_StudySociety');
	} 
	public function index()
	{
		$this->load->view('V_landing');
	}

    public function register(){
        $this->load->view('V_register');
    }

    public function login(){
        $this->load->view('V_login');
    }
    public function home(){
        $data['keyword'] = $this->input->get('keyword');
		$this->load->model('M_StudySociety');
		$data['search_result'] = $this->M_StudySociety->search($data['keyword']);
        $this->load->view('V_Home', $data,);
    }

    public function confirmRegistration()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
    $this->form_validation->set_rules('user_login_email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('user_login_password', 'Password', 'required|min_length[8]');

    if ($this->form_validation->run() == false) {
        redirect('C_StudySociety/register');
    }

    $username = $this->input->post('username');
    $email = $this->input->post('user_login_email');
    $password = password_hash($this->input->post('user_login_password'), PASSWORD_BCRYPT);
    $data = [
        'username' => $username,
        'email' => $email,
        'password' => $password
    ];
    $this->load->model('M_StudySociety');
    $result = $this->M_StudySociety->addUser($data);
    if ($result > 0) {
        redirect('C_StudySociety/login');
    } else {
        redirect('C_StudySociety/login');
    }
}

public function confirmLogin()
{
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('user_login_password', 'Password', 'required');

    if ($this->form_validation->run() == false) {
        redirect('C_StudySociety/login');
    }

    $username = $this->input->post('username');
    $form_password = $this->input->post('user_login_password');
    $this->load->model('M_StudySociety');
    $stored_password = $this->M_StudySociety->getUserPassword($username)[0];
    $result = password_verify($form_password, $stored_password->user_login_password);
    if ($result) {
        $user_login_data = $this->M_StudySociety->getUserLogin($username)[0];
        $data = [
            "user_login_id" => $user_login_data->user_login_id,
            "username" => $user_login_data->username,
            "user_login_privilege" => $user_login_data->user_login_privilege
        ];
        $this->session->set_userdata($data);
        redirect('C_StudySociety/home');
    } else {
        redirect('C_StudySociety/login');
    }
}

public function V_editUserInfo() {
    $dt = $this->M_StudySociety->getUserInfo($this->session->username);
    $data = array();
    $user_fullname = "";
    $user_birthday = "";
    $user_sex = "";
    $user_type = "";
    $user_institution = "";
    $user_bio = "";
    $user_photo = "default.jpg";
    if(!empty($dt)){
        $user_fullname = $dt[0]->user_fullname;
        $user_birthday = $dt[0]->user_birthday;
        $user_sex = $dt[0]->user_sex;
        $user_type = $dt[0]->user_type;
        $user_institution = $dt[0]->user_institution;
        $user_bio = $dt[0]->user_bio;
        $user_photo = $dt[0]->user_photo;
    }
         
    $data = [
        "user_fullname" => $user_fullname,
        "user_birthday" => $user_birthday,
        "user_sex" => $user_sex,
        "user_type" => $user_type,
        "user_institution" => $user_institution,
        "user_bio" => $user_bio,
        "user_photo" => $user_photo
    ];
    $this->load->view("V_EditUserInfo", $data);
}

public function editUserInfo(){
    $user_login_id = $this->input->post("user_login_id");
    $user_fullname = $this->input->post("user_fullname");
    $user_birthday = $this->input->post("user_birthday");
    $user_sex = $this->input->post("user_sex");
    $user_type = $this->input->post("user_type");
    $user_institution = $this->input->post("user_institution");
    $user_bio = $this->input->post("user_bio");
    $user_photo = "default.jpg";
    $data = [
        "user_login_id" => $user_login_id,
        "user_fullname" => $user_fullname,
        "user_birthday" => $user_birthday,
        "user_sex" => $user_sex,
        "user_type" => $user_type,
        "user_institution" => $user_institution,
        "user_bio" => $user_bio,
        "user_photo" => $user_photo
    ];
    $success = $this->M_StudySociety->editUserInfo($data);
    if($success > 0){
        redirect(site_url('C_StudySociety/home'));
    }
    if($success > 0){
        redirect(site_url('C_StudySociety/V_editUserInfo'));
    }
}


public function V_addPost(){
    $this->load->view("V_addPost");
}

}