<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IPlanRepository;
use App\Models\Plan;

class PlanRepository extends BaseRepository implements IPlanRepository
{

    public function model()
    {
        return Plan::class;
    }

}
