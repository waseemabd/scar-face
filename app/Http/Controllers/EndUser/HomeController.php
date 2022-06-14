<?php

namespace App\Http\Controllers\EndUser;

use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICurrencyRepository;
use App\Http\IRepositories\IFeatureRepository;
use App\Http\IRepositories\IImageRepository;
use App\Http\IRepositories\IPartnerRepository;
use App\Http\IRepositories\IPlanRepository;
use App\Http\IRepositories\ISettingRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    protected $currencyRepository;
    protected $imageRepository;
    protected $featureRepository;
    protected $partnerRepository;
    protected $planRepository;
    protected $settingRepository;
    protected $requestData;


    public function __construct(ICurrencyRepository $currencyRepository,
                                IImageRepository $imageRepository, IFeatureRepository $featureRepository,
                                IPartnerRepository $partnerRepository, IPlanRepository $planRepository,
                                ISettingRepository $settingRepository)
    {
        $this->currencyRepository = $currencyRepository;
        $this->imageRepository = $imageRepository;
        $this->featureRepository = $featureRepository;
        $this->partnerRepository = $partnerRepository;
        $this->planRepository = $planRepository;
        $this->settingRepository = $settingRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $currency_stage_0 = $this->currencyRepository->getByStage(0);
        $currency_stage_1 = $this->currencyRepository->getByStage(1);
        $currency_stage_2 = $this->currencyRepository->getByStage(2);
        $currency_stage_3 = $this->currencyRepository->getByStage(3);

        $features = $this->featureRepository->all();

        $features_arr = array_chunk($features->toArray(), 3);
//        $features_num = count($features);
//        $features_pages =floor( $features_num/3);
//        $features_rem = $features_num%3;
//
//        if($features_rem != 0){
//            $features_pages = $features_pages +1;
//        }

//        for ($i=0; $i<$features_pages; $i++){
//            dd($features[$i]);
//        }




        $images = $this->imageRepository->all();
        $partners = $this->partnerRepository->all();
        $plan = $this->planRepository->first();

        $settings_social = $this->settingRepository->getSettingForAdmin('social');
        $settings_paper = $this->settingRepository->getSettingForAdmin('paper');
        $settings_contacts = $this->settingRepository->getSettingForAdmin('contact');


        return view('/content/custom-pages/end-user/index', [
            'features' => $features,
            'features_arr' => $features_arr,
//            'features_rem' => $features_rem,
            'partners' => $partners,
            'images' => $images,
            'plan' => $plan,
            'settings_social' => $settings_social,
            'settings_paper' => $settings_paper,
            'settings_contacts' => $settings_contacts,

            'currency_stage_0' => $currency_stage_0,
            'currency_stage_1' => $currency_stage_1,
            'currency_stage_2' => $currency_stage_2,
            'currency_stage_3' => $currency_stage_3,
        ]);
    }
}
