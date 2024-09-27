<?php

namespace App\Controller\Admin;
use App\Common\Controller;
use App\Model\User;

class AdminController extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function dashboard()
    {
        if (!isset($_SESSION['id'])) {
            $_SESSION['login_notify'] = "Yêu cầu đăng nhập!";
            header('location:' . BASE_URL . '?u=admin/login');
            exit();
        }
        return $this->render('admin.dashboard');
    }
    public function login()
    {
        return $this->render('admin.login');
    }
    public function loginCheck()
    {
        $username = post('username') ?? null;
        $email = post('email') ?? null;
        $pass = post('password') ?? null;
    
        if (!$username || !$email || !$pass) {
            $_SESSION['login_notify'] = "Vui lòng nhập tất cả các trường!";
            header('location:' . BASE_URL . '?u=admin/login');
            exit();
        }
    
        $adminUser = $this->userModel->getLoginAdmin($username, $email);
        if (!$adminUser) {
            $_SESSION['login_notify'] = "Không tìm thấy tài khoản!";
            header('location:' . BASE_URL . '?u=admin/login');
            exit();
        }
    
        $passAdmin = $this->userModel->getPassAdminLogin($username, $email);
        if (!password_verify($pass, $passAdmin->pass_hash)) {
            $_SESSION['login_notify'] = "Sai mật khẩu!";
            header('location:' . BASE_URL . '?u=admin/login');
            exit();
        }

        $_SESSION['id'] = $adminUser->id;
        $_SESSION['username'] = $adminUser->username;
        $_SESSION['avatar'] = $adminUser->avatar;
        $_SESSION['login_notify'] = "Đăng nhập thành công!";
        header('location:' . BASE_URL . '?u=admin');
        exit();
    }    
    public function checkAdminUser()
    {
        if (!isset($_SESSION['id'])) {
            header('location:' . BASE_URL . '?u=admin/login');
            exit();
        }
    }
    public function logoutAdmin()
    {
        session_destroy();
        header('location:' . BASE_URL);
    }
}

