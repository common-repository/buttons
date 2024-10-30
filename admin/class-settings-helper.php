<?php

namespace WPButtons;

defined( 'ABSPATH' ) || exit;

class Helper {

	public static function item_type(): array {
		return [
			'link'          => __( 'Link', 'buttons' ),
			'button'        => __( 'Button', 'buttons' ),
			'share'         => __( 'Share', 'buttons' ),
			'print'         => __( 'Print', 'buttons' ),
			'login'         => __( 'Login', 'buttons' ),
			'logout'        => __( 'Logout', 'buttons' ),
			'lostpassword'  => __( 'Lostpassword', 'buttons' ),
			'register'      => __( 'Register', 'buttons' ),
		];
	}

	public static function menu_type() {
		return [
			'link'          => __( 'Link', 'buttons' ),
			'share'         => __( 'Share', 'buttons' ),
			'translate'     => __( 'Translate', 'buttons' ),
			'next_post'     => __( 'Next Post', 'buttons' ),
			'previous_post' => __( 'Previous Post', 'buttons' ),
			'print'         => __( 'Print', 'buttons' ),
			'toTop'         => __( 'Scroll to Top', 'buttons' ),
			'toBottom'      => __( 'Scroll to Bottom', 'buttons' ),
			'back'          => __( 'Go Back', 'buttons' ),
			'forward'       => __( 'Go Forward', 'buttons' ),
			'scroll'        => __( 'Smooth Scroll', 'buttons' ),
			'login'         => __( 'Login', 'buttons' ),
			'logout'        => __( 'Logout', 'buttons' ),
			'lostpassword'  => __( 'Lostpassword', 'buttons' ),
			'register'      => __( 'Register', 'buttons' ),
		];
	}

	public static function share_services(): array {
		return [
			'facebook'    => __( 'Facebook', 'buttons' ),
			'twitter'     => __( 'X (Twitter)', 'buttons' ),
			'pinterest'   => __( 'Pinterest', 'buttons' ),
			'linkedin'    => __( 'Linkedin', 'buttons' ),
			'stumbleupon' => __( 'StumbleUpon', 'buttons' ),
			'reddit'      => __( 'Reddit', 'buttons' ),
			'buffer'      => __( 'Buffer', 'buttons' ),
			'whatsapp'    => __( 'Whatsapp', 'buttons' ),
			'email'       => __( 'Email', 'buttons' ),
		];
	}

	public static function gtranslate(): array {
		return [
			'af'  => __( 'Afrikaans', 'buttons' ),
			'sq'  => __( 'Albanian', 'buttons' ),
			'am'  => __( 'Amharic', 'buttons' ),
			'ar'  => __( 'Arabic', 'buttons' ),
			'hy'  => __( 'Armenian', 'buttons' ),
			'az'  => __( 'Azerbaijani', 'buttons' ),
			'eu'  => __( 'Basque', 'buttons' ),
			'be'  => __( 'Belarusian', 'buttons' ),
			'bn'  => __( 'Bengali', 'buttons' ),
			'bs'  => __( 'Bosnian', 'buttons' ),
			'bg'  => __( 'Bulgarian', 'buttons' ),
			'ca'  => __( 'Catalan', 'buttons' ),
			'ceb' => __( 'Cebuano', 'buttons' ),
			'ny'  => __( 'Chichewa', 'buttons' ),
			'co'  => __( 'Corsican', 'buttons' ),
			'hr'  => __( 'Croatian', 'buttons' ),
			'cs'  => __( 'Czech', 'buttons' ),
			'da'  => __( 'Danish', 'buttons' ),
			'nl'  => __( 'Dutch', 'buttons' ),
			'en'  => __( 'English', 'buttons' ),
			'eo'  => __( 'Esperanto', 'buttons' ),
			'et'  => __( 'Estonian', 'buttons' ),
			'tl'  => __( 'Filipino', 'buttons' ),
			'fi'  => __( 'Finnish', 'buttons' ),
			'fr'  => __( 'French', 'buttons' ),
			'fy'  => __( 'Frisian', 'buttons' ),
			'gl'  => __( 'Galician', 'buttons' ),
			'ka'  => __( 'Georgian', 'buttons' ),
			'de'  => __( 'German', 'buttons' ),
			'el'  => __( 'Greek', 'buttons' ),
			'gu'  => __( 'Gujarati', 'buttons' ),
			'ht'  => __( 'Haitian Creole', 'buttons' ),
			'ha'  => __( 'Hausa', 'buttons' ),
			'haw' => __( 'Hawaiian', 'buttons' ),
			'iw'  => __( 'Hebrew', 'buttons' ),
			'hi'  => __( 'Hindi', 'buttons' ),
			'hmn' => __( 'Hmong', 'buttons' ),
			'hu'  => __( 'Hungarian', 'buttons' ),
			'is'  => __( 'Icelandic', 'buttons' ),
			'ig'  => __( 'Igbo', 'buttons' ),
			'id'  => __( 'Indonesian', 'buttons' ),
			'ga'  => __( 'Irish', 'buttons' ),
			'it'  => __( 'Italian', 'buttons' ),
			'ja'  => __( 'Japanese', 'buttons' ),
			'jw'  => __( 'Javanese', 'buttons' ),
			'kn'  => __( 'Kannada', 'buttons' ),
			'kk'  => __( 'Kazakh', 'buttons' ),
			'km'  => __( 'Khmer', 'buttons' ),
			'ko'  => __( 'Korean', 'buttons' ),
			'ku'  => __( 'Kurdish (Kurmanji)', 'buttons' ),
			'ky'  => __( 'Kyrgyz', 'buttons' ),
			'lo'  => __( 'Lao', 'buttons' ),
			'la'  => __( 'Latin', 'buttons' ),
			'lv'  => __( 'Latvian', 'buttons' ),
			'lb'  => __( 'Luxembourgish', 'buttons' ),
			'mk'  => __( 'Macedonian', 'buttons' ),
			'mg'  => __( 'Malagasy', 'buttons' ),
			'ms'  => __( 'Malay', 'buttons' ),
			'ml'  => __( 'Malayalam', 'buttons' ),
			'mt'  => __( 'Maltese', 'buttons' ),
			'mi'  => __( 'Maori', 'buttons' ),
			'mr'  => __( 'Marathi', 'buttons' ),
			'mn'  => __( 'Mongolian', 'buttons' ),
			'my'  => __( 'Myanmar (Burmese)', 'buttons' ),
			'ne'  => __( 'Nepali', 'buttons' ),
			'no'  => __( 'Norwegian', 'buttons' ),
			'ps'  => __( 'Pashto', 'buttons' ),
			'fa'  => __( 'Persian', 'buttons' ),
			'pl'  => __( 'Polish', 'buttons' ),
			'pt'  => __( 'Portuguese', 'buttons' ),
			'pa'  => __( 'Punjabi', 'buttons' ),
			'ro'  => __( 'Romanian', 'buttons' ),
			'ru'  => __( 'Russian', 'buttons' ),
			'sm'  => __( 'Samoan', 'buttons' ),
			'gd'  => __( 'Scottish Gaelic', 'buttons' ),
			'sr'  => __( 'Serbian', 'buttons' ),
			'st'  => __( 'Sesotho', 'buttons' ),
			'sn'  => __( 'Shona', 'buttons' ),
			'sd'  => __( 'Sindhi', 'buttons' ),
			'si'  => __( 'Sinhala', 'buttons' ),
			'sk'  => __( 'Slovak', 'buttons' ),
			'sl'  => __( 'Slovenian', 'buttons' ),
			'so'  => __( 'Somali', 'buttons' ),
			'es'  => __( 'Spanish', 'buttons' ),
			'su'  => __( 'Sudanese', 'buttons' ),
			'sw'  => __( 'Swahili', 'buttons' ),
			'sv'  => __( 'Swedish', 'buttons' ),
			'tg'  => __( 'Tajik', 'buttons' ),
			'ta'  => __( 'Tamil', 'buttons' ),
			'te'  => __( 'Telugu', 'buttons' ),
			'th'  => __( 'Thai', 'buttons' ),
			'tr'  => __( 'Turkish', 'buttons' ),
			'uk'  => __( 'Ukrainian', 'buttons' ),
			'ur'  => __( 'Urdu', 'buttons' ),
			'uz'  => __( 'Uzbek', 'buttons' ),
			'vi'  => __( 'Vietnamese', 'buttons' ),
			'cy'  => __( 'Welsh', 'buttons' ),
			'xh'  => __( 'Xhosa', 'buttons' ),
			'yi'  => __( 'Yiddish', 'buttons' ),
			'yo'  => __( 'Yoruba', 'buttons' ),
			'zu'  => __( 'Zulu', 'buttons' ),
		];
	}

	public static function languages(): array {
		return [
			'af'             => 'Afrikaans',
			'ar'             => 'العربية',
			'ary'            => 'العربية المغربية',
			'as'             => 'অসমীয়া',
			'az'             => 'Azərbaycan dili',
			'azb'            => 'گؤنئی آذربایجان',
			'bel'            => 'Беларуская мова',
			'bg_BG'          => 'Български',
			'bn_BD'          => 'বাংলা',
			'bo'             => 'བོད་ཡིག',
			'bs_BA'          => 'Bosanski',
			'ca'             => 'Català',
			'ceb'            => 'Cebuano',
			'cs_CZ'          => 'Čeština',
			'cy'             => 'Cymraeg',
			'da_DK'          => 'Dansk',
			'de_DE'          => 'Deutsch',
			'de_CH_informal' => 'Deutsch (Schweiz, Du)',
			'de_CH'          => 'Deutsch (Schweiz)',
			'de_DE_formal'   => 'Deutsch (Sie)',
			'de_AT'          => 'Deutsch (Österreich)',
			'dzo'            => 'རྫོང་ཁ',
			'el'             => 'Ελληνικά',
			'en_US'          => 'English (United States)',
			'en_GB'          => 'English (UK)',
			'en_AU'          => 'English (Australia)',
			'en_NZ'          => 'English (New Zealand)',
			'en_CA'          => 'English (Canada)',
			'en_ZA'          => 'English (South Africa)',
			'eo'             => 'Esperanto',
			'es_ES'          => 'Español',
			'es_VE'          => 'Español de Venezuela',
			'es_GT'          => 'Español de Guatemala',
			'es_CR'          => 'Español de Costa Rica',
			'es_MX'          => 'Español de México',
			'es_CO'          => 'Español de Colombia',
			'es_PE'          => 'Español de Perú',
			'es_CL'          => 'Español de Chile',
			'es_AR'          => 'Español de Argentina',
			'et'             => 'Eesti',
			'eu'             => 'Euskara',
			'fa_IR'          => 'فارسی',
			'fi'             => 'Suomi',
			'fr_FR'          => 'Français',
			'fr_CA'          => 'Français du Canada',
			'fr_BE'          => 'Français de Belgique',
			'fur'            => 'Friulian',
			'gd'             => 'Gàidhlig',
			'gl_ES'          => 'Galego',
			'gu'             => 'ગુજરાતી',
			'haz'            => 'هزاره گی',
			'he_IL'          => 'עִבְרִית',
			'hi_IN'          => 'हिन्दी',
			'hr'             => 'Hrvatski',
			'hu_HU'          => 'Magyar',
			'hy'             => 'Հայերեն',
			'id_ID'          => 'Bahasa Indonesia',
			'is_IS'          => 'Íslenska',
			'it_IT'          => 'Italiano',
			'ja'             => '日本語',
			'jv_ID'          => 'Basa Jawa',
			'ka_GE'          => 'ქართული',
			'kab'            => 'Taqbaylit',
			'kk'             => 'Қазақ тілі',
			'km'             => 'ភាសាខ្មែរ',
			'kn'             => 'ಕನ್ನಡ',
			'ko_KR'          => '한국어',
			'ckb'            => 'كوردی‎',
			'lo'             => 'ພາສາລາວ',
			'lt_LT'          => 'Lietuvių kalba',
			'lv'             => 'Latviešu valoda',
			'mk_MK'          => 'Македонски јазик',
			'ml_IN'          => 'മലയാളം',
			'mn'             => 'Монгол',
			'mr'             => 'मराठी',
			'ms_MY'          => 'Bahasa Melayu',
			'my_MM'          => 'ဗမာစာ',
			'nb_NO'          => 'Norsk bokmål',
			'ne_NP'          => 'नेपाली',
			'nl_NL'          => 'Nederlands',
			'nl_NL_formal'   => 'Nederlands (Formeel)',
			'nl_BE'          => 'Nederlands (België)',
			'nn_NO'          => 'Norsk nynorsk',
			'oci'            => 'Occitan',
			'pa_IN'          => 'ਪੰਜਾਬੀ',
			'pl_PL'          => 'Polski',
			'ps'             => 'پښتو',
			'pt_PT'          => 'Português',
			'pt_AO'          => 'Português de Angola',
			'pt_PT_ao90'     => 'Português (AO90)',
			'pt_BR'          => 'Português do Brasil',
			'rhg'            => 'Ruáinga',
			'ro_RO'          => 'Română',
			'ru_RU'          => 'Русский',
			'sah'            => 'Сахалыы',
			'si_LK'          => 'සිංහල',
			'sk_SK'          => 'Slovenčina',
			'skr'            => 'سرائیکی',
			'sl_SI'          => 'Slovenščina',
			'sq'             => 'Shqip',
			'sr_RS'          => 'Српски језик',
			'sv_SE'          => 'Svenska',
			'szl'            => 'Ślōnskŏ gŏdka',
			'ta_IN'          => 'தமிழ்',
			'te'             => 'తెలుగు',
			'th'             => 'ไทย',
			'tl'             => 'Tagalog',
			'tr_TR'          => 'Türkçe',
			'tt_RU'          => 'Татар теле',
			'tah'            => 'Reo Tahiti',
			'ug_CN'          => 'ئۇيغۇرچە',
			'uk'             => 'Українська',
			'ur'             => 'اردو',
			'uz_UZ'          => 'O‘zbekcha',
			'vi'             => 'Tiếng Việt',
			'zh_CN'          => '简体中文',
			'zh_TW'          => '繁體中文',
			'zh_HK'          => '香港中文版',
		];
	}

	public static function user_roles(): array {
		$editable_role  = array_reverse( get_editable_roles() );
		$users_arr      = array();
		foreach ( $editable_role as $role => $details ) {
			$name = translate_user_role( $details['name'] );
			$val                = [
				'type'  => 'checkbox',
				'title' => $name,
				'label' => __( 'Enable', 'buttons' ),

			];
			$users_arr[ 'user_'.$role ] = $val;
		}

		return $users_arr;
	}

}
