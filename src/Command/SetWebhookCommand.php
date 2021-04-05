<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Routing\RouterInterface;
use Telegram\Bot\Api;

class SetWebhookCommand extends Command
{
    private $api;
    private $router;

    public function __construct(Api $api, RouterInterface $router)
    {
        $this->api = $api;
        $this->router = $router;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('bot:set-webhook');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $this->router->generate('app_webhook_index', [], $this->router::ABSOLUTE_URL);
        $result = $this->api->setWebhook([
            'url' => $url,
        ]);

        $output->write(var_export($result, true));

        return 0;
    }
}
