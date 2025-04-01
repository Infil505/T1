<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-link">Main</a>
    <a href="{{ route('book') }}" class="nav-link">Books</a>
    <a href="{{ route('authors') }}" class="nav-link">Authors</a>
    <a href="{{ route('publisher') }}" class="nav-link">Publishers</a>
    <a href="{{ route('contact') }}" class="nav-link">Agregar Contacto</a>
</nav>

<style>
/* Estilos base */
.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    padding: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    max-width: 800px;
}

.nav-link {
    color: white;
    text-decoration: none;
    font-family: 'Arial', sans-serif;
    font-weight: 600;
    font-size: 16px;
    padding: 10px 20px;
    margin: 0 10px;
    border-radius: 6px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

/* Efecto hover */
.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px);
}

/* Animación de línea debajo del enlace */
.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: #fff;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.nav-link:hover::after {
    width: 80%;
}

/* Animación al cargar la página */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.navbar {
    animation: fadeIn 0.8s ease-out forwards;
}

.nav-link {
    animation: fadeIn 0.8s ease-out forwards;
    animation-delay: calc(0.1s * var(--i));
}

.nav-link:nth-child(1) { --i: 1; }
.nav-link:nth-child(2) { --i: 2; }
.nav-link:nth-child(3) { --i: 3; }
.nav-link:nth-child(4) { --i: 4; }

/* Efecto de pulsación al hacer clic */
.nav-link:active {
    transform: scale(0.95);
}

/* Responsive */
@media (max-width: 600px) {
    .navbar {
        flex-direction: column;
        padding: 15px 0;
    }
    
    .nav-link {
        margin: 5px 0;
    }
}
</style>