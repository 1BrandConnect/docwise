<?php header('Content-Type: text/xml; charset=utf-8'); ?><?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="<?php echo get_site_url() . '/main-sitemap.xsl' ?>"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- criado com o plugin Ezeksoft - Acelerador de Sites - https://ezeksoft.com/acelerador-de-sites/ -->

<url>
  <loc><?php echo get_site_url() . '/'; ?></loc>
  <lastmod><?php echo date("Y-m-d") . "T" . date("H:i:s") . "+00:00"; ?></lastmod>
  <priority>1.00</priority>
</url>
<?php foreach ($data as $item): $datetime = explode(" ", $item->post_modified); $date = $datetime[0]; $time = $datetime[1]; ?><url>
  <loc><?php echo get_site_url() . '/' . $item->uri; ?></loc>
  <lastmod><?php echo $date; ?>T<?php echo $time; ?>+00:00</lastmod>
  <priority>0.80</priority>
</url><?php endforeach; ?>



</urlset>