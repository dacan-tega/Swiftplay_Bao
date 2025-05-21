<?php

$imageBaseUrl = '/games/'.$game_folder.'/';
?>
<style>
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
</style>
<style>
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
        -webkit-overflow-scrolling: touch;
        overflow-x: hidden;
        overflow-y: scroll
    }

    .history.mobile-horizontal .rcs-custom-scroll .rcs-inner-container {
        -webkit-overflow-scrolling: touch;
        overflow-y: scroll
    }

    .history .rcs-custom-scroll .rcs-inner-container:after {
        background-image: linear-gradient(180deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .05) 60%, transparent);
        content: "";
        height: 0;
        left: 0;
        pointer-events: none;
        position: absolute;
        right: 0;
        top: 0;
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
        box-sizing: border-box;
        height: 100%;
        opacity: 0;
        padding: 6px 0;
        pointer-events: none;
        position: absolute;
        right: 3px;
        transition: opacity .4s ease-out;
        width: 6px;
        will-change: opacity;
        z-index: 1
    }

    .history .rcs-custom-scroll .rcs-custom-scrollbar.rcs-custom-scrollbar-rtl {
        left: 3px;
        right: auto
    }

    .history .rcs-custom-scroll.rcs-scroll-handle-dragged .rcs-custom-scrollbar {
        opacity: 1
    }

    .history .rcs-custom-scroll .rcs-custom-scroll-handle {
        position: absolute;
        top: 0;
        width: 100%
    }

    .history .rcs-custom-scroll .rcs-inner-handle {
        background-color: hsla(0, 0%, 46%, .7);
        border-radius: 3px;
        height: calc(100% - 12px);
        margin-top: 6px
    }



    #calendar-selection-container {
        display: flex;
        flex-direction: column;
        font-size: 12px;
        height: 126px;
        position: absolute;
        top: 0;
        width: 360px
    }

    #calendar-view-container {
        height: 640px;
        position: absolute;
        top: 0;
        width: 360px;
        z-index: 3
    }

    #calendar-view-background {
        background-color: rgba(0, 0, 0, .6);
        font-size: 12px;
        height: 640px;
        position: absolute;
        width: 360px;
        z-index: 1
    }

    #calendar-view-container-horizontal {
        font-size: 20px;
        height: calc(100% - 10px);
        padding-left: 30px;
        width: calc(100% - 30px)
    }

    .calendar-line-separator {
        height: 1px;
        width: 100%
    }

    #custom-page-container {
        display: flex;
        flex-direction: column;
        font-size: 12px;
        height: 272px;
        position: absolute;
        top: 0;
        width: 360px
    }

    .calendar-item-container {
        align-items: center;
        display: flex;
        transition: opacity .1s ease-out
    }

    .calendar-item-container:active {
        opacity: .5
    }

    .calendar-item-container-vertical {
        height: 42px;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center
    }

    .calendar-item-container-horizontal {
        height: 60px;
        text-align: left
    }

    .calendar-item-label {
        width: 100%
    }

    #calendar-custom-container {
        display: flex;
        flex-direction: row
    }

    #calendar-custom-view-container {
        height: 272px;
        position: relative;
        width: 360px
    }

    #calendar-arrow-image-container {
        align-items: center;
        display: flex;
        justify-content: center;
        padding-left: 10px
    }

    #calendar-arrow {
        transition: transform .15s ease-out
    }

    #calendar-view-container-horizontal-mobile {
        font-size: 14px;
        height: calc(100% - 10px);
        padding-left: 30px;
        width: 245px;
        z-index: 2
    }

    .calendar-item-container-horizontal-mobile {
        height: 36px;
        text-align: left
    }

    #calendar-view-background-horizontal-mobile {
        background-color: rgba(0, 0, 0, .7);
        font-size: 14px;
        height: 100%;
        left: 50px;
        position: absolute;
        top: 0;
        width: calc(100% - 50px);
        z-index: 2
    }


    #container-view {
        background-color: hsla(0, 0%, 100%, 0);
        color: hsla(0, 0%, 100%, .6);
        font-size: 14px;
        height: inherit;
        margin: 0 auto;
        position: relative;
        width: inherit
    }



    .transition-transform-on {
        transition: transform .15s ease-out
    }

    .transition-width-on {
        transition: width .26s cubic-bezier(.19, 1, .22, 1)
    }

    .game-list-column-container {
        align-items: center;
        display: flex;
        flex-direction: column;
        height: inherit;
        justify-content: center
    }

    .game-list-view-container {
        height: inherit;
        margin: 0 auto;
        position: absolute;
        width: inherit
    }

    #game-list-view-navbar-container {
        position: relative;
        z-index: 2
    }

    #game-list-view-navbar-container-horizontal {
        box-shadow: 1px 0 4px 0 rgba(0, 0, 0, .3);
        position: relative;
        z-index: 2
    }

    #game-list-view-navbar-container-horizontal-mobile {
        display: flex;
        z-index: 5
    }

    #game-list-view-contents-container {
        height: inherit;
        position: relative;
        width: 100%;
        z-index: 1
    }

    #game-list-view-wrapper {
        display: flex;
        height: 100%;
        position: relative;
        width: 100%;
        z-index: 1
    }

    #game-list-detail-wrapper {
        display: block;
        height: inherit;
        overflow: hidden;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 2
    }

    .game-list-detail-wrapper-h {
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .5);
        height: 640px !important;
        width: 360px !important
    }

    #game-list-nav {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin: 0 auto;
        width: 100%
    }

    .game-list-nav-horizontal {
        flex-direction: row
    }

    .game-list-nav-vertical-card {
        background-color: #2b1f19;
        background-size: cover;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, .75);
        flex-direction: row
    }

    #game-list-nav-bar {
        display: flex;
        margin: 0 auto;
        position: relative
    }

    .game-list-nav-bar-vertical {
        flex-direction: row;
        height: calc(100% - 2px);
        width: 100%
    }

    .game-list-nav-bar-horizontal {
        flex-direction: column;
        height: 100%;
        width: calc(100% - 3px)
    }

    #game-title-wrapper {
        align-items: center;
        display: flex;
        position: relative
    }

    .game-title-wrapper-vertical {
        justify-content: center;
        line-height: 12px;
        min-height: 12px;
        padding-top: 4px;
        width: 200px
    }

    .game-title-wrapper-horizontal {
        justify-content: flex-start;
        line-height: 40px;
        min-height: 40px;
        padding-top: 14px;
        width: 200px
    }

    .game-title-wrapper-horizontal-navbar {
        justify-content: flex-start;
        line-height: 25px;
        min-height: 25px;
        width: 100%
    }

    #game-title-label {
        color: #a9a9ae;
        position: absolute;
        transform-origin: center center;
        white-space: nowrap
    }

    .game-title-label-vertical {
        left: 0;
        margin: auto;
        right: 0;
        text-align: center
    }

    .game-list-nav-image-container {
        align-items: center;
        display: flex;
        justify-content: center;
        transition: opacity .1s ease-out;
        width: 22.22%
    }

    .game-list-nav-image-container:active {
        opacity: .5
    }

    .game-list-nav-image-container-slot {
        height: inherit
    }

    .game-list-nav-image-container-card {
        height: 80%;
        justify-content: flex-start;
        padding-top: 3%
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
        align-items: center;
        height: 100%;
        justify-content: center;
        text-align: center;
        width: 55.55%
    }

    .game-list-nav-label-container-horizontal {
        align-items: flex-start;
        height: 100px;
        padding-left: 8%;
        padding-top: 76px;
        text-align: left
    }

    .game-list-nav-period-label {
        font-size: 14px
    }

    .game-list-nav-subtitle-label {
        font-size: 11px;
        line-height: 11px;
        margin-top: 2px
    }

    #game-free-spin-nav-label-wrapper {
        display: flex;
        height: 14px;
        line-height: 14px;
        position: relative
    }

    #game-free-spin-nav-label {
        font-size: 14px;
        position: absolute;
        transform-origin: left center;
        white-space: nowrap
    }

    #game-list-nav-table-header {
        align-items: center;
        display: flex;
        flex-direction: row;
        position: relative
    }

    .game-list-nav-table-header-vertical {
        font-size: 10px;
        height: 36px;
        padding-left: 20px;
        padding-right: 10px
    }

    .game-list-nav-table-header-vertical>div:first-child,
    .game-list-nav-table-header-vertical>div:nth-child(2) {
        width: 23%
    }

    .game-list-nav-table-header-vertical>div:nth-child(3) {
        justify-content: flex-end;
        width: 22%
    }

    .game-list-nav-table-header-vertical>div:nth-child(4) {
        justify-content: flex-end;
        width: 25%
    }

    .game-list-nav-table-header-horizontal {
        font-size: 20px;
        height: 84px;
        line-height: 24px;
        padding-left: 30px;
        padding-right: 5%
    }

    .game-list-nav-table-header-horizontal>div:first-child {
        width: 20%
    }

    .game-list-nav-table-header-horizontal>div:nth-child(2) {
        width: 30%
    }

    .game-list-nav-table-header-horizontal>div:nth-child(3),
    .game-list-nav-table-header-horizontal>div:nth-child(4) {
        justify-content: flex-end;
        width: 20%
    }

    #game-list-nav-table-item-container {
        display: flex;
        flex-direction: column;
        height: inherit;
        justify-content: space-evenly
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
        height: 100%;
        width: 1px
    }

    .game-list-nav-row-container {
        align-items: center;
        display: flex;
        flex-direction: row;
        height: 20px;
        justify-content: center
    }

    .game-list-item-container {
        align-items: center;
        display: flex;
        flex-direction: row;
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
        font-size: 10px;
        height: 54px;
        padding-left: 20px;
        padding-right: 10px
    }

    .game-list-item-container-vertical>div:first-child {
        width: 23%
    }

    .game-list-item-container-vertical>div:nth-child(2) {
        width: 24%
    }

    .game-list-item-container-vertical>div:nth-child(3) {
        justify-content: flex-end;
        margin-left: 11px;
        width: 18%
    }

    .game-list-item-container-vertical>div:nth-child(4) {
        justify-content: flex-end;
        margin-left: 15px;
        width: 20%
    }

    .game-list-item-container-vertical>div:nth-child(5) {
        width: 7%
    }

    .game-list-item-container-horizontal {
        font-size: 20px;
        height: 76px;
        line-height: 24px;
        padding-left: 30px;
        padding-right: 5%
    }

    .game-list-item-container-horizontal>div:first-child {
        width: 20%
    }

    .game-list-item-container-horizontal>div:nth-child(2) {
        width: 30%
    }

    .game-list-item-container-horizontal>div:nth-child(3),
    .game-list-item-container-horizontal>div:nth-child(4) {
        justify-content: flex-end;
        width: 20%
    }

    .game-list-item-container-horizontal>div:nth-child(5) {
        align-items: center;
        width: 10%
    }

    #game-list-item-arrow-image-container {
        align-items: center;
        display: flex;
        justify-content: center
    }

    .game-list-item-column-container {
        align-items: flex-start;
        display: flex;
        flex-direction: column;
        height: inherit;
        justify-content: center
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
        line-height: 50px;
        transform-origin: left top;
        width: 30px
    }

    .game-list-item-collapse-info {
        background-color: rgba(0, 0, 0, .26);
        border-radius: 25px;
        display: flex;
        flex-direction: row;
        height: 50px;
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
        display: flex;
        flex-direction: row;
        font-size: 11px;
        line-height: 11px;
        z-index: 1
    }

    .game-list-footer-container-vertical {
        bottom: 0;
        padding-left: 20px;
        padding-right: 10px;
        position: absolute;
        width: calc(100% - 30px)
    }

    .game-list-footer-container-vertical>div:first-child {
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: center;
        text-align: left;
        width: 43%
    }

    .game-list-footer-container-vertical>div:nth-child(2),
    .game-list-footer-container-vertical>div:nth-child(3) {
        width: 25%
    }

    .game-list-footer-container-horizontal {
        height: 147px;
        padding-left: 30px;
        padding-right: 5%;
        position: relative
    }

    .game-list-footer-container-horizontal>div:first-child {
        text-align: left;
        width: 50%
    }

    .game-list-footer-container-horizontal>div:nth-child(2),
    .game-list-footer-container-horizontal>div:nth-child(3) {
        text-align: right;
        width: 20%
    }

    .game-list-footer-container-horizontal>div:nth-child(4) {
        text-align: right;
        width: 10%
    }

    #game-list-footer-date-container {
        position: relative
    }

    .game-list-footer-date-container-horizontal {
        display: flex;
        flex-direction: column;
        padding-top: 50px
    }

    #game-list-footer-date-vertical {
        display: flex;
        min-height: 25px;
        position: relative
    }

    #game-list-footer-date-label-vertical {
        line-height: 25px;
        position: absolute;
        transform-origin: left center;
        white-space: nowrap
    }

    .game-list-footer-date-label-horizontal {
        font-size: 30px;
        line-height: 33px;
        transform-origin: left center;
        transition: font-size .2s cubic-bezier(.19, 1, .22, 1);
        white-space: nowrap
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
        position: relative
    }

    .game-list-footer-item-wrapper {
        margin-top: -5.5px;
        position: absolute;
        right: 0;
        text-align: end;
        top: 50%;
        transform-origin: right
    }

    #scroll-view {
        overflow: hidden;
        position: relative
    }

    #load-more-container {
        align-items: center;
        bottom: 0;
        display: flex;
        height: 80px;
        justify-content: center;
        position: absolute;
        width: inherit
    }

    #load-more-label {
        text-align: center;
        width: 100%
    }

    #game-list-touch-prevention {
        height: inherit;
        position: absolute;
        top: 0;
        width: inherit;
        z-index: 5
    }

    #game-banner-container {
        background-color: #fff;
        position: absolute;
        width: 100%
    }

    #game-banner-image {
        transform: translateY(-13%);
        width: 100%
    }

    #game-banner-tint {
        background-color: rgba(0, 0, 0, .6);
        left: 0;
        position: absolute;
        top: 0;
        width: 360px
    }

    #calendar-container {
        position: relative;
        z-index: 3
    }

    #game-list-scroll-view-container {
        height: 100%;
        width: 100%
    }

    #scroll-to-top-background {
        align-items: center;
        border-radius: 50%;
        box-shadow: 0 2px 8px 2px rgba(0, 0, 0, .3);
        display: flex;
        height: 60px;
        justify-content: center;
        left: 93%;
        position: absolute;
        top: 85%;
        transform: translateZ(0);
        -webkit-transform: translateZ(1px);
        width: 60px;
        z-index: 3
    }

    #scroll-to-top-background:active {
        opacity: .5
    }

    #game-list-nav-container-card {
        position: absolute;
        transform: translateY(-3px) scaleX(.3) scaleY(.45);
        transform-origin: top left
    }

    .gh-angle-vertical {
        border: solid #000;
        border-width: 0 1px 1px 0;
        display: inline-block;
        padding: 3px
    }

    .gh-angle-horizontal {
        border: solid #000;
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 8px
    }

    .gh-angle-wrapper {
        align-items: center;
        display: flex;
        height: 30px;
        justify-content: center;
        transform: translateY(4px);
        width: 30px
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
        height: 2px;
        position: relative;
        width: 32px
    }

    .gh-arrow-right {
        transform: scale(-1)
    }

    .gh-arrow:after,
    .gh-arrow:before {
        background-color: inherit;
        content: "";
        height: 2px;
        position: absolute;
        width: 22px
    }

    .gh-arrow:after {
        right: 15px;
        top: 7px;
        transform: rotate(45deg)
    }

    .gh-arrow:before {
        right: 15px;
        top: -7px;
        transform: rotate(-45deg)
    }



    #loading-exit.vertical {
        height: 32px;
        position: absolute;
        right: 15px;
        top: 13px;
        width: 32px
    }

    #loading-exit.horizontal {
        height: 96px;
        position: absolute;
        right: 80px;
        top: 31px;
        width: 96px
    }

    .exit-icon {
        align-items: center;
        display: flex;
        justify-content: center
    }

    .exit-icon.vertical {
        height: 32px;
        width: 32px
    }

    .exit-icon.horizontal {
        height: 96px;
        width: 96px
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
        height: 32px;
        position: absolute;
        right: 20px;
        top: 25px;
        width: 32px
    }

    .exit-icon-stroke-horizontal-mobile {
        height: 26px;
        width: 1px
    }

    .exit-icon.horizontal-mobile {
        height: 32px;
        width: 32px
    }



    .gh_theme_sprite {
        background-image: url(data:image/png;base64,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);
        background-repeat: no-repeat;
        display: inline-block;
        overflow: hidden
    }

    .gh_ic_nav_bonus_game {
        background-position: -1px -1px;
        height: 48px;
        width: 48px
    }

    .gh_ic_nav_collapse {
        background-position: -51px -1px;
        height: 48px;
        width: 48px
    }

    .gh_ic_nav_free_spin {
        background-position: -101px -1px;
        height: 48px;
        width: 48px
    }

    .gh_ic_nav_freehand {
        background-position: -151px -1px;
        height: 48px;
        width: 48px
    }

    .gh_ic_nav_gift {
        background-position: -201px -1px;
        height: 48px;
        width: 48px
    }

    .gh_ic_nav_jackpot {
        background-position: -251px -1px;
        height: 48px;
        width: 48px
    }

    .gh_ic_nav_super6 {
        background-position: -301px -1px;
        height: 48px;
        width: 48px
    }


    body {
        height: 100vh;
        margin: 0;
        width: 100vw
    }

    #game-shell {
        display: flex;
        height: 100%;
        position: fixed;
        width: 100%;		
		top: 0px;
		left : 0px;
    }

    #game-overlay {
        height: 0;
        position: absolute;
        width: 0
    }

    #background-img {
        background-size: cover;
        bottom: -10%;
        height: 110%;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: 100%
    }

    #block-page,
    #scroll-area {
        height: 100%;
        position: absolute;
        width: 100%
    }

    #block-page {
        left: 0;
        margin: auto;
        top: 0
    }


    body,
    canvas,
    div {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        display: block;
        outline: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    input::-webkit-inner-spin-button,
    input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0
    }

    video {
        height: 100%;
        width: 100%
    }

    body {
        -ms-scroll-chaining: none;
        height: 100vh;
        margin: 0;
        overscroll-behavior: contain;
        width: 100vw
    }

    canvas {
        background-color: transparent
    }

    a:active,
    a:hover,
    a:link,
    a:visited {
        color: #666
    }

    p.header {
        font-size: small
    }

    p.footer {
        font-size: x-small
    }

    .game-shell {
        font-family: PingFang SC, Microsoft YaHei, WenQuanYi Micro Hei, sans-serif;
        touch-action: none
    }

    .screen_compat {
        height: auto;
        margin: auto;
        max-height: 780px;
        min-height: 640px;
        position: absolute;
        width: 360px
    }

    .screen_compat_land {
        height: 360px;
        margin: auto;
        max-width: 780px;
        min-width: 640px;
        position: absolute;
        width: auto
    }

    .screen_safe_area {
        height: 640px;
        width: 360px;
        z-index: 0
    }

    .screen_safe_area,
    .screen_safe_area_land {
        bottom: 0;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0;
        top: 0
    }

    .screen_safe_area_land {
        height: 360px;
        width: 640px
    }

    .background_ios11 {
        height: 100vmax;
        position: absolute
    }

    .screen_color {
        background-color: #000
    }

    #splash {
        background-image: url(blob:https://m.pg-demo.com/7260440f-0a81-4b7c-84d3-935470d96d0d);
        background-position: 50%;
        background-size: cover;
        position: absolute
    }

    #background-img {
        background-image: url(blob:https://m.pg-demo.com/777dd85c-123f-4671-9b55-b6e8cd648ae1);
        background-position: 50%
    }

    #landscape_cover {
        align-items: center;
        background-color: #000;
        flex-direction: column;
        height: 100vh;
        justify-content: center;
        left: 0;
        opacity: .85;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1050
    }

    #landscape_cover img {
        margin-bottom: 20px;
        width: 10%
    }

    #landscape_cover p {
        color: #fff;
        font-size: 5.5vmin;
        margin: 0;
        padding: 0
    }

    #orientation_cover {
        align-items: center;
        background-color: #000;
        flex-direction: column;
        height: 100vh;
        justify-content: center;
        left: 0;
        opacity: .85;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1050
    }

    #orientation_cover img {
        margin-bottom: 20px;
        width: 10%
    }

    #orientation_cover p {
        color: #fff;
        font-size: 5.5vmin;
        margin: 0;
        padding: 0
    }

    .orientation_cover_flex {
        display: flex
    }

    .orientation_cover_none {
        display: none
    }

    .landscape_cover_flex {
        display: flex
    }

    .landscape_cover_none {
        display: none
    }

    .mirror {
        transform: scaleX(-1)
    }

    .direction_rtl {
        direction: rtl
    }

    .rotate_icon_scale_translate {
        transform: scale(1.8) translateY(-50%)
    }

    .rotate_icon_scale_translate_land {
        transform: scale(1.8) translateY(-50%) rotate(270deg)
    }

    .rotate_icon_scale_translate.mirror {
        transform: scale(-1.8, 1.8) translateY(-50%)
    }

    #tips-text {
        margin-top: 4px;
        text-align: center;
        text-overflow: ellipsis;
        width: 90%
    }

    .tips-text-child2-hidden {
        display: none
    }

    .tips-text-child2 {
        margin-left: 5px
    }

    .tips-text-child2-rtl {
        margin-right: 5px
    }

    @media only screen and (orientation:landscape) {
        .background_ios11 {
            height: 100vmin
        }

        .landscape_cover_show {
            display: flex
        }
    }

    .splash_hidden {
        visibility: hidden
    }

    .start-button-container-land,
    .start-button-container-land-pc,
    .start-button-container-port {
        align-items: center;
        display: flex;
        justify-content: center;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0
    }

    .start-button-container-port {
        height: 32px;
        top: 481px;
        width: 151.7px
    }

    .start-button-container-land,
    .start-button-container-land-pc {
        font-size: 12px;
        height: 22px;
        top: 271px;
        width: 106px
    }

    .start-button {
        background-color: #30a2d0;
        border: 2px solid rgba(0, 0, 0, .15);
        border-radius: 8px;
        text-shadow: 0 2px 3px #30a2d0
    }

    .start-button-show-land,
    .start-button-show-land-pc,
    .start-button-show-port {
        animation-name: show-bounce
    }

    .start-button-show-land,
    .start-button-show-land-pc {
        animation-name: show-bounce-land
    }

    .start-button-inner {
        background-image: linear-gradient(180deg, hsla(0, 0%, 100%, .5), hsla(0, 0%, 100%, 0));
        background-origin: border-box;
        border: .87px solid hsla(0, 0%, 100%, .4);
        border-radius: 6px;
        bottom: 0;
        left: 0;
        position: absolute;
        right: 0;
        top: 0
    }

    .custom-start-button-inner {
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: contain;
        height: 100%;
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate3d(-50%, -50%, 0);
        width: 100%
    }

    @keyframes show-bounce {
        0% {
            transform: scale(0)
        }

        20% {
            transform: scale(1.2)
        }

        50% {
            transform: scale(.98)
        }

        to {
            transform: scale(1)
        }
    }

    @keyframes show-bounce-land {
        0% {
            transform: scale(0)
        }

        20% {
            transform: scale(.84)
        }

        50% {
            transform: scale(.68)
        }

        to {
            transform: scale(.7)
        }
    }

    .text-land,
    .text-land-pc,
    .text-port {
        color: #fff;
        font-size: 10.3px;
        margin: 0;
        padding: 0
    }

    .text-land,
    .text-land-pc {
        transform: scale(.8)
    }

    .start-button .text-land,
    .start-button .text-land-pc,
    .start-button .text-port {
        font-size: 12px;
        font-weight: 900
    }

    .version {
        bottom: 86px;
        font-size: 12px;
        position: absolute;
        text-align: center;
        width: 100%
    }

    .dark .text-port {
        color: #000
    }

    .animationTipsContainer-land,
    .animationTipsContainer-land-pc,
    .animationTipsContainer-port {
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 35px;
        margin: 515px auto 0;
        position: relative;
        width: 100%
    }

    .animationTipsContainer-port {
        margin-top: 515px;
        z-index: 1
    }

    .animationTipsContainer-land,
    .animationTipsContainer-land-pc {
        margin-top: 288px;
        transform: scale(.8)
    }

    .ui_block_page {
        margin: auto;
        z-index: 1100
    }

    .ui_block,
    .ui_block_page {
        background-color: #000;
        bottom: 0;
        left: 0;
        opacity: .6;
        position: absolute;
        right: 0;
        top: 0
    }

    .ui_block {
        transform: translateZ(0)
    }

    @keyframes ui_block_show {
        0% {
            opacity: 0
        }

        to {
            opacity: .6
        }
    }

    @keyframes ui_block_hide {
        0% {
            opacity: .6
        }

        to {
            opacity: 0
        }
    }

    .custom_alert .content .btn_content .button,
    .custom_alert .content .btn_content .custom_button {
        color: inherit;
        font-size: 14px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }

    .custom_alert {
        display: block;
        display: none;
        height: 100%;
        height: 640px;
        margin: auto;
        position: absolute;
        width: inherit;
        width: 360px;
        z-index: 1000
    }

    .custom_alert .content {
        background-color: #fff;
        border-radius: 6px;
        box-shadow: 1px 1px 8.7px #444;
        position: absolute;
        text-align: center;
        width: 243px
    }

    .custom_alert .content .message,
    .custom_alert .content .title {
        font-size: 14px;
        margin-left: 5%;
        margin-right: 5%;
        width: 90%
    }

    .custom_alert .content .message {
        white-space: normal
    }

    .custom_alert .content .title_padding {
        padding-bottom: 0;
        padding-top: 9.7px
    }

    .custom_alert .content .message_padding {
        padding-bottom: 9.7px;
        padding-top: 9.7px
    }

    .custom_alert .content .single_content_padding {
        padding-bottom: 9.7px;
        padding-top: 19.3px
    }

    .custom_alert .content .line_separator {
        border-bottom: 1px solid #000;
        opacity: .1;
        padding-top: 8.7px
    }

    .custom_alert .content .btn_content_row {
        display: table;
        table-layout: fixed;
        width: 100%
    }

    .custom_alert .content .btn_content .button {
        animation: btn_release .1s linear forwards;
        padding: 9.7px 10px 11.3px
    }

    .custom_alert .content .btn_content .button:active {
        animation: btn_press .1s linear forwards
    }

    .custom_alert .content .btn_content .custom_button {
        align-items: center;
        display: flex;
        height: 32px;
        justify-content: center
    }

    .custom_alert .content .btn_content .row {
        display: table-cell
    }

    .custom_alert .content .btn_content .btn_separator_height {
        background-color: #000;
        height: 1px;
        opacity: .1;
        width: inherit
    }

    .custom_alert .content .btn_content .btn_separator_width {
        background-color: #000;
        height: inherit;
        opacity: .1;
        width: 1px
    }

    .custom_alert .custom_content {
        padding: 20px
    }

    @media screen and (orientation:portrait) {
        .custom_alert {
            display: block;
            height: 100%;
            height: 640px;
            position: absolute;
            width: inherit;
            width: 360px;
            z-index: 1000
        }
    }

    @media screen and (orientation:landscape) {
        .custom_alert {
            display: none;
            height: 100%;
            height: 640px;
            position: absolute;
            width: inherit;
            width: 360px;
            z-index: 1000
        }
    }

    .custom_alert_ignore_orientation {
        display: block;
        height: 100%;
        height: 640px;
        position: absolute;
        width: inherit;
        width: 360px;
        z-index: 1000
    }

    @keyframes custom_alert_anim_show {
        0% {
            opacity: 0
        }

        60% {
            opacity: 1;
            transform: scale(1)
        }

        80% {
            opacity: 1;
            transform: scale(1.12)
        }

        to {
            opacity: 1;
            transform: scale(1)
        }
    }

    @keyframes custom_alert_anim_hide {
        0% {
            opacity: 1
        }

        to {
            opacity: 0
        }
    }

    .custom_alert_show {
        animation: custom_alert_anim_show .3s linear forwards
    }

    @keyframes btn_press {
        0% {
            opacity: 1
        }

        to {
            opacity: .5
        }
    }

    @keyframes btn_release {
        0% {
            opacity: .5
        }

        to {
            opacity: 1
        }
    }

    .errorlabel {
        font-size: 10px
    }

    .animated_text_wrap {
        color: #fff;
        font-size: 10px;
        height: 26px;
        line-height: 26px;
        position: relative;
        text-align: center;
        width: 100%
    }

    .dark .animated_text_wrap {
        color: #000
    }

    .animated_text_wrap_hide {
        display: none
    }

    .animated_text {
        align-items: center;
        display: flex;
        height: 26px;
        justify-content: center;
        line-height: 13px;
        margin: 0;
        opacity: 0;
        position: absolute;
        top: 100%;
        width: 100%
    }

    .animated-text-move-to-top-port,
    .animated-text-reset-to-bottom-port {
        opacity: 0
    }

    .animated-text-reset-to-bottom-port {
        top: 26px
    }

    .animated-text-move-to-top-port,
    .animated_text_move_to_center {
        transition: top 1s, opacity 1s;
        transition-timing-function: linear
    }

    .animated_text_move_to_center {
        opacity: 1;
        top: 0
    }

    .animated-text-move-to-top-port {
        top: -30px
    }

    .sprite_main_res {
        background-image: url(blob:https://m.pg-demo.com/a803ac52-84e9-4db9-b7a4-e8bfbd1f61a2);
        background-repeat: no-repeat;
        background-size: 222px 248px;
        display: inline-block
    }

    .ic_360 {
        background-position: -162px -217px;
        height: 21px;
        width: 20px
    }

    .ic_arrow_back {
        background-position: -110px -181px;
        height: 22px;
        width: 22px
    }

    .ic_arrow_right {
        background-position: -211px -95px;
        height: 12px;
        width: 8px
    }

    .ic_chrome {
        background-position: -182px -193px;
        height: 20px;
        width: 20px
    }

    .ic_close_white {
        background-position: -187px -95px;
        height: 22px;
        width: 22px
    }

    .ic_dialog_close {
        background-position: -134px -181px;
        height: 22px;
        width: 22px
    }

    .ic_iconic {
        background-position: -1px -1px;
        height: 178px;
        width: 158px
    }

    .ic_ios_share_button {
        background-position: -184px -215px;
        height: 23px;
        width: 16px
    }

    .ic_operator_logo_details {
        background-position: -68px -223px;
        height: 24px;
        width: 92px
    }

    .ic_operator_select {
        background-position: -187px -119px;
        height: 22px;
        width: 22px
    }

    .ic_pg_logo {
        background-position: -68px -181px;
        height: 40px;
        width: 40px
    }

    .ic_pg_logo_small {
        background-position: -110px -205px;
        height: 12px;
        width: 27px
    }

    .ic_qq {
        background-position: -187px -143px
    }

    .ic_qq,
    .ic_quark {
        height: 22px;
        width: 22px
    }

    .ic_quark {
        background-position: -187px -167px
    }

    .ic_rotate_screen {
        background-position: -161px -1px;
        height: 60px;
        width: 60px
    }

    .ic_step_1 {
        background-position: -204px -191px;
        height: 14px;
        width: 14px
    }

    .ic_step_2 {
        background-position: -139px -205px;
        height: 14px;
        width: 15px
    }

    .ic_step_arrow {
        background-position: -211px -109px;
        height: 12px;
        width: 7px
    }

    .ic_swipeup_arrow {
        background-position: -161px -63px;
        height: 128px;
        width: 24px
    }

    .ic_swipeup_hand {
        background-position: -1px -181px;
        height: 55px;
        width: 65px
    }

    .ic_swipeup_round {
        background-position: -187px -63px;
        height: 30px;
        width: 30px
    }

    .ic_uc {
        background-position: -158px -193px;
        height: 22px;
        width: 22px
    }

    .loading-container-land,
    .loading-container-land-pc,
    .loading-container-port {
        align-items: center;
        display: flex;
        flex-direction: column;
        left: 0;
        position: absolute;
        right: 0
    }

    .loading-container-port {
        top: 477px
    }

    .loading-container-land,
    .loading-container-land-pc {
        top: 265px
    }

    .progress-bar-container-land,
    .progress-bar-container-land-pc,
    .progress-bar-container-port {
        background-color: initial;
        height: 13px;
        position: relative;
        width: 212px
    }

    .progress-bar-container-land,
    .progress-bar-container-land-pc {
        transform: scale(.7)
    }

    .progress-bar-background {
        background-color: #111;
        border-radius: 3.5px;
        height: 100%;
        position: absolute;
        width: 100%
    }

    .progress-bar-outline {
        border-radius: 3.5px;
        bottom: 0;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transform: translateZ(0)
    }

    .border-inner {
        border: 1.7px solid #272727
    }

    .border-outer {
        border: .85px solid #111
    }

    .progress-bar-fill-container {
        bottom: .87px;
        left: .87px;
        position: absolute;
        right: .87px;
        top: .87px
    }

    .progress-bar-fill {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        background-color: #30a2d0;
        background-size: 8.7px 100%;
        border-radius: 3.5px;
        height: 100%;
        position: absolute;
        width: 0
    }

    .stripes {
        animation-duration: 1s;
        animation-iteration-count: infinite;
        animation-name: animate-stripes;
        animation-timing-function: linear;
        background-image: linear-gradient(-75deg, hsla(0, 0%, 100%, 0) 35%, hsla(0, 0%, 100%, .1) 0, hsla(0, 0%, 100%, .1) 75%, hsla(0, 0%, 100%, 0) 0, hsla(0, 0%, 100%, 0))
    }

    .front-highlight {
        background-image: linear-gradient(90deg, hsla(0, 0%, 100%, 0), #fff);
        border-radius: 0 3.5px 3.5px 0;
        height: 100%;
        max-width: 20px;
        right: 0;
        width: 50%
    }

    .front-highlight,
    .top-highlight {
        position: absolute;
        transform: translateZ(0)
    }

    .top-highlight {
        background-color: hsla(0, 0%, 100%, .2);
        border-radius: 3.5px 3.5px 0 0;
        height: 50%;
        width: 100%
    }

    @keyframes animate-stripes {
        0% {
            background-position: 0 0
        }

        to {
            background-position: 34.7px 0
        }
    }

    .custom-progress-bar-container {
        align-items: center;
        display: flex;
        height: 40px;
        justify-content: center;
        width: 240px
    }

    .custom-progress-bar-background {
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: contain;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 3
    }

    .custom-progress-bar-fill-container {
        border-radius: 3px;
        height: 24px;
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate3d(-50%, -50%, 0);
        width: 221px;
        z-index: 2
    }

    #npveSplash {
        z-index: 975
    }

    .npve_container .npve_bottom_content .npve_bottom_button_title_land,
    .npve_container .npve_bottom_content .npve_bottom_button_title_port,
    .npve_container .npve_bottom_content .npve_bottom_land,
    .npve_container .npve_bottom_content .npve_bottom_port,
    .npve_container .npve_bottom_content .npve_grid_1,
    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_desc,
    .npve_container .npve_bottom_content .npve_text_bold_port,
    .npve_container .npve_bottom_content .npve_text_content_land,
    .npve_container .npve_bottom_content .npve_text_content_port,
    .npve_container .npve_bottom_content .npve_text_note_land,
    .npve_container .npve_bottom_content .npve_text_note_port,
    .npve_container .npve_bottom_content .npve_text_wrapper_land,
    .npve_container .npve_bottom_content .npve_text_wrapper_port,
    .npve_container .npve_middle_content .npve_main_desc_land,
    .npve_container .npve_middle_content .npve_main_desc_port {
        transform: scale(.87)
    }

    .npve_container .npve_middle_content .npve_continue_desc_land,
    .npve_container .npve_middle_content .npve_continue_desc_port {
        transform: scale(.75)
    }

    .npve_screen_compact {
        background-color: #fff;
        height: 640px;
        margin: auto;
        position: absolute;
        transform: translateZ(0);
        width: 360px
    }

    .npve_visible {
        visibility: visible
    }

    .npve_container {
        background-color: #fff;
        display: flex;
        flex-direction: column;
        font-size: 12px;
        height: 100%;
        position: relative;
        width: 100%
    }

    .npve_container .npve_top_content {
        display: flex;
        justify-content: space-between;
        margin: 26px
    }

    .npve_container .npve_top_content .title {
        color: #000;
        font-size: 16px;
        line-height: 16px;
        max-width: 216.7px;
        text-align: right
    }

    .npve_container .npve_middle_content_port {
        margin: 0 43.3px
    }

    .npve_container .npve_middle_content {
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center
    }

    .npve_container .npve_middle_content .npve_iconic_port {
        display: table;
        transform: scale(.87)
    }

    .npve_container .npve_middle_content .npve_iconic_land {
        display: table;
        margin-top: -90px;
        transform: scale(.62)
    }

    .npve_container .npve_middle_content .npve_main_desc_land,
    .npve_container .npve_middle_content .npve_main_desc_port {
        color: #000;
        display: flex;
        line-height: 20px
    }

    .npve_container .npve_middle_content .npve_main_desc_port {
        line-height: 26px;
        margin-top: -16px;
        min-height: 150px;
        text-align: justify;
        width: 312px
    }

    .npve_container .npve_middle_content .npve_main_desc_land {
        justify-content: center;
        margin: -25px 0 10px;
        min-height: 50px;
        text-align: center;
        width: 700px
    }

    .npve_container .npve_middle_content .npve_continue_button:hover,
    .npve_container .npve_middle_content .npve_continue_button_land:hover,
    .npve_container .npve_middle_content .npve_continue_button_port:hover {
        cursor: pointer;
        opacity: .5
    }

    .npve_container .npve_middle_content .npve_continue_button,
    .npve_container .npve_middle_content .npve_continue_button_land,
    .npve_container .npve_middle_content .npve_continue_button_port {
        background-color: rgba(81, 211, 33, .2);
        border: 1px solid #51d321;
        border-radius: 4px;
        color: #50d221;
        text-align: center;
        width: 100%
    }

    .npve_container .npve_middle_content .npve_continue_button_port {
        height: 43.3px;
        line-height: 43.3px
    }

    .npve_container .npve_middle_content .npve_continue_button_land {
        font-size: 13px;
        height: 32px;
        line-height: 32px;
        width: 314px
    }

    .npve_container .npve_middle_content .npve_continue_button_active {
        opacity: .5
    }

    .npve_container .npve_middle_content .npve_continue_desc_land,
    .npve_container .npve_middle_content .npve_continue_desc_port {
        color: #000;
        line-height: 17.3px;
        opacity: .3;
        text-align: center
    }

    .npve_container .npve_middle_content .npve_continue_desc_port {
        margin-top: 5px;
        width: 364px
    }

    .npve_container .npve_middle_content .npve_continue_desc_land {
        height: 34px;
        margin-top: 8px;
        width: 736px
    }

    .npve_container .npve_bottom_content_port {
        min-height: 130px
    }

    .npve_container .npve_bottom_content_land {
        max-height: 80px;
        min-height: 60px
    }

    .npve_container .npve_bottom_content {
        bottom: 0;
        display: flex;
        flex: 1;
        flex-direction: column;
        left: 0;
        position: absolute;
        right: 0
    }

    .npve_container .npve_bottom_content .npve_separate_line_port {
        background-color: #000;
        height: 1.3px;
        margin-left: 43.3px;
        margin-right: 43.3px;
        margin-top: 10px;
        opacity: .1
    }

    .npve_container .npve_bottom_content .npve_separate_line_land {
        background-color: #000;
        height: 1.3px;
        margin-left: 20px;
        margin-right: 20px;
        opacity: .1
    }

    .npve_container .npve_bottom_content .npve_bottom_port {
        display: block
    }

    .npve_container .npve_bottom_content .npve_bottom_land {
        align-items: center;
        display: flex;
        justify-content: center;
        min-height: 60px
    }

    .npve_container .npve_bottom_content .npve_bottom_button_title_land,
    .npve_container .npve_bottom_content .npve_bottom_button_title_port,
    .npve_container .npve_bottom_content .npve_text_wrapper_land,
    .npve_container .npve_bottom_content .npve_text_wrapper_port {
        color: #000;
        flex: 1;
        line-height: 14px
    }

    .npve_container .npve_bottom_content .npve_bottom_button_title_port {
        margin-bottom: 10px;
        margin-top: 10px;
        text-align: justify
    }

    .npve_container .npve_bottom_content .npve_bottom_button_title_land {
        display: block;
        margin-right: 30px;
        max-width: 260px;
        min-width: 260px;
        text-align: center
    }

    .npve_container .npve_bottom_content .npve_text_wrapper_port {
        text-align: justify
    }

    .npve_container .npve_bottom_content .npve_text_wrapper_land {
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center
    }

    .npve_container .npve_bottom_content .npve_text_content_land,
    .npve_container .npve_bottom_content .npve_text_content_port {
        align-items: center;
        display: flex
    }

    .npve_container .npve_bottom_content .npve_text_content_port {
        justify-content: left
    }

    .npve_container .npve_bottom_content .npve_text_content_land {
        justify-content: center;
        width: 736px
    }

    .npve_container .npve_bottom_content .npve_text_bold_port {
        font-weight: 700;
        margin: 10px 0
    }

    .npve_container .npve_bottom_content .npve_text_bold_land {
        font-weight: 700;
        margin-right: 16px;
        max-width: 200px;
        text-align: center
    }

    .npve_container .npve_bottom_content .npve_line_text_port {
        max-width: 130px;
        text-align: justify
    }

    .npve_container .npve_bottom_content .npve_line_text_land {
        max-width: 250px;
        text-align: justify
    }

    .npve_container .npve_bottom_content .npve_line_num {
        margin-right: 12px;
        min-width: 14px;
        transform: scale(1.2)
    }

    .npve_container .npve_bottom_content .npve_line_arrow_land,
    .npve_container .npve_bottom_content .npve_line_arrow_port {
        min-width: 7px;
        transform: scale(1.2)
    }

    .npve_container .npve_bottom_content .npve_line_arrow_port {
        margin: 0 20px
    }

    .npve_container .npve_bottom_content .npve_line_arrow_land {
        margin: 0 16px
    }

    .npve_container .npve_bottom_content .npve_text_note_land,
    .npve_container .npve_bottom_content .npve_text_note_port {
        line-height: 16px;
        opacity: .3
    }

    .npve_container .npve_bottom_content .npve_text_note_port {
        margin-top: 15px;
        text-align: justify
    }

    .npve_container .npve_bottom_content .npve_text_note_land {
        margin-top: 11px;
        text-align: center;
        width: 736px
    }

    .npve_container .npve_bottom_content .npve_grid_1 {
        align-items: center;
        display: flex;
        flex: 2;
        justify-content: center
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content:hover {
        color: #0f55cc;
        cursor: pointer
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content {
        align-items: center;
        color: #000;
        display: flex;
        flex: 1;
        flex-direction: column
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row {
        align-items: center;
        display: flex;
        flex-direction: row
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_icon {
        min-width: 20px
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_desc {
        display: block;
        line-height: 12px;
        margin-left: 5px;
        max-width: 150px;
        text-align: left
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_desc .grid_desc_title {
        text-decoration: underline
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_desc .grid_desc_seperator {
        height: 5px
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_desc .grid_desc_content {
        opacity: .3
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_row .grid_desc_active_color {
        color: #0f55cc
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_text {
        color: #000;
        display: flex;
        flex: 1;
        line-height: 10px;
        opacity: .3;
        text-align: center
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_text_center {
        justify-content: center
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_text_left {
        justify-content: flex-start
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_content .grid_text_right {
        justify-content: flex-end
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_item_center {
        align-items: center
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_item_left {
        align-items: flex-start
    }

    .npve_container .npve_bottom_content .npve_grid_1 .grid_item_right {
        align-items: flex-end
    }

    .qpage {
        background-color: #fff;
        height: 640px;
        margin: auto;
        position: absolute;
        width: 360px;
        z-index: 975
    }

    .qpage_container {
        background-color: #fff;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-align: center;
        width: 100%;
        z-index: 950
    }

    .qpage_container .qpage_content {
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: center
    }

    .qpage_container .qpage_content .qpage_boy {
        transform: scale(.82)
    }

    .qpage_container .qpage_content .qpage_title {
        color: #000;
        font-size: 20px;
        line-height: 20px;
        position: relative;
        text-align: center;
        top: 0;
        width: 80%
    }

    .qpage_container .qpage_content .qpage_desc {
        color: #000;
        font-size: 11.3px;
        line-height: 14px;
        opacity: .3;
        position: relative;
        text-align: center;
        top: 8.7px;
        width: 80%
    }

    .qpage_container .qpage_content .qpage_button {
        background-color: rgba(24, 17, 84, .075);
        border-radius: 2px;
        color: #000;
        font-size: 10.3px;
        height: 36.3px;
        line-height: 36.3px;
        margin-top: 20px;
        max-width: 303.3px;
        min-width: 156px
    }

    .footer-container {
        display: flex;
        height: 77px
    }

    .footer-container,
    .footer-mask-container-land,
    .footer-mask-container-port {
        bottom: 0;
        position: absolute;
        width: 100%
    }

    .footer-mask-container-port {
        display: flex;
        flex-direction: column;
        height: 229px
    }

    .footer-mask-container-land {
        height: 131px
    }

    .footer-mask {
        height: 100%;
        position: absolute;
        width: 100%
    }

    .footer-mask-black {
        background-image: linear-gradient(180deg, rgba(0, 0, 0, .03), #000)
    }

    .footer-mask-color {
        background-image: linear-gradient(180deg, hsla(0, 0%, 100%, 0), #fff)
    }

    .footer-container img {
        height: 117px;
        width: 100%
    }

    .footer-image-container {
        display: flex;
        height: 100%;
        justify-content: center;
        position: absolute;
        width: 100%;
        z-index: 0
    }

    #footer-copyright-image {
        background-image: url(shell-res/copyright.png);
        background-position: 50%;
        background-size: cover;
        height: 12px;
        position: absolute;
        transform: scale(.6);
        width: 480px
    }

    .footer-text-img {
        transition: .2s
    }

    .logo-container {
        align-items: center;
        display: flex;
        flex-direction: row-reverse;
        position: absolute;
        right: 0
    }

    .swipeup_text {
        bottom: 40px;
        font-size: 12px
    }

    .swipeup_container,
    .swipeup_text {
        color: #fff;
        left: 0;
        position: absolute;
        right: 0
    }

    .swipeup_container {
        bottom: 0;
        height: 270px;
        margin: auto;
        top: 0;
        width: 224px
    }

    .swipeup_slide_container {
        left: 50%;
        position: absolute;
        top: 29px;
        transform: scale(1);
        transform-origin: center top
    }

    .swipeup_background {
        animation: swipeup_background_anim .75s forwards;
        background-color: #000;
        border-radius: 7px;
        height: 100%;
        opacity: .8;
        width: 100%
    }

    .swipeup_arrow {
        animation: swipeup_arrow_fade_anim, swipeup_arrow_clip_anim;
        animation-duration: 2.4s, 2.4s;
        animation-iteration-count: infinite, infinite;
        animation-timing-function: ease, cubic-bezier(.84, 0, .16, 1);
        left: -12px;
        opacity: 0;
        position: absolute
    }

    .swipeup_slide {
        animation: swipeup_slide_anim;
        animation-duration: 2.4s;
        animation-iteration-count: infinite;
        animation-timing-function: cubic-bezier(.84, 0, .16, 1);
        position: absolute;
        top: 126px
    }

    .swipeup_round {
        animation: swipeup_round_anim 2.4s infinite;
        left: -16px;
        opacity: 1;
        position: absolute;
        top: -20px
    }

    .swipeup_hand {
        animation: swipeup_hand_anim 2.4s infinite;
        left: -9px;
        opacity: 1;
        position: absolute;
        top: -12px
    }

    @keyframes swipeup_background_anim {
        0% {
            opacity: 0
        }

        to {
            opacity: .8
        }
    }

    @keyframes swipeup_arrow_clip_anim {

        0%,
        33% {
            height: 129px
        }

        to {
            height: 0
        }
    }

    @keyframes swipeup_arrow_fade_anim {

        0%,
        17% {
            opacity: 0
        }

        50%,
        to {
            opacity: .6
        }
    }

    @keyframes swipeup_slide_anim {

        0%,
        33% {
            transform: translateY(0)
        }

        to {
            transform: translateY(-120px)
        }
    }

    @keyframes swipeup_round_anim {
        0% {
            opacity: 0
        }

        33%,
        to {
            opacity: 1
        }
    }

    @keyframes swipeup_hand_anim {
        0% {
            transform: scale(1)
        }

        33%,
        to {
            transform: scale(.9)
        }
    }

    #canvas-shadow {
        background-color: #000;
        display: block;
        -webkit-filter: drop-shadow(2px 2px 10px rgba(0, 0, 0, .5));
        filter: drop-shadow(2px 2px 10px rgba(0, 0, 0, .5));
        height: 736px;
        position: absolute;
        width: 414px
    }

	#game-details-view-container {
    font-size: 14px;
    height: inherit;
    margin: 0 auto;
    position: relative;
    width: 100%;
    z-index: 1
}

#game-detail-view-navbar-container {
    position: relative;
    width: 100%;
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
    clear: both;
    height: inherit;
    width: inherit
}

#game-details-left-arrow,
#game-details-right-arrow {
    align-items: center;
    border-radius: 50%;
    display: flex;
    height: 42px;
    justify-content: center;
    position: absolute;
    transform: translateZ(0);
    transition: opacity .1s ease-out;
    width: 42px;
    z-index: 2
}

#game-details-left-arrow:active,
#game-details-right-arrow:active {
    opacity: .5
}

.game-detail-nav-label-container-horizontal {
    justify-content: center
}

#replay-buttons-container {
    align-items: center;
    bottom: 8px;
    display: flex;
    height: 64px;
    left: 50%;
    padding: 0 25px;
    position: absolute;
    transform: translate3d(-50%, 0, 1px);
    width: 310px;
    z-index: 3
}

.replay-icon-container {
    align-items: center;
    display: flex;
    height: 32px;
    justify-content: center;
    width: 32px
}

.replay-spin-label-wrapper {
    height: 32px;
    position: relative;
    width: 118px
}

.replay-spin-label {
    font-size: 12px;
    font-weight: 700;
    left: 50%;
    line-height: 32px;
    position: absolute;
    transform-origin: left center;
    white-space: nowrap
}

.replay-button-bg {
    border-radius: 16px;
    display: flex;
    height: 32px;
    width: 150px
}

.replay-button-bg:active {
    opacity: .5
}

.replay-icon-bg {
    align-items: center;
    background-color: #fff;
    border-radius: 50%;
    display: flex;
    height: 21px;
    justify-content: center;
    transition: opacity .1s ease-out;
    width: 21px
}

.replay-icon-triangle {
    border-style: solid;
    border-width: 5px 0 5px 8.7px;
    height: 0;
    transform: translateX(2px);
    width: 0
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
        background-image: url('<?php echo $imageBaseUrl; ?>25.png');
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

   
.frame_atlas {
    background-image: url('<?php echo $imageBaseUrl; ?>21.png');
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.beer_base_1x2 {
    background-position: -1px -1483px;
    height: 246px;
    width: 150px
}

.beer_base_1x3 {
    background-position: -761px -989px;
    height: 369px;
    width: 150px
}

.beer_base_1x4 {
    background-position: -1px -1px;
    height: 492px;
    width: 150px
}

.symbol_6x1 {
    background-position: -913px -1485px;
    height: 123px;
    width: 150px
}

.symbol_6x2 {
    background-position: -153px -1483px;
    height: 246px;
    width: 150px
}

.symbol_6x3 {
    background-position: -761px -1360px;
    height: 369px;
    width: 150px
}

.symbol_6x4 {
    background-position: -1px -495px;
    height: 492px;
    width: 150px
}

.symbol_7x2 {
    background-position: -305px -1483px;
    height: 246px;
    width: 150px
}

.symbol_7x3 {
    background-position: -913px -1px;
    height: 369px;
    width: 150px
}

.symbol_7x4 {
    background-position: -1px -989px;
    height: 492px;
    width: 150px
}

.symbol_7x1 {
    background-position: -1217px -1487px;
    height: 123px;
    width: 150px
}

.symbol_7x2 {
    background-position: -457px -1483px;
    height: 246px;
    width: 150px
}

.symbol_7x3 {
    background-position: -1065px -1px;
    height: 369px;
    width: 150px
}

.symbol_7x4 {
    background-position: -153px -1px;
    height: 492px;
    width: 150px
}

.clover_base_1x2 {
    background-position: -609px -1483px;
    height: 246px;
    width: 150px
}

.clover_base_1x3 {
    background-position: -1217px -1px;
    height: 369px;
    width: 150px
}

.clover_base_1x4 {
    background-position: -153px -495px;
    height: 492px;
    width: 150px
}

.symbol_3x1 {
    background-position: -1369px -1487px;
    height: 123px;
    width: 150px
}

.symbol_3x2 {
    background-position: -1065px -1114px;
    height: 246px;
    width: 150px
}

.symbol_3x3 {
    background-position: -1369px -1px;
    height: 369px;
    width: 150px
}

.symbol_3x4 {
    background-position: -153px -989px;
    height: 492px;
    width: 150px
}

.hat_base_1x2 {
    background-position: -1065px -1362px;
    height: 246px;
    width: 150px
}

.hat_base_1x3 {
    background-position: -1521px -1px;
    height: 369px;
    width: 150px
}

.hat_base_1x4 {
    background-position: -305px -1px;
    height: 492px;
    width: 150px
}

.symbol_2x1 {
    background-position: -1521px -1239px;
    height: 123px;
    width: 150px
}

.symbol_2x2 {
    background-position: -1217px -743px;
    height: 246px;
    width: 150px
}

.symbol_2x3 {
    background-position: -1673px -1px;
    height: 369px;
    width: 150px
}

.symbol_2x4 {
    background-position: -305px -495px;
    height: 492px;
    width: 150px
}

.horseshoe_base_1x2 {
    background-position: -1369px -743px;
    height: 246px;
    width: 150px
}

.horseshoe_base_1x3 {
    background-position: -913px -372px;
    height: 369px;
    width: 150px
}

.horseshoe_base_1x4 {
    background-position: -305px -989px;
    height: 492px;
    width: 150px
}

.symbol_5x1 {
    background-position: -1673px -1239px;
    height: 123px;
    width: 150px
}

.symbol_5x2 {
    background-position: -1521px -743px;
    height: 246px;
    width: 150px
}

.symbol_5x3 {
    background-position: -1065px -372px;
    height: 369px;
    width: 150px
}

.symbol_5x4 {
    background-position: -457px -1px;
    height: 492px;
    width: 150px
}

.low_base_1x2 {
    background-position: -1673px -743px;
    height: 246px;
    width: 150px
}

.low_base_1x3 {
    background-position: -1217px -372px;
    height: 369px;
    width: 150px
}

.low_base_1x4 {
    background-position: -457px -495px;
    height: 492px;
    width: 150px
}

.symbol_8x1 {
    background-position: -1521px -1364px;
    height: 123px;
    width: 150px
}

.symbol_8x2 {
    background-position: -1217px -991px;
    height: 246px;
    width: 150px
}

.symbol_8x3 {
    background-position: -1369px -372px;
    height: 369px;
    width: 150px
}

.symbol_8x4 {
    background-position: -457px -989px;
    height: 492px;
    width: 150px
}

.symbol_9x1 {
    background-position: -1521px -1364px;
    height: 123px;
    width: 150px
}

.symbol_9x2 {
    background-position: -1217px -991px;
    height: 246px;
    width: 150px
}

.symbol_9x3 {
    background-position: -1369px -372px;
    height: 369px;
    width: 150px
}

.symbol_9x4 {
    background-position: -457px -989px;
    height: 492px;
    width: 150px
}

.symbol_10x1 {
    background-position: -1521px -1364px;
    height: 123px;
    width: 150px
}

.symbol_10x2 {
    background-position: -1217px -991px;
    height: 246px;
    width: 150px
}

.symbol_10x3 {
    background-position: -1369px -372px;
    height: 369px;
    width: 150px
}

.symbol_10x4 {
    background-position: -457px -989px;
    height: 492px;
    width: 150px
}

.symbol_11x1 {
    background-position: -1521px -1364px;
    height: 123px;
    width: 150px
}

.symbol_11x2 {
    background-position: -1217px -991px;
    height: 246px;
    width: 150px
}

.symbol_11x3 {
    background-position: -1369px -372px;
    height: 369px;
    width: 150px
}

.symbol_11x4 {
    background-position: -457px -989px;
    height: 492px;
    width: 150px
}

.symbol_12x1 {
    background-position: -1521px -1364px;
    height: 123px;
    width: 150px
}

.symbol_12x2 {
    background-position: -1217px -991px;
    height: 246px;
    width: 150px
}

.symbol_12x3 {
    background-position: -1369px -372px;
    height: 369px;
    width: 150px
}

.symbol_12x4 {
    background-position: -457px -989px;
    height: 492px;
    width: 150px
}

.olay1x2 {
    background-position: -1217px -1239px;
    height: 246px;
    width: 150px
}

.olay1x3 {
    background-position: -1521px -372px;
    height: 369px;
    width: 150px
}

.olay1x4 {
    background-position: -609px -1px;
    height: 492px;
    width: 150px
}

.pipe_base_1x2 {
    background-position: -1369px -991px;
    height: 246px;
    width: 150px
}

.pipe_base_1x3 {
    background-position: -1673px -372px;
    height: 369px;
    width: 150px
}

.pipe_base_1x4 {
    background-position: -609px -495px;
    height: 492px;
    width: 150px
}

.symbol_4x1 {
    background-position: -1673px -1364px;
    height: 123px;
    width: 150px
}

.symbol_4x2 {
    background-position: -1521px -991px;
    height: 246px;
    width: 150px
}

.symbol_4x3 {
    background-position: -913px -743px;
    height: 369px;
    width: 150px
}

.symbol_4x4 {
    background-position: -609px -989px;
    height: 492px;
    width: 150px
}

.goldx2 {
    background-position: -1673px -991px;
    height: 246px;
    width: 150px
}

.silverx2 {
    background-position: -1369px -1239px;
    height: 246px;
    width: 150px
}

.goldx3 {
    background-position: -913px -1114px;
    height: 369px;
    width: 150px
}

.silverx3 {
    background-position: -1065px -743px;
    height: 369px;
    width: 150px
}

.goldx4 {
    background-position: -761px -1px;
    height: 492px;
    width: 150px
}

.silverx4 {
    background-position: -761px -495px;
    height: 492px;
    width: 150px
}
.special_symbol_atlas {
    background-image: url('<?php echo $imageBaseUrl; ?>22.png');
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.symbol_0_1 {
    background-position: -1px -1px
}

.symbol_0_1,
.symbol_1_1 {
    height: 124px;
    width: 124px
}

.symbol_1_1 {
    background-position: -127px -1px
}

.symbol_atlas {
    background-image: url('<?php echo $imageBaseUrl; ?>20.png');
    background-repeat: no-repeat;
    display: inline-block;
    overflow: hidden
}

.symbol_6_1 {
    background-position: -1px -1px;
	height: 124px;
    width: 124px
}
.symbol_6_2 {
    background-position: -1px -1px;
	height: 124px;
    width: 124px
}
.symbol_6_3 {
    background-position: -1px -1px;
	height: 124px;
    width: 124px
}
.symbol_6_4 {
    background-position: -1px -1px;
	height: 124px;
    width: 124px
}



.symbol_7_1 {
    background-position: -127px -1px;
	height: 124px;
    width: 124px
}
.symbol_7_2 {
    background-position: -127px -1px;
	height: 124px;
    width: 124px
}
.symbol_7_3 {
    background-position: -127px -1px;
	height: 124px;
    width: 124px
}
.symbol_7_4 {
    background-position: -127px -1px;
	height: 124px;
    width: 124px
}

.symbol_3_1 {
	height: 124px;
    width: 124px;
    background-position: -253px -1px
}
.symbol_3_2 {
	height: 124px;
    width: 124px
    background-position: -253px -1px
}
.symbol_3_3 {
	height: 124px;
    width: 124px;
    background-position: -253px -1px;
}
.symbol_3_4 {
	height: 124px;
    width: 124px;
    background-position: -253px -1px;
}

.symbol_2_1 {
    background-position: -379px -1px;
	height: 124px;
    width: 124px;
}

.symbol_2_2 {
    background-position: -379px -1px;
	height: 124px;
    width: 124px;
}
.symbol_2_3 {
    background-position: -379px -1px;
	height: 124px;
    width: 124px;
}
.symbol_2_4 {
    background-position: -379px -1px;
	height: 124px;
    width: 124px;
}
.symbol_5_1 {
    background-position: -505px -1px;
	height: 124px;
    width: 124px
}
.symbol_5_2 {
    background-position: -505px -1px;
	height: 124px;
    width: 124px
}
.symbol_5_3 {
    background-position: -505px -1px;
	height: 124px;
    width: 124px
}
.symbol_5_4 {
    background-position: -505px -1px;
	height: 124px;
    width: 124px
}



.symbol_4_1 {
    background-position: -631px -1px;
	height: 124px;
    width: 124px
	
}
.symbol_4_2 {
    background-position: -631px -1px;
	height: 124px;
    width: 124px
	
}
.symbol_4_3 {
    background-position: -631px -1px;
	height: 124px;
    width: 124px
	
}
.symbol_4_4 {
    background-position: -631px -1px;
	height: 124px;
    width: 124px
	
}

.symbol_12_1 {
    background-position: -757px -1px;
	height: 124px;
    width: 124px
}

.symbol_12_2 {
    background-position: -757px -1px;
	height: 124px;
    width: 124px
}

.symbol_12_3 {
    background-position: -757px -1px;
	height: 124px;
    width: 124px
}

.symbol_12_4 {
    background-position: -757px -1px;
	height: 124px;
    width: 124px
}

.symbol_12_,
.symbol_8_ {
    height: 124px;
    width: 124px
}

.symbol_8_1 {
    background-position: -883px -1px;
	height: 124px;
    width: 124px
}
.symbol_8_2 {
    background-position: -883px -1px;
	height: 124px;
    width: 124px
}
.symbol_8_3 {
    background-position: -883px -1px;
	height: 124px;
    width: 124px
}
.symbol_8_4 {
    background-position: -883px -1px;
	height: 124px;
    width: 124px
}
.symbol_11_1 {
    background-position: -1009px -1px;
	height: 124px;
    width: 124px
}
.symbol_11_2 {
    background-position: -1009px -1px;
	height: 124px;
    width: 124px
}
.symbol_11_3 {
    background-position: -1009px -1px;
	height: 124px;
    width: 124px
}
.symbol_11_4 {
    background-position: -1009px -1px;
	height: 124px;
    width: 124px
}

.symbol_11_,
.symbol_9_1 {
    height: 124px;
    width: 124px
}

.symbol_9_1 {
    background-position: -1135px -1px;
	height: 124px;
    width: 124px
}
.symbol_9_2 {
    background-position: -1135px -1px;
	height: 124px;
    width: 124px
}
.symbol_9_3 {
    background-position: -1135px -1px;
	height: 124px;
    width: 124px
}
.symbol_9_4 {
    background-position: -1135px -1px;
	height: 124px;
    width: 124px
}

.symbol_10_1 {
    background-position: -1261px -1px;
	height: 124px;
    width: 124px
}
.symbol_10_2 {
    background-position: -1261px -1px;
	height: 124px;
    width: 124px
}
.symbol_10_3 {
    background-position: -1261px -1px;
	height: 124px;
    width: 124px
}
.symbol_10_4 {
    background-position: -1261px -1px;
	height: 124px;
    width: 124px
}

.symbol_10,
.s_scatter {
    height: 124px;
    width: 124px
}

.s_scatter {
    background-position: -1387px -1px
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
}
</style>

<div id="game-list-detail-wrapper" class="game-list-detail-wrapper-h">
    <div id="game-details-view-container"
        style="background-color: rgb(48, 48, 59); color: rgba(255, 255, 255, 0.6); overflow: hidden; -webkit-font-smoothing: antialiased;">
        <div id="game-detail-view-navbar-container" class=""
            style="height: 88px; padding-top: 0px; background-color: rgb(36, 36, 46);">
            <div style="position: absolute; z-index: 4; height: inherit; width: inherit;">
                <div id="game-list-nav" style="background-color: rgb(36, 36, 46);">
                    <div id="game-list-nav-bar" class="game-list-nav-bar-vertical"
                        style="height: calc(100% - 2px);">
                        <div
                            class="game-list-nav-image-container game-list-nav-image-container-slot">
                            <div id="game-list-nav-image-left" class="game-list-nav-image "
                                style="transform: scaleX(0.7) scaleY(0.7);">

                            </div>
                        </div>
                        <div id="game-list-nav-label-container"
                            class="game-list-nav-label-container-vertical game-detail-nav-label-container-horizontal">
                            <div class="game-list-nav-row-container ">
                                <div id="game-free-spin-nav-label-wrapper" style="width: 84px;">
                                    <div id="game-free-spin-nav-label" class="title-top"
                                        style="color: rgb(255, 200, 36);">{LOG_TITLE}
                                    </div>
                                </div>
                            </div>
                            <div class="game-list-nav-subtitle-label "
                                style="color: rgba(255, 255, 255, 0.4);" class="date-time">
                                {Date} {Time} ({GMT})</div>
                        </div>
                        <div
                            class="game-list-nav-image-container game-list-nav-image-container-slot">
                            <div id="game-list-nav-image-right" class="game-list-nav-image"
                                style="display: flex;">
                                
                            </div>
                        </div>
                    </div>
                    <div class="game-list-nav-separator-vertical-slot"
                        style="background-color: rgb(48, 48, 60);"></div>
                </div>
            </div>
        </div>
        <div id="game-detail-spring-wrapper"
            style="position: absolute; height: 327.111px; transform: translate3d(0px, 0px, 0px);">
            <div id="game-details-page-container" style="height: 552px;">
                <div id="game-pages-window" style="position: relative;">
                    <!---START_SLIDE_ITEM---->
                    <div class="game-list-page"
                        style="width: 100%; height: 552px; position: absolute; left: 0px; left: {LEFT};">
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
                            <div class="history regular" style="width: inherit; height: 502px;">
                                <div class=" rcs-custom-scroll " style="height: inherit;">
                                    <div class="rcs-outer-container" style="height: 100%;">
                                        <div class="rcs-inner-container"
                                            style="height: 100%; margin-right: -17px;">
                                            <div
                                                style="height: 100%; overflow-y: visible; margin-right: 0px;">
                                                <div id="bet-details-container"
                                                    style="display: flex; flex-direction: column;">
                                                    <!---START_BET_INFO---->
                                                    <div id="bet-information-container"
                                                        style="display: flex; width: inherit; height: 50px; margin: 0px auto 5px; justify-content: center; align-items: center; padding-left: 10px; padding-right: 10px;">
                                                        <div id="rounds-label" style="font-size: 11px; text-align: center; word-break: break-word; color: rgb(255, 200, 36);">{Round_Title}</div>
                                                        {SPACE}
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
                                                    <!---END__MULTI_TOP_WIN---->

                                                    <!---START__MULTI_TOP_NORMAL---->
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
                                                            style="position: absolute; display: flex; justify-content: center; align-items: center; width: inherit; height: inherit; left: -40px; bottom: 25px; flex-flow: column wrap;">
                                                            <!---START_TEMPLATE_BODY---->

                                                            {SLOTCOLUMN}

                                                            <!---START__SYMBOL_NORMAL---->
                                                            <span
                                                                class="Symbol_4_1 symbol_atlas"
                                                                style="-xx2- display: block; position: absolute; transform-origin: left top; z-index: 0; margin-left: -6px; margin-top: -11px; transform: scale(0.5); -x2-"></span>
                                                            <!---END__SYMBOL_NORMAL---->

                                                            <!---START__SYMBOL_WIN---->
                                                            <span
                                                                class="Symbol_3_1 symbol_atlas"
                                                                style="-xx1- display: block; position: absolute; transform-origin: left top; z-index: 0; margin-left: -6px; margin-top: -11px; transform: scale(0.5); -x1-"></span>
                                                            <!---END__SYMBOL_WIN---->
                                                            
                                                            <!---START__FRAM__SYMBOL---->
                                                            <span class="symbol_atlas wh"
                                                                style="-xx6- display: block; position: absolute; transform-origin: left top; transform: scale(0.33) scaleY(-1);margin-top:40px -x6-"></span>
                                                            <!---END__FRAM__SYMBOL---->

                                                            <!---START__BG_SYMBOL_WIN---->
                                                            <span class="symbol_atlas wh"
                                                                style="display: block; position: absolute; transform-origin: left top; transform: scale(0.47); left: 0%; margin-top: 1px; margin-left: 5px;"></span>
                                                            <!---END__BG_SYMBOL_WIN---->

                                                            <!---START__CHANGE_CSS_SLOT_ITEM_COLUMN---->
                                                            <div id="slot-item-column">
                                                                <!---END__CHANGE_CSS_SLOT_ITEM_COLUMN---->

                                                                <!---START__CHANGE_CSS_SLOT_ITEM---->
                                                                <div id="slot-item"
                                                                    style="width: 49px; height: 40px;">
                                                                    <!---END__CHANGE_CSS_SLOT_ITEM---->

                                                                    <!---END_SAMBLE_BLOCK---->
                                                                </div>
                                                            </div>
                                                            <!---START__MULTI_BOT---->
                                                            <!---END__MULTI_BOT---->

                                                            <!---START__MULTI_BOT_NORMAL---->
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
                                                                style="display: flex; flex-direction: column; position: relative; justify-content: space-between; align-items: center; width: inherit; margin: auto;">
                                                                <!---START_PAYOUT_INFO---->
                                                                <div
                                                                    style="display: flex; flex-direction: column; position: relative; justify-content: space-between; align-items: center; width: inherit; margin: auto;">
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
                <div id="game-details-right-arrow" style="top: calc(50% - 85px); background-color: rgba(0, 0, 0, 0.4);">
                    <div class="gh-angle-wrapper" style="transform: translateX(-4px) scale(0.7);">
                        <div class="gh-angle-horizontal angle-right" style="border-color: rgb(255, 200, 36);"></div>
                    </div>
                </div>

                <div id="game-details-left-arrow" style="top: calc(50% - 85px); background-color: rgba(0, 0, 0, 0.4);">
                    <div class="gh-angle-wrapper" style="transform: translateX(4px) scale(0.7);">
                        <div class="gh-angle-horizontal angle-left" style="border-color: rgb(255, 200, 36);"></div>
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
    l = JSON.parse('<?php echo json_encode($remoteData); ?>');

    console.log(l);

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

    e = {};

    e.LogHistoryDetailResult = [];
    e.SpinTitle = [];
    e.RoundTitle = [];
    e.LogHistorySlideTotal = 0;
    e.CurrencyDecimal = ",";
    e.CurrencyThousand = ".";
    e.CurrencyPrefix = "Rp";
    e.formatMoney = function(a, b = 2, c = ".", d = ",") {
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

    c = (new Date).toTimeString().split(" ")[1];
        let h = 0 != c.charAt(4) ? c.slice(0, -2) + ":" + c.slice(-2) : c.slice(0, 4) + c.slice(5, 6) + ":" + c.slice(-2);
    
    var p = document.getElementById("game-list-detail-wrapper").innerHTML;
    p = p.replaceAll(/{CurrencyPrefix}/g, e.CurrencyPrefix);

    p = p.replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction);
    p = p.replace(/{Profit_Title}/g, historyTranslation.Profit);
    p = p.replace("{Calc_payout}", historyTranslation.Calc_payout);
    p = p.replace("{Payout_Title}", historyTranslation.Payout);


    const q = /(-xx1-)(.*?)(-x1-)/mg,
        r = /(-xx2-)(.*?)(-x2-)/mg,
        t = /(-xx3-)(.*?)(-x3-)/mg,
        u = /(-xx4-)(.*?)(-x4-)/mg,
        v = /(-xx5-)(.*?)(-x5-)/mg,
        x = /(-xx6-)(.*?)(-x6-)/mg,
        z = RegExp("\x3c!---START_SLIDE_ITEM----\x3e(.|\n|s|S)*?\x3c!---END_SLIDE_ITEM----\x3e",
            "i"),
        C = RegExp("\x3c!---START_BET_INFO----\x3e(.|\n|s|S)*?\x3c!---END_BET_INFO----\x3e", "i"),
        G = RegExp("\x3c!---START_TRANS_ITEM----\x3e(.|\n|s|S)*?\x3c!---END_TRANS_ITEM----\x3e", "i"),
        I = RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e(.|\n|s|S)*?\x3c!---END__CHANGE_CSS_SLOT_ITEM_COLUMN----\x3e", "i"),
        P = RegExp("\x3c!---START__CHANGE_CSS_SLOT_ITEM----\x3e(.|\n|s|S)*?\x3c!---END__CHANGE_CSS_SLOT_ITEM----\x3e", "i"),
        W = RegExp("\x3c!---START__BG_SYMBOL_WIN----\x3e(.|\n|s|S)*?\x3c!---END__BG_SYMBOL_WIN----\x3e",
            "i"),
        M = RegExp("\x3c!---START__SYMBOL_WIN----\x3e(.|\n|s|S)*?\x3c!---END__SYMBOL_WIN----\x3e", "i"),
        Q = RegExp("\x3c!---START__SYMBOL_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__SYMBOL_NORMAL----\x3e", "i"),
        ja = RegExp("\x3c!---START__FRAM__SYMBOL----\x3e(.|\n|s|S)*?\x3c!---END__FRAM__SYMBOL----\x3e", "i"),
        ma = RegExp("\x3c!---START__MULTI_TOP----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP----\x3e", "i"),
        U = RegExp("\x3c!---START__MULTI_BOT----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_BOT----\x3e", "i"),
        ca = RegExp("\x3c!---START__MULTI_TOP_WIN----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP_WIN----\x3e",
            "i"),
        xa = RegExp("\x3c!---START__MULTI_TOP_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_TOP_NORMAL----\x3e", "i"),
        ya = RegExp("\x3c!---START__MULTI_BOT_NORMAL----\x3e(.|\n|s|S)*?\x3c!---END__MULTI_bOT_NORMAL----\x3e", "i");
    var za = l.res_data,
        va = l.bet_size,
        da = l.bet_level,
        La = 0;
    const Va = p.match(z),
        D = p.match(C),
        A = p.match(G),
        y = p.match(I),
        w = p.match(P),
        aa = p.match(W),
        S = p.match(Q),
        ea = p.match(M),
        ra = p.match(ja),
        ha = p.match(ca),
        Ea = p.match(xa),
        Fa = p.match(ya),
        V = p.match(ma),
        L = p.match(ya);
    if (Va) {
        JSON.parse(JSON.stringify(Va[0]));
        var B = JSON.parse(JSON.stringify(Va[0])),
            E = JSON.parse(JSON.stringify(y[0])),
            K = JSON.parse(JSON.stringify(w[0])),
            Aa = JSON.parse(JSON.stringify(aa[0])),
            db = JSON.parse(JSON.stringify(S[0])),
            F = JSON.parse(JSON.stringify(ea[0]));
        F = JSON.parse(JSON.stringify(ea[0]));
        var ba = JSON.parse(JSON.stringify(ra[0])),
            O = JSON.parse(JSON.stringify(ha[0])),
            na = JSON.parse(JSON.stringify(Ea[0])),
            X = JSON.parse(JSON.stringify(Fa[0])),
            R = JSON.parse(JSON.stringify(V[0]));
        q.exec(F);
        var fa = r.exec(db);
        if (null != fa) var oa = fa[2];
        var gb = t.exec(O);
        if (null != gb) var sb = gb[2];
        var yb = u.exec(na);
        if (null != yb) var tb = yb[2];
        var Ja = v.exec(X);
        if (null != Ja) var ta = Ja[2];
        Ja = v.exec(X);
        null != Ja && (ta = Ja[2]);
        var wb = x.exec(ba);
        if (null != wb) var ia = wb[2];
        var ub = "";
        const Eb = oa;
        for (let Bb = 0; Bb < za.length; Bb++) {
            R = JSON.parse(JSON.stringify(V[0]));
            JSON.parse(JSON.stringify(L[0]));
            var Ma = za[Bb].result_json,
                eb = za[Bb].total_multi,
                ob = Ma.length,
                Ca = Ma.length - 1,
                la = Ma[Ca].spin_date,
                Z = Ma[Ca].spin_hour,
                pb = Ma[Ca].free_spin,
                Cb = pb ? "bg_free" : "bg_main",
                Qa = Ma[Ca].transaction,
                Ra = Ma[Ca].free_num,
                J = Ma[Ca].count_scatter,
                ua = Ma[Ca].free_num;
            for (let Wa = 0; Wa < ob; Wa++) {
                var ab = JSON.parse(JSON.stringify(A[0])),
                    pa = JSON.parse(JSON.stringify(D[0])),
                    T = JSON.parse(JSON.stringify(B));
                const bb = 360 * La;
                La++;
                e.LogHistorySlideTotal = La;
                var xb = Ma[Wa].round_title;
                T = T.replace("{LEFT}", `${bb}px`);
                pa = pa.replace("{Bet_Level_Title}", historyTranslation.Bet_Level);
                pa = pa.replaceAll(/{Bet__Size_Title}/g, historyTranslation.Bet_Size);
                pa = pa.replace("{LEVEL}", da);
                pa = pa.replace("{SIZE}", e.formatMoney(va, 2, e.CurrencyDecimal,
                    e.CurrencyThousand));
                "" != xb ? (pa = pa.replace("{SPACE}", '<div id="separator"\n                                            style="width: 2px; height: 12px; margin-left: 10px; margin-right: 10px; background-color: rgb(40, 40, 51);">\n                                            </div>'), pa = pa.replace("{Round_Title}", xb)) : (pa = pa.replace("{Round_Title}", ""), pa = pa.replace("{SPACE}", ""));
                var mb = Ma[Wa].profit,
                    H = Ma[Wa].bet_amount,
                    zb = Ma[Wa].credit,
                    vb = Ma[Wa].new_reel,
                    wa = Ma[Wa].multi_arr,
                    N = Ma[Wa].drop_position,
                    Xa = Ma[Wa].win_total,
                    Ya = Ma[Wa].symbol_win,
                    Za = "undefined" != Ma[Wa].count_symbol_multi ? Ma[Wa].count_symbol_multi : 0,
                    nb = Ma[Wa].spin_title,
                    qb = Ma[Wa].sure_win;
                e.SpinTitle.push(nb);
                e.RoundTitle.push(xb);
                e.LogHistoryDetailResult.push({
                    spin_title: nb,
                    date: la,
                    hour: Z
                });
                var Ha = "",
                    Na = "",
                    Sa = "";
                ab = ab.replace("{Transaction}", Qa);
                ab = ab.replace("{TotalBet}", e.formatMoney(H, 2, e.CurrencyDecimal, e.CurrencyThousand));
                ab = ab.replace("{Profit}", e.formatMoney(mb, 2, e.CurrencyDecimal, e.CurrencyThousand));
                ab = ab.replace("{Balance}",
                    e.formatMoney(zb, 2, e.CurrencyDecimal, e.CurrencyThousand));
                ab = ab.replaceAll(/{Transaction_Title}/g, historyTranslation.Transaction);
                ab = ab.replaceAll(/{Bet_Title}/g, historyTranslation.Bet);
                ab = ab.replace(/{Profit_Title}/g, historyTranslation.Profit);
                ab = ab.replace("{Balance_Title}", historyTranslation.Balance);
                qb && (Sa += '<div class="sure_win_container"\n                                            style="display: flex; flex-direction: column; justify-content: center; width: 305px; height: 48px; align-self: start;">\n                                            <div class="sure_win_text" style="font-size: 13px; color: rgba(255, 255, 255, 0.6); position: relative;">Sure Win\n                                                Activated </div>\n                                            </div>');
                0 < Za && (Sa += `
                                        <div style="display: flex; width: 100%; min-height: 48px; align-items: center; margin-bottom: 15px;">
                                            <div style="width: 20%; height: 45px;"><span class="symbol_2_1_1 symbol_atlas"
                                                    style="transform-origin: left top; transform: scale(0.5);"></span></div>
                                            <div style="width: 50%; min-width: 50%; display: flex; flex-direction: column; padding-right: 10px;"><label
                                                    style="font-size: 14px; color: rgb(204, 204, 204); text-align: left; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; white-space: normal; text-overflow: ellipsis;"></label><label
                                                    style="font-size: 11px; color: rgb(156, 155, 155); text-align: left; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"></label>
                                            </div>
                                            <div style="width: 30%; font-size: 14px; color: rgb(204, 204, 204); text-align: right;">+${Za}<div><label
                                                        style="font-size: 11px; color: rgb(156, 155, 155); text-align: right;">collected</label></div>
                                            </div>
                                        </div>

                            `);
                1 < eb && (Sa += `
                                    <div class="payoutContainer"
                                        style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                                        <div class="payoutDescContainer"
                                            style="width: 0px; position: relative; flex-direction: column; min-width: 0px; margin-top: 10px;"></div>
                                        <div class="payoutTextContainer"
                                            style="width: inherit; position: relative; flex-direction: column; min-width: inherit; margin-top: 10px;">
                                            <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">Win Multiplier x ${eb}
                                            </div>
                                        </div>
                                    </div>                                
                                    `);
                if (null != Ya)
                    for (let Y = 0; Y < Ya.length; Y++) {
                        var Ga = Ya[Y];
                        Xa = e.formatMoney(Ga.win_total, 2, e.CurrencyDecimal, e.CurrencyThousand);
                        var Ta = e.formatMoney(Ga.win_multi, 2, e.CurrencyDecimal, e.CurrencyThousand);
                        e.formatMoney(Ga.win_amount, 2, e.CurrencyDecimal, e.CurrencyThousand);
                        var Oa = "symbol_0:1:0" == Ga.name || "symbol_1:1:0" == Ga.name ? "special_symbol_atlas" : "symbol_atlas",
                            hb = e.formatMoney(Ga.win, 2, e.CurrencyDecimal, e.CurrencyThousand);
                        Sa += `
                                
                                    <div style="width: 285px; height: 48px; align-self: start;">
                                    <div class="payoutItem" style="display: flex; width: inherit; height: 48px;"><span class="${Ga.name}_1 ${Oa}"
                                            style="display: block; position: absolute; transform-origin: left top; transform: scale(0.4);"></span>
                                        <div class="textSection" style="display: flex; justify-content: space-between; margin-left: 60px;">
                                            <div class="textContent" style="text-align: left; margin-top: 7px; width: 150px;">
                                                <div id="ofAKindString" style="font-size: 14px; color: rgba(255, 255, 255, 0.6);">${historyTranslation.of_a_kind}
                                                </div>
                                                <div id="waysToWinString"
                                                    style="font-size: 12px; text-align: left; color: rgba(255, 255, 255, 0.4); line-height: 1;">${Ga.ways}
                                                    ${historyTranslation.way_s}</div>
                                            </div>
                                            <div class="textContent" style="text-align: right; margin-top: 15px; width: 70px;">
                                                <div style="font-size: 14px; color: rgba(255, 255, 255, 0.6); text-align: end;">${e.CurrencyPrefix}${Ta}</div>
                                                <div id="subWinText"
                                                    style="font-size: 11px; text-align: end; color: rgba(255, 255, 255, 0.4); line-height: 1;">${e.CurrencyPrefix}${hb} x ${Ga.total_multi}
                                                </div>
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
                                            <div id="tooltip-desc" style="font-size: 12px; text-align: left; padding: 0px 8px;">${va} x
                                                ${da}
                                                x ${Ga.payout} x ${Ga.ways} x ${Ga.total_multi}
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                    }!pb && 0 == Ya.length && 0 < Ra && (Sa = `
                            <div class="payoutContainer"
                                style="display: flex; width: 270px; height: 48px; justify-content: space-between; flex-direction: row; margin-bottom: 0px; margin-right: 18px;">
                                <div class="payoutImageContainer" style="min-width: 50px; width: 50px; height: inherit; position: relative;"><span
                                        class="${"symbol_0_1"} special_symbol_atlas"
                                        style="display: block; transform-origin: left top; transform: scale(0.5); margin-left: -2px; margin-top: -22px;"></span>
                                </div>
                                <div class="payoutDescContainer"
                                    style="width: 130px; position: relative; flex-direction: column; min-width: 130px; margin-top: 10px;">
                                    <div class="Desc" style="font-size: 12px; color: rgb(255, 255, 255); text-align: left;">x ${J}</div>
                                </div>
                                <div class="payoutTextContainer"
                                    style="width: 90px; position: relative; flex-direction: column; min-width: 90px; margin-top: 10px;">
                                    <div class="payoutTitle" style="font-size: 12px; color: rgb(255, 255, 255); text-align: right;">${ua} Free Spin(s)
                                    </div>
                                </div>
                            </div>
                        ` + Sa);
                0 == Ya.length && (Sa += `<div id="no-winning-combination-container"
                                            style="display: flex; width: inherit; height: 48px; justify-content: center; align-items: center; margin: 0px auto;">
                                            <div id="no-winning-combination-text" style="font-size: 14px; color: rgb(204, 204, 204);">${historyTranslation.No_Winning_Combination}
                                            </div>
                                        </div>`);
                if (pb) {
                    for (let Y = 0; Y < wa.length; Y++) 0 < Xa ? 3 == wa.length ? Na += `<div class="mul_x${wa[Y]} history_assets" style="${sb}"></div>` : 4 == wa.length && (Na = 0 == Y || 3 == Y ? Na + `<div class="mul_x${wa[Y]} history_assets" style="${tb}"></div>` : Na + `<div class="mul_x${wa[Y]} history_assets" style="${sb}"></div>`) : Na += `<div class="mul_x${wa[Y]} history_assets" style="${tb}"></div>`;
                    R = R.replace("{MULTIFREESPIN}", Na);
                    T = T.replace("{MULTIFREESPIN}", Na);
                    T = T.replace(U,
                        "")
                } else {
                    for (let Y = 0; Y < wa.length; Y++) Na += `<div class="mul_x${wa[Y]} history_assets"
                                style="${ta}"></div>`;
                    T = T.replace("{MULTINORMALSPIN}", Na);
                    T = T.replace(ma, "")
                }
                for (let Y = 0; Y < vb.length; Y++) {
                    var fb = "";
                    for (let kb = 0; kb < vb[Y].length; kb++) {
                        var Da = vb[Y][kb],
                            sa = "symbol_0:1:0" == vb[Y][kb] || "symbol_1:1:0" == vb[Y][kb] ? "special_symbol_atlas" : "symbol_atlas",
                            qa = Y * vb[Y].length + (vb[Y].length - kb) - 1;
                        "_blank" == Da || Da.slice(-1);
                        var ka = "",
                            Pa = [],
                            Ab = "",
                            cb = "";
                        if ("" != Da) {
                            Da.includes(":") && (Pa = Da.split(":"), Da = Pa[0] + "_" + Pa[1], cb = Pa[0] + "x" + Pa[1], 1 == Pa[2] ? Ab = "silver" :
                                2 == Pa[2] && (Ab = "gold"));
                            oa = "";
                            switch (Pa[1]) {
                                case "2":
                                    oa = "display: block; position: absolute; transform-origin: left top; z-index: 0; margin-left: -8px; margin-top: -30px; transform: scale(0.52);";
                                    break;
                                case "3":
                                    oa = "display: block; position: absolute; transform-origin: left top; z-index: 0; margin-left: -10px; margin-top: -50px; transform: scale(0.55);";
                                    break;
                                case "4":
                                    oa = "display: block; position: absolute; transform-origin: left top; z-index: 0; margin-left: -13px; margin-top: -80px; transform: scale(0.6);";
                                    break;
                                default:
                                    oa = Eb
                            }
                            ka = 0 < Pa[2] ? `<span class="frame_atlas ${Ab}x${Pa[1]}" style="${ia};"></span>` : "";
                            2 == Pa[2] && (ka = `<div>
                                        <span class="olay1x${Pa[1]} frame_atlas"
                                            style="display: block; position: absolute; transform-origin: left top; transform: scale(0.33); mix-blend-mode: screen;margin-top: -${40*(Pa[1]-1)}px"></span>
                                            ` + ka + "\n                                                        </div>");
                            fb = N.includes(qa) ? fb + K + Aa + `    
                                        <span
                                        class="${cb} ${"frame_atlas"}"
                                        style="${ia}"></span>                              
                                        <span
                                        class="${Da} ${sa}"
                                        style="${oa}"></span>
                                        ` + ka + "\n                                                        </div>\n                                                                                               \n                                                    " : 0 == Xa ? fb + K + `
                                            
                                            <span
                                        class="${cb} ${"frame_atlas"}"
                                        style="${ia}"></span>                              
                                        <span
                                        class="${Da} ${sa}"
                                        style="${oa}"></span>
                                            ` + ka + "\n                                                            </div>\n                                                            " : fb + K + `
                                            <span
                                        class="${cb} ${"frame_atlas"}"
                                        style="${ia}"></span>                              
                                        <span
                                        class="${Da} ${sa}"
                                        style="${oa}"></span>
                                            ` + ka + "\n                                                            </div>\n                                                            "
                        }
                    }
                    Ha = Ha + E + fb + "</div>"
                }
                T = T.replace(I, "");
                T = T.replace(P, "");
                T = T.replace(W, "");
                T = T.replace(Q, "");
                T = T.replace(M, "");
                T = T.replace(ca, "");
                T = T.replace(xa, "");
                T = T.replace(C, pa);
                T = T.replace(G, ab);
                T = T.replace(C, pa);
                T = T.replace(G, ab);
                T = T.replace("{PAYOUT}", Sa);
                T = T.replace("{BG_REEL}", Cb);
                T = T.replace("{SLOTCOLUMN}",
                    Ha);
                T = T.replace("{MULTIFREESPIN}", "");
                T = T.replace("{MULTINORMALSPIN}", "");
                ub += T
            }
        }
    }

    e.LogHistoryDetailTitle = e.SpinTitle[0];
    e.LogHistoryDetailDateHour = la + " " + Z;
    e.LogHistoryDetailRoundTitle = "" != e.RoundTitle[0] ? e.RoundTitle[0] : null;
    

    p = p.replace("{LOG_TITLE}", e.SpinTitle[0]);
    p = p.replace("{Date}", la);
    p = p.replace("{Time}", Z);
    p = p.replace("{GMT}", h);
    p = p.replace(z, ub);

    document.getElementById("game-list-detail-wrapper").innerHTML = p;
    
    
    var currentSlide = 0;

    document.getElementById("game-details-right-arrow").addEventListener('click', function() {
        if (currentSlide < e.LogHistorySlideTotal - 1) {
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