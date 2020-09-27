<?php 
if(isset($_GET['id']) && $_GET['id'] !== ''){
    $course_id = $_GET['id'];
    $bool = true;
}else{
  $bool = false;
  $err_page = "requestid course not availabel";

}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script data-ad-client="ca-pub-5773505290463327" async
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
  <?php 
        if($bool){
            require_once('udemy.php');
        
            $response = get_data("https://www.udemy.com/api-2.0/courses/$course_id?fields[course]=@all");
            $course = json_decode($response);
          
        }
       //print_r($course); //for debuggin purpose
   ?>
  <?php if($course->detail == 'Not found.'):?>
  <section class="hero is-fullheight-with-navbar is-dark is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title has-text-centered">
          Course not found
        </h1>

      </div>
    </div>
  </section>
  <?php else: ?>
  <section class="hero  is-fullheight-with-navbar">
    <div class="hero-body">
      <div class="container">
        <p class="title">
          <a class="" href="https://www.udemy.com<?php echo $course->url; ?>"><?php echo $course->title ?></a>
        </p>
        <p class="subtitle"><?php echo $course->price ?></p>
        <div class="columns is-mobile is-centered my-5">
          <div class="column is-half">

            <img src="<?php echo $course->image_480x270 ?>" alt="">

          </div>
        </div>
        <div class="container my-5">
          <div class="columns">
            <div class="column is-three-fifths
            is-offset-one-fifth">
              <p class="text-center is-size-2"><?php echo $course->description; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>
  <!-- hero section ends here -->

</body>

</html>