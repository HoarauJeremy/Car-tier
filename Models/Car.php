<?php

    namespace Models;
    use PDO;

    class Car extends Model
    {
        function __construct() {
            parent::__construct();
        }

        // Récupère toutes les voitures
        public function getAllCars() {
            try {
                $sql = "SELECT * FROM car;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $cars = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $cars;
            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        }
    }

    class CarData 
    {
        public $idReservation;
        public $reservationStartDate;
        public $reservationEndDate;
        public $reservationStartTime;
        public $reservationEndTime;
        public $totalPrice;
        public $user;
        public $carBrand;
        public $carModel;
        
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        public function hydrate(array $data) {
            foreach ($data as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    
        // GETTER
        public function getIdReservation() {
            return $this->idReservation;
        }
    
        public function getReservationStartDate() {
            return $this->reservationStartDate;
        }
    
        public function getReservationEndDate() {
            return $this->reservationEndDate;
        }
    
        public function getReservationStartTime() {
            return $this->reservationStartTime;
        }
    
        public function getReservationEndTime() {
            return $this->reservationEndTime;
        }
    
        public function getTotalPrice() {
            return $this->totalPrice;
        }
    
        public function getUser() {
            return $this->user;
        }
    
        public function getCarBrand() {
            return $this->carBrand;
        }
    
        public function getCarModel() {
            return $this->carModel;
        }
    
        // SETTER
        public function setIdReservation($idReservation) {
            $this->idReservation = $idReservation;
        }
    
        public function setReservationStartDate($reservationStartDate) {
            $this->reservationStartDate = $reservationStartDate;
        }
    
        public function setReservationEndDate($reservationEndDate) {
            $this->reservationEndDate = $reservationEndDate;
        }
    
        public function setReservationStartTime($reservationStartTime) {
            $this->reservationStartTime = $reservationStartTime;
        }
    
        public function setReservationEndTime($reservationEndTime) {
            $this->reservationEndTime = $reservationEndTime;
        }
    
        public function setTotalPrice($totalPrice) {
            $this->totalPrice = $totalPrice;
        }
        
        public function setUser($user) {
            $this->user = $user;
        }
    
        public function setCarBrand($carBrand) {
            $this->carBrand = $carBrand;
        }
    
        public function setCarModel($carModel) {
            $this->carModel = $carModel;
        }
    }