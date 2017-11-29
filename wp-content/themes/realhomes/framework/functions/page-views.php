<?php

/**
 * Class Inspiry_Page_Views'
 *
 * Provide stats of Page views count and relevant dates
 */
class Inspiry_Page_Views {

	private $pageViews;
	private $pageViewed;
	private $userIP;

	function __construct( $post_id ) {

		$this->userIP     = inspiry_get_the_user_ip();
		$this->pageViews  = get_post_meta( $post_id, 'inspiry_page_views', true );
		$this->pageViewed = ( $viewed = get_transient( 'inspiry_page_viewed-' . $post_id . '-' . $this->userIP ) );

		if ( false === $this->pageViewed ) {


			$today_date = date( "d-m-Y" );
			if ( empty( $this->pageViews ) ) {
				$today_count = array(
					$today_date => 1
				);

				add_post_meta( $post_id, 'inspiry_page_views', $today_count, true );

			} else {

				if ( array_key_exists( $today_date, $this->pageViews ) ) {

					$today_count = array(
						$today_date => $this->pageViews[ $today_date ] + 1
					);

				} else {

					$today_count = array(
						$today_date => 1
					);
				}

				$pageViews = array_slice( array_merge( $this->pageViews, $today_count ), - 15 ); // save 15 last records only
				update_post_meta( $post_id, 'inspiry_page_views', $pageViews );
			}

			$this->pageViews = get_post_meta( $post_id, 'inspiry_page_views', true ); // todo: move it to destructor
			set_transient( 'inspiry_page_viewed-' . $post_id . '-' . $this->userIP, true, 86400 ); // one day in seconds = 86400
		}

		$this->pageViewed = ( $viewed = get_transient( 'inspiry_page_viewed-' . $post_id . '-' . $this->userIP ) );
	}

	public function get_page_views_list() {
		return (array) $this->pageViews;
	}
}

if ( ! function_exists( 'inspiry_get_the_user_ip' ) ) {
	/**
	 * Get user ip address
	 * @return mixed|void
	 */
	function inspiry_get_the_user_ip() {
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return apply_filters( 'inspiry_get_the_user_ip', $ip );
	}
}