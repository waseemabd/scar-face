<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IImageRepository;
use App\Models\Image;

class ImageRepository extends BaseRepository implements IImageRepository
{

    public function model()
    {
        return Image::class;
    }

}
