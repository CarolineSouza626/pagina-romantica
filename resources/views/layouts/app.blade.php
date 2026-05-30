<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Nosso filme de amor' }}</title>
    <meta name="theme-color" content="#f4e7df">
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        :root {
            color-scheme: light;
            --bg: #f6efe8;
            --bg-2: #f2e2d7;
            --surface: rgba(255, 252, 248, 0.76);
            --surface-strong: rgba(255, 255, 255, 0.90);
            --surface-border: rgba(115, 72, 59, 0.12);
            --text: #2c211d;
            --muted: rgba(44, 33, 29, 0.68);
            --accent: #9a4f5e;
            --accent-2: #d06a7c;
            --accent-3: #e6b79e;
            --shadow: 0 26px 90px rgba(75, 41, 34, 0.14);
            --shadow-soft: 0 16px 40px rgba(75, 41, 34, 0.08);
            --radius-xl: 2rem;
            --radius-lg: 1.5rem;
            --radius-md: 1rem;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            min-height: 100vh;
            color: var(--text);
            background:
                radial-gradient(circle at 15% 10%, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0) 35%),
                radial-gradient(circle at 85% 0%, rgba(224, 163, 167, 0.18), rgba(224, 163, 167, 0) 30%),
                linear-gradient(180deg, #fffaf6 0%, var(--bg) 55%, #efe0d4 100%);
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        a { color: inherit; text-decoration: none; }
        button, input, textarea, select { font: inherit; }

        .site-shell {
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            isolation: isolate;
        }

        .site-shell::before,
        .site-shell::after {
            content: '';
            position: fixed;
            inset: auto;
            pointer-events: none;
            z-index: -2;
            border-radius: 999px;
            filter: blur(4px);
        }

        .site-shell::before {
            width: 28rem;
            height: 28rem;
            left: -7rem;
            top: 9rem;
            background: radial-gradient(circle, rgba(208, 106, 124, 0.18) 0%, rgba(208, 106, 124, 0) 72%);
        }

        .site-shell::after {
            width: 32rem;
            height: 32rem;
            right: -8rem;
            bottom: 8rem;
            background: radial-gradient(circle, rgba(230, 183, 158, 0.22) 0%, rgba(230, 183, 158, 0) 72%);
        }

        .site-grain {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: -1;
            opacity: 0.12;
            background-image: radial-gradient(rgba(54, 36, 31, 0.18) 0.8px, transparent 0.8px);
            background-size: 4px 4px;
            mix-blend-mode: multiply;
        }

        .site-nav {
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(22px);
            background: linear-gradient(180deg, rgba(255, 248, 242, 0.92), rgba(255, 248, 242, 0.70));
            border-bottom: 1px solid rgba(255, 255, 255, 0.72);
        }

        .site-nav__inner,
        .site-footer__inner,
        .site-main {
            width: min(1180px, calc(100% - 2rem));
            margin-inline: auto;
        }

        .site-nav__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 0;
        }

        .site-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.78rem;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 700;
        }

        .site-brand::before {
            content: '';
            width: 0.7rem;
            height: 0.7rem;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--accent-2), var(--accent-3));
            box-shadow: 0 0 0 6px rgba(208, 106, 124, 0.10);
        }

        .site-nav__links {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        .site-nav__links a,
        .site-pill,
        .site-button,
        .site-button--secondary {
            border-radius: 999px;
            transition: transform 180ms ease, box-shadow 180ms ease, background-color 180ms ease, border-color 180ms ease;
        }

        .site-nav__links a {
            padding: 0.7rem 1rem;
            font-size: 0.84rem;
            color: var(--muted);
            border: 1px solid transparent;
        }

        .site-nav__links a:hover {
            color: var(--text);
            background: rgba(255, 255, 255, 0.55);
            border-color: rgba(255, 255, 255, 0.72);
            transform: translateY(-1px);
            box-shadow: var(--shadow-soft);
        }

        .site-main {
            padding: 1.5rem 0 0;
        }

        .site-section {
            padding: 4.75rem 0;
        }

        .site-section__heading {
            max-width: 40rem;
            margin-bottom: 1.75rem;
        }

        .site-section__eyebrow,
        .site-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.72rem;
            letter-spacing: 0.32em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 700;
        }

        .site-section__eyebrow::before,
        .site-eyebrow::before {
            content: '';
            width: 2.3rem;
            height: 1px;
            background: linear-gradient(90deg, var(--accent-2), transparent);
        }

        .site-section__title,
        .site-hero__title,
        .site-card__title,
        .site-panel__title,
        .site-footer__title {
            margin: 0;
            font-family: 'Georgia', 'Times New Roman', serif;
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--text);
        }

        .site-section__title {
            margin-top: 0.6rem;
            font-size: clamp(2rem, 3vw, 3.25rem);
            line-height: 1.08;
        }

        .site-section__subtitle,
        .site-hero__lead,
        .site-copy,
        .site-muted {
            color: var(--muted);
            line-height: 1.8;
        }

        .site-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.25fr) minmax(300px, 0.75fr);
            gap: 1.5rem;
            align-items: stretch;
            min-height: calc(100vh - 6rem);
            padding: 1rem 0 2rem;
        }

        .site-hero__copy,
        .site-hero__frame,
        .site-panel,
        .site-card,
        .site-gallery__card,
        .site-player,
        .site-letter,
        .site-contract,
        .site-closing {
            position: relative;
            border: 1px solid var(--surface-border);
            background: var(--surface);
            backdrop-filter: blur(18px);
            box-shadow: var(--shadow);
            border-radius: var(--radius-xl);
        }

        .site-hero__copy {
            padding: clamp(1.5rem, 4vw, 3rem);
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 36rem;
            overflow: hidden;
        }

        .site-hero__copy::after,
        .site-hero__frame::after,
        .site-panel::after,
        .site-card::after,
        .site-player::after,
        .site-letter::after,
        .site-contract::after,
        .site-closing::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            background: linear-gradient(180deg, rgba(255,255,255,0.34), rgba(255,255,255,0));
        }

        .site-hero__panel {
            display: grid;
            gap: 1rem;
            margin-top: 1.75rem;
        }

        .site-pill,
        .site-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            width: fit-content;
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--accent);
            background: rgba(255, 255, 255, 0.68);
            border: 1px solid rgba(255, 255, 255, 0.74);
            box-shadow: var(--shadow-soft);
        }

        .site-hero__title {
            margin-top: 1rem;
            font-size: clamp(3rem, 6vw, 5.8rem);
            line-height: 0.96;
        }

        .site-hero__lead {
            margin: 1.2rem 0 0;
            max-width: 40rem;
            font-size: 1.05rem;
        }

        .site-hero__kicker {
            margin-top: 1rem;
            font-size: 0.8rem;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(154, 79, 94, 0.78);
        }

        .site-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
            margin-top: 2rem;
        }

        .site-button,
        .site-button--secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            padding: 0.95rem 1.35rem;
            border: 1px solid transparent;
            font-size: 0.84rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: pointer;
        }

        .site-button {
            color: #fff;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            box-shadow: 0 18px 50px rgba(154, 79, 94, 0.26);
        }

        .site-button:hover,
        .site-button--secondary:hover,
        .site-nav__links a:hover,
        .site-pill:hover,
        .site-badge:hover {
            transform: translateY(-1px);
        }

        .site-button--secondary {
            color: var(--text);
            background: rgba(255, 255, 255, 0.60);
            border-color: rgba(255, 255, 255, 0.80);
        }

        .site-hero__frame {
            padding: 1.25rem;
            display: grid;
            gap: 1rem;
            align-content: space-between;
            min-height: 36rem;
            overflow: hidden;
        }

        .site-hero__media {
            min-height: 18rem;
            border-radius: calc(var(--radius-xl) - 0.35rem);
            background:
                radial-gradient(circle at 20% 15%, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0) 35%),
                linear-gradient(160deg, rgba(255, 232, 235, 0.98), rgba(245, 223, 204, 0.92));
            border: 1px solid rgba(255, 255, 255, 0.70);
            position: relative;
            overflow: hidden;
        }

        .site-hero__media::before {
            content: '';
            position: absolute;
            inset: 1rem;
            border-radius: 1.4rem;
            border: 1px solid rgba(154, 79, 94, 0.14);
            background:
                linear-gradient(135deg, rgba(255,255,255,0.18), rgba(255,255,255,0.02)),
                repeating-linear-gradient(90deg, rgba(154,79,94,0.04) 0 1px, transparent 1px 14px);
        }

        .site-stat-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .site-stat {
            padding: 1rem;
            border-radius: 1.15rem;
            background: rgba(255, 255, 255, 0.66);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: var(--shadow-soft);
        }

        .site-stat__value {
            font-size: 2rem;
            line-height: 1;
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        .site-stat__label {
            margin-top: 0.5rem;
            font-size: 0.72rem;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: rgba(154, 79, 94, 0.72);
        }

        .site-stack,
        .site-grid,
        .site-gallery,
        .site-track-list,
        .site-secret-grid,
        .site-timeline-grid {
            display: grid;
            gap: 1rem;
        }

        .site-timeline-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .site-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .site-gallery { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .site-secret-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }

        .site-card,
        .site-gallery__card {
            padding: 1.3rem;
            overflow: hidden;
        }

        .site-card__kicker,
        .site-card__meta,
        .site-track__meta,
        .site-copy__meta {
            font-size: 0.72rem;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: rgba(154, 79, 94, 0.76);
        }

        .site-card__title {
            margin-top: 0.75rem;
            font-size: 1.35rem;
            line-height: 1.15;
        }

        .site-card__text,
        .site-copy,
        .site-track__name,
        .site-track__artist,
        .site-footer__copy {
            margin: 0;
            font-size: 0.98rem;
            line-height: 1.8;
            color: var(--muted);
        }

        .site-quote {
            padding: 1.5rem;
            border-radius: 1.25rem;
            background: rgba(255, 255, 255, 0.68);
            border: 1px solid rgba(255, 255, 255, 0.75);
        }

        .site-player {
            display: grid;
            grid-template-columns: 220px minmax(0, 1fr);
            gap: 1.25rem;
            padding: 1.25rem;
        }

        .site-player__cover {
            min-height: 20rem;
            border-radius: 1.35rem;
            background: linear-gradient(180deg, rgba(255, 235, 232, 0.98), rgba(245, 223, 204, 0.88));
            border: 1px solid rgba(255, 255, 255, 0.72);
            display: grid;
            place-items: center;
            overflow: hidden;
        }

        .site-player__cover img { width: 100%; height: 100%; object-fit: cover; display: block; }

        .site-player__body { padding: 0.35rem 0.35rem 0.35rem 0; }

        .site-control-row,
        .site-track-row,
        .site-footer {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.85rem;
        }

        .site-control-row { margin: 1.3rem 0 1rem; }

        .site-input {
            width: 100%;
            accent-color: var(--accent-2);
        }

        .site-track-list {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            margin-top: 1.35rem;
        }

        .site-track {
            padding: 1rem;
            border-radius: 1.1rem;
            background: rgba(255, 255, 255, 0.58);
            border: 1px solid rgba(255, 255, 255, 0.78);
        }

        .site-letter,
        .site-contract,
        .site-closing {
            padding: clamp(1.25rem, 3vw, 2.25rem);
        }

        .site-letter__body {
            max-width: 52rem;
            font-size: clamp(1.02rem, 1.4vw, 1.3rem);
            line-height: 2;
        }

        .site-footer {
            padding: 2rem 0 3rem;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .site-footer__inner {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            align-items: center;
        }

        .site-loading {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: grid;
            place-items: center;
            background: linear-gradient(180deg, rgba(246, 239, 232, 0.98), rgba(241, 228, 218, 0.98));
        }

        .site-loading[hidden] {
            display: none !important;
        }

        .site-loading__card {
            width: min(92vw, 31rem);
            padding: 2rem;
            text-align: center;
            border-radius: 2rem;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: var(--shadow);
        }

        .site-loading__orb {
            width: 5rem;
            height: 5rem;
            margin: 0 auto 1.25rem;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.88);
            background: linear-gradient(135deg, rgba(255,255,255,0.88), rgba(240, 211, 207, 0.72));
            box-shadow: 0 18px 50px rgba(154, 79, 94, 0.14);
            animation: float 7s ease-in-out infinite;
        }

        .site-loading__dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.35rem;
        }

        .site-loading__dots span {
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 999px;
            background: var(--accent-2);
            animation: pulse 1.2s ease-in-out infinite;
        }

        .site-loading__dots span:nth-child(2) { animation-delay: 180ms; }
        .site-loading__dots span:nth-child(3) { animation-delay: 360ms; background: var(--accent); }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(0.9); opacity: 0.55; }
            50% { transform: scale(1); opacity: 1; }
        }

        @media (max-width: 1024px) {
            .site-hero,
            .site-player,
            .site-timeline-grid,
            .site-grid,
            .site-gallery,
            .site-secret-grid,
            .site-track-list {
                grid-template-columns: 1fr;
            }

            .site-hero__copy,
            .site-hero__frame {
                min-height: auto;
            }
        }

        @media (max-width: 720px) {
            .site-nav__inner,
            .site-footer__inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .site-main {
                width: min(100%, calc(100% - 1rem));
                padding-top: 1rem;
            }

            .site-section {
                padding: 3.25rem 0;
            }

            .site-hero__title {
                font-size: clamp(2.6rem, 14vw, 4rem);
            }
        }
    </style>
</head>
<body class="site-shell">
<div class="site-grain"></div>
<div>
    <div id="site-loading" class="site-loading">
        <div class="site-loading__card">
            <div class="site-loading__orb"></div>
            <p class="site-eyebrow">loading nossa história</p>
            <h1 class="site-section__title" style="margin-top: 0.85rem; font-size: clamp(2rem, 4vw, 3rem);">Cada memória respirando devagar.</h1>
            <p class="site-section__subtitle" style="margin-top: 0.85rem;">O filme está começando. E a melhor cena sempre foi você, Samara.</p>
            <button id="skip-loading" type="button" class="site-button" style="margin-top: 1.25rem;">entrar agora</button>
            <div class="site-loading__dots"><span></span><span></span><span></span></div>
        </div>
    </div>

    <header class="site-nav">
        <div class="site-nav__inner">
            <a class="site-brand" href="{{ route('home') }}">RomanticTimeCapsule</a>
            <nav class="site-nav__links" aria-label="navegação principal">
                <a href="#historia">História</a>
                <a href="#fotos">Fotos</a>
                <a href="#playlist">Trilha</a>
                <a href="#carta">Carta</a>
                <a href="{{ route('admin.login') }}">Admin</a>
            </nav>
        </div>
    </header>

    <main class="site-main">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="site-footer__inner">
            <p class="site-footer__copy">Uma cápsula do tempo feita para durar como cena favorita.</p>
            <p class="site-footer__copy">RomanticTimeCapsule • carinho, cinema e memória</p>
        </div>
    </footer>
</div>
<script>
    (function () {
        const loading = document.getElementById('site-loading');
        const button = document.getElementById('skip-loading');

        if (!loading) {
            return;
        }

        const dismiss = () => {
            loading.hidden = true;
            loading.style.display = 'none';
            loading.setAttribute('aria-hidden', 'true');

            const target = document.getElementById('fotos') || document.getElementById('historia') || document.querySelector('.site-main');

            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                window.scrollTo({ top: window.innerHeight, behavior: 'smooth' });
            }
        };

        window.setTimeout(dismiss, 1400);

        if (button) {
            button.addEventListener('click', dismiss);
        }

        loading.addEventListener('click', (event) => {
            if (event.target === loading) {
                dismiss();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                dismiss();
            }
        });
    }());
</script>
</body>
</html>
