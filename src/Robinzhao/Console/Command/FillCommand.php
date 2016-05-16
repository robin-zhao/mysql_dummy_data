<?php

namespace Robinzhao\Console\Command;

use Robinzhao\Mysql\Db;
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
            foreach ($db->showTable($name) as $object) {
                
                $field = \Robinzhao\Mysql\Field\Field::factory($object->Field, $object->Type);
                
                
                $output->writeln('Field: ' . str_pad($object->Field, 15, ' ')
                    . 'Type: ' . $object->Type . ' ' . $field->generateRandom());
                
                
                
                
                
            }
        }
    }

}
