<?php

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/app')
;

return (new \PhpCsFixer\Config)
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_empty_comment' => true,
        'array_indentation' => true,
        'binary_operator_spaces' => true,
        'blank_line_after_namespace' => true,
        'blank_line_before_statement' => ['statements' => ['return']],
        'braces' => true,
        'class_definition' => true,
        'method_chaining_indentation' => true,
        'no_extra_blank_lines' => true,
        'multiline_whitespace_before_semicolons' => true,
        'echo_tag_syntax' => ['format' => 'long'],
        'no_spaces_around_offset' => true,
        'no_whitespace_before_comma_in_array' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'trim_array_spaces' => true,
        'single_quote' => true,
        'ordered_imports' => false,
    ])
    ->setFinder($finder)
    ;
