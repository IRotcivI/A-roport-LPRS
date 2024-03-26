<?php
class Database
{
    private $bdd;

    /**
     * @param $bdd
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost:3307;dbname=lprs_aeroport;charset=utf8', 'root', '');
    }

    public function getBdd()
    {
        return $this->bdd;
    }

}