<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function change_password(Request $request){
        $user = auth()->user();

    // Gelen veriyi doğrula
    $request->validate([
        'current_password' => 'required',
        'new_password1' => 'required|min:8',
        'new_password2' => 'required|same:new_password1',
    ]);

    // Mevcut şifreyi kontrol et
    if (Hash::check($request->current_password, $user->password)) {
        // Yeni şifreyi hashle ve kaydet
        $user->password = Hash::make($request->new_password1);
        $user->save();

        return back()->with('success', 'Şifreniz başarıyla değiştirildi.');
    } else {
        // Şifre yanlışsa hata mesajı döndür
        return back()->with('error', 'Mevcut şifre yanlış.');
    }
    }

    
}
