<?php

use App\Models\Products;
use App\Models\Category;
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
                'category_name' => Category::find($product->category_id)->categoryName ?? 'Unknown Category',
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

// ────────── Increase Cart Quantity ──────────
if (!function_exists('increaseCartQuantity')) {
    function increaseCartQuantity($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
            return true;
        }

        return false;
    }
}

// ────────── Decrease Cart Quantity ──────────
if (!function_exists('decreaseCartQuantity')) {
    function decreaseCartQuantity($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Ensure quantity doesn't go below 1
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
                session()->put('cart', $cart);
                return true;
            } else {
                // Optionally remove the item if quantity drops to 1 and is then decreased
                unset($cart[$productId]);
                session()->put('cart', $cart);
                return true;
            }
        }

        return false;
    }
}

// ────────── Clear Cart ──────────
if (!function_exists('clearCart')) {
    function clearCart()
    {
        session()->forget('cart');
    }
}
