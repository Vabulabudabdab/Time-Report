<?php

namespace App\Http\Service;

use App\Models\User;
use App\Models\UserTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{

    public function change_time_post($data, User $user)
    {

        $enter_time = $data['enter_time'];
        $out_time = $data['out_time'];
        $date = $data['date'];

        $parsed_enter_time = Carbon::parse($enter_time)->toDateTime();
        $parsed_out_time = Carbon::parse($out_time)->toDateTime();

        $check_enter_date = Carbon::parse($enter_time)->format('h');
        $check_out_date = Carbon::parse($out_time)->format('h');

        $diff_in_minuts = Carbon::parse($enter_time)->diffInMinutes(Carbon::parse($out_time));
//        dd($test, $diff_date, $out_time);

        if ($parsed_enter_time < $parsed_out_time) {
            $result = UserTime::create([
                'user_id' => $user->id,
                'date' => $date,
                'enter_time' => $parsed_enter_time,
                'out_time' => $parsed_out_time,
                'date_difference' => $diff_in_minuts
            ]);

            return $result;
        } else {
            $result = null;
            return $result;
        }
    }

    public function edit_time_post($data, User $user, UserTime $time)
    {

        $enter_time = $data['enter_time'];
        $out_time = $data['out_time'];
        $date = $data['date'];

        $parsed_enter_time = Carbon::parse($enter_time)->toDateTime();
        $parsed_out_time = Carbon::parse($out_time)->toDateTime();

        $check_enter_date = Carbon::parse($enter_time)->format('h');
        $check_out_date = Carbon::parse($out_time)->format('h');

        $diff_in_minutes = Carbon::parse($enter_time)->diffInMinutes(Carbon::parse($out_time));

        if ($parsed_enter_time < $parsed_out_time) {
            $result = $time->update([
                'user_id' => $user->id,
                'date' => $date,
                'enter_time' => $parsed_enter_time,
                'out_time' => $parsed_out_time,
                'date_difference' => $diff_in_minutes
            ]);

            return $result;
        } else {
            $result = null;
            return $result;
        }

    }

    public function search($data)
    {

        $user_name = $data['user_name'];

        $users = User::where('name', 'LIKE', "%{$user_name}%")->paginate(9);

        return $users;
    }

    public function edit_user_post($data, User $user)
    {

        try {


            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);


        } catch (\Exception $exception) {
            dd($exception);
        }

    }

}
