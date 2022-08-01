<?php

namespace App\Intefraces;

interface ResponseInterface
{
    /**
     * Returns an array of ship arrays, each with the following keys:
     *
     * @return array
     */
    public function fetchAllShipsData();
    /**
     * Returns the single ship array for this id (see fetchAllShipsData)
     *
     * @param integer $id
     * @return array
     */
    public function fetchSingleShipData($id);
}