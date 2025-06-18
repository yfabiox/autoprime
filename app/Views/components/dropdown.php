<!-- Filtro  -->
<div class="relative custom-dropdown">
    <label class="block text-gray-300 text-center font-semibold mb-2"> <?= esc($title) ?></label>
    <button type="button"
        class="font-medium dropdown-btn bg-gray-200 w-full py-3 px-4 border-2 border-gray-300 rounded-lg text-center">
        <?= esc($default_text) ?>
    </button>
    <input type="hidden" name="<?= esc($name) ?>" class="dropdown-input">
    <div
        class="dropdown-menu hidden absolute w-full bg-white border border-gray-300 rounded-lg mt-1 shadow-lg max-h-40 overflow-y-auto z-10">
        <div class="dropdown-item py-2 px-4 hover:bg-gray-200 cursor-pointer" data-value=""><?= esc($default_text) ?>
        </div>
        <?php foreach ($items as $key => $value): ?>
        <div class="dropdown-item py-2 px-4 hover:bg-gray-200 cursor-pointer" data-value="<?= esc($key); ?>">
            <?= esc($value); ?></div>
        <?php endforeach; ?>
    </div>
</div>