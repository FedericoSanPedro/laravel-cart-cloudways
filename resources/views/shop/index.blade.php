@extends('layouts.app')

@section('content')

<div class="mx-auto w-4/5">
    <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
        Shop
    </h1>

    <hr class="border-1 border-gray-300">
</div>

<div class="grid sm:grid-cols-4 gap-8 pt-20 mx-auto w-4/5">
    @foreach ($products as $product)
    <div class="mx-auto flex flex-col h-full">
        <img 
            src="{{ asset($product->image_path) }}" 
            alt="{{ $product->name }}" 
            class="w-full h-48 object-cover rounded-lg shadow-lg mb-4">

        <div class="flex flex-col flex-grow">
            <h2 class="text-xl text-gray-600 font-bold pb-4">
                {{ $product->name }}
            </h2>
            
            <p class="font-bold text-xs text-black pb-4 flex-grow">
                {{ $product->details }}
            </p>

            <p class="font-bold text-lg text-black pb-6">
               Price: <span class="text-red-500">$ {{ $product->price }}</span>
            </p>

            <div class="mt-auto space-y-2">
                @php
                    $cartItems = session()->get('cartItems', []);
                    $currentQuantity = isset($cartItems[$product->id]) ? $cartItems[$product->id]['quantity'] : 0;
                @endphp
                
                @if($currentQuantity > 0)
                    <div class="text-center">
                        <p class="text-xs text-gray-600">
                            In cart: <span class="font-bold text-blue-600">{{ $currentQuantity }}</span>
                            @if($currentQuantity >= 10)
                                <span class="text-red-600 font-medium">(Max reached)</span>
                            @elseif($currentQuantity >= 8)
                                <span class="text-orange-600 font-medium">({{ 10 - $currentQuantity }} left)</span>
                            @endif
                        </p>
                    </div>
                @endif
                
                <a  href="/shop/{{ $product->id }}"
                    class="px-6 py-3 text-base uppercase text-white font-bold rounded-full w-full block text-center transition-colors duration-200"
                    style="background-color: #f97316;"
                    onmouseover="this.style.backgroundColor='#ea580c'"
                    onmouseout="this.style.backgroundColor='#f97316'">
                    Read more...
                </a>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection