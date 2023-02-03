<?php

class Connection
{
    public static function make(array $config)
    {
        try {
            return new PDO(
                $config['connection'].";dbname=".$config['database'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
}
