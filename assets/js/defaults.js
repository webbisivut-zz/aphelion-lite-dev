jQuery(document).ready(function($) {
    
    function aphelion_activation_frontend() {
        // Mobile menu
        let triggerBttn = document.getElementById( 'trigger-wb_aphelion_overlay' ),
        triggerBttnSticky = document.getElementById( 'trigger-wb_aphelion_overlay_sticky' ),
        wb_aphelion_overlay = document.querySelector( 'div.wb_aphelion_overlay' ),
        closeBttn = wb_aphelion_overlay.querySelector( '#wb_aphelion_overlay-close' );
        transEndEventNames = {
            'WebkitTransition': 'webkitTransitionEnd',
            'MozTransition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'msTransition': 'MSTransitionEnd',
            'transition': 'transitionend'
        },
        transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
        support = { transitions : Modernizr.csstransitions };
        
        if(triggerBttn != null && typeof triggerBttn != 'undefined') {
            triggerBttn.addEventListener( 'click', function() {
                wb_aphelion_toggleOverlay(true);
            });
        }    
        if(triggerBttnSticky != null && typeof triggerBttnSticky != 'undefined') {
            triggerBttnSticky.addEventListener( 'click', function() {
                wb_aphelion_toggleOverlay(true);
            });
        }
        
        if(closeBttn != null && typeof closeBttn != 'undefined') {
            closeBttn.addEventListener( 'click', function() {
                wb_aphelion_toggleOverlay(false);
            } );
        }
        
        let itemPages = document.getElementById('wb_aphelion_overlay-container-menu');
        itemPages.style.display = 'block';
        
        if(document.getElementById('wb_aphelion_overlay-pages')) {
            let itemRightMenuPages = document.getElementById('wb_aphelion_overlay-pages');
            
            itemRightMenuPages.addEventListener('click', function() {
                aphelion_hide_right_menu_items();
                
                $(itemPages).fadeIn();
            });
        }
        
        aphelion_generate_submenus();
    };

    aphelion_activation_frontend();

    function wb_aphelion_toggleOverlay(openOrClosed = false) {
        let wb_aphelion_overlayContent = document.getElementById('wb_aphelion_overlay_menu_is_open');
        let wb_aphelion_overlay = document.querySelector( 'div.wb_aphelion_overlay' );
        
        if(openOrClosed) {
            wb_aphelion_overlayContent.style.opacity = 1;
            wb_aphelion_overlayContent.style.visibility = 'visible';
        } else {
            wb_aphelion_overlayContent.style.opacity = 0;
            setTimeout(() => {
                wb_aphelion_overlayContent.style.visibility = 'hidden';
            }, 500);
        }
        
        if( classie.has( wb_aphelion_overlay, 'open' ) ) {
            classie.remove( wb_aphelion_overlay, 'open' );
            //classie.add( wb_aphelion_overlay, 'close' );
            let onEndTransitionFn = function( ev ) {
                if( support.transitions ) {
                    if( ev.propertyName !== 'visibility' ) return;
                    this.removeEventListener( transEndEventName, onEndTransitionFn );
                }
                classie.remove( wb_aphelion_overlay, 'close' );
            };
            if( support.transitions ) {
                if(wb_aphelion_overlay != null && typeof wb_aphelion_overlay != 'undefined') {
                    wb_aphelion_overlay.addEventListener( transEndEventName, onEndTransitionFn );
                }
            }
            else {
                onEndTransitionFn();
            }
        }
        else if(wb_aphelion_overlay != null && !classie.has( wb_aphelion_overlay, 'close' ) ) {
            classie.add( wb_aphelion_overlay, 'open' );
        }
    }

    function aphelion_generate_submenus() {
        if(document.getElementById('wb_aphelion_overlay_menu')) {
            
            var list = document.getElementById('wb_aphelion_overlay_menu').getElementsByClassName("menu-item");
            
            for(var a in list) {
                if(typeof list[a].childNodes != 'undefined' && list[a].childNodes != null && list[a].childNodes.length > 0) {
                    
                    var hasChilds = list[a].childNodes.length > 1;
                    
                    if(hasChilds) {
                        list[a].innerHTML += '<div id="aphelion_mobile_arrow_' + a +'" class="toggleArrow"><div class="align_arrow" id="align_aphelion_mobile_arrow_' + a +'">&raquo;</div></div>';
                        
                        var listSubs = list[a].childNodes;
                        
                        for (var i = 0; i < listSubs.length; i++) { 
                            if(listSubs[i].childNodes.length > 1) {
                                listSubs[i].id = 'aphelion_mobile_arrow_' + a + '_submenu';
                            }
                        }
                    }
                }
            }
            
            var listArrows = document.getElementsByClassName("toggleArrow");
            
            for (var i = 0; i < listArrows.length; i++) {
                listArrows[i].addEventListener('click', function() {
                    var getID = this.id;
                    var subID = getID + '_submenu';
                    
                    var arrowElement = document.getElementById('align_' + getID);
                    
                    arrowElement.classList.toggle('turn_90_degrees');
                    //document.getElementById(subID).classList.toggle('open');
                    
                    $('#' + subID).slideToggle('fast');
                });
            }
        }
    }

    function aphelion_hide_right_menu_items() {
        var listMenuElements = document.getElementsByClassName("wb_aphelion_overlay-container-item");
        
        for (var i = 0; i < listMenuElements.length; i++) {
            listMenuElements[i].style.display = 'none';
        }
    }

    function aphelion_mobile_footer_contents() {
        // Mobile search
        if(document.getElementById('wb_aphelion_sticky_mobile_search') && document.getElementById('wb_aphelion_mobile_search')) {
            let open_mobile_search = document.getElementById('wb_aphelion_sticky_mobile_search');
            let mobile_search_content = document.getElementById('wb_aphelion_mobile_search');
            let mobile_cart_content = document.getElementById('wb_aphelion_mobile_cart');

            open_mobile_search.addEventListener('click', () => {
                if(mobile_search_content.style.opacity == 0) {
                    mobile_search_content.style.opacity = 1;
                    mobile_search_content.style.zIndex = 997; 
                } else {
                    mobile_search_content.style.opacity = 0;
                    mobile_search_content.style.zIndex = -999; 
                }    
                
                mobile_cart_content.style.opacity = 0;
                mobile_cart_content.style.zIndex = -999;
            });
        }

        if(document.getElementById('close_mobile_search') && document.getElementById('wb_aphelion_mobile_search')) {
            let close_mobile_search = document.getElementById('close_mobile_search');
            let mobile_search_content = document.getElementById('wb_aphelion_mobile_search');

            close_mobile_search.addEventListener('click', () => {
                mobile_search_content.style.opacity = 0;
                mobile_search_content.style.zIndex = -999;
            });
        }

        // Mobile cart
        if(document.getElementById('wb_aphelion_sticky_mobile_cart') && document.getElementById('wb_aphelion_mobile_cart')) {
            let open_mobile_cart = document.getElementById('wb_aphelion_sticky_mobile_cart');
            let mobile_cart_content = document.getElementById('wb_aphelion_mobile_cart');
            let mobile_search_content = document.getElementById('wb_aphelion_mobile_search');

            open_mobile_cart.addEventListener('click', () => {
                if(mobile_cart_content.style.opacity == 0) {
                    mobile_cart_content.style.opacity = 1;
                    mobile_cart_content.style.zIndex = 997;
                } else {
                    mobile_cart_content.style.opacity = 0;
                    mobile_cart_content.style.zIndex = -999;
                }

                mobile_search_content.style.opacity = 0;
                mobile_search_content.style.zIndex = -999;
            });
        }

        if(document.getElementById('close_mobile_cart') && document.getElementById('wb_aphelion_mobile_cart')) {
            let close_mobile_cart = document.getElementById('close_mobile_cart');
            let mobile_cart_content = document.getElementById('wb_aphelion_mobile_cart');

            close_mobile_cart.addEventListener('click', () => {
                mobile_cart_content.style.opacity = 0;
                mobile_cart_content.style.zIndex = -999;
            });
        }
    }

    aphelion_mobile_footer_contents();
});