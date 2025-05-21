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
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKIAAABwCAYAAACdBKs/AAAAAXNSR0IArs4c6QAAB21JREFUeF7tnU2sXVMUx//LgBCGxEdomNGJhIREotIgJkgwU41QZiaIGgglBoh2YkYrUsxUgokgohKJJiQmZUZKfESHGsLAkt3u25xc976z1r7n3LP22/+TdND31jl7rf/6vbW/zoeABxUIoIAE8IEuUAEQREIQQgGCGCINdIIgkoEQChDEEGmI44SqngFgC4BL879Lsnc/A/gp/zsmIv8O6TVBHFLNSq+lqmcDuAXAPQBuA3B+TyjHAXwI4B0AH4vIX6uGThBXVbDi8zOAjwB43ADfskgTlC8DeGUVIAlixSCt4rqqPgDg6dwNz18qwfUtgB8B/J5/eQGAywBctQTaYwCeE5HXS/wiiCWqVXyOqp4D4CCAu+fCSCC9AeADEfl6oxBV9RoAtwO4fwHIhwDsFJE/PTIRRI9alduq6uUA3gVwdSeUk5UsQeidgOSJTYJxvrJ+A+AuEfnBKhlBtCpVuV2G8Mhct7oPwFOrjO2SLHms+TyARzsype79OiuMBLFywCzu5+74i04l/BvAgyLytuV8q42q3gvgAICz8jmpMt5g6aYJolXliu1UNS2zzMaECcJbReTzMUJS1RsBfNSB8ZCIpGWhDQ+C2KdQ5b/Ps+NUpWbHjqEr4bxEC9pM1XfD2TRBrBy0ntltWqj+rjOz3Scij60jZFXd2xkzpgnRlRuNRQniOrIyURuq+gSAF3PzvTAsqGx7ADyTf/6siKT/m448gen+EewWkZeWnUwQTbLWZ5RBSPDNtut6u8chQUzXmuui0yx6y7KqSBDrY8zksareAeC9TjW8omCdsLgiZhDTDRTfd4YGd4rI+4sCIIimtNZnpKpp9+S+km51yGhVtQvzmyKykyAOqXDga+Udj9863fK1fdt2Y4WTtwO/ytdP3fOFiyozK+JYGZjwunkXJXWJ6TguIumGhckOVU03TszGqmmI8L+tP4I4WXrGazgvKh/OLRwWkZtKWpvrVl2z5m57qvoZgG35Z9sWLaYTxJIMBT8nb7W9ld1cOi7rC2NAELvj1YUL6gSxLxsV/n5u/XCviKQbX93HgCCmG2dnC+kL1xMJojs98U+YA7F4N2VAELu7LHWBqKo6S7mITPIHE8GHEuzZNZeotuScCBBE8KFEUk5WSlQjiAOqdupSQy3fDNg117t8E6EaRfChhNKhFrSHALH6Be0IEETwoQTEXBVX3uIbCMS6t/giQBDBhxVA5E0P8+Kpapr17krPSQDYCuDcUoGDn3cCwNH83MZ+ETk981+337wNbE5xVb0IQFrl377uZEzc3qcA0i7Cr1P5wRtjs/K5En7SIIQz9hKMN09VGRfcJV28uO39Ywr1qICqPgTg1RzEP/lB7IOWKhFhfOb1IVf/dL9demD9zBz3wyLymjeRQ9lP9PBUeqx0ttedQum9O3zUHQtV/TI9ZJ1FfVJEZs9P9OrshaD3ggUGpT6o6m4AL+Qmj4jI9QXND3ZK84+TquofnYnJxZZKOFO/FILBsndqYbhomzFXxl+yLydE5Lwh/fJeq/kH7EsTmdfBiiDwJmkj+9r978bW9CtHak9k7f4vWEZr8yVMtSeydv8XVfsmX0tXeyJr979n2NHOizprT2Tt/veNl5t5dXHtiazd/z4QOysUm/tl7qsk0ipiVLtaY9+Un7eoNRlDwN1y7CX6jb2zMvlaYIkoQ5xDEH0qEkSfXmZrgmiW6qQhQfTpZbYmiGapCKJPKp81QfTptbaK6HNrc1lP9Vx2TSoSxDVkiyD2i0wQ+zVa2YIg9ku4NhBbSwbHiP3wdS0Iok8vszVBNEvFWbNPKp81QfTpxYro08tsTRDNUrEi+qTyWRNEn16siD69zNYE0SwVK6JPKp81QfTpxYro08tsTRDNUrEi+qTyWRNEn16siD69zNYE0SwVK6JPKp81QfTpxYro08tsTRDNUrEi+qTyWRNEn16siD69zNYE0SwVK6JPKp81QfTpxYro08tsTRDNUrEi+qTyWRNEn16siD69zNYE0SwVK6JPKp81QfTpxYro08tsTRDNUrEi+qTyWRNEn16siD69zNYE0SwVK6JPKp81QfTpxYro08tsTRDNUrEi+qTyWRNEn16siD69zNYE0SwVK6JPKp81QfTpNXZFLP4Emi+MWNbRPoEWS53F3owNYvFHIWsQb5mP0T4KWYOWY4NY/JncGsSb9zHiZ3Jr0XFsENP1+eFwkdMvta8FjHX7OSqIKZhcJdJHpLevO7iJ20tfr9/h+TTwxP5O2vzoIGYYUzu70pfMAWztfMN50uBHaPwEgKMADgDYL6yEZonXAqLZGxo2qwBBbDb1sQIniLHy0aw3BLHZ1McKnCDGykez3hDEZlMfK3CCGCsfzXpDEJtNfazACWKsfDTrDUFsNvWxAieIsfLRrDcEsdnUxwqcIMbKR7PeEMRmUx8rcIIYKx/NekMQm019rMAJYqx8NOsNQWw29bECJ4ix8tGsNwSx2dTHCpwgxspHs94QxGZTHytwghgrH816QxCbTX2swAlirHw06w1BbDb1sQL/D10xEa3gJzbjAAAAAElFTkSuQmCC)
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

.symbol_2_1 {
    background-position: -1px -1px
}

.symbol_2_1,
.symbol_6_1 {
    width: 160px;
    height: 160px
}

.symbol_6_1 {
    background-position: -1px -163px
}

.symbol_4_1 {
    width: 160px;
    height: 160px;
    background-position: -1px -325px
}

.symbol_3_1 {
    background-position: -325px -1px
}

.symbol_1_1,
.symbol_3_1 {
    width: 160px;
    height: 160px
}

.symbol_1_1 {
    background-position: -163px -1px
}

.symbol_5_1 {
    background-position: -163px -163px
}

.symbol_5_1,
.wh {
    width: 160px;
    height: 160px
}

.wh {
    background-position: -163px -325px
}

.history_assets {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>22.png)
}

.bg_bns {
    background-position: -525px -1px
}

.bg_bns,
.bg_main {
    width: 520px;
    height: 492px
}

.bg_main {
    background-position: -1047px -1px
}

.bg_free {
    width: 522px;
    height: 494px;
    background-position: -523px -1px
}

.mtp_bns {
    width: 312px;
    height: 72px;
    background-position: -1569px -1px
}

.mul_x10 {
    width: 112px;
    height: 68px;
    background-position: -1691px -75px
}

.mtp_main {
    width: 120px;
    height: 120px;
    background-position: -1569px -75px
}

.mul_x2 {
    background-position: -1691px -145px
}

.mul_x2,
.mul_x5 {
    width: 84px;
    height: 68px
}

.mul_x5 {
    background-position: -1777px -145px
}

.special_symbol_atlas {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>21.png)
}

.symbol_0_1 {
    width: 160px;
    height: 160px;
    background-position: -1px -1px
}

.payline {
    display: inline-block;
    overflow: hidden;
    background-repeat: no-repeat;
    background-image: url(<?= $imageBaseUrl ?>24.png)
}

.pl1 {
    background-position: -1px -1px
}

.pl1,
.pl2 {
    width: 30px;
    height: 27px
}

.pl2 {
    background-position: -33px -1px
}

.pl3 {
    background-position: -65px -1px
}

.pl3,
.pl4 {
    width: 30px;
    height: 27px
}

.pl4 {
    background-position: -97px -1px
}

.pl5 {
    width: 30px;
    height: 27px;
    background-position: -129px -1px
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
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
                                                                    style="text-align: center; font-size: 11px; color: rgb(255, 200, 36);">
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
                                                                                <div id="background-item" style="width: 290px; height: 67px; margin-top: -10%;"><span class="mtp_bns history_assets"
                                                                                    style="display: block; position: relative; transform-origin: left top; left: 35%; bottom: 0%; transform: scale(0.5); margin-top: 10%; overflow: visible;">
                                                                                    <div id="Mtp-Num-Top-Container"
                                                                                        style="display: flex; justify-content: center; position: relative; left: 1.1%; top: -20%; width: 305px; height: 200px; overflow: hidden; gap: 16px;">
                                                                                        {MULTIFREESPIN}
                                                                                    </div>
                                                                                    </span></div>
                                                                                    <!---END__MULTI_TOP---->

                                                                                    <!---START__MULTI_TOP_WIN---->
                                                                                    <div class="mul_x2 history_assets" style="-xx3-flex: 0 0 auto; object-fit: cover; margin-top: 0px;-x3-"></div>
                                                                                    <!---END__MULTI_TOP_WIN---->

                                                                                    <!---START__MULTI_TOP_NORMAL---->
                                                                                    <div class="mul_x5 history_assets" style="-xx4-flex: 0 0 auto; object-fit: cover; margin-top: 20px;-x4-"></div>
                                                                                    <!---END__MULTI_TOP_NORMAL---->

                                                                                <div id="background-container"
                                                                                    style="position: relative;width: 250px;height: 263px;align-self: center;margin-top: 10px;margin-left: 20px;">
                                                                                    <div id="reel_background"
                                                                                        style="position: absolute; display: flex; flex-direction: column; align-items: center; margin-top: -15px; margin-left: -20px;">
                                                                                        <div id="background-item"
                                                                                            style="width: 279px; height: 234px; margin-top: -5px; margin-bottom: -6px;">
                                                                                            <span
                                                                                                class="history_assets {BG_REEL}"
                                                                                                style="display: block; position: absolute; transform-origin: left top; transform: scale(0.5);"></span>
                                                                                        </div>
                                                                                    </div>
																					
                                                                                    <div id="symbols-container"
                                                                                        style="position: absolute; display: flex; justify-content: center; align-items: center; width: inherit; height: inherit; left: -19px; bottom: 25px; flex-flow: column wrap;">
                                                                                        <!---START_TEMPLATE_BODY---->
																						
                                                                                        {SLOTCOLUMN}
																						
																						<!---START__SYMBOL_NORMAL---->
																						<span class="Symbol_4_1 symbol_atlas"
    style="-xx2- display: block; position: absolute; transform-origin: left top; transform: scale(0.5); margin-top: 2px; margin-left: 2px;-x2-"></span>
																						<!---END__SYMBOL_NORMAL---->
																						
																						<!---START__SYMBOL_WIN---->
																						<span class="Symbol_3_1 symbol_atlas"
    style="-xx1- display: block; position: absolute; transform-origin: left top; transform: scale(0.5); margin-top: 0px; margin-left: 2px; filter: brightness(0.5);-x1-"></span>
																						<!---END__SYMBOL_WIN---->
																						
																						<!---START__BG_SYMBOL_WIN---->
																						<span class="symbol_atlas wh" style="display: block; position: absolute; transform-origin: left top; transform: scale(0.47); left: 0%; margin-top: 1px; margin-left: 5px;"></span>   
																						<!---END__BG_SYMBOL_WIN---->
																						
																						<!---START__CHANGE_CSS_SLOT_ITEM_COLUMN---->
																						<div id="slot-item-column"
        style="position: relative; height: 225px; width: 75px; display: flex; flex-direction: column; align-items: center; bottom: 4px;">
																						<!---END__CHANGE_CSS_SLOT_ITEM_COLUMN---->
																						
																						<!---START__CHANGE_CSS_SLOT_ITEM---->
																						<div id="slot-item" style="width: 75px; height: 78px; transform-origin: left top; z-index: 3;">
																						<!---END__CHANGE_CSS_SLOT_ITEM---->
																						
                                                                                        <!---END_SAMBLE_BLOCK---->
                                                                                    </div>
                                                                                </div>
                                                                                <!---START__MULTI_BOT---->
                                                                                <div id="background-item" style="width: 290px; height: 20px;"><span class="mtp_main history_assets"
                                                                                    style="display: block; position: relative; transform-origin: left top; left: 54%; bottom: 270%; transform: scale(0.45); z-index: 10;">
                                                                                    <div id="Mtp-Num-Bottom-Container"
                                                                                        style="display: flex; justify-content: center; position: relative; left: 3%; top: 25%; width: 115px; height: 70px; overflow: hidden; border-radius: 40%;">
                                                                                        {MULTINORMALSPIN}
                                                                                    </div>
                                                                                </span></div>
                                                                                <!---END__MULTI_BOT---->
																				
																				<!---START__MULTI_BOT_NORMAL---->
																				<div class="mul_x${multiArr[c]} history_assets"
																				style="-xx5- flex: 0 0 auto; object-fit: cover; transform: scale(1); margin: 0px 2px;-x5-"></div>
																				<!---END__MULTI_bOT_NORMAL---->
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
                                                                                    style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; width: inherit; margin: auto;">
                                                                                    <!---START_PAYOUT_INFO---->
																					<div
    style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; width: inherit; margin: auto;">
                                                                                    {PAYOUT}
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

    let c = (new Date).toTimeString().split(" ")[1];
    let h = 0 != c.charAt(4) ? c.slice(0, -2) + ":" + c.slice(-2) : c.slice(0, 4) + c.slice(5, 6) + ":" + c.slice(-2);

    var p = e.replaceAll(/{CurrencyPrefix}/g,
                        be.CurrencyPrefix);
    p = p.replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction);
    p = p.replace(/{Profit_Title}/g, historyTranslation.Profit);
    p = p.replace("{Calc_payout}", historyTranslation.Calc_payout);
    p = p.replace("{Payout_Title}", historyTranslation.Payout);
    const q = /(-xx1-)(.*?)(-x1-)/mg,
        r = /(-xx2-)(.*?)(-x2-)/mg,
        t = /(-xx3-)(.*?)(-x3-)/mg,
        u = /(-xx4-)(.*?)(-x4-)/mg,
        v = /(-xx5-)(.*?)(-x5-)/mg,
        x = RegExp("\x3c!---START_SLIDE_ITEM----\x3e(.|\n|s|S)*?\x3c!---END_SLIDE_ITEM----\x3e", "i"),
        y = RegExp("\x3c!---START_BET_INFO----\x3e(.|\n|s|S)*?\x3c!---END_BET_INFO----\x3e",
            "i"),
        C = RegExp("\x3c!---START_TRANS_ITEM----\x3e(.|\n|s|S)*?\x3c!---END_TRANS_ITEM----\x3e", "i"),
        G = RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e(.|\n|s|S)*?\x3c!---END__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e", "i"),
        I = RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM----\x3e(.|\n|s|S)*?\x3c!---END__CHANGE_CSS_SLOT_ITEM----\x3e", "i"),
        Q = RegExp("\x3c!---START__BG_SYMBOL_WIN----\x3e(.|\n|s|S)*?\x3c!---END__BG_SYMBOL_WIN----\x3e", "i"),
        X = RegExp("\x3c!---START__SYMBOL_WIN----\x3e(.|\n|s|S)*?\x3c!---END__SYMBOL_WIN----\x3e",
            "i"),
        M = RegExp("\x3c!---START__SYMBOL_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__SYMBOL_NORMAL----\x3e", "i"),
        R = RegExp("\x3c!---START__MULTI_TOP----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP----\x3e", "i"),
        ka = RegExp("\x3c!---START__MULTI_BOT----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_BOT----\x3e", "i"),
        na = RegExp("\x3c!---START__MULTI_TOP_WIN----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP_WIN----\x3e", "i"),
        U = RegExp("\x3c!---START__MULTI_TOP_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP_NORMAL----\x3e", "i"),
        ca = RegExp("\x3c!---START__MULTI_BOT_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_bOT_NORMAL----\x3e",
            "i");
    var xa = xe.res_data,
        ya = xe.bet_size,
        za = xe.bet_level,
        va = 0;
    const da = p.match(x),
        La = p.match(y),
        Va = p.match(C),
        E = p.match(G),
        z = p.match(I),
        A = p.match(Q),
        w = p.match(M),
        ea = p.match(X),
        T = p.match(na),
        ha = p.match(U),
        oa = p.match(ca),
        ia = p.match(R),
        Ea = p.match(ca);
    if (da) {
        JSON.parse(JSON.stringify(da[0]));
        var Fa = JSON.parse(JSON.stringify(da[0])),
            V = JSON.parse(JSON.stringify(E[0])),
            L = JSON.parse(JSON.stringify(z[0])),
            B = JSON.parse(JSON.stringify(A[0])),
            D = JSON.parse(JSON.stringify(w[0])),
            K = JSON.parse(JSON.stringify(ea[0])),
            Aa = JSON.parse(JSON.stringify(T[0])),
            db = JSON.parse(JSON.stringify(ha[0])),
            F = JSON.parse(JSON.stringify(oa[0]));
        JSON.parse(JSON.stringify(ia[0]));
        var ba = q.exec(K);
        if (null != ba) var O = ba[2];
        var Y = r.exec(D);
        if (null != Y) var W = Y[2];
        var P = t.exec(Aa);
        if (null != P) var fa = P[2];
        var pa = u.exec(db);
        if (null != pa) var gb = pa[2];
        var sb = v.exec(F);
        if (null != sb) var yb = sb[2];
        var tb = "";
        for (let fb = 0; fb < xa.length; fb++) {
            var Ja = JSON.parse(JSON.stringify(La[0])),
                ta = JSON.parse(JSON.stringify(Va[0]));
            var wb = JSON.parse(JSON.stringify(ia[0]));
            JSON.parse(JSON.stringify(Ea[0]));
            var ja = xa[fb].result_json,
                ub = xa[fb].total_multi,
                Ma = ja.length,
                eb = ja.length - 1,
                ob = ja[eb].spin_date,
                Ca = ja[eb].spin_hour,
                ma = ja[eb].free_spin,
                aa = ma ? "bg_free" : "bg_main",
                pb = ja[eb].free_num,
                Cb = ja[eb].count_scatter,
                Qa = ja[eb].free_num,
                Ra = ja[eb].bet_amount;
            for (let Da = 0; Da < Ma; Da++) {
                var J = JSON.parse(JSON.stringify(Fa));
                J = J.replace("{LEFT}", `${360*fb}px`);
                Ja = Ja.replace("{Bet_Level_Title}", historyTranslation.Bet_Level);
                Ja = Ja.replaceAll(/{Bet__Size_Title}/g, historyTranslation.Bet_Size);
                Ja = Ja.replace("{LEVEL}", za);
                Ja = Ja.replace("{SIZE}", be.formatMoney(ya, 2, be.CurrencyDecimal, be.CurrencyThousand));
                va++;
                var ua = ja[Da].profit,
                    ab = ja[Da].credit,
                    qa = ja[Da].new_reel,
                    S = ja[Da].multi_arr,
                    xb = ja[Da].drop_position,
                    mb = ja[Da].win_total,
                    H = ja[Da].symbol_win,
                    zb = "undefined" != ja[Da].count_symbol_multi ? ja[Da].count_symbol_multi : 0,
                    vb = ja[Da].sure_win,
                    wa = ja[Da].transaction;
                be.SpinTitle.push(ja[Da].spin_title);
                var N = "",
                    Xa = "",
                    Ya = "";
                ta = ta.replace("{Transaction}", wa);
                ta = ta.replace("{TotalBet}", be.formatMoney(Ra, 2,
                    be.CurrencyDecimal, be.CurrencyThousand));
                ta = ta.replace("{Profit}", be.formatMoney(ua, 2, be.CurrencyDecimal, be.CurrencyThousand));
                ta = ta.replace("{Balance}", be.formatMoney(ab, 2, be.CurrencyDecimal, be.CurrencyThousand));
                ta = ta.replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction);
                ta = ta.replaceAll(/{Bet_Title}/g, historyTranslation.Bet);
                ta = ta.replace(/{Profit_Title}/g, historyTranslation.Profit);
                ta = ta.replace("{Balance_Title}", historyTranslation.Balance);
                vb && (Ya += '<div class="sure_win_container"\n                                            style="display: flex; flex-direction: column; justify-content: center; width: 305px; height: 48px; align-self: start;">\n                                            <div class="sure_win_text" style="font-size: 13px; color: rgba(255, 255, 255, 0.6); position: relative;">Sure Win\n                                                Activated </div>\n                                            </div>');
                0 < zb && (Ya += `
                                        <div style="display: flex; width: 100%; min-height: 48px; align-items: center; margin-bottom: 15px;">
                                            <div style="width: 20%; height: 45px;"><span class="symbol_2_1_1 symbol_atlas"
                                                    style="transform-origin: left top; transform: scale(0.5);"></span></div>
                                            <div style="width: 50%; min-width: 50%; display: flex; flex-direction: column; padding-right: 10px;"><label
                                                    style="font-size: 14px; color: rgb(204, 204, 204); text-align: left; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; white-space: normal; text-overflow: ellipsis;"></label><label
                                                    style="font-size: 11px; color: rgb(156, 155, 155); text-align: left; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"></label>
                                            </div>
                                            <div style="width: 30%; font-size: 14px; color: rgb(204, 204, 204); text-align: right;">+${zb}<div><label
                                                        style="font-size: 11px; color: rgb(156, 155, 155); text-align: right;">collected</label></div>
                                            </div>
                                        </div>

                            `);
                1 < ub && (Ya += `
                                    <div class="payoutContainer"
                                        style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                                        <div class="payoutDescContainer"
                                            style="width: 0px; position: relative; flex-direction: column; min-width: 0px; margin-top: 10px;"></div>
                                        <div class="payoutTextContainer"
                                            style="width: inherit; position: relative; flex-direction: column; min-width: inherit; margin-top: 10px;">
                                            <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">Win Multiplier x ${ub}
                                            </div>
                                        </div>
                                    </div>                                
                                    `);
                if (null != H)
                    for (let sa = 0; sa < H.length; sa++) {
                        var Za = H[sa];
                        mb = be.formatMoney(Za.win_total, 2, be.CurrencyDecimal, be.CurrencyThousand);
                        be.formatMoney(Za.win_amount, 2, be.CurrencyDecimal, be.CurrencyThousand);
                        var nb = Za.index;
                        var qb = 10 > nb ? "0" + nb : nb;
                        Ya += `
                                <div style="width: 285px; height: 48px; align-self: start;">
                                        <div class="payout_Item_content"
                                            style="display: flex; width: 280px; height: 48px; justify-content: space-between;">
                                            <div class="payline_details" style="display: flex; width: 230px; height: 48px;">
                                                <div class="win_line_content" style="text-align: left; margin-top: 15px; width: 20px;">
                                                    <div style="font-size: 13px; color: rgba(255, 255, 255, 0.6);">${qb}</div>
                                                </div><span class="pl${nb} payline"
                                                    style="display: block; transform-origin: left top; transform: scale(1); margin-top: 12px; margin-left: 2px;"></span>
                                            </div>
                                            <div class="win_text_section" style="display: flex; justify-content: space-between;">
                                                <div class="win_text_content" style="text-align: right; margin-top: 15px; width: 105px;">
                                                    <div style="font-size: 13px; color: rgba(255, 255, 255, 0.6); text-align: end;">${be.CurrencyPrefix}${mb}</div>
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
                                                        style="color: rgb(128, 128, 128); font-size: 12px; text-align: left; padding: 0px 8px;">
                                                        ${historyTranslation.calc_payout}
                                                    </div>
                                                    <div id="tooltip-desc" style="font-size: 12px; text-align: left; padding: 0px 8px;">${ya} x ${za} x ${Za.payout} x ${Za.total_multi}
                                                    </div>
                                                </div>
                                    </div>
                                </div>`
                    }!ma && null == H && 0 < pb && (Ya = `
                            <div class="payoutContainer"
                                style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                                <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                                        class="${symbolScatter} symbol_atlas"
                                        style="display: block; transform-origin: left top; transform: scale(0.5); margin-left: -2px; margin-top: -22px;"></span>
                                </div>
                                <div class="payoutDescContainer"
                                    style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                                    <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${Cb}</div>
                                </div>
                                <div class="payoutTextContainer"
                                    style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                                    <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${Qa} Free Spin(s)
                                    </div>
                                </div>
                            </div>
                        ` + Ya);
                0 == H.length && (Ya += `<div id="no-winning-combination-container"
                                            style="display: flex; width: inherit; height: 48px; justify-content: center; align-items: center; margin: 0px auto;">
                                            <div id="no-winning-combination-text" style="font-size: 14px; color: rgb(204, 204, 204);">${historyTranslation.No_Winning_Combination}
                                            </div>
                                        </div>`);
                if (ma) {
                    for (let sa = 0; sa < S.length; sa++) 0 < mb ? 3 == S.length ? Xa += `<div class="mul_x${S[sa]} history_assets" style="${fa}"></div>` : 4 == S.length && (Xa = 0 == sa || 3 == sa ? Xa + `<div class="mul_x${S[sa]} history_assets" style="${gb}"></div>` : Xa + `<div class="mul_x${S[sa]} history_assets" style="${fa}"></div>`) : Xa += `<div class="mul_x${S[sa]} history_assets" style="${gb}"></div>`;
                    wb = wb.replace("{MULTIFREESPIN}", Xa);
                    J = J.replace("{MULTIFREESPIN}", Xa);
                    J = J.replace(ka,
                        "")
                } else {
                    for (let sa = 0; sa < S.length; sa++) Xa += `<div class="mul_x${S[sa]} history_assets"
                                style="${yb}"></div>`;
                    J = J.replace("{MULTINORMALSPIN}", Xa);
                    J = J.replace(R, "")
                }
                for (let sa = 0; sa < qa.length; sa++) {
                    var Ha = "";
                    for (let ra = 0; ra < qa[sa].length; ra++) {
                        var Na = qa[sa][ra],
                            Sa = "symbol_0:1:0" == qa[sa][ra] || "symbol_0:1:0" == qa[sa][ra] ? "special_symbol_atlas" : "symbol_atlas",
                            Ga = sa * qa[sa].length + (qa[sa].length - ra) - 1;
                        "_blank" == Na || Na.slice(-1);
                        var Ta = "";
                        if ("_blank" != Na && Na.includes(":")) {
                            var Oa = Na.split(":");
                            Na = Oa[0] + "_" + Oa[1];
                            1 == Oa[2] ? Ta = "silver" : 2 == Oa[2] && (Ta =
                                "gold");
                            var hb = 0 < Oa[2] ? `<span class="lcu_history_frame_packed ${Ta}_${Oa[2]}_${Oa[1]}" style="transform-origin: left top; position: absolute; transform: scale(0.51);"></span>` : "";
                            Ha = xb.includes(Ga) ? Ha + L + B + `    
                                                                            
                                        <span
                                        class="${Na} ${Sa}"
                                        style="${W}"></span>
                                        </div>
                                                                                
                                    ` : 0 == mb ? Ha + L + `
                                            
                                            <span
                                            class="${Na} ${Sa}"
                                            style="${W}"></span>
                                            ` + hb + "\n                                                            </div>\n                                                            " : Ha + L + `
                                            <span
                                            class="${Na} ${Sa}"
                                            style="${O};"></span>
                                            ` + hb + "\n                                                            </div>\n                                                            "
                        }
                    }
                    N = N + V + Ha + "</div>"
                }
                be.LogHistoryDetailResult.push({
                    spin_title: be.SpinTitle[fb],
                    date: ob,
                    hour: Ca
                });
                J = J.replace(G, "");
                J = J.replace(I, "");
                J = J.replace(Q, "");
                J = J.replace(M, "");
                J = J.replace(X, "");
                J = J.replace(na, "");
                J = J.replace(U, "");
                J = J.replace(y, Ja);
                J = J.replace(C, ta);
                J = J.replace(y, Ja);
                J = J.replace(C, ta);
                J = J.replace("{PAYOUT}",
                    Ya);
                J = J.replace("{BG_REEL}", aa);
                J = J.replace("{SLOTCOLUMN}", N);
                J = J.replace("{MULTIFREESPIN}", "");
                J = J.replace("{MULTINORMALSPIN}", "")
            }
            tb += J
        }
        be.LogHistorySlideTotal = va
    }
    e.LogHistoryDetailTitle = be.SpinTitle[0];
    e.LogHistoryDetailDateHour = ob + " " + Ca;
    p = p.replace("{LOG_TITLE}", be.SpinTitle[0]);
    p = p.replace("{Date}", ob);
    p = p.replace("{Time}", Ca);
    p = p.replace("{GMT}", h);
    p = p.replace(x, tb);
    e.LogHistoryDetailTemplate = p;

    document.getElementById("game-shell").innerHTML = p;
    
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
