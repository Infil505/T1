<template>
    <div class="create-container">
        <h1>Agregar nuevo autor</h1>

        <div v-if="errorsArray.length" style="color: red;">
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <label for="author">Nombre:</label>
                <input type="text" v-model="form.author" id="author" required />
            </div>

            <div>
                <label for="nationality">Nacionalidad:</label>
                <input type="text" v-model="form.nationality" id="nationality" required />
            </div>

            <div>
                <label for="birth_year">Año de nacimiento:</label>
                <input type="number" v-model="form.birth_year" id="birth_year" required />
            </div>

            <button type="submit">Guardar autor</button>
        </form>

        <br />
        <Link href="/authors" class="back-link">← Volver</Link>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            form: {
                author: '',
                nationality: '',
                birth_year: '',
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
            Inertia.post('/authors', this.form);
        },
    },
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

.create-container input {
    width: 100%;
    padding: 8px;
}

.back-link {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #2575fc;
    font-weight: 500;
}

.back-link:hover {
    text-decoration: underline;
}
</style>
