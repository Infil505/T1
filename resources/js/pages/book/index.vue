<template>
    <div class="list-container">
        <h1><i class="fas fa-book-open"></i> Libros registrados</h1>

        <div v-if="flash.success" class="success-message">
            {{ flash.success }}
        </div>

        <div v-if="user && user.is_admin">
            <Link href="/book/create" class="btn-add">
            <i class="fas fa-plus-circle"></i> Agregar nuevo libro
            </Link>
        </div>

        <ul class="book-list">
            <li v-for="(libro, index) in libros" :key="libro.id" class="book-card"
                :style="{ animationDelay: `${0.1 * index}s` }">
                <div class="book-title">
                    <i class="fas fa-book"></i>
                    <Link :href="`/book/${libro.id}`">
                    {{ libro.title }}
                    </Link>
                </div>
                <div class="book-meta">
                    Autor: {{ libro.autor?.author || 'Sin autor' }}<br />
                    Editorial: {{ libro.editorial?.publisher || 'Sin editorial' }}
                </div>

                <div v-if="user && user.is_admin" class="book-actions">
                    <Link :href="`/book/${libro.id}/edit`">
                    <i class="fas fa-edit"></i> Editar
                    </Link>

                    <button class="btn-delete" @click="deleteBook(libro.id)">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </div>
            </li>

            <li v-if="!libros.length" class="book-card">
                No hay libros registrados.
            </li>
        </ul>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    props: {
        libros: Array,
        user: Object,
        flash: Object
    },
    methods: {
        deleteBook(id) {
            if (confirm('¿Deseas eliminar este libro?')) {
                Inertia.delete(`/book/${id}`);
            }
        }
    }
};
</script>

<style scoped>
.list-container {
    max-width: 1000px;
    margin: 0 auto;
    background: linear-gradient(135deg, #ffffff 0%, #f5faff 100%);
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    animation: fadeIn 1s ease-in-out;
}

.list-container h1 {
    text-align: center;
    font-size: 2.5rem;
    color: #003366;
    margin-bottom: 30px;
    font-weight: 700;
    animation: slideDown 0.8s ease-in-out;
}

.success-message {
    background-color: #e0f7ea;
    color: #0f5132;
    border-left: 5px solid #2ecc71;
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-weight: 600;
    animation: bounceIn 0.6s ease-in-out;
}

.btn-add {
    display: inline-block;
    background: linear-gradient(135deg, #00b09b, #96c93d);
    color: white;
    padding: 12px 24px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 25px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    animation: floatIn 0.8s ease-in-out;
}

.btn-add:hover {
    background: linear-gradient(135deg, #009688, #7bb13c);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.book-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.book-card {
    background: #ffffff;
    border-left: 5px solid #4a90e2;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
    animation: riseUp 0.6s ease forwards;
}

.book-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #004080;
    margin-bottom: 8px;
}

.book-title a {
    color: #004080;
    text-decoration: none;
    transition: color 0.3s ease;
}

.book-title a:hover {
    color: #1e40af;
    text-decoration: underline;
}

.book-meta {
    font-size: 0.95rem;
    color: #444;
    line-height: 1.6;
    margin-bottom: 12px;
}

.book-meta i {
    margin-right: 6px;
    color: #6b7280;
}

.book-actions {
    display: flex;
    gap: 18px;
    margin-top: 10px;
}

.book-actions a,
.book-actions button {
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    color: #2563eb;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.2s ease;
}

.book-actions .btn-delete {
    color: #dc2626;
}

.book-actions a:hover,
.book-actions button:hover {
    text-decoration: underline;
    color: #1d4ed8;
}

.btn-delete {
    color: #e74c3c;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounceIn {
    0% {
        transform: scale(0.9);
        opacity: 0;
    }

    50% {
        transform: scale(1.05);
        opacity: 1;
    }

    100% {
        transform: scale(1);
    }
}

@keyframes floatIn {
    from {
        transform: translateY(10px);
        opacity: 0;
    }

    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes riseUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
