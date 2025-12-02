<?php $date = date("Y-m-d"); ?>
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

    body { font-family: 'Segoe UI', system-ui, sans-serif; color: var(--text); background: #fff; line-height: 1.7; }

    /* Hero Section – wie bei Kategorien */
    .page-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 120px 20px 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('https://images.unsplash.com/photo-1558618666-fcd25e63d45f?w=1920') center/cover no-repeat;
        opacity: 0.12;
    }
    .page-hero h1 {
        font-size: 3.8rem;
        font-weight: 800;
        margin: 0;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        letter-spacing: -0.5px;
    }
    .page-hero p {
        font-size: 1.35rem;
        max-width: 800px;
        margin: 20px auto 0;
        opacity: 0.95;
    }

    /* Content Area */
    .page-content-wrapper {
        background: white;
        margin-top: -60px;
        border-radius: 24px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 80px;
    }
    .page-content {
        padding: 60px 50px;
        max-width: 900px;
        margin: 0 auto;
        font-size: 1.1rem;
    }
    .page-content h2 {
        color: var(--primary);
        font-size: 2.2rem;
        margin: 45px 0 20px;
        position: relative;
        padding-bottom: 12px;
    }
    .page-content h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 80px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
    }
    .page-content h3 { color: var(--primary-dark); margin-top: 35px; font-size: 1.6rem; }
    .page-content p { margin-bottom: 20px; }
    .page-content ul { padding-left: 25px; margin: 20px 0; }
    .page-content ul li { margin-bottom: 10px; position: relative; }
    .page-content ul li::before {
        content: '✓';
        color: var(--primary);
        font-weight: bold;
        position: absolute;
        left: -25px;
    }
    .page-content img {
        max-width: 100%;
        border-radius: 16px;
        margin: 30px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    /* Newsletter Box – modern & eye-catching */
    .newsletter-box {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 40px;
        border-radius: 20px;
        text-align: center;
        margin: 60px 0;
        box-shadow: 0 15px 40px rgba(92,131,116,0.3);
    }
    .newsletter-box h3 {
        font-size: 2rem;
        margin: 0 0 15px;
    }
    .newsletter-box p {
        font-size: 1.15rem;
        opacity: 0.95;
        margin-bottom: 25px;
    }
    .newsletter-form {
        display: flex;
        max-width: 520px;
        margin: 0 auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        border-radius: 50px;
        overflow: hidden;
    }
    .newsletter-form input[type="email"] {
        flex: 1;
        padding: 18px 25px;
        border: none;
        font-size: 1.1rem;
        outline: none;
    }
    .newsletter-form button {
        background: white;
        color: var(--primary);
        border: none;
        padding: 0 35px;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    .newsletter-form button:hover {
        background: #f0f0f0;
        transform: scale(1.05);
    }
    .newsletter-privacy {
        margin-top: 20px;
        font-size: 0.9rem;
        opacity: 0.9;
    }
    .newsletter-privacy a { color: #a8d5c8; text-decoration: underline; }

    /* Responsive */
    @media (max-width: 768px) {
        .page-hero h1 { font-size: 2.8rem; }
        .page-hero p { font-size: 1.15rem; }
        .page-content { padding: 40px 25px; }
        .newsletter-form { flex-direction: column; border-radius: 16px; }
        .newsletter-form button { padding: 16px; border-radius: 0 0 16px 16px; }
    }
</style>

<main id="cs-main" class="cs-main-default">

    <!-- HERO SECTION -->
    <section class="page-hero">
        <div class="container position-relative">
            <h1><?php echo htmlspecialchars($page_content['title'] ?? 'Unsere Seite'); ?></h1>
            <p>Wir helfen dir, immer den besten Deal zu finden – einfach, schnell und kostenlos.</p>
        </div>
    </section>

    <div class="container">
        <div class="page-content-wrapper">
            <article class="page-content">
                <!-- Hauptinhalt der statischen Seite -->
                <?php echo htmlspecialchars_decode($page_content['description']); ?>
                
                <!-- Optional: Bild einfügen (wenn vorhanden) -->
                <?php if (!empty($page_content['image'])): ?>
                    <img src="<?php echo base_url($static_upload_url . $page_content['image']); ?>" alt="<?php echo htmlspecialchars($page_content['title']); ?>">
                <?php endif; ?>
            </article>
        </div>

        <!-- MODERNES NEWSLETTER MODUL -->
       
    </div>
</main>

<script>
// Einfache Newsletter-Funktion (du kannst sie mit deinem bestehenden AJAX-Code verbinden)
function subscribeNewsletter(e) {
    e.preventDefault();
    const email = document.getElementById('optin-email').value.trim();
    const privacy = document.getElementById('privacy').checked;
    const errorEl = document.getElementById('news_error');

    if (!email || !privacy) {
        errorEl.textContent = 'Bitte E-Mail und Datenschutz bestätigen.';
        return;
    }

    // Hier dein bestehender AJAX-Code einfügen
    // Beispiel:
    // $.post(base_url + 'home/subscribe', { email: email }, function(res) { ... });

    errorEl.style.color = '#a8d5c8';
    errorEl.textContent = 'Super! Du wirst bald die besten Gutscheine erhalten!';
    document.querySelector('.newsletter-form').reset();
}
</script>