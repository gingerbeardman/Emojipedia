<?php
$excludes = array("of", "with", "and", "a", "for", "the", "or");

$out[] = '<?xml version="1.0" encoding="utf-8"?>';
$out[] = '<d:dictionary xmlns="http://www.w3.org/1999/xhtml" xmlns:d="http://www.apple.com/DTDs/DictionaryService-1.0.rng">';

// http://unicode.org/emoji/charts/emoji-list.html
$contents = file_get_contents_utf8("emoji.txt");
$all_emoji = explode("\n", trim($contents));

foreach ($all_emoji as $single) {
	// №	Code	Sample	CLDR Short Name	Other Keywords
	// 2255	U+1F530	🔰	Japanese symbol for beginner	Japanese | beginner | chevron | green | leaf | tool | yellow
  list($n, $unicode, $emoji, $title, $aliases) = explode("\t", $single);

  $emoji = trim($emoji);
  $id = str_replace(array('U+',' '),array('',''), $unicode);

  $title = str_replace(array('“','”','’'), array('\'','\'','\''), $title);
  $title = sentence_case($title);

  $titleclean = iconv('UTF-8','ASCII//TRANSLIT',$title);;

  $words_title = explode(' ', str_replace(array(' - ','-',' & ','(',')'), array(' ',' ',' ','',''), strtolower($titleclean)));
  $words_alias = explode(' | ', str_replace(array('“','”'),'',$aliases));
  if ($aliases == '') {
    $words_alias = $previous_aliases;
  } else {
    $previous_aliases = $words_alias;
  }

  $keywords = array_unique(array_merge($words_title, $words_alias));
  sort($keywords);
  $keywords = array_diff($keywords, $excludes);

  echo "$n:$id:$title:$titleclean\n";

  $title = htmlspecialchars($title, ENT_XML1);
  $titleclean = htmlspecialchars($titleclean, ENT_XML1);

  // if ($n == 2379) break; // debug

  $out[] = "<d:entry id=\"$id\" d:title=\"$titleclean\">";
  $out[] = "  <d:index d:value=\"$emoji\"/>";
  $out[] = "  <d:index d:value=\"$title\" d:title=\"$emoji\"/>";
  foreach ($keywords as $word) {
    $out[] = "  <d:index d:value=\"" . htmlspecialchars($word, ENT_XML1) . "\" d:title=\"$emoji\"/>";
  }
  $out[] = "  <h1>$emoji</h1>";
  $out[] = "  <h2>$title</h2>";
  // $out[] = "  <p>$unicode</p>";
  $out[] = "  <ul class=\"tags\">";
  foreach ($words_alias as $tag) {
    $out[] = "  <li>" . htmlspecialchars($tag, ENT_XML1) . "</li>";
  }
  $out[] = "  </ul>";
  $out[] = "  <p><a href=\"http://📙.la/$emoji/\">More at Emojipedia</a></p>";
  $out[] = "</d:entry>";

// <div>
//     <p>
//         Long description.
//     </p>
//     <ul class="unicode">
//         <li>
//             The <em>$title</em> emoji was approved as part of Unicode N.N in YYYY.
//         </li>
//     </ul>
// </div>


};  //all_emoji

$out[] = '<d:entry id="version" d:title="Version">';
$out[] = '  <d:index d:value="download" d:title="version"/>';
$out[] = '  <d:index d:value="new" d:title="version"/>';
$out[] = '  <d:index d:value="update" d:title="version"/>';
$out[] = '  <d:index d:value="version" d:title="version"/>';
$out[] = '  <h1>Version 2017-04-24</h1>';
$out[] = '  <h2></h2>';
$out[] = '  <p>';
$out[] = '    <a href="https://github.com/gingerbeardman/Emojipedia/releases/latest/">Download latest version of this dictionary</a>';
$out[] = '  </p>';
$out[] = '</d:entry>';
$out[] = '</d:dictionary>';

$xml = implode("\n", $out);

// print($xml);

file_put_contents("../Emoji.xml", "\xEF\xBB\xBF".  $xml);

function file_get_contents_utf8($fn) {
 $content = file_get_contents($fn);
 return mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

function sentence_case($str){
    $words = explode(' ', $str);
    foreach($words as &$word) {
        if($word == strtoupper($word)){
            continue;
        }

        if(substr($word, 0, 1) == "'") {
          //special case words starting with single quote
          $word = "'". mb_convert_case(substr($word, 1), MB_CASE_TITLE, "UTF-8");
        } else {
          $word = mb_convert_case($word, MB_CASE_TITLE, "UTF-8");
        }
    }
    return implode(' ', $words);
}

function ucsmart($text) {
   return preg_replace('/([^a-z\']|^)([a-z])/e', '"$1".strtoupper("$2")', strtolower($text));
}

?>
