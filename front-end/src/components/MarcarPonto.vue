<template>
  <div class="container">
    <form>
      <div class="input-group">
        <label for="name">Nome:</label>
        <input type="text" id="name" />
        <label for="chegada">Chegada:</label>
        <input type="datetime-local" id="chegada" />
        <label for="saida">Saída:</label>
        <input type="datetime-local" id="saida" />
      </div>
    </form>
    <div class="button-group">
      <button @click="">Enviar</button>
      <button @click="">Exportar PDF</button>
    </div>
  </div>
</template>
