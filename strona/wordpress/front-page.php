<?php 
/**
 * Template name: Strona główna
 */
?>
<!-- Templatka wyglądu strony głównej-->

<!--Pobranie nagłówka-->
<?php get_header(); ?>

<!-- Treść strony głównej -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 mar-top-20">
        <div class="jumbotron">
          <h1>Hello, world!</h1>
          <p>Zaczynamy</p>
          <p><a href="blog" class="btn btn-primary btn-lg" role="button">Przejdź do przykładowej listy wpisów</a></p>
        </div>
      </div>
    </div>
  </div>

<!--Pobranie stopki-->
<?php get_footer(); ?>