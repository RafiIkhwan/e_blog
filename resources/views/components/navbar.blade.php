

<nav class="border-b border-[#023584]">
  <div class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto p-4">
    <h2 class="self-center text-2xl font-semibold whitespace-nowrap text-[#023584]">Blog Space</h2> 
    <div class="font-semibold text-[#023584] hover:text-[#112E5A]">
      @if (Auth::user())
      <a href="/dashboard" class="flex py-2 px-3">
        Dashboard
      </a>  
      @else
      <a href="/" class="flex py-2 px-3">
        Home
      </a>
      @endif
    </div>
    <div class="w-auto block">
      <ul class="font-medium flex p-0 flex-row space-x-8 rtl:space-x-reverse mt-0 border-0">
        @if(Auth::user())
        <li class="text-[#023584] hover:text-[#112E5A]">
          <a href={{ route('create.article') }} class="flex py-2 px-3">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
            </svg>  
            Write
          </a>
        </li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <li class="text-gray-600 hover:text-gray-800">
            <button type="submit" class="flex py-2 px-3">
              Logout
            </button>
          </li>
        </form>
        @else
        <li class="text-[#023584] hover:text-[#112E5A]">
          <a href="/login" class="flex py-2 px-3">Login</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
