<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Factory;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;

/**
 * Test DataTables factory.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Factory
 */
class TestDataTablesFactory extends DataTablesFactory {

    /**
     * {@inheritDoc}
     */
    public static function newResponse(DataTablesWrapperInterface $wrapper) {
        return parent::newResponse($wrapper);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseColumn(array $rawColumn, DataTablesWrapperInterface $wrapper) {
        return parent::parseColumn($rawColumn, $wrapper);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseColumns(array $rawColumns, DataTablesWrapperInterface $wrapper) {
        return parent::parseColumns($rawColumns, $wrapper);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseOrder(array $rawOrder) {
        return parent::parseOrder($rawOrder);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseOrders(array $rawOrders) {
        return parent::parseOrders($rawOrders);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseRequest(DataTablesWrapperInterface $wrapper, Request $request) {
        return parent::parseRequest($wrapper, $request);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseSearch(array $rawSearch) {
        return parent::parseSearch($rawSearch);
    }
}
