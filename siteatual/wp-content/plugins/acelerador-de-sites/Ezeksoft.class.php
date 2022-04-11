<?php
if (file_exists(ABSPATH . 'wp-admin/includes/upgrade.php')) require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

class Ezeksoft_Acelerador_de_Sites
{

	public function __construct()
	{
		$this->plugin_url = get_admin_url() . "admin.php?page=";
	}

	public function ajaxurl()
	{

		// ajax
		$wpurl = json_encode(get_bloginfo('wpurl'));
		$ajaxurl = json_encode(get_bloginfo('wpurl') . "/wp-admin/admin-ajax.php");
		$ajaxurl_jshtml = "
		<script type='text/javascript'>
		var wpurl = {$wpurl}, ajaxurl = $ajaxurl; 
		if (document.location.protocol == 'https:') { 
			if ( !(/https\:\/\//.test(ajaxurl)) ) 
				ajaxurl = ajaxurl.replace('http://', 'https://');
		} 
		if (document.location.protocol == 'https:') { 
			if ( !(/https\:\/\//.test(wpurl)) ) 
				wpurl = wpurl.replace('http://', 'https://'); 
		}
		</script>";

		$obj = new stdClass();
		$obj->url = $ajaxurl;
		$obj->jshtml = $ajaxurl_jshtml;


		return $obj;
	}
	public function upload_field()
	{
		?>
		<script type="text/javascript">
		    var upload = function(callback, type) {
		        var file_frame = wp.media.frames.file_frame = wp.media({
		            title: "Upload da imagem",
		            library: {
		                type: type || 'image'
		            },
		            button: {
		                text: "Selecionar"
		            },
		                multiple: false
		        });
		        file_frame.on('select', function() {
		            var attachment = file_frame.state().get('selection').first().toJSON();

		            jQuery('.media-modal-close').click();

		            callback(attachment.url);
		        });
		        file_frame.open();
		    }   
		</script>
		<?php
	}
	public function create_table($table, $fields=array())
	{
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$columns = "";
		
		foreach ($fields as $key => $value)
		{
			$columns .= "{$key} {$value} DEFAULT NULL, ";
		}

		$sql = "CREATE TABLE IF NOT EXISTS
			$table (
				id INT(32) NOT NULL AUTO_INCREMENT, 
				$columns
				PRIMARY KEY (id)
			); " . $charset_collate . ";";
			//echo $sql; die();
		$wpdb->query($sql);
		$wpdb->get_results($sql);
		if (function_exists('dbDelta')) dbDelta($sql);
	}

	public function get_option($table_name, $uri_or_id='', $order=0, $field=array(), $where=array())
	{
		
		global $wpdb;
		$sql = "SELECT * FROM {$table_name}";
		$order_desc = " ORDER BY id DESC";

		if (sizeof($where))
		{
			$sql .= " WHERE ";
			$n = 0;
			foreach ($where as $cond)
			{
				if ($n >= 1) $sql .= " AND ";
				$sql .= " ".$cond[0]." = '".$cond[1]."' ";
				$n++;
			}

			if ($order) $sql .= $order_desc;
			return $wpdb->get_results($sql);
		}
		else if (sizeof($field))
		{
			$sql .= " WHERE ".$field[0]." = '".$field[1]."'";

			if ($order) $sql .= $order_desc;

			return $wpdb->get_results($sql);
		}
		else if ($uri_or_id) 
		{
			if (is_int($uri_or_id)) $sql .= " WHERE id = '{$uri_or_id}'";
			else $sql .= " WHERE uri = '{$uri_or_id}'";

			if ($order) $sql .= $order_desc;

			return $wpdb->get_results($sql);
		}
		else 
		{
			if ($order) $sql .= $order_desc;
			return $wpdb->get_results($sql);
		}

	}

	public function update_option($table_name, $items, $id_or_uri=0)
	{
		global $wpdb;

		if ($id_or_uri)
		{
			$fields_and_values = "";
			foreach ($items as $key => $value)
				$fields_and_values .= "{$key}='{$value}',";
			$fields_and_values = substr_replace($fields_and_values, "", -1);

			if (is_int($id_or_uri))
			{
				$sql = "UPDATE {$table_name} SET {$fields_and_values} WHERE id = {$id_or_uri}";
			}
			else
			{
				$sql = "UPDATE {$table_name} SET {$fields_and_values} WHERE uri = '{$id_or_uri}'";
			}
			return $wpdb->query($sql);
		}

		else
		{
			$fields = "";
			foreach ($items as $key => $value)
				$fields .= "{$key},";
			$fields = substr_replace($fields, "", -1);

			$values = "";
			foreach ($items as $key => $value)
				$values .= "'{$value}',";
			$values = substr_replace($values, "", -1);


			$sql = "INSERT INTO {$table_name}({$fields}) VALUES({$values})";
			return $wpdb->query($sql);
		}
	}

	public function delete_option($table_name, $id=0, $field_and_value=array())
	{
		global $wpdb;
		$sql = "";
		if ($id) $sql = "DELETE FROM {$table_name} WHERE id = {$id}";

		if (!$id && sizeof($field_and_value)) 
		{
			$field_ = $field_and_value[0];
			$value_ = $field_and_value[1];
			$sql = "DELETE FROM {$table_name} WHERE {$field_} = {$value_}";
		}

		if ($sql) return $wpdb->query($sql);
	}


	public function get_uri_from_url($url)
	{
		// retornar URI
		$url_ = $url;
		$quebrar_interrogacao = explode("?", $url);

		if (preg_match("/\?/", $url_)) 
		{
			if (empty($quebrar_interrogacao[1]))
				$url_ = substr_replace($url_, "", -1);
		}

		$Hotmax3_last_chara = substr($quebrar_interrogacao[0],-1);

		if ($Hotmax3_last_chara == "/")
		$url_ = substr($quebrar_interrogacao[0], 0, -1);

		$quebra_barra = explode("/", $url_);

		$ret = $quebra_barra[sizeof($quebra_barra) - 1];

		if (preg_match("/\?/", $ret)) 
		{
			$quebrar_interrogacao = explode("?", $ret);
			$ret = $quebrar_interrogacao[0];
		}

		return $ret;

	}

	public function exists_params()
	{
		return strpos($_SERVER['REQUEST_URI'], "?") ? true : false;
	}

	public function find_in_uri($string)
	{
		return strpos($_SERVER['REQUEST_URI'], $string) ? true : false;
	}

	public function get_url()
	{
		$url = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if ($url[0] == ":") $url = "http".$url;
		return $url;
	}

	public function get_site_uri()
	{
		$url = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if ($url[0] == ":") $url = "http".$url;
		return $this->get_uri_from_url($url);
	}

	public function get_uri()
	{
		$host = get_site_url();

		$url = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if ($url[0] == ":") {
			$url = "http".$url;
			$host = str_replace("https://", "http://", $host);
		}
		
		$uri = explode($host, $url);
		$uri = substr($uri[1], 1);
		$uri = explode("/", $uri);
		$uri = $uri[0];
		
		$uri = explode("?", $uri);
		$uri = $uri[0];

		if ($uri && $uri[0] == "/") $uri = substr($uri, 1);
		if (substr($uri, -1) == "/") $uri = substr($uri, 0, strlen($uri) - 1);

		return $uri;
	}

	public function site_is_https()
	{
		return $_SERVER['REQUEST_SCHEME'] == "https" ? 1 : 0;
	}

	public function get_site_full_domain()
	{
		$url = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'] . "/";
		if ($url[0] == ":") $url = "http".$url;
		return $url;
	}


	public function request($value)
	{
	    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
	    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

	    return str_replace($search, $replace, $value);
	}

	public function struct_db_by_uri($table, $fields, $file)
	{
		global $wpdb;

		$id_field = $fields[0];

		// verifica se é para renderizar o quizz
		$id = 0;
		$render = 0;
		$tablename = $wpdb->prefix."options";
		$list = $wpdb->get_results("SELECT * FROM $tablename WHERE option_name LIKE '%{$table}_{$id_field}_%'");
		if (sizeof($list))
		{
			foreach ($list as $key => $value)
			{
				if($value->option_value == $this->get_site_uri())
				{
					$render = 1;
					if (preg_match("/{$table}_{$id_field}_/", $value->option_name))
					{
						$arr_88172 = explode("{$table}_{$id_field}_", $value->option_name);
						$id = $arr_88172[1];
					}
					break;
				}
			}
		}
		if ($render)
		{

			$SQL = "option_name = '{$table}_{$id_field}_{$id}'"; 
			foreach ($fields as $item_87172)
			{
				$SQL .= " OR option_name = '{$table}_{$item_87172}_{$id}' ";
			}

			$data = $wpdb->get_results("SELECT * FROM $tablename WHERE $SQL");


			if (sizeof($data)) 
			{	
				$dbObject = new stdClass();
				$dbArray = array();
				// itera dado atual, cada dado é uma row com o ID dessa URI
				foreach ($data as $item)
				{
					$arr_88173 = explode("_", $item->option_name);
					$prop = "";

					$i=0;foreach ($arr_88173 as $st)
					{
						if ($i < sizeof($arr_88173) - 1)
							$prop .= $st . "_";
						$i++;
					}
					$prop = substr_replace($prop, "", -1);
					$prop = str_replace($table, "", $prop);
					$prop = substr($prop, 1);
					$dbObject->$prop = $item->option_value;
					$dbArray[$prop] = $item->option_value;
				}

				require(dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $file);
				die();
			}

		} else return 0;

	}

}
