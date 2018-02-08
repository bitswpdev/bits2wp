<?php
/**
 * Page: Submit Property
 *
 * Submit property page of the theme.
 *
 * @package    realhomes
 * @subpackage modern
 */

$invalid_nonce          = false;
$submitted_successfully = false;
$updated_successfully   = false;

/* Check if action field is set and user is logged in */
if ( isset( $_POST['action'] ) && is_user_logged_in() ) {

	/* the nonce */
	if ( wp_verify_nonce( $_POST['property_nonce'], 'submit_property' ) ) {

		/* Start with basic array */
		$new_property = array(
			'post_type' => 'property',
		);

		/* Title */
		if ( isset( $_POST['inspiry_property_title'] ) && ! empty( $_POST['inspiry_property_title'] ) ) {
			$new_property['post_title'] = sanitize_text_field( $_POST['inspiry_property_title'] );
		}

		/* Description */
		if ( isset( $_POST['description'] ) && ! empty( $_POST['description'] ) ) {
			$new_property['post_content'] = wp_kses_post( $_POST['description'] );
		}

		/* Get current user */
		$current_user                = wp_get_current_user();
		$new_property['post_author'] = $current_user->ID;


		/* check the type of action */
		$action      = $_POST['action'];
		$property_id = 0;

		/* Parent Property ID */
		if ( isset( $_POST['property_parent_id'] ) && ! empty( $_POST['property_parent_id'] ) ) {
			$new_property['post_parent'] = $_POST['property_parent_id'];
		} else {
			$new_property['post_parent'] = 0;
		}

		/*
		 * Add or Update Property
		 */
		if ( 'add_property' == $action ) {

			$submitted_property_status = get_option( 'theme_submitted_status' );
			if ( ! empty( $submitted_property_status ) ) {
				$new_property['post_status'] = $submitted_property_status;
			} else {
				$new_property['post_status'] = 'pending';
			}

			/*
			 * This filter is used to filter the submission arguments of property before inserting it.
			 */
			$new_property = apply_filters( 'inspiry_before_property_submit', $new_property );

			// Insert Property and get Property ID.
			$property_id = wp_insert_post( $new_property );
			if ( $property_id > 0 ) {
				$submitted_successfully = true;
			}
		} elseif ( 'update_property' == $action ) {

			$new_property['ID'] = intval( $_POST['property_id'] );

			/*
			 * This filter is used to filter the submission arguments of property before update
			 */
			$new_property = apply_filters( 'inspiry_before_property_update', $new_property );

			// Update Property and get Property ID.
			$property_id = wp_update_post( $new_property );
			if ( $property_id > 0 ) {
				$updated_successfully = true;
			}
		}

		/**
		 * If property is added or updated successfully then move ahead
		 */
		if ( $property_id > 0 ) {

			/* Attach Property Type with Newly Created Property */
			if ( isset( $_POST['type'] ) && ( '-1' != $_POST['type'] ) ) {
				wp_set_object_terms( $property_id, intval( $_POST['type'] ), 'property-type' );
			}

			/* Attach Property City with Newly Created Property */
			$location_select_names = inspiry_get_location_select_names();
			$locations_count       = count( $location_select_names );
			for ( $l = $locations_count - 1; $l >= 0; $l -- ) {
				if ( isset( $_POST[ $location_select_names[ $l ] ] ) ) {
					$current_location = $_POST[ $location_select_names[ $l ] ];
					if ( ( ! empty( $current_location ) ) && ( $current_location != inspiry_any_value() ) ) {
						wp_set_object_terms( $property_id, $current_location, 'property-city' );
						break;
					}
				}
			}

			/* Attach Property Status with Newly Created Property */
			if ( isset( $_POST['status'] ) && ( '-1' != $_POST['status'] ) ) {
				wp_set_object_terms( $property_id, intval( $_POST['status'] ), 'property-status' );
			}

			/* Attach Property Features with Newly Created Property */
			if ( isset( $_POST['features'] ) ) {
				if ( ! empty( $_POST['features'] ) && is_array( $_POST['features'] ) ) {
					$property_features = array();
					foreach ( $_POST['features'] as $property_feature_id ) {
						$property_features[] = intval( $property_feature_id );
					}
					wp_set_object_terms( $property_id, $property_features, 'property-feature' );
				}
			}

			/* Attach Price Post Meta */
			if ( isset( $_POST['price'] ) && ! empty( $_POST['price'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_price', sanitize_text_field( $_POST['price'] ) );

				if ( isset( $_POST['price-postfix'] ) && ! empty( $_POST['price-postfix'] ) ) {
					update_post_meta( $property_id, 'REAL_HOMES_property_price_postfix', sanitize_text_field( $_POST['price-postfix'] ) );
				}
			} else {
				delete_post_meta( $property_id, 'REAL_HOMES_property_price' );
			}

			/* Attach Size Post Meta */
			if ( isset( $_POST['size'] ) && ! empty( $_POST['size'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_size', sanitize_text_field( $_POST['size'] ) );

				if ( isset( $_POST['area-postfix'] ) && ! empty( $_POST['area-postfix'] ) ) {
					update_post_meta( $property_id, 'REAL_HOMES_property_size_postfix', sanitize_text_field( $_POST['area-postfix'] ) );
				}
			} else {
				delete_post_meta( $property_id, 'REAL_HOMES_property_size' );
			}

			/* Attach Bedrooms Post Meta */
			if ( isset( $_POST['bedrooms'] ) && ! empty( $_POST['bedrooms'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_bedrooms', floatval( $_POST['bedrooms'] ) );
			} else {
				delete_post_meta( $property_id, 'REAL_HOMES_property_bedrooms' );
			}

			/* Attach Bathrooms Post Meta */
			if ( isset( $_POST['bathrooms'] ) && ! empty( $_POST['bathrooms'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_bathrooms', floatval( $_POST['bathrooms'] ) );
			} else {
				delete_post_meta( $property_id, 'REAL_HOMES_property_bathrooms' );
			}

			/* Attach Garages Post Meta */
			if ( isset( $_POST['garages'] ) && ! empty( $_POST['garages'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_garage', floatval( $_POST['garages'] ) );
			} else {
				delete_post_meta( $property_id, 'REAL_HOMES_property_garage' );
			}

			/* Attach Year Built Post Meta */
			if ( isset( $_POST['year-built'] ) && ! empty( $_POST['year-built'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_year_built', floatval( $_POST['year-built'] ) );
			}

			/* Attach Address Post Meta */
			if ( isset( $_POST['address'] ) && ! empty( $_POST['address'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_address', sanitize_text_field( $_POST['address'] ) );
			}

			/* Attach Address Post Meta */
			if ( isset( $_POST['coordinates'] ) && ! empty( $_POST['coordinates'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_location', $_POST['coordinates'] );
			}

			/* Agent Display Option */
			if ( isset( $_POST['agent_display_option'] ) && ! empty( $_POST['agent_display_option'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_agent_display_option', $_POST['agent_display_option'] );
				if ( ( $_POST['agent_display_option'] == 'agent_info' ) && isset( $_POST['agent_id'] ) ) {
					delete_post_meta( $property_id, 'REAL_HOMES_agents' );
					foreach ( $_POST['agent_id'] as $agent_id ) {
						add_post_meta( $property_id, 'REAL_HOMES_agents', $agent_id );
					}
				} else {
					delete_post_meta( $property_id, 'REAL_HOMES_agents' );
				}
			}

			/* Attach Property ID Post Meta */
			if ( isset( $_POST['property-id'] ) && ! empty( $_POST['property-id'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_property_id', sanitize_text_field( $_POST['property-id'] ) );
			} else {
				$auto_property_id    = get_option( 'inspiry_auto_property_id_check' );
				$property_id_pattern = get_option( 'inspiry_auto_property_id_pattern' );
				if ( ! empty( $auto_property_id ) && ( 'true' === $auto_property_id ) && ! empty( $property_id_pattern ) ) {
					$property_id_value = preg_replace( '/{ID}/', $property_id, $property_id_pattern );
					update_post_meta( $property_id, 'REAL_HOMES_property_id', sanitize_text_field( $property_id_value ) );
				}
			}

			/* Attach Virtual Tour Video URL Post Meta */
			if ( isset( $_POST['video-url'] ) && ! empty( $_POST['video-url'] ) ) {
				update_post_meta( $property_id, 'REAL_HOMES_tour_video_url', esc_url_raw( $_POST['video-url'] ) );
			}

			/* Attach Message to Reviewer */
			if ( isset( $_POST['message_to_reviewer'] ) && ! empty( $_POST['message_to_reviewer'] ) ) {
				update_post_meta( $property_id, 'inspiry_message_to_reviewer', esc_textarea( $_POST['message_to_reviewer'] ) );
			}

			/* Attach additional details with property */
			if ( isset( $_POST['detail-titles'] ) && isset( $_POST['detail-values'] ) ) {

				$additional_details_titles = $_POST['detail-titles'];
				$additional_details_values = $_POST['detail-values'];

				$titles_count = count( $additional_details_titles );
				$values_count = count( $additional_details_values );

				// to skip empty values on submission
				if ( $titles_count == 1 && $values_count == 1 && empty( $additional_details_titles[0] ) && empty( $additional_details_values[0] ) ) {
					// do nothing and let it go
				} else {

					if ( ! empty( $additional_details_titles ) && ! empty( $additional_details_values ) ) {
						$additional_details = array_combine( $additional_details_titles, $additional_details_values );
						update_post_meta( $property_id, 'REAL_HOMES_additional_details', $additional_details );
					}
				}
			}

			/* Attach Property as Featured Post Meta */
			$featured = ( isset( $_POST['featured'] ) && ! empty( $_POST['featured'] ) ) ? 1 : 0;
			update_post_meta( $property_id, 'REAL_HOMES_featured', $featured );

			/* Property Submission Terms & Conditions */
			$terms = ( isset( $_POST['terms'] ) && ! empty( $_POST['terms'] ) ) ? 1 : 0;
			update_post_meta( $property_id, 'REAL_HOMES_terms_conditions', $terms );

			/* Tour video image - in case of update */
			$tour_video_image    = '';
			$tour_video_image_id = 0;
			if ( $action == 'update_property' ) {
				$tour_video_image_id = get_post_meta( $property_id, 'REAL_HOMES_tour_video_image', true );
				if ( ! empty( $tour_video_image_id ) ) {
					$tour_video_image_src = wp_get_attachment_image_src( $tour_video_image_id, 'property-detail-video-image' );
					$tour_video_image     = $tour_video_image_src[0];
				}
			}

			/* If property is being updated, clean up the old meta information related to images */
			if ( $action == 'update_property' ) {
				delete_post_meta( $property_id, 'REAL_HOMES_property_images' );
				delete_post_meta( $property_id, '_thumbnail_id' );
			}

			/* Attach gallery images with newly created property */
			if ( isset( $_POST['gallery_image_ids'] ) ) {
				if ( ! empty( $_POST['gallery_image_ids'] ) && is_array( $_POST['gallery_image_ids'] ) ) {
					$gallery_image_ids = array();
					foreach ( $_POST['gallery_image_ids'] as $gallery_image_id ) {
						$gallery_image_ids[] = intval( $gallery_image_id );
						add_post_meta( $property_id, 'REAL_HOMES_property_images', $gallery_image_id );
					}
					if ( isset( $_POST['featured_image_id'] ) ) {
						$featured_image_id = intval( $_POST['featured_image_id'] );
						if ( in_array( $featured_image_id, $gallery_image_ids ) ) {     // validate featured image id
							update_post_meta( $property_id, '_thumbnail_id', $featured_image_id );

							/* if video url is provided but there is no video image then use featured image as video image */
							if ( empty( $tour_video_image ) && ! empty( $_POST['video-url'] ) ) {
								update_post_meta( $property_id, 'REAL_HOMES_tour_video_image', $featured_image_id );
							}
						}
					} elseif ( ! empty( $gallery_image_ids ) ) {
						update_post_meta( $property_id, '_thumbnail_id', $gallery_image_ids[0] );

						/* if video url is provided but there is no video image then use featured image as video image */
						if ( empty( $tour_video_image ) && ! empty( $_POST['video-url'] ) ) {
							update_post_meta( $property_id, 'REAL_HOMES_tour_video_image', $gallery_image_ids[0] );
						}
					}
				}
			}


			if ( 'add_property' == $_POST['action'] ) {
				/*
				 * inspiry_submit_notice function in property-submit-handler.php is hooked with this hook
				 */
				do_action( 'inspiry_after_property_submit', $property_id );

			} elseif ( 'update_property' == $_POST['action'] ) {
				/*
				 * no default theme function is hooked with this hook
				 */
				do_action( 'inspiry_after_property_update', $property_id );

			}

			/* Redirect to my properties page */
			$my_properties_url = inspiry_get_my_properties_url();
			if ( ! empty( $my_properties_url ) ) {
				$separator = ( parse_url( $my_properties_url, PHP_URL_QUERY ) == null ) ? '?' : '&';
				$parameter = ( $updated_successfully ) ? 'property-updated=true' : 'property-added=true';
				wp_redirect( $my_properties_url . $separator . $parameter );
			}
		}
	} else {
		$invalid_nonce = true;
	}
}

get_header();

// Page Head.
$header_variation = get_option( 'inspiry_member_pages_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/image' );
}

// get_template_part( 'assets/modern/partials/properties/search/advance' ); ?>

	<section class="rh_section rh_wrap rh_wrap--padding rh_wrap--topPadding">

		<div class="rh_page">

			<div class="rh_page__head">

				<?php if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) : ?>
					<h2 class="rh_page__title">
						<?php
						if ( inspiry_is_edit_property() ) :
							?>
							<span class="sub"><?php esc_html_e( 'Edit', 'framework' ); ?></span>
							<span class="title"><?php esc_html_e( 'Property', 'framework' ); ?></span>
							<?php
						else :
							// Page Title.
							$page_title = get_post_meta( get_the_ID(), 'REAL_HOMES_banner_title', true );
							if ( empty( $page_title ) ) {
								$page_title = get_the_title( get_the_ID() );
							}

							$page_title = explode( ' ', $page_title, 2 );

							if ( ! empty( $page_title ) ) {
								?>
								<span class="sub"><?php echo esc_html( $page_title[0] ); ?></span>
								<span class="title"><?php echo esc_html( $page_title[1] ); ?></span>
								<?php
							}
						endif;
						?>
					</h2>
					<!-- /.rh_page__title -->
				<?php endif; ?>

				<div class="rh_page__nav">

					<?php
					$profile_url = inspiry_get_edit_profile_url();
					if ( ! empty( $profile_url ) ) :
						?>
						<a href="<?php echo esc_url( $profile_url ); ?>" class="rh_page__nav_item">
							<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-dash-profile.svg' ); ?>
							<p><?php esc_html_e( 'Profile', 'framework' ); ?></p>
						</a>
						<?php
					endif;

					$my_properties_url = inspiry_get_my_properties_url();
					if ( ! empty( $my_properties_url ) ) :
						?>
						<a href="<?php echo esc_url( $my_properties_url ); ?>" class="rh_page__nav_item">
							<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-dash-my-properties.svg' ); ?>
							<p><?php esc_html_e( 'My Properties', 'framework' ); ?></p>
						</a>
						<?php
					endif;

					$favorites_url = inspiry_get_favorites_url(); // Favorites page.
					if ( ! empty( $favorites_url ) ) :
						?>
						<a href="<?php echo esc_url( $favorites_url ); ?>" class="rh_page__nav_item">
							<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-dash-favorite.svg' ); ?>
							<p><?php esc_html_e( 'Favorites', 'framework' ); ?></p>
						</a>
					<?php endif; ?>

				</div>
				<!-- /.rh_page__nav -->

			</div>
			<!-- /.rh_page__head -->

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<?php if ( get_the_content() ) : ?>
						<div class="rh_content rh_page__content">
							<?php the_content(); ?>
						</div>
						<!-- /.rh_content -->
					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>

			<?php
			if ( ! is_user_logged_in() ) {
				$enable_user_nav = get_option( 'theme_enable_user_nav' );
				$theme_login_url = inspiry_get_login_register_url(); // Login and Register.

				if ( ! empty( $enable_user_nav ) && 'true' === $enable_user_nav ) {
					if ( empty( $theme_login_url ) ) {
						alert( esc_html__( 'Login Required:', 'framework' ), sprintf( esc_html__( 'Please %1$s login %2$s to submit property!', 'framework' ), '<a href="#" id="rh_login__trigger_modal">', '</a>' ) );
					} elseif ( ! empty( $theme_login_url ) ) {
						alert( esc_html__( 'Login Required:', 'framework' ), sprintf( esc_html__( 'Please %1$s login %2$s to submit property!', 'framework' ), '<a href="' . esc_url( $theme_login_url ) . '">', '</a>' ) );
					}
				} else {
					alert( esc_html__( 'Login Required:', 'framework' ), esc_html__( 'Please login to submit property!', 'framework' ) );
				}
			} elseif ( is_user_logged_in() ) {

				if ( $invalid_nonce ) {

					alert( esc_html__( 'Error:', 'framework' ), esc_html__( 'Security check failed!', 'framework' ) );

				} else {

					if ( $submitted_successfully ) {

						alert( esc_html__( 'Success:', 'framework' ), get_option( 'theme_submit_message' ) );

					} elseif ( $updated_successfully ) {

						alert( esc_html__( 'Success:', 'framework' ), esc_html__( 'Property updated successfully!', 'framework' ) );

					} else {

						if ( ! class_exists( 'IMS_Functions' ) ) {

							if ( inspiry_is_edit_property() ) {
								get_template_part( 'assets/modern/partials/property/edit-form' );
							} else {
								get_template_part( 'assets/modern/partials/property/submit-form' );
							} /* end of add/edit property*/

						} elseif ( class_exists( 'IMS_Functions' ) ) {

							// Membership enable option.
							$ims_functions         = IMS_Functions();
							$is_memberships_enable = $ims_functions::is_memberships();

							if ( empty( $is_memberships_enable ) ) {

								if ( inspiry_is_edit_property() ) {
									get_template_part( 'assets/modern/partials/property/edit-form' );
								} else {
									get_template_part( 'assets/modern/partials/property/submit-form' );
								} /* end of add/edit property*/

							} elseif ( ! empty( $is_memberships_enable ) ) {

								// Get current user.
								$ims_user = wp_get_current_user();

								// Get property numbers.
								$ims_membership = get_user_meta( $ims_user->ID, 'ims_current_membership', true );
								$ims_properties = get_user_meta( $ims_user->ID, 'ims_current_properties', true );

								if ( empty( $ims_membership ) ) {

									if ( inspiry_is_edit_property() ) {
										get_template_part( 'assets/modern/partials/property/edit-form' );
									} else {
										get_template_part( 'assets/modern/partials/property/submit-form' );
									}
								} elseif ( ! empty( $ims_membership ) && ! empty( $ims_properties ) ) {

									if ( inspiry_is_edit_property() ) {
										get_template_part( 'assets/modern/partials/property/edit-form' );
									} else {
										get_template_part( 'assets/modern/partials/property/submit-form' );
									} /* end of add/edit property*/

								} elseif ( ! empty( $ims_membership ) && empty( $ims_properties ) ) {

									if ( inspiry_is_edit_property() ) {
										get_template_part( 'assets/modern/partials/property/edit-form' );
									} else {
										get_template_part( 'assets/modern/partials/property/submit-form' );
									}
								}
							}
						}
					} /* end of submitted or updated successfully */
				}
			}
			?>

		</div>
		<!-- /.rh_page -->

	</section>
	<!-- /.rh_section rh_wrap rh_wrap--padding -->

<?php
get_footer();
