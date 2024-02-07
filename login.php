<?php
    require_once("./db/connection.php");

    if(isset($_POST["submitLogin"])){
        $username = $_POST["usernameInput"];
        $password = $_POST["passwordInput"];

        $result = $LIGACAO->prepare("SELECT * FROM users WHERE name = ?");
        $result->bindParam(1, $username, PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($result->rowCount() > 0){
            $hashedPassword = $row['pass'];

            if(password_verify($password, $hashedPassword)){
                    session_start();
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['password'] = $row['pass'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: myboards.php");
                }
            else{
                echo
                "<script> alert('Invalid Login'); </script>";
            }
        }
        else{
            echo
            "<script> alert('Invalid Login'); </script>";
        }
    }



    if(isset($_POST["submitRegister"])){
        $username = $_POST["usernameInput"];
        $email = $_POST["emailInput"];
        $password = $_POST["passwordInput"];
        $confirmPassword = $_POST["confirmPassword"];

        /*Verifica se o nome ja existe na base de dados*/
        $result = $LIGACAO->prepare("SELECT * FROM users WHERE name = ?");
        $result->bindParam(1, $username, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $nameExists = $result->fetch(PDO::FETCH_ASSOC);

        /*Verifica se o email ja existe na base de dados*/
        $result = $LIGACAO->prepare("SELECT * FROM users WHERE email = ?");
        $result->bindParam(1, $email, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $emailExists = $result->fetch(PDO::FETCH_ASSOC);


        $comparison = strcmp($password, $confirmPassword);
        if($comparison==0){
            if(empty($nameExists)){
                if(empty($emailExists)){
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $INSTRUCAO = $LIGACAO->prepare("INSERT  INTO users (email, pass, name) VALUES (?, ?, ?)");
                    $INSTRUCAO->bindParam(1, $email);
                    $INSTRUCAO->bindParam(2, $hashedPassword);
                    $INSTRUCAO->bindParam(3, $username);

                    if ($INSTRUCAO->execute()) {
                     } else {
                        echo "Failed: " . $INSTRUCAO->errorInfo()[2];
                     }
                }
                else{
                    echo
                "<script> alert('Email already in use!'); </script>";
                }
            }
            else{
                echo
                "<script> alert('Username already exists!'); </script>";
            }
        }
        else{
            echo
            "<script> alert('Passwords didn't match!'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/loginstyle.css">
        
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
        
        
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="container-fluid"  id="login-container">
                    <form class="mx-auto" method="post">
                        <h4 class="text-center">Login</h4>
                        <div class="mb-3 mt-5">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameInput" aria-describedby="emailHelp" name="usernameInput" required>
                        </div>

                        <div class="mb-5">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInput" name="passwordInput" required>
                        </div>

                        <div class="mb-3">
                            <p class="text-center">Don't have an account? Create one <a href="javascript:void(0);" onClick="showRegister()">here</a>!</p>
                            <button type="submit" class="btn btn-primary" name="submitLogin" id="submitLogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        


        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="container-fluid" id="register-container">
                    <form class="mx-auto" method="post">
                        <h4 class="text-center">Register</h4>
                        <div class="mb-3 mt-5">
                            <label for="usernameInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernameInput" aria-describedby="emailHelp" name="usernameInput" required>
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="emailInput" required>
                        </div>

                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInput" name="passwordInput" required>
                        </div>

                        <div class="mb-5">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required> 
                        </div>

                        <div class="mb-3">
                            <p class="text-center">Already have an account? Login <a href="javascript:void(0);" onClick="showLogin()">here</a>!</p>
                            <button type="submit" class="btn btn-primary" name="submitRegister">Register</button>
                        </div>
                    </form>
                </div>
            </div>                
        </div>
        




        <script src="./js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>