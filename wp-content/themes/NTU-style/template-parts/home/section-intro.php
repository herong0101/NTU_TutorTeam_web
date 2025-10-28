<?php
/**
 * Template part for displaying the intro section on the homepage
 *
 * @package NTU_TutorTeam_Web
 */

$options = get_option('ntu_homepage_settings');
$title = isset($options['intro_title']) ? $options['intro_title'] : '臺大升學輔導種子計畫';
$body = isset($options['intro_body']) ? $options['intro_body'] : '';
$bg_id = isset($options['intro_bg_id']) ? $options['intro_bg_id'] : '';

$bg_url = $bg_id ? wp_get_attachment_image_url($bg_id, 'full') : '';
$bg_style = $bg_url ? 'style="background-image: url(\'' . esc_url($bg_url) . '\');"' : '';
?>

<section class="ntu-intro-section font-Zen-Old-Mincho relative px-4 sm:px-6 lg:px-8 <?php echo $bg_url ? 'has-background' : 'bg-gradient-to-br from-seed-gray to-white'; ?>" style="margin-top:16px;padding-top:12px;padding-bottom:128px;" <?php echo $bg_style; ?>>
    <?php if ($bg_url): ?>
        <!-- Background overlay -->
        <div class="absolute inset-0 bg-black/40"></div>
    <?php endif; ?>
    
    <!-- Content -->
    <div class="relative z-10 mx-auto max-w-4_5xl">
        <hr class="border-t border-gray-300 mb-10">
        <h2 class="font-Zen-Old-Mincho font-bold text-4xl sm:text-4xl md:text-5xl lg:text-6xl tracking-tight <?php echo $bg_url ? 'text-white' : 'text-seed-dark'; ?> mb-6 text-center">
            — 升學種子計畫 —<br>
            <span class="block mt-4 text-2xl sm:text-2xl md:text-4xl lg:text-5xl font-bold">盡自身一點力，實現善的循環</span>
        </h2>
        <div class="ntu-intro-body mt-12 text-lg sm:text-xl md:text-2xl leading-relaxed text-seed-dark font-Zen-Old-Mincho text-left">
            <p>升學考試，初衷應該是讓社會階級可以公平的流動，但在現今升學主義下顯然成為了大型軍備競賽，尤其到了大學入學考試這種仿關未來就業的重要關卡，更是能明顯看出家庭經濟能力所帶來不可逾越的鴻溝。</p>
            <p>當經濟能力較佳的家庭可以選擇將小孩送往補習班或請家教時，那經濟較為弱勢的孩子們呢？只能利用在學校的時間拼命學習，卻還是差了那些學習資源，尤其到了大考前的停課溫習階段，他們更是只能靠自己走最後一哩路，許多人甚至連安靜的讀書環境都沒有。</p>
            <p>臺灣大學作為臺灣第一學府，我們有幸進入就讀其中歸功於在升學路途中的各種貴人相助。<strong>我們也想將當時感受到的善意，給予有大大夢想的種子們</strong></p>
        </div>
    <hr class="border-t border-gray-300 mt-10">
    </div>

</section>

<!-- 計畫特色/影響力區塊 -->
<section class="w-full px-4 text-[#3a3a3a] font-Zen-Old-Mincho relative" style="margin-top:-80px; z-index:20; background: linear-gradient(90deg, #ffa5a5 0%, #f37f65 100%); padding-top:56px; padding-bottom:45px;">
    <div class="max-w-full mx-auto" style="padding-left:1cm; padding-right:1cm;">
    <h2 class="font-Zen-Old-Mincho text-4xl md:text-5xl font-bold text-center mb-8 tracking-tight">— 計畫特色 —</h2>
    <div class="flex flex-col md:flex-row md:justify-between mb-24">
            <div class="flex-1 flex flex-col items-center justify-center min-w-0">
                <span class="font-Zen-Old-Mincho text-3xl md:text-4xl font-bold mb-4">升學課程</span>
                <p class="text-lg md:text-base text-center font-bold">提供升大學之總複習課程以及高中各學科解題群組。皆為免費服務。</p>
            </div>
            <div class="hidden md:block" style="width:100px;"></div>
            <div class="flex-1 flex flex-col items-center justify-center min-w-0">
                <span class="font-Zen-Old-Mincho text-3xl md:text-4xl font-bold mb-4">升學工作坊</span>
                <p class="text-lg md:text-base text-center font-bold">邀請專業人士、教授進行科系、備審、面試等工作坊。皆可免費參加。</p>
            </div>
        </div>
    <h2 class="font-Zen-Old-Mincho text-4xl md:text-5xl font-bold text-center mb-16 mt-24 tracking-tight">— 計畫影響力 —</h2>
        <div class="flex flex-col md:flex-row md:justify-between mb-8">
            <div class="flex-1 flex flex-col items-center justify-center min-w-0 mb-16 md:mb-0">
                <span id="plan-impact-number" class="font-Zen-Old-Mincho text-6xl md:text-7xl font-bold mb-2">0</span>
                <span class="text-xl md:text-2xl">高中學員</span>
            </div>
            <div class="hidden md:block" style="width:100px;"></div>
            <div class="flex-1 flex flex-col items-center justify-center min-w-0">
                <p class="text-[#203045] text-lg md:text-xl font-bold mb-2">十一屆升學種子中，我們一共幫助了 超過1600位 高中學員</p>
                <p class="text-[#203045] text-lg md:text-xl font-bold">讓他們在升學的道路上不孤單</p>
            </div>
        </div>
        <!-- 關於我們按鈕（移到計畫影響力下方） -->
        <div class="flex justify-center mt-12">
            <a href="/about" class="px-8 py-3 rounded-full font-bold text-lg text-white bg-gradient-to-b from-[#365175] to-[#203045] shadow-lg hover:shadow-2xl hover:-translate-y-1 hover:brightness-110 transition-all duration-200 border border-[#1a2533]">>更多關於我們<</a>
        </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementById('plan-impact-number');
    if (!el) return;
    var target = 1600;
    var current = 0;
    var plus = '+';
    var duration = 1600; // ms
    var step = Math.ceil(target / (duration / 16));
    function animate() {
        current += step;
        if (current >= target) {
            el.textContent = target + plus;
        } else {
            el.textContent = current;
            requestAnimationFrame(animate);
        }
    }
    animate();
});
</script>
            <div></div>
        </div>
    </div>
</section>

<style>
.ntu-intro-section.has-background {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 400px;
}

@media (min-width: 768px) {
    .ntu-intro-section.has-background {
        min-height: 500px;
    }
}

.ntu-intro-body p {
    margin-bottom: 1rem;
}

.ntu-intro-body p:last-child {
    margin-bottom: 0;
}

/* 自訂 max-w-4_5xl 寬度 */
.max-w-4_5xl {
    max-width: 75rem;
}
</style>
