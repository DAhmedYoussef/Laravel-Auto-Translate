@php
    use Stichoza\GoogleTranslate\GoogleTranslate;

    // تحديد اللغة الافتراضية
    $defaultLanguage = 'en';

    // احصل على معلم اللغة المحددة إذا كانت متاحة في السيشن
    $language = session('lang', $defaultLanguage);

    // إنشاء مثيل من مكتبة GoogleTranslate
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

<!-- Display translated text -->

 {{--    @php
    // تعيين قيمة النص
    $text = 'I am going to do it. I have made up my mind. These are the first few words of the new… the best … the Longest Text In The Entire History Of The Known Universe! This Has To Have Over 35,000 words the beat the current world record set by that person who made that flaming chicken handbooky thingy. I might just be saying random things the whole time I type in this so you might get confused a lot. I just discovered something terrible. autocorrect is on!! no!!! this has to be crazy, so I will have to break all the English language rules and the basic knowledge of the average human being. I am not an average human being, however I am special. no no no, not THAT kind of special ;). Why do people send that wink face! it always gives me nightmares! it can make a';
    @endphp
 --}}

<h1>
<!-- استخدام المتغير $text لترجمة النص -->
{{-- {{ $tr->setSource($defaultLanguage)->setTarget($language)->translate($text) }} --}}

{{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('hello') }}

</h1>

<hr>

{{ $tr->setSource($defaultLanguage)->setTarget($language)->translate('welocm') }}

<!-- Script to change language without reloading the page -->
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
