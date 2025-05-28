<template>
    <div class="register-container">
        <h1>Crear cuenta</h1>

        <div v-if="errors.length" style="color: red;">
            <ul>
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" v-model="form.name" id="name" required />
            </div>

            <div>
                <label for="email">Correo electrónico:</label>
                <input type="email" v-model="form.email" id="email" required />
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" v-model="form.password" id="password" required />
            </div>

            <div>
                <label for="password_confirmation">Confirmar contraseña:</label>
                <input type="password" v-model="form.password_confirmation" id="password_confirmation" required />
            </div>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    data() {
        return {
            errors: [],
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        };
    },
    methods: {
        submitForm() {
            this.errors = []; // Reiniciar errores

            this.$inertia.post('/register', this.form, {
                onError: (errors) => {
                    // Convierte los errores del backend en un array plano
                    this.errors = Object.values(errors).flat();
                }
            });
        }
    }
};
</script>

<style scoped>
.register-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
}

.register-container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.register-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.register-container input {
    width: 100%;
    padding: 8px;
}
</style>
