<!-- Templatka wyglądu pojedyczego wpisu na blogu-->

<!--Pobranie nagłówka-->
<?php get_header(); ?>


<div class="container">
  <div class="row">
    <div class="col-md-8">
     
      <!--Pobranie treści pojedynczego wpisu-->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div class="page-header col-md-12">
          <!--Wyświetlenie tytułu oraz autora pojedynczego wpisu-->
          <h2><?php the_title(); ?> <small><?php the_author(); ?></small></h2>
          <!--Wyświetlenie daty dodania wpisu-->
          <h4><time><?php the_date(); ?></time></h4>
        </div>
      
        
        <div class="col-md-12">
          <!--Wyświetlenie miniaturki wpisu-->
          <?php echo get_the_post_thumbnail( $page->ID, 'large', array( 'class' => 'center-block img-responsive' ) ); ?>
          <!--Wyświetlenie treści pojedynczego wpisu-->
          <?php the_content(); ?>
        </div>
        
        <!--Wyświetlenie szablonu komentarzy-->
        <div class="col-md-12">
          <?php comments_template(); ?>
        </div>
      
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