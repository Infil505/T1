<div class="books-container">
    <div class="floating-books">
        <div class="book book-1"></div>
        <div class="book book-2"></div>
        <div class="book book-3"></div>
        <div class="book book-4"></div>
        <div class="book book-5"></div>
    </div>
    
    <div class="title-container">
        <h1 class="title">Books Page</h1>
        <div class="title-decoration"></div>
    </div>
    
    <div class="content-container">
        <p>Esta es la página de libros. Aquí podrás encontrar todo nuestro catálogo de libros disponibles.</p>
        
        <div class="mini-game">
            <h3>Mini Juego: Atrapa el Libro</h3>
            <p class="game-instruction">¡Haz clic en el libro flotante para atraparlo! <span class="score-display">Puntuación: <span id="score">0</span></span></p>
            <div class="game-area">
                <div id="target-book" class="target-book"></div>
            </div>
        </div>
        
        <a href="/" class="back-link">Regresar a Inicio</a>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap');
    
    .books-container {
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #f8f7f4;
        color: #2d3142;
        line-height: 1.7;
        min-height: 100vh;
        padding: 3rem 2rem;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .books-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top right, rgba(175, 89, 159, 0.08) 0%, transparent 70%),
                    radial-gradient(circle at bottom left, rgba(61, 90, 254, 0.08) 0%, transparent 70%);
        z-index: -1;
    }
    
    .title-container {
        position: relative;
        margin-bottom: 3rem;
        perspective: 600px;
    }
    
    .title {
        font-family: 'Libre Baskerville', serif;
        font-size: 3.5rem;
        font-weight: 700;
        text-align: center;
        color: #2d3142;
        margin: 0;
        position: relative;
        transform-style: preserve-3d;
        animation: titleIntro 1.5s ease-out forwards;
    }
    
    @keyframes titleIntro {
        0% { opacity: 0; transform: translateZ(-100px) rotateX(20deg); }
        100% { opacity: 1; transform: translateZ(0) rotateX(0); }
    }
    
    .title-decoration {
        position: absolute;
        width: 120%;
        height: 8px;
        background: linear-gradient(90deg, #3d5afe, #af599f);
        bottom: -15px;
        left: -10%;
        border-radius: 4px;
        transform: scaleX(0);
        transform-origin: center;
        animation: lineExpand 1s ease-out 0.8s forwards;
    }
    
    @keyframes lineExpand {
        0% { transform: scaleX(0); }
        100% { transform: scaleX(1); }
    }
    
    .content-container {
        max-width: 900px;
        width: 100%;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 10;
        backdrop-filter: blur(10px);
        animation: containerReveal 1s ease-out 0.5s both;
    }
    
    @keyframes containerReveal {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    .content-container p {
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 2rem;
        animation: fadeIn 0.8s ease-out 1s both;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .floating-books {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        pointer-events: none;
    }
    
    .book {
        position: absolute;
        width: 40px;
        height: 60px;
        background: linear-gradient(45deg, #3d5afe, #af599f);
        border-radius: 5px 0 0 5px;
        box-shadow: 5px 0 10px rgba(0, 0, 0, 0.2);
        opacity: 0.7;
    }
    
    .book::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 3px;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 0 3px 3px 0;
    }
    
    .book::after {
        content: '';
        position: absolute;
        top: 10%;
        left: 10%;
        width: 80%;
        height: 5px;
        background-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 15px 0 rgba(255, 255, 255, 0.3), 
                    0 30px 0 rgba(255, 255, 255, 0.3);
    }
    
    .book-1 {
        top: 15%;
        left: 10%;
        transform-origin: center;
        animation: float 15s ease-in-out infinite, rotate 20s linear infinite;
    }
    
    .book-2 {
        top: 70%;
        left: 15%;
        background: linear-gradient(45deg, #43a047, #1de9b6);
        animation: float 18s ease-in-out infinite 2s, rotate 25s linear infinite reverse;
    }
    
    .book-3 {
        top: 25%;
        right: 15%;
        background: linear-gradient(45deg, #ff5722, #ffeb3b);
        animation: float 12s ease-in-out infinite 1s, rotate 18s linear infinite;
    }
    
    .book-4 {
        top: 65%;
        right: 10%;
        background: linear-gradient(45deg, #e91e63, #ff9800);
        animation: float 20s ease-in-out infinite 3s, rotate 22s linear infinite reverse;
    }
    
    .book-5 {
        top: 50%;
        left: 50%;
        background: linear-gradient(45deg, #9c27b0, #03a9f4);
        animation: float 16s ease-in-out infinite 2.5s, rotate 24s linear infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); }
        25% { transform: translateY(-30px) translateX(20px); }
        50% { transform: translateY(0) translateX(40px); }
        75% { transform: translateY(30px) translateX(20px); }
    }
    
    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .back-link {
        display: inline-block;
        text-decoration: none;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 600;
        font-size: 1.1rem;
        color: #fff;
        background: linear-gradient(45deg, #3d5afe, #af599f);
        padding: 1rem 2rem;
        border-radius: 50px;
        box-shadow: 0 5px 15px rgba(61, 90, 254, 0.3);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        margin-top: 1.5rem;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .back-link::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #af599f, #3d5afe);
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .back-link::after {
        content: "←";
        position: absolute;
        left: 1.5rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .back-link:hover {
        transform: translateY(-5px);
        padding-left: 2.5rem;
    }
    
    .back-link:hover::before {
        opacity: 1;
    }
    
    .back-link:hover::after {
        opacity: 1;
        left: 1rem;
    }
    
    /* Mini juego */
    .mini-game {
        background-color: rgba(250, 250, 255, 0.7);
        border-radius: 12px;
        padding: 1.5rem;
        margin: 2rem 0;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(5px);
        animation: fadeIn 0.8s ease-out 1.2s both;
    }
    
    .mini-game h3 {
        font-family: 'Libre Baskerville', serif;
        color: #2d3142;
        margin-top: 0;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }
    
    .game-instruction {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .score-display {
        font-weight: 600;
        color: #3d5afe;
    }
    
    .game-area {
        width: 100%;
        height: 150px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        position: relative;
        overflow: hidden;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .target-book {
        position: absolute;
        width: 30px;
        height: 45px;
        background: linear-gradient(45deg, #e91e63, #ff9800);
        border-radius: 3px 0 0 3px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: transform 0.1s ease;
    }
    
    .target-book::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 2px;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5);
    }
    
    .target-book::after {
        content: '';
        position: absolute;
        top: 20%;
        left: 15%;
        width: 70%;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 0 rgba(255, 255, 255, 0.3), 
                    0 16px 0 rgba(255, 255, 255, 0.3);
    }
    
    .target-book:active {
        transform: scale(0.9);
    }
    
    @keyframes bookCaught {
        0% { transform: scale(1); }
        50% { transform: scale(1.5); opacity: 0.7; }
        100% { transform: scale(0); opacity: 0; }
    }
    
    @media (max-width: 768px) {
        .books-container {
            padding: 2rem 1rem;
        }
        
        .title {
            font-size: 2.5rem;
        }
        
        .content-container {
            padding: 1.8rem;
        }
        
        .book {
            display: none;
        }
        
        .book-1, .book-3 {
            display: block;
        }
    }
</style>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const targetBook = document.getElementById('target-book');
        const gameArea = document.querySelector('.game-area');
        const scoreDisplay = document.getElementById('score');
        let score = 0;
        
        positionBookRandomly();
        
        targetBook.addEventListener('click', function() {
            score++;
            scoreDisplay.textContent = score;
            
            targetBook.style.animation = 'bookCaught 0.5s ease forwards';
            
            setTimeout(() => {
                targetBook.style.animation = '';
                positionBookRandomly();
            }, 500);
        });
        
        function positionBookRandomly() {
            const maxX = gameArea.offsetWidth - targetBook.offsetWidth;
            const maxY = gameArea.offsetHeight - targetBook.offsetHeight;
            
            const randomX = Math.floor(Math.random() * maxX);
            const randomY = Math.floor(Math.random() * maxY);
            
            targetBook.style
            targetBook.style.left = `${randomX}px`;
            targetBook.style.top = `${randomY}px`;
        }
    });
</script>
