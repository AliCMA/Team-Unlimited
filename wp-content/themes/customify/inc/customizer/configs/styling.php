<?php
if (!function_exists('customify_customizer_styling_config')) {
	function customify_customizer_styling_config($configs)
	{

		$section = 'global_styling';

		$config = array(

			// Styling panel.
			array(
				'name'     => 'styling_panel',
				'type'     => 'panel',
				'priority' => 22,
				'title'    => __('Styling', 'customify'),
			),

			// Styling Global Section.
			array(
				'name'     => "{$section}",
				'type'     => 'section',
				'panel'    => 'styling_panel',
				'title'    => __('Global Colors', 'customify'),
				'priority' => 10,
			),

			array(
				'name'    => "{$section}_color_theme_heading",
				'type'    => 'heading',
				'section' => $section,
				'title'   => __('Theme Colors', 'customify'),
			),

			array(
				'name'        => "{$section}_color_primary",
				'type'        => 'color',
				'section'     => $section,
				'placeholder' => '#235787',
				'default'     => '#235787',
				'title'       => __('Primary Color', 'customify'),
				'css_format'  => apply_filters(
					'customify/styling/primary-color',
					'
					.header-top .header--row-inner,
					body:not(.fl-builder-edit) .button,
					body:not(.fl-builder-edit) button:not(.menu-mobile-toggle, .components-button, .customize-partial-edit-shortcut-button),
					body:not(.fl-builder-edit) input[type="button"]:not(.ed_button),
					button.button,
					input[type="button"]:not(.ed_button, .components-button, .customize-partial-edit-shortcut-button),
					input[type="reset"]:not(.components-button, .customize-partial-edit-shortcut-button),
					input[type="submit"]:not(.components-button, .customize-partial-edit-shortcut-button),
					.pagination .nav-links > *:hover,
					.pagination .nav-links span,
					.nav-menu-desktop.style-full-height .primary-menu-ul > li.current-menu-item > a,
					.nav-menu-desktop.style-full-height .primary-menu-ul > li.current-menu-ancestor > a,
					.nav-menu-desktop.style-full-height .primary-menu-ul > li > a:hover,
					.posts-layout .readmore-button:hover
					{
					    background-color: {{value}};
					}
					.posts-layout .readmore-button {
						color: {{value}};
					}
					.pagination .nav-links > *:hover,
					.pagination .nav-links span,
					.entry-single .tags-links a:hover,
					.entry-single .cat-links a:hover,
					.posts-layout .readmore-button,
					.posts-layout .readmore-button:hover
					{
					    border-color: {{value}};
					}'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_secondary",
				'type'        => 'color',
				'section'     => $section,
				'placeholder' => '#c3512f',
				'default'     => '#c3512f',
				'title'       => __('Secondary Color', 'customify'),
				'css_format'  => apply_filters(
					'customify/styling/secondary-color',
					'

					.customify-builder-btn
					{
					    background-color: {{value}};
					}'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_text",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Text Color', 'customify'),
				'placeholder' => '#686868',
				'default'     => '#686868',
				'css_format'  => apply_filters(
					'customify/styling/text-color',
					'
					body
					{
					    color: {{value}};
					}
					abbr, acronym {
					    border-bottom-color: {{value}};
					}'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_link",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Link Color', 'customify'),
				'placeholder' => '#1e4b75',
				'default'     => '#1e4b75',
				'css_format'  => apply_filters(
					'customify/styling/link-color',
					'
	                a
	                {
	                    color: {{value}};
					}'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_link_hover",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Link Hover Color', 'customify'),
				'placeholder' => '#111111',
				'default'     => '#111111',
				'css_format'  => apply_filters(
					'customify/styling/link-color-hover',
					'
a:hover,
a:focus,
.link-meta:hover, .link-meta a:hover
{
    color: {{value}};
}'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_border",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Border Color', 'customify'),
				'placeholder' => '#eaecee',
				'default'     => '#eaecee',
				'css_format'  => apply_filters(
					'customify/styling/color-border',
					'
h2 + h3,
.comments-area h2 + .comments-title,
.h2 + h3,
.comments-area .h2 + .comments-title,
.page-breadcrumb {
    border-top-color: {{value}};
}
blockquote,
.site-content .widget-area .menu li.current-menu-item > a:before
{
    border-left-color: {{value}};
}

@media screen and (min-width: 64em) {
    .comment-list .children li.comment {
        border-left-color: {{value}};
    }
    .comment-list .children li.comment:after {
        background-color: {{value}};
    }
}

.page-titlebar, .page-breadcrumb,
.posts-layout .entry-inner {
    border-bottom-color: {{value}};
}

.header-search-form .search-field,
.entry-content .page-links a,
.header-search-modal,
.pagination .nav-links > *,
.entry-footer .tags-links a, .entry-footer .cat-links a,
.search .content-area article,
.site-content .widget-area .menu li.current-menu-item > a,
.posts-layout .entry-inner,
.post-navigation .nav-links,
article.comment .comment-meta,
.widget-area .widget_pages li a, .widget-area .widget_categories li a, .widget-area .widget_archive li a, .widget-area .widget_meta li a, .widget-area .widget_nav_menu li a, .widget-area .widget_product_categories li a, .widget-area .widget_recent_entries li a, .widget-area .widget_rss li a,
.widget-area .widget_recent_comments li
{
    border-color: {{value}};
}

.header-search-modal::before {
    border-top-color: {{value}};
    border-left-color: {{value}};
}

@media screen and (min-width: 48em) {
    .content-sidebar.sidebar_vertical_border .content-area {
        border-right-color: {{value}};
    }
    .sidebar-content.sidebar_vertical_border .content-area {
        border-left-color: {{value}};
    }
    .sidebar-sidebar-content.sidebar_vertical_border .sidebar-primary {
        border-right-color: {{value}};
    }
    .sidebar-sidebar-content.sidebar_vertical_border .sidebar-secondary {
        border-right-color: {{value}};
    }
    .content-sidebar-sidebar.sidebar_vertical_border .sidebar-primary {
        border-left-color: {{value}};
    }
    .content-sidebar-sidebar.sidebar_vertical_border .sidebar-secondary {
        border-left-color: {{value}};
    }
    .sidebar-content-sidebar.sidebar_vertical_border .content-area {
        border-left-color: {{value}};
        border-right-color: {{value}};
    }
    .sidebar-content-sidebar.sidebar_vertical_border .content-area {
        border-left-color: {{value}};
        border-right-color: {{value}};
    }
}
'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_meta",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Meta Color', 'customify'),
				'placeholder' => '#6d6d6d',
				'default'     => '#6d6d6d',
				'css_format'  => apply_filters(
					'customify/styling/color-meta',
					'
					article.comment .comment-post-author {
						background: {{value}};
					}
					.pagination .nav-links > *,
					.link-meta,
					.link-meta a,
					.color-meta,
					.entry-single .tags-links:before,
					.entry-single .cats-links:before
					{
					    color: {{value}};
					}'
				),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_heading",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Heading Color', 'customify'),
				'placeholder' => '#2b2b2b',
				'default'     => '#2b2b2b',
				'css_format'  => apply_filters('customify/styling/color-heading', 'h1, h2, h3, h4, h5, h6 { color: {{value}};}'),
				'selector'    => 'format',
			),

			array(
				'name'        => "{$section}_color_w_title",
				'type'        => 'color',
				'section'     => $section,
				'title'       => __('Widget Title Color', 'customify'),
				'placeholder' => '#444444',
				'default'     => '#444444',
				'css_format'  => '.site-content .widget-title { color: {{value}};}',
				'selector'    => 'format',
			),

		);

		return array_merge($configs, $config);
	}
}

add_filter('customify/customizer/config', 'customify_customizer_styling_config');
