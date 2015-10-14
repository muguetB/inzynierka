<?php 
/**
 * Template name: Własna pojedyncza strona
 */
?>

<!-- Templatka wyglądu własnej pojedynczej strony-->

<!--Pobranie nagłówka-->
<?php get_header(); ?>

<!--Treść własnej strony-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <!--Wyświetlenie tytułu strony-->
      <?php the_title( $before = '<h3>', $after = '</h3>', $echo = true ) ?>
      <!--Wyświetlenie treści strony z edytora-->
      <?php the_content(); ?>
      <?php endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      <!-- no posts found -->
      <?php endif; ?>
    </div>
  </div>
</div>

<!--Pobranie stopki-->
<?php get_footer(); ?>