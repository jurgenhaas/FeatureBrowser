<?php

namespace FeatureBrowser\FeatureBrowser\Cli;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Twig_Loader_Filesystem;
use Twig_Environment;


final class GenerateCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('generate')
             ->setDescription('Generates Feature Browser Documentation')
             ->addOption('output-dir', 'o', InputOption::VALUE_REQUIRED, 'Where do you want the generated documentation to be stored?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $outputDir = $input->getOption('output-dir');
        if(!is_dir($outputDir))
        {
            mkdir($outputDir);
        }
        $outputDir .= (substr($outputDir, -1) == '/' ? '' : '/');

        $loader = new Twig_Loader_Filesystem('/src/FeatureBrowser/Resources/views', ['cache' => '/cache',]);
        $twig   = new Twig_Environment($loader);

//        $rendered = $this->render('src/FeatureBrowser/Resources/views/base.html.twig');
//        $fp       = fopen($outputDir . 'index.html', 'w');
//        fwrite($fp, $rendered);
    }
}
