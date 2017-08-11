<?php 
/*-----------------------------------------------------------------------------------*/
/* Replace WP autop formatting
/*-----------------------------------------------------------------------------------*/
function addons_espania_remove_wpautop($content){
    $fix = array (
        ']<br />' => ']',
        '<br />[' => '[',
        '<br>' => '',
    );
    $content = strtr($content, $fix);
	$content = do_shortcode( shortcode_unautop( $content ) ); 
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
	return $content;
  
}


/*-----------------------------------------------------------------------------------*/
/* Container shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_container( $atts, $content = null ) {
	$out = addons_espania_remove_wpautop( $content );
	$out = '<div class="container">'.$out.'</div>';
	return $out; 
}
add_shortcode( 'container', 'addons_espania_shortcode_container' );



/*-----------------------------------------------------------------------------------*/
/* Columns shortcodes
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_row( $atts, $content = null ) {
    $out = do_shortcode( addons_espania_remove_wpautop( $content ) );
    $out = '<div class="row columns">'.$out.'</div>';
    return $out;
}

if( ! function_exists( 'addons_espania_shortcode_column' ) ) {
    function addons_espania_shortcode_column( $atts, $content = null, $code = '' ) {
        if( 'one_twelve' == $code )
            $class = 'col-md-1';
        else if( 'two_twelve' == $code )
            $class = 'col-md-2';
        else if( 'three_twelve' == $code )
            $class = 'col-md-3';
        else if( 'four_twelve' == $code )
            $class = 'col-md-4';
        else if( 'five_twelve' == $code )
            $class = 'col-md-5';
        else if( 'six_twelve' == $code )
            $class = 'col-md-6';
        else if( 'seven_twelve' == $code  )
            $class = 'col-md-7';
        else if( 'eight_twelve' == $code )
            $class = 'col-md-8';
        else if( 'nine_twelve' == $code )
            $class = 'col-md-9';
        else if( 'ten_twelve' == $code )
            $class = 'col-md-10';
        else if( 'eleven_twelve' == $code )
            $class = 'col-md-11';
        // Return column
        $content = '<div class="'.$class.'">'. addons_espania_remove_wpautop( $content ).'</div>';
        return do_shortcode( $content );
    }
}
add_shortcode( 'row', 'addons_espania_shortcode_row' );
add_shortcode( 'one_twelve', 'addons_espania_shortcode_column' ); 		//  1/12
add_shortcode( 'two_twelve', 'addons_espania_shortcode_column' );	    //  2/12
add_shortcode( 'three_twelve', 'addons_espania_shortcode_column' ); 	//  3/12
add_shortcode( 'four_twelve', 'addons_espania_shortcode_column' );		//  4/12
add_shortcode( 'five_twelve', 'addons_espania_shortcode_column' );		//  5/12
add_shortcode( 'six_twelve', 'addons_espania_shortcode_column' );		//  6/12
add_shortcode( 'seven_twelve', 'addons_espania_shortcode_column' );		//  7/12
add_shortcode( 'eight_twelve', 'addons_espania_shortcode_column' );		//  8/12
add_shortcode( 'nine_twelve', 'addons_espania_shortcode_column' );		//  9/12
add_shortcode( 'ten_twelve', 'addons_espania_shortcode_column' );		// 10/12
add_shortcode( 'eleven_twelve', 'addons_espania_shortcode_column' );	// 11/12



/*-----------------------------------------------------------------------------------*/
/* Label shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_label( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style'		   => '',
        'text_color'   => '#ffffff',
        'bg_color' 	   => '#999999',
        'class'        => '',
    ), $atts));

    $styles = array ( 'default', 'primary', 'info', 'success', 'warning', 'danger' );

    $text_color = $text_color ? $text_color : '#ffffff';
    $bg_color = $bg_color ? $bg_color : '#999999';

    if   ( in_array ( $style, $styles) ) { $style = 'label-'.$style; $colors = ''; }
    else { $colors = 'color:'.$text_color.'; background-color:'.$bg_color.';'; }

    $out = '<div class="label '.$style.' ' . $class . '" style="'.$colors.'">'. addons_espania_remove_wpautop( $content ).'</div>';
    return $out;
}
add_shortcode('label', 'addons_espania_shortcode_label');



/*-----------------------------------------------------------------------------------*/
/* Highlight shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_highlight( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style'		 => '',
        'text_color' => '#ffffff',
        'bg_color'	 => '#000000',
        'class'      => '',
    ), $atts));

    $styles = array ( 'green', 'violet', 'blue', 'lime', 'red', 'black' );

    $text_color = $text_color ? $text_color : '#ffffff';
    $bg_color = $bg_color ? $bg_color : '#000000';

    if   ( in_array ( $style, $styles) ) { $style = 'highlight-'.$style; $colors = ''; }
    else { $colors = 'color:'.$text_color.'; background-color:'.$bg_color.';'; }

    $out = '<span class="'.$style.' ' . $class . '" style="'.$colors.'">'.do_shortcode( $content ).'</span>';
    return $out;
}
add_shortcode('highlight', 'addons_espania_shortcode_highlight');



/*-----------------------------------------------------------------------------------*/
/* Divider shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_divider( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style'	 => 'solid',
        'color'	 => '#e9eef4',
        'height' => '1px',
        'class'  => '',
    ), $atts));

    $style = 'border-bottom:'.$height.' '.$style.' '.$color.';';
    $out = '<div class="divider ' . $class . '" style="'.$style.'"></div><div class="clearfix"></div>';
    return $out;
}
add_shortcode('divider', 'addons_espania_shortcode_divider');



/*-----------------------------------------------------------------------------------*/
/* Abbreviation shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_abbr( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'title'  => 'Abbreviation',
        'class'  => '',
    ), $atts));
    $out = '<abbr class="' . $class . '" data-original-title="'.$title.'">'.do_shortcode( $content ).'</abbr>';
    return $out;
}
add_shortcode('abbr', 'addons_espania_shortcode_abbr');


/*-----------------------------------------------------------------------------------*/
/* Header shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_header( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style' 	=> 'h2',
        'subtext' 	=> '',
        'class'     => '',
    ), $atts));

    $subtext = $subtext ? '<small>'.$subtext.'</small>' : '';

    $out = '<div class="page-header ' . $class . '"><'.$style.'>'.do_shortcode( $content ).$subtext.'</'.$style.'></div>';
    return $out;
}
add_shortcode('header', 'addons_espania_shortcode_header');


/*-----------------------------------------------------------------------------------*/
/* Collapse shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_collapse( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'title' 	   => 'Collapse title',
        'style'		   => '',
        'open'		   => '0',
        'text_color'   => '#ffffff',
        'bg_color' 	   => '#000000',
        'border_color' => '#000000',
        'class'        => '',
    ), $atts));

    $styles = array ( 'green', 'violet', 'blue', 'lime', 'red', 'black' );
    $open = $open ? 'in' : '';
    $collapse_id = rand();

    $text_color   = $text_color ? $text_color : '#ffffff';
    $bg_color     = $bg_color ? $bg_color : '#000000';
    $border_color = $border_color ? $border_color : '#000000';

    if   ( in_array ( $style, $styles) ) { $style = 'panel-'.$style; $text_color = ''; $bg_color = ''; $border_color = ''; }
    else { $text_color = 'style="color:'.$text_color.'"'; $bg_color = 'style="background-color:'.$bg_color.'"'; $border_color = 'style="border-color:'.$border_color.'"'; }

    $out  = '<div class="panel-group ' . $class . '" id="accordion">';
    $out .= '<div class="panel '.$style.'" '.$border_color.'>';
    $out .= '<div class="panel-heading" '.$bg_color.'>';
    $out .= '<h4 class="panel-title"></h4><a class="accordion-toggle" '.$text_color.' data-toggle="collapse" data-parent="#accordion" href="#'.$collapse_id.'">'.$title.'</a>';
    $out .= '</div>';
    $out .= '<div id="'.$collapse_id.'" class="panel-collapse collapse '.$open.'">';
    $out .= '<div class="panel-body">'.do_shortcode( addons_espania_remove_wpautop( $content ) ).'</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('collapse', 'addons_espania_shortcode_collapse');


/*-----------------------------------------------------------------------------------*/
/* Tab shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_tabs( $atts, $content = null ) {
    global $tabs_arr;

    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));

    $tabs_arr = array();
    do_shortcode($content);
    $return = '';
    if (!empty($tabs_arr)) {
        $count = 0;
        $tab_items = array();
        $tab_contents = array();
        foreach ($tabs_arr as $tab) {
            $count++;
            $li_active = ( $count == 1 ) ? 'class="active"' : '';
            $div_active = ( $count == 1 ) ? 'active' : '';

            $tab_items[] = '<li '.$li_active.'><a href="#tab_' . strtolower(str_replace(" ", "_", $tab['title'])) . '" data-toggle="tab">' . $tab['title'] . '</a></li>';
            $tab_contents[] = '<div class="tab-pane '.$div_active.'" id="tab_' . strtolower(str_replace(" ", "_", $tab['title'])) . '">' . $tab['content'] . '</div>';
        }
        $return = "\n" . '<!-- the tabs --><ul class="nav nav-tabs clearfix ' . $class . '">' . implode("\n", $tab_items) . '<div class="clearfix"></div></ul>' . "\n" . '<!-- tab "content" --><div class="tab-content">' . implode("\n", $tab_contents) . '</div>' . "\n";
    }
    return $return;
}
add_shortcode('espania_tabs', 'addons_espania_shortcode_tabs');

function addons_espania_shortcode_tab( $attrs, $content = null ) {
    global $tabs_arr;
    $attrs = shortcode_atts(array(
        'title' => '',
    ), $attrs);
    $tabs_arr[] = array(
        'title' => $attrs['title'],
        'content' => do_shortcode($content),
    );
}
add_shortcode('espania_tab', 'addons_espania_shortcode_tab');


/*-----------------------------------------------------------------------------------*/
/* Margin shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_margin( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'top'	 => '0px',
        'bottom' => '30px',
        'class'  => '',
    ), $atts));

    $style = 'margin-top:'.$top.'; margin-bottom:'.$bottom.';';
    $out = '<div class="clearfix"></div><div class="' . $class . '" style="'.$style.'"></div>';
    return $out;
}
add_shortcode('espania_margin', 'addons_espania_shortcode_margin');


/*-----------------------------------------------------------------------------------*/
/* Button shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'text'		         => 'Button',
        'link'		         => '#',
        'target'	         => '_self',
        'size'		         => 'normal',
        'text_color'         => '',
        'bg_color' 	         => '',
        'border_color'       => '',
        'hover_text_color'   => '',
        'hover_bg_color'     => '',
        'hover_border_color' => '',
        'class'              => '',
    ), $atts));

    $text_hover = $hover_text_color ? ' data-hover-text-color="'.$hover_text_color.'"' : '';
    $bg_hover = $hover_bg_color ? ' data-hover-bg-color="'.$hover_bg_color.'"' : '';
    $border_hover = $hover_border_color ? ' data-hover-border-color="'.$hover_border_color.'"' : '';

    $colors = 'color:'.$text_color.'; background-color:'.$bg_color.'; border-color:'.$border_color.';';

    $out = '<a href="'.$link.'" target="'.$target.'"><button type="button" class="btn btn-code btn-'.$size.' '.$class.'" style="'.$colors.'"'.$text_hover.$bg_hover.$border_hover.'><span></span>'.$text.'</button></a>';
    return $out;
}
add_shortcode('espania_button', 'addons_espania_shortcode_button');


/*-----------------------------------------------------------------------------------*/
/* Alert shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_alert( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style'		   => '',
        'close'		   => '1',
        'text_color'   => '#3a87ad',
        'bg_color' 	   => '#d9edf7',
        'border_color' => '#bce8f1',
        'class'        => '',
    ), $atts));

    $styles = array ( 'info', 'success', 'warning', 'danger' );

    $text_color   = $text_color ? $text_color : '#3a87ad';
    $bg_color     = $bg_color ? $bg_color : '#d9edf7';
    $border_color = $border_color ? $border_color : '#bce8f1';

    if   ( in_array ( $style, $styles) ) { $style = 'alert-'.$style; $colors = ''; }
    else { $colors = 'color:'.$text_color.'; background-color:'.$bg_color.'; border-color:'.$border_color.';'; }

    $close_btn = $close ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' : '';

    $out = '<div class="alert '.$style.' ' . $class . '" style="'.$colors.'">'.$close_btn.do_shortcode( addons_espania_remove_wpautop( $content ) ).'</div>';
    return $out;
}
add_shortcode('espania_alert', 'addons_espania_shortcode_alert');


/*-----------------------------------------------------------------------------------*/
/* Classic blog shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_blog( $atts, $content = null ) {

    extract(shortcode_atts(array(
        'category'	     => '',
        'number'         => 12,
        'order_by' 	     => 'post_date',
        'order'          => 'DESC',
        'thumb_size'	 => 'espania-normal',
        'show_panel'     => '1',
        'show_load_more' => '1',
        'class'          => '',
    ), $atts));

    global $wp_query; global $post;

    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }

    $is_blog = true;
    $shortcode_id = rand();

    $the_query = new WP_Query( array(
        'post_type'      => 'post',
        'cat'            => $category,
        'orderby'        => $order_by,
        'order'          => $order,
        'posts_per_page' => $number,
        'paged'          => $paged,
    ) );

    ob_start();

    if ( $the_query->have_posts() ) : ?>

        <div id="sc-blog" class="b-sc blog <?php if( is_single() ) echo 'no-s-links'; ?> <?php echo $class; ?>">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <?php require( get_template_directory() . '/content-blog-post.php' ); ?>

            <?php endwhile; ?>

            <?php if ( $show_load_more ) espania_content_nav( $the_query->max_num_pages ); ?>

            <?php wp_reset_postdata(); ?>

        </div>

    <?php endif;

    $buffer = ob_get_contents();

    ob_end_clean();

    return $buffer;

}
add_shortcode('espania_blog', 'addons_espania_shortcode_blog');



/*-----------------------------------------------------------------------------------*/
/* Alternative blog shortcode
/*-----------------------------------------------------------------------------------*/
function addons_espania_shortcode_alt_blog( $atts, $content = null ) {

    extract(shortcode_atts(array(
        'category'	     => '',
        'number'         => 12,
        'order_by' 	     => 'post_date',
        'order'          => 'DESC',
        'show_load_more' => '1',
        'show_read_more' => '1',
        'class'          => '',
    ), $atts));

    global $wp_query; global $post;

    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
    else { $paged = 1; }

    $is_blog = true;
    $post_classes = array( 'blog-post', 'post', 'clearfix' );
    $thumb_size = 'espania-alt';

    $the_query = new WP_Query( array(
        'post_type'      => 'post',
        'cat'            => $category,
        'orderby'        => $order_by,
        'order'          => $order,
        'posts_per_page' => $number,
        'paged'          => $paged,
    ) );

    ob_start();

    if ( $the_query->have_posts() ) : ?>

        <div id="sc-alt-blog" class="b-sc blog blog-alt <?php if( is_single() ) echo 'no-s-links'; ?> <?php echo $class; ?>">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post();

                global $more; $more = 0;

                $post_format = get_post_format(); ?>


                <article <?php post_class( $post_classes  ); ?>>

                    <div class="blog-post__lefttcol">

                        <?php if( $post_format === "video" ) { ?>
                            <div class="blog-media">
                                <?php espania_video_post_format( $thumb_size ); ?>
                            </div>
                        <?php } elseif ( $post_format === "audio" ) { ?>
                            <div class="blog-media">
                                <?php espania_audio_post_format( $thumb_size ); ?>
                            </div>
                        <?php } elseif ( has_post_thumbnail() ) { ?>
                            <div class="blog-post__image">
                                <a href="<?php the_permalink(); ?>">
                                    <span class="img-circle"></span>
                                    <?php the_post_thumbnail( $thumb_size, array( 'alt' => the_title_attribute( 'echo=0' ) )  ); ?>
                                </a>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="blog-post__rightcol">

                        <div class="blog-post__title">
                            <h2><?php echo '<a href="'.get_permalink().'">'.get_the_title().'</a>'; ?></h2>
                        </div>

                        <div class="blog-post__meta meta main-color-bg-b">
                            <span class="blog-post__date"><?php echo get_the_date( 'F j, <\i>Y</\i>' ); ?></span>
                            <span class="blog-post__category"><?php _e( 'posted in', 'espania' ); ?> <?php echo get_the_category_list(', '); ?></span>
                            <?php edit_post_link( __( 'edit', 'espania' ), '<span class="blog-post__edit">', '</span>' ); ?>
                        </div>

                        <div class="blog-post__text">
                            <?php the_content(); ?>
                        </div>

                        <?php if ( $show_read_more ) { ?>
                            <a href="<?php the_permalink(); ?>" class="btn"><span></span><?php _e( 'Read more', 'espania' ); ?></a>
                        <?php } ?>

                    </div>

                </article>

            <?php endwhile; ?>

            <?php if ( $show_load_more ) espania_content_nav( $the_query->max_num_pages ); ?>

            <?php wp_reset_postdata(); ?>

        </div>

    <?php endif;

    $buffer = ob_get_contents();

    ob_end_clean();

    return $buffer;

}
add_shortcode('espania_alt_blog', 'addons_espania_shortcode_alt_blog');