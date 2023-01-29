<template>
  <div class="container">
    <form @submit.prevent="submitForm">
      <div class="input-group">
        <label for="name">Nome:</label>
        <input type="text" v-model="form.name" id="name" />
        <label for="chegada">Chegada:</label>
        <input type="datetime-local" v-model="form.chegada" id="chegada" />
        <label for="saida">Saída:</label>
        <input type="datetime-local" v-model="form.saida" id="saida" />
      </div>
    </form>
    <div class="button-group">
      <button :disabled="buttonDisabled" @click="submitForm">Enviar</button>
      <button @click="">Exportar PDF</button>
    </div>
  </div>
</template>

<script>
import Ponto from '@/services/ponto.js';
export default {
  data() {
    return {
      form: {
        name: '',
        chegada: '',
        saida: '',
      },
    };
  },
  computed: {
    buttonDisabled() {
      const data = this.form;
      return !data.name || !data.chegada || !data.saida;
    },
  },
  methods: {
    submitForm() {
      Ponto.marcar(this.form);
      this.form = {};
    },
  },
};
</script>
