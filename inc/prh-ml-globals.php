<?php

/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	prh-ml-globals.php
	---------------------
	global values accessed in different places through the plugin
*/

// plugin name
$GLOBALS['prh_plugin_name']='Mi librería';

// countries 
$GLOBALS['prh_countries']=array(
	'ES'=>'España',
	'MX'=>'México',
	'AR'=>'Argentina',
	'CL'=>'Chile',
	'CO'=>'Colombia',
	'UY'=>'Uruguay'
);

// shops
// url replacement tokens:
// [ISBN] = número ISBN
// [CODE] = número de campaña
// valid format options = digital / paper
$GLOBALS['prh_shops']=array(
	'amazon-es'=>array(
		'title'=>'Amazon',
		'country'=>'ES',
		'url'=>'http://www.amazon.es/gp/search?keywords=[ISBN]&linkCode=qs&tag=[CODE]',
		'has_affiliates'=>true
	),
	'amazon-mx'=>array(
		'title'=>'Amazon',
		'country'=>'MX',
		'url'=>'http://www.amazon.com.mx/gp/search?keywords=[ISBN]',
	),
	'amazon-us'=>array(
		'title'=>'Amazon (EEUU / internacional)',
		'url'=>'http://www.amazon.com/gp/search?keywords=[ISBN]&linkCode=qs&tag=[CODE]',
		'has_affiliates'=>true
	),
	'barnes-noble-us'=>array(
		'title'=>'Barnes &amp; Noble (EEUU / internacional)',
		'url'=>'http://www.barnesandnoble.com/w/?ean=[ISBN]'
	),
	'boutique-del-libro-ar'=>array(
		'title'=>'Boutique del Libro',
		'country'=>'AR',
		'url'=>'http://www.boutiquedellibro.com.ar/resultados.aspx?c=[ISBN]'
	),
	'buscalibre-cl'=>array(
		'title'=>'Buscalibre',
		'country'=>'CL',
		'url'=>'http://www.buscalibre.com/rto/isbn/prh/[ISBN]',
		'format'=>'paper'
	),
	'casa-del-libro-es'=>array(
		'title'=>'Casa del Libro',
		'country'=>'ES',
		'url'=>'http://www.casadellibro.com/homeAfiliado?ca=2926&isbn=[ISBN]'
	),
	'corte-ingles-es'=>array(
		'title'=>'El Corte Inglés',
		'country'=>'ES',
		'url'=>'http://ocio.elcorteingles.es/search?Ntt=[ISBN]'
	),
	'cuspide-ar'=>array(
		'title'=>'Cuspide',
		'country'=>'AR',
		'url'=>'http://www.cuspide.com/resultados.aspx?c=[ISBN]',
		'format'=>'paper'
	),
	'fnac-es-fisicos'=>array(
		'title'=>'FNAC libros físicos',
		'country'=>'ES',
		'url'=>'http://busqueda.fnac.es/Search/SearchResult.aspx?SCat=2%211&Search=[ISBN]',
		'format'=>'paper'
	),
	'fnac-es-ebooks'=>array(
		'title'=>'FNAC libros electrónicos',
		'country'=>'ES',
		'url'=>'http://ebooks.fnac.es/isbn/[ISBN]',
		'format'=>'digital'
	),
	'gandhi-mx'=>array(
		'title'=>'Gandhi',
		'country'=>'MX',
		'url'=>'http://digital.gandhi.com.mx/index.php?route=product/search&filter_isbn=[ISBN]'
	),
	'google-play'=>array(
		'title'=>'Google Play',
		'url'=>'https://play.google.com/store/search?q=[ISBN]&c=books',
		'format'=>'digital'
	),
	'ibooks-es'=>array(
		'title'=>'iBooks Store',
		'country'=>'ES',
		'url'=>'http://itunes.apple.com/es/book/isbn[ISBN]?at=[CODE]',
		'has_affiliates'=>true,
		'format'=>'digital'
	),
	'ibooks-mx'=>array(
		'title'=>'iBooks Store',
		'country'=>'MX',
		'url'=>'https://itunes.apple.com/mx/book/isbn[ISBN]?at=[CODE]',
		'has_affiliates'=>true,
		'format'=>'digital'
	),
	'sanborns-mx'=>array(
		'title'=>'Sanborns México',
		'country'=>'MX',
		'url'=>'http://librosdigitales.sanborns.com.mx/buscar-libros-digitales-por/[ISBN]',
		'format'=>'digital'
	),
	'sotano'=>array(
		'title'=>'Sotano',
		'country'=>'MX',
		'url'=>'http://www.elsotano.com/busqueda.php?q=[ISBN]&cfi=1'
	),
	'porrua'=>array(
		'title'=>'Porrúa',
		'country'=>'MX',
		'url'=>'http://www.porrua.mx/pagina-busqueda.php?s=[ISBN]&type=i',
		'format'=>'paper'
	)
);

// topics by country - converted with var_export() from output at http://tematicas.prhge.com
// because calling home not permitted for Codex...
$GLOBALS['prh_topics'] = array (
	'ES' => 
	array (
	0 => 
	array (
		'id' => '074fcb2735e809b024413710855fcafd',
		'tematica_web' => 'Arte, cine, y música',
	),
	1 => 
	array (
		'id' => '0b62a724341123b3e6304f175d082f3e',
		'tematica_web' => 'Autoayuda',
	),
	2 => 
	array (
		'id' => '2887db352d92b1e84ade250b5e49ddf2',
		'tematica_web' => 'Bienestar',
	),
	3 => 
	array (
		'id' => '7a2a461980a35aee768936618813a15e',
		'tematica_web' => 'Biografías',
	),
	4 => 
	array (
		'id' => 'a3e822fe010a6f23d1a996b9f9f0fd43',
		'tematica_web' => 'Business',
	),
	5 => 
	array (
		'id' => '3a9b75def2a120939b9ba5cbafee7f96',
		'tematica_web' => 'Ciencia',
	),
	6 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ciencia-ficción',
	),
	7 => 
	array (
		'id' => 'db169b50f2d319c71360fba7c18c0094',
		'tematica_web' => 'Cocina',
	),
	8 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Comedia romántica',
	),
	9 => 
	array (
		'id' => 'be6469cc175d4ab13e1db8bee53fab8e',
		'tematica_web' => 'Cómic',
	),
	10 => 
	array (
		'id' => '3985005d2446d8753ea4fad017c811a2',
		'tematica_web' => 'Consejos padres',
	),
	11 => 
	array (
		'id' => '16b7219bba5e23df1976776910bb4d36',
		'tematica_web' => 'Contemporánea',
	),
	12 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Deportes',
	),
	13 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Espiritualidad',
	),
	14 => 
	array (
		'id' => '4dec86803f1945f7da155290379d6438',
		'tematica_web' => 'Estilo de vida',
	),
	15 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Filosofía',
	),
	16 => 
	array (
		'id' => 'd48777ee944bfe92fd57c47ec83670cf',
		'tematica_web' => 'Grandes clásicos',
	),
	17 => 
	array (
		'id' => '7e5b9923cbb98ce42513461045cc6d06',
		'tematica_web' => 'Historia',
	),
	18 => 
	array (
		'id' => 'c900d88bbfc7eeb09f1c69291c4b5a2a',
		'tematica_web' => 'Humor',
	),
	19 => 
	array (
		'id' => 'a4691319c33ae6b08e74fad1a156747e',
		'tematica_web' => 'Infantil',
	),
	20 => 
	array (
		'id' => '0d28687156e546313d376a064a77de92',
		'tematica_web' => 'Juvenil',
	),
	21 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Misterio y terror',
	),
	22 => 
	array (
		'id' => '29d63186c4401ece8909344d017b8b5d',
		'tematica_web' => 'Narrativa femenina',
	),
	23 => 
	array (
		'id' => 'a27245b818104633fd35a8761c81fc68',
		'tematica_web' => 'Novela erótica',
	),
	24 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Novela histórica',
	),
	25 => 
	array (
		'id' => 'e877afeabfa45b437af2ddcbe8303b93',
		'tematica_web' => 'Novela negra',
	),
	26 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Novela romántica',
	),
	27 => 
	array (
		'id' => 'be16c9e94a4e0ca5da7266bf6c971bb2',
		'tematica_web' => 'Poesía',
	),
	28 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Política y actualidad',
	),
	29 => 
	array (
		'id' => '599d9fb119bda8bf8c1eb291a39dab4d',
		'tematica_web' => 'Thriller',
	),
	30 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Viajes',
	),
	),
	'AR' => 
	array (
	0 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Autoayuda',
	),
	1 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Biografías',
	),
	2 => 
	array (
		'id' => 'd882917f7e944b67d10169aaed3d250c',
		'tematica_web' => 'Business',
	),
	3 => 
	array (
		'id' => 'efa0da6e8f9562c820c652ca2aeadcb7',
		'tematica_web' => 'Ciencia',
	),
	4 => 
	array (
		'id' => '4efa963b4cf62115a6ea8bebd2866d2b',
		'tematica_web' => 'Clásicos',
	),
	5 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Cocina',
	),
	6 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Cómic y Novela Gráfica',
	),
	7 => 
	array (
		'id' => '1c6034e6dc8c96909fc817eefb3147bd',
		'tematica_web' => 'Crianza',
	),
	8 => 
	array (
		'id' => '4a96413abfe9bec75e7fce4b50a775e1',
		'tematica_web' => 'Deportes',
	),
	9 => 
	array (
		'id' => 'de19abd3df9c4670d7aeb717a909edc8',
		'tematica_web' => 'Ensayo',
	),
	10 => 
	array (
		'id' => '53251ace02b2ee7c86f61735e31000eb',
		'tematica_web' => 'Espiritualidad',
	),
	11 => 
	array (
		'id' => '1fb4352d3c1bafb5ec62569136c1f43e',
		'tematica_web' => 'Fantasía y Ciencia Ficción',
	),
	12 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ficción moderna',
	),
	13 => 
	array (
		'id' => 'f7f19d7338687a8ce70f0fd28ca60b9a',
		'tematica_web' => 'Filosofía',
	),
	14 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Grandes clásicos',
	),
	15 => 
	array (
		'id' => '2ac5c26be9ad3ce45cae6c131bdc91c4',
		'tematica_web' => 'Historia',
	),
	16 => 
	array (
		'id' => '3a026183877a5e4df0dd4fc878da8795',
		'tematica_web' => 'Historia Mundial',
	),
	17 => 
	array (
		'id' => 'bc1b2dcb7060f38a69e77fdc332fac42',
		'tematica_web' => 'Humor',
	),
	18 => 
	array (
		'id' => 'ce80635fd1aaf7c49234cb7d377fb913',
		'tematica_web' => 'Investigación Periodística',
	),
	19 => 
	array (
		'id' => 'e8b7d7741cfc24e52bed068543cc4401',
		'tematica_web' => 'Libros para Chicos',
	),
	20 => 
	array (
		'id' => '12451fc3bcb11f6b9a50f475fc482863',
		'tematica_web' => 'Libros para Jóvenes',
	),
	21 => 
	array (
		'id' => '798251429e0c1be72ab94a855d5f51e2',
		'tematica_web' => 'Literatura Universal',
	),
	22 => 
	array (
		'id' => '1edf5465159fd98ddd9ad1558b69902f',
		'tematica_web' => 'Misterio y terror',
	),
	23 => 
	array (
		'id' => 'fc138a99f992989b9413c9ccaf6b8cbb',
		'tematica_web' => 'Negocios y Management',
	),
	24 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Novela erótica',
	),
	25 => 
	array (
		'id' => '3a294e7c836141a4e774dacf2199c9c8',
		'tematica_web' => 'Novela grafica',
	),
	26 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Novela histórica',
	),
	27 => 
	array (
		'id' => '0764086163fdab7ad5f5222d000cd454',
		'tematica_web' => 'Novela negra',
	),
	28 => 
	array (
		'id' => 'd7bb0b63e6ded31d873102b79af7555f',
		'tematica_web' => 'Novela Policial',
	),
	29 => 
	array (
		'id' => '88dc5e3b037be51b851a5b98bb7b286c',
		'tematica_web' => 'Novela romántica',
	),
	30 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Poesía',
	),
	31 => 
	array (
		'id' => '0d0c3f507bf63c65659c20a558fcc3c4',
		'tematica_web' => 'Salud y Bienestar',
	),
	32 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Teatro',
	),
	33 => 
	array (
		'id' => 'c2a3ce8b8caf7463bcfa204836cdc083',
		'tematica_web' => 'Viajes',
	),
	),
	'MX' => 
	array (
	0 => 
	array (
		'id' => 'c900d88bbfc7eeb09f1c69291c4b5a2a',
		'tematica_web' => 'Arte, música y cine',
	),
	1 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Autoayuda',
	),
	2 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Biografías',
	),
	3 => 
	array (
		'id' => 'd882917f7e944b67d10169aaed3d250c',
		'tematica_web' => 'Business',
	),
	4 => 
	array (
		'id' => 'efa0da6e8f9562c820c652ca2aeadcb7',
		'tematica_web' => 'Ciencia',
	),
	5 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Cocina',
	),
	6 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Cómic',
	),
	7 => 
	array (
		'id' => '04f5d796a2f9d49990d3c4914c2debe1',
		'tematica_web' => 'Cómic y erotismo',
	),
	8 => 
	array (
		'id' => '4a96413abfe9bec75e7fce4b50a775e1',
		'tematica_web' => 'Deportes',
	),
	9 => 
	array (
		'id' => 'de19abd3df9c4670d7aeb717a909edc8',
		'tematica_web' => 'Ensayo',
	),
	10 => 
	array (
		'id' => '53251ace02b2ee7c86f61735e31000eb',
		'tematica_web' => 'Espiritualidad',
	),
	11 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ficción moderna',
	),
	12 => 
	array (
		'id' => 'f7f19d7338687a8ce70f0fd28ca60b9a',
		'tematica_web' => 'Filosofía',
	),
	13 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Grandes clásicos',
	),
	14 => 
	array (
		'id' => '2ac5c26be9ad3ce45cae6c131bdc91c4',
		'tematica_web' => 'Historia',
	),
	15 => 
	array (
		'id' => 'bc1b2dcb7060f38a69e77fdc332fac42',
		'tematica_web' => 'Humor',
	),
	16 => 
	array (
		'id' => '84a9a5b0ee8918907e035c2374b703fa',
		'tematica_web' => 'Infantil',
	),
	17 => 
	array (
		'id' => '38f3848711a9fc6cfef2127b9caac6cf',
		'tematica_web' => 'Juvenil',
	),
	18 => 
	array (
		'id' => '1edf5465159fd98ddd9ad1558b69902f',
		'tematica_web' => 'Misterio y terror',
	),
	19 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Novela erótíca',
	),
	20 => 
	array (
		'id' => '3a294e7c836141a4e774dacf2199c9c8',
		'tematica_web' => 'Novela grafica',
	),
	21 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Novela histórica',
	),
	22 => 
	array (
		'id' => '0764086163fdab7ad5f5222d000cd454',
		'tematica_web' => 'Novela negra',
	),
	23 => 
	array (
		'id' => '88dc5e3b037be51b851a5b98bb7b286c',
		'tematica_web' => 'Novela romántica',
	),
	24 => 
	array (
		'id' => '1953a34cf4ebf1ec2099b492ef9f23a9',
		'tematica_web' => 'Parenting',
	),
	25 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Poesía',
	),
	26 => 
	array (
		'id' => 'b837a95ed6705244f0de2472ac4b45b9',
		'tematica_web' => 'Salud',
	),
	27 => 
	array (
		'id' => '7d318b2ed66ede9140183197bbb96091',
		'tematica_web' => 'sci-fi',
	),
	28 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Teatro',
	),
	29 => 
	array (
		'id' => 'c2a3ce8b8caf7463bcfa204836cdc083',
		'tematica_web' => 'Viajes',
	),
	),
	'CO' => 
	array (
	0 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Autoayuda',
	),
	1 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Biografías',
	),
	2 => 
	array (
		'id' => 'd882917f7e944b67d10169aaed3d250c',
		'tematica_web' => 'Business',
	),
	3 => 
	array (
		'id' => 'efa0da6e8f9562c820c652ca2aeadcb7',
		'tematica_web' => 'Ciencia',
	),
	4 => 
	array (
		'id' => '4efa963b4cf62115a6ea8bebd2866d2b',
		'tematica_web' => 'Clásicos',
	),
	5 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Cocina',
	),
	6 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Cómic y Novela Gráfica',
	),
	7 => 
	array (
		'id' => '1c6034e6dc8c96909fc817eefb3147bd',
		'tematica_web' => 'Crianza',
	),
	8 => 
	array (
		'id' => '4a96413abfe9bec75e7fce4b50a775e1',
		'tematica_web' => 'Deportes',
	),
	9 => 
	array (
		'id' => 'de19abd3df9c4670d7aeb717a909edc8',
		'tematica_web' => 'Ensayo',
	),
	10 => 
	array (
		'id' => '53251ace02b2ee7c86f61735e31000eb',
		'tematica_web' => 'Espiritualidad',
	),
	11 => 
	array (
		'id' => '1fb4352d3c1bafb5ec62569136c1f43e',
		'tematica_web' => 'Fantasía y Ciencia Ficción',
	),
	12 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ficción moderna',
	),
	13 => 
	array (
		'id' => 'f7f19d7338687a8ce70f0fd28ca60b9a',
		'tematica_web' => 'Filosofía',
	),
	14 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Grandes clásicos',
	),
	15 => 
	array (
		'id' => '2ac5c26be9ad3ce45cae6c131bdc91c4',
		'tematica_web' => 'Historia',
	),
	16 => 
	array (
		'id' => '3a026183877a5e4df0dd4fc878da8795',
		'tematica_web' => 'Historia Mundial',
	),
	17 => 
	array (
		'id' => 'bc1b2dcb7060f38a69e77fdc332fac42',
		'tematica_web' => 'Humor',
	),
	18 => 
	array (
		'id' => 'ce80635fd1aaf7c49234cb7d377fb913',
		'tematica_web' => 'Investigación Periodística',
	),
	19 => 
	array (
		'id' => 'e8b7d7741cfc24e52bed068543cc4401',
		'tematica_web' => 'Libros para Chicos',
	),
	20 => 
	array (
		'id' => '12451fc3bcb11f6b9a50f475fc482863',
		'tematica_web' => 'Libros para Jóvenes',
	),
	21 => 
	array (
		'id' => '798251429e0c1be72ab94a855d5f51e2',
		'tematica_web' => 'Literatura Universal',
	),
	22 => 
	array (
		'id' => '1edf5465159fd98ddd9ad1558b69902f',
		'tematica_web' => 'Misterio y terror',
	),
	23 => 
	array (
		'id' => 'fc138a99f992989b9413c9ccaf6b8cbb',
		'tematica_web' => 'Negocios y Management',
	),
	24 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Novela erótíca',
	),
	25 => 
	array (
		'id' => '3a294e7c836141a4e774dacf2199c9c8',
		'tematica_web' => 'Novela grafica',
	),
	26 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Novela histórica',
	),
	27 => 
	array (
		'id' => '0764086163fdab7ad5f5222d000cd454',
		'tematica_web' => 'Novela negra',
	),
	28 => 
	array (
		'id' => 'd7bb0b63e6ded31d873102b79af7555f',
		'tematica_web' => 'Novela Policial',
	),
	29 => 
	array (
		'id' => '88dc5e3b037be51b851a5b98bb7b286c',
		'tematica_web' => 'Novela romántica',
	),
	30 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Poesía',
	),
	31 => 
	array (
		'id' => '0d0c3f507bf63c65659c20a558fcc3c4',
		'tematica_web' => 'Salud y Bienestar',
	),
	32 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Teatro',
	),
	33 => 
	array (
		'id' => 'c2a3ce8b8caf7463bcfa204836cdc083',
		'tematica_web' => 'Viajes',
	),
	),
	'CL' => 
	array (
	0 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Autoayuda',
	),
	1 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Biografías',
	),
	2 => 
	array (
		'id' => 'd882917f7e944b67d10169aaed3d250c',
		'tematica_web' => 'Business',
	),
	3 => 
	array (
		'id' => 'efa0da6e8f9562c820c652ca2aeadcb7',
		'tematica_web' => 'Ciencia',
	),
	4 => 
	array (
		'id' => '4efa963b4cf62115a6ea8bebd2866d2b',
		'tematica_web' => 'Clásicos',
	),
	5 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Cocina',
	),
	6 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Cómic y Novela Gráfica',
	),
	7 => 
	array (
		'id' => '1c6034e6dc8c96909fc817eefb3147bd',
		'tematica_web' => 'Crianza',
	),
	8 => 
	array (
		'id' => '4a96413abfe9bec75e7fce4b50a775e1',
		'tematica_web' => 'Deportes',
	),
	9 => 
	array (
		'id' => 'de19abd3df9c4670d7aeb717a909edc8',
		'tematica_web' => 'Ensayo',
	),
	10 => 
	array (
		'id' => '53251ace02b2ee7c86f61735e31000eb',
		'tematica_web' => 'Espiritualidad',
	),
	11 => 
	array (
		'id' => '1fb4352d3c1bafb5ec62569136c1f43e',
		'tematica_web' => 'Fantasía y Ciencia Ficción',
	),
	12 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ficción moderna',
	),
	13 => 
	array (
		'id' => 'f7f19d7338687a8ce70f0fd28ca60b9a',
		'tematica_web' => 'Filosofía',
	),
	14 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Grandes clásicos',
	),
	15 => 
	array (
		'id' => '2ac5c26be9ad3ce45cae6c131bdc91c4',
		'tematica_web' => 'Historia',
	),
	16 => 
	array (
		'id' => '3a026183877a5e4df0dd4fc878da8795',
		'tematica_web' => 'Historia Mundial',
	),
	17 => 
	array (
		'id' => 'bc1b2dcb7060f38a69e77fdc332fac42',
		'tematica_web' => 'Humor',
	),
	18 => 
	array (
		'id' => 'ce80635fd1aaf7c49234cb7d377fb913',
		'tematica_web' => 'Investigación Periodística',
	),
	19 => 
	array (
		'id' => 'e8b7d7741cfc24e52bed068543cc4401',
		'tematica_web' => 'Libros para Chicos',
	),
	20 => 
	array (
		'id' => '12451fc3bcb11f6b9a50f475fc482863',
		'tematica_web' => 'Libros para Jóvenes',
	),
	21 => 
	array (
		'id' => '798251429e0c1be72ab94a855d5f51e2',
		'tematica_web' => 'Literatura Universal',
	),
	22 => 
	array (
		'id' => '1edf5465159fd98ddd9ad1558b69902f',
		'tematica_web' => 'Misterio y terror',
	),
	23 => 
	array (
		'id' => 'fc138a99f992989b9413c9ccaf6b8cbb',
		'tematica_web' => 'Negocios y Management',
	),
	24 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Novela erótíca',
	),
	25 => 
	array (
		'id' => '3a294e7c836141a4e774dacf2199c9c8',
		'tematica_web' => 'Novela grafica',
	),
	26 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Novela histórica',
	),
	27 => 
	array (
		'id' => '0764086163fdab7ad5f5222d000cd454',
		'tematica_web' => 'Novela negra',
	),
	28 => 
	array (
		'id' => 'd7bb0b63e6ded31d873102b79af7555f',
		'tematica_web' => 'Novela Policial',
	),
	29 => 
	array (
		'id' => '88dc5e3b037be51b851a5b98bb7b286c',
		'tematica_web' => 'Novela romántica',
	),
	30 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Poesía',
	),
	31 => 
	array (
		'id' => '0d0c3f507bf63c65659c20a558fcc3c4',
		'tematica_web' => 'Salud y Bienestar',
	),
	32 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Teatro',
	),
	33 => 
	array (
		'id' => 'c2a3ce8b8caf7463bcfa204836cdc083',
		'tematica_web' => 'Viajes',
	),
	),
	'PE' => 
	array (
	0 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Autoayuda',
	),
	1 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Biografías',
	),
	2 => 
	array (
		'id' => 'd882917f7e944b67d10169aaed3d250c',
		'tematica_web' => 'Business',
	),
	3 => 
	array (
		'id' => 'efa0da6e8f9562c820c652ca2aeadcb7',
		'tematica_web' => 'Ciencia',
	),
	4 => 
	array (
		'id' => '4efa963b4cf62115a6ea8bebd2866d2b',
		'tematica_web' => 'Clásicos',
	),
	5 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Cocina',
	),
	6 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Cómic y Novela Gráfica',
	),
	7 => 
	array (
		'id' => '1c6034e6dc8c96909fc817eefb3147bd',
		'tematica_web' => 'Crianza',
	),
	8 => 
	array (
		'id' => '4a96413abfe9bec75e7fce4b50a775e1',
		'tematica_web' => 'Deportes',
	),
	9 => 
	array (
		'id' => 'de19abd3df9c4670d7aeb717a909edc8',
		'tematica_web' => 'Ensayo',
	),
	10 => 
	array (
		'id' => '53251ace02b2ee7c86f61735e31000eb',
		'tematica_web' => 'Espiritualidad',
	),
	11 => 
	array (
		'id' => '1fb4352d3c1bafb5ec62569136c1f43e',
		'tematica_web' => 'Fantasía y Ciencia Ficción',
	),
	12 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ficción moderna',
	),
	13 => 
	array (
		'id' => 'f7f19d7338687a8ce70f0fd28ca60b9a',
		'tematica_web' => 'Filosofía',
	),
	14 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Grandes clásicos',
	),
	15 => 
	array (
		'id' => '2ac5c26be9ad3ce45cae6c131bdc91c4',
		'tematica_web' => 'Historia',
	),
	16 => 
	array (
		'id' => '3a026183877a5e4df0dd4fc878da8795',
		'tematica_web' => 'Historia Mundial',
	),
	17 => 
	array (
		'id' => 'bc1b2dcb7060f38a69e77fdc332fac42',
		'tematica_web' => 'Humor',
	),
	18 => 
	array (
		'id' => 'ce80635fd1aaf7c49234cb7d377fb913',
		'tematica_web' => 'Investigación Periodística',
	),
	19 => 
	array (
		'id' => 'e8b7d7741cfc24e52bed068543cc4401',
		'tematica_web' => 'Libros para Chicos',
	),
	20 => 
	array (
		'id' => '12451fc3bcb11f6b9a50f475fc482863',
		'tematica_web' => 'Libros para Jóvenes',
	),
	21 => 
	array (
		'id' => '798251429e0c1be72ab94a855d5f51e2',
		'tematica_web' => 'Literatura Universal',
	),
	22 => 
	array (
		'id' => '1edf5465159fd98ddd9ad1558b69902f',
		'tematica_web' => 'Misterio y terror',
	),
	23 => 
	array (
		'id' => 'fc138a99f992989b9413c9ccaf6b8cbb',
		'tematica_web' => 'Negocios y Management',
	),
	24 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Novela erótíca',
	),
	25 => 
	array (
		'id' => '3a294e7c836141a4e774dacf2199c9c8',
		'tematica_web' => 'Novela grafica',
	),
	26 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Novela histórica',
	),
	27 => 
	array (
		'id' => '0764086163fdab7ad5f5222d000cd454',
		'tematica_web' => 'Novela negra',
	),
	28 => 
	array (
		'id' => 'd7bb0b63e6ded31d873102b79af7555f',
		'tematica_web' => 'Novela Policial',
	),
	29 => 
	array (
		'id' => '88dc5e3b037be51b851a5b98bb7b286c',
		'tematica_web' => 'Novela romántica',
	),
	30 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Poesía',
	),
	31 => 
	array (
		'id' => '0d0c3f507bf63c65659c20a558fcc3c4',
		'tematica_web' => 'Salud y Bienestar',
	),
	32 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Teatro',
	),
	33 => 
	array (
		'id' => 'c2a3ce8b8caf7463bcfa204836cdc083',
		'tematica_web' => 'Viajes',
	),
	),
	'UY' => 
	array (
	0 => 
	array (
		'id' => '213a3e709022af3fe18553f0255f0931',
		'tematica_web' => 'Autoayuda',
	),
	1 => 
	array (
		'id' => 'f230c81cc2fc955888321840bddb859e',
		'tematica_web' => 'Biografías',
	),
	2 => 
	array (
		'id' => 'd882917f7e944b67d10169aaed3d250c',
		'tematica_web' => 'Business',
	),
	3 => 
	array (
		'id' => 'efa0da6e8f9562c820c652ca2aeadcb7',
		'tematica_web' => 'Ciencia',
	),
	4 => 
	array (
		'id' => '4efa963b4cf62115a6ea8bebd2866d2b',
		'tematica_web' => 'Clásicos',
	),
	5 => 
	array (
		'id' => '213e97984588fe4208ae22c02f27e40e',
		'tematica_web' => 'Cocina',
	),
	6 => 
	array (
		'id' => '2a929803375856e32cfd1d5c2337935d',
		'tematica_web' => 'Cómic y Novela Gráfica',
	),
	7 => 
	array (
		'id' => '1c6034e6dc8c96909fc817eefb3147bd',
		'tematica_web' => 'Crianza',
	),
	8 => 
	array (
		'id' => '4a96413abfe9bec75e7fce4b50a775e1',
		'tematica_web' => 'Deportes',
	),
	9 => 
	array (
		'id' => 'de19abd3df9c4670d7aeb717a909edc8',
		'tematica_web' => 'Ensayo',
	),
	10 => 
	array (
		'id' => '53251ace02b2ee7c86f61735e31000eb',
		'tematica_web' => 'Espiritualidad',
	),
	11 => 
	array (
		'id' => '1fb4352d3c1bafb5ec62569136c1f43e',
		'tematica_web' => 'Fantasía y Ciencia Ficción',
	),
	12 => 
	array (
		'id' => '9d5a7746add4aba5bfa1819fa0a8d4a6',
		'tematica_web' => 'Ficción moderna',
	),
	13 => 
	array (
		'id' => 'f7f19d7338687a8ce70f0fd28ca60b9a',
		'tematica_web' => 'Filosofía',
	),
	14 => 
	array (
		'id' => '3417e42e947b2cfa929131d0ddf3f979',
		'tematica_web' => 'Grandes clásicos',
	),
	15 => 
	array (
		'id' => '2ac5c26be9ad3ce45cae6c131bdc91c4',
		'tematica_web' => 'Historia',
	),
	16 => 
	array (
		'id' => '3a026183877a5e4df0dd4fc878da8795',
		'tematica_web' => 'Historia Mundial',
	),
	17 => 
	array (
		'id' => 'bc1b2dcb7060f38a69e77fdc332fac42',
		'tematica_web' => 'Humor',
	),
	18 => 
	array (
		'id' => 'ce80635fd1aaf7c49234cb7d377fb913',
		'tematica_web' => 'Investigación Periodística',
	),
	19 => 
	array (
		'id' => 'e8b7d7741cfc24e52bed068543cc4401',
		'tematica_web' => 'Libros para Chicos',
	),
	20 => 
	array (
		'id' => '12451fc3bcb11f6b9a50f475fc482863',
		'tematica_web' => 'Libros para Jóvenes',
	),
	21 => 
	array (
		'id' => '798251429e0c1be72ab94a855d5f51e2',
		'tematica_web' => 'Literatura Universal',
	),
	22 => 
	array (
		'id' => '1edf5465159fd98ddd9ad1558b69902f',
		'tematica_web' => 'Misterio y terror',
	),
	23 => 
	array (
		'id' => 'fc138a99f992989b9413c9ccaf6b8cbb',
		'tematica_web' => 'Negocios y Management',
	),
	24 => 
	array (
		'id' => '62b37297eb2609f84c8b644fa716dabc',
		'tematica_web' => 'Novela erótíca',
	),
	25 => 
	array (
		'id' => '3a294e7c836141a4e774dacf2199c9c8',
		'tematica_web' => 'Novela grafica',
	),
	26 => 
	array (
		'id' => 'e790caf0276a0f9d74950f1f8040f699',
		'tematica_web' => 'Novela histórica',
	),
	27 => 
	array (
		'id' => '0764086163fdab7ad5f5222d000cd454',
		'tematica_web' => 'Novela negra',
	),
	28 => 
	array (
		'id' => 'd7bb0b63e6ded31d873102b79af7555f',
		'tematica_web' => 'Novela Policial',
	),
	29 => 
	array (
		'id' => '88dc5e3b037be51b851a5b98bb7b286c',
		'tematica_web' => 'Novela romántica',
	),
	30 => 
	array (
		'id' => 'a1fae7a0c45111d9f885e0121c927e6c',
		'tematica_web' => 'Poesía',
	),
	31 => 
	array (
		'id' => '0d0c3f507bf63c65659c20a558fcc3c4',
		'tematica_web' => 'Salud y Bienestar',
	),
	32 => 
	array (
		'id' => 'de8ff8ccc39a178b128726b5cee5754c',
		'tematica_web' => 'Teatro',
	),
	33 => 
	array (
		'id' => 'c2a3ce8b8caf7463bcfa204836cdc083',
		'tematica_web' => 'Viajes',
	),
	),
)

?>