<!-- Templatka wyglądu stopki-->

  <footer id="footer">
    <div class="container" style="margin-left: 0px; margin-right: 0px; ">
      <div class="row">
        <!--Dolne menu strony -->
          <!--<div class="navbar">
          <div class="navbar-inner">
            <?php 
              //wp_nav_menu( array(
              //'theme_location'  =>  'footer-nav',
              //'container_class' =>  false, 
              //menu_class'      =>  'nav'
              //) );
            ?>
          </div>
        </div> -->
        
        <!--Treść stopki-->
        <div class="col-md-12">
          <div id="footerImg">
            <img src="<?php echo get_bloginfo('template_url') ?>/images/pwr.png" style="width:320px" />
          </div>
        </div>
        
      </div>
    </div>    
  </footer>  
  <?php wp_footer();?>
  </body>
</html>