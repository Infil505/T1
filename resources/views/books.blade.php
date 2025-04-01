<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Mágica</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2a3990;
            --secondary-color: #e84a5f;
            --accent-color: #2bd1fc;
            --bg-color: #f7f5f2;
            --text-color: #2e384d;
            --light-color: #ffffff;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --gradient-start: #2a3990;
            --gradient-end: #4361ee;
            --curve-size: 80px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes reveal {
            0% { clip-path: polygon(0 0, 0 0, 0 100%, 0 100%); }
            100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes breathe {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        @keyframes expandWidth {
            from { width: 0; }
            to { width: 100px; }
        }
        
        @keyframes bookHover {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(1deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }
        
        @keyframes shimmer {
            0% { background-position: -100% 0; }
            100% { background-position: 200% 0; }
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at top right, rgba(42, 57, 144, 0.07) 0%, transparent 70%),
                radial-gradient(ellipse at bottom left, rgba(232, 74, 95, 0.05) 0%, transparent 70%),
                radial-gradient(circle at center, rgba(43, 209, 252, 0.03) 0%, transparent 60%);
            z-index: -1;
        }
        
        header {
            padding: 3rem 1rem 4rem;
            background: linear-gradient(-45deg, var(--gradient-start), var(--gradient-end), #614385, #516395);
            background-size: 400% 400%;
            animation: gradientFlow 15s ease infinite;
            color: var(--light-color);
            position: relative;
            overflow: hidden;
            text-align: center;
            margin-bottom: 3.5rem;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - var(--curve-size)), 0 100%);
        }
        
        header::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 180px;
            height: 180px;
            background: var(--accent-color);
            opacity: 0.15;
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        header::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 140px;
            height: 140px;
            background: var(--secondary-color);
            opacity: 0.12;
            border-radius: 50%;
            animation: float 7s ease-in-out infinite reverse;
        }
        
        h1 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 3.2rem;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
            animation: reveal 1.2s ease-out forwards;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--accent-color);
            animation: expandWidth 1.5s ease-out 0.5s forwards;
        }
        
        .subtitle {
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.8s forwards;
            font-weight: 300;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 1rem auto;
        }
        
        .navbar {
            background-color: var(--light-color);
            border-radius: 50px;
            padding: 0.8rem 1.5rem;
            margin: -2.2rem auto 2.5rem;
            max-width: 800px;
            box-shadow: 0 10px 30px var(--shadow-color);
            display: flex;
            justify-content: center;
            position: relative;
            z-index: 100;
            animation: fadeIn 0.6s ease-out 0.3s both;
        }
        
        .navbar a {
            color: var(--text-color);
            text-decoration: none;
            padding: 0.7rem 1.4rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin: 0 0.3rem;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }
        
        .navbar a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-color), var(--gradient-end));
            z-index: -1;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 50px;
        }
        
        .navbar a:hover::before, .navbar a.active::before {
            opacity: 1;
            transform: scale(1);
        }
        
        .navbar a:hover, .navbar a.active {
            color: var(--light-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(42, 57, 144, 0.3);
        }
        
        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto 3rem;
            padding: 2.8rem;
            background-color: var(--light-color);
            border-radius: 20px;
            box-shadow: 0 15px 35px var(--shadow-color);
            position: relative;
            z-index: 1;
            animation: fadeIn 0.8s ease-out forwards;
            overflow: hidden;
            backdrop-filter: blur(5px);
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
            border-top: 3px solid var(--accent-color);
            border-right: 3px solid var(--accent-color);
            opacity: 0.3;
            animation: breathe 6s ease-in-out infinite;
        }
        
        .container::after {
            content: '';
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 80px;
            height: 80px;
            border-bottom: 3px solid var(--primary-color);
            border-left: 3px solid var(--primary-color);
            opacity: 0.3;
            animation: breathe 6s ease-in-out infinite 3s;
        }
        
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            padding: 1rem 0;
        }
        
        .book-card {
            background-color: var(--light-color);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 30px var(--shadow-color);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            animation: fadeIn 0.6s forwards;
            animation-delay: calc(var(--animation-order) * 0.1s);
            opacity: 0;
            transform: translateY(20px);
        }
        
        .book-card:hover {
            transform: translateY(-10px) rotate(0.5deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .book-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
            z-index: 2;
        }
        
        .book-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, rgba(42, 57, 144, 0.03), rgba(67, 97, 238, 0.05));
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .book-title {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 0.6rem;
            color: var(--primary-color);
            line-height: 1.3;
        }
        
        .book-meta {
            padding: 1.5rem;
        }
        
        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.06);
        }
        
        .meta-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .meta-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-color);
            opacity: 0.8;
        }
        
        .meta-value {
            font-weight: 500;
            color: var(--text-color);
        }
        
        .book-footer {
            background-color: rgba(43, 209, 252, 0.05);
            padding: 1.2rem 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .author-badge {
            padding: 0.4rem 0.8rem;
            background: linear-gradient(to right, var(--primary-color), var(--gradient-end));
            background-size: 200% auto;
            color: white;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            animation: shimmer 3s infinite linear;
        }
        
        .publisher-badge {
            font-size: 0.8rem;
            color: var(--text-color);
            opacity: 0.8;
        }
        
        .book-icon {
            position: absolute;
            top: 0.8rem;
            right: 0.8rem;
            width: 40px;
            height: 40px;
            background-color: var(--light-color);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
        }
        
        .book-icon svg {
            width: 22px;
            height: 22px;
            fill: var(--primary-color);
        }
        
        .floating-book {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: var(--light-color);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: bookHover 4s ease-in-out infinite;
            z-index: 10;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .floating-book:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        
        .floating-book svg {
            width: 30px;
            height: 30px;
            fill: var(--primary-color);
        }
        
        footer {
            text-align: center;
            padding: 2rem;
            background-color: var(--primary-color);
            color: rgba(255, 255, 255, 0.8);
            margin-top: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        footer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
            z-index: 1;
        }
        
        .footer-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2.4rem;
            }
            
            header {
                padding: 2.5rem 1rem 3.5rem;
                --curve-size: 50px;
            }
            
            .container {
                padding: 2rem;
                margin-bottom: 2rem;
            }
            
            .navbar {
                padding: 0.6rem 1rem;
                flex-wrap: wrap;
            }
            
            .navbar a {
                padding: 0.5rem 1rem;
                margin: 0.2rem;
                font-size: 0.9rem;
            }
            
            .books-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Mi Biblioteca Literaria</h1>
        <p class="subtitle">Un viaje por mundos de conocimiento y fantasía a través de la lectura</p>
    </header>
    
    <x-navbar />
    
    <div class="container">
        <div class="books-grid">
            @foreach ($libros as $index => $libro)
            <div class="book-card" style="--animation-order: {{ $index }}">
                <div class="book-header">
                    <h3 class="book-title">{{ $libro['title'] }}</h3>
                    <div class="book-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M21,18.5c-1.1-0.35-2.3-0.5-3.5-0.5c-1.7,0-4.15,0.65-5.5,1.5V8c1.35-0.85,3.8-1.5,5.5-1.5c1.2,0,2.4,0.15,3.5,0.5V18.5z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="book-meta">
                    <div class="meta-row">
                        <span class="meta-label">Edición</span>
                        <span class="meta-value">{{ $libro['edition'] }}</span>
                    </div>
                    
                    <div class="meta-row">
                        <span class="meta-label">Año</span>
                        <span class="meta-value">{{ $libro['copyright'] }}</span>
                    </div>
                    
                    <div class="meta-row">
                        <span class="meta-label">Idioma</span>
                        <span class="meta-value">{{ $libro['language'] }}</span>
                    </div>
                    
                    <div class="meta-row">
                        <span class="meta-label">Páginas</span>
                        <span class="meta-value">{{ $libro['pages'] }}</span>
                    </div>
                </div>
                
                <div class="book-footer">
                    <div class="author-badge">
                        {{ $libro['author'] }}
                    </div>
                    <div class="publisher-badge">
                        {{ $libro['publisher'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <div class="floating-book">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
        </svg>
    </div>
    
    <footer>
        <div class="footer-content">
            <p>© 2025 Mi Biblioteca Literaria | Creado con pasión por la literatura</p>
        </div>
    </footer>
</body>
</html>
