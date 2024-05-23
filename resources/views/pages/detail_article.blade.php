@extends('master')
@section('title', $article->title)
@section('content')

<div class="max-w-screen-md flex flex-wrap items-center justify-between mx-auto p-4">
  <div class="my-8 w-full">
    <div class="space-y-6">
      <h1 class="text-4xl">{{ $article->title }}</h1>
      <img class="object-cover object-center w-full h-[400px]" src={{ '/images/' . $article->cover }} alt="">
      <div class="flex justify-between">
        <div class="">
          <p class="text-xs">{{ App\Helpers\DateHelper::formatArticleDate($article->created_at) }}</p>
          <b>By {{ $article->author }}</b>
        </div>
        @if(Auth::user())
        <div class="px-2">
            <button id="dropdown" data-dropdown-toggle="menubar" data-dropdown-placement="bottom-end" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
              <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 12h.01m6 0h.01m5.99 0h.01"/>
              </svg>          
            </button>
            <div id="menubar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-sm font-medium text-gray-700 dark:text-gray-200" aria-labelledby="dropdown">
                 <li>
                    <a href="{{ route('edit.article',$article->slug) }}" class="block px-4 py-2 hover:bg-gray-100">Edit article</a>
                 </li>
                 <li>
                  <button class="w-full text-start" title="Delete Article" data-modal-target="static-modal-{{ $article->slug }}" data-modal-toggle="static-modal-{{ $article->slug }}" type="button">
                    <p class="block px-4 py-2 text-red-700 hover:bg-gray-100">Delete article</p>
                  </button>
                 </li>
              </ul>
           </div>
           <div id="static-modal-{{ $article->slug }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
               <div class="relative p-4 w-full max-w-2xl max-h-full">
                   <div class="relative bg-white rounded-lg shadow">
                       <div class="flex items-center p-4 rounded-t">
                           <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal-{{ $article->slug }}">
                               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                               </svg>
                               <span class="sr-only">Close modal</span>
                           </button>
                       </div>
                       <div class="p-4 md:p-5 space-y-4 text-center">
                           <h3 class="text-2xl font-semibold">
                               Delete Article
                           </h3>
                           <p class="text-base leading-relaxed text-gray-500">
                               Deletion is not reversible, and the article will be completely deleted.
                           </p>
                       </div>
                       <form action="{{ route('delete.article', $article->id) }}" method="POST">
                         @csrf
                         <div class="flex items-center p-4 md:p-5 rounded-b justify-center">
                             <button data-modal-hide="static-modal-{{ $article->slug }}" type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                             <button data-modal-hide="static-modal-{{ $article->slug }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
                         </div>
                       </form>
                   </div>
               </div>
           </div>
        </div>
        @endif
      </div>
      <div class="whitespace-break-spaces">{{ $article->content }}</div>
    </div>
  </div>
</div>

@endsection