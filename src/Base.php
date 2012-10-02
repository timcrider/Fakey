<?php
/**
* Base class
*
* Quick and easy generic object that is more E_NOTICE friendly than normal.
*
* @author Timothy M. Crider <timcrider@gmail.com>
*/
class Base extends stdClass {
    /**
    * Make this object more E_NOTICE friendly
    *
    * @param string $var Variable Name
    * @return mixed Stored variable or NULL
    */
    public function __get($var) {
        return (isset($this->$var)) ? $this->$var : NULL;
    }

    /**
    * Allow attaching methods to the base object
    *
    * @param string $key Method Name
    * @param array $params Method Parameters
    * @return mixed Method result
    */
    public function __call($key, $params) {
        if (!isset($this->{$key}) || !is_callable(array($this, $key))) {
            throw new Zend_Exception("Call to undefined method ".get_class()."::{$key}");
        }

        $method = $this->{$key};
        return call_user_func_array($method, $params);
    }
}
