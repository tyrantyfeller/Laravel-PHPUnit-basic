# Teste Laravel com PHPUnit

Feito por [João Pedro Lemos Menezes](https://www.linkedin.com/in/jo%C3%A3o-pedro-lemos-menezes-518a1ab4/)

___
### Tecnologias e Sistema Operacional Utilizado:

- Php 8.0 (Laravel)
- WSL 2
- Docker Composer
- Ubuntu 20.04.6 LTS
- PHPUnit

___
### Sobre o ambiente

O ambiente de desenvolvimento foi criado em uma máquina virtual Ubuntu 20.04.6 LTS com Docker instalado. A maquina virtual foi criada utilizando WSL 2 em uma máquina com Windows 10.

Download o Ubuntu 20.04.6 LTS:

[Ubuntu 20.04.6 LTS](https://apps.microsoft.com/detail/9MTTCL66CPXJ?hl=pt-br&gl=US)

Artigos sobre a instalação do docker dentro da máquina virtual Ubuntu 20.04.6 LTS:

[How To Install and Use Docker on Ubuntu 20.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04)

[How To Install and Use Docker Compose on Ubuntu 20.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04)

Artigo sobre atualização do WSL 2 no Windows:

[Como instalar o Linux no Windows com o WSL](https://learn.microsoft.com/pt-br/windows/wsl/install)

___
### Como rodar o projeto

___

##### Dentro da VM Ubuntu 20.04.6 LTS

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

## Observações Importantes:

Na primeira build do container, o site pode demorar um pouco para inicializar, pois internamente o dockerfile está instalando arquivo de dependencia no ambiente.

Caso necessário, para limpar cache e refazer autoload do composer caso tenha problemas com views ou funções não carregando:

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


___

## Um pouco sobre o João Pedro:
### Como você começou no mundo da programação? Quais foram suas motivações? O que chamou sua atenção?

Foi derrepente, quando eu terminei o meu curso de técnico em redes de computadores na faculdade SENAI surgiu uma oportunidade de poder fazer tecnólogo, as opções eram Automação Industrial, Redes de Computadores, Sistemas Embarcados e Análise e Desenvolvimento de Sistemas. De todas as opções, a que melhor se encaixava com a minha personalidade e com o que eu gostava de fazer era Análise e Desenvolvimento de Sistemas. Ao ter essas opções na minha frente, foi quando eu percebi que eu amo criar sistemas que poderiam resolver qualquer tipo de situação, ou até mesmo criar produtos para entretenimento como jogos, fora o desafio de desenvolver lógica de programação que foi algo que eu acredito ter melhorado muito a minha capacidade mental. Me fez perceber que gosto de enigmas e quebra-cabeças.

### Você tem algum projeto pessoal que tem trabalhado recentemente? Se sim,poderia nos contar um pouco sobre o projeto e quais tem sido seus principais desafios?

Sim, tenho dois projetos. Um deles é um ‘e-commerce’ que fiz para um amigo que queria começar um negócio de produtos produzidos por impressora 3D. O segundo projeto é a criação do meu próprio jogo MMORPG, no qual o maior desafio é o impasse criativo, criação de história e direção artística é bem difícil de fazer.  

### Para você, qual é a forma mais efetiva de aprender algo novo relacionado à programação?

A forma mais efetiva é pondo em prática todo e qualquer conhecimento adiquirido, pode começar com algo simples como uma calculadora ou qualquer programa simples que a pessoa possa testar aquilo que ela acabou de aprender.

### Defina, na sua percepção, quais características uma pessoa deve ter para ser considerada boa desenvolvedora?

Um desenvolvedor cria uma ferramenta capaz de cumprir seu objetivo. Um bom desenvolvedor se preocupa com o melhor funcionamento da sua ferramenta e tenta facilitar a leitura dela.

