<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function test()
    {
        echo 'Eddy\\Route tasks running...' . PHP_EOL;

        echo PHP_EOL . 'Running feature tests...' . PHP_EOL . PHP_EOL;

        $this->taskBehat('bin/behat')
            ->format('pretty')
            // ->noInteraction()
            ->run();
        
        echo PHP_EOL . 'Running unit tests...' . PHP_EOL . PHP_EOL;

        $this->taskPhpspec('bin/phpspec')
            ->format('pretty')
            // ->noInteraction()
            ->run();
    }
}