<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Bibliothèque')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C97A;
            --gold-dim: rgba(201,168,76,0.15);
            --bg: #0D0D0F;
            --bg2: #141417;
            --bg3: #1C1C21;
            --surface: #212127;
            --border: rgba(201,168,76,0.2);
            --text: #E8E4DC;
            --text-muted: #7A7870;
            --text-soft: #B8B4AC;
            --danger: #C0392B;
            --success: #1E7E5A;
            --radius: 6px;
        }

        * { box-sizing: border-box; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            min-height: 100vh;
        }

        /* ── BACKGROUND TEXTURE ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(ellipse 80% 50% at 50% -10%, rgba(201,168,76,0.06) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        .container { position: relative; z-index: 1; }

        /* ── NAVBAR ── */
        .navbar {
            background: rgba(13,13,15,0.95) !important;
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(20px);
            padding: 0.9rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--gold) !important;
            letter-spacing: 0.08em;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            background: var(--gold);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--gold);
        }

        .nav-link {
            color: var(--text-soft) !important;
            font-size: 0.82rem;
            font-weight: 400;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0.4rem 1rem !important;
            transition: color 0.2s;
            text-decoration: none;
        }

        .nav-link:hover { color: var(--gold) !important; }

        .nav-link.active { color: var(--gold) !important; }

        .user-badge {
            font-size: 0.78rem;
            color: var(--text-muted);
            letter-spacing: 0.06em;
            padding: 0.35rem 1rem;
            border-left: 1px solid var(--border);
            margin-left: 0.5rem;
        }

        .btn-logout {
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gold) !important;
            border: 1px solid var(--border);
            padding: 0.35rem 1.1rem !important;
            border-radius: var(--radius);
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: var(--gold-dim);
            border-color: var(--gold);
        }

        /* ── MAIN CONTENT ── */
        .main-content {
            padding: 2.5rem 0 4rem;
            animation: fadeUp 0.4s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: var(--text);
            letter-spacing: 0.02em;
            margin: 0;
        }

        .page-title span {
            color: var(--gold);
        }

        /* ── BUTTONS ── */
        .btn-gold {
            background: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
            font-size: 0.78rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0.55rem 1.5rem;
            border-radius: var(--radius);
            transition: all 0.25s;
            text-decoration: none;
            display: inline-block;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-gold:hover {
            background: var(--gold);
            color: var(--bg);
            box-shadow: 0 4px 20px rgba(201,168,76,0.3);
        }

        .btn-ghost {
            background: transparent;
            color: var(--text-soft);
            border: 1px solid rgba(255,255,255,0.1);
            font-size: 0.78rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.45rem 1.1rem;
            border-radius: var(--radius);
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-ghost:hover {
            border-color: var(--text-soft);
            color: var(--text);
        }

        .btn-edit {
            background: transparent;
            color: #A8956A;
            border: 1px solid rgba(168,149,106,0.3);
            font-size: 0.72rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 0.85rem;
            border-radius: var(--radius);
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit:hover {
            background: rgba(168,149,106,0.12);
            color: var(--gold-light);
            border-color: var(--gold);
        }

        .btn-del {
            background: transparent;
            color: #8B3A3A;
            border: 1px solid rgba(139,58,58,0.3);
            font-size: 0.72rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 0.85rem;
            border-radius: var(--radius);
            transition: all 0.2s;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-del:hover {
            background: rgba(192,57,43,0.12);
            color: #E57373;
            border-color: #C0392B;
        }

        /* ── TABLE ── */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table thead th {
            background: var(--bg3);
            color: var(--gold);
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border);
            font-family: 'DM Sans', sans-serif;
        }

        .data-table thead th:first-child { border-radius: var(--radius) 0 0 0; }
        .data-table thead th:last-child  { border-radius: 0 var(--radius) 0 0; }

        .data-table tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.04);
            transition: background 0.15s;
        }

        .data-table tbody tr:hover { background: rgba(201,168,76,0.03); }

        .data-table tbody td {
            padding: 1rem 1.25rem;
            color: var(--text-soft);
            font-size: 0.88rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(255,255,255,0.04);
        }

        .data-table tbody td:first-child {
            color: var(--text-muted);
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .table-wrap {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .empty-row td {
            padding: 3rem !important;
            text-align: center;
            color: var(--text-muted) !important;
            font-style: italic;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem !important;
        }

        /* ── BADGE ── */
        .badge-status {
            font-size: 0.68rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.3rem 0.7rem;
            border-radius: 20px;
            font-weight: 400;
        }

        .badge-returned {
            background: rgba(30,126,90,0.15);
            color: #4CAF88;
            border: 1px solid rgba(30,126,90,0.3);
        }

        .badge-ongoing {
            background: rgba(201,168,76,0.1);
            color: var(--gold);
            border: 1px solid var(--border);
        }

        /* ── FORMS ── */
        .form-card {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.5rem;
            max-width: 560px;
            margin: 0 auto;
        }

        .form-section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            font-weight: 300;
            color: var(--text);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .form-label {
            font-size: 0.72rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control, .form-select {
            background: var(--bg3) !important;
            border: 1px solid rgba(255,255,255,0.08) !important;
            color: var(--text) !important;
            border-radius: var(--radius) !important;
            padding: 0.7rem 1rem !important;
            font-size: 0.88rem !important;
            font-family: 'DM Sans', sans-serif !important;
            transition: border-color 0.2s !important;
        }

        .form-control:focus, .form-select:focus {
            outline: none !important;
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 3px rgba(201,168,76,0.08) !important;
            background: var(--bg3) !important;
        }

        .form-control::placeholder { color: var(--text-muted) !important; }

        .form-select option {
            background: var(--bg3);
            color: var(--text);
        }

        .form-control.is-invalid {
            border-color: var(--danger) !important;
        }

        .invalid-feedback {
            font-size: 0.76rem;
            color: #E57373;
            margin-top: 0.35rem;
        }

        .form-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        /* ── ALERTS ── */
        .alert-app {
            border-radius: var(--radius);
            padding: 0.85rem 1.25rem;
            font-size: 0.84rem;
            margin-bottom: 1.5rem;
            border: 1px solid;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success-app {
            background: rgba(30,126,90,0.1);
            border-color: rgba(30,126,90,0.3);
            color: #4CAF88;
        }

        .alert-danger-app {
            background: rgba(192,57,43,0.1);
            border-color: rgba(192,57,43,0.3);
            color: #E57373;
        }

        .alert-app ul { margin: 0; padding-left: 1.2rem; }
        .alert-app li { margin-bottom: 0.2rem; }

        /* ── AUTH CARD ── */
        .auth-wrap {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
        }

        .auth-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 300;
            color: var(--gold);
            text-align: center;
            margin-bottom: 0.4rem;
            letter-spacing: 0.08em;
        }

        .auth-sub {
            text-align: center;
            color: var(--text-muted);
            font-size: 0.78rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 2.5rem;
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.06);
            font-size: 0.82rem;
            color: var(--text-muted);
        }

        .auth-footer a {
            color: var(--gold);
            text-decoration: none;
        }

        .auth-footer a:hover { color: var(--gold-light); }

        .btn-submit {
            width: 100%;
            background: var(--gold);
            color: var(--bg);
            border: none;
            padding: 0.75rem;
            border-radius: var(--radius);
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.25s;
            font-family: 'DM Sans', sans-serif;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background: var(--gold-light);
            box-shadow: 0 4px 24px rgba(201,168,76,0.35);
        }

        .form-check-input {
            background-color: var(--bg3) !important;
            border-color: rgba(255,255,255,0.15) !important;
        }

        .form-check-input:checked {
            background-color: var(--gold) !important;
            border-color: var(--gold) !important;
        }

        .form-check-label {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* ── DIVIDER ── */
        .gold-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 2rem 0;
            opacity: 0.4;
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold); }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('livres.index') }}">Bibliothèque</a>

            <div class="d-flex align-items-center ms-4 me-auto">
                @auth
                    <a class="nav-link" href="{{ route('auteurs.index') }}">Auteurs</a>
                    <a class="nav-link" href="{{ route('livres.index') }}">Livres</a>
                    <a class="nav-link" href="{{ route('etudiants.index') }}">Étudiants</a>
                    <a class="nav-link" href="{{ route('emprunts.index') }}">Emprunts</a>
                @endauth
            </div>

            <div class="d-flex align-items-center gap-2">
                @auth
                    <span class="user-badge">{{ Auth::user()->name }}</span>
                    <a class="btn-logout" href="{{ route('logout') }}">Quitter</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    <a class="btn-gold" href="{{ route('register') }}" style="padding:0.35rem 1rem;font-size:0.75rem;">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- MAIN --}}
    <div class="container main-content">

        @if(session('success'))
            <div class="alert-app alert-success-app">
                <span>✦</span> {{ session('success') }}
            </div>
        @endif

        @yield('contenu')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>