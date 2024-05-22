<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Blog Space | Homepage</title>
  </head>
  <body class="bg-[#F4F8FD] font-montserrat">
    <x-navbar />
    <main >
      <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
        <x-header />
        <div class="my-8">
          <h1 class="text-xs font-semibold">RECENT NEWS</h1>
          <div class="grid grid-cols-4 gap-8 py-8">
            {{-- Card --}}
            <x-card 
            :cover="'https://cdn.pixabay.com/photo/2023/06/16/15/14/sunset-8068208_1280.jpg'" 
            :date="'06 Jun 2023'" 
            :title="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex facere voluptates dolore excepturi dolor ipsa ratione, repellendus eaque eveniet!'" 
            :content="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quia amet velit at nisi, voluptas optio fugiat accusantium, ducimus laborum iste aspernatur non magnam nostrum dolorem quaerat atque placeat! Quasi!'"
            :author="'Lorem, ipsum.'" />
            <x-card 
            :cover="'https://cdn.pixabay.com/photo/2020/10/22/10/28/cow-5675684_1280.jpg'" 
            :date="'02 Jun 2023'" 
            :title="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex facere voluptates dolore excepturi dolor ipsa ratione, repellendus eaque eveniet!'" 
            :content="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quia amet velit at nisi, voluptas optio fugiat accusantium, ducimus laborum iste aspernatur non magnam nostrum dolorem quaerat atque placeat! Quasi!'"
            :author="'Lorem, ipsum.'" />
            <x-card 
            :cover="'https://cdn.pixabay.com/photo/2024/04/08/19/54/coffee-8684315_1280.jpg'" 
            :date="'02 Aug 2023'" 
            :title="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex facere voluptates dolore excepturi dolor ipsa ratione, repellendus eaque eveniet!'" 
            :content="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quia amet velit at nisi, voluptas optio fugiat accusantium, ducimus laborum iste aspernatur non magnam nostrum dolorem quaerat atque placeat! Quasi!'"
            :author="'Lorem, ipsum.'" />
            <x-card 
            :cover="'https://cdn.pixabay.com/photo/2021/03/08/12/31/oxford-shoes-6078993_1280.jpg'" 
            :date="'12 Jul 2024'" 
            :title="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex facere voluptates dolore excepturi dolor ipsa ratione, repellendus eaque eveniet!'" 
            :content="'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quia amet velit at nisi, voluptas optio fugiat accusantium, ducimus laborum iste aspernatur non magnam nostrum dolorem quaerat atque placeat! Quasi!'"
            :author="'Lorem, ipsum.'" />
          </div>
        </div>
      </div>
    </main>
  </body>
</html>