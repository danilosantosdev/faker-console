[![Build Status](https://travis-ci.org/josimar-lemos/faker-console.svg?branch=master)](https://travis-ci.org/josimar-lemos/faker-console)

## Introdução ##

O faker console roda na linha de comando e é integrado com o [Faker](https://github.com/fzaninotto/Faker) que é uma ferramenta de geração de dados de teste, como: nomes, endereços, telefones, dados de cartão de crédito e etc.

Em tese a integração que o faker console faz, permite que qualquer dado que possa ser gerado pela interface do Faker também seja gerado pelo terminal deixando o processo de geração de dados "fakes" mais ágil, já que com um único comando é possivel salvar um json com os registros gerados pelo Faker.

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

```c

## Gerando registros ##


### 1.  Campos únicos ###

```sh
$ faker-console generate name

{
    "name": "Tyra Huels"
}

```

### 2.  Multiplos campos ###

```sh
faker-console generate name:email:address

{
    "name": "Prof. Stacey Anderson MD",
    "email": "hudson.louvenia@schmitt.com",
    "address": "6194 Berge Drives\nMarvinfort, IN 43300-3528"
}

```

### 3.  Multiplos registros ###

```sh
$ faker-console generate name:email:address --quantity=10

[
    {
        "name": "Michale Wehner Jr.",
        "email": "genoveva.shields@orn.biz",
        "address": "453 Hand Springs Apt. 879\nNew Trudie, HI 51497"
    },
    {
        "name": "Berniece Thiel",
        "email": "ariane.flatley@hotmail.com",
        "address": "23459 Webster Ports Apt. 091\nNew Norval, VA 06801"
    },
    ...
```

### 4.  Campos disponiveis ###

Veja os campos que podem ser usados [aqui](https://github.com/fzaninotto/Faker#formatters)

## Salvando registros ##

Em breve irei inserir uma opção para salvar um arquivo com o resultado da geracão em uma determinada localização.

Enquanto isso não ocorre você pode salvar um arquivo com o retorno assim:

```sh
$ faker-console generate name:email:address --quantity=10 > ~/Desktop/usuarios.json

```

Onde o ">" indica que o retorno será escrito no arquivo "~/Desktop/usuarios.json".
