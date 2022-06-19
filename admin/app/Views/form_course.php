<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course - Admin </title>

    <!-- ICON -->
    <link rel = "icon" href = "<?php echo base_url('public/icon.png'); ?>" type = "image/x-icon">

    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CUSTOM TAILWIND CLASS -->
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                low: '#0ea5e9',
                med: '#0284c7',
                high: '#0369a1',
                veryhigh: '#075985'
              }
            }
          }
        }
    </script>

    <!-- SCRIPT UNTUK DROPDOWN MENU -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
    
    <!-- NAVBAR -->
    <div class="bg-white/90 shadow fixed top-0 left-0 right-0 z-10 backdrop-blur-md">
        <div class="container mx-auto px-8 sm:px-4">
          <div class="flex items-center justify-between py-6">
            
            <!-- LOGO -->
            <a href="<?php echo base_url() ?>/home" class="group flex flex-row items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 group-hover:animate-spin" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M17.293     13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                </svg>
              <h1 class="text-sky-500 text-lg sm:text-xl ml-1">Teyvat Learn - Admin</h1>
            </a>  
            <!-- END OF LOGO -->

            <!-- ICON -->
            <div class="sm:hidden sm:items-center">
                <div @click.away="open = false" class="mr-12" x-data="{ open: false }">
                  <button @click="open = !open" class="flex flex-row items-center w-full text-gray-500 px-2 py-2 text-md font-normal text-left rounded-lg hover:text-sky-500 hover:scale-110 delay-50 duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                  </button>

                  <div x-show="open" class="absolute bg-white mt-2 pb-6 border-b items-center rounded-md shadow-lg w-auto" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" >
                    <!-- MENU ITEM -->
                    <div class="px-4 py-4 flex flex-col space-y-2 bg-white rounded-md shadow-sm">
                      <a href="<?php echo base_url() ?>/home" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Courses</a>
                      <a href="<?php echo base_url() ?>/course" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Account</a>
                    </div>
                    <!-- END OF MENU ITEM -->
                    
                    <!-- <div class="bg-white flex flex-col mt-8 mx-2 items-start text-center space-y-3">
                      <a href="<?php echo base_url() ?>/login" class="text-sky-500 bg-white border border-sky-500 text-sm font-normal px-4 py-2 rounded-lg hover:text-sky-500 hover:bg-gray-50 duration-300 delay-75"> Log in </a>
                      <a href="<?php echo base_url() ?>/register" class="text-white bg-sky-500 shadow-md border text-sm font-normal px-5 py-2 rounded-lg hover:bg-sky-500 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 duration-300 delay-75"> Sign up </a>
                    </div> -->
                  </div>
                </div>
            </div>
            <!-- END OF ICON -->
          </div>
        </div>
      </div>
    <!-- END OF NAVBAR -->

    <div class="pb-20"></div>
    
    <!-- MAIN SECTION -->
    <div class="flex flex-row h-full">
        <!-- SIDEBAR -->
        <div class="hidden sm:flex flex-col bg-sky-600 w-1/6 -m-2 shadow-lg absurd">
            <a href="<?php echo base_url() ?>/home" class="flex flex-row items-center justify-center space-x-2 py-8">
                <div class="w-1/5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-white scale-110" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                      </svg>
                </div>
                <h1 class="text-xl text-white">Admin</h1>
            </a>

            <a href="<?php echo base_url() ?>/home" class="bg-white py-8 ml-2 text-center text-md text-sky-600 font-medium hover:bg-sky-800 hover:text-white duration-300 delay-100">
                <p>Courses</p>
            </a>

            <a href="<?php echo base_url() ?>/admin/account" class="bg-sky-600 py-8 ml-2 text-center text-md text-white hover:bg-sky-800 hover:text-white duration-300 delay-100">
                <p>Account</p>
            </a>
        </div>


        <div class="flex flex-col mx-10 w-full sm:w-4/5 items-center py-2 px-8" id="yess">
            <h1 class="text-3xl font-medium text-neutral-600 py-4">Add Course</h1>


        <div class="flex flex-col items-center py-6 w-full">
            <form action="<?php echo base_url() ?>/admin/save" method="post" class="sm:w-1/3 w-full">
			    <?= csrf_field(); ?>
                
                <!-- NAMA COURSE -->
                <label for="nama_course" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Course Name </span>
                    <input name="nama_course" type="text"  id="nama_course" required placeholder="Course Name" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>

                <!-- DESC -->
                <label for="description" class="block mt-5"></label>
                        <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Description</span>
                <textarea name="description" id="description" cols="40" rows="3" placeholder="Message" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"></textarea>
    
                <!-- PRICE -->
                <label for="price" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Price </span>
                    <input name="price" type="number" min="0" id="price" required placeholder="300" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>
                
                <!-- CATEGORY -->
                <label for="category" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Category </span>
                    <input name="category" type="text"  id="category" required placeholder="Finance" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>
                
                <!-- VIDEOS -->
                <label for="videos" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Videos </span>
                    <input name="videos" type="number" min="0" id="videos" required placeholder="30" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>

                <!-- INSTRUCTOR -->
                <label for="instructor" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Instructor</span>
                    <input name="instructor" type="text"  id="instructor" required placeholder="James" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>
                
                <!-- PHOTO -->
                <!-- <div>
                    <label class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700 mt-6"> Upload Photo </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 font-medium">
                          <label for="photo_admin" class="text-black relative cursor-pointer bg-white rounded-md font-medium flex flex-row items-center pl-20 my-2">
                            <input id="fupload" name="fupload" type="file" required>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG, WEBP, SVG maks 10MB</p>
                      </div>
                    </div>
                  </div> -->
                
                <!-- BUTTON -->
                <div class="flex flex-row mt-8 pb-12 w-full">

                    <div class="bg-white w-full">
                        <input name="upload" id="upload" value="Add" type="submit" class="inline-flex justify-center py-2 px-4 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500" />
                    </div>
                    
                    <div class="text-left bg-white ml-4">
                        <button type="reset" class="inline-flex justify-center py-2 px-4 border shadow-sm text-sm  rounded-md text-black bg-gray-100 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-red-500 duration-300 delay-75"> 
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- END OF MAIN SECTION -->
    
    
</body>
</html>