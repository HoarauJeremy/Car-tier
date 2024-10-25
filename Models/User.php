<?php

    namespace Models;

    use PDO;

    class User extends Model
    {
        public function __construct() {
            parent::__construct();
        }

        public function insertUser(array $data) {
            try {
                $sql = 'INSERT INTO user (lastName, firstName, phoneNumber, email, password, userType) 
                        VALUES (:lastName, :firstName, :phoneNumber, :email, :password, :userType);';
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(':lastName', $data['lName']);
                $rqt->bindValue(':firstName', $data['fName']);
                $rqt->bindValue(':phoneNumber', $data['phoneNumber']);
                $rqt->bindValue(':email', $data['email']);
                $rqt->bindValue(':password', password_hash($data['password'], PASSWORD_BCRYPT)); // Hashage du mot de passe
                $rqt->bindValue(':userType', $data['userType'], PDO::PARAM_INT);

                $rqt->execute();
                $rqt->closeCursor();
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        public function getPassword($email) {
            $sql = "SELECT password FROM user WHERE email = :email;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':email', $email, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
    
            return $result ? $result['password'] : null; // Return null if user does not exist
        }

        /* public function deleteUser($userId) {
            try {
                $sql = "DELETE FROM user WHERE userId = :userId";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(":userId", $userId);
                $rqt->execute();
                $rqt->closeCursor();
            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        } */

        public function getUserId($email) {
            $sql = "SELECT userId FROM user WHERE email = :email;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':email', $email, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
            var_dump("fezf");
            return $result ? $result['userId'] : null; // Return null if user does not exist
        }

        public function getUserInformation($email) {
            $sql = "SELECT lastName, firstName, phoneNumber, email, userType FROM user WHERE email = :email;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':email', $email, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
    
            return $result ? $result : null; // Return null if user does not exist
        }

    }

    class UserData
    {
        private $userId;
        private $lastName;
        private $firstName;
        private $phoneNumber;
        private $email;
        private $password;
        private $userType;

        // Constructeur pour hydrater l'objet
        public function __construct(array $donnees) {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

        // GETTERS
        public function getUserId() {
            return $this->userId;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getPhoneNumber() {
            return $this->phoneNumber;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getUserType() {
            return $this->userType;
        }

        // SETTERS
        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        public function setFirstName($firstName) {
            $this->firstName = $firstName;
        }

        public function setPhoneNumber($phoneNumber) {
            $this->phoneNumber = $phoneNumber;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setUserType($userType) {
            $this->userType = $userType;
        }
    }