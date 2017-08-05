<?php
function vallonicRSSFeed_content(){
  // Locatie van de feed
  $rss = fetch_feed( "http://vallonic.com/feed/" );

  // Controleren of de feed werkt
  if ( is_wp_error($rss) ) {
    if ( is_admin() || current_user_can( 'manage_options' ) ) {
      //Foutmelding alleen aan beheerders tonen
      echo '<p>';
      printf( __( '<strong>RSS Fout</strong>: %s' ), $rss->get_error_message() );
      echo '</p>';
    }
    return;
  }

  if ( !$rss->get_item_quantity() ) {
    echo '<p>Niks om te tonen!</p>';
    $rss->__destruct();
    unset($rss);
    return;
   }

   echo "<ul>\n";

  if ( !isset($items) )
    $items = 5;

    foreach ( $rss->get_items( 0, $items ) as $item ) {
      $publisher = '';
      $site_link = '';
      $link = '';
      $content = '';
      $date = '';
      $link = esc_url( strip_tags( $item->get_link() ) );
      $title = esc_html( $item->get_title() );
      $content = $item->get_content();
      $content = wp_html_excerpt( $content, 250 ) . ' ...';

      echo "<li><a class='rsswidget' href='$link'>$title</a>\n<div class='rssSummary'>$content</div>\n";
    }

    echo "</ul>\n";
    $rss->__destruct();
    unset($rss);
  }

  function vallonicRSSFeed_content_addDashboardWidget() {
     wp_add_dashboard_widget( 'vallonicRSSFeed_content', 'Vers van de pers', 'dashboard_widget_function' );
   }

   add_action( 'wp_dashboard_setup', 'vallonicRSSFeed_content_addDashboardWidget' );
}

?>
