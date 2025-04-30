<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <link rel="pingback" href="/xmlrpc.php">
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $category = getCategory();
        $adminNotifications = userNotifications();
    @endphp
    <title>{{ $general_setting['app_name'] ?? '' }} ||Contactos</title>
    <style>
      body {
        --booked_button_color: #56C477;
      }
    </style>

    <meta name='robots' content='noindex, nofollow' />
    <style>
      img:is([sizes="auto"i], [sizes^="auto,"i]) {
        contain-intrinsic-size: 3000px 1500px
      }
    </style>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts: Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link property="stylesheet" rel='stylesheet' id='trx_demo_icons-css' href='css/trx_demo_icons.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_demo_icons_animation-css' href='css/animation.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='sbi_styles-css' href='css/sbi-styles.min.css' type='text/css' media='all' />
    <style id='wp-emoji-styles-inline-css' type='text/css'>
    body {
            font-family: 'Nunito', sans-serif;
        }
      img.wp-smiley,
      img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 0.07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
      }
    </style>
    <style id='classic-theme-styles-inline-css' type='text/css'>
      /*! This file is auto-generated */
      .wp-block-button__link {
        color: #fff;
        background-color: #32373c;
        border-radius: 9999px;
        box-shadow: none;
        text-decoration: none;
        padding: calc(.667em + 2px) calc(1.333em + 2px);
        font-size: 1.125em
      }

      .wp-block-file__button {
        background: #32373c;
        color: #fff;
        text-decoration: none
      }
    </style>
    <style id='global-styles-inline-css' type='text/css'>
      :root {
        --wp--preset--aspect-ratio--square: 1;
        --wp--preset--aspect-ratio--4-3: 4/3;
        --wp--preset--aspect-ratio--3-4: 3/4;
        --wp--preset--aspect-ratio--3-2: 3/2;
        --wp--preset--aspect-ratio--2-3: 2/3;
        --wp--preset--aspect-ratio--16-9: 16/9;
        --wp--preset--aspect-ratio--9-16: 9/16;
        --wp--preset--color--black: #000000;
        --wp--preset--color--cyan-bluish-gray: #abb8c3;
        --wp--preset--color--white: #ffffff;
        --wp--preset--color--pale-pink: #f78da7;
        --wp--preset--color--vivid-red: #cf2e2e;
        --wp--preset--color--luminous-vivid-orange: #ff6900;
        --wp--preset--color--luminous-vivid-amber: #fcb900;
        --wp--preset--color--light-green-cyan: #7bdcb5;
        --wp--preset--color--vivid-green-cyan: #00d084;
        --wp--preset--color--pale-cyan-blue: #8ed1fc;
        --wp--preset--color--vivid-cyan-blue: #0693e3;
        --wp--preset--color--vivid-purple: #9b51e0;
        --wp--preset--color--bg-color: #f2f2f2;
        --wp--preset--color--bd-color: #e3e2e2;
        --wp--preset--color--text-dark: #15171a;
        --wp--preset--color--text-light: #8a8a8a;
        --wp--preset--color--text-link: #bfc943;
        --wp--preset--color--text-hover: #36c5d5;
        --wp--preset--color--text-link-2: #36c5d5;
        --wp--preset--color--text-hover-2: #bfc943;
        --wp--preset--color--text-link-3: #3945a7;
        --wp--preset--color--text-hover-3: #36c5d5;
        --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
        --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
        --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
        --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
        --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
        --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
        --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
        --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
        --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
        --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
        --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
        --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
        --wp--preset--font-size--small: 13px;
        --wp--preset--font-size--medium: 20px;
        --wp--preset--font-size--large: 36px;
        --wp--preset--font-size--x-large: 42px;
        --wp--preset--font-family--inter: "Inter", sans-serif;
        --wp--preset--font-family--cardo: Cardo;
        --wp--preset--spacing--20: 0.44rem;
        --wp--preset--spacing--30: 0.67rem;
        --wp--preset--spacing--40: 1rem;
        --wp--preset--spacing--50: 1.5rem;
        --wp--preset--spacing--60: 2.25rem;
        --wp--preset--spacing--70: 3.38rem;
        --wp--preset--spacing--80: 5.06rem;
        --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
        --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
        --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
        --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
        --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
      }

      :where(.is-layout-flex) {
        gap: 0.5em;
      }

      :where(.is-layout-grid) {
        gap: 0.5em;
      }

      body .is-layout-flex {
        display: flex;
      }

      .is-layout-flex {
        flex-wrap: wrap;
        align-items: center;
      }

      .is-layout-flex> :is(*, div) {
        margin: 0;
      }

      body .is-layout-grid {
        display: grid;
      }

      .is-layout-grid> :is(*, div) {
        margin: 0;
      }

      :where(.wp-block-columns.is-layout-flex) {
        gap: 2em;
      }

      :where(.wp-block-columns.is-layout-grid) {
        gap: 2em;
      }

      :where(.wp-block-post-template.is-layout-flex) {
        gap: 1.25em;
      }

      :where(.wp-block-post-template.is-layout-grid) {
        gap: 1.25em;
      }

      .has-black-color {
        color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-color {
        color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-color {
        color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-color {
        color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-color {
        color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-color {
        color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-color {
        color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-color {
        color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-color {
        color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-color {
        color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-color {
        color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-color {
        color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-black-background-color {
        background-color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-background-color {
        background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-background-color {
        background-color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-background-color {
        background-color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-background-color {
        background-color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-background-color {
        background-color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-background-color {
        background-color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-background-color {
        background-color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-background-color {
        background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-background-color {
        background-color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-black-border-color {
        border-color: var(--wp--preset--color--black) !important;
      }

      .has-cyan-bluish-gray-border-color {
        border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
      }

      .has-white-border-color {
        border-color: var(--wp--preset--color--white) !important;
      }

      .has-pale-pink-border-color {
        border-color: var(--wp--preset--color--pale-pink) !important;
      }

      .has-vivid-red-border-color {
        border-color: var(--wp--preset--color--vivid-red) !important;
      }

      .has-luminous-vivid-orange-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-amber-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
      }

      .has-light-green-cyan-border-color {
        border-color: var(--wp--preset--color--light-green-cyan) !important;
      }

      .has-vivid-green-cyan-border-color {
        border-color: var(--wp--preset--color--vivid-green-cyan) !important;
      }

      .has-pale-cyan-blue-border-color {
        border-color: var(--wp--preset--color--pale-cyan-blue) !important;
      }

      .has-vivid-cyan-blue-border-color {
        border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
      }

      .has-vivid-purple-border-color {
        border-color: var(--wp--preset--color--vivid-purple) !important;
      }

      .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
        background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
      }

      .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
        background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
      }

      .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
      }

      .has-luminous-vivid-orange-to-vivid-red-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
      }

      .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
        background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
      }

      .has-cool-to-warm-spectrum-gradient-background {
        background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
      }

      .has-blush-light-purple-gradient-background {
        background: var(--wp--preset--gradient--blush-light-purple) !important;
      }

      .has-blush-bordeaux-gradient-background {
        background: var(--wp--preset--gradient--blush-bordeaux) !important;
      }

      .has-luminous-dusk-gradient-background {
        background: var(--wp--preset--gradient--luminous-dusk) !important;
      }

      .has-pale-ocean-gradient-background {
        background: var(--wp--preset--gradient--pale-ocean) !important;
      }

      .has-electric-grass-gradient-background {
        background: var(--wp--preset--gradient--electric-grass) !important;
      }

      .has-midnight-gradient-background {
        background: var(--wp--preset--gradient--midnight) !important;
      }

      .has-small-font-size {
        font-size: var(--wp--preset--font-size--small) !important;
      }

      .has-medium-font-size {
        font-size: var(--wp--preset--font-size--medium) !important;
      }

      .has-large-font-size {
        font-size: var(--wp--preset--font-size--large) !important;
      }

      .has-x-large-font-size {
        font-size: var(--wp--preset--font-size--x-large) !important;
      }

      :where(.wp-block-post-template.is-layout-flex) {
        gap: 1.25em;
      }

      :where(.wp-block-post-template.is-layout-grid) {
        gap: 1.25em;
      }

      :where(.wp-block-columns.is-layout-flex) {
        gap: 2em;
      }

      :where(.wp-block-columns.is-layout-grid) {
        gap: 2em;
      }

      :root :where(.wp-block-pullquote) {
        font-size: 1.5em;
        line-height: 1.6;
      }
    </style>
    <link property="stylesheet" rel='stylesheet' id='contact-form-7-css' href='css/styles.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='booked-tooltipster-css' href='css/tooltipster.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='booked-tooltipster-theme-css' href='css/tooltipster-light.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='booked-animations-css' href='css/animations.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='booked-css-css' href='css/booked.css' type='text/css' media='all' />
    <style id='booked-css-inline-css' type='text/css'>
      #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active,
      #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td a.ui-state-active:hover,
      body #booked-profile-page input[type=submit].button-primary:hover,
      body .booked-list-view button.button:hover,
      body .booked-list-view input[type=submit].button-primary:hover,
      body div.booked-calendar input[type=submit].button-primary:hover,
      body .booked-modal input[type=submit].button-primary:hover,
      body div.booked-calendar .bc-head,
      body div.booked-calendar .bc-head .bc-col,
      body div.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,
      body #booked-profile-page .booked-profile-header,
      body #booked-profile-page .booked-tabs li.active a,
      body #booked-profile-page .booked-tabs li.active a:hover,
      body #booked-profile-page .appt-block .google-cal-button>a:hover,
      #ui-datepicker-div.booked_custom_date_picker .ui-datepicker-header {
        background: #2371B1 !important;
      }

      body #booked-profile-page input[type=submit].button-primary:hover,
      body div.booked-calendar input[type=submit].button-primary:hover,
      body .booked-list-view button.button:hover,
      body .booked-list-view input[type=submit].button-primary:hover,
      body .booked-modal input[type=submit].button-primary:hover,
      body div.booked-calendar .bc-head .bc-col,
      body div.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover,
      body #booked-profile-page .booked-profile-header,
      body #booked-profile-page .appt-block .google-cal-button>a:hover {
        border-color: #2371B1 !important;
      }

      body div.booked-calendar .bc-row.days,
      body div.booked-calendar .bc-row.days .bc-col,
      body .booked-calendarSwitcher.calendar,
      body #booked-profile-page .booked-tabs,
      #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead,
      #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead th {
        background: #014163 !important;
      }

      body div.booked-calendar .bc-row.days .bc-col,
      body #booked-profile-page .booked-tabs {
        border-color: #014163 !important;
      }

      #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a,
      #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a:hover,
      body #booked-profile-page input[type=submit].button-primary,
      body div.booked-calendar input[type=submit].button-primary,
      body .booked-list-view button.button,
      body .booked-list-view input[type=submit].button-primary,
      body .booked-list-view button.button,
      body .booked-list-view input[type=submit].button-primary,
      body .booked-modal input[type=submit].button-primary,
      body div.booked-calendar .booked-appt-list .timeslot .timeslot-people button,
      body #booked-profile-page .booked-profile-appt-list .appt-block.approved .status-block,
      body #booked-profile-page .appt-block .google-cal-button>a,
      body .booked-modal p.booked-title-bar,
      body div.booked-calendar .bc-col:hover .date span,
      body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,
      body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover,
      .booked-ms-modal .booked-book-appt,
      body #booked-profile-page .booked-tabs li a .counter {
        background: #56C477;
      }

      body #booked-profile-page input[type=submit].button-primary,
      body div.booked-calendar input[type=submit].button-primary,
      body .booked-list-view button.button,
      body .booked-list-view input[type=submit].button-primary,
      body .booked-list-view button.button,
      body .booked-list-view input[type=submit].button-primary,
      body .booked-modal input[type=submit].button-primary,
      body #booked-profile-page .appt-block .google-cal-button>a,
      body div.booked-calendar .booked-appt-list .timeslot .timeslot-people button,
      body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active,
      body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover {
        border-color: #56C477;
      }

      body .booked-modal .bm-window p i.fa,
      body .booked-modal .bm-window a,
      body .booked-appt-list .booked-public-appointment-title,
      body .booked-modal .bm-window p.appointment-title,
      .booked-ms-modal.visible:hover .booked-book-appt {
        color: #56C477;
      }

      .booked-appt-list .timeslot.has-title .booked-public-appointment-title {
        color: inherit;
      }
    </style>
    <link property="stylesheet" rel='stylesheet' id='elementor-post-783-css' href='css/post-783.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-post-585-css' href='css/post-585.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_addons-icons-css' href='css/trx_addons_icons.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='jquery-swiper-css' href='css/swiper.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='magnific-popup-css' href='css/magnific-popup.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_addons-css' href='css/__styles.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_addons-animation-css' href='css/trx_addons.animation.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_demo_panels-css' href='css/trx_demo_panels.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_socials-icons-css' href='css/trx_socials_icons.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_socials-widget_instagram-css' href='css/instagram.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='woocommerce-layout-css' href='css/woocommerce-layout.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='woocommerce-smallscreen-css' href='css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
    <link property="stylesheet" rel='stylesheet' id='woocommerce-general-css' href='css/woocommerce.css' type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
      .woocommerce form .form-row .required {
        visibility: visible;
      }
    </style>
    <link property="stylesheet" rel='stylesheet' id='tribe-events-v2-single-skeleton-css' href='css/tribe-events-single-skeleton.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='tribe-events-v2-single-skeleton-full-css' href='css/tribe-events-single-full.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='tec-events-elementor-widgets-base-styles-css' href='css/widget-base.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='booked-wc-fe-styles-css' href='css/frontend-style.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='font-awesome-official-css' href='css/all.css' type='text/css' media='all'  />
    <link property="stylesheet" rel='stylesheet' id='esg-plugin-settings-css' href='css/settings.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='tp-fontello-css' href='css/fontello.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='tp-open-sans-css' href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='tp-raleway-css' href='https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='tp-droid-serif-css' href='https://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-icons-css' href='css/elementor-icons.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-frontend-css' href='css/frontend.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-post-3020-css' href='css/post-3020.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='sbistyles-css' href='css/sbi-styles.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='font-awesome-5-all-css' href='css/all.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='font-awesome-4-shim-css' href='css/v4-shims.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='widget-spacer-css' href='css/widget-spacer.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='widget-text-editor-css' href='css/widget-text-editor.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-post-532-css' href='css/post-532.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-font-google_fonts-css' href='https://fonts.googleapis.com/css?family=Roboto:300,300italic,400,400italic,700,700italic%7CNunito:400,500,600,700,800,900&#038;subset=latin,latin-ext' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='fontello-icons-css' href='css/fontello.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='fontello-icons-css' href='css/fontello(1).css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-main-css' href='css/style.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-plugins-css' href='css/__plugins.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-animations-css' href='css/animations.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-custom-css' href='css/__custom.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-color-default-css' href='css/__colors-default.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-color-dark-css' href='css/__colors-dark.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='mediaelement-css' href='css/mediaelementplayer-legacy.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='wp-mediaelement-css' href='css/wp-mediaelement.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='trx_addons-responsive-css' href='css/__responsive.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='neptunus-responsive-css' href='css/__responsive(1).css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='font-awesome-official-v4shim-css' href='css/v4-shims.css' type='text/css' media='all'  />
    <link property="stylesheet" rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto' type='text/css' media='all' />

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" id="jquery-core-js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate.min.js') }}" id="jquery-migrate-js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.min.js') }}" id="jquery-blockui-js" defer></script>



    <style type="text/css">
      <!--
      #page_preloader {
        background-color: #ffffff !important;
        background-image: url(preloader.gif);
      }
      -->
    </style>

    <noscript>
      <style>
        .woocommerce-product-gallery {
          opacity: 1 !important;
        }
      </style>
    </noscript>
    <meta name="generator" content="Elementor 3.26.4; settings: css_print_method-external, google_font-enabled, font_display-auto">
    <style type="text/css">
      .recentcomments a {
        display: inline !important;
        padding: 0 !important;
        margin: 0 !important;
      }
    </style>
    <style>
      .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
      .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
        background-image: none !important;
      }

      @media screen and (max-height: 1024px) {

        .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
          background-image: none !important;
        }
      }

      @media screen and (max-height: 640px) {

        .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
          background-image: none !important;
        }
      }
    </style>
    <meta name="generator" content="Powered by Slider Revolution 6.7.25 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
    <style class='wp-fonts-local' type='text/css'>
      @font-face {
        font-family: Inter;
        font-style: normal;
        font-weight: 300 900;
        font-display: fallback;
        src: url('fonts/Inter-VariableFont_slnt,wght.woff2') format('woff2');
        font-stretch: normal;
      }

      @font-face {
        font-family: Cardo;
        font-style: normal;
        font-weight: 400;
        font-display: fallback;
        src: url('fonts/cardo_normal_400.woff2') format('woff2');
      }
    </style>
  <link rel="icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">
    <meta name="msapplication-TileImage" content="favi-270x270.png" />
    <script>
      function setREVStartSize(e) {
        //window.requestAnimationFrame(function() {
        window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
        window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
        try {
          var pw = document.getElementById(e.c).parentNode.offsetWidth,
            newh;
          pw = pw === 0 || isNaN(pw) || (e.l == "fullwidth" || e.layout == "fullwidth") ? window.RSIW : pw;
          e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
          e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
          e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
          e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
          e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
          e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
          e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
          if (e.layout === "fullscreen" || e.l === "fullscreen") newh = Math.max(e.mh, window.RSIH);
          else {
            e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
            for (var i in e.rl)
              if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
            e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
            e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
            for (var i in e.rl)
              if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];
            var nl = new Array(e.rl.length),
              ix = 0,
              sl;
            e.tabw = e.tabhide >= pw ? 0 : e.tabw;
            e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
            e.tabh = e.tabhide >= pw ? 0 : e.tabh;
            e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
            for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
            sl = nl[0];
            for (var i in nl)
              if (sl > nl[i] && nl[i] > 0) {
                sl = nl[i];
                ix = i;
              }
            var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
            newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
          }
          var el = document.getElementById(e.c);
          if (el !== null && el) el.style.height = newh + "px";
          el = document.getElementById(e.c + "_wrapper");
          if (el !== null && el) {
            el.style.height = newh + "px";
            el.style.display = "block";
          }
        } catch (e) {
          console.log("Failure at Presize of Slider:" + e)
        }
        //});
      };
    </script>
    <style type="text/css" id="trx_addons-inline-styles-inline-css">
      .trx_addons_inline_117190386 img {
        max-height: 60px;
      }

      .trx_addons_inline_1014786671 img {
        max-height: 60px;
      }

      .trx_addons_inline_1943992336 {}
    </style>
    <style type="text/css">
      .trx_demo_inline_1577344755 {
        color: #ffffff !important;
        border-color: #ffaa5f !important;
        background-color: #ffaa5f !important;
      }

      .trx_demo_inline_55919804:hover {
        color: #ffffff !important;
        border-color: #cc884c !important;
        background-color: #cc884c !important;
      }
    </style>
    <link property="stylesheet" rel="stylesheet" id="contact-form-7-css" href="{{ asset('css/styles.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="booked-tooltipster-css" href="{{ asset('css/tooltipster.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="booked-tooltipster-theme-css" href="{{ asset('css/tooltipster-light.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="booked-animations-css" href="{{ asset('css/animations.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="booked-css-css" href="{{ asset('css/booked.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-post-783-css" href="{{ asset('css/post-783.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-post-585-css" href="{{ asset('css/post-585.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_addons-icons-css" href="{{ asset('css/trx_addons_icons.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="jquery-swiper-css" href="{{ asset('css/swiper.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="magnific-popup-css" href="{{ asset('css/magnific-popup.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_addons-css" href="{{ asset('css/__styles.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_addons-animation-css" href="{{ asset('css/trx_addons.animation.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_demo_panels-css" href="{{ asset('css/trx_demo_panels.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_socials-icons-css" href="{{ asset('css/trx_socials_icons.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_socials-widget_instagram-css" href="{{ asset('css/instagram.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="woocommerce-layout-css" href="{{ asset('css/woocommerce-layout.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="woocommerce-smallscreen-css" href="{{ asset('css/woocommerce-smallscreen.css') }}" type="text/css" media="only screen and (max-width: 768px)">
<link property="stylesheet" rel="stylesheet" id="woocommerce-general-css" href="{{ asset('css/woocommerce.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="tribe-events-v2-single-skeleton-css" href="{{ asset('css/tribe-events-single-skeleton.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="tribe-events-v2-single-skeleton-full-css" href="{{ asset('css/tribe-events-single-full.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="tec-events-elementor-widgets-base-styles-css" href="{{ asset('css/widget-base.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="booked-wc-fe-styles-css" href="{{ asset('css/frontend-style.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="font-awesome-official-css" href="{{ asset('css/all.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="esg-plugin-settings-css" href="{{ asset('css/settings.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="tp-fontello-css" href="{{ asset('css/fontello.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-icons-css" href="{{ asset('css/elementor-icons.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-frontend-css" href="{{ asset('css/frontend.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-post-3020-css" href="{{ asset('css/post-3020.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="sbistyles-css" href="{{ asset('css/sbi-styles.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="font-awesome-5-all-css" href="{{ asset('css/all.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="font-awesome-4-shim-css" href="{{ asset('css/v4-shims.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="widget-spacer-css" href="{{ asset('css/widget-spacer.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="widget-text-editor-css" href="{{ asset('css/widget-text-editor.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-post-532-css" href="{{ asset('css/post-532.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="fontello-icons-css" href="{{ asset('css/fontello(1).css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-main-css" href="{{ asset('css/style.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-plugins-css" href="{{ asset('css/__plugins.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-animations-css" href="{{ asset('css/animations.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-custom-css" href="{{ asset('css/__custom.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-color-default-css" href="{{ asset('css/__colors-default.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-color-dark-css" href="{{ asset('css/__colors-dark.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="mediaelement-css" href="{{ asset('css/mediaelementplayer-legacy.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="wp-mediaelement-css" href="{{ asset('css/wp-mediaelement.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="trx_addons-responsive-css" href="{{ asset('css/__responsive.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="neptunus-responsive-css" href="{{ asset('css/__responsive(1).css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="wc-blocks-style-css" href="{{ asset('css/wc-blocks.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-post-831-css" href="{{ asset('css/post-831.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="elementor-post-1433-css" href="{{ asset('css/post-1433.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="swiper-css" href="{{ asset('css/swiper.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="e-swiper-css" href="{{ asset('css/e-swiper.min.css') }}" type="text/css" media="all">
<link property="stylesheet" rel="stylesheet" id="rs-plugin-settings-css" href="{{ asset('css/rs6.css') }}" type="text/css" media="all">

    <link href="//fonts.googleapis.com/css?family=Nunito:400%2C300%2C700%7CRoboto:400&display=swap" rel="stylesheet" property="stylesheet" media="all" type="text/css">

    <link property="stylesheet" rel='stylesheet' id='wc-blocks-style-css' href='css/wc-blocks.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-post-831-css' href='css/post-831.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='elementor-post-1433-css' href='css/post-1433.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='swiper-css' href='css/swiper.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='e-swiper-css' href='css/e-swiper.min.css' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='rs-plugin-settings-css' href='css/rs6.css' type='text/css' media='all' />
  </head>
  <body class="page-template-default page page-id-532 wp-custom-logo wp-embed-responsive theme-neptunus ua_chrome preloader woocommerce-no-js tribe-no-js page-template-neptunus body_tag scheme_default blog_mode_page body_style_wide is_single sidebar_hide expand_content remove_margins trx_addons_present header_type_custom header_style_header-custom-831 header_position_default menu_style_top no_layout elementor-default elementor-kit-3020 elementor-page elementor-page-532">
    <div id="page_preloader"></div>
    <div class="body_wrap">
      <div class="page_wrap">
       <header
                class="top_panel top_panel_custom top_panel_custom_831 top_panel_custom_header-dark-scheme without_bg_image">
                <div data-elementor-type="cpt_layouts" data-elementor-id="831" class="elementor elementor-831">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-35462693 elementor-section-content-middle sc_layouts_row sc_layouts_row_type_compact sc_layouts_hide_on_wide sc_layouts_hide_on_desktop sc_layouts_hide_on_notebook sc_layouts_hide_on_tablet scheme_default elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="35462693" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-extended">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5e0020ef sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="5e0020ef" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-13666f3 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_logo"
                                        data-id="13666f3" data-element_type="widget"
                                        data-widget_type="trx_sc_layouts_logo.default">
                                        <div class="elementor-widget-container">
                                            <a href="{{ url('/') }}" id="trx_sc_layouts_logo_2013124363"
                                                class="sc_layouts_logo sc_layouts_logo_default trx_addons_inline_117190386">
                                                <img loading="lazy" class="logo_image"
                                                    src="{{ asset($general_setting['app_logo'] ?? '') }}"
                                                    srcset="{{ asset($general_setting['app_logo'] ?? '') }}" alt="Neptunus" width="210" height="47">
                                            </a>
                                            <!-- /.sc_layouts_logo -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6d226fde sc_layouts_column sc_layouts_column_align_right sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="6d226fde" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">

                                    <div class="sc_layouts_item elementor-element elementor-element-34028534 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_menu"
                                        data-id="34028534" data-element_type="widget"
                                        data-widget_type="trx_sc_layouts_menu.default">
                                        <div class="elementor-widget-container">
                                            <div id="trx_sc_layouts_menu_231278735"
                                                class="sc_layouts_iconed_text sc_layouts_menu_mobile_button_burger sc_layouts_menu_mobile_button without_menu">
                                                <a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#"
                                                    id="mobileMenuToggle">
                                                    <span
                                                        class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-6c2a9af elementor-section-full_width elementor-section-content-middle sc_layouts_row sc_layouts_row_type_compact sc_layouts_hide_on_mobile scheme_default elementor-section-height-default elementor-section-height-default"
                        data-id="6c2a9af" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e504aa8 sc_layouts_column sc_layouts_column_align_left sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="e504aa8" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-ab375fc sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_logo"
                                        data-id="ab375fc" data-element_type="widget"
                                        data-widget_type="trx_sc_layouts_logo.default">
                                        <div class="elementor-widget-container">
                                            <a href="{{ url('index') }}" id="trx_sc_layouts_logo_1358723303"
                                                class="sc_layouts_logo sc_layouts_logo_default trx_addons_inline_1014786671">
                                                <img loading="lazy" class="logo_image"
                                                    src="{{ asset($general_setting['app_logo'] ?? '') }}"
                                                    srcset="{{ asset($general_setting['app_logo'] ?? '') }}" alt="Neptunus" width="210" height="47">
                                            </a>
                                            <!-- /.sc_layouts_logo -->
                                        </div>
                                    </div>
                                    <div class="sc_layouts_item elementor-element elementor-element-7b889b4 sc_fly_static elementor-widget elementor-widget-trx_sc_layouts_menu"
                                        data-id="7b889b4" data-element_type="widget"
                                        data-widget_type="trx_sc_layouts_menu.default">
                                        <div class="elementor-widget-container">
                                            <nav class="sc_layouts_menu sc_layouts_menu_default sc_layouts_menu_dir_horizontal menu_hover_fade"
                                                id="trx_sc_layouts_menu_535292852" data-animation-in="none"
                                                data-animation-out="none">
                                                <ul id="menu_main" class="sc_layouts_menu_nav menu_main_nav">
                                                    <li id="menu-item-197"
                                                        class="{{ Request::is('index') || Request::is('/') ? 'current-menu-item' : '' }} menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-197">
                                                        <a href="{{ url('index') }}">
                                                            <span>Inicio</span>
                                                        </a>

                                                    </li>
                                                    <li id="menu-item-305" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-305">
  <a href="#nuestros-servicios" class="sf-with-ul">
    <span>Nuestros servicios</span>
  </a>
  <ul class="sub-menu" style="display: none;">
       <li id="menu-item-302" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-302">
      <a href="{{ url('membership') }}">
        <span>Membresía Vitalicia La Joya</span>
      </a>
    </li>

    <li id="menu-item-2605" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605">
      <a href="{{ url('ownership') }}">
        <span>PROPIEDAD FRACCIONAL CABAÑAS</span>
      </a>
    </li>
     <li id="menu-item-2605" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605">
      <a href="{{ url('land') }}">
        <span>DESARROLLO INMOBILIARIO</span>
      </a>
    </li>
    <li id="menu-item-304" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-304">
      <a href="{{ url('vacancy') }}">
        <span>Vacaciones Inteligentes por Vacancy Rewards</span>
      </a>
    </li>
  </ul>
</li>
                                                    {{-- <li id="menu-item-198"
                                                        class="{{ Request::is('service') || Request::is('/') ? 'current-menu-item' : '' }} menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-198">
                                                        <a href="{{ url('service') }}">
                                                            <span>Services </span>
                                                        </a>

                                                    </li> --}}
                                                    <li id="menu-item-418"
                                                        class="{{ Request::is('about') || Request::is('/') ? 'current-menu-item' : '' }} menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-418">
                                                        <a href="{{ url('about') }}">
                                                            <span>Sobre nosotros</span>
                                                        </a>

                                                    </li>
                                                    {{-- <li id="menu-item-203"
                                                        class="{{ Request::is('news') || Request::is('/') ? 'current-menu-item' : '' }} menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-203">
                                                        <a href="{{ url('news') }}">
                                                            <span>News</span>
                                                        </a>

                                                    </li>

                                                    <li id="menu-item-305" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-305
    {{ Request::is('news') || Request::is('/') ? 'current-menu-ancestor current-menu-parent' : '' }}">
                                                        <a href="#" aria-haspopup="true" aria-expanded="false">
                                                            <span>Details</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-304" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-304
            {{ Request::is('faq') ? 'current-menu-item' : '' }}">
                                                                <a href="{{ url('faq') }}">
                                                                    <span>FAQs</span>
                                                                </a>
                                                            </li>
                                                            <li id="menu-item-2605" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605
            {{ Request::is('events') ? 'current-menu-item' : '' }}">
                                                                <a href="{{ url('events') }}">
                                                                    <span>Events</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li> --}}

                                                    <li id="menu-item-216" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
    {{ Request::is('contact') ? 'current-menu-item' : '' }}">
                                                        <a href="{{ url('contact') }}">
                                                            <span>Contacto</span>
                                                        </a>
                                                    </li>
<li id="menu-item-216" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
    {{ Request::is('segundaFase') ? 'current-menu-item' : '' }}">
                                                        <a href="{{ url('segundaFase') }}">
                                                            <span> SEGUNDA FASE</span>
                                                        </a>
                                                    </li>
                                                     @if(!empty($user_session))
 <li id="menu-item-216" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
    {{ Request::is('dashboard') ? 'current-menu-item' : '' }}">
                                                         <a href="{{ url('dashboard') }}" style="text-decoration: none; color: inherit;">
                            @if (!empty($user_session->profile_photo))
                            <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $user_session->name }}" width="24" height="24">

                            <span>{{ $user_session->name  }}</span>
                        @else
                        <img src="{{ asset('149071.png') }}" alt="Perfil" class="me-2 rounded-circle" width="24" height="24">

                        <span>{{ $user_session->name  }}</span>
                        @endif


                        </a>
                                                    </li>
                                                    <li id="menu-item-216" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
                                                        {{ Request::is('logout') ? 'current-menu-item' : '' }}">

                                                        <a href="{{ url('logout') }}"
                                                        class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left">
                                                        <span class="sc_button_text"><i class="fa-solid fa-right-to-bracket"></i>
                                                            <span class="sc_button_title">Logout</span>
                                                        </span>
                                                        <!-- /.sc_button_text -->
                                                    </a>
                                                                                                            <!-- /.sc_button -->

                                                                                                        </li>
                                                    @else
                                                    <li id="menu-item-216" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
    {{ Request::is('Userlogin') ? 'current-menu-item' : '' }}">
    <a href="{{ url('Userlogin') }}"
    class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left">
    <span class="sc_button_text"><i class="fa-solid fa-right-to-bracket"></i>
        <span class="sc_button_title">Zona de miembros</span>
    </span>
    <!-- /.sc_button_text -->
</a>

                                                    </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                            <!-- /.sc_layouts_menu -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-da45d03 sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_right sc_inner_width_none"
                                data-id="da45d03" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">


                                    <div class="sc_layouts_item elementor-element elementor-element-b4f9069 sc_layouts_hide_on_tablet sc_layouts_hide_on_mobile scheme_dark sc_fly_static elementor-widget elementor-widget-trx_sc_button"
                                        data-id="b4f9069" data-element_type="widget"
                                        data-widget_type="trx_sc_button.default">
                                        <div class="elementor-widget-container">
                                            <div id="trx_sc_button_407848870" class="sc_item_button sc_button_wrap">
                                                <a href="https://wa.me/59174000355"
                                                    class="sc_button hide_on_mobile hide_on_tablet sc_button_default sc_button_size_normal sc_button_icon_right color_style_link3">
                                                    <span class="sc_button_text sc_align_center">
                                                        <span class="sc_button_title">Contactanos</span>
                                                    </span>
                                                    <!-- /.sc_button_text -->
                                                </a>
                                                <!-- /.sc_button -->
                                            </div>
                                            <!-- /.sc_item_button -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </header>
            <div class="menu_mobile_overlay"></div>
            <div class="menu_mobile menu_mobile_fullscreen scheme_dark" id="mobileMenu">
                <div class="menu_mobile_inner">
                    <a class="menu_mobile_close theme_button_close">
                        <span class="theme_button_close_icon"></span>
                    </a>
                    <a class="sc_layouts_logo" href="{{ url('index') }}">
                        <img loading="lazy" src="{{ asset($general_setting['app_logo'] ?? '') }}"
                            srcset="{{ asset($general_setting['app_logo'] ?? '') }}" alt="Neptunus" width="210" height="47">
                    </a>
                    <nav class="menu_mobile_nav_area" itemscope="itemscope"
                        itemtype="http://schema.org/SiteNavigationElement">
                        <ul id="menu_mobile" class="menu_mobile_nav">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-197
                                {{ Request::is('index') || Request::is('/') ? 'current-menu-item current-menu-ancestor current-menu-parent' : '' }}">
                                <a href="{{ url('index') }}">
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-305">
  <a href="#nuestros-servicios">
    <span>Nuestros servicios</span>
    <span class="open_child_menu"></span>
  </a>
  <ul class="sub-menu layouts_inited" style="display: none;">
   <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-302">
      <a href="{{ url('membership') }}">
        <span>Membresía Vitalicia La Joya</span>
      </a>
    </li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605">
      <a href="{{ url('ownership') }}">
        <span>PROPIEDAD FRACCIONAL CABAÑAS</span>
      </a>
    </li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605">
      <a href="{{ url('land') }}">
        <span>DESARROLLO INMOBILIARIO</span>
      </a>
    </li>
     <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-304">
      <a href="{{ url('vacancy') }}">
        <span>Vacaciones Inteligentes por Vacancy Rewards</span>
      </a>
    </li>
  </ul>
</li>
                            {{-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-198
                                {{ Request::is('service') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('service') }}">
                                    <span>Service </span>
                                </a>
                            </li> --}}
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-418
                                {{ Request::is('about') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('about') }}">
                                    <span>Sobre nosotros</span>
                                </a>
                            </li>
                            {{-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-203
                                {{ Request::is('news') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('news') }}">
                                    <span>News</span>
                                </a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605
                                {{ Request::is('events') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('events') }}">
                                    <span>Events</span>
                                </a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2605
                                {{ Request::is('faq') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('faq') }}">
                                    <span>FAQs</span>
                                </a>
                            </li> --}}


                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
                                {{ Request::is('contact') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('contact') }}">
                                    <span>Contacto</span>
                                </a>
                            </li>
                             <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
                                {{ Request::is('segundaFase') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('segundaFase') }}">
                                    <span> SEGUNDA FASE</span>
                                </a>
                            </li>
                            @if (!empty($user_session))
                              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
                                {{ Request::is('dashboard') ? 'current-menu-item' : '' }}">
                                 <a href="{{ url('dashboard') }}" style="text-decoration: none; color: inherit;">
                            @if (!empty($user_session->profile_photo))
                            <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $user_session->name }}" width="24" height="24">

                            <span>{{ $user_session->name  }}</span>
                        @else
                        <img src="{{ asset('149071.png') }}" alt="Perfil" class="me-2 rounded-circle" width="24" height="24">

                        <span>{{ $user_session->name  }}</span>
                        @endif


                        </a>
                            </li>
                            <a href="{{ url('logout') }}"
                                                        class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left">
                                                        <span class="sc_button_text"><i class="fa-solid fa-right-to-bracket"></i>
                                                            <span class="sc_button_title">Logout</span>
                                                        </span>
                                                        <!-- /.sc_button_text -->
                                                    </a>
                             @else
                              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-216
                                {{ Request::is('Userlogin') ? 'current-menu-item' : '' }}">
                                <a href="{{ url('Userlogin') }}"
                                    class="sc_button sc_button_default sc_button_size_normal sc_button_icon_left">
                                    <span class="sc_button_text"><i class="fa-solid fa-right-to-bracket"></i>
                                        <span class="sc_button_title">Zona de miembros</span>
                                    </span>
                                    <!-- /.sc_button_text -->
                                </a>

                            </li>
                             @endif
                        </ul>

                    </nav>
                    {{-- <div class="search_wrap search_style_normal search_mobile">
                        <div class="search_form_wrap">
                            <form role="search" method="get" class="search_form" action="/">
                                <input type="hidden"  name="post_types">
                                <input type="text" class="search_field" placeholder="Search"  name="s">
                                <button type="submit" class="search_submit trx_addons_icon-search"></button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="socials_mobile">
                        <a target="_blank" href="{{ $general_setting['facebook_url'] ?? '' }}"
                            class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                            <span class="social_icon social_icon_facebook">
                                <span class="icon-facebook"></span>
                            </span>
                        </a>
                         <a target="_blank" href="{{ $general_setting['youtube_url'] ?? '' }}"
    class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
    <span class="social_icon social_icon_youtube">
        <span class="icon-youtube"></span>
    </span>
</a><a target="_blank"
   href="{{ $general_setting['tiktok_url'] ?? '' }}"
   class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
   <span class="social_icon social_icon_tiktok">
       <span class="fab fa-tiktok"></span>

   </span>
</a>

                        <a target="_blank" href="{{ $general_setting['instagram_url'] ?? '' }}"
                            class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                            <span class="social_icon social_icon_instagramm">
                                <span class="icon-instagramm"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function () {
    // Get the elements
    const mobileMenuToggle = document.getElementById('mobileMenuToggle'); // The menu toggle button
    const mobileMenu = document.getElementById('mobileMenu'); // The mobile menu
    const mobileMenuClose = document.querySelector('.theme_button_close'); // The close button

    // Add event listener to the mobile menu toggle button
    if (mobileMenuToggle && mobileMenu && mobileMenuClose) {
        mobileMenuToggle.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default action
            mobileMenu.classList.toggle('opened'); // Toggle the 'opened' class
        });

        // Add event listener to the close button to remove the 'opened' class
        mobileMenuClose.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default action
            mobileMenu.classList.remove('opened'); // Remove the 'opened' class
        });
    }

    // Handle submenu toggle
    document.querySelectorAll('.open_child_menu').forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default action

            // Find the parent menu item
            const menuItem = toggle.closest('.menu-item-has-children');

            if (menuItem) {
                menuItem.classList.toggle('opened'); // Toggle 'opened' class on menu item

                // Find the submenu and toggle its display
                const subMenu = menuItem.querySelector('.sub-menu');
                if (subMenu) {
                    if (subMenu.style.display === 'block') {
                        subMenu.style.display = 'none';
                    } else {
                        subMenu.style.display = 'block';
                    }
                }
            }
        });
    });
});


            </script>
        <div class="page_content_wrap" style="
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      ">
  <div class="content_wrap">
    <div class="content">
      <article id="post-193" data-post-id="193" class="post_item_single post_type_page post-193 page type-page status-publish hentry">
        <div class="post_content entry-content">
          <div data-elementor-type="wp-post" data-elementor-id="193" class="elementor elementor-193">

            <section class="elementor-section elementor-top-section elementor-element elementor-element-d10f953 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d10f953" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="width: 1903px; left: -351.5px;">
              <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-43f7ec8 sc_inner_width_none sc_layouts_column_icons_position_left" data-id="43f7ec8" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-88f208b sc_fly_static elementor-widget elementor-widget-trx_sc_icons" data-id="88f208b" data-element_type="widget" data-widget_type="trx_sc_icons.default">
                      <div class="elementor-widget-container">
                        <div id="trx_sc_icons_1392848525" class="sc_icons sc_icons_default sc_icons_size_medium sc_align_left">
                          <div class="sc_icons_columns_wrap sc_item_columns trx_addons_columns_wrap columns_padding_bottom">
                            <div class="trx_addons_column-1_3">
                              <div class="sc_icons_item">
                                <div class="sc_icons_icon sc_icon_type_ icon-group-936">
                                  <span class="sc_icon_type_ icon-group-936"></span>
                                </div>
                                <div class="sc_icons_item_details">
                                  <h4 class="sc_icons_item_title">
                                    <span>Dirección de la joya</span>
                                  </h4>
                                  <div class="sc_icons_item_description">
                                    <span>Décimo anillo, avenida tres pasos al frente</span>
                                    <span> A 1 km del parque de los recuerdos</span>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="trx_addons_column-1_3">
                              <div class="sc_icons_item">
                                <div class="sc_icons_icon sc_icon_type_ icon-group-937">
                                  <span class="sc_icon_type_ icon-group-937"></span>
                                </div>
                                <div class="sc_icons_item_details">
                                  <h4 class="sc_icons_item_title">
                                    <span>Teléfono </span>
                                  </h4>
                                  <div class="sc_icons_item_description">
                                    <span>
                                      <a href="tel:71362509">71362509 corporativo comercial</a>
                                    </span>
                                    <span>
                                      <a href="tel:74000355">74000355 recepción</a>
                                    </span>
                                    <span>
                                      <a href="tel:74000355">Corporativo del parque - 76088580</a>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="trx_addons_column-1_3">
                              <div class="sc_icons_item">
                                <div class="sc_icons_icon sc_icon_type_ icon-group-1554">
                                  <span class="sc_icon_type_ icon-group-1554"></span>
                                </div>
                                <div class="sc_icons_item_details">
                                  <h4 class="sc_icons_item_title">
                                    <span>Correo Electrónico</span>
                                  </h4>
                                  <div class="sc_icons_item_description">
                                    <span>
                                      <a href="mailto:admin@lajoyaresort.com.bo">admin@lajoyaresort.com.bo</a>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.sc_icons -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="elementor-section elementor-top-section elementor-element elementor-element-71de823 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="71de823" data-element_type="section">
              <div class="elementor-container elementor-column-gap-extended">
                <div class="elementor-column elementor-col-16 elementor-top-column elementor-element elementor-element-b3a283d sc_inner_width_none sc_layouts_column_icons_position_left" data-id="b3a283d" data-element_type="column">
                  <div class="elementor-widget-wrap"></div>
                </div>
                <br>
                <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-f5eb51c sc_inner_width_none sc_layouts_column_icons_position_left" data-id="f5eb51c" data-element_type="column">
                  <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-b04bbeb sc_fly_static elementor-widget elementor-widget-trx_sc_title" data-id="b04bbeb" data-element_type="widget" data-widget_type="trx_sc_title.default">
                      <div class="elementor-widget-container">
                        <div id="trx_sc_title_1704079400" class="sc_title sc_title_decoration">
                            <br>
                          <h2 class="sc_item_title sc_title_title sc_align_center sc_item_title_style_decoration">
                            <span class="sc_item_title_text">{{ __('Contacta con nosotros') }}</span>
                          </h2>
                        </div>
                        <!-- /.sc_title -->
                      </div>
                    </div>
                    <div class="elementor-element elementor-element-4c81209 sc_fly_static elementor-widget elementor-widget-spacer" data-id="4c81209" data-element_type="widget" data-widget_type="spacer.default">
                      <div class="elementor-widget-container">
                        <div class="elementor-spacer">
                          <div class="elementor-spacer-inner"></div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="elementor-element elementor-element-9128142 sc_fly_static elementor-widget elementor-widget-shortcode" data-id="9128142" data-element_type="widget" data-widget_type="shortcode.default">
                      <div class="elementor-widget-container">
                        <div class="elementor-shortcode">
                          <div class="wpcf7 js alert_inited" id="wpcf7-f6-p193-o1" lang="en-US" dir="ltr" data-wpcf7-id="6">
                            <div class="screen-reader-response">
                              <p role="status" aria-live="polite" aria-atomic="true"></p>
                              <ul></ul>
                            </div>
                            <form action="{{ url('contact_send') }}" method="POST" id="contact_form" class="wpcf7-form init" aria-label="Formulario de contacto" novalidate="novalidate" data-status="init" data-inited-keypress="1"> @csrf @if (Session::has('flash_message')) <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                              </div> @endif @if (Session::has('error_flash_message')) <div class="alert alert-danger">
                                {{ Session::get('error_flash_message') }}
                              </div> @endif <div style="display: none;">
                                <input type="hidden" name="_wpcf7" value="6">
                                <input type="hidden" name="_wpcf7_version" value="6.0.2">
                                <input type="hidden" name="_wpcf7_locale" value="es_ES">
                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6-p193-o1">
                                <input type="hidden" name="_wpcf7_container_post" value="193">
                                <input type="hidden" name="_wpcf7_posted_data_hash" >
                              </div>
                              <div class="elementor-column-gap-extended">
                                <div class="elementor-row">
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Ingresa tu nombre"  type="text" name="name">
                                      </span>
                                    </div>
                                  </div>
                                  <div class="elementor-column elementor-col-50">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-email">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Ingresa tu correo electrónico"  type="email" name="email">
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="elementor-row">
                                  <div class="elementor-column elementor-col-100">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-name">
                                        <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Número de WhatsApp"  type="text" name="phone">
                                      </span>
                                    </div>
                                  </div>

                                </div>
                              </div>
                              <div class="elementor-column-gap-extended">
                                <div class="elementor-row">
                                  <div class="elementor-column elementor-col-100">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                      <span class="wpcf7-form-control-wrap" data-name="your-message">
                                        <textarea cols="40" rows="10" maxlength="2000" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Ingresa tu mensaje" name="message"></textarea>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="text">
                                <span class="wpcf7-form-control-wrap" data-name="acceptance-486">
                                  <span class="wpcf7-form-control wpcf7-acceptance">
                                    <span class="wpcf7-list-item">
                                      <label>
                                        <input type="checkbox" name="acceptance-486" value="1" aria-invalid="false">
                                        <span class="wpcf7-list-item-label">Acepto que mis datos enviados sean recopilados y almacenados.</span>
                                      </label>
                                    </span>
                                  </span>
                                </span>
                              </div>
                              <div class="text">
                                <input class="wpcf7-form-control wpcf7-submit has-spinner sc_button_hover_slide_left" type="submit" value="Enviar">
                                <span class="wpcf7-spinner"></span>
                              </div>
                              <br>
                              <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="elementor-column elementor-col-16 elementor-top-column elementor-element elementor-element-9e9283b sc_inner_width_none sc_layouts_column_icons_position_left" data-id="9e9283b" data-element_type="column">
                  <div class="elementor-widget-wrap"></div>
                </div>
              </div>
            </section>

          </div>
        </div>
        <!-- .entry-content -->
      </article>
    </div>
    <!-- </.content> -->
  </div>

  <!-- </.content_wrap> -->
</div>
        <!-- </.page_content_wrap> -->
        <footer class="footer_wrap footer_custom footer_custom_1433 footer_custom_footer-light">
                <div data-elementor-type="cpt_layouts" data-elementor-id="1433" class="elementor elementor-1433">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-1e8da1c6 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="1e8da1c6" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-extended">
                            <!-- Enlaces -->
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-29cae00b sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="29cae00b" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-4c160a2b sc_fly_static elementor-widget elementor-widget-wp-widget-nav_menu"
                                        data-id="4c160a2b" data-element_type="widget"
                                        data-widget_type="wp-widget-nav_menu.default">
                                        <div class="elementor-widget-container">
                                            <aside id="wp-widget-nav_menu" class="widget wp-widget-nav_menu">
                                                <h5 class="widget_title">Enlaces</h5>
                                                <div class="menu-links-1-container">
                                                    <ul id="menu-links-1" class="menu">
                                                        <li id="menu-item-559"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-559">
                                                            <a href="{{ url('about') }}">Sobre Nosotros</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Servicios -->
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-37eeacce sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="37eeacce" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-4f2fa4d3 sc_fly_static elementor-widget elementor-widget-wp-widget-nav_menu"
                                        data-id="4f2fa4d3" data-element_type="widget"
                                        data-widget_type="wp-widget-nav_menu.default">
                                        <div class="elementor-widget-container">
                                            <aside id="wp-widget-nav_menu-2" class="widget wp-widget-nav_menu">
                                                <h5 class="widget_title">Servicios</h5>
                                                <div class="menu-services-container">
                                                    <ul id="menu-services" class="menu">
                                                        <li id="menu-item-2818"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2818">
                                                            <a href="{{ url('membership') }}">Membresía Vitalicia La Joya</a>
                                                        </li>

                                                        <li id="menu-item-2818"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2818">
                                                            <a href="{{ url('ownership') }}">PROPIEDAD FRACCIONAL CABAÑAS</a>
                                                        </li>
                                                        <li id="menu-item-2818"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2818">
                                                            <a href="{{ url('land') }}">DESARROLLO INMOBILIARIO</a>
                                                        </li>
                                                         <li id="menu-item-2818"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2818">
                                                            <a href="{{ url('vacancy') }}">Vacaciones Inteligentes por Vacancy Rewards</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sobre -->
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-5c713094 sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="5c713094" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-6abea1bf sc_fly_static elementor-widget elementor-widget-wp-widget-nav_menu"
                                        data-id="6abea1bf" data-element_type="widget"
                                        data-widget_type="wp-widget-nav_menu.default">
                                        <div class="elementor-widget-container">
                                            <aside id="wp-widget-nav_menu-3" class="widget wp-widget-nav_menu">

                                              <div class="menu-about-container">
  <div class="sc_icons_item_details">
    <h5 class="widget_title">
      <span>Dirección de oficinas: </span>
    </h5>
    <div class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2818">
      <span id="menu-item-2818" style="font-weight: 800;font-size: 14px;">
        2DO ANILLO Y AVENIDA SAN MARTÍN, TORRE EQUIPETROL. PLANTA BAJA.
      </span>
    </div>
    <a href="https://maps.app.goo.gl/ZGXrxYLhRrXt8rwT7" target="_blank">
      <button style="margin-top:10px; padding:10px; background-color:#007bff; color:#fff; border:none; border-radius:5px; cursor:pointer;">
        Dirección Oficina
      </button>
    </a>
  </div>
  <br>
  <div class="sc_icons_item_details">
    <h5 class="widget_title">
      <span>Dirección de la joya: </span>
    </h5>
    <div class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2818">
      <span style="font-weight: 800;font-size: 14px;">
        DÉCIMO ANILLO, AVENIDA TRES PASOS AL FRENTE A 1 KM DEL PARQUE DE LOS RECUERDOS
      </span>
    </div>
    <a href="https://maps.app.goo.gl/azAnnLdy3DLzFG5D8" target="_blank">
      <button style="margin-top:10px; padding:10px; background-color:#28a745; color:#fff; border:none; border-radius:5px; cursor:pointer;">
        Dirección Parque
      </button>
    </a>
  </div>
</div>

                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Recursos -->
                            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-28e9edb sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="28e9edb" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-c8b1875 sc_fly_static elementor-widget elementor-widget-wp-widget-nav_menu"
                                        data-id="c8b1875" data-element_type="widget"
                                        data-widget_type="wp-widget-nav_menu.default">
                                        <div class="elementor-widget-container">
                                            <aside id="wp-widget-nav_menu-4" class="widget wp-widget-nav_menu">
                                                <h5 class="widget_title">Recursos</h5>
                                                <div class="menu-resources-container">
                                                    <ul id="menu-resources" class="menu">
                                                        <li id="menu-item-574"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-574">
                                                            <a href="{{ url('contact') }}">Contactos</a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Footer Copyright -->
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-2c5474a4 elementor-section-content-middle scheme_default elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="2c5474a4" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-extended">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-10092854 sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="10092854" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-166a1128 sc_fly_static elementor-widget elementor-widget-text-editor"
                                        data-id="166a1128" data-element_type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <a style="font-size: 14px; text-transform: uppercase; font-weight: 800;"
                                                href="#" target="_blank"
                                                rel="noopener">{{ $general_setting['app_copyright'] ?? '' }}</a>
                                            <span style="font-size: 14px; font-style: normal; font-weight: 800; text-transform: uppercase;">©</span>
                                            <span style="font-size: 14px; text-transform: uppercase; font-weight: 800;">{{ now()->year }}. Todos los Derechos Reservados.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Redes Sociales -->
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-13119964 sc_inner_width_none sc_layouts_column_icons_position_left"
                                data-id="13119964" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="sc_layouts_item elementor-element elementor-element-52da1dd2 sc_fly_static elementor-widget elementor-widget-trx_sc_socials"
                                        data-id="52da1dd2" data-element_type="widget"
                                        data-widget_type="trx_sc_socials.default">
                                        <div class="elementor-widget-container">
                                            <div id="trx_sc_socials_1535176462"
                                                class="sc_socials sc_socials_default sc_align_right">
                                                <div class="socials_wrap">
                                                    <a target="_blank"
                                                        href="{{ $general_setting['facebook_url'] ?? '' }}"
                                                        class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                                                        <span class="social_icon social_icon_facebook">
                                                            <span class="icon-facebook"></span>
                                                        </span>
                                                    </a>
                                                     <a target="_blank" href="{{ $general_setting['youtube_url'] ?? '' }}"
    class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
    <span class="social_icon social_icon_youtube">
        <span class="icon-youtube"></span>
    </span>
</a><a target="_blank"
   href="{{ $general_setting['tiktok_url'] ?? '' }}"
   class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
   <span class="social_icon social_icon_tiktok">
       <span class="fab fa-tiktok"></span>

   </span>
</a>


                                                    <a target="_blank"
                                                        href="{{ $general_setting['instagram_url'] ?? '' }}"
                                                        class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                                                        <span class="social_icon social_icon_instagramm">
                                                            <span class="icon-instagramm"></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <!-- /.socials_wrap -->
                                            </div>
                                            <!-- /.sc_socials -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </footer>
        <!-- /.footer_wrap -->
      </div>
      <!-- /.page_wrap -->
    </div>
    <!-- /.body_wrap -->
    <script>
      window.RS_MODULES = window.RS_MODULES || {};
      window.RS_MODULES.modules = window.RS_MODULES.modules || {};
      window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
      window.RS_MODULES.defered = false;
      window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
      window.RS_MODULES.type = 'compiled';
    </script>

    <script>
      var ajaxRevslider;

      function rsCustomAjaxContentLoadingFunction() {
        ajaxRevslider = function(obj) {
          var content = '',
            data = {
              action: 'revslider_ajax_call_front',
              client_action: 'get_slider_html',
              token: '15eb70cb94',
              type: obj.type,
              id: obj.id,
              aspectratio: obj.aspectratio
            };
          jQuery.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            dataType: 'json',
            data: data,
            async: false,
            success: function(ret, textStatus, XMLHttpRequest) {
              if (ret.success == true) content = ret.data;
            },
            error: function(e) {
              console.log(e);
            }
          });
          return content;
        };
        var ajaxRemoveRevslider = function(obj) {
          return jQuery(obj.selector + ' .rev_slider').revkill();
        };
        if (jQuery.fn.tpessential !== undefined)
          if (typeof(jQuery.fn.tpessential.defaults) !== 'undefined') jQuery.fn.tpessential.defaults.ajaxTypes.push({
            type: 'revslider',
            func: ajaxRevslider,
            killfunc: ajaxRemoveRevslider,
            openAnimationSpeed: 0.3
          });
      }
      var rsCustomAjaxContent_Once = false;
      if (document.readyState === "loading") document.addEventListener('readystatechange', function() {
        if ((document.readyState === "interactive" || document.readyState === "complete") && !rsCustomAjaxContent_Once) {
          rsCustomAjaxContent_Once = true;
          rsCustomAjaxContentLoadingFunction();
        }
      });
      else {
        rsCustomAjaxContent_Once = true;
        rsCustomAjaxContentLoadingFunction();
      }
    </script>
    <script>
      (function(body) {
        'use strict';
        body.className = body.className.replace(/\btribe-no-js\b/, 'tribe-js');
      })(document.body);
    </script>
    <!-- Instagram Feed JS -->
    <script type="text/javascript">
      var sbiajaxurl = "/wp-admin/admin-ajax.php";
    </script>
    <script>
      /*
																							<![CDATA[ */
      var tribe_l10n_datatables = {
        "aria": {
          "sort_ascending": ": activate to sort column ascending",
          "sort_descending": ": activate to sort column descending"
        },
        "length_menu": "Show _MENU_ entries",
        "empty_table": "No data available in table",
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "info_empty": "Showing 0 to 0 of 0 entries",
        "info_filtered": "(filtered from _MAX_ total entries)",
        "zero_records": "No matching records found",
        "search": "Search:",
        "all_selected_text": "All items on this page were selected. ",
        "select_all_link": "Select all pages",
        "clear_selection": "Clear Selection.",
        "pagination": {
          "all": "All",
          "next": "Next",
          "previous": "Previous"
        },
        "select": {
          "rows": {
            "0": "",
            "_": ": Selected %d rows",
            "1": ": Selected 1 row"
          }
        },
        "datepicker": {
          "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
          "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
          "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
          "monthNamesShort": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
          "monthNamesMin": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          "nextText": "Next",
          "prevText": "Prev",
          "currentText": "Today",
          "closeText": "Done",
          "today": "Today",
          "clear": "Clear"
        }
      }; /* ]]> */
    </script>
    <script type='text/javascript'>
      const lazyloadRunObserver = () => {
        const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
        const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              let lazyloadBackground = entry.target;
              if (lazyloadBackground) {
                lazyloadBackground.classList.add('e-lazyloaded');
              }
              lazyloadBackgroundObserver.unobserve(entry.target);
            }
          });
        }, {
          rootMargin: '200px 0px 200px 0px'
        });
        lazyloadBackgrounds.forEach((lazyloadBackground) => {
          lazyloadBackgroundObserver.observe(lazyloadBackground);
        });
      };
      const events = ['DOMContentLoaded', 'elementor/lazyload/observe', ];
      events.forEach((event) => {
        document.addEventListener(event, lazyloadRunObserver);
      });
    </script>
    <script type='text/javascript'>
      (function() {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
      })();
    </script>
    <script>
      if (typeof revslider_showDoubleJqueryError === "undefined") {
        function revslider_showDoubleJqueryError(sliderID) {
          console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");
          console.log("To fix this, you can:");
          console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");
          console.log("2. Find the double jQuery.js inclusion and remove it");
          return "Double Included jQuery Library";
        }
      }
    </script>
    <style id='rs-plugin-settings-inline-css' type='text/css'>
      #rev_slider_7_1_wrapper .hesperiden.tparrows {
        cursor: pointer;
        background: rgba(255, 255, 255, 0.15);
        width: 53px;
        height: 53px;
        position: absolute;
        display: block;
        z-index: 1000;
        border-radius: 50%
      }

      #rev_slider_7_1_wrapper .hesperiden.tparrows.rs-touchhover {
        background: #bfc943
      }

      #rev_slider_7_1_wrapper .hesperiden.tparrows:before {
        font-family: 'revicons';
        font-size: 15px;
        color: #ffffff;
        display: block;
        line-height: 53px;
        text-align: center
      }

      #rev_slider_7_1_wrapper .hesperiden.tparrows.tp-leftarrow:before {
        content: '\e82c';
        margin-left: -3px
      }

      #rev_slider_7_1_wrapper .hesperiden.tparrows.tp-rightarrow:before {
        content: '\e82d';
        margin-right: -3px
      }

      #rev_slider_7_1_wrapper .hesperiden.tp-bullets {}

      #rev_slider_7_1_wrapper .hesperiden.tp-bullets:before {
        content: ' ';
        position: absolute;
        width: 100%;
        height: 100%;
        background: transparent;
        padding: 10px;
        margin-left: -10px;
        margin-top: -10px;
        box-sizing: content-box;
        border-radius: 8px
      }

      #rev_slider_7_1_wrapper .hesperiden .tp-bullet {
        width: 10px;
        height: 10px;
        position: absolute;
        background: #bfc943;
        background: -moz-linear-gradient(top, #bfc943 0%, #bfc943 100%);
        background: -webkit-linear-gradient(top, #bfc943 0%, #bfc943 100%);
        background: -o-linear-gradient(top, #bfc943 0%, #bfc943 100%);
        background: -ms-linear-gradient(top, #bfc943 0%, #bfc943 100%);
        background: linear-gradient(to bottom, #bfc943 0%, #bfc943 100%);
        filter: progid:dximagetransform.microsoft.gradient(startcolorstr='#bfc943', endcolorstr='#bfc943', gradienttype=0);
        border: 0px solid #bfc943;
        border-radius: 50%;
        cursor: pointer;
        box-sizing: content-box
      }

      #rev_slider_7_1_wrapper .hesperiden .tp-bullet.rs-touchhover,
      #rev_slider_7_1_wrapper .hesperiden .tp-bullet.selected {
        background: #00b8f4
      }

      #rev_slider_7_1_wrapper .hesperiden .tp-bullet-image {}

      #rev_slider_7_1_wrapper .hesperiden .tp-bullet-title {}
    </style>
   <script type="text/javascript" src="{{ asset('js/core.min.js') }}" id="jquery-ui-core-js"></script>
<script type="text/javascript" src="{{ asset('js/datepicker.min.js') }}" id="jquery-ui-datepicker-js"></script>

<script type="text/javascript" src="{{ asset('js/spin.min.js') }}" id="booked-spin-js-js"></script>
<script type="text/javascript" src="{{ asset('js/spin.jquery.js') }}" id="booked-spin-jquery-js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.tooltipster.min.js') }}" id="booked-tooltipster-js"></script>

<script type="text/javascript" src="{{ asset('js/functions.js') }}" id="booked-functions-js"></script>
<script type="text/javascript" src="{{ asset('js/functions(1).js') }}" id="booked-functions-js"></script>
<script type="text/javascript" src="{{ asset('js/hooks.min.js') }}" id="wp-hooks-js"></script>
<script type="text/javascript" src="{{ asset('js/i18n.min.js') }}" id="wp-i18n-js"></script>

<script type="text/javascript" src="{{ asset('js/index.js') }}" id="swv-js"></script>

<script type="text/javascript" src="{{ asset('js/index.js') }}" id="contact-form-7-js"></script>
<script type="text/javascript" src="{{ asset('js/rbtools.min.js') }}" async id="tp-tools-js"></script>
<script type="text/javascript" src="{{ asset('js/rs6.min.js') }}" async id="revmin-js"></script>
<script type="text/javascript" src="{{ asset('js/swiper.min.js') }}" id="jquery-swiper-js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}" id="magnific-popup-js"></script>

<script type="text/javascript" src="{{ asset('js/__scripts.js') }}" id="trx_addons-js"></script>

<script type="text/javascript" src="{{ asset('js/trx_demo_panels.js') }}" id="trx_demo_panels-js"></script>

<script type="text/javascript" src="{{ asset('js/add-to-cart.min.js') }}" id="wc-add-to-cart-js" defer="defer" data-wp-strategy="defer"></script>
<script type="text/javascript" src="{{ asset('js/js.cookie.min.js') }}" id="js-cookie-js" defer="defer" data-wp-strategy="defer"></script>

<script type="text/javascript" src="{{ asset('js/woocommerce.min.js') }}" id="woocommerce-js" defer="defer" data-wp-strategy="defer"></script>

<script type="text/javascript" src="{{ asset('js/functions.js') }}" id="booked-fea-js-js"></script>
<script type="text/javascript" src="{{ asset('js/anchor.js') }}" id="trx_addons-sc_anchor-js"></script>
<script type="text/javascript" src="{{ asset('js/superfish.min.js') }}" id="superfish-js"></script>

<script type="text/javascript" src="{{ asset('js/frontend-functions.js') }}" id="booked-wc-fe-functions-js"></script>
<script type="text/javascript" src="{{ asset('js/sourcebuster.min.js') }}" id="sourcebuster-js-js"></script>

<script type="text/javascript" src="{{ asset('js/order-attribution.min.js') }}" id="wc-order-attribution-js"></script>
<script type="text/javascript" src="{{ asset('js/v4-shims.min.js') }}" id="font-awesome-4-shim-js"></script>

<script type="text/javascript" src="{{ asset('js/__scripts.js') }}" id="neptunus-init-js"></script>

<script type="text/javascript" src="{{ asset('js/mediaelement-and-player.min.js') }}" id="mediaelement-core-js"></script>
<script type="text/javascript" src="{{ asset('js/mediaelement-migrate.min.js') }}" id="mediaelement-migrate-js"></script>

<script type="text/javascript" src="{{ asset('js/wp-mediaelement.min.js') }}" id="wp-mediaelement-js"></script>

<script type="text/javascript" src="{{ asset('js/cart-fragments.min.js') }}" id="wc-cart-fragments-js" defer="defer" data-wp-strategy="defer"></script>
<script type="text/javascript" src="{{ asset('js/webpack.runtime.min.js') }}" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="{{ asset('js/frontend-modules.min.js') }}" id="elementor-frontend-modules-js"></script>

    <script type="text/javascript" id="elementor-frontend-js-before">
      /*
																							<![CDATA[ */
      var elementorFrontendConfig = {
        "environmentMode": {
          "edit": false,
          "wpPreview": false,
          "isScriptDebug": false
        },
        "i18n": {
          "shareOnFacebook": "Share on Facebook",
          "shareOnTwitter": "Share on Twitter",
          "pinIt": "Pin it",
          "download": "Download",
          "downloadImage": "Download image",
          "fullscreen": "Fullscreen",
          "zoom": "Zoom",
          "share": "Share",
          "playVideo": "Play Video",
          "previous": "Previous",
          "next": "Next",
          "close": "Close",
          "a11yCarouselPrevSlideMessage": "Previous slide",
          "a11yCarouselNextSlideMessage": "Next slide",
          "a11yCarouselFirstSlideMessage": "This is the first slide",
          "a11yCarouselLastSlideMessage": "This is the last slide",
          "a11yCarouselPaginationBulletMessage": "Go to slide"
        },
        "is_rtl": false,
        "breakpoints": {
          "xs": 0,
          "sm": 480,
          "md": 768,
          "lg": 1025,
          "xl": 1440,
          "xxl": 1600
        },
        "responsive": {
          "breakpoints": {
            "mobile": {
              "label": "Mobile Portrait",
              "value": 767,
              "default_value": 767,
              "direction": "max",
              "is_enabled": true
            },
            "mobile_extra": {
              "label": "Mobile Landscape",
              "value": 880,
              "default_value": 880,
              "direction": "max",
              "is_enabled": false
            },
            "tablet": {
              "label": "Tablet Portrait",
              "value": 1024,
              "default_value": 1024,
              "direction": "max",
              "is_enabled": true
            },
            "tablet_extra": {
              "label": "Tablet Landscape",
              "value": 1200,
              "default_value": 1200,
              "direction": "max",
              "is_enabled": false
            },
            "laptop": {
              "label": "Laptop",
              "value": 1366,
              "default_value": 1366,
              "direction": "max",
              "is_enabled": false
            },
            "widescreen": {
              "label": "Widescreen",
              "value": 2400,
              "default_value": 2400,
              "direction": "min",
              "is_enabled": false
            }
          },
          "hasCustomBreakpoints": false
        },
        "version": "3.26.4",
        "is_static": false,
        "experimentalFeatures": {
          "e_swiper_latest": true,
          "e_nested_atomic_repeaters": true,
          "e_onboarding": true,
          "e_css_smooth_scroll": true,
          "home_screen": true,
          "link-in-bio": true,
          "floating-buttons": true
        },
        "urls": {
          "assets": "",
          "ajaxurl": "",
          "uploadUrl": ""
        },
        "nonces": {
          "floatingButtonsClickTracking": "9f75f579d3"
        },
        "swiperClass": "swiper",
        "settings": {
          "page": [],
          "editorPreferences": []
        },
        "kit": {
          "stretched_section_container": ".page_wrap",
          "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
          "lightbox_enable_counter": "yes",
          "lightbox_enable_fullscreen": "yes",
          "lightbox_enable_zoom": "yes",
          "lightbox_enable_share": "yes",
          "lightbox_title_src": "title",
          "lightbox_description_src": "description"
        },
        "post": {
          "id": 532,
          "title": "Home%202%20%E2%80%93%20Neptunus",
          "excerpt": "",
          "featuredImage": false
        }
      };
      /* ]]> */
    </script>
   <script type="text/javascript" src="{{ asset('js/frontend.min.js') }}" id="elementor-frontend-js"></script>
    <script type="text/javascript" src="{{ asset('js/tweenmax.min.js') }}" id="tweenmax-js"></script>
    <script id="rs-initialisation-scripts">
      var tpj = jQuery;
      var revapi7;
      if (window.RS_MODULES === undefined) window.RS_MODULES = {};
      if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
      RS_MODULES.modules["revslider71"] = {
        once: RS_MODULES.modules["revslider71"] !== undefined ? RS_MODULES.modules["revslider71"].once : undefined,
        init: function() {
          window.revapi7 = window.revapi7 === undefined || window.revapi7 === null || window.revapi7.length === 0 ? document.getElementById("rev_slider_7_1") : window.revapi7;
          if (window.revapi7 === null || window.revapi7 === undefined || window.revapi7.length == 0) {
            window.revapi7initTry = window.revapi7initTry === undefined ? 0 : window.revapi7initTry + 1;
            if (window.revapi7initTry < 20) requestAnimationFrame(function() {
              RS_MODULES.modules["revslider71"].init()
            });
            return;
          }
          window.revapi7 = jQuery(window.revapi7);
          if (window.revapi7.revolution == undefined) {
            revslider_showDoubleJqueryError("rev_slider_7_1");
            return;
          }
          revapi7.revolutionInit({
            revapi: "revapi7",
            DPR: "dpr",
            visibilityLevels: "1240,1024,778,480",
            gridwidth: "1920,1024,778,320",
            gridheight: "742,396,301,301",
            minHeight: "300px",
            lazyType: "smart",
            perspective: 600,
            perspectiveType: "local",
            editorheight: "742,396,301,301",
            responsiveLevels: "1240,1024,778,480",
            progressBar: {
              disableProgressBar: true
            },
            navigation: {
              mouseScrollNavigation: false,
              wheelCallDelay: 1000,
              onHoverStop: false,
              touch: {
                touchenabled: true,
                touchOnDesktop: true
              },
              arrows: {
                enable: true,
                style: "hesperiden",
                hide_onmobile: true,
                hide_under: 767,
                left: {
                  h_offset: 50
                },
                right: {
                  h_offset: 50
                }
              },
              bullets: {
                enable: true,
                tmp: "",
                style: "hesperiden",
                hide_over: 766
              }
            },
            viewPort: {
              global: true,
              globalDist: "-200px",
              enable: false,
              visible_area: "20%"
            },
            fallbacks: {
              allowHTML5AutoPlayOnAndroid: true
            },
          });
          revapi7.bind("revolution.slide.onloaded", function(e) {
            revapi7.revredraw();
          });
        }
      } // End of RevInitScript
      if (window.RS_MODULES.checkMinimal !== undefined) {
        window.RS_MODULES.checkMinimal();
      };
    </script>

  </body>
</html>
