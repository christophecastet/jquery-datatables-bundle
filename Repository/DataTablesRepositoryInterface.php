<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Repository;

use WBW\Bundle\JQuery\DatatablesBundle\Wrapper\DataTablesWrapper;

/**
 * DataTables repository interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Provider;
 */
interface DataTablesRepositoryInterface {

    /**
     * Count filtered entities.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return integer Returns the filtered entities count.
     */
    public function dataTablesCountFiltered(DataTablesWrapper $dtWrapper);

    /**
     * Count all entities.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return integer Returns the total count.
     */
    public function dataTablesCountTotal(DataTablesWrapper $dtWrapper);

    /**
     * Find entities.
     *
     * @param DataTablesWrapper $dtWrapper The DataTables wrapper.
     * @return array Returns the entities.
     */
    public function dataTablesFind(DataTablesWrapper $dtWrapper);
}