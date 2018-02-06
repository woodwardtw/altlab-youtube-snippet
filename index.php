<?php
/**
 * Plugin Name: ALT LAB - YouTube Video Snippet
 * Plugin URI: https://github.com/woodwardtw/
 * Description: embed start/end time youtube videos via shortcode [ytvideo id='id' start='' end='']
 * Version: 1.7
 * Author: Tom Woodward
 * Author URI: http://bionicteaching.com
 * License: GPL2
 */
 
 /*   2016 Tom  (email : bionicteaching@gmail.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */



function alt_yt_enqueue_scripts() {
    wp_enqueue_script( 'yt-snip', plugins_url('/js/base.js', __FILE__ ),array(), '1.0.0', false );
    wp_enqueue_script( 'yt-iframe', 'https://www.youtube.com/iframe_api', array(), '1', false);

}
add_action( 'wp_enqueue_scripts', 'alt_yt_enqueue_scripts' );



function yt_snip( $atts, $content = null ) {  
    extract(shortcode_atts( array(
             'id' => '', //
             'start' => '',
             'end' => '',         
        ), $atts));   

    $video = '<div data-video="' . $id . '" ' ;

    if ($start > 0){
        $vid_start =  ' data-startseconds="' . $start . '" ';
    } else {
        $vid_start =  ' data-startseconds="0" ';
    }             
    if ($end > 0){
        $vid_end = ' data-endseconds="'.$end.'" ';    
    }
    
    $vid_basics =  'data-height="480" data-width="640" id="youtube-player"></div>' ;
    
    $html = $video . $vid_start . $vid_end . $vid_basics;

    return  $html;
}

add_shortcode( 'yt_video', 'yt_snip' );


