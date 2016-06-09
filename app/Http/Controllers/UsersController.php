<?php

namespace app\Http\Controllers;

use Carbon\Carbon;
use File;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Nicolaslopezj\Searchable\SearchableTrait;
use Intervention\Image\Facades\Image;


class UsersController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $users = User::all();
        $users = User::paginate(10);
        return View::make('xUser.UserIndex')
            ->with('users', $users)
            ->with('count', $users->count());
    }

    /**
     * @param Request $request
     * @return view to Jquery handle
     */
    public function search(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        //use SearchableTrait
        if ($request->has("data-sort")) { //sort
            $user = User::search($request->input('keyword'))
                ->orderBy($request->input('data-field'), $request->input('data-sort'))
                ->get();
        } else {
            $user = User::search($request->input('keyword'))
                ->orderBy('id', 'asc')
                //->take(10)
                ->get();
        }
        //remove admin info
        $user = $user->reject(function ($item) {
            return $item->getRole() == "Admin";
        });
        //partial view
        return View::make('includes.user-index')
            ->with('users', $user)
            ->with('count', $user->count());
    }

    public function store(Request $request)
    {

    }

    /**change user information
     * @param $id
     * @param Request $request
     */
    public function show($id, Request $request)
    {
        $user = User::find($id);
        if (Gate::denies('profile', $id)) {
            abort(403);
        }
        return View::make('xUser.UserEdit')->with('user', $user);
    }

    /**
     * @param $id
     * @param Request $request
     * @return $this
     */
    public function edit($id, Request $request)
    {
        /*if ($request->has('new_password')) {
            $userdata = array(
                'email' => $request->input('email'),
                'password' => $request->input('old_password'));
            $rules = [
                'email' => 'email|max:255',
                'new_password' => 'confirmed|min:4',
                'old_password' => 'min:4',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->except(['old_password']));
            } else {
                if (Auth::attempt($userdata)) {
                    return redirect()->back();//->withInput($userdata);
                }
                $user->password = bcrypt($request->input('new_password'));
            }
        }*/
    }
    /**
     * Update the specified resource in storage.
     *
     */
    private function resize($image, $size, $name)
    {
        try
        {
            $extension 		= 	$image->getClientOriginalExtension();
            $imageRealPath 	= 	$image->getRealPath();
            $thumbName 		= 	'thumb_'. $name;

            $img = Image::make($imageRealPath); // use this if you want facade style code
            $img->resize(intval($size), null, function($constraint) {
                $constraint->aspectRatio();
            });
            return $img->save(public_path('img'). '/thumbnail/'. $thumbName);
        }
        catch(Exception $e)
        {
            return false;
        }

    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Gate::denies('profile', $id)) {
            abort(403);
        }
        $rules = [
            'email' => 'email|max:255|unique:users',
            'name' => 'max:255|min:4'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()&&$user->email != $request->input('email')) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        if($request->hasFile('image')) {

            $file = $request->file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $oldfile = public_path('img').$user->image;
            $oldthumb = public_path('img/thumbnail').'thumb_'.$user->image;
            if (File::exists($oldfile)){
                File::exists($oldthumb)&&File::delete($oldthumb);
                File::delete($oldfile);
            }
            /*resize*/
            $resizedImage = $this->resize($file , '200',$name);
            if(!$resizedImage)
            {
                return redirect()->back()
                    ->withError('Could not resize Image');
            }

            $user->image = $name;
            $file->move(public_path().'/img/', $name);
        }
        $user->update($request->except('image'));
        return redirect()->back()->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
