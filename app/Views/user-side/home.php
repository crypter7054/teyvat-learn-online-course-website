<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <?php $session = session(); if ($session->has('email')) : ?>
      
      <title>
        <?php echo "Welcome - {$user['fname']}" ?>
      </title>

      <?php else : ?>
    
      <title>Home - Teyvat Learn</title>
    
    <?php endif; ?>


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
                <a href="<?php echo base_url() ?>/home" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Home</a>
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
                    <a href="<?php echo base_url() ?>/home" class="text-sky-500 hover:text-sky-500 delay-75 duration-300 text-md font-normal mr-8">Home</a>
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
              <div class=' hidden sm:flex sm:flex-row'>
                
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
    <div class="flex flex-col w-full pt-4 sm:pt-16 items-center pb-16">
      <div class="flex flex-col items-center  w-full">
        <!-- PART 1 -->
        <div class="flex sm:flex-row flex-col  mx-4 sm:mx-20">
          <div class="flex sm:flex-row flex-col">
            <div class="flex flex-col sm:w-[50%] w-full">
              <h1 class="sm:text-5xl text-2xl leading-snug font-medium pt-20 pb-8 hover:text-sky-500 duration-300 delay-75">Improve your Skill with Different Way</h1>
              
              <p class="pb-10 sm:text-left text-justify w-full">Teyvat Learn help you gain skills for jobs relevant to the martket over 100K courses for both teams and individuals.</p>
              <div class="flex">
                <a href="<?php echo base_url() ?>/course" class="flex flex-row items-center text-white bg-sky-500 shadow-md border border-sky-500 text-sm font-normal px-5 py-2 rounded-md hover:bg-sky-600 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 duration-300 delay-75"> Explore Course 
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                  </svg>
                </a>
              </div>
              
            </div>
            <div class="flex w-[60% ] sm:w-1/2  sm:pl-16">
              <img src="<?php echo base_url('public/home/home1.png'); ?>" alt="home1" class="max-h-[32rem]">
            </div>
          </div>
        </div>

        <!-- PART 2 -->
        <div class="flex sm:flex-row flex-col mx-4 sm:mx-20 px-4 py-4 sm:py-8 rounded-3xl my-16 border border-sky-200 bg-sky-50">
          <div class="w-full flex sm:flex-row flex-col">
            <div class="flex flex-col space-y-1 px-16 sm:px-24 py-4">
              <h1 class="text-3xl font-bold text-sky-500">52M+</h1>
              <p class="">Learners</p>
            </div>
            <div class="flex flex-col space-y-1 px-16 sm:px-24 py-4">
              <h1 class="text-3xl font-bold text-sky-500">196K+</h1>
              <p class="">Courses</p>
            </div>
            <div class="flex flex-col space-y-1 px-16 sm:px-24 py-4">
              <h1 class="text-3xl font-bold text-sky-500">68K+</h1>
              <p class="">Instructors</p>
            </div>
            <div class="flex flex-col space-y-1 px-16 sm:px-24 py-4">
              <h1 class="text-3xl font-bold text-sky-500">75</h1>
              <p class="">Languages</p>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- END OF HERO SECTION -->
    
    <!-- SECOND SECTION -->
    <div class="flex flex-col w-full items-center sm:-mt-0 -mt-16">
      <h1 class="sm:text-4xl text-3xl font-medium pb-16">Popular Course</h1>

      <div class="flex sm:flex-wrap flex-nowrap items-center sm:flex-row flex-col px-2 sm:px-20 justify-between">
        <!-- COURSE -->
        
        <?php foreach ($course as $row) :
          $ini = $row['photo_course']; ?>

        <a href= "<?php echo "detail/{$row['id_course']}"; ?>" class="rounded-2xl w-[15rem] sm:w-[16rem] bg-white mb-12 group border hover:-translate-y-5 border-sky-100 hover:bg-gradient-to-br hover:from-sky-300 hover:to-sky-500 duration-300 delay-100 flex flex-col items-center hover:ring-1 hover:ring-offset-4">
          <div class="sm:w-[15rem] w-[14rem] h-[10rem]">
            <img src="<?php echo base_url('public/file/'.$ini); ?>" alt="course1" class="w-full h-full opacity-[0.85] group-hover:opacity-100 duration-100 delay-75 rounded-t-xl rounded-b-sm sm:mt-2 mt-2">
          </div>
          <h1 class="text-lg font-medium pt-4 leading-tight px-4 pb-2 group-hover:text-white duration-100 delay-75"><?= $row['nama_course']; ?></h1>
          <div class="w-full flex flex-row justify-start ml-1 py-2 px-4 group-hover:text-white duration-300 delay-75">
              <div class="flex flex-row items-center justify-center mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 group-hover:text-white duration-100 delay-75" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                  </svg>
                  <p class="text-sm ml-1"><?= $row['category']; ?></p>
              </div>
              <div class="flex flex-row items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 group-hover:text-white duration-100 delay-75" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                    </svg>
                  <p class="text-sm ml-1"><?= $row['videos']; ?> Videos</p>
              </div>
          </div>
          
          <div class="flex flex-row w-full item justify-between pt-3 pb-4 px-4">
              <button id="login-button" class="w-[68%] text-sky-500 bg-white border border-sky-500 text-sm font-normal px-6 py-2 rounded-lg hover:ring-1 focus:outline-none focus:ring-1 hover:border-none hover:ring-white hover:ring-offset-1 focus:ring-offset-2 focus:ring-white duration-300 delay-75"> Enroll </button>
              <h1 class=" bg-sky-400 border group-hover:bg-white duration-100 delay-75 group-hover:text-sky-500 group-hover:outline-none rounded-xl px-3 py-2 text-lg font-[500px] text-white tracking-wide">$<?= $row['price']; ?></h1>
          </div>
        </a>

        <?php endforeach; ?>

        <!-- COURSE -->
    </div>
    </div>
    <!-- END OF SECOND SECTION -->

    <h1 class="sm:text-4xl text-3xl font-medium pb-12 text-center">Our Partners</h1>

    <!-- THIRD SECTION -->
    <div class="flex sm:flex-row flex-col w-full bg-sky-50 items-center mb-16">

      <div class="flex sm:flex-row flex-col w-full py-8 sm:space-y-0 space-y-12 items-center  justify-around ">
        <a href="https://www.udemy.com/" class="flex max-w-[8rem] opacity-70 hover:opacity-100 duration-300 delay-75">
          <img src="<?php echo base_url('public/home/home2.png'); ?>" alt="logo udemy">
        </a>
        <a href="https://www.coursera.org/" class="flex max-w-[8rem] opacity-70 hover:opacity-100 duration-300 delay-75">
          <img src="<?php echo base_url('public/home/home3.png'); ?>" alt="logo udemy">
        </a>
        <a href="https://www.udacity.com/" class="flex max-w-[8rem] opacity-70 hover:opacity-100 duration-300 delay-75">
          <img src="<?php echo base_url('public/home/home4.png'); ?>" alt="logo udemy">
        </a>
        <a href="https://id.khanacademy.org/" class="flex max-w-[8rem] opacity-70 hover:opacity-100 duration-300 delay-75">
          <img src="<?php echo base_url('public/home/home5.png'); ?>" alt="logo udemy">
        </a>
      </div>
    </div>
    <!-- END OF THIRD SECTION -->

</body>
</html>