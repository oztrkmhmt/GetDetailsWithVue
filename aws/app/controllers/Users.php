<?php
class Users extends Controller {

    private $sessionUser;
    
    public function __construct() {

        $this->userModel = $this->model('User');
        $this->sessionUser = new SessionUsers;
    }
    //Login to Atlas Web Service
    public function login() {
        if(isLoggedIn()){
            redirect('users/main');     
        }else{
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Initialize data
            $data = ['username' => trim($_POST['username']), 'password' => trim($_POST['password']), 'username_err' => '', 'password_err' => '', ];
            $_SESSION['name'] = $data['username'];
            $_SESSION['pass'] = $data['password'];
            //Check username and password
            if (empty($data['username'])) {
                $data['username_err'] = "Kullanıcı adı boş bırakılamaz !";
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Kullanıcı parola boş bırakılamaz !";
            }
            // Check errors and load view
            if (empty($data['username_err']) && empty($data['password_err'])) {
                if ($this->userModel->GetUserHashCode($data)) {
                } elseif (isset($_SESSION['userDetail']['errorMessage'])) {
                    flash('hata_yakalandi', $_SESSION['userDetail']['errorMessage']);
                    $this->view('users/login', $data);
                } else {
                    $_SESSION['AWSession'] = $this->sessionUser;
                    $this->view('users/main', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Initialize data
            $data = ['username' => '', 'password' => '', 'username_err' => '', 'password_err' => '', ];
            // Load view
            $this->view('users/login', $data);
            }
        }
    }
    //Login details
    public function logindetails() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        //load login details model
        $this->userModel->GetLoginDetails($data);
        $this->view('users/logindetails', $data);
        }
    }
    //Customer details
    public function customerdetails() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        //load customer details model
        $this->userModel->GetCustomerDetails($data);
        $this->view('users/customerdetails', $data);
        }
    }
    //Session logout
    public function logout() {
        unset($_SESSION['AWSession']);
        session_destroy();
        redirect('users/login');
    }
    //Atlas Web Service Main
    public function main() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        $this->userModel->GetLoginDetails($data);
        $this->view('users/main', $data);
        }
    }
    //Product Details (Abonman)
    public function productdetailsAbonman() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        $this->userModel->GetProductDetailsAbonman($data);
        $this->view('users/productdetailsAbonman', $data);
        }
    }
    //Product Details (Kati)
    public function productdetailsN() {
        if(!isLoggedIn()){
            redirect('users/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        $this->userModel->GetProductDetailsN($data);
        $this->view('users/productdetailsN', $data);
        }
    }

}
