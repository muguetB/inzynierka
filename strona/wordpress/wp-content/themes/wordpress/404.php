<?php
/**
 * Template for displaying 404 pages (Not Found)
 */
?>

<!-- Templatka wyglądu strony błędu 404-->

<!--Pobranie nagłówka-->
<?php get_header(); ?>

<!--Kod strony 404-->
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <p class="text-center">STRONA NIE ZNALEZIONA :(</p>
      <a href="<?php bloginfo('url'); ?>" class="btn btn-primary btn-lg" role="button">Wróć na stronę główną</a>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<!--Pobranie stopki-->
<?php get_footer(); ?>