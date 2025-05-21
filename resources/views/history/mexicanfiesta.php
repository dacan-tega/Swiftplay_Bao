<?php

$imageBaseUrl = '/games/'.$game_folder.'/';
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
    background-image: url(<?php echo $imageBaseUrl ?>19.png)
}

/* $CSS-16ff435713-13 */
.gh_theme_sprite {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?php echo $imageBaseUrl ?>19.png)
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
[id=tooltip] {
        visibility: hidden;
    }

    div[data-descr]:focus+[id="tooltip"] {
        visibility: visible;
    }

.gh_basic_sprite {
        background-image: url(<?php echo $imageBaseUrl ?>25.png);
        background-repeat: no-repeat;
        background-size: 162px 112px;
        display: inline-block;
        overflow: hidden
    }
.main_multiplier {
 transform: scale(0.5) translate(-221px, -52px) !important;
}
    .gh_ic_nav_calendar {
        background-position: -1px -1px;
        height: 110px;
        min-height: 110px;
        min-width: 110px;
        width: 110px
    }

    .gh_ic_nav_info_s {
        background-position: -113px -1px;
        height: 48px;
        min-height: 48px;
        min-width: 48px;
        width: 48px
    }

    .symbol_atlas {
        display: inline-block;
        overflow: hidden;
        background-repeat: no-repeat;
        background-image: url(<?php echo $imageBaseUrl ?>20.png)
    }



    .history_img {
        background-image: url(<?php echo $imageBaseUrl ?>21.png);
        background-repeat: no-repeat;
        background-size: 964px 972px;
        z-index: -1;
        display: inline-block;
        overflow: hidden
    }

    .history_img.bonus_multiplier {
        background-position: -1px -1px;
        height: 456px;
        min-height: 456px;
        min-width: 440px;
        width: 440px
    }

    .history_img.bonus_reel {
        background-position: -1px -459px;
        height: 420px;
        min-height: 420px;
        min-width: 520px;
        width: 520px
    }

    .history_img.main_multiplier {
        background-position: -523px -423px;
        height: 456px;
        min-height: 456px;
        min-width: 440px;
        width: 440px
    }

    .history_img.main_reel {
        background-position: -443px -1px;
        height: 420px;
        min-height: 420px;
        min-width: 520px;
        width: 520px
    }

    .history_img.multi_0 {
        background-position: -1px -881px
    }

    .history_img.multi_0,
    .history_img.multi_1 {
        height: 90px;
        min-height: 90px;
        min-width: 70px;
        width: 70px
    }

    .history_img.multi_1 {
        background-position: -73px -881px
    }

    .history_img.multi_2 {
        background-position: -145px -881px
    }

    .history_img.multi_2,
    .history_img.multi_3 {
        height: 90px;
        min-height: 90px;
        min-width: 70px;
        width: 70px
    }

    .history_img.multi_3 {
        background-position: -217px -881px
    }

    .history_img.multi_4 {
        background-position: -289px -881px
    }

    .history_img.multi_4,
    .history_img.multi_5 {
        height: 90px;
        min-height: 90px;
        min-width: 70px;
        width: 70px
    }

    .history_img.multi_5 {
        background-position: -361px -881px
    }

    .history_img.multi_6 {
        background-position: -433px -881px
    }

    .history_img.multi_6,
    .history_img.multi_7 {
        height: 90px;
        min-height: 90px;
        min-width: 70px;
        width: 70px
    }

    .history_img.multi_7 {
        background-position: -505px -881px
    }

    .history_img.multi_8 {
        background-position: -577px -881px
    }

    .history_img.multi_8,
    .history_img.multi_9 {
        height: 90px;
        min-height: 90px;
        min-width: 70px;
        width: 70px
    }

    .history_img.multi_9 {
        background-position: -649px -881px
    }

    .history_img.multi_infinity {
        background-position: -721px -881px
    }

    .history_img.multi_infinity,
    .history_img.multi_x {
        height: 90px;
        min-height: 90px;
        min-width: 70px;
        width: 70px
    }

    .history_img.multi_x {
        background-position: -793px -881px
    }


    .symbol_0_0 {
        height: 167px;
        width: 146px;
        background-position: -151px 17px
    }

    .symbol_1_0 {
        height: 177px;
        width: 146px;
        background-position: 0px 17px
    }

    .symbol_2_0 {
        height: 140px;
        width: 146px;
        background-position: -297px 17px
    }

    .symbol_2_1 {
        height: 140px;
        width: 146px;
        background-position: -300px 17px
    }

    .symbol_3_0 {
        height: 140px;
        width: 146px;
        background-position: -457px 17px
    }

    .symbol_3_1 {
        height: 140px;
        width: 146px;
        background-position: -457px 17px
    }

    .symbol_4_0 {
        height: 140px;
        width: 146px;
        background-position: -602px 17px
    }

    .symbol_4_1 {
        height: 140px;
        width: 146px;
        background-position: -602px 17px
    }

    .symbol_5_0 {
        height: 140px;
        width: 146px;
        background-position: -740px 17px
    }

    .symbol_5_1 {
        height: 140px;
        width: 146px;
        background-position: -740px 17px
    }

    .symbol_6_0 {
        height: 140px;
        width: 146px;
        background-position: -866px 17px
    }

    .symbol_6_1 {
        height: 140px;
        width: 146px;
        background-position: -866px 17px
    }

    .symbol_7_0 {
        height: 140px;
        width: 146px;
        background-position: -984px 17px
    }

    .symbol_7_1 {
        height: 140px;
        width: 146px;
        background-position: -984px 17px
    }

    .symbol_8_0 {
        height: 140px;
        width: 146px;
        background-position: -1107px 17px
    }

    .symbol_8_1 {
        height: 140px;
        width: 146px;
        background-position: -1107px 17px
    }

    .symbol_9_0 {
        height: 140px;
        width: 146px;
        background-position: -1218px 17px
    }

    .symbol_9_1 {
        height: 140px;
        width: 146px;
        background-position: -1218px 17px
    }

    .symbol_10_0 {
        height: 140px;
        width: 146px;
        background-position: -1323px 17px
    }

    .symbol_10_1 {
        height: 140px;
        width: 146px;
        background-position: -1323px 17px
    }


    .wh {
        background-position: -1843px 7px;
        height: 95px;
        width: 95px
    }


    .mahjong_static_sprites {
        background-image: url(<?php echo $imageBaseUrl ?>20.png);
        background-repeat: no-repeat;
        display: inline-block;
        overflow: hidden
    }

    .ball2 {
        background-position: -1px -257px
    }

    .ball2,
    .ball5 {
        height: 186px;
        width: 186px
    }

    .ball5 {
        background-position: -1452px -1px
    }

    .bamboo2 {
        background-position: -189px -257px
    }

    .bamboo2,
    .bamboo5 {
        height: 186px;
        width: 186px
    }

    .bamboo5 {
        background-position: -1640px -1px
    }

    .base_gold {
        background-position: -1463px -7px;
        height: 201px;
        width: 201px
    }

    .base_gold_ingot {
        background-position: -843px -204px;
        height: 30px;
        width: 36px
    }

    .base_white {
        background-position: -1046px -1px;
        height: 201px;
        width: 201px
    }

    .bonus_top_b {
        background-position: -1px -1px;
        height: 126px;
        width: 840px
    }

    .char8 {
        background-position: -377px -257px
    }

    .char8,
    .green {
        height: 186px;
        width: 186px
    }

    .green {
        background-position: -565px -257px
    }

    .main_top_c {
        background-position: -1px -129px;
        height: 126px;
        width: 840px
    }

    .multiplier_glow {
        background-position: -1821px -345px;
        height: 78px;
        width: 112px
    }

    .multiplier_x10_grey {
        background-position: -1828px -1px;
        height: 84px;
        width: 171px
    }

    .multiplier_x10_light {
        background-position: -1129px -204px;
        height: 84px;
        width: 171px
    }

    .multiplier_x1_grey {
        background-position: -1828px -87px;
        height: 84px;
        width: 171px
    }

    .multiplier_x1_light {
        background-position: -1129px -290px;
        height: 84px;
        width: 171px
    }

    .multiplier_x2_grey {
        background-position: -1302px -204px;
        height: 84px;
        width: 171px
    }

    .multiplier_x2_light {
        background-position: -1302px -290px;
        height: 84px;
        width: 171px
    }

    .multiplier_x3_grey {
        background-position: -1475px -189px;
        height: 84px;
        width: 171px
    }

    .multiplier_x3_light {
        background-position: -1475px -275px;
        height: 84px;
        width: 171px
    }

    .multiplier_x4_grey {
        background-position: -1475px -361px;
        height: 84px;
        width: 171px
    }

    .multiplier_x4_light {
        background-position: -1648px -189px;
        height: 84px;
        width: 171px
    }

    .multiplier_x5_grey {
        background-position: -1648px -275px;
        height: 84px;
        width: 171px
    }

    .multiplier_x5_light {
        background-position: -1648px -361px;
        height: 84px;
        width: 171px
    }

    .multiplier_x6_grey {
        background-position: -1828px -173px;
        height: 84px;
        width: 171px
    }

    .multiplier_x6_light {
        background-position: -1821px -259px;
        height: 84px;
        width: 171px
    }

    .red {
        background-position: -753px -257px;
        height: 186px;
        width: 186px
    }

    .scatter {
        background-position: -1249px -1px;
        height: 201px;
        width: 201px
    }

    .white {
        background-position: -941px -204px;
        height: 186px;
        width: 186px
    }



    .history_assets {
        display: inline-block;
        overflow: hidden;
        background-repeat: no-repeat;
        background-image: url(<?php echo $imageBaseUrl ?>21.png)
    }

    .bg_bns {
        background-position: -1px -1px
    }

    .bg_bns,
    .bg_main {
        width: 802px;
        height: 540px
    }

    .bg_main {
        background-position: -422px 119px
    }

    .bg_mask {
        width: 456px;
        height: 540px;
        background-position: -1px -1085px
    }

    .wh_c {
        width: 134px;
        height: 296px;
        background-position: -204px -1610px
    }

    .wh_a {
        width: 134px;
        height: 160px;
        background-position: -367px -1848px
    }

    .wh_b {
        width: 134px;
        height: 228px;
        background-position: -366px -1615px
    }

    .wh_d {
        width: 160px;
        height: 366px;
        background-position: -1px -1627px
    }
</style>

<style>
#game-list-detail-wrapper {
    position: relative;
    left: auto;
    width: 100%;
    margin: 0 auto;
}

body {
    background-color: rgb(48, 48, 59);
    margin: 0;
}

#game-history-container {
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .5);
    margin: 0 auto;
}

#background-container {
    margin-left: 30px !important;
}

.main_multiplier {
    transform: scale(0.5) translate(-80px, -52px) !important;
}


</style>

<div id="game-shell" class="game-shell"
    style="font-family: PingFang SC, Microsoft YaHei, WenQuanYi Micro Hei, sans-serif;">
    <div id="game-overlay">
        <div id="game-history-container"
            style="overflow: hidden; visibility: visible; height: 640px; width: 360px; transform: scale(1); position: relative; z-index: 0;">
            <div id="container-view" style="overflow: hidden;">
                <div style="top: 0%; left: 0px; position: absolute; width: inherit; height: inherit;">
                    <div id="game-list-view" class="game-list-view-container"
                        style="background-color: rgb(48, 48, 59);">
                        <div id="game-list-view-wrapper" style="flex-direction: column;">

                            <div
                                style="left: 0%; top: 0px; position: absolute; width: inherit; height: inherit; z-index: 0;">
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
                                                                    style="color: rgb(255, 196, 36);">{LOG_TITLE}</div>
                                                            </div>
                                                        </div>
                                                        <div class="game-list-nav-subtitle-label"
                                                            style="color: rgba(255, 255, 255, 0.4);" class="date-time">{Date} {Time}
                                                            ({GMT})</div>
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
													<!---START_TRANS_ITEM---->
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 196, 36);">
                                                                    {Transaction_Title}</div>
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 196, 36);">
                                                                    {Bet_Title}({CurrencyPrefix})</div>
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 196, 36);">
                                                                    {Profit_Title}({CurrencyPrefix})</div>
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 196, 36);">
                                                                    {Balance_Title}({CurrencyPrefix})</div>
                                                            </div>
                                                        </div>
														<!---END_TRANS_ITEM---->
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
																				<!---START_BET_INFO---->
                                                                                <div id="bet-information-container"
                                                                                    style="display: flex; width: inherit; height: 50px; margin: 0px auto 5px; justify-content: center; align-items: center; padding-left: 10px; padding-right: 10px;">
                                                                                    <div id="bet-size-label"
                                                                                        style="font-size: 11px; text-align: center; word-break: break-word; color: rgba(255, 255, 255, 0.4);">
                                                                                        {Bet__Size_Title} {SIZE}</div>
                                                                                    <div id="separator"
                                                                                        style="width: 2px; height: 12px; margin-left: 10px; margin-right: 10px; background-color: rgb(40, 40, 51);">
                                                                                    </div>
                                                                                    <div id="bet-level-label"
                                                                                        style="font-size: 11px; text-align: center; word-break: break-word; color: rgba(255, 255, 255, 0.4);">
                                                                                        {Bet_Level_Title} {LEVEL}</div>
                                                                                </div>
																				<!---END_BET_INFO---->

                                                                                <!---START__MULTI_TOP---->
                                                                                
                                                                                    <!---END__MULTI_TOP---->

                                                                                    <!---START__MULTI_TOP_WIN---->
                                                                                    <div class="mul_x2 history_assets" style="-xx3-flex: 0 0 auto; object-fit: cover; margin-top: 0px;-x3-"></div>
                                                                                    <!---END__MULTI_TOP_WIN---->

                                                                                    <!---START__MULTI_TOP_NORMAL---->
                                                                                    <div class="mul_x5 history_assets" style="-xx4-flex: 0 0 auto; object-fit: cover; margin-top: 20px;-x4-"></div>
                                                                                    <!---END__MULTI_TOP_NORMAL---->

                                                                                <div id="background-container"
                                                                                    style="display: flex; width: 300px; margin: auto;">
                                                                                    <div id="reel_background"
                                                                                        style="display: flex; position: relative; height: 300px;width: 300px; margin: auto auto 10px; flex-direction: column;">
                                                                                        <div id="background-item"
                                                                                            style="">
                                                                                            <span
                                                                                                class="history_assets {BG_REEL}"
                                                                                                style="display: block;position: absolute;transform-origin: left top;transform: scaleX(0.5) scaleY(0.57) translate(32px, 0px);"></span>
                                                                                        </div>
																						
																				<!---START__SHOW_MULTI---->
																					{TOTALMULTI}
																				<!---END__SHOW_MULTI---->
                                                                                    </div>
																					<span class="main_ui_reel background"
    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.5);"></span>
                                                                                    
																					<div id="symbols-container"
                                                                                        style="position: relative;display: flex;justify-content: center;align-items: center;width: inherit;height: 300px;/* margin: -57px -38px; */margin-top: -57px;margin-left: -272px;">																						
                                                                                        <!---START_TEMPLATE_BODY---->
																						
                                                                                        {SLOTCOLUMN}
																						
																						<!---START__SYMBOL_NORMAL---->
																						<span class="Symbol_4_1 symbol_atlas"
    style="-xx2-display: block; position: absolute; transform-origin: left top; transform: scale(0.5) translate(5px, 0px);-x2-"></span>
																						<!---END__SYMBOL_NORMAL---->
																						
																						<!---START__SYMBOL_WIN---->
																						<span class="Symbol_3_1 symbol_atlas"
    style="-xx1-display: block; position: absolute; transform-origin: left top; transform: scale(0.5) translate(5px, 0px);-x1-"></span>
																						<!---END__SYMBOL_WIN---->
																						
																						<!---START__BG_SYMBOL_WIN---->
																						<span class="glow ui_atlas" style="display: block; position: absolute; transform-origin: left top; transform: scale(0.5); margin-top: -6.3px; margin-left: -4.5px;"></span>   
																						<!---END__BG_SYMBOL_WIN---->
																						
																						<!---START__CHANGE_CSS_SLOT_ITEM_COLUMN---->
																						<div id="slot-item-column" style="height: 248px;"
        >
																						<!---END__CHANGE_CSS_SLOT_ITEM_COLUMN---->
																						
																						<!---START__CHANGE_CSS_SLOT_ITEM---->
																						<div id="slot-item" style="width: 58.2px; height: 51px;">
																						<!---END__CHANGE_CSS_SLOT_ITEM---->
																						
                                                                                        <!---END_SAMBLE_BLOCK---->
                                                                                    </div>
                                                                                </div>
                                                                                <!---START__MULTI_BOT---->
                                                                                <!---END__MULTI_BOT---->
																				
																				<!---START__MULTI_BOT_NORMAL---->
																				<!---END__MULTI_bOT_NORMAL---->
																				<!---START_PROGRESS_BAR---->
																				
																				<!---END_PROGRESS_BAR---->	
                                                                                <div id="payout-title-container"
                                                                                    style="display: flex; width: inherit; height: 32px; justify-content: center; align-items: center; margin: 0px auto;">
                                                                                    <div class="line"
                                                                                        style="width: 120px; background-color: rgb(40, 40, 51); height: 2px;">
                                                                                    </div>
                                                                                    <div id="payout-text"
                                                                                        style="text-align: center; width: 72px; font-size: 11px; color: rgb(156, 155, 155);">
                                                                                        {Payout_Title}</div>
                                                                                    <div class="line"
                                                                                        style="width: 120px; background-color: rgb(40, 40, 51); height: 2px;">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    style="display: flex; position: relative; flex-direction: column; justify-content: space-between; align-items: center; width: 300px; margin: auto;">
                                                                                    <!---START_PAYOUT_INFO---->
																					<div
    style="display: flex; position: relative; flex-direction: column; justify-content: space-between; align-items: center; width: 300px; margin: auto;">
                                                                                    {PAYOUT}
																					</div>
                                                                                    <!---END_PAYOUT_INFO---->
																					<!---START__SPECIAL__PAYOUT---->
																					
																					<!---END__SPECIAL__PAYOUT---->
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
$remoteData = [
    'res_data' => $res_data,
    'bet_size' => $bet_size,
    'bet_level' => $bet_level,
];
?>
<script>
    var xe = JSON.parse('<?php echo json_encode($remoteData); ?>');

    console.log(xe);

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

    be.LogHistoryDetailResult = [];
    be.SpinTitle = [];
    be.RoundTitle = [];
    be.LogHistorySlideTotal = 0;
    be.CurrencyDecimal = ",";
    be.CurrencyThousand = ".";
    be.CurrencyPrefix = "Rp";
    be.formatMoney = function(a, b = 2, c = ".", d = ",") {
        try {
            b = Math.abs(b);
            b = isNaN(b) ? 2 : b;
            const e = 0 > a ? "-" : "";
            let g = parseInt(a = Math.abs(Number(a) || 0).toFixed(b)).toString(),
                h = 3 < g.length ? g.length %
                3 : 0;
            return e + (h ? g.substr(0, h) + d : "") + g.substr(h).replace(/(\d{3})(?=\d)/g, "$1" + d) + (b ? c + Math.abs(a - g).toFixed(b).slice(2) : "")
        } catch (e) {
            console.log(e)
        }
    };

    var e = document.getElementById("game-shell").innerHTML;

    
    let rr = (new Date).toTimeString().split(" "),
        aa = rr[1],
        oo = aa.charAt(4),
        Ae = 0 != oo ? aa.slice(0, -2) + ":" + aa.slice(-2) : aa.slice(0, 4) + aa.slice(5, 6) + ":" + aa.slice(-2);


    be.LogHistoryDetailId = e;
    be.LogHistorySlideTo = 0;
    be.LogHistoryDetailResult = [];
    be.SpinTitle = [];
    be.RoundTitle = [];
    
    e = (e = (e = (e = (e = e.replaceAll(/{CurrencyPrefix}/g, be.CurrencyPrefix)).replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction)).replace(/{Profit_Title}/g, historyTranslation.Profit)).replace("{Calc_payout}", historyTranslation.Calc_payout)).replace("{Payout_Title}", historyTranslation.Payout);
    const t = "(.|\n|s|S)*?",
        s = /(-xx5-)(.*?)(-x5-)/gm,
        i = new RegExp("\x3c!---START_SLIDE_ITEM----\x3e" + t + "\x3c!---END_SLIDE_ITEM----\x3e", "i"),
        n = new RegExp("\x3c!---START_BET_INFO----\x3e" + t + "\x3c!---END_BET_INFO----\x3e", "i"),
        r = new RegExp("\x3c!---START_TRANS_ITEM----\x3e" + t + "\x3c!---END_TRANS_ITEM----\x3e", "i"),
        a = new RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e" + t + "\x3c!---END__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e", "i"),
        o = new RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM----\x3e" + t + "\x3c!---END__CHANGE_CSS_SLOT_ITEM----\x3e", "i"),
        F = new RegExp("\x3c!---START__BG_SYMBOL_WIN----\x3e" + t + "\x3c!---END__BG_SYMBOL_WIN----\x3e", "i"),
        N = new RegExp("\x3c!---START__SYMBOL_WIN----\x3e" + t + "\x3c!---END__SYMBOL_WIN----\x3e", "i"),
        B = new RegExp("\x3c!---START__SYMBOL_NORMAL----\x3e" + t + "\x3c!---END__SYMBOL_NORMAL----\x3e", "i"),
        k = new RegExp("\x3c!---START__FRAM__SYMBOL----\x3e" + t + "\x3c!---END__FRAM__SYMBOL----\x3e", "i"),
        W = new RegExp("\x3c!---START__MULTI_TOP----\x3e" + t + "\x3c!---END__MULTI_TOP----\x3e", "i"),
        V = (new RegExp("\x3c!---START__MULTI_BOT----\x3e" + t + "\x3c!---END__MULTI_BOT----\x3e", "i"), new RegExp("\x3c!---START__MULTI_TOP_WIN----\x3e" + t + "\x3c!---END__MULTI_TOP_WIN----\x3e", "i")),
        U = new RegExp("\x3c!---START__MULTI_TOP_NORMAL----\x3e" + t + "\x3c!---END__MULTI_TOP_NORMAL----\x3e", "i"),
        H = new RegExp("\x3c!---START__MULTI_BOT_NORMAL----\x3e" + t + "\x3c!---END__MULTI_bOT_NORMAL----\x3e", "i"),
        j = new RegExp("\x3c!---START__SHOW_MULTI----\x3e" + t + "\x3c!---END__SHOW_MULTI----\x3e", "i");
    var $ = xe.res_data,
        X = xe.bet_size,
        Y = xe.bet_level,
        l = 0;
    const h = e.match(i),
        z = e.match(n),
        J = e.match(r),
        q = e.match(a),
        K = e.match(o),
        Z = e.match(F),
        Q = e.match(B),
        ee = e.match(N),
        te = (e.match(k), e.match(V)),
        se = e.match(U),
        ie = e.match(H),
        ne = e.match(W),
        re = e.match(H),
        ae = e.match(j);
    if (h) {
        JSON.parse(JSON.stringify(h[0]));
        var oe = JSON.parse(JSON.stringify(h[0])),
            c = (JSON.parse(JSON.stringify(q[0])), JSON.parse(JSON.stringify(K[0])), JSON.parse(JSON.stringify(Z[0])), JSON.parse(JSON.stringify(Q[0]))),
            u = (JSON.parse(JSON.stringify(ee[0])), JSON.parse(JSON.stringify(ee[0]))),
            _ = JSON.parse(JSON.stringify(te[0])),
            le = JSON.parse(JSON.stringify(se[0])),
            he = JSON.parse(JSON.stringify(ie[0])),
            ce = (JSON.parse(JSON.stringify(ne[0])), JSON.parse(JSON.stringify(ae[0]))),
            u = /(-xx1-)(.*?)(-x1-)/gm.exec(u),
            u = (null != u && u[2], /(-xx2-)(.*?)(-x2-)/gm.exec(c)),
            c = (null != u && u[2], /(-xx3-)(.*?)(-x3-)/gm.exec(_)),
            u = (null != c && c[2], /(-xx4-)(.*?)(-x4-)/gm.exec(le)),
            _ = (null != u && u[2], s.exec(he));
        null != _ && _[2];
        null != (_ = s.exec(he)) && _[2];
        var d = "";
        for (let e = 0; e < $.length; e++) {
            JSON.parse(JSON.stringify(ne[0])), JSON.parse(JSON.stringify(re[0]));
            var p = $[e].result_json,
                ue = p.length,
                g = p.length - 1,
                m = (p[g].total_freespin, p[g].spin_date),
                f = p[g].spin_hour,
                S = p[g].free_spin,
                _e = S ? "bg_free" : "bg_main",
                de = (p[g].free_num, p[g].transaction),
                pe = p[g].free_num,
                y = p[g].count_scatter,
                ge = p[g].freespin_more,
                me = p[g].free_num;
            p[g].mutilply;
            for (let e = 0; e < ue; e++) {
                var C = JSON.parse(JSON.stringify(J[0])),
                    T = JSON.parse(JSON.stringify(z[0])),
                    G = JSON.parse(JSON.stringify(oe));
                const Ie = 360 * l;
                l++, be.LogHistorySlideTotal = l;
                var I, x = p[e].round_title,
                    G = G.replace("{LEFT}", Ie + "px"),
                    b = (T = (T = (T = (T = T.replace("{Bet_Level_Title}", historyTranslation.Bet_Level)).replaceAll(/{Bet__Size_Title}/g, historyTranslation.Bet_Size)).replace("{LEVEL}", Y)).replace("{SIZE}", be.formatMoney(X, 2, be.CurrencyDecimal, be.CurrencyThousand)), T = "" != x ? (T = T.replace("{SPACE}", `<div id="separator"
            style="width: 2px; height: 12px; margin-left: 10px; margin-right: 10px; background-color: rgb(40, 40, 51);">
            </div>`)).replace("{Round_Title}", x) : (T = T.replace("{Round_Title}", "")).replace("{SPACE}", ""), p[e].profit),
                    A = p[e].bet_amount,
                    fe = p[e].credit,
                    v = p[e].new_reel,
                    Se = p[e].drop_position,
                    ye = (void 0 === p[e].symbol_win || p[e].symbol_win, v.length - 1),
                    R = p[e].win_drop,
                    P = p[e].total_multi,
                    w = p[e].spin_title,
                    E = (be.SpinTitle.push(w), be.RoundTitle.push(x), be.LogHistoryDetailResult.push({
                        spin_title: w,
                        date: m,
                        hour: f
                    }), ""),
                    M = "";
                if (C = (C = (C = (C = (C = (C = (C = (C = C.replace("{Transaction}", de)).replace("{TotalBet}", be.formatMoney(A, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace("{Profit}", be.formatMoney(b, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace("{Balance}", be.formatMoney(fe, 2, be.CurrencyDecimal, be.CurrencyThousand))).replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction)).replaceAll(/{Bet_Title}/g, historyTranslation.Bet)).replace(/{Profit_Title}/g, historyTranslation.Profit)).replace("{Balance_Title}", historyTranslation.Balance), M += `
    <div class="payoutContainer"
        style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
        <div class="payoutDescContainer"
            style="width: 0px; position: relative; flex-direction: column; min-width: 0px; margin-top: 10px;"></div>
        <div class="payoutTextContainer"
            style="width: inherit; position: relative; flex-direction: column; min-width: inherit; margin-top: 10px;">
            <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">${historyTranslation.win_multiplier} x ${P}
            </div>
        </div>
    </div>                                
        `, 0 !== R)
                    for (let e = 0; e < R.length; e++) M += `
        <div id="payout-main-view"
            style="display: flex; justify-content: space-between; flex-direction: column; align-items: center; width: inherit; margin: auto;">
        <div style="width: 285px; height: 48px; align-self: start;">
                <div class="payoutContainer"
                    style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 0px;">
                    <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;">
                    <div class="base_white" style="transform-origin: left top; transform: scale(0.35);">
                    <span class="${(I=R[e]).name}_1 symbol_atlas"
                            style="transform-origin: left top;transform: scale(1);margin-top: -35px;margin-left: 103px;margin-left: 25px;"></span>
                            </div>
                    </div>
                    <div class="payoutDescContainer"
                        style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 5px;">
                        <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">${I.count_column} ${historyTranslation.of_a_kind}</div>
                        <div class="bottomDesc" style="font-size: 10px; color: rgba(255, 255, 255, 0.4);">${I.ways} ${historyTranslation.way_s}</div>
                    </div>
                    <div style="display: flex; flex-direction: column; justify-content: center; text-align: right; width: auto;"><span
                        style="font-size: 14px; line-height: 18px; color: rgb(204, 204, 204);">${I.win_multi}</span><span
                        style="font-size: 11px; line-height: 14px; color: rgb(156, 155, 155);">${I.win} x ${I.total_multi}</span></div>
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
                            <div id="tooltip-title" style="color: rgb(128, 128, 128); font-size: 12px; text-align: left; padding: 0px 8px;">
                                ${historyTranslation.calc_payout}
                            </div>
                            <div id="tooltip-desc" style="font-size: 12px; text-align: left; padding: 0px 8px;">${X} x ${Y} x ${I.payout} x ${I.ways} x ${I.total_multi}
                            </div>
                        </div>
                    </div>
            </div>
        </div>`;
                !S && 0 == R && 0 < pe && (M = `
        <div class="payoutContainer"
            style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
            <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                    class="${symbolScatter} symbol_atlas"
                    style="display: block; transform-origin: left top; transform: scale(0.3); margin-left: -2px; margin-top: -1px;"></span>
            </div>
            <div class="payoutDescContainer"
                style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${y}</div>
            </div>
            <div class="payoutTextContainer"
                style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${me} ${historyTranslation.free_spin_total}
                </div>
            </div>
        </div>
    ` + M), S && y > freeSpinRequired && 0 == R && (M += `<div class="payoutContainer"
                style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                        class="${symbolScatter} special_symbol_atlas "
                        style="display: block; transform-origin: left top; transform: scale(0.5); margin-left: -2px; margin-top: -22px;"></span>
                </div>
                <div class="payoutDescContainer"
                    style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                    <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${y}</div>
                </div>
                <div class="payoutTextContainer"
                    style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                    <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${ge} ${historyTranslation.free_spin_total}
                    </div>
                </div>
            </div>`), 0 == R && (M += `<div id="no-winning-combination-container"
                        style="display: flex; width: inherit; height: 48px; justify-content: center; align-items: center; margin: 0px auto;">
                        <div id="no-winning-combination-text" style="font-size: 14px; color: rgb(204, 204, 204);">${historyTranslation.no_win_combine}
                        </div>
                    </div>`);
                historyTranslation.Payout;
                x = parseInt(P), w = (P = (P = p[e].total_multi).toString()).slice(0, 1), A = P.slice(1, 2), b = (p[e].multi_list, ce.replace("{TOTALMULTI}", `<div id="multiplier_container"
        style="position: relative;align-self: center;height: 68px;width: 146px;margin-left: 29px;">
        <div class="history_img main_multiplier"
            style="position: absolute; width: inherit; height: inherit; transform: scale(0.5) translate(-70px, -52px); transform-origin: left top;">
        </div>
        <div id="light_multiplier" style="position: relative; width: 45px; height: 45px; margin: 0px auto;">
            <div id="multiplier_number_container"
                style="position: absolute; width: inherit; height: inherit; display: flex; flex-direction: row; transform-origin: left top; transform: scale(0.5) translate(0px, 24px);">
                <span class="history_img multi_x" style="transform: translate(-10px, 0px); z-index: 100;"></span><span
                    class="history_img multi_${w}" style="transform: translate(-53px, 0px); z-index: 100;"></span><span
                    class="history_img multi_${(A=x-1==0?'<span class="history_img multi_infinity" style="transform: translate(12px, 0px); z-index: 100;"></span>':`<span class="history_img multi_x" style="transform: translate(-10px, 0px); z-index: 100;"></span><span
                    class="history_img multi_${w-1}" style="transform: translate(-53px, 0px); z-index: 100;"></span><span
                    class="history_img multi_${A-1}" style="transform: translate(-96px, 0px); z-index: 100;"></span>`)-1}" style="transform: translate(-96px, 0px); z-index: 100;"></span></div>
        </div>
        <div id="dark_multiplier"
        style="position: relative; width: 45px; height: 45px; margin: 0px auto; opacity: 0.5; transform: translate(0px, -18px);">
        <div id="left_multiplier"
            style="position: absolute; height: 28px; width: 57px; transform: translate(-48px, 0px);">
            <div id="multiplier_number_container"
                style="position: absolute; width: inherit; height: inherit; display: flex; flex-direction: row; transform-origin: left top; transform: scale(0.5) translate(0px, 24px);">
                ` + A + `
            </div>
        </div>
        <div id="right_multiplier"
            style="position: absolute; height: 28px; width: 57px; transform: translate(48px, 0px);">
            <div id="multiplier_number_container"
                style="position: absolute; width: inherit; height: inherit; display: flex; flex-direction: row; transform-origin: left top; transform: scale(0.5) translate(0px, 24px);">
                <span class="history_img multi_x" style="transform: translate(-10px, 0px); z-index: 100;"></span><span
                    class="history_img multi_${x+1}" style="transform: translate(-53px, 0px); z-index: 100;"></span><span
                    class="history_img multi_${A-1}" style="transform: translate(-96px, 0px); z-index: 100;"></span></div>
        </div>
    </div>
</div>`)), E = "", E = "";
                for (let t = 0; t < 1 + ye; t++) {
                    var D = "";
                    for (let e = 1; e < v[t].length; e++) {
                        var O = v[t][e],
                            Ce = "symbol_1" == v[t][e] || "symbol_0" == v[t][e] ? "special_symbol_atlas" : "symbol_atlas",
                            Te = t + 6 * e + 1,
                            L = "_blank" == O ? "" : O.slice(-1),
                            Ge = 1 == L ? "base_gold" : "";
                        Se.includes(Te) ? D += `
    <div id="slot-item" style="width: 52px; height: 58px;">
    <span class="mahjong_static_sprites ${Ge}" style="margin-top : -5px; margin-left : -12px;display: block; position: absolute; transform-origin: left top; transform: scale(0.55);"></span>
    <span
    class="${O} ${Ce}"
    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.5) translate(-24px, -25px);"></span>
    <div id="win-highlight-item"><span class="history_assets wh_${1==L?"a":2==L?"b":3==L?"c":""}" style="display: block; position: absolute; transform-origin: left top; margin-top: -10px; margin-left: -10px; transform: scaleX(0.5) scaleY(0.47); z-index: 1;"></span></div>
    </div>
    
` : D += `
    <div id="slot-item" style="width: 52px; height: 58px;">
    <span class="mahjong_static_sprites ${Ge}" style="margin-top : -5px; margin-left : -12px;display: block; position: absolute; transform-origin: left top; transform: scale(0.55);"></span>
    <span
    class="${O} ${Ce}"
    style="display: block; position: absolute; transform-origin: left top; transform: scale(0.5) translate(-24px, -25px);"></span>
    </div>
`
                    }
                    E = E + `
    <div id="slot-item-column"
        style="width: 50px; height: 50px;">` + D + "</div>"
                }
                d += G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = (G = G.replace(a, "")).replace(o, "")).replace(F, "")).replace(B, "")).replace(N, "")).replace(V, "")).replace(U, "")).replace(j, b)).replace(n, T)).replace(r, C)).replace(n, T)).replace(r, C)).replace("{PAYOUT}", M)).replace("{BG_REEL}", _e)).replace("{SLOTCOLUMN}", E)).replace("{MULTIFREESPIN}", "")).replace("{MULTINORMALSPIN}", ""), console.log("slideContentList", d)
            }
        }
    }
    be.LogHistoryDetailTitle = be.SpinTitle[0];
    be.LogHistoryDetailDateHour = m + " " + f;
    be.LogHistoryDetailRoundTitle = "" != be.RoundTitle[0] ? be.RoundTitle[0] : null;
    e = (e = (e = (e = (e = e.replace("{LOG_TITLE}", be.SpinTitle[0])).replace("{Date}", m)).replace("{Time}", f)).replace("{GMT}", Ae)).replace(i, d);
    
    be.LogHistoryDetailTemplate = e;


    document.getElementById("game-shell").innerHTML = e;
    
    
    var currentSlide = 0;

    document.getElementById("game-details-right-arrow").addEventListener('click', function() {
        if (currentSlide < be.LogHistorySlideTotal - 1) {
            currentSlide++;

            document.getElementById("game-detail-spring-wrapper").style.transform = 'translate3d(-' + (currentSlide*100) + '%,0,0)';
        }
    });

    document.getElementById("game-details-left-arrow").addEventListener('click', function() {
        if (currentSlide > 0) {
            currentSlide--;

            document.getElementById("game-detail-spring-wrapper").style.transform = 'translate3d(-' + (currentSlide*100) + '%,0,0)';
        }
    });

    


</script>