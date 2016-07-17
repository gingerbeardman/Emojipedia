<?php
$excludes = array("of", "with", "and", "a", "for", "the", "or");

$out[] = '<?xml version="1.0" encoding="UTF-16"?>';
$out[] = '<d:dictionary xmlns="http://www.w3.org/1999/xhtml" xmlns:d="http://www.apple.com/DTDs/DictionaryService-1.0.rng">';

$contents = file_get_contents("emoji.txt");
$all_emoji = explode("\n", $contents);

foreach ($all_emoji as $single) {
  // №	Code	Browser	Sample	Name	Keywords
  list($n, $unicode, $emoji, $img, $title, $aliases) = explode("\t", $single);

  $emoji = trim($emoji);
  $id = str_replace('U+','', $unicode);
  
  if (strpos($title, '≊') !== false) $title = str_replace('≊ ', '(', $title) . ')';

  $words_title = explode(' ', str_replace(array('-','(',')'), array(' ','',''), strtolower($title)));
  $words_alias = explode(', ', $aliases);
  if ($aliases == '') {
    $words_alias = $previous_aliases;
  } else {
    $previous_aliases = $words_alias;
  }

  $keywords = array_unique(array_merge($words_title, $words_alias));
  sort($keywords);
  $keywords = array_diff($keywords, $excludes);

  $title = strtotitle($title);

  $out[] = "<d:entry id=\"$id\" d:title=\"$title\">";
  $out[] = "  <d:index d:value=\"$emoji\"/>";
  $out[] = "  <d:index d:value=\"$title\" d:title=\"$emoji\"/>";
  foreach ($keywords as $word) {
    $out[] = "  <d:index d:value=\"$word\" d:title=\"$emoji\"/>";
  }
  $out[] = "  <h1>$emoji</h1>";
  $out[] = "  <h2>$title</h2>";
  // $out[] = "  <p>$unicode</p>";
  $out[] = "  <ul class=\"tags\">";
  foreach ($words_alias as $tag) {
    $out[] = "  <li>$tag</li>";
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
$out[] = '  <h1>Version 2016-07-17</h1>';
$out[] = '  <h2></h2>';
$out[] = '  <p>';
$out[] = '    <a href="https://github.com/gingerbeardman/Emojipedia/releases/latest/">Download latest version of this dictionary</a>';
$out[] = '  </p>';
$out[] = '</d:entry>';
$out[] = '</d:dictionary>';

$xml = implode("\n", $out);

print($xml);

file_put_contents("Emoji.xml", $xml);

function strtotitle($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("DVD", "of", "with", "without", "behind", "and", "a", "for", "the", "or" )) {
  /*
  * Exceptions in lower case are words you don't want converted
  * Exceptions all in upper case are any words you don't want converted to title case
  *   but should be converted to upper case, e.g.:
  *   king henry viii or king henry Viii should be King Henry VIII
  */
  $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");

  foreach ($delimiters as $dlnr => $delimiter) {
    $words = explode($delimiter, $string);
    $newwords = array();
    foreach ($words as $wordnr => $word){
      if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)){
        // check exceptions list for any words that should be in upper case
        $word = mb_strtoupper($word, "UTF-8");
      }
      elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)){
        // check exceptions list for any words that should be in upper case
        $word = mb_strtolower($word, "UTF-8");
      }
      elseif (!in_array($word, $exceptions) ){
        // convert to uppercase (non-utf8 only)
        $word = ucfirst($word);
      }
      array_push($newwords, $word);
    }
    $string = join($delimiter, $newwords);
  } //foreach
  return $string;
} 

?>
