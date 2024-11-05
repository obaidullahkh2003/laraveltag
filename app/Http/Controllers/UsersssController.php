<?php

namespace App\Http\Controllers;

use App\Models\Usersss;
use App\Http\Requests\StoreUsersssRequest;
use App\Http\Requests\UpdateUsersssRequest;

class UsersssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Usersss::paginate(5);
        return view('usersss.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usersss.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersssRequest $request)
    {
        $data = $request->only(['name', 'email', 'address', 'phone']);
        $data['password'] = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Usersss::create($data);

        return redirect()->route('usersss.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usersss $usersss)
    {
        return view('usersss.show', compact('usersss'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usersss $usersss)
    {
        return view('usersss.edit', compact('usersss'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersssRequest $request, Usersss $usersss)
    {
        $data = $request->only(['name', 'email', 'address', 'phone']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
            if ($usersss->image) {
                \Storage::disk('public')->delete($usersss->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $usersss->update($data);

        return redirect()->route('usersss.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usersss $usersss)
    {
        if ($usersss->image) {
            \Storage::disk('public')->delete($usersss->image);
        }

        $usersss->delete();
        return redirect()->route('usersss.index')->with('success', 'User deleted successfully.');
    }
}
