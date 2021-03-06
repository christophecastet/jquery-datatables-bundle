<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use Symfony\Component\HttpFoundation\ParameterBag;
use WBW\Library\Core\Network\HTTP\HttpInterface;

/**
 * DataTables request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesRequest implements DataTablesRequestInterface, HttpInterface {

    use DataTablesWrapperTrait {
        setWrapper as public;
    }

    /**
     * Columns.
     *
     * @var DataTablesColumnInterface[]
     */
    private $columns;

    /**
     * Draw.
     *
     * @var int
     */
    private $draw;

    /**
     * Length.
     *
     * @var int
     */
    private $length;

    /**
     * Order.
     *
     * @var DataTablesOrderInterface[]
     */
    private $order;

    /**
     * Query.
     *
     * @var ParameterBag
     */
    private $query;

    /**
     * Request.
     *
     * @var ParameterBag
     */
    private $request;

    /**
     * Search.
     *
     * @var DataTablesSearchInterface
     */
    private $search;

    /**
     * Start.
     *
     * @var int
     */
    private $start;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setColumns([]);
        $this->setDraw(0);
        $this->setLength(10);
        $this->setOrder([]);
        $this->setQuery(new ParameterBag());
        $this->setRequest(new ParameterBag());
        $this->setStart(0);
    }

    /**
     * {@inheritDoc}
     */
    public function getColumn($data) {
        foreach ($this->columns as $current) {
            if ($data === $current->getData()) {
                return $current;
            }
        }
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * {@inheritDoc}
     */
    public function getDraw() {
        return $this->draw;
    }

    /**
     * {@inheritDoc}
     */
    public function getLength() {
        return $this->length;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuery() {
        return $this->query;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * {@inheritDoc}
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * {@inheritDoc}
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Set the columns.
     *
     * @param DataTablesColumnInterface[] $columns The columns.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setColumns(array $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param int $draw The draw.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the length.
     *
     * @param int $length The length.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the order.
     *
     * @param DataTablesOrderInterface[] $order The order.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setOrder(array $order) {
        $this->order = $order;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param ParameterBag $query The query.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setQuery(ParameterBag $query) {
        $this->query = $query;
        return $this;
    }

    /**
     * Set the request.
     *
     * @param ParameterBag $request The request.
     * @return DataTablesRequestInterface Returns this request.
     */
    protected function setRequest(ParameterBag $request) {
        $this->request = $request;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearchInterface $search The search.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setSearch(DataTablesSearchInterface $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the start.
     *
     * @param int $start The start.
     * @return DataTablesRequestInterface Returns this request.
     */
    public function setStart($start) {
        $this->start = $start;
        return $this;
    }
}
