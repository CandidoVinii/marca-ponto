# Marca ponto

Projeto técnico

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto na sua máquina local para fins de desenvolvimento ou visão do detalhamento.

## 📋 Pré-requisitos
 - [PHP](https://www.php.net/).
 - [Composer](https://getcomposer.org/).
 - [MYSQL](https://www.mysql.com/).
 - [Node](https://nodejs.org/en/docs/).
 - IDE da sua escolha.

## 🔧 Instalação

  * Clone o repositório com ```git clone git@github.com:CandidoVinii/marca-ponto.git```
  * Vá para a pasta do projeto ```cd marca-ponto/```
  
  ### Instalação Back-End
  * Entre na pasta referente ao back-end  ```cd back-end/```
  * Insira as configurações de ambiente no arquivo .env. Pegue como exemplo o arquivo .env-example
  * Após configurar rode o comando ```composer install``` para instalar as dependências
  * Crie sua key com o comando ```php artisan key:generate```
  
  ### Instalação Front-End
  * Entre na pasta referente ao back-end  ```cd front-end/```
  * Rode o comando ```npm install``` para instalar as dependências

## :play_or_pause_button: Comandos Importantes
 
 ### Front-End
 * ```npm run serve``` para inicialização da aplicação.
 * ```npm run lint``` para verificar se tem algum erro de linter no código.
 
 ### Back-End
 * ```php artisan serve``` para expor a API.
 * ```php artisan migrate``` para criar as tabelas no banco de dados.
 * ```php artisan migrate:refresh --seed``` para popular as tabelas do banco de dados.
 * ```php artisan migrate:rollback``` para desfazer a ultima migration criada.


## 📌 Versão

Está sendo utilizado [git](https://git-scm.com/) para controle de versão. Para as versões disponíveis.

## ✒️ Autores

* **Vinicius Aquino** - *Desenvolvedor Full-Stack* - [GitHub](https://github.com/CandidoVinii)


---
