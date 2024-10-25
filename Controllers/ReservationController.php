<?php

    namespace Controllers;

    use Models\Reservation;

    session_start();
    
    class ReservationController extends Controller
    {

        protected $reservationModel;

        public function __construct() {
            $this->reservationModel = new Reservation();
        }

        public function index() {
            // if (isset($_SESSION['status']) && $_SESSION['status'] == true && isset($_SESSION['id'])) {
                $this->view('Reservation/Reservation');
            // } else {
                // header("Location: index.php?url=user/connection&msg=Veuillez vous connecter.");
            // }
        }

        /* public function recapitulatif() {
            $this->view('reservation/recapitulatif');
        } */

        public function store() {

            if (isset($_POST['submit'])) {

                try {
                    $iduser = $_SESSION['id'];

                    $reservation = [
                        $_POST['date'],
                        $_POST['date'],
                        $_POST['time-start'],
                        $_POST['time-end'],
                        // $prixTotal,
                        $iduser
                    ];

                    $reserved_car = [
                        "reservationId" => $this->reservationModel->getReservationId($iduser),
                        "carId" => ""
                    ];

                    $this->reservationModel->insertReservation($reservation);
                    $this->reservationModel->insertCarReserved($reserved_car);

                    header('Location: index.php?msg=Votre réservation a bien été enregistrée.');
                    exit;
                } catch(\Exception $e) {
                    echo $e;
                }

            }
        }

        public function get() {
            if (isset($_SESSION['status']) && $_SESSION['status'] == true) { //isset($_SESSION[''])

                $this->view('reservation/');
            }
        }

        public function getAll() {
            if (isset($_SESSION['status']) && $_SESSION['status'] == true) { //isset($_SESSION[''])
                
                $this->view('reservation/');
            }
        }

        public function update() {
            if (isset($_SESSION['status']) && $_SESSION['status'] == true) { //isset($_SESSION['type'])
                
            }
        }

        public function delete() {
            $idReservation = $this->reservationModel->getIdReservation($_SESSION['']);
            if (isset($_SESSION['status']) && $_SESSION['status'] == true) { //isset($_SESSION['type'])
                $this->reservationModel->deleteReservation($idReservation);
            }
        }

    }
    