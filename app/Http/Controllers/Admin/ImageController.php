<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IImageRepository;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    //

    protected $imageRepository;
    protected $requestData;


    public function __construct(IImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['name' => trans('locale.Images')]
        ];

        $images = $this->imageRepository->all();

        return view('/content/custom-pages/admin/images/images', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'images' => $images,
            ]
        );
    }


    public function create()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ['link' => "/", 'name' => trans('locale.Home')], ['link' => "/admin/images", 'name' => trans('locale.Images')], ['name' => trans('images/images.add_new_image')]
        ];



        return view('/content/custom-pages/admin/images/add-image', [
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
                $name = "imagePhoto_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/images/'), $name);
                $path = '/images/images/' . $name;

                $data['image'] = $path;
            }



            $validator = Validator::make($data, $validator_rules = Image::create_update_rules);

            if ($validator->passes()) {

                $ad = $this->imageRepository->create($data);

                return redirect()->route('admin-images')->with('message', trans('images/images.Image_Added_Successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-create-image')->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-create-image')->with('error', $e->getMessage());
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
            ['link' => "/", 'name' => trans('locale.Home')], ['link' => "/admin/images", 'name' => trans('locale.Images')], ['name' => trans('images/images.edit_image')]
        ];

        $image = $this->imageRepository->find($id);


        return view('/content/custom-pages/admin/images/edit-image', [
                'pageConfigs' => $pageConfigs,
                'breadcrumbs' => $breadcrumbs,
                'image' => $image,
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

            $image = $this->imageRepository->find($id);

            if ($request->file('image')) {
                $img = $request->file('image');
                $name = "imagePhoto_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('images/images/'), $name);
                $path = '/images/images/' . $name;

                $data['image'] = $path;
            }else{
                $data['image'] = $image->image;

            }




            $validator = Validator::make($data, $validator_rules = Image::create_update_rules);

            if ($validator->passes()) {

                $ad = $this->imageRepository->update($data, $id);

                return redirect()->route('admin-images')->with('message', trans('images/images.Image_Updated_Successfully'));

            }
            $errorExpoString = implode(",", $validator->errors()->all());
            return redirect()->route('admin-edit-image', $id)->with('error', $errorExpoString);

        } catch (\Exception $e) {
            return redirect()->route('admin-edit-image', $id)->with('error', $e->getMessage());
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

            $this->imageRepository->delete($id);

            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
}
