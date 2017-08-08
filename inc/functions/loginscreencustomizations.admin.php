<?php
function vall_wpfw_adminLogin_customLogo() {
  global $plugin_path; ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          background-image: url(http://dab.s1.vallonic.com/vallonic_logo/logo_vallonic-green.png);
          height: 35px;
          width: 245px;
          background-size: 245px 35px;
          background-repeat: no-repeat;
        	padding-bottom: 0px;
        }
        .button.button-primary, .vall_wpfw.settings-page-wrapper .submit .button.button-primary {
          text-shadow: none !important;
          background: #39b79f !important;
          border-color: #31a572 !important;
          box-shadow: 0 1px 0 #31a572 !important;
        }

        .button.button-primary:active, .vall_wpfw.settings-page-wrapper .submit .button.button-primary:active {
          border-color: #31a572 !important;
          -webkit-box-shadow: inset 0 2px 0 #31a572 !important;
          box-shadow: inset 0 2px 0 #31a572 !important;
        }
        input[type="checkbox"]:checked::before, .login #nav a:hover {
          color: #37b79f !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'vall_wpfw_adminLogin_customLogo' );

add_filter( 'login_headerurl', 'vall_wpfw_adminLogin_customLogo_url' );
function vall_wpfw_adminLogin_customLogo_url($url) {
	return 'http://www.vallonic.com';
}
?>
