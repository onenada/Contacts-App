<?php
require "db.php";
$contacts = $conn->query("SELECT * FROM contacts");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.2/darkly/bootstrap.min.css" 
    integrity="sha512-JjQ+gz9+fc47OLooLs9SDfSSVrHu7ypfFM7Bd+r4dCePQnD/veA7P590ovnFPzldWsPwYRpOK1FnePimGNpdrA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <script 
    defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"
    ></script>
    <!-- Static content -->
    <link rel="stylesheet" href="Media/Static/Css/index.css">
    <!-- TITTLE -->
    <title>Contacts App</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img class="mr-2" src="Media/Static/Img/nadaWebLogo1.png">
                Contacts App
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="add.php">Add contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <main>
        <!-- CONTACTS CONTAINER  -->
        <div class="container pt-4 p-3">
            <div class="row" >

                <!-- Contacts -->
                <?php if ($contacts->rowCOUNT() == 0): ?>
                <div class="col-md-4 mx-auto">
                    <div class="card card-body text-center">
                        <p>No contacts saved</p>
                        <a href="add.php">Add one!</a>
                    </div>
                </div>
                <?php endif ?>
                <?php foreach ($contacts as $contact): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                            <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
                            <p class="m-2"><?= $contact["phone_number"] ?></p>
                            <a href="#" class="btn btn-secondary mb-2">Edit Contact</a>
                            <a href="#" class="btn btn-danger mb-2">Delete Contact</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>
</body>
</html>
