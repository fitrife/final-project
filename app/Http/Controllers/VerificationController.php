<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice() {
        if(!Auth::user()->email_verified_at){
            Auth::logout();
            return redirect()->route('login')->with('error','Verifikasi Email Anda.')->withInput();
        }

        return redirect('/dashboard/staff')->with('success', 'Dimohon untuk melakukan verifikasi email terlebih dahulu');

        // return redirect('/dashboard/staff')->with('success', 'Dimohon untuk melakukan verifikasi email terlebih dahulu');
    }

    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/dashboard')->with('success', 'Akun berhasil di verifikasi. Selamat datang di Dashboard');

        // return "Akun berhasil di verifikasi. Selamat datang di Dashboard";
    }

    public function send(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Link verifikasi sudah dikirim');
    }
}
