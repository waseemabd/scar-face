<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IFeatureRepository;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    //

    protected $featureRepository;
    protected $requestData;


    public function __construct(IFeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['name' => trans('locale.Features')]
        ];



        return view('/content/custom-pages/admin/features/features', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
            ]
        );
    }

    public function getAllFeatures()
    {
        try {

            $features = $this->featureRepository->all();

            $res = [];
            foreach ($features as $feature) {
                $feature['responsive'] = '';
                array_push($res, $feature);
            }
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_SUCCESS), $res);
        } catch (\Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function create()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['link' => "/admin/features", 'name' => trans('locale.Features')], ['name' => trans('features/features.add_new_feature')]
        ];



        return view('/content/custom-pages/admin/features/add-feature', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $data = $this->requestData;

//            dd($data);

            if ($request->file('image')) {
                $img = $request->file('image');
                $name = "featurePhoto_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/features/'), $name);
                $path = '/images/features/' . $name;

                $data['image'] = $path;
            }



            $validator = Validator::make($data, $validator_rules = Feature::create_update_rules);

            if ($validator->passes()) {

                $ad = $this->featureRepository->create($data);

                return redirect()->route('admin-features')->with('message', trans('features/features.Feature_Added_Successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-create-feature')->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-create-feature')->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['link' => "/admin/features", 'name' => trans('locale.Features')], ['name' => trans('features/features.edit_feature')]
        ];

        $feature = $this->featureRepository->find($id);


        return view('/content/custom-pages/admin/features/edit-feature', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'feature' => $feature,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $data = $this->requestData;

            $feature = $this->featureRepository->find($id);

            if ($request->file('image')) {
                $img = $request->file('image');
                $name = "featurePhoto_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/features/'), $name);
                $path = '/images/features/' . $name;

                $data['image'] = $path;
            }else{
                $data['image'] = $feature->image;

            }




            $validator = Validator::make($data, $validator_rules = Feature::create_update_rules);

            if ($validator->passes()) {

                $ad = $this->featureRepository->update($data, $id);

                return redirect()->route('admin-features')->with('message', trans('features/features.Feature_Updated_Successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-edit-feature', $id)->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-edit-feature', $id)->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $this->featureRepository->delete($id);

            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
}
