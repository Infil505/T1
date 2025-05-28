<template>
    <div class="detail-container">
        <h1>{{ libro.title }}</h1>

        <p><strong>Edición:</strong> {{ libro.edition }}</p>
        <p><strong>Año de copyright:</strong> {{ libro.copyright }}</p>
        <p><strong>Idioma:</strong> {{ libro.language }}</p>
        <p><strong>Páginas:</strong> {{ libro.pages }}</p>

        <p>
            <strong>Autor:</strong>
            <span v-if="libro.autor">
                <Link :href="`/authors/${libro.autor.id}`">
                {{ libro.autor.author }}
                </Link>
            </span>
            <span v-else>No asignado</span>
        </p>

        <p>
            <strong>Editorial:</strong>
            <span v-if="libro.editorial">
                <Link :href="`/publisher/${libro.editorial.id}`">
                {{ libro.editorial.publisher }}
                </Link>
            </span>
            <span v-else>No asignada</span>
        </p>

        <Link href="/book" class="back-link">← Volver a la lista</Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        libro: Object
    }
};
</script>


<style scoped>
.detail-container {
    background: linear-gradient(135deg, #ffffff, #f4faff);
    padding: 30px 40px;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
    animation: fadeIn 0.6s ease-in-out;
}

.detail-container h1 {
    font-size: 2.2rem;
    color: #003366;
    font-weight: 700;
    margin-bottom: 25px;
    border-bottom: 2px solid #4a90e2;
    padding-bottom: 10px;
}

.detail-container p {
    font-size: 1rem;
    color: #444;
    margin-bottom: 15px;
    line-height: 1.6;
}

.detail-container p strong {
    color: #003366;
}

.detail-container a {
    color: #2563eb;
    font-weight: 500;
    text-decoration: none;
}

.detail-container a:hover {
    text-decoration: underline;
    color: #1d4ed8;
}

.back-link {
    display: inline-block;
    margin-top: 30px;
    color: #0066cc;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}

.back-link:hover {
    color: #004080;
    text-decoration: underline;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
