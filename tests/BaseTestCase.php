<?php

namespace Mailigen\MGAPI\Test;

use Mailigen\MGAPI\MGAPI;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseTestCase
 *
 * @package Mailigen\MGAPI\Test
 */
class BaseTestCase extends TestCase
{
    /**
     * @var MGAPI
     */
    protected $apiClient;

    /**
     * Setup the MGAPI so it can be used by every test
     */
    public function setUp()
    {
        $this->apiClient = new MGAPI('');
    }
}
