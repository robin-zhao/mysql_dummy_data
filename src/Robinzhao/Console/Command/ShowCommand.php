<?php

namespace Robinzhao\Console\Command;

use Robinzhao\Mysql\Db;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{

    protected function configure()
    {
        $this->setName('table:show')
            ->setDescription('Show table names.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Tables available: ");
        $output->writeln("");
        $db = new Db();
        foreach ($db->getTables() as $row) {
            $output->writeln($row);
        }

    }

}
