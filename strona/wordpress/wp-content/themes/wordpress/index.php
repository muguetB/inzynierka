<?php 
/**
 * Template name: Wpisy na blogu
 */
?>

<!-- Templatka wyglądu listy wpisów na blogu-->

<!--Pobranie nagłówka-->
<?php get_header(); ?>

<!--Treść listy wpisów z bloga-->
<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">

      <!--Generowanie listy wpisów z bloga-->
      <?php 
        $count=0; 
        $posts=0;
        query_posts('category_name='.single_term_title("",false).'&posts_per_page=6');
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
          <!--Element Bootstrap Media-->
          <div class="media">
            <!--Pobranie miniaturki wpisu-->
            <a class="thumbnail" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( $size = 'thumbnail'); ?>
            </a>
            <!--Pobranie tytułu wpisu-->
            <div class="media-body">
              <a class="text-center" href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
              <!--Wyświetlenie krótkiego opisu posta-->
              <?php the_excerpt(); ?>
              <!--Przycisk "Czytaj więcej"-->
              <a href="<?php the_permalink(); ?>" class="btn btn-default">Czytaj więcej</a>
            </div>
          </div>
          <hr>

      <?php 
      $count++; 
      $posts=$count;
        if($count == 2 || $count == 4 || $count == 6) echo '</div><div class="row"><div class="col-md-3 col-sm-6 col-xs-12">';
        endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      <!-- no posts found -->
      <?php endif; ?>

    </div>

    
    <?php if($posts <= 2){
      echo '
    <div class="col-md-3 col-sm-6 col-xs-12"></div>
    <div class="col-md-3 col-sm-6 col-xs-12"></div>';
    }
    if($posts < 4 && $posts > 2){
      echo '
    <div class="col-md-3 col-sm-6 col-xs-12"></div>';
    } 
    ?>
   
    <!--Pobranie panelu bocznego -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<!--Pobranie stopki-->
<?php get_footer(); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>