<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth,DB;

class ProfileController extends Controller
{
    /**
     * API getUserDetails
     *
     * @param Request $request,$token
     * @return profile view
     */

    public function getUserDetails(Request $request, $token)
    {
        $user = DB::table('users')->leftjoin('user_image','users.id','=','user_image.user_id')->where('users.id','=',auth()->user()->id)->get()->toArray() ;

        return view('profile.profile',compact('user','token'));
    }

    /**
     * API destroyProfile
     *
     * @param Request $request,$token
     *
     */


    public function destroyProfile(Request $request, $token)
    {
        $user = JWTAuth::setToken($token)->toUser()->toArray();
        auth()->invalidate();

        DB::table('users')->where('id','=',auth()->user()->id)->delete();

        auth()->logout();
        return redirect('/');
    }

    /**
     * API uploadImage
     *
     * @param Request $request,$token
     *
     */

    public function uploadImage(Request $request , $token)
    {

        $this->validate(request(),
            [
                'image'=>'required',
            ]);

        $if_image_exists = DB::table('user_image')->where('user_id','=',auth()->user()->id)->get()->toArray();

        if(count($if_image_exists)>0)
        {
            DB::table('user_image')->where('user_id','=',auth()->user()->id)->update
            ([
                'image' => $request->file('image')->getClientOriginalName(),
            ]);
        }
        else
        {
            DB::table('user_image')->insert
            ([
                'image' => $request->file('image')->getClientOriginalName(),
                'user_id' => auth()->user()->id,
            ]);
        }

        $file = $request->file('image');

        if($request->hasfile('image'))
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
        }

        return redirect()->back();

    }

    /**
     * API deleteImage
     *
     * @param Request $request,$token
     *
     */

    public function deleteImage(Request $request, $token)
    {

        $image_name = DB::table('user_image')->where('user_id','=',auth()->user()->id)->pluck('image')->toArray();
        unlink(public_path().'/img/'.$image_name[0]);

        DB::table('user_image')->where('user_id','=',auth()->user()->id)->delete();

        return redirect()->back();
    }
}
