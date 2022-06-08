<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IPartnerRepository;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    //

    protected $partnerRepository;
    protected $requestData;


    public function __construct(IPartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['name' => trans('locale.Partners')]
        ];



        return view('/content/custom-pages/admin/partners/partners', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
            ]
        );
    }

    public function getAllPartners()
    {
        try {

            $partners = $this->partnerRepository->all();

            $res = [];
            foreach ($partners as $partner) {
                $partner['responsive'] = '';
                array_push($res, $partner);
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
            ['link' => "/", 'name' => trans('locale.Home')], ['link' => "/admin/partners", 'name' => trans('locale.Partners')], ['name' => trans('partners/partners.add_new_partner')]
        ];



        return view('/content/custom-pages/admin/partners/add-partner', [
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

            if ($request->file('logo')) {
                $img = $request->file('logo');
                $name = "partnerPhoto_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/partners/'), $name);
                $path = '/images/partners/' . $name;

                $data['logo'] = $path;
            }



            $validator = Validator::make($data, $validator_rules = Partner::create_update_rules);

            if ($validator->passes()) {

                $ad = $this->partnerRepository->create($data);

                return redirect()->route('admin-partners')->with('message', trans('partners/partners.Partner_Added_Successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-create-partner')->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-create-partner')->with('error', $e->getMessage());
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
            ['link' => "/", 'name' => trans('locale.Home')], ['link' => "/admin/partners", 'name' => trans('locale.Partners')], ['name' => trans('partners/partners.edit_partner')]
        ];

        $partner = $this->partnerRepository->find($id);


        return view('/content/custom-pages/admin/partners/edit-partner', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'partner' => $partner,
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

            $partner = $this->partnerRepository->find($id);

            if ($request->file('logo')) {
                $img = $request->file('logo');
                $name = "partnerPhoto_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/partners/'), $name);
                $path = '/images/partners/' . $name;

                $data['logo'] = $path;
            }else{
                $data['logo'] = $partner->logo;

            }




            $validator = Validator::make($data, $validator_rules = Partner::create_update_rules);

            if ($validator->passes()) {

                $ad = $this->partnerRepository->update($data, $id);

                return redirect()->route('admin-partners')->with('message', trans('partners/partners.Partner_Updated_Successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-edit-partner', $id)->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-edit-partner', $id)->with('error', $e->getMessage());
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

            $this->partnerRepository->delete($id);

            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
}
