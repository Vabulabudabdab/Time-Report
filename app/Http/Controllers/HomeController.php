<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTimeRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\SetTimeUserRequest;
use App\Models\User;
use App\Models\UserTime;
use Illuminate\Http\Request;

class HomeController extends BaseController {

    public function index() {
        $users = User::paginate(9);
        return view('users.index', compact('users'));
    }

    public function show(User $user) {
        $user_time = UserTime::where('user_id', $user->id)->paginate(9);
        return view('users.show', compact('user', 'user_time'));
    }

    public function edit_user(User $user) {
        return view('users.edit_user', compact('user'));
    }

    public function edit_user_post(EditUserRequest $request, User $user) {
        $data = $request->validated();

        $this->userService->edit_user_post($request, $user);

        return redirect()->route('user.show', $user->id);
    }

    public function search(SearchRequest $request) {

        $data = $request->validated();

        $users = $this->userService->search($data);
        if($users != null) {
            return view('users.search', compact('users'));
        } else {
            return view('users.search');
        }

    }

    public function edit_time(User $user, UserTime $userTime) {

        return view('users.edit_time', compact('user', 'userTime'));
    }

    public function change_time(User $user) {
        return view('users.change_time', compact('user'));
    }

    public function report(User $user) {

        $dates = UserTime::where('user_id', $user->id)->paginate(7);
        $all_time = UserTime::where('user_id', $user->id)->get('date_difference');
        $fp = 0;
        $sp = 0;
        $count_time = $all_time->count();

        foreach ($all_time as $diff_time) {
            $fp = $diff_time->date_difference;
            $sp += $diff_time->date_difference + $fp;
        }

        $minutes_diff = $sp / 2;

        return view('users.report', compact('user', 'dates', 'minutes_diff', 'count_time', 'all_time'));
    }

    public function change_time_post(SetTimeUserRequest $request, User $user) {
        $data = $request->validated();

        $result = $this->userService->change_time_post($data, $user);

        if($result == null) {
            return redirect()->route('user.change.time', $user)->with('error_change_time', 'Время входа не может быть больше времени выхода');
        } else {
            return redirect()->route('index');
        }
    }

    public function update_time_post(EditTimeRequest $request, User $user, UserTime $userTime) {
        $data = $request->validated();

        $result = $this->userService->edit_time_post($data, $user, $userTime);

        if($result == null) {
            return redirect()->route('user.change.exists.time', [$user, $userTime])->with('error_change_time', 'Время входа не может быть больше времени выхода');
        } else {
            return redirect()->route('user.show', $user);
        }
    }

    public function delete(User $user) {
        $user->delete();
        return redirect()->back();
    }

}
