<?php 
    session_start();
    if($_SESSION['id'] == ""){
        header('location: inscription.php');
    }
?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>chat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#chatform').on('submit', function(e) {
                e.preventDefault();
                datas = {
                    submit: "submit",
                    message: $('#message').val()
                }
                $.ajax({
                    method: 'POST',
                    url: 'sendmsg.php',
                    data: datas,
                    success: function(result) {
                        alert(result)
                    }
                })
            })


            setInterval(function() {
                $.ajax({
                    url: "msgchat.php",
                    success: function(refresh) {
                        $("#chat").html(refresh);
                    }
                })
            }, 1500)
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
    <section id="contentchat">
        <div class="container">
            <div class="row">
                <a class="btn btn-primary" href="logout.php">Se deconnecter</a>
            </div>
            <div class="row">
                <div id="chat" class="customchat">

                </div>
            </div>
            <div class="row text-center">
                <form id="chatform" action="chat.php" method="POST">
                    <input type="text" name="message" id="message" placeholder="message">
                    <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
