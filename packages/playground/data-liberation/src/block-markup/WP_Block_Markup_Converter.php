<?php

/**
 * Represents a {Data Format} -> Block Markup + Metadata converter.
 *
 * Used by the Data Liberation importers to accept data formatted as HTML, Markdown, etc.
 * and convert them to WordPress posts.
 */
interface WP_Block_Markup_Converter {
	/**
	 * Converts the input document specified in the constructor to block markup.
	 *
	 * @return bool Whether the conversion was successful.
	 */
	public function convert();

	/**
	 * Gets the block markup generated by the convert() method.
	 *
	 * @return string The block markup.
	 */
	public function get_block_markup();

	/**
	 * Gets all the metadata sourced from the input document by the convert() method.
	 * The data format is:
	 *
	 * array(
	 *     'post_title' => array( 'The Name of the Wind' ),
	 *     'post_author' => array( 'Patrick Rothfuss', 'Betsy Wollheim' )
	 * )
	 *
	 * Note each meta key may have multiple values. The consumer of this interface
	 * must account for this.
	 *
	 * @return array The metadata sourced from the input document.
	 */
	public function get_all_metadata();

	/**
	 * Gets the first metadata value for a given key.
	 *
	 * Example:
	 *
	 * Metadata:
	 * array(
	 *     'post_title' => array( 'The Name of the Wind' ),
	 *     'post_author' => array( 'Patrick Rothfuss', 'Betsy Wollheim' )
	 * )
	 *
	 * get_first_meta_value( 'post_author' ) returns 'Patrick Rothfuss'.
	 *
	 * @param string $key The metadata key.
	 * @return mixed The metadata value.
	 */
	public function get_first_meta_value( $key );
}
