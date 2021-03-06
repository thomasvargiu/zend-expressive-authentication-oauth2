<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-authentication-oauth2 for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-authentication-oauth2/blob/master/LICENSE.md
 *     New BSD License
 */

declare(strict_types=1);

namespace ZendTest\Expressive\Authentication\OAuth2\Entity;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Zend\Expressive\Authentication\OAuth2\Entity\TimestampableTrait;

class TimestampableTraitTest extends TestCase
{
    public function setUp()
    {
        $this->trait = $this->getMockForTrait(TimestampableTrait::class);
    }

    public function testCreatedAt()
    {
        $now = new DateTimeImmutable();
        $this->trait->setCreatedAt($now);
        $this->assertEquals($now, $this->trait->getCreatedAt());
    }

    public function testUpdatedAt()
    {
        $now = new DateTimeImmutable();
        $this->trait->setUpdatedAt($now);
        $this->assertEquals($now, $this->trait->getUpdatedAt());
    }

    public function testTimestampOnCreate()
    {
        $this->trait->timestampOnCreate();
        $this->assertNotEmpty($this->trait->getCreatedAt());
    }
}
