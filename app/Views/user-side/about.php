<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Teyvat Learn</title>

    <!-- ICON -->
    <link rel = "icon" href = "public/icon.png" type = "image/x-icon">

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
                <a href="<?php echo base_url() ?>/about" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">About</a>
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

                  <div x-show="open" class="absolute mt-2 bg-white pb-6 border-b items-center rounded-md shadow-lg w-auto" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" >
                    <!-- MENU ITEM -->
                    <div class="px-4 py-4 flex flex-col space-y-2 bg-white rounded-md shadow-sm">
                        <a href="<?php echo base_url() ?>/home" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Home</a>
                        <a href="<?php echo base_url() ?>/course" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Courses</a>
                        <a href="<?php echo base_url() ?>/contact" class="text-gray-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Contact</a>
                        <a href="<?php echo base_url() ?>/about" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">About</a>
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
              <a href='<?php $user; echo "user/profile/{$user['id_user']}"; ?>' class='mr-3'>
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
    <div class="flex flex-col w-full items-center pt-24 border">
        <!-- PART 1 -->
        <div class="w-full bg-sky-50 -mt-8 sm:px-64">
            <div class="flex flex-col sm:items-center sm:flex-row w-full">
                <!-- TAGLINE -->
                <div class="w-full flex flex-col justify-center sm:pt-0 pt-8 h-auto sm:h-96">
                    <p class="text-center sm:text-left text-4xl mb-6 font-serif text-black leading-snug hover:text-sky-600 duration-300 delay-75">We share knowledge with the world</p>
                </div>
                
                <!-- PHOTO -->
                <div class="w-full sm:pl-24 h-96">
                    <img class="h-full" src="<?php echo base_url('public/about/about1.png'); ?>" alt="about1">
                </div>
            </div>
            
        </div>
        <!-- END OF PART 1 -->
        
        <div class="py-4 w-full bg-gradient-to-r from-sky-400 to-sky-500 flex flex-row justify-center">
            <h1 class="text-white text-center text-xl mx-full">Teyvat Learn</h1>
        </div>
        
        <!-- PART 2 -->
        <div class="flex flex-col sm:px-0 px-8 items-center py-16">
            <h1 class="text-4xl text-center sm:text-justify font-serif hover:text-sky-600 duration-300 delay-75">Changing learning for the better</h1>
            <div class="sm:mx-64 mx-0">
                <p class="text-lg text-neutral-600 py-6 text-center">Whether you want to learn or to share what you know, you’ve come to the right place. As a global destination for online learning, we connect people through knowledge.</p>
            </div>
        </div>
        <!-- END OF PART 2 -->

        <!-- PART 3 -->
        <div class="w-full bg-sky-50 sm:px-24 py-8">
            <div class="flex flex-col items-center sm:items-start sm:flex-row">
                <div class="flex justify-center items-center w-1/2 h-[200px] sm:h-[350px]">
                    <iframe class="h-full w-[525px]" src="https://www.youtube.com/embed/BFlop4sP8Os"    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;    clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="flex flex-col px-12  sm:px-0 w-full sm:w-1/2">
                    <h1 class="text-3xl font-serif pb-2 hover:text-sky-600 duration-300 delay-75 sm:pt-0 pt-6">Our Instructors</h1>
                    <p class="text-justify">Whatever your learning style, we have a course that fits. 
                        Coming from instructors all over the world, our courses span over 65 
                        languages and cover just about anything you'd want to know. 
                    </p>
                </div>
            </div>
        </div>
        <!-- END OF PART 3 -->
        
        <!-- PART 4 -->
        <div class="w-full bg-gradient-to-r from-sky-400 to-sky-600 py-16 px-2 sm:px-24">
            <div class="flex flex-col items-center">
                <h1 class="text-4xl text-white font-serif text-center">We just keep growing</h1>
                <p class="text-lg text-white py-4 text-center w-10/12">Whether you want to learn or to share what you know, you’ve come to the right place. As a global destination for online learning, we connect people through knowledge.</p>
                
                <div class="flex sm:flex-row flex-row-reverse justify-between text-center text-white w-full sm:w-3/4 pb-3 pt-8">
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">52M+</h1>
                        <p>Learners</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">68K+</h1>
                        <p>Instructors</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">196K+</h1>
                        <p>Courses</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">712M+</h1>
                        <p>Course enrollments</p>
                    </div>
                </div>

                <div class="flex flex-row justify-around text-center text-white w-10/12 pt-3">
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">75</h1>
                        <p>Languages</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">11,600+</h1>
                        <p>Enterprise customers</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF PART 4 -->
        
    </div>
    <!-- END OF HERO SECTION -->
    
</body>
</html>