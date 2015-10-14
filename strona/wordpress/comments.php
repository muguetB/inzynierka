<?php 
/**
 * Comments template
 */
?>

<!-- Templatka wyglądu komentarzy-->


<div class="col-md-8">
  <?php if ( 'open' == $post->comment_status ) : ?>
  
<!--  Nagłówek formularza komentarzy-->
  <h3>Komentarze:
    <small><?php comments_number( $zero = 'Bądź pierwsza/y', $one = '(1)', $more = ('%')); ?></small>
  </h3>
  
<!--  Link do anulowania komentarzy-->
  <?php cancel_comment_reply_link(); ?>
  
<!--  Komunikat blokady komentarzy dla niezalogowanych-->
  <?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
  
  <p>Musisz być <a href="<?php echo wp_login_url( get_permalink() ); ?>">zalogowany</a> aby móc komentować.</p>
  
  <?php else : ?>
  
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  
  <?php if ( $user_ID ) : ?>
<!--  Komunikat z loginem w przypadku zalogowania-->
  <p>Zalogowany jako: <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Wyloguj się z tego konta">Wyloguj się &raquo;</a></p>
  
  <?php else : ?>
<!--  Formularz komentarzy dla niezalogowanych-->
  <form role="form">
    <div class="form-group">
      <label for="author">Imię <?php if ( $req ) echo "( wymagane )"; ?></label>
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="form-control" <?php if ($req) echo "aria-required='true'"; ?> />
    </div>
  
    <div class="form-group">
      <label for="email">Email ( <?php if ( $req ) echo "wymagane"; ?> )</label>
      <input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="form-control" <?php if ($req) echo "aria-required='true'"; ?> />
    </div>
  
  <?php endif; ?>
<!--  Formularz komentarzy dla zalogowanych-->
    <div class="form-group">
      <label for="comment">Twój komentarz</label>
      <textarea name="comment" id="comment" cols="100%" rows="10" class="form-control"></textarea>
    </div>
  
  <!--<p>Some HTML is ok: <code><?php //echo allowed_tags(); ?></code></p>-->
  
<!--  Przycisk wysłania komentarza-->
  <input name="submit" type="submit" id="submit" value="Wyślij komentarz" class="btn btn-warning">
  <?php do_action( 'comment_form', $post->ID ); comment_id_fields(); ?>
  
  </form>
  
  <?php endif; // If registration required and not logged in ?>
  
  <?php endif; // If comments are open: delete this and the sky will fall on your head ?>
</div>

<!--Lista komentarzy-->
<div class="col-md-12 mar-top-10">
  <!-- Odwołanie się do funkcji wyglądu komentarzy z pliku functions.php -->
  <?php wp_list_comments(
    array(
      'type'      =>  'comment',
      'callback'  =>  'comments_feed_template_callback'
    )
  ); ?>
</div>