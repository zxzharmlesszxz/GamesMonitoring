<?php

/**
 * Class Database
 */
abstract class Database
{
    /**
     * @var
     */
    private $connection;
    /**
     * @var
     */
    private $config;
    /**
     * @var
     */
    public $last_query;

// Create a database connection function

    /**
     * @return mixed
     */
    abstract function open_connection();

// Close a database connection function

    /**
     * @return mixed
     */
    abstract function close_connection();

// Perform database query function

    /**
     * @param $sql
     * @return mixed
     */
    abstract function query($sql);

// prepare values

    /**
     * @param $value
     * @return mixed
     */
    abstract function escape_value($value);

// "database-neutral" methods	

    /**
     * @param $result_set
     * @return mixed
     */
    abstract function fetch_array($result_set);

    /**
     * @param $result_set
     * @return mixed
     */
    abstract function num_rows($result_set);

    /**
     * @return mixed
     */
    abstract function insert_id();

    /**
     * @return mixed
     */
    abstract function affected_rows();

// Confirm database query function

    /**
     * @param $result
     * @return mixed
     */
    abstract protected function confirm_query($result);
}
