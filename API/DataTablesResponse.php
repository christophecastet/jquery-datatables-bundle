<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use JsonSerializable;

/**
 * DataTables response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesResponse implements DataTablesResponseInterface, JsonSerializable {

    /**
     * Data.
     *
     * @var array
     */
    private $data;

    /**
     * Draw.
     *
     * @var int
     */
    private $draw;

    /**
     * Error.
     *
     * @var string
     */
    private $error;

    /**
     * Records filtered.
     *
     * @var int
     */
    private $recordsFiltered;

    /**
     * Records total.
     *
     * @var int
     */
    private $recordsTotal;

    /**
     * Wrapper.
     *
     * @var DataTablesWrapper
     */
    private $wrapper;

    /**
     * Constructor.
     */
    protected function __construct() {
        $this->setData([]);
        $this->setDraw(0);
        $this->setRecordsFiltered(0);
        $this->setRecordsTotal(0);
    }

    /**
     * Add a row.
     *
     * @return DataTablesResponse Returns this response.
     */
    public function addRow() {

        // Count the rows.
        $index = $this->countRows();

        // Add a new row.
        $this->data[] = [];

        // Set each column data in the new row.
        foreach ($this->wrapper->getColumns() as $dtColumn) {
            $this->data[$index][$dtColumn->getData()] = null;
        }

        return $this;
    }

    /**
     * Count rows.
     *
     * @return int Returns the rows count.
     */
    public function countRows() {
        return count($this->data);
    }

    /**
     * DataTables rows.
     *
     * @return array Returns the rows.
     */
    public static function dtRows() {
        return [
            self::DATATABLES_ROW_ATTR,
            self::DATATABLES_ROW_CLASS,
            self::DATATABLES_ROW_DATA,
            self::DATATABLES_ROW_ID,
        ];
    }

    /**
     * Get the data.
     *
     * @return array Returns the data.
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Get the draw
     *
     * @return int Returns the draw.
     */
    public function getDraw() {
        return $this->draw;
    }

    /**
     * Get the error.
     *
     * @return string Returns the error.
     */
    public function getError() {
        return $this->error;
    }

    /**
     * Get the records filtered.
     *
     * @return int The records filtered.
     */
    public function getRecordsFiltered() {
        return $this->recordsFiltered;
    }

    /**
     * Get the records total.
     *
     * @return int Returns the records total.
     */
    public function getRecordsTotal() {
        return $this->recordsTotal;
    }

    /**
     * Get the wrapper.
     *
     * @return DataTablesWrapper Returns the wrapper.
     */
    public function getWrapper() {
        return $this->wrapper;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() {
        return $this->toArray();
    }

    /**
     * Create a response instance.
     *
     * @param DataTablesWrapper $wrapper The wrapper.
     * @param DataTablesRequest $request The request.
     * @return DataTablesResponse Returns the response.
     */
    public static function parse(DataTablesWrapper $wrapper, DataTablesRequest $request) {

        // Initialize a response.
        $dtResponse = new DataTablesResponse();
        $dtResponse->setDraw($request->getDraw());
        $dtResponse->setWrapper($wrapper);

        // Return the response.
        return $dtResponse;
    }

    /**
     * Set the data.
     *
     * @param array $data The data.
     * @return DataTablesResponse Returns this response.
     */
    protected function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the draw.
     *
     * @param int $draw The draw.
     * @return DataTablesResponse Returns the response.
     */
    protected function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * Set the error.
     *
     * @param string $error The error.
     * @return DataTablesResponse Returns this response.
     */
    public function setError($error) {
        $this->error = $error;
        return $this;
    }

    /**
     * Set the records filtered.
     *
     * @param int $recordsFiltered The records filtered.
     * @return DataTablesResponse Returns this response.
     */
    public function setRecordsFiltered($recordsFiltered) {
        $this->recordsFiltered = $recordsFiltered;
        return $this;
    }

    /**
     * Set the records total.
     *
     * @param int $recordsTotal The records total.
     * @return DataTablesResponse Returns this response.
     */
    public function setRecordsTotal($recordsTotal) {
        $this->recordsTotal = $recordsTotal;
        return $this;
    }

    /**
     * Set a row value.
     *
     * @param string $data The column data.
     * @param string $value The column value.
     * @return DataTablesResponse Returns this response.
     */
    public function setRow($data, $value) {

        // Count the rows.
        $index = $this->countRows() - 1;

        // Check the column data.
        if ((true === in_array($data, static::dtRows()) && null !== $value) || (true === in_array($data, array_keys($this->data[$index])))) {
            $this->data[$index][$data] = $value;
        }

        // Returns the response.
        return $this;
    }

    /**
     * Set the wrapper.
     *
     * @param DataTablesWrapper $wrapper The wrapper.
     * @return DataTablesResponse Returns this response.
     */
    protected function setWrapper(DataTablesWrapper $wrapper) {
        $this->wrapper = $wrapper;
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function toArray() {

        // Initialize the output.
        $output = [];

        $output["data"]            = $this->data;
        $output["draw"]            = $this->draw;
        $output["recordsFiltered"] = $this->recordsFiltered;
        $output["recordsTotal"]    = $this->recordsTotal;

        // Return the output.
        return $output;
    }

}
