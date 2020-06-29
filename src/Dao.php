<?php
namespace Exinfinite;

class Dao implements \Iterator {
    private $props = [];
    function __construct(Array $args = []) {
        $this->set($args);
    }
    function __get($name) {
        return $this->get($name);
    }
    function __set($name, $value) {
        $this->props[$name] = $value;
    }
    function set(Array $args = []) {
        foreach ($args as $name => $value) {
            $this->props[$name] = $value;
        }
    }
    function get($name, $dft = null) {
        return $this->exists($name)
        ? $this->props[$name]
        : $dft;
    }
    function exists($name) {
        return array_key_exists($name, $this->props);
    }
    function dump() {
        return $this->props;
    }
    function rewind() {
        reset($this->props);
    }
    function valid() {
        return current($this->props) ? true : false;
    }
    function current() {
        return current($this->props);
    }
    function key() {
        return key($this->props);
    }
    function next() {
        next($this->props);
    }
}
?>