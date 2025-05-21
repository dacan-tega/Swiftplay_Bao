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
    background-image: url(<?= $imageBaseUrl ?>19.png)
}

/* $CSS-16ff435713-13 */
.gh_theme_sprite {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>19.png)
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
    background-image: url(<?= $imageBaseUrl ?>25.png);
    background-repeat: no-repeat;
    background-size: 162px 112px;
    display: inline-block;
    overflow: hidden
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
    background-image: url(<?= $imageBaseUrl ?>20.png)
}



.history_number {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>22.png)
}

.b_0 {
    width: 38px;
    height: 48px;
    background-position: -1px -446px
}

.b_1 {
    width: 34px;
    height: 46px;
    background-position: -1px -157px
}

.b_2 {
    width: 36px;
    background-position: -41px -446px
}

.b_2,
.b_3 {
    height: 48px
}

.b_3 {
    width: 34px;
    background-position: -79px -446px
}

.b_4 {
    width: 36px;
    height: 46px;
    background-position: -37px -158px
}

.grey_3 {
    width: 25px;
    height: 36px;
    background-position: -1px -72px
}

.b_5 {
    width: 34px;
    height: 46px;
    background-position: -75px -158px
}

.b_x {
    height: 42px;
    background-position: -1px -113px
}

.b_x,
.g_8 {
    width: 36px
}

.g_8 {
    height: 48px;
    background-position: -39px -546px
}

.g_x {
    width: 36px;
    height: 42px;
    background-position: -39px -114px
}

.grey_0 {
    background-position: -57px -38px
}

.grey_0,
.grey_2 {
    width: 27px;
    height: 36px
}

.grey_2 {
    background-position: -86px -38px
}

.grey_5 {
    width: 25px;
    height: 35px;
    background-position: -1px -35px
}

.b_6 {
    background-position: -37px -206px
}

.b_6,
.b_7 {
    width: 36px;
    height: 46px
}

.b_7 {
    background-position: -75px -206px
}

.b_8 {
    height: 48px;
    background-position: -1px -496px
}

.b_8,
.b_9 {
    width: 36px
}

.b_9 {
    height: 46px;
    background-position: -37px -254px
}

.g_0 {
    width: 38px;
    background-position: -39px -496px
}

.g_0,
.g_3 {
    height: 48px
}

.g_3 {
    background-position: -79px -496px
}

.g_1,
.g_3 {
    width: 34px
}

.g_1 {
    height: 46px;
    background-position: -1px -205px
}

.g_2 {
    height: 48px;
    background-position: -1px -546px
}

.g_2,
.g_4 {
    width: 36px
}

.g_4 {
    background-position: -75px -254px
}

.g_4,
.g_5 {
    height: 46px
}

.g_5 {
    width: 34px;
    background-position: -1px -253px
}

.g_6 {
    background-position: -37px -302px
}

.g_6,
.g_7 {
    width: 36px;
    height: 46px
}

.g_7 {
    background-position: -75px -302px
}

.g_9 {
    width: 36px;
    height: 46px;
    background-position: -37px -350px
}

.grey_1 {
    width: 26px;
    height: 35px;
    background-position: -30px -1px
}

.grey_9 {
    width: 26px;
    height: 36px;
    background-position: -86px -76px
}

.grey_4 {
    width: 29px;
    height: 35px;
    background-position: -58px -1px
}

.grey_6 {
    width: 27px;
    height: 36px;
    background-position: -28px -75px
}

.grey_7 {
    width: 27px;
    height: 35px;
    background-position: -28px -38px
}

.grey_8 {
    width: 27px;
    height: 36px;
    background-position: -57px -76px
}

.r_9 {
    width: 36px;
    height: 46px;
    background-position: -77px -398px
}

.grey_x {
    width: 27px;
    height: 32px;
    background-position: -1px -1px
}

.r_0 {
    width: 38px;
    height: 48px;
    background-position: -1px -596px
}

.r_1 {
    width: 34px;
    height: 46px;
    background-position: -1px -301px
}

.r_2 {
    width: 36px;
    background-position: -77px -546px
}

.r_2,
.r_3 {
    height: 48px
}

.r_3 {
    width: 34px;
    background-position: -41px -596px
}

.r_x {
    width: 36px;
    height: 42px;
    background-position: -77px -114px
}

.r_5 {
    width: 34px;
    height: 46px;
    background-position: -1px -349px
}

.r_4 {
    background-position: -75px -350px
}

.r_4,
.r_6 {
    width: 36px;
    height: 46px
}

.r_6 {
    background-position: -1px -398px
}

.r_7 {
    height: 46px;
    background-position: -39px -398px
}

.r_7,
.r_8 {
    width: 36px
}

.r_8 {
    height: 48px;
    background-position: -77px -596px
}

.symbol_0_1 {
    height: 138px;
    width: 95px;
    background-position: -204px 17px;
}

.symbol_1_1 {
    height: 138px;
    width: 95px;
    background-position: -47px 19px;
}

.symbol_2_1 {
    height: 140px;
    width: 95px;
    background-position: -358px 16px;
}

.symbol_2_2 {
    height: 210px;
    width: 95px;
    background-position: -473px 16px;
}

.symbol_2_3 {
    height: 320px;
    width: 95px;
    background-position: -583px 15px;
}

.symbol_3_1 {
    height: 140px;
    width: 95px;
    background-position: -732px 16px;
}

.symbol_3_2 {
    height: 210px;
    width: 95px;
    background-position: -846px 16px;
}

.symbol_3_3 {
    height: 320px;
    width: 95px;
    background-position: -961px 16px;
}

.symbol_4_1 {
    height: 140px;
    width: 95px;
    background-position: -1109px 20px;
}

.symbol_4_2 {
    height: 210px;
    width: 95px;
    background-position: -1223px 16px;
}

.symbol_4_3 {
    height: 320px;
    width: 95px;
    background-position: -1333px 19px;
}

.symbol_5_1 {
    height: 140px;
    width: 95px;
    background-position: -1482px 15px;
}

.symbol_5_2 {
    height: 210px;
    width: 95px;
    background-position: -1598px 11px;
}

.symbol_5_3 {
    height: 320px;
    width: 95px;
    background-position: -1712px 8px;
}

.symbol_6_1 {
    height: 140px;
    width: 95px;
    background-position: -1853px 10px;
}

.symbol_6_2 {
    height: 210px;
    width: 95px;
    background-position: -1967px 11px;
}

.symbol_6_3 {
    height: 320px;
    width: 95px;
    background-position: -2081px 8px;
}

.symbol_7_1 {
    height: 140px;
    width: 95px;
    background-position: -2222px 13px;
}

.symbol_7_2 {
    height: 210px;
    width: 95px;
    background-position: -2334px 8px;
}

.symbol_7_3 {
    height: 320px;
    width: 95px;
    background-position: -2450px 11px;
}

.symbol_8_1 {
    height: 140px;
    width: 95px;
    background-position: -2589px 15px;
}

.symbol_8_2 {
    height: 210px;
    width: 95px;
    background-position: -2705px 10px;
}

.symbol_8_3 {
    height: 320px;
    width: 95px;
    background-position: -2818px 7px;
}

.symbol_9_1 {
    height: 140px;
    width: 95px;
    background-position: -2959px 15px;
}

.symbol_9_2 {
    height: 210px;
    width: 95px;
    background-position: -3076px 10px;
}

.symbol_9_3 {
    height: 320px;
    width: 95px;
    background-position: -3190px 9px;
}

.symbol_10_1 {
    height: 140px;
    width: 95px;
    background-position: -3329px 13px;
}

.symbol_10_2 {
    height: 210px;
    width: 95px;
    background-position: -3444px 10px;
}

.symbol_10_3 {
    height: 320px;
    width: 95px;
    background-position: -3558px 7px;
}


.wh {
    background-position: -1843px 7px;
    height: 95px;
    width: 95px
}


.special_symbol_atlas {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>23.png)
}

.symbol_1 {
    background-position: -1px -1px
}

.symbol_1,
.symbol_0 {
    height: 95px;
    width: 95px
}

.symbol_0 {
    background-position: -155px -1px
}


.history_assets {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>21.png)
}

.bg_bns {
    background-position: -1px -1px
}

.bg_bns,
.bg_main {
    width: 456px;
    height: 540px
}

.bg_main {
    background-position: -1px -543px
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
                                                            <div class="gh-arrow "
                                                                style="transform: translate(0px, 0px); background-color: rgb(255, 196, 36);">
                                                            </div>
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
                                                                                    style="display: flex;position: relative;height: 265px;width: 300px;margin: auto 39px 10px;flex-direction: column;">
                                                                                    <div id="reel_background"
                                                                                        style="display: flex; position: relative; height: 300px;width: 300px; margin: auto auto 10px; flex-direction: column;">
                                                                                        <div id="background-item"
                                                                                            style="">
                                                                                            <span
                                                                                                class="history_assets {BG_REEL}"
                                                                                                style="display: block; position: absolute; transform-origin: left top; transform: scaleX(0.505) scaleY(0.485); top: -12px; left: -8px; z-index: 0; margin-top: 19px; margin-left: 31px;"></span>
                                                                                        </div>
																						
                                                                                    </div>
																					
																				<!---START__SHOW_MULTI---->
																					{TOTALMULTI}
																				<!---END__SHOW_MULTI---->
																					<span class="history_bg bg_main"
    style="display: flex;position: relative;height: 300px;width: 300px;margin: auto auto 10px;flex-direction: column;margin-top: -6px;"></span>
                                                                                    
																					<div id="symbols-container"
                                                                                        style="position: relative; min-width: 38.25px; width: 38.25px; height: inherit; display: flex; flex-direction: row; margin-top: auto; margin-bottom: auto;margin-left: 33px;">																						
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
																						<span class="glow ui_atlas" style="display: flex; position: relative; height: 300px;width: 300px; margin: auto auto 10px; flex-direction: column; margin-top: -6.3px; margin-left: -4.5px;"></span>   
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
        Ze = 0 != oo ? aa.slice(0, -2) + ":" + aa.slice(-2) : aa.slice(0, 4) + aa.slice(5, 6) + ":" + aa.slice(-2);
    
    e = (e = (e = (e = (e = e.replaceAll(/{CurrencyPrefix}/g, be.CurrencyPrefix)).replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction)).replace(/{Profit_Title}/g, historyTranslation.Profit)).replace("{Calc_payout}", historyTranslation.Calc_payout)).replace("{Payout_Title}", historyTranslation.Payout);
    
    const t = "(.|\n|s|S)*?",
        s = /(-xx5-)(.*?)(-x5-)/gm,
        i = new RegExp("\x3c!---START_SLIDE_ITEM----\x3e" + t + "\x3c!---END_SLIDE_ITEM----\x3e", "i"),
        n = new RegExp("\x3c!---START_BET_INFO----\x3e" + t + "\x3c!---END_BET_INFO----\x3e", "i"),
        r = new RegExp("\x3c!---START_TRANS_ITEM----\x3e" + t + "\x3c!---END_TRANS_ITEM----\x3e", "i"),
        a = new RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e" + t + "\x3c!---END__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e", "i"),
        o = new RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM----\x3e" + t + "\x3c!---END__CHANGE_CSS_SLOT_ITEM----\x3e", "i"),
        l = new RegExp("\x3c!---START__BG_SYMBOL_WIN----\x3e" + t + "\x3c!---END__BG_SYMBOL_WIN----\x3e", "i"),
        h = new RegExp("\x3c!---START__SYMBOL_WIN----\x3e" + t + "\x3c!---END__SYMBOL_WIN----\x3e", "i"),
        c = new RegExp("\x3c!---START__SYMBOL_NORMAL----\x3e" + t + "\x3c!---END__SYMBOL_NORMAL----\x3e", "i"),
        N = new RegExp("\x3c!---START__FRAM__SYMBOL----\x3e" + t + "\x3c!---END__FRAM__SYMBOL----\x3e", "i"),
        F = new RegExp("\x3c!---START__MULTI_TOP----\x3e" + t + "\x3c!---END__MULTI_TOP----\x3e", "i"),
        B = (new RegExp("\x3c!---START__MULTI_BOT----\x3e" + t + "\x3c!---END__MULTI_BOT----\x3e", "i"), new RegExp("\x3c!---START__MULTI_TOP_WIN----\x3e" + t + "\x3c!---END__MULTI_TOP_WIN----\x3e", "i")),
        k = new RegExp("\x3c!---START__MULTI_TOP_NORMAL----\x3e" + t + "\x3c!---END__MULTI_TOP_NORMAL----\x3e", "i"),
        W = new RegExp("\x3c!---START__MULTI_BOT_NORMAL----\x3e" + t + "\x3c!---END__MULTI_bOT_NORMAL----\x3e", "i"),
        V = new RegExp("\x3c!---START__SHOW_MULTI----\x3e" + t + "\x3c!---END__SHOW_MULTI----\x3e", "i");
    var U = xe.res_data,
        H = xe.bet_size,
        j = xe.bet_level,
        u = 0;
    const _ = e.match(i),
        $ = e.match(n),
        X = e.match(r),
        Y = e.match(a),
        z = e.match(o),
        J = e.match(l),
        q = e.match(c),
        K = e.match(h),
        Z = (e.match(N), e.match(B)),
        Q = e.match(k),
        ee = e.match(W),
        te = e.match(F),
        se = e.match(W),
        ie = e.match(V);
    if (_) {
        JSON.parse(JSON.stringify(_[0]));
        var ne = JSON.parse(JSON.stringify(_[0])),
            d = (JSON.parse(JSON.stringify(Y[0])), JSON.parse(JSON.stringify(z[0])), JSON.parse(JSON.stringify(J[0])), JSON.parse(JSON.stringify(q[0]))),
            p = (JSON.parse(JSON.stringify(K[0])), JSON.parse(JSON.stringify(K[0]))),
            g = JSON.parse(JSON.stringify(Z[0])),
            re = JSON.parse(JSON.stringify(Q[0])),
            ae = JSON.parse(JSON.stringify(ee[0])),
            oe = (JSON.parse(JSON.stringify(te[0])), JSON.parse(JSON.stringify(ie[0]))),
            p = /(-xx1-)(.*?)(-x1-)/gm.exec(p),
            p = (null != p && p[2], /(-xx2-)(.*?)(-x2-)/gm.exec(d)),
            d = (null != p && p[2], /(-xx3-)(.*?)(-x3-)/gm.exec(g)),
            p = (null != d && d[2], /(-xx4-)(.*?)(-x4-)/gm.exec(re)),
            g = (null != p && p[2], s.exec(ae));
        null != g && g[2];
        null != (g = s.exec(ae)) && g[2];
        var m = "";
        for (let e = 0; e < U.length; e++) {
            JSON.parse(JSON.stringify(te[0])), JSON.parse(JSON.stringify(se[0]));
            var f = U[e].result_json,
                le = f.length,
                S = f.length - 1,
                y = (f[S].total_freespin, f[S].spin_date),
                C = f[S].spin_hour,
                T = f[S].free_spin,
                he = T ? "bg_free" : "bg_main",
                ce = (f[S].free_num, f[S].transaction),
                ue = f[S].free_num,
                G = f[S].count_scatter,
                _e = f[S].freespin_more,
                de = f[S].free_num;
            f[S].mutilply;
            for (let e = 0; e < le; e++) {
                var I = JSON.parse(JSON.stringify(X[0])),
                    x = JSON.parse(JSON.stringify($[0])),
                    b = JSON.parse(JSON.stringify(ne));
                const Ge = 360 * u;
                u++, be.LogHistorySlideTotal = u;
                var A, v = f[e].round_title,
                    b = b.replace("{LEFT}", Ge + "px"),
                    pe = (x = (x = (x = (x = x.replace("{Bet_Level_Title}", historyTranslation.Bet_Level)).replaceAll(/{Bet__Size_Title}/g, historyTranslation.Bet_Size)).replace("{LEVEL}", j)).replace("{SIZE}", be.formatMoney(H, 2, be.CurrencyDecimal, be.CurrencyThousand)), x = "" != v ? (x = x.replace("{SPACE}", `<div id="separator"
            style="width: 2px; height: 12px; margin-left: 10px; margin-right: 10px; background-color: rgb(40, 40, 51);">
            </div>`)).replace("{Round_Title}", v) : (x = x.replace("{Round_Title}", "")).replace("{SPACE}", ""), f[e].profit),
                    ge = f[e].bet_amount,
                    me = f[e].credit,
                    R = f[e].new_reel,
                    fe = f[e].drop_position,
                    Se = (void 0 === f[e].symbol_win || f[e].symbol_win, R.length - 1),
                    P = f[e].win_drop,
                    ye = f[e].total_multi,
                    E = f[e].spin_title,
                    w = (be.SpinTitle.push(E), be.RoundTitle.push(v), be.LogHistoryDetailResult.push({
                        spin_title: E,
                        date: y,
                        hour: C
                    }), ""),
                    M = "";
                if (I = (I = (I = (I = (I = (I = (I = (I = I.replace("{Transaction}", ce)).replace("{TotalBet}", be.formatMoney(ge, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace("{Profit}", be.formatMoney(pe, 2, be.CurrencyDecimal, be.CurrencyThousand))).replace("{Balance}", be.formatMoney(me, 2, be.CurrencyDecimal, be.CurrencyThousand))).replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction)).replaceAll(/{Bet_Title}/g, historyTranslation.Bet)).replace(/{Profit_Title}/g, historyTranslation.Profit)).replace("{Balance_Title}", historyTranslation.Balance), M += `
    <div class="payoutContainer"
        style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
        <div class="payoutDescContainer"
            style="width: 0px; position: relative; flex-direction: column; min-width: 0px; margin-top: 10px;"></div>
        <div class="payoutTextContainer"
            style="width: inherit; position: relative; flex-direction: column; min-width: inherit; margin-top: 10px;">
            <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">${historyTranslation.win_multiplier} x ${ye}
            </div>
        </div>
    </div>                                
        `, 0 !== P)
                    for (let e = 0; e < P.length; e++) M += `
        <div id="payout-main-view"
            style="display: flex; justify-content: space-between; flex-direction: column; align-items: center; width: inherit; margin: auto;">
        <div style="width: 285px; height: 48px; align-self: start;">
                <div class="payoutContainer"
                    style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 0px;">
                    <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;">
                    <span class="${(A=P[e]).name}_1 symbol_atlas"
                            style="display: block; transform-origin: left top; transform: scale(0.5); margin-left: 20px; margin-top: -22px;"></span>
                            </div>
                    <div class="payoutDescContainer"
                        style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 5px;">
                        <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">${A.count_column} ${historyTranslation.of_a_kind}</div>
                        <div class="bottomDesc" style="font-size: 10px; color: rgba(255, 255, 255, 0.4);">${A.ways} ${historyTranslation.way_s}</div>
                    </div>
                    <div style="display: flex; flex-direction: column; justify-content: center; text-align: right; width: auto;"><span
                        style="font-size: 14px; line-height: 18px; color: rgb(204, 204, 204);">${A.win_multi}</span><span
                        style="font-size: 11px; line-height: 14px; color: rgb(156, 155, 155);">${A.win} x ${A.total_multi}</span></div>
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
                            <div id="tooltip-desc" style="font-size: 12px; text-align: left; padding: 0px 8px;">${H} x ${j} x ${A.payout} x ${A.ways} x ${A.total_multi}
                            </div>
                        </div>
                    </div>
            </div>
        </div>`;
                !T && 0 == P && 0 < ue && (M = `
        <div class="payoutContainer"
            style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
            <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                    class="${symbolScatter} symbol_atlas"
                    style="display: block; transform-origin: left top; transform: scale(0.3); margin-left: -2px; margin-top: -1px;"></span>
            </div>
            <div class="payoutDescContainer"
                style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${G}</div>
            </div>
            <div class="payoutTextContainer"
                style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${de} ${historyTranslation.free_spin_total}
                </div>
            </div>
        </div>
    ` + M), T && G > freeSpinRequired && 0 == P && (M += `<div class="payoutContainer"
                style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                        class="${symbolScatter} special_symbol_atlas "
                        style="display: block; transform-origin: left top; transform: scale(0.5); margin-left: -2px; margin-top: -22px;"></span>
                </div>
                <div class="payoutDescContainer"
                    style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                    <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${G}</div>
                </div>
                <div class="payoutTextContainer"
                    style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                    <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${_e} ${historyTranslation.free_spin_total}
                    </div>
                </div>
            </div>`), 0 == P && (M += `<div id="no-winning-combination-container"
                        style="display: flex; width: inherit; height: 48px; justify-content: center; align-items: center; margin: 0px auto;">
                        <div id="no-winning-combination-text" style="font-size: 14px; color: rgb(204, 204, 204);">${historyTranslation.no_win_combine}
                        </div>
                    </div>`);
                historyTranslation.Payout, v = `
    <div class="multiplier container" style="margin-top: -8px; height: 80px;position: relative;left :-14px;top: 192px">
        <div class="r mult num container"
            style="display: flex; justify-content: center; flex-direction: row; position: absolute; transform: scale(0.65) translate(100px, 18px) rotateZ(5deg);">
            <div class="r mult num scale holder">
                <div class="history_number r_x"
                    style="transform-origin: center top; align-self: center; transform: scale(0.9); margin-top: 15px; margin-right: -20px; width: 45px;">
                </div>
                <div class="history_number r_${f[e].multi_fire||""}"
                    style="transform-origin: center top; align-self: center; width: 45px; margin-left: 0px;"></div>
            </div>
        </div>
        <div class="b mult num container"
            style="display: flex; justify-content: center; flex-direction: row; position: absolute; transform: scale(0.65) translate(185px, 18px);">
            <div class="b mult num scale holder">
                <div class="history_number b_x"
                    style="transform-origin: center top; align-self: center; transform: scale(0.9); margin-top: 15px; margin-right: -20px; width: 45px;">
                </div>
                <div class="history_number b_${f[e].multi_ice||""}"
                    style="transform-origin: center top; align-self: center; width: 45px; margin-left: 0px;"></div>
            </div>
        </div>
        <div class="g mult num container"
            style="display: flex; justify-content: center; flex-direction: row; position: absolute; transform: scale(0.65) translate(268px, 16px) rotateZ(-4deg);">
            <div class="g mult num scale holder">
                <div class="history_number g_x"
                    style="transform-origin: center top; align-self: center; transform: scale(0.9); margin-top: 15px; margin-right: -20px; width: 45px;">
                </div>
                <div class="history_number g_${f[e].multi_leaf||""}"
                    style="transform-origin: center top; align-self: center; width: 45px; margin-left: 0px;"></div>
            </div>
        </div>
    </div>
    `;
                E = oe.replace("{TOTALMULTI}", v), w = "";
                for (let t = 0; t < 1 + Se; t++) {
                    var O = "";
                    for (let e = 0; e < R[t].length; e++) {
                        var D = R[t][e],
                            Ce = "symbol_1" == R[t][e] || "symbol_0" == R[t][e] ? "special_symbol_atlas" : "symbol_atlas",
                            Te = t + 6 * e + 1,
                            L = "_blank" == D ? "" : D.slice(-1);
                        fe.includes(Te) ? O += `
    <div id="slot-item" style="width: 36px; height: 36px;"><span
    class="${D} ${Ce}"
    style="display: block; position: absolute; transform-origin: left top; margin-top: -10px; margin-left: -10px; transform: scaleX(0.5) scaleY(0.5); z-index: 1;"></span>
    <div id="win-highlight-item"><span class="history_assets wh_${1==L?"a":2==L?"b":3==L?"c":""}" style="display: block; position: absolute; transform-origin: left top; margin-top: -10px; margin-left: -10px; transform: scaleX(0.5) scaleY(0.47); z-index: 1;"></span></div>
    </div>
    
        ` : O += `
    <div id="slot-item" style="width: 36px; height: 36px;"><span
    class="${D} ${Ce}"
    style="display: block; position: absolute; transform-origin: left top; margin-top: -10px; margin-left: -10px; transform: scaleX(0.5) scaleY(0.5); z-index: 1;"></span>
    </div>
        `
                    }
                    w = w + `
    <div id="slot-item-column"
        style="position: relative; min-width: 38.25px; width: 38.25px; height: inherit; display: flex; flex-direction: column; margin-top: auto; margin-bottom: auto;">` + O + "</div>"
                }
                m += b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = (b = b.replace(a, "")).replace(o, "")).replace(l, "")).replace(c, "")).replace(h, "")).replace(B, "")).replace(k, "")).replace(V, E)).replace(n, x)).replace(r, I)).replace(n, x)).replace(r, I)).replace("{PAYOUT}", M)).replace("{BG_REEL}", he)).replace("{SLOTCOLUMN}", w)).replace("{MULTIFREESPIN}", "")).replace("{MULTINORMALSPIN}", ""), console.log("slideContentList", m)
            }
        }
    }
    be.LogHistoryDetailTitle = be.SpinTitle[0], be.LogHistoryDetailDateHour = y + " " + C, be.LogHistoryDetailRoundTitle = "" != be.RoundTitle[0] ? be.RoundTitle[0] : null, e = (e = (e = (e = (e = e.replace("{LOG_TITLE}", be.SpinTitle[0])).replace("{Date}", y)).replace("{Time}", C)).replace("{GMT}", Ze)).replace(i, m), console.log("detailTemplate", e), be.LogHistoryDetailTemplate = e;
    document.getElementById("game-shell").innerHTML = e;
    
    var currentSlide = 0;

    document.getElementById("game-details-right-arrow").addEventListener('click', function() {
        if (currentSlide < bbbe.LogHistorySlideTotal - 1) {
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
