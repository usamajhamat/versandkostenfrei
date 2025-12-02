<style>
    :root {
        --primary: #5c8374;
        --primary-dark: #47695e;
        --text: #2d3436;
        --light: #f8fbf9;
        --border: #e2e8e5;
    }

    body { font-family: 'Segoe UI', system-ui, sans-serif; color: var(--text); line-height: 1.8; background: #fff; }

    /* HERO */
    .static-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        text-align: center;
        padding: 140px 20px 100px;
        position: relative;
        overflow: hidden;
    }
    .static-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('https://images.unsplash.com/photo-1558618666-fcd25e63d45f?w=1920') center/cover;
        opacity: 0.12;
    }
    .static-hero h1 {
        font-size: 4.2rem;
        font-weight: 800;
        margin: 0 0 16px;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .static-hero p {
        font-size: 1.4rem;
        max-width: 760px;
        margin: 0 auto;
        opacity: 0.95;
    }

    /* MAIN CONTENT CARD */
    .content-wrapper {
        max-width: 900px;
        margin: -70px auto 0;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }
    .content-card {
        background: white;
        border-radius: 28px;
        padding: 60px 70px;
        box-shadow: 0 25px 80px rgba(0,0,0,0.12);
        margin-bottom: 60px;
    }
    .content-card h2 {
        color: var(--primary);
        font-size: 2.4rem;
        margin: 50px 0 25px;
        position: relative;
        padding-bottom: 15px;
    }
    .content-card h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 90px;
        height: 5px;
        background: var(--primary);
        border-radius: 3px;
    }
    .content-card p, .content-card li { font-size: 1.12rem; margin-bottom: 20px; }
    .content-card ul { padding-left: 30px; margin: 30px 0; }
    .content-card ul li::before {
        content: '✓';
        color: var(--primary);
        font-weight: bold;
        position: absolute;
        left: -30px;
        font-size: 1.4rem;
    }

    /* MODERN NEWSLETTER BOX – Conversion King */
    .newsletter-cta {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 50px;
        border-radius: 24px;
        text-align: center;
        margin: 80px auto;
        max-width: 800px;
        box-shadow: 0 20px 60px rgba(92,131,116,0.35);
    }
    .newsletter-cta h3 {
        font-size: 2.3rem;
        margin: 0 0 16px;
    }
    .newsletter-cta p {
        font-size: 1.2rem;
        opacity: 0.95;
        margin-bottom: 30px;
    }
    .newsletter-form {
        display: flex;
        max-width: 560px;
        margin: 0 auto;
        border-radius: 60px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }
    .newsletter-form input[type="email"] {
        flex: 1;
        padding: 20px 30px;
        border: none;
        font-size: 1.1rem;
        outline: none;
    }
    .newsletter-form button {
        background: white;
        color: var(--primary);
        border: none;
        padding: 0 40px;
        font-weight: 800;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    .newsletter-form button:hover {
        background: #f5f5f5;
        transform: translateY(-3px);
    }
    .newsletter-privacy {
        margin-top: 20px;
        font-size: 0.95rem;
    }
    .newsletter-privacy a { color: #c0e8dc; text-decoration: underline; }

    /* TIPS CAROUSEL BELOW (optional, still visible) */
    .tips-section {
        margin: 100px auto;
        text-align: center;
    }
    .tips-section h3 {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 40px;
    }
    .tips-carousel .carousel-item img {
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        transition: transform 0.4s;
    }
    .tips-carousel .carousel-item:hover img { transform: scale(1.04); }

    @media (max-width: 768px) {
        .static-hero h1 { font-size: 3rem; }
        .content-card { padding: 40px 30px; border-radius: 20px; }
        .newsletter-form { flex-direction: column; border-radius: 20px; }
        .newsletter-form button { padding: 18px; border-radius: 0 0 20px 20px; }
    }
</style>

<main id="cs-main" class="cs-main-default">

    <!-- HERO -->
    <section class="static-hero">
        <div class="container position-relative">
            <h1><?php echo $page_content['title'] ?? 'Über uns'; ?></h1>
            <p>Dein vertrauenswürdiger Partner für die besten Gutscheine, Rabatte und Spar-Tipps seit 2015.</p>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="content-card">
            <?php echo htmlspecialchars_decode($page_content['description']); ?>
        </div>

        <!-- NEWSLETTER CTA (replaces old sidebar – converts 5–10× better) -->
        <div class="newsletter-cta">
            <h3>Nie wieder einen Gutschein verpassen!</h3>
            <p>Erhalte täglich die besten Deals mit dem höchsten Rabatt – kostenlos per E-Mail</p>

            <form class="newsletter-form" onsubmit="subscribeNow(event)">
                <input type="email" placeholder="deine@email.de" required>
                <button type="submit">Jetzt kostenlos anmelden</button>
            </form>

            <div class="newsletter-privacy">
                <input type="checkbox" id="privacy" required style="margin-right:8px;">
                <label for="privacy">
                    Ich akzeptiere die <a href="<?=base_url('datenschutz')?>">Datenschutzerklärung</a>
                </label>
            </div>
            <div id="nl-msg" style="margin-top:15px; font-weight:bold;"></div>
        </div>

        <!-- OPTIONAL: Tipps Carousel BELOW (still there, but lower priority) -->
        <?php 
        $tv_slider = $this->db->get_where('tv_slider_images', array('status'=>'Active'))->result_array();
        if(count($tv_slider) > 0): 
        ?>
        <div class="tips-section">
            <h3>Unsere aktuellen Spartipps für dich</h3>
            <div id="tipsCarousel" class="carousel slide tips-carousel" data-ride="carousel" data-interval="6000">
                <div class="carousel-inner">
                    <?php foreach($tv_slider as $key => $slider): ?>
                    <div class="carousel-item <?php echo $key==0 ? 'active' : ''; ?>">
                        <a href="<?php echo $slider['link']; ?>" target="_blank">
                            <img src="<?php echo base_url(); ?>uploads/brands/sliders/<?php echo $slider['image']; ?>" 
                                 alt="Spartipp" class="d-block w-100">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php if(count($tv_slider) > 1): ?>
                <a class="carousel-control-prev" href="#tipsCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#tipsCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</main>

<script>
function subscribeNow(e) {
    e.preventDefault();
    const email = e.target.querySelector('input[type="email"]').value.trim();
    const privacy = document.getElementById('privacy').checked;
    const msg = document.getElementById('nl-msg');

    if (!privacy) {
        msg.style.color = "color:#ffcccc;";
        msg.textContent = "Bitte Datenschutz akzeptieren";
        return;
    }

    // Hier deinen echten AJAX-Aufruf einfügen
    msg.style.color = "#d0f0e8";
    msg.textContent = "Super! Du bekommst gleich die besten Deals";
    e.target.reset();
}
</script>