<?php 
/*
* Default header file
*/
?>

<!-- Templatka wyglądu nagłówka-->

<!DOCTYPE html>
<html>
<head>
  <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  <title>PWR | Portal dla studentów </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head();?>
</head>
<body>
  <!-- Treść nagłówka strony -->
  <header>
   <!-- <img id="image_header" src="<?php echo get_stylesheet_directory_uri(); ?>/images/header.jpg"/> -->
   <div class="container-fluid">
    <div class="row">
     <div id="header">
      <div id="language"><?php dynamic_sidebar( 'languages' ); ?></div>
      <div class="vertical-center">
        <!-- <div class="col-lg-12 col-md-offset-5"> -->
        <!--   <a class="pwr" href="<?php bloginfo('url'); ?>"><h2>PWR</h2></a>
          <?php
          $currentlang = get_bloginfo('language');
          if($currentlang=="pl-PL"): ?>
          <h4 style="padding-left: 10%;">Portal dla studentów z zagranicy</h4>
        <?php else: ?>
           <h4 style="padding-left: 10%;">Informative Portal for Foreign Students</h4>
        <?php endif; ?> -->

      <!-- <div class="col-lg-12 col-md-offset-10"> -->
        <?php pwr_branding(); ?>
      <!-- </div>  -->

        <nav class="navbar navbar-default no-corners navbar-clear" role="navigation" style="background: none">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Nawigacja strony</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <!--Generowanie Górnego Menu Strony-->
              <?php 
              wp_nav_menu( array(
                'menu'            => 'main-nav',
                'menu_class'      => 'nav navbar-nav navbar-right',
                'depth'           => 2,
                        // 'link_before'     => '<b>',
                        // 'link_after'      => '</b>',
                'walker'          => new BootstrapNavMenuWalker()
                ));
                ?>
              </div><!-- /.navbar-collapse -->
            </div><!-- end container fluid -->
          </nav> <!-- end navbar -->
        </div> <!-- end of vertical-center -->               
      </div> <!-- end of header -->
    </div> <!-- end of row -->
   
</div>
</header>

