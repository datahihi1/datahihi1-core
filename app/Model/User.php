<?php

namespace App\Model;

use App\Common\Model;

class User extends Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Model();
    }
    public function getListUser()
    {
        $sql = "SELECT u.*,a.role AS role_name FROM users u JOIN auth a WHERE u.role=a.id AND u.deleted_at is null ORDER BY u.id ASC";
        $q = $this->db->pdo->query($sql);
        $r = $q->fetchAll();
        return $r;
    }
    public function getListHide()
    {
        $sql = "SELECT u.*,a.role AS role_name FROM users u JOIN auth a WHERE u.role=a.id AND u.deleted_at is not null ORDER BY u.id ASC";
        $q = $this->db->pdo->query($sql);
        $r = $q->fetchAll();
        return $r;
    }
    public function getStore($username, $first_name, $last_name, $avatar, $email, $password, $pass_hash)
    {
        $sql = "INSERT INTO users(username,first_name,last_name,avatar,email,pass,pass_hash,created_at,role) VALUES ('$username','$first_name','$last_name','$avatar','$email','$password','$pass_hash',NOW(),1)";
        $q = $this->db->pdo->query($sql);
        return $q;
    }
    public function getUserByID($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        $q = $this->db->pdo->query($sql);
        $r = $q->fetch();
        return $r;
    }
    public function getUpdate($id, $username, $first_name, $last_name, $avatar, $email, $password, $pass_hash)
    {
        $sql = "UPDATE users SET username = '$username', first_name = '$first_name', last_name = '$last_name', avatar = '$avatar', email = '$email', pass = '$password', pass_hash = '$pass_hash', updated_at = NOW() WHERE id = $id";
        $q = $this->db->pdo->query($sql);
        return $q;
    }
    public function getSoftDelete($id)
    {
        $sql = "UPDATE users SET deleted_at=NOW() WHERE id = $id";
        $q = $this->db->pdo->query($sql);
        return $q;
    }
    public function getRestore($id)
    {
        $sql = "UPDATE users SET deleted_at = null WHERE id = $id";
        $q = $this->db->pdo->query($sql);
        return $q;
    }
    public function getDestroy($id)
    {
        $sql = "DELETE FROM users WHERE id=$id";
        $q = $this->db->pdo->query($sql);
        return $q;
    }
    public function getBan($id, $ban_day)
    {
        $sql = "UPDATE users SET banned_at = NOW(), banned_to = '$ban_day', role = 3 WHERE id = $id";
        $q = $this->db->pdo->query($sql);
        return $q;
    }
    public function getPassAdminLogin($username, $email)
    {
        $sql = "SELECT u.pass,u.pass_hash FROM users u WHERE username = '$username'AND email = '$email' AND role = 2 LIMIT 1";
        $q = $this->db->pdo->query($sql);
        $r = $q->fetch();
        return $r;
    }
    public function getLoginAdmin($username, $email)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email' AND role = 2 LIMIT 1";
        $q = $this->db->pdo->query($sql);
        $r = $q->fetch();
        return $r;
    }
}
