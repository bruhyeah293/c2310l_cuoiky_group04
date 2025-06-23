<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.member.index');
    }

    public function dashboard()
    {
        $members = DB::table('members')->count();
        $products = DB::table('products')->count();
        $orders  = DB::table('cart')->count();

        // Get unread contacts
        $unreadContacts = DB::table('contacts')
            ->whereColumn('created_at', 'updated_at')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.dashboard', [
            'members'        => $members,
            'products'       => $products,
            'orders'         => $orders,
            'unreadContacts' => $unreadContacts->take(4),
            'unreadCount'    => $unreadContacts->count(),
        ]);
    }

    public function readContact($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();

        if (!$contact) {
            return redirect()->route('admin.dashboard')->with('error', 'Message not found!');
        }

        // Mark as read if it hasn't been read
        if ($contact->created_at == $contact->updated_at) {
            DB::table('contacts')->where('id', $id)->update([
                'updated_at' => now()
            ]);
        }

        return view('admin.contact.show', compact('contact'));
    }

    public function contactIndex()
    {
        $contacts = DB::table('contacts')
            ->orderByDesc('created_at')
            ->paginate(10); // or 15

        return view('admin.contact.index', compact('contacts'));
    }

    public function cart()
    {
        $data = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select('cart.*', 'products.price')
            ->get();

        return view('admin.cart', [
            'carts' => $data,
            'totals' => $data->sum(function ($item) {
                return $item->qty * $item->price;
            }),
        ]);
    }

    public function success($id)
    {
        $order = DB::table('cart')->where('id', $id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        if ($order->status == 1) {
            return redirect()->back()->with('error', 'This order has already been approved!');
        }

        $product = DB::table('products')->where('id', $order->product_id)->first();

        if (!$product || $product->quantity < $order->qty) {
            return redirect()->back()->with('error', 'Not enough product quantity!');
        }

        // Update inventory
        DB::table('products')->where('id', $product->id)->update([
            'quantity' => $product->quantity - $order->qty
        ]);

        // Update order status
        DB::table('cart')->where('id', $id)->update(['status' => 1]);

        return redirect()->back()->with('success', 'Order approved successfully!');
    }

    public function cancel($id)
    {
        DB::table('cart')->where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Order has been cancelled!');
    }
}
