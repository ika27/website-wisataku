<?php if ($pager): ?>
    <?php
    // Ambil info dasar dari PagerRenderer
    $currentPage = $pager->getCurrentPageNumber();
    $pageCount   = $pager->getPageCount();

    // Ambil semua link yang dihasilkan renderer (array of ['title','uri','active'])
    $allLinks = $pager->links();
    // buat map title => uri agar kita bisa mendapatkan URI tiap nomor halaman
    $uriMap = [];
    foreach ($allLinks as $l) {
        // beberapa renderer menambahkan label seperti "Prev"/"Next" - hanya ambil numeric title
        $uriMap[(string)$l['title']] = $l['uri'];
    }

    // fungsi bantu untuk menentukan halaman yang akan ditampilkan
    $visiblePages = function (int $currentPage, int $pageCount): array {
        $pages = [];

        // selalu tampilkan 1..3 awal
        for ($i = 1; $i <= min(3, $pageCount); $i++) {
            $pages[] = $i;
        }

        // tambahkan halaman sekitar current page (2 di kiri/kanan)
        for ($i = $currentPage - 2; $i <= $currentPage + 2; $i++) {
            if ($i > 0 && $i <= $pageCount) {
                $pages[] = $i;
            }
        }

        // tambahkan 3 terakhir
        for ($i = max($pageCount - 2, 1); $i <= $pageCount; $i++) {
            $pages[] = $i;
        }

        // unikkan dan urutkan
        $pages = array_values(array_unique($pages));
        sort($pages);

        return $pages;
    };

    $pagesToShow = $visiblePages($currentPage, $pageCount);
    ?>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center m-0">

            <!-- Previous -->
            <?php if ($pager->hasPrevious()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= esc($pager->getPreviousPage()) ?>" aria-label="Previous">&laquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            <?php endif; ?>

            <!-- Pages (gunakan uriMap untuk membuat link) -->
            <?php
            $last = 0;
            foreach ($pagesToShow as $p):
                if ($p - $last > 1): ?>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                <?php endif;

                $isActive = ($p === $currentPage);
                $title = (string)$p;
                $uri = $uriMap[$title] ?? '#'; // fallback '#'
                ?>
                <li class="page-item <?= $isActive ? 'active' : '' ?>">
                    <a class="page-link" href="<?= esc($uri) ?>"><?= $title ?></a>
                </li>
            <?php
                $last = $p;
            endforeach;
            ?>

            <!-- Next -->
            <?php if ($pager->hasNext()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= esc($pager->getNextPage()) ?>" aria-label="Next">&raquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            <?php endif; ?>

        </ul>
    </nav>
<?php endif; ?>