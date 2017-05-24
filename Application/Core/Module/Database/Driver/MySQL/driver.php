<?php

namespace Core\Module\Database;

use Core\Interfaces\DataBaseInterface;

/**
 * Class MySQL_Database
 */
class MySQL_Database implements DataBaseInterface
{
    /**
     * @var
     */
    private $connection;

    /**
     * @var
     */
    public $last_query;

    /**
     * @var int
     */
    private $magic_quotes_active;

    /**
     * @var bool
     */
    private $real_escape_string_exists;

    /**
     * @var array
     */
    public $config;

    /**
     * MySQL_Database constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->open_connection();
        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists("mysqli_real_escape_string");

    }

    /**
     *
     */
    public function open_connection()
    {
        $this->connection = mysqli_connect($this->config['host'], $this->config['user'], $this->config['password']);
        if (!$this->connection) {
            throw new \Exception("Database connection failed: " . mysqli_error($this->connection));
        } else {
            // 2. Select a database to use
            mysqli_set_charset($this->connection, $this->config['charset']);
            $db_select = mysqli_select_db($this->connection, $this->config['database']);
            if (!$db_select) {
                throw new \Exception("Database selection failed: " . mysqli_error($this->connection));
            }
        }
    }

    /**
     *
     */
    public function close_connection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function query($sql)
    {
        $this->last_query = $sql;
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);

        return $result;
    }

    /**
     * @param $value
     * @return string
     */
    public function escape_value($value)
    {
        // i.e. PHP >= v4.3.0
        $value = htmlspecialchars(trim($value));
        if ($this->real_escape_string_exists) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysqli_real_escape_string can do the work
            if ($this->magic_quotes_active) {
                $value = stripslashes($value);
            }
            $value = mysqli_real_escape_string($this->connection, $value);
        } else { // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manualy
            if (!$this->magic_quotes_active) {
                $value = addslashes($value);
            }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }

    /**
     * @param $result_set
     * @return array|null
     */
    public function fetch_array($result_set)
    {
        return mysqli_fetch_array($result_set);
    }

    /**
     * @param $result_set
     * @return int
     */
    public function num_rows($result_set)
    {
        return mysqli_num_rows($result_set);
    }

    /**
     * @return int|string
     */
    public function insert_id()
    {
        // get the last id inserted over the current db connection
        return mysqli_insert_id($this->connection);
    }

    /**
     * @return int
     */
    public function affected_rows()
    {
        return mysqli_affected_rows($this->connection);
    }

    /**
     * @param $result
     * @return string
     */
    final public function confirm_query($result)
    {
        if (!$result) {
            $output = "Database query failed: " . mysqli_error($this->connection) . "<br />";
            $output .= "Last SQL query: " . $this->last_query;
            return ($output);
        }
    }

}
