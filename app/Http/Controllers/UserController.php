<?php
//php artisan make:controller UserController
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Access modifier - Public, Private, protected
   public function index() {
    return view('welcome');
}

//cors - cross origin resource sharing
//csrf - cross site request forgery

public function register(Request $request){
    // echo $_POST['email'];
    // echo 'Form Submitted';
    // echo $request->password;

    $validator = Validator::make($request->all(), [
        'name' => 'required | min:5 | max:25',
        'email' => 'required|email|unique:users',
        'age' => ['required'],
        'phone_number' => ['required'],
        'password' => ['required', 'min:8']
    ]);

    // return $validator->fails();
    // return $validator->errors();

    if($validator->fails()){
            return view('registerPage', [
                    'status' => 'false',
                    'errors' => $validator->errors()
            ]);
    }else{

    $register = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'phone_number' => $request->phone_number,
        'password' => $request->password
    ]);

    if ($register) {
        // return view('registerPage', [
        //     'status' => true,
        //     'message' => 'User Successfully registered'
        // ]);

        // return redirect('/login')->with('message', 'Registration Successful');
        return redirect()->route('login')->with('message', 'Registration Successful');
    }else {
        return view('registerPage', [
            'status' => false,
            'message' => 'User failed to register. Please try again'
        ]);
    }
    }
    }


public function registerPage(){
    return view('registerPage');
}

public function loginPage(){
    return view('login');
}

public function login(Request $request){
    // return User::where('email', $request->email)->get();
    // return User::where('email', $request->email)->first();
    
    // return User::all();

    // $validator = Validator::make($request->all(), [
    //     'email' => 'required|email',
    //     'password' => ['required']
    // ]);

    // if($validator->fails()){
    //         return view('login', [
    //                 'status' => 'false',
    //                 'errors' => $validator->errors()
    //         ]);
    // }else{
    //      $user = User::where('email', $request->email)->first();
    // // return $user;
    // if($user){
    //         $verify = password_verify($request->password, $user->password);
    //     if($verify){
    //         // return view('login', [
    //         //       'status' => true,
    //         // 'message' => 'Login Successful'
    //         // ]);
    //         Auth::login($user);
    //         return redirect('/dashboard');
    //     }else{
    //           return view('login', [
    //       'status' => false,
    //         'message' => 'The User Credential is wrong'
    //         ]);
    //     }
    // }else{
    //         return view('login', [
    //       'status' => false,
    //         'message' => 'The Provided User Credential does not exist here'
    //         ]);
    // }
    // }

    $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    
   
}

 public function home(){
    $name = 'Ayobami Adeniyi'; 
    $age = 20;
    $fruit = ['Apple', 'Watermelon', 'Banana', 'Mango', 'Orange'];
    //First Method: with method
    // return view('home')->with('name', $name);

    //Second Method: compact method
    // return view('home', compact('name', 'age'));

    //Third Method: Direct/Array method
    // return view('home', 
    // [
    //     'name' => $name
    // ]);

    return view('home', ['myFruits' => $fruit]);
}


 public function dashboard(){
    // return view('dashboard');

    $user = Auth::user();
    return view('dashboard', ['user' => $user]);
}

public function logout(){
    Auth::logout();
    return redirect('/login');
}
}
