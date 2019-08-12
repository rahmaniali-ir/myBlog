<?php

function courseCard($course) {

$user = isSignin() ? getCurrentUser() : null;
$userId = $user ? $user['id'] : null;

$courseId = $course['courseId'];
$time = new Time(explode(':', $course['duration']));

$levels = [
    'مقدماتی',
    'متوسط',
    'پیشرفته'
];

?>

<div class="course">
    <div class="topSection">
        <img src="src/img/<?= $course['image']; ?>" alt="<?= $course['title']; ?>">

        <div class="action">
            <div class="bottom right">
                <?php
                if(isSignin()):
                    $isInCart = recordExists('cart', "course = $courseId AND user = $userId;");

                    $text = 'افزودن به سبد';
                    $classes = 'primary addToCart';
                    $icon = 'icon1';
                    if($isInCart) {
                        $text = 'حذف از سبد';
                        $classes = 'wrong removeFromCart';
                        $icon = 'icon2';
                    }
                ?>
                <button class="button shadow <?= $classes; ?>" data-course="<?= $courseId; ?>">
                    <div class="icons <?= $icon; ?>">
                        <div class="icon"><?= icon('cart'); ?></div>
                        <div class="icon"><?= icon('removeFromCart'); ?></div>
                    </div>
                    <div class="text"><?= $text; ?></div>
                </button>
                <?php else: ?>
                <a class="button backlight inline shadow cart"
                    href="authentication#signin">
                    <div class="icon"><?= icon('user'); ?></div>
                    <div class="text">ورود برای خرید</div>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="title">
        <div class="tags">
            <a href="category?id=<?= $course['categoryId']; ?>">
                <?= $course['categoryTitle']; ?>
            </a>
            <a class="success"href="#">جدید</a>
        </div>
        <a href="course?id=<?= $course['courseId']; ?>" class="name">
        <h1><?= $course['title']; ?></h1></a>
    </div>

    <div class="price">
        <div class="offed">
            <?php
            if($course['courseOffPercent'] > 0) {
                echo faNumber(priceFormat($course['price']));
            } else {
                echo '&nbsp;';
            }
            ?>
        </div>
        <div class="final">
            <?php
            if($course['price'] > 0) {
                echo faNumber(priceFormat(calcPrice($course['price'], $course['courseOffPercent'])));
                echo '<span>تومان</span>';
            } else {
                echo 'رایگان';
            }
            ?>
        </div>
    </div>

    <div class="details">
        <div class="item" title="طول دوره">
            <div class="icon"><?= icon('timer'); ?></div>
            <div><?= faNumber($time); ?></div>
        </div>

        <div class="item" title="سطح">
            <div class="icon level<?= $course['level']; ?>"><?= icon('level'); ?></div>
            <div><?= $levels[$course['level'] - 1]; ?></div>
        </div>
    </div>
</div>

<?php
}
