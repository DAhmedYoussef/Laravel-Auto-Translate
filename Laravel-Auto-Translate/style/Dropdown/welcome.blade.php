@php
    use Stichoza\GoogleTranslate\GoogleTranslate;

    // تحديد اللغة الافتراضية
    $defaultLanguage = 'en';

    // التأكد من الجلسة
    $language = session('lang', $defaultLanguage);

    // تضمين متغير GoogleTranslate
    $tr = new GoogleTranslate($defaultLanguage);
@endphp
<style>
    /* ستايلات لعناصر القائمة */
    #language-select {
        list-style-type: none;
        padding: 0;
        margin: 0;
        position: relative;
        display: inline-block;
    }

    #language-select .selected-language {
        cursor: pointer;
       /*  padding: 5px; */
       padding: 10px 21px;
        border-radius: 5px;
        background-color: #f0f0f0;
    }

    #language-select ul {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        list-style-type: none;
        padding: 0;
        margin: 0;
        width: 108px;
    text-align: start;
    }

    #language-select ul li {
        cursor: pointer;
        padding: 5px;
        margin-bottom: 5px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    #language-select ul li:hover {
        background-color: #f0f0f0;
    }

    #language-select img {
        width: 20px;
        margin-right: 5px;
    }
</style>
<div id="language-select">
    <div class="selected-language">
        @if ($language == 'en')
            <img src="https://flagsapi.com/US/shiny/64.png" alt="English Flag"> English
        @elseif ($language == 'ar')
            <img src="https://flagsapi.com/EG/shiny/64.png" alt="Arabic Flag"> العربية
        @elseif ($language == 'fr')
            <img src="https://flagsapi.com/FR/shiny/64.png" alt="French Flag"> الفرنسية
        @elseif ($language == 'zh')
            <img src="https://flagsapi.com/CN/shiny/64.png" alt="Chinese Flag"> الصينية
        @endif
    </div>

    <ul>
        <li class="language-option" data-lang="en">
            <img src="https://flagsapi.com/US/shiny/64.png" alt="English Flag"> English
        </li>
        <li class="language-option" data-lang="ar">
            <img src="https://flagsapi.com/EG/shiny/64.png" alt="Arabic Flag"> العربية
        </li>
        <li class="language-option" data-lang="fr">
            <img src="https://flagsapi.com/FR/shiny/64.png" alt="French Flag"> الفرنسية
        </li>
        <li class="language-option" data-lang="zh">
            <img src="https://flagsapi.com/CN/shiny/64.png" alt="Chinese Flag"> الصينية
        </li>
    </ul>
</div>


<script>
    var languageSelect = document.getElementById('language-select');
    var selectedLanguage = languageSelect.querySelector('.selected-language');
    var languageOptions = languageSelect.querySelectorAll('.language-option');

    // إظهار أو إخفاء القائمة عند النقر على اللغة المختارة
    selectedLanguage.addEventListener('click', function() {
        var languageList = languageSelect.querySelector('ul');
        languageList.style.display = languageList.style.display === 'block' ? 'none' : 'block';
    });

    // تحديد اللغة عند النقر على الخيارات
    languageOptions.forEach(option => {
        option.addEventListener('click', function() {
            var language = this.getAttribute('data-lang');
            fetch('/set-language?lang=' + language)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>


<h1 style="text-align:center;">
{{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('About us page') }}
</h1>


<h2 style="text-align:center;">
{{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('Include your unique value proposition. Find your company s UVP unique value proposition and draw attention to it by building your About Us page around it.') }}
</h2>


<h4 style="text-align:center;">
    {{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus mollitia non neque adipisci dolorum placeat earum, aspernatur atque perspiciatis! Eius tempora reiciendis deleniti ipsa architecto? Eveniet libero excepturi culpa? Quos?') }}
    <br>
    <br>
    <br>
    <a style="text-align:center; width:100%;" href="/about">About</a>
</h4>



    
    

