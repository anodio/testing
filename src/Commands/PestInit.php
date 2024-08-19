<?php

namespace Anodio\Testing\Commands;

use Anodio\Testing\Helpers\TestHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[\Anodio\Core\Attributes\Command(
    'pest:init', 'Initialize Pest'
)]
class PestInit extends \Symfony\Component\Console\Command\Command
{
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        shell_exec('./vendor/bin/pest --init');
        unlink(BASE_PATH . '/tests/TestCase.php');
        copy(dirname(__FILE__) . '/../Cases/TestCase.php', BASE_PATH . '/tests/TestCase.php');
        $content = file_get_contents(BASE_PATH . '/tests/TestCase.php');
        $content = str_replace('namespace Anodio\Testing\Cases;', 'namespace Tests;', $content);
        $content = str_replace("TestHelper::prepareAnod(__DIR__.'/../../../../../');", "TestHelper::prepareAnod(__DIR__.'/../');", $content);
        file_put_contents(BASE_PATH . '/tests/TestCase.php', $content);
        return 0;
    }
}