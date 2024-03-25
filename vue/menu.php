<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Booking Form HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #4fa3e3;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover:not(.active) {
                background-color: #feffff;
            }

            .active {
                background-color: #111bbd;
            }
        </style>



<ul>

    <li><a class="active" href="#home">Menu</a></li>
    <li><a href="#news">Profil</a></li>
    <li><a href="Connexion.html" >Connexion</a></li>
    <li><a href="Inscription.html" >Inscription</a></li>
</ul>
</head>

<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="booking-cta">
                        <h1>Reservez votre vol pour vos vacances</h1>
                        <p></p>
                    </div>
                </div>

                <div class="col-md-7 col-md-offset-1">
                    <div class="booking-form">
                        <form>
                            <div class="form-group">
                                <div class="form-checkbox">
                                    <label for="roundtrip">
                                        <input type="radio" id="roundtrip" name="flight-type">
                                        <span></span>Aller simple
                                    </label>
                                    <label for="one-way">
                                        <input type="radio" id="one-way" name="flight-type">
                                        <span></span>Aller retour
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">ville de depart</span>
                                        <input class="form-control" type="text" placeholder="ville ou aéroport">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">ville d'arrivée</span>
                                        <input class="form-control" type="text" placeholder="ville ou aéroport">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Date de départ</span>
                                        <input class="form-control" type="date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Date de retour</span>
                                        <input class="form-control" type="date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Adulte(s) (18+)</span>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Enfants (0-17)</span>
                                        <select class="form-control">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Travel class</span>
                                        <select class="form-control">
                                            <option>Classe economique</option>
                                            <option>Classe business</option>
                                            <option>Première classe</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn">Chercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>