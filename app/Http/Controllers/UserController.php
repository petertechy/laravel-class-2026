<?php
//php artisan make:controller UserController
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    $register = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'phone_number' => $request->phone_number,
        'password' => $request->password
    ]);

    if ($register) {
        return view('registerPage', [
            'status' => true,
            'message' => 'User Successfully registered'
        ]);
    }else {
        return view('registerPage', [
            'status' => false,
            'message' => 'User failed to register. Please try again'
        ]);
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


    $user = User::where('email', $request->email)->first();
    // return $user;
    if($user){
            $verify = password_verify($request->password, $user->password);
        if($verify){
            return view('login', [
                  'status' => true,
            'message' => 'Login Successful'
            ]);
        }else{
              return view('login', [
          'status' => false,
            'message' => 'The User Credential is wrong'
            ]);
        }
    }else{
            return view('login', [
          'status' => false,
            'message' => 'The Provided User Credential does not exist here'
            ]);
    }
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
}
