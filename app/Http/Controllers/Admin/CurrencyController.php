<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
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

//        dd($stage_2);
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


    public function updateStage0(Request $request)
    {

        try {

            $data = $this->requestData;

            $stage_0 = $this->currencyRepository->getByStage(0);
            $data['stage'] = 0;

            $validator_rules = [
                'stage' => 'required',
                'name' => 'required',
                'price' => 'required|numeric',
            ];

            $validator = Validator::make($data, $validator_rules);

            if ($validator->passes()) {

                if ($stage_0) {
                    $model = $this->currencyRepository->update($data, $stage_0->id);

                } else {
                    $model = $this->currencyRepository->create($data);

                }
                return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS));
            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return JsonResponse::respondError($errorExpoString);

        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());

        }
    }


    public function updateStage1(Request $request)
    {

        try {

            $data = $this->requestData;
            $data_stage_1['link'] = $data['link_stage_1'];
            $data_stage_1['desc'] = $data['desc_stage_1'];
            $data_stage_1['stage'] = 1;

            $stage_1 = $this->currencyRepository->getByStage(1);

            if ($request->file('image_stage_1')) {
                $img = $request->file('image_stage_1');
                $name = "currencyPhotoStage1_" . time() . '_' . $img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/images/currency/1/'), $name);
                $path = 'images/images/currency/1/' . $name;

                $data_stage_1['image'] = $path;
            } else {
                $data_stage_1['image'] = isset($stage_1->image) ? $stage_1->image : '';

            }

            $validator_rules = [
                'stage' => 'required',
                'desc' => 'required',
                'image' => 'required',
            ];

            $validator = Validator::make($data_stage_1, $validator_rules);

            if ($validator->passes()) {

                if ($stage_1) {
                    $model = $this->currencyRepository->update($data_stage_1, $stage_1->id);

                } else {
                    $model = $this->currencyRepository->create($data_stage_1);

                }
                return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS));
            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return JsonResponse::respondError($errorExpoString);

        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());

        }
    }

    public function updateStage2(Request $request)
    {

        try {

            $data = $this->requestData;
            $data_stage_2['link'] = $data['link_stage_2'];
            $data_stage_2['desc'] = $data['desc_stage_2'];
            $data_stage_2['stage'] = 2;

            $stage_2 = $this->currencyRepository->getByStage(2);

            if ($request->file('image_stage_2')) {
                $img = $request->file('image_stage_2');
                $name = "currencyPhotoStage2_" . time() . '_' . $img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/images/currency/2/'), $name);
                $path = 'images/images/currency/2/' . $name;

                $data_stage_2['image'] = $path;
            } else {
                $data_stage_2['image'] = isset($stage_2->image) ? $stage_2->image : '';

            }

            $validator_rules = [
                'stage' => 'required',
                'desc' => 'required',
                'image' => 'required',
            ];

            $validator = Validator::make($data_stage_2, $validator_rules);

            if ($validator->passes()) {

                if ($stage_2) {
                    $model = $this->currencyRepository->update($data_stage_2, $stage_2->id);

                } else {
                    $model = $this->currencyRepository->create($data_stage_2);

                }
                return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS));
            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return JsonResponse::respondError($errorExpoString);

        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());

        }
    }


    public function updateStage3(Request $request)
    {

        try {

            $data = $this->requestData;
            $data_stage_3['link'] = $data['link_stage_3'];
            $data_stage_3['desc'] = $data['desc_stage_3'];
            $data_stage_3['stage'] = 3;

            $stage_3 = $this->currencyRepository->getByStage(3);

            if ($request->file('image_stage_3')) {
                $img = $request->file('image_stage_3');
                $name = "currencyPhotoStage3_" . time() . '_' . $img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/images/currency/3/'), $name);
                $path = 'images/images/currency/3/' . $name;

                $data_stage_3['image'] = $path;
            } else {
                $data_stage_3['image'] = isset($stage_3->image) ? $stage_3->image : '';

            }

            $validator_rules = [
                'stage' => 'required',
                'desc' => 'required',
                'image' => 'required',
            ];

            $validator = Validator::make($data_stage_3, $validator_rules);

            if ($validator->passes()) {

                if ($stage_3) {
                    $model = $this->currencyRepository->update($data_stage_3, $stage_3->id);

                } else {
                    $model = $this->currencyRepository->create($data_stage_3);

                }
                return redirect()->route('admin-currency')->with('message', trans('currencies/currencies.stage3_updated_successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-currency')->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-currency')->with('error', $e->getMessage());

        }
    }

}
