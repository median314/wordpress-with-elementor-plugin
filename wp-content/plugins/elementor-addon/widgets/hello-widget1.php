<?php

use Elementor\Controls_Manager;

class Elementor_Hello_World_Widget_1 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_1';
	}

	public function get_title() {
		return esc_html__( 'Median Plugin', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

  public function get_style_depends()
  {
    return ['styles'];
  }

  public function _register_controls() {
    /*
		 * start control section and followup with adding control fields.
		 * end control after all control field and repeat if you need other control section respectively.
		*/

		/*
		$this->start_controls_section(
			'section_layout',
			[
				'label' => esc_html__( 'Layout', 'elementor-custom-widget' ),
			]
		);
		$this->add_control(
			'sample_text',
			[
				'label' => __( 'Primary Text', 'elementor-custom-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Enter some text', 'elementor-custom-widget' ),
			]
		);
		$this->end_controls_section();
		*/

    $this->start_controls_section(
      'section_query',
      [
        'label' => esc_html__('Basic', 'elementor-addon')
      ]
    );
    $this->add_control(
			'heading_text',
			[
				'label' => __( 'Source link', 'elementor-addon' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Enter some text', 'elementor-addon' ),
			]
		);
    $this->add_control(
			'upload_image',
			[
				'label' => __( 'Upload', 'elementor-addon' ),
				'type' => Controls_Manager::BUTTON,
				'default' => '',
				'text' => __( 'Upload', 'elementor-addon' ),
				'button_type' => 'default',
				'event' => 'openFolder'
			]
		);
    $this->add_control(
			'posts_per_page',
			[
				'label'   => __( 'Number of Posts', 'elementor-addon' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 5,
				'options' => [
					1  => __( 'One', 'elementor-addon' ),
					2  => __( 'Two', 'elementor-addon' ),
					5  => __( 'Five', 'elementor-addon' ),
					10 => __( 'Ten', 'elementor-addon' ),
					-1 => __( 'All', 'elementor-addon' ),
				]
			]
		);

    $this->end_controls_section();
  }

	protected function render( $instance = [] ) {
    //get input from widget settings
    $settings = $this->get_settings_for_display();
    $custom_text = ! empty( $settings['heading_text'] ) ? $settings['heading_text'] : 'Popular Posts ';
    $post_count = ! empty( $setting['post_per_page'] ) ? $settings['post_per_page'] : 1
		?>
      <img src=<?php echo $custom_text ?> width="100%" />
      <ul class="popular-posts">
        <?php
          $args = array( 'number_posts' => $post_count);
          $recent_posts = wp_get_recent_posts( $args );
          foreach( $recent_posts as $recent ){
            echo '<li><a href="' .esc_url( get_permalink( $recent["ID"] ) ). '">' . esc_html( $recent['post_title'] ).'</a></li>';
          }
          wp_reset_query()
          ?>
      </ul>
		<!-- <div style="display: flex; justify-content: center;">
      <img src="https://storage.googleapis.com/deoapp-indonesia.appspot.com/asset/noimage_800x800.jpeg" width="200px" />
    </div> -->
		<?php
	}

	protected function content_template() {}

  public function render_plain_content( $instance = [] ) {}
}

// function add_custom_scripts() {
//     wp_enqueue_script( 'script.js', plugins_url( '../assets/js/script.js', __FILE__ ), [], false, true );
// }
// add_action( 'elementor/frontend/after_enqueue_scripts', 'add_custom_scripts' );

function add_elementor_editor_scripts() {
    wp_enqueue_script( 'script', plugins_url( '../assets/js/script.js', __FILE__ ), ['elementor-editor'], false, true );
}
add_action( 'elementor/editor/after_enqueue_scripts', 'add_elementor_editor_scripts' );

