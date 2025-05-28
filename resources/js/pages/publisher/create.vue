<template>
    <div class="create-container">
        <h1>Agregar nueva editorial</h1>

        <div v-if="errorsArray.length" style="color: red;">
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <label for="publisher">Nombre de la editorial:</label>
                <input type="text" id="publisher" v-model="form.publisher" required />
            </div>

            <div>
                <label for="country">País:</label>
                <input type="text" id="country" v-model="form.country" required />
            </div>

            <div>
                <label for="founded">Año de fundación:</label>
                <input type="number" id="founded" v-model="form.founded" required />
            </div>

            <div>
                <label for="genere">Especialidad:</label>
                <input type="text" id="genere" v-model="form.genere" required />
            </div>

            <button type="submit">Guardar editorial</button>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        errors: Object
    },
    data() {
        return {
            form: {
                publisher: '',
                country: '',
                founded: '',
                genere: ''
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
            Inertia.post('/publisher', this.form);
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

.create-container input {
    width: 100%;
    padding: 8px;
}
</style>
