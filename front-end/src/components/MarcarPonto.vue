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
      <button @click="getPDF">Exportar PDF</button>
    </div>
  </div>
</template>

<script>
import Ponto from '@/services/apisPonto.js';
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
    getPDF() {
      Ponto.resgatar();
    }
  },
};
</script>

<style>
body {
  background-color: lightblue;
}
label {
  font-size: 20px;
  margin-right: 10px;
  margin-left: 10px;
  font-weight: bold;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}

input {
  height: 20px;
  width: 250px;
  font-size: 20px;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: none;
}

button {
  height: 40px;
  width: 200px;
  font-size: 20px;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  background-color: beige;
  color: black;
  border: 0.2px solid black;
  cursor: pointer;
  margin-left: 25px;
}

button[disabled] {
  opacity: 0.5;
  cursor: not-allowed;
}

button:active {
  transform: translateY(2px);
}
</style>
