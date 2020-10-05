<?php 
if(isset($_GET['page'])){
  $page_id = $_GET['page'];
}else{
  $page_id = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script data-ad-client="ca-pub-5773505290463327" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <title>CourseTrendz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="assets/css/global.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <link rel="stylesheet" href="assets/css/courses.css">
</head>
<body>
    <!-- navigation started -->
    <?php
      include("navbar.php");
    
    ?>
    
    <!-- navigation ended here -->
    <!-- hero section -->
    <section class="hero is-medium is-bold" id="banner">
        <div class="hero-body">
            <div class="container">
            <h1 class="title has-text-white">Learn Without wories</h1>
                <p class="subtitle has-text-white">Get Online courses for free</p>
            </div>
        </div>
    </section>
    <!-- hero section ends here -->
    <!-- search section -->
    <div class="container my-5">
        <div class="lavel">
            <div class="lavel-item">
                <div class="panel-block">
                    <p class="control has-icons-right">
                        <input class="input is-link" id="search" type="text" placeholder="Search">
                        <span class="icon is-right">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- search section -->
    <!-- courses section -->
    <div class="container-fluid my-5 is-4 py-5 px-5">
        
        <div class="columns">
            <div class="column"></div>
            <div class="column is-three-quarters">
                <div class="columns  is-multiline is-desktop  " id="courses_section">

                </div>
            </div>
            <div class="column py-5 px-5">
                
            </div>
        </div>
    </div>
    <!-- end of main courses section -->
    <!-- pagination section started -->
    <div class="columns is-centered"> 
        <div class="leavl-item">
        <nav class="pagination " role="navigation" aria-label="pagination">
            <!-- <a class="pagination-previous">Previous</a>
            <a class="pagination-next">Next page</a> -->
            <ul class="pagination-list">
                <li>
                    <a class="pagination-link" href="courses.php?page=1" aria-label="Goto page 1">1</a>
                </li>
                <li>
                    <a class="pagination-link" href="courses.php?page=2" aria-label="Goto page 2">2</a>
                </li>
                <li>
                    <a class="pagination-link" href="courses.php?page=3" aria-label="Goto page 2">3</a>
                </li>
                <li>
                    <a class="pagination-link" href="courses.php?page=4" aria-label="Goto page 2">4</a>
                </li>
                <li>
                    <a class="pagination-link" href="courses.php?page=5" aria-label="Goto page 2">5</a>
                </li>
                <li>
                    <a class="pagination-link" href="courses.php?page=6" aria-label="Goto page 2">6</a>
                </li>
            </ul>
        </nav>
        </div>
        
    </div>
    <!-- pagination section end-->

    <!-- scripts starts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script>
        //calling jquery
        var response = "";
        $(function () {
            // started jquery script...
            get_courses();
            //calling funcations
            function get_courses(query) {
                var page_id = '<?php echo $page_id; ?>';
                $.ajax({
                    type: "ajax",
                    method: "GET",
                    url: "api.php",
                    data: {
                        query: query,
                        page: page_id
                    },
                    dataType: "JSON",
                    success: function (data) {
                        response = data;
                        console.log(data);
                        var output_row = "";
                        var i;
                        //ittereatin through results
                        data.results.forEach(course => {
                            let insrtuct = '';
                            course.visible_instructors.forEach(insrtutor => insrtuct =
                                insrtutor.name)
                            output_row += '<div class="column is-4 py-5 px-5">' +
                                '<div class="card courseCard">' +
                                '<div class="card-image">' +
                                '<figure class="image is-4by3">' +
                                '<img src="' + course.image_240x135 +
                                '" alt="Placeholder image">' +
                                '</figure>' +
                                '</div>' +
                                '<div class="card-content">' +
                                '<div class="content">' +
                                '<p class="">' + course.title.substr(0, 25) + '</p>' +
                                '</div>' +
                                '<ul class="list-inline font-11 text-gray unstyle">' +
                                '<li> By '+ insrtuct + '</li>' +
                                '</ul>' +
                                '<footer class="card-footer mt-1">' +
                                '<p class="card-footer-item">' +
                                '<span class=" is-primary p-3 is-medium mr-1">' + course
                                .price + '</spane>' +
                                '</p>' +
                                '<p class="card-footer-item">' +
                                '<a href="course_details.php?id='+course.id+'" class="button is-link">Details</a>' +
                                '</p>' +
                                '</footer>' +

                                '</div>' +
                                '</div>' +
                                '</div>';
                        })
                        $('#courses_section').html(output_row);
                    }
                })
            }
            $('#search').keyup(function () {
                var search = $(this).val();
                if (search != '') {
                    get_courses(search);
                } else {
                    get_courses();
                }
                var search = $('#search').val();
                $('#pagination').click(function (event) {
                    $get_courses();
                    $('#search').val(search);
                });
            });
        })
    </script>
    <!-- scripts ends here -->
</body>
</html>