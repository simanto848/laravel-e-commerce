<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerStoreController extends Controller
{
    public function index() {
        return view('seller.store.create');
    }

    public function manage() {
        $userId = Auth::user()->id;
        $stores = Store::where('user_id', $userId)->get();
        return view('seller.store.manage', compact('stores'));
    }

    public function store(Request $request) {
        $validate_data = $request->validate([
            'store_name' => ['required', 'unique:stores'],
            'slug' => ['required', 'unique:stores'],
            'details' => ['required']
        ]);
        $userId = Auth()->user()->id;
        $userExist = User::where('id', $userId)->first();
        $userData  = User::find($userId);

        if($userExist && $userData->role != 2 ) {
            $validate_data['user_id'] = $userId;
        }

        Store::create($validate_data);

        return redirect()->back()->with('message', 'Store created successfully');
    }

    public function show($storeId) {
        $userId = Auth::user()->id;
        $store = Store::where('id', $storeId)->where('user_id', $userId)->first();
        return view('seller.store.edit', compact('store'));
    }

    public function update(Request $request, $storeId) {
        $validate_data = $request->validate([
            'store_name' => ['required', 'unique:stores,store_name,' . $storeId],
            'slug' => ['required', 'unique:stores,slug,' . $storeId],
            'details' => ['required']
        ]);
        $userId = Auth()->user()->id;
        $store = Store::where('id', $storeId)->where('user_id', $userId)->first();
        if (!$store) {
            return redirect()->back()->withErrors(['error' => 'You are not authorized to update this store.']);
        }

        Store::where('id',$storeId)->update($validate_data);
        return redirect()->back()->with('message','Store updated successfully');
    }

    public function delete($storeId) {
        $store = Store::where('id', $storeId)->where('user_id', Auth::user()->id)->first();
        if (!$store) {
            return redirect()->back()->withErrors(['error' => 'You are not authorized to delete this store.']);
        }
        $store->delete();
        return redirect()->back()->with('message','Store deleted successfully');
    }
}
