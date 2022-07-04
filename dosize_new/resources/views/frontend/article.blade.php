@extends('layout.product')
@section('title')
Articles
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/mobile-style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/swiper.css') }}">
<style>
    .mobile_header {
        display: none;
        padding: 18px 14px;
        background-color: var(--whiteColor);
        position: fixed;
        top: 0px;
        width: 100%;
        z-index: 999;
        left: 0px;
    }
</style>
@endpush
@section('content')

@section('content')
<main>
    <div class="main-wrapper article_main_wrapper">
        <div class="article_category_slider categories spacing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper myCategorySlider">
                            <div class="swiper-wrapper">
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_5.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">ביגוד והנעלה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_10.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">מזון</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_9.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">פיננסים</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_8.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">לבית ולגינה</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_2.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">בריאות</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_3.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">אופנה וטיפוח</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_4.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">חינוך</p>
                                </div>
                                <div class="category_box swiper-slide">
                                    <div class="img_box box_shahdow">
                                        <img src="{{asset('assets/img/mobile_component/category_5.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p class="font-weight-600 font-size-12">ביגוד והנעלה</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_banner">
            <div class="article_slider">
                <div class="slider_div">
                    <div class="multiple_articles swiper_article">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('assets/img/mobile_component/article_slider_main.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/img/mobile_component/article_slider_main.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/img/mobile_component/article_slider_main.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/img/mobile_component/article_slider_main.png') }}" alt=""
                                    class="img-fluid">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="aricle_detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <h5 class="article_category font-size-14">ביגוד והנעלה</h5>
                            <h2 class="article_title">הולך מעולה: מבצע חם בנעלי העיר על 2 זוגות סנדלים</h2>
                            <p class="article_description font-size-16">הילד שלכם רוצה סנדלים? רוצים לקנות
                                סנדלים לכל המשפחה ולצאת בזול? • מבצע חם במיוחד לקיץ: זוג סנדלים ב-99 ₪ ו-2 ב-159
                                ₪ בלבד • אל תחמיצו את ההזדמנות</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="city_shoe">
                                <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                    class="img-fluid">
                                <p class="font-size-18"><span class="category">נעלי העיר</span>
                                    <span>24.05.22</span> <span>| כ”ג אייר פ”ב</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article_content_main">
            <div class="article_detail">
                <div class="container-fluid article_mobile_bg_color">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="article_title">הילד שלכם רוצה סנדלים? רוצים לקנות סנדלים לכל המשפחה ולצאת
                                בזול? • מבצע חם במיוחד לקיץ: זוג סנדלים ב-99 ₪ ו-2 ב-159 ₪ בלבד • אל תחמיצו את
                                ההזדמנות</h4>
                            <div class="line"></div>
                            <div class="article_detail_para">
                                <p class="font-size-18">לא צריך ללכת רחוק כדי למצוא איכותי וזול: 'נעלי העיר'
                                    במבצע שטרם נראה בעיר: זוג סנדלים ב-99 שקל בלבד והבשורה האמתית: שתי זוגות
                                    ב-159 שקל בלבד. מבצע כאסח לוהט במיוחד לימי הקיץ החמים.</p>
                                <p class="font-size-18"> מדובר במבצע שכובש את השוק, כאשר הורים יכולים לבוא לחנות
                                    'נעלי העיר' הוותיקה והמקצועית ביותר בעיר, עם שני ילדיהם ולקנות לכל אחד מהם
                                    את הסנדל שהוא אוהב לקיץ או לילד אחד שני זוגות שונים - ולצאת מורווחים
                                    מהקנייה.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="article_like">
                                <h4 class="font-size-18 font-weight-600">אהבתם את הכתבה? רוצים לא לפספס את
                                    התכנים שלנו? הרשמו כאן ווקבלו ישירות למייל את התוכן האיכותתי של דוסיז >>>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="article_detail_para">
                                <p class="font-size-18">כאשר שירות אמין, מקצועי ויעיל - פלוס מחיר מוזל ומשתלם
                                    פוגש אותנו הלקוחות, אין פלא שתושבי העיר בוחרים פעם אחרי פעם לקנות נעליים
                                    וסנדלים בנעלי העיר. יש כאן את כל מה שאנחנו צריכים לילדינו.
                                    נעלי העיר – נעליים לכל המשפחה, ועכשיו גם במבצע!</p>
                                <p class="font-size-18">לא צריך ללכת רחוק כדי למצוא איכותי וזול: 'נעלי העיר'
                                    במבצע שטרם נראה בעיר:
                                    זוג סנדלים ב-99 שקל בלבד והבשורה האמתית: שתי זוגות ב-159 שקל בלבד. מבצע כאסח
                                    לוהט במיוחד לימי הקיץ החמים.</p>
                                <p class="font-size-18">מדובר במבצע שכובש את השוק, כאשר הורים יכולים לבוא לחנות
                                    'נעלי העיר' הוותיקה
                                    והמקצועית ביותר בעיר, עם שני ילדיהם ולקנות לכל אחד מהם את הסנדל שהוא אוהב
                                    לקיץ או לילד אחד שני זוגות שונים - ולצאת מורווחים מהקנייה.
                                    לא צריך ללכת רחוק כדי למצוא איכותי וזול: 'נעלי העיר' במבצע שטרם נראה בעיר:
                                    זוג סנדלים ב-99 שקל בלבד והבשורה האמתית: שתי זוגות ב-159 שקל בלבד. מבצע כאסח
                                    לוהט במיוחד לימי הקיץ החמים.</p>
                                <p class="font-size-18">מדובר במבצע שכובש את השוק, כאשר הורים יכולים לבוא לחנות
                                    'נעלי העיר' הוותיקה
                                    והמקצועית ביותר בעיר, עם שני ילדיהם ולקנות לכל אחד מהם את הסנדל שהוא אוהב
                                    לקיץ או לילד אחד שני זוגות שונים - ולצאת מורווחים מהקנייה.
                                    לא צריך ללכת רחוק כדי למצוא איכותי וזול: 'נעלי העיר' במבצע שטרם נראה בעיר:
                                    זוג סנדלים ב-99 שקל בלבד והבשורה האמתית: שתי זוגות ב-159 שקל בלבד. מבצע כאסח
                                    לוהט במיוחד לימי הקיץ החמים.</p>
                                <p class="font-size-18">מדובר במבצע שכובש את השוק, כאשר הורים יכולים לבוא לחנות
                                    'נעלי העיר' הוותיקה
                                    והמקצועית ביותר בעיר, עם שני ילדיהם ולקנות לכל אחד מהם את הסנדל שהוא אוהב
                                    לקיץ או לילד אחד שני זוגות שונים - ולצאת מורווחים מהקנייה.
                                </p>
                            </div>
                        </div>
                        <div class="article_main_img_detail">
                            <div class="col-lg-12">
                                <img src="{{asset('assets/img/mobile_component/article_main.png') }}" alt=""
                                    class="img-fluid">
                                <div class="article_main_img_description">
                                    <p class="font-size-18">לא צריך ללכת רחוק כדי למצוא איכותי וזול: 'נעלי העיר'
                                        במבצע שטרם נראה בעיר: זוג סנדלים ב-99 שקל בלבד והבשורה האמתית: שתי זוגות
                                        ב-159 שקל בלבד. מבצע כאסח לוהט במיוחד לימי הקיץ החמים. </p>
                                    <p class="font-size-18">מדובר במבצע שכובש את השוק, כאשר הורים יכולים לבוא
                                        לחנות 'נעלי העיר' הוותיקה והמקצועית ביותר בעיר, עם שני ילדיהם ולקנות לכל
                                        אחד מהם את הסנדל שהוא אוהב לקיץ או לילד אחד שני זוגות שונים - ולצאת
                                        מורווחים מהקנייה.</p>
                                </div>
                            </div>
                        </div>
                        <div class="deals deal_two">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <h3 class="common_title">הכי מומלצים <img
                                                src="{{asset('assets/img/mobile_component/star.png') }}" alt=""
                                                class="img-fluid">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="slider_div">
                                <div class="multiple_deals swiper">
                                    <div class="swiper-wrapper">
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="deals_box box_shahdow swiper-slide">
                                            <img src="{{asset('assets/img/mobile_component/recommendedItem.png') }}"
                                                alt="" class="img-fluid">
                                            <div class="content_div">
                                                <span class="deal_category font-size-12 font-weight-400">נעלי
                                                    העיר</span>
                                                <h4 class="title font-size-14 font-weight-700">ספה 3 מושבים מעור
                                                    אמיתי
                                                    דגם AKOL
                                                </h4>
                                                <div class="rating_price_div">
                                                    <p class="font-size-14 font-weight-600">2,100 ₪ <span
                                                            class="font-size-12 font-weight-400">80 ₪</span></p>
                                                    <p class="rating_text">4.8 <i class="fa fa-star"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="multiple_shoe">
                                <ul>
                                    <li class="font-size-12">מבצע</li>
                                    <li class="font-size-12">סנדלים</li>
                                    <li class="font-size-12">נעלי ילדים</li>
                                    <li class="font-size-12">נעלי העיר</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="stand_brand_sign_up_div">
                            <div class="stand_brand_message">
                                <img src="{{asset('assets/img/mobile_component/flashes_2.png') }}" alt=""
                                    class="img-fluid">
                                <a class="font-size-16" href="">לעמוד המותג</a>
                                <a class="font-size-16" href="">שליחת הודעה</a>
                            </div>
                            <div class="sign_up_div">
                                <img src="{{asset('assets/img/mobile_component/sign_up_icon.png') }}" alt=""
                                    class="img-fluid">
                                <p class="font-size-16">הירשמו בקליק למועדון הצרכנות של <br><a href="">{שם
                                        המותג}</a> ולא תפספסו שום דיל!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="post_comment">
                            <div class="total_comment">
                                <p class="font-size-16">תגובות <span>(33)</span> <img
                                        src="{{asset('assets/img/mobile_component/comment.png') }}" alt=""
                                        class="img-fluid"></p>
                            </div>
                            <div class="formDiv">
                                <form action="">
                                    <input type="text" name="comment" id="comment" placeholder="התגובה שלך"
                                        class="text-right font-size-16">
                                    <div class="comment_hearder">
                                        <a href="" class="font-size-16">פירסום תגובה</a>
                                        <div class="anonymous_text font-size-16">אנונימי <span
                                                class="checkBox"><i class="fa fa-check"
                                                    aria-hidden="true"></i></span></div>
                                    </div>
                                </form>
                            </div>

                            <div class="comment_list">
                                <ul>
                                    <li>
                                        <p class="add_comment font-size-12">הוספת תגובה</p>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">אנונימי</h4>
                                            <p class="font-size-14">ואוו תודה רבה זה נראה מושלם!!!</p>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="add_comment font-size-12">הוספת תגובה</p>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">אנונימי</h4>
                                            <p class="font-size-14">ואוו תודה רבה זה נראה מושלם!!!</p>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="add_comment font-size-12">הוספת תגובה</p>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">אנונימי</h4>
                                            <p class="font-size-14">ואוו תודה רבה זה נראה מושלם!!!</p>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="add_comment font-size-12">הוספת תגובה</p>
                                        <div class="user_detail">
                                            <h4 class="font-size-14">אנונימי</h4>
                                            <p class="font-size-14">ואוו תודה רבה זה נראה מושלם!!!</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="affordable_consumption spacing article_affordable_consumption">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <h3 class="common_title">צרכנות משתלמת <img
                                src="{{asset('assets/img/mobile_component/beg.png') }}" alt="" class="img-fluid"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="affordable_consumption_list d-flex multiple_afforable_consumption">
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="affordable_consumption_box box_shahdow">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="affordable_consumption_box box_shahdow d-none">
                                <img src="{{asset('assets/img/mobile_component/affordable_iten.png') }}" alt=""
                                    class="img-fluid">
                                <div class="content_div">
                                    <span class="category font-size-12 font-weight-400">נעלי העיר</span>
                                    <h4 class="font-size-12 font-weight-700">קולקציית קיץ הושקה בלידר אתמול
                                        אחרי
                                        הצהריים
                                    </h4>
                                    <p class="discription font-size-10 font-weight-400">צפו בגלריית התמונות
                                        של
                                        הקולקצייה המדהימה הזאת כאן בכתבה
                                    </p>
                                    <span class="font-size-12">4 <i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <a href="" class="desktop_hide learn_more font-size-12 font-weight-400">לכל
                                הכתבות ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main footer -->
        <!-- main footer start from here -->
        <div class="main_footer mt-5 d-none d-xl-block">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="box text-right px-3">
                            <p class="txt">בואו לעקוב אחרנו :)</p>
                            <div class="socials_icons mt-4">
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/fb.png') }}" alt="fb">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/inst.png') }}" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/twitter.png') }}" alt="">
                                </a>
                                <a href="#" class="social_link mx-2">
                                    <img src="{{ asset('assets/img/whatsapp.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 border_Side">
                            <div class="statments_links d-flex flex-column align-items-end">
                                <p class="txt">
                                    דוסיז משפט הנעה על דוסיז >>
                                </p>
                                <div class="btns d-flex mt-4">
                                    <a href="#" class="btn btn_grey_out">הצטרפות לעסקים</a>
                                    <a href="#" class="btn btn_orange ml-2">הרשמה לדוסיז</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box px-3 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/img/footer_img.png') }}" class="footer_Img" alt="footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main footer start end here -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/email_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/whtsapp_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/twitter_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="{{asset('assets/img/mobile_component/facebook_icon.png') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <div class="copy_input">
                        <i class="fa fa-clone" aria-hidden="true"></i>
                        <input type="text" name="copy_text" id="copy_text"
                            value="https://dossiz-vmnlvb/dfv.co.il" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="{{asset('assets/js/swiper.min.js') }}"></script>
<script src="{{asset('assets/js/script.js') }}"></script>
<script>
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $("header .desktop_header").css("display", "none");
            $("header .mobile_header").css("display", "block");
        } else {
            $("header .desktop_header").css("display", "block");
            $("header .mobile_header").css("display", "none");
        }
    });
</script>
@endsection
