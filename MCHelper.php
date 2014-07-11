<?php
 
// Take credit for your work.
$wgExtensionCredits['parserhook'][] = array(
 
   // The full path and filename of the file. This allows MediaWiki
   // to display the Subversion revision number on Special:Version.
   'path' => __FILE__,
 
   // The name of the extension, which will appear on Special:Version.
   'name' => 'MCHelper',
 
   // A description of the extension, which will appear on Special:Version.
   'description' => 'A extension to facilitate wiki for minecraft mod',
 
   // The version of the extension, which will appear on Special:Version.
   // This can be a number or a string.
   'version' => '0.1', 
 
   // Your name, which will appear on Special:Version.
   'author' => 'Acaly',
 
   // The URL to a wiki page/web page with information about the extension,
   // which will appear on Special:Version.
   'url' => '',

);
 
// Specify the function that will initialize the parser function.
$wgHooks['ParserFirstCallInit'][] = 'MCHelperSetupParserFunction';
$wgHooks['LanguageGetMagic'][] = 'MCHelperSetupParserFunction_Magic';
 
// Allow translation of the parser function name
// $wgExtensionMessagesFiles['MCHelper'] = __DIR__ . '/MCHelper.i18n.php';
 
function MCHelperSetupParserFunction_Magic(&$magicWords, $langCode) {
   $magicWords['crafting'] = array( 0, 'crafting' );
   return true;
}
// Tell MediaWiki that the parser function exists.
function MCHelperSetupParserFunction( &$parser ) {
 
   // Create a function hook associating the "crafting" magic word with the
   // MCHelperRenderParserFunction() function.
   $parser->setFunctionHook( 'crafting', 'MCHelperRenderParserFunction' );
 
   // Return true so that MediaWiki continues to load extensions.
   return true;
}
 
// Render the output of the parser function.
function MCHelperRenderParserFunction( $parser ) {
 
   // The input parameters are wikitext with templates expanded.
   // The output should be wikitext too.
   $output = "This is just a test.";
 
   return array( $output, 'noparse' => false );
}
