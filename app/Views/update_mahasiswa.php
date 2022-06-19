<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-white">

    <!-- NAVBAR -->
    <div class="bg-white/80 shadow fixed top-0 left-0 right-0 z-10 backdrop-blur-md">
      <div class="container mx-auto px-12">
        <div class="flex items-center justify-between py-4">
          <a href="<?php echo base_url() ?>" class="flex flex-row items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600 hover:animate-spin" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
              </svg>
            <h1 class="text-sky-600 text-xl ml-1">Teyvat University</h1>
          </a>  
          <div class="hidden sm:flex sm:items-center">  
            <a href="<?php echo base_url() ?>/dosen" class="text-gray-500 hover:text-sky-700 delay-75 duration-300 text-md font-normal mr-8">Dosen</a>
            <a href="<?php echo base_url() ?>/mahasiswa" class="text-gray-500 hover:text-sky-700 delay-75 duration-300 text-md font-normal mr-8">Mahasiswa</a>
            <a href="<?php echo base_url() ?>/matkul" class="text-gray-500 hover:text-sky-700 delay-75 duration-300 text-md font-normal mr-8">Mata Kuliah</a>
            
            <!-- PROFILE -->
            <div class="">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-600 hover:text-sky-700 delay-75 duration-300" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- END NAVBAR -->

    <!-- HERO SECTION -->
    <div class="flex flex-col mt-24 mx-36 border items-center mb-9 p-8">
        <h1 class="text-2xl font-medium text-neutral-600">Update Data Mahasiswa</h1>

        <div class="flex flex-col items-center py-6 w-full">
            <form action="<?php echo base_url() ?>/mahasiswa/save/<?= $mahasiswa['id_mhs']; ?>" method="post" class="w-1/3">
                <!-- NIM -->
                <label for="tnim" class="block mt-4">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> NIM </span>
                    <input name="tnim" type="number" maxlength="11" id="tnim" required value="<?= $mahasiswa['nim'] ?>" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>
                
                <!-- NAMA MHS -->
                <label for="tnama_mahasiswa" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Nama </span>
                    <input name="tnama_mahasiswa" type="text"  id="tnama_mahasiswa" required value="<?= $mahasiswa['nama'] ?>" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>
    
                <!-- KELAS -->
                <label for="tkelas" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Kelas </span>
                    <input name="tkelas" type="text" id="tkelas" required value="<?= $mahasiswa['kelas'] ?>" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>
                
                <!-- EMAIl MHS -->
                <label for="temail_mahasiswa" class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block after:bg-white text-sm font-medium text-slate-700"> Email </span>
                    <input name="temail_mahasiswa" type="email" id="temail_mahasiswa" value="<?= $mahasiswa['email'] ?>" class="peer mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 invalid:focus:outline-none">
                    <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">Masukkan email yang valid</p>
                </label>

                <!-- ALAMAT MHS -->
                <label for="talamat" class="block mt-1">
                    <span class="after:content-['*'] after:ml-0.3 after:text-red-500 block text-sm font-medium text-slate-700"> Alamat </span>
                    <input name="talamat" type="text"  id="talamat" required value="<?= $mahasiswa['alamat'] ?>" class="mt-3 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1">
                </label>

                <!-- BUTTON -->
                <div class="flex flex-row mt-4 w-full">
                    <div class="bg-white w-full">
                        <button name="btn-update" id="btn-update" type="submit" class="inline-flex justify-center py-2 px-4 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Update
                        </button>
                    </div>
                    
                    <div class="text-left bg-white ml-4">
                        <button name="cancel" type="reset" class="inline-flex justify-center py-2 px-4 border shadow-sm text-sm  rounded-md text-black bg-gray-100 hover:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-red-500 duration-300 delay-75"> 
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <!-- END OF HERO SECTION -->

    <!-- FOOTER -->
    <div class="mx-36 border-t border-b mb-8">
        <div class="flex flex-col items-center py-6 space-y-1">
            <p>Yosafat (2009929)</p> 
            <p class="text-xl text-sky-600">UAS Praktikum Web</p> 
        </div>
    </div>
    <!-- END OF FOOTER -->


</body>