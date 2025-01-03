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

    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une addresse email valide .',
    'after' => 'Le champ :attribute doit être une date après :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le champ :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Le champ :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le champ :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Le champ :attribute ne peut être qu\'un tableau.',
    'before' => 'Le champ :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le champ :attribute Doit être entre :min et :max.',
        'file' => 'Le champ :attribute Doit être entre :min et :max kilobytes.',
        'string' => 'Le champ :attribute Doit être entre :min and :max caractères.',
        'array' => 'Le champ :attribute doit avoir entre :min et :max items.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'Le champ :attribute confirmation ne correspond pah.',
    'date' => 'Le champ :attribute n\'est pas une date valable.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Le champ :attribute et :other devraient être différents.',
    'digits' => 'Le champ :attribute doit être :digits chiffre.',
    'digits_between' => 'Le champ :attribute doit être entre :min et :max chiffre.',
    'dimensions' => 'Le champ :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le champ :attribute le champ a une valeur en double.',
    'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par l\'un des éléments suivants: :values',
    'exists' => 'Le champ :attribute is invalid.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => ' le champ :attribute ne peut etre vdie.',
    'gt' => [
        'numeric' => 'Le champ :attribute must be greater than :value.',
        'file' => 'Le champ :attribute must be greater than :value kilobytes.',
        'string' => 'Le champ :attribute must be greater than :value characters.',
        'array' => 'Le champ :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute must be greater than or equal :value.',
        'file' => 'Le champ :attribute must be greater than or equal :value kilobytes.',
        'string' => 'Le champ :attribute must be greater than or equal :value characters.',
        'array' => 'Le champ :attribute must have :value items or more.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'Le champ :attribute n\est pas valide.',
    'in_array' => ' le chmap :attribute ne doit pas exister dans :other.',
    'integer' => 'Le champ :attribute doit être un attribut.',
    'ip' => 'Le champ :attribute must be a valid IP address.',
    'ipv4' => 'Le champ :attribute must be a valid IPv4 address.',
    'ipv6' => 'Le champ :attribute must be a valid IPv6 address.',
    'json' => 'Le champ :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'Le champ :attribute must be less than :value.',
        'file' => 'Le champ :attribute must be less than :value kilobytes.',
        'string' => 'Le champ :attribute must be less than :value characters.',
        'array' => 'Le champ :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute must be less than or equal :value.',
        'file' => 'Le champ :attribute must be less than or equal :value kilobytes.',
        'string' => 'Le champ :attribute must be less than or equal :value characters.',
        'array' => 'Le champ :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute may not be greater than :max.',
        'file' => 'Le champ :attribute may not be greater than :max kilobytes.',
        'string' => 'Le champ :attribute may not be greater than :max characters.',
        'array' => 'Le champ :attribute may not have more than :max items.',
    ],
    'mimes' => 'Le champ :attribute doit avoir un fichier du type: :values.',
    'mimetypes' => 'Le champ :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute doit être au moins :min.',
        'file' => 'Le champ :attribute doit être au moins :min kilobytes.',
        'string' => 'Le champ :attribute doit être au moins :min caractères.',
        'array' => 'Le champ :attribute doit avoir au moins least :min éléments.',
    ],
    'not_in' => 'Le champ :attribute est invalide.',
    'not_regex' => 'Le champ :attribute n\'est pas du bon format.',
    'numeric' => 'Le champ :attribute must be a number.',
    'present' => 'Le champ :attribute field must be present.',
    'regex' => 'Le champ :attribute format is invalid.',
    'required' => 'Le champ :attribute field is required.',
    'required_if' => 'Le champ :attribute field is required when :other is :value.',
    'required_unless' => 'Le champ :attribute field is required unless :other is in :values.',
    'required_with' => 'Le champ :attribute field is required when :values is present.',
    'required_with_all' => 'Le champ :attribute field is required when :values are present.',
    'required_without' => 'Le champ :attribute field is required when :values is not present.',
    'required_without_all' => 'Le champ :attribute field is required when none of :values are present.',
    'same' => 'Le champ :attribute and :other must match.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être :size.',
        'file' => 'Le champ :attribute must be :size kilobytes.',
        'string' => 'Le champ :attribute must be :size characters.',
        'array' => 'Le champ :attribute must contain :size items.',
    ],
    'starts_with' => 'Le champ :attribute must start with one of the following: :values',
    'string' => 'Le champ :attribute must be a string.',
    'timezone' => 'Le champ :attribute must be a valid zone.',
    'unique' => 'Le champ :attribute existe déjà dans la base de donnée.',
    'uploaded' => 'Le champ :attribute n\'a pas pu télécharger',
    'url' => 'Le champ :attribute n\'est pas du bon format.',
    'uuid' => 'Le champ :attribute must be a valid UUID.',

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
