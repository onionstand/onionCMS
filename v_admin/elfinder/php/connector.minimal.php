<?php

error_reporting(E_ALL); // Set E_ALL for debuging

// load composer autoload before load elFinder autoload If you need composer
//require './vendor/autoload.php';

// elFinder autoload
require './autoload.php';


//tmb name
/*class elFinderVolumeMyLocalFileSystem extends elFinderVolumeLocalFileSystem
{
    protected function tmbname($stat) {
        return $stat['name'].'.png';
    }
}

$opts = array(
  'bind' => array('upload' => array('smallImage'))
);
*/

// ===============================================

// Enable FTP connector netmount
elFinder::$netDrivers['ftp'] = 'FTP';
// ===============================================


/*
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from '.' (dot)
 *
 * @param  string    $attr    attribute name (read|write|locked|hidden)
 * @param  string    $path    absolute file path
 * @param  string    $data    value of volume option `accessControlData`
 * @param  object    $volume  elFinder volume driver object
 * @param  bool|null $isDir   path is directory (true: directory, false: file, null: unknown)
 * @param  string    $relpath file path relative to volume root directory started with directory separator
 * @return bool|null
 */
function access($attr, $path, $data, $volume, $isDir, $relpath) {
	$basename = basename($path);
	return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
			 && strlen($relpath) !== 1           // but with out volume root
		? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
		:  null;                                 // else elFinder decide it itself
}


// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
$opts = array(

	'bind' => array(
        'mkdir.pre mkfile.pre rename.pre' => array(
            'Plugin.Sanitizer.cmdPreprocess'
        ),
        
        'upload.presave' => array(
            'Plugin.Sanitizer.onUpLoadPreSave',
            'Plugin.MultipleSizeUpload.onUpLoadPreSave'
        )
        
    ),



    'plugin' => array(
		'Sanitizer' => array(
			'enable' => true,
			'targets'  => array('\\','/',':','*','?','"','<','>','|',' ','š','Š','Č','č','Ć','ć','Đ','đ'), // target chars
			'replace'  => '_'    // replace to this
		),
		'MultipleSizeUpload' => array(
			'enable'         => true,
			'maxWidth'       => 300,
			'maxHeight'      => 300,
			'quality'        => 85,
			'preserveExif'   => false,
			'forceEffect'    => false,
			'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP,
			'offDropWith'    => null,
			'smallWidth'       => 300,
			'smallHeight'       => 300
		)
	),

	'debug' => true,
	'roots' => array(
		// Items volume
		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => '../../../uploads/',                 // path to files (REQUIRED)
			'URL'           => 'http://bbcnovi.local/uploads/', // URL to files (REQUIRED)
			'trashHash'     => 't1_Lw',                     // elFinder's hash of trash folder
			'winHashFix'    => DIRECTORY_SEPARATOR !== '/', // to make hash same to Linux one on windows too
			'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                    // disable and hide dot starting files (OPTIONAL)
			'imgLib'		=>'gd',
			'tmbSize'		=> 80,
			'jpgQuality'    => 85,
			'tmbPath'    => 'thumbnails',
			'uploadMaxSize' => '15M',
			'plugin' => array(
 					'Sanitizer' => array(
						'enable' => true,
						'targets'  => array('\\','/',':','*','?','"','<','>','|',' ','š','Š','Č','č','Ć','ć','Đ','đ'), // target chars
						'replace'  => '_'    // replace to this
					),
 					'MultipleSizeUpload' => array(
						'enable'         => true,
						'maxWidth'       => 1024,
						'maxHeight'      => 1024,
						'quality'        => 85,
						'preserveExif'   => false,
						'forceEffect'    => false,
						'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP,
						'offDropWith'    => null,
						'smallWidth'       => 300,
						'smallHeight'       => 300
					)
 				)
		),

		// Trash volume
		array(
			'id'            => '1',
			'driver'        => 'Trash',
			'path'          => '../files/.trash/',
			'tmbURL'        => dirname($_SERVER['PHP_SELF']) . '/../files/.trash/.tmb/',
			'winHashFix'    => DIRECTORY_SEPARATOR !== '/', // to make hash same to Linux one on windows too
			'uploadDeny'    => array('all'),                // Recomend the same settings as the original volume that uses the trash
			'uploadAllow'   => array('image', 'text/plain'),// Same as above
			'uploadOrder'   => array('deny', 'allow'),      // Same as above
			'accessControl' => 'access',                    // Same as above
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

