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

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Ping!

```curl
curl --request GET \
  --url http://localhost/api/ping
```
