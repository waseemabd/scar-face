<?php


namespace App\Http\IRepositories;


interface ICurrencyRepository
{
    public function getByStage($stage);
}
