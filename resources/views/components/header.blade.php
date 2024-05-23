
<div class="swiper header w-full my-8">
  <div class="swiper-wrapper">
    @foreach ($headings as $heading)
      <div class="swiper-slide">
        <div class="relative h-[400px]">
          <img src={{ '/images/' . $heading->cover }} class="absolute z-0 h-full w-full object-center object-cover mx-auto" alt="">
          <div class="h-full w-full absolute z-10 bg-black/50"></div>
          <div class="absolute z-20 flex flex-col p-20 justify-end w-full h-full space-y-6">
            <h2 class="text-4xl text-white line-clamp-3 w-2/3">{{ $heading->title }}</h2>
            <div class="w-full h-px bg-white"></div>
            <a href="/article/{{ $heading->slug }}" class="py-2 px-4 border-white border w-fit text-white">Read More</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="swiper-pagination"></div>
</div>