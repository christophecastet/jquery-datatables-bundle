<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception;

use Exception;
use WBW\Bundle\JQuery\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Bad DataTables editor exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Exception
 */
class BadDataTablesEditorExceptionTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new BadDataTablesEditorException(new Exception());

        $this->assertEquals('The DataTables editor "Exception" must implement DataTablesEditorInterface', $obj->getMessage());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__constructWithNull() {

        $obj = new BadDataTablesEditorException(null);

        $this->assertEquals("The DataTables editor is null", $obj->getMessage());
    }
}
