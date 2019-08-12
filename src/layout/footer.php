    <footer>
        Footer
    </footer>

    <script src="<?= getHomeURL('src/layout/script.js'); ?>"></script>
    <?php if(file_exists('src/layout/module/' . loadedModule() . '.js')): ?>
    <script src="src/layout/module/<?= loadedModule(); ?>.js"></script>
    <?php endif; ?>
    </body>
</html>