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
  resgatar: () => {
    return http
      .get('get-points', { responseType: 'blob' })
      .then((response) => {
        const fileURL = window.URL.createObjectURL(new Blob([response.data]));
        const fileLink = document.createElement('a');
        fileLink.href = fileURL;
        fileLink.setAttribute('download', 'data.pdf');
        document.body.appendChild(fileLink);
        fileLink.click();
        alert('Arquivo exportado com sucesso!');
      })
      .catch(() => {
        alert('Arquivo exportado com sucesso!');
      });
  },
};
