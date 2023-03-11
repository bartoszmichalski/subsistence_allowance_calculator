<?php

namespace App\Allowance\UserInterface\Console;

use App\Allowance\Application\Service\AllowanceService;
use App\Country\Domain\CountryCode;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:allowance',
    description: 'WYliczenie diety',
    aliases: ['app:allowance'],
    hidden: false
)]
class AllowanceConsoleCommand extends Command
{

    public function __construct(
        private AllowanceService $service
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('country', InputArgument::REQUIRED, 'Kraj delegacji')
            ->addArgument('startDate', InputArgument::REQUIRED, 'Data rozpoczęcia delegacji')
            ->addArgument('days', InputArgument::REQUIRED, 'ilość dni');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $result = $this->service->calculate(
            CountryCode::from($input->getArgument('country')),
            \DateTime::createFromFormat('Y-m-d',$input->getArgument('startDate')),
            $input->getArgument('days')
        );

        $output->write('Kwota diety: '.$result."\n");

        return Command::SUCCESS;
    }
}
