<?php

    $title = "Inscription";

    $contenu = '
        <div class="container w-50">  

            <form action="?url=user/store" method="post">
                <!-- <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal">Inscrivez vous</h1>

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="lastName"
                        id="lastName"
                        placeholder="Nom"
                    />
                    <label for="lastName">Nom</label>
                </div>

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="firstName"
                        id="firstName"
                        placeholder="Prénom"
                    />
                    <label for="firstName">Prénom</label>
                </div>

                    <div class="form-floating mb-3">
                    <input
                        type="tel"
                        class="form-control"
                        name="phone"
                        id="phone"
                        placeholder="N° de Téléphone"
                    />
                    <label for="phone">N° de Téléphone</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        placeholder="Courriel"
                        pattern="/^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$/gm"
                    />
                    <label for="email">Courriel</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="password"
                        placeholder="Mot de passe"
                    />
                    <label for="password">Mot de passe</label>
                </div>

                <!-- <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div> -->
                
                <button class="btn btn-primary w-100 py-2" name="submit" id="submit" type="submit">S\'inscire</button>
                <p class="text-center my-2">Où</p>  
                <a class="btn btn-primary w-100 py-2" href="?url=user/connection" role="button">Se connecter</a>
            </form>
            
        </div>
    ';

    include 'Views/template.php';

