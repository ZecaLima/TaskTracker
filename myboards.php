<?php
session_start();
?>

<?php
require_once("./db/connection.php");

if(isset($_POST["submitUsername"])){
    $username = $_POST["usernameInput"];

    $result = $LIGACAO->prepare("SELECT * FROM users WHERE name = ?");
    $result->bindParam(1, $username, PDO::PARAM_STR);

    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($result->rowCount() == 0){
        $UPDATE = $LIGACAO->prepare('UPDATE `users` SET `name`=? WHERE id_user=?');
        $UPDATE->bindParam(1, $username);
        $UPDATE->bindParam(2, $_SESSION['id_user']);

        $UPDATE -> execute();
        $_SESSION['username'] = $username;
    }
    else{
        echo
        "<script> alert('Email already in Use'); </script>";
    }
}


if(isset($_POST["submitEmail"])){
    $email = $_POST["emailInput"];

    $result = $LIGACAO->prepare("SELECT * FROM users WHERE email = ?");
    $result->bindParam(1, $email, PDO::PARAM_STR);

    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($result->rowCount() == 0){
        $UPDATE = $LIGACAO->prepare('UPDATE `users` SET `email`=? WHERE id_user=?');
        $UPDATE->bindParam(1, $email);
        $UPDATE->bindParam(2, $_SESSION['id_user']);

        $UPDATE -> execute();
        $_SESSION['email'] = $email;
    }
    else{
        echo
        "<script> alert('Username already in Use'); </script>";
    }
}


if(isset($_POST["submitPassword"])){
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];


    if(password_verify($currentPassword, $_SESSION['password'])){
        $comparison = strcmp($newPassword, $confirmPassword);
        if($comparison == 0){
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $UPDATE = $LIGACAO->prepare('UPDATE `users` SET `pass`=? WHERE id_user=?');
            $UPDATE->bindParam(1, $hashedPassword);
            $UPDATE->bindParam(2, $_SESSION['id_user']);

            $UPDATE -> execute();
            $_SESSION['password'] = $hashedPassword;
        }
        else{
            echo
            "<script> alert('Passwords Didn't Match!'); </script>";
        }
    }
    else{
        echo
        "<script> alert('Incorrect Password!'); </script>";
    }
}

?>




<?php
$INSTRUCAO = $LIGACAO->prepare("SELECT * FROM invites INNER JOIN boards ON invites.id_board = boards.id_board WHERE status = 'accepted' AND id_user=?");
$INSTRUCAO->bindParam(1, $_SESSION['id_user']);

$INSTRUCAO->setFetchMode(PDO::FETCH_ASSOC);
$INSTRUCAO->execute();

$myBoards = $INSTRUCAO->fetchAll(PDO::FETCH_ASSOC);

?>



<?php
$INSTRUCAO = $LIGACAO->prepare("SELECT * FROM invites INNER JOIN boards ON invites.id_board = boards.id_board WHERE status = 'pending' AND id_user=?");
$INSTRUCAO->bindParam(1, $_SESSION['id_user']);

$INSTRUCAO->setFetchMode(PDO::FETCH_ASSOC);
$INSTRUCAO->execute();

$myInvites = $INSTRUCAO->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
        <title>TaskTracker</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/boardsstyle.css">
</head>

<body>

    <div class="navbar-container" id="navbar-container">
        <div class="row justify-content-center"> 
            <div class="col-xl-8">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid align-items-center">
                        <a class="navbar-brand d-flex align-items-center" href="./index.php">
                            <img src="./assets/logo.png" alt="" width="" height="30" class="d-inline-block allign-text-top">
                            <span class="h4 ps-2 my-0 align-middle"><strong>TaskTracker</strong></span>
                        </a>
                        <div>
                            <ul class="navbar-nav d-flex">
                                <li class="navbar-item px-1">
                                    <a class="nav-link active" aria-current="page" href="" id="showInvites"><p class="h5 mb-0 p-1">My Invites</p></a>
                                </li>
                                <li class="navbar-item px-1">
                                    <a class="nav-link active" aria-current="page" href="" id="showProfile"><p class="h5 mb-0 p-1">My Profile</p></a>
                                </li>
                                <li class="navbar-item px-1">
                                    <a class="nav-link active" id="Logout" aria-current="page" href="./components/logout.php"><p class="h5 mb-0 p-1">Logout</p></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>
            </div>            
        </div>
    </div>
    

    <!-- Modal Perfil -->
    <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">My Profile</h5>
            </div>
            <div class="modal-body">
                <h5 class="mx-2">Username: &nbsp;<?php echo $_SESSION['username'];?> &emsp; <a href="" id="editUsername">edit</a></h5>
                <h5 class="mx-2">Email: &nbsp;<?php echo $_SESSION['email'];?> &emsp; <a href="" id="editEmail">edit</a></h5>
                <h5 class="mx-2"><a href="" id="editPassword">Edit Password</a></h5>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Alterar Username -->
    <div class="modal fade" id="modalUsername" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Change Username</h5>
                </div>
                <div class="modal-body">
                    <form class="mx-auto" method="post">
                        <div class="mb-3 mt-3">
                            <label for="usernameInput" class="form-label">New Username</label>
                            <input type="text" class="form-control" id="usernameInput" aria-describedby="emailHelp" name="usernameInput" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submitUsername" id="submitUsername">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alterar Email -->
    <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Change Email</h5>
                </div>
                <div class="modal-body">
                    <form class="mx-auto" method="post">
                        <div class="mb-3 mt-3">
                            <label for="emailInput" class="form-label">New Email</label>
                            <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="emailInput" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submitEmail" id="submitEmail">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alterar Password -->
    <div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                </div>
                <div class="modal-body">
                    <form class="mx-auto" method="post">
                        <div class="mb-3 mt-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" aria-describedby="emailHelp" name="currentPassword" required>
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>

                        <div class="mb-5">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submitPassword" id="submitPassword">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal My Invites -->
    <div class="modal fade bd-example-modal-lg" id="modalInvites" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">My Invites</h5>
            </div>
            <div class="modal-body">
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach($myInvites as $myInvites) { ?>
                        <tr>
                            <td><?php echo $myInvites["name"] ?></td>
                            <td>
                            <a href="./db/reject_invite.php?id=<?php echo $myInvites["id_invite"] ?>" class="link-dark ml-3"><i>&#9746;</i></a>
                            <a href="./db/accept_invite.php?id=<?php echo $myInvites["id_invite"] ?>" class="link-dark"><i>&#9745;</i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <div class="contaier-fluid " id="BoardContainer">
        <h1 class="mt-5 text-center">My Boards</h1>
        <div class="row mt-5 align-items-center justify-content-center">
            <div class="col-2" id="board-collumn">
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Info</th>
                    </thead>
                    <tbody>
                    <?php foreach($myBoards as $myBoards) { ?>
                        <tr>
                            <td><?php echo $myBoards["name"] ?></td>
                            <td><a href="myboards.php?showInfoBoard=<?php echo $myBoards["id_board"] ?>" class="link-dark ml-3" id="showBoardInfo"><i>&#8505;</i></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Board Info  -->
    <div class="modal fade" id="modalBoardInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Board Info</h5>
                </div>
                <div class="modal-body">
                    <p>Info</p>
                    <p>Board Name</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="./js/boards.js"></script>
</body>
</html>