<?= $this->extend('layouts/main')?>
<?= $this->section('page_title') ?> 
Transaction
<?= $this->endSection() ?>

<?= $this->section('content')?>
<div class="mt-10">
<?php if (session()->has('success')): ?>
        <span class="block bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-sm mt-2">
            <?= session('success') ?>
        </span>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <span class="block bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm mt-2">
            <?= session('error') ?>
        </span>
    <?php endif; ?>
</div>
<div class="text-2xl font-semibold">
    Pembayaran
</div>
<div class="">
    <div class="flex items-center mt-5">
        <img src="<?= $service->service_icon ?>" alt="">    
        <div class="font-semibold text-xl ml-5">
            <?= $service->service_name ?>
        </div>
    </div>
    <div class="w-full mt-10">
        <form action="/dashboard/transaction-process" method="post" enctype="multipart/form-data">
            <div class="relative flex items-center">
                <div class="absolute start-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="oklch(55.1% 0.027 264.364)"><path d="M600-320h120q17 0 28.5-11.5T760-360v-240q0-17-11.5-28.5T720-640H600q-17 0-28.5 11.5T560-600v240q0 17 11.5 28.5T600-320Zm40-80v-160h40v160h-40Zm-280 80h120q17 0 28.5-11.5T520-360v-240q0-17-11.5-28.5T480-640H360q-17 0-28.5 11.5T320-600v240q0 17 11.5 28.5T360-320Zm40-80v-160h40v160h-40Zm-200 80h80v-320h-80v320ZM80-160v-640h800v640H80Zm80-560v480-480Zm0 480h640v-480H160v480Z"/></svg>
                </div>
                <input type="text" class="hidden" value="<?= $service->service_code; ?>" name="service" >
                <input type="number" class="hidden" value="<?= $service->service_tariff; ?>" name="tariff" >
                <input type="number" class="hidden" value="<?= $saldo; ?>" name="balance" >
                <input id="amount" value="<?= number_format($service->service_tariff, 0,',','.')?>" name="amount" type="text" class="font-semibold pl-14 border border-gray-300 p-3 w-full rounded-md" >
            </div>
            <div class="mt-5">
                <button type="submit" class="hover:bg-red-700 cursor-pointer w-full bg-[#f13b2f] text-white rounded-md p-3">Top Up</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection()?>
