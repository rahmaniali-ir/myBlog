    <footer>
        <div class="copyright">تمامی حقوق محفوظ است. &copy; <?= date('Y'); ?></div>
        
        <div class="socialMedia">
            <a href="#" class="item" title="Instagram" target="_blank"><?= $icons['instagram']; ?></a>
            <a href="#" class="item" title="Twitter" target="_blank"><?= $icons['twitter']; ?></a>
            <a href="#" class="item" title="Telegram" target="_blank"><?= $icons['telegram']; ?></a>
        </div>
    </footer>

    <script src="<?= getHomeURL('src/layout/script.js'); ?>"></script>
    <?php if(file_exists('src/layout/module/' . loadedModule() . '.js')): ?>
    <script src="src/layout/module/<?= loadedModule(); ?>.js"></script>
    <?php endif; ?>
    </body>
</html>