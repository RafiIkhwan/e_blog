@extends('auth.auth')
@section('title', 'Login')
@section('content')

<div class="flex justify-center items-center w-full h-screen">
  <div class="bg-white rounded-sm drop-shadow-sm py-8 px-16 space-y-4">
    <div class="flex flex-col items-center space-y-1">
      <h2 class="self-center text-md font-semibold whitespace-nowrap text-[#023584]">Blog Space</h2> 
      <h4 class="text-2xl font-bold">Sign in</h4>
      <p>Don't have an account? <a class="underline hover:no-underline hover:text-black/80" href="/register">Sign Up.</a></p>
    </div>
    @session('error')
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div>
        <span class="font-medium">{{ $value }}</span>
      </div>
    </div>
    @endsession
    <form class="max-w-sm mx-auto" action="{{ route('login.action') }}" method="POST">
      @csrf
      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 font-medium text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@gmail.com" required />
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 font-medium text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
      </div>
      <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
          <input id="remember" name="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
        </div>
        <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Remember me</label>
      </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>
  </div>
</div>

@endsection