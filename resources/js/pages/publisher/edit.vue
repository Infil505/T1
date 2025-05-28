<template>
  <div class="edit-container">
    <h1>Editar editorial: {{ form.publisher }}</h1>

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

      <button type="submit">Actualizar editorial</button>
    </form>

    <br />
    <Link href="/publisher">← Volver</Link>
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
    editorial: Object,
    errors: Object
  },
  data() {
    return {
      form: {
        publisher: this.editorial.publisher || '',
        country: this.editorial.country || '',
        founded: this.editorial.founded || '',
        genere: this.editorial.genere || ''
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
      Inertia.put(`/publishers/${this.editorial.id}`, this.form);
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

.edit-container input {
  width: 100%;
  padding: 8px;
}
</style>
