<x-guest-layout>
    <!-- Main Hero Content -->
    <div
      class="container max-w-md px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center" style="background-image: url('{{ asset('storage/assets/ditobarlogo.png') }}'); background-size: 512px 512px;">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block">Welcome To Dito & Bar</span>
      </h1>
      @if (Auth::user())
        <div class="flex flex-col items-center mt-12 text-center">
          <span class="relative inline-flex w-full md:w-auto">
            <a href="{{route('reservations.step.one') }}" type="button"
              class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
              Make your Reservation!
            </a>
        </div>
      @else
      <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <a href="{{ route('login') }}" type="button"
            class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
            Login to make a Reservation!
          </a>
      </div>
      @endif
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
      <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
          <div class="w-full md:w-1/2 md:px-3">
            <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
              <!-- <h1
              class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
            > -->
              <h3 class="text-xl">OUR STORY
              </h3>
              <h2 class="text-4xl text-green-600">Welcome</h2>
              <!-- </h1> -->
              <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                Welcome to Dito & Bar, where culinary excellence meets a welcoming atmosphere. Established in 2023, we pride ourselves on crafting memorable dining experiences. Our chefs skillfully blend fresh, premium ingredients to create a menu that embraces both tradition and innovation. 
              </p>
              <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl"> Whether you're here for a cozy dinner or a lively celebration, our commitment to quality and warm hospitality ensures a delightful visit every time. Join us at Dito & Bar and discover a taste of our culinary passion, one that will surely leave an impression on your mind.</p>
              <div class="relative flex">
                <a href="#aboutus"
                  class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
                  Read More
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/2">
            <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
              <img src="https://cdn.pixabay.com/photo/2017/08/03/13/30/people-2576336_960_720.jpg" />
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="mt-8 bg-white">
      <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Our Menu</h3>
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
          TODAY'S HIGHLIGHTS</h2>
      </div>
      <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
          @foreach ($highlightMenus as $menu)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
              <img class="w-full h-auto" src="{{ Storage::url($menu->image) }}"
                alt="Image" />
              <div class="px-6 py-4">
                <div class="flex mb-2">
                  @foreach ($menu->categories as $category)
                    <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">  
                      <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                    </span>
                  @endforeach
                </div>
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h4>
                <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
              </div>
              <div class="flex items-center justify-between p-4">
                <span class="text-xl text-green-600">Rp {{ $menu->price }}</span>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>

    <section class="pt-4 pb-12 bg-gray-800" id="aboutus">
      <div class="my-16 text-center">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
          Why Choose Us? </h2>
        <p class="text-xl text-white">Since its inception, Dito & Bar has remained devoted to its founding principles, of:</p>
      </div>
      <div class="grid gap-2 lg:grid-cols-3">
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
          <div class="flex justify-center -mt-16 md:justify-end">
            <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
              src="https://cdn.pixabay.com/photo/2017/08/03/21/48/drinks-2578446_1280.jpg">
          </div>
          <div>
            <h2 class="text-3xl font-semibold text-gray-800">Culinary Excellence</h2>
            <p class="mt-2 text-gray-600">At Dito & Bar, our commitment to culinary excellence is unwavering. Our chefs meticulously source the finest, freshest ingredients to create a menu that fuses innovation with tradition. Each dish is a masterpiece, a testament to our dedication to providing an exceptional dining experience.</p>
          </div>
        </div>
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
          <div class="flex justify-center -mt-16 md:justify-end">
            <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
              src="https://cdn.pixabay.com/photo/2021/11/04/04/03/waitress-6767345_1280.jpg">
          </div>
          <div>
            <h2 class="text-3xl font-semibold text-gray-800">Warm Hospitality</h2>
            <p class="mt-2 text-gray-600">Established in 2023, Dito & Bar is not just a restaurant; it's a welcoming haven. Our staff embodies the spirit of hospitality, ensuring every guest feels at home. From the moment you step through our doors, you'll experience genuine warmth and personalized service that sets us apart.</p>
          </div>
        </div>
        <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
          <div class="flex justify-center -mt-16 md:justify-end">
            <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
              src="https://cdn.pixabay.com/photo/2018/01/18/17/48/purchase-3090818__340.jpg">
          </div>
          <div>
            <h2 class="text-3xl font-semibold text-gray-800">Timeless Atmosphere</h2>
            <p class="mt-2 text-gray-600"> Step into a timeless atmosphere at Dito & Bar, where contemporary design meets classic charm. Whether you're seeking an intimate dinner or a lively celebration, our inviting ambiance provides the perfect backdrop. The combination of tasteful decor, ambient lighting, and thoughtful details creates an unforgettable setting for your dining pleasure.</p>
          </div>
        </div>
      </div>
    </section>

</x-guest-layout>