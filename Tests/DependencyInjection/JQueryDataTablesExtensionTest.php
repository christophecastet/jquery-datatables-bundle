<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\DependencyInjection;

use WBW\Bundle\BootstrapBundle\Tests\AbstractBootstrapTest;
use WBW\Bundle\JQuery\DatatablesBundle\DependencyInjection\JQueryDataTablesExtension;
use WBW\Bundle\JQuery\DatatablesBundle\Manager\DataTablesManager;

/**
 * DataTables extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\DependencyInjection
 */
final class DataTablesExtensionTest extends AbstractBootstrapTest {

    /**
     * {@inheritdoc}
     */
    protected function setUp() {
        parent::setUp();
    }

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoad() {

        $obj = new JQueryDataTablesExtension();

        $obj->load([], $this->containerBuilder);
        $this->assertInstanceOf(DataTablesManager::class, $this->containerBuilder->get(DataTablesManager::SERVICE_NAME));
    }

}