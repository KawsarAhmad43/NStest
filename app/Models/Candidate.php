<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];
    public const DEFAULT_CANDIDATE_IMAGE = 'users.png';



    public static function store($request)
    {
        try {
            if ($request->has('image')) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(
                    public_path('content/users'),
                    $image
                );
            } elseif ($request->has('id') && $request->get('id') != '') {
                $candidate = Candidate::find($request->id);
                $image = $candidate->image;
            } else {
                $image = self::DEFAULT_CANDIDATE_IMAGE;
            }

            //

            self::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'name'    => $request->name,
                    'email'    => $request->email,
                    'image'   => $image,
                    'gender'    => $request->gender,
                    'gender'    => $request->gender,
                ]
            );

            return Redirect::back()->with('msg', ' Successfully Added ');

            return back();
        } catch (\Exception $exception) {
            return Redirect::back()->with('msg', ' error ');

            return back();
        }
    }



}
