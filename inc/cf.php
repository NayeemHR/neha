<?php
define('CS_ACTIVE_FRAMEWORK', false);
define('CS_ACTIVE_METABOX', true);
define('CS_ACTIVE_TAXONOMY', false);
define('CS_ACTIVE_SHORTCODE', false);
define('CS_ACTIVE_CUSTOMIZE', false);
function neha_csf_metabox(){
    CSFramework_Metabox::instance(array());
}
add_action("init", "neha_csf_metabox");
function neha_page_section($options){
    $page_id = 0;
    if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
        $page_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'] ;
    }
    $current_page_template = get_post_meta($page_id, '_wp_page_template', true);
    if('about.php' != $current_page_template){
        return $options;
    }
    //for two type of page template
    if(!in_array($current_page_template, array('about.php', 'contact.php'))){
        return $options;
    }
    $options[] = array(
        'id' => 'page-metabox',
        'title' => __( 'Page Meta Info', 'neha'),
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'name'=>'page-section1',
                'title' => __( 'Page settings', 'neha'),
                'icon'=>'fa fa-image',
                'fields' => array(
                    array(
                        'id'=>'page-heading',
                        'type' => 'text',
                        'title'=>__('Page Heading', 'neha'),
                        'default'=>__('Page Heading', 'neha')
                    ),
                    array(
                        'id'=>'page-teaser',
                        'type' => 'textarea',
                        'title'=>__('Teaser Text', 'neha'),
                        'default'=>__('Teaser Text', 'neha')
                    ),
                    array(
                        'id'=>'is_favorite',
                        'type' => 'switcher',
                        'title'=>__('Is Favorite', 'neha')
                    ),
                    array(
                        'id'=>'is_favorite_extra',
                        'type' => 'switcher',
                        'title'=>__('Do you Have extra fav?', 'neha'),
                    ),
                    array(
                        'id' => 'fav_text',
                        'type'=> 'text',
                        'title'=>__('Your Favorite Test'),
                        'dependency' => array(
                            'is_favorite',
                            '==',
                            '1'
                        )
                    ),
                    array(
                        'id' => 'fav_text',
                        'type'=> 'text',
                        'title'=>__('Your Favorite Test'),
                        'dependency' => array(
                            'is_favorite|is_favorite_extra',
                            '==|==',
                            '1|1'
                        )
                    ),
                    array(
                        'id' => 'support-language',
                        'type'=> 'checkbox',
                        'title'=>__('Language', 'neha'),
                        'options' => array(
                            'ban' => 'Bangla',
                            'eng' => 'English',
                            'frn' => 'French'
                        )
                    ),
                    array(
                        'id'=>'wrt_bn_en',
                        'type' => 'text',
                        'title'=>__('Write something in bangla or english.', 'neha'),
                        'dependency' => array(
                            'support-language_ban|support-language_eng', '==|==', '1|1'
                        )
                    ),



                )
            ),
            array(
                'name'=>'page-section2',
                'title' => __( 'Extra settings', 'neha'),
                'icon'=>'fa fa-book',
                'fields' => array(
                    array(
                        'id'=>'page-heading2',
                        'type' => 'text',
                        'title'=>__('Page Heading', 'neha'),
                        'default'=>__('Page Heading', 'neha')
                    ),
                    array(
                        'id'=>'page-teaser2',
                        'type' => 'textarea',
                        'title'=>__('Teaser Text', 'neha'),
                        'default'=>__('Teaser Text', 'neha')
                    ),
                    array(
                        'id'=>'is favorite2',
                        'type' => 'switcher',
                        'title'=>__('Is Favorite', 'neha'),
                        'default'=>__('Is Favorite', 'neha')
                    ),
                    array(
                        'id' => 'support-language2',
                        'type'=> 'checkbox',
                        'title'=>__('Language', 'neha'),
                        'options' => array(
                            'ban1' => 'Bangla',
                            'eng1' => 'English',
                            'frn1' => 'French'
                        ),
                        'attributes'=>array('data-depend-id'=>'support-language2')
                    ),
                    array(
                        'id'=>'wrt_bn_en2',
                        'type' => 'text',
                        'title'=>__('Write something', 'neha'),
                        'dependency' => array(
                            'support-language2', 'any', 'ban1,eng1'
                        )
                    ),

                )
            ),

        )
    );

    return $options;
}
add_filter('cs_metabox_options','neha_page_section');

//function neha_page_metabox($options){
//    $options[] = array(
//        'id' => 'page-metabox',
//        'title' => __( 'Page Meta Info', 'neha'),
//        'post_type' => 'page',
//        'context' => 'normal',
//        'priority' => 'page',
//
//    );
//}
//add_filter();