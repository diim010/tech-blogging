<?php
/**
 * Register Block Patern For Gutenberg
 */

add_action( 'init', 'tech_blogging_register_blog_patterns', 10, 1 );

function tech_blogging_register_blog_patterns(){
	register_block_pattern_category( 'tech-blogging',
    	array( 'label' => __( 'Tech Blogging', 'tech-blogging' ) ),
   );
	register_block_style('core/media-text', [
		'name' => 'media-text-border-layout',
		'label' => __('Border', 'tech-blogging'),
	]);
	register_block_pattern(
	    'tech-blogging/textblock_with_image',
	    array(
        'title'       => __( 'Text Block With Image', 'tech-blogging' ),
        'categories'  => array('tech-blogging'),
        'description' => _x( 'Text Block With Image contain, Text Drop in first paragraph. tow column layout that contains image in left side and text to the right side. and below of it another paragraph ', 'Text Block With Image description', 'tech-blogging' ),
        'content'     => '<!-- wp:paragraph {"dropCap":true} -->
						<p class="has-drop-cap">Kaccum san pericula usu an, in pri dolorum denique. Cu movet debitis cum. Vix paulo evertitur cu, conceptam constituam te his, meis euismod sed ad. Partem suscipit cu cum. Vix no prodesset complectitur conclud aturque, dicam perfecto eu per, ne vis eleifend expetenda. Idque petentium laboramus mea id, mei at minim labores. Tollit ullamcorper ius cu, eos malis clita luptatum ei, vix ullum forensibus an. Esse option singulis id nec, nam eruditi ornatus at. Eam soluta dicunt cu. Est ad oporteat appellantur, per dicta pertinax cu. Iusto quando conceptam vim ad, an sed explicari appellantur. Augue utamur lobortis vim ne.</p>
						<!-- /wp:paragraph -->

						<!-- wp:columns -->
						<div class="wp-block-columns"><!-- wp:column -->
						<div class="wp-block-column"><!-- wp:image {"id":43,"sizeSlug":"large","linkDestination":"none"} -->
						<figure class="wp-block-image size-large"><img src="http://localhost/freetheme/blogstarter/wp-content/uploads/2020/06/elevate-kDPm1On9jfs-unsplash-scaled-1-682x1024.jpg" alt="" class="wp-image-43"/></figure>
						<!-- /wp:image --></div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column"><!-- wp:paragraph -->
						<p>Semper ultricies nisi vel augue blandit vel, luctus proin pulvinar del. Aenean sollicitudin, lorem auci elit del con sequat ipsutissem ut niuis sed odio cursus.</p>
						<!-- /wp:paragraph -->

						<!-- wp:quote -->
						<blockquote class="wp-block-quote"><p>Venenatis faucibus. Nullam co ante. Curabitur ullam qur per ultri vitae nisi etiam sit amet. Orci eget eros sapien ut libero?</p></blockquote>
						<!-- /wp:quote -->

						<!-- wp:paragraph -->
						<p>Nam eget dui. Phasellus viverra nulla ut metus varius laoreet. Etiam rhoncus. Lorem ipsum gravida nibh vel velit auctor aliquet. Maecenas tempus, tellus eget condimen rhoncus, sem quam semper libero, sit amet sed ipsum. Curabitur ullamcorper ultricies nisi. Donec vitae sapien libero venenatis faucibus amet. Tempus dolerus ictis deli vitae sapien ut libero?</p>
						<!-- /wp:paragraph --></div>
						<!-- /wp:column --></div>
						<!-- /wp:columns -->

						<!-- wp:paragraph -->
						<p>Cum socis theme sed natoque ut penatibus. Etiam ultricies nisi vel augue. Cura bitur tincidunt ultricies dictum felis eu pede sit. Etiam rhoncus. Tempus, tellus eget condimentum rhoncus, sem quam semper libero, amet et sem adipiscing sem neque nula ipsum. Etiam ultricies nisi vel augue blandit vel, luctus pulvinar.</p>
						<!-- /wp:paragraph -->',
    )
);
}

