<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores Literarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
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
        
        @keyframes expandWidth {
            from { width: 0; }
            to { width: 100px; }
        }
        
        @keyframes shimmer {
            0% { background-position: -100% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
            margin: 0;
            padding: 0;
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
            position: relative;
            z-index: 1;
        }
        
        .autores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            padding: 1rem 0;
        }
        
        .autor-card {
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
            text-align: left;
        }
        
        .autor-card:hover {
            transform: translateY(-10px) rotate(0.5deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .autor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
            z-index: 2;
        }
        
        .autor-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, rgba(42, 57, 144, 0.03), rgba(67, 97, 238, 0.05));
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .autor-name {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 0.6rem;
            color: var(--primary-color);
            line-height: 1.3;
        }
        
        .autor-meta {
            padding: 1.5rem;
        }
        
        .meta-row {
            margin-bottom: 0.8rem;
        }
        
        .meta-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-color);
            opacity: 0.8;
            display: block;
            margin-bottom: 0.3rem;
        }
        
        .meta-value {
            font-weight: 500;
            color: var(--text-color);
        }
        
        .autor-footer {
            padding: 1.2rem 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: center;
            background-color: rgba(43, 209, 252, 0.05);
        }
        
        .ver-mas-btn {
            padding: 0.8rem 2rem;
            background: linear-gradient(to right, var(--primary-color), var(--gradient-end));
            background-size: 200% auto;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: shimmer 3s infinite linear;
            box-shadow: 0 5px 15px rgba(42, 57, 144, 0.2);
        }
        
        .ver-mas-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(42, 57, 144, 0.3);
            background-position: right center;
        }
        
        .pen-icon {
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
        
        .autor-detalle {
            display: none;
            margin: 3rem auto;
            padding: 2.5rem;
            background-color: var(--light-color);
            border-radius: 20px;
            box-shadow: 0 20px 50px var(--shadow-color);
            max-width: 800px;
            position: relative;
            overflow: hidden;
        }
        
        .autor-detalle.visible {
            display: block;
            animation: slideIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
        
        .autor-detalle::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        
        .autor-detalle h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .autor-detalle h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--accent-color);
        }
        
        .detalle-row {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.06);
        }
        
        .detalle-row:last-of-type {
            border-bottom: none;
        }
        
        .detalle-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
        
        .detalle-value {
            font-weight: 500;
        }
        
        .libros-list {
            margin-top: 1rem;
            list-style: none;
            padding-left: 0;
        }
        
        .libros-list li {
            padding: 0.8rem 1rem;
            background-color: rgba(42, 57, 144, 0.03);
            border-radius: 8px;
            margin-bottom: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 3px solid var(--primary-color);
        }
        
        .libros-list li:hover {
            transform: translateX(5px);
            background-color: rgba(42, 57, 144, 0.07);
        }
        
        .cerrar-btn {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(232, 74, 95, 0.1);
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .cerrar-btn:hover {
            background-color: rgba(232, 74, 95, 0.2);
            transform: rotate(90deg);
        }
        
        .cerrar-btn::before, .cerrar-btn::after {
            content: '';
            position: absolute;
            width: 15px;
            height: 2px;
            background-color: var(--secondary-color);
        }
        
        .cerrar-btn::before {
            transform: rotate(45deg);
        }
        
        .cerrar-btn::after {
            transform: rotate(-45deg);
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
                padding: 1.5rem;
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
            
            .autores-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .autor-detalle {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Autores</h1>
    </header>
    
    <x-navbar />
    
    <div class="container">
        <div class="autores-grid">
            @foreach ($autores as $index => $autor)
                <div class="autor-card" style="--animation-order: {{ $index + 1 }}">
                    <div class="autor-header">
                        <h2 class="autor-name">{{ $autor['author'] }}</h2>
                        <div class="pen-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="#2a3990">
                                <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="autor-meta">
                        <div class="meta-row">
                            <span class="meta-label">Nacionalidad</span>
                            <span class="meta-value">{{ $autor['nationality'] }}</span>
                        </div>
                        
                        <div class="meta-row">
                            <span class="meta-label">Especialidades</span>
                            <span class="meta-value">{{ $autor['fields'] }}</span>
                        </div>
                    </div>
                    
                    <div class="autor-footer">
                        <button class="ver-mas-btn" onclick='mostrarDetalle(@json($autor))'>Ver perfil completo</button>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="autor-detalle" id="detalle">
            <button class="cerrar-btn" onclick="cerrarDetalle()"></button>
            <h2 id="nombre"></h2>
            
            <div class="detalle-row">
                <span class="detalle-label">Nacionalidad:</span>
                <span class="detalle-value" id="nacionalidad"></span>
            </div>
            
            <div class="detalle-row">
                <span class="detalle-label">Año de nacimiento:</span>
                <span class="detalle-value" id="nacimiento"></span>
            </div>
            
            <div class="detalle-row">
                <span class="detalle-label">Especialidades:</span>
                <span class="detalle-value" id="campos"></span>
            </div>
            
            <div class="detalle-row">
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Obras publicadas</h3>
                <ul class="libros-list" id="libros"></ul>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Biblioteca de Autores Literarios. Todos los derechos reservados.</p>
        </div>
    </footer>
    
    <script>
        function mostrarDetalle(autor) {
            const detalle = document.getElementById('detalle');
            
            document.getElementById('nombre').innerText = autor.author;
            document.getElementById('nacionalidad').innerText = autor.nationality;
            document.getElementById('nacimiento').innerText = autor.birth_year;
            document.getElementById('campos').innerText = autor.fields;
            
            const librosList = document.getElementById('libros');
            librosList.innerHTML = '';
            
            autor.books.forEach(libro => {
                const li = document.createElement('li');
                li.innerHTML = `<strong>${libro.title}</strong><br><small>Editorial: ${libro.editorial}</small>`;
                librosList.appendChild(li);
            });
            
            detalle.classList.add('visible');
            
            setTimeout(() => {
                detalle.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 100);
        }
        
        function cerrarDetalle() {
            const detalle = document.getElementById('detalle');
            detalle.classList.remove('visible');
        }
    </script>
</body>
</html>