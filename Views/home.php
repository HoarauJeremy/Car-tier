<?php

    use Models\CarData;

    $title = "Accueil";

    $contenu = '
        <div class="row">
            <div class="col-6 col-lg-4">
                <form action="?url=home/filter" method="post">
                
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="modelName"
                            id="modelName"
                            placeholder="Modele du véhicule"
                        />
                        <label for="modelName">Modele du véhicule</label>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="" class="form-label">City</label>
                        <select
                            class="form-select form-select-lg"
                            name=""
                            id=""
                        >
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div> -->

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
            
            <!-- Display of the cars -->
            <div class="col-sm-6 col-lg-8">

                <div class="album p-3 rounded shadow-sm bg-body-tertiary">

                    <!-- BOX of Cards -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    ';

    foreach ($car as $key => $value) {
        $res = new CarData($value);

        $capacity = ($res->getFuelType() == "Diesel" || $res->getFuelType() == "Essence") ? "L." : "kWh";

        $contenu .= '
            <!-- Card -->
            <div class="col">
                <div class="card shadow-sm">
                    <!-- <img class="card-img-top" src="holder.js/100x180/?text=Image cap" alt="Card image cap"> -->
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <h4 class="card-title">'. $res->getBrandName() ." - ". $res->getModelName() .'</h4>
                        <p class="card-text">Type : '. $res->getVehicleType() .'</p>
                        <p class="card-text">'. $res->getFuelType() .' ('. $res->getCapacity() ." ". $capacity .')</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="?url=car/showOne/" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="?url=reservation/index" class="btn btn-sm btn-outline-secondary">Réserver</a>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>

                    </div>
                </div>
            </div>
        ';
    }

    $contenu .= '                        
                    </div>

                </div>

            </div>
        </div>
    ';

    include 'template.php';

