<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute має бути прийнято.',
    'accepted_if' => 'The :attribute повинні бути прийняті, коли :other is :value.',
    'active_url' => 'The :attribute не є дійсною URL-адресою.',
    'after' => 'The :attribute має бути дата після :date.',
    'after_or_equal' => 'The :attribute має бути датою після або дорівнювати :date.',
    'alpha' => 'The :attribute має містити лише літери.',
    'alpha_dash' => 'The :attribute має містити лише літери, цифри, тире та підкреслення.',
    'alpha_num' => 'The :attribute має містити лише літери та цифри.',
    'array' => 'The :attribute має бути масивом.',
    'before' => 'The :attribute має бути побачення раніше :date.',
    'before_or_equal' => 'The :attribute має бути датою перед або рівною :date.',
    'between' => [
        'numeric' => 'The :attribute має бути між :min and :max.',
        'file' => 'The :attribute має бути між :min and :max kilobytes.',
        'string' => 'The :attribute має бути між :min and :max characters.',
        'array' => 'The :attribute має бути між :min and :max items.',
    ],
    'boolean' => 'The :поле має бути true або falsee.',
    'confirmed' => 'The :attribute підтвердження не збігається.',
    'current_password' => 'Пароль неправильний.',
    'date' => 'The :attribute недійсна дата.',
    'date_equals' => 'The :attribute має бути датою, що дорівнює :date.',
    'date_format' => 'The :attribute не відповідає формату :format.',
    'declined' => 'The :attribute необхідно відхилити.',
    'declined_if' => 'The :attribute необхідно відхилити, коли :other is :value.',
    'different' => 'The :attribute і :other повинні бути різними.',
    'digits' => 'The :attribute має бути :digits цифри.',
    'digits_between' => 'The :attribute має бути між :min і :max цифри.',
    'dimensions' => 'The :attribute має недійсні розміри зображення.',
    'distinct' => 'The :attribute поле має повторюване значення.',
    'email' => 'The :attribute має бути дійсною електронна пошта.',
    'ends_with' => 'The :attribute має закінчуватися одним із наступних: :values.',
    'enum' => 'The selected :attribute є недійсним.',
    'exists' => 'The selected :attribute є недійсним.',
    'file' => 'The :attribute має бути файлом.',
    'filled' => 'The :attribute поле повинно мати значення.',
    'gt' => [
        'numeric' => 'The :attribute має бути більше ніж :value.',
        'file' => 'The :attribute має бути більше ніж :value кілобайти.',
        'string' => 'The :attribute має бути більше ніж :value таблиці.',
        'array' => 'The :attribute повинно мати більше ніж :value елементи.',
    ],
    'gte' => [
        'numeric' => 'The :attribute має бути більше або дорівнює :value.',
        'file' => 'The :attribute має бути більше або дорівнює  :value кілобайти.',
        'string' => 'The :attribute має бути більше або дорівнює :value таблиці.',
        'array' => 'The :attribute повиненн мати :value елементи або більше.',
    ],
    'image' => 'The :attribute має бути зображення.',
    'in' => 'The selected :attribute є недійсним.',
    'in_array' => 'The :attribute поле не існує в :other.',
    'integer' => 'The :attribute має бути цілим числом.',
    'ip' => 'The :attribute має бути дійсною IP-адресою.',
    'ipv4' => 'The :attribute має бути дійсною адресою IPv4.',
    'ipv6' => 'The :attribute має бути дійсною адресою IPv4.',
    'mac_address' => 'The :attribute має бути дійсною MAC-адресою.',
    'json' => 'The :attribute має бути дійсним рядком JSON.',
    'lt' => [
        'numeric' => 'The :attribute має бути менше ніж :value.',
        'file' => 'The :attribute має бути менше ніж :value кілобайти.',
        'string' => 'The :attribute має бути менше ніж :value таблиці.',
        'array' => 'The :attribute має бути менше ніж :value елементи.',
    ],
    'lte' => [
        'numeric' => 'The :attribute має бути менше або дорівнює :value.',
        'file' => 'The :attribute має бути менше або дорівнює :value кілобайти.',
        'string' => 'The :attribute має бути менше або дорівнює :value таблиці.',
        'array' => 'The :attribute не повинно мати більше ніж :value елементи.',
    ],
    'max' => [
        'numeric' => 'The :attribute не повинно бути більше ніж :max.',
        'file' => 'The :attribute не повинно бути більше ніж :max кілобайти.',
        'string' => 'The :attribute не повинно бути більше ніж :max таблиці.',
        'array' => 'The :attribute не повинно мати більше ніж :max елементи.',
    ],
    'mimes' => 'The :attribute має бути файлом типу: :values.',
    'mimetypes' => 'The :attribute має бути файлом типу: :values.',
    'min' => [
        'numeric' => 'The :attribute має бути щонайменше :min.',
        'file' => 'The :attribute має бути щонайменше :min кілобайти.',
        'string' => 'The :attribute має бути щонайменше :min таблиці.',
        'array' => 'The :attribute повинен мати принаймні :min елементи.',
    ],
    'multiple_of' => 'The :attribute має бути кратним :value.',
    'not_in' => 'The selected :attribute є недійсним.',
    'not_regex' => 'The :attribute формат є недійсним.',
    'numeric' => 'The :attribute має бути числом.',
    'password' => 'Пароль неправильний.',
    'present' => 'The :attribute поле має бути присутнім.',
    'prohibited' => 'The :attribute поле заборонено.',
    'prohibited_if' => 'The :attribute поле заборонено коли :other є :value.',
    'prohibited_unless' => 'The :attribute поле заборонено, якщо :other є в :values.',
    'prohibits' => 'The :attribute поле забороняє :other від присутності.',
    'regex' => 'The :attribute формат є недійсним.',
    'required' => 'The :attribute поле обов’язкове.',
    'required_if' => 'The :attribute поле обов’язкове, коли :other є :value.',
    'required_unless' => 'The :attribute поле обов’язкове, якщо :other є в :values.',
    'required_with' => 'The :attribute поле обов’язкове, коли :values присутній.',
    'required_with_all' => 'The :attribute поле обов’язкове, коли :values присутні.',
    'required_without' => 'The :attribute поле обов’язкове, коли :values немає.',
    'required_without_all' => 'The :attribute поле є обов’язковим, якщо немає жодного з :values присутні.',
    'same' => 'The :attribute і :other повинні відповідати парами.',
    'size' => [
        'numeric' => 'The :attribute повинно бути :size.',
        'file' => 'The :attribute повинно бути :size кілобайти.',
        'string' => 'The :attribute повинно бути :size таблиці.',
        'array' => 'The :attribute повинні містити :size елементи.',
    ],
    'starts_with' => 'The :attribute повинно починатися з одного наслідувача: :values.',
    'string' => 'The :attribute має бути рядок.',
    'timezone' => 'The :attribute має бути дійсним часовим поясом.',
    'unique' => 'The :attribute вже прийнято.',
    'uploaded' => 'The :attribute не вдалося завантажити.',
    'url' => 'The :attribute має бути дійсною URL-адресою.',
    'uuid' => 'The :attribute має бути дійсним UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
