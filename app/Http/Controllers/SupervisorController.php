<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    // construct to decided roles
    public function __construct()
    {
        $this->middleware('superAdmin');
    }
    // show all
    public function index()
    {
        $users=User::where('type','admin')->get();
        return view('admin.supervisors.index',compact('users'));
    }
    // create
    public function create()
    {
        return view('admin.supervisors.create');
    }
    // store
    public function store(Request $request)
    {

        //Validate
        $request->validate([
            'name' => 'required|min:6',
            'phone' => 'unique:users|numeric|digits:11',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        $user->save();
        return redirect(route('supervisors'))->withFlashMessage('تم إضافة المشرف بنجاح');
    }
    // edit
    public function edit(User $user)
    {
        return view('admin.supervisors.edit',compact('user'));
    }
    // update
    public function update(Request $request,User $user)
    {
       //Validate
       $request->validate([
            'name' => 'required|min:6',
            'phone' => 'required|numeric|digits:11|unique:users,phone,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        if($request->password != null)
        {
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect(route('supervisors'))->withFlashMessage('تم تعديل المشرف بنجاح');
    }
    // delete
    public function delete(User $user)
    {
        $user->delete();
        return back()->withFlashMessage('تم حذف المشرف بنجاح');
    }
}
