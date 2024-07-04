<?php

namespace Tests\Shortcode;

use Brain\Monkey\Functions;
use Bretterer\WcasPlugin\Shortcode\Test;
use function Tests\setupMocks;
use function Tests\tearDownMocks;


beforeEach(function() {
    setupMocks();

    // Mock WordPress `shortcode_atts` function
    Functions\when('shortcode_atts')->alias(function ($pairs, $atts) {
        return array_merge($pairs, $atts);
    });
});

afterEach(function () {
    tearDownMocks();
});


it('renders shortcode with content and attributes', function () {
    $shortcode = new Test();
    $atts = ['param1' => 'test_value'];
    $content = 'This is the shortcode content';

    $expectedOutput = '<div class="my-shortcode-output">Content: This is the shortcode contentParam1: test_value</div>';
    expect($shortcode->render($atts, $content))->toBe($expectedOutput);
});

it('renders shortcode with default attribute', function () {
    $shortcode = new Test();
    $atts = []; // No attributes provided
    $content = 'Default content';

    $expectedOutput = '<div class="my-shortcode-output">Content: Default contentParam1: default_value</div>';
    expect($shortcode->render($atts, $content))->toBe($expectedOutput);
});