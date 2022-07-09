# Digital Wallet

## Como instalar

Clone o repositório
```sh
git clone https://github.com/Thifany-Nicastro/Digital-Wallet.git
```

Entre no diretório
```sh
cd Digital-Wallet
```

Clone o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente
```dosini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=username
DB_PASSWORD=password
```

Suba os containers
```sh
docker-compose up -d
```

Acesse o container da aplicação
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere uma nova key da aplicação
```sh
php artisan key:generate
```

Gere um novo secret para o JWT
```sh
php artisan jwt:generate
```

Rode as migrations
```sh
php artisan migrate
```

Rode as seeds
```sh
php artisan db:seed
```

Ping!
```curl
curl --request GET \
  --url http://localhost/api/ping
```

## Packages utilizados

- [nunomaduro/larastan](https://github.com/nunomaduro/larastan)
- [tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth)
