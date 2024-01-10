<?php

// Si el servidor recibe un request de POST entrara en el siguiente bloque //
// donde añadira los campos name y phone number //
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $contact= [
            "name"=> $_POST["name"],
            "phone_number"=> $_POST["phone_number"],
        ];

        if (file_exists("contacts.json")) {
            $contacts = json_decode(file_get_contents("contacts.json"), true);
        }
        // Si no lo hay deja el array vacio //
        else{
            $contacts = [];
        }

        // En php podemos usar la siguiente sintaxis para añadir un elemento e a un array //
        // colocamos [] luego de la variable sin ningun indice //
        $contacts[] = $contact;

        // Con esta funcion json_enconde transformaremos nuestro parametro en este caso un array // 
        // o un diccionario en un string con formato de json y file put contents lo guardara en un archivo //
        file_put_contents("contacts.json", json_encode($contacts));

        // De esta forma una vez agregado el contacto cambiaremos la cabecera del archivo php //
        // para que nos redireccione nuevamente a index.php //
        header("Location: index.php");
    }

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
        <a class="navbar-brand" href="#">
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
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <main>
        <!-- ADD FORM  -->
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Contact</div>
                <div class="card-body">
                <form method="POST" action="add.php">
                    <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
        
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                    </div>
                    </div>
        
                    <div class="mb-3 row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
        
                    <div class="col-md-6">
                        <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                    </div>
                    </div>
        
                    <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </main>
</body>
</html>
