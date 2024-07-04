<?php
namespace Bretterer\WcasPlugin\Shortcode;

class Test extends Shortcode {

    /**
     * Returns the tag for this shortcode.
     *
     * @return string  The shortcode tag.
     */
    public function getTag(): string {
        return 'wcas_test';
    }

    /**
     * Renders the shortcode output.
     *
     * @param  array  $atts    Shortcode attributes.
     * @param  string|null  $content  The shortcode content.
     * @return string  The rendered HTML output.
     */
    public function render( $atts, $content = null ): string
    {
        $atts = shortcode_atts( array(
            'param1' => 'default_value',
        ), $atts );

        // Your shortcode logic here
        $output = '<div class="my-shortcode-output">';
        $output .= 'Content: ' . $content;
        $output .= 'Param1: ' . $atts['param1'];
        $output .= '</div>';

        return $output;
    }
}