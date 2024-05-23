@extends('master')
@section('title', 'Blog Space | Homepage')
@section('content')

<div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
  <x-header :headings="$heading"/>
  <div class="my-8">
    <h1 class="text-xs font-semibold">RECENT ARTICLE</h1>
    <div class="grid grid-cols-4 gap-8 py-8">
      @foreach ($articles as $article)
        <x-card 
        :cover="$article->cover" 
        :date="App\Helpers\DateHelper::formatSimpleDate($article->created_at)" 
        :title="$article->title" 
        :slug="$article->slug"
        :content="$article->content"
        :author="$article->author" />  
      @endforeach
    </div>
  </div>
</div>

@endsection