<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        /*$request->validate([
            'product_id' => 'nullable|exists:products,id',
            'service_id' => 'nullable|exists:services,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Verificar si el servicio ya está en el carrito
        if ($request->service_id) {
            $existingService = Cart::where('user_id', Auth::id())
                ->where('service_id', $request->service_id)
                ->first();

            if ($existingService) {
                return redirect()->back()->with('error', 'Este servicio ya está en tu carrito');
            }
        }

        $cartItem = Cart::where('user_id', Auth::id())
            ->where(function($query) use ($request) {
                $query->where('product_id', $request->product_id)
                    ->orWhere('service_id', $request->service_id);
            })->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'service_id' => $request->service_id,
                'quantity' => $request->quantity,
            ]);
        }*/
        $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'service_id' => 'nullable|exists:services,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Verificar si el servicio ya está en el carrito
        if ($request->service_id) {
            $existingService = Cart::where('user_id', Auth::id())
                ->where('service_id', $request->service_id)
                ->first();
    
            if ($existingService) {
                return redirect()->route('cart.index')->with('error', 'This service is already in your cart.');
            }
        }
    
        // Verificar si el producto ya está en el carrito
        if ($request->product_id) {
            $existingProduct = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();
    
            if ($existingProduct) {
                $existingProduct->quantity += $request->quantity;
                $existingProduct->save();
                return redirect()->back()->with('success', 'Cantidad de producto actualizada');
            }
        }
    
        // Crear un nuevo item en el carrito
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'service_id' => $request->service_id,
            'quantity' => $request->quantity,
        ]);
    

        //return redirect()->route('cart.index')->with('success', 'Item added to cart');
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carts,id',
        ]);

        $cartItem = Cart::find($request->id);

        if ($cartItem->user_id == Auth::id()) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Item eliminado del carrito');
    }

    public static function getCartItemCount()
    {
        $userId = Auth::id();
        return Cart::where('user_id', $userId)->sum('quantity');
    }

}
