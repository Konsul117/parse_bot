<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Telegram\Bot\Api;
use Telegram\Bot\TelegramRequest;

class WebhookInfoCommand extends Command
{
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('bot:webhook-info');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $request = new TelegramRequest(
            $this->api->getAccessToken(),
            'POST',
            'getWebhookInfo'
        );
        $result = $this->api->getClient()->sendRequest($request);

        $output->write(var_export($result, true));

        return 0;
    }
}
