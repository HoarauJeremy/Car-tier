<?php

    $title = "Réserver un vehicule";

    $contenu = '
        <div class="container w-50">
            
            <form action="?url=reservation/store" method="post">

                <div class="form-floating mb-3">
                    <input
                        type="date"
                        class="form-control"
                        name="reservationStartDate"
                        id="reservationStartDate"
                        placeholder="Date de départ"
                    />
                    <label for="reservationStartDate">Date de départ</label>
                </div>

                <div class="form-floating mb-3">
                    <input
                    type="date"
                        class="form-control"
                        name="reservationEndDate"
                        id="reservationEndDate"
                        placeholder="Date de fin"
                        />
                        <label for="reservationEndDate">Date de fin</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input
                        type="time"
                        class="form-control"
                        name="reservationStartTime"
                        id="reservationStartTime"
                        placeholder="Heure de récuperation du vehicule"
                    />
                        <label for="reservationStartTime">Heure de récuperation du vehicule</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                        type="time"
                        class="form-control"
                        name="reservationEndTime"
                        id="reservationEndTime"
                        placeholder=""
                    />
                    <label for="reservationEndTime">Name</label>
                </div>

                <input type="text" name="carId" id="carId" value="" hidden>

                <!-- Recupere le prix depuis la table CAR -->
                <div class="form-floating mb-3">
                    <input
                        type="number"
                        class="form-control"
                        name="totalPrice"
                        id="totalPrice"
                        placeholder="Prix"
                        readonly
                    />
                    <label for="totalPrice">Prix</label>
                </div>
                

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Réserver
                </button>
                

            </form>
        </div>
    ';
    
    include "Views/template.php";

