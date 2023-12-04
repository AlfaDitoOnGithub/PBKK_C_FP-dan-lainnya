<x-guest-layout>
<div class="container w-full px-5 py-6 mx-auto">
    <a href="{{ route('categories.index') }}" class="text-xl font-semibold tracking-tight text-green-600 uppercase">Back to Categories</a>

    <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach($category->menus as $Menu)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-auto" src="{{ Storage::url($Menu->image) }}" 
                alt="Image" />
                    <div class="px-6 py-4">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                        {{ $Menu->name }}</h4>
                    
                    <p class="leading-normal text-gray-700">
                        {{ $Menu->description }}</p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-xl text-green-600">Rp {{ $Menu->price }}</span>
                    </div>
            </div>
        @endforeach
    </div>
</div>
</x-guest-layout>