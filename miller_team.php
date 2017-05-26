<?php /* Template Name: Miller Team */ ?>

<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

 // TODO: MAKE THIS SHIT WORK....

get_header(); ?>

<div id="main" role="main" class="maa-author">

  <?php // AUTHOR LOOP
    global $wp_query;
    $curauth = $wp_query->get_queried_object();
  ?>

  <section class="uk-margin-bottom">
    <div class="uk-container uk-margin-small-bottom">
      <ul class="uk-breadcrumb">
        <li class="item-home">
          <a class="bread-link bread-home" href="/" title="Home">
            Home
          </a>
        </li>
        <li class="item-current">
          <a class="bread-parent" href="/about-miller-ad-agency/team" title="Team Miller">
            Team Miller
          </a>
        </li>
      </ul>
    </div>
  </section>
  <!-- EMPLOYEE PROFILE CARDS -->
  <section class="uk-container">
    <div class="uk-card uk-card-default maa-profile-card">
      <div class="uk-card-header">
        <div class="maa-profile-card-mobile-link" id="WilliamPansky"></div>
        <div class="uk-grid-small uk-flex-middle" uk-grid>
          <div class="uk-width-auto">
            <img class="maa-profile-card-img" src="/wp-content/uploads/Team-WilliamPansky.jpg">
          </div>
          <div class="uk-width-expand uk-margin-remove-top">
            <h3 class="uk-card-title uk-margin-remove-bottom" title="<?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>">
              <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>
            </h3>
            <p class="uk-text-meta uk-margin-remove-top uk-text-uppercase"><?php echo $curauth->employee_title; ?></p>
          </div>
        </div>
      </div>
      <div class="uk-card-body">
        <p><?php echo $curauth->description; ?></p>
      </div>
      <div class="uk-card-footer">
        <a href="#" class="uk-button uk-button-text">Meet William</a>
      </div>
      <ul class="uk-iconnav maa-profile-card-controls" id="WilliamPansky-controls">
        <li class="uk-text-smaller uk-text-uppercase"><a href="tel:9722432211"><span uk-icon="icon: phone"></span>&nbsp;Call</a></li>
        <li class="uk-text-smaller uk-text-uppercase"><a href="#team-mail-modal" uk-toggle><span uk-icon="icon: mail"></span>&nbsp;Email</a></li>
        <li class="uk-text-smaller uk-text-uppercase"><a href="/about-miller-ad-agency/blog/author/wpansky"><span uk-icon="icon: user"></span>&nbsp;Profile</a></li>
      </ul>
    </div>
  </section>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
