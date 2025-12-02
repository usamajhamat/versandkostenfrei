<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog_row['heading']); ?> – Perfektes Sparerlebnis</title>
    <meta name="description" content="<?php echo substr(strip_tags($blog_row['description']), 0, 155) . '...'; ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        :root {
            --primary: #5c8374;
            --primary-dark: #4a6b5f;
            --primary-light: #92bfa7;
            --text: #1a1a1a;
            --text-light: #555;
            --gray: #64748b;
            --bg: #fdfdfd;
            --white: #ffffff;
            --radius: 32px;
            --shadow: 0 30px 80px rgba(0,0,0,0.12);
            --shadow-inset: inset 0 8px 30px rgba(0,0,0,0.06);
            --transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.9;
            font-size: 18.5px;
            overflow-x: hidden;
        }

        /* === HERO – PARALLAX ZOOM EFFECT === */
        .hero {
            position: relative;
            height: 85vh;
            min-height: 680px;
            max-height: 1000px;
            overflow: hidden;
        }

        .hero_image {
            width: 110%;
            height: 110%;
            object-fit: cover;
            transform: scale(1.08);
            transition: transform 14s ease-out;
        }

        /* Subtle zoom on scroll */
        body.scrolled .hero_image {
            transform: scale(1.18);
        }

        .hero_overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                rgba(0,0,0,0) 0%,
                rgba(0,0,0,0.25) 50%,
                rgba(0,0,0.78) 100%
            );
        }

        .hero_content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 140px 8% 100px;
            max-width: 1480px;
            margin: 0 auto;
            z-index: 10;
        }

        .hero_heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3.4rem, 8vw, 7rem);
            font-weight: 900;
            line-height: 1.08;
            color: black;
            margin-bottom: 24px;
            letter-spacing: -1.5px;
            text-shadow: 0 10px 40px rgba(0,0,0,0.7);
        }

        .hero_meta {
            display: flex;
            align-items: center;
            gap: 20px;
            color: rgba(255,255,255,0.95);
            font-size: 18px;
            font-weight: 500;
        }

        .meta_item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .meta_item i { color: var(--primary-light); }

        /* === ARTICLE CARD – OVERLAPPING HERO === */
        .article_wrapper {
            max-width: 960px;
            margin: -180px auto 160px;
            padding: 0 5%;
            position: relative;
            z-index: 20;
        }

        .article_card {
          margin-top: 120px;
            background: var(--white);
            border-radius: var(--radius);
            padding: 100px 40px;
            box-shadow: var(--shadow);
            position: relative;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.4);
        }

        .article_card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: var(--radius);
            background: linear-gradient(135deg, rgba(92,131,116,0.06), rgba(255,255,255,0.02));
            pointer-events: none;
        }

        .reading_time {
            color: var(--primary);
            font-weight: 600;
            font-size: 17px;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* === CONTENT STYLING === */
        .article_body {
            font-size: 19.5px;
            line-height: 2;
            color: #2d3748;
        }

        .article_body p {
            margin-bottom: 36px;
            text-align: justify;
            hyphens: auto;
            -webkit-hyphens: auto;
        }

        .article_body h2, .article_body h3, .article_body h4 {
            font-family: 'Playfair Display', serif;
            color: var(--text);
            margin: 64px 0 28px;
            line-height: 1.3;
        }

        .article_body h2 { font-size: 42px; font-weight: 800; }
        .article_body h3 { font-size: 34px; font-weight: 700; }
        .article_body h4 { font-size: 26px; }

        .article_body strong { font-weight: 700; color: #111; }
        .article_body em { color: var(--primary-dark); }

        .article_body ul, .article_body ol {
            margin: 32px 0;
            padding-left: 32px;
        }

        .article_body li {
            margin-bottom: 14px;
        }

        .article_body a {
            color: var(--primary);
            text-decoration: underline;
            text-underline-offset: 3px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .article_body a:hover { color: var(--primary-dark); }

        .article_body blockquote {
            border-left: 5px solid var(--primary);
            padding-left: 32px;
            margin: 48px 0;
            font-style: italic;
            color: var(--primary-dark);
            font-size: 22px;
            line-height: 1.7;
        }

        /* === SHARE & BACK SECTION === */
        .post_footer {
            margin-top: 100px;
            padding-top: 80px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .share_buttons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: #f1f1f1;
            color: var(--text);
            border-radius: 50%;
            font-size: 20px;
            transition: var(--transition);
        }

        .share_buttons a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-6px);
        }

        .back_btn {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            background: var(--primary);
            color: white;
            padding: 18px 48px;
            border-radius: 60px;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 15px 45px rgba(92,131,116,0.4);
            transition: var(--transition);
        }

        .back_btn:hover {
            background: var(--primary-dark);
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(92,131,116,0.5);
        }

        .back_btn i {
            font-size: 22px;
            transition: transform 0.4s;
        }

        .back_btn:hover i { transform: translateX(-8px); }

        /* === RESPONSIVE === */
        @media (max-width: 1200px) {
            .article_card { padding: 80px 80px; }
        }

        @media (max-width: 992px) {
            .article_wrapper { margin: -120px auto 120px; }
            .article_card { padding: 70px 60px; }
            .hero_content { padding-bottom: 90px; }
        }

        @media (max-width: 768px) {
            .hero { height: 70vh; min-height: 580px; }
            .hero_heading { font-size: 3.4rem; }
            .article_wrapper { margin: -90px auto 100px; padding: 0 4%; }
            .article_card { padding: 60px 40px; border-radius: 24px; }
            .article_body { font-size: 18.5px; }
            .post_footer { flex-direction: column; align-items: stretch; }
            .back_btn { width: 100%; justify-content: center; }
        }

        @media (max-width: 480px) {
            .article_card { padding: 50px 25px; }
            .hero_content { padding: 100px 5% 80px; }
        }
    </style>
</head>
<body>

    <!-- HERO -->
    <section class="hero">
        <img src="<?php echo base_url().$image_url.$blog_row['blog_image']; ?>"
             alt="<?php echo htmlspecialchars($blog_row['heading']); ?>"
             class="hero_image" loading="eager">

        <div class="hero_overlay"></div>

        <div class="hero_content">
            <h1 class="hero_heading"><?php echo htmlspecialchars($blog_row['heading']); ?></h1>

            <div class="hero_meta">
                <div class="meta_item">
                    <i class="far fa-calendar-alt"></i>
                    <span><?php echo date('d. F Y', strtotime($blog_row['date_added'])); ?></span>
                </div>
                <div class="meta_item">
                    <i class="far fa-clock"></i>
                    <span>ca. <?php echo ceil(str_word_count(strip_tags($blog_row['description'])) / 220); ?> Min. Lesezeit</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ARTICLE -->
    <div class="article_wrapper">
        <article class="article_card">
            <div class="reading_time">
                <i class="far fa-clock"></i>
                <?php echo ceil(str_word_count(strip_tags($blog_row['description'])) / 220); ?> Minuten Lesezeit
            </div>

            <div class="article_body">
                <?php echo $blog_row['description']; ?>
            </div>

            <div class="post_footer">
                <div class="share_buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(current_url()); ?>" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(current_url()); ?>&text=<?php echo urlencode($blog_row['heading']); ?>" target="_blank" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(current_url()); ?>" target="_blank" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="mailto:?subject=<?php echo urlencode($blog_row['heading']); ?>&body=<?php echo urlencode(current_url()); ?>" aria-label="E-Mail">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>

                <a href="<?php echo base_url('home/blog_info'); ?>" class="back_btn">
                    <i class="fas fa-arrow-left"></i>
                    Zurück zur Übersicht
                </a>
            </div>
        </article>
    </div>

    <!-- Parallax zoom on scroll -->
    <script>
        window.addEventListener('scroll', () => {
            document.body.classList.toggle('scrolled', window.scrollY > 100);
        });
    </script>
</body>
</html>