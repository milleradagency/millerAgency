<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

  <!-- FOOTER -->
  <div class="uk-text-center">
    <?php // ---------------------- ?>
    <?php // SOCIAL ICONS ?>
    <div class="uk-text-small">
      <ul class="uk-nav uk-list list-inline">
        <li class="uk-margin-right">
          <a href="https://www.facebook.com/pages/Miller-Ad-Agency/115464605176063" target="_blank" title="Like Us" uk-tooltip>
            <span uk-icon="icon: facebook" class="uk-icon"></span>
          </a>
        </li>
        <li class="uk-margin-right">
          <a href="https://www.instagram.com/milleradagency/" target="_blank" title="Double tap our faces" uk-tooltip>
            <span uk-icon="icon: instagram" class="uk-icon"></span>
          </a>
        </li>
        <li class="uk-margin-right">
          <a href="https://www.linkedin.com/company/miller-ad-agency" target="_blank" title="Link us? Follow us? Or...?" uk-tooltip>
            <span uk-icon="icon: linkedin" class="uk-icon"></span>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/milleragency" target="_blank" title="#millerAgency" uk-tooltip>
            <span uk-icon="icon: twitter" class="uk-icon"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <footer class="maa-footer" id="footer">
    <div class="uk-container uk-margin-remove-top uk-margin-medium-bottom uk-text-smaller" uk-navbar>
      <ul class="uk-navbar-nav maa-footer-links uk-width-1-1 uk-flex-center uk-text-center">
        <li><a href="/seo-evaluation">Check Your SEO</a></li>
        <li><a href="/google-adwords">Google AdWords</a></li>
        <li><a href="http://www.bbb.org/dallas/business-reviews/advertising-agencies-and-counselors/miller-ad-agency-in-dallas-tx-90377086" target="_blank">
          BBB A+ Rated Business&nbsp;<span uk-icon="icon: forward"></span></a>
        </li>
        <li><a href="http://www.baylor.edu/business/txfamily/index.php?id=97637" target="_blank">
          Baylor Business&nbsp;<span uk-icon="icon: forward"></span></a>
        </li>
        <li><a href="/pandora-radio-advertising">Advertise on Pandora Radio</a></li>
      </ul>
    </div>

    <div class="uk-container uk-margin-remove-top uk-margin-remove-bottom uk-navbar-container uk-navbar-transparent" uk-navbar>

      <div class="uk-navbar-left">
        <?php // ---------------------- ?>
        <?php // COPYRIGHT ?>
        <p class="copyright uk-margin-small-bottom">
          &copy; 1984<script>new Date().getFullYear()>2010&&document.write("–"+new Date().getFullYear());</script>
          <?php bloginfo('name'); ?>.
        </p>

        <?php // ---------------------- ?>
        <?php // CREDITS ?>
        <p class="maa-credits uk-text-small uk-margin-remove">
          Powered by WordPress, Elementor, &amp; HTML5 Boilerplate.
        </p>
      </div>

      <div class="uk-navbar-right">
        <?php // ---------------------- ?>
        <?php // LOAD PERFORMANCE ?>
        <p class="query-load uk-text-small uk-margin-small-bottom">
          Load: <span class="perf-load"><?php echo get_num_queries(); ?></span> queries. <span class="perf-load"><?php timer_stop(1); ?></span> seconds.
        </p>

        <?php // ---------------------- ?>
        <?php // SUPPORT LINK ?>
        <p class="maa-credits uk-text-small uk-margin-remove">
          Find something wrong? <a href="/support" class="button-support">Submit a ticket</a>
        </p>
      </div>

    </div>
  </footer>
</div>
<?php
  // ------------------
  // end of #container
  // ------------------
?>

<!-- MOBILE OFF-CANVAS SIDEBAR NAV -->
<?php
  // offcanvas menu variations
  // if/else -> https://developer.wordpress.org/reference/functions/is_page/
  // thanks to http://stackoverflow.com/a/12534908 for echo multiple lines of html

  // ------------------
  // ALL PAGES (except those listed below)
  if (!is_page(array("Media", "Web", "Branding"))) {
    echo
      "<div id='offcanvas' uk-offcanvas='overlay:true'>
        <div class='uk-offcanvas-bar'>
          <div class='maa-offcanvas-media-header' style='background-image:url(/wp-content/uploads/cover-mobilemenu.jpg);'>
            <div class='uk-overlay uk-light uk-position-bottom'>
              <h4 class='uk-margin-remove'>Media.Agency</h4>
            </div>
          </div>
          <button class='uk-offcanvas-close uk-close-large uk-background-muted uk-border-circle' type='button' uk-close></button>";
            $menu_args = array(
              'theme_location'    => 'mobile',
              'container'         => 'ul',
              'container_class'   => '',
              'container_id'      => '',
              'menu'              => '',
              'menu_class'        => 'uk-nav',
              'menu_id'           => '',
              'echo'              => true,
              'depth'             => 0,
            );
            wp_nav_menu( $menu_args );
      echo
        "</div>
          </div>";
  } else {
    // null
  };

  // ------------------
  // SERVICES -> MEDIA
  // when the page with a post_title of "Media" is being displayed
  if (is_page("Media")) {
    echo
      "<div id='offcanvas' uk-offcanvas='overlay:true'>
        <div class='uk-offcanvas-bar'>
          <div class='maa-offcanvas-media-header' style='background-image:url(/wp-content/uploads/cover-home-media.jpg);'>
            <div class='uk-overlay uk-light uk-position-bottom'>
              <h4 class='uk-margin-remove'>Media Advertising</h4>
            </div>
          </div>
          <button class='uk-offcanvas-close uk-close-large uk-background-muted uk-border-circle' type='button' uk-close></button>";
            $menu_args = array(
              'theme_location'    => 'mobile',
              'container'         => 'ul',
              'container_class'   => '',
              'container_id'      => '',
              'menu'              => 'services-media',
              'menu_class'        => 'uk-nav',
              'menu_id'           => '',
              'echo'              => true,
              'depth'             => 0,
            );
            wp_nav_menu( $menu_args );
      echo
        "</div>
          </div>";
  } else {
    // null
  };

  // ------------------
  // SERVICES -> WEB
  // when the page with a post_title of "Web" is being displayed
  if (is_page("Web")) {
    echo
      "<div id='offcanvas' uk-offcanvas='overlay:true'>
        <div class='uk-offcanvas-bar'>
          <div class='maa-offcanvas-media-header' style='background-image:url(/wp-content/uploads/cover-home-web.jpg);'>
            <div class='uk-overlay uk-light uk-position-bottom'>
              <h4 class='uk-margin-remove'>Web Development</h4>
            </div>
          </div>
          <button class='uk-offcanvas-close uk-close-large uk-background-muted uk-border-circle' type='button' uk-close></button>";
            $menu_args = array(
              'theme_location'    => 'mobile',
              'container'         => 'ul',
              'container_class'   => '',
              'container_id'      => '',
              'menu'              => 'services-web',
              'menu_class'        => 'uk-nav',
              'menu_id'           => '',
              'echo'              => true,
              'depth'             => 0,
            );
            wp_nav_menu( $menu_args );
    echo
      "</div>
        </div>";
  } else {
    // null
  };

  // ------------------
  // SERVICES -> BRANDING
  // when the page with a post_title of "Branding" is being displayed
  if (is_page("Branding")) {
    echo
      "<div id='offcanvas' uk-offcanvas='overlay:true'>
        <div class='uk-offcanvas-bar'>
          <div class='maa-offcanvas-media-header' style='background-image:url(/wp-content/uploads/cover-home-branding.jpg);'>
            <div class='uk-overlay uk-light uk-position-bottom'>
              <h4 class='uk-margin-remove'>Branding &amp; Style</h4>
            </div>
          </div>
          <button class='uk-offcanvas-close' type='button' uk-close></button>";
            $menu_args = array(
              'theme_location'    => 'mobile',
              'container'         => 'ul',
              'container_class'   => '',
              'container_id'      => '',
              'menu'              => 'services-branding',
              'menu_class'        => 'uk-nav',
              'menu_id'           => '',
              'echo'              => true,
              'depth'             => 0,
            );
            wp_nav_menu( $menu_args );
    echo
      "</div>
        </div>";
  } else {
    // null
  };
?>

  <!-- jQuery CDN -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Local Fallback if CDN fails -->
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/jquery-3.2.1.min.js"><\/script>')</script>
  <!-- Velocity.js -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
  <!-- Velocity.js UI -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.ui.min.js"></script>
  <!-- Adds UIkit dependancy DOM items before loading UIkit -->
  <script src="/wp-content/themes/millerAgency/assets/js/uikit-toggle.js"></script>
  <!-- UIkit -->
  <script src="/wp-content/themes/millerAgency/assets/js/uikit.min.js"></script>
  <!-- UIkit Icons -->
  <script src="/wp-content/themes/millerAgency/assets/js/uikit-icons.min.js"></script>
  <!-- Kerning.js -->
  <!-- kerningjs.com -->
  <!-- NOTE: Slows down page load considerably... -->
  <!-- NOTE: Needs more research if we want to implement -->
  <!-- <script src="/wp-content/themes/millerAgency/assets/js/kerning.min.js"></script> -->
  <!-- Material Waves -->
  <script src="/wp-content/themes/millerAgency/assets/js/waves.min.js"></script>
  <!-- Highlight.js -->
  <!-- highlightjs.org -->
  <script src="/wp-content/themes/millerAgency/assets/js/highlight.pack.js"></script>
  <!-- Initialize Highlight.js -->
  <script>
    $(document).ready(function() {
      $('code').each(function(i, block) {
        hljs.highlightBlock(block);
      });
    });
  </script>

  <?php
    // # load specific scripts for specific pages
    // ## Page —> ../support
    if (is_page('support')): ?>
    <script src="/wp-content/themes/millerAgency/assets/js/page-support.js"></script>
  <?php endif; ?>

  <!-- Custom Scripts -->
  <script src="/wp-content/themes/millerAgency/assets/js/millerAgency.js"></script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."html5-boilerplate/js/main.js") ?>

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

  <!-- Plugin Stylesheets & Scripts -->
  <?php wp_footer(); ?>

</body>
</html>
