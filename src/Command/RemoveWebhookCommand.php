<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Telegram\Bot\Api;

class RemoveWebhookCommand extends Command
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('bot:remove-webhook');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this->api->removeWebhook();

        $output->write(var_export($result, true));

        return 0;
    }
}
