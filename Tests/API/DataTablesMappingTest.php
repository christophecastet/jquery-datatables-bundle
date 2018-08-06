<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesMapping;

/**
 * DataTables mapping test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 * @final
 */
final class DataTablesMappingTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesMapping();

        $this->assertEquals("", $obj->getAlias());
        $this->assertNull($obj->getColumn());
        $this->assertNull($obj->getPrefix());
    }

    /**
     * Tests the setColumn() method.
     *
     * @return void
     */
    public function testSetColumn() {

        $obj = new DataTablesMapping();

        $obj->setColumn("column");
        $this->assertEquals("column", $obj->getAlias());
        $this->assertEquals("column", $obj->getColumn());
    }

    /**
     * Tests the setPrefix() method.
     *
     * @return void
     */
    public function testSetPrefix() {

        $obj = new DataTablesMapping();

        $obj->setPrefix("prefix");
        $this->assertNull($obj->getAlias());
        $this->assertEquals("prefix", $obj->getPrefix());
    }

}
