<?php 
require_once(get_theme_file_path('inc/cmb2-attached-posts.php'));
//csf
require_once(get_theme_file_path('lib/csf/cs-framework.php'));
require_once(get_theme_file_path('inc/cf.php'));
//csf light theme
define('CS_ACTIVE_LIGHT_THEME', true);
function neha_theme_setup(){
    load_theme_textdomain( "neha", get_theme_file_path('/languages') );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( "custom-logo" );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( "post-formats", array( "audio", "video", "image", "gallery", "quote", "link" ) );
    add_editor_style( '/assets/css/editor-style.css' );

    add_image_size('neha-blog', 555, 253, true);
    add_image_size('neha-blog-large', 1140, 'auto', true);

    register_nav_menu('top_menu', __('Top Menu', 'neha'));
    register_nav_menu('bottom_menu', __('Bottom Menu', 'neha'));
}
add_action( 'after_setup_theme', 'neha_theme_setup' );

function neha_assets(){
//     <link rel="preconnect" href="https://fonts.googleapis.com">
// <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    // googlefont
    wp_enqueue_style( "google-font", "https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&family=Roboto:wght@100;300;400;500;700&family=Volkhov:ital@1&display=swap", null, "1.0.0" );
    // bootstrap.min css
    wp_enqueue_style( "boothstrap", get_theme_file_uri( "/assets/plugins/bootstrap/bootstrap.min.css" ), null, "3.3.7" );
    // Ionic Icon Css
    wp_enqueue_style( 'ionic-icon', get_theme_file_uri( "/assets/plugins/Ionicons/css/ionicons.min.css" ), null , "2.0.0");
    // Animate.css
    wp_enqueue_style( 'animate', get_theme_file_uri( "/assets/plugins/animate-css/animate.css" ), null , "3.5.2");
    // Magnify Popup
    wp_enqueue_style( 'magnify-popup', get_theme_file_uri( "/assets/plugins/magnific-popup/magnific-popup.css" ), null , "1.0.0");
    // Owl Carousel CSS
    wp_enqueue_style( 'owlcarousel', get_theme_file_uri( "/assets/plugins/slick/slick.css" ), null , "1.0.0");
    wp_enqueue_style( 'neha', get_theme_file_uri( "/assets/css/neha.css" ), null , "1.0.0");
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // Bootstrap 3.1

	wp_enqueue_script( 'bootstrap', get_theme_file_uri( "/assets/plugins/bootstrap/bootstrap.min.js"), null, '3.3.7', true  );
	// slick Carousel
	wp_enqueue_script( 'slick', get_theme_file_uri( "/assets/plugins/slick/slick.min.js"), null, '1.0.0', true  );
	wp_enqueue_script( 'magnific', get_theme_file_uri( "/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"), null, '1.0.0', true  );
	// filter
	wp_enqueue_script( 'shuffle', get_theme_file_uri( "/assets/plugins/shuffle/shuffle.min.js"), null, '1.0.0', true  );
	wp_enqueue_script( 'syotimer', get_theme_file_uri( "/assets/plugins/SyoTimer/jquery.syotimer.min.js"), null, '1.0.0', true  );
    // Form Validator
    wp_enqueue_script( "jquery-form", "//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js", array('jquery'), "1.0.0", true );
    wp_enqueue_script( "jquery-form", "//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js", array('jquery'), "1.0.0", true );


    wp_enqueue_script( 'main-js', get_theme_file_uri( "/assets/js/script.js" ), array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts' ,'neha_assets' );
function neha_pagination(){
    global $wp_query;
    $links = paginate_links(
        array(
            'current' => max(1,get_query_var( 'paged' )),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'mid_size'=> 3,
            'prev_text'=> 'Prev',
            'next_text'=> 'Next',
        )
    );
    $links = str_replace("page-numbers", "pagination post-pagination", $links);
    $links = str_replace('<li><span class="pagination post-pagination current">', '<li class="active">', $links);
    echo wp_kses_post($links);
}

function neha_footer_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Bottom Section', 'neha' ),
        'id'            => 'bottom_widget',
        'description'   => __( 'Widgets in this area will be shown on in the footer.', 'neha' ),
        'before_widget' => '<div id="%1s" class="%2s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'neha_footer_widgets_init' );
function before_title_function(){
    echo '<p>this is a before title</p>';
}
add_action( 'before_cat_title', 'before_title_function' );
function after_title_function(){
    echo '<p>this is a after title</p>';
}
add_action( 'after_cat_title', 'after_title_function', 8 );
function after_title_function1(){
    echo '<p>this is a after title3</p>';
}
add_action( 'after_cat_title', 'after_title_function1', 7 );
function cat_count_func($cat){
    if("Uncategorized" == $cat ){
        $cat_count = get_option('cat_count_data');
        $cat_count = $cat_count ? $cat_count : 0;
        $cat_count++;
        update_option('cat_count_data', $cat_count);
    }
}
add_action( 'cat_count', 'cat_count_func' );
function desc_uppercase($param1, $param2){
    echo strtoupper($param1).' '.ucwords($param2);
}
add_filter('desc_filter', 'desc_uppercase', 8, 2);

remove_action('before_cat_title', 'before_title_function');
remove_action('after_cat_title', 'after_title_function', 8);
remove_action('after_cat_title', 'after_title_function1', 7);

remove_filter('desc_filter', 'desc_uppercase', 8);

if(!function_exists('title_for_cat')){
    function title_for_cat(){
        echo 'Category: ';
    }
}

function neha_search_form(){
    $homedir = home_url( "/" );
    $btn_label = __("Submit", "neha");
    $post_type = <<<PT
<input type="hidden" name="post_type" value="post">
PT;
    if(is_post_type_archive('service')){
        $post_type = <<<PT
<input type="hidden" name="post_type" value="service">
PT;
    }

    $newnehaform = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$homedir}">
            {$post_type}
            <label>
              <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
                title="" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="{$btn_label}">
          </form>

FORM;
    return $newnehaform;
}
add_filter( 'get_search_form', 'neha_search_form' );
function neha_cpt_slug_fix($post_link, $id){
    $p = get_post($id);
    if(is_object($p) && 'sub_service' == get_post_type($id)){
        $parent_post_id = get_field('parent_serivce');
        $parent_post = get_post($parent_post_id);
        if($parent_post){
            $post_link = str_replace("%service%", $parent_post->post_name, $post_link);
        }

    }
    return $post_link;
}
add_filter('post_type_link', 'neha_cpt_slug_fix', 10, 2);

