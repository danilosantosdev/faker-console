<?php

use FakerConsole\Console\Command\FakerCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class FakerCommandTest extends PHPUnit_Framework_TestCase
{

  protected $app;

  protected function setUp()
  {
    $this->app = new Application('Faker Generator', '0.0.1');
    $this->app->add(new FakerCommand());
  }

  protected function getCommandTester(Symfony\Component\Console\Command\Command $command)
  {
    return new CommandTester($command);
  }

  public function testExisteGenerate()
  {
    try {
      $command = $this->app->find('generate');
    } catch (Symfony\Component\Console\Exception\CommandNotFoundException $e) {
      $this->fail();
    }

    $this->assertInstanceOf('Symfony\Component\Console\Command\Command', $command);
  }

  public function testGenerateName(){
    $command = $this->getCommandTester($this->app->find('generate'));
    $command->execute(array(
      'fields' => 'name'
    ));
    $return = json_decode($command->getDisplay(), true);

    $this->assertArrayHasKey('name', $return);
  }

  public function testGenerateUser(){
    $fields = ['name', 'email', 'password', 'address'];
    $command = $this->getCommandTester($this->app->find('generate'));
    $command->execute(array(
      'fields' => implode(':',$fields)
    ));
    $return = json_decode($command->getDisplay(), true);

    $this->assertEquals($fields, array_keys($return));
  }

  public function testGenerateCities(){
    $command = $this->getCommandTester($this->app->find('generate'));
    $quantity = 10;
    $command->execute(array(
      'fields' => 'city',
      '--quantity' => $quantity
    ));
    $return = json_decode($command->getDisplay(), true);

    $this->assertCount($quantity, $return);
    $this->assertArrayHasKey('city', end($return));
  }

  public function testGeneratePayments(){
    $fields = ['creditCardType', 'creditCardNumber', 'creditCardExpirationDate'];
    $quantity = 20;
    $command = $this->getCommandTester($this->app->find('generate'));
    $command->execute(array(
      'fields' => implode(':',$fields),
      '--quantity' => $quantity
    ));
    $return = json_decode($command->getDisplay(), true);

    $this->assertCount($quantity, $return);
    $this->assertEquals($fields, array_keys(end($return)));
  }

  public function testGenerateReturnPHPArray(){
    $fields = ['name', 'email'];
    $quantity = 10;
    $type = 'php';
    $command = $this->getCommandTester($this->app->find('generate'));
    $command->execute(array(
      'fields' => implode(':',$fields),
      '--quantity' => $quantity,
      '--type' => $type
    ));
    $return = $command->getDisplay();
    $return = eval("return $return;");

    $this->assertTrue(is_array($return));
    $this->assertCount($quantity, $return);

  }

}
