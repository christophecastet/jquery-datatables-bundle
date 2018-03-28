<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\Entity;

use DateTime;

/**
 * Employee.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\Entity
 */
class Employee {

    /**
     * Age.
     *
     * @var integer
     */
    private $age;

    /**
     * Id.
     *
     * @var integer
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Office.
     *
     * @var string
     */
    private $office;

    /**
     * Position.
     *
     * @var string
     */
    private $position;

    /**
     * Salary.
     *
     * @var integer
     */
    private $salary;

    /**
     * Start date.
     *
     * @var DateTime
     */
    private $startDate;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the age.
     *
     * @return integer Returns the age.
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Get the id.
     *
     * @return integer Returns the id.
     */
    public function getId() {
        return $this->id;
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
     * Get the office.
     *
     * @return string Returns the office.
     */
    public function getOffice() {
        return $this->office;
    }

    /**
     * Get the position.
     *
     * @return string Returns the position.
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Get the salary.
     *
     * @return integer Returns the salary.
     */
    public function getSalary() {
        return $this->salary;
    }

    /**
     * Get the start date.
     *
     * @return DateTime Returns the start date.
     */
    public function getStartDate() {
        return $this->startDate;
    }

    /**
     * Set the age.
     *
     * @param integer $age The age.
     * @return Employee Returns the employee.
     */
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return Employee Returns the employee.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the office.
     *
     * @param string $office The office.
     * @return Employee Returns the employee.
     */
    public function setOffice($office) {
        $this->office = $office;
        return $this;
    }

    /**
     * Set the position.
     *
     * @param string $position The position.
     * @return Employee Returns the employee.
     */
    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    /**
     * Set the salary.
     *
     * @param integer $salary The salary.
     * @return Employee Returns the employee.
     */
    public function setSalary($salary) {
        $this->salary = $salary;
        return $this;
    }

    /**
     * Set the start date.
     *
     * @param DateTime $startDate The start date.
     * @return Employee Returns the employee.
     */
    public function setStartDate($startDate) {
        $this->startDate = $startDate;
        return $this;
    }

}
