import { http } from './config';

export default {
  marcar: (ponto) => {
    return http
      .post('registry-point', ponto)
      .then(() => {
        if (!ponto) {
          alert('Insira todos os dados antes de marcar seu ponto!');
        } else {
          alert('Cadastrado com sucesso!');
        }
      })
      .catch((e) => {
        if (e.response.status === 400) {
          alert(
            'O ponto não pode ter uma diferença maior que 24 horas, insira os dados corretamente!'
          );
        } else {
          alert('Serviço indisponível!');
        }
      });
  },
};
