# Desafio API Pontue

### Passo a passo
- Baixe o .Zip do projeto nesse repositório


Já deixei o arquivo .env disponível no projeto

Depois de descompactar ou clonar o repositório, acesse a pasta do projeto pelo terminal

Construa os containers do docker
```sh
docker-compose build
```

Inicie os containers 
```sh
docker-compose up -d
```

Instale as dependências do Laravel
```sh
docker-compose exec api_pontue composer install
```

Gere a key do projeto Laravel
```sh
docker-compose exec api_pontue php artisan key:generate
```

Executar as Migrações do banco de dados
```sh
docker-compose exec api_pontue php artisan migrate
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)


### Acesse o Postman

Importe no Postman a coleção que esta preparada na raiz do projeto:

- API-Pontue.postman_collection.json

## Verbos Http da API
| Método | Endpoint | Descrição | Dados Solicitados|
|---|---|---|---|
| `POST` | http://localhost:8989/api/auth/login | Primeiramente use essa rota para logar na API e obter o token de validação nas outras rotas, já deixei um usuário no body da requisição do postman que esta cadastrado no banco para facilitar | email: email@exemplo.com e password: password |
| `POST` | http://localhost:8989/api/games | Adiciona novos cadastros de jogos ao banco de dados| titulo: nome do jogo, genero: genero do jogo, plataforma: plataformas que esta disponível, valor: valor do jogo|
| `GET` | http://localhost:8989/api/games | Caso não seja passado nenhum ID na URL da requisição ele trará todos os jogos cadastrados com suas informações validadas | Apenas é necessário estar autenticado |
| `GET` | http://localhost:8989/api/games/7,2 | Caso seja enviado um ou mais IDs na URL ele trará os jogos correspondentes | É necessário enviar os IDs na url |
| `DELETE` | http://localhost:8989/api/games/7,8 | Apaga os registros cujo os IDs sejam enviados na URL | É necessário enviar um ou mais ID na URL |
| `PUT` | http://localhost:8989/api/games/10,11 | Atualiza os registros cujo os IDs serão enviados na URL | titulo: nome do jogo, genero: genero do jogo, plataforma: plataformas que esta disponível, valor: valor do jogo |
| `POST` | http://localhost:8989/api/auth/logout | Deleta o token de autenticação | Necessário apenas estar autenticado antes |
| `POST` | http://localhost:8989/api/auth/reset | Atualiza a senha do usuário logado | Necessário enviar uma nova senha |
