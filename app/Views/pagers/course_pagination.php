      
      
<?php $pager->setSurroundCount(2) ?>

<div class="flex justify-center border rounded-md">
    <nav aria-label="Page navigation" class="">
    
        <ul class="pagination flex list-style-none">
            <!-- <li>
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </li> -->
            <li class="page-item">
                <a class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 focus:shadow-none" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                </a>
            </li>
    
        <?php foreach ($pager->links() as $link): ?>
            <li <?= $link['active'] ? 'class="active text-sky-500"' : '' ?>>
                <a class="page-link relative block py-1.5 px-3 border-l border-r bg-transparent outline-none transition-all duration-300  hover:text-gray-800 hover:bg-gray-200 focus:shadow-none" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
    
            <li class="page-item">
                <a class="page-link relative block py-1.5 px-3 border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                </a>
            </li>
            <!-- <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li> -->
        </ul>
    </nav>
</div>



