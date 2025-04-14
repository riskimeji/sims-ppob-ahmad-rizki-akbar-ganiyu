<?= $this->extend('layouts/main') ?>
<?= $this->section('page_title') ?> 
History Transaction
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="">
    <div class="text-2xl font-semibold mt-10">
        Semua Transaksi
    </div>
    <div class="mt-8">
        <div class="flex flex-col gap-y-6">
            <?php
            foreach($histories->data->records as $item){
            ?>
            <div class="p-4 px-8 border border-gray-300 rounded-md">
                <div class="flex justify-between items-center">
                    <div class="<?= $item->transaction_type == 'TOPUP' ? 'text-green-400' : 'text-red-400' ?> text-2xl font-bold">
                        <?= $item->transaction_type == 'TOPUP' ? '+ ' : '- ' ?>Rp. <?= number_format($item->total_amount, 0, ',', '.') ?>
                    </div>
                    <div class=""><?= $item->description ?></div>
                </div>
                <?php 
                $datetime = new DateTime($item->created_on);
                $datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
                
                $formatter = new IntlDateFormatter(
                    'id_ID',
                    IntlDateFormatter::LONG,
                    IntlDateFormatter::SHORT,
                    'Asia/Jakarta',
                    IntlDateFormatter::GREGORIAN,
                    'dd MMMM yyyy HH:mm'
                );
                ?>
                <div class="text-gray-400"><?= $formatter->format($datetime)?> WIB</div>
            </div>
            <?php }  
            ?>
        </div>
    </div>

    <?php
    $total_records = count($histories->data->records);
    ?>

    <?php if ($total_records > 0): ?>
        <?php if (!$isLastPage): ?>
            <a href="?offset=<?= $offset ?>" class="text-xl font-semibold text-red-500 text-center mt-2 block">
                Show More
            </a>
        <?php else: ?>
            <div class="text-xl font-semibold text-red-500 text-center mt-2">
                <a href="/dashboard/history-transaction">Refresh</a>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-sm text-gray-400 text-center mt-2">Maaf tidak ada history transaksi saat ini</div>
    <?php endif; ?>

</div>
<?= $this->endSection() ?>
