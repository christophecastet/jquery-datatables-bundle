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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponse;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesResponseTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DataTablesResponse();

        $this->assertEquals(0, $obj->countRows());
        $this->assertEquals([], $obj->getData());
        $this->assertEquals(0, $obj->getDraw());
        $this->assertNull($obj->getError());
        $this->assertEquals(0, $obj->getRecordsFiltered());
        $this->assertEquals(0, $obj->getRecordsTotal());
        $this->assertNull($obj->getWrapper());
    }

    /**
     * Tests the addRow() method.
     *
     * @return void
     */
    public function testAddRow() {

        // Set a Column mock.
        $col = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $col->expects($this->any())->method("getData")->willReturn("data");

        // Set a Wrapper mock.
        $arg = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();
        $arg->expects($this->any())->method("getColumns")->willReturn([$col]);

        $obj = new DataTablesResponse();
        $obj->setWrapper($arg);

        $this->assertCount(0, $obj->getData());
        $this->assertSame($obj, $obj->addRow());
        $this->assertCount(1, $obj->getData());
    }

    /**
     * Tests the setError() method.
     *
     * @return void
     */
    public function testSetError() {

        $obj = new DataTablesResponse();

        $obj->setError("error");
        $this->assertEquals("error", $obj->getError());
    }

    /**
     * Tests the setRecordFiltered() method.
     *
     * @return void
     */
    public function testSetRecordFiltered() {

        $obj = new DataTablesResponse();

        $obj->setRecordsFiltered(1);
        $this->assertEquals(1, $obj->getRecordsFiltered());
    }

    /**
     * Tests the setRecordTotal() method.
     *
     * @return void
     */
    public function testSetRecordTotal() {

        $obj = new DataTablesResponse();

        $obj->setRecordsTotal(2);
        $this->assertEquals(2, $obj->getRecordsTotal());
    }

    /**
     * Tests the setRow() method.
     *
     * @return void
     */
    public function testSetRow() {

        // Set a Column mock.
        $col = $this->getMockBuilder(DataTablesColumnInterface::class)->getMock();
        $col->expects($this->any())->method("getData")->willReturn("data");

        // Set a Wrapper mock.
        $arg = $this->getMockBuilder(DataTablesWrapperInterface::class)->getMock();
        $arg->expects($this->any())->method("getColumns")->willReturn([$col]);

        $obj = new DataTablesResponse();
        $obj->setWrapper($arg)->addRow();

        $obj->setRow("data", "data");
        $this->assertCount(1, $obj->getData());
        $this->assertEquals(["data" => "data"], $obj->getData()[0]);
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = new DataTablesResponse();

        $obj->setError("error");
        $obj->setRecordsFiltered(1);
        $obj->setRecordsTotal(2);

        $res = ["data" => [], "draw" => 0, "recordsFiltered" => 1, "recordsTotal" => 2];
        $this->assertEquals($res, $obj->toArray());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     * @depends testToArray
     */
    public function testJsonSerialize() {

        $obj = new DataTablesResponse();

        $res = ["data" => [], "draw" => null, "recordsFiltered" => null, "recordsTotal" => null];
        $this->assertEquals($res, $obj->jsonSerialize());
    }

}
