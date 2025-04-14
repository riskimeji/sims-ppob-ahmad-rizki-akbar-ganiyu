<?= $this->extend('layouts/main')?>
<?= $this->section('page_title') ?> 
Top Up Balance
<?= $this->endSection() ?>

<?= $this->section('content')?>
<div class="">
    <div class="text-xl mt-10">
        Silahkan masukan
    </div>
    <div class="text-3xl font-bold text-gray-800">
        Nominal Top Up
    </div>
    <div class="md:flex md:justify-center gap-2 w-full mt-15">
        <div class="w-full">
            <form action="/dashboard/topup-processing" method="post">
                <div class="relative flex items-center">
                    <div class="absolute start-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="oklch(55.1% 0.027 264.364)"><path d="M600-320h120q17 0 28.5-11.5T760-360v-240q0-17-11.5-28.5T720-640H600q-17 0-28.5 11.5T560-600v240q0 17 11.5 28.5T600-320Zm40-80v-160h40v160h-40Zm-280 80h120q17 0 28.5-11.5T520-360v-240q0-17-11.5-28.5T480-640H360q-17 0-28.5 11.5T320-600v240q0 17 11.5 28.5T360-320Zm40-80v-160h40v160h-40Zm-200 80h80v-320h-80v320ZM80-160v-640h800v640H80Zm80-560v480-480Zm0 480h640v-480H160v480Z"/></svg>
                    </div>
                    <input id="amount" required name="top_up_amount" type="text" class="focus:font-semibold pl-14 focus:outline-none border border-gray-300 p-3 w-full rounded-md" placeholder="Masukan nominal top up">
                </div>
                <div class="mt-2">
                    <button type="submit" id="btn" disabled class=" cursor-pointer w-full bg-gray-500 text-white rounded-md p-3">Top Up</button>
                </div>
            </form>
        </div>
        <div class="md:w-4xl mt-2 md:mt-0 gap-3 grid md:grid-cols-3 grid-cols-2">
            <span onclick="valueBalance('10.000')" class="p-3 text-center cursor-pointer hover:bg-gray-100 rounded-md text-gray-400 border border-gray-300">Rp10.000</span>
            <span onclick="valueBalance('20.000')" class="p-3 text-center cursor-pointer hover:bg-gray-100 rounded-md text-gray-400 border border-gray-300">Rp20.000</span>
            <span onclick="valueBalance('50.000')" class="p-3 text-center cursor-pointer hover:bg-gray-100 rounded-md text-gray-400 border border-gray-300">Rp50.000</span>
            <span onclick="valueBalance('100.000')" class="p-3 text-center cursor-pointer hover:bg-gray-100 rounded-md text-gray-400 border border-gray-300">Rp100.000</span>
            <span onclick="valueBalance('250.000')" class="p-3 text-center cursor-pointer hover:bg-gray-100 rounded-md text-gray-400 border border-gray-300">Rp250.000</span>
            <span onclick="valueBalance('500.000')" class="p-3 text-center cursor-pointer hover:bg-gray-100 rounded-md text-gray-400 border border-gray-300">Rp500.000</span>
        </div>
    </div>
</div>
<?php if(session()->has('message_error') || session()->has('message_success')): ?>
<div id="popup-notification" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
  <div class="bg-white rounded-2xl p-6 w-full max-w-sm text-center shadow-lg">
    <div class="flex justify-center mb-4">
      <div class="<?= session()->has('message_error') ? 'bg-red-500' : 'bg-green-500' ?> rounded-full w-16 h-16 flex items-center justify-center">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <?php if(session()->has('message_error')): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          <?php else: ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          <?php endif; ?>
        </svg>
      </div>
    </div>

    <p class="text-gray-700">Top Up sebesar</p>
    <h1 class="text-2xl font-bold text-gray-900">Rp<?= old('top_up_amount'); ?></h1>

    <?php if(session()->has('message_error')): ?>
      <p class="text-gray-500 mt-1"><?= session('message_error') ?></p>
    <?php else: ?>
      <p class="text-black mt-1"><?= session('message_success') ?></p>
    <?php endif; ?>

    <a href="/dashboard" class="mt-4 inline-block no-underline <?= session()->has('message_error') ? 'text-red-600' : 'text-green-600' ?> font-semibold hover:underline">
      Kembali ke Beranda
    </a>
  </div>
</div>
<?php endif; ?>
<script>
    var amount = document.getElementById('amount')
    var btn = document.getElementById('btn');

    btn.addEventListener('click', function(){

    });

    function valueBalance(nominal){
        amount.value = nominal;
        var btn = document.getElementById('btn');
        btn.removeAttribute('disabled');
        btn.classList.remove('bg-gray-500')
        btn.classList.add('bg-[#f13b2f]');
        btn.classList.add('hover:bg-red-700');
        
    }

    amount.addEventListener("input", function () {
        btn.removeAttribute('disabled');
        btn.classList.remove('bg-gray-500')
        btn.classList.add('bg-[#f13b2f]');
        btn.classList.add('hover:bg-red-700');
        let raw = amount.value.replace(/[^0-9.]/g, "");
        let numeric = raw.replace(/\./g, "");
        amount.value = numeric.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        
    });

    document.addEventListener('click', function(e) {
    const modal = document.getElementById('popup-notification');
    const box = modal.querySelector('.bg-white');

    if (!box.contains(e.target)) {
      modal.style.display = 'none';
    }
  });

</script>
<?= $this->endSection()?>
