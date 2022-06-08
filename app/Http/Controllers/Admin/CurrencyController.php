<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Mapper;
use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICurrencyRepository;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    //

    protected $currencyRepository;
    protected $requestData;


    public function __construct(ICurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['name' => trans('locale.Currency')]
        ];

        $stage_0 = $this->currencyRepository->getByStage(0);
        $stage_1 = $this->currencyRepository->getByStage(1);
        $stage_2 = $this->currencyRepository->getByStage(2);
        $stage_3 = $this->currencyRepository->getByStage(3);

        return view('/content/custom-pages/admin/currencies/currency-step', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'stage_0' => $stage_0,
                'stage_1' => $stage_1,
                'stage_2' => $stage_2,
                'stage_3' => $stage_3,
                ]
        );
    }


    public function update(Request $request)
    {

        try {

            $data= $this->requestData;
            dd($data);
            $currency = $this->currencyRepository->first();


            $validator = Validator::make($data, $validator_rules = Currency::create_update_rules, ValidatorHelper::messages() );

            if($validator->passes()){

                if($currency){
                    $model = $this->currencyRepository->update($data,$currency->id);

                }else{
                    $model = $this->currencyRepository->create($data);

                }
                return redirect()->route('admin-currency')->with('message', trans('currencies/currencies.currency_updated_successfully') );

            }
            $errorExpoString = implode(",",$validator->errors()->all());
            return redirect()->route('admin-currency')->with('error', $errorExpoString);

        }catch (\Exception $e){
            return redirect()->route('admin-currency')->with('error', $e->getMessage());

        }
    }

}
