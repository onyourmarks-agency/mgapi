<?php

namespace Mailigen\MGAPI\Test;

/**
 * Class PingTest
 *
 * @package Mailigen\MGAPI\Test
 */
class PingTest extends BaseTestCase
{
    /** @test */
    public function it_can_ping()
    {
        $this->assertEquals('Everything\'s Ok!', $this->apiClient->ping());
    }
}
