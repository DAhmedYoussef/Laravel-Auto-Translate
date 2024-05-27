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
    /* CSS for Language Selector */
    #language-selector {
        margin-bottom: 20px;
    }

    #language-selector label {
        display: block;
        margin-bottom: 5px;
    }

    #language-select {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #language-select li {
        display: inline-block;
        margin-right: 10px;
    }

    #language-select li a {
        text-decoration: none;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    #language-select li a:hover {
        background-color: #f0f0f0;
    }

    /* Flag Images */
    .flag {
        width: 24px;
        height: auto;
        vertical-align: middle;
        margin-right: 5px;
    }
</style>
</head>
<body>

<div id="language-selector">

<ul id="language-select">
    <li><a href="/set-language?lang=en" class="{{ $language == 'en' ? 'selected' : '' }}"><img src="https://flagsapi.com/GB/shiny/64.png" alt="English" class="flag">English</a></li>
    <li><a href="/set-language?lang=ar" class="{{ $language == 'ar' ? 'selected' : '' }}"><img src="https://flagsapi.com/SA/shiny/64.png" alt="العربية" class="flag">العربية</a></li>
    <li><a href="/set-language?lang=fr" class="{{ $language == 'fr' ? 'selected' : '' }}"><img src="https://flagsapi.com/FR/shiny/64.png" alt="Français" class="flag">Français</a></li>
    <li><a href="/set-language?lang=zh" class="{{ $language == 'zh' ? 'selected' : '' }}"><img src="https://flagsapi.com/CH/shiny/64.png" alt="中文" class="flag">中文</a></li>
</ul>
</div>

<script>
document.querySelectorAll('#language-select li a').forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        var language = this.getAttribute('href').split('=')[1];

        // Save selected language value to session
        fetch('/set-language?lang=' + language)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload page after language session updated
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



    
    

