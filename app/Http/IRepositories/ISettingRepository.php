<?php


namespace App\Http\IRepositories;


interface ISettingRepository
{
    public function getSettingForAdmin($type);
}
