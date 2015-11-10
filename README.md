[![Build Status](https://travis-ci.org/josimar-lemos/faker-console.svg?branch=master)](https://travis-ci.org/josimar-lemos/faker-console)

## Introdução ##

O faker console roda na linha de comando e é integrada com o [Faker](https://github.com/fzaninotto/Faker) que é uma ferramenta de geração de dados de teste, como: nomes, endereços, telefones, dados de cartão de credito e etc.

Em tese a integração que o faker console faz permite que qualquer dado que possa ser gerado pela interface do Faker também seja gerado pelo terminal deixando o processo de geração de dados "fakes" mais ágil, já que com um único comando é possivel salvar um json com os registros gerados pelo Faker.

## Instalação ##

Faça o download [aqui](https://github.com/josimar-lemos/faker-console/releases/download/v0.1-beta/faker-console.phar) ou execute:

```sh
$ wget https://github.com/josimar-lemos/faker-console/releases/download/v0.1-beta/faker-console.phar

```

No diretorio que foi feito o download execute:

```sh
$ php faker-console.phar
Faker Generator version 0.0.1

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
.................................................

```
Você vai ver algo parecido com a saída acima.

Opcionamento você pode tornar o arquivo executavel e mover ele para a pasta de binarios, deixando comando faker-console disponivel globalmente.

```sh
$ sudo chmod +x faker-console.phar
$ sudo mv faker-console.phar /usr/local/bin/faker-console
$ faker-console

```

## Gerando registros fakes ##

```sh
faker-console generate name:email:address --quantity=10

```

(Continua...)
