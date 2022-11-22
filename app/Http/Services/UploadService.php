<?php

namespace App\Http\Services;


class UploadService
{
    public function store($request)
    {
        // $request->validate([
        //     'image_validate' => 'nullable|max:10240|image|mimes:jpeg,jpg,png'
        // ]);
        if ($request->hasFile('file')) {

            try {
                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/' . date("Y/m/d");
                $path = $request->file('file')->storeAs(
                    'public/' . $pathFull,
                    $name
                );
                return '/storage/'. $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
