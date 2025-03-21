$(document).ready(function () {
    'use strict';
    let icons = [
        'flaticon-headphones',
        'flaticon-shipped',
        'flaticon-money-back',
        'flaticon-support',
        'flaticon-woman',
        'flaticon-boss',
        'flaticon-friendship',
        'flaticon-sunglasses',
        'flaticon-jacket',
        'flaticon-sneakers',
        'flaticon-watch',
        'flaticon-necklace',
        'flaticon-herbal',
        'flaticon-ball',
        'flaticon-pijamas',
        'flaticon-scarf',
        'flaticon-vintage',
        'flaticon-pregnant',
        'flaticon-lock',
        'flaticon-bed',
        'flaticon-table',
        'flaticon-armchair',
        'flaticon-desk-lamp',
        'flaticon-sofa',
        'flaticon-chair',
        'flaticon-tv',
        'flaticon-responsive',
        'flaticon-camera',
        'flaticon-plugins',
        'flaticon-headphones',
        'flaticon-console',
        'flaticon-music-system',
        'flaticon-monitor',
        'flaticon-printer',
        'flaticon-fax',
        'flaticon-mouse',
        'ion-alert',
        'ion-alert-circled',
        'ion-android-add',
        'ion-android-add-circle',
        'ion-android-alarm-clock',
        'ion-android-alert',
        'ion-android-apps',
        'ion-android-archive',
        'ion-android-arrow-back',
        'ion-android-arrow-down',
        'ion-android-arrow-dropdown',
        'ion-android-arrow-dropdown-circle',
        'ion-android-arrow-dropleft',
        'ion-android-arrow-dropleft-circle',
        'ion-android-arrow-dropright',
        'ion-android-arrow-dropright-circle',
        'ion-android-arrow-dropup',
        'ion-android-arrow-dropup-circle',
        'ion-android-arrow-forward',
        'ion-android-arrow-up',
        'ion-android-attach',
        'ion-android-bar',
        'ion-android-bicycle',
        'ion-android-boat',
        'ion-android-bookmark',
        'ion-android-bulb',
        'ion-android-bus',
        'ion-android-calendar',
        'ion-android-call',
        'ion-android-camera',
        'ion-android-cancel',
        'ion-android-car',
        'ion-android-cart',
        'ion-android-chat',
        'ion-android-checkbox',
        'ion-android-checkbox-blank',
        'ion-android-checkbox-outline',
        'ion-android-checkbox-outline-blank',
        'ion-android-checkmark-circle',
        'ion-android-clipboard',
        'ion-android-close',
        'ion-android-cloud',
        'ion-android-cloud-circle',
        'ion-android-cloud-done',
        'ion-android-cloud-outline',
        'ion-android-color-palette',
        'ion-android-compass',
        'ion-android-contact',
        'ion-android-contacts',
        'ion-android-contract',
        'ion-android-create',
        'ion-android-delete',
        'ion-android-desktop',
        'ion-android-document',
        'ion-android-done',
        'ion-android-done-all',
        'ion-android-download',
        'ion-android-drafts',
        'ion-android-exit',
        'ion-android-expand',
        'ion-android-favorite',
        'ion-android-favorite-outline',
        'ion-android-film',
        'ion-android-folder',
        'ion-android-folder-open',
        'ion-android-funnel',
        'ion-android-globe',
        'ion-android-hand',
        'ion-android-hangout',
        'ion-android-happy',
        'ion-android-home',
        'ion-android-image',
        'ion-android-laptop',
        'ion-android-list',
        'ion-android-locate',
        'ion-android-lock',
        'ion-android-mail',
        'ion-android-map',
        'ion-android-menu',
        'ion-android-microphone',
        'ion-android-microphone-off',
        'ion-android-more-horizontal',
        'ion-android-more-vertical',
        'ion-android-navigate',
        'ion-android-notifications',
        'ion-android-notifications-none',
        'ion-android-notifications-off',
        'ion-android-open',
        'ion-android-options',
        'ion-android-people',
        'ion-android-person',
        'ion-android-person-add',
        'ion-android-phone-landscape',
        'ion-android-phone-portrait',
        'ion-android-pin',
        'ion-android-plane',
        'ion-android-playstore',
        'ion-android-print',
        'ion-android-radio-button-off',
        'ion-android-radio-button-on',
        'ion-android-refresh',
        'ion-android-remove',
        'ion-android-remove-circle',
        'ion-android-restaurant',
        'ion-android-sad',
        'ion-android-search',
        'ion-android-send',
        'ion-android-settings',
        'ion-android-share',
        'ion-android-share-alt',
        'ion-android-star',
        'ion-android-star-half',
        'ion-android-star-outline',
        'ion-android-stopwatch',
        'ion-android-subway',
        'ion-android-sunny',
        'ion-android-sync',
        'ion-android-textsms',
        'ion-android-time',
        'ion-android-train',
        'ion-android-unlock',
        'ion-android-upload',
        'ion-android-volume-down',
        'ion-android-volume-mute',
        'ion-android-volume-off',
        'ion-android-volume-up',
        'ion-android-walk',
        'ion-android-warning',
        'ion-android-watch',
        'ion-android-wifi',
        'ion-aperture',
        'ion-archive',
        'ion-arrow-down-a',
        'ion-arrow-down-b',
        'ion-arrow-down-c',
        'ion-arrow-expand',
        'ion-arrow-graph-down-left',
        'ion-arrow-graph-down-right',
        'ion-arrow-graph-up-left',
        'ion-arrow-graph-up-right',
        'ion-arrow-left-a',
        'ion-arrow-left-b',
        'ion-arrow-left-c',
        'ion-arrow-move',
        'ion-arrow-resize',
        'ion-arrow-return-left',
        'ion-arrow-return-right',
        'ion-arrow-right-a',
        'ion-arrow-right-b',
        'ion-arrow-right-c',
        'ion-arrow-shrink',
        'ion-arrow-swap',
        'ion-arrow-up-a',
        'ion-arrow-up-b',
        'ion-arrow-up-c',
        'ion-asterisk',
        'ion-at',
        'ion-backspace',
        'ion-backspace-outline',
        'ion-bag',
        'ion-battery-charging',
        'ion-battery-empty',
        'ion-battery-full',
        'ion-battery-half',
        'ion-battery-low',
        'ion-beaker',
        'ion-beer',
        'ion-bluetooth',
        'ion-bonfire',
        'ion-bookmark',
        'ion-bowtie',
        'ion-briefcase',
        'ion-bug',
        'ion-calculator',
        'ion-calendar',
        'ion-camera',
        'ion-card',
        'ion-cash',
        'ion-chatbox',
        'ion-chatbox-working',
        'ion-chatboxes',
        'ion-chatbubble',
        'ion-chatbubble-working',
        'ion-chatbubbles',
        'ion-checkmark',
        'ion-checkmark-circled',
        'ion-checkmark-round',
        'ion-chevron-down',
        'ion-chevron-left',
        'ion-chevron-right',
        'ion-chevron-up',
        'ion-clipboard',
        'ion-clock',
        'ion-close',
        'ion-close-circled',
        'ion-close-round',
        'ion-closed-captioning',
        'ion-cloud',
        'ion-code',
        'ion-code-download',
        'ion-code-working',
        'ion-coffee',
        'ion-compass',
        'ion-compose',
        'ion-connection-bars',
        'ion-contrast',
        'ion-crop',
        'ion-cube',
        'ion-disc',
        'ion-document',
        'ion-document-text',
        'ion-drag',
        'ion-earth',
        'ion-easel',
        'ion-edit',
        'ion-egg',
        'ion-eject',
        'ion-email',
        'ion-email-unread',
        'ion-erlenmeyer-flask',
        'ion-erlenmeyer-flask-bubbles',
        'ion-eye',
        'ion-eye-disabled',
        'ion-female',
        'ion-filing',
        'ion-film-marker',
        'ion-fireball',
        'ion-flag',
        'ion-flame',
        'ion-flash',
        'ion-flash-off',
        'ion-folder',
        'ion-fork',
        'ion-fork-repo',
        'ion-forward',
        'ion-funnel',
        'ion-gear-a',
        'ion-gear-b',
        'ion-grid',
        'ion-hammer',
        'ion-happy',
        'ion-happy-outline',
        'ion-headphone',
        'ion-heart',
        'ion-heart-broken',
        'ion-help',
        'ion-help-buoy',
        'ion-help-circled',
        'ion-home',
        'ion-icecream',
        'ion-image',
        'ion-images',
        'ion-information',
        'ion-information-circled',
        'ion-ionic',
        'ion-ios-alarm',
        'ion-ios-alarm-outline',
        'ion-ios-albums',
        'ion-ios-albums-outline',
        'ion-ios-americanfootball',
        'ion-ios-americanfootball-outline',
        'ion-ios-analytics',
        'ion-ios-analytics-outline',
        'ion-ios-arrow-back',
        'ion-ios-arrow-down',
        'ion-ios-arrow-forward',
        'ion-ios-arrow-left',
        'ion-ios-arrow-right',
        'ion-ios-arrow-thin-down',
        'ion-ios-arrow-thin-left',
        'ion-ios-arrow-thin-right',
        'ion-ios-arrow-thin-up',
        'ion-ios-arrow-up',
        'ion-ios-at',
        'ion-ios-at-outline',
        'ion-ios-barcode',
        'ion-ios-barcode-outline',
        'ion-ios-baseball',
        'ion-ios-baseball-outline',
        'ion-ios-basketball',
        'ion-ios-basketball-outline',
        'ion-ios-bell',
        'ion-ios-bell-outline',
        'ion-ios-body',
        'ion-ios-body-outline',
        'ion-ios-bolt',
        'ion-ios-bolt-outline',
        'ion-ios-book',
        'ion-ios-book-outline',
        'ion-ios-bookmarks',
        'ion-ios-bookmarks-outline',
        'ion-ios-box',
        'ion-ios-box-outline',
        'ion-ios-briefcase',
        'ion-ios-briefcase-outline',
        'ion-ios-browsers',
        'ion-ios-browsers-outline',
        'ion-ios-calculator',
        'ion-ios-calculator-outline',
        'ion-ios-calendar',
        'ion-ios-calendar-outline',
        'ion-ios-camera',
        'ion-ios-camera-outline',
        'ion-ios-cart',
        'ion-ios-cart-outline',
        'ion-ios-chatboxes',
        'ion-ios-chatboxes-outline',
        'ion-ios-chatbubble',
        'ion-ios-chatbubble-outline',
        'ion-ios-checkmark',
        'ion-ios-checkmark-empty',
        'ion-ios-checkmark-outline',
        'ion-ios-circle-filled',
        'ion-ios-circle-outline',
        'ion-ios-clock',
        'ion-ios-clock-outline',
        'ion-ios-close',
        'ion-ios-close-empty',
        'ion-ios-close-outline',
        'ion-ios-cloud',
        'ion-ios-cloud-download',
        'ion-ios-cloud-download-outline',
        'ion-ios-cloud-outline',
        'ion-ios-cloud-upload',
        'ion-ios-cloud-upload-outline',
        'ion-ios-cloudy',
        'ion-ios-cloudy-night',
        'ion-ios-cloudy-night-outline',
        'ion-ios-cloudy-outline',
        'ion-ios-cog',
        'ion-ios-cog-outline',
        'ion-ios-color-filter',
        'ion-ios-color-filter-outline',
        'ion-ios-color-wand',
        'ion-ios-color-wand-outline',
        'ion-ios-compose',
        'ion-ios-compose-outline',
        'ion-ios-contact',
        'ion-ios-contact-outline',
        'ion-ios-copy',
        'ion-ios-copy-outline',
        'ion-ios-crop',
        'ion-ios-crop-strong',
        'ion-ios-download',
        'ion-ios-download-outline',
        'ion-ios-drag',
        'ion-ios-email',
        'ion-ios-email-outline',
        'ion-ios-eye',
        'ion-ios-eye-outline',
        'ion-ios-fastforward',
        'ion-ios-fastforward-outline',
        'ion-ios-filing',
        'ion-ios-filing-outline',
        'ion-ios-film',
        'ion-ios-film-outline',
        'ion-ios-flag',
        'ion-ios-flag-outline',
        'ion-ios-flame',
        'ion-ios-flame-outline',
        'ion-ios-flask',
        'ion-ios-flask-outline',
        'ion-ios-flower',
        'ion-ios-flower-outline',
        'ion-ios-folder',
        'ion-ios-folder-outline',
        'ion-ios-football',
        'ion-ios-football-outline',
        'ion-ios-game-controller-a',
        'ion-ios-game-controller-a-outline',
        'ion-ios-game-controller-b',
        'ion-ios-game-controller-b-outline',
        'ion-ios-gear',
        'ion-ios-gear-outline',
        'ion-ios-glasses',
        'ion-ios-glasses-outline',
        'ion-ios-grid-view',
        'ion-ios-grid-view-outline',
        'ion-ios-heart',
        'ion-ios-heart-outline',
        'ion-ios-help',
        'ion-ios-help-empty',
        'ion-ios-help-outline',
        'ion-ios-home',
        'ion-ios-home-outline',
        'ion-ios-infinite',
        'ion-ios-infinite-outline',
        'ion-ios-information',
        'ion-ios-information-empty',
        'ion-ios-information-outline',
        'ion-ios-ionic-outline',
        'ion-ios-keypad',
        'ion-ios-keypad-outline',
        'ion-ios-lightbulb',
        'ion-ios-lightbulb-outline',
        'ion-ios-list',
        'ion-ios-list-outline',
        'ion-ios-location',
        'ion-ios-location-outline',
        'ion-ios-locked',
        'ion-ios-locked-outline',
        'ion-ios-loop',
        'ion-ios-loop-strong',
        'ion-ios-medical',
        'ion-ios-medical-outline',
        'ion-ios-medkit',
        'ion-ios-medkit-outline',
        'ion-ios-mic',
        'ion-ios-mic-off',
        'ion-ios-mic-outline',
        'ion-ios-minus',
        'ion-ios-minus-empty',
        'ion-ios-minus-outline',
        'ion-ios-monitor',
        'ion-ios-monitor-outline',
        'ion-ios-moon',
        'ion-ios-moon-outline',
        'ion-ios-more',
        'ion-ios-more-outline',
        'ion-ios-musical-note',
        'ion-ios-musical-notes',
        'ion-ios-navigate',
        'ion-ios-navigate-outline',
        'ion-ios-nutrition',
        'ion-ios-nutrition-outline',
        'ion-ios-paper',
        'ion-ios-paper-outline',
        'ion-ios-paperplane',
        'ion-ios-paperplane-outline',
        'ion-ios-partlysunny',
        'ion-ios-partlysunny-outline',
        'ion-ios-pause',
        'ion-ios-pause-outline',
        'ion-ios-paw',
        'ion-ios-paw-outline',
        'ion-ios-people',
        'ion-ios-people-outline',
        'ion-ios-person',
        'ion-ios-person-outline',
        'ion-ios-personadd',
        'ion-ios-personadd-outline',
        'ion-ios-photos',
        'ion-ios-photos-outline',
        'ion-ios-pie',
        'ion-ios-pie-outline',
        'ion-ios-pint',
        'ion-ios-pint-outline',
        'ion-ios-play',
        'ion-ios-play-outline',
        'ion-ios-plus',
        'ion-ios-plus-empty',
        'ion-ios-plus-outline',
        'ion-ios-pricetag',
        'ion-ios-pricetag-outline',
        'ion-ios-pricetags',
        'ion-ios-pricetags-outline',
        'ion-ios-printer',
        'ion-ios-printer-outline',
        'ion-ios-pulse',
        'ion-ios-pulse-strong',
        'ion-ios-rainy',
        'ion-ios-rainy-outline',
        'ion-ios-recording',
        'ion-ios-recording-outline',
        'ion-ios-redo',
        'ion-ios-redo-outline',
        'ion-ios-refresh',
        'ion-ios-refresh-empty',
        'ion-ios-refresh-outline',
        'ion-ios-reload',
        'ion-ios-reverse-camera',
        'ion-ios-reverse-camera-outline',
        'ion-ios-rewind',
        'ion-ios-rewind-outline',
        'ion-ios-rose',
        'ion-ios-rose-outline',
        'ion-ios-search',
        'ion-ios-search-strong',
        'ion-ios-settings',
        'ion-ios-settings-strong',
        'ion-ios-shuffle',
        'ion-ios-shuffle-strong',
        'ion-ios-skipbackward',
        'ion-ios-skipbackward-outline',
        'ion-ios-skipforward',
        'ion-ios-skipforward-outline',
        'ion-ios-snowy',
        'ion-ios-speedometer',
        'ion-ios-speedometer-outline',
        'ion-ios-star',
        'ion-ios-star-half',
        'ion-ios-star-outline',
        'ion-ios-stopwatch',
        'ion-ios-stopwatch-outline',
        'ion-ios-sunny',
        'ion-ios-sunny-outline',
        'ion-ios-telephone',
        'ion-ios-telephone-outline',
        'ion-ios-tennisball',
        'ion-ios-tennisball-outline',
        'ion-ios-thunderstorm',
        'ion-ios-thunderstorm-outline',
        'ion-ios-time',
        'ion-ios-time-outline',
        'ion-ios-timer',
        'ion-ios-timer-outline',
        'ion-ios-toggle',
        'ion-ios-toggle-outline',
        'ion-ios-trash',
        'ion-ios-trash-outline',
        'ion-ios-undo',
        'ion-ios-undo-outline',
        'ion-ios-unlocked',
        'ion-ios-unlocked-outline',
        'ion-ios-upload',
        'ion-ios-upload-outline',
        'ion-ios-videocam',
        'ion-ios-videocam-outline',
        'ion-ios-volume-high',
        'ion-ios-volume-low',
        'ion-ios-wineglass',
        'ion-ios-wineglass-outline',
        'ion-ios-world',
        'ion-ios-world-outline',
        'ion-ipad',
        'ion-iphone',
        'ion-ipod',
        'ion-jet',
        'ion-key',
        'ion-knife',
        'ion-laptop',
        'ion-leaf',
        'ion-levels',
        'ion-lightbulb',
        'ion-link',
        'ion-load-a',
        'ion-load-b',
        'ion-load-c',
        'ion-load-d',
        'ion-location',
        'ion-lock-combination',
        'ion-locked',
        'ion-log-in',
        'ion-log-out',
        'ion-loop',
        'ion-magnet',
        'ion-male',
        'ion-man',
        'ion-map',
        'ion-medkit',
        'ion-merge',
        'ion-mic-a',
        'ion-mic-b',
        'ion-mic-c',
        'ion-minus',
        'ion-minus-circled',
        'ion-minus-round',
        'ion-model-s',
        'ion-monitor',
        'ion-more',
        'ion-mouse',
        'ion-music-note',
        'ion-navicon',
        'ion-navicon-round',
        'ion-navigate',
        'ion-network',
        'ion-no-smoking',
        'ion-nuclear',
        'ion-outlet',
        'ion-paintbrush',
        'ion-paintbucket',
        'ion-paper-airplane',
        'ion-paperclip',
        'ion-pause',
        'ion-person',
        'ion-person-add',
        'ion-person-stalker',
        'ion-pie-graph',
        'ion-pin',
        'ion-pinpoint',
        'ion-pizza',
        'ion-plane',
        'ion-planet',
        'ion-play',
        'ion-playstation',
        'ion-plus',
        'ion-plus-circled',
        'ion-plus-round',
        'ion-podium',
        'ion-pound',
        'ion-power',
        'ion-pricetag',
        'ion-pricetags',
        'ion-printer',
        'ion-pull-request',
        'ion-qr-scanner',
        'ion-quote',
        'ion-radio-waves',
        'ion-record',
        'ion-refresh',
        'ion-reply',
        'ion-reply-all',
        'ion-ribbon-a',
        'ion-ribbon-b',
        'ion-sad',
        'ion-sad-outline',
        'ion-scissors',
        'ion-search',
        'ion-settings',
        'ion-share',
        'ion-shuffle',
        'ion-skip-backward',
        'ion-skip-forward',
        'ion-social-android',
        'ion-social-android-outline',
        'ion-social-angular',
        'ion-social-angular-outline',
        'ion-social-apple',
        'ion-social-apple-outline',
        'ion-social-bitcoin',
        'ion-social-bitcoin-outline',
        'ion-social-buffer',
        'ion-social-buffer-outline',
        'ion-social-chrome',
        'ion-social-chrome-outline',
        'ion-social-codepen',
        'ion-social-codepen-outline',
        'ion-social-css3',
        'ion-social-css3-outline',
        'ion-social-designernews',
        'ion-social-designernews-outline',
        'ion-social-dribbble',
        'ion-social-dribbble-outline',
        'ion-social-dropbox',
        'ion-social-dropbox-outline',
        'ion-social-euro',
        'ion-social-euro-outline',
        'ion-social-facebook',
        'ion-social-facebook-outline',
        'ion-social-foursquare',
        'ion-social-foursquare-outline',
        'ion-social-freebsd-devil',
        'ion-social-github',
        'ion-social-github-outline',
        'ion-social-google',
        'ion-social-google-outline',
        'ion-social-googleplus',
        'ion-social-googleplus-outline',
        'ion-social-hackernews',
        'ion-social-hackernews-outline',
        'ion-social-html5',
        'ion-social-html5-outline',
        'ion-social-instagram',
        'ion-social-instagram-outline',
        'ion-social-javascript',
        'ion-social-javascript-outline',
        'ion-social-linkedin',
        'ion-social-linkedin-outline',
        'ion-social-markdown',
        'ion-social-nodejs',
        'ion-social-octocat',
        'ion-social-pinterest',
        'ion-social-pinterest-outline',
        'ion-social-python',
        'ion-social-reddit',
        'ion-social-reddit-outline',
        'ion-social-rss',
        'ion-social-rss-outline',
        'ion-social-sass',
        'ion-social-skype',
        'ion-social-skype-outline',
        'ion-social-snapchat',
        'ion-social-snapchat-outline',
        'ion-social-tumblr',
        'ion-social-tumblr-outline',
        'ion-social-tux',
        'ion-social-twitch',
        'ion-social-twitch-outline',
        'ion-social-twitter',
        'ion-social-twitter-outline',
        'ion-social-usd',
        'ion-social-usd-outline',
        'ion-social-vimeo',
        'ion-social-vimeo-outline',
        'ion-social-whatsapp',
        'ion-social-whatsapp-outline',
        'ion-social-windows',
        'ion-social-windows-outline',
        'ion-social-wordpress',
        'ion-social-wordpress-outline',
        'ion-social-yahoo',
        'ion-social-yahoo-outline',
        'ion-social-yen',
        'ion-social-yen-outline',
        'ion-social-youtube',
        'ion-social-youtube-outline',
        'ion-soup-can',
        'ion-soup-can-outline',
        'ion-speakerphone',
        'ion-speedometer',
        'ion-spoon',
        'ion-star',
        'ion-stats-bars',
        'ion-steam',
        'ion-stop',
        'ion-thermometer',
        'ion-thumbsdown',
        'ion-thumbsup',
        'ion-toggle',
        'ion-toggle-filled',
        'ion-transgender',
        'ion-trash-a',
        'ion-trash-b',
        'ion-trophy',
        'ion-tshirt',
        'ion-tshirt-outline',
        'ion-umbrella',
        'ion-university',
        'ion-unlocked',
        'ion-upload',
        'ion-usb',
        'ion-videocamera',
        'ion-volume-high',
        'ion-volume-low',
        'ion-volume-medium',
        'ion-volume-mute',
        'ion-wand',
        'ion-waterdrop',
        'ion-wifi',
        'ion-wineglass',
        'ion-woman',
        'ion-wrench',
        'ion-xbox',
        'linearicons-home',
        'linearicons-home2',
        'linearicons-home3',
        'linearicons-home4',
        'linearicons-home5',
        'linearicons-home6',
        'linearicons-bathtub',
        'linearicons-toothbrush',
        'linearicons-bed',
        'linearicons-couch',
        'linearicons-chair',
        'linearicons-city',
        'linearicons-apartment',
        'linearicons-pencil',
        'linearicons-pencil2',
        'linearicons-pen',
        'linearicons-pencil3',
        'linearicons-eraser',
        'linearicons-pencil4',
        'linearicons-pencil5',
        'linearicons-feather',
        'linearicons-feather2',
        'linearicons-feather3',
        'linearicons-pen2',
        'linearicons-pen-add',
        'linearicons-pen-remove',
        'linearicons-vector',
        'linearicons-pen3',
        'linearicons-blog',
        'linearicons-brush',
        'linearicons-brush2',
        'linearicons-spray',
        'linearicons-paint-roller',
        'linearicons-stamp',
        'linearicons-tape',
        'linearicons-desk-tape',
        'linearicons-texture',
        'linearicons-eye-dropper',
        'linearicons-palette',
        'linearicons-color-sampler',
        'linearicons-bucket',
        'linearicons-gradient',
        'linearicons-gradient2',
        'linearicons-magic-wand',
        'linearicons-magnet',
        'linearicons-pencil-ruler',
        'linearicons-pencil-ruler2',
        'linearicons-compass',
        'linearicons-aim',
        'linearicons-gun',
        'linearicons-bottle',
        'linearicons-drop',
        'linearicons-drop-crossed',
        'linearicons-drop2',
        'linearicons-snow',
        'linearicons-snow2',
        'linearicons-fire',
        'linearicons-lighter',
        'linearicons-knife',
        'linearicons-dagger',
        'linearicons-tissue',
        'linearicons-toilet-paper',
        'linearicons-poop',
        'linearicons-umbrella',
        'linearicons-umbrella2',
        'linearicons-rain',
        'linearicons-tornado',
        'linearicons-wind',
        'linearicons-fan',
        'linearicons-contrast',
        'linearicons-sun-small',
        'linearicons-sun',
        'linearicons-sun2',
        'linearicons-moon',
        'linearicons-cloud',
        'linearicons-cloud-upload',
        'linearicons-cloud-download',
        'linearicons-cloud-rain',
        'linearicons-cloud-hailstones',
        'linearicons-cloud-snow',
        'linearicons-cloud-windy',
        'linearicons-sun-wind',
        'linearicons-cloud-fog',
        'linearicons-cloud-sun',
        'linearicons-cloud-lightning',
        'linearicons-cloud-sync',
        'linearicons-cloud-lock',
        'linearicons-cloud-gear',
        'linearicons-cloud-alert',
        'linearicons-cloud-check',
        'linearicons-cloud-cross',
        'linearicons-cloud-crossed',
        'linearicons-cloud-database',
        'linearicons-database',
        'linearicons-database-add',
        'linearicons-database-remove',
        'linearicons-database-lock',
        'linearicons-database-refresh',
        'linearicons-database-check',
        'linearicons-database-history',
        'linearicons-database-upload',
        'linearicons-database-download',
        'linearicons-server',
        'linearicons-shield',
        'linearicons-shield-check',
        'linearicons-shield-alert',
        'linearicons-shield-cross',
        'linearicons-lock',
        'linearicons-rotation-lock',
        'linearicons-unlock',
        'linearicons-key',
        'linearicons-key-hole',
        'linearicons-toggle-off',
        'linearicons-toggle-on',
        'linearicons-cog',
        'linearicons-cog2',
        'linearicons-wrench',
        'linearicons-screwdriver',
        'linearicons-hammer-wrench',
        'linearicons-hammer',
        'linearicons-saw',
        'linearicons-axe',
        'linearicons-axe2',
        'linearicons-shovel',
        'linearicons-pickaxe',
        'linearicons-factory',
        'linearicons-factory2',
        'linearicons-recycle',
        'linearicons-trash',
        'linearicons-trash2',
        'linearicons-trash3',
        'linearicons-broom',
        'linearicons-game',
        'linearicons-gamepad',
        'linearicons-joystick',
        'linearicons-dice',
        'linearicons-spades',
        'linearicons-diamonds',
        'linearicons-clubs',
        'linearicons-hearts',
        'linearicons-heart',
        'linearicons-star',
        'linearicons-star-half',
        'linearicons-star-empty',
        'linearicons-flag',
        'linearicons-flag2',
        'linearicons-flag3',
        'linearicons-mailbox-full',
        'linearicons-mailbox-empty',
        'linearicons-at-sign',
        'linearicons-envelope',
        'linearicons-envelope-open',
        'linearicons-paperclip',
        'linearicons-paper-plane',
        'linearicons-reply',
        'linearicons-reply-all',
        'linearicons-inbox',
        'linearicons-inbox2',
        'linearicons-outbox',
        'linearicons-box',
        'linearicons-archive',
        'linearicons-archive2',
        'linearicons-drawers',
        'linearicons-drawers2',
        'linearicons-drawers3',
        'linearicons-eye',
        'linearicons-eye-crossed',
        'linearicons-eye-plus',
        'linearicons-eye-minus',
        'linearicons-binoculars',
        'linearicons-binoculars2',
        'linearicons-hdd',
        'linearicons-hdd-down',
        'linearicons-hdd-up',
        'linearicons-floppy-disk',
        'linearicons-disc',
        'linearicons-tape2',
        'linearicons-printer',
        'linearicons-shredder',
        'linearicons-file-empty',
        'linearicons-file-add',
        'linearicons-file-check',
        'linearicons-file-lock',
        'linearicons-files',
        'linearicons-copy',
        'linearicons-compare',
        'linearicons-folder',
        'linearicons-folder-search',
        'linearicons-folder-plus',
        'linearicons-folder-minus',
        'linearicons-folder-download',
        'linearicons-folder-upload',
        'linearicons-folder-star',
        'linearicons-folder-heart',
        'linearicons-folder-user',
        'linearicons-folder-shared',
        'linearicons-folder-music',
        'linearicons-folder-picture',
        'linearicons-folder-film',
        'linearicons-scissors',
        'linearicons-paste',
        'linearicons-clipboard-empty',
        'linearicons-clipboard-pencil',
        'linearicons-clipboard-text',
        'linearicons-clipboard-check',
        'linearicons-clipboard-down',
        'linearicons-clipboard-left',
        'linearicons-clipboard-alert',
        'linearicons-clipboard-user',
        'linearicons-register',
        'linearicons-enter',
        'linearicons-exit',
        'linearicons-papers',
        'linearicons-news',
        'linearicons-reading',
        'linearicons-typewriter',
        'linearicons-document',
        'linearicons-document2',
        'linearicons-graduation-hat',
        'linearicons-license',
        'linearicons-license2',
        'linearicons-medal-empty',
        'linearicons-medal-first',
        'linearicons-medal-second',
        'linearicons-medal-third',
        'linearicons-podium',
        'linearicons-trophy',
        'linearicons-trophy2',
        'linearicons-music-note',
        'linearicons-music-note2',
        'linearicons-music-note3',
        'linearicons-playlist',
        'linearicons-playlist-add',
        'linearicons-guitar',
        'linearicons-trumpet',
        'linearicons-album',
        'linearicons-shuffle',
        'linearicons-repeat-one',
        'linearicons-repeat',
        'linearicons-headphones',
        'linearicons-headset',
        'linearicons-loudspeaker',
        'linearicons-equalizer',
        'linearicons-theater',
        'linearicons-3d-glasses',
        'linearicons-ticket',
        'linearicons-presentation',
        'linearicons-play',
        'linearicons-film-play',
        'linearicons-clapboard-play',
        'linearicons-media',
        'linearicons-film',
        'linearicons-film2',
        'linearicons-surveillance',
        'linearicons-surveillance2',
        'linearicons-camera',
        'linearicons-camera-crossed',
        'linearicons-camera-play',
        'linearicons-time-lapse',
        'linearicons-record',
        'linearicons-camera2',
        'linearicons-camera-flip',
        'linearicons-panorama',
        'linearicons-time-lapse2',
        'linearicons-shutter',
        'linearicons-shutter2',
        'linearicons-face-detection',
        'linearicons-flare',
        'linearicons-convex',
        'linearicons-concave',
        'linearicons-picture',
        'linearicons-picture2',
        'linearicons-picture3',
        'linearicons-pictures',
        'linearicons-book',
        'linearicons-audio-book',
        'linearicons-book2',
        'linearicons-bookmark',
        'linearicons-bookmark2',
        'linearicons-label',
        'linearicons-library',
        'linearicons-library2',
        'linearicons-contacts',
        'linearicons-profile',
        'linearicons-portrait',
        'linearicons-portrait2',
        'linearicons-user',
        'linearicons-user-plus',
        'linearicons-user-minus',
        'linearicons-user-lock',
        'linearicons-users',
        'linearicons-users2',
        'linearicons-users-plus',
        'linearicons-users-minus',
        'linearicons-group-work',
        'linearicons-woman',
        'linearicons-man',
        'linearicons-baby',
        'linearicons-baby2',
        'linearicons-baby3',
        'linearicons-baby-bottle',
        'linearicons-walk',
        'linearicons-hand-waving',
        'linearicons-jump',
        'linearicons-run',
        'linearicons-woman2',
        'linearicons-man2',
        'linearicons-man-woman',
        'linearicons-height',
        'linearicons-weight',
        'linearicons-scale',
        'linearicons-button',
        'linearicons-bow-tie',
        'linearicons-tie',
        'linearicons-socks',
        'linearicons-shoe',
        'linearicons-shoes',
        'linearicons-hat',
        'linearicons-pants',
        'linearicons-shorts',
        'linearicons-flip-flops',
        'linearicons-shirt',
        'linearicons-hanger',
        'linearicons-laundry',
        'linearicons-store',
        'linearicons-haircut',
        'linearicons-store-24',
        'linearicons-barcode',
        'linearicons-barcode2',
        'linearicons-barcode3',
        'linearicons-cashier',
        'linearicons-bag',
        'linearicons-bag2',
        'linearicons-cart',
        'linearicons-cart-empty',
        'linearicons-cart-full',
        'linearicons-cart-plus',
        'linearicons-cart-plus2',
        'linearicons-cart-add',
        'linearicons-cart-remove',
        'linearicons-cart-exchange',
        'linearicons-tag',
        'linearicons-tags',
        'linearicons-receipt',
        'linearicons-wallet',
        'linearicons-credit-card',
        'linearicons-cash-dollar',
        'linearicons-cash-euro',
        'linearicons-cash-pound',
        'linearicons-cash-yen',
        'linearicons-bag-dollar',
        'linearicons-bag-euro',
        'linearicons-bag-pound',
        'linearicons-bag-yen',
        'linearicons-coin-dollar',
        'linearicons-coin-euro',
        'linearicons-coin-pound',
        'linearicons-coin-yen',
        'linearicons-calculator',
        'linearicons-calculator2',
        'linearicons-abacus',
        'linearicons-vault',
        'linearicons-telephone',
        'linearicons-phone-lock',
        'linearicons-phone-wave',
        'linearicons-phone-pause',
        'linearicons-phone-outgoing',
        'linearicons-phone-incoming',
        'linearicons-phone-in-out',
        'linearicons-phone-error',
        'linearicons-phone-sip',
        'linearicons-phone-plus',
        'linearicons-phone-minus',
        'linearicons-voicemail',
        'linearicons-dial',
        'linearicons-telephone2',
        'linearicons-pushpin',
        'linearicons-pushpin2',
        'linearicons-map-marker',
        'linearicons-map-marker-user',
        'linearicons-map-marker-down',
        'linearicons-map-marker-check',
        'linearicons-map-marker-crossed',
        'linearicons-radar',
        'linearicons-compass2',
        'linearicons-map',
        'linearicons-map2',
        'linearicons-location',
        'linearicons-road-sign',
        'linearicons-calendar-empty',
        'linearicons-calendar-check',
        'linearicons-calendar-cross',
        'linearicons-calendar-31',
        'linearicons-calendar-full',
        'linearicons-calendar-insert',
        'linearicons-calendar-text',
        'linearicons-calendar-user',
        'linearicons-mouse',
        'linearicons-mouse-left',
        'linearicons-mouse-right',
        'linearicons-mouse-both',
        'linearicons-keyboard',
        'linearicons-keyboard-up',
        'linearicons-keyboard-down',
        'linearicons-delete',
        'linearicons-spell-check',
        'linearicons-escape',
        'linearicons-enter2',
        'linearicons-screen',
        'linearicons-aspect-ratio',
        'linearicons-signal',
        'linearicons-signal-lock',
        'linearicons-signal-80',
        'linearicons-signal-60',
        'linearicons-signal-40',
        'linearicons-signal-20',
        'linearicons-signal-0',
        'linearicons-signal-blocked',
        'linearicons-sim',
        'linearicons-flash-memory',
        'linearicons-usb-drive',
        'linearicons-phone',
        'linearicons-smartphone',
        'linearicons-smartphone-notification',
        'linearicons-smartphone-vibration',
        'linearicons-smartphone-embed',
        'linearicons-smartphone-waves',
        'linearicons-tablet',
        'linearicons-tablet2',
        'linearicons-laptop',
        'linearicons-laptop-phone',
        'linearicons-desktop',
        'linearicons-launch',
        'linearicons-new-tab',
        'linearicons-window',
        'linearicons-cable',
        'linearicons-cable2',
        'linearicons-tv',
        'linearicons-radio',
        'linearicons-remote-control',
        'linearicons-power-switch',
        'linearicons-power',
        'linearicons-power-crossed',
        'linearicons-flash-auto',
        'linearicons-lamp',
        'linearicons-flashlight',
        'linearicons-lampshade',
        'linearicons-cord',
        'linearicons-outlet',
        'linearicons-battery-power',
        'linearicons-battery-empty',
        'linearicons-battery-alert',
        'linearicons-battery-error',
        'linearicons-battery-low1',
        'linearicons-battery-low2',
        'linearicons-battery-low3',
        'linearicons-battery-mid1',
        'linearicons-battery-mid2',
        'linearicons-battery-mid3',
        'linearicons-battery-full',
        'linearicons-battery-charging',
        'linearicons-battery-charging2',
        'linearicons-battery-charging3',
        'linearicons-battery-charging4',
        'linearicons-battery-charging5',
        'linearicons-battery-charging6',
        'linearicons-battery-charging7',
        'linearicons-chip',
        'linearicons-chip-x64',
        'linearicons-chip-x86',
        'linearicons-bubble',
        'linearicons-bubbles',
        'linearicons-bubble-dots',
        'linearicons-bubble-alert',
        'linearicons-bubble-question',
        'linearicons-bubble-text',
        'linearicons-bubble-pencil',
        'linearicons-bubble-picture',
        'linearicons-bubble-video',
        'linearicons-bubble-user',
        'linearicons-bubble-quote',
        'linearicons-bubble-heart',
        'linearicons-bubble-emoticon',
        'linearicons-bubble-attachment',
        'linearicons-phone-bubble',
        'linearicons-quote-open',
        'linearicons-quote-close',
        'linearicons-dna',
        'linearicons-heart-pulse',
        'linearicons-pulse',
        'linearicons-syringe',
        'linearicons-pills',
        'linearicons-first-aid',
        'linearicons-lifebuoy',
        'linearicons-bandage',
        'linearicons-bandages',
        'linearicons-thermometer',
        'linearicons-microscope',
        'linearicons-brain',
        'linearicons-beaker',
        'linearicons-skull',
        'linearicons-bone',
        'linearicons-construction',
        'linearicons-construction-cone',
        'linearicons-pie-chart',
        'linearicons-pie-chart2',
        'linearicons-graph',
        'linearicons-chart-growth',
        'linearicons-chart-bars',
        'linearicons-chart-settings',
        'linearicons-cake',
        'linearicons-gift',
        'linearicons-balloon',
        'linearicons-rank',
        'linearicons-rank2',
        'linearicons-rank3',
        'linearicons-crown',
        'linearicons-lotus',
        'linearicons-diamond',
        'linearicons-diamond2',
        'linearicons-diamond3',
        'linearicons-diamond4',
        'linearicons-linearicons',
        'linearicons-teacup',
        'linearicons-teapot',
        'linearicons-glass',
        'linearicons-bottle2',
        'linearicons-glass-cocktail',
        'linearicons-glass2',
        'linearicons-dinner',
        'linearicons-dinner2',
        'linearicons-chef',
        'linearicons-scale2',
        'linearicons-egg',
        'linearicons-egg2',
        'linearicons-eggs',
        'linearicons-platter',
        'linearicons-steak',
        'linearicons-hamburger',
        'linearicons-hotdog',
        'linearicons-pizza',
        'linearicons-sausage',
        'linearicons-chicken',
        'linearicons-fish',
        'linearicons-carrot',
        'linearicons-cheese',
        'linearicons-bread',
        'linearicons-ice-cream',
        'linearicons-ice-cream2',
        'linearicons-candy',
        'linearicons-lollipop',
        'linearicons-coffee-bean',
        'linearicons-coffee-cup',
        'linearicons-cherry',
        'linearicons-grapes',
        'linearicons-citrus',
        'linearicons-apple',
        'linearicons-leaf',
        'linearicons-landscape',
        'linearicons-pine-tree',
        'linearicons-tree',
        'linearicons-cactus',
        'linearicons-paw',
        'linearicons-footprint',
        'linearicons-speed-slow',
        'linearicons-speed-medium',
        'linearicons-speed-fast',
        'linearicons-rocket',
        'linearicons-hammer2',
        'linearicons-balance',
        'linearicons-briefcase',
        'linearicons-luggage-weight',
        'linearicons-dolly',
        'linearicons-plane',
        'linearicons-plane-crossed',
        'linearicons-helicopter',
        'linearicons-traffic-lights',
        'linearicons-siren',
        'linearicons-road',
        'linearicons-engine',
        'linearicons-oil-pressure',
        'linearicons-coolant-temperature',
        'linearicons-car-battery',
        'linearicons-gas',
        'linearicons-gallon',
        'linearicons-transmission',
        'linearicons-car',
        'linearicons-car-wash',
        'linearicons-car-wash2',
        'linearicons-bus',
        'linearicons-bus2',
        'linearicons-car2',
        'linearicons-parking',
        'linearicons-car-lock',
        'linearicons-taxi',
        'linearicons-car-siren',
        'linearicons-car-wash3',
        'linearicons-car-wash4',
        'linearicons-ambulance',
        'linearicons-truck',
        'linearicons-trailer',
        'linearicons-scale-truck',
        'linearicons-train',
        'linearicons-ship',
        'linearicons-ship2',
        'linearicons-anchor',
        'linearicons-boat',
        'linearicons-bicycle',
        'linearicons-bicycle2',
        'linearicons-dumbbell',
        'linearicons-bench-press',
        'linearicons-swim',
        'linearicons-football',
        'linearicons-baseball-bat',
        'linearicons-baseball',
        'linearicons-tennis',
        'linearicons-tennis2',
        'linearicons-ping-pong',
        'linearicons-hockey',
        'linearicons-8ball',
        'linearicons-bowling',
        'linearicons-bowling-pins',
        'linearicons-golf',
        'linearicons-golf2',
        'linearicons-archery',
        'linearicons-slingshot',
        'linearicons-soccer',
        'linearicons-basketball',
        'linearicons-cube',
        'linearicons-3d-rotate',
        'linearicons-puzzle',
        'linearicons-glasses',
        'linearicons-glasses2',
        'linearicons-accessibility',
        'linearicons-wheelchair',
        'linearicons-wall',
        'linearicons-fence',
        'linearicons-wall2',
        'linearicons-icons',
        'linearicons-resize-handle',
        'linearicons-icons2',
        'linearicons-select',
        'linearicons-select2',
        'linearicons-site-map',
        'linearicons-earth',
        'linearicons-earth-lock',
        'linearicons-network',
        'linearicons-network-lock',
        'linearicons-planet',
        'linearicons-happy',
        'linearicons-smile',
        'linearicons-grin',
        'linearicons-tongue',
        'linearicons-sad',
        'linearicons-wink',
        'linearicons-dream',
        'linearicons-shocked',
        'linearicons-shocked2',
        'linearicons-tongue2',
        'linearicons-neutral',
        'linearicons-happy-grin',
        'linearicons-cool',
        'linearicons-mad',
        'linearicons-grin-evil',
        'linearicons-evil',
        'linearicons-wow',
        'linearicons-annoyed',
        'linearicons-wondering',
        'linearicons-confused',
        'linearicons-zipped',
        'linearicons-grumpy',
        'linearicons-mustache',
        'linearicons-tombstone-hipster',
        'linearicons-tombstone',
        'linearicons-ghost',
        'linearicons-ghost-hipster',
        'linearicons-halloween',
        'linearicons-christmas',
        'linearicons-easter-egg',
        'linearicons-mustache2',
        'linearicons-mustache-glasses',
        'linearicons-pipe',
        'linearicons-alarm',
        'linearicons-alarm-add',
        'linearicons-alarm-snooze',
        'linearicons-alarm-ringing',
        'linearicons-bullhorn',
        'linearicons-hearing',
        'linearicons-volume-high',
        'linearicons-volume-medium',
        'linearicons-volume-low',
        'linearicons-volume',
        'linearicons-mute',
        'linearicons-lan',
        'linearicons-lan2',
        'linearicons-wifi',
        'linearicons-wifi-lock',
        'linearicons-wifi-blocked',
        'linearicons-wifi-mid',
        'linearicons-wifi-low',
        'linearicons-wifi-low2',
        'linearicons-wifi-alert',
        'linearicons-wifi-alert-mid',
        'linearicons-wifi-alert-low',
        'linearicons-wifi-alert-low2',
        'linearicons-stream',
        'linearicons-stream-check',
        'linearicons-stream-error',
        'linearicons-stream-alert',
        'linearicons-communication',
        'linearicons-communication-crossed',
        'linearicons-broadcast',
        'linearicons-antenna',
        'linearicons-satellite',
        'linearicons-satellite2',
        'linearicons-mic',
        'linearicons-mic-mute',
        'linearicons-mic2',
        'linearicons-spotlights',
        'linearicons-hourglass',
        'linearicons-loading',
        'linearicons-loading2',
        'linearicons-loading3',
        'linearicons-refresh',
        'linearicons-refresh2',
        'linearicons-undo',
        'linearicons-redo',
        'linearicons-jump2',
        'linearicons-undo2',
        'linearicons-redo2',
        'linearicons-sync',
        'linearicons-repeat-one2',
        'linearicons-sync-crossed',
        'linearicons-sync2',
        'linearicons-repeat-one3',
        'linearicons-sync-crossed2',
        'linearicons-return',
        'linearicons-return2',
        'linearicons-refund',
        'linearicons-history',
        'linearicons-history2',
        'linearicons-self-timer',
        'linearicons-clock',
        'linearicons-clock2',
        'linearicons-clock3',
        'linearicons-watch',
        'linearicons-alarm2',
        'linearicons-alarm-add2',
        'linearicons-alarm-remove',
        'linearicons-alarm-check',
        'linearicons-alarm-error',
        'linearicons-timer',
        'linearicons-timer-crossed',
        'linearicons-timer2',
        'linearicons-timer-crossed2',
        'linearicons-download',
        'linearicons-upload',
        'linearicons-download2',
        'linearicons-upload2',
        'linearicons-enter-up',
        'linearicons-enter-down',
        'linearicons-enter-left',
        'linearicons-enter-right',
        'linearicons-exit-up',
        'linearicons-exit-down',
        'linearicons-exit-left',
        'linearicons-exit-right',
        'linearicons-enter-up2',
        'linearicons-enter-down2',
        'linearicons-enter-vertical',
        'linearicons-enter-left2',
        'linearicons-enter-right2',
        'linearicons-enter-horizontal',
        'linearicons-exit-up2',
        'linearicons-exit-down2',
        'linearicons-exit-left2',
        'linearicons-exit-right2',
        'linearicons-cli',
        'linearicons-bug',
        'linearicons-code',
        'linearicons-file-code',
        'linearicons-file-image',
        'linearicons-file-zip',
        'linearicons-file-audio',
        'linearicons-file-video',
        'linearicons-file-preview',
        'linearicons-file-charts',
        'linearicons-file-stats',
        'linearicons-file-spreadsheet',
        'linearicons-link',
        'linearicons-unlink',
        'linearicons-link2',
        'linearicons-unlink2',
        'linearicons-thumbs-up',
        'linearicons-thumbs-down',
        'linearicons-thumbs-up2',
        'linearicons-thumbs-down2',
        'linearicons-thumbs-up3',
        'linearicons-thumbs-down3',
        'linearicons-share',
        'linearicons-share2',
        'linearicons-share3',
        'linearicons-magnifier',
        'linearicons-file-search',
        'linearicons-find-replace',
        'linearicons-zoom-in',
        'linearicons-zoom-out',
        'linearicons-loupe',
        'linearicons-loupe-zoom-in',
        'linearicons-loupe-zoom-out',
        'linearicons-cross',
        'linearicons-menu',
        'linearicons-list',
        'linearicons-list2',
        'linearicons-list3',
        'linearicons-menu2',
        'linearicons-list4',
        'linearicons-menu3',
        'linearicons-exclamation',
        'linearicons-question',
        'linearicons-check',
        'linearicons-cross2',
        'linearicons-plus',
        'linearicons-minus',
        'linearicons-percent',
        'linearicons-chevron-up',
        'linearicons-chevron-down',
        'linearicons-chevron-left',
        'linearicons-chevron-right',
        'linearicons-chevrons-expand-vertical',
        'linearicons-chevrons-expand-horizontal',
        'linearicons-chevrons-contract-vertical',
        'linearicons-chevrons-contract-horizontal',
        'linearicons-arrow-up',
        'linearicons-arrow-down',
        'linearicons-arrow-left',
        'linearicons-arrow-right',
        'linearicons-arrow-up-right',
        'linearicons-arrows-merge',
        'linearicons-arrows-split',
        'linearicons-arrow-divert',
        'linearicons-arrow-return',
        'linearicons-expand',
        'linearicons-contract',
        'linearicons-expand2',
        'linearicons-contract2',
        'linearicons-move',
        'linearicons-tab',
        'linearicons-arrow-wave',
        'linearicons-expand3',
        'linearicons-expand4',
        'linearicons-contract3',
        'linearicons-notification',
        'linearicons-warning',
        'linearicons-notification-circle',
        'linearicons-question-circle',
        'linearicons-menu-circle',
        'linearicons-checkmark-circle',
        'linearicons-cross-circle',
        'linearicons-plus-circle',
        'linearicons-circle-minus',
        'linearicons-percent-circle',
        'linearicons-arrow-up-circle',
        'linearicons-arrow-down-circle',
        'linearicons-arrow-left-circle',
        'linearicons-arrow-right-circle',
        'linearicons-chevron-up-circle',
        'linearicons-chevron-down-circle',
        'linearicons-chevron-left-circle',
        'linearicons-chevron-right-circle',
        'linearicons-backward-circle',
        'linearicons-first-circle',
        'linearicons-previous-circle',
        'linearicons-stop-circle',
        'linearicons-play-circle',
        'linearicons-pause-circle',
        'linearicons-next-circle',
        'linearicons-last-circle',
        'linearicons-forward-circle',
        'linearicons-eject-circle',
        'linearicons-crop',
        'linearicons-frame-expand',
        'linearicons-frame-contract',
        'linearicons-focus',
        'linearicons-transform',
        'linearicons-grid',
        'linearicons-grid-crossed',
        'linearicons-layers',
        'linearicons-layers-crossed',
        'linearicons-toggle',
        'linearicons-rulers',
        'linearicons-ruler',
        'linearicons-funnel',
        'linearicons-flip-horizontal',
        'linearicons-flip-vertical',
        'linearicons-flip-horizontal2',
        'linearicons-flip-vertical2',
        'linearicons-angle',
        'linearicons-angle2',
        'linearicons-subtract',
        'linearicons-combine',
        'linearicons-intersect',
        'linearicons-exclude',
        'linearicons-align-center-vertical',
        'linearicons-align-right',
        'linearicons-align-bottom',
        'linearicons-align-left',
        'linearicons-align-center-horizontal',
        'linearicons-align-top',
        'linearicons-square',
        'linearicons-plus-square',
        'linearicons-minus-square',
        'linearicons-percent-square',
        'linearicons-arrow-up-square',
        'linearicons-arrow-down-square',
        'linearicons-arrow-left-square',
        'linearicons-arrow-right-square',
        'linearicons-chevron-up-square',
        'linearicons-chevron-down-square',
        'linearicons-chevron-left-square',
        'linearicons-chevron-right-square',
        'linearicons-check-square',
        'linearicons-cross-square',
        'linearicons-menu-square',
        'linearicons-prohibited',
        'linearicons-circle',
        'linearicons-radio-button',
        'linearicons-ligature',
        'linearicons-text-format',
        'linearicons-text-format-remove',
        'linearicons-text-size',
        'linearicons-bold',
        'linearicons-italic',
        'linearicons-underline',
        'linearicons-strikethrough',
        'linearicons-highlight',
        'linearicons-text-align-left',
        'linearicons-text-align-center',
        'linearicons-text-align-right',
        'linearicons-text-align-justify',
        'linearicons-line-spacing',
        'linearicons-indent-increase',
        'linearicons-indent-decrease',
        'linearicons-text-wrap',
        'linearicons-pilcrow',
        'linearicons-direction-ltr',
        'linearicons-direction-rtl',
        'linearicons-page-break',
        'linearicons-page-break2',
        'linearicons-sort-alpha-asc',
        'linearicons-sort-alpha-desc',
        'linearicons-sort-numeric-asc',
        'linearicons-sort-numeric-desc',
        'linearicons-sort-amount-asc',
        'linearicons-sort-amount-desc',
        'linearicons-sort-time-asc',
        'linearicons-sort-time-desc',
        'linearicons-sigma',
        'linearicons-pencil-line',
        'linearicons-hand',
        'linearicons-pointer-up',
        'linearicons-pointer-right',
        'linearicons-pointer-down',
        'linearicons-pointer-left',
        'linearicons-finger-tap',
        'linearicons-fingers-tap',
        'linearicons-reminder',
        'linearicons-fingers-crossed',
        'linearicons-fingers-victory',
        'linearicons-gesture-zoom',
        'linearicons-gesture-pinch',
        'linearicons-fingers-scroll-horizontal',
        'linearicons-fingers-scroll-vertical',
        'linearicons-fingers-scroll-left',
        'linearicons-fingers-scroll-right',
        'linearicons-hand2',
        'linearicons-pointer-up2',
        'linearicons-pointer-right2',
        'linearicons-pointer-down2',
        'linearicons-pointer-left2',
        'linearicons-finger-tap2',
        'linearicons-fingers-tap2',
        'linearicons-reminder2',
        'linearicons-gesture-zoom2',
        'linearicons-gesture-pinch2',
        'linearicons-fingers-scroll-horizontal2',
        'linearicons-fingers-scroll-vertical2',
        'linearicons-fingers-scroll-left2',
        'linearicons-fingers-scroll-right2',
        'linearicons-fingers-scroll-vertical3',
        'linearicons-border-style',
        'linearicons-border-all',
        'linearicons-border-outer',
        'linearicons-border-inner',
        'linearicons-border-top',
        'linearicons-border-horizontal',
        'linearicons-border-bottom',
        'linearicons-border-left',
        'linearicons-border-vertical',
        'linearicons-border-right',
        'linearicons-border-none',
        'linearicons-ellipsis',
        'icon-tiktok',
    ];

    let initIconsField = function () {
        $('.icon-select').each(function (index, el) {
            let value = $(el).children('option:selected').val();

            let options = '<option value="">' + $(el).data('empty') + '</option>';

            icons.forEach(function (value) {
                options += '<option value="' + value + '">' + value + '</option>';
            });

            $(el).html(options);
            $(el).val(value);

            $(el).select2({
                templateResult: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    return $('<span><i class="elegant-icon ' + state.id + '"></i></span>&nbsp; ' + state.text + '</span>');
                },
                width: '100%',
                templateSelection: function (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    return $('<span><i class="elegant-icon ' + state.id + '"></i></span>&nbsp; ' + state.text + '</span>');
                },
            });
        });
    }

    initIconsField();

    document.addEventListener('core-init-resources', function() {
        initIconsField();
    });
});
