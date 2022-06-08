<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IPartnerRepository;
use App\Models\Partner;

class PartnerRepository extends BaseRepository implements IPartnerRepository
{

    public function model()
    {
        return Partner::class;
    }

}
