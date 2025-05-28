<template>
    <div class="edit-container">
        <h1>Editar libro: {{ form.title }}</h1>

        <div v-if="errorsArray.length" style="color: red;">
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <label for="title">Título:</label>
                <input type="text" id="title" v-model="form.title" required />
            </div>

            <div>
                <label for="edition">Edición:</label>
                <input type="text" id="edition" v-model="form.edition" required />
            </div>

            <div>
                <label for="copyright">Año de copyright:</label>
                <input type="number" id="copyright" v-model="form.copyright" required />
            </div>

            <div>
                <label for="language">Idioma:</label>
                <input type="text" id="language" v-model="form.language" required />
            </div>

            <div>
                <label for="pages">Cantidad de páginas:</label>
                <input type="number" id="pages" v-model="form.pages" required />
            </div>

            <div>
                <label for="author_id">Autor:</label>
                <select v-model="form.author_id" id="author_id" required>
                    <option v-for="autor in autores" :key="autor.id" :value="autor.id">
                        {{ autor.author }}
                    </option>
                </select>
            </div>

            <div>
                <label for="publisher_id">Editorial:</label>
                <select v-model="form.publisher_id" id="publisher_id" required>
                    <option v-for="editorial in editoriales" :key="editorial.id" :value="editorial.id">
                        {{ editorial.publisher }}
                    </option>
                </select>
            </div>

            <button type="submit">Actualizar libro</button>
        </form>

        <br />
        <inertia-link href="/books">← Volver</inertia-link>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        libro: Object,
        autores: Array,
        editoriales: Array,
        errors: Object
    },
    data() {
        return {
            form: {
                title: this.libro.title || '',
                edition: this.libro.edition || '',
                copyright: this.libro.copyright || '',
                language: this.libro.language || '',
                pages: this.libro.pages || '',
                author_id: this.libro.author_id || '',
                publisher_id: this.libro.publisher_id || ''
            }
        };
    },
    computed: {
        errorsArray() {
            return this.errors ? Object.values(this.errors).flat() : [];
        }
    },
    methods: {
        submitForm() {
            Inertia.put(`/books/${this.libro.id}`, this.form);
        }
    }
};
</script>

<style scoped>
.edit-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
}

.edit-container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.edit-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.edit-container input,
.edit-container select {
    width: 100%;
    padding: 8px;
}
</style>
