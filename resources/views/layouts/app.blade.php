<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Records</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0; 
            box-sizing: border-box;
        }

        :root {
            --bg: #f5f8fa;
            --surface: #ffffff;
            --surface-soft: #e8f1f8;
            --text: #0f1419;
            --muted: #536471;
            --brand: #1d9bf0;
            --brand-dark: #1572c7;
            --border: #d9e2ec;
            --shadow: rgba(15, 20, 25, 0.08);
        }

        html, body {
            min-height: 100%;
            height: 100%;
            width: 100%;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        body {
            line-height: 1.6;
            background: linear-gradient(180deg, #ececec 0%, #c8c8c8 100%);
            color: var(--text);
        }

        nav {
            width: 100%;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 10px 30px -25px var(--shadow);
        }

        .nav-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.03em;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            padding: 0.5rem 0.75rem;
            border-radius: 9999px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .nav-links a:hover {
            background: var(--surface-soft);
            color: var(--text);
        }

        .page-shell {
            width: min(1200px, calc(100% - 2rem));
            margin: 2rem auto 3rem;
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .page-title {
            font-size: clamp(2rem, 2.5vw, 2.75rem);
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.04em;
        }

        .page-subtitle {
            color: var(--muted);
            max-width: 760px;
            margin-top: 0.5rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 1.75rem;
            box-shadow: 0 25px 50px -30px var(--shadow);
            margin-bottom: 1.5rem;
        }

        .card-alt {
            background: linear-gradient(180deg, rgba(29, 155, 240, 0.08), rgba(255, 255, 255, 0.85));
            border: 1px solid rgba(29, 155, 240, 0.15);
        }

        .text-brand {
            color: var(--brand);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            padding: 0.9rem 1.4rem;
            border-radius: 9999px;
            border: 1px solid transparent;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: var(--brand);
            color: #fff;
            box-shadow: 0 12px 30px -20px rgba(29, 155, 240, 0.7);
        }

        .btn-primary:hover {
            background: var(--brand-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--surface-soft);
            color: var(--text);
        }

        .btn-secondary:hover {
            background: #d9eafb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th,
        td {
            padding: 1rem 1rem;
            text-align: left;
        }

        th {
            font-size: 0.95rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
        }

        td {
            border-bottom: 1px solid var(--border);
            color: var(--text);
            font-size: 0.95rem;
        }

        tr:hover {
            background: var(--surface-soft);
        }

        .table-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .form-grid.full {
            grid-template-columns: 1fr;
        }

        .form-field label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text);
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 0.95rem 1rem;
            font-size: 0.95rem;
            color: var(--text);
            background: #fff;
        }

        input:focus,
        textarea:focus {
            outline: 2px solid rgba(29, 155, 240, 0.2);
            border-color: var(--brand);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 18px;
            border: 1px solid #cfe4ff;
            background: #eef6ff;
            color: #1554b9;
            margin-bottom: 1.25rem;
        }

        .subtitle-block {
            color: var(--muted);
            margin-top: 0.5rem;
        }

        @media (max-width: 900px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .page-shell {
                margin: 1rem auto 2rem;
            }

            .page-head {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}" class="nav-brand">The Records</a>
        <div class="nav-links">
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('records.index') }}">Records</a>
            <a href="{{ route('about') }}">About</a>
        </div>
    </nav>

    <main class="page-shell">
        @yield('content')
    </main>
</body>
</html>
