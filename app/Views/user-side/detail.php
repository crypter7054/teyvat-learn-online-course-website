<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "{$course['nama_course']} - Teyvat Learn" ?></title>

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

    <style>
        @media print{
            .hilang{
              /* visibility: collapse; */
              visibility: hidden;
            }
        }
    </style>

    <!-- SCRIPT UNTUK DROPDOWN MENU -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
    
    <!-- NAVBAR -->
    <div class="bg-white/90 shadow fixed top-0 left-0 right-0 z-10 backdrop-blur-md hilang">
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
                <a href="<?php echo base_url() ?>/course" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Courses</a>
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
                    <a href="<?php echo base_url() ?>/course" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Courses</a>
                    <a href="<?php echo base_url() ?>/contact" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Contact</a>
                    <a href="<?php echo base_url() ?>/about" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">About</a>
                    </div>
                    <!-- END OF MENU ITEM -->
                    
                    <div class="bg-white flex flex-col mt-8 mx-2 items-start text-center space-y-3">
                      <a id="login-button" href="#" class="text-sky-500 bg-white border border-sky-500 text-sm font-normal px-4 py-2 rounded-lg hover:text-sky-500 hover:bg-gray-50 duration-300 delay-75"> Log in </a>
                      <a href="#" class="text-white bg-sky-500 shadow-md border text-sm font-normal px-5 py-2 rounded-lg hover:bg-sky-500 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 duration-300 delay-75"> Sign up </a>
                    </div>
                  </div>
                </div>
            </div>
            <!-- END OF ICON -->
            
            <!-- BUTTON --> 
            <?php $session = session(); if ($session->has('email')) : ?>
              <div class='hidden sm:flex sm:flex-row'>
                
              <a href='#' class='mr-3'>
                <?php $user; ?>
                
                <?php $phototemp = $user['photo']; if ($phototemp == null) : ?>
                    <?php $ini2 = 'default_profile_1.jpg'; ?>
                  <?php else : ?>
                    <?php $ini2 = $user['photo']; ?>
                <?php endif; ?>

                  <div class="h-10 w-10 mr-2">
                    <img src='<?php echo base_url('public/file/'.$ini2); ?>' class='w-full h-full rounded-full opacity-90 hover:opacity-100 hover:scale-105'>
                  </div>
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
    <?php $course; $ini = $course['photo_course']; ?>

    <div class="flex flex-col w-full items-center pt-20 mt-8 pb-16">
        <div class="flex sm:w-1/2 w-[90%] rounded-2xl p-8 border ">
            <div class="">
              
                <div class="flex sm:flex-row flex-col items-start sm:items-center justify-between pb-6">
                    <h1 class="text-3xl font-medium w-[65%]"><?php echo "{$course['nama_course']}" ?></h1>
                    <div class="flex items-center bg-sky-400 rounded-xl">
                        <p class="p-4 text-2xl font-medium text-white">$<?php echo "{$course['price']}" ?></p>
                    </div>
                </div>
    
                <div class="hilang flex w-full sm:w-full">
                    <iframe class="h-[24rem] w-full pb-6" src="https://www.youtube.com/embed/BFlop4sP8Os"    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;    clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
    
                <div class="flex pb-6">
                    <h1 class="text-2xl">About this Course</h1>
                </div>
                
                <div class="flex sm:flex-row flex-col  border p-6 rounded-lg mb-6">
                    <div class="sm:w-[35%] sm:h-[10rem] w-[80%] h-full">
                        <img src="<?php echo base_url('public/file/'.$ini); ?>" alt="" class="rounded-lg w-full h-full">
                    </div>
                    
                    <div class="flex flex-row w-1/2 sm:ml-8 ml-0 space-x-2">
                        <div class="">
                            <h1 class="font-medium">Instructor</h1>
                            <h1 class="font-medium">Category</h1>
                            <h1 class="font-medium">Videos</h1>
                            <h1 class="font-medium">Description</h1>
                        </div>
    
                        <div class="sm:pl-6 pl-0">
                            <h1>:</h1>
                            <h1>:</h1>
                            <h1>:</h1>
                            <h1>:</h1>
                        </div>
                        <div class="">
                            <h1><?php echo "{$course['instructor']}" ?></h1>
                            <h1><?php echo "{$course['category']}" ?></h1>
                            <h1><?php echo "{$course['videos']}" ?> Videos</h1>
                            <h1><?php echo "{$course['description']}" ?></h1>
                        </div>
                    </div>
                </div>
    
                <div class="flex flex-row w-full justify-end py-4 hilang">
                    <a href="<?php echo base_url() ?>/checkout" 
                    class="flex flex-row text-center items-center text-white bg-sky-500 border border-sky-500 text-sm font-medium px-5 py-2 rounded-md hover:bg-sky-600 focus:ring-1 focus:ring-offset-2 ring-sky-500 duration-300 delay-75">
                         Enroll Course
                     </a>

                    <a href="#" onclick="window.print();" 
                    class="flex ml-4 flex-row items-center bg-sky-50 border text-sky-500 border-sky-500 text-sm font-medium px-2 py-2 rounded-md hover:bg-sky-100 duration-300 delay-75">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                         </svg>
                         Download
                     </a>
                </div>
                
                
              </div>
            </div>
            
        
    </div>
    <!-- END OF HERO SECTION -->
</body>
</html>