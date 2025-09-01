@extends('layouts.app')

@section('content')

    <div class="grid sm:grid-cols-2 gap-8 pt-12 sm:pt-20 mx-auto w-4/5">
        <div class="mx-auto">
            <img 
                src="{{ asset($product->image_path) }}" 
                alt="{{ $product->name }}"
                class="w-full h-96 object-cover rounded-lg shadow-lg">
        </div>

        <div class="flex flex-col justify-between">
            <div>
                <h1 class="text-4xl text-gray-600 font-bold pb-6">
                    {{ $product->name }}
                </h1>

                <div class="space-y-4 mb-8">
                    <p class="font-bold text-lg text-black">
                       Price: <span class="text-red-500">$ {{ $product->price }}</span>
                    </p>
                    
                    <p class="font-bold text-lg text-black">
                        Shipping: <span class="text-red-500">$ {{ $product->shipping_cost }}</span>
                    </p>
                    
                    <p class="font-thin text-sm text-black">
                        {{ $product->details }}
                    </p>            

                    <p class="text-gray-800 text-thin text-base leading-6">
                        {{ $product->description }}
                    </p>
                </div>
            </div>

            <div class="mt-auto space-y-4">
                @php
                    $cartItems = session()->get('cartItems', []);
                    $currentQuantity = isset($cartItems[$product->id]) ? $cartItems[$product->id]['quantity'] : 0;
                @endphp
                
                @if($currentQuantity > 0)
                    <div class="text-center">
                        <p class="text-sm text-gray-600 mb-2">
                            Currently in cart: <span class="font-bold text-blue-600">{{ $currentQuantity }}</span>
                        </p>
                        @if($currentQuantity >= 10)
                            <div class="text-red-600 text-sm font-medium mb-3">
                                ⚠️ Maximum quantity limit reached (10)
                            </div>
                        @elseif($currentQuantity >= 8)
                            <div class="text-orange-600 text-sm font-medium mb-3">
                                ⚠️ Approaching quantity limit ({{ 10 - $currentQuantity }} remaining)
                            </div>
                        @endif
                    </div>
                @endif
                
                <a 
                    href="{{ route('add.to.cart', $product->id) }}" 
                    class="px-10 py-4 text-lg uppercase text-white font-bold rounded-full w-full block text-center transition-colors duration-200" 
                    style="background-color: {{ $currentQuantity >= 10 ? '#9ca3af' : '#f97316' }}; cursor: {{ $currentQuantity >= 10 ? 'not-allowed' : 'pointer' }};"
                    onmouseover="if({{ $currentQuantity }} < 10) this.style.backgroundColor='#ea580c'"
                    onmouseout="if({{ $currentQuantity }} < 10) this.style.backgroundColor='#f97316'"
                    role="button" 
                    aria-pressed="true"
                    @if($currentQuantity >= 10) onclick="return false;" @endif>
                    @if($currentQuantity >= 10)
                        Maximum Quantity Reached
                    @else
                        Add To Cart
                    @endif
                </a>
                
                @if($currentQuantity >= 10)
                    <p class="text-xs text-red-600 text-center">
                        You have reached the maximum quantity limit for this product.
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection