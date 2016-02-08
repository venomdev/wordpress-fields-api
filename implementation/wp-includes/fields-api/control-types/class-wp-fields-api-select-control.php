<?php
/**
 * @package    WordPress
 * @subpackage Fields_API
 */

/**
 * Fields API Select Control class.
 *
 * @see WP_Fields_API_Control
 */
class WP_Fields_API_Select_Control extends WP_Fields_API_Control {

	/**
	 * {@inheritdoc}
	 */
	public $type = 'select';

	/**
	 * @var string Placeholder text for choices (default, none)
	 */
	public $placeholder_text = null;

	/**
	 * {@inheritdoc}
	 */
	protected function render_content() {

		$choices = $this->choices;

		$placeholder_text = $this->placeholder_text;

		// Set default placeholder text
		if ( '' === $placeholder_text ) {
			$placeholder_text = __( '&mdash; Select &mdash;' );
		}

		// If $placeholder_text is not null, add placeholder to choices
		if ( null !== $placeholder_text ) {
			$choices = array_merge(
				array(
					'0' => $placeholder_text,
				),
				$choices
			);
		}

		if ( empty( $choices ) ) {
			return;
		}
		?>
		<select <?php $this->input_attrs(); ?> <?php $this->link(); ?>>
			<?php
			foreach ( $choices as $value => $label )
				echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
			?>
		</select>
		<?php

	}

}