<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "{$user['fname']}" ?></title>

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

  <?php 
    $session = session(); 
    if ($session->has('email')){
    }
    else {
      
    }
    ?>
    
    <!-- SCRIPT UNTUK DROPDOWN MENU -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
    
    <!-- NAVBAR -->
    <div class="bg-white/90 shadow fixed top-0 left-0 right-0 z-10 backdrop-blur-md">
        <div class="container mx-auto px-8 sm:px-4">
          <div class="flex items-center justify-between py-4">
            <!-- LOGO -->
            <a href="<?php echo base_url() ?>/home" class="group flex flex-row items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 group-hover:animate-spin" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M17.293     13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                </svg>
              <h1 class="text-sky-500 text-xl ml-1">Teyvat Learn</h1>
            </a>  
            <!-- END OF LOGO -->

            <!-- MENU ITEMS -->
            <div class="hidden sm:flex sm:items-center">  
                <a href="<?php echo base_url() ?>/home" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Home</a>
                <a href="<?php echo base_url() ?>/course" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Courses</a>
                <a href="<?php echo base_url() ?>/contact" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Contact</a>
                <a href="<?php echo base_url() ?>/about" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">About</a>
            </div>
            <!-- END OF MENU ITEMS -->

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
                    <a href="<?php echo base_url() ?>/home" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Home</a>
                    <a href="<?php echo base_url() ?>/course" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Courses</a>
                    <a href="<?php echo base_url() ?>/contact" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Contact</a>
                    <a href="<?php echo base_url() ?>/about" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">About</a>
                    </div>
                    <!-- END OF MENU ITEM -->
                    
                    <div class="bg-white flex flex-col mt-8 mx-2 items-start text-center space-y-3">
                      <a href="<?php echo base_url() ?>/login" class="text-sky-500 bg-white border border-sky-500 text-sm font-normal px-4 py-2 rounded-lg hover:text-sky-500 hover:bg-gray-50 duration-300 delay-75"> Log in </a>
                      <a href="<?php echo base_url() ?>/register" class="text-white bg-sky-500 shadow-md border text-sm font-normal px-5 py-2 rounded-lg hover:bg-sky-500 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 duration-300 delay-75"> Sign up </a>
                    </div>
                  </div>
                </div>
            </div>
            <!-- END OF ICON -->
            
            <!-- BUTTON --> 
            <?php $session = session(); if ($session->has('email')) : ?>
              <div class='hidden sm:flex sm:flex-row'>
              <a href='#' class='mr-3'>
                <svg xmlns='http://www.w3.org/2000/svg' class='h-10 w-10 text-sky-600 hover:text-sky-700 delay-75 duration-300' viewBox='0 0 20 20' fill='currentColor'>
                      <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z' clip-rule='evenodd' />
                    </svg>
                <h1 class></h1>
                </a>
              
              <!-- LOGOUT -->
              <a href='<?php echo base_url() ?>/user/logout' class='text-white bg-red-500 shadow-md border border-red-500 text-sm font-normal px-5 py-2 rounded-md hover:bg-red-500 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-red-500 duration-300 delay-75'>
                  Logout
              </a>
            </div>

              <?php else : ?>
                <div class='hidden sm:flex sm:items-center'>
                    <a href='<?php echo base_url() ?>/login' class='text-sky-500 border border-sky-500 text-sm font-normal px-4 py-2 rounded-md hover:text-sky-500 hover:bg-gray-50 mr-4  duration-300 delay-75'> Log in </a>
                    <a href='<?php echo base_url() ?>/register' class='text-white bg-sky-500 shadow-md border border-sky-500 text-sm font-normal px-5 py-2 rounded-md hover:bg-sky-500 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 duration-300 delay-75'> Sign up </a>
                </div>
            </div>
            
            <?php endif; ?>
            <!-- END OF BUTTON -->

          </div>
        </div>
      </div>
    <!-- END OF NAVBAR -->
    
    <!-- HERO SECTION -->
    <div class="flex flex-col pt-4 sm:pt-16 items-center pb-16">
        <div class="border mt-10 rounded-xl p-10 w-1/2 flex flex-col items-center">

            <div class="text-2xl text-center text-gray-600">Profile</div>

                <?php $phototemp = $user['photo']; if ($phototemp == null) : ?>
                    <?php $ini = 'default_profile_1.jpg'; ?>
                  <?php else : ?>
                    <?php $ini = $user['photo']; ?>
                <?php endif; ?>

              <!-- IMAGE -->
              <div class="group flex flex-col rounded-lg m-5 items-center">
                <img src='<?php echo base_url('public/file/'.$ini); ?>'  class='w-72 rounded-full opacity-80 group-hover:scale-105 group-hover:opacity-100 duration-200 delay-50'>
              </div>
              
              <!-- NAME -->
              <div class='text-center p-2'>
                <h1 class='text-2xl mb-2'><?php echo "{$user['fname']}" ?></h1>
              </div>
              
              <!-- EMAIl -->
              <div class='text-center p-2'>
                <h1 class='text-xl mb-2'><?php echo"{$user['email']}" ?></h1>
              </div>
    
            <!-- FORM -->
            <form action="<?php echo base_url() ?>/user/storePhoto" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
                <!-- FOTO -->
                <div>
                    <label class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700 mt-6"> Upload Photo </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 font-medium">
                          <label for="photo" class="text-black relative cursor-pointer bg-white rounded-md font-medium flex flex-row items-center pl-20 my-2">
                            <input id="fupload" name="fupload" type="file" required>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG, WEBP, SVG maks 10MB</p>
                      </div>
                    </div>
                  </div>
    
                <div class="py-3 text-left bg-gray-50 mt-5">
                    <input name="upload" type="submit" id="upload" class="mr-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500" value="Upload" />
                </div>
                
                </div>
            </form>
        </div>
    </div>
    <!-- END OF HERO SECTION -->

</body>
</html>