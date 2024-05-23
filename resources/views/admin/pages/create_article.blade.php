@extends('admin.master')
@section('title', 'Create article')
@section('content')

<main class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto">
  <form class="w-full" action="{{ route('publish') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <nav class="fixed w-full max-w-screen-lg bg-[#F4F8FD]/90">
      <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="self-center text-2xl font-semibold whitespace-nowrap text-[#023584]">Blog Space</h2>
        <div class="w-auto block">
          <ul class="font-medium flex p-0 flex-row space-x-8 rtl:space-x-reverse mt-0 border-0">
            <li>
              <button id="publish_button" type="submit" class="flex py-2 px-3 bg-green-600/50 text-white rounded-full text-sm" disabled>
                Publish
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="max-w-screen-md items-center justify-between mx-auto py-8 font-serif pt-32 space-y-4">
      <textarea oninput="auto_grow(this)" class="box-border w-full h-fit resize-none p-0 bg-transparent border-none text-4xl focus:ring-transparent focus:border-none" name="title" id="title" placeholder="Title" rows="1"></textarea>
      <img class="hidden" id="image_preview" src="#" alt="" />
      <textarea oninput="auto_grow(this)" class="box-border w-full h-fit resize-none p-0 bg-transparent border-none focus:ring-transparent focus:border-none" name="content" id="content" placeholder="Write article..."></textarea>
      <div class="space-y-3 shadow-md w-fit p-5 rounded-sm">
        <p class="text-lg">Upload Your Cover Image</p>
        <input accept="image/*" type='file' id="cover" name="cover" />
      </div>
    </div>
  </form>
</main>

@push('script')
<script>
  $(document).ready(function() {
    $('#content').focus();
  });
  const auto_grow = (element) => {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight) + "px";
  }
  let imgFile = false
  const checkTextarea = () => {
    const title = $("#title").val().trim();
    const content = $("#content").val().trim();
    const isFormValid = title && content && imgFile;
    $('#publish_button').prop('disabled', !isFormValid);
    if (isFormValid) {
        publish_button.classList.remove("bg-green-600/50");
        publish_button.classList.add("bg-green-600");
    } else {
        publish_button.classList.remove("bg-green-600");
        publish_button.classList.add("bg-green-600/50");
    }
  };
  $(document).on('keyup', '#title, #content', checkTextarea);
  cover.onchange = evt => {
      const [file] = cover.files
      if (file) {
          imgFile = true;
          checkTextarea();
          image_preview.src = URL.createObjectURL(file)
          image_preview.classList.remove("hidden")
          image_preview.className += "object-cover object-center w-full h-[400px]"
      }
  }
</script>
@endpush
@endsection