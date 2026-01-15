<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\Contracts\AppInterface;
use Spatie\Activitylog\Models\Activity;
use function activity;

class AppsLandingController extends Controller
{
    protected $appInterface;
    //protected $apps;

    public function __construct(AppInterface $appInterface)
    {
        $this->appInterface = $appInterface;
    }

    public function index()
    {
        $apps = $this->appInterface->getAllApps();
        return view('dashboard.index',compact('apps'));
    }

    public function redirectToApp($id)
    {
        $user = Auth::user();
        $app = $this->appInterface->getAppById($id);
        activity('go_to')
            ->causedBy(auth()->user())
            ->log('Se ha dirigido a la aplicacion '.$app->name.'-'.$app->company);
        $url = $app->getUrlByEnvironment();
        $payload = [
            'email' => $user->email,
            'expires' => now()->addMinutes(5)->timestamp,
            'url_origin' => 'https://auth.conectiacapital.test/inicio'
        ];

        $token = Crypt::encrypt($payload);

        return redirect($url."/autenticacion?token={$token}");
    }
}
