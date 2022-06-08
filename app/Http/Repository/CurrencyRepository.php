<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ICurrencyRepository;
use App\Models\Currency;

class CurrencyRepository extends BaseRepository implements ICurrencyRepository
{

    public function model()
    {
        return Currency::class;
    }

    public function getByStage($stage)
    {
        try {


            $setting = $this->model
                ->where('stage', $stage)
                ->first();

            return $setting;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }
}
