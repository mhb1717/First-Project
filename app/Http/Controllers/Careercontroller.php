<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\career2;

use Illuminate\Http\Request;


class Careercontroller extends Controller
{
    public function career_page()
    {
        return view('career');
    }
    public function career(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'file' => 'required|mimes:pdf|max:5000'
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return redirect("index")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {

        if (request()->has('file')) {
            $fileupload = request()->file('file');
            $filename = time() . '.' . $fileupload->getClientOriginalExtension();
            $filepath =  public_path('/pdf/');
            $fileupload->move($filepath, $filename);
            return career2::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'file' => '/pdf/' . $filename,


            ]);
        }
    }
}
