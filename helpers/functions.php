<?php 
function site_header() {
    $header_code = "
    <!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Jukebox</title>
            <link rel='stylesheet' href='./assets/fontawesome/css/all.min.css'>
            <link rel='stylesheet' href='./assets/bootstrap/css/bootstrap.min.css'>
            <link rel='stylesheet' href='./assets/css/styles.css'>
    
            <script src='./assets/fontawesome/js/all.min.js'></script>

            <script src='./assets/js/jquery-3.6.0.min.js'></script>
            <script src='./assets/js/script.js'></script>
            <!-- <script src='./assets/js/popper.min.js'></script>-->


            <script src='./assets/bootstrap/js/bootstrap.min.js'></script>
        </head>
        <body class='text-light bg-dark d-flex flex-column h-100'>
    ";
    echo $header_code;
}

function site_footer() {
    $footer_code = "
    </body>
    </html>
    ";
    echo $footer_code;
}

if (isset($_POST['add_music_btn'])) {
    print_r($_POST);
}