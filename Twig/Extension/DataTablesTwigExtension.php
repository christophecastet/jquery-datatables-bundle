<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension;

use Twig_SimpleFunction;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Library\Core\Utility\Argument\ArrayUtility;
use WBW\Library\Core\Utility\Argument\StringUtility;

/**
 * DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 */
class DataTablesTwigExtension extends AbstractDataTablesTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.bundle.datatablesbundle.twig.extension.datatables";

    /**
     * Directory.
     *
     * @var string
     */
    const JS_TEMPLATE = "<script type=\"text/javascript\">
\t$('__selector__').DataTable({
\t\tajax: {
\t\t\ttype: '__method__',
\t\t\turl: '__url__'
\t\t},
\t\tcolumns: __columns__,
\t\torder: __order__,
\t\tprocessing: __processing__,
\t\tserverSide: __serverSide__
\t});
</script>";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Displays a DataTables HTML.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the DataTables HTML.
     */
    public function dataTablesHTMLFunction(DataTablesWrapper $dtWrapper, array $args = []) {
        return $this->dataTablesTable($dtWrapper, ArrayUtility::get($args, "class"), ArrayUtility::get($args, "thead", true), ArrayUtility::get($args, "tfoot", true));
    }

    /**
     * Diplays a DataTables JS.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @param array $args The arguments.
     * @return string Returns the DataTables JS.
     */
    public function dataTablesJSFunction(DataTablesWrapper $dtWrapper, array $args = []) {

        // Initialize the parameters.
        $selector   = ArrayUtility::get($args, "selector", ".table");
        $method     = $dtWrapper->getMethod();
        $url        = $dtWrapper->getUrl();
        $columns    = json_encode(array_values($dtWrapper->getColumns()));
        $orders     = json_encode(array_values($dtWrapper->getOrder()));
        $processing = StringUtility::parseBoolean($dtWrapper->getProcessing());
        $serverSide = StringUtility::parseBoolean($dtWrapper->getServerSide());

        // Return the Javascript.
        return StringUtility::replace(self::JS_TEMPLATE, ["__selector__", "__method__", "__url__", "__columns__", "__order__", "__processing__", "__serverSide__"], [$selector, $method, $url, $columns, $orders, $processing, $serverSide]);
    }

    /**
     * Get the Twig functions.
     *
     * @return array Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction("dataTablesHTML", [$this, "dataTablesHTMLFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("dataTablesJS", [$this, "dataTablesJSFunction"], ["is_safe" => ["html"]]),
        ];
    }

}