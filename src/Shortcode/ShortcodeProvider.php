<?php

namespace Bretterer\WcasPlugin\Shortcode;

class ShortcodeProvider {
    /**
     * The singleton instance of the ShortcodeProvider.
     */
    protected static ShortcodeProvider $instance;

    /**
     * An array of registered shortcode class names.
     */
    protected static array $registeredShortcodes = [];

    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct() {
        add_action( 'init', [ $this, 'registerShortcodes' ] );
    }

    /**
     * Registers shortcode classes for processing.
     *
     * @param  array  $shortcodeClasses  An array of shortcode class names.
     * @return void
     */
    public static function register( array $shortcodeClasses ): void {
        self::$instance ??= new self();

        self::$registeredShortcodes = array_merge(
            self::$registeredShortcodes,
            $shortcodeClasses
        );
    }

    /**
     * Registers all shortcodes with WordPress.
     *
     * @return void
     */
    public function registerShortcodes(): void {
        foreach ( static::$registeredShortcodes as $shortcodeClass ) {
            $shortcode = new $shortcodeClass();
            add_shortcode( $shortcode->getTag(), [ $shortcode, 'render' ] );
        }
    }
}