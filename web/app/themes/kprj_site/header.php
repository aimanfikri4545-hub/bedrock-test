<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
      <span class="brand-mark" aria-hidden="true"></span>
      <span class="brand-text">KPRJ</span>
    </a>

    <nav id="primary-menu" class="site-nav" aria-label="Primary Navigation">
      <a href="#business-core">Business Core</a>
      <a href="#integrity">Integrity &amp; Governance</a>
      <a href="#invest">Invest With Us</a>
    </nav>

    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
      <span class="menu-line" aria-hidden="true"></span>
      <span class="menu-line" aria-hidden="true"></span>
      <span class="menu-line" aria-hidden="true"></span>
      <span class="screen-reader-text"><?php esc_html_e('Toggle menu', 'kprj-site'); ?></span>
    </button>
  </div>
</header>
