<?php
/**
 * Course Target Audience
 * @since 1.0.0
 */

namespace TutorLMS\Elementor\Addons;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CourseTargetAudience extends BaseAddon {

    public function get_title() {
        return __('Course Target Audience', 'tutor-elementor-addons');
    }
    
    protected function register_style_controls() {
        $selector = '{{WRAPPER}} .tutor-course-target-audience-wrap';
        $title_selector = $selector.' h4.tutor-segment-title';
        $content_selector = $selector.' .tutor-course-target-audience-items';
        $icon_selector = $content_selector.' li:before';

        /* Title Section */
        $this->start_controls_section(
            'course_target_audience_title_section',
            [
                'label' => __('Section Title', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_title_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$title_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_target_audience_title_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $title_selector,
            ]
        );
        $this->end_controls_section();

        /* Icon  Section */
        $this->start_controls_section(
            'course_target_audience_icon_section',
            [
                'label' => __('Icon', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_icon_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$icon_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_target_audience_icon_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $icon_selector,
            ]
        );
        $this->end_controls_section();

        /* Content  Section */
        $this->start_controls_section(
            'course_target_audience_content_section',
            [
                'label' => __('Content', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_content_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$content_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_target_audience_content_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $content_selector,
            ]
        );
        $this->end_controls_section();

        /* Spacing  Section */
        $this->start_controls_section(
            'course_target_audience_spacing_section',
            [
                'label' => __('Spacing', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_padding',
            [
                'label' => __('Padding', 'tutor-elementor-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    $content_selector.' li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'course_target_audience_margin',
            [
                'label' => __('Margin', 'tutor-elementor-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    $content_selector.' li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    protected function render($instance = []) {
        $course = etlms_get_course();
        if ($course) {
            tutor_course_target_audience_html();
        }
    }
}
