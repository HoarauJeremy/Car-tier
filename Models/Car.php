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
        
        // Récupère certaine information sur les voitures
        public function getCarsInformation() {
            try {
                $sql = "SELECT brandName, modelName, vehicleType, fuelType, capacity FROM car;";
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
        public $carId;
        public $brandName;
        public $modelName;
        public $vehicleType;
        public $creationYear;
        public $horsePower;
        public $fuelType;
        public $capacity;
        public $numberDoors;
        public $numberSeats;
            
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
    
        // GETTERS
        public function getCarId() {
            return $this->carId;
        }

        public function getBrandName() {
            return $this->brandName;
        }

        public function getModelName() {
            return $this->modelName;
        }

        public function getVehicleType() {
            return $this->vehicleType;
        }

        public function getCreationYear() {
            return $this->creationYear;
        }

        public function getHorsePower() {
            return $this->horsePower;
        }

        public function getFuelType() {
            return $this->fuelType;
        }

        public function getCapacity() {
            return $this->capacity;
        }

        public function getNumberDoors() {
            return $this->numberDoors;
        }

        public function getNumberSeats() {
            return $this->numberSeats;
        }

        // SETTERS
        public function setCarId($carId) {
            $this->carId = $carId;
        }

        public function setBrandName($brandName) {
            $this->brandName = $brandName;
        }

        public function setModelName($modelName) {
            $this->modelName = $modelName;
        }

        public function setVehicleType($vehicleType) {
            $this->vehicleType = $vehicleType;
        }

        public function setCreationYear($creationYear) {
            $this->creationYear = $creationYear;
        }

        public function setHorsePower($horsePower) {
            $this->horsePower = $horsePower;
        }

        public function setFuelType($fuelType) {
            $this->fuelType = $fuelType;
        }

        public function setCapacity($capacity) {
            $this->capacity = $capacity;
        }

        public function setNumberDoors($numberDoors) {
            $this->numberDoors = $numberDoors;
        }

        public function setNumberSeats($numberSeats) {
            $this->numberSeats = $numberSeats;
        }

    }