<template>
    <div class="edit-container">
        <h1>Editar autor: {{ form.author }}</h1>

        <div v-if="errorsArray.length" style="color: red;">
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <label for="author">Nombre:</label>
                <input type="text" id="author" v-model="form.author" required />
            </div>

            <div>
                <label for="nationality">Nacionalidad:</label>
                <input type="text" id="nationality" v-model="form.nationality" required />
            </div>

            <div>
                <label for="birth_year">Año de nacimiento:</label>
                <input type="number" id="birth_year" v-model="form.birth_year" required />
            </div>

            <div>
                <label for="fields">Áreas de conocimiento:</label>
                <input type="text" id="fields" v-model="form.fields" required />
            </div>

            <button type="submit">Actualizar autor</button>
        </form>

        <br />
        <Link href="/authors">← Volver</Link>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3'; 

export default {
    components: {
        Link,
    },
    props: {
        autor: Object,
        errors: Object,
    },
    data() {
        return {
            form: {
                author: this.autor.author || '',
                nationality: this.autor.nationality || '',
                birth_year: this.autor.birth_year || '',
                fields: this.autor.fields || '',
            },
        };
    },
    computed: {
        errorsArray() {
            return this.errors ? Object.values(this.errors).flat() : [];
        },
    },
    methods: {
        submitForm() {
            Inertia.put(`/authors/${this.autor.id}`, this.form);
        },
    },
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

.edit-container input {
    width: 100%;
    padding: 8px;
}
</style>
