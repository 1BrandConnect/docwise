<?php
define('WP_CACHE', false); // Added by WP Rocket
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'docwise02');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'docwise02');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'sdk2FlA81j3');

/** nome do host do MySQL */
define('DB_HOST', 'mysql.docwise.com.br');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'YU[9gvOb_l (;$tT+BtdQ]?f90@)rRng/iwz>.9gVo7]-+b|u*wjcyV@bbz~b^ET');
define('SECURE_AUTH_KEY',  ')ZxbGtg?6w*`C:!!0~Ojp+PNxRmkXC3hdpR+f6d}u]Qu] Jp)!T9N0cd|0>?)c|1');
define('LOGGED_IN_KEY',    'cEzdO3g/Do1iNJS0LwK(cP5u)87@L[:D-~usFRBA^g|)q+<CL|bbG,azn.&z_Y.#');
define('NONCE_KEY',        'W+tVzvS]&@)=#g>s[E_w3xIThM+(~gXl^#h!aH$U^l`.sG5}>Y)]PBkBSQA^,e$G');
define('AUTH_SALT',        ' UN-Gb+KigG~/6jOK58SuM|^g|`t`BipH&#1qn`Z[vhXA3TGBQmU<1TXH!hB(x4-');
define('SECURE_AUTH_SALT', '#GRTAo<xl|%|!9ujkK+MjIDp*n+(~5ZzmfT/-d,I `I6GGo>|}aPWqhomcwy8=-$');
define('LOGGED_IN_SALT',   ']1UST`FP2y;H*Z/HU-;+4<l$~UQ#cXXU18W+pjxL36x3*g|NH%%k&~j~-/R(.UrD');
define('NONCE_SALT',       '7iq~RZP+tg4Y(<NvBDw_~hr]=g+jLyKPvH+-6a#]&iOY7H<abtqwU0A7. ]f:g q');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

//Modificação para o AVADA
define( 'WP_MEMORY_LIMIT', '256M' );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');

/* Forçando o wordpress a deixar subir arquivos .svg.
	Mas, cuidado! isso vai permitir outros tipos tb. 
	Sabe-se lá quais perigos isso aqui vai permitir... */
if ( !defined('ALLOW_UNFILTERED_UPLOADS') )
	define('ALLOW_UNFILTERED_UPLOADS', true);
