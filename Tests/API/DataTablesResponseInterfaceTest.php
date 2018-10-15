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

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractFrameworkTestCase;

/**
 * DataTables response interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\API
 * @final
 */
final class DataTablesResponseInterfaceTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("DT_RowAttr", DataTablesResponseInterface::DATATABLES_ROW_ATTR);
        $this->assertEquals("DT_RowClass", DataTablesResponseInterface::DATATABLES_ROW_CLASS);
        $this->assertEquals("DT_RowData", DataTablesResponseInterface::DATATABLES_ROW_DATA);
        $this->assertEquals("DT_RowId", DataTablesResponseInterface::DATATABLES_ROW_ID);
    }

}
