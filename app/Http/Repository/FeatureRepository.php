<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IFeatureRepository;
use App\Models\Feature;

class FeatureRepository extends BaseRepository implements IFeatureRepository
{

    public function model()
    {
        return Feature::class;
    }

}
