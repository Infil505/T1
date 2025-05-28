<template>
    <div class="create-container">
        <h1>Agregar nuevo libro</h1>

        <div v-if="errorsArray.length" style="color: red;">
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <label for="title">Título:</label>
                <input type="text" v-model="form.title" id="title" required />
            </div>

            <div>
                <label for="edition">Edición:</label>
                <input type="text" v-model="form.edition" id="edition" required />
            </div>

            <div>
                <label for="copyright">Año de copyright:</label>
                <input type="number" v-model="form.copyright" id="copyright" required />
            </div>

            <div>
                <label for="language">Idioma:</label>
                <input type="text" v-model="form.language" id="language" required />
            </div>

            <div>
                <label for="pages">Cantidad de páginas:</label>
                <input type="number" v-model="form.pages" id="pages" required />
            </div>

            <div>
                <label for="author_id">Autor:</label>
                <select v-model="form.author_id" id="author_id" required>
                    <option value="">-- Selecciona un autor --</option>
                    <option v-for="autor in autores" :key="autor.id" :value="autor.id">
                        {{ autor.author }}
                    </option>
                </select>
            </div>

            <div>
                <label for="publisher_id">Editorial:</label>
                <select v-model="form.publisher_id" id="publisher_id" required>
                    <option value="">-- Selecciona una editorial --</option>
                    <option v-for="editorial in editoriales" :key="editorial.id" :value="editorial.id">
                        {{ editorial.publisher }}
                    </option>
                </select>
            </div>

            <button type="submit">Guardar libro</button>
        </form>

        <br />
        <Link href="/book" class="back-link">← Volver</Link>
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
        autores: Array,
        editoriales: Array,
        errors: Object
    },
    data() {
        return {
            form: {
                title: '',
                edition: '',
                copyright: '',
                language: '',
                pages: '',
                author_id: '',
                publisher_id: ''
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
            Inertia.post('/book', this.form);
        }
    }
};
</script>

<style scoped>
.create-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
}

.create-container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.create-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.create-container input,
.create-container select {
    width: 100%;
    padding: 8px;
}
</style>
