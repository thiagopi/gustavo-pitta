<?php
/**
 * @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
 * @date        2019-05-31
 * @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
 * @license     MIT public license
 */

namespace App\Models;

class Model{

    protected $collection = 'table or schema or whatever';

    /**
     * @param $record
     * @return string
     */
    public function create($record){}

    /**
     * @param $filter
     * @param $parameters
     * @return array
     */
    public function read($filter, $parameters){}

    /**
     * @param $record
     * @return int
     */
    public function update($record){}

    /**
     * @param $record
     * @return bool
     */
    public function destroy($record){}

    
}