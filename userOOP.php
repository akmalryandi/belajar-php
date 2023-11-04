<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function registerUser($name, $email, $noHp, $password, $password2, $groupID)
    {
        $username = $noHp;

        $sqlUser = "SELECT username FROM users WHERE username='$username'";
        $resultUser = $this->db->query($sqlUser);

        if ($resultUser->num_rows > 0) {
            echo "<script>alert('Username sudah terdaftar');</script>";
        } elseif ($password !== $password2) {
            echo "<script>alert('Password dan konfirmasi password tidak sesuai');</script>";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, phone_number, username, password, group_id) VALUES ('$name', '$email', '$noHp', '$username', '$password', '$groupID')";

            if ($this->db->query($sql) === TRUE) {
                echo '<script>alert("Registrasi berhasil"); window.location.href = "login.php";</script>';
            } else {
                die(mysqli_error($this->db));
            }
        }
    }

    public function loginUser($username, $password) {
        $sqlUser = "SELECT * FROM users where username = '$username'";
        $resultUser = $this->db->query($sqlUser);
        if (mysqli_num_rows($resultUser) === 1) {
            $row = mysqli_fetch_assoc($resultUser);
            if (password_verify($password, $row["password"])) {
                $_SESSION['login'] = $username;
                return true;
            }
        }

        return false;
    }

}
?>