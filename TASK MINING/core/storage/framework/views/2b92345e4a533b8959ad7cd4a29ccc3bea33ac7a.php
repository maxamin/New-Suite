<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
<style>

@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url('http://themes.googleusercontent.com/static/fonts/opensans/v5/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff') format('woff');
}


/* reset css start */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto&display=swap");
html {
    scroll-behavior: smooth;
}

body {
    font-family: "Roboto", sans-serif;
    font-size: 16px;
    padding: 0;
    margin: 0;
    font-weight: 400;
    position: relative;
    display: flex;
    flex-flow: column;
    min-height: 100vh;
}

footer {
    margin-top: auto;
}

img {
    max-width: 100%;
    height: auto;
}

ul,
ol {
    padding: 0;
    margin: 0;
    list-style: none;
}

button {
    cursor: pointer;
}

*:focus {
    outline: none;
}

button {
    border: none;
}

button:focus {
    outline: none;
}

input:not([type="radio"]),
.form-control {
    padding: 10px 20px;
    border: 1px solid #e5e5e5;
    width: 100%;
    background-color: #f8f8fa;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    color: #6f6f6f;
}

input:not([type="radio"])::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
    color: #6f6f6f;
}

input:not([type="radio"])::-moz-placeholder,
textarea::-moz-placeholder {
    color: #6f6f6f;
}

input:not([type="radio"]):-ms-input-placeholder,
textarea:-ms-input-placeholder {
    color: #6f6f6f;
}

input:not([type="radio"]):-moz-placeholder,
textarea:-moz-placeholder {
    color: #6f6f6f;
}


input[type="checkbox"] {
    width: 15px;
    padding: 0;
}


textarea {
    min-height: 150px;
    resize: none;
    width: 100%;
}

span {
    display: inline-block;
}

a:hover {
    color: #0056fb;
}

/* reset css end */
/* global css strat */
.mt-15 {
    margin-top: 15px;
}

.mt-20 {
    margin-top: 20px;
}

.mt-30 {
    margin-top: 30px;
}

.mt-40 {
    margin-top: 40px;
}

.mt-50 {
    margin-top: 50px;
}

.mt-80 {
    margin-top: 80px;
}

.mb-15 {
    margin-bottom: 15px;
}

.mb-20 {
    margin-bottom: 20px;
}

.mb-30 {
    margin-bottom: 30px;
}

.mb-50 {
    margin-bottom: 50px;
}

.mb-none-30 {
    margin-bottom: -30px;
}

.mb-none-50 {
    margin-bottom: -50px;
}

.pt-90 {
    padding-top: 90px;
}

.pb-90 {
    padding-bottom: 90px;
}

.pt-120 {
    padding-top: 120px;
}

@media (max-width: 991px) {
    .pt-120 {
        padding-top: 90px;
    }
}

@media (max-width: 575px) {
    .pt-120 {
        padding-top: 80px;
    }
}

.pb-120 {
    padding-bottom: 120px;
}

@media (max-width: 991px) {
    .pb-120 {
        padding-bottom: 90px;
    }
}

@media (max-width: 575px) {
    .pb-120 {
        padding-bottom: 80px;
    }
}

.pt-150 {
    padding-top: 150px;
}

@media (max-width: 1199px) {
    .pt-150 {
        padding-top: 120px;
    }
}

@media (max-width: 991px) {
    .pt-150 {
        padding-top: 90px;
    }
}

@media (max-width: 575px) {
    .pt-150 {
        padding-top: 80px;
    }
}

.pb-150 {
    padding-bottom: 150px;
}

.ptb-150 {
    padding: 150px 0px;
}

@media (max-width: 1199px) {
    .pb-150 {
        padding-bottom: 120px;
    }

    .ptb-150 {
        padding: 120px 0px;
    }
}

@media (max-width: 991px) {
    .pb-150 {
        padding-bottom: 90px;
    }

    .ptb-150 {
        padding: 90px 0px;
    }
}

@media (max-width: 575px) {
    .pb-150 {
        padding-bottom: 80px;
    }

    .ptb-150 {
        padding: 80px 0px;
    }

}

.mt-100 {
    margin-top: 100px;
}

@media (min-width: 1360px) {
    .container {
        max-width: 1240px;
    }
}

.bg_img {
    background-size: cover;
    background-position: center;
}

.bg--one {
    background-color: #001d4a !important;
}

.bg--two {
    background-color: #02014a !important;
}

.curve-shape {
    position: relative;
    z-index: 9;
}

.curve-shape::after {
    position: absolute;
    content: '';
    top: -85px;
    left: 0;
    width: 100%;
    height: 150px;
    background-color: #001d4a;
    -webkit-clip-path: ellipse(55% 75% at 50% 75%);
    clip-path: ellipse(55% 75% at 50% 75%);
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
    z-index: -1;
}

@media (max-width: 1199px) {
    .curve-shape::after {
        display: none;
    }
}

.slice-shape-two {
    clip-path: polygon(50% 10%, 100% 0, 100% 100%, 0 100%, 0 0);
}

.has-link {
    position: relative;
}

.has-link .item-link {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 99999;
}

.overlay-one {
    position: relative;
    z-index: 9;
}

.overlay-one::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #02014a;
    opacity: 0.95;
    z-index: -1;
}

.slice-shape {
    clip-path: polygon(0 0, 100% 8%, 100% 100%, 0% 100%);
}

@media (max-width: 1199px) {
    .slice-shape {
        clip-path: polygon(0 0, 100% 5%, 100% 100%, 0% 100%);
    }
}

@media (max-width: 991px) {
    .slice-shape {
        clip-path: polygon(0 0, 100% 0%, 100% 100%, 0% 100%);
    }
}


label {
    color: #777777;
    margin-bottom: 5px;
}

.nice-select {
    width: 100%;
    min-height: 50px;
    line-height: 50px;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
}

.nice-select .list {
    width: 100%;
    box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.15);
}

.para-white {
    color: #e6e6e6 !important;
}

.heading--color {
    color: #363636 !important;
}

.section--bg {
    background-color: #f7f7f7;
}

.section--bg-two {
    background-color: #fafafa;
}

.bg--base {
    background-color: #0056fb;
}

.has--img {
    position: relative;
}

.has--img .section--img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.03;
}

.section-header {
    margin-bottom: 70px;
    margin-top: -8px;
}

@media (max-width: 991px) {
    .section-header {
        margin-bottom: 50px;
    }
}

.section-header p {
    font-size: 18px;
}

@media (max-width: 991px) {
    .section-header p {
        font-size: 16px;
    }
}

.section-sub-title {
    font-size: 20px;
    font-family: "Roboto", sans-serif;
    color: #0056fb;
}

@media (max-width: 767px) {
    .section-sub-title {
        font-size: 20px;
    }
}

.section-title {
    font-size: 40px;
    font-weight: 700;
    text-transform: capitalize;
}

@media (max-width: 991px) {
    .section-title {
        font-size: 36px;
    }
}

@media (max-width: 575px) {
    .section-title {
        font-size: 32px;
    }
}

.section-title+p {
    margin-top: 15px;
}

.border-radius-100 {
    border-radius: 50% !important;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    -ms-border-radius: 50% !important;
    -o-border-radius: 50% !important;
}

.hover--effect-1 {
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.hover--effect-1:hover {
    -webkit-transform: translateY(-5px) scale(1.05);
    -ms-transform: translateY(-5px) scale(1.05);
    transform: translateY(-5px) scale(1.05);
}

.video-button {
    position: absolute;
    width: 105px;
    height: 105px;
    color: #ffffff;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    background-color: #0056fb;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    animation: pulse 2000ms linear infinite;
    -webkit-animation: pulse 2000ms linear infinite;
    -moz-animation: pulse 2000ms linear infinite;
}

.video-button:hover {
    color: #ffffff;
}

.video-button::before,
.video-button::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: 74px;
    background-color: #0056fb;
    opacity: 0.15;
    z-index: -10;
}

.video-button::before {
    z-index: -10;
    animation: inner-ripple 2000ms linear infinite;
    -webkit-animation: inner-ripple 2000ms linear infinite;
    -moz-animation: inner-ripple 2000ms linear infinite;
}

.video-button::after {
    z-index: -10;
    animation: outer-ripple 2000ms linear infinite;
    -webkit-animation: outer-ripple 2000ms linear infinite;
    -moz-animation: outer-ripple 2000ms linear infinite;
}

.video-button i {
    font-size: 52px;
}

@-webkit-keyframes outer-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    80% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }

    100% {
        -webkit-transform: scale(2.5);
        -ms-transform: scale(2.5);
        transform: scale(2.5);
        opacity: 0;
    }
}

@-moz-keyframes outer-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    80% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }

    100% {
        -webkit-transform: scale(2.5);
        -ms-transform: scale(2.5);
        transform: scale(2.5);
        opacity: 0;
    }
}

@-ms-keyframes outer-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    80% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }

    100% {
        -webkit-transform: scale(2.5);
        -ms-transform: scale(2.5);
        transform: scale(2.5);
        opacity: 0;
    }
}

@keyframes outer-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    80% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }

    100% {
        -webkit-transform: scale(2.5);
        -ms-transform: scale(2.5);
        transform: scale(2.5);
        opacity: 0;
    }
}

@-webkit-keyframes inner-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    30% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    100% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }
}

@-moz-keyframes inner-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    30% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    100% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }
}

@-ms-keyframes inner-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    30% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    100% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }
}

@keyframes inner-ripple {
    0% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    30% {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 0.5;
    }

    100% {
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
        opacity: 0;
    }
}

.cmn-list {
    margin-top: 20px;
}

.cmn-list li+li {
    margin-top: 15px;
}

.cmn-list li {
    position: relative;
    padding-left: 40px;
}

.cmn-list li::before {
    position: absolute;
    content: '';
    top: 5px;
    left: 0;
    width: 20px;
    height: 10px;
    border-left: 1px solid #0056fb;
    border-bottom: 1px solid #0056fb;
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

.cmn-list-2 {
    margin-top: 20px;
}

.cmn-list-2 li+li {
    margin-top: 10px;
}

.cmn-list-2 li {
    position: relative;
    padding-left: 45px;
}

.cmn-list-2 li:nth-last-of-type(3n+3)::before {
    border-color: #a22546;
}

.cmn-list-2 li:nth-last-of-type(3n+2)::before {
    border-color: #f7a139;
}

.cmn-list-2 li:nth-last-of-type(3n+1)::before {
    border-color: #3097d1;
}

.cmn-list-2 li::before {
    position: absolute;
    content: '';
    top: 5px;
    left: 0;
    width: 20px;
    height: 10px;
    border-left: 1px solid red;
    border-bottom: 1px solid red;
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

.number-list--style {
    list-style-type: decimal;
    padding-left: 15px;
}

.number-list--style li span {
    font-weight: 500;
    color: #0056fb;
}

.cmn-accordion .card+.card {
    margin-top: 15px;
}

.cmn-accordion .card {
    border: none;
    background-color: #ffffff;
    border-radius: 5px !important;
    -webkit-border-radius: 5px !important;
    -moz-border-radius: 5px !important;
    -ms-border-radius: 5px !important;
    -o-border-radius: 5px !important;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.1);
}

.cmn-accordion .card-header {
    background-color: transparent;
    padding: 0;
    margin-bottom: 0 !important;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 5px !important;
    -webkit-border-radius: 5px !important;
    -moz-border-radius: 5px !important;
    -ms-border-radius: 5px !important;
    -o-border-radius: 5px !important;
}

.cmn-accordion .card-header .btn {
    background-color: #ffffff;
    padding: 10px 20px;
    display: inline-flex;
    display: -ms-inline-flexbox;
    display: -webkit-inline-flex;
    align-items: center;
    text-decoration: none;
    text-align: left;
}

.cmn-accordion .card-header .btn:hover,
.cmn-accordion .card-header .btn:focus {
    text-decoration: none;
    box-shadow: none;
}

.cmn-accordion .card-header .btn i {
    color: #363636;
    font-size: 32px;
}

.cmn-accordion .card-header .btn span {
    color: #363636;
    font-size: 20px;
    padding-left: 15px;
}

@media (max-width: 767px) {
    .cmn-accordion .card-header .btn span {
        font-size: 18px;
    }
}

.cmn-accordion .card-body {
    border-top: 1px solid #e5e5e5;
    padding: 20px 30px;
}

.cmn-accordion2 .card+.card {
    margin-top: 30px;
}

.cmn-accordion2 .card {
    border: none;
    background-color: transparent;
    background-color: #ffffff;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    -o-border-radius: 0;
}

.cmn-accordion2 .card-header {
    background-color: #ffffff;
    margin-bottom: 0 !important;
    border: none;
    padding: 0;
    border-radius: 5px !important;
    -webkit-border-radius: 5px !important;
    -moz-border-radius: 5px !important;
    -ms-border-radius: 5px !important;
    -o-border-radius: 5px !important;
}

.cmn-accordion2 .card-header .acc-btn {
    display: block;
    width: 100%;
    padding: 15px 30px;
    cursor: pointer;
    position: relative;
    text-align: left;
    border: 1px solid #e5e5e5;
    background-color: #ffffff;
}

.cmn-accordion2 .card-header .acc-btn:focus {
    outline: none;
}

.cmn-accordion2 .card-header .acc-btn .text {
    font-weight: 700;
    color: #363636;
    font-size: 18px;
}

@media (max-width: 575px) {
    .cmn-accordion2 .card-header .acc-btn .text {
        font-size: 15px;
    }
}

.cmn-accordion2 .card-body {
    padding: 25px 0 0 0;
}

blockquote p {
    font-weight: 700;
    font-size: 24px;
    color: #ffffff;
}

input:focus,
textarea:focus,
.nice-select.open {
    border-color: #0056fb;
}

.page-breadcrumb {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-top: 15px;
}

.page-breadcrumb li {
    color: #ffffff;
    text-transform: capitalize;
}

.page-breadcrumb li::after {
    content: '-';
    color: #ffffff;
    margin: 0 5px;
}

.page-breadcrumb li:first-child::before {
    content: "\f102";
    font-family: 'Flaticon';
    color: #ef428c;
    margin-right: 6px;
}

.page-breadcrumb li:last-child::after {
    display: none;
}

.page-breadcrumb li a {
    color: #ffffff;
    text-transform: capitalize;
}

@-webkit-keyframes customBounce {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    25% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    50% {
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }

    75% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}

@-moz-keyframes customBounce {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    25% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    50% {
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }

    75% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}

@-ms-keyframes customBounce {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    25% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    50% {
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }

    75% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}

@keyframes customBounce {
    0% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }

    25% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    50% {
        -webkit-transform: translateY(-20px);
        -ms-transform: translateY(-20px);
        transform: translateY(-20px);
    }

    75% {
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    100% {
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
}

#lightcase-overlay {
    z-index: 9999;
}

#lightcase-case {
    z-index: 99999;
}

.scroll-to-top {
    height: 60px;
    width: 60px;
    position: fixed;
    bottom: 5%;
    right: 5%;
    display: none;
    z-index: 99999;
    cursor: pointer;
    text-align: center;
    border-radius: 50%;
    background-color: #0056fb;
    line-height: 77px;
    box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.25);
}

.scroll-to-top .scroll-icon {
    font-size: 31px;
    color: #ffffff;
    display: inline-block;
}

.scroll-to-top .scroll-icon i {
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

a[class*='lightcase-icon-'].lightcase-icon-close {
    top: 100px;
    right: 50px;
}

@keyframes dyinglight {
    15% {
        transform: scale(1.6);
    }

    50% {
        transform: rotate(-89deg);
    }

    100% {
        transform: rotate(-90deg);
    }
}

/* .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #0056fb;
    z-index: 99999999;
} */

.dl {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    display: inline-block;
}

.dl__square {
    display: block;
    width: 50px;
    height: 50px;
    background: #ffffff;
}

.dl__container {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    transform-origin: 50% 50% 0;
    animation: dyinglight 1s ease infinite;
    backface-visibility: hidden;
}

.dl__corner--top:before,
.dl__corner--top:after,
.dl__corner--bottom:before,
.dl__corner--bottom:after {
    position: absolute;
    width: 17px;
    height: 17px;
    color: #ffffff;
    content: '';
}

.dl__corner--top:before {
    border-left: 1px solid;
    border-top: 1px solid;
    top: -6px;
    left: -6px;
}

.dl__corner--top:after {
    border-right: 1px solid;
    border-top: 1px solid;
    top: -6px;
    right: -6px;
}

.dl__corner--bottom:before {
    border-left: 1px solid;
    border-bottom: 1px solid;
    bottom: -6px;
    left: -6px;
}

.dl__corner--bottom:after {
    border-right: 1px solid;
    border-bottom: 1px solid;
    bottom: -6px;
    right: -6px;
}

/* global css end */
h1 {
    font-size: 62px;
}

h2 {
    font-size: 40px;
}

@media (max-width: 991px) {
    h2 {
        font-size: 36px;
    }
}

@media (max-width: 575px) {
    h2 {
        font-size: 28px;
    }
}

h3 {
    font-size: 24px;
}

h4 {
    font-size: 22px;
}

@media (max-width: 767px) {
    h4 {
        font-size: 20px;
    }
}

h5 {
    font-size: 20px;
}

@media (max-width: 767px) {
    h5 {
        font-size: 18px;
    }
}

h6 {
    font-size: 18px;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Poppins", sans-serif;
    color: #363636;
    font-weight: 600;
    margin: 0;
    line-height: 1.4;
}

h1>a,
h2>a,
h3>a,
h4>a,
h5>a,
h6>a {
    font-family: "Poppins", sans-serif;
    color: #363636;
    font-weight: 600;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    line-height: 1.4;
}

p,
li {
    font-size: 16px;
    color: #6f6f6f;
    line-height: 1.7;
    margin: 0;
}

a {
    text-decoration: none;
    display: inline-block;
    font-family: "Roboto", sans-serif;
    font-weight: 400;
}

a:hover {
    text-decoration: none;
}

/* button css start */
.cmn-btn {
    padding: 12px 35px;
    text-transform: uppercase;
    border-radius: 999px;
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    -ms-border-radius: 999px;
    -o-border-radius: 999px;
    /* background-color: #0056fb; */
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.15);
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    color: #ffffff;
}

.cmn-btn:hover {
    color: #ffffff;
    /* background-color: #004de2; */
}

.cmn-btn:active {
    color: #ffffff !important;
    /* background-color: #004de2 !important; */
    border: none;
    outline: none;
}

.cmn-btn:focus {
    color: #ffffff !important;
    /* background-color: #004de2 !important; */
    border: none;
    outline: none;
}

.btn--base {
    padding: 12px 35px;
    /* background-color: #0056fb; */
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    color: #ffffff;
}

.btn--base.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: .875rem;
    border-radius: 0.2rem;
}

.btn--base:hover {
    color: #ffffff;
    /* background-color: #004de2; */
}

.btn--base:active {
    color: #ffffff !important;
    /* background-color: #004de2 !important; */
    border: none;
    outline: none;
}

.btn--base:focus {
    color: #ffffff !important;
    /* background-color: #004de2 !important; */
    border: none;
    outline: none;
}


.btn--primary {
    background-color: #4634ff !important;
}

.btn--primary:hover {
    background-color: #5e50ee !important;
}

.btn--secondary {
    background-color: #868e96 !important;
}

.btn--secondary:hover {
    background-color: #78818a !important;
}

.btn--success {
    background-color: #28c76f !important;
}

.btn--success:hover {
    background-color: #24b263 !important;
}

.btn--danger {
    background-color: #ea5455 !important;
}

.btn--danger:hover {
    background-color: #e73d3e !important;
}

.btn--warning {
    background-color: #ff9f43 !important;
}

.btn--warning:hover {
    background-color: #ff922a !important;
}

.btn--info {
    background-color: #1e9ff2 !important;
}

.btn--info:hover {
    background-color: #0d93e9 !important;
}

.btn--dark {
    background-color: #10163A !important;
}

.btn--dark:hover {
    background-color: #0a0e26 !important;
}

.btn--primary,
.btn--secondary,
.btn--success,
.btn--danger,
.btn--warning,
.btn--info,
.btn--dark {
    color: #ffffff;
}

.btn--primary:hover,
.btn--secondary:hover,
.btn--success:hover,
.btn--danger:hover,
.btn--warning:hover,
.btn--info:hover,
.btn--dark:hover {
    color: #ffffff;
}


.text--primary {
    color: #4634ff !important;
}

.text--secondary {
    color: #868e96 !important;
}

.text--success {
    color: #28c76f !important;
}

.text--danger {
    color: #ea5455 !important;
}

.text--warning {
    color: #ff9f43 !important;
}

.text--info {
    color: #1e9ff2 !important;
}

.text--dark {
    color: #10163A !important;
}




input[type="submit"] {
    padding: 12px 35px;
    text-transform: uppercase;
    border-radius: 999px;
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    -ms-border-radius: 999px;
    -o-border-radius: 999px;
    background-color: #0056fb;
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.15);
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    color: #ffffff;
}

.btn-border {
    padding: 14px 35px;
    font-size: 16px;
    font-weight: 600;
    text-transform: capitalize;
    color: #6f6f6f;
    border-radius: 999px;
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    -ms-border-radius: 999px;
    -o-border-radius: 999px;
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.btn-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    margin-left: -10px;
    margin-right: -10px;
}

.btn-group *[class*="btn"] {
    margin: 5px 10px;
    align-items: center;
}

.btn-group *[class*="btn"].d-flex {
    padding: 8px 35px;
}

*[class*="btn"] .btn-sm {
    padding: 6px 20px;
}

/* button css end */
/* form css start */
.form-control:focus {
    background-color: transparent;
    box-shadow: none;
}
textarea.form-control {
    height: 120px;
}

/* form css end*/
/* keyframes css start */
@-webkit-keyframes rifaRounded {
    0% {
        -webkit-transform: translate(-50%, -50%) rotate(0deg);
        -ms-transform: translate(-50%, -50%) rotate(0deg);
        transform: translate(-50%, -50%) rotate(0deg);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) rotate(360deg);
        -ms-transform: translate(-50%, -50%) rotate(360deg);
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

@-moz-keyframes rifaRounded {
    0% {
        -webkit-transform: translate(-50%, -50%) rotate(0deg);
        -ms-transform: translate(-50%, -50%) rotate(0deg);
        transform: translate(-50%, -50%) rotate(0deg);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) rotate(360deg);
        -ms-transform: translate(-50%, -50%) rotate(360deg);
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

@-ms-keyframes rifaRounded {
    0% {
        -webkit-transform: translate(-50%, -50%) rotate(0deg);
        -ms-transform: translate(-50%, -50%) rotate(0deg);
        transform: translate(-50%, -50%) rotate(0deg);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) rotate(360deg);
        -ms-transform: translate(-50%, -50%) rotate(360deg);
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

@keyframes rifaRounded {
    0% {
        -webkit-transform: translate(-50%, -50%) rotate(0deg);
        -ms-transform: translate(-50%, -50%) rotate(0deg);
        transform: translate(-50%, -50%) rotate(0deg);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) rotate(360deg);
        -ms-transform: translate(-50%, -50%) rotate(360deg);
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

@-webkit-keyframes rifaPulse {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }

    25% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    50% {
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        -ms-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }

    75% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }
}

@-moz-keyframes rifaPulse {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }

    25% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    50% {
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        -ms-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }

    75% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }
}

@-ms-keyframes rifaPulse {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }

    25% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    50% {
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        -ms-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }

    75% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }
}

@keyframes rifaPulse {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }

    25% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    50% {
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        -ms-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }

    75% {
        -webkit-transform: translate(-50%, -50%) scale(1.05);
        -ms-transform: translate(-50%, -50%) scale(1.05);
        transform: translate(-50%, -50%) scale(1.05);
    }

    100% {
        -webkit-transform: translate(-50%, -50%) scale(1);
        -ms-transform: translate(-50%, -50%) scale(1);
        transform: translate(-50%, -50%) scale(1);
    }
}

@-webkit-keyframes rifaLight {
    0% {
        opacity: 1;
    }

    25% {
        opacity: 0.6;
    }

    50% {
        opacity: 1;
    }

    75% {
        opacity: 0.6;
    }

    100% {
        opacity: 1;
    }
}

@-moz-keyframes rifaLight {
    0% {
        opacity: 1;
    }

    25% {
        opacity: 0.6;
    }

    50% {
        opacity: 1;
    }

    75% {
        opacity: 0.6;
    }

    100% {
        opacity: 1;
    }
}

@-ms-keyframes rifaLight {
    0% {
        opacity: 1;
    }

    25% {
        opacity: 0.6;
    }

    50% {
        opacity: 1;
    }

    75% {
        opacity: 0.6;
    }

    100% {
        opacity: 1;
    }
}

@keyframes rifaLight {
    0% {
        opacity: 1;
    }

    25% {
        opacity: 0.6;
    }

    50% {
        opacity: 1;
    }

    75% {
        opacity: 0.6;
    }

    100% {
        opacity: 1;
    }
}

/* keyframes css end */
/* header start */
.header {
    position: fixed;
    width: 100%;
    left: 0;
    top: 0;
    z-index: 9;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.header.active {
    background-color: #070B28;
}

.header.menu-fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
}

.header.menu-fixed .header__top {
    display: none;
}

.header.menu-fixed .header__bottom {
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.1);
    background-color: #070B28;
    padding: 5px 0;
}

.header__top {
    padding: 15px 0;
    border-bottom: 1px solid rgba(90, 75, 204, 0.3);
}

@media (max-width: 1199px) {
    .header__top {
        padding: 8px 0;
    }
}

@media (max-width: 575px) {
    .header__top .left {
        justify-content: center;
    }
}

.header__top .left a {
    color: #ffffff;
}

@media (max-width: 1199px) {
    .header__top .left a {
        font-size: 14px;
    }
}

.language i {
    color: #ffffff;
    font-size: 18px;
    margin-right: 5px;
}

@media (max-width: 1199px) {
    .language i {
        font-size: 15px;
    }
}

.language .nice-select {
    width: auto;
    background-color: transparent;
    padding-left: 0;
    padding-right: 10px;
    min-height: 40px;
    line-height: 44px;
    border: none;
}

.language .nice-select::after {
    right: 0;
    margin-top: -2px;
}

.language .nice-select .list {
    background-color: #0056fb;
    box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.35);
    width: 75px;
}

.language .nice-select .option {
    background-color: transparent;
    padding-left: 10px;
    padding-right: 10px;
    color: #ffffff;
}

.language .nice-select .current {
    color: #ffffff;
}

.header__top .right a {
    color: #ffffff;
}

.header__top .right a:last-child {
    margin-right: 0;
}

.header__bottom {
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

@media (max-width: 1199px) {
    .header__bottom {
        padding: 10px 0;
    }
}

.header .site-logo img {
    max-width: 220px;
    max-height: 50px;
}


@media (max-width: 1199px) {
    .header .site-logo img {
        max-width: 150px;
    }
}

@media (max-width: 1199px) {
    .header .main-menu {
        padding: 15px 0;
    }
}

.header .main-menu li {
    position: relative;
}

.header .main-menu li.menu_has_children {
    position: relative;
}

.header .main-menu li.menu_has_children.open .sub-menu {
    display: block;
}

@media (max-width: 1199px) {
    .header .main-menu li.menu_has_children>a {
        display: block;
    }
}

.header .main-menu li.menu_has_children>a::before {
    position: absolute;
    content: "\f107";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    top: 0;
    right: 0;
    color: #ffffff;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    display: none;
}

@media (max-width: 1199px) {
    .header .main-menu li.menu_has_children>a::before {
        display: block;
        top: 9px;
    }
}

.header .main-menu li.menu_has_children:hover>a::before {
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
    color: #0056fb;
}

.header .main-menu li a {
    padding: 20px 15px 20px 0;
    text-transform: uppercase;
    font-size: 16px;
    color: #e7e7f4;
    position: relative;
}

@media (max-width: 1199px) {
    .header .main-menu li a {
        padding: 8px 0;
        display: block;
    }
    .header .main-menu li:not(:last-child) a {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
}

.header .main-menu li a:hover,
.header .main-menu li a:focus {
    color: #0056fb;
}

.header .main-menu li .sub-menu {
    position: absolute;
    width: 220px;
    top: 105%;
    left: -20px;
    z-index: 9999;
    background-color: #004de2;
    padding: 10px 0;
    border-top: 2px solid #0056fb;
    -webkit-box-shadow: 0px 18px 54px -8px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 18px 54px -8px rgba(0, 0, 0, 0.15);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    opacity: 0;
    visibility: hidden;
    border-top: 2px solid #ffffff;
}

@media (max-width: 1199px) {
    .header .main-menu li .sub-menu {
        opacity: 1;
        visibility: visible;
        display: none;
        position: static;
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
        width: 100%;
    }
}

.header .main-menu li .sub-menu li a {
    padding: 8px 20px;
    display: block;
    color: #ffffff;
    font-size: 14px;
}

.header .main-menu li .sub-menu li a:hover {
    background-color: rgba(255, 255, 255, 0.05);
    color: #ffffff;
    text-decoration: underline;
}

.header .main-menu li .sub-menu li+li {
    margin-left: 0;
}

.header .main-menu li:hover .sub-menu {
    top: 100%;
    opacity: 1;
    visibility: visible;
}

.header .main-menu li+li {
    margin-left: 20px;
}

@media (max-width: 1199px) {
    .header .main-menu li+li {
        margin-left: 0;
    }
}

.header .nav-right {
    margin-left: 30px;
}

@media (max-width: 1199px) {
    .header .nav-right {
        margin-left: 0;
    }
}

.header .nav-right .cmn-btn {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
}

@media (max-width: 1199px) {
    .header .nav-right .cmn-btn {
        display: inline-block;
        margin-bottom: 15px;
    }
}

.header .nav-right .cmn-btn i {
    margin-right: 6px;
    font-size: 22px;
    color: #ffb200;
}

@media (max-width: 767px) {
    .navbar-collapse {
        max-height: 320px;
        overflow: auto;
    }
}

.navbar-toggler {
    padding: 0;
    border: none;
}

.navbar-toggler:focus {
    outline: none;
    box-shadow: none;
}

.menu-toggle {
    margin: 10px 0;
    position: relative;
    display: block;
    width: 35px;
    height: 20px;
    cursor: pointer;
    background: transparent;
    border-top: 2px solid;
    border-bottom: 2px solid;
    color: #000000;
    font-size: 0;
    -webkit-transition: all 0.25s ease-in-out;
    -o-transition: all 0.25s ease-in-out;
    transition: all 0.25s ease-in-out;
    cursor: pointer;
}

@media (max-width: 1199px) {
    .menu-toggle {
        color: #ffffff;
    }
}

.menu-toggle:before,
.menu-toggle:after {
    content: '';
    display: block;
    width: 100%;
    height: 2px;
    position: absolute;
    top: 50%;
    left: 50%;
    background: currentColor;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    transition: -webkit-transform 0.25s ease-in-out;
    -webkit-transition: -webkit-transform 0.25s ease-in-out;
    -o-transition: -webkit-transform 0.25s ease-in-out;
    transition: transform 0.25s ease-in-out;
    -moz-transition: -webkit-transform 0.25s ease-in-out;
    -ms-transition: -webkit-transform 0.25s ease-in-out;
}

@media (max-width: 1199px) {

    .menu-toggle:before,
    .menu-toggle:after {
        background-color: #ffffff;
    }
}

span.is-active {
    border-color: transparent;
}

span.is-active:before {
    -webkit-transform: translate(-50%, -50%) rotate(45deg);
    -ms-transform: translate(-50%, -50%) rotate(45deg);
    transform: translate(-50%, -50%) rotate(45deg);
}

span.is-active:after {
    -webkit-transform: translate(-50%, -50%) rotate(-45deg);
    -ms-transform: translate(-50%, -50%) rotate(-45deg);
    transform: translate(-50%, -50%) rotate(-45deg);
}

span.menu-toggle:hover {
    color: #000000;
}

@media (max-width: 1199px) {
    span.menu-toggle:hover {
        color: #ffffff;
    }
}

span.is-active {
    border-color: transparent;
}

span.is-active:before {
    -webkit-transform: translate(-50%, -50%) rotate(45deg);
    -ms-transform: translate(-50%, -50%) rotate(45deg);
    transform: translate(-50%, -50%) rotate(45deg);
}

span.is-active:after {
    -webkit-transform: translate(-50%, -50%) rotate(-45deg);
    -ms-transform: translate(-50%, -50%) rotate(-45deg);
    transform: translate(-50%, -50%) rotate(-45deg);
}

/* header end */
/* hero-section css start */
.hero {
    position: relative;
}

.hero__content {
    position: relative;
    z-index: 9;
}

.hero__content p {
    color: #ffffff;
    margin-top: 25px;
    font-size: 18px;
}

@media (max-width: 767px) {
    .hero__content p {
        font-size: 16px;
    }
}

.hero__title {
    font-size: 72px;
    font-weight: 700;
    color: #ffffff;
}

@media (max-width: 1199px) {
    .hero__title {
        font-size: 62px;
    }
}

@media (max-width: 767px) {
    .hero__title {
        font-size: 56px;
    }
}

@media (max-width: 575px) {
    .hero__title {
        font-size: 48px;
    }
}

@media (max-width: 480px) {
    .hero__title {
        font-size: 42px;
    }
}

@media (max-width: 320px) {
    .hero__title {
        font-size: 36px;
    }
}

.hero__slider .slick-arrow {
    position: absolute;
    top: 50%;
    z-index: 99;
    width: 80px;
    height: 40px;
    color: #ffffff;
    font-size: 42px;
    margin-top: -20px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.hero__slider .slick-arrow:hover::before {
    width: 55px;
    height: 55px;
}

.hero__slider .slick-arrow::before {
    position: absolute;
    content: '';
    top: 50%;
    left: 50%;
    width: 40px;
    height: 40px;
    background-color: #0056fb;
    opacity: 0.25;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    z-index: -1;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.hero__slider .slick-arrow.prev {
    left: 50px;
}

.hero__slider .slick-arrow.prev::before {
    left: 35%;
}

.hero__slider .slick-arrow.next {
    right: 50px;
}

.hero__slider .slick-arrow.next::before {
    left: 65%;
}

.hero .single__slide {
    padding-top: 335px;
    padding-bottom: 250px;
    position: relative;
    z-index: 1;
}

@media (max-width: 1199px) {
    .hero .single__slide {
        padding-top: 275px;
        padding-bottom: 195px;
    }
}

@media (max-width: 767px) {
    .hero .single__slide {
        padding-top: 245px;
        padding-bottom: 145px;
    }
}

@media (max-width: 575px) {
    .hero .single__slide {
        padding-bottom: 130px;
    }
}

.hero .single__slide::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #001d4a;
    z-index: -1;
    opacity: 0.75;
}

/* hero-section css edn */
/* inner-page-hero css start */
.inner-page-hero {
    padding-top: 265px;
    padding-bottom: 150px;
    position: relative;
    z-index: 1;
    background-position-y: center;
}

@media (max-width: 1199px) {
    .inner-page-hero {
        padding-top: 170px;
        padding-bottom: 90px;
    }
}

@media (max-width: 575px) {
    .inner-page-hero {
        padding-top: 145px;
        padding-bottom: 60px;
    }
}

.inner-page-hero::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #001d4a;
    opacity: 0.85;
    z-index: -1;
}

.inner-page-hero .page-title {
    font-weight: 600;
    color: #ffffff;
}

.inner-page-hero .page-list {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-top: 15px;
}

.inner-page-hero .page-list li {
    padding: 0 15px;
    position: relative;
    color: rgba(255, 255, 255, 0.7);
}

.inner-page-hero .page-list li:first-child {
    padding-left: 0;
}

.inner-page-hero .page-list li:first-child::before {
    display: none;
}

.inner-page-hero .page-list li::before {
    position: absolute;
    content: '/';
    color: #ffffff;
    left: 0px;
}

.inner-page-hero .page-list li a {
    color: #ffffff;
}

/* inner-page-hero css end */
/* category-section css start */
.category-card {
    padding: 30px 15px;
    background-color: #0056fb;
    text-align: center;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    box-shadow: 0 10px 20px 0 rgba(35, 72, 199, 0.25);
    margin: 25px 15px;
}

.category-card__icon {
    color: #ffffff;
    font-size: 56px;
    line-height: 1;
}

.category-card__content {
    margin-top: 10px;
}

.category-card__content .title {
    color: #ffffff;
}

.category-slider .slick-list {
    margin: -25px -15px;
}

.category-slider .slick-arrow {
    position: absolute;
    width: 40px;
    height: 40px;
    background-color: #0056fb;
    color: #ffffff;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    bottom: -25px;
    left: -65%;
    cursor: pointer;
}

@media (max-width: 1359px) {
    .category-slider .slick-arrow {
        bottom: -50px;
    }
}

.category-slider .slick-arrow.prev {
    left: -75%;
}

/* category-section css end */
/* about section css start */
.video-thumb {
    position: relative;
}

.video-thumb .video-icon {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 150px;
    height: 150px;
    background-color: #0056fb;
    color: #ffffff;
    font-size: 72px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

@media (max-width: 575px) {
    .video-thumb .video-icon {
        width: 120px;
        height: 120px;
        font-size: 56px;
    }
}

@media (max-width: 320px) {
    .video-thumb .video-icon {
        width: 90px;
        height: 90px;
        font-size: 48px;
    }
}

/* about section css end */
/* feature section css start */
.feature-card {
    padding: 30px 30px;
    background-color: #ffffff;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.feature-card:hover {
    -webkit-transform: translateY(-5px);
    -ms-transform: translateY(-5px);
    transform: translateY(-5px);
    background-color: #0056fb;
}

.feature-card:hover .feature-card__icon {
    color: #ffffff;
}

.feature-card:hover .feature-card__content .title {
    color: #ffffff;
}

.feature-card:hover .feature-card__content p {
    color: #ffffff;
}

.feature-card__icon {
    color: #0056fb;
    font-size: 72px;
    line-height: 1;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.feature-card__content {
    margin-top: 20px;
}

.feature-card__content .title {
    margin-bottom: 15px;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.feature-card__content p {
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.feature-card.style--two {
    text-align: center;
}

.feature-card.style--two:hover .feature-card__icon {
    background-color: rgba(255, 255, 255, 0.1);
}

.feature-card.style--two .feature-card__icon {
    width: 95px;
    height: 95px;
    background-color: rgba(0, 86, 251, 0.1);
    font-size: 56px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    margin: 0 auto 30px auto;
}

/* feature section css end */
/* event section css start */
.event-card {
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
}

.event-card__thumb {
    position: relative;
}

.event-card__thumb .event__date {
    position: absolute;
    top: 30px;
    left: 30px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    color: #ffffff;
}

.event-card__thumb .event__date i {
    font-size: 32px;
    position: relative;
    z-index: 1;
}

.event-card__thumb .event__date i::after {
    position: absolute;
    content: '';
    top: -8px;
    left: -9px;
    width: 50px;
    height: 50px;
    background-color: #0056fb;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    z-index: -1;
}

.event-card__thumb .event__date .date {
    color: #ffffff;
    font-size: 18px;
    margin-left: 25px;
    padding: 5px 25px;
    background-color: #0056fb;
    border-radius: 999px;
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    -ms-border-radius: 999px;
    -o-border-radius: 999px;
}

.event-card__content {
    background-color: #ffffff;
    padding: 30px 30px;
}

.event-card__content .title {
    margin-bottom: 10px;
}

.event-card__meta {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0 -10px -5px -10px;
    align-items: center;
}

.event-card__meta li {
    margin: 5px 10px;
    display: inline-flex;
    display: -ms-inline-flexbox;
    display: -webkit-inline-flex;
    align-items: center;
    font-size: 14px;
}

.event-card__meta li i {
    font-size: 22px;
    line-height: 1;
    padding-right: 8px;
}

.event-card.style--two {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}

@media (max-width: 991px) {
    .event-card.style--two {
        align-items: center;
    }
}

.event-card.style--two .event-card__thumb {
    width: 40%;
}

@media (max-width: 480px) {
    .event-card.style--two .event-card__thumb {
        width: 100%;
        max-height: 300px;
        overflow: hidden;
    }
}

.event-card.style--two .event-card__thumb img {
    height: 100%;
    object-fit: cover;
    -o-object-fit: cover;
    object-position: center;
    -o-object-position: center;
}

.event-card.style--two .event-card__thumb .event__date {
    top: 15px;
    left: 20px;
}

.event-card.style--two .event-card__thumb .event__date i {
    font-size: 20px;
}

.event-card.style--two .event-card__thumb .event__date i::after {
    width: 32px;
    height: 32px;
    top: -7px;
    left: -6px;
}

.event-card.style--two .event-card__thumb .event__date .date {
    font-size: 12px;
    padding: 3px 15px;
}

.event-card.style--two .event-card__content {
    width: 60%;
    padding: 25px 25px;
}

@media (max-width: 480px) {
    .event-card.style--two .event-card__content {
        width: 100%;
    }
}

/* event section css end */
/* event details css start */
.event-details-thumb {
    max-height: 500px;
    overflow: hidden;
}

.icon-card {
    padding: 20px 20px;
    background-color: #ffffff;
    box-shadow: 0 0px 5px 3px rgba(35, 72, 199, 0.1);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
}

.icon-card__icon {
    width: 60px;
    height: 60px;
    background-color: #0056fb;
    color: #ffffff;
    font-size: 36px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.icon-card__content {
    padding-left: 20px;
    width: calc(100% - 60px);
}

.icon-card__content .number {
    font-size: 22px;
}

@media (max-width: 1359px) {
    .icon-card__content .number {
        font-size: 20px;
    }
}

.event-details-content p {
    margin-top: 20px;
}

.event-map {
    width: 100%;
    height: 450px;
    margin-top: 30px;
    border: none;
}

/* event details css end */
/* course section css start */
.course-card {
    background-color: #ffffff;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    overflow: hidden;
}

.course-card__content {
    padding: 30px 30px;
}

.course-card__content .stars i {
    color: #faa603;
}

.course-card__content .stars span {
    font-size: 14px;
}

.course-card__meta {
    margin: 25px -10px -5px -10px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: space-between;
}

.course-card__meta li {
    margin: 5px 10px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
}

.course-card__meta .name {
    color: #6f6f6f;
    padding-left: 15px;
}

.course-card__meta .course-avatar {
    width: 45px;
    height: 45px;
}

.course-card__meta .course-avatar img {
    width: inherit;
    height: inherit;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    object-fit: cover;
    -o-object-fit: cover;
    object-position: center;
    -o-object-position: center;
}

/* course section css end */
/* teacher section css start */
.teacher-card {
    background-color: #ffffff;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    overflow: hidden;
}

.teacher-card:hover .teacher-card__thumb::before {
    opacity: 0.5;
}

.teacher-card:hover .teacher-card__content {
    background-color: #0056fb;
}

.teacher-card:hover .teacher-card__content .name,
.teacher-card:hover .teacher-card__content .designation {
    color: #ffffff;
}

.teacher-card__thumb {
    position: relative;
    overflow: hidden;
}

.teacher-card__thumb::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #001d4a;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.teacher-card__content {
    padding: 30px 30px;
    text-align: center;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.teacher-card.style--two {
    background-color: transparent;
    box-shadow: none;
}

.teacher-card.style--two:hover .teacher-card__content {
    background-color: transparent;
}

.teacher-card.style--two:hover .teacher-card__content .name {
    color: #363636;
}

.teacher-card.style--two:hover .teacher-card__content .designation {
    color: #6f6f6f;
}

.teacher-card.style--two .teacher-card__thumb {
    text-align: center;
}

.teacher-card.style--two .teacher-card__thumb::before {
    display: none;
}

.teacher-card.style--two .teacher-card__thumb img {
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    height: 280px;
    width: 280px;
    display: inline-block;
}

@media (max-width: 1359px) {
    .teacher-card.style--two .teacher-card__thumb img {
        height: auto;
    }
}

/* teacher section css end */
/* teacher details section css start */
.teacher-single__content {
    padding: 30px 30px;
    text-align: center;
}

.teacher-single .social-links {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 15px;
}

.teacher-single .social-links li a {
    width: 45px;
    height: 45px;
}

.teacher-single-details .title~p {
    margin-top: 20px;
}

.teacher-single-details .content-item span {
    color: #0056fb;
}

.content-item+.content-item {
    margin-top: 20px;
}

/* teacher details section css end */
/* overview section css start */
.min-height--block {
    min-height: 550px;
}

.video-thumb-two {
    position: relative;
}

.video-thumb-two::before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #001d4a;
    opacity: 0.65;
}

.video-thumb-two .video-button {
    top: 50%;
    left: 50%;
    margin-left: -50px;
    margin-top: -50px;
}

.overview-area {
    padding-left: 100px;
    padding-right: 100px;
}

@media (max-width: 767px) {
    .overview-area {
        padding-left: 50px;
        padding-right: 50px;
    }
}

@media (max-width: 575px) {
    .overview-area {
        padding-left: 30px;
        padding-right: 30px;
    }
}

.overview-area .section-title {
    color: #ffffff;
}

.overview-area p {
    color: #e6e6e6;
}

.counter-card__icon {
    font-size: 52px;
    line-height: 1;
}

.counter-card__content {
    margin-top: 25px;
}

.counter-card span {
    font-size: 36px;
    font-family: "Poppins", sans-serif;
    font-weight: 700;
    line-height: 1;
}

.counter-card p {
    font-size: 18px;
    margin-top: 10px;
}

/* overview section css end */
/* faq section css start */
.request-quote {
    padding: 30px;
    background-color: #ffffff;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    border: 1px solid #e5e5e5;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
}

.request-quote .title {
    position: relative;
    padding-bottom: 10px;
}

.request-quote .title::before {
    position: absolute;
    content: '';
    bottom: 0;
    left: 0;
    width: 25px;
    height: 3px;
    background-color: #0056fb;
}

.request-form {
    margin-top: 40px;
}

.request-form input::-webkit-input-placeholder {
    color: #d3d3d3;
}

.request-form input::-moz-placeholder {
    color: #d3d3d3;
}

.request-form input:-ms-input-placeholder {
    color: #d3d3d3;
}

.request-form input:-moz-placeholder {
    color: #d3d3d3;
}

.request-form .form-group+.form-group {
    margin-top: 20px;
}

.request-form .nice-select {
    margin-bottom: 30px;
}

/* faq section css end */
/* testimonial section css start */
.testimonial-card {
    padding: 30px;
    background-color: #ffffff;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    text-align: center;
}

.testimonial-card .thumb {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    overflow: hidden;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 25px;
    border: 5px solid #dddddd;
}

.testimonial-card .designation {
    color: #0056fb;
    font-size: 14px;
    font-style: italic;
}

.testimonial-card p {
    margin-top: 20px;
}

.testimonial-slider .slick-list {
    margin: -25px -15px;
}

.testimonial-slider .testimonial-card {
    margin: 25px 15px;
}

.slick-dots {
    display: flex;
    justify-content: center;
    margin-top: 35px;
}

.slick-dots li {
    margin: 0 5px;
}

.slick-dots li.slick-active button {
    background-color: #0056fb;
}

.slick-dots li button {
    font-size: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    background-color: #dddddd;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

/* testimonial section css end */
/* blog section css start */
.blog-post {
    background-color: #ffffff;
    box-shadow: 0 10px 25px 0 rgba(35, 72, 199, 0.1);
}

.blog-post__content {
    padding: 30px 30px;
}

.blog-post__icon {
    font-size: 36px;
    margin-top: 15px;
}

.blog-post__title {
    margin-bottom: 25px;
}

.blog-post__meta {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: space-between;
}

.blog-post__meta li a {
    color: #6f6f6f;
}

/* blog section css end */
/* blog-details-section css start */
.blog-details__thumb {
    position: relative;
}

.blog-details__thumb img {
    width: 100%;
}

.blog-details__thumb .post__date {
    position: absolute;
    top: 0;
    left: 0;
    width: 75px;
    text-align: center;
}

.blog-details__thumb .post__date .date {
    font-size: 30px;
    font-weight: 700;
    color: #ffffff;
    background-color: #0056fb;
    padding: 10px 5px;
    width: 100%;
    line-height: 1;
}

.blog-details__thumb .post__date .month {
    background-color: #ffffff;
    text-transform: uppercase;
    padding: 4px 5px;
    width: 100%;
    line-height: 1;
    font-size: 18px;
}

.blog-details__content {
    margin-top: 30px;
}

.blog-details__content p {
    margin-top: 20px;
}

.blog-details__content .blog-details__title {
    font-size: 24px;
}

.blog-details__content blockquote {
    margin-top: 30px;
    margin-bottom: 0;
}

blockquote {
    font-size: 18px;
    color: #6f6f6f;
    font-style: italic;
    text-align: center;
    padding: 50px 60px;
    background-color: #f6f9fa;
}

@media (max-width: 575px) {
    blockquote {
        padding: 30px 40px;
        font-size: 16px;
    }
}

.blog-details__footer {
    text-align: center;
    padding: 50px 0;
    border-bottom: 1px solid #e5e5e5;
}

.blog-details__footer .caption {
    font-size: 24px;
    margin-bottom: 20px;
}

.blog-details__footer .social__links {
    justify-content: center;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}

.blog-details__footer .social__links li a {
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
    color: #363636;
}

.blog-details__footer .social__links li a:hover {
    background-color: #0056fb;
    color: #ffffff;
}

.comments-area {
    margin-top: 100px;
    margin-right: 30px;
    border-radius: 8px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
}

.comments-area .title {
    text-transform: capitalize;
    margin-bottom: 20px;
    font-size: 24px;
}

.comments-list .single-comment {
    display: flex;
    flex-wrap: wrap;
    padding: 20px 0;
}

.comments-list .single-comment:first-child {
    padding-top: 0;
}

.comments-list .single-comment:last-child {
    padding-bottom: 0;
}

.comments-list .single-comment__thumb {
    width: 100px;
    height: 100px;
    overflow: hidden;
}

.comments-list .single-comment__content {
    width: calc(100% - 100px);
    padding-left: 20px;
}

@media (max-width: 480px) {
    .comments-list .single-comment__content {
        flex: 0 0 100%;
        -ms-flex: 0 0 100%;
        max-width: 100%;
        padding-left: 0;
        margin-top: 15px;
    }
}

.comments-list .single-comment__content .name {
    text-transform: capitalize;
}

.comments-list .single-comment__content .date {
    font-size: 14px;
    font-style: italic;
}

.comments-list .single-comment__content p {
    margin-top: 5px;
}

.reply-btn {
    width: 28px;
    height: 28px;
    background-color: #f7f5fb;
    color: #0056fb;
    text-align: center;
    line-height: 28px;
    font-size: 13px;
    float: right;
    margin-top: -30px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
}

.reply-btn:hover {
    background-color: #0056fb;
    color: #ffffff;
}

.reply-btn i {
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
}

.comment-form-area {
    margin-top: 70px;
    margin-right: 30px;
}

.comment-form-area .title {
    font-size: 24px;
    margin-bottom: 20px;
}

.comment-form input,
.comment-form textarea {
    background-color: #ffffff;
    border: 1px solid #e5e5e5;
}

.comment-form input:focus,
.comment-form textarea:focus {
    box-shadow: 0px 3px 18px 2px rgba(46, 25, 204, 0.16);
    border-color: transparent;
}

.d-pagination .pagination li a {
    padding: 5px;
    border-radius: 5px !important;
    -webkit-border-radius: 5px !important;
    -moz-border-radius: 5px !important;
    -ms-border-radius: 5px !important;
    -o-border-radius: 5px !important;
    line-height: 35px;
}

/* blog-details-section css end */
/* contact section css start */
.contact-item {
    padding: 0 50px 50px 50px;
    background-color: #0056fb;
    text-align: center;
    margin-top: 50px;
    border-radius: 8px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.contact-item:hover {
    box-shadow: 0 10px 30px 0 rgba(0, 86, 251, 0.35);
    -webkit-transform: translateY(-5px);
    -ms-transform: translateY(-5px);
    transform: translateY(-5px);
}

.contact-item .icon {
    width: 100px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    background-color: #ffffff;
    box-shadow: 0px 3px 18px 2px rgba(46, 25, 204, 0.16);
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    -webkit-transform: translateY(-50px);
    -ms-transform: translateY(-50px);
    transform: translateY(-50px);
}

.contact-item .icon i {
    font-size: 36px;
    color: #0056fb;
}

.contact-item .content .title,
.contact-item .content p,
.contact-item .content span,
.contact-item .content a,
.contact-item .content li {
    color: #ffffff;
}

.contact-item .content .title {
    margin-bottom: 20px;
    text-transform: capitalize;
}

.contact-item .content a+a {
    margin-top: 5px;
}

.contact-form-wrapper .title {
    font-size: 40px;
    margin-bottom: 15px;
}


@media (max-width: 991px) {
    .contact-content {
        margin-top: 50px;
    }
}

.contact-content .caption {
    font-size: 20px;
    text-transform: uppercase;
}

@media (max-width: 575px) {
    .contact-content .caption {
        font-size: 18px;
    }
}

/* contact section css end */
/* course details css start */
.course-details .course-title {
    font-size: 32px;
    margin-top: 30px;
}

.course-details .subtitle {
    margin-top: 30px;
}

.course-details p {
    margin-top: 20px;
}

.course-details-list li+li {
    margin-top: 10px;
}

/* course details css end */
/* gallery section css start */
.gallery-card {
    position: relative;
}

.gallery-card:hover .view-btn {
    opacity: 1;
    visibility: visible;
}

.gallery-card .view-btn {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.65);
    color: #ffffff;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    font-size: 42px;
    opacity: 0;
    visibility: none;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

/* gallery section css end */
/* login section css start */
.login-area {
    text-align: center;
}

.action-form {
    text-align: left;
}

.action-form .input-group-text i {
    font-size: 24px;
}

.action-form .form-group {
    margin-bottom: 0;
}

.action-form .form-group+.form-group {
    margin-top: 25px;
}

/* login section css end */
/* privacy section css start */
.content-block+.content-block {
    margin-top: 50px;
}

.content-block .content__title {
    margin-bottom: 20px;
}

/* privacy section css end */
/* error-section css start */
.error-section {
    height: 100vh;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 100px 0;
}

.error-area .title {
    margin-top: 50px;
}

@media (max-width: 767px) {
    .error-area .title {
        font-size: 48px;
    }
}

@media (max-width: 575px) {
    .error-area .title {
        font-size: 36px;
    }
}

.error-area .cmn-btn {
    margin-top: 50px;
}

/* error-section css end */
/* sidebar css start */
.sidebar {
    padding-left: 30px;
}

@media (max-width: 991px) {
    .sidebar {
        padding-left: 0;
        margin-top: 50px;
    }
}

.sidebar .widget+.widget {
    margin-top: 50px;
}

@media (max-width: 767px) {
    .sidebar .widget+.widget {
        margin-top: 30px;
    }
}

.sidebar .widget .search-form {
    position: relative;
}

.sidebar .widget .search-form input {
    width: 100%;
    border: 1px solid #e5e5e5;
}

.sidebar .widget .search-form .search-btn {
    position: absolute;
    color: #0056fb;
    background-color: transparent;
    top: 0;
    right: 0;
    font-size: 18px;
    color: #6f6f6f;
    width: 50px;
    height: 100%;
}

.sidebar .widget .widget__title {
    position: relative;
    padding-bottom: 8px;
    margin-bottom: 25px;
}

.sidebar .widget .widget__title::after {
    position: absolute;
    content: '';
    left: 0;
    bottom: 0;
    width: 20px;
    height: 2px;
    background-color: #0056fb;
}

.sidebar .categories__list .categories__item+.categories__item {
    margin-top: 10px;
}

.sidebar .categories__list .categories__item a {
    background-color: #f8f8f8;
    display: block;
    padding: 10px 30px;
    text-transform: capitalize;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    color: #6f6f6f;
}

.sidebar .categories__list .categories__item a:hover {
    background-color: #0056fb;
    color: #ffffff;
}

.sidebar .archive__list .archive__item+.archive__item {
    margin-top: 8px;
}

.sidebar .archive__list .archive__item a {
    color: #6f6f6f;
}

.sidebar .small-post-list .small-post {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 20px 0;
    border-bottom: 1px solid #e5e5e5;
}

.sidebar .small-post-list .small-post:first-child {
    padding-top: 0;
}

.sidebar .small-post-list .small-post:last-child {
    padding-bottom: 0;
    border-bottom: none;
}

.sidebar .small-post-list .small-post__thumb {
    width: 58px;
}

.sidebar .small-post-list .small-post__content {
    width: calc(100% - 58px);
    padding-left: 20px;
}

.sidebar .small-post-list .small-post__content .post__title a {
    font-size: 16px;
    font-weight: 600;
}

.sidebar .tags {
    margin: -5px -2px;
}

.sidebar .tags a {
    font-size: 16px;
    font-weight: 400;
    color: #6f6f6f;
    padding: 10px 20px;
    border: 1px solid #e5e5e5;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    margin: 5px 2px;
    text-transform: capitalize;
}

.sidebar .tags a:hover {
    background-color: #0056fb;
    color: #ffffff;
    border-color: #0056fb;
}

.action-sidebar.active {
    position: fixed;
    top: 100px;
    z-index: 99;
    width: 360px;
}

@media (max-width: 991px) {
    .action-sidebar.active {
        position: static;
    }
}

.action-sidebar .cmn-accordion2 .card+.card {
    margin-top: 10px;
}

.action-sidebar .cmn-accordion2 .card-header .text {
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
}

.action-sidebar .cmn-accordion2 .card-header .acc-btn {
    background-color: #0056fb;
    border: none;
    position: relative;
}

.action-sidebar .cmn-accordion2 .card-header .acc-btn.collapsed {
    background-color: #f8f8f8;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.action-sidebar .cmn-accordion2 .card-header .acc-btn.collapsed .text {
    color: #6f6f6f;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.action-sidebar .cmn-accordion2 .card-header .acc-btn.collapsed .plus-icon {
    -webkit-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    transform: rotate(-90deg);
    color: #6f6f6f;
}

.action-sidebar .cmn-accordion2 .card-header .acc-btn .plus-icon {
    position: absolute;
    top: 15px;
    right: 22px;
    font-size: 18px;
    color: #ffffff;
    -webkit-transform: rotate(0);
    -ms-transform: rotate(0);
    transform: rotate(0);
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.action-sidebar .cmn-accordion2 .card-body {
    background-color: #f8f8f8;
    padding: 20px 30px;
}

.action-sidebar .action__list li+li {
    margin-top: 5px;
}

.action-sidebar .action__list a {
    color: #6f6f6f;
}

/* sidebar css end */
/* footer section css start */
.footer-section {
    background-color: #001d4a;
    position: relative;
}

.footer-section p,
.footer-section li,
.footer-section span,
.footer-section i,
.footer-section a {
    color: #e6e6e6;
}

.footer-section div[class*="el"] {
    position: absolute;
    bottom: 0;
    opacity: 0.5;
    width: 15%;
}

.footer-section .el-left {
    left: 0;
}

.footer-section .el-right {
    right: 0;
}

.footer-top {
    padding-top: 120px;
    padding-bottom: 70px;
}

@media (max-width: 991px) {
    .footer-top {
        padding-top: 90px;
    }
}

.footer-action-list li+li {
    margin-top: 10px;
}

.footer-action-list li {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
}

.footer-action-list li i {
    font-size: 24px;
    margin-right: 8px;
}

.footer-widget__title {
    color: #ffffff;
    margin-bottom: 40px;
}

.footer-widget .latest-news-list li {
    padding: 20px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.footer-widget .latest-news-list li:first-child {
    padding-top: 0;
}

.footer-widget .latest-news-list li:last-child {
    padding-bottom: 0;
    border-bottom: none;
}

.footer-widget .latest-news-list li .date {
    display: block;
    font-size: 14px;
    font-style: italic;
    margin-bottom: 5px;
}

.short-link-list li+li {
    margin-top: 15px;
}

.short-link-list li a {
    padding-left: 25px;
    position: relative;
}

.short-link-list li a::before {
    position: absolute;
    content: "\f101";
    font-family: 'Line Awesome Free';
    top: -2px;
    left: 0;
    color: #e6e6e6;
    font-size: 18px;
    font-weight: 900;
}

.opening-list li {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.opening-list li:first-child {
    padding-top: 0;
}

.opening-list li:last-child {
    padding-bottom: 0;
    border-bottom: none;
}

.opening-list li .caption {
    width: 50%;
}

.opening-list li .value {
    width: 50%;
}

.footer-bottom {
    padding-bottom: 30px;
}

.footer-bottom hr {
    border-color: rgba(255, 255, 255, 0.15);
    margin-top: 0;
    margin-bottom: 30px;
}

.footer-bottom .link-list {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: -5px -10px;
}

.footer-bottom .link-list li {
    margin: 5px 10px;
}

/* footer section css end */

/*# sourceMappingURL=main.css.map */


.cmn-section {
    padding: 120px 0px;
}

@media (max-width:1199px) {
    .cmn-section {
        padding: 90px 0;
    }
}
@media (max-width:991px) {
    .cmn-section {
        padding: 80px 0;
    }
}
@media (max-width:575px) {
    .cmn-section {
        padding: 70px 0;
    }
}

.card-header {
    background: transparent;
}

.card-footer {
    background: transparent;
}

.card {
    -webkit-box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25);
    -moz-box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25);
    box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25);
    transition: all ease-in .3s;
}

.login-area,
.password-area {
    padding: 30px 15px;
    -webkit-box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25);
    -moz-box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25);
    box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25);
}

@media screen and (min-width: 768px) {

    .login-area,
    .password-area {
        padding: 30px;
    }
}

.modal {
    z-index: 9999;
}

input[readonly]:focus {
    background: #e9ecef;
}


button[disabled] {
    opacity: 0.5;
    cursor: auto !important;
}


.widget-two {
    padding: 15px 15px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    position: relative;
    overflow: hidden;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.bg--white {
    background-color: #ffffff !important;
}

.b-radius--5 {
    border-radius: 5px !important;
    -webkit-border-radius: 5px !important;
    -moz-border-radius: 5px !important;
    -ms-border-radius: 5px !important;
    -o-border-radius: 5px !important;
}

.box--shadow2 {
    box-shadow: 0px 0px 12px -6px rgba(0, 0, 0, 0.25) !important;
}
.box--shadow2:hover {
    box-shadow: 0px 3px 15px -2px rgba(0, 0, 0, 0.25) !important;
}



.widget-two .cmn-btn {
    padding: 5px 17px;
}

.widget-three .cmn-btn {
    padding: 5px 17px;
}

.widget-two .overlay-icon {
    position: absolute;
    top: 0;
    right: -15px;
    font-size: 120px;
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
    opacity: 0.15;
}

.text--primary {
    color: #7367f0 !important;
}

.widget-two__icon {
    width: 90px;
    height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    /*margin-top: 32px;*/
}

.bg--primary {
    background-color: #7367f0 !important;
}

.widget-two__icon i {
    font-size: 42px;
    color: #fff;
}

.widget-two__content {
    width: calc(100% - 90px);
    padding-left: 30px;
}

.widget-two__content h2 {
    font-size: 26px;
}

.mb-30 {
    margin-bottom: 30px;
}


.widget-three {
    padding: 30px 30px;
    text-align: center;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.widget-three__icon {
    width: 100px;
    height: 100px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.b-radius--rounded {
    border-radius: 50% !important;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    -ms-border-radius: 50% !important;
    -o-border-radius: 50% !important;
}

.widget-three__icon i {
    font-size: 48px;
    color: #ffffff;
}

.widget-three__content {
    margin-top: 25px;
}

.widget-three {
    padding: 30px 30px;
    text-align: center;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.widget {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.border--success {
    border-color: #28c76f !important;
}

.widget__icon {
    width: 70px;
    height: 70px;
    align-self: flex-start;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

.widget__icon i {
    color: #ffffff;
    font-size: 38px;
}

.widget__content {
    width: calc(100% - 90px);
    padding-left: 15px;
}

.text--success {
    color: #28c76f !important;
}

.bg--success {
    background-color: #28c76f !important;
}

.bb--3 {
    border-bottom: 3px solid !important;
    border-color: #28c76f !important;
}

.b-radius--10 {
    border-radius: 10px !important;
    -webkit-border-radius: 10px !important;
    -moz-border-radius: 10px !important;
    -ms-border-radius: 10px !important;
    -o-border-radius: 10px !important;
}

/* form css end */
/* table css start */
.table {
    margin-bottom: 0;
}

.table th {
    font-size: 0.75rem;
    text-align: center;
}

.table td {
    font-size: 0.875rem;
    color: #5b6e88;
    text-align: center;
}

.table td span,
.table td p,
.table td li {
    font-size: 0.875rem;
}

table th:last-child {
    text-align: right;
}

table th:first-child {
    text-align: left;
}

table td:last-child {
    text-align: right;
}

table td:first-child {
    text-align: left;
}

table tbody tr:last-child td{
    border: none;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(115, 115, 115, 0.05);
}

[data-label] {
    position: relative;
}

[data-label]::before {
    position: absolute;
    content: attr(data-label);
    font-weight: 500;
    color: #000000;
    top: 0;
    left: 0;
    padding: 13px 15px;
    display: none;
}

@media (max-width: 767px) {
    .table-responsive--sm thead {
        display: none;
    }


    .table-responsive--sm tbody tr:nth-child(even) {
        background-color: #F4F4F5;
    }

    .table-responsive--sm tr th,
    .table-responsive--sm tr td {
        display: block;
        padding-left: 45%;
        text-align: right !important;
    }

    .table-responsive--sm [data-label]::before {
        display: block;
    }

    table tbody tr:last-child td{
        border-bottom: 1px solid #dee2e6;
    }
    table tbody tr:last-child td:last-child{
        border: none;
    }
}

@media (max-width: 575px) {
    .table-responsive--xs thead {
        display: none;
    }

    .table-responsive--xs tbody tr:nth-child(odd) {
        background-color: #f5f5f5;
    }

    .table-responsive--xs tr th,
    .table-responsive--xs tr td {
        display: block;
        padding-left: 45%;
        text-align: right !important;
    }

    .table-responsive--xs [data-label]::before {
        display: block;
    }

    table tbody tr:last-child td{
        border-bottom: 1px solid #dee2e6;
    }
    table tbody tr:last-child td:last-child{
        border: none;
    }
}

@media (max-width: 320px) {
    .timer {
        font-size: 17px;
    }

    .bal {
        font-size: 23px;
    }
}

/* table css end */



/* plan css */
.price .single-price:hover,
.price .single-price.active {
    -webkit-box-shadow: 0px 0px 19px 12px #F5F5F5;
    box-shadow: 0px 0px 19px 12px #F5F5F5;
}

.price .single-price {
    text-align: center;
    -webkit-box-shadow: 0px 0px 9px 2px #F5F5F5;
    box-shadow: 0px 0px 9px 2px #F5F5F5;
}

.price .single-price .part-bottom button {
    display: inline-block;
    color: #fff;
    background: #000050;
    width: 100%;
    width: 100%;
    padding: 15px 0;
    margin-top: 25px;
    border: 2px solid #000050;
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    cursor: pointer;
}

.price .single-price .part-top h3 {
    font-size: 24px;
    color: #fff;
    font-weight: 600;
    margin-bottom: 28px;
    border-bottom: 1px solid;
    padding-bottom: 23px;
}

.price .single-price .part-top h4 {
    font-size: 42px;
    color: #fff;
}

.price .single-price .part-bottom {
    padding: 21px 30px 40px;
    background: #fff;
}

.price .single-price .part-bottom ul li:first-child {
    font-weight: 600;
    font-size: 18px;
    padding-bottom: 6px;
}

.pricing--popular{
    border: 2px solid #127681
}

.btn {
    outline: none;
    border: none;
}

.btn:focus {
    border: none;
    box-shadow: none;
}

.btn:active {
    border: none;
    box-shadow: none;
}

.table td,
.table th {
    padding: 15px;
    vertical-align: top;
}

.table tr {
    background: transparent;
}

.table-card .card-body table {
    border-radius: 7px;
    -webkit-box-shadow: 0 0 11px rgb(0 0 0 / 47%);
    -moz-box-shadow: 0 0 11px rgb(0 0 0 / 47%);
    box-shadow: 0 0 11px rgb(0 0 0 / 47%);
}

.table-card .card-body table thead th:first-child {
    border-radius: 7px 0 0 0;
}

.table-card .card-body table thead th:last-child {
    border-radius: 0 7px 0 0;
}

.table-card .card-body table tbody tr:last-child td:first-child {
    border-radius: 0 0 0 7px;
}

.table-card .card-body table tbody tr:last-child td:last-child {
    border-radius: 0 0 7px 0;
}

.table-card {
    border: none;
    background: transparent;
    box-shadow: none;
    -webkit-box-shadow: none;
}

.table-striped tbody tr:nth-of-type(odd) {
    background: transparent;
}

.badge-success {
    background-color: rgba(40, 199, 111, 0.1);
    border: 1px solid #28c76f;
    color: #28c76f;
}

.badge-pending,
.badge-warning,
.badge-success,
.badge-primary,
.badge-danger,
.badge-dark {
    border-radius: 999px;
    padding: 2px 15px;
    position: relative;
    border-radius: 999px;
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    -ms-border-radius: 999px;
    -o-border-radius: 999px;
    font-weight: 400 !important;
}

.badge-warning {
    background-color: rgba(255, 159, 67, 0.1);
    border: 1px solid #ff9f43;
    color: #ff9f43;
}

.badge-danger {
    background-color: rgba(234, 84, 85, 0.1);
    border: 1px solid #ea5455;
    color: #ea5455;
}

.badge-primary {
    background-color: rgba(115, 103, 240, 0.1);
    border: 1px solid #7367f0;
    color: #7367f0;
}

.badge-dark {
    background-color: rgba(0, 0, 0, 0.1);
    border: 1px solid #000000;
    color: #000000;
}

.table .thead-dark th {
    font-size: 14px;
}

.modal {
    z-index: 999999999;
}

.price .single-price .part-bottom ul li {
    border-bottom: 1px dashed #00000038;
}

.list-group-item {
    border: 1px dashed rgb(0 0 0 / 41%);
}


.badge {
    font-size: 0.75rem !important;
    font-weight: 300;
}

.badge-dot i {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    display: inline-block;
}

.badge--pending,
.badge--warning,
.badge--success,
.badge--primary,
.badge--danger,
.badge--dark {
    border-radius: 999px;
    padding: 2px 15px;
    position: relative;
    border-radius: 999px;
    -webkit-border-radius: 999px;
    -moz-border-radius: 999px;
    -ms-border-radius: 999px;
    -o-border-radius: 999px;
}

.badge--warning {
    background-color: rgba(255, 159, 67, 0.1);
    border: 1px solid #ff9f43;
    color: #ff9f43;
}

.badge--success {
    background-color: rgba(40, 199, 111, 0.1);
    border: 1px solid #28c76f;
    color: #28c76f;
}

.badge--danger {
    background-color: rgba(234, 84, 85, 0.1);
    border: 1px solid #ea5455;
    color: #ea5455;
}

.badge--primary {
    background-color: rgba(115, 103, 240, 0.1);
    border: 1px solid #4634ff;
    color: #4634ff;
}

.badge--dark {
    background-color: rgba(0, 0, 0, 0.1);
    border: 1px solid #000000;
    color: #000000;
}

.table th {
    background-color: #7367f0;
    color: #fff;
}

.table tbody {
    border-top: none !important;
}

.modal-footer .btn--base {
    padding: 0.375rem 0.75rem;
}

.action-form {
    padding-top: clamp(15px, 4vw, 30px);
}

.form--select {
    padding: 10px 20px;
    border: 1px solid #e5e5e5;
    width: 100%;
    background-color: #f8f8fa;
    border-radius: 3px;
    color: #6f6f6f;
}

.form--select:focus {
    box-shadow: none;
}

.input-group-text {
    border-color: #e5e5e5;
}

.card {
    border: 0;
}
.fs--14px {
    font-size: 14px;
    color: #788;
}
.fs--12px {
    font-size: 12px;
}

.ptc-card {
    border-radius: 10px;

}

.ptc-card {
    border: 1px solid #0099ff80;
    background: linear-gradient(to bottom, #0099ff40, #fff) !important;
}


/* Pagination Css*/
.pagination {
    gap: 10px;
    flex-wrap: wrap;
}
.pagination .page-item.active .page-link {
    color: #fff;
}
.pagination .page-item .page-link  {
    border-radius: 5px;
    line-height: 1.3;
    color: #61636a;
}

.single-price{
    position: relative;
}
.popular-badge{
    position: absolute;
    right: 10px;
    top: 10px;
}
.popular-badge span{
    background: #4634ff;
    color: #fff;
}
</style>


<style>
    .card {
        background: radial-gradient(circle at -8.9% 51.2%, rgb(19, 30, 37) 24.5%, rgb(19, 30, 37) 66%);
    }
    .bg-primary {
        background-color: #00D094 !important;
        background: #00D094 !important;
        color: #ffffff;
    }
    .cmn-btn, .btn--base, .bg-primary {
        background-color: #00D094 ;
        color: #ffffff;
    }
    .cmn-btn:hover, .cmn-btn:focus, .cmn-btn:active {
        background-color: #007b58;
        color: #ffffff;
    }
    .btn--base:hover, .btn--base:focus, .btn--base:active {
        background-color: #007b58;
        color: #ffffff;
    }
    .bg--white {
        background-color: #003123 !important;
    }

    h1, h2, h3, h4, h5, h6 {
        color: #ffffff;
        font-weight: 600;
        margin: 0;
        line-height: 1.4;
    }
    p, li {
        font-size: 16px;
        color: #00d094;
        line-height: 1.7;
        margin: 0;
    }
    .bg--primary {
        background-color: #00d094 !important;
    }
    .bg--success {
        background-color: #00d094 !important;
    }
    a:hover{
        color: #ffffff ;
    }
    .widget-three__icon .svg-inline--fa,
    .widget-two__icon .svg-inline--fa
    {
        font-size: 42px !important;
        color: #fff;
    }
    .widget-three {
        padding: 20px 20px;
    }
    .text--primary {
        color: #00d094 !important;
    }
    .table th {
        background-color: #00d094;
        color: #fff;
    }
    .input-group-text {
        color: #ffffff;
    }


</style>


<!-- Mobile -->

<style>
    #appCapsule {
        padding-top: 0px;
        padding-bottom: 58px;
    }

    label {
        color: #ffffff;
        margin-bottom: 1px;
        font-size: 13px;
    }

    .site-logo {
        height: 30px;
    }

    .bg-light {
        background-color: #cdffef !important;
    }
    .bg-dark {
        background: linear-gradient(90deg, rgba(0, 0, 0, 1) 11.2%, rgb(63, 61, 61) 78.9%) !important;
    }
    .bg-dark-alt {
        background: linear-gradient(270deg, rgba(0, 0, 0, 1) 11.2%, rgb(63, 61, 61) 78.9%) !important;
    }

    .btn-primary{
        color:#fff!important ;
        background-color: #00d094;
        border-color: #00d094;
    }
    .btn-success{
        color:#fff!important ;
        background-color: #00d094;
        border-color: #00d094;
    }
    .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
        color:#fff!important ;
        background-color: #0A9981;
        border-color: #0A9981;
    }

    .border-primary {
        border-color: #00d094!important;
    }

    body {
        background-color: #ffffff !important;
        overflow-x: hidden;
    }
    ::-webkit-scrollbar {
        width: 0px;
    }

    /* div:where(.swal2-container) div:where(.swal2-popup) {
        border: 1px solid #0A9981 !important;
        background: #cdffef !important;
        color: #011e14 !important;
    } */
    div:where(.swal2-container) div:where(.swal2-popup) {
        border: 1px solid #3b3a3a !important;
        background: #000000c7 !important;
        color: #ffffff !important;
    }
    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        background-color: #0A9981 !important;
        box-shadow: 0 0 0 0px rgba(0,0,0,0) !important;
        width: 120px !important;
    }

    .nav-icon i {
        color: #ffffff;
        font-size: 22px;
        padding-left: 2px;
        padding-right: 2px;
        padding-top: 5px;
        padding-bottom: 0;
        transition: 0.3s;
    }

    .active i,
    .nav-icon i:hover,
    .nav-icon i:focus,
    .nav-icon i:active {
        /* color: #d2fff2; */
        color: #54ffce;
        /* margin-top: -10px; */
        font-size: 22px;
    }

    html,
    body {
        font-family: Bangla472, "Helvetica Neue", Helvetica, sans-serif;
        background: linear-gradient(90deg, rgba(0, 0, 0, 1) 11.2%, rgb(63, 61, 61) 78.9%);
        height: 100% !important;
    }

    .navbar2 {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding-top: .5rem;
        padding-bottom: .5rem;
    }
    .fixed-bottom2 {
        position: fixed;
        right: 0;
        bottom: 52px;
        left: 0;
        z-index: 1030;
    }

    .bottom-nav {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding-top: .5rem;
        padding-bottom: .5rem;
    }
    .navbar>.container, .navbar>.container-fluid, .navbar>.container-lg, .navbar>.container-md, .navbar>.container-sm, .navbar>.container-xl, .navbar>.container-xxl {
        display: initial;
        justify-content: space-evenly;
        align-items: center;
        align-content: center;
    }
    .navbar {
        padding-top: 5px;
        padding-bottom: 0;
    }
    .text-primary{
        color: #00d094 !important;
    }
    .text-primary-light{
        color: #00805b !important;
    }
    .small-font-sm{
        font-size: 12px;
    }
    .small-font{
        font-size: 14px;
    }
    .small-font-lg{
        font-size: 16px;
    }
    .mid-font-sm{
        font-size: 18px;
    }
    .mid-font{
        font-size: 20px;
    }
    .mid-font-lg{
        font-size: 22px;
    }

    .balance-card-2{
        margin-top: -25px;
        margin-bottom: -25px;
        margin-right: -4px;
        height: 85px;
        clip-path: polygon(20% 0, 100% 0, 100% 100%, 0 100%);
    }

    .rounded {
        border-radius: 10px !important;
    }

    .card-box{
        margin: auto;
        background-color: #cdffef !important;
        border-radius: 10px !important;
        text-align: center!important;
        width: 54px;
        height: 54px;
        display: flex!important;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 0px 11px -4px rgba(0, 0, 0, 0.25);
    }
    .card-box>i {
        padding: 5px;
        font-size: 30px;
        background: linear-gradient(90deg, rgb(58 246 192) 0%, rgba(144,247,218,1) 50%, rgba(0,208,148,1) 50%, rgba(0,208,148,1) 100%);
        /* background: linear-gradient(90deg, rgba(144,247,218,1) 0%, rgba(144,247,218,1) 50%, rgba(0,208,148,1) 50%, rgba(0,208,148,1) 100%); */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        vertical-align: text-bottom;
    }

    .report-title{
        clear: both;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
    }
    .small-font-sm {
        color: #333;
        font-size: 10px;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .small-font {
        color: #333;
        font-size: 12px;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .small-font-lg {
        color: #333;
        font-size: 14px;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .list-group-item {
        color: #ffffff;
        text-decoration: none;
        background-color: #061412;
        border: 1px solid rgba(0,0,0,.125) !important;
    }
    .text-blue{
        color: #006de2 !important;
    }
    .text-green{
        color: #0f9113 !important;
    }
    .text-orange-light{
        color: #ffb300 !important;
    }
    .text-orange{
        color: #ea6900 !important;
    }
    .text-aqua{
        color: #0bc6f5 !important;
    }
    .text-yellow{
        color: #f5de0b !important;
    }
    .text-pink{
        color: #ff2492 !important;
    }
    .text-red{
        color: #f50b0b !important;
    }
    .text-purple{
        color: #d60bf5 !important;
    }
    .think-font{
        font-family: 'open sans',arial,sans-serif !important;
    }

    .glass-bg {
        background: rgba( 0, 208, 148, 0% );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 6px );
        -webkit-backdrop-filter: blur( 6px );
        border: 1px solid rgba( 255, 255, 255, 0.18 );
    }
    .bg-gr-red {
        background: #ff0808;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #ff3737, #ff0808);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #ff3737, #ff0808); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .bg-gr-orange {
        background: #FF8008;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #FFC837, #FF8008);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #FFC837, #FF8008); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .bg-gr-green-light {
        background: #1D976C;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #93F9B9, #1D976C);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #93F9B9, #1D976C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .bg-gr-green-light-alt {
        background: #1D976C;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #93F9B9, #1D976C);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #93F9B9, #1D976C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .bg-gr-violet {
        background: #654ea3;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #eaafc8, #654ea3);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #eaafc8, #654ea3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .bg-gr-navy {
        background: linear-gradient(270deg,rgba(0,32,52,1) 0%, rgba(0,78,126,1) 100%) !important;
        color: #fff;
    }
    .bg-gr-orange-dark {
        background: linear-gradient(270deg, rgb(52 26 0) 0%, rgb(126 71 0) 100%) !important;
        color: #ffe6ab !important;
    }

    .form-control:focus {
        background-color: #fff !important;
    }
    .modal-content {
        /* background-color: #131d25; */
        border: 2px solid #223548;
        border-radius: 10px;
    }
    .modal-header {
        padding: 6px 10px;
        border-bottom: 1px solid #223548;
    }
    .modal-body {
        padding: 6px;
        color: #fff;
    }
    .modal-footer {
        padding: 3px 4px;
        border-top: 1px solid #223548;
    }
    .btn-close {
        width: 9px;
        height: 9px;
        margin-right: 0px !important;
        color: #ffffff;
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/10px auto no-repeat;
        background-color: red;
        border-radius: 50%;
    }

    .page-item.active .page-link {
        background-color: #00d094;
        border-color: #00d094;
    }

    .btn.btn-mini {
        padding: 3px 10px;
        font-size: .6rem;
    }


</style>
<?php /**PATH /home/ethemest/DEMO/demo.viser.store/usdt-trading/core/resources/views/templates/basic/layouts/custom/mobile_css.blade.php ENDPATH**/ ?>