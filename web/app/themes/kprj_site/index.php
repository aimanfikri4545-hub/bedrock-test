<?php get_header(); ?>

<main>
  <section id="top" class="hero">
    <div class="container">
      <p class="eyebrow">WordPress + Bedrock</p>
      <h1>Building a modern and interactive website</h1>
      <p class="hero-copy">
        This custom theme is now structured for a cleaner UI, responsive layout, and lightweight interactions.
      </p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="#features">Explore Features</a>
        <a class="btn btn-ghost" href="#contact">Get In Touch</a>
      </div>
    </div>
  </section>

  <section id="features" class="section">
    <div class="container">
      <h2>Core Features</h2>
      <div class="grid cards reveal-group">
        <article class="card reveal">
          <h3>Responsive Design</h3>
          <p>Looks great across phones, tablets, and desktops with a fluid layout system.</p>
        </article>
        <article class="card reveal">
          <h3>Fast + Lightweight</h3>
          <p>No heavy frontend framework required, simple and easy to maintain.</p>
        </article>
        <article class="card reveal">
          <h3>Interactive UI</h3>
          <p>Navigation toggle and reveal animations make the experience feel dynamic and modern.</p>
        </article>
      </div>
    </div>
  </section>

  <section id="about" class="section alt">
    <div class="container split">
      <div>
        <h2>Why Bedrock</h2>
        <p>
          Bedrock gives us better structure and dependency management so we can focus on a high-quality experience.
        </p>
      </div>
      <div class="panel reveal">
        <p>
          Next steps can include custom post types, reusable template parts, and a CMS-driven content strategy.
        </p>
      </div>
    </div>
  </section>

  <section id="contact" class="section">
    <div class="container contact-box reveal">
      <h2>Ready to keep building?</h2>
      <p>We can now add real content sections, a blog layout, and a polished design system.</p>
      <a class="btn btn-primary" href="mailto:hello@example.com">Contact Us</a>
    </div>
  </section>
</main>

<?php get_footer(); ?>
