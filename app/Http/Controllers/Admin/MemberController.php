<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use DateTime;

class MemberController extends Controller
{
    protected string $guard;

    public function __construct()
    {
        // Guard được middleware lưu trong session. Fallback về 'member' nếu chưa có.
        $this->guard = session('guard', 'member');
    }

    /* ---------------- LIST ---------------- */
    public function index()
    {
        $query = DB::table('members')->orderBy('id');

        if ($key = request()->key) {
            $query->where('email', 'like', "%$key%");
        }

        $members = $query->paginate(5);

        return view('admin.member.index', compact('members'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /* ---------------- CREATE & STORE ---------------- */
    public function create()
    {
        return view('admin.member.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        unset($data['password_confirmation']);

        $data['password']   = bcrypt($data['password']);
        $data['created_at'] = new DateTime();

        DB::table('members')->insert($data);

        return redirect()->route('admin.member.index')
                         ->with('success', 'Add Success');
    }

    /* ---------------- EDIT & UPDATE ---------------- */
    public function edit($id)
    {
        $member = DB::table('members')->where('id', $id)->first();
        if (!$member) {
            return back()->with('error', 'Member not found');
        }

        $currentUser = Auth::guard($this->guard)->user();
        if (!$currentUser) {
            return redirect()->route('login');
        }

        $editingOwn = $currentUser->id == (int) $id;

        if ($currentUser->id != 1 && ($id == 1 || ($member->level == 1 && !$editingOwn))) {
            return back()->with('error', 'Not enough permission to edit');
        }

        return view('admin.member.edit', compact('member'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        unset($data['email'], $data['password_confirmation']);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $data['updated_at'] = new DateTime();

        DB::table('members')->where('id', $id)->update($data);

        return redirect()->route('admin.member.index')
                         ->with('success', 'Update Success');
    }

    /* ---------------- DELETE ---------------- */
    public function delete($id)
    {
        $member = DB::table('members')->where('id', $id)->first();
        if (!$member) {
            return back()->with('error', 'Member not found');
        }

        $currentUser = Auth::guard($this->guard)->user();
        if (!$currentUser) {
            return redirect()->route('login');
        }

        if ($id == 1 || ($currentUser->id != 1 && $member->level == 1)) {
            return back()->with('error', 'Not enough permission to delete');
        }

        DB::table('members')->where('id', $id)->delete();

        return redirect()->route('admin.member.index')
                         ->with('success', 'Delete Success');
    }
}
