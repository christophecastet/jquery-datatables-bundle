<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Normalizer;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Library\Core\Argument\Helper\ArrayHelper;

/**
 * DataTables normalizer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Normalizer
 */
class DataTablesNormalizer {

    /**
     * Normalize a column.
     *
     * @param DataTablesColumnInterface $column The column.
     * @return array Returns teh normalized column.
     */
    public static function normalizeColumn(DataTablesColumnInterface $column) {

        $output = [];

        ArrayHelper::set($output, "cellType", $column->getCellType(), [null]);
        ArrayHelper::set($output, "classname", $column->getClassname(), [null]);
        ArrayHelper::set($output, "contentPadding", $column->getContentPadding(), [null]);
        ArrayHelper::set($output, "data", $column->getData(), [null]);
        ArrayHelper::set($output, "defaultContent", $column->getDefaultContent(), [null]);
        ArrayHelper::set($output, "name", $column->getName(), [null]);
        ArrayHelper::set($output, "orderable", $column->getOrderable(), [null, true]);
        ArrayHelper::set($output, "orderData", $column->getOrderData(), [null]);
        ArrayHelper::set($output, "orderDataType", $column->getOrderDataType(), [null]);
        ArrayHelper::set($output, "orderSequence", $column->getOrderSequence(), [null]);
        ArrayHelper::set($output, "searchable", $column->getSearchable(), [null, true]);
        ArrayHelper::set($output, "type", $column->getType(), [null]);
        ArrayHelper::set($output, "visible", $column->getVisible(), [null, true]);
        ArrayHelper::set($output, "width", $column->getWidth(), [null]);

        return $output;
    }

    /**
     * Normalize a response.
     *
     * @param DataTablesResponseInterface $response The response.
     * @return array Returns the normalized response.
     */
    public static function normalizeResponse(DataTablesResponseInterface $response) {

        $output = [];

        $output["data"]            = $response->getData();
        $output["draw"]            = $response->getDraw();
        $output["recordsFiltered"] = $response->getRecordsFiltered();
        $output["recordsTotal"]    = $response->getRecordsTotal();

        return $output;
    }
}
