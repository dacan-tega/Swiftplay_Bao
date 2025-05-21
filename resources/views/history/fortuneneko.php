<?php

$imageBaseUrl = '/games/'.@$result['game_folder'].'/';
?>
<style>
#game-shell {
    transform: scale(calc(var(--construct-scale) *2.105) );
    transform-origin: left top;
}

.body-more {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.loadmore {
    width: 30%;
    color: rgba(255, 255, 255, 0.8);
    display: block;
    text-align: center;
    margin: 10px auto;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid transparent;
    background-color: rgb(36, 36, 46);
    transition: .3s;
    font-size: 10px;
}

#game-detail-spring-wrapper {
    transition: transform .5s ease-in-out;
}

#game-details-left-arrow {
    top: calc(50% - 85px); 
    background-color: rgba(0, 0, 0, 0.4);
}

#game-details-right-arrow {
    top: calc(50% - 85px); 
    background-color: rgba(0, 0, 0, 0.4);
}

/* Move from history.css */

/* $CSS-16ff435713-7 */
.transition-transform-on {
    transition: transform .15s ease-out
}

.transition-width-on {
    transition: width .26s cubic-bezier(.19, 1, .22, 1)
}

.game-list-column-container {
    height: inherit;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center
}

.game-list-view-container {
    width: inherit;
    height: inherit;
    position: absolute;
    margin: 0 auto
}

#game-list-view-navbar-container {
    position: relative;
    z-index: 2
}

#game-list-view-navbar-container-horizontal {
    position: relative;
    z-index: 2;
    box-shadow: 1px 0 4px 0 rgba(0, 0, 0, .3)
}

#game-list-view-navbar-container-horizontal-mobile {
    display: flex;
    z-index: 5
}

#game-list-view-contents-container {
    position: relative;
    height: inherit;
    width: 100%;
    z-index: 1
}

#game-list-view-wrapper {
    height: 100%;
    width: 100%;
    display: flex;
    position: relative;
    z-index: 1
}

#game-list-detail-wrapper {
    position: absolute;
    top: 0;
    display: block;
    width: 100%;
    height: inherit;
    z-index: 2;
    overflow: hidden
}

.game-list-detail-wrapper-h {
    width: 360px !important;
    height: 640px !important;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .5)
}

#game-list-nav {
    width: 100%;
    height: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column
}

.game-list-nav-horizontal {
    flex-direction: row
}

.game-list-nav-vertical-card {
    background-color: #2b1f19;
    background-size: cover;
    flex-direction: row;
    box-shadow: 0 3px 10px 0 rgba(0, 0, 0, .75)
}

#game-list-nav-bar {
    position: relative;
    margin: 0 auto;
    display: flex
}

.game-list-nav-bar-vertical {
    height: calc(100% - 2px);
    width: 100%;
    flex-direction: row
}

.game-list-nav-bar-horizontal {
    height: 100%;

}

</style>
<style>
/*id="$CSS-Game-1"*/
.payline_atlas {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-size: 250px 50px;
    background-image: url(<?php echo $imageBaseUrl ?>30.png)
}

.payline_1 {
    background-position: -1px -1px
}

.payline_1,
.payline_2 {
    width: 48px;
    min-width: 48px;
    height: 48px;
    min-height: 48px
}

.payline_2 {
    background-position: -51px -1px
}

.payline_3 {
    background-position: -101px -1px
}

.payline_3,
.payline_4 {
    width: 48px;
    min-width: 48px;
    height: 48px;
    min-height: 48px
}

.payline_4 {
    background-position: -151px -1px
}

.payline_5 {
    width: 48px;
    min-width: 48px;
    height: 48px;
    min-height: 48px;
    background-position: -201px -1px
}

/* id="$CSS-Game-2 */
.s_Symbol_0 {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?php echo $imageBaseUrl ?>23.png);
    width: 226px;
    min-width: 204px;
    height: 219px;
    min-height: 234px;
    background-position: 38px 58px
}

/* id="$CSS-Game-3 */
.symbol_atlas {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?php echo $imageBaseUrl ?>21.png)
}

.s_Symbol_1 {
    width: 235px;
    min-width: 221px;
    height: 225px;
    min-height: 140px;
    background-position: 22px 55px
}

.s_Symbol_2 {
    width: 239px;
    min-width: 221px;
    height: 225px;
    min-height: 140px;
    background-position: -180px 55px
}

.s_Symbol_3 {
    width: 225px;
    min-width: 198px;
    height: 244x;
    min-height: 225px;
    background-position: -382px 55px
}

.s_Symbol_4 {
    width: 226px;
    min-width: 226px;
    height: 226px;
    min-height: 170px;
    background-position: -576px 55px
}

.s_Symbol_5 {
    width: 227px;
    min-width: 199px;
    height: 216px;
    min-height: 140px;
    background-position: -758px 55px;
}

.s_Symbol_6 {
    width: 236px;
    min-width: 191px;
    height: 191x;
    min-height: 228px;
    background-position: -936px 55px
}

/* id="$CSS-Game-4" */
.ui_reel_atlas {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?php echo $imageBaseUrl ?>22.png)
}

.ui_freel {
    background-position: -1px -49px
}

.ui_freel,
.ui_reel {
    width: 598px;
    min-width: 598px;
    height: 532px;
    min-height: 468px
}

.ui_reel {
    background-position: -5px -280px
}

.wh {
    width: 300px;
    height: 300px;
    background-position: -290px 65px
}

[id=tooltip]{
visibility: hidden;
}

div[data-descr]:focus + [id="tooltip"] {
	visibility: visible;
}


div.scroller::-webkit-scrollbar {
  width: 8px;
}

div.scroller::-webkit-scrollbar-track {
  border-radius: 50px;
  background-color : #30303c;
}

div.scroller::-webkit-scrollbar-thumb {
    background-color : #757575b3;
    border-radius: 50px;
    visibility: hidden;
}

div.scroller:hover::-webkit-scrollbar-thumb {
    visibility: visible;
}


</style>
<style>
/* ########## HISTORY LIST ################# */

/* $CSS-16ff435713-7 */
.transition-transform-on {
    transition: transform .15s ease-out
}

.transition-width-on {
    transition: width .26s cubic-bezier(.19, 1, .22, 1)
}

.game-list-column-container {
    height: inherit;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center
}

.game-list-view-container {
    width: inherit;
    height: inherit;
    position: absolute;
    margin: 0 auto
}

#game-list-view-navbar-container {
    position: relative;
    z-index: 2
}

#game-list-view-navbar-container-horizontal {
    position: relative;
    z-index: 2;
    box-shadow: 1px 0 4px 0 rgba(0, 0, 0, .3)
}

#game-list-view-navbar-container-horizontal-mobile {
    display: flex;
    z-index: 5
}

#game-list-view-contents-container {
    position: relative;
    height: inherit;
    width: 100%;
    z-index: 1
}

#game-list-view-wrapper {
    height: 100%;
    width: 100%;
    display: flex;
    position: relative;
    z-index: 1
}

#game-list-detail-wrapper {
    position: absolute;
    top: 0;
    display: block;
    width: 100%;
    height: inherit;
    z-index: 2;
    overflow: hidden
}

.game-list-detail-wrapper-h {
    width: 360px !important;
    height: 640px !important;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .5)
}

#game-list-nav {
    width: 100%;
    height: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column
}

.game-list-nav-horizontal {
    flex-direction: row
}

.game-list-nav-vertical-card {
    background-color: #2b1f19;
    background-size: cover;
    flex-direction: row;
    box-shadow: 0 3px 10px 0 rgba(0, 0, 0, .75)
}

#game-list-nav-bar {
    position: relative;
    margin: 0 auto;
    display: flex
}

.game-list-nav-bar-vertical {
    height: calc(100% - 2px);
    width: 100%;
    flex-direction: row
}

.game-list-nav-bar-horizontal {
    height: 100%;
    width: calc(100% - 3px);
    flex-direction: column
}

#game-title-wrapper {
    display: flex;
    position: relative;
    align-items: center
}

.game-title-wrapper-vertical {
    width: 200px;
    justify-content: center;
    padding-top: 4px;
    min-height: 12px;
    line-height: 12px
}

.game-title-wrapper-horizontal {
    width: 200px;
    justify-content: flex-start;
    padding-top: 14px;
    min-height: 40px;
    line-height: 40px
}

.game-title-wrapper-horizontal-navbar {
    width: 100%;
    justify-content: flex-start;
    min-height: 25px;
    line-height: 25px
}

#game-title-label {
    color: #a9a9ae;
    position: absolute;
    white-space: nowrap;
    transform-origin: center center
}

.game-title-label-vertical {
    left: 0;
    right: 0;
    margin: auto;
    text-align: center
}

.game-list-nav-image-container {
    width: 22.22%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity .1s ease-out
}

.game-list-nav-image-container:active {
    opacity: .5
}

.game-list-nav-image-container-slot {
    height: inherit
}

.game-list-nav-image-container-card {
    height: 80%;
    padding-top: 3%;
    justify-content: flex-start
}

.game-list-nav-image-container-disabled {
    opacity: .5
}

#game-list-nav-image-right {
    justify-content: center
}

.game-list-nav-image-details-card {
    transform-origin: left
}

#game-list-nav-label-container {
    display: flex;
    flex-direction: column
}

.game-list-nav-label-container-vertical {
    width: 55.55%;
    height: 100%;
    align-items: center;
    text-align: center;
    justify-content: center
}

.game-list-nav-label-container-horizontal {
    height: 100px;
    align-items: flex-start;
    text-align: left;
    padding-top: 76px;
    padding-left: 8%
}

.game-list-nav-period-label {
    font-size: 14px
}

.game-list-nav-subtitle-label {
    margin-top: 2px;
    font-size: 11px;
    line-height: 11px
}

#game-free-spin-nav-label-wrapper {
    display: flex;
    position: relative;
    height: 14px;
    line-height: 14px
}

#game-free-spin-nav-label {
    font-size: 14px;
    position: absolute;
    white-space: nowrap;
    transform-origin: left center
}

#game-list-nav-table-header {
    position: relative;
    display: flex;
    flex-direction: row;
    align-items: center
}

.game-list-nav-table-header-vertical {
    height: 36px;
    font-size: 10px;
    padding-right: 10px;
    padding-left: 20px
}

.game-list-nav-table-header-vertical>div:first-child,
.game-list-nav-table-header-vertical>div:nth-child(2) {
    width: 23%
}

.game-list-nav-table-header-vertical>div:nth-child(3) {
    width: 19%;
    justify-content: flex-end
}

.game-list-nav-table-header-vertical>div:nth-child(4) {
    width: 24%;
    justify-content: flex-end
}

.game-list-nav-table-header-horizontal {
    height: 84px;
    font-size: 20px;
    line-height: 24px;
    padding-right: 5%;
    padding-left: 30px
}

.game-list-nav-table-header-horizontal>div:first-child {
    width: 20%
}

.game-list-nav-table-header-horizontal>div:nth-child(2) {
    width: 30%
}

.game-list-nav-table-header-horizontal>div:nth-child(3),
.game-list-nav-table-header-horizontal>div:nth-child(4) {
    width: 20%;
    justify-content: flex-end
}

#game-list-nav-table-item-container {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    height: inherit
}

.game-list-nav-table-item {
    display: flex;
    height: 18px
}

.game-list-nav-separator-vertical-slot {
    height: 2px;
    width: 100%
}

.game-list-nav-separator-vertical-card {
    height: 4px;
    width: 100%
}

.game-list-nav-separator-vertical-lobby {
    height: 1px;
    width: 100%
}

.game-list-nav-separator-horizontal {
    width: 1px;
    height: 100%
}

.game-list-nav-row-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 20px
}

.game-list-item-container {
    display: flex;
    flex-direction: row;
    align-items: center;
    transition: background-color .2s ease-out
}

.game-list-item-container-lobby {
    height: 53px;
    margin-bottom: 1px
}

.game-list-item-container-card {
    background: #0e0c0c linear-gradient(0deg, #0f0d0d 80%, #191616)
}

.game-list-item-container-vertical {
    height: 54px;
    font-size: 10px;
    padding-right: 10px;
    padding-left: 20px
}

.game-list-item-container-vertical>div:first-child {
    width: 23%
}

.game-list-item-container-vertical>div:nth-child(2) {
    width: 20%
}

.game-list-item-container-vertical>div:nth-child(3),
.game-list-item-container-vertical>div:nth-child(4) {
    width: 23%;
    justify-content: flex-end
}

.game-list-item-container-vertical>div:nth-child(5) {
    width: 10%
}

.game-list-item-container-horizontal {
    height: 76px;
    font-size: 20px;
    line-height: 24px;
    padding-right: 5%;
    padding-left: 30px
}

.game-list-item-container-horizontal>div:first-child {
    width: 20%
}

.game-list-item-container-horizontal>div:nth-child(2) {
    width: 30%
}

.game-list-item-container-horizontal>div:nth-child(3),
.game-list-item-container-horizontal>div:nth-child(4) {
    width: 20%;
    justify-content: flex-end
}

.game-list-item-container-horizontal>div:nth-child(5) {
    width: 10%;
    align-items: center
}

#game-list-item-arrow-image-container {
    display: flex;
    justify-content: center;
    align-items: center
}

.game-list-item-column-container {
    height: inherit;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start
}

.game-list-item-feature-container {
    display: flex;
    flex-direction: row;
    height: 14px;
    transform: scale(.291);
    transform-origin: left top
}

.game-list-item {
    display: flex
}

.game-list-item-image-container {
    padding-right: 5px
}

.game-list-item-collapse-info-label {
    font-size: 30px;
    width: 30px;
    transform-origin: left top;
    line-height: 50px
}

.game-list-item-collapse-info {
    display: flex;
    flex-direction: row;
    background-color: rgba(0, 0, 0, .26);
    height: 50px;
    border-radius: 25px;
    padding: 3px 0 2px 3px;
    transform: translateY(-3px)
}

#game-list-view-no-items-container {
    display: flex;
    flex-direction: column;
    justify-content: center
}

.game-list-view-no-item-label {
    padding-bottom: 5px;
    text-align: center
}

#game-list-footer-container {
    font-size: 11px;
    line-height: 0px;
    display: flex;
    flex-direction: row;
    z-index: 1
}

.game-list-footer-container-vertical {
    padding-right: 10px;
    padding-left: 20px;
    width: calc(100% - 30px);
    position: absolute;
    bottom: 0
}

.game-list-footer-container-vertical>div:first-child {
    width: 43%;
    text-align: left;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    height: 100%
}

.game-list-footer-container-vertical>div:nth-child(2),
.game-list-footer-container-vertical>div:nth-child(3) {
    width: 25%
}

.game-list-footer-container-horizontal {
    height: 147px;
    padding-right: 5%;
    padding-left: 30px;
    position: relative
}

.game-list-footer-container-horizontal>div:first-child {
    width: 50%;
    text-align: left
}

.game-list-footer-container-horizontal>div:nth-child(2),
.game-list-footer-container-horizontal>div:nth-child(3) {
    width: 20%;
    text-align: right
}

.game-list-footer-container-horizontal>div:nth-child(4) {
    width: 10%;
    text-align: right
}

#game-list-footer-date-container {
    position: relative;	
}

.game-list-footer-date-container-horizontal {
    display: flex;
    flex-direction: column;
    padding-top: 50px
}

#game-list-footer-date-vertical {
    display: flex;
    position: relative;
    min-height: 25px
}

#game-list-footer-date-label-vertical {
    line-height: 25px;
    position: absolute;
    white-space: nowrap;
    transform-origin: left center
}

.game-list-footer-date-label-horizontal {
    font-size: 30px;
    line-height: 33px;
    white-space: nowrap;
    transform-origin: left center;
    transition: font-size .2s cubic-bezier(.19, 1, .22, 1)
}

#game-list-footer-record-vertical {
    display: flex;
    line-height: 25px;
    margin-top: -10px
}

.game-list-footer-record-horizontal {
    font-size: 20px;
    line-height: normal
}

.game-list-footer-item {
    height: 100%;
    position: relative;
}

.game-list-footer-item-wrapper {
    position: absolute;
    text-align: end;
    top: 50%;
    margin-top: -5.5px;
    right: 0;
    transform-origin: right
}

#scroll-view {
    overflow: hidden;
    position: relative
}

#load-more-container {
    width: inherit;
    height: 80px;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    bottom: 0
}

#load-more-label {
    width: 100%;
    text-align: center
}

#game-list-touch-prevention {
    width: inherit;
    height: inherit;
    position: absolute;
    z-index: 5;
    top: 0
}

#game-banner-container {
    width: 100%;
    background-color: #fff;
    position: absolute
}

#game-banner-image {
    width: 100%;
    transform: translateY(-13%)
}

#game-banner-tint {
    width: 360px;
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, .6)
}

#calendar-container {
    position: relative;
    z-index: 3
}

#game-list-scroll-view-container {
    width: 100%;
    height: 100%
}

#scroll-to-top-background {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
    width: 60px;
    top: 85%;
    left: 93%;
    box-shadow: 0 2px 8px 2px rgba(0, 0, 0, .3);
    border-radius: 50%;
    position: absolute;
    z-index: 3;
    transform: translateZ(0);
    -webkit-transform: translateZ(1px)
}

#scroll-to-top-background:active {
    opacity: .5
}

#game-list-nav-container-card {
    transform: translateY(-3px) scaleX(.3) scaleY(.45);
    transform-origin: top left;
    position: absolute
}

.gh-angle-vertical {
    border: solid #000;
    border-width: 0 1px 1px 0;
    display: inline-block;
    padding: 3px;
    margin-left: 3px;
}

.gh-angle-horizontal {
    border: solid #000;
    border-width: 0 2px 2px 0;
    display: inline-block;
    padding: 8px
}

.gh-angle-wrapper {
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    transform: translateY(4px)
}

.angle-right {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg)
}

.angle-left {
    transform: rotate(135deg);
    -webkit-transform: rotate(135deg)
}

.angle-up {
    transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg)
}

.angle-down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg)
}

.gh-arrow {
    position: relative;
    width: 32px;
    height: 2px
}

.gh-arrow-right {
    transform: scale(-1)
}

.gh-arrow:after,
.gh-arrow:before {
    content: "";
    position: absolute;
    width: 22px;
    height: 2px;
    background-color: inherit
}

.gh-arrow:after {
    top: 7px;
    right: 15px;
    transform: rotate(45deg)
}

.gh-arrow:before {
    top: -7px;
    right: 15px;
    transform: rotate(-45deg)
}


.gh_ic_nav_calendar {
    width: 110px;
    min-width: 110px;
    height: 110px;
    min-height: 110px;
    background-position: -1px -1px
}

.gh_ic_nav_info_s {
    width: 48px;
    min-width: 48px;
    height: 48px;
    min-height: 48px;
    background-position: -113px -1px
}

/* $CSS-16ff435713-9 */
#loading-exit.vertical {
    position: absolute;
    right: 15px;
    top: 13px;
    width: 32px;
    height: 32px
}

#loading-exit.horizontal {
    position: absolute;
    right: 80px;
    top: 31px;
    width: 96px;
    height: 96px
}

.exit-icon {
    display: flex;
    align-items: center;
    justify-content: center
}

.exit-icon.vertical {
    width: 32px;
    height: 32px
}

.exit-icon.horizontal {
    width: 96px;
    height: 96px
}

.exit-icon-stroke {
    position: absolute
}

.exit-icon-stroke-vertical {
    height: 26px;
    width: 1px
}

.exit-icon-stroke-horizontal {
    height: 68px;
    width: 3px
}

.exit-icon-stroke-one {
    transform: rotate(45deg)
}

.exit-icon-stroke-two {
    transform: rotate(-45deg)
}

#loading-exit.horizontal-mobile {
    position: absolute;
    right: 20px;
    top: 25px;
    width: 32px;
    height: 32px
}

.exit-icon-stroke-horizontal-mobile {
    height: 26px;
    width: 1px
}

.exit-icon.horizontal-mobile {
    width: 32px;
    height: 32px
}


.gh_ic_nav_bonus_game {
    width: 48px;
    height: 48px;
    background-position: -1px -1px
}

.gh_ic_nav_collapse {
    width: 48px;
    height: 48px;
    background-position: -51px -1px
}

.gh_ic_nav_free_spin {
    width: 48px;
    height: 48px;
    background-position: -101px -1px
}

.gh_ic_nav_freehand {
    width: 48px;
    height: 48px;
    background-position: -151px -1px
}

.gh_ic_nav_gift {
    width: 48px;
    height: 48px;
    background-position: -201px -1px
}

.gh_ic_nav_jackpot {
    width: 48px;
    height: 48px;
    background-position: -251px -1px
}

.gh_ic_nav_super6 {
    width: 48px;
    height: 48px;
    background-position: -301px -1px
}


/* $CSS-16ff435713-14 */
.gh_basic_sprite {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-size: 162px 112px;
    background-image: url(data:image/png;base64,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)
}

/* $CSS-16ff435713-13 */
.gh_theme_sprite {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(data:image/png;base64,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)
}

/* ########## HISTORY DETAIL ################# */

/* $CSS-16ff435713-1 */
.history .rcs-custom-scroll {
    min-height: 0;
    min-width: 0
}

.history .rcs-custom-scroll .rcs-outer-container {
    overflow: hidden
}

.history .rcs-custom-scroll .rcs-outer-container .rcs-positioning {
    position: relative;
    z-index: 99
}

.history .rcs-custom-scroll .rcs-outer-container:hover .rcs-custom-scrollbar {
    opacity: 1;
    transition-duration: .2s
}

.history.regular .rcs-custom-scroll .rcs-inner-container {
    overflow-x: hidden;
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch
}

.history.mobile-horizontal .rcs-custom-scroll .rcs-inner-container {
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch
}

.history .rcs-custom-scroll .rcs-inner-container:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    height: 0;
    background-image: linear-gradient(180deg, rgba(0, 0, 0, .2) 0, rgba(0, 0, 0, .05) 60%, transparent);
    pointer-events: none;
    transition: height .1s ease-in;
    will-change: height
}

.history .rcs-custom-scroll .rcs-inner-container.rcs-content-scrolled:after {
    height: 5px;
    transition: height .15s ease-out
}

.history .rcs-custom-scroll.rcs-scroll-handle-dragged .rcs-inner-container {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

.history .rcs-custom-scroll .rcs-custom-scrollbar {
    position: absolute;
    height: 100%;
    width: 6px;
    right: 3px;
    opacity: 0;
    z-index: 1;
    transition: opacity .4s ease-out;
    padding: 6px 0;
    box-sizing: border-box;
    will-change: opacity;
    pointer-events: none
}

.history .rcs-custom-scroll .rcs-custom-scrollbar.rcs-custom-scrollbar-rtl {
    right: auto;
    left: 3px
}

.history .rcs-custom-scroll.rcs-scroll-handle-dragged .rcs-custom-scrollbar {
    opacity: 1
}

.history .rcs-custom-scroll .rcs-custom-scroll-handle {
    position: absolute;
    width: 100%;
    top: 0
}

.history .rcs-custom-scroll .rcs-inner-handle {
    height: calc(100% - 12px);
    margin-top: 6px;
    background-color: hsla(0, 0%, 45.9%, .7);
    border-radius: 3px
}

/* $CSS-16ff435713-3 */
#container-view {
    width: inherit;
    height: inherit;
    position: relative;
    margin: 0 auto;
    font-size: 14px;
    color: hsla(0, 0%, 100%, .6);
    background-color: hsla(0, 0%, 100%, 0)
}


/* $CSS-16ff435713-5 */
#game-details-view-container {
    width: 100%;
    height: inherit;
    position: relative;
    margin: 0 auto;
    font-size: 14px;
    z-index: 1
}

#game-detail-view-navbar-container {
    width: 100%;
    position: relative;
    z-index: 4
}

#game-detail-spring-wrapper {
    width: inherit
}

#game-details-right-arrow {
    right: 10px
}

#game-details-left-arrow {
    left: 10px
}

#game-details-page-container,
.reset {
    position: relative
}

.reset {
    height: inherit;
    width: inherit;
    clear: both
}

#game-details-left-arrow,
#game-details-right-arrow {
    width: 42px;
    height: 42px;
    position: absolute;
    border-radius: 50%;
    justify-content: center;
    align-items: center;
    display: flex;
    transition: opacity .1s ease-out;
    z-index: 2;
    transform: translateZ(0)
}

#game-details-left-arrow:active,
#game-details-right-arrow:active {
    opacity: .5
}

.game-detail-nav-label-container-horizontal {
    justify-content: center
}

#replay-buttons-container {
    width: 310px;
    height: 64px;
    display: flex;
    align-items: center;
    padding: 0 25px;
    position: absolute;
    left: 50%;
    z-index: 3;
    bottom: 8px;
    transform: translate3d(-50%, 0, 0)
}

.replay-icon-container {
    width: 32px;
    height: 32px;
    display: flex;
    justify-content: center;
    align-items: center
}

.replay-spin-label-wrapper {
    width: 118px;
    height: 32px;
    position: relative
}

.replay-spin-label {
    position: absolute;
    left: 50%;
    font-size: 12px;
    line-height: 32px;
    transform-origin: left center;
    white-space: nowrap;
    font-weight: 700
}

.replay-button-bg {
    width: 150px;
    height: 32px;
    border-radius: 16px;
    display: flex
}

.replay-button-bg:active {
    opacity: .5
}

.replay-icon-bg {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 21px;
    width: 21px;
    border-radius: 50%;
    transition: opacity .1s ease-out;
    background-color: #fff
}

.replay-icon-triangle {
    transform: translateX(2px);
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 5px 0 5px 8.7px
}

/* $CSS-16ff435713-6 */
#game-free-spin-view-container {
    width: inherit;
    height: inherit;
    position: absolute;
    top: 0;
    font-size: 14px;
    display: flex;
    flex-direction: column
}

.game-free-spin-list-item {
    height: 30px;
    padding: 10px;
    display: flex;
    transition: background-color .1s ease-out
}

#game-free-spin-type {
    padding-top: 5px;
    padding-left: 15px
}

#game-free-spin-amount {
    padding-top: 5px;
    padding-right: 15px;
    margin-left: auto;
    margin-right: 0
}

#close-list-button {
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: inherit;
    transition: opacity .1s ease-out
}

#close-list-button:active {
    opacity: .3
}

#nav-drop-down-arrow {
    transform: scale(.6) translateX(-5px)
}

#game-list-wrapper .game-list-item-container-vertical:hover {
    background: rgb(40, 40, 52) !important;
}

div.scroller::-webkit-scrollbar {
  width: 8px;
}

div.scroller::-webkit-scrollbar-track {
  border-radius: 50px;
  background-color : #30303c;
}

div.scroller::-webkit-scrollbar-thumb {
    background-color : #757575b3;
    border-radius: 50px;
    visibility: hidden;
}

div.scroller:hover::-webkit-scrollbar-thumb {
    visibility: visible;
}

</style>

<style>
#game-history-container {
    margin: 0 auto;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .5);
}
body {
    margin: 0;
    background-color: rgb(48, 48, 59);
}
</style>

<div id="game-shell" class="game-shell" style="font-family: PingFang SC, Microsoft YaHei, WenQuanYi Micro Hei, sans-serif;">
    <div id="game-overlay">
        <div id="game-header-holder"
            style="z-index: 99; pointer-events: none; position: absolute; height: 640px; width: 360px; visibility: hidden;">
            <div id="game-title" class="game-title"
                style="visibility: hidden; justify-content: flex-start; width: 360px; height: 18px; font-size: 11.5px;">
                <div style="padding-left: 12px; display: flex; align-items: center;">Fortune Mouse</div>
            </div>
            <div id="time-stamp" class="time_stamp"
                style="justify-content: flex-end; height: 18px; font-size: 11.5px; visibility: hidden; width: 360px;">
                <div style="padding-right: 12px; display: flex; align-items: center;">12:47:35</div>
            </div>
        </div>
        <div id="widget-manager-container"
            style="height: 0px; width: 0px; position: absolute; visibility: hidden; z-index: 0;"></div>
        <div id="game-history-container"
            style="overflow: hidden; visibility: visible; height: 640px; width: 360px; transform: scale(1); position: relative; z-index: 0;">
            <div id="container-view" style="overflow: hidden;">
                <div style="top: 0%; left: 0px; position: absolute; width: inherit; height: inherit;">
                    <div id="game-list-view" class="game-list-view-container"
                        style="background-color: rgb(48, 48, 59);">
                        <div id="game-list-view-wrapper" style="flex-direction: column;">
                            <div id="game-list-view-navbar-container" class=""
                                style="width: 100%; height: 62px; padding-top: 0px; background-color: rgb(36, 36, 46); display: none;">
                                <div id="game-list-nav" style="background-color: rgb(36, 36, 46);">
                                    <div id="game-list-nav-bar" class="game-list-nav-bar-vertical"
                                        style="height: calc(100% - 2px);">
                                        <div class="game-list-nav-image-container game-list-nav-image-container-slot">
                                            <div id="game-list-nav-image-left" class="game-list-nav-image "
                                                style="transform: scale(0.325);">
                                                <div class="gh_ic_nav_calendar gh_basic_sprite"
                                                    style="transform: translate(0px, 0px);"></div>
                                            </div>
                                        </div>
                                        <div id="game-list-nav-label-container"
                                            class="game-list-nav-label-container-vertical">
                                            <div class="game-list-nav-period-label" style="color: rgb(255, 200, 36);">
                                                Game History</div>
                                            <div class="game-list-nav-subtitle-label"
                                                style="color: rgba(255, 255, 255, 0.4);">Today</div>
                                        </div>
                                        <div class="game-list-nav-image-container game-list-nav-image-container-slot">
                                            <div id="game-list-nav-image-right" class="game-list-nav-image"
                                                style="display: flex; transform: translateX(9px);">
                                                <div class="exit-icon vertical">
                                                    <div class="exit-icon-stroke exit-icon-stroke-one exit-icon-stroke-vertical"
                                                        style="background-color: rgba(255, 255, 255, 0.6);"></div>
                                                    <div class="exit-icon-stroke exit-icon-stroke-two exit-icon-stroke-vertical"
                                                        style="background-color: rgba(255, 255, 255, 0.6);"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="game-list-nav-separator-vertical-slot"
                                        style="background-color: rgb(48, 48, 60);"></div>
                                </div>
                            </div>
                            <div id="game-list-view-contents-container" style="height: 578px; display: none;">
                                <div id="calendar-container" style="display: none;">
                                    <div id="calendar-view-background" style="height: 578px;">
                                        <div id="calendar-selection-container"
                                            style="background-color: rgb(48, 48, 59);">
                                            <div class="calendar-item-container-vertical calendar-item-container"
                                                style="background-color: rgb(48, 48, 59);">
                                                <div class="calendar-item-label" style="color: rgb(255, 200, 36);">Today
                                                </div>
                                            </div>
                                            <div class="calendar-line-separator"
                                                style="background-color: rgb(40, 40, 52);"></div>
                                            <div class="calendar-item-container-vertical calendar-item-container"
                                                style="background-color: rgb(48, 48, 59);">
                                                <div class="calendar-item-label"
                                                    style="color: rgba(255, 255, 255, 0.6);">Last 7 days</div>
                                            </div>
                                            <div class="calendar-line-separator"
                                                style="background-color: rgb(40, 40, 52);"></div>
                                            <div class="calendar-item-container-vertical calendar-item-container"
                                                style="background-color: rgb(48, 48, 59);">
                                                <div class="calendar-item-label"
                                                    style="color: rgba(255, 255, 255, 0.6);">Custom</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="game-list-nav-table-header" class="game-list-nav-table-header-vertical"
                                    style="color: rgba(255, 255, 255, 0.4); background-color: rgb(36, 36, 46);">
                                    <div id="game-list-nav-table-item-container">
                                        <div class="game-list-nav-table-item">Time</div>
                                        <div class="game-list-nav-table-item">(GMT+7:00)</div>
                                    </div>
                                    <div class="game-list-nav-table-item"> Transaction</div>
                                    <div class="game-list-nav-table-item">Bet(Rp)</div>
                                    <div class="game-list-nav-table-item">Profit(Rp)</div>
                                </div>
                                <div id="scroll-view"
                                    style="height: 494px; width: 100%; background-color: rgb(48, 48, 59); -webkit-font-smoothing: antialiased;">
                                    <div id="list-wrapper" class="transition-transform-on"
                                        style="height: 100%; width: 100%; position: relative; background-color: rgb(48, 48, 59); z-index: 1; transform: translateY(0px);">
                                        <div id="game-list-scroll-view-container" class="history regular">
                                            <div class="rcs-custom-scroll " style="height: inherit;">
                                                <div class="rcs-outer-container" style="height: 100%;">
                                                    <div class="rcs-positioning">
                                                        <div class="rcs-custom-scrollbar ">
                                                            <div class="rcs-custom-scroll-handle"
                                                                style="height: 376.599px; top: 0px;">
                                                                <div class="rcs-inner-handle"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rcs-inner-container"
                                                        style="height: 100%; margin-right: -17px;">
                                                        <div class="scroller"
                                                            style="height: 100%; overflow-y: visible; margin-right: 0px;">
                                                            <div id="game-list-wrapper"
                                                                style="position: relative; height: 648px;">
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(52, 52, 63);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:41:00</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-0"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566321 3721231360</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(48, 48, 60);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:56</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-1"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566319 7837549568</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -2,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(52, 52, 63);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:53</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-2"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566318 5095098368</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(48, 48, 60);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:52</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-3"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566317 9462242304</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(52, 52, 63);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:49</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-4"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566316 8045264896</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(48, 48, 60);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:46</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-5"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566315 8243241984</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(52, 52, 63);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:43</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-6"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566314 1126320128</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(48, 48, 60);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:36</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-7"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566311 3313869824</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -2,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(52, 52, 63);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:32</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-8"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566309 3176975360</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(48, 48, 60);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:30</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-9"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566308 6449274880</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(52, 52, 63);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:26</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-10"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566307 1526105088</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="game-list-item-container game-list-item-container-vertical"
                                                                    style="color: rgba(255, 255, 255, 0.6); background: rgb(48, 48, 60);">
                                                                    <div class="game-list-item-column-container"
                                                                        style="color: rgba(255, 255, 255, 0.6);">
                                                                        <div id="game-list-item">12:40:21</div>
                                                                        <div id="game-list-item">04/11</div>
                                                                    </div>
                                                                    <div class="game-list-item-column-container">
                                                                        <div class="game-list-item"
                                                                            id="game-list-item-transaction-id-11"
                                                                            style="color: rgba(255, 255, 255, 0.6); transition: color 0.5s ease 0s; display: inline-table;">
                                                                            164566305 1309404160</div>
                                                                    </div>
                                                                    <div class="game-list-item"
                                                                        style="text-align: right;">5,00K</div>
                                                                    <div class="game-list-item"
                                                                        style="color: rgba(255, 255, 255, 0.6); text-align: right;">
                                                                        -5,00K</div>
                                                                    <div id="game-list-item-arrow-image-container">
                                                                        <div class="gh-angle-vertical angle-right"
                                                                            style="border-color: rgba(255, 255, 255, 0.4);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="load-more-container" style="height: 80px;">
                                        <div id="load-more-label"
                                            style="color: rgba(255, 255, 255, 0.6); font-size: 14px;">All record(s)
                                            displayed</div>
                                    </div>
                                </div>
                                <div id="game-list-footer-container" class="game-list-footer-container-vertical"
                                    style="background-color: rgb(41, 41, 52); border-top: 1px solid rgb(48, 48, 60); color: rgba(255, 255, 255, 0.6); height: 48px;">
                                    <div id="game-list-footer-date-container" style="margin-top:-10px;">
                                        <div id="game-list-footer-date-vertical">
                                            <div id="game-list-footer-date-label-vertical"
                                                style="color: rgb(255, 200, 36);">Today</div>
                                        </div>
                                        <div id="game-list-footer-record-vertical">12 Records</div>
                                    </div>
                                    <div class="game-list-footer-item"
                                        style="color: rgb(255, 255, 255); visibility: visible;margin-top:-10px;">
                                        <div class="game-list-footer-item-wrapper">Rp60,00K</div>
                                    </div>
                                    <div class="game-list-footer-item"
                                        style="color: rgb(255, 255, 255); visibility: visible;margin-top:-10px;">
                                        <div class="game-list-footer-item-wrapper" style="transform: scale(1);">
                                            -Rp54,00K</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                style="left: 0%; top: 0px; position: absolute; width: inherit; height: inherit; z-index: 3;">
                                <div id="game-details-view-container"
                                    style="background-color: rgb(48, 48, 59); color: rgba(255, 255, 255, 0.6); overflow: hidden; -webkit-font-smoothing: antialiased;">
                                    <div id="game-detail-view-navbar-container" class=""
                                        style="height: 62px; padding-top: 0px; background-color: rgb(36, 36, 46);">
                                        <div style="position: absolute; z-index: 4; height: inherit; width: inherit;">
                                            <div id="game-list-nav" style="background-color: rgb(36, 36, 46);">
                                                <div id="game-list-nav-bar" class="game-list-nav-bar-vertical"
                                                    style="height: calc(100% - 2px);">
                                                    <div
                                                        class="game-list-nav-image-container game-list-nav-image-container-slot">
                                                        <div id="game-list-nav-image-left" class="game-list-nav-image "
                                                            style="transform: scale(0.7);">
                                                        </div>
                                                    </div>
                                                    <div id="game-list-nav-label-container"
                                                        class="game-list-nav-label-container-vertical ">
                                                        <div class="game-list-nav-row-container ">
                                                            <div id="game-free-spin-nav-label-wrapper"
                                                                style="width: 84px;">
                                                                <div id="game-free-spin-nav-label" class="title-top"
                                                                    style="color: rgb(255, 200, 36);">{LOG_TITLE}</div>
                                                            </div>
                                                        </div>
                                                        <div class="game-list-nav-subtitle-label"
                                                            style="color: rgba(255, 255, 255, 0.4);">{Date} {Time} ({GMT})</div>
                                                    </div>
                                                    <div
                                                        class="game-list-nav-image-container game-list-nav-image-container-slot">
                                                        <div id="game-list-nav-image-right" class="game-list-nav-image"
                                                            style="display: none;">
                                                            <div class="exit-icon vertical">
                                                                <div class="exit-icon-stroke exit-icon-stroke-one exit-icon-stroke-vertical"
                                                                    style="background-color: rgba(255, 255, 255, 0.6);">
                                                                </div>
                                                                <div class="exit-icon-stroke exit-icon-stroke-two exit-icon-stroke-vertical"
                                                                    style="background-color: rgba(255, 255, 255, 0.6);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="game-list-nav-separator-vertical-slot"
                                                    style="background-color: rgb(48, 48, 60);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="game-detail-spring-wrapper"
                                        style="position: absolute; height: 578px; transform: translate3d(0px, 0px, 0px);">
                                        <div id="game-details-page-container" style="height: 578px;">
                                            <div id="game-pages-window" style="position: relative;">
                                                <!---START_SLIDE_ITEM---->
                                                <div class="game-list-page"
                                                    style="width: 100%; height: 578px; position: absolute; left: 0px; left: {LEFT};">
                                                    <div class="reset">
                                                        <div id="transaction-details-container"
                                                            style="display: flex; width: inherit; height: 50px; margin: 0px auto; justify-content: center; align-items: center; background-color: rgb(36, 36, 46);">
                                                            <div class="transaction-detail-item"
                                                                style="display: flex; flex-direction: column; align-items: center; width: 27%;">
                                                                <div id="detail-item-holder"
                                                                    style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Transaction-item-value"
                                                                        style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">
                                                                        {Transaction}</div>
                                                                </div>
                                                                <div id="Transaction-item-key"
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
                                                                    Transaction</div>
                                                            </div>
                                                            <div class="transaction-detail-item"
                                                                style="display: flex; flex-direction: column; align-items: center; width: 18%; margin-left: 10px;">
                                                                <div id="detail-item-holder"
                                                                    style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Bet(Rp)-item-value"
                                                                        style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">
                                                                        {TotalBet}</div>
                                                                </div>
                                                                <div id="Bet(Rp)-item-key"
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
                                                                    Bet({CurrencyPrefix})</div>
                                                            </div>
                                                            <div class="transaction-detail-item"
                                                                style="display: flex; flex-direction: column; align-items: center; width: 20%; margin-left: 10px;">
                                                                <div id="detail-item-holder"
                                                                    style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Profit(Rp)-item-value"
                                                                        style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">
                                                                        {Profit}</div>
                                                                </div>
                                                                <div id="Profit(Rp)-item-key"
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
                                                                    Profit({CurrencyPrefix})</div>
                                                            </div>
                                                            <div class="transaction-detail-item"
                                                                style="display: flex; flex-direction: column; align-items: center; width: 27%; margin-left: 10px;">
                                                                <div id="detail-item-holder"
                                                                    style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Balance(Rp)-item-value"
                                                                        style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">
                                                                        {Balance}</div>
                                                                </div>
                                                                <div id="Balance(Rp)-item-key"
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
                                                                    Balance({CurrencyPrefix})</div>
                                                            </div>
                                                        </div>
                                                        <div class="history regular"
                                                            style="width: inherit; height: 528px;">
                                                            <div class="rcs-custom-scroll " style="height: inherit;">
                                                                <div class="rcs-outer-container" style="height: 100%;">
                                                                    <div class="rcs-inner-container scroller"
                                                                        style="height: 100%; margin-right: -17px;">
                                                                        <div class="scroller"
                                                                            style="height: 100%; overflow-y: visible; margin-right: 0px;">
                                                                            <div id="bet-details-container"
                                                                                style="display: flex; flex-direction: column;">
                                                                                <div id="bet-information-container"
                                                                                    style="display: flex; width: inherit; height: 50px; margin: 0px auto 5px; justify-content: center; align-items: center; padding-left: 10px; padding-right: 10px;">
                                                                                    <div id="bet-size-label"
                                                                                        style="font-size: 11px; text-align: center; word-break: break-word; color: rgba(255, 255, 255, 0.4);">
                                                                                        Bet Size {SIZE}</div>
                                                                                    <div id="separator"
                                                                                        style="width: 2px; height: 12px; margin-left: 10px; margin-right: 10px; background-color: rgb(40, 40, 51);">
                                                                                    </div>
                                                                                    <div id="bet-level-label"
                                                                                        style="font-size: 11px; text-align: center; word-break: break-word; color: rgba(255, 255, 255, 0.4);">
                                                                                        Bet Level {LEVEL}</div>
                                                                                </div>
                                                                                <div id="background-container"
                                                                                    style="position: relative; width: 270px; height: 195px; align-self: center; margin-top: 10px;">
                                                                                    <div id="reel_background"
                                                                                        style="position: absolute; display: flex; flex-direction: column; align-items: center; margin-top: -15px; margin-left: -20px;">
                                                                                        <div id="background-item"
                                                                                            style="width: 279px; height: 234px; margin-top: -5px; margin-bottom: -6px;">
                                                                                            <span
                                                                                                class="ui_reel ui_reel_atlas"
                                                                                                style="display: block; position: absolute; transform-origin: left top; transform: scale(0.47); margin-top: -25px; margin-left: 24px; height: 700px;"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="symbols-container"
                                                                                        style="position: relative; display: flex; justify-content: center; height: inherit; margin-top: -50px;margin-right: 54px;">
                                                                                        <!---START_TEMPLATE_BODY---->
                                                                                        <div id="slot-item-column"
                                                                                            style="position: relative; min-width: 72px; width: 72px; height: inherit; display: flex; flex-direction: column; margin-top: auto; margin-bottom: auto;">
                                                                                            <!---START_BODY_ITEM---->
                                                                                            <div id="slot-item"
                                                                                                style="width: 70px; height: 64px;">
                                                                                                <span class="ui_reel_atlas -x-BG-ICON-CSS-wh -xx-" style="display: block; position: absolute; transform-origin: left top; margin-top: -30px; margin-left: -30px; transform: scale(0.44); z-index: 1;"></span>
                                                                                                <span
                                                                                                    class="-x-ICON-CSS- symbol_7_1x1 symbol_atlas -xx-"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; margin-top: -8px; margin-left: -8px; transform: scale(0.5); z-index: 2;"></span>
                                                                                            </div>
                                                                                            <!---END_BODY_ITEM---->
                                                                                            <!---START_SAMBLE_BLOCK---->
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 78px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -16px; margin-left: -1px;"></span>
                                                                                            </div>
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 78px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -32px; margin-left: -1px;"></span>
                                                                                            </div>
                                                                                            <!---END_SAMBLE_BLOCK---->
                                                                                        </div>
                                                                                        <!---END_TEMPLATE_BODY---->
                                                                                        <!---START_SAMBLE_BLOCK---->
                                                                                        <div id="slot-item-column"
                                                                                            style="position: relative; min-width: 72px; width: 72px; height: inherit; display: flex; flex-direction: column; margin-top: auto; margin-bottom: auto;">
                                                                                            <div id="slot-item"
                                                                                                style="width: 70px; height: 64px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -4px; margin-left: -5px;"></span>
                                                                                            </div>
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 78px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -18px; margin-left: -5px;"></span>
                                                                                            </div>
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 78px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -34px; margin-left: -5px;"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="slot-item-column"
                                                                                            style="position: relative; height: 197px; width: 95px; display: flex; flex-direction: column; align-items: center; margin-top: -8px;">
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 74px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -8px; margin-left: -9px;"></span>
                                                                                            </div>
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 78px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -60px; margin-left: -9px;"></span>
                                                                                            </div>
                                                                                            <div id="slot-item"
                                                                                                style="width: 85px; height: 78px;">
                                                                                                <span
                                                                                                    class="symbol_7_1x1 symbol_atlas"
                                                                                                    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.38); margin-top: -36px; margin-left: -9px;"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!---END_SAMBLE_BLOCK---->
                                                                                    </div>
                                                                                </div>
                                                                                <div id="payout-title-container"
                                                                                    style="display: flex; width: inherit; height: 32px; justify-content: center; align-items: center; margin: 0px auto;">
                                                                                    <div class="line"
                                                                                        style="width: 120px; background-color: rgb(40, 40, 51); height: 2px;">
                                                                                    </div>
                                                                                    <div id="payout-text"
                                                                                        style="text-align: center; width: 72px; font-size: 11px; color: rgb(156, 155, 155);">
                                                                                        Payout</div>
                                                                                    <div class="line"
                                                                                        style="width: 120px; background-color: rgb(40, 40, 51); height: 2px;">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; width: inherit; margin: auto;">
                                                                                    <!---START_PAYOUT_INFO---->
                                                                                    <div
                                                                                        style="width: 285px; height: 48px; align-self: start;">																						
                                                                                        <div class="payout_Item_content"
                                                                                            style="display: flex; width: 280px; height: 48px; justify-content: space-between;">
                                                                                            <div class="payline_details"
                                                                                                style="display: flex; width: 230px; height: 48px;">
                                                                                                <div class="win_line_content"
                                                                                                    style="text-align: left; margin-top: 15px; width: 20px;">
                                                                                                    <div
                                                                                                        style="font-size: 13px; color: rgba(255, 255, 255, 0.6);">
                                                                                                        {LINE_INDEX}</div>
                                                                                                </div><span
                                                                                                    class="payline_{SYMBOL_INDEX} payline_atlas"
                                                                                                    style="display: block; transform-origin: left top; transform: scale(0.55); margin-top: 12px; margin-left: 2px;"></span>
                                                                                            </div>
                                                                                            <div class="win_text_section"
                                                                                                style="display: flex; justify-content: space-between;">
                                                                                                <div class="win_text_content"
                                                                                                    style="text-align: right; margin-top: 15px; width: 85px;">
                                                                                                    <div
                                                                                                        style="font-size: 13px; color: rgba(255, 255, 255, 0.6); text-align: end;">
                                                                                                        {PAYOUT_TOTAL}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="gh_basic_sprite gh_ic_nav_info_s" tabindex="0" data-descr=""
                                                                                            style="transform: translate(270px, -48.5px) scale(0.3333); opacity: 0.4;">
                                                                                        </div>
                                                                                        <div id="tooltip"
                                                                                    style="position: relative; width: 300px; height: inherit; align-self: center; top: -53px;left:-2px;z-index:1">
                                                                                    <div role="tooltip"
                                                                                        style="left: 90%; border-width: 6px; border-style: solid; border-color: transparent transparent rgb(70, 70, 83); border-image: initial; height: 0px; width: 0px; position: absolute; pointer-events: none; bottom: 98%;">
                                                                                    </div>
                                                                                    <div id="tooltip-toast"
                                                                                        style="background-color: rgb(70, 70, 83); color: rgb(255, 255, 255); border-radius: 6px; padding: 5px;">
                                                                                        <div id="tooltip-title"
                                                                                            style="color: rgb(128, 128, 128); font-size: 12px; text-align: left; padding: 0px 8px;">Bet Size x Bet Level x Symbol Payout Values
                                                                                        </div>
                                                                                        <div id="tooltip-desc"
                                                                                            style="font-size: 12px; text-align: left; padding: 0px 8px;">{SIZE} x {LEVEL} x {PAYOUT}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                    </div>
                                                                                    <!---END_PAYOUT_INFO---->
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div id="game-detail-padding"
                                                                                style="width: inherit; height: 86px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <!---END_SLIDE_ITEM---->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="game-details-left-arrow">
                                        <div class="gh-angle-wrapper" style="transform: translateX(4px) scale(0.7);">
                                            <div class="gh-angle-horizontal angle-left"
                                                style="border-color: rgb(247, 186, 101);"></div>
                                        </div>
                                    </div>
                                    <div id="game-details-right-arrow">
                                        <div class="gh-angle-wrapper" style="transform: translateX(-4px) scale(0.7);">
                                            <div class="gh-angle-horizontal angle-right"
                                                style="border-color: rgb(247, 186, 101);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$remoteData = $result
?>

<script>
    var Ce = JSON.parse('<?php echo json_encode($remoteData); ?>');

    var Ge = "symbol_atlas";
    var Ie = "";

    historyTranslation = {
        "normal_spin": "Normal Spin",
        "round_num": "Round 1/",
        "round_num_total": "Round %s/%s",
        "free_spin_total": "Free Spin ",
        "win_multiplier": "Win Multiplier",
        "no_win_combine": "No Winning Combination",
        "of_a_kind": "of a Kind",
        "way_s": "way(s)",
        "round_title": "Round",
        "Game_History": "Game History",
        "Today": "Today",
        "Last_7_days": "Last 7 days",
        "Custom": "Custom",
        "Time": "Time",
        "Transaction": "Transaction",
        "Bet": "Bet",
        "Profit": "Profit",
        "Records": "Records",
        "Load_more": "Load more ...",
        "Balance": "Balance",
        "Bet_Size": "Bet Size",
        "Bet_Level": "Bet Level",
        "Payout": "Payout",
        "calc_payout": "Bet Size x Bet Level x Symbol Payout Values x Way(s) x Multiplier",
        "No_Winning_Combination" : "No Winning Combination"
    };

    be = {};
    be.CurrencyPrefix = "Rp";
    be.CurrencySuffix = "";
    be.formatMoney = function(i, n = 2, r = ".", a = ",") {
        try {
            n = Math.abs(n), n = isNaN(n) ? 2 : n;
            let e = i < 0 ? "-" : "",
                t = parseInt(i = Math.abs(Number(i) || 0).toFixed(n)).toString(),
                s = 3 < t.length ? t.length % 3 : 0;
            return e + (s ? t.substr(0, s) + a : "") + t.substr(s).replace(/(\d{3})(?=\d)/g, "$1" + a) + (n ? r + Math.abs(i - t).toFixed(n).slice(2) : "")
        } catch (e) {
            console.log(e)
        }
    }

    let ss = (new Date).toTimeString().split(" "),
        ii = ss[1],
        nn = ii.charAt(4),
        Ae = 0 != nn ? ii.slice(0, -2) + ":" + ii.slice(-2) : ii.slice(0, 4) + ii.slice(5, 6) + ":" + ii.slice(-2);

    
    be.LogHistoryDetailId = e;
    be.LogHistorySlideTo = 0;
    
    const ye = void 0 !== Ce.special_symbols ? Ce.special_symbols : [];

    be.LogHistoryDetailResult = Ce.result_data;
    be.LogHistorySlideTotal = Ce.result_data.length;
    
    var e = document.getElementById("game-shell").innerHTML;

    const t = Ce.result_data[0],
        s = (be.LogHistoryDetailTitle = t.spin_title, e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = e.replace("{LOG_TITLE}", t.spin_title)).replaceAll(/{CurrencyPrefix}/g, be.CurrencyPrefix)).replace(/{GMT}/g, Ae)).replace("{Game_History}", historyTranslation.Game_History)).replaceAll(/{Today}/g, historyTranslation.Today)).replace("{Last_7_days}", historyTranslation.Last_7_days)).replaceAll("{Time_Title}", historyTranslation.Time)).replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction)).replaceAll(/{Bet_Title}/g, historyTranslation.Bet)).replace(/{Profit_Title}/g, historyTranslation.Profit)).replace("{Balance_Title}", historyTranslation.Balance)).replace("{Date}", Ce.spin_date)).replace(/{Time}/g, Ce.spin_hour)).replace("{Load_more}", historyTranslation.Load_more)).replace("{Custom}", historyTranslation.Custom)).replace("{Calc_payout}", historyTranslation.calc_payout)).replace("{Payout}", historyTranslation.Payout)).replace("{Bet_Level}", historyTranslation.Bet_Level)).replace("{Bet_Size}", historyTranslation.Bet_Size), "(.|\n|s|S)*?"),
        i = new RegExp("\x3c!---START_SAMBLE_BLOCK----\x3e" + s + "\x3c!---END_SAMBLE_BLOCK----\x3e", "ig"),
        F = new RegExp("-x-ICON-CSS-(.*?)-xx-", "ig"),
        B = new RegExp("-x-BG-ICON-CSS-(.*?)-xx-", "ig"),
        k = new RegExp("-x-(.*?)-xx-", "ig"),
        N = /<!--[\s\S]*?-->/g,
        n = new RegExp("\x3c!---START_SLIDE_ITEM----\x3e" + s + "\x3c!---END_SLIDE_ITEM----\x3e", "i"),
        W = new RegExp("\x3c!---START_TEMPLATE_BODY----\x3e" + s + "\x3c!---END_TEMPLATE_BODY----\x3e", "i"),
        V = (new RegExp("\x3c!---START_PLACEHOLDER_BODY----\x3e" + s + "\x3c!---END_PLACEHOLDER_BODY----\x3e", "ig"), new RegExp("\x3c!---START_FRAME_BODY----\x3e" + s + "\x3c!---END_FRAME_BODY----\x3e", "i"), new RegExp("\x3c!---START_BODY_ITEM----\x3e" + s + "\x3c!---END_BODY_ITEM----\x3e", "i")),
        H = new RegExp("\x3c!---START_PAYOUT_INFO----\x3e" + s + "\x3c!---END_PAYOUT_INFO----\x3e", "i"),
        U = e.match(n);
    var r = [];
    if (U) {
        for (var j = (j = JSON.parse(JSON.stringify(U[0]))).replace(i, ""), X = "", a = -1, o = 0; o < Ce.result_data.length; o++) {
            const f = Ce.result_data[o];
            for (var l = 0; l < f.active_lines.length; l++) r = r.concat(f.active_lines[l].active_icon);
            var h = f.multi_list || [1, 2, 3, 5],
                c = JSON.parse(JSON.stringify(j));
            const K = 360 * o,
                S = (c = (c = (c = (c = (c = c.replace("{LEFT}", K + "px")).replace("{Transaction}", f.transaction)).replace("{TotalBet}", be.formatMoney(f.total_bet, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace("{Profit}", be.formatMoney(f.profit, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace("{Balance}", be.formatMoney(f.balance, 2, be.CurrencyDecimal, be.CurrencyThousand)), Math.floor(f.bet_level)),
                C = f.bet_size;
            var $ = "";
            const y = (c = (c = c.replace("{LEVEL}", S)).replace("{SIZE}", be.formatMoney(C, 2, be.CurrencyDecimal, be.CurrencyThousand))).match(W);
            if (y) {
                if (console.log("slide", f), f.reel_data && 0 < f.reel_data.length)
                    for (var u = 0; u < f.reel_data.length; u++) {
                        const Q = u + 1,
                            I = f.reel_data[u];
                        var _ = JSON.parse(JSON.stringify(y[0]));
                        const b = (_ = (_ = _.replace(i, "")).replace("{COLUMN}", u)).match(V);
                        if (b) {
                            for (var Y = "", d = 0; d < I.length; d++) {
                                var p = JSON.parse(JSON.stringify(b[0]));
                                console.log("reelItem", I[d]);
                                const A = I[d],
                                    P = (console.log(A), A.includes(":")),
                                    R = P ? A.split(":") : [],
                                    ee = P ? R[1] : 1,
                                    te = P ? R[2] : 0,
                                    x = P ? R[0] : A,
                                    se = 1 == te ? "bottom" : "top",
                                    ie = -1 != ye.indexOf(x) ? Ie : Ge,
                                    ne = "_skip" == x ? "" : ie + ` s_${x} l_${ee} f_${se} r_` + Q,
                                    re = d * f.reel_data.length + (u + 1),
                                    ae = r.includes(re) ? "wh" : "";
                                Y += p = (p = p.replace(F, ne)).replace(B, ae)
                            }
                            $ += _ = (_ = _.replace(i, "")).replace(V, Y)
                        }
                    }
                c = c.replace(W, $)
            }
            const J = ` ${f.round_name} `,
                T = (c = c.replace("{ROUND_INFO}", J), 0 < f.active_lines.length ? f.active_lines[0].multiply : 0),
                Z = 0 < T ? historyTranslation.win_multiplier + " x" + T : "";
            c = c.replace("{MULTIPLY_INFO}", Z);
            for (var q = !1, m = 0; m < h.length; m++) {
                const E = h[m],
                    v = 0 == m && 0 == T && -1 == a,
                    w = E == a && 0 == T,
                    oe = v || w || T == E ? "cb2_number_sprite yellow_x" : "cb2_number_sprite grey_x",
                    le = v || w || T == E ? "cb2_number_sprite yellow_" + E : "cb2_number_sprite grey_" + E,
                    he = v || w || T == E ? "cb2_general_sprite red_highlight" : "",
                    M = m + 1;
                c = (c = (c = c.replace(`{MULTIPLY_X_${M}}`, oe)).replace(`{MULTIPLY_NUMBER_${M}}`, le)).replace(`{MULTIPLY_HIGHLIGHT_${M}}`, he), T == E && (a = h[o >= h.length ? m : m + 1], q = !0)
            }
            q || (a = -1);
            var z = "";
            const G = (c = c.replace(k, "")).match(H);
            if (G) {
                for (u = 0; u < f.active_lines.length; u++) {
                    const D = f.active_lines[u];
                    var g = JSON.parse(JSON.stringify(G[0]));
                    const ce = D.index < 10 ? "0" + D.index.toString() : D.index.toString(),
                        ue = D.index,
                        O = D.name,
                        _e = -1 != ye.indexOf(O) ? Ie : Ge,
                        de = _e + " s_" + O,
                        pe = D.combine + " " + historyTranslation.of_a_kind,
                        me = D.way_243 + " " + historyTranslation.way_s,
                        ge = be.formatMoney(D.win_amount, 2, be.CurrencyDecimal, be.CurrencyThousand),
                        fe = be.CurrencyPrefix + "<i></i>" + ge.toString() + be.CurrencySuffix,
                        L = be.formatMoney(D.payout * D.way_243 * S * C, 2, be.CurrencyDecimal, be.CurrencyThousand).replace(/\d(?=(\d{3})+\.)/g, "$&,"),
                        Se = 0 < T ? "" + L : L + " x" + D.multiply;
                    g = (g = (g = (g = (g = (g = (g = (g = (g = (g = (g = (g = g.replace(F, de)).replace(/{SYMBOL_INDEX}/g, ue)).replace(/{LINE_INDEX}/g, ce)).replace(/{SYMBOL_NAME}/g, O)).replace("{SYMBOL_TITLE}", pe)).replace("{SYMBOL_SUB}", me)).replace("{PAYOUT_TOTAL}", fe)).replace("{PAYOUT_DESC}", Se)).replace("{SIZE}", be.formatMoney(C, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace(/{LEVEL}/g, S)).replace("{PAYOUT}", D.payout)).replace(/{WAY}/g, D.way_243), console.log(D), z += g = (g = g.replace("{MULTIPLY}", D.multiply)).replace(N, "")
                }
                c = c.replace(H, z)
            }
            X += c
        }
        e = (e = (e = e.replace(n, X)).replace(N, "")).replace(i, "");
        be.LogHistoryDetailTemplate = e;
    }


        
    document.getElementById("game-shell").innerHTML = e;


    var currentSlide = 0;

    function checkArrow() {
        document.getElementById("game-details-left-arrow").style.display = (currentSlide == 0) ? 'none' : 'flex';
        document.getElementById("game-details-right-arrow").style.display = (currentSlide >= be.LogHistorySlideTotal -1) ? 'none' : 'flex';
    }
    checkArrow();

    document.getElementById("game-details-right-arrow").addEventListener('click', function() {
        if (currentSlide < be.LogHistorySlideTotal - 1) {
            currentSlide++;

            document.getElementById("game-detail-spring-wrapper").style.transform = 'translate3d(-' + (currentSlide*100) + '%,0,0)';
        }
        checkArrow();
    });

    document.getElementById("game-details-left-arrow").addEventListener('click', function() {
        if (currentSlide > 0) {
            currentSlide--;

            document.getElementById("game-detail-spring-wrapper").style.transform = 'translate3d(-' + (currentSlide*100) + '%,0,0)';
        }
        checkArrow();
    });

</script>