<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
           
            $user->email = $request->email;
            $user->role_id = 1;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
    public function registerstud(Request $request)
    {
        try {
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
           
            $user->email = $request->email;
            $user->role_id = 2;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function add(Request $request)
    {
       
        try {
                $students = new Student();
                    // 'course_id' => $request->course_id,
                    // 'role_id' =>$request->fname,
                    // 'fname' => $request->fname,
                    // 'lname' => $request->lname,
                    // 'mname' => $request->mname,
                    // 'number' => $request->pnumber, 
                    // 'sufix' => $request->sufix, 
                    // 'email' => $request->email,
                    // 'password' => Hash::make($request->Password)
                    $students->course_id = $request->course_id;
                    $students->role_id=2;
                    $students->fname = $request->fname;
                    $students->lname = $request->lname;
                    $students->mname = $request->mname;
                    $students->sufix = $request->sufix;
                    $students->email = $request->email;
               
                    $students->password = Hash::make($request->password);
              
                $students -> save();
                $success = true;
                $message = 'User register successfully';
          
             
            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = $ex->getMessage();
            }

               
               
                
       
    
            // response
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
    public function index()
    {
      
        $users = User::all()->toArray();
        $users = User::with('role')->get();
        return $users;
     
          
    } 
}