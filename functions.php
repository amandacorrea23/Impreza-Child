<?php
/* Custom functions code goes here. */

function impreza_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
}
add_action('wp_enqueue_scripts', 'impreza_child_enqueue_styles');

function impreza_child_ficha_tecnica($field, $texto, $texto2 = '') {
	if (! empty(get_field($field))) { ?>
		<div class="g-taxonomias">
			<span><b><?php echo $texto ?></b><?php the_field($field); echo $texto2 ?></span>
		</div> <?php
	}
}

function impreza_child_idioma($idioma) {

	$idioma_lista = array();

	if ($idioma) {
		foreach ($idioma as $valor) {

			if ($valor == 'ptg') {
				$rotulo = 'Português';
			} else if ($valor == 'esp') {
				$rotulo = "Espanhol";
			} else if ($valor == 'ing') {
				$rotulo = 'Inglês';
			} else if ($valor == 'fra') {
				$rotulo = 'Francês';
			} else {
				$rotulo = '';
			}
			array_push($idioma_lista, $rotulo);
		}
		
		$idiomas = implode(", ", $idioma_lista);
		if ($idioma_lista != '') { ?>
			<div class="g-taxonomias">
				<span><b>Idioma: </b><?php echo $idiomas ?></span>
			</div> <?php
		}
	}
}
?>