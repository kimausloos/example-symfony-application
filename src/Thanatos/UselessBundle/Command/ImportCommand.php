<?php

namespace Thanatos\UselessBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Thanatos\UselessBundle\Entity\Tweets;

class ImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('thanatos:useless:import')
            ->setDescription('Import basic data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get("doctrine.orm.default_entity_manager");

        $output->writeln("Importing basic data");

        $importFile = $this->getContainer()->getParameter("data_import_file");
        $tweets = json_decode(file_get_contents($importFile), true);
        foreach(array_shift($tweets) as $tweet) {
            $dataTweet = new Tweets();

            $id             = $tweet['id_str'];
            $text           = $tweet['text'];
            $name           = $tweet['user']['screen_name'];
            $profileImage   = $tweet['user']['profile_image_url'];

            $link = sprintf('https://twitter.com/%s/status/%s', $name, $id);

            $dataTweet->setTweet($text);
            $dataTweet->setAuthorname($name);
            $dataTweet->setAvatar($profileImage);
            $dataTweet->setLink($link);

            $em->persist($dataTweet);
        }

        $em->flush();

        $output->writeln("Done!");
    }
}