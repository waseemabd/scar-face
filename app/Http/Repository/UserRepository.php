<?php


namespace App\Http\Repository;
use App\Helpers\Constants;
use App\Helpers\Helper;
use App\Helpers\JsonResponse;
use App\Http\IRepositories\IUserRepository;
use App\Models\User;
use Illuminate\Support\Carbon;


class UserRepository extends BaseRepository implements IUserRepository
{

    public function model()
    {
        return User::class;
    }

}
