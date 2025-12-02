<style>
    :root {
        --primary: #5c8374;
        --primary-dark: #47695e;
        --accent: #e8f0ed;
        --text: #2e3532;
        --light: #f9fbfa;
        --gray: #6c757d;
        --border: #e0e0e0;
    }

    body { font-family: 'Segoe UI', system-ui, sans-serif; color: var(--text); background: #fff; line-height: 1.75; }

    /* HERO SECTION – modern & powerful */
    .static-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 130px 20px 90px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .static-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('https://images.unsplash.com/photo-1558618666-fcd25e63d45f?w=1920') center/cover;
        opacity: 0.15;
    }
    .static-hero h1 {
        font-size: 4rem;
        font-weight: 800;
        margin: 0 0 16px;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        letter-spacing: -1px;
    }
    .static-hero p {
        font-size: 1.4rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
    }

    /* MAIN CONTENT + SIDEBAR LAYOUT */
    .static-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 50px;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        margin-top: -70px;
        position: relative;
        z-index: 2;
    }

    /* Main Content Card */
    .content-card {
        background: white;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        min-height: 600px;
    }
    .content-card h2 {
        color: var(--primary);
        font-size: 2.4rem;
        margin: 45px 0 20px;
        position: relative;
        padding-bottom: 15px;
    }
    .content-card h2::after {
        content: '';
        position: absolute;
        left: 0; bottom: 0;
        width: 90px;
        height: 5px;
        background: var(--primary);
        border-radius: 3px;
    }
    .content-card h3 {
        color: var(--primary-dark);
        font-size: 1.8rem;
        margin: 35px 0 15px;
    }
    .content-card p, .content-card li {
        font-size: 1.1rem;
        margin-bottom: 18px;
    }
    .content-card ul {
        padding-left: 28px;
        margin: 25px 0;
    }
    .content-card ul li {
        position: relative;
        margin-bottom: 12px;
    }
    .content-card ul li::before {
        content: '✓';
        color: var(--primary);
        font-weight: bold;
        position: absolute;
        left: -28px;
        font-size: 1.3rem;
    }
    .content-card img {
        max-width: 100%;
        border-radius: 18px;
        margin: 35px 0;
        box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    }

    /* SIDEBAR – modern & sticky */
    .sidebar-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(0,0,0,0.1);
        position: sticky;
        top: 100px;
        align-self: start;
    }
    .sidebar-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 25px;
        text-align: center;
    }
    .sidebar-header h4 {
        font-size: 1.6rem;
        margin: 0;
        font-weight: 700;
    }
    .sidebar-body {
        padding: 20px;
    }

    /* Carousel – modern */
    .sidebar-carousel .carousel-inner img {
        border-radius: 16px;
        height: 220px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .sidebar-carousel .carousel-item:hover img {
        transform: scale(1.05);
    }
    .carousel-control-prev, .carousel-control-next {
        background: rgba(0,0,0,0.4);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-image: none;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: white;
    }
    .carousel-control-prev-icon::before { content: '\f053'; }
    .carousel-control-next-icon::before { content: '\f054'; }

    /* Responsive */
    @media (max-width: 991px) {
        .static-layout {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        .content-card { padding: 40px 30px; }
        .sidebar-card { position: static; }
        .static-hero h1 { font-size: 3rem; }
    }
    @media (max-width: 576px) {
        .static-hero { padding: 100px 15px 70px; }
        .content-card { padding: 30px 20px; border-radius: 18px; }
    }
</style>

<main id="cs-main" class="cs-main-default">

    <!-- HERO -->
    <section class="static-hero">
        <div class="container position-relative">
            <h1><?php echo htmlspecialchars($page_content['title'] ?? 'Information'); ?></h1>
            <p>Transparenz, Vertrauen und die besten Gutscheine – seit Jahren dein zuverlässiger Spar-Partner.</p>
        </div>
    </section>

    <div class="container">
        <div class="static-layout">

            <!-- MAIN CONTENT -->
            <article class="content-card">
                <?php echo htmlspecialchars_decode($page_content['description']); ?>

                <?php if (!empty($page_content['image'])): ?>
                    <img src="<?php echo base_url($static_upload_url . $page_content['image']); ?>" 
                         alt="<?php echo htmlspecialchars($page_content['title']); ?>">
                <?php endif; ?>
            </article>

            <!-- SIDEBAR WITH CAROUSEL -->
            <aside class="sidebar-card">
                <div class="sidebar-header">
                    <h4>Tipps für dich</h4>
                </div>
                <div class="sidebar-body sidebar-carousel">
                    <div id="tipsCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner">
                            <?php
                            $tv_slider = $this->db->get_where('tv_slider_images', array('status'=>'Active'))->result_array();
                            foreach($tv_slider as $key => $slider):
                            ?>
                                <div class="carousel-item <?php echo $key === 0 ? 'active' : ''; ?>">
                                    <a href="<?php echo $slider['link']; ?>" target="_blank">
                                        <img src="<?php echo base_url(); ?>uploads/brands/sliders/<?php echo $slider['image']; ?>" 
                                             alt="Tipp">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if(count($tv_slider) > 1): ?>
                        <a class="carousel-control-prev" href="#tipsCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#tipsCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</main>

<!-- Font Awesome für Pfeile (falls noch nicht geladen) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>