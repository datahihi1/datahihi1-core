<?php

namespace App\Controller\Admin;

use App\Common\Controller;
use App\Model\User;

class UserController extends Controller
{
    private $userModel;
    public function __construct() {
        if (!isset($_SESSION['id'])) {
            $_SESSION['login_notify'] = "Yêu cầu đăng nhập!";
            header('location:' . BASE_URL . '?u=admin/login');
            exit();
        }
        $this->userModel = new User();
    }
    public function list() {
        $user = $this->userModel->getListUser();
        return $this->render('admin.user.list', compact('user'));
    }
    public function hide() {
        $user = $this->userModel->getListHide();
        return $this->render('admin.user.hide', compact('user'));
    }
    public function create() {
        return $this->render('admin.user.create');
    }
    public function store() {
        $username      =       post('username');
        $first_name    =       post('f-name');
        $last_name     =       post('l-name');
        $email         =       post('email');
        $image         =       files('image');
        $pass          =       post('pass');
        $re_pass       =       post('re-pass');

        switch ($pass) {
            case $re_pass:
                $password = $re_pass;
                $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                break;
            default:
                return $this->render('admin.user.create');
        }

        $avatar = null;
        if ($image['name'] != '') {
            $p = rand(0, 100000) . '_' . $image['name'];
            move_uploaded_file($image['tmp_name'], "public/uploads/$p");
            $avatar = "public/uploads/$p";
        }
        $this->userModel->getStore($username, $first_name, $last_name, $avatar, $email, $password, $pass_hash);
        $_SESSION['user_notification'] = 'Tạo tài khoản thành công';
        header('location:' . BASE_URL . '?u=admin/users');
    }
    public function edit($id)
    {
        $u = $this->userModel->getUserByID($id);
        return $this->render('admin.user.update', compact('u'));
    }
    public function update($id) {
        $id            =       post('id');
        $username      =       post('username');
        $first_name    =       post('f-name');
        $last_name     =       post('l-name');
        $email         =       post('email');
        $image         =       files('image');
        $pass          =       post('pass');
        $re_pass       =       post('re-pass');

        switch ($pass) {
            case $re_pass:
                $password = $re_pass;
                $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                break;
            default:
                $u = $this->userModel->getUserByID($id);
                return $this->render('admin.user.update', compact('u'));
        }

        $u = $this->userModel->getUserByID($id);
        $avatar = $u->avatar;
        if ($image['name'] != '') {
            if ($u->avatar) {
                unlink($u->avatar);
            }
            $p = rand(0, 100000) . '_' . $image['name'];
            move_uploaded_file($image['tmp_name'], "public/uploads/$p");
            $avatar = "public/uploads/$p";
        } else {
            $avatar = $u->avatar;
        }
        $this->userModel->getUpdate($id, $username, $first_name, $last_name, $avatar, $email, $password, $pass_hash);
        $_SESSION['user_notification'] = 'Cập nhật tài khoản thành công';
        header('location:' . BASE_URL . '?u=admin/users');
    }
    public function ban($id) {
        $u = $this->userModel->getUserByID($id);
        return $this->render('admin.user.ban', compact('u'));
    }
    public function banPost($id) {
        $day = $_POST['dayban'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (!isset($day) || $day < 1) {
            $_SESSION['user_notification'] = 'Cần nhập giá trị số lớn hơn 1';
            $u = $this->userModel->getUserByID($id);
            return $this->render('admin.user.ban', compact('u'));
        } else {
            $now = strtotime(date('Y-m-d h:i:s'));
            $newday = $now + $day * 86400;
            $ban_day = date('Y-m-d h:i:s', $newday);
            $this->userModel->getBan($id, $ban_day);
            $_SESSION['user_notification'] = 'Cấm tài khoản thành công';
            header('location:' . BASE_URL . '?u=admin/users');
        }
    }
    public function delete($id) {
        $user = $this->userModel->getUserByID($id);
        $this->userModel->getSoftDelete($id);
        $_SESSION['user_notification'] = 'Xóa tạm thành công';
        header('location:' . BASE_URL . '?u=admin/users');
    }
    public function restore($id) {
        $user = $this->userModel->getUserByID($id);
        $this->userModel->getRestore($id);
        $_SESSION['user_notification'] = 'Khôi phục thành công';
        header('location:' . BASE_URL . '?u=admin/users/hide');
    }
    public function destroy($id) {
        $user = $this->userModel->getUserByID($id);
        unlink($user->avatar);
        $this->userModel->getDestroy($id);
        $_SESSION['user_notification'] = 'Xóa tài khoản thành công';
        header('location:' . BASE_URL . '?u=admin/users');
    }
}
