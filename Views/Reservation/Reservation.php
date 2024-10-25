<?php

    $title = "Réserver un vehicule";

    $contenu = '
        <div class="container w-50">
            
            <form action="?url=reservation/store" method="post">

                <div class="form-floating mb-3">
                    <input
                    type="date"
                    class="form-control"
                    name="formId1"
                    id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input
                    type="date"
                        class="form-control"
                        name="formId1"
                        id="formId1"
                        placeholder=""
                        />
                        <label for="formId1">Name</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input
                    type="time"
                    class="form-control"
                    name="formId1"
                    id="formId1"
                        placeholder=""
                        />
                        <label for="formId1">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input
                        type="time"
                        class="form-control"
                        name="formId1"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Name</label>
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

