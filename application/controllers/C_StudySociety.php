<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_StudySociety extends CI_Controller
{

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
        parent::__construct();
        $this->load->model('M_StudySociety');
    }
    public function index()
    {
        $this->load->view('V_landing');
    }

    public function register()
    {
        $this->load->view('V_register');
    }

    public function login()
    {
        $this->load->view('V_login');
    }
    public function home()
    {
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

            $folderPath = FCPATH . 'assets/userFiles/' . $username . '/';

            if (!file_exists($folderPath)) {
                if (mkdir($folderPath, 0777, true)) {
                    mkdir($folderPath . 'post_images/', 0777, true);
                    mkdir($folderPath . 'resource/pdf/', 0777, true);
                    mkdir($folderPath . 'resource/apkg/', 0777, true);
                    mkdir($folderPath . 'resource/ppt/', 0777, true);
                    mkdir($folderPath . 'resource/docx/', 0777, true);
                    mkdir($folderPath . 'resource/xls/', 0777, true);
                    mkdir($folderPath . 'resource/txt/', 0777, true);
                } else {
                    echo 'Unable to create the folder. ' . $folderPath;
                }
            } else {
                echo 'Folder already exists.';
            }

            redirect('C_StudySociety/login');
        } else {
            redirect('C_StudySociety/register');
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
                "user_login_privilege" => $user_login_data->user_login_privilege,
                "is_logged_in" => true
            ];
            $this->session->set_userdata($data);
            redirect('C_StudySociety/home');
        } else {
            redirect('C_StudySociety/login');
        }
    }

    public function V_editUserInfo()
    {
        $dt = $this->M_StudySociety->getUserInfo($this->session->username);
        $data = array();
        $user_fullname = "";
        $user_birthday = "";
        $user_sex = "";
        $user_type = "";
        $user_institution = "";
        $user_bio = "";
        $user_photo = "default.jpg";
        if (!empty($dt)) {
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

    public function editUserInfo()
    {
        $user_login_id = $this->input->post("user_login_id");
        $user_fullname = $this->input->post("user_fullname");
        $user_birthday = $this->input->post("user_birthday");
        $user_sex = $this->input->post("user_sex");
        $user_type = $this->input->post("user_type");
        $user_institution = $this->input->post("user_institution");
        $user_bio = $this->input->post("user_bio");
        $user_photo = $_FILES['user_photo']['name'];
        $user_photo_tmp = $_FILES['user_photo']['tmp_name'];

        $relativePath = '../../assets/userFiles/' . $this->session->username . '/';
        $uploadPath = realpath(__DIR__ . '/' . $relativePath) . '/';
        $filePath = $uploadPath . $user_photo;

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
        if ($success > 0) {

            move_uploaded_file($user_photo_tmp, $filePath);

            redirect(site_url('C_StudySociety/home'));
        }
        if ($success > 0) {
            redirect(site_url('C_StudySociety/V_editUserInfo'));
        }
    }

    public function V_userProfile()
    {
        $username = $_GET['username'];
        $user_data = $this->M_StudySociety->getUserInfo($username);
        if (!empty($user_data)) {
            $user_id = $user_data[0]->user_id;
            $user_posts = $this->M_StudySociety->getUserPosts($user_id);
            $data = [
                "username" => $username,
                "user_fullname" => $user_data[0]->user_fullname,
                "user_birthday" => $user_data[0]->user_birthday,
                "user_sex" => $user_data[0]->user_sex,
                "user_type" => $user_data[0]->user_type,
                "user_institution" => $user_data[0]->user_institution,
                "user_bio" => $user_data[0]->user_bio,
                "user_photo" => $user_data[0]->user_photo
            ];
            if(!empty($user_posts)){
                $data['user_posts'] = $user_posts;
            }
            else{
                $data['user_posts'] = "Kosong";
            }
            $this->load->view('V_userProfile', $data);
        } else {
            echo $username;
        }
    }


    public function V_addPost()
    {
        $gradeData = $this->M_StudySociety->getAllGrade();
        $topicData = $this->M_StudySociety->getAllTopic();
        $userData = $this->M_StudySociety->getUserInfo($this->session->username)[0];
        $data = ["grade" => $gradeData, "topic" => $topicData, "userdata" => $userData];
        $this->load->view("V_addPost", $data);
    }

    public function upload_image_to_post()
    {
        // Check if the request contains an uploaded image file
        if (!empty($_FILES['image']['name'])) {
            // Define the relative upload directory path
            $relativePath = '../../assets/userFiles/' . $this->session->username . '/post_images/';

            // Construct the absolute file system path
            $uploadPath = realpath(__DIR__ . '/' . $relativePath) . '/';

            // Generate a unique file name
            $fileName = uniqid() . '_' . $_FILES['image']['name'];

            // Construct the file system path
            $filePath = $uploadPath . $fileName;

            // Upload the file to the specified directory
            move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

            // Construct the image URL
            $imageUrl = base_url('assets/userFiles/' . $this->session->username . '/post_images/' . $fileName);

            // Prepare the response with the image URL
            $response = array(
                'success' => 1,
                'file' => array(
                    'url' => $imageUrl,
                ),
            );

            // Send the JSON response
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }

        // Handle error if no image file was found
        $response = array(
            'success' => 0,
            'message' => 'No image file received.',
        );

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function delete_image_from_post()
    {
        $imageUrl = $this->input->post('imageUrl');

        // Process the image URL to get the image filename
        $filename = basename($imageUrl);

        // Define the path to the image file
        $filePath = FCPATH . 'assets/userFiles/' . $this->session->username . '/post_images/' . $filename;

        // Check if the file exists and delete it
        if (file_exists($filePath)) {
            unlink($filePath);

            // Send a success response back to the editor
            $response = array(
                'success' => true,
                'message' => 'Image deleted successfully.'
            );
        } else {
            // Send an error response if the file does not exist
            $response = array(
                'success' => false,
                'message' => 'Image file not found.'
            );
        }

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function addPost()
    {
        $user_id = $this->input->post('user_id');
        $post_title = $this->input->post('post_title');
        $post_content = $this->input->post('post_content');
        $topic_id = $this->input->post('topic');
        $grade_id = $this->input->post('grade');
        $tags = explode(",", $this->input->post('tags'));
        $resource_name = $_FILES['resource']['name'];
        $resource_tmp_name = $_FILES['resource']['tmp_name'];
        $data = [
            "user_id" => $user_id,
            "post_title" => $post_title,
            "post_content" => $post_content,
            "topic_id" => $topic_id,
            "grade_id" => $grade_id,
            "tags" => $tags,
            "resource_name" => $resource_name,
            "resource_tmp_name" => $resource_tmp_name
        ];
        $success = $this->M_StudySociety->addPostData($data);
        if ($success['post_inserted'] > 0) {
            if ($success['resource_inserted']) {

                $relativePath = '../../assets/userFiles/' . $this->session->username . '/resource/other/';
                $uploadPath = realpath(__DIR__ . '/' . $relativePath) . '/';
                $filePath = $uploadPath . $resource_name;

                move_uploaded_file($resource_tmp_name, $filePath);
                redirect(site_url('C_StudySociety/home'));
            }
        }
    }
}
