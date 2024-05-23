<div class="max-w-sm bg-white border border-gray-200 shadow">
  <a href="/article/{{ $slug }}">
    <img class="h-60 w-full object-cover object-center" src={{ '/images/' . $cover }} alt="" />
  </a>
  <div class="p-5">
    <p class="text-xs mb-3">{{ $date }}</p>
    <a href="/article/{{ $slug }}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 line-clamp-2">{{ $title }}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 line-clamp-3">{{ $content }}</p>
    <div class="w-full h-px bg-gray-400 mb-2"></div>
    <p class="text-xs">By {{ $author }}</p>
  </div>
</div>