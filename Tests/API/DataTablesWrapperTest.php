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
use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;

/**
 * DataTables wrapper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Wrapper
 * @final
 */
final class DataTablesWrapperTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $this->assertEquals([], $obj->getColumns());
        $this->assertEquals("prefix", $obj->getMapping()->getPrefix());
        $this->assertEquals("POST", $obj->getMethod());
        $this->assertEquals([], $obj->getOrder());
        $this->assertTrue($obj->getProcessing());
        $this->assertNull($obj->getRequest());
        $this->assertNull($obj->getResponse());
        $this->assertTrue($obj->getServerSide());
        $this->assertEquals("url", $obj->getUrl());
    }

    /**
     * Tests the addColumn() method.
     *
     * @return void
     */
    public function testAddColumn() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->addColumn(DataTablesColumn::newInstance("name1", "title1"));
        $this->assertCount(1, $obj->getColumns());
        $this->assertEquals("name1", $obj->getColumns()["name1"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name1"]->getMapping()->getPrefix());

        $obj->addColumn(DataTablesColumn::newInstance("name2", "title2"));
        $this->assertCount(2, $obj->getColumns());
        $this->assertEquals("name2", $obj->getColumns()["name2"]->getMapping()->getColumn());
        $this->assertEquals("prefix", $obj->getColumns()["name2"]->getMapping()->getPrefix());
    }

    /**
     * Tests the getColumn() method.
     *
     * @return void
     */
    public function testGetColumn() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");
        $arg = DataTablesColumn::newInstance("name1", "title1");

        $this->assertNull($obj->getColumn("name1"));

        $obj->addColumn($arg);
        $this->assertSame($arg, $obj->getColumn("name1"));
    }

    /**
     * Tests the parse() method.
     *
     * @return void
     */
    public function testParse() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->parse(new Request());
        $this->assertNotNull($obj->getRequest());
        $this->assertNotNull($obj->getResponse());
    }

    /**
     * Tests the removeColumn() method.
     *
     * @return void
     */
    public function testRemoveColumn() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $col1 = DataTablesColumn::newInstance("name1", "title1");
        $col2 = DataTablesColumn::newInstance("name2", "title2");

        $obj->addColumn($col1);
        $obj->addColumn($col2);
        $this->assertCount(2, $obj->getColumns());

        $obj->removeColumn($col1);
        $this->assertCount(1, $obj->getColumns());
        $this->assertNull($col1->getMapping()->getPrefix());

        $obj->removeColumn($col2);
        $this->assertCount(0, $obj->getColumns());
        $this->assertNull($col2->getMapping()->getPrefix());
    }

    /**
     * Tests the setMethod() method.
     *
     * @return void
     */
    public function testSetMethod() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->setMethod("GET");
        $this->assertEquals("GET", $obj->getMethod());

        $obj->setMethod("exception");
        $this->assertEquals("GET", $obj->getMethod());
    }

    /**
     * Tests the setOrder() method.
     *
     * @return void
     */
    public function testSetOrder() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->setOrder(["order"]);
        $this->assertEquals(["order"], $obj->getOrder());
    }

    /**
     * Tests the setProcessing() method.
     *
     * @return void
     */
    public function testSetProcessing() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->setProcessing(false);
        $this->assertFalse($obj->getProcessing());

        $obj->setProcessing(null);
        $this->assertTrue($obj->getProcessing());
    }

    /**
     * Tests the setServerSide() method.
     *
     * @return void
     */
    public function testSetServerSide() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->setServerSide(false);
        $this->assertFalse($obj->getServerSide());

        $obj->setServerSide(null);
        $this->assertTrue($obj->getServerSide());
    }

    /**
     * Tests the setUrl() method.
     *
     * @return void
     */
    public function testSetUrl() {

        $obj = new DataTablesWrapper("prefix", "POST", "url");

        $obj->setUrl("anotherUrl");
        $this->assertEquals("anotherUrl", $obj->getUrl());
    }

}