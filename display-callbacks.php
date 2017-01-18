<?php

function vs_display_text_field( $value, $setting, $args ) {
	printf( '<input name="%s" id="%s" value="%s" class="regular-text" type="text">',
		esc_attr( $setting->get_field_name() ),
		esc_attr( $setting->get_field_id() ),
		esc_attr( $value )
	);
	if ( ! empty( $args['description'] ) ) {
		printf( '<br/><span class="description">%s</span>',
			wp_kses_post( $args['description'] )
		);
	}
}

function vs_display_dropdown( $value, $setting, $args ) {
	if ( ! isset( $args['options'] ) ) {
		print( '<p class="error">An options argument is required in the $args array to use vs_display_dropdown()</p>' );
		return;
	}
	printf( '<select id="%s" name="%s">',
		esc_attr( $setting->get_field_id() ),
		esc_attr( $setting->get_field_name() )
	);
	foreach ( $args['options'] as $option_value => $option_text ) {
		$selected = ( $option_value == $value ) ? 'selected="selected"' : '';
		printf( '<option value="%s" %s>%s</option>',
			esc_attr( $option_value ),
			selected( $option_value, $value, false ),
			$option_text
		);
	}
	print( '</select>' );
	if ( ! empty( $args['description'] ) ) {
		printf( '<br/><span class="description">%s</span>',
			wp_kses_post( $args['description'] )
		);
	}
}

function vs_display_textarea( $value, $setting, $args ) {
	printf( '<textarea id="%s" name="%s" rows="7" cols="50" type="textarea">%s</textarea>',
		esc_attr( $setting->get_field_id() ),
		esc_attr( $setting->get_field_name() ),
		esc_html( $value )
	);
	if ( ! empty( $args['description'] ) ) {
		printf( '<br/><span class="description">%s</span>',
			wp_kses_post( $args['description'] )
		);
	}
}

function vs_display_checkbox( $value, $setting, $args ) {
	printf( '<input type="checkbox" id="%s" name="%s" %s />',
		esc_attr( $setting->get_field_id() ),
		esc_attr( $setting->get_field_name() ),
		checked( $value, 'on' )
	);
	if ( ! empty( $args['description'] ) ) {
		printf( '<br/><span class="description">%s</span>',
			wp_kses_post( $args['description'] )
		);
	}
}
