<?php

namespace Anodio\Testing\Helpers;

class TestHelper
{
    public static function tearDownAnod() {
        \Anodio\Core\ContainerStorage::removeContainer();
    }

    public static function prepareAnod(string $baseDir) {
        putenv('CONTAINER_NAME=pest');
        $helper = new \Anodio\Core\Helpers\StartHelper();
        $helper->preload($baseDir);
        $container = \Anodio\Core\ContainerManagement\ContainerManager::createContainer(false);
        \Anodio\Core\ContainerStorage::init();
        \Anodio\Core\ContainerStorage::setContainer($container);
    }
}
