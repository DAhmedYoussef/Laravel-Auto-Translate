@php
    use Stichoza\GoogleTranslate\GoogleTranslate;

    // تحديد اللغة الافتراضية
    $defaultLanguage = 'en';

   // التأكد من الجلسة
    $language = session('lang', $defaultLanguage);

    // تضمين متغير GoogleTranslate
    $tr = new GoogleTranslate($defaultLanguage);
@endphp
<div>
    <label for="language-select">Select Language:</label>
    <select id="language-select">
        <option value="en" {{ $language == 'en' ? 'selected' : '' }}>English</option>
        <option value="ar" {{ $language == 'ar' ? 'selected' : '' }}>العربية</option> 
        <option value="fr" {{ $language == 'fr' ? 'selected' : '' }}>الفرنسية</option> 
        <option value="zh" {{ $language == 'zh' ? 'selected' : '' }}>الصينية</option> 
    </select>
</div>


<h1 style="text-align:center;">
{{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('About us page') }}
</h1>

<h2 style="text-align:center;">
{{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('Include your unique value proposition. Find your company s UVP unique value proposition and draw attention to it by building your About Us page around it.') }}
</h2>

    
<script>
    document.getElementById('language-select').addEventListener('change', function() {
        var language = this.value;

        // احفظ قيمة اللغة المختارة في السيشن
        fetch('/set-language?lang=' + language)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // إعادة تحميل الصفحة بعد تحديث اللغة في السيشن
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

    
    

