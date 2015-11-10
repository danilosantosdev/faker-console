<?php

namespace FakerConsole\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Faker\Factory;

class FakerCommand extends Command
{

  protected function configure()
  {
    $this
      ->setName('generate')
      ->setDescription('Gerando dados do faker.')
      ->addArgument(
        'fields',
        InputArgument::REQUIRED,
        'Escolha os tipos de dados que serão gerados pelo faker.'
      )
      ->addOption(
        'quantity',
        null,
        InputOption::VALUE_OPTIONAL,
        'Escolha a quantidade de registro que será gerada.',
        1
      );
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $faker = Factory::create();

    $fields = explode(':',$input->getArgument('fields'));

    $quantity = (int) $input->getOption('quantity');

    $data = [];

    for ($i=0; $i < $quantity; $i++) {

      foreach ($fields as $value) {

        $data[$i][$value] = $faker->{$value};

      }

    }

    if($quantity == 1){

      $data = end($data);

    }

    $output->writeln(json_encode($data, JSON_PRETTY_PRINT));
  }

}
