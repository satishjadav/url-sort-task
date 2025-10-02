<?php

namespace App\Http\Controllers;

use App\Models\SortUrl;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function SortUrl()
    {
        return view('user.sort-url');
    }

    public function SortUrlConvert(Request $request)
    {
        $request->validate([
            "url" => "required",
        ]);
        $getNewCode = $this->randomDigit(12);
        $currentDateTime = new DateTime();
        $currentDateTime->modify('+6 minutes');
        $newDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $sortUrl  = new SortUrl();
        $sortUrl->oldurl = $request['url'];
        $sortUrl->newurl = $getNewCode;
        $sortUrl->ex_time = $newDateTime;
            $sortUrl->save();
        if ($sortUrl->id) {
            return redirect()->route('sort-url-success');
        } else {
            return back();
        }
    }

    public function randomDigit($number)
    {
        $newkey = '';
        $allKey = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        for ($i = 0; $i < $number; $i++) {
            $newkey = $allKey[rand(1, 60)] . "" . $newkey;
        }
        return $newkey;
    }

    public function SortUrlSuccess()
    {
        $sortUrl  = SortUrl::latest()->first();
        return view('user.sort-url-success', compact('sortUrl'));
    }

    public function HitNewUrl(Request $request)
    {
        $sortUrl  = SortUrl::where('newurl', $request['id'])->first();
        if ($sortUrl) {
            if($sortUrl['ex_time'] >= date("Y-m-d H:i:s")){
                return redirect($sortUrl['oldurl']);
            }else{                
                EmailSend::Send(['id'=>2,'email'=>"satishjadav47@gmail.com"]);
                 return back();
            }
        } else {
            return back();
        }
    }

    public function AddUser()
    {
        return view('auth.register');
    }

    public function RegisterUser(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required",
        ]);
        $user  = new User();
        $user->name     = $request['name'];
        $user->email = $request['email'];
        $user->password =  bcrypt($request['password']);
        $user->save();
        if ($user->id) {
            return redirect()->route('login');
        } else {
            return back();
        }
    }

    public function LoginUser()
    {
        return view('auth.login');
    }

    public function Dashboard()
    {
        $sortUrl  = SortUrl::all();
        return view('admin.dashboard', compact('sortUrl'));
    }

    public function UpdateOldUrl(Request $request)
    {
        $sortUrl  = SortUrl::where('id', $request['id'])->first();
        if ($sortUrl) {
            return view('admin.update-old-url', compact('sortUrl'));
        } else {
            return back();
        }
    }

    public function UpdateOldUrlSave(Request $request)
    {
        $request->validate([
            "url" => "required",
        ]);
        $sortUrl  = SortUrl::where('id', $request['id'])->first();
        if ($sortUrl) {
            $sortUrl->oldurl = $request['url'];
            $sortUrl->save();
            return redirect()->route('admin.dashboard');
        } else {
            return back();
        }
    }
    public function OldUrlDelete(Request $request)
    {

        $sortUrl  = SortUrl::where('id', $request['id'])->first();
        if ($sortUrl) {
            $sortUrl->delete();
            return redirect()->route('admin.dashboard');
        } else {
            return back();
        }
    }

    public function StatusUpdateUrl(Request $request)
    {
        $sortUrl  = SortUrl::where('id', $request['id'])->first();
        if ($sortUrl) {
            $sortUrl->status = (($sortUrl['status'] == 1) ? 0 : 1);
            $sortUrl->save();
            return redirect()->route('admin.dashboard');
        } else {
            return back();
        }
    }
}
