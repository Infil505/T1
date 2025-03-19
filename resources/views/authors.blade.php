
<div class="authors-container">
    <h1>Autors Page</h1>
    <div class="back-link">
        <a href="/">Regresar</a>
    </div>    
    <div class="game-instructions">
        <p>Encuentra todas las parejas de cartas iguales. ¡Pon a prueba tu memoria!</p>
        <div class="game-stats">
            <div class="stat">
                <span id="moves">0</span>
                <label>Movimientos</label>
            </div>
            <div class="stat">
                <span id="pairs">0</span>
                <label>Parejas</label>
            </div>
            <div class="stat">
                <span id="timer">00:00</span>
                <label>Tiempo</label>
            </div>
        </div>
        <button id="restart-btn">Reiniciar Juego</button>
    </div>
    
    <div class="memory-board">
        <div class="memory-card" data-value="1">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🦊</div>
            </div>
        </div>
        <div class="memory-card" data-value="1">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🦊</div>
            </div>
        </div>
        <div class="memory-card" data-value="2">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🐼</div>
            </div>
        </div>
        <div class="memory-card" data-value="2">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🐼</div>
            </div>
        </div>
        <div class="memory-card" data-value="3">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🐨</div>
            </div>
        </div>
        <div class="memory-card" data-value="3">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🐨</div>
            </div>
        </div>
        <div class="memory-card" data-value="4">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🦁</div>
            </div>
        </div>
        <div class="memory-card" data-value="4">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🦁</div>
            </div>
        </div>
        <div class="memory-card" data-value="5">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🐯</div>
            </div>
        </div>
        <div class="memory-card" data-value="5">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🐯</div>
            </div>
        </div>
        <div class="memory-card" data-value="6">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🦝</div>
            </div>
        </div>
        <div class="memory-card" data-value="6">
            <div class="card-inner">
                <div class="card-front"></div>
                <div class="card-back">🦝</div>
            </div>
        </div>
    </div>
    
    <div id="win-modal" class="modal">
        <div class="modal-content">
            <h2>¡Felicidades!</h2>
            <p>Has completado el juego en <span id="final-time">00:00</span> con <span id="final-moves">0</span> movimientos.</p>
            <button id="play-again-btn">Jugar de nuevo</button>
        </div>
    </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    .authors-container {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
        line-height: 1.6;
        min-height: 100vh;
        padding: 2rem;
        background-image: linear-gradient(135deg, #f5f7fa 0%, #e4eaec 100%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    h1 {
        font-size: 3rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: #2c3e50;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        padding-bottom: 0.5rem;
    }
    h1::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #4a6cf7, #6e8dfb);
        border-radius: 2px;
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
    
    .game-instructions {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        max-width: 600px;
        width: 100%;
    }
    
    .game-instructions p {
        font-size: 1.2rem;
        color: #495057;
        margin-bottom: 1.5rem;
    }
    
    .game-stats {
        display: flex;
        justify-content: space-around;
        margin-bottom: 1.5rem;
    }
    
    .stat {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .stat span {
        font-size: 1.8rem;
        font-weight: 700;
        color: #4a6cf7;
    }
    
    .stat label {
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    #restart-btn {
        background: linear-gradient(90deg, #4a6cf7, #6e8dfb);
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    #restart-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(74, 108, 247, 0.3);
    }
    
    .memory-board {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 16px;
        max-width: 600px;
        width: 100%;
        perspective: 1000px;
    }
    
    .memory-card {
        height: 120px;
        position: relative;
        cursor: pointer;
        transform-style: preserve-3d;
        transform: scale(1);
        transition: transform 0.2s;
    }
    
    .memory-card:active {
        transform: scale(0.95);
    }
    
    .memory-card.flip {
        transform: rotateY(180deg);
    }
    
    .memory-card.matched {
        transform: rotateY(180deg) scale(0.95);
        box-shadow: 0 0 10px rgba(74, 108, 247, 0.5);
        pointer-events: none;
    }
    
    .card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.6s;
    }
    
    .card-front, .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .card-front {
        background: linear-gradient(45deg, #4a6cf7, #6e8dfb);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .card-front::after {
        content: "?";
        font-size: 2.5rem;
        font-weight: bold;
        color: rgba(255, 255, 255, 0.3);
    }
    
    .card-back {
        transform: rotateY(180deg);
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 3rem;
    }
    
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }
    
    .modal.show {
        display: flex;
    }
    
    .modal-content {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 90%;
        animation: modal-in 0.4s ease-out;
    }
    
    @keyframes modal-in {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .modal-content h2 {
        color: #2c3e50;
        margin-top: 0;
    }
    
    .modal-content p {
        color: #495057;
        margin-bottom: 1.5rem;
    }
    
    #play-again-btn {
        background: linear-gradient(90deg, #4a6cf7, #6e8dfb);
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    #play-again-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(74, 108, 247, 0.3);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .authors-container {
            padding: 1rem;
        }
        h1 {
            font-size: 2.2rem;
        }
        .memory-board {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 480px) {
        .memory-board {
            grid-template-columns: repeat(2, 1fr);
        }
        .memory-card {
            height: 100px;
        }
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.memory-card');
    const movesDisplay = document.getElementById('moves');
    const pairsDisplay = document.getElementById('pairs');
    const timerDisplay = document.getElementById('timer');
    const restartBtn = document.getElementById('restart-btn');
    const winModal = document.getElementById('win-modal');
    const finalTimeDisplay = document.getElementById('final-time');
    const finalMovesDisplay = document.getElementById('final-moves');
    const playAgainBtn = document.getElementById('play-again-btn');
    
    let hasFlippedCard = false;
    let lockBoard = false;
    let firstCard, secondCard;
    let moves = 0;
    let matchedPairs = 0;
    let totalPairs = 6;
    let timer;
    let seconds = 0;
    let gameStarted = false;
    
    // Inicializar juego
    shuffleCards();
    
    // Event listeners
    restartBtn.addEventListener('click', resetGame);
    playAgainBtn.addEventListener('click', () => {
        winModal.classList.remove('show');
        resetGame();
    });
    
    cards.forEach(card => {
        card.addEventListener('click', flipCard);
    });
    
    function startTimer() {
        timer = setInterval(() => {
            seconds++;
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            timerDisplay.textContent = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }, 1000);
    }
    
    function flipCard() {
        if (lockBoard) return;
        if (this === firstCard) return;
        
        if (!gameStarted) {
            gameStarted = true;
            startTimer();
        }
        
        this.classList.add('flip');
        
        if (!hasFlippedCard) {
            hasFlippedCard = true;
            firstCard = this;
            return;
        }
        
        secondCard = this;
        moves++;
        movesDisplay.textContent = moves;
        
        checkForMatch();
    }
    
    function checkForMatch() {
        const isMatch = firstCard.dataset.value === secondCard.dataset.value;
        
        if (isMatch) {
            disableCards();
            matchedPairs++;
            pairsDisplay.textContent = matchedPairs;
            
            if (matchedPairs === totalPairs) {
                setTimeout(() => {
                    endGame();
                }, 1000);
            }
        } else {
            unflipCards();
        }
    }
    
    function disableCards() {
        firstCard.classList.add('matched');
        secondCard.classList.add('matched');
        
        resetBoard();
    }
    
    function unflipCards() {
        lockBoard = true;
        
        setTimeout(() => {
            firstCard.classList.remove('flip');
            secondCard.classList.remove('flip');
            
            resetBoard();
        }, 1000);
    }
    
    function resetBoard() {
        [hasFlippedCard, lockBoard] = [false, false];
        [firstCard, secondCard] = [null, null];
    }
    
    function shuffleCards() {
        cards.forEach(card => {
            const randomPos = Math.floor(Math.random() * 12);
            card.style.order = randomPos;
        });
    }
    
    function resetGame() {
        clearInterval(timer);
        seconds = 0;
        timerDisplay.textContent = '00:00';
        
        moves = 0;
        matchedPairs = 0;
        movesDisplay.textContent = '0';
        pairsDisplay.textContent = '0';
        gameStarted = false;
        
        cards.forEach(card => {
            card.classList.remove('flip', 'matched');
        });
        
        resetBoard();
        
        setTimeout(() => {
            shuffleCards();
        }, 300);
    }
    
    function endGame() {
        clearInterval(timer);
        finalTimeDisplay.textContent = timerDisplay.textContent;
        finalMovesDisplay.textContent = moves;
        winModal.classList.add('show');
    }
});
</script>