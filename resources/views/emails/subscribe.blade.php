
<x-mail::message>
    <div>
        <div style="display: flex;gap:10px;align-items: center;"> عزيزي/عزيزتي <h6 class="fw-bold">maam@gmail.com</h6>, </div> 
        <div style="width: 100%;line-height: 2 !important;color: hsl(0 0% 23% / 1);">أهلاً بك في موقع وصفات للطبخ! نحن فرحون بانضمامكم إلينا كعضو جديد في مجتمعنا المتزايد. نرحب بكم بأذرع مفتوحة ونتطلع إلى مشاركتكم وتفاعلكم مع الموقع. في موقع وصفات للطبخ، يمكنكم اكتشاف واستكشاف عالم الطهي والمأكولات من مختلف المطابخ حول العالم. ستجدون لدينا تشكيلة واسعة من الوصفات الشهية والمبتكرة، بدءًا من الوجبات الرئيسية وحتى الحلويات والمشروبات. يمكنكم أيضاً مشاركة وصفاتكم الخاصة والتفاعل مع أعضاء آخرين من محبي الطبخ. هدفنا في موقع وصفات للطبخ هو توفير مصدر شامل وموثوق لكل ما يتعلق بالطبخ والمأكولات. وسوف تجدون لدينا أيضاً نصائح ومقالات ذات صلة بالتغذية السليمة والنصائح العامة لتحسين مهارات الطبخ الخاصة بكم. لا تترددوا في استخدام جميع الميزات المتاحة في الموقع والاستفادة القصوى منها. وإذا كان لديكم أسئلة أو استفسارات، فإن فريق الدعم الخاص بنا مستعد لمساعدتكم في أي وقت. مرة أخرى، نرحب بكم بحرارة في موقع وصفات للطبخ، ونأمل أن تجدوا فيه مصدرًا ممتعًا ومفيدًا لاستكشاف عالم الطهي. مع أطيب التحيات، فريق كوزينتي </div>
    </div>
    <x-mail::table>
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
</x-mail::table>

<x-mail::button :url="'http://127.0.0.1:8000/'"  color="success">
الدخول لي الموقع
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
