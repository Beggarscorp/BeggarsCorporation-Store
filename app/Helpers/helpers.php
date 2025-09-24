<?php

use App\Models\Products;
use Illuminate\Support\Facades\Session;

// ────────── Add to Cart ──────────
if (!function_exists('addToCart')) {
    function addToCart($productId, $quantity = 1)
    {
        $cart = session()->get('cart', []);

        $product = Products::find($productId);
        if (!$product) return false;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->productImage,
            ];
        }

        session()->put('cart', $cart);
        return true;
    }
}

// ────────── Remove from Cart ──────────
if (!function_exists('removeFromCart')) {
    function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return true;
        }

        return false;
    }
}

// ────────── Get Cart Items ──────────
if (!function_exists('getCartItems')) {
    function getCartItems()
    {
        return session()->get('cart', []);
    }
}

// ────────── Get Cart Total ──────────
if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
}

// ────────── Clear Cart ──────────
if (!function_exists('clearCart')) {
    function clearCart()
    {
        session()->forget('cart');
    }
}
