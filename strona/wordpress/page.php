<?php 
/**
 * Template name: Pojedyncza strona
 */
?>

<!-- Templatka wyglądu pojedynczej strony-->

<!--Pobranie nagłówka-->
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <!--Pobranie treści strony-->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!--Wyświetlenie tytułu strony-->
      <?php the_title( $before = '<h3>', $after = '</h3>', $echo = true ) ?>
      <!--Wyświetlenie treści strony-->
      <?php the_content(); ?>
      <?php endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      <!-- no posts found -->
      <?php endif; ?>
    </div>
    
    <!--Pobranie panelu bocznego-->
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<!--Pobranie stopki-->
<?php get_footer(); ?>