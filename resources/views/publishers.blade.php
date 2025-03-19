<div class="publishers-container">
<h1>Publishers Page</h1>
<button id="back-link">
        <a href="/">Regresar</a>
</button>
    
    <div class="game-board">
        <div class="game-instructions">
            <p>Organiza los libros en los estantes correspondientes</p>
        </div>
        
        <div class="book-container">
            <div class="book" id="book1" draggable="true"></div>
            <div class="book" id="book2" draggable="true"></div>
            <div class="book" id="book3" draggable="true"></div>
            <div class="book" id="book4" draggable="true"></div>
            <div class="book" id="book5" draggable="true"></div>
        </div>
        
        <div class="bookshelf">
            <div class="shelf" id="shelf1"></div>
            <div class="shelf" id="shelf2"></div>
            <div class="shelf" id="shelf3"></div>
        </div>
        
        <div class="score-panel">
            <span>Puntos: <span id="score">0</span></span>
            <span>Tiempo: <span id="timer">60</span>s</span>
            <button id="start-btn">Empezar</button>
            <button id="reset-btn">Reiniciar</button>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    .publishers-container {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: #333;
        line-height: 1.6;
        min-height: 100vh;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    
    h1 {
        font-size: 3rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #2d3748;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        animation: fadeInDown 1s ease-out;
    }
    
    .game-board {
        max-width: 800px;
        width: 100%;
        background-color: #ffffff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        animation: fadeIn 1s ease-out;
        position: relative;
        z-index: 10;
    }
    
    .game-instructions {
        background-color: #f0f4f8;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        text-align: center;
        border-left: 4px solid #4a6cf7;
        animation: slideInLeft 0.8s ease-out;
    }
    .back-link {
        display: block;
        max-width: 900px;
        margin: 0 auto 2rem;
        background-color: #ffffff;
        border-radius: 12px;
        padding: 0.8rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .back-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }
    .back-link a {
        text-decoration: none;
        color: #4a6cf7;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: inline-block;
        position: relative;
    }
    .back-link a::before {
        content: "←";
        margin-right: 8px;
        transition: transform 0.3s;
    }
    .back-link a:hover {
        color: #1e40af;
        background-color: rgba(74, 108, 247, 0.08);
    }
    .back-link a:hover::before {
        transform: translateX(-5px);
    }
    
    .book-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 2rem;
        min-height: 120px;
    }
    
    .book {
        width: 60px;
        height: 100px;
        border-radius: 3px;
        cursor: grab;
        position: relative;
        background-color: #8B4513;
        border-left: 10px solid #5A2D0C;
        border-right: 3px solid #5A2D0C;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        animation: bounceIn 0.6s ease-out;
        animation-fill-mode: both;
    }
    
    .book:nth-child(1) { animation-delay: 0.2s; background-color: #8B4513; }
    .book:nth-child(2) { animation-delay: 0.3s; background-color: #A0522D; }
    .book:nth-child(3) { animation-delay: 0.4s; background-color: #CD853F; }
    .book:nth-child(4) { animation-delay: 0.5s; background-color: #D2691E; }
    .book:nth-child(5) { animation-delay: 0.6s; background-color: #B8860B; }
    
    .book:hover {
        transform: translateY(-5px) rotate(-2deg);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    
    .book::before {
        content: "";
        position: absolute;
        top: 10px;
        left: 5px;
        width: 80%;
        height: 10px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 2px;
    }
    
    .book::after {
        content: "Libro";
        position: absolute;
        bottom: 10px;
        left: 10px;
        font-size: 12px;
        color: white;
        font-weight: bold;
    }
    
    .book:nth-child(1)::after { content: "Historia"; }
    .book:nth-child(2)::after { content: "Ciencia"; }
    .book:nth-child(3)::after { content: "Arte"; }
    .book:nth-child(4)::after { content: "Ficción"; }
    .book:nth-child(5)::after { content: "Poesía"; }
    
    .book.dragging {
        opacity: 0.5;
        transform: scale(1.1);
    }
    
    .bookshelf {
        display: flex;
        flex-direction: column;
        gap: 25px;
        margin-bottom: 2rem;
    }
    
    .shelf {
        height: 40px;
        background-color: #e4eaec;
        border-radius: 5px;
        padding: 10px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        animation: slideInRight 0.8s ease-out;
        animation-fill-mode: both;
        position: relative;
    }
    
    .shelf:nth-child(1) { animation-delay: 0.3s; }
    .shelf:nth-child(2) { animation-delay: 0.5s; }
    .shelf:nth-child(3) { animation-delay: 0.7s; }
    
    .shelf::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 10px;
        background-color: #d0d7dc;
        border-radius: 0 0 5px 5px;
    }
    
    .shelf:hover {
        background-color: #e8eef0;
        transform: translateX(5px);
    }
    
    .shelf.highlight {
        background-color: rgba(106, 145, 231, 0.2);
        box-shadow: 0 0 10px rgba(106, 145, 231, 0.5);
    }
    
    .score-panel {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        background: linear-gradient(to right, #f0f4f8, #e6edf5);
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        animation: fadeInUp 1s ease-out;
    }
    
    .score-panel span {
        font-weight: 600;
        color: #4a5568;
    }
    
    #score, #timer {
        display: inline-block;
        min-width: 30px;
        text-align: center;
        font-weight: bold;
        color: #4a6cf7;
    }
    
    button {
        background: linear-gradient(90deg, #4a6cf7, #6e8dfb);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(74, 108, 247, 0.2);
        position: relative;
        overflow: hidden;
    }
    
    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(74, 108, 247, 0.25);
    }
    
    button:active {
        transform: translateY(1px);
    }
    
    button::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: -100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }
    
    button:hover::after {
        left: 100%;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .success-animation {
        animation: successPulse 0.5s ease-in-out;
    }
    
    @keyframes successPulse {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(72, 187, 120, 0.7); }
        50% { transform: scale(1.1); box-shadow: 0 0 0 10px rgba(72, 187, 120, 0); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(72, 187, 120, 0); }
    }
    
    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #f00;
        animation: confetti-fall 3s ease-in-out infinite;
        z-index: 9;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const books = document.querySelectorAll('.book');
        const shelves = document.querySelectorAll('.shelf');
        const startBtn = document.getElementById('start-btn');
        const resetBtn = document.getElementById('reset-btn');
        const scoreEl = document.getElementById('score');
        const timerEl = document.getElementById('timer');
        const bookContainer = document.querySelector('.book-container');
        const gameBoard = document.querySelector('.game-board');
        
        let score = 0;
        let timeLeft = 60;
        let gameInterval;
        let isPlaying = false;
        let draggedBook = null;

        // Assign different titles and colors to books
        books.forEach((book, index) => {
            const colors = ['#8B4513', '#A0522D', '#CD853F', '#D2691E', '#B8860B'];
            const titles = ['Historia', 'Ciencia', 'Arte', 'Ficción', 'Poesía'];
            book.style.backgroundColor = colors[index];
            book.style.borderLeftColor = darkenColor(colors[index], 20);
            book.style.borderRightColor = darkenColor(colors[index], 20);
        });

        function darkenColor(color, amount) {
            return '#' + color.replace(/^#/, '').replace(/../g, color => ('0' + Math.max(0, Math.min(255, parseInt(color, 16) - amount)).toString(16)).substr(-2));
        }

        function createConfetti() {
            const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.top = -20 + 'px';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.width = Math.random() * 8 + 5 + 'px';
                confetti.style.height = Math.random() * 8 + 5 + 'px';
                confetti.style.opacity = Math.random() + 0.5;
                confetti.style.animation = `confetti-fall ${Math.random() * 2 + 1}s ease-in-out infinite`;
                confetti.style.animationDelay = Math.random() * 2 + 's';
                
                document.querySelector('.publishers-container').appendChild(confetti);
                
                setTimeout(() => {
                    confetti.remove();
                }, 3000);
            }
        }

        function startGame() {
            if (isPlaying) return;
            
            startBtn.classList.add('success-animation');
            setTimeout(() => startBtn.classList.remove('success-animation'), 500);
            
            books.forEach((book, index) => {
                book.style.opacity = '0';
                setTimeout(() => {
                    book.style.opacity = '1';
                    book.style.animation = 'bounceIn 0.6s ease-out forwards';
                }, index * 100);
            });
            
            isPlaying = true;
            score = 0;
            timeLeft = 60;
            scoreEl.textContent = score;
            timerEl.textContent = timeLeft;
            gameInterval = setInterval(updateTimer, 1000);
            
            books.forEach(book => bookContainer.appendChild(book));
        }

        function resetGame() {
            clearInterval(gameInterval);
            resetBtn.classList.add('success-animation');
            setTimeout(() => resetBtn.classList.remove('success-animation'), 500);
            books.forEach((book, index) => {
                setTimeout(() => {
                    book.style.transition = 'all 0.5s ease';
                    book.style.transform = 'translateY(0) rotate(0)';
                    bookContainer.appendChild(book);
                    setTimeout(() => {
                        book.style.opacity = '1';
                        book.style.transform = 'none';
                    }, 500);
                }, index * 100);
            });
            
            isPlaying = false;
            score = 0;
            timeLeft = 60;
            scoreEl.textContent = score;
            timerEl.textContent = timeLeft;
        }

        function updateTimer() {
            if (timeLeft <= 0) {
                clearInterval(gameInterval);
                isPlaying = false;
                timerEl.classList.add('success-animation');
                setTimeout(() => timerEl.classList.remove('success-animation'), 500);
                return;
            }
            timeLeft--;
            timerEl.textContent = timeLeft;
            if (timeLeft <= 10) {
                timerEl.style.color = '#e53e3e';
                timerEl.style.animation = 'pulse 0.5s infinite';
            } else {
                timerEl.style.color = '#4a6cf7';
                timerEl.style.animation = 'none';
            }
        }

        books.forEach(book => {
            book.addEventListener('dragstart', function(e) {
                if (!isPlaying) return;
                draggedBook = book;
                e.dataTransfer.setData('text/plain', e.target.id);
                
                setTimeout(() => {
                    book.classList.add('dragging');
                }, 0);
            });
            
            book.addEventListener('dragend', function() {
                book.classList.remove('dragging');
                shelves.forEach(shelf => shelf.classList.remove('highlight'));
            });
        });

        shelves.forEach(shelf => {
            shelf.addEventListener('dragenter', function(e) {
                if (!isPlaying) return;
                e.preventDefault();
                shelf.classList.add('highlight');
            });
            
            shelf.addEventListener('dragleave', function(e) {
                shelf.classList.remove('highlight');
            });
            
            shelf.addEventListener('dragover', function(e) {
                if (!isPlaying) return;
                e.preventDefault();
            });
            
            shelf.addEventListener('drop', function(e) {
                if (!isPlaying) return;
                e.preventDefault();
                shelf.classList.remove('highlight');
                
                const bookId = e.dataTransfer.getData('text/plain');
                const book = document.getElementById(bookId);
                
                if (!book) return;
                
                book.classList.add('success-animation');
                setTimeout(() => book.classList.remove('success-animation'), 500);
                book.style.transform = 'translateY(0) rotate(0)';
                shelf.appendChild(book);
                
                score++;
                scoreEl.textContent = score;
                
                scoreEl.classList.add('success-animation');
                setTimeout(() => scoreEl.classList.remove('success-animation'), 500);
                
                if (score === 5) {
                    clearInterval(gameInterval);
                    isPlaying = false;
                    createConfetti();
                    
                    setTimeout(() => {
                        const victoryMessage = document.createElement('div');
                        victoryMessage.textContent = '¡Felicidades! ¡Has completado el juego!';
                        victoryMessage.style.position = 'absolute';
                        victoryMessage.style.top = '50%';
                        victoryMessage.style.left = '50%';
                        victoryMessage.style.transform = 'translate(-50%, -50%)';
                        victoryMessage.style.backgroundColor = 'rgba(72, 187, 120, 0.9)';
                        victoryMessage.style.color = 'white';
                        victoryMessage.style.padding = '1rem 2rem';
                        victoryMessage.style.borderRadius = '10px';
                        victoryMessage.style.fontWeight = 'bold';
                        victoryMessage.style.fontSize = '1.5rem';
                        victoryMessage.style.zIndex = '100';
                        victoryMessage.style.animation = 'fadeIn 1s ease-out';
                        
                        gameBoard.appendChild(victoryMessage);
                        
                        setTimeout(() => {
                            victoryMessage.style.animation = 'fadeOut 1s ease-out';
                            victoryMessage.style.opacity = '0';
                            setTimeout(() => victoryMessage.remove(), 1000);
                        }, 3000);
                    }, 500);
                }
            });
        });

        startBtn.addEventListener('click', startGame);
        resetBtn.addEventListener('click', resetGame);
        
        const style = document.createElement('style');
        style.type = 'text/css';
        style.innerHTML = `
            @keyframes confetti-fall {
                0% { transform: translateY(0) rotate(0deg); opacity: 1; }
                100% { transform: translateY(600px) rotate(360deg); opacity: 0; }
            }
            
            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
        `;
        document.getElementsByTagName('head')[0].appendChild(style);
    });
</script>
