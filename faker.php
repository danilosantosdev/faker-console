<?php

  require_once './vendor/autoload.php';

  use FakerConsole\Console\Command\FakerCommand;
  use Symfony\Component\Console\Application;

  $console = new Application('Faker Generator', '0.0.1');
  $console->add(new FakerCommand());
  $console->run();
