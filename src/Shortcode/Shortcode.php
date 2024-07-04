<?php
namespace Bretterer\WcasPlugin\Shortcode;

abstract class Shortcode {

    /**
     * Gets the unique tag for the shortcode.
     *
     * @return string  The shortcode tag.
     */
    abstract public function getTag(): string;

    /**
     * Renders the shortcode output.
     *
     * @param  array  $atts    Shortcode attributes.
     * @param  string|null  $content  The shortcode content.
     * @return string  The rendered HTML output.
     */
    abstract public function render( $atts, $content = null ): string;
}