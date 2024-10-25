<?php

    namespace Controllers;

    use Models\Car;

    session_start();

    class HomeController extends Controller
    {
        protected $car;

        public function __construct() {
            $this->car = new Car();
        }

        public function index() {
            $allCar = $this->car->getCarsInformation();
            $this->view('Home', ["car" => $allCar]);
        }

        // public function mention() {
        //     $this->view("mentionLegale");
        // }

        public function error() {
            $this->view("Error");
        }
    }