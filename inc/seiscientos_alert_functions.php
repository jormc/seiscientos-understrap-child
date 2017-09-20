<?php

	/**
	* Seiscientos.org Alerts Utilities
	*
	* @package seiscientos
	*/
	function seiscientos_show_site_alerts( ){

        $successAlert = get_theme_mod('activate_site_success_alert', false);
        $infoAlert = get_theme_mod('activate_site_info_alert', false);
        $warnAlert = get_theme_mod('activate_site_warn_alert', false);
        $dangerAlert = get_theme_mod('activate_site_danger_alert', false);

		if ($successAlert) {
			seiscientos_show_success_site_alert();
        }
        
        if ($infoAlert) {
			seiscientos_show_info_site_alert();
        }
        
        if ($warnAlert) {
			seiscientos_show_warn_site_alert();
        }
        
        if ($dangerAlert) {
			seiscientos_show_danger_site_alert();
		}
    }
    
    function seiscientos_show_success_site_alert() {
        print 
            '<div class="container">
			    <div class="row">
				    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>'.get_theme_mod('site_success_alert_title', null).'</strong>
                            <br />
                            <span>'.get_theme_mod('site_success_alert_content', null).'</span>
                        </div>
                    </div>
                </div>
            </div>';
    }

    function seiscientos_show_info_site_alert() {
        print 
            '<div class="container">
			    <div class="row">
				    <div class="col">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>'.get_theme_mod('site_info_alert_title', null).'</strong>
                            <br />
                            <span>'.get_theme_mod('site_info_alert_content', null).'</span>
                        </div>
                    </div>
                </div>
            </div>';
    }

    function seiscientos_show_warn_site_alert() {
        print 
            '<div class="container">
			    <div class="row">
				    <div class="col">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>'.get_theme_mod('site_warn_alert_title', null).'</strong>
                            <br />
                            <span>'.get_theme_mod('site_warn_alert_content', null).'</span>
                        </div>
                    </div>
                </div>
            </div>';
    }

    function seiscientos_show_danger_site_alert() {
        print 
            '<div class="container">
			    <div class="row">
				    <div class="col">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>'.get_theme_mod('site_danger_alert_title', null).'</strong>
                            <br />
                            <span>'.get_theme_mod('site_danger_alert_content', null).'</span>
                        </div>
                    </div>
                </div>
            </div>';
    }

?>