<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ISettingRepository;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ValidatorHelper;


class SettingController extends Controller
{
    //
    protected $settingRepository;
    protected $requestData;


    public function __construct(ISettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['name' => trans('locale.Settings')]
        ];

        $social = $this->settingRepository->getSettingForAdmin('social');
        $paper = $this->settingRepository->getSettingForAdmin('paper');
        $contacts = $this->settingRepository->getSettingForAdmin('contact');


        $contact_phones = json_decode($contacts['phones']) ? json_decode($contacts['phones']) : [];


        return view('/content/custom-pages/admin/settings/settings', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'social' => $social,
                'paper' => $paper,
                'contacts' => $contacts,
                'contact_phones' => $contact_phones,
            ]
        );
    }


    public function updateSocial(Request $request)
    {

        try {

            $data= $this->requestData;
            $about = $this->settingRepository->getSettingForAdmin('social');

            $data['type'] = 'social';



            $validator = Validator::make($data, $validator_rules = Setting::create_update_rules );

            if($validator->passes()){

                if($about){
                    $model = $this->settingRepository->update($data,$about->id);

                }else{
                    $model = $this->settingRepository->create($data);

                }
                return redirect()->route('admin-settings')->with('message', trans('settings/settings.social_updated_successfully') );

            }
            $errorExpoString = implode(",",$validator->errors()->all());
            return redirect()->route('admin-settings')->with('error', $errorExpoString);

        }catch (\Exception $e){
            return redirect()->route('admin-settings')->with('error', $e->getMessage());

        }
    }

    public function updatePaper(Request $request)
    {

        try {

            $data= $this->requestData;
            $paper= $this->settingRepository->getSettingForAdmin('paper');

            $data['type'] = 'paper';



            $validator = Validator::make($data, $validator_rules = Setting::create_update_rules );

            if($validator->passes()){

                if($paper){
                    $model = $this->settingRepository->update($data,$paper->id);

                }else{
                    $model = $this->settingRepository->create($data);

                }
                return redirect()->route('admin-settings')->with('message', trans('settings/settings.paper_updated_successfully') );

            }
            $errorExpoString = implode(",",$validator->errors()->all());
            return redirect()->route('admin-settings')->with('error', $errorExpoString);

        }catch (\Exception $e){
            return redirect()->route('admin-settings')->with('error', $e->getMessage());

        }
    }

    public function updateContacts(Request $request)
    {

        try {

            $data_info= $this->requestData;
            $contacts = $this->settingRepository->getSettingForAdmin('contact');
            $data['type'] = 'contact';

            $data['email'] = $data_info['email'];


            $phones_data =isset($data_info['phones'])?  $data_info['phones']: [];
//            dd($phones_data);

            $phones = [];
            foreach ($phones_data as $phone ){

                if($phone['phone']){

                    array_push($phones, $phone['phone']);
                }
            }
            $data['phones'] = isset($phones_data)?json_encode($phones):[];

            $validator_rules = [
                'type' => 'required'
            ];

            $validator = Validator::make($data, $validator_rules );

            if($validator->passes()){

                if($contacts){
                    $model = $this->settingRepository->update($data,$contacts->id);

                }else{
                    $model = $this->settingRepository->create($data);

                }
                return redirect()->route('admin-settings')->with('message', trans('settings/settings.contacts_updated_successfully') );

            }
            $errorExpoString = implode(",",$validator->errors()->all());
            return redirect()->route('admin-settings')->with('error', $errorExpoString);

        }catch (\Exception $e){
            return redirect()->route('admin-settings')->with('error', $e->getMessage());

        }
    }


}
