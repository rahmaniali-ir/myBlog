<?php

require_once('config.php');

function getName($file) {
    $pos = strrpos($file, '/');
    $name = str_replace('.jpg', '',substr($file, $pos, strlen($file) - $pos));
    $name = str_replace('.jpeg', '',$name);
    $name = str_replace('/', '',$name);
    return $name;
}

$images = glob('src/img/*');
shuffle($images);

?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ali Rahmani</title>

    <link rel="stylesheet" href="src/style.css">
</head>

<body>
    <header class="overview">
        <div class="right">
            <h1>سلام، علی رحمانی اینجاست!</h1>
            <p>
                <img src="src/img/ali.jpg" alt="Ali Rahmani" class="image">
                من دانشجوی کاردانی نرم افزار در دانشگاه محمد منتظری مشهدم.
                کامپیوتر ها رو دوست دارم، و دوست دارم بقیه هم دوستش داشته باشن
                :)

                سعی من اینه که اینجا چیزایی که یاد دارمو دوستانه و به یه زبون خودم به اشتراک بزارم.
                میتونی منو توی
                <a href="#">توییتر</a>،
                <a href="#">اینستاگرام</a> یا
                <a href="#">تلگرام</a>
                پیدا کنی!
            </p>
        </div>

        <div class="left">
            <div class="posts">
                <?php for($i = 0; $i < 6; $i++): ?>
                <a class="post" href="#">
                    <div class="placeHolder">
                        <span><?= getName($images[$i]); ?></span>
                    </div>
                    <div class="image">
                        <img src="<?= $images[$i]; ?>" alt="#">
                    </div>
                </a>
                <?php endfor; ?>

                <div class="hit">
                    <span>مطالب تصادفی</span>
                    <div class="icon"><?= icon('curvedDown'); ?></div>
                </div>
            </div>
        </div>

        <div class="goDown">
            <span>بقیش این پایینه</span>
            <div class="icon"><?= icon('rotatedArrow'); ?></div>
        </div>
    </header>

    <section class="content">
        <aside>
            <header>
                <span>دسته بندی ها:</span>
            </header>

            <section class="categories">
                <?php for($i = 0; $i < 10; $i++): ?>
                <a href="#">
                    <div class="icon"><?= icon('dashboard'); ?></div>
                    <span>دسته بندی ۱</span>
                </a>
                <?php endfor; ?>
            </section>
        </aside>

        <main>
            <article>
                <header>
                    <h1>POST1</h1>
                </header>
            </article>

            <article>
                <header>
                    <h1>POST2</h1>
                </header>
            </article>
        </main>
    </section>

    <script src="src/script.js"></script>
</body>

</html>