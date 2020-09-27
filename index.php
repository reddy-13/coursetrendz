<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CourseTrendz | CTZ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="assets/css/global.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
</head>

<body>
    <!-- navigation started -->
    <?php
      include("navbar.php");
    ?>
    <!-- navigation ended here -->
    <!-- main section starts -->
    <section class="hero is-info is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container has-text-centered">
            <?php 
            // print_r($_SERVER['REQUEST_URI']);
            ?>
                <h1 class="title">Learn Without wories</h1>
                <p class="subtitle">Get Online courses for free</p>
                <p>
                <strong>
                    <a href="courses.php">Browse All</a>
                </strong>
                </p>
            </div>
        </div>
    </section>
     <!-- main section ends here -->
    <!-- sign in modal -->
    <div class="modal" id="signinModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">Modal title</p>
            <button class="delete" id="close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
            <!-- Content ... -->
            </section>
            <footer class="modal-card-foot">
            <button class="button is-success" id="save">Save changes</button>
            <button class="button" id="cancel">Cancel</button>
            </footer>
        </div>
    </div>
    <!-- JS scripts starts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <!-- JS scripts ends here -->
</body>
</html>