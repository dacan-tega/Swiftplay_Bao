<html lang="en">

<head>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="google" content="notranslate">
    <title>Game history</title>
</head>

<style>
    .BtnAction {
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 24px;
        width: 24px;
        border-radius: 4px;
        color: #fff
    }

    .BtnAction--hidden {
        display: none
    }

    .BtnAction--over {
        color: hsla(0, 0%, 100%, .67)
    }

    .BtnAction--over .BtnAction__Icon {
        fill: hsla(0, 0%, 100%, .67)
    }

    .BtnAction--pressed {
        color: hsla(0, 0%, 100%, .67)
    }

    .BtnAction--pressed .BtnAction__Icon {
        fill: hsla(0, 0%, 100%, .67)
    }

    .BtnAction--disabled {
        background-color: transparent;
        border-color: transparent;
        color: #6d7179
    }

    .BtnAction--disabled .BtnAction__Icon {
        fill: #6d7179
    }

    .BtnAction__Icon {
        height: 20px;
        width: 20px;
        fill: #fff
    }

    .BtnAction__Title {
        margin-left: 5px
    }

    .Overlay {
        color: #fff;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        align-items: center;
        justify-content: center
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg)
        }

        to {
            transform: rotate(1turn)
        }
    }

    .Preloader {
        margin: 10px auto
    }

    .Preloader .Spiner {
        margin: auto;
        width: 100px;
        height: 100px;
        display: inline-block;
        overflow: hidden;
        background: none
    }

    .Preloader .Spiner__Circle {
        width: 100%;
        height: 100%;
        border: 5px solid #525d65;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        box-sizing: border-box
    }

    .Preloader--small .Spiner {
        width: 40px;
        height: 40px
    }

    .Preloader--small .Spiner__Circle {
        border: 2px solid #525d65;
        border-top-color: transparent
    }

    .Preloader--stickySpiner {
        position: relative;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        z-index: 10;
        display: flex;
        margin: 0
    }

    .Preloader--stickySpiner .Spiner {
        position: sticky;
        top: calc(50vh - 50px);
        margin: 50px auto
    }

    .ErrorIndicator {
        text-align: center;
        white-space: pre-line;
        line-height: normal
    }

    .ErrorBoundary {
        display: contents
    }

    .Session {
        position: relative;
        text-align: center;
        line-height: 1.3rem;
        max-width: 1000px;
        margin: auto;
        color: #fff;
        display: flex;
        flex-direction: column
    }

    .Session__Item {
        background: #3c3c46;
        padding: 20px
    }

    .Session__Item:not(:last-child) {
        margin-bottom: 20px
    }

    .IconShowMore {
        transition: all .3s;
        display: inline-block
    }

    .IconShowMore__Icon {
        height: 20px;
        width: 20px;
        fill: #fff
    }

    .IconShowMore--showLess {
        transform: rotate(90deg)
    }

    .MiniLabel {
        border: 1px solid hsla(0, 0%, 100%, .72);
        padding: 2px 3px;
        border-radius: 3px;
        white-space: nowrap;
        font-size: .64rem;
        color: #fff;
        line-height: normal
    }

    .MiniLabel__BonusBet,
    .MiniLabel__Frb {
        color: hsla(0, 0%, 100%, .72)
    }

    /* .Session-Table-Container {
        display: flex;
        align-items: center;
        flex-direction: column;
        max-width: 1000px;
        margin: 0 auto;
        position: relative
    } */

    .Table {
        color: #fff;
        width: 100%;
        border-spacing: 0;
        border: 1px solid #16171b;
        border-bottom: none;
        background-color: #20272b;
        position: relative;
        font-size: 1rem
    }

    .Table__Row:focus,
    .Table__Row:hover {
        background-color: #252d31;
        cursor: pointer;
        outline: none
    }

    .Table__Row--header:hover {
        background-color: transparent;
        cursor: default
    }

    .Table__Row .Row__ExpandControl {
        overflow: hidden;
        max-height: 0;
        transform-origin: top
    }

    .Table__Row--collapsed {
        visibility: collapse;
        display: none
    }

    .Table__Row--expanded .Row__ExpandControl {
        height: auto;
        max-height: 500vh
    }

    .Table__Row--details {
        padding-top: 0
    }

    .Table__Row--details:hover {
        cursor: default;
        background-color: inherit
    }

    .Table__Cell {
        border-bottom: 1px solid #16171b;
        padding: 16px;
        line-height: 1.3rem;
        position: relative
    }

    @media(max-width: 600px) {
        .Table__Cell {
            padding-left: 6px;
            padding-right: 6px
        }

        .Table__Cell--win {
            padding-right: 16px
        }
    }

    @media(max-width: 830px) {

        .Table__Cell:first-child:not(.Table__Cell--details),
        .Table__Cell:last-child:not(.Table__Cell--details) {
            display: none
        }
    }

    .Table__Cell--align-right {
        text-align: right
    }

    .Table__Cell--header {
        color: #6d7179
    }

    @media(max-width: 830px) {
        .Table__Cell--header {
            text-align: center
        }
    }

    .Table__Cell--expanded {
        border-bottom-color: #20272b
    }

    .Table__Cell--details {
        padding: 0
    }

    .Table__Cell--roundId {
        width: 150px;
        color: #6d7179
    }

    .Table__Cell--noWin {
        color: #6d7179
    }

    .Table__Cell--bet .Table__Cell-Wrap {
        display: flex;
        justify-content: center
    }

    .Table__Cell--bet .Table__Cell-Wrap .MiniLabel {
        left: 50%;
        transform: translate(-50%);
        position: absolute;
        top: 3px
    }

    .GameTitle {
        color: #6d7179;
        text-align: center
    }

    .GameTitle sup {
        font-size: .64rem
    }

    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    html {
        line-height: 1.15;
        -webkit-text-size-adjust: 100%
    }

    body {
        margin: 0
    }

    main {
        display: block
    }

    h1 {
        font-size: 2em;
        margin: .67em 0
    }

    hr {
        box-sizing: content-box;
        height: 0;
        overflow: visible
    }

    pre {
        font-family: monospace, monospace;
        font-size: 1em
    }

    a {
        background-color: transparent
    }

    abbr[title] {
        border-bottom: none;
        text-decoration: underline;
        text-decoration: underline dotted
    }

    b,
    strong {
        font-weight: bolder
    }

    code,
    kbd,
    samp {
        font-family: monospace, monospace;
        font-size: 1em
    }

    small {
        font-size: 80%
    }

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline
    }

    sub {
        bottom: -.25em
    }

    sup {
        top: -.5em
    }

    img {
        border-style: none
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-size: 100%;
        line-height: 1.15;
        margin: 0
    }

    button,
    input {
        overflow: visible
    }

    button,
    select {
        text-transform: none
    }

    [type=button],
    [type=reset],
    [type=submit],
    button {
        -webkit-appearance: button
    }

    [type=button]::-moz-focus-inner,
    [type=reset]::-moz-focus-inner,
    [type=submit]::-moz-focus-inner,
    button::-moz-focus-inner {
        border-style: none;
        padding: 0
    }

    [type=button]:-moz-focusring,
    [type=reset]:-moz-focusring,
    [type=submit]:-moz-focusring,
    button:-moz-focusring {
        outline: 1px dotted ButtonText
    }

    fieldset {
        padding: .35em .75em .625em
    }

    legend {
        box-sizing: border-box;
        color: inherit;
        display: table;
        max-width: 100%;
        padding: 0;
        white-space: normal
    }

    progress {
        vertical-align: baseline
    }

    textarea {
        overflow: auto
    }

    [type=checkbox],
    [type=radio] {
        box-sizing: border-box;
        padding: 0
    }

    [type=number]::-webkit-inner-spin-button,
    [type=number]::-webkit-outer-spin-button {
        height: auto
    }

    [type=search] {
        -webkit-appearance: textfield;
        outline-offset: -2px
    }

    [type=search]::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit
    }

    details {
        display: block
    }

    summary {
        display: list-item
    }

    [hidden],
    template {
        display: none
    }

    html {
        scroll-behavior: smooth;
        overflow-x: hidden;
        width: 100vw;
        font-family: MontserratMedium, sans-serif;
        background-color: #16171b;
        font-size: 14px
    }

    body {
        --body-scale: none
    }

    body .App {
        transform-origin: top left;
        transform: scale(var(--body-scale))
    }

    ::-webkit-scrollbar {
        width: 7px;
        height: 5px
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 2px;
        background-color: #c3c3c3;
        border: 1px solid #eee
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 1px 2px 3px rgba(0, 0, 0, .4)
    }

    .LocalDataInput .BtnFile {
        width: unset;
        height: unset;
        background-color: #525d65;
        padding: 5px 10px
    }

    .LocalDataInput--empty {
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .LocalDataInput--empty .BtnFile {
        padding: 10px 30px
    }

    .LocalDataInput--loaded {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 11
    }

    .App--veikkaus .Table__Cell--balance,
    .App--veikkausSts .Table__Cell--balance {
        display: none
    }

    @font-face {
        font-family: MontserratMedium;
        src: url(Montserrat-Medium.ttf) format("truetype");
        font-style: normal;
        font-weight: 500
    }

    @font-face {
        font-family: Montserrat;
        src: url(Montserrat-Regular.ttf) format("truetype");
        font-style: normal;
        font-weight: 400
    }

    .LinesSlot .ReelsSlot__ItemImg {
        height: calc(100% - 3px);
        width: calc(100% - 3px)
    }

    .WaysSlot .ReelsSlot__ItemImg {
        height: 100%;
        width: 100%
    }

    .WaysSlot .ReelsSlot__ItemImg--fill {
        object-fit: fill
    }

    .PickOptions {
        display: flex;
        justify-content: space-around
    }

    .PickOptions__Option {
        position: relative;
        box-sizing: border-box;
        padding: 5px 10px;
        font-size: .79rem
    }

    .PickOptions__Option-ImgWrap {
        position: relative
    }

    .PickOptions__Option-Title {
        display: block;
        font-size: .79rem;
        color: #6d7179
    }

    .PickOptions__Option-Value {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%
    }

    .PickOptions__Option--selected {
        border: 1px solid #525d65;
        background: rgba(82, 93, 101, .5)
    }

    .PickOptions__Option--selected .PickOptions__Option-Title {
        color: #fff
    }

    .Bonus30 .Img__Text {
        font-size: .79rem
    }

    .Bonus30 .Img {
        background-color: #20272b
    }

    .Respin {
        display: flex;
        flex-direction: column;
        text-align: center
    }

    .Respin__Slots {
        display: flex;
        flex-wrap: wrap
    }

    .Respin__Slot {
        margin-right: 16px;
        margin-bottom: 16px
    }

    .SpinOverlayImg {
        position: absolute;
        top: 0;
        left: 0
    }

    .AnimateBlink,
    .SpinOverlayImg {
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .AnimateBlink__Item {
        animation-name: replaceImage;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-duration: 3s;
        animation-delay: -3s;
        animation-direction: alternate
    }

    .AnimateBlink__Item--initial {
        position: absolute;
        animation-delay: 0s;
        display: block
    }

    @keyframes replaceImage {
        0% {
            opacity: 1
        }

        45% {
            opacity: 1
        }

        55% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__InfiniteRotate {
        display: flex;
        animation: rotating var(--animation--infiniteRotate-duration, 1s) linear infinite
    }

    @keyframes rotating {
        0% {
            transform: rotate(0deg)
        }

        to {
            transform: rotate(1turn)
        }
    }

    .Animation__CrossFade {
        position: relative
    }

    .Animation__CrossFade,
    .Animation__CrossFadeItem {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__CrossFadeItem {
        animation-name: crossFade;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-duration: var(--animation--crossFade-duration, 3s);
        animation-direction: alternate;
        position: absolute
    }

    .Animation__CrossFadeItem--0 {
        animation-delay: 0s
    }

    .Animation__CrossFadeItem--1 {
        animation-delay: -3s
    }

    @keyframes crossFade {
        0% {
            opacity: 1
        }

        45% {
            opacity: 1
        }

        55% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFade {
        position: relative
    }

    .Animation__MultiCrossFade,
    .Animation__MultiCrossFadeItem {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeItem {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        position: absolute;
        opacity: 0
    }

    .Animation__MultiCrossFadeItem--0 {
        animation-delay: 0s
    }

    .Animation__MultiCrossFadeItem--1 {
        animation-delay: 3s
    }

    .Animation__MultiCrossFadeItem--2 {
        animation-delay: 6s
    }

    .Animation__MultiCrossFadeItem--3 {
        animation-delay: 9s
    }

    .Animation__MultiCrossFadeItem--4 {
        animation-delay: 12s
    }

    .Animation__MultiCrossFadeItem--5 {
        animation-delay: 15s
    }

    .Animation__MultiCrossFadeItem--6 {
        animation-delay: 18s
    }

    .Animation__MultiCrossFade2Item {
        animation-duration: 6s;
        animation-name: crossFade2
    }

    .Animation__MultiCrossFade3Item {
        animation-duration: 9s;
        animation-name: crossFade3
    }

    .Animation__MultiCrossFade4Item {
        animation-duration: 12s;
        animation-name: crossFade4
    }

    .Animation__MultiCrossFade5Item {
        animation-duration: 15s;
        animation-name: crossFade5
    }

    .Animation__MultiCrossFade6Item {
        animation-duration: 18s;
        animation-name: crossFade6
    }

    .Animation__MultiCrossFadeV2 {
        display: contents
    }

    .Animation__MultiCrossFadeV2>:first-child {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 0s
    }

    .Animation__MultiCrossFadeV2>:first-child,
    .Animation__MultiCrossFadeV2>:nth-child(2) {
        opacity: 0;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeV2>:nth-child(2) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 3s
    }

    .Animation__MultiCrossFadeV2>:nth-child(3) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 6s
    }

    .Animation__MultiCrossFadeV2>:nth-child(3),
    .Animation__MultiCrossFadeV2>:nth-child(4) {
        opacity: 0;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeV2>:nth-child(4) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 9s
    }

    .Animation__MultiCrossFadeV2>:nth-child(5) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 12s
    }

    .Animation__MultiCrossFadeV2>:nth-child(5),
    .Animation__MultiCrossFadeV2>:nth-child(6) {
        opacity: 0;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeV2>:nth-child(6) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 15s
    }

    .Animation__MultiCrossFadeV2>:nth-child(7) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 18s
    }

    .Animation__MultiCrossFadeV2>:nth-child(7),
    .Animation__MultiCrossFadeV2>:nth-child(8) {
        opacity: 0;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeV2>:nth-child(8) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 21s
    }

    .Animation__MultiCrossFadeV2>:nth-child(9) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 24s
    }

    .Animation__MultiCrossFadeV2>:nth-child(9),
    .Animation__MultiCrossFadeV2>:nth-child(10) {
        opacity: 0;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeV2>:nth-child(10) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 27s
    }

    .Animation__MultiCrossFadeV2>:nth-child(11) {
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-delay: 30s;
        opacity: 0;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%
    }

    .Animation__MultiCrossFadeV2>:first-child {
        position: relative
    }

    .Animation__MultiCrossFadeV2_2>* {
        animation-duration: 6s;
        animation-name: crossFade2
    }

    @keyframes crossFade2 {
        0% {
            opacity: 0
        }

        8.3333333333% {
            opacity: 1
        }

        50% {
            opacity: 1
        }

        58.3333333333% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_3>* {
        animation-duration: 9s;
        animation-name: crossFade3
    }

    @keyframes crossFade3 {
        0% {
            opacity: 0
        }

        5.5555555556% {
            opacity: 1
        }

        33.3333333333% {
            opacity: 1
        }

        38.8888888889% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_4>* {
        animation-duration: 12s;
        animation-name: crossFade4
    }

    @keyframes crossFade4 {
        0% {
            opacity: 0
        }

        4.1666666667% {
            opacity: 1
        }

        25% {
            opacity: 1
        }

        29.1666666667% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_5>* {
        animation-duration: 15s;
        animation-name: crossFade5
    }

    @keyframes crossFade5 {
        0% {
            opacity: 0
        }

        3.3333333333% {
            opacity: 1
        }

        20% {
            opacity: 1
        }

        23.3333333333% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_6>* {
        animation-duration: 18s;
        animation-name: crossFade6
    }

    @keyframes crossFade6 {
        0% {
            opacity: 0
        }

        2.7777777778% {
            opacity: 1
        }

        16.6666666667% {
            opacity: 1
        }

        19.4444444444% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_7>* {
        animation-duration: 21s;
        animation-name: crossFade7
    }

    @keyframes crossFade7 {
        0% {
            opacity: 0
        }

        2.380952381% {
            opacity: 1
        }

        14.2857142857% {
            opacity: 1
        }

        16.6666666667% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_8>* {
        animation-duration: 24s;
        animation-name: crossFade8
    }

    @keyframes crossFade8 {
        0% {
            opacity: 0
        }

        2.0833333333% {
            opacity: 1
        }

        12.5% {
            opacity: 1
        }

        14.5833333333% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_9>* {
        animation-duration: 27s;
        animation-name: crossFade9
    }

    @keyframes crossFade9 {
        0% {
            opacity: 0
        }

        1.8518518519% {
            opacity: 1
        }

        11.1111111111% {
            opacity: 1
        }

        12.962962963% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2_10>* {
        animation-duration: 30s;
        animation-name: crossFade10
    }

    @keyframes crossFade10 {
        0% {
            opacity: 0
        }

        1.6666666667% {
            opacity: 1
        }

        10% {
            opacity: 1
        }

        11.6666666667% {
            opacity: 0
        }

        to {
            opacity: 0
        }
    }

    .Animation__MultiCrossFadeV2.Animation__FadeV2--delay>* {
        animation-delay: 3s
    }

    :root {
        --slot-item-height: 44px;
        --slot-item-width: 54px
    }

    .LinesSlot .ReelsSlot__ItemImg {
        height: auto;
        width: auto;
        object-fit: none
    }

    .LinesSlot .ReelsSlot img[alt="1"] {
        z-index: 1
    }

    .SubTitle__Tumbling {
        margin-left: 5px
    }

    .WinLines-Block .SlotWrap__Footer {
        display: none
    }

    .MoneyScatter {
        z-index: 1
    }

    .MoneyScatter__Label {
        font-size: .79rem;
        text-shadow: #000 0 0 1px, #000 0 0 1px, #000 0 0 1px, #000 0 0 1px, #000 0 0 1px, #000 0 0 1px;
        background-color: unset
    }

    .Bonus {
        display: flex;
        flex: 1;
        justify-content: start
    }

    @media(max-width: 830px) {
        .Bonus {
            flex-wrap: wrap
        }
    }

    .Bonus__WinMask {
        display: flex;
        flex-direction: column;
        margin-right: 20px;
        color: #6d7179;
        max-width: 80px
    }

    @media(max-width: 830px) {
        .Bonus__WinMask {
            max-width: 55px;
            margin-right: 10px
        }
    }

    .Bonus__WinMask .Bonus__WinMask-Component {
        margin-bottom: 10px
    }

    .Bonus__WinMask--selected {
        color: #fff
    }

    .Bonus__WinMask--selected .Bonus__WinMask-Component {
        border: 2px solid #525d65
    }

    .Bonus__WinMask .Img__Source {
        max-height: 80px;
        background-color: #20272b
    }

    .Bonus__WinMask-Footer {
        text-align: center;
        margin: auto;
        max-width: 100px;
        font-size: .79rem
    }

    .Bonus__Img--default {
        display: flex;
        margin: 0 auto;
        box-sizing: border-box;
        max-height: 100px;
        max-width: 70px;
        background-color: #20272b
    }

    .Img {
        position: relative;
        display: flex
    }

    .Img__Source {
        padding: 10px;
        margin: 0 auto;
        box-sizing: border-box;
        max-width: 100%;
        object-fit: contain
    }

    .Img__Text {
        position: absolute;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    .Img__Text--top {
        top: 0
    }

    .Img__Text--bottom {
        top: 100%
    }

    .Image {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .Image,
    .Image__Source {
        position: relative
    }

    .Image--withChildren .Image__Source {
        position: absolute
    }

    .Image__Children {
        position: relative
    }

    .Bonus23 {
        display: flex;
        flex-direction: row
    }

    .Bonus23 .Img__Source {
        max-height: 200px;
        padding: 0
    }

    .Bonus23 .Steps {
        font-size: .79rem;
        color: #6d7179;
        margin-left: 20px;
        text-align: left;
        line-height: 1.2;
        width: 250px;
        min-width: 200px;
        counter-reset: b23-steps-counter
    }

    .Bonus23 .Steps__TableTitle {
        margin-bottom: 10px
    }

    .Bonus23 .Steps__TableTitle:after {
        content: ":"
    }

    .Bonus23 .Steps__StepIterator:before {
        counter-increment: b23-steps-counter;
        content: counter(b23-steps-counter) "."
    }

    .Bonus23 .Steps__StepDelimiter:after {
        content: "→";
        margin: 0 10px
    }

    .Bonus35 .Img__Source {
        opacity: .8
    }

    .Bonus35 .Img__Text {
        font-size: .79rem;
        color: #fff;
        text-shadow: 1px 1px #444;
        top: 60%
    }

    .Bonus36 {
        display: flex;
        width: 100%;
        max-width: 200px;
        justify-content: space-between
    }

    .Bonus36__Middle {
        margin: auto
    }

    .Bonus36__Middle .Img__Source {
        height: 60px
    }

    .Bonus36__Middle .Img__Text {
        color: #fff;
        white-space: nowrap
    }

    .Bonus36__Left .Img__Text,
    .Bonus36__Right .Img__Text {
        color: #6d7179
    }

    .Bonus36__Left .ImgWrap,
    .Bonus36__Right .ImgWrap {
        border: 2px solid transparent
    }

    .Bonus36__Left .ImgWrap--selected,
    .Bonus36__Right .ImgWrap--selected {
        border-color: #525d65
    }

    .Bonus36__Left .ImgWrap--selected .Img__Text,
    .Bonus36__Right .ImgWrap--selected .Img__Text {
        color: #fff
    }

    .Bonus36__Left .ImgWrap--collect .Img__Source,
    .Bonus36__Left .ImgWrap--respin .Img__Source,
    .Bonus36__Right .ImgWrap--collect .Img__Source,
    .Bonus36__Right .ImgWrap--respin .Img__Source {
        visibility: hidden
    }

    .Bonus36__Left .Img__Source,
    .Bonus36__Right .Img__Source {
        height: 35px;
        padding: 5px
    }

    .Bonus36 .Img__Text {
        font-size: .79rem
    }

    :root {
        --tooltip-background-color: #333d43;
        --tooltip-margin: 30px;
        --tooltip-arrow-size: 6px
    }

    .SimpleTooltip__Wrapper {
        display: inline-block;
        position: relative;
        max-width: 300px
    }

    .SimpleTooltip__Tip {
        color: hsla(0, 0%, 100%, .72);
        font-size: .79rem;
        position: absolute;
        border-radius: 4px;
        padding: 6px;
        background: var(--tooltip-background-color);
        line-height: 1.3em;
        z-index: 100;
        text-align: justify;
        visibility: hidden;
        white-space: revert
    }

    .Action {
        flex: 1;
        flex-direction: column;
        margin: 10px;
        padding: 20px;
        background-color: #252d31;
        border-radius: 2px
    }

    .Action,
    .Action__Labels {
        display: flex
    }

    .Action__Labels .MiniLabel {
        line-height: normal;
        margin-left: 10px
    }

    .Action__HWrap {
        display: flex;
        flex: 1;
        flex-direction: row
    }

    .Action__VWrap {
        display: flex;
        flex: 1;
        flex-direction: column
    }

    .Action__Header {
        display: flex;
        flex: 1;
        flex-direction: row;
        flex: 0;
        justify-content: left;
        margin-bottom: 40px
    }

    .Action__Content {
        display: flex;
        flex: 1;
        flex-direction: row;
        margin-bottom: 10px
    }

    .Action__SubTitle {
        color: #6d7179;
        margin-left: 5px;
        display: flex
    }

    .Action__Footer {
        justify-content: center;
        text-align: center
    }

    .Action__Result {
        text-align: right;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 150px
    }

    @media(max-width: 830px) {
        .Action__Result {
            width: 140px
        }
    }

    .Action__ResultItem {
        flex: 1;
        color: #6d7179;
        display: flex;
        flex-direction: column;
        position: relative
    }

    .Action__ResultItem:not(:first-child) {
        margin-top: 10px
    }

    .Action__ResultItem--totalWin,
    .Action__ResultItem--win {
        flex: 10
    }

    .Action__ResultItem--bottom {
        justify-content: flex-end;
        line-height: 1.2em
    }

    .Action__ResultItem--winExceeded {
        margin-top: 0 !important
    }

    .Action__ResultItem--winExceeded .Action__ResultLabel {
        display: flex;
        align-items: flex-start;
        color: #fff;
        margin-left: 5px
    }

    .Action__ResultValue {
        color: #fff
    }

    .Action__ResultLabel {
        color: #6d7179;
        font-size: .79rem
    }

    .Action__WinMultiplayer {
        color: #fff
    }

    .BtnInfo--totalWin {
        position: absolute;
        top: -.5rem;
        right: -1.1rem
    }

    .BtnInfo--totalWin .BtnAction {
        width: 1.1rem;
        height: 1.1rem
    }

    .BtnInfo--totalWin .BtnAction--over .BtnAction__Icon {
        fill: #fff
    }

    .BtnInfo--totalWin .BtnAction__Icon {
        fill: #6d7179
    }

    .SlotWrap {
        display: flex;
        flex-direction: column
    }

    .SlotWrap__Footer,
    .SlotWrap__Header {
        color: #6d7179;
        font-size: .79rem;
        text-align: center
    }

    .SlotWrap__Field {
        width: auto;
        display: inline-flex;
        flex-direction: row;
        border: 1px solid #4c4c4c;
        margin: 5px 0
    }

    .WinLines__Mul {
        font-size: .79rem;
        color: #6d7179;
        line-height: 1.2rem;
        margin-bottom: -5px
    }

    .WinLines-Group {
        display: flex;
        flex-wrap: wrap;
        padding-left: 10px;
        justify-content: space-evenly;
        width: 100%;
        box-sizing: border-box;
        align-items: flex-end
    }

    .WinLines-Group .SlotWrap {
        padding-right: 10px;
        padding-bottom: 20px
    }

    .WinLines-Group .SlotWrap__Header {
        color: #fff;
        font-size: inherit
    }

    .WinLines-Group .ReelsSlot__Item,
    .WinLines-Group .Slot__Item {
        opacity: .35
    }

    .WinLines-Group .ReelsSlot__Item--win,
    .WinLines-Group .Slot__Item--win {
        border: 1px solid hsla(0, 0%, 100%, .22);
        opacity: 1
    }

    .WinLines__DlgLink {
        color: #fff;
        margin: auto;
        cursor: pointer;
        text-decoration: underline;
        display: inline-block;
        padding: 0 5px
    }

    .WinLines__DlgLink:hover {
        color: hsla(0, 0%, 100%, .67)
    }

    .WinLines__DlgLink--paylines {
        color: #6d7179
    }

    .WinLines-Vertical {
        display: flex;
        flex-direction: column;
        width: 100%
    }

    .WinLines-Block__Title {
        color: #6d7179;
        padding: 15px 0;
        text-align: center
    }

    .Slot {
        display: flex;
        flex-direction: column
    }

    .Slot__Row {
        display: inline-flex
    }

    .Slot__Item {
        background-color: #20272b;
        border: 1px solid #252d31;
        height: 35px;
        width: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative
    }

    .Slot__Item--win {
        background-color: #525d65
    }

    .Slot__ItemImg {
        width: 30px;
        height: 30px
    }

    .Modal {
        color: #fff;
        cursor: pointer;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(21, 22, 26, .8);
        z-index: 2
    }

    .Modal--hidden {
        display: none
    }

    .Dialog {
        cursor: default;
        display: flex;
        flex-direction: column;
        min-width: 300px;
        max-width: 80%;
        min-height: 200px;
        max-height: 70%;
        width: auto;
        background-color: #252d31;
        padding: 10px;
        box-shadow: 0 11px 15px -7px rgba(0, 0, 0, .2);
        outline: 0
    }

    .Body--scaled .Dialog {
        transform: scale(var(--body-scale));
        max-width: calc(80%/var(--body-scale));
        max-height: calc(70%/var(--body-scale));
        min-width: unset
    }

    .Dialog__TopBar {
        padding-bottom: 20px;
        position: relative;
        text-align: center
    }

    .Dialog__Title {
        display: inline-block;
        width: auto
    }

    .Dialog__TopButtons {
        position: absolute;
        right: 0;
        top: 0
    }

    .Dialog__Content {
        margin: auto;
        display: flex;
        overflow-y: auto
    }

    :root {
        --slot-item-size: 47px;
        --slot-item-height: var(--slot-item-size);
        --slot-item-width: var(--slot-item-size);
        --reel-height: calc(var(--reelslot-sh, 6)*var(--slot-item-height));
        --reel-width: var(--slot-item-width)
    }

    .ReelsSlot {
        display: flex
    }

    .ReelsSlot__Reel {
        background-color: #20272b;
        display: flex;
        flex-direction: column;
        height: var(--reel-height);
        width: var(--reel-width);
    }

    .ReelsSlot__Item {
        position: relative;
        align-items: center;
        justify-content: center;
        border: 1px solid #252d31;
        display: flex;
        flex: 1;
        min-height: 10px;
        box-sizing: border-box
    }

    .ReelsSlot__Item--hidden {
        display: none
    }

    .ReelsSlot__Item--win {
        background-color: #525d65
    }

    .MoneyScatter {
        position: relative
    }

    .MoneyScatter,
    .MoneyScatter__LabelWrap {
        display: flex;
        height: 20%;
        width: 100%;
        align-items: center;
        justify-content: center
    }

    .MoneyScatter__LabelWrap {
        position: absolute;
        flex-direction: column;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        text-align: center;
        font-size: 11px
    }

    .MoneyScatter__Label {
        background-color: rgba(0, 0, 0, .2);
        font-size: 11px
    }

    .PossibleWinLines {
        display: flex;
        flex-wrap: wrap;
        flex: 1;
        justify-content: center;
        max-width: 850px;
        margin: auto
    }

    .PossibleWinLines .SlotWrap {
        padding: 5px
    }

    .PossibleWinLines .SlotWrap__Footer {
        color: hsla(0, 0%, 100%, .72)
    }

    .PossibleWinLines .Slot__Item {
        width: 10px;
        height: 10px
    }

    .PossibleWinLines__WinLine {
        margin-bottom: 15px
    }

    .PossibleWinLines-Block__Title {
        color: #6d7179;
        padding: 15px 0;
        text-align: center
    }

    .Spin {
        position: relative;
        display: flex
    }

    .Spin__Slot {
        margin-right: 16px;
        margin-bottom: 16px
    }

    .Spin__Arrow {
        font-size: 2rem;
        margin: auto 40px
    }

    .Spin__WinLines {
        text-align: center
    }

    .history-button {
        width: 60px;
        height: 60px;
        border: 6px solid #fff;
        border-radius: 60px;
        z-index: 301;
        background: #000 center no-repeat;
        background-size: 50% auto;
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADoAAAA7CAMAAAAdOWm/AAAAqFBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8j1z1tAAAAN3RSTlMACfoF6BVR/MXeYpk1t4Q+KCa5Zdie98eWg+w58ywiELOsgHAdF+KnMM3BkWpOSFxT1IgMinmNQjJMLwAAAqNJREFUSMell+uWqjAMhYWClRHFKyqiiKhcB8fb8P5vdsKIVm0ka3nyz9Bv7bLTJtj47/A2+nbboIPpW3Z6TGyt4fp8DPIlqwd1c58FQXOh3zP9zI81dWcMupZSp7gYjieH3S4Z73tVarluqUUZrhZ+v2dZdIw1WMULJ7lcWS8Y8eIa3F4137JWuiuqUCdBaQybD+ziHurgB2cVs609LPMtsOWUQYpmrenTsl3ggbtnt3hmkT0rc9B8WtXegEltu3hhZa/MscafFvEQjNqkFSrSr16x+25FhH0o89oRCVSXmWOJtKewYeUnLiS286iLaBZGBseR9VMXZeWqiHBX879neUfkZJ/BWy49ngz163HaJ8U7XQak/MxYL28XYjjBdTGHIEbdPmvc2RbKMswhbswWjxfxC9PtXDBNo9Ks1eU7B9vtTVPoAkuHanThBH7EHro91viEhaqUmp+wUE/W+IgdzVBNmoV69iWCqK9wCIfw+oqwpaoguomKv2efkdMndbCyrKIGFUoUomjSVCh0PoUej8oSrOi3+N3HQ/Q+kqWnA83SmjQ7F5oEi07Bj1ggOQHicxDtfaqKsTB/aYeMFXKP+Iuu1cb6bXf+1SLeFxxy8H6rE6yYSHK/1YcoW81ftjgjDt26Capr+xb7exiMeM1EQlnnd8nKsvgc0ezV9joelyXyMkN2CLpJfa9zZlv4gjnach9aUL2Oj5fIdxM31qLfvp3dfg9Upzbd+4BFVL2LQ0xBbM/uUQeHv2NeM7Nxr9R4X67atDVpZlO6Wnq1w+pULHcPazF5Zd2Bq1bkOK9O4nc4cuF0qdoqqJsrerM9clwAW9Pcu9+5ob9KWuEsr/+/coqyX98P072piKQXmc082ijERGJKz4zMxUuLgZ8lR4dY9Q98wGrNAUdfigAAAABJRU5ErkJggg==')
    }

    #Desktop .history-button {
        bottom: 0;
        left: 50%;
        margin: 0 0 24px -36px;
    }
    .myDIV:hover + .hide {
        display: block;
    }
    .hide {
        display: none;
    }
</style>




<body class="Body--scaled">
    <div id="root">
        <div class="App App__Jurisdiction--UK" style="width: 100%; height: 100%;">
            <h3 class="GameTitle">Gates Of Olympus</h3>
            <div class="Session-Table-Container">
                <table class="Table">
                    <thead class="Table__Header">
                        <tr class="Table__Row Table__Row--header">
                            <td class="Table__Cell Table__Cell--header"> </td>
                            <th class="Table__Cell Table__Cell--header Table__Cell--roundId"><span class="Table__Cell--header_text_container"><span class="Table__Cell--header_text"><?php echo $history->Play_Session_ID?> #</span></span></th>
                            <th class="Table__Cell Table__Cell--header Table__Cell--dateTime"><span class="Table__Cell--header_text_container"><span class="Table__Cell--header_text"><?php echo $history->Date?></span></span></th>
                            <th class="Table__Cell Table__Cell--header Table__Cell--balance"><span class="Table__Cell--header_text_container"><span class="Table__Cell--header_text"><?php echo $history->New_Balance?></span></span></th>
                            <th class="Table__Cell Table__Cell--header Table__Cell--bet"><span class="Table__Cell--header_text_container"><span class="Table__Cell--header_text"><?php echo $history->Bet?></span></span></th>
                            <th class="Table__Cell Table__Cell--header Table__Cell--win Table__Cell--align-right"><span class="Table__Cell--header_text_container"><span class="Table__Cell--header_text"><?php echo $history->Amount_Won?></span></span></th>
                            <th class="Table__Cell Table__Cell--header">
                                <div class="BtnAction"><svg class="BtnAction__Icon" viewBox="0 0 24 24">
                                        <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"></path>
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                    </svg></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="Table__Body" id="history">

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <div id="modal-root"></div>
    <script>
        $(document).ready(function() {
            const apiUrl = '{{$api_url}}';
            const token = '{{$token}}';
            const gameName = '{{$gameName}}';
            var currPage = 1;
            var exitingExpand = [];
            var onLoad = false;
            var totalPage = 0;

            var toggleClassFunc = function(elm) {
                if (elm.hasClass('Table__Row--collapsed')) {
                    elm.removeClass("Table__Row--collapsed");
                    elm.addClass("Table__Row--expanded");
                } else {
                    elm.addClass("Table__Row--collapsed");
                    elm.removeClass("Table__Row--expanded");
                }
            };
            var loadHistoryFunc = function(page) {
                onLoad = true;
                var postData2 = {
                    "action": "histories",
                    "page": page
                };
                $.ajax({
                    type: 'POST',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-Ncash-token', token);
                    },
                    url: apiUrl,
                    data: JSON.stringify(postData2),
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        log = data.data;
                        totalPage = log.totalPage;
                        currPage = currPage + 1;
                        onLoad = false;
                        items = log.data
                        var history = $('#history');
                        var modalRoot = $('#modal-root');
                        var modalRoot1 = $('#modal-root1');
                        if (history) {
                            for (var item of items) {

                                var rowEl = $(`
                            <tr class="Table__Row" tabindex="1" data-id="${item.uuid}">
                                <td class="Table__Cell">
                                    <div class="IconShowMore"><svg class="IconShowMore__Icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </svg></div>
                                </td>
                                <td class="Table__Cell Table__Cell--roundId">
                                    <div class="Table__Cell-Wrap" >${item.uuid}</div>
                                </td>
                                <td class="Table__Cell Table__Cell--dateTime">
                                    <div class="Table__Cell-Wrap">${item.date}</div>
                                </td>
                                <td class="Table__Cell Table__Cell--balance">
                                    <div class="Table__Cell-Wrap">${item.credit}</div>
                                </td>
                                <td class="Table__Cell Table__Cell--bet">
                                    <div class="Table__Cell-Wrap">${item.bet_amount}</div>
                                </td>
                                <td class="Table__Cell Table__Cell--win Table__Cell--noWin Table__Cell--align-right">
                                    <div class="Table__Cell-Wrap">${item.win_amount}</div>
                                </td>
                                <td class="Table__Cell">
                                    <div class="BtnAction BtnAction--hidden"><svg class="BtnAction__Icon" viewBox="0 0 24 24">
                                            <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </svg></div>
                                </td>
                            </tr> <tr class="Table__Row--details Table__Row--collapsed">
                            <td colspan="7" class="Table__Cell Table__Cell--details" id="${item.uuid}">  
                            </td>
                            </tr>`);

                                history.append(rowEl);
                            }
                            $(".Table__Row", history).unbind('click');
                            $(".Table__Row", history).click(function() {
                                var nextElement = $(this).next();
                                var id = $(this).attr("data-id");
                                // Show/Hide div
                                if (id && id != "" && exitingExpand.includes(id)) {
                                    toggleClassFunc(nextElement);
                                }
                                // Get history detail

                                if (!exitingExpand.includes(id)) {
                                    exitingExpand.push(id);
                                    var postData = {
                                        "action": "history_detail",
                                        "uuid": id
                                    };
                                    $.ajax({
                                        type: 'POST',
                                        url: apiUrl,
                                        data: JSON.stringify(postData),
                                        contentType: "application/json",
                                        beforeSend: function(xhr) {
                                            xhr.setRequestHeader('X-Ncash-token', token);
                                        },
                                        dataType: 'json',
                                        success: function(data) {
                                            raw = `                            
                                        <div>
                                            <div class="Session">
                                        <div class="vs20olympgate">`;

                                            var win = 0;
                                            var drop = 0;
                                            var rowChild = "";
                                            var action = "";
                                            var reelSlot = "";
                                            var item = data.data;
                                            var currencyPrefix = item.currency_prefix;
                                            var arrWinPosition = [];
                                            for (let d = 0; d < item.result_json.length; d++) {

                                                var reel = "";
                                                var reelPositionTotal = "";
                                                var reelPositionTotal1 ="";
                                                titlespin = drop == 0 ? "Spin" : "Tumbling";
                                                action = `
                                                    <div class="Action " data-id="${item.uuid}_${drop}">
                                                    <div class="Action__HWrap">
                                                    <div class="Action__VWrap">
                                                    <div class="Action__Header">
                                                        <div class="Action__Title">${titlespin}</div>
                                                        <div class="Action__SubTitle"></div>
                                                        <div class="Action__Labels"><span class="MiniLabel MiniLabel__AnteBet">Ante Bet</span></div>
                                                    </div>
                                                    <div class="Action__Content">
                                                    <div class="Spin">
                                                        <div class="LinesSlot ">
                                                            <div class="SlotWrap">
                                                                <div class="SlotWrap__Field">
                                                    `;
                                                drop++;
                                                var winDrop = [];
                                                var lastReel = item.result_json[d]['new_reel'];
                                                var winOnDrop = 0;
                                                for (let i = 0; i < item.result_json[d]['win_drop'].length; i++) {
                                                    var winDrop = item.result_json[d]['win_drop'][i]['position'];
                                                    winOnDrop = winOnDrop + item.result_json[d]['win_drop'][i]['win'];
                                                }
                                                // var totalMulti = item.total_multi ? item.total_multi : 1;
                                                // for (let i = 0; i < item.result_json[d]['win_drop'].length; i++) {
                                                //     var totalWin = item.result_json[d]['win_total']; 
                                                // }
                                                var totalWin = item.result_json[d]['win_total'];
                                                var winMulti = item.result_json[d]['win_drop'].length == 0 ? item.result_json[(d)]['win_multi'] : totalWin;

                                                for (let i = 0; i < lastReel.length; i++) {
                                                    var symbolreel = "";
                                                    var reelPosition = "";
                                                    for (let j = 0; j < lastReel[i].length; j++) {
                                                        var check = i + j * 6;
                                                        if (lastReel[i][j].search("x") > 0) {
                                                            var numberMulti = lastReel[i][j].split("x");
                                                            if (numberMulti[0] < 10) {
                                                                var symbolMulti = 12;
                                                            } else if (numberMulti[0] >= 10 && numberMulti[0] < 100) {
                                                                var symbolMulti = 13;
                                                            } else if (numberMulti[0] >= 100 && numberMulti[0] < 500) {
                                                                var symbolMulti = 14;
                                                            } else {
                                                                var symbolMulti = 15;
                                                            }

                                                            symbolreel = symbolreel + ` <div class="MoneyScatter "><img src="/uploads/games/${gameName}/symbols/${symbolMulti}.png" srcset="" alt="${symbolMulti}" class="ReelsSlot__ItemImg">
                                                            <div class="MoneyScatter__LabelWrap">
                                                                <div class="MoneyScatter__Label" style="font-size: clamp(0px, 55.3px, 11.06px);">${numberMulti[0]}x</div>
                                                                <div class="MoneyScatter__Money" style="font-size: clamp(0px, -275px, 11px);"></div>
                                                                </div>
                                                            </div>
                                                            `;
                                                        } else {
                                                            if (winDrop.includes(check + 1)) {
                                                                symbolreel = symbolreel + `<div class="ReelsSlot__Item ReelsSlot__Item--position-${check}">
                                                                <div class="Animation Animation__CrossFade ">
                                                                <div class="Animation__CrossFadeItem Animation__CrossFadeItem--0"><img src="/uploads/games/${gameName}/symbols/${lastReel[i][j]}.png" srcset="" alt="10" class="ReelsSlot__ItemImg"></div>
                                                                <div class="Animation__CrossFadeItem Animation__CrossFadeItem--1"><img src="/uploads/games/${gameName}/symbols/tmb.png" srcset="" alt="tmb" class="ReelsSlot__ItemImg"></div>
                                                                    </div>
                                                                </div>`
                                                            } else {
                                                                symbolreel = symbolreel + `
                                                                <div class="ReelsSlot__Item ReelsSlot__Item--position-${check} ReelsSlot__--${lastReel[i][j]}"><img src="/uploads/games/${gameName}/symbols/${lastReel[i][j]}.png" srcset="" alt="${lastReel[i][j]}" class="ReelsSlot__ItemImg"></div>
                                                                 `;
                                                            }
                                                            // exitingExpand.includes(id)
                                                        }
                                                    }
                                                    reel = reel + `<div class="ReelsSlot__Reel">` + symbolreel + `</div>`;

                                                }
                                                
                                                var reelPosition = "";
                                                for (let i = 0; i < lastReel.length; i++) {
                                                    var symbolreel = "";
                                                    var winPosition = "";
                                                    for (let j = 0; j < lastReel[i].length; j++) {
                                                        var check = i + j * 6;
                                                        if (lastReel[i][j].search("x") > 0) {
                                                            var numberMulti = lastReel[i][j].split("x");
                                                            if (numberMulti[0] < 10) {
                                                                var symbolMulti = 12;
                                                            } else if (numberMulti[0] >= 10 && numberMulti[0] < 100) {
                                                                var symbolMulti = 13;
                                                            } else if (numberMulti[0] >= 100 && numberMulti[0] < 500) {
                                                                var symbolMulti = 14;
                                                            } else {
                                                                var symbolMulti = 15;
                                                            }

                                                            winPosition = winPosition + ` <div class="MoneyScatter "><img src="/uploads/games/${gameName}/symbols/${symbolMulti}.png" srcset="" alt="${symbolMulti}" class="ReelsSlot__ItemImg">
                                                            <div class="MoneyScatter__LabelWrap">
                                                                <div class="MoneyScatter__Label" style="font-size: clamp(0px, 55.3px, 11.06px);">${numberMulti[0]}x</div>
                                                                <div class="MoneyScatter__Money" style="font-size: clamp(0px, -275px, 11px);"></div>
                                                                </div>
                                                            </div>
                                                            `;
                                                        } else {
                                                            if (winDrop.includes(check + 1)) {
                                                                winPosition = winPosition + `
                                                                <div class="ReelsSlot__Item ReelsSlot__Item--position-${check} ReelsSlot__Item--win ReelsSlot__--${lastReel[i][j]}"><img src="/uploads/games/${gameName}/symbols/${lastReel[i][j]}.png" srcset="" alt="${lastReel[i][j]}" class="ReelsSlot__ItemImg"></div>`
                                                            } else {
                                                                winPosition = winPosition + `
                                                                <div class="ReelsSlot__Item ReelsSlot__Item--position-${check} ReelsSlot__--${lastReel[i][j]}"><img src="/uploads/games/${gameName}/symbols/${lastReel[i][j]}.png" srcset="" alt="${lastReel[i][j]}" class="ReelsSlot__ItemImg"></div>
                                                                 `;
                                                            }
                                                            // exitingExpand.includes(id)
                                                        }
                                                    }
                                                    reelPosition = reelPosition + `<div class="ReelsSlot__Reel">` + winPosition + `</div>`;

                                                }
                                                reelPositionTotal = reelPositionTotal + `<div class="LinesSlot ">
                                                                                        <div class="SlotWrap">
                                                                                            <div class="SlotWrap__Header">
                                                                                                <div class="WinLineWin">${currencyPrefix}${totalWin}</div>
                                                                                            </div>
                                                                                            <div class="SlotWrap__Field">` +
                                                                                            reelPosition +
                                                    `</div>
                                                                                           
                                                                                        </div>
                                                                                    </div>`

                                                arrWinPosition.push(reelPositionTotal);

                                                var winPosition = '';
                                                if (winDrop.length > 0) {
                                                    winPosition = `<div class="WinLines__DlgLink WinPosition" data-id="${id}${d}" data-index="${d}">Win Positions</div>`;
                                                }
                                                var checkTotalWin = "";
                                                var checkMulti = "";
                                                var totalMultiCheck = item.result_json[d]['total_multi_check'];
                                                var freeSpinWin = item.result_json[d]['free_spin_win'];
                                                if (winDrop.length == 0) {
                                                    checkTotalWin = `
                                                    <div class="Action__ResultItem Action__ResultItem--totalWin">
                                                        <div class="Action__ResultValue" style="font-size: calc(12.999px);">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">${currencyPrefix}. ${freeSpinWin}</font>
                                                            </font>
                                                        </div>
                                                        <div class="Action__ResultLabel">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Total wins</font>
                                                            </font>
                                                        </div>
                                                        <div class="SimpleTooltip__Wrapper BtnInfo--totalWin">
                                                            <div class="myDIV"><svg class="BtnAction__Icon" viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z">
                                                                    </path>
                                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                                </svg></div>
                                                                    <div class="SimpleTooltip__Tip top hide" style="bottom: 17.2344px;left: -318.412px;min-height: 28.756px;max-height: 57.512px;min-width: 255.012px;visibility: visible;/* white-space: break-spaces; */">
                                                                
                                                                    <div>Total win is the total amount won at the end of the current round
                                                                        starting from the paid spin that triggered all free features.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    `;
                                                }

                                                if (totalMultiCheck > 1 && winDrop.length == 0) {
                                                    checkMulti = `                                                    
                                                        <div class="Action__ResultLabel">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Multiplier: x${totalMultiCheck}</font>
                                                            </font>
                                                        </div>
                                                    `;
                                                }
                                                var checkWinMulti = "";
                                                // var winMultiTotal = item.result_json[d]['win_multi'];
                                                if (totalMultiCheck > 1 && winDrop.length == 0) {                                                    
                                                    checkWinMulti = ` <div class="Action__ResultItem ">
                                                            <div class="Action__ResultValue" style="font-size: calc(12.999px);"></div>
                                                            <div class="Action__ResultLabel">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Collapse Win: ${currencyPrefix} ${winMulti} = ${currencyPrefix} ${totalWin} x ${totalMultiCheck}</font>
                                                                </font>
                                                            </div>
                                                        </div>`;
                                                } else {
                                                    if (winMulti > 0) {
                                                        checkWinMulti = ` <div class="Action__ResultItem ">
                                                            <div class="Action__ResultValue"></div>
                                                            <div class="Action__ResultLabel">Tumbling Win: ${currencyPrefix} ${winMulti}</div>
                                                        </div>`;
                                                    }
                                                }
                                                action = action + reel + ` </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Action__Result">
                                                        <div class="Action__ResultItem Action__ResultItem--win">
                                                            <div class="Action__ResultValue">${Number(winOnDrop).toFixed(2)}</div>
                                                            <div class="Action__ResultLabel">Win</div>
                                                        </div>
                                                        ` + checkTotalWin + checkMulti + checkWinMulti + `
                                                    </div>
                                                </div>
                                                <div class="Action__Footer Hbox">
                                                    ` + winPosition + `
                                                </div>
                                                    </div>`;
                                                reelSlot = reelSlot + action;
                                            }
                                            raw = raw + reelSlot + `
                                            </div>
                                                    </div>
                                                </div>
                                        `;
                                            var expandItem = $("#" + id);
                                            expandItem.append(raw);



                                            $(".WinPosition", expandItem).on("click", function() {
                                                var idWin = $(this).attr("data-index");
                                                $(modalRoot).empty();
                                                reelS = `<div id="modal-root">
                                                                <div class="Modal ">
                                                                    <div class="Dialog" tabindex="0">
                                                                        <div class="Dialog__TopBar">
                                                                            <div class="Dialog__Title">Win Positions</div>
                                                                            <div class="Dialog__TopButtons">
                                                                                <div class="BtnAction BtnAction__Close"><svg class="BtnAction__Icon" viewBox="0 0 24 24">
                                                                                        <path
                                                                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                                                                        </path>
                                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                                    </svg></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Dialog__Content">
                                                                            <div class="WinLines-Block ">
                                                                                <div class="WinLines-Group">` +
                                                    arrWinPosition[idWin] +
                                                    `</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>`;
                                                modalRoot.append(reelS);
                                                var modal = $('.modal');
                                                var btn = $('.WinPosition');
                                                var span = $('.Modal ');

                                                btn.click(function() {
                                                    modalRoot.show();
                                                });

                                                span.click(function() {
                                                    modalRoot.hide();
                                                });
                                            });

                                            toggleClassFunc(nextElement);

                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            console.log(textStatus, errorThrown);
                                        }
                                    });
                                }

                            });

                        }
                    },
                });
            }
            loadHistoryFunc(currPage);
            $(window).scroll(function() {
                var height = $(document).height() - $(window).height()
                if ($(window).scrollTop() >= height * 0.95 && onLoad == false && currPage <= totalPage) {
                    loadHistoryFunc(currPage);
                }
            });
        });
    </script>

</body>

</html>