<?php

namespace App\Http\Controllers;

use App\Helper\Response;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function wishList(Request $request)
    {
        $userId = $request->header('id');
        $products = WishList::with(['product.category:id,slug'])
            ->where('user_id', $userId)
            ->get();

        return view('components.front-end.profile.wish-list', compact('products'));
    }

    public function addWishList(Request $request)
    {
        $userId = $request->header('id');
        $productId = $request->input('productID');
        $wishList = new WishList();
        $wishList->user_id = $userId;
        $wishList->product_id = $productId;
        $wishList->save();
        return Response::success();

    }

    public function removeWishListItem(Request $request)
    {
        $userId = $request->header('id');
        $productId = $request->input('productID');
        $wishList = WishList::where('user_id', $userId)->where('product_id', $productId)
            ->first();
        if ($wishList) {
            $wishList->delete();
            return Response::success('Item removed from wish list');
        } else {
            return Response::error('Item not found in wish list');
        }

    }
}
