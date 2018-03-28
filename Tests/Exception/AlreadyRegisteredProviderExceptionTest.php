<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Exception;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DatatablesBundle\Exception\AlreadyRegisteredProviderException;

/**
 * Already registered provider exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Exception
 * @final
 */
final class AlreadyRegisteredProviderExceptionTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new AlreadyRegisteredProviderException("exception");

        $this->assertEquals("A provider with name \"exception\" is already registered", $obj->getMessage());
    }

}