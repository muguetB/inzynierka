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
    <header>
     <div class="row">
      <div id="carousel" class="carousel slide" data-ride="carousel">
                
                 <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                  </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                 <?php
                // $args = array( 'posts_per_page' => 10 );
                 $the_query = new WP_Query(array(
                      'category_name' => 'najwazniejsze-informacje,the-most-important-things', 
                      'posts_per_page' => 8
                      )); 

                if ( $the_query->have_posts() ) :
                  $i = 0;
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $i++;
                if ( $i == 1 ) {
                  echo '<div class="item active">';
                }
                echo '<div class="col-sm-3">';
                echo '<a style="color:white" href='.get_the_permalink().'>';
                the_post_thumbnail('medium');
                echo '<div class="carousel-caption">';
                echo '<h5>'.get_the_title().'</h5>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
                if ( $i % 4 == 0 && $i != 8 ) { echo '</div><div class="item">'; }
                endwhile;
                echo '</div>';
                wp_reset_postdata();
                endif;
                ?>
                </div> <!--/carousel-inner--> 
            </div> <!--/myCarousel-->
    </div><!-- end of row -->
  </header>

    <div class="row">
      <div class="col-md-8">
      <!--Pobranie treści strony-->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!--Wyświetlenie treści strony-->
      <?php the_content(); ?>
      <?php endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      <!-- no posts found -->
      <?php endif; ?>
    </div>
     <!--Pobranie panelu bocznego-->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <?php get_sidebar(); ?>
    </div>
    </div>
  </div>
<!--Pobranie stopki-->
<?php get_footer(); ?>