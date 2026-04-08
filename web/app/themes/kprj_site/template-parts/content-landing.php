<?php
$landing = kprj_site_get_landing_data();
$township_slides = !empty($landing['township_slides']) && is_array($landing['township_slides'])
  ? $landing['township_slides']
  : [
      [
        'title' => 'Bangunan Dato&rsquo; Jaafar Muhammad',
        'location' => 'Iskandar Puteri',
        'image' => '',
      ],
    ];
$township_first = $township_slides[0];
?>

<main class="kprj-home">
  <section class="hero-block" id="top">
    <?php if (!empty($landing['hero_video'])) : ?>
      <video class="hero-image" autoplay muted loop playsinline preload="metadata">
        <source src="<?php echo esc_url($landing['hero_video']); ?>" type="video/mp4">
      </video>
    <?php endif; ?>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1>Driving Johor&rsquo;s Infrastructure &amp; Development</h1>
      <p>A strategic development entity driving sustainable growth, unlocking land value, and shaping transformative communities across Johor.</p>
    </div>
  </section>

  <section class="what-we-do section-block" id="business-core">
    <div class="container what-grid">
      <div>
        <h2>What We Do</h2>
        <p>KPRJ is a state-linked development entity committed to delivering high-impact projects that strengthen Johor&rsquo;s economic foundation.</p>
        <p>With a focus on strategic land development, sustainable planning, and long-term value creation, KPRJ plays a key role in shaping the next generation of integrated townships and commercial ecosystems.</p>
        <a class="btn btn-blue" href="#townships">Know More <span>&raquo;</span></a>
      </div>
      <div class="portrait-card">
        <img src="<?php echo esc_url($landing['what_side_image_one']); ?>" alt="KPRJ professional portrait">
      </div>
    </div>

    <div class="container what-media-stack">
      <img src="<?php echo esc_url($landing['what_large_image']); ?>" alt="Aerial city development" class="what-main-image">
      <img src="<?php echo esc_url($landing['what_shape_image']); ?>" alt="" class="floating-shape-image" aria-hidden="true">
      <img src="<?php echo esc_url($landing['what_side_image_two']); ?>" alt="Family in nature" class="floating-image">
    </div>
  </section>

  <section class="invest-band section-block" id="invest">
    <div class="container invest-panel">
      <img src="<?php echo esc_url($landing['invest_image']); ?>" alt="Investment and planning meeting">
      <div class="invest-overlay"></div>
      <div class="invest-copy">
        <h2>Invest in Johor&rsquo;s Future</h2>
        <p>KPRJ offers access to high-value infrastructure and property developments shaping Johor&rsquo;s next phase of growth.</p>
        <a class="btn btn-white" href="#connect">Explore Investment <span>&raquo;</span></a>
      </div>
      <div class="invest-points">
        <p>High Growth Potential</p>
        <p>Strategic Location</p>
        <p>Long-term Value</p>
      </div>
    </div>
  </section>

  <section class="growth-block section-block" id="integrity">
    <div class="container growth-inner">
      <h2>Building Sustainable Growth for Johor</h2>
      <div class="growth-grid">
        <?php foreach ($landing['growth_cards'] as $card) : ?>
          <article class="growth-card">
            <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>">
            <h3><?php echo esc_html($card['title']); ?></h3>
            <a href="#connect" class="btn btn-mini">Read More <span>&raquo;</span></a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="impact-block section-block">
    <div class="container impact-inner">
      <h2>How We Deliver Impact</h2>
      <p class="impact-lead">Through strategic planning, responsible development, and community-driven initiatives, KPRJ transforms opportunities into sustainable growth.</p>
      <div class="impact-grid">
        <div class="impact-list">
          <article>
            <span>Layer 3</span>
            <h3>Sustainable Value Creation</h3>
            <p>Our developments are designed to create long-term value, strengthening communities, supporting businesses, and enhancing quality of life.</p>
          </article>
          <article>
            <span>Layer 2</span>
            <h3>Development &amp; Execution</h3>
            <p>Through engineering expertise and strong project management, we deliver infrastructure, developments, and initiatives that support Johor&rsquo;s progress.</p>
          </article>
          <article>
            <span>Layer 1</span>
            <h3>Strategic Planning</h3>
            <p>We identify high-potential opportunities across Johor and develop plans aligned with economic growth and community needs.</p>
          </article>
        </div>
        <div class="impact-visual" aria-hidden="true">
          <div class="iso-base"></div>
          <div class="iso-block a"></div>
          <div class="iso-block b"></div>
          <div class="iso-block c"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="township-block section-block" id="townships">
    <div class="container township-inner">
      <h2>Township Developments</h2>
      <p class="township-sub">Nurturing Vibrant Communities!</p>

      <div class="township-stack" data-township-slides="<?php echo esc_attr(wp_json_encode($township_slides)); ?>">
        <div class="township-frame township-frame-back-two" aria-hidden="true"></div>
        <div class="township-frame township-frame-back-one" aria-hidden="true"></div>
        <div class="township-frame township-frame-front" aria-hidden="true"></div>

        <button class="township-viewport" type="button" aria-label="Show next township image">
          <img src="<?php echo esc_url($township_first['image']); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($township_first['title'])); ?>" class="township-card township-card-front">
          <img src="<?php echo esc_url($township_first['image']); ?>" alt="" class="township-card township-card-back" aria-hidden="true">
        </button>
      </div>

      <div class="township-meta">
        <div>
          <h3 class="township-title"><?php echo wp_kses_post($township_first['title']); ?></h3>
          <p class="township-location"><?php echo esc_html($township_first['location']); ?></p>
        </div>
        <button class="township-next" type="button"><span>&rarr;</span> Next</button>
      </div>
    </div>
  </section>

  <section class="connect-block section-block" id="connect">
    <div class="container">
      <div class="connect-top">
        <div>
          <h2>Ready to Connect?</h2>
          <p>Discover how we are shaping Johor through real projects, updates, and on-ground impact.</p>
        </div>
        <a href="mailto:enquiry@kprj.com.my" class="btn btn-blue">enquiry@kprj.com.my <span>&raquo;</span></a>
      </div>

      <div class="reel-row">
        <?php foreach ($landing['reels'] as $reel) : ?>
          <article class="reel-card">
            <img src="<?php echo esc_url($reel); ?>" alt="KPRJ social update preview">
            <span class="play-icon">▶</span>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="social-row">
        <p>Follow KPRJ on</p>
        <a href="#" aria-label="TikTok">T</a>
        <a href="#" aria-label="Instagram">I</a>
        <a href="#" aria-label="Facebook">F</a>
        <a href="#" aria-label="YouTube">Y</a>
      </div>
    </div>
  </section>

  <section class="career-block">
    <div class="container career-inner">
      <img src="<?php echo esc_url($landing['career_image']); ?>" alt="KPRJ career opportunities" class="career-image">
      <div class="career-overlay"></div>
      <div class="career-copy">
        <h2>Let&rsquo;s Build Your Career Together!</h2>
        <p>KPRJ Foundation is the dedication and passion of our staff.<br>Join our skilled and enthusiastic team!</p>
        <a href="#connect" class="btn btn-white career-btn">Find More <span>&raquo;</span></a>
      </div>
    </div>
  </section>
</main>
