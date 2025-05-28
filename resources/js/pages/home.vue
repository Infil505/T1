<template>
    <div class="biblioteca-container">
        <div class="header-banner">
            <h1>Bienvenido al Sistema de Biblioteca</h1>
            <div class="header-wave"></div>
        </div>

        <div v-if="user" class="user-welcome">
            <h2>Hola, {{ user.name }}.</h2>
            <p>Desde aquí puedes acceder a:</p>

            <div class="menu-cards">
                <Link href="/authors" class="menu-card authors">
                    <div class="icon"><i class="fas fa-user-edit"></i></div>
                    <h3>Autores</h3>
                    <p>Gestionar información de autores</p>
                </Link>

                <Link href="/book" class="menu-card books">
                    <div class="icon"><i class="fas fa-book"></i></div>
                    <h3>Libros</h3>
                    <p>Administrar catálogo de libros</p>
                </Link>

                <Link href="/publisher" class="menu-card publishers">
                    <div class="icon"><i class="fas fa-building"></i></div>
                    <h3>Editoriales</h3>
                    <p>Controlar datos de editoriales</p>
                </Link>
            </div>
        </div>

        <div v-else class="login-banner">
            <h2>Este sistema permite gestionar libros, autores y editoriales.</h2>
            <Link href="/login" class="login-button">Inicia sesión para comenzar</Link>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        Link
    },
    props: {
        user: Object // Viene de Laravel vía Inertia
    },
    mounted() {
        console.log("Sistema de Biblioteca cargado correctamente");
    }
};
</script>

<style scoped>
/* Importación de fuentes */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

.biblioteca-container {
    font-family: 'Poppins', sans-serif;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header-banner {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: white;
    padding: 40px 20px;
    text-align: center;
    border-radius: 10px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(37, 117, 252, 0.2);
}

.header-banner h1 {
    font-size: 2.5rem;
    margin: 0;
    position: relative;
    z-index: 2;
    animation: fadeInDown 1s ease;
}

.header-wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 15px;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' fill='%23FFFFFF' opacity='.3'%3E%3C/path%3E%3C/svg%3E");
    background-size: cover;
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

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.user-welcome {
    animation: fadeIn 1s ease;
}

.user-welcome h2 {
    color: #333;
    margin-bottom: 0.5rem;
}

.user-welcome p {
    color: #666;
    margin-bottom: 2rem;
}

.menu-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.menu-card {
    background: white;
    border-radius: 10px;
    padding: 25px;
    text-decoration: none;
    color: #333;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    text-align: center;
    border-top: 4px solid transparent;
    animation: slideUp 0.8s ease forwards;
    position: relative;
    top: 0;
    display: block;
}

.menu-card.authors {
    border-top-color: #FF6B6B;
    animation-delay: 0.1s;
}

.menu-card.books {
    border-top-color: #4ECDC4;
    animation-delay: 0.3s;
}

.menu-card.publishers {
    border-top-color: #FFD166;
    animation-delay: 0.5s;
}

.menu-card:hover {
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    top: -10px;
}

.menu-card .icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
    color: #2575fc;
}

.menu-card h3 {
    margin-top: 0;
    margin-bottom: 10px;
    font-size: 1.5rem;
}

.menu-card p {
    color: #666;
    margin-top: 0;
}

.login-banner {
    background: linear-gradient(135deg, #FFD166 0%, #FF9A5A 100%);
    border-radius: 10px;
    padding: 40px 20px;
    text-align: center;
    animation: fadeIn 1s ease;
    margin-top: 20px;
}

.login-banner h2 {
    color: #333;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-button {
    display: inline-block;
    background: white;
    color: #FF9A5A;
    padding: 12px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.login-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

@media (max-width: 768px) {
    .header-banner h1 {
        font-size: 2rem;
    }

    .menu-cards {
        grid-template-columns: 1fr;
    }
}
</style>