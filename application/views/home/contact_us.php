<style>
    :root { --primary: #5c8374; --primary-dark: #4a6a5c; --accent: #ff9800; --light: #f7faf9; }

    main#cs-main { 
        background: linear-gradient(to bottom, #ffffff, var(--light));
        min-height: 100vh;
        padding: 40px 0;
        font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .cs-contact-form {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(92,131,116,0.18);
        transition: all 0.4s ease;
        max-width: 800px;
        margin: 0 auto;
    }

    .cs-contact-form:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(92,131,116,0.25);
    }

    .form-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 40px 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .form-header::before {
        content: '';
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: rgba(255,255,255,0.1);
        transform: rotate(30deg);
        pointer-events: none;
    }

    .form-header h1 {
        font-size: 2.4rem;
        font-weight: 800;
        margin: 0;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        position: relative;
        z-index: 2;
    }

    .form-header p {
        margin: 12px 0 0;
        font-size: 1.1rem;
        opacity: 0.95;
        font-weight: 500;
    }

    .form-body {
        padding: 45px 50px;
        background: white;
    }

    .input_contact,
    .input_area {
        width: 100%;
        padding: 16px 18px;
        border: 2px solid #e2e8e5;
        border-radius: 14px;
        font-size: 1rem;
        background: #fdfdfd;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .input_contact:focus,
    .input_area:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 4px rgba(92,131,116,0.15);
        background: white;
        transform: translateY(-1px);
    }

    .privacy-wrap {
        background: #f8fff8;
        padding: 18px;
        border-radius: 14px;
        border: 1px solid #d0edda;
        margin: 20px 0;
    }

    .privacy-label {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        cursor: pointer;
        font-size: 0.95rem;
        line-height: 1.5;
        color: #333;
    }

    .privacy-checkbox {
        width: 22px;
        height: 22px;
        accent-color: var(--primary);
        margin-top: 2px;
        flex-shrink: 0;
    }

    .privacy-link {
        color: var(--primary);
        font-weight: 600;
        text-decoration: underline;
    }

    .contact_btn {
        text-align: center;
        margin-top: 10px;
    }

    .submit {
        background: linear-gradient(to right, var(--primary), var(--primary-dark));
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        padding: 16px 50px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(92,131,116,0.4);
        transition: all 0.3s ease;
        min-width: 220px;
    }

    .submit:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(92,131,116,0.5);
        background: linear-gradient(to right, #4a6a5c, #3d5a4f);
    }

    /* Fully Responsive */
    @media (max-width: 768px) {
        .form-header { padding: 30px 20px; }
        .form-header h1 { font-size: 2rem; }
        .form-body { padding: 35px 25px; }
        .submit { width: 100%; padding: 16px; }
    }

    @media (max-width: 480px) {
        .form-header h1 { font-size: 1.8rem; }
        .form-header p { font-size: 1rem; }
        .privacy-label { font-size: 0.9rem; }
        .input_contact, .input_area { padding: 14px 16px; }
    }
</style>

<!-- Content Main -->
<main id="cs-main" class="cs-main-default">
    <div class="container">
        <div class="main-content-container d-flex justify-content-center">
            <div class="cs-contact-form">

                <!-- Elegant Header -->
                <div class="form-header">
                    <h1>Kontakt & Feedback</h1>
                    <p>Wir freuen uns auf deine Nachricht – Antwort innerhalb von 24h garantiert!</p>
                </div>

                <!-- Form Body -->
                <div class="form-body">
                    <form name="contact" id="contact_us" class="cs-contact-form" action="<?php echo base_url()?>kontakt/send" method="POST">
                        <input name="ic" value="2329" type="hidden">

                        <input id="js-contact-name" name="name" type="text" placeholder="Dein Name" class="input_contact" required>
                        
                        <input id="js-contact-email" name="email" type="email" placeholder="Deine E-Mail-Adresse" class="input_contact" required>
                        
                        <input name="subject" type="text" placeholder="Betreff deiner Nachricht" class="input_contact" required>
                        
                        <textarea id="js-contact-body" name="body" rows="8" placeholder="Schreibe hier deine Nachricht…" class="input_area" required></textarea>

                        <!-- Beautiful Privacy Checkbox -->
                        <div class="privacy-wrap">
                            <label class="privacy-label" for="privacy">
                                <input type="checkbox" id="privacy" name="privacy" value="1" class="privacy-checkbox" required>
                                <span>
                                    Ja, ich akzeptiere die 
                                    <a href="<?= base_url('datenschutz') ?>" target="_blank" class="privacy-link">Datenschutzerklärung</a>
                                    und habe das <a href="<?= base_url('impressum') ?>" target="_blank" class="privacy-link">Impressum</a> gelesen.
                                </span>
                            </label>
                        </div>

                        <div class="contact_btn">
                            <button type="submit" id="contact_us_btn" class="submit">
                                Nachricht absenden
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>