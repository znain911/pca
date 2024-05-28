<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	
	$config['CUR_D_T']	= gmdate("Y-m-d H:i:s",gmmktime(gmdate("H")+6,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	$config['CUR_D']  = gmdate("Y-m-d",gmmktime(gmdate("H")+6,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	$config['CUR_T']  = gmdate("H:i:s",gmmktime(gmdate("H")+6,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	$config['GM_D_T']  = gmdate("Y-m-d H:i:s",gmmktime(gmdate("H"),gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	$config['GM_D']  = gmdate("Y-m-d H:i:s",gmmktime(gmdate("H"),gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	$config['GM_T']  = gmdate("Y-m-d H:i:s",gmmktime(gmdate("H"),gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	
	$config['DIR_SEP'] = '\\';
	
	/*-- Record Settings --*/	
	$config['per_page'] = 21;
	$config['MAX_SORT_TEXT'] = 200;
	$config['ENDING_SOON_DAYS'] = 7;
	$config['REVIEW_ROW_PER_PAGE'] = 50;
	
	$config['REMOTE_ADDRESS'] = $_SERVER['REMOTE_ADDR'];
	
	$config['CURRENCY_SIMBOLE'] = 'Tk';
	
	
	
	$config['HOMENEWPRODUCTS'] = 4;
	
	
	/*-- Image Settings --*/
	$config['MAX_IMAGE_UPLOAD'] = 4;	
	$config['THUMB1_HEIGHT'] = 93;
	$config['THUMB1_WIDTH'] = 75;
	
	$config['THUMB2_HEIGHT'] = 140;
	$config['THUMB2_WIDTH'] = 200;
	
	/*$config['THUMB2_HEIGHT'] = 120;
	$config['THUMB2_WIDTH'] = 120;*/
	
	$config['THUMB3_HEIGHT'] = 620;
	
	$config['THUMB3_WIDTH'] = 500;
	
	$config['THUMB4_WIDTH'] = 1000;
	
		
	//$config['HOME_CAT_LIST'] = 0-8-257,0-6-52,0-8-68,0-1-30';
	
	
	
	//$config['IMG_COLOR_BRUSHED'] = #f5f5f5';

	
	$config['FB_FILE_PATH'] = 'fb/1facebook.html';
	
	$config['CAMPAIGNID'] = 5;
	
	$config['max_all'] = 1000;
	
	//--------------------------------------------------------------------------//
	//     User Group                                         //
	//--------------------------------------------------------------------------//
	$config['INSPECTOR'] = 3;
	
		
	
	//--------------------------------------------------------------------------//
	//      Category Image Size                                         //
	//--------------------------------------------------------------------------//
	
	$config['CATEGORY_THUMB1_WIDTH'] = 45;	
	$config['CATEGORY_THUMB1_HEIGHT'] = 45;
	$config['CATEGORY_THUMB2_WIDTH'] = 200;	
	$config['CATEGORY_THUMB2_HEIGHT'] = 118;	
	$config['CATEGORY_WIDTH'] = 1000;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//--------------------------------------------------------------------------//
	//      Clients Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['CLIENTS_WIDTH'] = 650;
	
	//--------------------------------------------------------------------------//
	//      Store Image Size                                         //
	//--------------------------------------------------------------------------//	
	$config['ST_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Manufacture Image Size                                         //
	//--------------------------------------------------------------------------//	
	$config['MF_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Product Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PR_THUMB1_WIDTH'] = 59;	
	$config['PR_THUMB1_HEIGHT'] = 42;	
	$config['PR_THUMB2_WIDTH'] = 450;	
	$config['PR_THUMB2_HEIGHT'] = 314;
	$config['PR_THUMB3_WIDTH'] = 500;	
	$config['PR_THUMB3_HEIGHT'] = 620;	
	$config['PR_THUMB4_WIDTH'] = 500;
	
	//--------------------------------------------------------------------------//
	//      Admin User Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['AU_THUMB1_WIDTH'] = 128;	
	$config['AU_THUMB1_HEIGHT'] = 128;	
	$config['AU_THUMB2_WIDTH'] = 450;	
	$config['AU_THUMB2_HEIGHT'] = 314;	
	$config['AU_THUMB4_WIDTH'] = 450;
	
	//--------------------------------------------------------------------------//
	//      Blog Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['BL_THUMB1_WIDTH'] = 59;	
	$config['BL_THUMB1_HEIGHT'] = 42;	
	$config['BL_THUMB2_WIDTH'] = 200;	
	$config['BL_THUMB2_HEIGHT'] = 118;	
	$config['BL_THUMB4_WIDTH'] = 1000;
	
	//--------------------------------------------------------------------------//
	//      News Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['N_THUMB1_WIDTH'] = 128;	
	$config['N_THUMB1_HEIGHT'] =128;	
	$config['N_THUMB2_WIDTH'] = 450;	
	$config['N_THUMB2_HEIGHT'] = 314;	
	$config['N_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Page Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PAGE_THUMB1_WIDTH'] = 128;	
	$config['PAGE_THUMB1_HEIGHT'] = 128;	
	$config['PAGE_THUMB2_WIDTH'] = 450;	
	$config['PAGE_THUMB2_HEIGHT'] = 314;	
	$config['PAGE_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Post Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PL_THUMB1_WIDTH'] = 60;	
	$config['PL_THUMB1_HEIGHT'] = 60;
	
	$config['PL_THUMB2_WIDTH'] = 541;	
	$config['PL_THUMB2_HEIGHT'] = 311;
	
	$config['PL_THUMB4_WIDTH'] = 970;
	
	//--------------------------------------------------------------------------//
	//      Gallery Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['GL_THUMB1_WIDTH'] = 248;	
	$config['GL_THUMB1_HEIGHT'] = 165;
	
	$config['GL_THUMB2_WIDTH'] = 541;	
	$config['GL_THUMB2_HEIGHT'] = 311;
	
	//--------------------------------------------------------------------------//
	//      Stuff Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['ST_THUMB1_WIDTH'] = 450;	
	$config['ST_THUMB1_HEIGHT'] = 314;
	
	
	
	//--------------------------------------------------------------------------//
	//      Service Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['SR_THUMB1_WIDTH'] = 128;	
	$config['SR_THUMB1_HEIGHT'] = 128;	
	$config['SR_THUMB2_WIDTH'] = 450;	
	$config['SR_THUMB2_HEIGHT'] = 314;	
	$config['SR_THUMB4_WIDTH'] = 900;
	
	
	
	//--------------------------------------------------------------------------//
	//      Testimonial Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['TESTIMONIAL_THUMB1_WIDTH'] = 80;	
	$config['TESTIMONIAL_THUMB1_HEIGHT'] = 80;	
	$config['TESTIMONIAL_THUMB2_WIDTH'] = 450;	
	$config['TESTIMONIAL_THUMB2_HEIGHT'] = 314;	
	$config['TESTIMONIAL_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Faq Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['FAQ_THUMB1_WIDTH'] = 128;	
	$config['FAQ_THUMB1_HEIGHT'] = 128;	
	$config['FAQ_THUMB2_WIDTH'] = 450;	
	$config['FAQ_THUMB2_HEIGHT'] = 314;	
	$config['FAQ_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Events Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['EVENTS_THUMB1_WIDTH'] = 128;	
	$config['EVENTS_THUMB1_HEIGHT'] = 128;	
	$config['EVENTS_THUMB2_WIDTH'] = 450;	
	$config['EVENTS_THUMB2_HEIGHT'] = 314;	
	$config['EVENTS_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Section Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['SECTION_THUMB1_WIDTH'] = 128;	
	$config['SECTION_THUMB1_HEIGHT'] = 128;	
	$config['SECTION_THUMB2_WIDTH'] = 450;	
	$config['SECTION_THUMB2_HEIGHT'] = 314;	
	$config['SECTION_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Movie Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['MOVIE_THUMB1_WIDTH'] = 128;	
	$config['MOVIE_THUMB1_HEIGHT'] = 128;	
	$config['MOVIE_THUMB2_WIDTH'] = 450;	
	$config['MOVIE_THUMB2_HEIGHT'] = 314;	
	$config['MOVIE_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Gallery Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['GALLERY_THUMB1_WIDTH'] = 128;	
	$config['GALLERY_THUMB1_HEIGHT'] = 128;	
	$config['GALLERY_THUMB2_WIDTH'] = 450;	
	$config['GALLERY_THUMB2_HEIGHT'] = 314;	
	$config['GALLERY_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Portfolio Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PORTFOLIO_THUMB1_WIDTH'] = 128;	
	$config['PORTFOLIO_THUMB1_HEIGHT'] = 128;	
	$config['PORTFOLIO_THUMB2_WIDTH'] = 450;	
	$config['PORTFOLIO_THUMB2_HEIGHT'] = 314;	
	$config['PORTFOLIO_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Activity Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['ACTIVITY_THUMB1_WIDTH'] = 128;	
	$config['ACTIVITY_THUMB1_HEIGHT'] = 128;	
	$config['ACTIVITY_THUMB2_WIDTH'] = 450;	
	$config['ACTIVITY_THUMB2_HEIGHT'] = 314;	
	$config['ACTIVITY_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Narsproject Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['NARSPROJECT_THUMB1_WIDTH'] = 128;	
	$config['NARSPROJECT_THUMB1_HEIGHT'] = 128;	
	$config['NARSPROJECT_THUMB2_WIDTH'] = 450;	
	$config['NARSPROJECT_THUMB2_HEIGHT'] = 314;	
	$config['NARSPROJECT_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Universityproject Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['UNIVERSITYPROJECT_THUMB1_WIDTH'] = 128;	
	$config['UNIVERSITYPROJECT_THUMB1_HEIGHT'] = 128;	
	$config['UNIVERSITYPROJECT_THUMB2_WIDTH'] = 450;	
	$config['UNIVERSITYPROJECT_THUMB2_HEIGHT'] = 314;	
	$config['UNIVERSITYPROJECT_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Extensionservices Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['EXTENSIONSERVICES_THUMB1_WIDTH'] = 128;	
	$config['EXTENSIONSERVICES_THUMB1_HEIGHT'] = 128;	
	$config['EXTENSIONSERVICES_THUMB2_WIDTH'] = 450;	
	$config['EXTENSIONSERVICES_THUMB2_HEIGHT'] = 314;	
	$config['EXTENSIONSERVICES_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Ngoproject Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['NGOPROJECT_THUMB1_WIDTH'] = 128;	
	$config['NGOPROJECT_THUMB1_HEIGHT'] = 128;	
	$config['NGOPROJECT_THUMB2_WIDTH'] = 450;	
	$config['NGOPROJECT_THUMB2_HEIGHT'] = 314;	
	$config['NGOPROJECT_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Projects Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PROJECTS_THUMB1_WIDTH'] = 128;	
	$config['PROJECTS_THUMB1_HEIGHT'] = 128;	
	$config['PROJECTS_THUMB2_WIDTH'] = 450;	
	$config['PROJECTS_THUMB2_HEIGHT'] = 314;	
	$config['PROJECTS_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Ppts Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PPTS_THUMB1_WIDTH'] = 128;	
	$config['PPTS_THUMB1_HEIGHT'] = 128;	
	$config['PPTS_THUMB2_WIDTH'] = 450;	
	$config['PPTS_THUMB2_HEIGHT'] = 314;	
	$config['PPTS_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Project_reports Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PROJECT_REPORTS_THUMB1_WIDTH'] = 128;	
	$config['PROJECT_REPORTS_THUMB1_HEIGHT'] = 128;	
	$config['PROJECT_REPORTS_THUMB2_WIDTH'] = 450;	
	$config['PROJECT_REPORTS_THUMB2_HEIGHT'] = 314;	
	$config['PROJECT_REPORTS_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Annual_reports Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['ANNUAL_REPORTS_THUMB1_WIDTH'] = 128;	
	$config['ANNUAL_REPORTS_THUMB1_HEIGHT'] = 128;	
	$config['ANNUAL_REPORTS_THUMB2_WIDTH'] = 450;	
	$config['ANNUAL_REPORTS_THUMB2_HEIGHT'] = 314;	
	$config['ANNUAL_REPORTS_THUMB4_WIDTH'] = 900;
	
	//--------------------------------------------------------------------------//
	//      Proceeding Image Size                                         //
	//--------------------------------------------------------------------------//
	$config['PROCEEDING_THUMB1_WIDTH'] = 128;	
	$config['PROCEEDING_THUMB1_HEIGHT'] = 128;	
	$config['PROCEEDING_THUMB2_WIDTH'] = 450;	
	$config['PROCEEDING_THUMB2_HEIGHT'] = 314;	
	$config['PROCEEDING_THUMB4_WIDTH'] = 900;
	
	
	
	
	//--------------------------------------------------------------------------//
	//      Share Configuration                                           //
	//--------------------------------------------------------------------------//
	
	$config['APPID']  = '281630638621132';
	$config['APPSECRETE']  = '06116cca55bc29350f2d0cfcd7699956';
	$config['FBID']  = '100000014956788';