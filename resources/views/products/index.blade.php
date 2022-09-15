@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator|\App\Domain\Product\Product[] $products */
    /** @var \App\Domain\Product\Category[] $categories */
    /** @var \App\Domain\Product\City[] $cities */
@endphp

<x-app-layout title="Products">
    <div class="form-inline mb-4">
        <h2 class="b-12 font-display text-2xl">Filters</h2>
        <form action="">
            <x-select name="city[]" title="City" :options="$cities" multiple="true"/>
            <x-select name="category" title="Category" :options="$categories" multiple=""/>
            <input type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 font-display font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:ring focus:ring-red-700" value="Filter" />
        </form>
    </div>
    <div class="grid grid-cols-3 gap-12">
        @foreach($products as $product)
            <x-product
                :title="$product->name"
                :price="format_money($product->getItemPrice()->pricePerItemIncludingVat())"
                :actionUrl="action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product])"
            />
        @endforeach
    </div>

    <div class="mx-auto mt-12">
        {{ $products->withQueryString()->links() }}
    </div>
</x-app-layout>
