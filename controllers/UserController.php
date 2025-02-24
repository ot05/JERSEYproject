<?php

class UserController
{
    public $errors = [];
    private $database;
    public function __construct()
    {
        $this->database = (new DatabaseConnection())->db;
    }
    public function register()
    {
        view('auth/register');
    }
    public function login()
    {
        view('auth/login');
    }
    public function authenticate()
    {
        if (empty($_POST['email'])) {
            $this->errors['email'] = "Email required";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email';
        }
        if (!empty($this->errors)) {
            $errors = $this->errors;

            view('auth/login', ['errors' => $errors]);
            exit();
        }
    }
    public function store()
    {
        if (empty($_POST['email'])) {
            $this->errors['email'] = "Email required";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email';
        }
        // check if email already used
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $this->database->prepare($query);
        $statement->bindParam(':email', $_POST['email']);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            $this->errors['email'] = 'Email is already used';
        }
        //
        if (empty($_POST['password'])) {
            $this->errors['password'] = 'Password required';
        } else if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).{6,12}$/', $_POST['password'])) {
            $this->errors['password'] = 'Password must be 6-12 alphanumerical';
        }
        if ($_POST['password'] !== $_POST['confirm-password']) {
            $this->errors['confirm-password'] = "Passwords don't match";
        }
        if (!empty($this->errors)) {
            $errors = $this->errors;

            view('auth/register', ['errors' => $errors]);
            exit();
        } else {

            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "Insert INTO users (email, password) values (?, ?)";
            $statement = $this->database->prepare($query);
            $statement->bindValue(1, $_POST['email']);
            $statement->bindValue(2, $hashed_password);
            $statement->execute();

            session_start();
            $_SESSION['user_email'] = $_POST['email'];
            header('Location: /');
        }
    }
}
