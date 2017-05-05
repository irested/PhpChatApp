<?php
    session_start();
?>

    <!DOCTYPE html>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Inscription - tchat</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $(function() {
                $('#insc').on('submit', function(e) {
                    e.preventDefault();
                    datas = {
                        lastname: $('#lastname').val(),
                        firstname: $('#firstname').val(),
                        username: $('#username').val()
                    }
                    $.ajax({
                        method: 'POST',
                        url: 'sign.php',
                        data: datas,
                        success: function(result) {
                            alert(result)
                        }
                    })
                })

                $('#connect').on('submit', function(e) {
                    e.preventDefault();
                    datas = {
                        lastname: $('.lastname').val(),
                        username: $('.username').val()
                    }
                    $.ajax({
                        method: 'POST',
                        url: 'connect.php',
                        data: datas,
                        success: function(result) {
                            alert(result);
                            window.location.href = 'chat.php';
                        }
                    })
                })
            })

        </script>
    </head>

    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>CHATMINIM</h1>
                    </div>
                </div>
            </div>
        </header>
        <section id="contentchat text-center">
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row text-center">
                            <h2>INSCRIPTION</h2>
                        </div>
                        <form id="insc" action="" method="POST" class="form-group text-center">
                            <div>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Prénom">
                            </div>
                            <div>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Nom">

                            </div>
                            <div>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Pseudo">

                            </div>
                            <div>
                                <button type="submit" name="submit" id="submitreg" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row text-center">
                            <h2>CONNEXION</h2>
                        </div>
                        <div class="row">
                            <form id="connect" action="" method="POST" class="form-group text-center">
                                <div>
                                    <input type="text" name="lastname" class="lastname form-control" placeholder="Prénom">

                                </div>
                                <div>
                                    <input type="text" name="username" class="username form-control" placeholder="Username">

                                </div>
                                <div>
                                    <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>
