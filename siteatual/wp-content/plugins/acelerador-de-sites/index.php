<?php
/*
Plugin Name:		Acelerador de Sites
Plugin URI: 		http://ezeksoft.com/acelerador-de-sites/?utm_source=plugin-page&utm_medium=wordpress&utm_content=plugged&utm_campaign=organic&v=lite&utm_page=plugins
Description:		Plugin Acelerador de Sites
Version: 			1.0.0
Author: 			Ezeksoft
Author URI: 		http://ezeksoft.com
*/

require(dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'Ezeksoft.class.php');

class Plugin_Acelerador_de_Sites extends Ezeksoft_Acelerador_de_Sites
{
	public $name = "Acelerador de Sites";
	public $plugin = "acelerador-de-sites";
	public $tablename = "acelerador_de_sites";

	public function __construct()
	{
		global $wpdb;

		add_action("wp_ajax_acelerador_de_sites__del", array($this, "ajax_del"));
		add_action("wp_ajax_acelerador_de_sites__del_all", array($this, "ajax_del_all"));
		add_action("wp_ajax_acelerador_de_sites__get_html_seo", array($this, "ajax_get_html_seo"));
		add_action("wp_ajax_acelerador_de_sites__save", array($this, "ajax_save"));

		if (is_admin()) add_action("init", array($this, "admin_init")) ; else 
		{
			$uri = $this->get_uri();

			$rows = array();

			if ($uri)
				$rows = $wpdb->get_results( $wpdb->prepare("SELECT * FROM {$this->tablename} WHERE uri = %s", $uri) );

			else if (!$this->find_in_uri("?elementor_library="))
				$rows = $wpdb->get_results("SELECT * FROM {$this->tablename} WHERE is_home = 1");

			// $rows = $uri
			// 	? $wpdb->get_results( $wpdb->prepare("SELECT * FROM {$this->tablename} WHERE uri = %s", $uri) )
			// 	: $wpdb->get_results("SELECT * FROM {$this->tablename} WHERE is_home = 1");

			if (sizeof($rows)) $this->new_page($rows[sizeof($rows) - 1], "view.php");

			if ($uri == "auto-sitemap.xml")
				$this->new_page($wpdb->get_results("SELECT uri, post_modified FROM {$this->tablename}"), "sitemap.php");
			else if ($uri == "main-sitemap.xsl")
				$this->new_page(array(), "xsl.php");
			else			
				add_action("template_redirect", array($this, "intemplate"));
		}
	}

	public function admin_init()
	{
		add_action('admin_menu', array($this, "add_to_admin_menu"));		
	}

	public function intemplate()
	{
		add_action("shutdown", array($this, "intemplate_shutdown"));
	}

	public function intemplate_shutdown()
	{
		global $wpdb;

		$uri = $this->get_uri();
		if (!$uri) $uri = "?p=".get_the_ID();	
		$rows = $wpdb->get_results( $wpdb->prepare("SELECT * FROM {$this->tablename} WHERE uri_iframe = %s", $uri) );
		$size = sizeof($rows);
		
		if (!$size)
		{
			$uri = "?p=".get_the_ID();		
			$rows = $wpdb->get_results( $wpdb->prepare("SELECT * FROM {$this->tablename} WHERE uri_iframe = %s", $uri) );
			$size = sizeof($rows);
		}

		if ($size) 
		{
			$data = $rows[$size - 1];
			require "iframe_scripts.php";
		}

	}

	public function new_page($data, $file)
	{
		header("HTTP/1.1 200 OK");
		require $file;
		die();
	}

	public function add_to_admin_menu()
	{
		$this->create_table($this->tablename, array(
			"uri" => "VARCHAR(1000)",
			"uri_iframe" => "VARCHAR(1000)",
			"is_home" => "INT",
			"html_seo" => "LONGBLOB",
			"pagetype" => "VARCHAR(255)",
			"html_head" => "BLOB",
			"bot_image" => "text",
			"bot_title" => "text",
			"bot_description" => "text",
			"post_modified" => "DATETIME",
			"post_name_original" => "text",
			"post_name_wp" => "text",
			"use_prefix" => "VARCHAR(1000)",
			"use_sufix" => "VARCHAR(1000)",
		));

		add_menu_page(
			$this->name,
			$this->name,
			"manage_options",
			$this->plugin,
			array($this, "panel_render_html"),
			plugins_url("", __FILE__) . "/icon.png"
		);
	}

	public function rows()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT id, uri, uri_iframe, is_home, pagetype, html_head, bot_image, bot_title, bot_description, post_modified, post_name_original, use_prefix, use_sufix, post_name_wp FROM {$this->tablename} ORDER BY id DESC");
	}

	public function panel_render_html()
	{
		global $wpdb;

    	wp_enqueue_media();
		$rows = $this->rows();
		require "panel.php";
		$this->upload_field();
	}

	public function ajax_del_all()
	{
		global $wpdb;


		$list = $wpdb->get_results( "SELECT * FROM {$this->tablename}");

		$size = sizeof($list);
		if ($size)
		{
			foreach ($list as $obj)
			{
				$post_name_wp = $obj->post_name_wp;
				$post_name_original = $obj->post_name_original;

				// devolve nome original
				$wpdb->query( $wpdb->prepare("UPDATE {$wpdb->prefix}posts SET post_name = %s WHERE post_name = %s", $post_name_wp, $post_name_original) );
			}
		}

		$wpdb->query("TRUNCATE TABLE {$this->tablename}");

		wp_die();
	}

	public function ajax_del()
	{
		global $wpdb;

		$id = intval($_POST['id']);

		$list = $wpdb->get_results( "SELECT * FROM {$this->tablename} WHERE id = $id");

		$size = sizeof($list);
		if ($size)
		{
			$obj = $list[$size-1];
			$post_name_wp = $obj->post_name_wp;
			$post_name_original = $obj->post_name_original;

			// devolve nome original
			$wpdb->query( $wpdb->prepare("UPDATE {$wpdb->prefix}posts SET post_name = %s WHERE post_name = %s", $post_name_wp, $post_name_original) );
		}

		$wpdb->query( $wpdb->prepare("DELETE FROM {$this->tablename} WHERE id = %d", $id) );

		wp_die();
	}

	public function ajax_get_html_seo()
	{
		global $wpdb;

		$id = intval($_POST['id']);

		$rows = $wpdb->get_results( $wpdb->prepare("SELECT html_seo FROM {$this->tablename} WHERE id = %d", $id) );
		$size = sizeof($rows);

		if ($size) echo $rows[$size-1]->html_seo;

		wp_die();
	}

	public function ajax_save()
	{
		global $wpdb;

		$id = intval($_POST["id"]);
		$rewrite = intval($_POST["rewrite"]);
		$post_name = $_POST["post_name"];
		$post_modified = $_POST["post_modified"];
		$prefix = $_POST["prefix"];

		$uri = $_POST["uri"];
		$uri_iframe = $_POST["uri_iframe"];
		$is_home = intval($_POST["is_home"]);
		$html_seo = $_POST["html_seo"];
		$pagetype = $_POST["pagetype"];
		$html_head = $_POST["html_head"];
		$bot_image = $_POST["bot_image"];
		$bot_title = $_POST["bot_title"];
		$bot_description = $_POST["bot_description"];
		$post_name_original = $_POST["post_name_original"];
		$use_prefix = $_POST["use_prefix"];
		$use_sufix = $_POST["use_sufix"];
		$post_name_wp = $_POST["post_name_wp"];

		if ($id)
			$wpdb->query( $wpdb->prepare(
				"UPDATE {$this->tablename} SET uri = %s, uri_iframe = %s, is_home = %d, html_seo = %s, pagetype = %s, html_head = %s, bot_image = %s, bot_title = %s, bot_description = %s, post_modified = %s, post_name_original = %s, use_prefix = %s, use_sufix = %s WHERE id = %d", $uri, $uri_iframe, $is_home, $html_seo, $pagetype, $html_head, $bot_image, $bot_title, $bot_description, $post_modified, $post_name_original, $use_prefix, $use_sufix, $id
			));
		else
			$wpdb->query( $wpdb->prepare(
				"INSERT INTO {$this->tablename} (uri, uri_iframe, is_home, html_seo, pagetype, html_head, bot_image, bot_title, bot_description, post_modified, post_name_original, use_prefix, use_sufix, post_name_wp) VALUES (%s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $uri, $uri_iframe, $is_home, $html_seo, $pagetype, $html_head, $bot_image, $bot_title, $bot_description, $post_modified, $post_name_original, $use_prefix, $use_sufix, $post_name_wp
			));

		if ($rewrite) {
			$wpdb->query( $wpdb->prepare(
				"UPDATE {$wpdb->prefix}posts SET post_name = %s WHERE post_name = %s", $prefix . $post_name, $post_name
			));
		}

		wp_die();
	}
}

new Plugin_Acelerador_de_Sites();