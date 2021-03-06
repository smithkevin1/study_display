<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Project page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
      <?php
        include('header.php') ?>
      <div class="main-container">
      <div class="main wrapper clearfix">

        <article class="project">

          <header>
            <?php
            $proj = $_GET['proj'];
            $genre = $_GET['genre'];
            $id = $_GET['id'];
            echo '<h3>Genre: ' .$genre. '</h3>';
            if(isset($_GET['id'])) {
              $_GET['id'];
              echo '<h4>Student id: ' . $id . '</h4>';
            } else {
              echo '<p>No student selected, please return to <a href=\'../index.php\'>Project Page</a>.</p>';
            }   ?>
            <p class="transform">
              <a href='project_page.php?xml=true&id=<?php echo $id ?>&proj=<?php echo $proj ?>&genre=<?php echo $genre ?>'>View XML Source</a>
              <a href='project_page.php?transformed=true&id=<?php echo $id ?>&proj=<?php echo $proj ?>&genre=<?php echo $genre ?>'>View Formatted File</a>
              <a href='project_page.php?annotated=true&id=<?php echo $id ?>&proj=<?php echo $proj ?>&genre=<?php echo $genre ?>'>View Annotated File</a>
            </p>
          </header>
          <section>
              <?php
                $proj = $_GET['proj'];
                $id = $_GET['id'];

                      function p1regXML() {
                        $id = $_GET['id'];
                        $proj = $_GET['proj'];
                        include_once(dirname(__DIR__) . '/content/_transformations/XML.php');
                      }

                      function p1TransformedXML () {
                        $id = $_GET['id'];
                        $proj = $_GET['proj'];
                        include_once(dirname(__DIR__) . '/content/_transformations/XML_v2.php');
                      }

                      function p1AnnotatedXML () {
                        $id = $_GET['id'];
                        $proj = $_GET['proj'];
                        include_once(dirname(__DIR__) . '/content/_transformations/XML_v3.php');
                      }

                      if (isset($_GET['xml'])) {
                        p1regXML();
                      }
                      if (isset($_GET['transformed'])) {
                        p1TransformedXML();
                      }
                      if (isset($_GET['annotated'])) {
                        p1AnnotatedXML();
                      }
                    ?>

        </section>
        <section>
          <p class="transform"><a href="../index.php">Return to the main page</a></p>
        </section>
      </article>
</div> <!-- #main -->
</div> <!-- #main-container -->
<div class="footer-container">
    <footer class="wrapper">
      <!--<h2>Project <?php echo $_GET['proj']?>: Select Student</h2>
        <ul><?php include('list_students.php') ?></ul>-->
        <h2>More from this genre: <?php echo $_GET['genre']?></h2>
        <ul><?php $genre = $_GET['genre']; include('list_students_' .$genre. '.php') ?></ul>
    </footer>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

<script src="js/main.js"></script>

</body>
</html>
