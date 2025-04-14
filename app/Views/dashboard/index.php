<?= $this->extend('layouts/main')?>
<?= $this->section('page_title') ?>
Dashboard
<?= $this->endSection() ?>
<?= $this->section('content')?>
<div class="mt-10 w-full overflow-x-auto">
<?php if (session()->has('success')): ?>
            <span class="block bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-sm">
                <?= session('success') ?>
            </span>
        <?php endif; ?>
    
        <?php if (session()->has('error')): ?>
            <span class="block bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <?= session('error') ?>
            </span>
<?php endif; ?>
  <div class="flex gap-7 justify-center flex-wrap px-2">
    <?php foreach($services as $item): ?>
      <a href="/dashboard/transaction/?service=<?= $item->service_code?>" class="flex flex-col items-center w-fit px-2 py-2 bg-white rounded-lg shadow-md hover:shadow-xl transition">
        <div class="flex items-center justify-center rounded-md mb-2 bg-gray-100">
          <img class="object-contain" src="<?= $item->service_icon ?>" alt="<?= $item->service_name ?>" />
        </div>
        <p class="text-xs text-center break-words leading-tight max-w-[4rem]">
          <?= $item->service_name ?>
        </p>
      </a>
    <?php endforeach; ?>
  </div>
</div>
<div class="mt-8">
  <div class="text-xl font-semibold">Temukan promo menarik</div>
  <div class="mt-5 overflow-x-auto whitespace-nowrap scrollbar-hide">
    <?php foreach ($banners as $item) { ?>
      <img 
        src="<?= $item->banner_image; ?>" 
        alt="<?= $item->description; ?>" 
        class="inline-block w-60 md:w-1/5 lg:w-1/5 object-cover rounded-md shadow-sm mr-4"
      >
    <?php } ?>    
  </div>
</div>
<?= $this->endSection()?>