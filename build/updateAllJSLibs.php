<?php
define('ZIP', 1111101);
define('FILES', 101010);
define('GET', 121010);

$basepath = __DIR__ . '/../system/load/';
$js = array(
	'codemirror' => array(
		ZIP => 'https://codemirror.net/codemirror.zip',
		FILES => array(
			'clike.js' => '*/mode/clike/clike.js',
			'codemirror.css' => '*/lib/codemirror.css',
			'codemirror.js' => '*/lib/codemirror.js',
			'css.js' => '*/mode/css/css.js',
			'gfm.js' => '*/mode/gfm/gfm.js',
			'htmlmixed.js' => '*/mode/htmlmixed/htmlmixed.js',
			'javascript.js' => '*/mode/javascript/javascript.js',
			'markdown.js' => '*/mode/markdown/markdown.js',
			'meta.js' => '*/mode/meta.js',
			'overlay.js' => '*/addon/mode/overlay.js',
			'xml.js' => '*/mode/xml/xml.js',
		)
	),
	'js-libs' => array(
		GET => array(
			'sjcl.min.js' => 'https://cdn.jsdelivr.net/npm/sjcl/sjcl.js',
			'jquery.min.js' => 'https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js',
			// check version !!
			'jquery-ui.min.js' => 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',
			// check version !!
			'jquery-ui.min.css' => 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css',
		)
	),
	'katex' => array(
		// check version !!
		ZIP => 'https://github.com/KaTeX/KaTeX/releases/download/v0.12.0/katex.zip',
		FILES => array(
			'katex.min.js' => 'katex/katex.min.js',
			'katex.min.css' => 'katex/katex.min.css',
			'fonts/KaTeX_AMS-Regular.ttf' => 'katex/fonts/KaTeX_AMS-Regular.ttf',
			'fonts/KaTeX_AMS-Regular.woff' => 'katex/fonts/KaTeX_AMS-Regular.woff',
			'fonts/KaTeX_AMS-Regular.woff2' => 'katex/fonts/KaTeX_AMS-Regular.woff2',
			'fonts/KaTeX_Caligraphic-Bold.ttf' => 'katex/fonts/KaTeX_Caligraphic-Bold.ttf',
			'fonts/KaTeX_Caligraphic-Bold.woff' => 'katex/fonts/KaTeX_Caligraphic-Bold.woff',
			'fonts/KaTeX_Caligraphic-Bold.woff2' => 'katex/fonts/KaTeX_Caligraphic-Bold.woff2',
			'fonts/KaTeX_Caligraphic-Regular.ttf' => 'katex/fonts/KaTeX_Caligraphic-Regular.ttf',
			'fonts/KaTeX_Caligraphic-Regular.woff' => 'katex/fonts/KaTeX_Caligraphic-Regular.woff',
			'fonts/KaTeX_Caligraphic-Regular.woff2' => 'katex/fonts/KaTeX_Caligraphic-Regular.woff2',
			'fonts/KaTeX_Fraktur-Bold.ttf' => 'katex/fonts/KaTeX_Fraktur-Bold.ttf',
			'fonts/KaTeX_Fraktur-Bold.woff' => 'katex/fonts/KaTeX_Fraktur-Bold.woff',
			'fonts/KaTeX_Fraktur-Bold.woff2' => 'katex/fonts/KaTeX_Fraktur-Bold.woff2',
			'fonts/KaTeX_Fraktur-Regular.ttf' => 'katex/fonts/KaTeX_Fraktur-Regular.ttf',
			'fonts/KaTeX_Fraktur-Regular.woff' => 'katex/fonts/KaTeX_Fraktur-Regular.woff',
			'fonts/KaTeX_Fraktur-Regular.woff2' => 'katex/fonts/KaTeX_Fraktur-Regular.woff2',
			'fonts/KaTeX_Main-Bold.ttf' => 'katex/fonts/KaTeX_Main-Bold.ttf',
			'fonts/KaTeX_Main-Bold.woff' => 'katex/fonts/KaTeX_Main-Bold.woff',
			'fonts/KaTeX_Main-Bold.woff2' => 'katex/fonts/KaTeX_Main-Bold.woff2',
			'fonts/KaTeX_Main-BoldItalic.ttf' => 'katex/fonts/KaTeX_Main-BoldItalic.ttf',
			'fonts/KaTeX_Main-BoldItalic.woff' => 'katex/fonts/KaTeX_Main-BoldItalic.woff',
			'fonts/KaTeX_Main-BoldItalic.woff2' => 'katex/fonts/KaTeX_Main-BoldItalic.woff2',
			'fonts/KaTeX_Main-Italic.ttf' => 'katex/fonts/KaTeX_Main-Italic.ttf',
			'fonts/KaTeX_Main-Italic.woff' => 'katex/fonts/KaTeX_Main-Italic.woff',
			'fonts/KaTeX_Main-Italic.woff2' => 'katex/fonts/KaTeX_Main-Italic.woff2',
			'fonts/KaTeX_Main-Regular.ttf' => 'katex/fonts/KaTeX_Main-Regular.ttf',
			'fonts/KaTeX_Main-Regular.woff' => 'katex/fonts/KaTeX_Main-Regular.woff',
			'fonts/KaTeX_Main-Regular.woff2' => 'katex/fonts/KaTeX_Main-Regular.woff2',
			'fonts/KaTeX_Math-BoldItalic.ttf' => 'katex/fonts/KaTeX_Math-BoldItalic.ttf',
			'fonts/KaTeX_Math-BoldItalic.woff' => 'katex/fonts/KaTeX_Math-BoldItalic.woff',
			'fonts/KaTeX_Math-BoldItalic.woff2' => 'katex/fonts/KaTeX_Math-BoldItalic.woff2',
			'fonts/KaTeX_Math-Italic.ttf' => 'katex/fonts/KaTeX_Math-Italic.ttf',
			'fonts/KaTeX_Math-Italic.woff' => 'katex/fonts/KaTeX_Math-Italic.woff',
			'fonts/KaTeX_Math-Italic.woff2' => 'katex/fonts/KaTeX_Math-Italic.woff2',
			'fonts/KaTeX_SansSerif-Bold.ttf' => 'katex/fonts/KaTeX_SansSerif-Bold.ttf',
			'fonts/KaTeX_SansSerif-Bold.woff' => 'katex/fonts/KaTeX_SansSerif-Bold.woff',
			'fonts/KaTeX_SansSerif-Bold.woff2' => 'katex/fonts/KaTeX_SansSerif-Bold.woff2',
			'fonts/KaTeX_SansSerif-Italic.ttf' => 'katex/fonts/KaTeX_SansSerif-Italic.ttf',
			'fonts/KaTeX_SansSerif-Italic.woff' => 'katex/fonts/KaTeX_SansSerif-Italic.woff',
			'fonts/KaTeX_SansSerif-Italic.woff2' => 'katex/fonts/KaTeX_SansSerif-Italic.woff2',
			'fonts/KaTeX_SansSerif-Regular.ttf' => 'katex/fonts/KaTeX_SansSerif-Regular.ttf',
			'fonts/KaTeX_SansSerif-Regular.woff' => 'katex/fonts/KaTeX_SansSerif-Regular.woff',
			'fonts/KaTeX_SansSerif-Regular.woff2' => 'katex/fonts/KaTeX_SansSerif-Regular.woff2',
			'fonts/KaTeX_Script-Regular.ttf' => 'katex/fonts/KaTeX_Script-Regular.ttf',
			'fonts/KaTeX_Script-Regular.woff' => 'katex/fonts/KaTeX_Script-Regular.woff',
			'fonts/KaTeX_Script-Regular.woff2' => 'katex/fonts/KaTeX_Script-Regular.woff2',
			'fonts/KaTeX_Size1-Regular.ttf' => 'katex/fonts/KaTeX_Size1-Regular.ttf',
			'fonts/KaTeX_Size1-Regular.woff' => 'katex/fonts/KaTeX_Size1-Regular.woff',
			'fonts/KaTeX_Size1-Regular.woff2' => 'katex/fonts/KaTeX_Size1-Regular.woff2',
			'fonts/KaTeX_Size2-Regular.ttf' => 'katex/fonts/KaTeX_Size2-Regular.ttf',
			'fonts/KaTeX_Size2-Regular.woff' => 'katex/fonts/KaTeX_Size2-Regular.woff',
			'fonts/KaTeX_Size2-Regular.woff2' => 'katex/fonts/KaTeX_Size2-Regular.woff2',
			'fonts/KaTeX_Size3-Regular.ttf' => 'katex/fonts/KaTeX_Size3-Regular.ttf',
			'fonts/KaTeX_Size3-Regular.woff' => 'katex/fonts/KaTeX_Size3-Regular.woff',
			'fonts/KaTeX_Size3-Regular.woff2' => 'katex/fonts/KaTeX_Size3-Regular.woff2',
			'fonts/KaTeX_Size4-Regular.ttf' => 'katex/fonts/KaTeX_Size4-Regular.ttf',
			'fonts/KaTeX_Size4-Regular.woff' => 'katex/fonts/KaTeX_Size4-Regular.woff',
			'fonts/KaTeX_Size4-Regular.woff2' => 'katex/fonts/KaTeX_Size4-Regular.woff2',
			'fonts/KaTeX_Typewriter-Regular.ttf' => 'katex/fonts/KaTeX_Typewriter-Regular.ttf',
			'fonts/KaTeX_Typewriter-Regular.woff' => 'katex/fonts/KaTeX_Typewriter-Regular.woff',
			'fonts/KaTeX_Typewriter-Regular.woff2' => 'katex/fonts/KaTeX_Typewriter-Regular.woff2',
		)
	),
	'prism' => array(
		// only manual from https://prismjs.com/download.html?#themes=prism&languages=markup+css+clike+javascript+c+csharp+bash+cpp+ruby+markup-templating+git+ini+java+php+json+markdown+lua+matlab+objectivec+perl+sql+python+r+swift 
	),
	'' => array(
		GET => array(
			'marked.min.js' => 'https://cdn.jsdelivr.net/npm/marked/marked.min.js'
		)
	)
);

foreach($js as $folder => $data){
	doFolder($basepath . $folder . '/', $data);
}

function doFolder($path, $data){
	if( isset($data[ZIP]) && isset($data[FILES]) ){
		$zipname = $path . '___tmp___.zip';
		downloadFileTo($data[ZIP], $zipname);

		$zip = new ZipArchive();
		if( $zip->open($zipname, ZipArchive::RDONLY) === true ){
			$filelist = array();
			for( $i = 0; $i < $zip->numFiles; $i++) {
				$name = $zip->statIndex($i)['name'];

				foreach( $data[FILES] as $file => $glob ){
					if(fnmatch($glob, $name)){
						if( !copy("zip://".$zipname."#".$name, $path . $file) ){
							echo "=> Error extract file from ZIP '$name'" . PHP_EOL;
						}
					}
				}
			}
			$zip->close();
		}
		else{
			echo "=> Error opening ZIP '" . $data[ZIP] . "'" . PHP_EOL;
		}
		unlink($zipname);
	}
	if( isset($data[GET]) ){
		foreach($data[GET] as $file => $link ){
			downloadFileTo($link, $path . $file);
		}
	}

}

function downloadFileTo($link, $path){
	$cont = file_get_contents($link);
	if( !empty($cont)){
		if( file_put_contents($path, $cont) === false ){
			echo "=> Write file error '$path'" . PHP_EOL;
		}
	}
	else{
		echo "=> Download error '$link'" . PHP_EOL;
	}
}
?>