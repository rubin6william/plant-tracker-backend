<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlantRequest;
use App\Models\Plant;
use Intervention\Image\Facades\Image;

/**
 * Class PlantController
 * @package App\Http\Controllers
 */
class PlantController extends Controller
{
    /**
     * @return Plant[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Plant::get()->each(function($item) {
            $item->photo = asset('/images/plants/' . $item->photo);
            return $item;
        });
    }

    /**
     * @param  StorePlantRequest  $request
     * @param  Plant  $plant
     * @return void
     */
    public function store(StorePlantRequest $request, Plant $plant) {
        $image = $request->file('photo');
        $photoFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();

        $plant
            ->fill(['photo' => $photoFileName] + $request->only(['name', 'species', 'watering_instructions']))
            ->save();

        if ($request->hasFile('photo')) {
            $img = Image::make($image->getRealPath());

            $img->stream();

            $img->save(public_path('images/plants/' . $photoFileName));
        }

        return response(['message' => 'Plant information saved']);
    }
}
