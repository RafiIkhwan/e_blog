@extends('admin.master')
@section('title', 'Dashboard')
@section('content')

<x-navbar />
<main class="max-w-screen-md flex flex-wrap items-center justify-between mx-auto">
    
  <div class="py-16 w-full flex flex-col">
    <div class="flex justify-between items-center mb-12">
      <h2 class="text-4xl font-semibold">Your articles</h2>
      <a class="py-2 px-4 bg-green-600 text-white rounded-3xl text-sm" href={{ route('create.article') }}>Write an article</a>
    </div>
    @session('success')
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div>
        <span class="font-medium">{{ $value }}</span>
      </div>
    </div>
    @endsession
    @foreach ($articles as $article)
    <div class="flex justify-between border-b py-4">
      <div class="flex flex-col gap-y-4 w-2/3">
        <div class="flex flex-col gap-y-1">
          <a href={{ route('detail.article', $article->slug) }}>
            <b class="w-2/3 truncate">{{ $article->title }}</b>
            <p class="line-clamp-2">{{ $article->content }}</p>
          </a>
        </div>
        <div class="flex flex-row items-center gap-x-4">
          <p class="text-xs">Published on {{ App\Helpers\DateHelper::formatArticleDate($article->created_at) }}</p>
          <button id="dropdown-{{ $article->slug }}" data-dropdown-toggle="menubar-{{ $article->slug }}" class="text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
            <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 12h.01m6 0h.01m5.99 0h.01"/>
            </svg>    
          </button>
          <div id="menubar-{{ $article->slug }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-sm font-medium text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-{{ $article->slug }}">
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
    </div>
    @endforeach
    @if($articles->isEmpty())
    <p class="text-center font-medium py-16">You haven’t published any article yet.</p>
    @endif
  </div>

</main>
@endsection