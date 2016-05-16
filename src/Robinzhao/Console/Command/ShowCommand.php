<?php

namespace Robinzhao\Console\Command;

use Robinzhao\Mysql\Db;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{

    protected function configure()
    {
        $this->setName('table:show')
            ->setDescription('Show table names.')
            ->addArgument('name', InputArgument::OPTIONAL, 'table name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $name = $input->getArgument('name');
        $db = new Db();

        if ($name) {
            $output->writeln('Table fields of ' . $name);
            $output->writeln('');
            foreach ($db->showTable($name) as $object) {
                $output->writeln('Field: ' . str_pad($object->Field, 15, ' ') 
                    . 'Type: ' . $object->Type);
            }
        } else {

            $output->writeln("Tables available: ");
            $output->writeln("");
            foreach ($db->getTables() as $row) {
                $output->writeln($row);
            }
        }
    }

}
