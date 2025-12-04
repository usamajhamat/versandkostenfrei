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
            --bg: #fdfdfd;
            --white: #ffffff;
            --radius: 32px;
            --shadow: 0 30px 80px rgba(0,0,0,0.12);
            --transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.9;
            font-size: 18.5px;
            overflow-x: hidden;
        }

        /* === BREADCRUMB – Thin & Elegant === */
        .breadcrumb {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            background: rgba(0,0,0,0.45);
            backdrop-filter: blur(12px);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 14px;
            color: rgba(255,255,255,0.9);
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .breadcrumb a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
        }
        .breadcrumb a:hover { color: white; }
        .breadcrumb i { font-size: 12px; opacity: 0.7; }

        /* === HERO – Always Readable === */
        .hero {
            position: relative;
            height: 90vh;
            min-height: 680px;
            overflow: hidden;
        }
        .hero_image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.1);
            transition: transform 16s ease-out;
        }
        body.scrolled .hero_image {
            transform: scale(1.22);
        }

        /* Dark gradient + glass backdrop for perfect text readability */
        .hero_overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                rgba(0,0,0,0.1) 0%,
                rgba(0,0,0,0.4) 50%,
                rgba(0,0,0,0.85) 100%
            );
        }

        .hero_content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 160px 8% 100px;
            z-index: 10;
        }

        /* Backdrop behind heading for maximum readability */
        .heading-backdrop {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: full;
            max-width: 1200px;
            background: rgba(60,60,60,0.55);
            backdrop-filter: blur(14px);
            padding: 40px 50px;
            border-radius: 28px;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
        }

        .hero_heading {
            position: relative;
            font-family: 'Playfair Display', serif;
            font-size: clamp(3.2rem, 7.5vw, 6.8rem);
            font-weight: 500;
            line-height: 1.05;
            color: white;
            margin: 0;
            letter-spacing: -1.8px;
            text-shadow: 0 8px 30px rgba(0,0,0,0.8);
            text-align: center;
        }

        .hero_meta {
            display: flex;
            justify-content: center;
            gap: 28px;
            margin-top: 28px;
            color: rgba(255,255,255,0.95);
            font-size: 17px;
            font-weight: 500;
        }
        .meta_item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .meta_item i { color: var(--primary-light); }

        /* === ARTICLE CARD === */
        .article_wrapper {
            max-width: 960px;
            margin: -140px auto 160px;
            padding: 0 5%;
            position: relative;
            z-index: 20;
        }
        .article_card {
            background: white;
            border-radius: var(--radius);
            padding: 90px 70px;
          margin-top: 120px;
            box-shadow: var(--shadow);
            position: relative;
            border: 1px solid rgba(0,0,0,0.05);
            backdrop-filter: blur(20px);
        }
        .article_card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: var(--radius);
            background: linear-gradient(135deg, rgba(92,131,116,0.04), transparent 50%);
            pointer-events: none;
        }

        .reading_time {
            color: var(--primary);
            font-weight: 600;
            font-size: 17px;
            margin-bottom: 24px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .article_body {
            font-size: 19.5px;
            line-height: 2;
            color: #2d3748;
        }
        .article_body p { margin-bottom: 36px; text-align: justify; hyphens: auto; }
        .article_body h2, .article_body h3, .article_body h4 {
            font-family: 'Playfair Display', serif;
            margin: 68px 0 28px;
            line-height: 1.3;
            color: var(--text);
        }
        .article_body h2 { font-size: 42px; font-weight: 800; }
        .article_body h3 { font-size: 34px; font-weight: 700; }
        .article_body a {
            color: var(--primary);
            text-decoration: underline;
            text-underline-offset: 4px;
            font-weight: 600;
        }

        .post_footer {
            margin-top: 110px;
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
            width: 50px;
            height: 50px;
            background: #f8f8f8;
            color: #444;
            border-radius: 50%;
            font-size: 20px;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .share_buttons a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(92,131,116,0.35);
        }

        .back_btn {
            background: var(--primary);
            color: white;
            padding: 18px 50px;
            border-radius: 60px;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 15px 45px rgba(92,131,116,0.4);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 14px;
        }
        .back_btn:hover {
            background: var(--primary-dark);
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(92,131,116,0.5);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .heading-backdrop { padding: 32px 40px; width: 94%; }
            .hero_heading { font-size: 4.8rem !important; }
        }
        @media (max-width: 768px) {
            .breadcrumb { 
                top: 20px; 
                font-size: 13px; 
                padding: 8px 16px;
                left: 20px;
                transform: none;
            }
            .hero_content { padding: 140px 6% 90px; }
            .heading-backdrop { 
                padding: 28px 30px; 
                border-radius: 20px;
                bottom: 15px;
            }
            .hero_heading { font-size: 3.6rem !important; }
            .hero_meta { font-size: 16px; gap: 20px; }
            .article_wrapper { margin: -100px auto 120px; }
            .article_card { padding: 70px 40px; border-radius: 24px; }
            .post_footer { flex-direction: column; align-items: stretch; }
            .back_btn { width: 100%; justify-content: center; }
        }
        @media (max-width: 480px) {
            .hero_heading { font-size: 3rem !important; }
            .article_card { padding: 60px 25px; }
        }
    </style>
</head>
<body>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo base_url(); ?>">Startseite</a>
        <i class="fas fa-chevron-right"></i>
        <a href="<?php echo base_url('blogs'); ?>">Blog</a>
        <i class="fas fa-chevron-right"></i>
        <span><?php echo htmlspecialchars(substr($blog_row['heading'], 0, 30)); ?>...</span>
    </div>

    <!-- HERO -->
    <section class="hero">
        <img src="<?php echo base_url().$image_url.$blog_row['blog_image']; ?>"
             alt="<?php echo htmlspecialchars($blog_row['heading']); ?>"
             class="hero_image" loading="eager">
        <div class="hero_overlay"></div>

        <div class="hero_content">
            <div class="heading-backdrop">
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(current_url()); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(current_url()); ?>&text=<?php echo urlencode($blog_row['heading']); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(current_url()); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="mailto:?subject=<?php echo urlencode($blog_row['heading']); ?>&body=<?php echo urlencode(current_url()); ?>"><i class="fas fa-envelope"></i></a>
                </div>

                <a href="<?php echo base_url('blogs'); ?>" class="back_btn">
                    <i class="fas fa-arrow-left"></i>
                    Zurück zur Übersicht
                </a>
            </div>
        </article>
    </div>

    <!-- Parallax Zoom on Scroll -->
    <script>
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY > 120;
            document.body.classList.toggle('scrolled', scrolled);
        });
    </script>
</body>
</html>