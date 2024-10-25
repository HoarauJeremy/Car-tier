<?php

namespace Controllers;
use Models\User;

session_start();

class UserController extends Controller
{
    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $this->view('User/Index');
    }

    public function connection() {
        $this->view('User/Connection');
    }

    /**
     * Deconnecte l'utilisateur et le redirige vers la page d'acceuil
     */
    public function deconnexion() {
        session_unset();
        session_destroy();
        session_abort();
        header("Location: index.php");
    }
    
    public function connect() {
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $hashedPassword = $this->user->getPassword($email);

        $userInfo = $this->user->getUserInformation($email);
        // var_dump($userInfo);

        if (password_verify($password, $hashedPassword['password'])) {
            $_SESSION['status'] = true;
            $_SESSION['id'] = $this->user->getUserId($email);
            $_SESSION['nom'] = $userInfo[0]['nom'] ?? "";
            $_SESSION['prenom'] = $userInfo[0]['prenom'] ?? "";
            $_SESSION['phone'] = $userInfo[0]['telephone'] ?? "";
            $_SESSION['mail'] = $userInfo[0]['courriel'] ?? "";
            $_SESSION['type'] = $userInfo[0]['typeUtilisateur'] ?? "";
            header("Location: index.php");
            exit;
        } else {
            header("Location: index.php?url=user/connection&msg=Nom d'utilisateur ou mot de passe incorrect.");
            exit;
        }
    }

    public function register() {
        $this->view('User/Register');
    }

    public function get() {
    }
    
    public function store() {
        if (isset($_POST['submit'])) {
            $utilisateur = [
                isset($_POST['lastName']) ? $_POST['lastName'] : null,
                isset($_POST['firstName']) ? $_POST['firstName'] : null,
                isset($_POST['phone']) ? $_POST['phone'] : null,
                isset($_POST['email']) ? $_POST['email'] : null,
                password_hash($_POST['password'], PASSWORD_BCRYPT),
            ];
            
            $this->user->insertUser($utilisateur);
            // file_exists($this->view('User/connexion')) ? require_once $this->view('User/connexion') : include $this->view('Error');
            require_once $this->view('User/Connection');
        }
    }

    public function update() {
    }
    
    public function delete() {
    }

}