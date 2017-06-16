<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>

  <!-- toTop -->
  <a id="toTopBtn" class="uk-icon-button toTopBtn" href="#toTop" uk-scroll="" uk-icon="icon: chevron-up" title="To the top!" uk-tooltip="pos: left"></a>

  <!-- FOOTER -->
  <div class="uk-text-center" id="socialNetworks">
    <?php // ---------------------- ?>
    <?php // SOCIAL ICONS ?>
    <div class="uk-text-small">
      <ul class="uk-nav uk-list list-inline">
        <li class="uk-margin-right">
          <a href="https://www.facebook.com/pages/Miller-Ad-Agency/115464605176063" target="_blank" uk-scrollspy="cls: uk-animation-scale-up;" title="pls like us kthxbye ;D" uk-tooltip>
            <span uk-icon="icon: facebook" class="uk-icon"></span>
          </a>
        </li>
        <li class="uk-margin-right">
          <a href="https://www.instagram.com/milleradagency/" target="_blank" uk-scrollspy="cls: uk-animation-scale-up;" title="Double tap our faces" uk-tooltip>
            <span uk-icon="icon: instagram" class="uk-icon"></span>
          </a>
        </li>
        <li class="uk-margin-right">
          <a href="https://www.linkedin.com/company/miller-ad-agency" target="_blank" uk-scrollspy="cls: uk-animation-scale-up;" title="Link us? Follow us? Or...?" uk-tooltip>
            <span uk-icon="icon: linkedin" class="uk-icon"></span>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/milleragency" target="_blank" uk-scrollspy="cls: uk-animation-scale-up;" title="#hashtag — right?" uk-tooltip>
            <span uk-icon="icon: twitter" class="uk-icon"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>

</div>
<?php
  // ------------------
  // end of #container
  // ------------------
?>

<footer class="maa-footer" id="footer">
  <div class="footer-image" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
    <div class="footer-image-tint"></div>
  </div>
  <div class="uk-container uk-margin-remove-top uk-margin-medium-bottom uk-text-smaller" id="footerBars" uk-navbar>
    <ul class="maa-footer-links uk-width-1-1 uk-flex-center uk-text-center">
      <li><a href="/seo-evaluation" class="elementor-button elementor-size-sm">Check Your SEO</a></li>
      <li><a href="/google-adwords" class="elementor-button elementor-size-sm">Google AdWords</a></li>
      <li><a href="/pandora-radio-advertising" class="elementor-button elementor-size-sm">Advertise on Pandora Radio</a></li>
      <li><a href="http://www.bbb.org/dallas/business-reviews/advertising-agencies-and-counselors/miller-ad-agency-in-dallas-tx-90377086" target="_blank" class="elementor-button elementor-size-sm" title="*This link opens a new tab" uk-tooltip>BBB A+ Rated Business*</a></li>
      <li><a href="http://www.baylor.edu/business/txfamily/index.php?id=97637" target="_blank" class="elementor-button elementor-size-sm" title="*This link opens a new tab" uk-tooltip>Baylor Business*</a></li>
    </ul>
  </div>

  <div class="uk-container uk-margin-remove-top uk-margin-remove-bottom uk-text-center uk-text-small">

      <?php // ---------------------- ?>
      <?php // COPYRIGHT ?>
      <p class="copyright uk-margin-small-bottom" id="copyrightFooter">
        © 1984<script>document.getElementById('copyrightFooter').appendChild(document.createTextNode("–"+new Date().getFullYear()))</script>&nbsp;Miller Ad Agency
      </p>

      <ul class="maa-footer-details uk-margin-remove-top uk-margin-small-bottom">
        <li>
          <a href="https://goo.gl/maps/LChXN6prw412" target="_blank" class="maa-footer-map-link">2711 Valley View Lane, Suite 101, Dallas, TX</a>
        </li>
        <li>
          <a href="tel:9722432211">972.243.2211</a>
        </li>
        <li>
          <a href="/privacy">Privacy Policy</a>
        </li>
        <li>
          <a href="/terms">Terms of Use</a>
        </li>
      </ul>

      <?php // ---------------------- ?>
      <?php // LOAD PERFORMANCE ?>
      <!-- <p class="query-load uk-text-small uk-margin-small-bottom">
        Load: <span class="perf-load"><?php echo get_num_queries(); ?></span> queries. <span class="perf-load"><?php timer_stop(1); ?></span> seconds.
      </p> -->

      <?php // ---------------------- ?>
      <?php // SUPPORT LINK ?>
      <p class="maa-credits uk-margin-remove">
        Find something wrong with our website? <a href="/support">Submit a ticket.</a>
      </p>

  </div>
</footer>

<?php
  // ------------------
  // SERVICES MOBILE FAB MENU
  // when the page with a post_title of "Media" is being displayed
  // $link_address = "#fab-modal";
  // if (is_page("Advertising")) {
  //   echo
  //     "<a href='$link_address' class='uk-icon-button maa-fab uk-animation-scale-up uk-hidden@m' uk-toggle><span uk-icon='icon: list'></span></a>";
  //   echo
  //       "<div id='fab-modal' uk-modal>
  //         <div class='uk-modal-dialog'>
  //           <button class='uk-close uk-close-large uk-background-muted uk-border-circle uk-modal-close-default' type='button' uk-close></button>
  //           <div class='uk-modal-header'>
  //             <h2 class='uk-modal-title'>Advertising</h2>
  //           </div>
  //           <div class='uk-modal-body' uk-overflow-auto>";
  //               $menu_args = array(
  //                 'theme_location'    => 'mobile',
  //                 'container'         => 'ul',
  //                 'container_class'   => '',
  //                 'container_id'      => '',
  //                 'menu'              => 'services',
  //                 'menu_class'        => 'uk-nav uk-list uk-list-divider',
  //                 'menu_id'           => '',
  //                 'echo'              => true,
  //                 'depth'             => 0,
  //               );
  //               wp_nav_menu( $menu_args );
  //           echo
  //           "</div>
  //           <div class='uk-modal-footer uk-text-right'>
  //             <a href='/contact' class='elementor-button-link elementor-button elementor-submit elementor-size-sm' type='button'>Hire Us</a>
  //             <a class='elementor-button-link elementor-button elementor-size-sm uk-modal-close' type='button'>Close</a>
  //           </div>
  //         </div>
  //       </div>";
  // } else {
  //   // null
  // };
?>

<!-- MOBILE OFF-CANVAS SIDEBAR NAV -->
<!-- <div id="offcanvas" class="uk-modal-full uk-animation-slide-bottom-small" uk-modal>
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
    <div class="">
      <ul class="uk-flex uk-flex-around uk-flex-nowrap" uk-tab="animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
        <li><a href="#">About</a></li>
        <li><a href="#">Advertising</a></li>
        <li><a href="#">Our Work</a></li>
        <li><a href="#">Tools</a></li>
      </ul>
      <ul class="uk-switcher uk-margin">
        <li>
          <div class="uk-padding-smaller">
            <h4><a href="">About Miller Ad Agency</a></h4>
            <p>
              For more than 30 years Miller Ad Agency has earned a reputation as experts in advertising. We use our unique approach to marketing and advertising to bring you the results you’re looking for. From boosting your bottom line to growing your market share, we brings results.
            </p>
          </div>
          <hr />

          <div class="uk-padding-smaller">
            <h4><a href="">Miller crew</a></h4>
            <p>
              This crew keeps the ship sailing. Take a look at the fine folks that make all this possible.
            </p>
          </div>
          <hr />

          <div class="uk-padding-smaller">
            <h4><a href="">Blog posts</a></h4>
            <p>
              Ramblings, rants, theories, tips, and more!
            </p>
          </div>
          <hr />

          <div class="uk-padding-smaller">
            <h4><a href="">Our clients</a></h4>
            <p>
              Miller Ad Agency prides itself in building success for our clients both large and small. For over twenty years Miller Ad Agency has been working to build strong, collaborative relationships with our clients.
            </p>
          </div>
          <hr />

          <div class="uk-padding-smaller">
            <h4><a href="">Why they love us</a></h4>
            <p>
              Listen to some testimonials from the brands we boost; check out what our clients have said.
            </p>
          </div>
          <hr />

          <div class="uk-padding-smaller">
            <h4><a href="">Careers</a></h4>
            <p>
              Do you consider yourself a conjurer of conjugation? Become a Copywriter. Are you the Da Vinci of design? Become a Graphic Designer. Do you enjoy expediting and facilitating? Become an Account Services consultant. Want to be CEO? Sorry, that job is already taken.
            </p>
          </div>
          <hr />

          <div class="uk-padding-smaller">
            <h4><a href="">The newsletter</a></h4>
            <p>
              With a team spanning across generations, we use our diverse point of views to reach all target markets. Now, pull up a chair, grab a beer, pick up a Nerf gun or golf club, pet the nearest puppy and let's get started on growing your business.
            </p>
          </div>
          <hr />
        </li>
        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
        <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
      </ul>
    </div>
    <p class="uk-margin-small-bottom uk-text-center" id="copyrightSidebar">
      &copy; 1984<script>document.getElementById('copyrightSidebar').appendChild(document.createTextNode("–"+new Date().getFullYear()))</script>&nbsp;<?php bloginfo('name'); ?>
    </p>
    <p class="uk-text-small uk-margin-medium-bottom uk-text-center">
      Find something wrong with our website?<br /><a href="/support">Submit a ticket</a>.
    </p>
  </div>
</div> -->

<div id="offcanvas" class="uk-modal-full uk-animation-slide-bottom-small" uk-modal>
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
    <p class="uk-margin-small-bottom uk-text-center" id="copyrightSidebar">
      &copy; 1984<script>document.getElementById('copyrightSidebar').appendChild(document.createTextNode("–"+new Date().getFullYear()))</script>&nbsp;<?php bloginfo('name'); ?>
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
