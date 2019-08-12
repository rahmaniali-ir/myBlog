    <footer>
        Footer
    </footer>

    <script src="<?= getHomeURL('src/layout/script.js'); ?>"></script>
    <?php if(file_exists('src/layout/module/' . loadedModule() . '/script.js')): ?>
    <script src="src/layout/module/<?= loadedModule(); ?>/script.js"></script>
    <?php endif; ?>
    </body>
</html>