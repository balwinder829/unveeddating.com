<?php
Class Index extends Theme {
    public static $page_data = array('title' => 'home');
    public static $partial = 'index';
    public static function init_data() {
        global $config;
        parent::init_data();
        parent::$data['title'] = $config->default_title;
        parent::$data['keywords'] = $config->meta_keywords;
        parent::$data['description'] = $config->meta_description;
        // if (isset(self::$page_data['title']) && self::$page_data['title'] !== '') {
        //     parent::$data['title'] = ucfirst(__('Home')) . ' . ' . $config->site_name;
        // }
        parent::$data['name'] = self::$partial;
    }
    public static function show($partial = '') {
        self::init_data();
        parent::show(self::$partial);
    }
}
