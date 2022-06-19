<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin </title>

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
            <a href="#" class="group flex flex-row items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500 group-hover:animate-spin" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M17.293     13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                </svg>
              <h1 class="text-sky-500 text-xl ml-1">Teyvat Learn - Admin</h1>
            </a>  
            <!-- END OF LOGO -->

            
            
            
          </div>
        </div>
      </div>
    <!-- END OF NAVBAR -->

    <!-- FORM LOGIN -->
    <div class="flex flex-col py-28 items-center">
      <form action="<?php echo base_url() ?>/process_admin" method="post" class="mt-10 shadow-lg rounded-xl py-12 px-10 md:w-1/3 sm:w-5/6">
          <h1 class="text-3xl text-gray-600 font-normal pb-10 text-center"> Login Account </h1>
          
          <!-- USERNAME -->
          <label for="username" class="block mt-2">
              <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Username </span>
              <input name="username" type="username" placeholder="Username" required class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
          </label>
          
          <!-- PASSWORD -->
          <label for="password" class="block mt-6">
              <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Password </span>
              <input name="password" type="password" placeholder="Password" required class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
          </label>
          
          <!-- BUTTON LOGIN -->
          <div class="flex flex-row">
              <div class="py-3 text-left w-full bg-white mt-8">
                  <input name="login" type="submit" value="Login" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-sky-500 hover:bg-sky-500 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-sky-500 w-full " />
              </div>
          </div>

          <!-- SESSION -->
          <?php if(!empty(session()->getFlashdata('error'))) : ?>
          <div class="text-pink-600 font-medium mt-5">
              <?php echo session()->getFlashdata('error'); ?>
          </div>

          <?php endif; ?>
      </form>
  </div>
  
  <!-- END OF FORM LOGIN -->
    
</body>
</html>