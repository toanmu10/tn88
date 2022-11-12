<?php


namespace App\Http\Services\User;


use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function create($request)
    {
        try {
            #$request->except('_token');
            User::create([
                'username' => (string)$request->input('username'),
                'password' => (int)$request->input('password'),
                'email' => (string)$request->input('email'),
                'active' => (string)$request->input('active')
            ]
                
            );
            Session::flash('success', 'Thêm User mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm User LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function getUser()
    {
        return User::whereNot('role_id', 0)->get();
    }

    public function update($request, $User)
    {
        try {
            $User->fill($request->input());
            $User->save();
            Session::flash('success', 'Cập nhật User thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật User Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $User = User::where('id', $request->input('id'))->first();
        if ($User) {
            // $path = str_replace('storage', 'public', $User->thumb);
            // Storage::delete($path);
            $User->delete();
            return true;
        }

        return false;
    }

    public function show()
    {
        return User::orderByDesc('sort_by')->get();
    }
}
