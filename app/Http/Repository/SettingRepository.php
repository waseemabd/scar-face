<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ISettingRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository implements ISettingRepository
{

    public function model()
    {
        return Setting::class;
    }

    public function getSettingForAdmin($type)
    {
        try {


            $setting = $this->model
                ->where('type', $type)
                ->first();

            return $setting;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }
}
