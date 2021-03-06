<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }


    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => bcrypt($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    public function save(Request $request){
        if($request->username == ""  || $request->password == ""){ 
        $validator = Validator::make($request->all(), [
            'employee_no' => 'required|unique:users',
        ]);
         
        if ($validator->fails()) {
            return redirect('/user')
                        ->with('failed','Failed Adding Employee!')
                        ->withErrors($validator)
                        ->withInput();
        }
        User::create(["employee_no" => $request->employee_no,
            "name" => $request->name,
            "designation" => $request->designation,
            "active" => $request->active,
            "username" => null,
            "password" => null
        
        ]);
        return redirect('/user')->with('status','Successfully Added!!');
    }else{
        $validator2 = Validator::make($request->all(), [
            'employee_no' => 'required|unique:users',
            'username' => 'unique:users',
            'password' => 'min:5|confirmed'
        ]);
         
        if ($validator2->fails()) {
            return redirect('/user')
                        ->with('failed','Failed Adding Employee!')
                        ->withErrors($validator2)
                        ->withInput();
        }
        User::create(["employee_no" => $request->employee_no,
            "name" => $request->name,
            "designation" => $request->designation,
            "active" => $request->active,
            "username" => $request->username,
            "password" => Hash::make($request->password)
            
        ]);
        return redirect('/user')->with('status','Successfully Added!!');
    }
    }

    public function change(Request $request){
        if($request->active == "Yes" && $request->password == ""){ 
       
        $user = User::find($request->eid);
        $user->employee_no = $request->employee_no;
        $user->name = $request->ename;
        $user->designation = $request->design;
        $user->active = $request->active;
        

        $user->save();

        return redirect('/user')->with('status','Successfully Updated!');
        }else if($request->username == "" || $request->password == ""){
            $user = User::find($request->eid);
        $user->employee_no = $request->employee_no;
        $user->name = $request->ename;
        $user->designation = $request->design;
        $user->active = $request->active;
        $user->username = null;
        $user->password = null;

        $user->save();

        return redirect('/user')->with('status','Successfully Updated!');

        }else
        {
            $validator2 = Validator::make($request->all(), [
            'password' => 'min:5|confirmed'
            ]);
             
            if ($validator2->fails()) {
                return redirect('/user')
                            ->with('failed','Failed Updating Employee!')
                            ->withErrors($validator2)
                            ->withInput();
            }
            $user = User::find($request->eid);
        $user->employee_no = $request->employee_no;
        $user->name = $request->ename;
        $user->designation = $request->design;
        $user->active = $request->active;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/user')->with('status','Successfully Updated!');
        }
    }

    public function show($id) {
        $assigns = DB::table('assigns')
            ->join("items", "assigns.item_id", "=", "items.id")
            ->join("users", "assigns.user_id", "=", "users.id")
            ->where("user_id","=",$id)
            ->select("assigns.id","assigns.date_assigned","items.prop_no","items.type","items.item_name","items.serial_no","items.age","items.date_acquired","items.date_procured"
                ,"assigns.remarks","items.location","assigns.date_returned")
            ->get();
        $users = User::find($id);

            return view('users.show')->with(['assigns'=>$assigns, 'users'=>$users]); 

    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => bcrypt($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    
}
