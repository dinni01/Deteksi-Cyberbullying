<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    protected $timeout = 120; // Menit

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            $currentTime = now();

            if ($lastActivity) {
                $inactiveTime = $currentTime->diffInMinutes($lastActivity);

                if ($inactiveTime > $this->timeout) {
                    Auth::logout();
                    Session::flush();
                    return redirect()->route('admin.login')->with('message', 'Sesi Anda telah kedaluwarsa karena tidak ada aktivitas.');
                }
            }

            Session::put('lastActivityTime', $currentTime);
        }

        return $next($request);
    }
}
