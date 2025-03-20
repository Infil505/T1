<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Página Principal (MAIN)')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        @keyframes expandWidth {
            from { width: 0; }
            to { width: 100px; }
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
        
        .deco-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: -1;
        }
        
        .container .deco-circle:nth-child(1) {
            width: 120px;
            height: 120px;
            background: var(--secondary-color);
            top: 50px;
            right: -30px;
            animation: float 10s ease-in-out infinite;
        }
        
        .container .deco-circle:nth-child(2) {
            width: 150px;
            height: 150px;
            background: var(--primary-color);
            bottom: -50px;
            left: 30%;
            animation: float 13s ease-in-out infinite 2s;
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
        
        .container h2 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            font-size: 2.4rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }
        
        .container p {
            margin-bottom: 1.2rem;
            font-size: 1.05rem;
            line-height: 1.8;
        }
        
        .page-transition {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--primary-color);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1);
            transform: translateY(-100%);
        }
        
        .page-transition.active {
            transform: translateY(0);
        }
        
        .loader {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
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
        }
    </style>
</head>
<body>
    <div class="page-transition">
        <div class="loader"></div>
    </div>

    <header>
        <h1>@yield('title', 'Página Principal')</h1>
    </header>

    <x-navbar />

    <div class="container">
        <div class="deco-circle"></div>
        <div class="deco-circle"></div>
        
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.navbar a');
            
            navLinks.forEach(link => {
                if(link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
                
                link.addEventListener('click', function(e) {
                    if(link.getAttribute('href') !== currentPath) {
                        e.preventDefault();
                        const pageTransition = document.querySelector('.page-transition');
                        pageTransition.classList.add('active');
                        
                        setTimeout(function() {
                            window.location = link.getAttribute('href');
                        }, 600);
                    }
                });
            });
            
            const pageTransition = document.querySelector('.page-transition');
            setTimeout(function() {
                pageTransition.style.transform = 'translateY(-100%)';
            }, 300);
            
            const content = document.querySelector('.container');
            if(content) {
                const children = content.children;
                for(let i = 0; i < children.length; i++) {
                    if(!children[i].classList.contains('deco-circle')) {
                        children[i].style.opacity = '0';
                        children[i].style.transform = 'translateY(20px)';
                        children[i].style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        children[i].style.transitionDelay = (0.2 + (i * 0.1)) + 's';
                        
                        setTimeout(function() {
                            children[i].style.opacity = '1';
                            children[i].style.transform = 'translateY(0)';
                        }, 100);
                    }
                }
            }
        });
    </script>
</body>
</html>