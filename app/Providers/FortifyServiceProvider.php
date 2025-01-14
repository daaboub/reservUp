<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Admin;
use App\Models\User;
use App\Services\AdminPermissionsProxy;
use App\Services\CheckAccountProxy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request = request();
        if($request->is("admin/*"))
        {
            Config::set("fortify.guard","admin");
            Config::set("fortify.passwords","admins");
            Config::set("fortify.prefix","admin");
            Config::set("fortify.home","admin/dashboard/salle");
        }else
        {
            
            Config::set("fortify.home","/reservations");
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // if(Config::get('fortify.guard') == 'admin'){

            Fortify::viewPrefix('auth.');

            Fortify::authenticateUsing(function (Request $request) {
                if(Config::get('fortify.guard') == 'admin')
                {
                    $admin = Admin::where('email', $request->email)->first();
                    
                }else{
                    
                    $admin = User::where('email', $request->email)->first();
                }
        
                // Vérifier si l'admin existe et si son compte est suspendu
                if ($admin) {
                    // Utilisation du Proxy pour vérifier la suspension
                    $adminPermissionsProxy = new CheckAccountProxy();
        
                    // Si l'admin est suspendu, empêcher l'authentification
                    if ($adminPermissionsProxy->checkIfSuspended($admin)) {
                        throw ValidationException::withMessages([
                            'email' => ['Your account is suspended. Please contact the administrator.'],
                        ]);
                    }
        
                    // Vérifier le mot de passe
                    if (Hash::check($request->password, $admin->password)) {
                        return $admin; // Si les informations sont correctes, authentifier l'admin
                    }
                }
        
                // Si l'admin n'existe pas ou le mot de passe est incorrect
                return null;
            });
        // }else{
            
        //     Fortify::viewPrefix("user.auth.");
        // }
      
    }
}
