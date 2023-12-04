<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        @foreach ($categories as $category)
            <h2 class="pt-3 mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $category->name }}</h2>
                <div class="grid lg:grid-cols-4 gap-y-6">
                    @foreach($category->menus as $menu)
                    <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                        <img class="w-full h-auto" src="{{ Storage::url($menu->image) }}" 
                        alt="Image" />
                        <div class="px-6 py-4">
                            <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                {{ $menu->name }}</h4>
                            
                            <p class="leading-normal text-gray-700">
                                {{ $menu->description }}</p>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <span class="text-xl text-green-600">Rp {{ $menu->price }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
        @endforeach
    </div>
</x-guest-layout>