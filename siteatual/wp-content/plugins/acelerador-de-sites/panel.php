<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $list_all_pages = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status = 'publish'"); ?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

<style type="text/css">
	[fx] { display: flex; }	
	.lbl { font-weight: bold; }
	.acelerador-de-sites {
		font: 14px 'open sans', arial;
		color: #9ea3a8;
	}
	.acelerador-de-sites_wrapper {
		padding-left: 20px;
	}
	#wpwrap {
		background: #23282d; 
	}
	.flex { display: flex }
	.btn {
	    overflow: hidden;
	    cursor: pointer;
	    padding: 4px 14px;
	    border-radius: 43px;
	    height: 30px;
	    font: 700 12px 'open sans', arial;
	    margin-top: 9px;
	    border: 1px solid black;
	    transition: .1s ease-in;
	    outline: none;
	    background: #f5f5f5;
	    color: black;
	    box-shadow: 0px 0px 0px 5px #0000000a;
	    -webkit-box-shadow: 0px 0px 0px 5px #0000000a;
	    -moz-box-shadow: 0px 0px 0px 5px #0000000a;
	    -o-box-shadow: 0px 0px 0px 5px #0000000a;

	    background: #55d69a;
	    border-color: #0f9686;
	    color: white;
	    box-shadow: 0px 0px 0px 5px #55d69a1c;
	    -webkit-box-shadow: 0px 0px 0px 5px #55d69a1c;
	    -moz-box-shadow: 0px 0px 0px 5px #55d69a1c;
	    -o-box-shadow: 0px 0px 0px 5px #55d69a1c;
	    background: -webkit-linear-gradient(left, #00a9e2, #20bda7);
	    background: -o-linear-gradient(left, #00a9e2, #20bda7);
	    background: -moz-linear-gradient(left, #00a9e2, #20bda7);
	    background: linear-gradient(left, #00a9e2, #20bda7);
	}

	ul#adminmenu a.wp-has-current-submenu:after, ul#adminmenu>li.current>a.current:after {
		border-right-color: #23282d;
	}

	bold { font-weight: 700 }

	.input-slug {
		width: 220px;
		background: transparent;
		border: none;
		border-bottom: 3px solid transparent;
		padding: 6px 0 6px 0;
		color: white;
		font-weight: 900;
		outline: none;		
	}
	.input-slug:focus {
		border-bottom-color: #0cb0ce;
	}

	a, a:hover, a:active, a:focus { color: #14b2ff }

	.item-list {
		padding: 5px;
		border-top: 1px solid #444;
		display: flex;
	}

	.item-list .a {
		outline: none;
		font-size: 11px;
		font-weight: 300;
		color: white;
		text-decoration: none;
		letter-spacing: 1px;
		box-shadow: none;
	}

	.control-button {
		background: transparent;
		color: #cacaca;
		border: none;
		font-size: 11px;
		padding-left: 10px;
		padding-right: 10px;
		cursor: pointer;
		outline: none;
	}

	.control-button:hover,
	.item-list .a:hover {
		text-decoration: underline;
	}

	.btn-inline {
		border: none;
		border-top: 2px solid #444;
		outline: none;
		background: transparent;
		padding-bottom: 9px;
		padding-top: 9px;
		font: 11px 'open sans', arial;
		color: #9ea3a8;
		padding-left: 15px;
		padding-right: 15px;
		cursor: pointer;
		transition: .1s ease-in;
		-moz-transition: .1s ease-in;
		-o-transition: .1s ease-in;
	}

	.btn-inline:hover {
		border-top-color: #666;
		color: #aea6ab;
	}

	.btn-inline-active,
	.btn-inline-active:hover {
		border-top-color: #0cb0ce;		
		color: #0cb0ce;
	}

	.inline-menu > * {
		margin-right: 5px;
		padding-left: 5px;
		border-left: 1px solid #333;
	}

	.inline-menu > *:first-child {
		border-left: none;
	}

	[menu] { display: none }

	[menu] > div {
		display: inline-block;
		padding-top: 11px;
		border: 1px solid #1d1c1c;
		display: inline-block;
		padding: 15px 15px 43px 15px;
		border-top: none;
		border-radius: 4px;
		background: #32363a;
		margin-right: 20px;
	}

	.teaxtarea-1 {
		width: 100%;
		height: 350px;
		background: rgb(35, 40, 45);
		color: rgb(158, 163, 168);
		border: none;
		font-size: 12px;
		font-family: "courier new";
		padding: 14px;
		resize: auto;
		margin: 0px;
		outline: none;
	}

	.Ezeksoft_copyright {
		position: relative;
		top: -40px;
		left: 22px;
		font-size: 12px;
	}

	.Ezeksoft_copyright a {
		text-decoration: none;
	}

	.warn-b {
		margin-left: 4px;
		display: inline-block;
		background: #17b988;
		color: #1d5a17;
		padding: 2px 8px;
		font-size: 11px;
		font-weight: 700;
		border-radius: 4px;
	}

	.chip-free {
		border: 1px solid #eab567;
		background: #FFC107;
		color: #b4700b;
		font-weight: 700;
		font-size: 11px;
		padding: 1px 5px;
		border-radius: 3px;
		-moz-border-radius: 3px;
		-o-border-radius: 3px;
	}

	.chip-pro {
		text-decoration: none;
		border: 1px solid #67ea89;
		background: #07ff8d;
		color: #0bb420;
		font-weight: 700;
		font-size: 11px;
		padding: 1px 5px;
		border-radius: 3px;
		-moz-border-radius: 3px;
		-o-border-radius: 3px;
	}
	.chip-pro:hover, 
	.chip-pro:active,
	.chip-pro:focus 
	{ color: #0bb420; }

	.textarea {
		background: rgb(35, 40, 45);
		color: rgb(158, 163, 168);
		border: none;
		font-size: 14px;
		font-family: 'open sans', arial;
		padding: 14px;
		resize: auto;
		margin: 0px;
		outline: none;
	}

	.input {
		border-bottom-color: #0cb0ce;
		width: 220px;
		background: #23282d;
		border: none;
		border-bottom: 3px solid transparent;
		padding: 6px 0 6px 0;
		color: white;
		font-weight: 900;
		outline: none;
		padding-left: 8px;
		font-weight: 400;
		color: #aaa;
	}
	.input:focus,
	.input:active,
	#input_prefix
	{		
	    border-bottom-color: #0cb0ce;
	}

	.btn-del-all {
		font: 700 14px 'open sans', arial;
		background: transparent;
		color: #cf4343;
		cursor: pointer;
		border: none!important;
		box-shadow: none!important;
	}

</style>

<script type="text/javascript">
	var typeURI = function(value) {
	    var ciuri = value;
	        ciuri = ciuri.replace(/\s/g, '-');
	        ciuri = ciuri.replace(/\:/g, '-');
	        ciuri = ciuri.replace(/ã/g, 'a');
	        ciuri = ciuri.replace(/õ/g, 'o');
	        ciuri = ciuri.replace(/á/g, 'a');
	        ciuri = ciuri.replace(/é/g, 'e');
	        ciuri = ciuri.replace(/í/g, 'i');
	        ciuri = ciuri.replace(/ó/g, 'o');
	        ciuri = ciuri.replace(/ú/g, 'u');
	        ciuri = ciuri.replace(/â/g, 'a');
	        ciuri = ciuri.replace(/ê/g, 'e');
	        ciuri = ciuri.replace(/î/g, 'i');
	        ciuri = ciuri.replace(/ô/g, 'o');
	        ciuri = ciuri.replace(/û/g, 'u');
	        ciuri = ciuri.replace(/à/g, 'a');
	        ciuri = ciuri.replace(/è/g, 'e');
	        ciuri = ciuri.replace(/ì/g, 'i');
	        ciuri = ciuri.replace(/ò/g, 'o');
	        ciuri = ciuri.replace(/ù/g, 'u');
	        ciuri = ciuri.replace(/ç/g, 'c');
	        ciuri = ciuri.replace(/\"/g, '');
	        ciuri = ciuri.replace(/\'/g, '');
	        ciuri = ciuri.replace(/\“/g, '');
	        ciuri = ciuri.replace(/\”/g, '');
	        ciuri = ciuri.replace(/\&/g, 'e');
	        return ciuri;
	};

	var typeURI2 = function(value) {
	    var ciuri = value;
	        ciuri = ciuri.replace(/\//g, '-');
	        ciuri = ciuri.replace(/\s/g, '-');
	        ciuri = ciuri.replace(/\:/g, '-');
	        ciuri = ciuri.replace(/ã/g, 'a');
	        ciuri = ciuri.replace(/õ/g, 'o');
	        ciuri = ciuri.replace(/á/g, 'a');
	        ciuri = ciuri.replace(/é/g, 'e');
	        ciuri = ciuri.replace(/í/g, 'i');
	        ciuri = ciuri.replace(/ó/g, 'o');
	        ciuri = ciuri.replace(/ú/g, 'u');
	        ciuri = ciuri.replace(/â/g, 'a');
	        ciuri = ciuri.replace(/ê/g, 'e');
	        ciuri = ciuri.replace(/î/g, 'i');
	        ciuri = ciuri.replace(/ô/g, 'o');
	        ciuri = ciuri.replace(/û/g, 'u');
	        ciuri = ciuri.replace(/à/g, 'a');
	        ciuri = ciuri.replace(/è/g, 'e');
	        ciuri = ciuri.replace(/ì/g, 'i');
	        ciuri = ciuri.replace(/ò/g, 'o');
	        ciuri = ciuri.replace(/ù/g, 'u');
	        ciuri = ciuri.replace(/ç/g, 'c');
	        ciuri = ciuri.replace(/\"/g, '');
	        ciuri = ciuri.replace(/\'/g, '');
	        ciuri = ciuri.replace(/\“/g, '');
	        ciuri = ciuri.replace(/\”/g, '');
	        ciuri = ciuri.replace(/\&/g, 'e');
	        return ciuri;
	};

	
</script>

<div class="acelerador-de-sites">
	<div class="headbox" style="margin-top: 20px">
		<div class="flex">
			<div><img src="<?php echo plugins_url('', __FILE__) ?>/logo.png" style="width: 100px;"></div>
			<div>
				<h1 style="color:white;padding: 20px;font-weight:900;padding-top: 0; margin-top: 0;">Acelerador de Sites</h1>
				<div class="Ezeksoft_copyright">
					Um oferecimento <a target="_blank" href="https://ezeksoft.com/?utm_source=AceleradorDeSites-in-plugin">Ezeksoft®</a>
					<!-- <div>saiba mais</div> -->
				</div>
			</div>
			<div>
				<div style="margin-top: 13px; margin-left: auto; margin-bottom: 10px; display: table">
					<div class="flex">
						<div style="font-size: 12px; margin-right: 8px;">Versão</div>
						<div class="chip-free">1.0</div>
					</div>
				</div>
				<button class="btn" onclick='document.location.reload()' style="margin-left: 10px;">Criar novo</button>
			</div>
		</div>
	</div>

	<div class="acelerador-de-sites_wrapper" style="margin-top: 40px">

		<div>
			
			<div id="main_select_page">
				<div><bold><label>Selecione uma página para otimizar</label></bold> <span style="font-weight: 400; font-size: 12px;">(use a estrutura de permalinks como "Nome do post" ou <a href="<?php echo get_bloginfo('wpurl'); ?>/wp-admin/options-permalink.php" target="_blank">%postname%</a>)</span></div>
				<div>
					<div fx>
						<div><label onclick="select_page.style.display='block';input_page.style.display='none';pref_3.removeAttribute('disabled');is_home_lbl.style.display='block';" style="padding: 20px 20px 20px 0px;display:block"><input id='rad1' type="radio" name="page_type" checked> página ou post <span class="warn-b">inicie com um teste</span></label></div>
						<!-- <div><label onclick="input_page.style.display='block';select_page.style.display='none';input_slug.focus();pref_3.checked=false;pref_1.checked=true;pref_3.setAttribute('disabled',true);is_home_lbl.style.display='block';" style="padding: 20px 20px 20px 20px;display:block;"><input id='rad2' type="radio" name="page_type"> de oturo lugar</label></div> -->
						<div><label style="padding: 20px 20px 20px 20px;display:block"><div fx><div><input id='rad3' name="page_type" type="radio" onclick="select_page.style.display = 'none';input_page.style.display ='none';input_prefix.focus();pref_3.removeAttribute('disabled');is_home_lbl.style.display='none';is_home.checked=false;"> Todas as páginas do site</div> 
							<!-- <a target="_blank" href="https://ezeksoft.com/acelerador-de-sites-pro/?utm_source=Todas_as_paginas_do_site" style="margin-left: 9px;" class="chip-pro">PRO</a> -->
						</div></label>
						</div>
					</div>
					<div id="select_page" style="display:block">
						<div fx>
							<div>
							<select id="selected_page" style="width: 400px;background: transparent; color: #ababab; font-weight: 900; border: 1px solid #464646; outline: none;">
								<?php foreach ($list_all_pages as $item): ?>
									<option <?php /*$data->page_id == $item->ID*/ ?> value='<?php echo $item->ID.'|'.$item->post_name; ?>' post_modified="<?php echo $item->post_modified; ?>"><?php echo "{$item->post_name} ({$item->post_title})"; ?></option>
								<?php endforeach; ?>
							</select>
							</div>
							<div><span class="material-icons" onclick="selected_page.focus();" style="display:inline-block;padding:3px 5px;cursor:pointer">keyboard_arrow_down</span></div>
						</div>
					</div>
					<div id="input_page" style="display: none">
						<span style='cursor:pointer' onclick='input_slug.focus()'><?php echo get_site_url().'/'; ?></span>
						<input type="" placeholder="digite..." class="input-slug" id="input_slug" onkeyup="this.value = typeURI(this.value);" onblur="this.value=this.value.trim()">
					</div>
				</div>
			</div>

			<?php #var_dump($list);  ?>

			<!-- div style="margin-top: 30px">
				<div><label>Conteúdo SEO</label></div>
				<div fx>
					<div><textarea>texto 1\ntexto 2\ntexto 3</textarea></div>
					<div><button class="btn">Puxar conteúdo</button></div>
				</div>
			</div> -->

			<div style="margin-top: 50px">
				<div class="flex inline-menu">
					<div><button class="btn-inline" open-menu="menu_basico">Básico</button></div>
					<div><button class="btn-inline" open-menu="menu_avancado">Avançado</button></div>
				</div>
				<div>
					<div menu="menu_basico" style="display:block">
						<div>
							<bold><label>Otimizar para:</label></bold>
							<div style="margin-top: 10px">
								<div>
									<label><input id="ptype1" type="radio" name="pagetype" checked> Google PageSpeed Insights <span class="warn-b">recomendado</span></label>
								</div>
								<div>
									<label><input id="ptype2" type="radio" name="pagetype"> GTmetrix <span style='font-weight: 400; font-size: 12px;'>(só libera a página completa após interação humana)</span></label>
								</div>
							</div>
						</div>
					</div>
					<div menu="menu_avancado">
						<div style="display: block">
							<div style="margin-top: 10px">
								<div fx>
									<div style="margin-right: 30px">
										<div>
											<div><bold>Título</bold></div>
											<input id="input__bot_title" onkeyup="this.setAttribute('pressed', true)" value="<?php echo get_bloginfo('name'); ?>" class="input" style="margin-top: 10px; margin-bottom: 10px; width: 260px;">
										</div>
										<div>
											<div><bold>Descrição</bold></div>
											<textarea id="input__bot_description" onkeyup="this.setAttribute('pressed', true)" class="textarea" style="margin-top: 10px; margin-bottom: 10px; width: 260px; height: 100px;"><?php echo get_bloginfo('description'); ?></textarea>
										</div>
									</div>
									<div>										
										<bold>Imagem para robôs:</bold>
										<div><img id="BotImage" src="<?php echo plugins_url("", __FILE__); ?>/image.png" style="width: 120px; margin-top: 10px; margin-bottom: 10px;"></div>
										<button class="btn" id="btnUpload_BotImage">Carregar imagem</button>
									</div>
								</div>
							</div>
							<bold><label>HTML dentro de &lt;head&gt;:</label></bold>
							<div style="margin-top: 10px">
								<div>
									<textarea spellcheck="false" id="headTags" class="teaxtarea-1"
><meta name="generator" content="Ezeksoft - Plugin Acelerador de Sites"><!-- software gerador do HTML -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- responsivo -->
<meta name="keywords" content="" /><!-- palavras chave -->
<meta name="robots" content="index, follow" /><!-- permitir robôs seguirem links dentro de links -->
<meta name="author" content="" /><!-- seu nome -->
<meta name="copyright" content="&copy; <?php echo date("Y"); ?> - <?php echo get_bloginfo('name'); ?>" /><!-- nome do site -->
<meta name="revisit-after" content="1 days" /><!-- dias para os robôs checarem o site novamente -->
<meta name="rating" content="general" /><!-- menores de idade podem acessar o conteúdo -->
<meta http-equiv="content-language" content="pt-BR" /><!-- idioma -->
<meta charset="utf-8"><!-- letras baseados em latin -->
<meta property="og:locale" content="pt_BR" />






</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="margin-top: 50px">


				<div id="select_prefix">
					<div><bold><label>Configurar o que acontece com as URLs originais e novas geradas</label></bold></div>
					<div fx style="margin-top: 10px"><label><input type="radio" id="pref_1" name="use_prefix"> Prefixo <span style="font-weight: 400; font-size: 12px;">(na nova)</span></label></div>
					<div fx style="margin-top: 10px"><label><input type="radio" id="pref_2" name="use_prefix"> Sufixo <span style="font-weight: 400; font-size: 12px;">(na nova)</span></label></div>
					<div fx style="margin-top: 10px"><label><input type="radio" id="pref_3" name="use_prefix" checked> Sobrescrever <span style="font-weight: 400; font-size: 12px;">(a original)</span><span class="warn-b">recomendado</span></label></div>
					<div fx>
						<label style="position: relative; top: 6px;" onclick="input_prefix.focus()">Iniciar ou terminar url com: </label>
						<div><input type="" style="width: 300px;" name="" class="input" id="input_prefix" onkeyup="this.value=typeURI2(this.value)" placeholder="Exemplo, prefixo: wp_ ou sufixo: .html"></div>
					</div>
					<span style="font-weight: 400; font-size: 12px;">Se ficar em branco automaticamente é preenchido o prefixo: sp_</span>
				</div>
				<br>
				
				<div fx style="width: 480px">
					<span style="font-size:11px" id="is_home_lbl"><label><input type="checkbox" id="is_home"> definir como página inicial do site</label></span>
					<div style="margin-left: auto"><button class="btn" id="btnSave">Salvar</button></div>
				</div>

				<!-- <div id="saveas_lbl"><bold><label>Salvar como</label></bold> <span style='font-weight:400;font-size:12px'>(não utilizar caracteres especiais)</span></div>
				<div fx>
					<div id="saveas_url_lbl"><span onclick="save_as_input.focus()" style='cursor:pointer'><?php echo get_site_url().'/'; ?></span><input id="save_as_input" type="" placeholder="digite..." class="input-slug" style="border-bottom-color: #0cb0ce;"></div>
					<div><button class="btn" id="btnSave" style="margin-left:30px">Salvar</button></div>
				</div> -->
			</div>

			<div style="margin-top: 15px;display: none" id="status_saving_box">
				<bold>Salvando</bold> <span id="status_saving">...</span>
			</div>

		</div>

		<div style="margin-top: 80px;max-width: 560px" id="listView">
			<?php if (sizeof($rows)): ?>
				<div fx>
					<div><label style="font-weight: 900">Páginas</label></div>
					<div style="margin-left: auto">
						<!-- <div><button>Apagar tudo</button></div> -->
						<div fx>
							<div><a target="_blank" href="<?php echo get_site_url().'/'; ?>auto-sitemap.xml" style='color:#9ea3a8;outline:none;box-shadow: none'><bold>Abrir sitemap</bold></a></div>
							<div style="margin-left: 10px"><button class="btn-del-all" id="btnDelAll">Desfazer todos</button></div>
						</div>
					</div>
				</div>
				<div style="margin-top: 15px;">
					<?php foreach($rows as $row): $link = get_site_url().'/'.$row->uri; ?>
						<div class="item-list">
							<div><bold style='overflow:hidden;width: 385px;display:block'><a class='a' href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></bold></div>
							<div><a 
								href="<?php 
								echo $row->pagetype == "GTMetrix" ? "https://gtmetrix.com/" : "https://developers.google.com/speed/pagespeed/insights/?hl=pt-br&url=$link"
								?>"
							 target='_blank'><button class="control-button">Testar</button></a></div>
							<div><button class="control-button" id="btnEdit" item='<?php echo $row->id; ?>'
								 data-uri="<?php echo $row->uri; ?>"
								 data-uri_iframe="<?php echo $row->uri_iframe; ?>"
								 data-is_home="<?php echo $row->is_home; ?>"
								 data-page_type="<?php echo $row->pagetype; ?>"
								 data-html_head="<?php echo $row->html_head; ?>"
								 data-bot_image="<?php echo $row->bot_image; ?>"
								 data-bot_title="<?php echo $row->bot_title; ?>"
								 data-bot_description="<?php echo $row->bot_description; ?>"
								 data-post_name_original="<?php echo $row->post_name_original; ?>"
								 data-use_prefix="<?php echo $row->use_prefix; ?>"
								 data-use_sufix="<?php echo $row->use_sufix; ?>"
								 data-post_modified="<?php echo $row->post_modified; ?>"
								 data-post_name_wp="<?php echo $row->post_name_wp; ?>">Editar</button></div>
							<div><button class="control-button" id="btnDel" item='<?php echo $row->id; ?>'>Desfazer</button></div>
						</div>			
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>


	</div>
</div>



<iframe id="viewPort" style='opacity: 0'></iframe>
<script type="text/javascript">
var site_host = "<?php echo get_site_url().'/'; ?>";
var prefix = "sp_";
var current_seo_html = "";
var id_editing = 0;
[].map.call(document.querySelectorAll('#btnDel'), btn => {
	btn.onclick = function() {
		var id = parseInt(this.getAttribute("item"));

		jQuery.post(ajaxurl, { action: "acelerador_de_sites__del", id: id }, function(response) {
			document.location.reload();
		});

		var el = jQuery(this).parents('.item-list')[0];
		var parent = el.parentNode;
		parent.removeChild(el);

		if (!parent.children.length) listView.style.display = 'none';

	};
});
if (typeof btnDelAll != "undefined") btnDelAll.onclick = () => {
	jQuery.post(ajaxurl, { action: "acelerador_de_sites__del_all" }, response => {
		document.location.reload();
	});
}
var uri_loaded_edit = "";
var editing__post_name_wp = "";
[].map.call(document.querySelectorAll("#btnEdit"), btn => {
	btn.onclick = function() {
		var id = parseInt(this.getAttribute("item"));
		id_editing = id;

		window.scrollTo(0, 0);
		
		var uri = btn.getAttribute("data-uri");
		var uri_iframe = btn.getAttribute("data-uri_iframe");
		var is_home_ = Number(btn.getAttribute("data-is_home"));
		var page_type_ = btn.getAttribute("data-page_type");
		var html_head_ = unescape(btn.getAttribute("data-html_head")).split('\"').join('"');
		var bot_image_ = btn.getAttribute("data-bot_image");
		var bot_title_ = btn.getAttribute("data-bot_title");
		var bot_description_ = btn.getAttribute("data-bot_description");
		var post_modified_ = btn.getAttribute("data-post_modified");
		var post_name_original_ = btn.getAttribute("data-post_name_original"); 
		var use_prefix_ = btn.getAttribute("data-use_prefix");
		var use_sufix_ = btn.getAttribute("data-use_sufix");
		var post_name_wp_ = btn.getAttribute("data-post_name_wp"); editing__post_name_wp = post_name_wp_;

		uri_loaded_edit = uri;

		if (!use_prefix_ && !use_sufix_) {
			pref_1.checked = false;
			pref_2.checked = false;
		}

		if (use_prefix_) {
			pref_1.checked = true;
			input_prefix.value = use_prefix_;
		}
		else if (use_sufix_) {
			pref_2.checked = true;
			input_prefix.value = use_sufix_;
		}

		input__bot_title.removeAttribute("pressed");
		input__bot_description.removeAttribute("pressed");
		BotImage.removeAttribute("pressed");

		if (uri_iframe.substring(0, 1) == "?") {
			input_page.style.display='none';
			select_page.style.display='block';
			selected_page.value = uri_iframe.replace("?p=", "") + "|" + post_name_original_; // nao precisa puxar do select pois esta editando
			rad1.checked = true;
			// rad2.checked = false;
		}
		else {
			input_page.style.display='block';
			select_page.style.display='none';
			input_slug.value = uri_iframe;
			input_slug.focus();
			rad1.checked = false;
			// rad2.checked = true;
		}

		current__post_modified__loop = post_modified_;

		// select_prefix.style.display = "none";
		pref_3.checked = false;
		headTags.value = html_head_;
		BotImage.src = bot_image_ ? bot_image_ : "<?php echo plugins_url("", __FILE__); ?>/image.png";
		input__bot_title.value = bot_title_;
		input__bot_description.value = bot_description_;
		// save_as_input.value = uri;
		is_home.checked = is_home_ ? true : false;

		is_home_lbl.style.display = 'block';
		// saveas_lbl.style.display = 'block';
		// saveas_url_lbl.style.display ='block';
		// btnSave.style.marginLeft = '30px';
		// btnSave.style.marginBottom = 0;

		if (page_type_ == "PageSpeed") ptype1.checked = true;
		if (page_type_ == "GTMetrix") ptype2.checked = true;

		jQuery.post(ajaxurl, { action: "acelerador_de_sites__get_html_seo", id: id }, function(response) {
			current_seo_html = response;
		});		
	}
});
var current_index_loop = 0;
var pages = [];
var current_page_loop = "";
var current__post_name__loop = "";
var current__post_modified__loop = "";
btnSave.onclick = function() {
	current_index_loop = 0;
	pages = [];

	if ((pref_1.checked || pref_3.checked) && input_prefix.value.indexOf(".") != -1) {
		alert("Prefixo não pode ter ponto.");
		return;
	}

	var v = input_prefix.value.trim();
	prefix = v ? v : "sp_";

	var page = "";

	if (rad1.checked) {
		current__post_modified__loop = "<?php echo date("Y-m-d H:i:s"); ?>";
		var arr = selected_page.value.split("|");
		page = "?p=" + arr[0];
		current__post_name__loop = id_editing ? editing__post_name_wp : arr[1];
	}

	// if (rad2.checked) {
	// 	current__post_modified__loop = "<?php echo date("Y-m-d H:i:s"); ?>";
	// 	page = input_slug.value;//post_name_wp
	// 	if (pref_1.checked)
	// 		current__post_name__loop = prefix + page;
	// 	if (pref_2.checked)
	// 		current__post_name__loop = page + prefix;
	// }


	if (rad3.checked) {
		current__post_modified__loop = "";
		<?php foreach ($list_all_pages as $item): ?>
		pages.push({ id: Number('<?php echo $item->ID; ?>'), post_name: '<?php echo $item->post_name; ?>', post_modified: '<?php echo $item->post_modified; ?>' });
		<?php endforeach; ?>
		input__bot_title.removeAttribute("pressed");
		input__bot_description.removeAttribute("pressed");
		BotImage.removeAttribute("pressed");
	}


	// else if (!save_as_input.value) {
	// 	alert("Preencha o campo: Salvar como");
	// 	return;
	// }

	this.innerText = "Aguarde...";

	var pagetype_ = "";
	if (ptype1.checked) pagetype_ = "PageSpeed";
	if (ptype2.checked) pagetype_ = "GTMetrix";	

	if (pages.length) {
		loop_save_item();
	}
	else {
		var url = site_host+page;
		viewPort.src = url;
	}

    // jQuery.post(url, {}, response => {    			
    //     doc.body.innerHTML = response;
    //     setTimeout(iFrameLoaded, 1);
    // });
    viewPort.onload = function() {
    	setTimeout(function() {
    		iFrameLoaded(function(string) {
    			current_seo_html = string.split("\\&quot;").join('').split("\&amp;").join('&');
    			current_seo_html = current_seo_html.split('\\"').join('"');
    			


    			var use_prefix = "";
    			var use_sufix = "";

    			// var uri_to_save = pages.length ? current_uri_loop : page;
    			uri_to_save = current__post_name__loop;

    			if (rad1.checked || rad3.checked) {
    				if (pref_1.checked) {
    					uri_to_save = prefix + current__post_name__loop;
    					use_prefix = prefix;
    					use_sufix = "";
    				}
    				if (pref_2.checked) {
    					uri_to_save = current__post_name__loop + prefix;
    					use_prefix = "";
    					use_sufix = prefix;
    				}
    			}

				
				var arr = selected_page.value.split("|");
    			var slug = arr[1];

				if (pref_1.checked) {
    				post_name_original = slug;
	    		}
				if (pref_2.checked) {
    				post_name_original = slug;
	    		}	    		
    			if (pref_3.checked) {
    				if (uri_loaded_edit) uri_to_save = uri_loaded_edit;
    				post_name_original = prefix + current__post_name__loop;
    			}

    			var page_to_save = pages.length ? current_page_loop : page;
				
				var img = "";				
				if (BotImage.src.length) {
					var arr = BotImage.src.split("/");
					var end = arr[arr.length-2] + "/" + arr[arr.length-1];
	    			if (end != "<?php echo $this->plugin; ?>/image.png") img = BotImage.src;
    			}

    			// se esta editando
    			if (id_editing) {
    				// nenhuma opcao de url marcada
    				if (!pref_1.checked && !pref_2.checked && !pref_3.checked) {
		    			current__post_name__loop = current__post_name__loop.replace(prefix, "");
						uri_to_save = uri_to_save.replace(prefix, "");
    					post_name_original = prefix + current__post_name__loop;
					}
    				if (pref_3.checked) {
		    			current__post_name__loop = current__post_name__loop.replace(prefix, "");
						uri_to_save = uri_to_save.replace(prefix, "");
    					post_name_original = prefix + current__post_name__loop;
					}
				}

    			var blob = new Blob(
		              [current_seo_html],
		              {type : 'text/html'}
				); 
				var a = new FileReader();
				a.onload = function(e) {
	    			var data = { 
	    				action: "acelerador_de_sites__save",
	    				rewrite: pref_3.checked ? 1 : 0,
	    				post_name: current__post_name__loop,
	    				post_name_wp: current__post_name__loop,
	    				post_modified: current__post_modified__loop,
	    				prefix: prefix,
	    				type: rad3.checked ? "pages" : "page",

						post_name_original: post_name_original,
						use_prefix: use_prefix,
						use_sufix: use_sufix,

	    				id: id_editing,
						uri: uri_to_save,
						uri_iframe: page_to_save,
						is_home: is_home.checked ? 1 : 0,
						html_seo: e.target.result,
						pagetype: pagetype_,
						html_head: escape(headTags.value),
						bot_image: img,
						bot_title: input__bot_title.value,
						bot_description: input__bot_description.value
	    			};


	    			
	    			jQuery.post(ajaxurl, data, response => {
	    				var reload = false;

	    				if (pages.length) {
	    					status_saving_box.style.display = "block";
	    					status_saving.innerHTML = uri_to_save;
	    					if (current_index_loop < pages.length - 1) {
	    						// console.log("reinicia por loop old: " + current_index_loop + " new:" + (current_index_loop+1));
	    						current_index_loop++;
	    						uri_loaded_edit = "";
								current_page_loop = "";
								current__post_name__loop = "";
								current__post_modified__loop = "";
			    				input__bot_title.value = "<?php echo get_bloginfo('name'); ?>";
			    				input__bot_description.value = "<?php echo get_bloginfo('description'); ?>";
	    						loop_save_item();
	    					}
	    					else {
	    						// console.log('fim');
	    						current_index_loop = -1;
	    						reload = true;
	    					}
	    				}
	    				else reload = true; 
	    				// console.log(response);

						if (reload) document.location.reload();
	    			});


				};
				a.readAsDataURL(blob);
    		});
    	}, 1);
    }
};

var rewrite_list = [];
var loop_save_item = () => {
	var p = pages[current_index_loop];
	var v = input_prefix.value.trim();
	prefix = v ? v : "sp_";
	current_page_loop = "?p=" + p.id;
	var url = site_host + current_page_loop;
	current_uri_loop = prefix + p.post_name;
	current__post_name__loop = p.post_name;
	current__post_modified__loop = p.post_modified;
	if (pref_1.checked)
		current_uri_loop = prefix + p.post_name;
	if (pref_2.checked)
		current_uri_loop = p.post_name + prefix;
	if (pref_3.checked) 
		current_uri_loop = p.post_name;

	viewPort.src = url;
};

var iFrameLoaded = function(callback) {		
		var doc = viewPort.contentWindow.document;
        var htmls = [];
		var last_tag_title = ""
		  , last_tag_description = ""
		  , last_tag_img = ""
		;
		[].map.call(doc.head.querySelectorAll('*'), element => {
		    var tag = element.tagName.toLowerCase();
		    if (!last_tag_title && tag == "title")	last_tag_title = element.innerHTML;
		    if (!last_tag_description && tag == "meta" && element.hasAttribute("name") && element.getAttribute("name") == "description" && element.hasAttribute("content"))
		    	last_tag_description = element.getAttribute("content");
		});

		[].map.call(doc.body.querySelectorAll('p'), element => {
		    var tag = element.tagName.toLowerCase();
		    var inheader = jQuery(element).parents("header")[0];
		    if (!last_tag_description && tag == "p" && !inheader) {
		    	if (/\./.test(element.innerText))
		    		last_tag_description = element.innerText.split(".")[0];
		    	else
		    		last_tag_description = element.innerText;
		    }
		});

		[].map.call(doc.body.querySelectorAll('img'), element => {
		    var tag = element.tagName.toLowerCase();
		    if (!last_tag_img && tag == "img" && element.hasAttribute("class") && !element.getAttribute("class").substring(0, 8).includes("avatar")) last_tag_img = element.src;
		});

		if (rad3.checked) {
			if (last_tag_title) input__bot_title.value = last_tag_title;
			if (last_tag_description) input__bot_description.value = last_tag_description; // se nao existir pegar o primeiro pedaco de texto
			if (last_tag_img) BotImage.src = last_tag_img;

		}
		else {
			if (last_tag_title && !input__bot_title.hasAttribute("pressed")) input__bot_title.value = last_tag_title;
			if (last_tag_description && !input__bot_description.hasAttribute("pressed")) input__bot_description.value = last_tag_description; // se nao existir pegar o primeiro pedaco de texto
			if (last_tag_img && !BotImage.hasAttribute("pressed")) BotImage.src = last_tag_img;
		}

		[].map.call(doc.body.querySelectorAll('*'), element => {
		    var tag = element.tagName.toLowerCase();

		    if (tag == "img" || tag == "script" || tag == "iframe" || tag == "link" || tag == "svg" || tag == "head" || tag == "title" || tag == "meta" || tag == "style")
		        element.parentNode.removeChild(element);


		    var hasClass = element.hasAttribute("class");
		    if (hasClass) element.removeAttribute("class");

		    var hasStyle = element.hasAttribute("style");
		    if (hasStyle) element.removeAttribute("style");

		    var hasID = element.hasAttribute("id");
		    if (hasID) element.removeAttribute("id");
		});

		// console.log(singleHTML.join(""));
		var string = doc.body.innerHTML;

		var max = 256000; // 256 KB
		if (string.length > max) string = string.substring(0, max);

		if (callback) callback(string);
};

var removeAllOpenMenuActives = () => [].map.call(document.querySelectorAll('[open-menu]'), btn => btn.classList.remove("btn-inline-active"));
var hideAllMenus = () => [].map.call(document.querySelectorAll('[menu]'), div => div.style.display = 'none');
[].map.call(document.querySelectorAll('[open-menu]'), div => {
	div.onclick = function() {
		var menu = this.getAttribute("open-menu");
		hideAllMenus();
		var menuElement ; if (menuElement = document.querySelector('[menu="' + menu + '"]')) {
			menuElement.style.display = "block";
			var btnOpen ;  if (btnOpen = document.querySelector('[open-menu="' + menu + '"]')) {
				removeAllOpenMenuActives();
				btnOpen.classList.add("btn-inline-active");
			}
		}
	};
});

var fnUploadBotImage = function() {
	upload(function(url) {
		BotImage.src = url;
		BotImage.setAttribute('pressed', true);
	});
}
btnUpload_BotImage.onclick = fnUploadBotImage;
BotImage.onclick = fnUploadBotImage;
</script>