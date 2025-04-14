<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title><?= $this->renderSection('page_title', true) ?> - SIMS PPOB - AHMAD RIZKI AKBAR GANIYU</title>
      <style>
         .scrollbar-hide::-webkit-scrollbar {
         display: none;
         }
         .scrollbar-hide {
         -ms-overflow-style: none;  
         scrollbar-width: none;    
         }
      </style>
   </head>
   <body>
      <nav class="p-5 border-gray-200 shadow-md bg-white">
         <div class="container mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center">
               <a href="/dashboard" class="flex items-center gap-2">
               <img src="/assets/images/Logo.png" alt="Logo" class="h-8 w-auto">
               <span class="text-2xl font-semibold">SIMS PPOB</span>
               </a>
               <div class="md:hidden">
                  <button id="menu-toggle" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16"></path>
                     </svg>
                  </button>
               </div>
               <div id="menu" class="hidden md:flex md:items-center md:gap-10 text-xl mt-4 md:mt-0">
                  <div class="<?= ($uri->getPath() == '/dashboard/balance') ? 'font-bold text-red-500' : '' ?>">
                     <a href="/dashboard/balance">Top Up</a>
                  </div>
                  <div class="<?= ($uri->getPath() == '/dashboard/history-transaction') ? 'font-bold text-red-500' : '' ?>">
                     <a href="/dashboard/history-transaction">Transaction</a>
                  </div>
                  <div class="<?= ($uri->getPath() == '/dashboard/setting-profile') ? 'font-bold text-red-500' : '' ?>">
                     <a href="/dashboard/setting-profile">Akun</a>
                  </div>
               </div>
            </div>
            <div id="mobile-menu" class="md:hidden hidden mt-4 space-y-4 text-xl">
               <div class="<?= ($uri->getPath() == '/dashboard/balance') ? 'font-bold text-red-500' : '' ?>">
                  <a href="/dashboard/balance">Top Up</a>
               </div>
               <div class="<?= ($uri->getPath() == '/dashboard/history-transaction') ? 'font-bold text-red-500' : '' ?>">
                  <a href="/dashboard/history-transaction">Transaction</a>
               </div>
               <div class="<?= ($uri->getPath() == '/dashboard/setting-profile') ? 'font-bold text-red-500' : '' ?>">
                  <a href="/dashboard/setting-profile">Akun</a>
               </div>
            </div>
         </div>
      </nav>
      <?php
         $path = $uri->getPath(); 
         if($path != '/dashboard/setting-profile'){
         ?>
      <div class="container mx-auto p-5">
         <div class="lg:flex-row lg:justify-items-center flex flex-col lg:justify-between mt-5">
            <div class="flex flex-col items-center text-center md:items-start md:text-left">
                <div class="border border-gray-400 w-max rounded-full p-1">
                    <img class="w-16 h-16 rounded-full object-cover" src="<?= $profile_image ?>" alt="Profile Photo">
                </div>
                <div class="text-xl mt-5">Selamat Datang,</div>
                <div class="text-3xl font-bold lg:mt-3 mb-2 lg:mb-0 text-gray-800">
                    <?= esc($first_name) .' '. esc($last_name) ?>
                </div>
            </div>
            <div class="w-max items-center mx-auto md:mx-0 md:mt-0 mt-5">
                <div class="relative w-[300px] lg:w-[800px] md:w-max rounded-xl overflow-hidden">
                    <img class="w-full h-[162px] object-cover" src="/assets/images/background_saldo.png" alt="Background Saldo">
                    <div class="absolute top-0 mt-1 left-0 w-full h-full p-6 text-white flex flex-col justify-center">
                        <div>Saldo anda</div>
                        <div class="mt-3 font-bold md:text-4xl text-2xl" id="balance">Rp <?= number_format($saldo, 0, ',', '.') ?></div>
                        <div class="mt-5 cursor-pointer" id="btnClose" onclick="closeOpen()">Tutup saldo</div>
                    </div>
                </div>
            </div>
         </div>
         <?php } ?>
         <?= $this->renderSection('content') ?>
      </div>
      <script>
         let isHidden = false;
         
         function closeOpen() {
             const balance = document.getElementById('balance');
             const btnClose = document.getElementById('btnClose');
             const original = balance.getAttribute('data-original');
             if (!isHidden) {
                 balance.setAttribute('data-original', balance.textContent); 
                 
                 balance.textContent = 'Rp ' + '•••••••'
                 btnClose.textContent = 'Tampilkan';
                 isHidden = true;
             } else {
                 balance.textContent = original;
                 btnClose.textContent = 'Tutup saldo';
                 isHidden = false;
             }
         }
         
         const menuToggle = document.getElementById('menu-toggle');
         const mobileMenu = document.getElementById('mobile-menu');
         
         menuToggle.addEventListener('click', () => {
             mobileMenu.classList.toggle('hidden');
         });
         
      </script>
   </body>
</html>