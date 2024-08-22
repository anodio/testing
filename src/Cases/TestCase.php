<?php

namespace Anodio\Testing\Cases;

use Anodio\Testing\Helpers\TestHelper;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

    protected function setUp(): void
    {
        TestHelper::prepareAnod(__DIR__ . '/../../../../PhpstormProjects/');
    }

    protected function tearDown(): void
    {
        TestHelper::tearDownAnod();
    }

}