<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfektes Sparerlebnis – Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary: #5c8374;
            --primary-dark: #4a6b5f;
            --primary-light: #92bfa7;
            --text: #1a1a1a;
            --text-light: #555555;
            --gray: #718096;
            --light: #f8f9fa;
            --border: #e2e8f0;
            --radius: 20px;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
            --shadow-hover: 0 20px 50px rgba(0,0,0,0.15);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #fdfdfd;
            color: var(--text);
            line-height: 1.7;
        }

        /* ===== HERO – Refined Version of Yours ===== */
        .blog_header {
            height: 500px;
            background: linear-gradient(rgba(0,0,0,0.62), rgba(0,0,0,0.75)),
                        url("https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2426&auto=format&fit=crop") center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .blog_con {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            color: white;
            letter-spacing: -2px;
            text-shadow: 0 8px 30px rgba(0,0,0,0.6);
        }

        .blog_sub {
            font-size: 1.4rem;
            color: rgba(255,255,255,0.9);
            font-weight: 400;
            max-width: 600px;
            margin: 20px auto 0;
        }

        /* ===== MAIN CONTENT ===== */
        .blocks_main {
            padding: 120px 5% 140px;
            max-width: 1480px;
            margin: 0 auto;
        }

        .main_blog_heading {
            font-size: 2.6rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 80px;
            color: var(--text);
        }

        .blogs_grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 42px;
        }

        /* ===== PREMIUM BLOG CARD – FULLY CLICKABLE ===== */
        .blog_box {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            cursor: pointer;
        }

        .blog_box::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 2px solid transparent;
            border-radius: var(--radius);
            background: linear-gradient(135deg, var(--primary-light), var(--primary)) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s;
            pointer-events: none;
        }

        .blog_box:hover {
            transform: translateY(-14px);
            box-shadow: var(--shadow-hover);
        }

        .blog_box:hover::after {
            opacity: 1;
        }

        .img_div {
            height: 260px;
            overflow: hidden;
            position: relative;
        }

        .img_blog {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .blog_box:hover .img_blog {
            transform: scale(1.1);
        }

        .card_inner {
            padding: 32px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .date_div {
            color: var(--primary);
            font-size: 0.84rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 10px;
        }

        }

        .heading_div {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.35;
            color: var(--text);
            margin-bottom: 16px;
            transition: color 0.3s;
        }

        .body_text {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 24px;
            flex-grow: 1;
        }

        .read_more {
            color: var(--primary);
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .read_more:hover {
            color: var(--primary-dark);
            gap: 16px;
        }

        .read_more i {
            transition: transform 0.3s ease;
            font-size: 1.1rem;
        }

        .read_more:hover i {
            transform: translateX(6px);
        }

        /* Load More – Elegant */
        .load_more_wrapper {
            text-align: center;
            margin-top: 100px;
        }

        .see_more {
            background: white;
            color: var(--primary);
            border: 2.5px solid var(--primary);
            padding: 16px 52px;
            border-radius: 60px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 12px 35px rgba(92,131,116,0.18);
        }

        .see_more:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(92,131,116,0.3);
        }

        @media (max-width: 768px) {
            .blocks_main { padding: 90px 5% 110px; }
            .blog_header { height: 420px; }
            .main_blog_heading { font-size: 2.2rem; margin-bottom: 60px; }
            .blogs_grid { gap: 36px; }
            .img_div { height: 220px; }
        }
    </style>
</head>
<body>

    <!-- HERO -->
    <header class="blog_header">
        <div class="blog_section">
            <div class="blog_con">Perfektes Sparerlebnis</div>
            <p class="blog_sub">Die besten Tipps & Tricks für mehr Geld zu sparen – jeden Tag.</p>
        </div>
    </header>

    <!-- BLOG LISTING -->
    <section class="blocks_main">
        <h2 class="main_blog_heading">Neueste Blogbeiträge</h2>
<?php
function make_slug($string) {
    $slug = strtolower(trim($string));
    $slug = str_replace(['ä','ö','ü','ß'], ['ae','oe','ue','ss'], $slug);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    return trim($slug, '-');
}
?>
        <div class="blogs_grid">
            <?php if(!empty($blog_details)):
                foreach($blog_details as $key => $details):
                    if($key < 12):
                        $slug = make_slug($details['heading']);
                        $link = base_url('blog/' . $slug);
                        $link = base_url('blog/'.$slug.$details['voucherr_blogs_id']); ?>
                        <article class="blog_box" onclick="window.location.href='<?php echo $link; ?>'" style="cursor:pointer;">
                            <div class="img_div">
                                <img class="img_blog" src="<?php echo base_url().$image_url.$details['blog_image']; ?>" alt="<?php echo htmlspecialchars($details['heading']); ?>">
                            </div>
                            <div class="card_inner">
                                <div>
                                    <div class="date_div">
                                        <?php echo date('d.m.Y', strtotime($details['date_added'])); ?>
                                    </div>
                                    <h3 class="heading_div"><?php echo htmlspecialchars($details['heading']); ?></h3>
                                    <div class="body_text">
                                        <?php echo substr(strip_tags($details['description']), 0, 180) . '...'; ?>
                                    </div>
                                </div>
                                <a href="<?php echo $link; ?>" class="read_more" onclick="event.stopPropagation();">
                                    Weiterlesen <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    <?php endif;
                endforeach;
            endif; ?>
        </div>

        <!-- Hidden cards -->
        <div id="see_more" style="display:none;" class="blogs_grid" style="gap:42px;margin-top:42px;">
            <?php if(!empty($blog_details)):
                foreach($blog_details as $key => $details):
                    if($key >= 12):
                        $slug = make_slug($details['heading']);
                        $link = base_url('blog/'.$slug); ?>
                        <article class="blog_box" onclick="window.location.href='<?php echo $link; ?>'">
                            <div class="img_div">
                                <img class="img_blog" src="<?php echo base_url().$image_url.$details['blog_image']; ?>" alt="<?php echo htmlspecialchars($details['heading']); ?>">
                            </div>
                            <div class="card_inner">
                                <div>
                                    <div class="date_div"><?php echo date('d.m.Y', strtotime($details['date_added'])); ?></div>
                                    <h3 class="heading_div"><?php echo htmlspecialchars($details['heading']); ?></h3>
                                    <div class="body_text"><?php echo substr(strip_tags($details['description']), 0, 180) . '...'; ?></div>
                                </div>
                                <a href="<?php echo $link; ?>" class="read_more" onclick="event.stopPropagation();">
                                    Weiterlesen <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    <?php endif;
                endforeach;
            endif; ?>
        </div>

        <?php if(count($blog_details) > 12): ?>
            <div class="load_more_wrapper">
                <button class="see_more" id="blog_more">Mehr Beiträge anzeigen</button>
            </div>
        <?php endif; ?>
    </section>

    <script>
        document.getElementById('blog_more')?.addEventListener('click', function() {
            const hidden = document.getElementById('see_more');
            hidden.style.display = 'grid';
            
            // Stagger fade-in
            const cards = hidden.querySelectorAll('.blog_box');
            cards.forEach((card, i) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, i * 100);
            });

            this.style.opacity = '0';
            this.style.transform = 'scale(0.95)';
            setTimeout(() => this.style.display = 'none', 400);
        });
    </script>
</body>
</html>