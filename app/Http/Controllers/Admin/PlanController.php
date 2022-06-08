<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Mapper;
use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IPlanRepository;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    //
    protected $planRepository;
    protected $requestData;


    public function __construct(IPlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['name' => trans('locale.Plan')]
        ];

        $plan = $this->planRepository->first();

        return view('/content/custom-pages/admin/plans/plans', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'plan' => $plan
            ]
        );
    }

    public function update(Request $request)
    {

        try {

            $data= $this->requestData;
            $plan = $this->planRepository->first();


            $validator = Validator::make($data, $validator_rules = Plan::create_update_rules, ValidatorHelper::messages() );

            if($validator->passes()){

                if($plan){
                    $model = $this->planRepository->update($data,$plan->id);

                }else{
                    $model = $this->planRepository->create($data);

                }
                return redirect()->route('admin-plan')->with('message', trans('plans/plans.plan_updated_successfully') );

            }
            $errorExpoString = implode(",",$validator->errors()->all());
            return redirect()->route('admin-plan')->with('error', $errorExpoString);

        }catch (\Exception $e){
            return redirect()->route('admin-plan')->with('error', $e->getMessage());

        }
    }

}
