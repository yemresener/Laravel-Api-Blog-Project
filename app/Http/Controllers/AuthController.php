<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;




class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate login credentials
        $validated_data = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        
        // Kullanıcıyı doğrula
        $user = User::where('name', $validated_data['name'])->first();
        
        if ($user && Hash::check($validated_data['password'], $user->password)) {
            // Başarıyla giriş yaptı, oturumu başlat
            Auth::login($user);
        
            // Oturum açıldıktan sonra token oluşturulabilir (eğer API için gerekli ise)
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json([
                'message' => 'Login successful!',
                'token' => $token,
                'user' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }
    }

    public function register(Request $request){
        $validated_data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8', // Şifrenin en az 8 karakter olması gerektiğini ekleyebilirsiniz
        ]);
    
        // Yeni kullanıcı oluşturma
        $user = new User();
        $user->name = $validated_data['name']; // Veriye doğru erişim
        $user->email = $validated_data['email'];
        $user->password = bcrypt($validated_data['password']); // Şifreyi hashle
    
        
        // Kullanıcıyı kaydetme
        if($user->save()) {
            // Kullanıcı kaydedildikten sonra token oluşturuluyor
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'message' => 'Başarıyla Kullanıcı Oluşturuldu.',
                'token' => $token // Token, response ile döndürülüyor
            ], 201); // 201 kodu: Yeni kaynak oluşturuldu
        }
       return response()->json([
        'message' => 'Hatalı giriş bilgileri.',
            ], 401);
        
    }

    public function logout(Request $request){

        // Kullanıcının aktif tokenlarını sil
        Auth::guard('sanctum')->user()->tokens->each(function ($token) {
            $token->delete(); // Kullanıcı token'larını sil
        });

        return response()->json(['message' => 'API oturumu başarıyla sonlandırıldı.']);
    }
    


    public function webLogin(Request $request)
    {
        // Giriş için kullanıcı bilgilerini doğrula
        $validated_data = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Kullanıcıyı bul
        $user = User::where('name', $validated_data['name'])->first();

        if ($user && Hash::check($validated_data['password'], $user->password)) {
            // Web oturumunu başlat
            Auth::login($user);

            // Başarılı giriş sonrası, giriş yapan kullanıcıyı yönlendir
            return response()->json(['message' => 'Web oturumu başarıyla başlatıldı.']);
        } else {
            // Giriş başarısızsa hata mesajı dön
            return response()->json(['message' => 'Geçersiz kimlik bilgileri.'], 401);
        }
    }


    public function webLogout(Request $request)
    {
        Auth::logout(); // Kullanıcıyı çıkart

        // Laravel oturumu sıfırlama işlemi
        $request->session()->invalidate(); // Oturum geçersiz kılınır
        $request->session()->regenerateToken(); // Yeni CSRF token oluşturulur

        return response()->json(['message' => 'Oturum başarıyla sonlandırıldı.']);
    }

    
}







