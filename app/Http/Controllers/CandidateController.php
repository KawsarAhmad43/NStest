<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CandidateController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $candidate = Candidate::all();

        return view('candidate.index', [
            'candidate' => $candidate,
        ]);
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         return $request;
        $validated = $request->validate([
            'name' => 'required|max:20|min:3',
            'image' => 'required|max:2048',

        ]);

        if ($request->has('image')) {
            $image = time().'.'.$request->image->extension();
            $request->image->move(
                public_path('content/users'),
                $image
            );
        } else {
            $image = 'users.png';
        }

        $candidate=Candidate::create([
            'name'=>$request->name,
            'email'=> $request->email,
            'image'=>$image,
            'gender'=>$request->gender,
        ]);

        $skill=Skills::create([
            'user_id'=>$candidate->id,
            "laravel"=> "1",
            "codeigniter"=> $request->codeigniter,
            "ajax"=> $request->ajax,
            "vue"=> $request->vue,
            "mysql"=> $request->mysql,
            "api"=> $request->api
        ]);

        return Redirect::back()->with('msg', ' Successfully Added ');

        return back();
    }




        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        
        $candidate = Candidate::where('id', $id)->firstOrFail();

        return view('candidate.edit', [
            'candidate' => $candidate,
            
        ]);
    }




        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required|max:20|min:3',
            'image' => 'max:2048',

        ]);

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
            $image = 'users.png';
        }
        $candidate = Candidate::find($request->id);

        $candidate->name = $request->name;
        $candidate->image = $image;
        $candidate->update();
        return Redirect::back()->with('msg', ' Successfully Updated ');

        return redirect()->route('candidate.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        // delete zoombie post first.
        $candidate = Candidate::find($id);


        try {
            Candidate::find($id)->delete();
            return Redirect::back()->with('msg', ' Successfully Deleted ');

            return back();
        } catch (\Exception $exception) {
            return Redirect::back()->with('msg', ' error ');

            return back();
        }
    }









   

}
