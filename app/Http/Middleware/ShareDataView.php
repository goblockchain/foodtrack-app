<?php

namespace App\Http\Middleware;

use App\NotifyStatusProcess;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ShareDataView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();

        $data['notifications'] = DB::select(DB::raw("SELECT notify_status_process.id, notify_status_process.message 
            FROM notify_status_process 
            left join process on process_id = notify_status_process.process_id
            join profile_process on profile_process.process_id = process.id and profile_process.user_id = {$user->id}
            
            UNION
            
            
            SELECT notify_status_process.id, notify_status_process.message
            FROM process 
            left join notify_status_process on process.id = notify_status_process.process_id
            where process.user_id = {$user->id}
            
            group by notify_status_process.id"));


        // Sharing is caring
        View::share($data);


        return $next($request);
    }
}
