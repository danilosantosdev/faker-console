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

  /**
   * Configure the command options.
   *
   * @return void
   */
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
      )
      ->addOption(
        'type',
        null,
        InputOption::VALUE_OPTIONAL,
        'Escolha o tipo da saída.',
        'json'
      );
  }

  /**
   * Execute the command.
   *
   * @param  InputInterface  $input
   * @param  OutputInterface  $output
   * @return void
   */
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

    $output->writeln( $this->parseReturn( $input->getOption('type'), $data ) );
  }

  protected function parseReturn($type, $data){

    switch ($type) {
      case 'json':
        return json_encode($data, JSON_PRETTY_PRINT);
        break;

      case 'php':
        return var_export($data, true);
        break;

      default:
        break;

    }

  }

}
