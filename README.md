# VoxusChallenge
___
### Tecnologias:

- Php 8.0 (Laravel)
- WSL 2
- Docker Composer

___
### Como rodar o projeto
___

##### Ambientado em Ubuntu 20.04.6 LTS

Iniciando serviço do docker

```shell
sudo service docker start
```

levantando imagem docker

```shell
docker-compose up -d --build
```

executando linha de comando da imagem docker

```shell
docker exec -it app sh
```

___

## Observações:

para limpar cache e refazer autoload do composer caso tenha problemas com views ou funções não carregando:

```bash
# terminal na pasta raiz do projeto

docker exec -it app sh

php artisan config:cache
php artisan config:clear
php artisan view:clear
php artisan cache:clear
composer dumpautoload
exit
```
