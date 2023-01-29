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

    <div>
      <input type="date" v-model="startDate" />
      <input type="date" v-model="endDate" />
      <button @click="getData">Filtrar</button>
      <table v-if="pontos.length">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Total de horas diurnas</th>
            <th>Total de horas noturnas</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ponto in pontos" v-bind:key="ponto.usuario">
            <td>{{ ponto.usuario }}</td>
            <td>{{ ponto.total_horas_diurnas }}H</td>
            <td>{{ ponto.total_horas_noturnas }}H</td>
          </tr>
        </tbody>
      </table>
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
      startDate: '',
      endDate: '',
      pontos: [],
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
    },
    getData() {
      if (this.pontos.length > 0) {
        this.pontos = [];
      }
      Ponto.filtrarPorData(this.startDate, this.endDate).then((result) => {
        this.pontos = result.data;
      });
    },
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

table {
  width: 100%;
  border-collapse: collapse;
}
thead {
  background-color: #ddd;
}
th,
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
