<?php
/**
 * NABU RSS-Feed Widget
 * Zeigt die neuesten Einträge eines RSS-Feeds als Kasten in der Sidebar.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Nabu_RSS_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'nabu_rss_feed',
			esc_html__( 'NABU RSS-Feed', 'nabu' ),
			array(
				'description' => esc_html__( 'Zeigt die neuesten Beiträge eines RSS-Feeds an. Mehrfach verwendbar.', 'nabu' ),
				'classname'   => 'nabu-rss-widget',
			)
		);
	}

	/**
	 * Frontend-Ausgabe
	 */
	public function widget( $args, $instance ) {
		$feed_url  = ! empty( $instance['feed_url'] ) ? esc_url_raw( $instance['feed_url'] ) : '';
		$title     = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Aktuelle Nachrichten', 'nabu' );
		$num_items = ! empty( $instance['num_items'] ) ? absint( $instance['num_items'] ) : 3;
		$num_items = max( 1, min( 5, $num_items ) );
		$show_date = ! empty( $instance['show_date'] );

		if ( empty( $feed_url ) ) {
			return;
		}

		$feed = fetch_feed( $feed_url );

		if ( is_wp_error( $feed ) ) {
			if ( current_user_can( 'manage_options' ) ) {
				echo $args['before_widget'];
				echo '<p style="color:#c0392b;font-size:0.85em;">';
				echo esc_html__( 'RSS-Feed konnte nicht geladen werden: ', 'nabu' );
				echo esc_html( $feed->get_error_message() );
				echo '</p>';
				echo $args['after_widget'];
			}
			return;
		}

		$items = $feed->get_items( 0, $num_items );

		if ( empty( $items ) ) {
			return;
		}

		echo $args['before_widget'];
		echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

		echo '<ul class="nabu-rss-items">';
		foreach ( $items as $item ) {
			$item_url   = esc_url( $item->get_permalink() );
			$item_title = esc_html( $item->get_title() );
			$item_date  = $show_date ? $item->get_date( get_option( 'date_format' ) ) : '';

			echo '<li class="nabu-rss-item">';
			echo '<a href="' . $item_url . '" target="_blank" rel="noopener noreferrer">';
			echo $item_title;
			echo '</a>';
			if ( $item_date ) {
				echo '<span class="nabu-rss-date">' . esc_html( $item_date ) . '</span>';
			}
			echo '</li>';
		}
		echo '</ul>';

		echo $args['after_widget'];
	}

	/**
	 * Backend-Formular
	 */
	public function form( $instance ) {
		$title     = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$feed_url  = ! empty( $instance['feed_url'] ) ? $instance['feed_url'] : '';
		$num_items = ! empty( $instance['num_items'] ) ? absint( $instance['num_items'] ) : 3;
		$show_date = ! empty( $instance['show_date'] );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Titel des Kastens:', 'nabu' ); ?>
			</label>
			<input class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				type="text"
				value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'feed_url' ) ); ?>">
				<?php esc_html_e( 'RSS-Feed URL:', 'nabu' ); ?>
			</label>
			<input class="widefat"
				id="<?php echo esc_attr( $this->get_field_id( 'feed_url' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'feed_url' ) ); ?>"
				type="url"
				placeholder="https://beispiel.de/feed/"
				value="<?php echo esc_url( $feed_url ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num_items' ) ); ?>">
				<?php esc_html_e( 'Anzahl Einträge (1–5):', 'nabu' ); ?>
			</label>
			<input class="tiny-text"
				id="<?php echo esc_attr( $this->get_field_id( 'num_items' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'num_items' ) ); ?>"
				type="number" min="1" max="5"
				value="<?php echo esc_attr( $num_items ); ?>">
		</p>
		<p>
			<input
				id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>"
				type="checkbox" value="1"
				<?php checked( $show_date ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>">
				<?php esc_html_e( 'Datum anzeigen', 'nabu' ); ?>
			</label>
		</p>
		<?php
	}

	/**
	 * Werte speichern
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['feed_url']  = esc_url_raw( $new_instance['feed_url'] );
		$instance['num_items'] = max( 1, min( 5, absint( $new_instance['num_items'] ) ) );
		$instance['show_date'] = ! empty( $new_instance['show_date'] );
		return $instance;
	}
}
