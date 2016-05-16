<?php

namespace Robinzhao\Console\Command;

use Robinzhao\Mysql\Db;
use Robinzhao\Mysql\Field\Field;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FillCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('table:fill')
            ->setDescription('Fill a table with dummy rows.')
            ->addArgument(
                'name', InputArgument::REQUIRED, 'The table name.'
            )
            ->addArgument('number', InputArgument::OPTIONAL, 'Number of rows,default 100.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $number = $input->getArgument('number') ? : 100;

        $db = new Db();

        for ($i = 0; $i < $number; $i++) {
            $row = [];
            foreach ($db->showTable($name) as $object) {

                if ($object->Key == 'PRI') {
                    continue;
                }
                
                $row[$object->Field] = Field::factory($object->Field, $object->Type)
                    ->generateRandom();
            }
            $db->insert($name, $row);
        }

        var_dump('Memory: ' . memory_get_peak_usage());
        var_dump('Start Memory: ' . START_MEMORY);
        var_dump('Used time: ' . (microtime(true) - START_TIME));
    }

}
