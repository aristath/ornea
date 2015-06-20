<?php

/**
 * Creates a toggle control
 */
class Kirki_Controls_Toggle_Control extends WP_Customize_Control {

	public $type = 'toggle';

	public function enqueue() {
        wp_enqueue_script( 'kirki-switch', trailingslashit( KIRKI_URL ) . 'includes/controls/switch/kirki-switch.js', array( 'jquery' ) );
		wp_enqueue_style( 'kirki-switch', trailingslashit( KIRKI_URL ) . 'includes/controls/switch/style.css' );
    }

	/**
	 * Render the control's content.
	 */
	protected function render_content() { ?>
		<label>
			<div class="switch-info">
				<input style="display: none;" type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
			</div>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
			</span>
			<?php $classes = ( esc_attr( $this->value() ) ) ? ' On' : ' Off'; ?>
			<?php $classes .= ' Round'; ?>
			<div class="Switch <?php echo $classes; ?>">
				<div class="Toggle"></div>
			</div>
		</label>
		<?php
	}
}
