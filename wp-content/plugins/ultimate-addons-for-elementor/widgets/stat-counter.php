<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_stat_counter extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'statscounter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Stats Counter', 'uae' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-hourglass-half';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ultimate-addons' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// wp_enqueue_style( 'stat-counter-css', plugins_url( '../css/statcounter.css' , __FILE__ ));
		wp_enqueue_script( 'countTo-js', plugins_url( '../js/count-up.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'countTo-custom-js', plugins_url( '../js/front/custom_countup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Select Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click to <a href="https://elementor.topdigitaltrends.net/stats-counter/" target="_blank">See Demo</a>, 2 More Design In <a href="https://genialsouls.com/mega-addons-for-elementor-pro/" target="_blank">Pro</a>',
				'options' 		=> [
		     		'style' 	=> esc_html__('Top logo bottom content', 'uae'),
		     		'style3' 	=> esc_html__('Left logo right content', 'uae'),
		     		'style5' 	=> esc_html__('Logo in center', 'uae'),
				],
				'default' 		=> 'style',
			]
		);

		$this->add_control(
			'info_opt',
			[
				'label' => __( 'Select Image or Font icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'show_image' 	=> esc_html__('Image', 'uae'),
		     		'show_icon' 	=> esc_html__('Font Icon', 'uae'),
				],
				'default' 		=> 'show_image',
			]
		);	

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'info_opt' => 'show_image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'info_opt' => 'show_image',
				],
			]
		);

		$this->add_control(
			'info_icon',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
                    'value' => 'fas fa-eye',
                    'library' => 'fa-solid',
                ],
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'      => esc_html__('Icon Font Size', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'icon_width',
			[
				'label'      => esc_html__('Icon Background Width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'30',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'icon_height',
			[
				'label'      => esc_html__('Icon Background Height', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'30',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'infoclr',
			[
				'label' => __( 'Icon Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'infobg',
			[
				'label' => __( 'Icon Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'0px' 	=> esc_html__('0px', 'uae'),
		     		'1px' 	=> esc_html__('1px', 'uae'),
		     		'2px' 	=> esc_html__('2px', 'uae'),
		     		'3px' 	=> esc_html__('3px', 'uae'),
		     		'5px' 	=> esc_html__('5px', 'uae'),
		     		'7px' 	=> esc_html__('7px', 'uae'),
		     		'10px' 	=> esc_html__('10px', 'uae'),
		     		'15px' 	=> esc_html__('15px', 'uae'),
				],
				'default' 		=> '0px',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'border_style',
			[
				'label' => __( 'Border Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'solid' 	=> esc_html__('Solid', 'uae'),
		     		'dotted' 	=> esc_html__('Dotted', 'uae'),
		     		'rige' 		=> esc_html__('Rige', 'uae'),
		     		'dashed' 	=> esc_html__('Dashed', 'uae'),
		     		'double' 	=> esc_html__('Double', 'uae'),
		     		'groove' 	=> esc_html__('Groove', 'uae'),
		     		'inset' 	=> esc_html__('Inset', 'uae'),
				],
				'default' 		=> 'solid',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'border_clr',
			[
				'label' => __( 'Border Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 	'border_radius',
				'label'      => esc_html__('Border Radius', 'uae'),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
					'{{WRAPPER}} .messive-wrapper-counter .mega_count_img img, .messive-wrapper-counter i' => 'border-radius: {{SIZE}}px;',
				],
			]
		);
			
		$this->end_controls_section();

		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title_clr',
			[
				'label' => __( 'Title Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .messive-wrapper-counter .mega_count_content h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'uae_section_pro',
			[
				'label' => __( '<span style="color: #f54;">Go Premium for More Features</span>', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'asdasdsadasasdsaf',
		    [
		        'label' => __( 'Unlock more possibilities', 'uae' ),
		        'type' => \Elementor\Controls_Manager::CHOOSE,
		        'options' => [
					'1' => [
						'title' => __( '', 'uae' ),
						'icon' => 'fa fa-unlock-alt',
					],
				],
				'default' => '1',
		        'description' => 'Get the <a style="color: #f54; text-decoration: underline;" href="https://genialsouls.com/mega-addons-for-elementor-pro/" target="_blank">Pro version</a> for more stunning elements and customization options.'
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'detail', 
			[
				'label'         => esc_html__('Stats Counter', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'stat_numb',
			[
				'label'      => esc_html__('Number', 'uae'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'description'	=>	'Here you can use integers: 12345, floats: 0.1234, formatted numbers: 1,234,567.00',
				'size_units' => ['px'],
				'default'	=>	'1,234,567.00'
			]
		);

		$this->add_control(
			'text_after',
			[
				'label'      => esc_html__('After Text', 'uae'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'stat_clr',
			[
				'label' => __( 'Counter Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'stat_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .messive-wrapper-counter .mega_count_content .main-counter, .messive-wrapper-counter .mega_count_content .counter-after',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'setting', 
			[
				'label'         => esc_html__('Settings', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'count_speed',
			[
				'label'      => esc_html__('Time', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'description'	=>	'The total duration of the count up animation in milli second 1s=1000',
				'default'	=>	'4000',
			]
		);

		$this->add_control(
			'count_interv',
			[
				'label'      => esc_html__('Delay', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'description'	=>	'The delay in milliseconds per number count up',
				'default'	=>	'20',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		global $css_path; ?>
		<link rel="stylesheet" href="<?php echo $css_path ?>statcounter.css">
		<?php

		ob_start(); 
		?>

		<!--====== HTML CODING START ========-->

		<!-- Counter style one -->
		<?php if ($settings['effect'] == 'style') { ?>
			<div id="mega_count_bar" class="messive-wrapper-counter mae_stat_counter_styles" data-delay="<?php echo $settings['count_interv']; ?>" data-time="<?php echo $settings['count_speed']; ?>">
				<div class="mega_count_img">
					<?php if ($settings['info_opt'] == 'show_image') { ?>		   
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
					<?php } ?>
					<?php if ($settings['info_opt'] == 'show_icon') { ?>
						<div class="mae_counter_icon">
							<i class="<?php echo $settings['info_icon']['value']; ?>" style="font-weight: 600; width: <?php echo $settings['icon_width']; ?>px; height: <?php echo $settings['icon_height']; ?>px; background: <?php echo $settings['infobg']; ?>; border: <?php echo $settings['border_width']; ?> <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>; font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['infoclr']; ?>;"></i>
						</div>
					<?php } ?>
				</div>
				<div class="mega_count_content" style="text-align: center;">
					<span class="main-counter" style="color: <?php echo $settings['stat_clr']; ?>;"><?php echo $settings['stat_numb']; ?></span>
					<span class="counter-after" style="color: <?php echo $settings['stat_clr']; ?>;"><?php echo $settings['text_after']; ?></span>
					<h3 style="color: <?php echo $settings['title_clr']; ?>;">
						<?php echo $settings['text']; ?>
					</h3>
				</div>
			</div>
		<?php } ?>

		<!-- Counter style three -->
		<?php if ($settings['effect'] == 'style3') { ?>
			<div id="mega_count_bar_2" class="messive-wrapper-counter mae_stat_counter_styles" data-delay="<?php echo $settings['count_interv']; ?>" data-time="<?php echo $settings['count_speed']; ?>">
				<div class="mega_count_img">
					<?php if ($settings['info_opt'] == 'show_image') { ?>		   
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
					<?php } ?>
					<?php if ($settings['info_opt'] == 'show_icon') { ?>
						<i class="<?php echo $settings['info_icon']['value']; ?>" style="font-weight: 600; width: <?php echo $settings['icon_width']; ?>px; height: <?php echo $settings['icon_height']; ?>px; background: <?php echo $settings['infobg']; ?>; border: <?php echo $settings['border_width']; ?> <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>; font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['infoclr']; ?>;"></i>
					<?php } ?>
				</div>
				<div class="mega_count_content">
					<h3 style="color: <?php echo $settings['title_clr']; ?>;">
						<?php echo $settings['text']; ?>
					</h3>
					<span class="main-counter" style="color: <?php echo $settings['stat_clr']; ?>;"><?php echo $settings['stat_numb']; ?></span>
					<span class="counter-after" style="color: <?php echo $settings['stat_clr']; ?>;"><?php echo $settings['text_after']; ?></span>		
				</div>
			</div>
		<?php } ?>

		<!-- Counter style five -->
		<?php if ($settings['effect'] == 'style5') { ?>
			<div id="mega_count_bar_4" class="messive-wrapper-counter mae_stat_counter_styles" data-delay="<?php echo $settings['count_interv']; ?>" data-time="<?php echo $settings['count_speed']; ?>">
				<div class="mega_count_content">
					<h3 style="color: <?php echo $settings['title_clr']; ?>;">
						<?php echo $settings['text']; ?>
					</h3>
				</div>
				<div class="mega_count_img">
					<?php if ($settings['info_opt'] == 'show_image') { ?>		   
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
					<?php } ?>
					<?php if ($settings['info_opt'] == 'show_icon') { ?>
						<div class="mae_counter_icon">
							<i class="<?php echo $settings['info_icon']['value']; ?>" style="font-weight: 600; width: <?php echo $settings['icon_width']; ?>px; height: <?php echo $settings['icon_height']; ?>px; background: <?php echo $settings['infobg']; ?>; border: <?php echo $settings['border_width']; ?> <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>; font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['infoclr']; ?>;"></i>
						</div>
					<?php } ?>
				</div>
				<div class="mega_count_content" style="text-align: center;">
					<span class="main-counter" style="color: <?php echo $settings['stat_clr']; ?>;"><?php echo $settings['stat_numb']; ?></span>
					<span class="counter-after" style="color: <?php echo $settings['stat_clr']; ?>;"><?php echo $settings['text_after']; ?></span>
				</div>
			</div>
		<?php } ?>

		<?php
		echo ob_get_clean();

		/*========== HTML CODING END============*/

	}
}