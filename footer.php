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
      <ul class="maa-footer-links uk-width-1-1 uk-flex-center uk-text-center">
        <li><a href="/seo-evaluation" class="elementor-button elementor-size-sm">Check Your SEO</a></li>
        <li><a href="/google-adwords" class="elementor-button elementor-size-sm">Google AdWords</a></li>
        <li><a href="/better-business-bureau" class="elementor-button elementor-size-sm">BBB A+ Rated Business</a></li>
        <li><a href="/baylor-business" class="elementor-button elementor-size-sm">Baylor Business</a></li>
        <li><a href="/pandora-radio-advertising" class="elementor-button elementor-size-sm">Advertise on Pandora Radio</a></li>
      </ul>
    </div>

    <div class="uk-container uk-margin-remove-top uk-margin-remove-bottom uk-text-center">

        <?php // ---------------------- ?>
        <?php // COPYRIGHT ?>
        <p class="copyright uk-margin-small-bottom">
          &copy; 1984<script>new Date().getFullYear()>2010&&document.write("–"+new Date().getFullYear());</script>
          <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;<a href="https://goo.gl/maps/LChXN6prw412" target="_blank">2711 Valley View Lane, Suite 101, Dallas, Texas</a>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;<a href="tel:9722432211">972.243.2211</a>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;<a href="/privacy">Privacy Policy</a>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;<a href="/terms">Terms of Use</a>
        </p>

        <?php // ---------------------- ?>
        <?php // LOAD PERFORMANCE ?>
        <!-- <p class="query-load uk-text-small uk-margin-small-bottom">
          Load: <span class="perf-load"><?php echo get_num_queries(); ?></span> queries. <span class="perf-load"><?php timer_stop(1); ?></span> seconds.
        </p> -->

        <?php // ---------------------- ?>
        <?php // SUPPORT LINK ?>
        <p class="maa-credits uk-text-small uk-margin-remove">
          Find something wrong with our website? <a href="/support">Submit a ticket</a>.
        </p>

    </div>
  </footer>
</div>
<?php
  // ------------------
  // end of #container
  // ------------------
?>

<!-- MOBILE OFF-CANVAS SIDEBAR NAV -->
<div id="offcanvas" class="uk-modal-full uk-animation-slide-bottom-medium" uk-modal>
  <div class="uk-modal-dialog">
    <div class="maa-offcanvas-header" style="background-image:url(/wp-content/uploads/cover-mobilemenu.jpg);">
      <div class="uk-overlay uk-light uk-position-bottom uk-text-center">
        <a href="<?php echo get_option('home'); ?>/" class="maa-logo-icon">
          <img src="<?php echo get_site_url(); ?>/wp-content/themes/millerAgency/assets/images/miller/maa-offcanvas-logo-icon.svg" alt="<?php bloginfo('name'); ?>">
          <h3 class="uk-margin-remove">Media Ad Agency</h3>
        </a>
      </div>
    </div>
    <button class="uk-modal-close uk-close-large uk-background-muted uk-border-circle maa-mobile-toggle" type="button" uk-close></button>
    <?php
      $menu_args = array(
        'theme_location'    => 'mobile',
        'container'         => '',
        'container_class'   => '',
        'container_id'      => '',
        'menu'              => '',
        'menu_class'        => '',
        'menu_id'           => '',
        'echo'              => true,
        'depth'             => 0,
      );
      wp_nav_menu( $menu_args );
    ?>
    <p class="uk-margin-small-bottom uk-text-center">
      &copy; 1984<script>new Date().getFullYear()>2010&&document.write("–"+new Date().getFullYear());</script>&nbsp;<?php bloginfo('name'); ?>
    </p>
    <p class="uk-text-small uk-margin-medium-bottom uk-text-center">
      Find something wrong with our website?<br /><a href="/support">Submit a ticket</a>.
    </p>
  </div>
</div>



<?php // ---------------------- ?>
<?php // # load specific scripts for specific pages ?>
<?php // ## Page —> ../support ?>
<?php
  if (is_page('support')): ?>
  <script src="/wp-content/themes/millerAgency/assets/js/page-support.js"></script>
<?php endif; ?>


<?php // ---------------------- ?>
<?php // Wordpress enqueue scripts ?>
<?php // 'wp_enqueue_scripts', 'millerAgency_assets' ?>
<?php wp_footer(); ?>


<?php // ---------------------- ?>
<?php // Initialize Highlight.js ?>
<script>
  $(document).ready(function() {
    $('code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
  });
</script>


<?php // ---------------------- ?>
<?php // Google Analytics: change UA-XXXXX-X to be your site's ID ?>
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
