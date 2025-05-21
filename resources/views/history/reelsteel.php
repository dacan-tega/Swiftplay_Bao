<?php
$imageBaseUrl = "/games/".$game_folder."/";
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

    .special_symbol_atlas {
    background-image: url(<?= $imageBaseUrl ?>20.png);
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.symbol_s_0_1 {
    background-position: -1px -1px
}

.symbol_s_0_1,
.symbol_s_1_1 {
    height: 152px;
    width: 152px
}

.symbol_s_1_1 {
    background-position: -1px -155px
}

.symbol_s_1_2 {
    background-position: -1px -309px;
    height: 152px;
    width: 152px
}

.symbol_s_1_3 {
    background-position: -155px -1px;
    height: 152px;
    width: 152px
}

.symbol_s_1_4 {
    background-position: -155px -155px;
    height: 152px;
    width: 152px
}

.symbol_atlas {
    background-image: url(<?= $imageBaseUrl ?>21.png);
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.mtc_symbol_sprite {
    background-image: url(<?= $imageBaseUrl ?>21.png);
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.symbol_n_3_1 {
    background-position: -1px -1px
}

.symbol_n_3_1,
.symbol_n_2_1 {
    height: 152px;
    width: 152px
}

.symbol_n_2_1 {
    background-position: -1px -155px
}

.symbol_n_5_1 {
    background-position: -1px -309px
}

.symbol_n_5_1,
.symbol_n_4_1 {
    height: 152px;
    width: 152px
}

.symbol_n_4_1 {
    background-position: -1px -463px
}

.symbol_n_6_1 {
    background-position: -155px -1px
}

.symbol_n_6_1,
.symbol_n_9_1 {
    height: 152px;
    width: 152px
}

.symbol_n_9_1 {
    background-position: -309px -1px
}

.symbol_n_7_1 {
    background-position: -463px -1px
}

.symbol_n_7_1,
.symbol_n_8_1 {
    height: 152px;
    width: 152px
}

.symbol_n_8_1 {
    background-position: -155px -155px
}

.symbol_n_0_1 {
    background-position: -155px -309px
}

.symbol_n_0_1,
.symbol_n_1_1 {
    height: 152px;
    width: 152px
}

.symbol_n_1_1 {
    background-position: -155px -463px
}


.payline {
    background-image: url(<?= $imageBaseUrl ?>23.png);
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.pl1 {
    background-position: -1px -1px;
    height: 48px;
    width: 76px
}

.pl2 {
    background-position: -79px -1px;
    height: 48px;
    width: 76px
}

.pl3 {
    background-position: -157px -1px;
    height: 48px;
    width: 76px
}

.pl4 {
    background-position: -235px -1px;
    height: 48px;
    width: 76px
}

.pl5 {
    background-position: -313px -1px;
    height: 48px;
    width: 76px
}

.pl6 {
    background-position: -391px -1px;
    height: 48px;
    width: 76px
}

.pl7 {
    background-position: -469px -1px;
    height: 48px;
    width: 76px
}

.pl8 {
    background-position: -547px -1px;
    height: 48px;
    width: 76px
}

.pl9 {
    background-position: -625px -1px;
    height: 48px;
    width: 76px
}

.pl10 {
    background-position: -703px -1px;
    height: 48px;
    width: 76px
}

.pl11 {
    background-position: -781px -1px;
    height: 48px;
    width: 76px
}

.pl12 {
    background-position: -859px -1px;
    height: 48px;
    width: 76px
}

.pl13 {
    background-position: -937px -1px;
    height: 48px;
    width: 76px
}

.pl14 {
    background-position: -1015px -1px;
    height: 48px;
    width: 76px
}

.pl15 {
    background-position: -1093px -1px;
    height: 48px;
    width: 76px
}

.pl16 {
    background-position: -1171px -1px;
    height: 48px;
    width: 76px
}

.pl17 {
    background-position: -1249px -1px;
    height: 48px;
    width: 76px
}

.pl18 {
    background-position: -1327px -1px;
    height: 48px;
    width: 76px
}

.pl19 {
    background-position: -1405px -1px;
    height: 48px;
    width: 76px
}

.pl20 {
    background-position: -1483px -1px;
    height: 48px;
    width: 76px
}

.mtc_general_sprite {
    background-image: url(<?= $imageBaseUrl ?>22.png);
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.Bonus_Reel {
    background-position: -1px -1px
}

.Bonus_Reel,
.bg_main {
    height: 642px;
    width: 900px
}

.bg_main {
    background-position: -1px -645px
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
<div id="game-shell" class="game-shell" style="font-family: PingFang SC, Microsoft YaHei, WenQuanYi Micro Hei, sans-serif;">
    <div id="game-overlay">
        <div id="game-history-container" style="overflow: hidden; visibility: visible; height: 640px; width: 360px; transform: scale(1); position: relative; z-index: 0;">
            <div id="container-view" style="overflow: hidden;">
                <div style="top: 0%; left: 0px; position: absolute; width: inherit; height: inherit;">
                    <div id="game-list-view" class="game-list-view-container" style="background-color: rgb(48, 48, 59);">
                        <div id="game-list-view-wrapper" style="flex-direction: column;">
                            <div style="left: 0%; top: 0px; position: absolute; width: inherit; height: inherit; z-index: 0;">
                                <div id="game-details-view-container" style="background-color: rgb(48, 48, 59); color: rgba(255, 255, 255, 0.6); overflow: hidden; -webkit-font-smoothing: antialiased;">
                                    <div id="game-detail-view-navbar-container" class="" style="height: 62px; padding-top: 0px; background-color: rgb(36, 36, 46);">
                                        <div style="position: absolute; z-index: 4; height: inherit; width: inherit;">
                                            <div id="game-list-nav" style="background-color: rgb(36, 36, 46);">
                                                <div id="game-list-nav-bar" class="game-list-nav-bar-vertical" style="height: calc(100% - 2px);">
                                                    <div class="game-list-nav-image-container game-list-nav-image-container-slot">
                                                        <div id="game-list-nav-image-left" class="game-list-nav-image " style="transform: scale(0.7);">
                                                        </div>
                                                    </div>
                                                    <div id="game-list-nav-label-container" class="game-list-nav-label-container-vertical ">
                                                        <div class="game-list-nav-row-container ">
                                                            <div id="game-free-spin-nav-label-wrapper" style="width: 84px;">
                                                                <div id="game-free-spin-nav-label" class="title-top" style="color: rgb(180, 104, 80);">{LOG_TITLE}</div>
                                                            </div>
                                                        </div>
                                                        <div class="game-list-nav-subtitle-label" style="color: rgba(255, 255, 255, 0.4);" class="date-time">{Date} {Time}
                                                            ({GMT})</div>
                                                    </div>
                                                    <div class="game-list-nav-image-container game-list-nav-image-container-slot">
                                                        <div id="game-list-nav-image-right" class="game-list-nav-image" style="display: none;">
                                                            <div class="exit-icon vertical">
                                                                <div class="exit-icon-stroke exit-icon-stroke-one exit-icon-stroke-vertical" style="background-color: rgba(255, 255, 255, 0.6);"></div>
                                                                <div class="exit-icon-stroke exit-icon-stroke-two exit-icon-stroke-vertical" style="background-color: rgba(255, 255, 255, 0.6);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="game-list-nav-separator-vertical-slot" style="background-color: rgb(48, 48, 60);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="game-detail-spring-wrapper" style="position: absolute; height: 578px; transform: translate3d(0px, 0px, 0px);">
                                        <div id="game-details-page-container" style="height: 578px;">
                                            <div id="game-pages-window" style="position: relative;">
                                                <!---START_SLIDE_ITEM---->
                                                <div class="game-list-page" style="width: 100%; height: 578px; position: absolute; left: 0px; left: {LEFT};">
                                                    <div class="reset">
                                                        <!---START_TRANS_ITEM---->
                                                        <div id="transaction-details-container" style="display: flex; width: inherit; height: 50px; margin: 0px auto; justify-content: center; align-items: center; background-color: rgb(36, 36, 46);">
                                                            <div class="transaction-detail-item" style="display: flex; flex-direction: column; align-items: center; width: 27%;">
                                                                <div id="detail-item-holder" style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Transaction-item-value" style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">{Transaction}</div>
                                                                </div>
                                                                <div id="Transaction-item-key" style="text-align: center; font-size: 11px; color: rgb(180, 104, 80);">{Transaction_Title}</div>
                                                            </div>
                                                            <div class="transaction-detail-item" style="display: flex; flex-direction: column; align-items: center; width: 18%; margin-left: 10px;">
                                                                <div id="detail-item-holder" style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Bet(Rp)-item-value" style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">{TotalBet}</div>
                                                                </div>
                                                                <div id="Bet(Rp)-item-key" style="text-align: center; font-size: 11px; color: rgb(180, 104, 80);">{Bet_Title}({CurrencyPrefix})</div>
                                                            </div>
                                                            <div class="transaction-detail-item" style="display: flex; flex-direction: column; align-items: center; width: 20%; margin-left: 10px;">
                                                                <div id="detail-item-holder" style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Profit(Rp)-item-value" style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">{Profit}</div>
                                                                </div>
                                                                <div id="Profit(Rp)-item-key" style="text-align: center; font-size: 11px; color: rgb(180, 104, 80);">{Profit_Title}({CurrencyPrefix})</div>
                                                            </div>
                                                            <div class="transaction-detail-item" style="display: flex; flex-direction: column; align-items: center; width: 27%; margin-left: 10px;">
                                                                <div id="detail-item-holder" style="height: 23px; display: flex; justify-content: center; align-items: center;">
                                                                    <div id="Balance(Rp)-item-value" style="text-align: center; display: inline-table; color: rgba(255, 255, 255, 0.6); font-size: 9px; line-height: 12px;">{Balance}</div>
                                                                </div>
                                                                <div id="Balance(Rp)-item-key" style="text-align: center; font-size: 11px; color: rgb(180, 104, 80);">{Balance_Title}({CurrencyPrefix})</div>
                                                            </div>
                                                        </div>
                                                        <!---END_TRANS_ITEM---->
                                                        <div class="history regular" style="width: inherit; height: 528px;">
                                                            <div class="rcs-custom-scroll " style="height: inherit;">
                                                                <div class="rcs-outer-container" style="height: 100%;">
                                                                    <div class="rcs-inner-container scroller" style="height: 100%; margin-right: -17px;">
                                                                        <div class="scroller" style="height: 100%; overflow-y: visible; margin-right: 0px;">
                                                                            <div id="bet-details-container" style="display: flex; flex-direction: column;">
                                                                                <!---START_BET_INFO---->
                                                                                <div id="bet-information-container" style="display: flex; width: inherit; height: 50px; margin: 0px auto 5px; justify-content: center; align-items: center; padding-left: 10px; padding-right: 10px;">
                                                                                    <div id="bet-size-label" style="font-size: 11px; text-align: center; word-break: break-word; color: rgba(255, 255, 255, 0.4);">{Bet__Size_Title} {SIZE}</div>
                                                                                    <div id="separator" style="width: 2px; height: 12px; margin-left: 10px; margin-right: 10px; background-color: rgb(40, 40, 51);"></div>
                                                                                    <div id="bet-level-label" style="font-size: 11px; text-align: center; word-break: break-word; color: rgba(255, 255, 255, 0.4);">{Bet_Level_Title} {LEVEL}</div>
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
                                                                                <!---START__SHOW_MULTI---->
                                                                                <div id="hy-bet-information-container" style="display: flex; width: inherit; height: 50px; margin: 0px auto; justify-content: center; align-items: center;">
                                                                                    <div id="multiplier-label" style="display: flex; align-items: center; font-size: 11px; color: rgba(255, 255, 255, 0.4);">Multiplier {TOTALMULTI}</div>
                                                                                </div>
                                                                                <!---END__SHOW_MULTI---->
                                                                                <div id="background-container" style="position: relative; margin: 0px auto;">
                                                                                    <div id="reel_background" style="position: absolute; display: flex; flex-direction: column; align-items: center; margin-top: -23px; margin-left: -4px;">
                                                                                        <div id="slot-reel-back" style="position: relative; z-index: 0;">
                                                                                            <span class="mtc_general_sprite {BG_REEL}" style="display: block; position: absolute; transform-origin: left top; transform: scale(0.333, 0.333);"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="symbols-container" style="display: flex; align-items: center; position: relative; width: 306px; height: 240px;margin-top: -40px">
                                                                                        <!---START_TEMPLATE_BODY---->
                                                                                        {SLOTCOLUMN}
																						
																						
                                                                                        <!---START__SYMBOL_NORMAL---->
                                                                                        <span class="Symbol_4_1 symbol_atlas" style="-xx2-transform-origin: left top; position: absolute; transform: scale(0.5); z-index: 2;-x2-"></span>
                                                                                        <!---END__SYMBOL_NORMAL---->
                                                                                        <!---START__SYMBOL_WIN---->
                                                                                        <span class="Symbol_3_1 symbol_atlas" style="-xx1-transform-origin: left top; position: absolute; transform: scale(0.5); z-index: 2;;-x1-"></span>
                                                                                        <!---END__SYMBOL_WIN---->
                                                                                        <!---START__BG_SYMBOL_WIN---->
                                                                                        <span class="symbol_atlas wh" style="display: block; position: absolute; transform-origin: left top; transform: scale(0.47); left: 0%; margin-top: 1px; margin-left: 5px;"></span>
                                                                                        <!---END__BG_SYMBOL_WIN---->
                                                                                        <!---START__CHANGE_CSS_SLOT_ITEM_COLUMN---->
                                                                                        <div id="slot-item-column" style="display: flex; flex-direction: column;">
                                                                                            <!---END__CHANGE_CSS_SLOT_ITEM_COLUMN---->
                                                                                            <!---START__CHANGE_CSS_SLOT_ITEM---->
                                                                                            <div id="slot-item" style="position: relative; width: 55px; height: 67px; border-spacing: 0px;">
                                                                                            <!---END__CHANGE_CSS_SLOT_ITEM---->
                                                                                            <!---END_SAMBLE_BLOCK---->
                                                                                            </div>
                                                                                        </div>
                                                                                        <!---START__MULTI_BOT---->
                                                                                        <div id="background-item" style="width: 290px; height: 30px;">
                                                                                            <span class="mtp_main history_assets" style="display: block; position: relative; transform-origin: left top; left: 54%; bottom: 270%; transform: scale(0.45); z-index: 10;">
                                                                                                <div id="Mtp-Num-Bottom-Container" style="display: flex; justify-content: center; position: relative; left: 3%; top: 25%; width: 115px; height: 70px; overflow: hidden; border-radius: 40%;">{MULTINORMALSPIN}
                                                                                    </div>
                                                                                            </span>
                                                                                        </div>
                                                                                        <!---END__MULTI_BOT---->
                                                                                        <!---START__MULTI_BOT_NORMAL---->
                                                                                        <div class="mul_x${multiArr[c]} history_assets" style="-xx5- flex: 0 0 auto; object-fit: cover; transform: scale(1); margin: 0px 2px;-x5-"></div>
                                                                                        <!---END__MULTI_bOT_NORMAL---->
                                                                                        <div id="payout-title-container" style="display: flex; width: inherit; height: 32px; justify-content: center; align-items: center; margin: 0px auto;">
                                                                                            <div class="line" style="width: 120px; background-color: rgb(40, 40, 51); height: 2px;"></div>
                                                                                            <div id="payout-text" style="text-align: center; width: 72px; font-size: 11px; color: rgb(156, 155, 155);">{Payout_Title}</div>
                                                                                            <div class="line" style="width: 120px; background-color: rgb(40, 40, 51); height: 2px;"></div>
                                                                                        </div>
                                                                                        <div style="display: flex; flex-flow: column wrap; width: 270px; margin: auto;">
                                                                                            <!---START_PAYOUT_INFO---->
                                                                                            <div style="display: flex; flex-flow: column wrap; width: 270px; margin: auto;">{PAYOUT}
																					</div>
                                                                                            <!---END_PAYOUT_INFO---->
                                                                                            <!---START__SPECIAL__PAYOUT---->
                                                                                            <div id="shoot-sun-feature-container" style="display: flex; width: inherit; height: 48px; align-items: center;">
                                                                                                <div class="shoot-sun-desc-wrapper" style="display: flex; flex-direction: column; flex: 1 1 auto; text-align: left; font-size: 14px; color: rgb(204, 204, 204);">
                                                                                                    <label>Arkom Feature</label>
                                                                                                    <label style="font-size: 11px; color: rgb(156, 155, 155);">No symbol
																								transformed</label>
                                                                                                </div>
                                                                                                <div style="width: 50px; height: 45px;">
                                                                                                    <span class="hy-dynamic-symbols-sprite symbol_1_1" style="transform-origin: left top; transform: scale(0.25) translate(-8px, -22px);"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!---END__SPECIAL__PAYOUT---->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="game-detail-padding" style="width: inherit; height: 86px;"></div>
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
                                                    <div class="gh-angle-horizontal angle-left" style="border-color: rgb(247, 186, 101);"></div>
                                                </div>
                                            </div>
                                            <div id="game-details-right-arrow">
                                                <div class="gh-angle-wrapper" style="transform: translateX(-4px) scale(0.7);">
                                                    <div class="gh-angle-horizontal angle-right" style="border-color: rgb(247, 186, 101);"></div>
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
    </div>
</div>

<?php
$remoteData = [
    'res_data' => $res_data,
    'bet_size' => $bet_size,
    'bet_level' => $bet_level,
    'game_name' => $game_name,
    'symbol_special_0' => $symbol_special_0,
    'symbol_special_1' => $symbol_special_1,
    'symbol_special' => $symbol_special,
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

    let c = (new Date).toTimeString().split(" ")[1];
    let h = 0 != c.charAt(4) ? c.slice(0, -2) + ":" + c.slice(-2) : c.slice(0, 4) + c.slice(5, 6) + ":" + c.slice(-2);

    var p = e;
    p = p.replaceAll(/{CurrencyPrefix}/g, be.CurrencyPrefix);
    p = p.replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction);
    p = p.replace(/{Profit_Title}/g, historyTranslation.Profit);
    p = p.replace("{Calc_payout}", historyTranslation.Calc_payout);
    p = p.replace("{Payout_Title}", historyTranslation.Payout);
    const q = /(-xx1-)(.*?)(-x1-)/mg,
        r = /(-xx2-)(.*?)(-x2-)/mg,
        t = /(-xx3-)(.*?)(-x3-)/mg,
        u = /(-xx4-)(.*?)(-x4-)/mg,
        v = /(-xx5-)(.*?)(-x5-)/mg,
        x = RegExp("\x3c!---START_SLIDE_ITEM----\x3e(.|\n|s|S)*?\x3c!---END_SLIDE_ITEM----\x3e",
            "i"),
        y = RegExp("\x3c!---START_BET_INFO----\x3e(.|\n|s|S)*?\x3c!---END_BET_INFO----\x3e", "i"),
        C = RegExp("\x3c!---START_TRANS_ITEM----\x3e(.|\n|s|S)*?\x3c!---END_TRANS_ITEM----\x3e", "i"),
        G = RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e(.|\n|s|S)*?\x3c!---END__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e", "i"),
        I = RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM----\x3e(.|\n|s|S)*?\x3c!---END__CHANGE_CSS_SLOT_ITEM----\x3e", "i"),
        Q = RegExp("\x3c!---START__BG_SYMBOL_WIN----\x3e(.|\n|s|S)*?\x3c!---END__BG_SYMBOL_WIN----\x3e",
            "i"),
        X = RegExp("\x3c!---START__SYMBOL_WIN----\x3e(.|\n|s|S)*?\x3c!---END__SYMBOL_WIN----\x3e", "i"),
        M = RegExp("\x3c!---START__SYMBOL_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__SYMBOL_NORMAL----\x3e", "i"),
        R = RegExp("\x3c!---START__MULTI_TOP----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP----\x3e", "i"),
        ka = RegExp("\x3c!---START__MULTI_BOT----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_BOT----\x3e", "i"),
        na = RegExp("\x3c!---START__MULTI_TOP_WIN----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP_WIN----\x3e", "i"),
        U = RegExp("\x3c!---START__MULTI_TOP_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP_NORMAL----\x3e",
            "i"),
        ca = RegExp("\x3c!---START__MULTI_BOT_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_bOT_NORMAL----\x3e", "i"),
        xa = RegExp("\x3c!---START__SHOW_MULTI----\x3e(.|\n|s|S)*?\x3c!---END__SHOW_MULTI----\x3e", "i"),
        ya = RegExp("\x3c!---START__SPECIAL__PAYOUT----\x3e(.|\n|s|S)*?\x3c!---END__SPECIAL__PAYOUT----\x3e", "i");
    var za = xe.res_data,
        va = xe.bet_size,
        da = xe.bet_level,
        La = xe.game_name,
        Va = 0,
        E = "";
    const z = p.match(x),
        A = p.match(y),
        w = p.match(C),
        ea = p.match(G),
        T = p.match(I),
        ha = p.match(Q),
        oa = p.match(M),
        ia = p.match(X),
        Ea = p.match(na),
        Fa = p.match(U),
        V = p.match(ca),
        L = p.match(R),
        B = p.match(ca),
        D = p.match(xa),
        K = p.match(ya);
    if (z) {
        JSON.parse(JSON.stringify(z[0]));
        var Aa = JSON.parse(JSON.stringify(z[0])),
            db = JSON.parse(JSON.stringify(ea[0])),
            F = JSON.parse(JSON.stringify(T[0])),
            ba = JSON.parse(JSON.stringify(ha[0])),
            O = JSON.parse(JSON.stringify(oa[0])),
            Y = JSON.parse(JSON.stringify(ia[0])),
            W = JSON.parse(JSON.stringify(Ea[0])),
            P = JSON.parse(JSON.stringify(Fa[0])),
            fa = JSON.parse(JSON.stringify(V[0])),
            pa = JSON.parse(JSON.stringify(L[0])),
            gb = JSON.parse(JSON.stringify(D[0]));
        JSON.parse(JSON.stringify(K[0]));
        var sb = q.exec(Y);
        if (null != sb) var yb = sb[2];
        var tb = r.exec(O);
        if (null != tb) var Ja = tb[2];
        var ta = t.exec(W);
        if (null != ta) var wb = ta[2];
        var ja = u.exec(P);
        if (null != ja) var ub = ja[2];
        var Ma = v.exec(fa);
        if (null != Ma) var eb = Ma[2];
        var ob = "";
        for (let Fb = 0; Fb < za.length; Fb++) {
            var Ca = JSON.parse(JSON.stringify(A[0])),
                ma = JSON.parse(JSON.stringify(w[0]));
            pa = JSON.parse(JSON.stringify(L[0]));
            JSON.parse(JSON.stringify(B[0]));
            var aa = za[Fb].result_json,
                pb = za[Fb].total_multi,
                Cb = aa.length,
                Qa = aa.length -
                1,
                Ra = aa[Qa].spin_date,
                J = aa[Qa].spin_hour,
                ua = aa[Qa].free_spin,
                ab = ua ? "bg_free" : "bg_main",
                qa = aa[Qa].free_num,
                S = aa[Qa].count_scatter,
                xb = aa[Qa].free_num,
                mb = aa[Qa].bet_amount;
            for (let Ka = 0; Ka < Cb; Ka++) {
                var H = JSON.parse(JSON.stringify(Aa));
                H = H.replace("{LEFT}", `${360*Fb}px`);
                Ca = Ca.replace("{Bet_Level_Title}", historyTranslation.Bet_Level);
                Ca = Ca.replaceAll(/{Bet__Size_Title}/g, historyTranslation.Bet_Size);
                Ca = Ca.replace("{LEVEL}", da);
                Ca = Ca.replace("{SIZE}", be.formatMoney(va, 2, be.CurrencyDecimal, be.CurrencyThousand));
                Va++;
                var zb = aa[Ka].profit,
                    vb = aa[Ka].credit,
                    wa = aa[Ka].new_reel,
                    N = aa[Ka].multi_arr,
                    Xa = aa[Ka].drop_position,
                    Ya = aa[Ka].win_total,
                    Za = aa[Ka].symbol_win,
                    nb = "undefined" != aa[Ka].count_symbol_multi ? aa[Ka].count_symbol_multi : 0,
                    qb = aa[Ka].sure_win,
                    Ha = aa[Ka].transaction,
                    Na = aa[Ka].position_symbol_special,
                    Sa = aa[Ka].expand;
                be.SpinTitle.push(aa[Ka].spin_title);
                var Ga = "",
                    Ta = "",
                    Oa = 0,
                    hb = E = "",
                    fb = xe.symbol_special,
                    Da = xe.symbol_special_0,
                    sa = xe.symbol_special_1,
                    ra = 0,
                    la = 0;
                for (let Ba = 0; Ba < wa.length; Ba++)
                    for (let Ia = 0; Ia < wa[Ba].length; Ia++) wa[Ba][Ia] ==
                        Da ? ra++ : wa[Ba][Ia] == sa && la++;
                if ("muay_thai" == La) {
                    let Ba = Na.length - (ra + la) - 1;
                    if (ua)
                        for (let Ia = 0; Ia < Na.length; Ia++) var Pa = Ia > Ba ? "symbol_s_1_4" : "symbol_s_1_3";
                    else Pa = "symbol_s_1_2";
                    for (let Ia = 0; Ia < Na.length; Ia++) wa[Na[Ia].row][Na[Ia].col] = Pa
                }
                console.log("betAmount", mb);
                ma = ma.replace("{Transaction}", Ha);
                ma = ma.replace("{TotalBet}", be.formatMoney(mb, 2, be.CurrencyDecimal, be.CurrencyThousand));
                ma = ma.replace("{Profit}", be.formatMoney(zb, 2, be.CurrencyDecimal, be.CurrencyThousand));
                ma = ma.replace("{Balance}", be.formatMoney(vb,
                    2, be.CurrencyDecimal, be.CurrencyThousand));
                ma = ma.replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction);
                ma = ma.replaceAll(/{Bet_Title}/g, historyTranslation.Bet);
                ma = ma.replace(/{Profit_Title}/g, historyTranslation.Profit);
                ma = ma.replace("{Balance_Title}", historyTranslation.Balance);
                0 < ra && (ib = Da.split(":"), lb = ib[0] + "_" + ib[1], hb += `<div style="display: flex; width: 100%; height: 48px; align-items: center;">
                                    <div style="width: 70px; height: 45px;"><span class="symbol_atlas ${lb}"
                                            style="transform-origin: left top; transform: scale(0.3157);"></span></div><label
                                        style="font-size: 14px; color: rgb(204, 204, 204);">x ${ra}</label><label
                                        style="flex: 1 1 150px; text-align: right; font-size: 14px; color: rgb(204, 204, 204);">Fighter Feature</label>
                                </div>`);
                0 < la && (ib = sa.split(":"), lb = ib[0] + "_" + ib[1], hb += `<div style="display: flex; width: 100%; height: 48px; align-items: center;">
                                    <div style="width: 70px; height: 45px;"><span class="symbol_atlas ${lb}"
                                            style="transform-origin: left top; transform: scale(0.3157);"></span></div><label
                                        style="font-size: 14px; color: rgb(204, 204, 204);">x ${la}</label><label
                                        style="flex: 1 1 150px; text-align: right; font-size: 14px; color: rgb(204, 204, 204);">Fighter Feature</label>
                                </div>`);
                qb && (hb += '<div class="sure_win_container"\n                                            style="display: flex; flex-direction: column; justify-content: center; width: 305px; height: 48px; align-self: start;">\n                                            <div class="sure_win_text" style="font-size: 13px; color: rgba(255, 255, 255, 0.6); position: relative;">Sure Win\n                                                Activated </div>\n                                            </div>');
                0 < nb && (hb += `
                                        <div style="display: flex; width: 100%; min-height: 48px; align-items: center; margin-bottom: 15px;">
                                            <div style="width: 20%; height: 45px;"><span class="symbol_2_1_1 symbol_atlas"
                                                    style="transform-origin: left top; transform: scale(0.5);"></span></div>
                                            <div style="width: 50%; min-width: 50%; display: flex; flex-direction: column; padding-right: 10px;"><label
                                                    style="font-size: 14px; color: rgb(204, 204, 204); text-align: left; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; white-space: normal; text-overflow: ellipsis;"></label><label
                                                    style="font-size: 11px; color: rgb(156, 155, 155); text-align: left; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"></label>
                                            </div>
                                            <div style="width: 30%; font-size: 14px; color: rgb(204, 204, 204); text-align: right;">+${nb}<div><label
                                                        style="font-size: 11px; color: rgb(156, 155, 155); text-align: right;">collected</label></div>
                                            </div>
                                        </div>

                            `);
                0 == Za.length && (hb += `<div id="no-winning-combination-container"
                                            style="display: flex; width: inherit; height: 48px; justify-content: center; align-items: center; margin: 0px auto;">
                                            <div id="no-winning-combination-text" style="font-size: 14px; color: rgb(204, 204, 204);">${historyTranslation.No_Winning_Combination}
                                            </div>
                                        </div>`);
                switch (La) {
                    case "legend":
                        var Ab = aa[Ka].number_transform;
                        0 < aa[Ka].number_symbol_special && (hb += `
                                    <div id="shoot-sun-feature-container" style="display: flex; width: inherit; height: 48px; align-items: center;">
                                        <div class="shoot-sun-desc-wrapper"
                                            style="display: flex; flex-direction: column; flex: 1 1 auto; text-align: left; font-size: 14px; color: rgb(204, 204, 204);">
                                            <label>${historyTranslation.Hou_Yi}</label><label style="font-size: 11px; color: rgb(156, 155, 155);">${0==Ab?historyTranslation.No_Transformed:Ab+" "+historyTranslation.Transformed}</label></div>
                                        <div style="width: 50px; height: 45px;"><span class="special_symbol_atlas symbol_1_1"
                                                style="transform-origin: left top; transform: scale(0.25) translate(-8px, -22px);"></span></div>
                                    </div>`)
                }!ua && 0 == Za.length && 0 < qa && (hb += `
                                <div class="payoutContainer"
                                    style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                                    <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                                            class="${"symbol_0_1"} special_symbol_atlas"
                                            style="transform-origin: left top; transform: scale(0.25) translate(-8px, -22px);"></span>
                                    </div>
                                    <div class="payoutDescContainer"
                                        style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                                        <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${S}</div>
                                    </div>
                                    <div class="payoutTextContainer"
                                        style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                                        <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${xb} Free Spin(s)
                                        </div>
                                    </div>
                                </div>
                            `);
                if (1 < pb) switch (La) {
                    case "legend":
                        break;
                    default:
                        hb += `
                                    <div class="payoutContainer"
                                        style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                                        <div class="payoutDescContainer"
                                            style="width: 0px; position: relative; flex-direction: column; min-width: 0px; margin-top: 10px;"></div>
                                        <div class="payoutTextContainer"
                                            style="width: inherit; position: relative; flex-direction: column; min-width: inherit; margin-top: 10px;">
                                            <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">Win Multiplier x ${pb}
                                            </div>
                                        </div>
                                    </div>                                
                                    `
                }
                if (null != Za)
                    for (let Ba = 0; Ba < Za.length; Ba++) {
                        var cb = Za[Ba];
                        Ya = be.formatMoney(cb.win_total, 2, be.CurrencyDecimal, be.CurrencyThousand);
                        var Eb = be.formatMoney(cb.win_amount, 2, be.CurrencyDecimal, be.CurrencyThousand);
                        Oa = cb.index;
                        E = 10 > Oa ? "0" + Oa : Oa;
                        var Bb = 1 < pb ? `<div id="payline-subvalue-label" style="width: 100px; font-size: 11px; text-align: right; color: rgb(156, 155, 155);">${be.CurrencyPrefix}${Eb} x ${pb}</div>` : "";
                        switch (La) {
                            case "muay_thai":
                                var Wa = "width: 76px; height: 48px; transform-origin: left center; transform: scale(0.5);";
                                break;
                            default:
                                Wa = "width: 76px; height: 72px; transform-origin: left center; transform: scale(0.333);"
                        }
                        hb = hb + `
                                    <div style="width: 285px; height: 48px; align-self: start;">
                                            <div id="payline-container"
                                                style="display: flex; width: inherit; justify-content: space-between; align-items: center; height: 48px; margin: 0px auto;">
                                                <div id="payline-number-sprite-wrapper" style="display: flex; align-items: center; height: inherit;">
                                                    <div id="win-line-number-label"
                                                        style="width: 25px; font-size: 14px; text-align: left; color: rgb(204, 204, 204);">${E}</div>
                                                    <span class="pl${Oa} payline"
                                                        style="${Wa}"></span>
                                                </div>
                                                <div id="payline-labels" style="display: flex; flex-direction: column;">
                                                    <div id="payline-win-value-label"
                                                        style="width: 100px; font-size: 14px; text-align: right; color: rgb(204, 204, 204);">
                                                        ${be.CurrencyPrefix}${Ya}</div>
                                                        ` + Bb + `
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
                                                            style="color: rgb(128, 128, 128); font-size: 12px; text-align: left; padding: 0px 8px;">
                                                            ${historyTranslation.calc_payout}
                                                        </div>
                                                        <div id="tooltip-desc" style="font-size: 12px; text-align: left; padding: 0px 8px;">${va} x ${da} x ${cb.payout} x ${cb.total_multi}
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>`
                    }
                var bb = [];
                if (Sa) {
                    var Z = aa[Ka].symbol_expand,
                        kb = be.formatMoney(aa[Ka].win_expand, 2, be.CurrencyDecimal, be.CurrencyThousand),
                        Db = aa[Ka].count_symbol_expand;
                    bb = aa[Ka].position_symbol_expand;
                    hb += `<div id="feature-container" style="display: flex; width: inherit; height: 54px; margin: auto;">
                                                <div id="feature-wrapper" style="display: flex; width: inherit; height: inherit; align-items: center;">
                                                    <div id="left-side-feature" style="display: flex; height: inherit; align-items: center; width: 200px;">
                                                        <div id="expand-label" style="width: auto; font-size: 14px; text-align: left; color: rgb(204, 204, 204);">
                                                            Expand: </div>
                                                        <div id="feature-image-container" style="width: 48px; height: 48px;"><span class="${Z}_1 symbol_atlas"
                                                                style="transform-origin: left top; transform: scale(0.333) translate(-15px, -20px);"></span></div>
                                                        <div id="feature-count-container"
                                                            style="display: flex; flex-direction: column; width: 30px; align-items: flex-start; margin-left: 5px;">
                                                            <div id="feature-count" style="font-size: 14px; color: rgb(204, 204, 204);">x ${Db}</div>
                                                        </div>
                                                    </div>
                                                    <div id="right-side-feature" style="display: flex; height: inherit; align-items: center; width: 100px;">
                                                        <div id="expand-wins-label"
                                                            style="width: 100px; font-size: 14px; text-align: right; color: rgb(204, 204, 204);">\u0e3f${kb}</div>
                                                    </div>
                                                </div>
                                            </div>`
                }
                if (ua) {
                    for (let Ba = 0; Ba < N.length; Ba++) 0 < Ya ? 3 == N.length ? Ta += `<div class="mul_x${N[Ba]} history_assets" style="${wb}"></div>` : 4 == N.length && (Ta = 0 == Ba || 3 == Ba ? Ta + `<div class="mul_x${N[Ba]} history_assets" style="${ub}"></div>` : Ta + `<div class="mul_x${N[Ba]} history_assets" style="${wb}"></div>`) : Ta += `<div class="mul_x${N[Ba]} history_assets" style="${ub}"></div>`;
                    pa = pa.replace("{MULTIFREESPIN}", Ta);
                    H = H.replace("{MULTIFREESPIN}", Ta);
                    H = H.replace(ka,
                        "")
                } else {
                    for (let Ba = 0; Ba < N.length; Ba++) Ta += `<div class="mul_x${N[Ba]} history_assets"
                                style="${eb}"></div>`;
                    H = H.replace("{MULTINORMALSPIN}", Ta);
                    H = H.replace(R, "")
                }
                for (let Ba = 0; Ba < wa.length; Ba++) {
                    var Hb = "";
                    for (let Ia = 0; Ia < wa[Ba].length; Ia++) {
                        var lb = wa[Ba][Ia],
                            Ib = "symbol_0:1:0" == wa[Ba][Ia] || "symbol_s_0:1:0" == wa[Ba][Ia] || "symbol_s_1:1:0" == wa[Ba][Ia] || "symbol_1:1:0" == wa[Ba][Ia] || wa[Ba][Ia] == fb ? "special_symbol_atlas" : "symbol_atlas",
                            Mb = Ba * wa[Ba].length + (wa[Ba].length - Ia) - 1;
                        "_blank" == lb || lb.slice(-1);
                        var Gb = "",
                            ib = [],
                            $a = "";
                        if ("_blank" != lb && lb.includes(":")) {
                            ib =
                                lb.split(":");
                            switch (La) {
                                case "legend":
                                    lb = lb == fb ? ib[0] + "_" + ib[1] + "_" + ib[2] : ib[0] + "_" + ib[1];
                                    break;
                                default:
                                    lb = ib[0] + "_" + ib[1]
                            }
                            1 == ib[2] ? $a = "silver" : 2 == ib[2] && ($a = "gold");
                            var Jb = "";
                            for (let Kb = 0; Kb < bb.length; Kb++) bb[Kb].col == Ia && bb[Kb].row == Ba && (Jb = '\n                                                                <span class="symbol_atlas feature_frame"\n                                                                style="position: absolute; transform: scale(0.48) translate(-25px, -18px); transform-origin: left top; z-index: 4;"></span>');
                            Gb = 0 < ib[2] ? `<span class="lcu_history_frame_packed ${$a}_${ib[2]}_${ib[1]}" style="transform-origin: left top; position: absolute; transform: scale(0.51);"></span>` : "";
                            Hb = Xa.includes(Mb) ? Hb + F + ba + `    
                                                                            
                                        <span
                                        class="${lb} ${Ib}"
                                        style="${Ja}"></span>
                                        </div>
                                                                                
                                    ` : 0 == Ya ? Hb + F + `
                                            
                                            <span
                                            class="${lb} ${Ib}"
                                            style="${Ja}"></span>
                                            ` + Gb + Jb + "\n                                                            </div>\n                                                            " : Hb + F + `
                                            <span
                                            class="${lb} ${Ib}"
                                            style="${yb};"></span>
                                            ` + Gb + Jb + "\n                                                            </div>\n                                                            "
                        } else if ("symbol_s_1_2" == lb || "symbol_s_1_3" == lb || "symbol_s_1_4" == lb) Ib = "special_symbol_atlas", Hb = Hb + F + `
                                        <span
                                        class="${lb} ${Ib}"
                                        style="${yb};"></span>
                                        ` + Gb + "\n                                                        </div>\n                                                        "
                    }
                    Ga = Ga + db + Hb + "</div>"
                }
                be.LogHistoryDetailResult.push({
                    spin_title: be.SpinTitle[Fb],
                    date: Ra,
                    hour: J
                });
                var Lb = "";
                switch (La) {
                    case "legend":
                        Lb = 1 == ua ? gb.replace("{TOTALMULTI}", pb) : "", Ca = 1 == ua ? "" : Ca
                }
                H = H.replace(xa, Lb);
                H = H.replace(y, Ca);
                H = H.replace(ya, "");
                H = H.replace(G, "");
                H = H.replace(I, "");
                H = H.replace(Q, "");
                H = H.replace(M, "");
                H = H.replace(X, "");
                H = H.replace(na, "");
                H = H.replace(U, "");
                H = H.replace(R, "");
                H = H.replace(ka, "");
                H = H.replace(C, ma);
                H = H.replace(C, ma);
                H = H.replace("{PAYOUT}", hb);
                H = H.replace("{BG_REEL}", ab);
                H = H.replace("{SLOTCOLUMN}", Ga);
                H = H.replace("{MULTIFREESPIN}", "");
                H = H.replace("{MULTINORMALSPIN}", "")
            }
            ob += H
        }
        be.LogHistorySlideTotal = Va
    }
    e.LogHistoryDetailTitle = be.SpinTitle[0];
    e.LogHistoryDetailDateHour = Ra + " " + J;
    p = p.replace("{LOG_TITLE}", be.SpinTitle[0]);
    p = p.replace("{Date}", Ra);
    p = p.replace("{Time}", J);
    p = p.replace("{GMT}",
        h);
    p = p.replace(x, ob);
    e.LogHistoryDetailTemplate = p;

    document.getElementById("game-shell").innerHTML = p;
    
    var currentSlide = 0;

    document.getElementById("game-details-right-arrow").addEventListener('click', function() {
        if (currentSlide < bbe.LogHistorySlideTotal - 1) {
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
