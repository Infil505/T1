<template>
    <div>
        <!-- Fondo de estrellas -->
        <div class="stars">
            <span v-for="(star, index) in stars" :key="index" :style="star.style"></span>
        </div>

        <!-- Caja de formulario -->
        <div class="login-wrapper">
            <div class="login-box">
                <div class="login-icon">
                    <i class="fas fa-user-astronaut"></i>
                </div>

                <h1>Iniciar sesión</h1>

                <div v-if="errorMessage" class="error-box">
                    {{ errorMessage }}
                </div>

                <div v-if="successMessage" class="success-box">
                    {{ successMessage }}
                </div>

                <form @submit.prevent="submitForm">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" v-model="form.email" required placeholder="ejemplo@correo.com"
                            :disabled="isLoading" />
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" v-model="form.password" required
                            placeholder="Tu contraseña" :disabled="isLoading" />
                    </div>

                    <button type="submit" class="btn-login" :disabled="isLoading">
                        <span v-if="isLoading" class="loading-spinner"></span>
                        {{ isLoading ? 'Iniciando sesión...' : 'Ingresar' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            errorMessage: '',
            successMessage: '',
            isLoading: false,
            stars: []
        };
    },
    mounted() {
        this.generateStars();
    },
    methods: {
        generateStars() {
            const colors = [
                '#ffffff',
                '#bae6fd',
                '#93c5fd',
                '#a5f3fc',
                '#60a5fa',
                '#3b82f6',
                '#2563eb',
                '#ef4444',
                '#fbbf24'
            ];

            for (let i = 0; i < 500; i++) {
                const color = colors[Math.floor(Math.random() * colors.length)];
                this.stars.push({
                    style: `
            top: -${Math.floor(Math.random() * 100)}vh;
            left: ${Math.floor(Math.random() * 100)}vw;
            width: ${Math.floor(Math.random() * 3) + 1}px;
            height: ${Math.floor(Math.random() * 3) + 1}px;
            background: ${color};
            animation-duration: ${Math.floor(Math.random() * 11) + 20}s;
            animation-delay: ${Math.floor(Math.random() * 3)}s;
            `
                });
            }
        },

        async submitForm() {
            this.errorMessage = '';
            this.isLoading = true;

            this.$inertia.post('/login', this.form, {
                onSuccess: () => {
                    this.successMessage = 'Inicio de sesión exitoso. Redirigiendo...';
                },
                onError: (errors) => {
                    if (errors.email) {
                        this.errorMessage = errors.email;
                    } else {
                        this.errorMessage = 'Credenciales incorrectas.';
                    }
                },
                onFinish: () => {
                    this.isLoading = false;
                }
            });
        }
        ,

    }
};
</script>

<style>
body {
    background: radial-gradient(circle at center, #0f172a, #1e293b);
    overflow: hidden;
    font-family: 'Segoe UI', sans-serif;
    color: white;
}

.stars {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: -1;
    pointer-events: none;
}

.stars span {
    position: absolute;
    border-radius: 50%;
    opacity: 0.6;
    mix-blend-mode: screen;
    animation: twinkleMove linear infinite;
}

@keyframes twinkleMove {
    0% {
        opacity: 0.2;
        transform: translateY(-100vh) scale(1);
    }

    50% {
        opacity: 1;
        transform: translateY(-50vh) scale(1.3);
    }

    100% {
        opacity: 0;
        transform: translateY(100vh) scale(0.6);
    }
}

.login-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.login-box {
    width: 100%;
    max-width: 420px;
    background: rgba(255, 255, 255, 0.1);
    padding: 40px 35px;
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 15px 60px rgba(0, 0, 0, 0.6);
    animation: fadeIn 1s ease;
    color: white;
}

.login-icon {
    text-align: center;
    font-size: 3rem;
    color: #60a5fa;
    margin-bottom: 15px;
    animation: pulseIcon 2.5s infinite ease-in-out;
}

h1 {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 30px;
    color: #ffffff;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #ffffff;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    transition: all 0.3s ease;
}

input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

input:focus {
    border-color: #3b82f6;
    background: rgba(255, 255, 255, 0.15);
    outline: none;
    box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
}

input:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-login {
    width: 100%;
    padding: 14px;
    background: linear-gradient(90deg, #3b82f6, #6366f1);
    color: white;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    box-shadow: 0 0 15px rgba(56, 189, 248, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-login:hover:not(:disabled) {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 0 25px rgba(56, 189, 248, 0.8);
}

.btn-login:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.loading-spinner {
    width: 16px;
    height: 16px;
    border: 2px solid transparent;
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.error-box {
    background: #fee2e2;
    color: #b91c1c;
    padding: 12px 16px;
    margin-bottom: 20px;
    border-radius: 8px;
    font-weight: 500;
    border-left: 4px solid #ef4444;
}

.success-box {
    background: #d1fae5;
    color: #065f46;
    padding: 12px 16px;
    margin-bottom: 20px;
    border-radius: 8px;
    font-weight: 500;
    border-left: 4px solid #10b981;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes pulseIcon {

    0%,
    100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.1);
    }
}
</style>