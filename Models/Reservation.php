<?php

    namespace Models;
    use PDO;

    class Reservation extends Model
    {

        public function __construct() {
            parent::__construct();
        }

        // Méthode pour insérer une nouvelle réservation
        public function insertReservation(array $data) {
            try {
                $sql = 'INSERT INTO reservation (reservation_Start_Date, reservation_End_Date, reservationStartTime, reservationEndTime, totalPrice, userId) 
                        VALUES (:reservation_Date, :reservationStartTime, :reservationEndTime, :totalPrice, :userId);';
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(':reservation_Start_Date', $data['reservationStartDate']);
                $rqt->bindValue(':reservation_End_Date', $data['reservationEndDate']);
                $rqt->bindValue(':reservationStartTime', $data['reservationStartTime']);
                $rqt->bindValue(':reservationEndTime', $data['reservationEndTime']);
                $rqt->bindValue(':totalPrice', $data['totalPrice'], PDO::PARAM_INT);
                $rqt->bindValue(':userId', $data['userId'], PDO::PARAM_INT);

                $rqt->execute();
                $rqt->closeCursor();
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        public function insertCarReserved(array $data) {
            try {
                $sql = 'INSERT INTO car_reserved (reservationId, carId) VALUES (:reservationId, :carId);';
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(':reservationId', $data['']);
                $rqt->bindValue(':carId', $data['']);
                $rqt->execute();
                $rqt->closeCursor();

            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        }

        // Méthode pour récupérer l'ID de la dernière réservation
        public function getReservationId($userId) {
            try {
                $sql = "SELECT reservationId FROM reservation WHERE userId = :userId ORDER BY reservationId DESC LIMIT 1;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(":userId", $userId);
                $rqt->execute();
                $id = $rqt->fetch(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $id['reservationId'];
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        // Récupérer toutes les réservations
        public function getReservations() {
            try {
                $sql = "SELECT r.*, CONCAT(u.nom, ' ', u.prenom) as utilisateur FROM reservation r INNER JOIN utilisateur u ON r.userId = u.userId ORDER BY r.reservationId DESC LIMIT 5;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $reservations = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $reservations;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        // Supprimer une réservation
        public function deleteReservation($reservationId) {
            try {
                $sql = "DELETE FROM reservation WHERE reservationId = :reservationId";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(":reservationId", $reservationId);
                $rqt->execute();
                $rqt->closeCursor();
            } catch (\PDOException $pDOException) {
                echo $pDOException->getMessage();
            }
        }

    }

    class ReservationData
    {
        private $reservationId;
        private $reservationStartDate;
        private $reservationEndDate;
        private $reservationStartTime;
        private $reservationEndTime;
        private $totalPrice;
        private $userId;

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
        public function getReservationId() {
            return $this->reservationId;
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

        public function getUserId() {
            return $this->userId;
        }

        // SETTERS
        public function setReservationId($reservationId) {
            $this->reservationId = $reservationId;
        }

        public function setDateReservation($reservationStartDate) {
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

        public function setUserId($userId) {
            $this->userId = $userId;
        }
    }