<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <?php $session = session(); if ($session->has('email')) : ?>
      
      <title>
        <?php echo "Success Enrollment - {$user['fname']}" ?>
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
    
    <!-- MAIN SECTION -->
    <div class="mt-16">
        <div class="flex flex-col items-center text-sky-500 py-36">
            <div class="flex flex-col items-center">
                <h1 class="text-4xl mb-6">Successful Enrollment</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <div class="w-auto mt-12">
                    <a href="<?php echo base_url() ?>/home" class="flex flex-row justify-center items-center py-2 px-4 border border-sky-500 shadow-sm text-sm rounded-md text-sky-600 bg-white hover:bg-sky-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-sky-500 duration-300 delay-75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                        </svg>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MAIN SECTION -->

</body>
</html>