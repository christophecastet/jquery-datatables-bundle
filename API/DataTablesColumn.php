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
use WBW\Library\Core\Utility\Argument\ArrayUtility;

/**
 * DataTables column.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesColumn implements JsonSerializable {

    /**
     * Cell type.
     *
     * @var string
     */
    private $cellType;

    /**
     * Class name.
     *
     * @var string
     */
    private $classname;

    /**
     * Content padding.
     *
     * @var string
     */
    private $contentPadding;

    /**
     * Data.
     *
     * @var integer|string
     */
    private $data;

    /**
     * Default content.
     *
     * @var string
     */
    private $defaultContent;

    /**
     * mapping.
     *
     * @var DataTablesMapping
     */
    private $mapping;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Order data.
     *
     * @var integer|array
     */
    private $orderData;

    /**
     * Order data type.
     *
     * @var string
     */
    private $orderDataType;

    /**
     * Order sequence.
     *
     * @var string
     */
    private $orderSequence;

    /**
     * Orderable.
     *
     * @var boolean
     */
    private $orderable;

    /**
     * Search.
     *
     * @var DataTablesSearch
     */
    private $search;

    /**
     * Searchable.
     *
     * @var boolean
     */
    private $searchable;

    /**
     * Title.
     *
     * @var string
     */
    private $title;

    /**
     * Type.
     *
     * @var string
     */
    private $type;

    /**
     * Visible.
     *
     * @var boolean
     */
    private $visible;

    /**
     * Width.
     *
     * @var string
     */
    private $width;

    /**
     * Constructor.
     */
    protected function __construct() {
        $this->setCellType("td");
        $this->setMapping(new DataTablesMapping());
        $this->setOrderable(true);
        $this->setSearchable(true);
        $this->setVisible(true);
    }

    /**
     * Get the cell type.
     *
     * @return string Returns the cell type.
     */
    public function getCellType() {
        return $this->cellType;
    }

    /**
     * Get the class name.
     *
     * @return string Returns the class name.
     */
    public function getClassname() {
        return $this->classname;
    }

    /**
     * Get the content padding.
     *
     * @return string Returns the content padding.
     */
    public function getContentPadding() {
        return $this->contentPadding;
    }

    /**
     * Get the data.
     *
     * @return integer|string Returns the data.
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Get the default content
     *
     * @return string Returns the default content.
     */
    public function getDefaultContent() {
        return $this->defaultContent;
    }

    /**
     * Get the mapping.
     *
     * @return DataTablesMapping The mapping.
     */
    public function getMapping() {
        return $this->mapping;
    }

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the order data.
     *
     * @return integer|array Returns the order data.
     */
    public function getOrderData() {
        return $this->orderData;
    }

    /**
     * Get the order data type.
     *
     * @return string Returns the order data type.
     */
    public function getOrderDataType() {
        return $this->orderDataType;
    }

    /**
     * Get the order sequence.
     *
     * @return string Returns the order sequence.
     */
    public function getOrderSequence() {
        return $this->orderSequence;
    }

    /**
     * Get the orderable.
     *
     * @return boolean Returns the orderable.
     */
    public function getOrderable() {
        return $this->orderable;
    }

    /**
     * Get the search.
     *
     * @return DataTablesSearch Returns the search.
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * Get the searchable.
     *
     * @return boolean Returns the searchable.
     */
    public function getSearchable() {
        return $this->searchable;
    }

    /**
     * Get the title.
     *
     * @return string Returns the title.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Get the visible.
     *
     * @return boolean Returns the visible.
     */
    public function getVisible() {
        return $this->visible;
    }

    /**
     * Get the width.
     *
     * @return string Returns the width.
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() {
        return $this->toArray();
    }

    /**
     * Create a DataTables column instance.
     *
     * @param string $data The column data.
     * @param string $name The column name.
     * @param string $cellType The column cell type.
     * @return DataTablesColumn Returns a DataTables column.
     */
    public static function newInstance($data, $name, $cellType = "td") {

        // Initialize a DataTables column.
        $dtColumn = new DataTablesColumn();
        $dtColumn->setCellType($cellType);
        $dtColumn->setData($data);
        $dtColumn->setName($name);
        $dtColumn->setTitle($name);
        $dtColumn->mapping->setColumn($data);

        // Return the DataTables column.
        return $dtColumn;
    }

    /**
     * Parse a raw columns array.
     *
     * @param array $rawColumns The raw columns array.
     * @param DataTablesWrapper $wrapper The wrapper.
     * @return DataTablesColumn[] Returns the DataTables columns.
     */
    public static function parse(array $rawColumns, DataTablesWrapper $wrapper) {

        // Initialize the DataTables columns.
        $dtColumns = [];

        // Handle each column.
        foreach ($rawColumns as $current) {

            // Get the DataTables column.
            $dtColumn = $wrapper->getColumn($current["data"]);

            // Check the DataTables column.
            if (null === $dtColumn) {
                continue;
            }
            if ($current["name"] !== $dtColumn->getName()) {
                continue;
            }
            if (false === $dtColumn->getSearchable()) {
                $dtColumn->setSearch(DataTablesSearch::parse([])); // Set a default DataTables search.
                continue;
            }

            // Set the DataTables search.
            $dtColumn->setSearch(DataTablesSearch::parse($current["search"]));

            // Add the DataTables columns.
            $dtColumns[] = $dtColumn;
        }

        // Returns the DataTables columns.
        return $dtColumns;
    }

    /**
     * Set the cell type.
     *
     * @param string $cellType The cell type.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setCellType($cellType) {
        $this->cellType = (true === in_array($cellType, ["td", "th"]) ? $cellType : "td");
        return $this;
    }

    /**
     * Set the class name.
     *
     * @param string $classname The class name.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setClassname($classname) {
        $this->classname = $classname;
        return $this;
    }

    /**
     * Set the content padding.
     *
     * @param string $contentPadding The content padding.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setContentPadding($contentPadding) {
        $this->contentPadding = $contentPadding;
        return $this;
    }

    /**
     * Set the data.
     *
     * @param integer|string $data The data.
     * @return DataTablesColumn Returns this DataTables column.
     */
    protected function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the default content.
     *
     * @param string $defaultContent The default content.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setDefaultContent($defaultContent) {
        $this->defaultContent = $defaultContent;
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMapping $mapping The mapping.
     * @return DataTablesColumn Returns this DataTables column.
     */
    protected function setMapping(DataTablesMapping $mapping) {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the order data.
     *
     * @param integer|array $orderData The order data.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setOrderData($orderData) {
        $this->orderData = $orderData;
        return $this;
    }

    /**
     * Set the order data type.
     *
     * @param string $orderDataType The order data type.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setOrderDataType($orderDataType) {
        $this->orderDataType = $orderDataType;
        return $this;
    }

    /**
     * Set the order sequence.
     *
     * @param string $orderSequence The order sequence.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setOrderSequence($orderSequence) {
        $this->orderSequence = (true === in_array($orderSequence, ["asc", "desc"]) ? $orderSequence : null);
        return $this;
    }

    /**
     * Set the orderable.
     *
     * @param boolean $orderable The orderable.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearch $search The search.
     * @return DataTablesColumn Returns this DataTables column.
     */
    protected function setSearch(DataTablesSearch $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the searchable.
     *
     * @param boolean $searchable The searchable.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setType($type) {
        $this->type = (true === in_array($type, ["date", "num", "num-fmt", "html", "html-num", "string"]) ? $type : null);
        return $this;
    }

    /**
     * Set the visible.
     *
     * @param boolean $visible The visible.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    /**
     * Set the width.
     *
     * @param string $width The width.
     * @return DataTablesColumn Returns this DataTables column.
     */
    public function setWidth($width) {
        $this->width = $width;
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

        ArrayUtility::set($output, "cellType", $this->cellType, [null]);
        ArrayUtility::set($output, "classname", $this->classname, [null]);
        ArrayUtility::set($output, "contentPadding", $this->contentPadding, [null]);
        ArrayUtility::set($output, "data", $this->data, [null]);
        ArrayUtility::set($output, "defaultContent", $this->defaultContent, [null]);
        ArrayUtility::set($output, "name", $this->name, [null]);
        ArrayUtility::set($output, "orderable", $this->orderable, [null, true]);
        ArrayUtility::set($output, "orderData", $this->orderData, [null]);
        ArrayUtility::set($output, "orderDataType", $this->orderDataType, [null]);
        ArrayUtility::set($output, "orderSequence", $this->orderSequence, [null]);
        ArrayUtility::set($output, "searchable", $this->searchable, [null, true]);
        ArrayUtility::set($output, "type", $this->type, [null]);
        ArrayUtility::set($output, "visible", $this->visible, [null, true]);
        ArrayUtility::set($output, "width", $this->width, [null]);

        // Return the output.
        return $output;
    }

}