<?php
//
//namespace App\Http\Middleware;
//
//use App\Constant\VRSConst;
//use Closure;
//
//class AdminAuthenticate
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param \Closure $next
//     * @param string $guard
//     * @return mixed
//     */
//    public function handle($request, Closure $next, $guard = VRSConst::ADMIN_GUARD)
//    {
//        if (auth()->guard($guard)->check()) {
//            return $next($request);
//        } else {
//            return redirect()->route('loginPage')->with('flash_message', 'Bạn cần đăng nhập để vào trang quản trị');
//        }
//    }
//}
