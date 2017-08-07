<?php
function vall_wpfw_dashboardWidget_VallonicInfo(){ ?>
  <h3 style="font-size: 20px;">Contactgegevens</h3>
  <ul>
    <li>
      <b>Website: <a href="vallonic.nl">vallonic.nl</a> en <a href="vallonic.com">vallonic.com</a></b><br />
    </li>
    <li>
      <b>E-mailadres: <a href="mailto:welkom@vallonic.com">welkom@vallonic.com</a></b><br />
      <i>Bij voorkeur ontvangen wij berichten/support-aanvragen via het <a href="http://vallonic.com/cd" target="_blank">Client Dashboard</a>.</i>
    </li>
  </ul>
  <hr style="margin-top: 10px; margin-bottom: 10px;"/>
  <h3 style="font-size: 20px;">Vragen & Technische Ondersteuning</h3>
  <ul>
    <li>
      Technische support is te verkrijgen via het <a href="http://vallonic.com/cd" target="_blank">Client Dashboard</a>, door middel van een support-ticket.
    </li>
  </ul>

<?php }
  function vall_wpfw_addDashboardWidget_VallonicInfo() {
     wp_add_dashboard_widget( 'vallonicInfo', 'Vallonic ' . __('Informatie', 'vall-wpfw'), 'vall_wpfw_dashboardWidget_VallonicInfo' );
  }

  // Functie toevoegen indien widget geactiveerd is
  if (get_option('vall_wpfw_option_general_toggle_admin_rss_module') == "true") {
   add_action( 'wp_dashboard_setup', 'vall_wpfw_addDashboardWidget_VallonicInfo' );
  }
?>
