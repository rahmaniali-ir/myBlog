<?php

function getTitle() {
    return 'Ali Rahmani';
}

function getContent() {
global $icons;

function getName($file) {
    $pos = strrpos($file, '/');
    $name = str_replace('.jpg', '',substr($file, $pos, strlen($file) - $pos));
    $name = str_replace('.jpeg', '',$name);
    $name = str_replace('/', '',$name);
    return $name;
}

$images = glob('src/image/*');

$socialMedias = [
    [
        'title' => 'Twitter',
        'url' => 'https://twitter.com/rahmaniali_ir',
        'icon' => 'twitter'
    ],
    [
        'title' => 'Github',
        'url' => 'https://github.com/rahmaniali-ir',
        'icon' => 'github'
    ],
    [
        'title' => 'Codepen',
        'url' => 'https://codepen.io/rahmaniali_ir',
        'icon' => 'codepen'
    ]
];

$categories = [
    [
        'name' => 'programming',
        'title' => 'برنامه نویسی',
        'image' => 'programming.jpg',
        'color' => [
            '#0ac',
            '#f55'
        ]
    ],
    [
        'name' => 'life',
        'title' => 'برنامه نویسی',
        'image' => 'life.jpg',
        'color' => [
            '#0fa',
            '#580'
        ]
    ]
];

?>
<header class="greeting">
    <div class="right">
        <h1>سلام، علی رحمانی اینجاست!</h1>

        <p>
            من دانشجوی کاردانی نرم افزار در دانشگاه محمد منتظری مشهدم.
            کنجکاوم، و دنبال چیزای جدید
            :)
            اینجا چیزایی که برام جالبن رو به اشتراک میزارم.
        </p>

        <div class="social-box">
            <?php foreach($socialMedias as $social): ?>
            <a href="<?= $social['url']; ?>" title="<?= $social['title']; ?>" target="_blank">
                <?= icon($social['icon']); ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="left">
        <div class="posts">
            <?php for($i = 0; $i < 6; $i++): ?>
            <a class="post" href="#">
                <div class="place-holder">
                    <span><?= getName($images[$i]); ?></span>
                </div>
                <div class="image">
                    <img src="<?= $images[$i]; ?>" alt="#">
                </div>
            </a>
            <?php endfor; ?>

            <div class="hint">مطالب تصادفی</div>
        </div>
    </div>

    <div class="go-down">
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
            <?php foreach($categories as $category): ?>
            <a href="#<?= $category['name']; ?>">
                <img src="src/image/<?= $category['image']; ?>" alt="<?= $category['name']; ?>">

                <span><?= $category['title']; ?></span>
            </a>
            <?php endforeach; ?>
        </section>
    </aside>

    <main>
        <?php for($i = 3; $i < 8; $i++): ?>
        <a href="#" class="post">
            <article>
                <div class="image">
                    <img src="<?= $images[$i]; ?>" alt="#">
                </div>

                <div class="details">
                    <h2>عنوان مطلب</h2>
                </div>
            </article>
        </a>
        <?php endfor; ?>
    </main>
</section>
<?php
}
?>