<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        body {
            height: 100%;
            background-color: #f1f1f1;
            /* min-height: 50vh;  */
            /* background-size: cover;  */
            font-family: 'Noto Sans', sans-serif;
        }

        #header {
            background-color: white;
            margin-left: -10px;
            margin-right: -10px;
        }

        .nav-item {
            font-size: 32px;
            margin-left: 15px;
            margin-right: 15px;
        }

        #logo-chevron:hover {
            transform: rotate(1080deg);
        }

        #logo-chevron {
            transition: transform 2s;
        }

        #pied {
            margin-bottom: 0%;
            padding-bottom: 2%;
            min-height: 50%;
            background-color: white;
            /* margin-left: -10px; */
            /* margin-top: 70vh; */
        }

        #titreAccueil {
            font-size: 40pt;
            transition: font-size 2s;
        }

        #titreAccueil:hover {
            font-size: 5em;
        }

        /* 
#imgcode{
    border-radius:70% 50%;
} */


        .card {
            width: 80%;
            margin: 80px;
            padding-top: 0px !important;
            margin-top: 0px !important;


        }

        .space {
            width: 50%;

        }

        section {
            /* margin-left: 35%; */
            border: 2px solid;
            padding: 10px;
        }

        section h1 {
            font-size: 30pt;
        }

        section h2 {
            color: #c1c6d5;
            font-style: italic;
            border-bottom: 5px solid #c1c6d5;
        }

        section ul {
            line-height: 2em;
        }

        .date {
            font-weight: bolder;
        }
    </style>


    <title>Index</title>
</head>

<body>
    <div class="container-fluid">
        <header id="header" class="navbar navbar-expand-lg navbar-light text-dark">
            <div class="container">
                <a class="navbar-brand" href="http://localhost/php/proc/app_eval5/indexP.php"><img
                        src="assets/images/logo-chevron.png" alt="" class="img-fluid" id="logo-chevron" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end ml-5 " id="navbarText">
                    <ul class="navbar-nav" style="width: 74%">
                        <li class="nav-item ">
                            <a class="nav-link text-dark" href="http://localhost/php/proc/app_eval5/indexP.php">Actu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="http://localhost/php/proc/app_eval5/about.php">Mon CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="http://localhost/php/proc/app_eval5/contact.php">Contact</a>
                        </li>
                    </ul>

                </div>
                <div class="nav-item dropdown col-1">
                    <?php if(isset($_SESSION['ok'])){ ?>
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" style="font-size: initial;">
                        <?= $_SESSION['ok']['login']; ?>
                    </a>
                    <?php } ?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(isset($_SESSION['ok']) && $_SESSION['ok']['role'] == 1){ ?>
                        <li><a class="dropdown-item" href="liste.php">Gestion des articles</a></li>
                        <li><a class="dropdown-item" href="utilisateurs.php">Gestion des utilisateurs</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="logout.php">Deconnexion</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>