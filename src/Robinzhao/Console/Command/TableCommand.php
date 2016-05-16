<?php

namespace Robinzhao\Console\Command;

use Robinzhao\Mysql\Db;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TableCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('table:fill')
            ->setDescription('Fill a table with dummy rows.')
            ->addArgument(
                'name', InputArgument::OPTIONAL, 'The table name.'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $db = new Db();
        foreach ($db->getTables() as $row)
        {
            $output->writeln($row);
        }

        $name = $input->getArgument('name');
        
        //var_dump($name);


        
    }

}
