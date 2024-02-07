<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
        <title>TaskTracker</title>
    </head>


    <body>
        <div class="navbar-container" id="navbar-container">
            <div class="row justify-content-center"> 
                <div class="col-xl-8">
                    <?php
                        require_once './components/navbar.php'
                    ?>
                </div>            
            </div>
        </div>



        <div class="Home" id="Home">
            <div class="row pt-5 px-2 align-items-center justify-content-center">

                <div class="col-xl-3 d-flex flex-column">
                    <p class="h1"><strong>Keep all your tasks in the same place with TaskTracker</strong></p>
                    <p class="h4 pt-4">Start now tracking your tasks for free!</p>
                    <div class="row pt-2">
                        <div class="col-xl-8">
                            <input class="form-control form-control-lg" type="text" placeholder="Email">
                        </div>
                        <div class="col-xl-4">
                            <button type="button" class="btn btn-primary btn-lg" id="SignUpbtn"><strong>Sign Up</strong></button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 px-4">
                    <img src="./assets/Sobre.png" class="img-fluid" alt="...">
                </div>

            </div>
            <div class="wave">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>


        <div class="About" id="About">
            <div class="row pt-5 px-2 align-items-center justify-content-center">

                <div class="col-xl-6">
                    <p class="h1 mb-4">About</p>
                    <p class="h5">This project is being developed as part of the "Network information systems"
                        curricular unit and aims to develop a platform that allows users to manage their tasks.</p>
                    <p class="h5 mb-4">With that in mind, we will use the following technologies:</p>

                    <div class="row mt-4">
                        <div class="col-xl-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top p-2" src="./assets/html.png" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">HTML</h5>
                                  <p class="card-text">HyperText Markup Language is the basic scripting language used by web browsers to render pages on the world wide web.</p>
                                </div>
                              </div>
                        </div>
                        
                        <div class="col-xl-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top p-2" src="./assets/css.png" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">CSS</h5>
                                  <p class="card-text">CSS is the acronym of “Cascading Style Sheets”. CSS is a computer language for laying out and structuring web pages (HTML or XML).</p>
                                </div>
                              </div>
                        </div>
                        
                        <div class="col-xl-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top p-2" src="./assets/js.png" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">JS</h5>
                                  <p class="card-text">JavaScript is the Programming Language for the Web. JavaScript can update and change both HTML and CSS.</p>
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="col-xl-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top p-3" src="./assets/php.png" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">PHP</h5>
                                  <p class="card-text">PHP (recursive acronym for PHP: Hypertext Preprocessor ) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.</p>
                                </div>
                              </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top p-3" src="./assets/bootstrap.png" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">BootStrap</h5>
                                  <p class="card-text">Bootstrap is a web development framework that supports speedy, mobile-responsive front end programming. It provides templated designs for interface features such as buttons, forms, navigation bars and fonts.</p>
                                </div>
                              </div>
                        </div>

                    </div>

                </div>  
            </div>
        </div>


        <div class="Team" id="Team">

            <div class="inverted-wave">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>

            <div class="row pt-5 px-4 align-items-center justify-content-center">

                <div class="col-xl-6 p-0">
                    <p class="h1 mb-5">Team</p>
                    <div class="card">
                        <div class="row  justify-content-center align-items-center">
                            <div class="col-4">
                                <img class="card-img-top p-3" src="./assets/eu.png" alt="...">
                            </div>
                            <div class="col-8">
                                <p class="h1">José Carlos Pinto de Lima</p>
                                <p class="h4">21 Years</p>
                                <p class="h4">Guimarães</p>
                            </div>
                        </div>
                        <div class="card-body">
                          <p class="card-text">My name is José Lima, I'm 21 years old, and I'm from Guimarães.
                                                In this project, I am responsible for the development of front-end, back-end and databases, 
                                                and anything else that is necessary, as the team is made up of just me.</p>
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="wave">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>


        <div class="Functionalities" id="Functionalities">
            <div class="row pt-5 px-2 align-items-center justify-content-center">
                <div class="col-xl-6">
                    <p class="h1 mb-4">Functionalities</p>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <img src="./assets/221505-P1AQKP-911.jpg" class="img-fluid" alt="...">
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <script src="./js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>