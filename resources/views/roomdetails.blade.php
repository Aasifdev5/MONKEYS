@extends('master')

@section('title')
    {{ __('Infinity Pool + Organic Farm House with a Lake View') }}
@endsection

@section('content')
@push('styles')
<!-- Airbnb-like Flatpickr and Fonts -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

<style>
    :root {
        --airbnb-pink: #FF385C;
        --airbnb-dark: #222222;
        --airbnb-light-gray: #f7f7f7;
        --airbnb-gray: #717171;
        --airbnb-border: #dddddd;
        --airbnb-star: #FF385C;
        --airbnb-success: #008A05;
        --gradient-start: #ffffff;
        --gradient-end: #f9f9f9;
        --shadow-sm: 0 1px 2px rgba(0,0,0,0.08);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
        --shadow-lg: 0 8px 24px rgba(0,0,0,0.16);
        --transition: all 0.2s ease-out;
    }

    body {
        font-family: 'Circular', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
        color: var(--airbnb-dark);
        line-height: 1.5;
        -webkit-font-smoothing: antialiased;
    }

    .container {
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Header Section */
    .property-header {
        margin-bottom: 32px;
    }

    .property-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
        line-height: 1.2;
    }

    .property-subtitle {
        color: var(--airbnb-gray);
        font-size: 16px;
        margin-bottom: 20px;
    }

    .property-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
        font-size: 14px;
    }

    .property-rating {
        display: flex;
        align-items: center;
        color: var(--airbnb-dark);
    }

    .property-rating i {
        color: var(--airbnb-star);
        margin-right: 4px;
        font-size: 12px;
    }

    .superhost-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background-color: #f8f8f8;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }

    .superhost-badge i {
        color: var(--airbnb-pink);
    }

    .property-host {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .property-host img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
    }

    .property-actions {
        display: flex;
        gap: 16px;
    }

    .property-actions button {
        background: none;
        border: none;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: var(--transition);
        border-radius: 8px;
    }

    .property-actions button:hover {
        background-color: rgba(0,0,0,0.05);
    }

    .property-actions button i {
        font-size: 16px;
    }

    .save-button.active i {
        color: var(--airbnb-pink);
        font-weight: 900;
    }

    /* Gallery Section */
    .property-gallery {
        display: grid;
        grid-template-columns: 60% 20% 20%;
        grid-template-rows: 50% 50%;
        gap: 8px;
        height: 550px;
        margin-bottom: 48px;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .gallery-main {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
        position: relative;
    }

    .gallery-secondary {
        position: relative;
        overflow: hidden;
    }

    .gallery-secondary:nth-child(2) {
        grid-column: 2 / 3;
        grid-row: 1 / 2;
    }

    .gallery-secondary:nth-child(3) {
        grid-column: 3 / 4;
        grid-row: 1 / 2;
    }

    .gallery-secondary:nth-child(4) {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }

    .gallery-secondary:nth-child(5) {
        grid-column: 3 / 4;
        grid-row: 2 / 3;
    }

    .property-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .gallery-main:hover img,
    .gallery-secondary:hover img {
        transform: scale(1.03);
    }

    .show-all-photos {
        position: absolute;
        bottom: 24px;
        right: 24px;
        background: white;
        color: var(--airbnb-dark);
        padding: 10px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        z-index: 2;
    }

    .show-all-photos:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
        z-index: 1;
    }

    /* Main Content */
    .property-content {
        display: flex;
        gap: 48px;
        position: relative;
    }

    .property-main {
        flex: 2;
        min-width: 0;
    }

    .property-sidebar {
        flex: 1;
        position: relative;
        min-width: 0;
    }

    .section-title {
        font-size: 26px;
        font-weight: 700;
        margin: 48px 0 24px;
        line-height: 1.2;
    }

    .property-description {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 24px;
        color: var(--airbnb-dark);
    }

    .read-more {
        color: var(--airbnb-dark);
        font-weight: 600;
        text-decoration: underline;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        font-size: 16px;
        transition: color 0.2s ease;
    }

    .read-more:hover {
        color: var(--airbnb-pink);
    }

    /* Highlights Section */
    .property-highlights {
        display: flex;
        gap: 24px;
        padding: 24px 0;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .highlight-item {
        display: flex;
        gap: 16px;
        flex: 1;
    }

    .highlight-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--airbnb-pink);
        font-size: 20px;
    }

    .highlight-content h3 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .highlight-content p {
        font-size: 14px;
        color: var(--airbnb-gray);
        margin: 0;
    }

    /* Sleeping Arrangements */
    .sleeping-arrangements {
        position: relative;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .bedroom-slider {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        padding-bottom: 16px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }

    .bedroom-slider::-webkit-scrollbar {
        display: none;
    }

    .bedroom-card {
        min-width: 280px;
        background: white;
        border: 1px solid var(--airbnb-border);
        border-radius: 12px;
        padding: 16px;
        scroll-snap-align: start;
        transition: var(--transition);
    }

    .bedroom-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }

    .bedroom-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    .bedroom-title {
        font-weight: 600;
        margin-bottom: 4px;
        font-size: 16px;
    }

    .bedroom-desc {
        color: var(--airbnb-gray);
        font-size: 14px;
    }

    .pagination-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 16px;
    }

    .dot {
        width: 8px;
        height: 8px;
        background: #ccc;
        border-radius: 50%;
        cursor: pointer;
        transition: var(--transition);
    }

    .dot.active {
        background: var(--airbnb-dark);
        transform: scale(1.2);
    }

    .dot:hover {
        background: var(--airbnb-pink);
    }

    /* Amenities Section */
    .amenities-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .amenities-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .amenity-item {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 16px;
        transition: var(--transition);
        padding: 8px;
        border-radius: 8px;
    }

    .amenity-item:hover {
        background-color: rgba(0,0,0,0.03);
    }

    .amenity-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--airbnb-dark);
    }

    .show-all-amenities {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        background: white;
        color: var(--airbnb-dark);
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .show-all-amenities:hover {
        background: var(--airbnb-light-gray);
        border-color: var(--airbnb-gray);
    }

    /* Calendar Section */
    .calendar-section {
        margin-bottom: 48px;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .calendar-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 24px;
    }

    .calendar-input-group {
        position: relative;
    }

    .calendar-input-group label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 8px;
        color: var(--airbnb-dark);
    }

    .calendar-input {
        width: 100%;
        padding: 14px;
        font-size: 16px;
        border: 2px solid var(--airbnb-border);
        border-radius: 10px;
        cursor: pointer;
        transition: var(--transition);
        font-family: inherit;
    }

    .calendar-input:focus {
        outline: none;
        border-color: var(--airbnb-dark);
        box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
    }

    .calendar-input.active {
        border-color: var(--airbnb-dark);
    }

    .calendar-container {
        border: 1px solid var(--airbnb-border);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .calendar-container:hover {
        box-shadow: var(--shadow-md);
    }

    /* Flatpickr Customization */
    .flatpickr-calendar {
        width: 100%;
        max-width: 750px;
        background: white;
        border: none;
        box-shadow: none;
        padding: 0;
        font-family: inherit;
    }

    .flatpickr-calendar.showMonths-2 .flatpickr-month {
        width: 50%;
        display: inline-block;
        vertical-align: top;
    }

    .flatpickr-month {
        padding: 10px 20px;
        margin-bottom: 10px;
        text-align: center;
    }

    .flatpickr-monthDropdown-months, .numInputWrapper {
        font-weight: 700;
        font-size: 16px;
        color: var(--airbnb-dark);
    }

    .flatpickr-weekdays {
        margin-bottom: 10px;
    }

    .flatpickr-weekday {
        color: var(--airbnb-dark);
        font-weight: 500;
        font-size: 14px;
    }

    .flatpickr-day {
        font-size: 14px;
        color: var(--airbnb-dark);
        transition: var(--transition);
        border-radius: 50%;
        height: 40px;
        line-height: 40px;
    }

    .flatpickr-day.today {
        border-color: var(--airbnb-dark);
    }

    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange {
        background: var(--airbnb-dark);
        border-color: var(--airbnb-dark);
        color: white;
    }

    .flatpickr-day.inRange {
        background: rgba(0,0,0,0.05);
        border: none;
        color: var(--airbnb-dark);
        box-shadow: -5px 0 0 rgba(0,0,0,0.05), 5px 0 0 rgba(0,0,0,0.05);
    }

    .flatpickr-day.disabled,
    .flatpickr-day.disabled:hover {
        color: #b0b0b0;
        background: transparent;
        border-color: transparent;
    }

    .flatpickr-prev-month,
    .flatpickr-next-month {
        font-size: 18px;
        color: var(--airbnb-dark);
        transition: var(--transition);
        top: 12px;
    }

    .flatpickr-prev-month:hover,
    .flatpickr-next-month:hover {
        color: var(--airbnb-pink);
    }

    .calendar-header {
        padding: 15px 20px;
        border-bottom: 1px solid var(--airbnb-border);
        margin-bottom: 20px;
    }

    .calendar-header h3 {
        font-size: 18px;
        font-weight: 700;
        margin: 0;
        color: var(--airbnb-dark);
    }

    .calendar-header p {
        font-size: 14px;
        color: var(--airbnb-gray);
        margin: 5px 0 0;
    }

    .calendar-footer {
        padding: 15px 20px;
        text-align: right;
        border-top: 1px solid var(--airbnb-border);
    }

    .calendar-footer .clear-dates {
        background: none;
        border: none;
        color: var(--airbnb-pink);
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        padding: 8px 15px;
        text-decoration: underline;
        transition: var(--transition);
    }

    .calendar-footer .clear-dates:hover {
        color: #e63946;
    }

    /* Reviews Section */
    .reviews-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .review-summary {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
    }

    .review-score {
        font-size: 28px;
        font-weight: 700;
    }

    .review-count {
        color: var(--airbnb-gray);
        font-size: 16px;
    }

    .review-categories {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    .review-category {
        font-size: 14px;
    }

    .review-category-name {
        margin-bottom: 8px;
        color: var(--airbnb-gray);
    }

    .review-category-score {
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .review-category-score i {
        color: var(--airbnb-star);
        font-size: 12px;
    }

    .review-card {
        padding: 24px 0;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .reviewer {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .reviewer img {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reviewer-info {
        flex: 1;
    }

    .reviewer-name {
        font-weight: 600;
        font-size: 16px;
    }

    .review-date {
        color: var(--airbnb-gray);
        font-size: 14px;
    }

    .review-content {
        font-size: 16px;
        line-height: 1.6;
    }

    /* Location Section */
    .location-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .location-map {
        height: 400px;
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .location-map:hover {
        box-shadow: var(--shadow-md);
    }

    .location-description {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 16px;
        color: var(--airbnb-dark);
    }

    /* Host Section */
    .host-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .host-card {
        display: flex;
        gap: 24px;
        padding: 24px 0;
    }

    .host-img {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        object-fit: cover;
    }

    .host-info {
        flex: 1;
    }

    .host-name {
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 20px;
    }

    .host-meta {
        color: var(--airbnb-gray);
        font-size: 14px;
        margin-bottom: 16px;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .host-meta-item {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .host-meta-item i {
        font-size: 12px;
    }

    .host-response-time {
        color: var(--airbnb-success);
        font-weight: 500;
    }

    .host-contact {
        display: flex;
        gap: 12px;
    }

    .host-button {
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        font-size: 16px;
        transition: var(--transition);
    }

    .host-button.primary {
        background: var(--airbnb-dark);
        color: white;
        border: none;
    }

    .host-button.secondary {
        background: white;
        color: var(--airbnb-dark);
        border: 1px solid var(--airbnb-dark);
    }

    .host-button:hover {
        background: var(--airbnb-pink);
        color: white;
        border-color: var(--airbnb-pink);
        transform: translateY(-2px);
    }

    /* Things to Know */
    .things-section {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--airbnb-border);
    }

    .things-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        margin-bottom: 32px;
    }

    .things-category {
        font-size: 16px;
    }

    .things-title {
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .things-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .things-list li {
        margin-bottom: 16px;
        font-size: 16px;
        line-height: 1.5;
        position: relative;
        padding-left: 24px;
    }

    .things-list li:before {
        content: "•";
        position: absolute;
        left: 0;
        color: var(--airbnb-gray);
    }

    /* Booking Widget */
    .booking-widget {
        position: sticky;
        top: 24px;
        border-radius: 12px;
        padding: 24px;
        background: white;
        border: 1px solid var(--airbnb-border);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }

    .booking-widget:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .booking-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 24px;
    }

    .booking-price {
        font-size: 22px;
        font-weight: 700;
    }

    .booking-price span {
        font-size: 16px;
        font-weight: 400;
        color: var(--airbnb-gray);
    }

    .booking-dates {
        display: flex;
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 16px;
    }

    .booking-date-field {
        flex: 1;
        padding: 12px;
        font-size: 14px;
        border: none;
        background: white;
        cursor: pointer;
        text-align: left;
    }

    .booking-date-field.check-in {
        border-right: 1px solid var(--airbnb-dark);
    }

    .booking-date-field label {
        font-size: 10px;
        font-weight: 700;
        color: var(--airbnb-dark);
        text-transform: uppercase;
        display: block;
        margin-bottom: 4px;
    }

    .booking-date-field span {
        font-size: 14px;
        color: var(--airbnb-dark);
        font-weight: 500;
    }

    .booking-date-field.placeholder span {
        color: var(--airbnb-gray);
        font-weight: 400;
    }

    .booking-guests {
        position: relative;
        margin-bottom: 16px;
    }

    .guest-picker {
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        cursor: pointer;
        background: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--transition);
    }

    .guest-picker:hover {
        border-color: var(--airbnb-pink);
    }

    .guest-picker label {
        font-size: 10px;
        font-weight: 700;
        color: var(--airbnb-dark);
        text-transform: uppercase;
        margin-bottom: 4px;
        display: block;
    }

    .guest-picker span {
        font-size: 14px;
        color: var(--airbnb-dark);
        font-weight: 500;
    }

    .guest-picker i {
        font-size: 12px;
        color: var(--airbnb-dark);
        transition: var(--transition);
    }

    .guest-picker.active i {
        transform: rotate(180deg);
    }

    .guest-counter {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid var(--airbnb-dark);
        border-radius: 8px;
        padding: 16px;
        box-shadow: var(--shadow-lg);
        z-index: 100;
        animation: slideDown 0.3s ease;
    }

    .guest-counter.active {
        display: block;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .guest-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .guest-label {
        font-size: 14px;
        font-weight: 500;
    }

    .guest-control {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .guest-control button {
        width: 32px;
        height: 32px;
        border: 1px solid var(--airbnb-dark);
        border-radius: 50%;
        background: white;
        cursor: pointer;
        font-size: 14px;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .guest-control button:hover {
        background: var(--airbnb-pink);
        color: white;
        border-color: var(--airbnb-pink);
    }

    .guest-control button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background: var(--airbnb-light-gray);
    }

    .guest-count {
        min-width: 20px;
        text-align: center;
    }

    .booking-button {
        width: 100%;
        padding: 16px;
        background: var(--airbnb-pink);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        transition: var(--transition);
        margin-top: 16px;
    }

    .booking-button:hover {
        background: #e63946;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .booking-note {
        text-align: center;
        color: var(--airbnb-gray);
        font-size: 14px;
        margin-top: 16px;
        font-weight: 400;
    }

    .price-breakdown {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid var(--airbnb-border);
    }

    .price-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 16px;
        font-size: 16px;
        color: var(--airbnb-dark);
    }

    .price-row .price-detail {
        text-decoration: underline;
        cursor: pointer;
    }

    .price-total {
        font-weight: 700;
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid var(--airbnb-border);
        font-size: 18px;
    }

    .extend-trip {
        display: block;
        text-align: center;
        color: var(--airbnb-pink);
        font-size: 16px;
        font-weight: 600;
        margin: 24px 0;
        text-decoration: underline;
        transition: var(--transition);
    }

    .extend-trip:hover {
        color: #e63946;
    }

    .report-listing {
        display: block;
        text-align: center;
        color: var(--airbnb-gray);
        font-size: 14px;
        font-weight: 400;
        margin-top: 16px;
        transition: var(--transition);
    }

    .report-listing:hover {
        color: var(--airbnb-dark);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .property-gallery {
            height: 450px;
        }

        .things-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .property-content {
            flex-direction: column;
        }

        .property-gallery {
            height: auto;
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }

        .gallery-main, .gallery-secondary {
            grid-column: auto;
            grid-row: auto;
            height: 300px;
        }

        .property-highlights {
            flex-direction: column;
            gap: 16px;
        }

        .amenities-grid {
            grid-template-columns: 1fr;
        }

        .calendar-inputs {
            grid-template-columns: 1fr;
        }

        .review-categories {
            grid-template-columns: repeat(2, 1fr);
        }

        .things-grid {
            grid-template-columns: 1fr;
        }

        .booking-widget {
            position: static;
            margin-top: 32px;
        }

        .flatpickr-calendar.showMonths-2 .flatpickr-month {
            width: 100%;
            display: block;
        }

        .flatpickr-calendar {
            max-width: 100%;
            padding: 0;
        }

        .booking-dates {
            flex-direction: column;
        }

        .booking-date-field.check-in {
            border-right: none;
            border-bottom: 1px solid var(--airbnb-dark);
        }
    }

    @media (max-width: 480px) {
        .property-title {
            font-size: 24px;
        }

        .section-title {
            font-size: 22px;
        }

        .review-categories {
            grid-template-columns: 1fr;
        }

        .host-contact {
            flex-direction: column;
        }

        .host-button {
            width: 100%;
        }
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .fade-in {
        animation: fadeIn 0.5s ease;
    }

    /* Floating Action Button */
    .fab {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 56px;
        height: 56px;
        background: var(--airbnb-pink);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: var(--shadow-lg);
        cursor: pointer;
        z-index: 1000;
        transition: var(--transition);
        border: none;
    }

    .fab:hover {
        transform: scale(1.1);
        background: #e63946;
    }

    /* Tooltip */
    .tooltip {
        position: absolute;
        background: var(--airbnb-dark);
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 14px;
        pointer-events: none;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.2s ease;
        white-space: nowrap;
    }

    .tooltip:after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: var(--airbnb-dark) transparent transparent transparent;
    }
</style>
@endpush

<div class="container">
    <!-- Property Header -->
    <div class="property-header">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h1 class="property-title">Infinity Pool + Organic Farm House with a Lake View</h1>
                <p class="property-subtitle">Entire villa in Udaipur, India · 4 guests · 2 bedrooms · 3 beds · 2 baths</p>
            </div>
            <div class="property-actions">
                <button class="tooltip-trigger" data-tooltip="Share this listing">
                    <i class="fas fa-share-alt"></i> Share
                    <div class="tooltip">Share this listing</div>
                </button>
                <button class="save-button tooltip-trigger" data-tooltip="Save to your wishlist">
                    <i class="far fa-heart"></i> Save
                    <div class="tooltip">Save to your wishlist</div>
                </button>
            </div>
        </div>

        <div class="property-meta">
            <div class="property-rating">
                <i class="fas fa-star"></i> 4.85 · <a href="#reviews" style="text-decoration: underline;">167 reviews</a>
            </div>
            <div class="superhost-badge">
                <i class="fas fa-medal"></i> Superhost
            </div>
            <div class="property-host">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" alt="Host">
                <span>Hosted by <strong>Zabin</strong></span>
            </div>
            <div>7 years hosting</div>
        </div>
    </div>

    <!-- Property Gallery -->
    <div class="property-gallery">
        <div class="gallery-main">
            <a href="https://images.unsplash.com/photo-1566073771259-6a8506099945" data-lightbox="property-gallery" data-title="Infinity Pool with Lake View">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Main property image">
            </a>
            <div class="gallery-overlay"></div>
        </div>
        <div class="gallery-secondary">
            <a href="https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9" data-lightbox="property-gallery" data-title="Living Area">
                <img src="https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9" alt="Living area">
            </a>
        </div>
        <div class="gallery-secondary">
            <a href="https://images.unsplash.com/photo-1564013799919-db9952fefbe2" data-lightbox="property-gallery" data-title="Bedroom">
                <img src="https://images.unsplash.com/photo-1564013799919-db9952fefbe2" alt="Bedroom">
            </a>
        </div>
        <div class="gallery-secondary">
            <a href="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" data-lightbox="property-gallery" data-title="Kitchen">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Kitchen">
            </a>
        </div>
        <div class="gallery-secondary">
            <a href="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9" data-lightbox="property-gallery" data-title="Outdoor Seating">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9" alt="Outdoor seating">
            </a>
        </div>
        <button class="show-all-photos" id="show-all-photos">
            <i class="fas fa-camera"></i> Show all photos
        </button>
    </div>

    <div class="property-content">
        <div class="property-main">
            <!-- Property Highlights -->
            <div class="property-highlights">
                <div class="highlight-item">
                    <div class="highlight-icon">
                        <i class="fas fa-swimming-pool"></i>
                    </div>
                    <div class="highlight-content">
                        <h3>Dive right in</h3>
                        <p>This is one of the few places in the area with a pool.</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <div class="highlight-icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="highlight-content">
                        <h3>Self check-in</h3>
                        <p>You can check in with the building staff.</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <div class="highlight-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="highlight-content">
                        <h3>Great location</h3>
                        <p>100% of recent guests gave the location a 5-star rating.</p>
                    </div>
                </div>
            </div>

            <hr>

            <!-- About Section -->
            <h2 class="section-title">About this place</h2>
            <p class="property-description">
                If you're looking for a memorable vacation filled with serenity, adventure, and luxury, this "Private Farmhouse" is the right pick. Staying at our beautiful Lake Side Villa provides guests with experiences that rejuvenate both body and soul. We welcome couples, solo adventurers, and families.
            </p>
            <p class="property-description">
                It is ideal for travelers visiting Udaipur not only for tourist sightseeing, but who also want to experience the local culture and nature. The property is surrounded by organic farms where we grow seasonal vegetables and fruits.
            </p>
            <button class="read-more">Show more</button>

            <hr>

            <!-- Sleeping Arrangements -->
            <h2 class="section-title">Where you'll sleep</h2>
            <div class="sleeping-arrangements">
                <div class="bedroom-slider">
                    <div class="bedroom-card">
                        <img src="https://images.unsplash.com/photo-1583847268964-b28dc8f51f92" alt="Bedroom 1">
                        <h3 class="bedroom-title">Bedroom 1</h3>
                        <p class="bedroom-desc">1 king bed</p>
                    </div>
                    <div class="bedroom-card">
                        <img src="https://images.unsplash.com/photo-1566669437688-89d01be54b8a" alt="Bedroom 2">
                        <h3 class="bedroom-title">Bedroom 2</h3>
                        <p class="bedroom-desc">3 single beds</p>
                    </div>
                    <div class="bedroom-card">
                        <img src="https://images.unsplash.com/photo-1565538810643-b5bdb714032a" alt="Bathroom">
                        <h3 class="bedroom-title">Bathroom</h3>
                        <p class="bedroom-desc">Private bathroom with shower</p>
                    </div>
                </div>
                <div class="pagination-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <hr>

            <!-- Amenities -->
            <div class="amenities-section">
                <h2 class="section-title">What this place offers</h2>
                <div class="amenities-grid">
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <div>Lake view</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <div>Waterfront</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <div>Wi-Fi</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div>Free parking on premises</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div>Kitchen</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <div>Pets allowed</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <div>Mountain view</div>
                    </div>
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <i class="fas fa-swimming-pool"></i>
                        </div>
                        <div>Private outdoor pool</div>
                    </div>
                </div>
                <button class="show-all-amenities">
                    <i class="fas fa-plus"></i> Show all 40 amenities
                </button>
            </div>

            <hr>

            <!-- Calendar Section -->
            <div class="calendar-section" id="calendar-section">
                <h2 class="section-title">Select your dates</h2>
                <div class="calendar-inputs">
                    <div class="calendar-input-group">
                        <label>Check-in</label>
                        <input type="text" class="calendar-input" id="check-in" placeholder="Add date" readonly>
                    </div>
                    <div class="calendar-input-group">
                        <label>Check-out</label>
                        <input type="text" class="calendar-input" id="check-out" placeholder="Add date" readonly>
                    </div>
                </div>
                <div class="calendar-container">
                    <div id="calendar"></div>
                </div>
            </div>

            <hr id="reviews">

            <!-- Reviews -->
            <div class="reviews-section">
                <h2 class="section-title">★ 4.85 · 167 reviews</h2>
                <div class="review-summary">
                    <div class="review-score">4.85</div>
                    <div class="review-count">(167 reviews)</div>
                </div>

                <div class="review-categories">
                    <div class="review-category">
                        <div class="review-category-name">Cleanliness</div>
                        <div class="review-category-score">
                            <i class="fas fa-star"></i> 4.9
                        </div>
                    </div>
                    <div class="review-category">
                        <div class="review-category-name">Accuracy</div>
                        <div class="review-category-score">
                            <i class="fas fa-star"></i> 4.8
                        </div>
                    </div>
                    <div class="review-category">
                        <div class="review-category-name">Check-in</div>
                        <div class="review-category-score">
                            <i class="fas fa-star"></i> 4.8
                        </div>
                    </div>
                    <div class="review-category">
                        <div class="review-category-name">Communication</div>
                        <div class="review-category-score">
                            <i class="fas fa-star"></i> 4.9
                        </div>
                    </div>
                    <div class="review-category">
                        <div class="review-category-name">Location</div>
                        <div class="review-category-score">
                            <i class="fas fa-star"></i> 4.7
                        </div>
                    </div>
                    <div class="review-category">
                        <div class="review-category-name">Value</div>
                        <div class="review-category-score">
                            <i class="fas fa-star"></i> 4.7
                        </div>
                    </div>
                </div>

                <div class="review-card">
                    <div class="reviewer">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Reviewer">
                        <div class="reviewer-info">
                            <div class="reviewer-name">Sanket</div>
                            <div class="review-date">1 day ago</div>
                        </div>
                    </div>
                    <div class="review-content">
                        Great experience! The property was exactly as described and the host was very responsive. The infinity pool was the highlight of our stay. Waking up to that lake view every morning was absolutely breathtaking. The organic farm tour was also a wonderful experience - we got to pick fresh vegetables for our meals!
                    </div>
                </div>

                <div class="review-card">
                    <div class="reviewer">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7" alt="Reviewer">
                        <div class="reviewer-info">
                            <div class="reviewer-name">Abhisek</div>
                            <div class="review-date">1 week ago</div>
                        </div>
                    </div>
                    <div class="review-content">
                        Perfect for a weekend getaway! The organic farm was amazing and we loved the fresh produce. Would definitely recommend. The host Zabin was incredibly hospitable and gave us great recommendations for local restaurants. The villa was spotless and had everything we needed for a comfortable stay.
                    </div>
                </div>

                <button class="read-more">Show all 167 reviews</button>
            </div>

            <hr>

            <!-- Location -->
            <div class="location-section">
                <h2 class="section-title">Where you'll be</h2>
                <p>Udaipur, Rajasthan, India</p>
                <div class="location-map">
                    <iframe src="https://maps.google.com/maps?q=Udaipur%20India&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <p class="location-description">
                    A beautiful farm house situated in a village close to the scenic Bad Lake. The air is fresh, there is no traffic and no light pollution. Some of the famous tourist places of Udaipur such as Bad Lake, Fatehgarh Sagar, and Shripath Sagar are within a 30-minute drive from the villa.
                </p>
                <button class="read-more">Show more</button>
            </div>

            <hr>

            <!-- Host -->
            <div class="host-section">
                <h2 class="section-title">Meet your host</h2>
                <div class="host-card">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" alt="Host" class="host-img">
                    <div class="host-info">
                        <h3 class="host-name">Zabin</h3>
                        <div class="host-meta">
                            <div class="host-meta-item">
                                <i class="fas fa-medal"></i> Superhost
                            </div>
                            <div class="host-meta-item">
                                <i class="fas fa-calendar-check"></i> 7 years hosting
                            </div>
                            <div class="host-response-time">
                                <i class="fas fa-bolt"></i> Response rate: 100%
                            </div>
                        </div>
                        <p>I'm passionate about organic farming and sustainable living. My farmhouse is my pride and joy, and I love sharing it with guests from around the world.</p>
                        <div class="host-contact">
                            <button class="host-button primary">Contact host</button>
                            <button class="host-button secondary">View profile</button>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Things to Know -->
            <div class="things-section">
                <h2 class="section-title">Things to know</h2>
                <div class="things-grid">
                    <div class="things-category">
                        <h3 class="things-title">House rules</h3>
                        <ul class="things-list">
                            <li>Check-in after 2:00 PM</li>
                            <li>Checkout before 11:00 AM</li>
                            <li>No smoking</li>
                            <li>8 guests maximum</li>
                            <li>Pets allowed</li>
                        </ul>
                    </div>
                    <div class="things-category">
                        <h3 class="things-title">Safety & property</h3>
                        <ul class="things-list">
                            <li>No carbon monoxide alarm</li>
                            <li>No smoke alarm</li>
                            <li>Pool/hot tub without a gate or lock</li>
                            <li>Security camera on property</li>
                            <li>Must climb stairs</li>
                        </ul>
                    </div>
                    <div class="things-category">
                        <h3 class="things-title">Cancellation policy</h3>
                        <p>Free cancellation for 48 hours. After that, cancel before May 10 and get a 50% refund, minus the first night and service fee.</p>
                        <button class="read-more">Show more</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="property-sidebar">
            <!-- Booking Widget -->
            <div class="booking-widget">
                <div class="booking-header">
                    <div class="booking-price">₹9,471 <span>/ night</span></div>
                    <div class="property-rating">
                        <i class="fas fa-star"></i> 4.85
                    </div>
                </div>

                <div class="booking-dates">
                    <div class="booking-date-field check-in">
                        <label>Check-in</label>
                        <span id="check-in-display">5/15/2025</span>
                    </div>
                    <div class="booking-date-field checkout placeholder">
                        <label>Checkout</label>
                        <span id="check-out-display">Add date</span>
                    </div>
                </div>

                <div class="booking-guests">
                    <div class="guest-picker">
                        <div>
                            <label>Guests</label>
                            <span id="guest-display">1 guest</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="guest-counter">
                        <div class="guest-row">
                            <span class="guest-label">Adults</span>
                            <div class="guest-control">
                                <button type="button" onclick="updateGuests('adults', -1)">-</button>
                                <span id="adults-count" class="guest-count">1</span>
                                <button type="button" onclick="updateGuests('adults', 1)">+</button>
                            </div>
                        </div>
                        <div class="guest-row">
                            <span class="guest-label">Children</span>
                            <div class="guest-control">
                                <button type="button" onclick="updateGuests('children', -1)">-</button>
                                <span id="children-count" class="guest-count">0</span>
                                <button type="button" onclick="updateGuests('children', 1)">+</button>
                            </div>
                        </div>
                        <div class="guest-row">
                            <span class="guest-label">Infants</span>
                            <div class="guest-control">
                                <button type="button" onclick="updateGuests('infants', -1)">-</button>
                                <span id="infants-count" class="guest-count">0</span>
                                <button type="button" onclick="updateGuests('infants', 1)">+</button>
                            </div>
                        </div>
                        <div class="guest-row">
                            <span class="guest-label">Pets</span>
                            <div class="guest-control">
                                <button type="button" onclick="updateGuests('pets', -1)">-</button>
                                <span id="pets-count" class="guest-count">0</span>
                                <button type="button" onclick="updateGuests('pets', 1)">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-section">
                    @if(auth()->check())
                        <form method="POST" action="{{ route('booking.submit', ['room' => 1]) }}">
                            @csrf
                            <input type="hidden" name="check_in" id="check-in-value">
                            <input type="hidden" name="check_out" id="check-out-value">
                            <input type="hidden" name="guests" id="guests-value" value="1">
                            <button type="submit" class="btn btn-sm booking-button">Reserve</button>
                        </form>
                    @else
                        <a href="{{ route('signup') }}" class="btn btn-sm booking-button">Reserve</a>
                    @endif
                    <div class="booking-note">You won't be charged yet</div>
                </div>

                <div class="price-breakdown">
                    <div class="price-row">
                        <span>₹9,471 x 5 nights</span>
                        <span>₹47,355</span>
                    </div>
                    <div class="price-row">
                        <span>Cleaning fee <span class="price-detail">What's this?</span></span>
                        <span>₹1,500</span>
                    </div>
                    <div class="price-row">
                        <span>Service fee <span class="price-detail">What's this?</span></span>
                        <span>₹2,368</span>
                    </div>
                    <div class="price-total price-row">
                        <span>Total before taxes</span>
                        <span>₹51,223</span>
                    </div>
                </div>

                <div class="booking-section">
                    <a href="#" class="extend-trip">Extend your trip and save <span>Add 7 nights</span></a>
                    <a href="#" class="report-listing">Report this listing</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<button class="fab" id="fab-reserve">
    <i class="fas fa-calendar-check"></i>
</button>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Initialize guest counts
    let guestCounts = {
        adults: 1,
        children: 0,
        infants: 0,
        pets: 0
    };

    // Initialize Flatpickr for the calendar section
    const fp = flatpickr("#calendar", {
        mode: "range",
        minDate: "today",
        maxDate: new Date().fp_incr(365),
        dateFormat: "d M Y",
        defaultDate: ["9 May 2025", "15 May 2025"],
        showMonths: window.innerWidth > 768 ? 2 : 1,
        inline: true,
        prevArrow: "<span class='flatpickr-prev-month'><i class='fas fa-chevron-left'></i></span>",
        nextArrow: "<span class='flatpickr-next-month'><i class='fas fa-chevron-right'></i></span>",
        onChange: function(selectedDates, dateStr, instance) {
            if (selectedDates.length === 2) {
                const checkInDate = selectedDates[0];
                const checkOutDate = selectedDates[1];

                // Format dates for display
                const formattedCheckIn = checkInDate.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });

                const formattedCheckOut = checkOutDate.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });

                const numericCheckIn = checkInDate.toLocaleDateString('en-US', {
                    month: 'numeric',
                    day: 'numeric',
                    year: 'numeric'
                });

                const numericCheckOut = checkOutDate.toLocaleDateString('en-US', {
                    month: 'numeric',
                    day: 'numeric',
                    year: 'numeric'
                });

                // Update inputs
                $("#check-in").val(formattedCheckIn);
                $("#check-out").val(formattedCheckOut);
                $("#check-in-value").val(checkInDate.toISOString().split('T')[0]);
                $("#check-out-value").val(checkOutDate.toISOString().split('T')[0]);
                $("#check-in-display").text(numericCheckIn);
                $("#check-out-display").text(numericCheckOut);

                // Remove placeholder class
                $("#check-out-display").parent().removeClass('placeholder');

                // Calculate and update price
                const nights = Math.round((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
                const basePrice = 9471;
                const totalPrice = basePrice * nights;
                $(".price-row:first span:first").text(`₹${basePrice.toLocaleString()} x ${nights} nights`);
                $(".price-row:first span:last").text(`₹${totalPrice.toLocaleString()}`);
                $(".price-total span:last").text(`₹${(totalPrice + 1500 + 2368).toLocaleString()}`);

                // Scroll to booking widget if on mobile
                if (window.innerWidth <= 768) {
                    $('html, body').animate({
                        scrollTop: $(".booking-widget").offset().top - 20
                    }, 500);
                }
            }
        },
        onReady: function(selectedDates, dateStr, instance) {
            updateCalendarHeader(instance);
            addCalendarFooter(instance);
        }
    });

    // Set initial dates
    $("#check-in").val("9 May 2025");
    $("#check-out").val("15 May 2025");
    $("#check-in-value").val("2025-05-09");
    $("#check-out-value").val("2025-05-15");
    $("#check-in-display").text("5/15/2025");
    $("#check-out-display").text("Add date");
    $("#check-out-display").parent().addClass('placeholder');

    function updateCalendarHeader(instance) {
        let header = instance.calendarContainer.querySelector('.calendar-header');
        if (!header) {
            header = document.createElement('div');
            header.className = 'calendar-header';
            instance.calendarContainer.insertBefore(header, instance.calendarContainer.firstChild);
        }
        header.innerHTML = `
            <h3>${activeInput === 'check-out' ? 'Select checkout date' : 'Select check-in date'}</h3>
            <p>Add your travel dates for exact pricing</p>
        `;
    }

    function addCalendarFooter(instance) {
        let footer = instance.calendarContainer.querySelector('.calendar-footer');
        if (!footer) {
            footer = document.createElement('div');
            footer.className = 'calendar-footer';
            footer.innerHTML = '<button type="button" class="clear-dates">Clear dates</button>';
            instance.calendarContainer.appendChild(footer);
            footer.querySelector('.clear-dates').addEventListener('click', function() {
                instance.clear();
                $("#check-in").val('');
                $("#check-out").val('');
                $("#check-in-value").val('');
                $("#check-out-value").val('');
                $("#check-in-display").text('Add date');
                $("#check-out-display").text('Add date');
                $("#check-out-display").parent().addClass('placeholder');
            });
        }
    }

    // Guest picker functionality
    window.updateGuests = function(type, change) {
        guestCounts[type] = Math.max(0, guestCounts[type] + change);

        // Update display
        $(`#${type}-count`).text(guestCounts[type]);

        // Calculate total guests (adults + children, infants don't count)
        const totalGuests = guestCounts.adults + guestCounts.children;
        $("#guest-display").text(totalGuests + " guest" + (totalGuests !== 1 ? "s" : ""));
        $("#guests-value").val(totalGuests);

        // Disable minus buttons when count is 0
        $(`button[onclick="updateGuests('${type}', -1)"]`).prop('disabled', guestCounts[type] === 0);
    };

    // Initialize minus buttons as disabled
    $(".guest-control button:first-child").prop('disabled', true);

    $(".guest-picker").click(function(e) {
        e.stopPropagation();
        $(".guest-counter").toggleClass("active");
        $(this).toggleClass("active");
    });

    $(document).click(function() {
        $(".guest-counter").removeClass("active");
        $(".guest-picker").removeClass("active");
    });

    // Prevent guest counter from closing when clicking inside
    $(".guest-counter").click(function(e) {
        e.stopPropagation();
    });

    // Bedroom slider pagination
    $('.dot').click(function() {
        const index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $('.bedroom-slider').animate({
            scrollLeft: $('.bedroom-card').eq(index).position().left + $('.bedroom-slider').scrollLeft()
        }, 300);
    });

    // Update dots based on scroll position
    $('.bedroom-slider').on('scroll', function() {
        const scrollPosition = $(this).scrollLeft();
        const cardWidth = $('.bedroom-card').outerWidth();
        const currentIndex = Math.round(scrollPosition / cardWidth);
        $('.dot').eq(currentIndex).addClass('active').siblings().removeClass('active');
    });

    // Toggle "Show more" sections
    $('.read-more').click(function() {
        const section = $(this).prev();
        if (section.hasClass('collapsed')) {
            section.removeClass('collapsed');
            $(this).text('Show less');
        } else {
            section.addClass('collapsed');
            $(this).text('Show more');
        }
    });

    // Save button toggle
    $('.save-button').click(function() {
        $(this).toggleClass('active');
        $(this).find('i').toggleClass('far fas');

        // Show feedback
        const tooltip = $(this).find('.tooltip');
        tooltip.text($(this).hasClass('active') ? 'Saved to wishlist' : 'Removed from wishlist');
        tooltip.css('opacity', 1);

        setTimeout(() => {
            tooltip.css('opacity', 0);
        }, 2000);
    });

    // Open calendar on date field click
    $(".booking-date-field").click(function() {
        $('html, body').animate({
            scrollTop: $("#calendar-section").offset().top - 20
        }, 500);
    });

    // Show all photos lightbox
    $('#show-all-photos').click(function() {
        $('[data-lightbox="property-gallery"]').first().trigger('click');
    });

    // Tooltip functionality
    $('.tooltip-trigger').hover(function() {
        const tooltip = $(this).find('.tooltip');
        tooltip.css({
            'opacity': 1,
            'top': -tooltip.outerHeight() - 10,
            'left': '50%',
            'transform': 'translateX(-50%)'
        });
    }, function() {
        $(this).find('.tooltip').css('opacity', 0);
    });

    // Floating action button
    $('#fab-reserve').click(function() {
        $('html, body').animate({
            scrollTop: $(".booking-widget").offset().top - 20
        }, 500);
    });

    // Show/hide FAB based on scroll position
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            $('#fab-reserve').addClass('fade-in');
        } else {
            $('#fab-reserve').removeClass('fade-in');
        }
    });

    // Responsive calendar months
    $(window).resize(function() {
        if (window.innerWidth <= 768) {
            fp.set('showMonths', 1);
        } else {
            fp.set('showMonths', 2);
        }
    });
});
</script>
@endpush
@endsection
