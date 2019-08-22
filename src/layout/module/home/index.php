<?php

function getTitle() {
    return 'Ali Rahmani';
}

function getContent() {
global $icons;
$lorem = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.';

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
        'color' => '#0ac'
    ],
    [
        'name' => 'life',
        'title' => 'زندگی',
        'color' => '#0fa'
    ],
    [
        'name' => 'personal',
        'title' => 'شخصی',
        'color' => '#f55'
    ],
    [
        'name' => 'book',
        'title' => 'کتاب',
        'color' => '#9500FF'
    ],
    [
        'name' => 'goof',
        'title' => 'مسخره بازی',
        'color' => '#FDB90A'
    ]
];

$posts = [
    [
        'id' => 1,
        'title' => 'متن پست',
        'categories' => [
            0,
            1,
            2
        ],
        'image' => $images[0],
        'summery' => $lorem,
        'date' => '1398/06/01'
    ],
    [
        'id' => 2,
        'title' => 'متن پست',
        'categories' => [
            4,
            2
        ],
        'image' => $images[0],
        'summery' => $lorem,
        'date' => '1398/06/01'
    ],
    [
        'id' => 3,
        'title' => 'متن پست',
        'categories' => [
            3
        ],
        'image' => $images[0],
        'summery' => $lorem,
        'date' => '1398/06/01'
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
                <div class="icon" style="color: <?= $category['color']; ?> ;">
                    <span><?= mb_substr($category['title'], 0, 1); ?></span>
                </div>

                <span class="name"><?= $category['title']; ?></span>
            </a>
            <?php endforeach; ?>
        </section>
    </aside>

    <main>
        <?php foreach($posts as $post): ?>
        <a href="#" class="post">
            <article>
                <div class="image">
                    <img src="<?= $post['image']; ?>" alt="#">
                </div>

                <div class="details">
                    <h2><?= $post['title'] ?></h2>

                    <div class="categories">
                        <?php
                        foreach($post['categories'] as $categoryKey):
                        $category = $categories[$categoryKey];
                        ?>
                        <div title="#<?= $category['title']; ?>">
                            <div class="icon" style="color: <?= $category['color']; ?> ;">
                                <span><?= mb_substr($category['title'], 0, 1); ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <time><?= $post['date']; ?></time>
                </div>
            </article>
        </a>
        <?php endforeach; ?>
    </main>
</section>
<?php
}
?>