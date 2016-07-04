<?php

namespace AppBundle\Command;

use AppBundle\Entity\Build;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('mindci:build-first')
            ->setDescription('Make first finded build');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Build $build */
        $build = $this->getContainer()->get('build_handler')->getFirstOpenedBuild();

        if ($build) {
            $output->writeln('Finded build #' . $build->getId());
        }
    }
}