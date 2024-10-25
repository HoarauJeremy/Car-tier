<?php 

    $title = "Connexion";

    $contenu = '
        <div class="container w-50">  

            <form action="?url=user/connect" method="post">
                <!-- <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
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

                <-- <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div> -->
                
                <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
                <p class="text-center my-2">Où</p>  
                <a class="btn btn-primary w-100 py-2" href="?url=user/register" role="button">S\'inscire</a>
            </form>

        </div>
    ';
    
    include "Views/template.php";
