<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="main.css?a4" />
    <link rel="stylesheet" type="text/css" href="payout.css?a2" />
</head>

<body style="overflow: hidden;">

</body>
<div id="game-shell" class="game-shell">
    <div id="game-overlay">
        <div id="widget-manager-container" style="height: 0px; width: 0px; position: absolute; visibility: visible; z-index: 0;">
            <div>
                <div id="social-container" style="display: none;">
                    <div class="social_widget-container" style="transform: translate(360px, 20px); display: block;">
                        <div class="social_background-shadow" style="top: 0px; height: 33px;"></div>
                        <div class="social_widget-button">
                            <div class="social_button-image widget_icon_img btn_trophy  social_small-scale-button"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="game-header-holder" style="z-index: 99; pointer-events: none; position: absolute; height: 640px; width: 360px; visibility: hidden;">
            <div id="game-title" class="game-title" style="visibility: hidden; justify-content: flex-start; width: 360px; height: 18px; font-size: 11.5px;">
                <div style="padding-left: 12px; display: flex; align-items: center;">Mahjong Ways2</div>
            </div>
            <div id="time-stamp" class="time_stamp" style="justify-content: flex-end; height: 18px; font-size: 11.5px; visibility: hidden; width: 360px;">
                <div style="padding-right: 12px; display: flex; align-items: center;">08:09:58</div>
            </div>
        </div>
        <div id="paytable-container" style="overflow: hidden; color: rgb(136, 136, 136); height: 930px; width: 522px; z-index: 0;">
            <div class="paytable" style="width: 100%; height: 100%;">
                <div id="paytable-container" style="transform: translateY(0%); width: 100%; height: 100%; background-color: rgb(48, 48, 60); display: inline-flex; flex-direction: column-reverse;">
                    <div style="overflow: hidden; height: 100%; transform: translateZ(0px);">
                        <div class="rcs-custom-scroll ">
                            <div class="rcs-outer-container">
                                <div class="rcs-inner-container" style="margin-right: -17px;">
                                    <div style="overflow-y: scroll; margin-right: 0px;">
                                        <div id="paytable-content" style="color: rgb(204, 204, 204); height: 860px;">
                                            <div class="segment" id="symbol_payout" align="center" style="display: inline-block; width: 100%; border-bottom: 1px solid rgb(40, 40, 52); margin-bottom: 12px; margin-top: 12px;">
                                                <div class="paytable" style="font-size: 14px; color: rgb(255, 255, 255); font-weight: normal; margin-bottom: 16px; line-height: 145%; padding: 0px 20px;">Symbol Payout Values</div>
                                                <div id="symbol_payout_table" class="inline_table" style="color: rgb(255, 255, 255); font-size: 11px;">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle; padding-right: 140px;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 60.5px; width: 60.5px; min-height: 61px; height: 61px;">
                                                                                    <div class="paytable_wild" style="display: block; transform: scale(0.5); position: relative; right: 30.25px; bottom: 30.5px; min-width: 121px; width: 121px; min-height: 122px; height: 122px; background-position: -1px -1px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_desc" style="display: table-cell; width: 100%; font-size: 11px; text-align: left; vertical-align: middle;">
                                                                            <div style="display: inline-block; width: 1px;">
                                                                                <div style="width: 60px; overflow: visible; overflow-wrap: break-word; text-align: left; color: rgb(204, 204, 204);">Wild Symbol</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 67px; width: 67px; min-height: 72px; height: 72px;">
                                                                                    <div class="paytable_symbols scatter" style="display: block; transform: scale(0.5); position: relative; right: 33.5px; bottom: 36px; min-width: 134px; width: 134px; min-height: 144px; height: 144px; background-position: -1px -1px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_desc" style="display: table-cell; width: 100%; font-size: 11px; text-align: left; vertical-align: middle;">
                                                                            <div style="display: inline-block; width: 1px;">
                                                                                <div style="width: 60px; overflow: visible; overflow-wrap: break-word; text-align: left; color: rgb(204, 204, 204);">Scatter Symbol</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle; padding-right: 30px;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols green" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -223px -263px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">100</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">60</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">15</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols red" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -248px -1px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">80</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">40</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">10</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle; padding-right: 30px;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols white" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -248px -132px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">60</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">20</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">8</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols char8" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -1px -278px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">40</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">15</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">6</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle; padding-right: 30px;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols ball5" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -137px -132px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">20</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">10</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">4</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 10px; vertical-align: middle;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols bamboo5" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -112px -263px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">20</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">10</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">4</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 30px;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols ball2" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -137px -1px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">10</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">5</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">2</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                    <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                        <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 10px;">
                                                                            <div align="center" style="width: 79.68px;">
                                                                                <div style="min-width: 54.5px; width: 54.5px; min-height: 64.5px; height: 64.5px;">
                                                                                    <div class="paytable_symbols bamboo2" style="display: block; transform: scale(0.5); position: relative; right: 27.25px; bottom: 32.25px; min-width: 109px; width: 109px; min-height: 129px; height: 129px; background-position: -1px -147px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                            <table style="border-collapse: collapse;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">5</td>
                                                                                        <td style="color:rgb(204, 204, 204)">10</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">4</td>
                                                                                        <td style="color:rgb(204, 204, 204)">5</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding-right: 10px; color: rgb(180, 120, 80);">3</td>
                                                                                        <td style="color:rgb(204, 204, 204)">2</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="symbol_payout_desc" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Wild symbol substitutes for all symbols except Scatter symbol.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Gold Plated symbols appears on reels 2, 3 and 4 only.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="segment" id="gold_plate_feature" align="center" style="display: inline-block; width: 100%; border-bottom: 1px solid rgb(40, 40, 52); margin-bottom: 12px;">
                                                <div class="paytable" style="font-size: 14px; color: rgb(255, 255, 255); font-weight: normal; margin-bottom: 16px; line-height: 145%; padding: 0px 20px;">Gold Plated Symbols</div>
                                                <div id="gold_plate_symbol" class="image_segment">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                    <div>
                                                                        <div style="min-width: 300px; width: 300px; min-height: 246px; height: 246px;">
                                                                            <div class="paytable_win_sprites gold-plated-symbols" style="display: block; transform: scale(0.5); position: relative; right: 150px; bottom: 123px; min-width: 600px; width: 600px; min-height: 492px; height: 492px; background-position: -1px -531px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="gold_plate_desc" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>During any spins, some symbols (excluding Wild symbol and Scatter symbol) in reels 2, 3 and/or 4 may appear in gold.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>At every new round after the new symbols have cascaded down, any gold plated symbol(s) that is involved in a win in the previous round will be transformed into Wild symbol(s).
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="segment" id="multiplier_title" align="center" style="display: inline-block; width: 100%; border-bottom: 1px solid rgb(40, 40, 52); margin-bottom: 12px;">
                                                <div class="paytable" style="font-size: 14px; color: rgb(255, 255, 255); font-weight: normal; margin-bottom: 16px; line-height: 145%; padding: 0px 20px;">Multiplier</div>
                                                <div id="multiplier_desc" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>During any spins, all wins will be multiplied by the multiplier shown above the reels, starting with x1 in the first round.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Any win in the first round will increase the second round's multiplier to x2.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Any win in the second round will increase the third round's multiplier to x3.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Any win in the third round will increase the fourth round's (and beyond) multiplier to x5.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="segment" id="free_spin_feature_title" align="center" style="display: inline-block; width: 100%; border-bottom: 1px solid rgb(40, 40, 52); margin-bottom: 12px;">
                                                <div class="paytable" style="font-size: 14px; color: rgb(255, 255, 255); font-weight: normal; margin-bottom: 16px; line-height: 145%; padding: 0px 20px;">Free Spin Feature</div>
                                                <div id="scatter_symbols" class="image_segment">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 0px;">
                                                                    <div>
                                                                        <div style="margin-right: -20px; min-width: 67px; width: 67px; min-height: 72px; height: 72px;">
                                                                            <div class="paytable_symbols scatter" style="display: block; transform: scale(0.5); position: relative; right: 33.5px; bottom: 36px; min-width: 134px; width: 134px; min-height: 144px; height: 144px; background-position: -1px -1px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 0px;">
                                                                    <div>
                                                                        <div style="min-width: 67px; width: 67px; min-height: 72px; height: 72px;">
                                                                            <div class="paytable_symbols scatter" style="display: block; transform: scale(0.5); position: relative; right: 33.5px; bottom: 36px; min-width: 134px; width: 134px; min-height: 144px; height: 144px; background-position: -1px -1px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                    <div>
                                                                        <div style="margin-left: -20px; min-width: 67px; width: 67px; min-height: 72px; height: 72px;">
                                                                            <div class="paytable_symbols scatter" style="display: block; transform: scale(0.5); position: relative; right: 33.5px; bottom: 36px; min-width: 134px; width: 134px; min-height: 144px; height: 144px; background-position: -1px -1px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="free_spin_desc1" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>3 Scatter symbols appearing anywhere will trigger the Free Spins Feature with 12 free spins. Each additional Scatter symbol will trigger 2 more free spins.
                                                    </div>
                                                </div>
                                                <div id="free_spin_symbol" class="image_segment">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                    <div>
                                                                        <div style="min-width: 300px; width: 300px; min-height: 264px; height: 264px;">
                                                                            <div class="paytable_win_sprites freespins" style="display: block; transform: scale(0.5); position: relative; right: 150px; bottom: 132px; min-width: 600px; width: 600px; min-height: 528px; height: 528px; background-position: -1px -1px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="free_spin_desc2" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>During the Free Spins Feature, the multipliers above the reels will be increased to x2, x4, x6 and x10 respectively.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Free spins can be retriggered.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="segment" id="bet_ways_title" align="center" style="display: inline-block; width: 100%; margin-bottom: 60px;">
                                                <div class="paytable" style="font-size: 14px; color: rgb(255, 255, 255); font-weight: normal; margin-bottom: 16px; line-height: 145%; padding: 0px 20px;">1,024 Ways</div>
                                                <div id="ways_desc1" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Bet ways win if the winning symbols are in succession from the leftmost reel to the right.
                                                    </div>
                                                </div>
                                                <div id="ways_symbols" class="image_segment">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 0px;">
                                                                    <div>
                                                                        <div style="min-width: 96px; width: 96px; min-height: 78px; height: 78px;">
                                                                            <div class="paytable_icon_sprites img1" style="display: block; transform: scale(0.5); position: relative; right: 48px; bottom: 39px; min-width: 192px; width: 192px; min-height: 156px; height: 156px; background-position: -1px -1px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 0px;">
                                                                    <div>
                                                                        <div style="margin-left: 10px; margin-right: 20px; min-width: 24px; width: 24px; min-height: 18px; height: 18px;">
                                                                            <div class="paytable_icon_sprites tick" style="display: block; transform: scale(0.5); position: relative; right: 12px; bottom: 9px; min-width: 48px; width: 48px; min-height: 36px; height: 36px; background-position: -431px -123px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 0px;">
                                                                    <div>
                                                                        <div style="min-width: 96px; width: 96px; min-height: 78px; height: 78px;">
                                                                            <div class="paytable_icon_sprites img2" style="display: block; transform: scale(0.5); position: relative; right: 48px; bottom: 39px; min-width: 192px; width: 192px; min-height: 156px; height: 156px; background-position: -195px -1px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                    <div>
                                                                        <div style="margin-left: 10px; min-width: 20px; width: 20px; min-height: 20px; height: 20px;">
                                                                            <div class="paytable_icon_sprites cross" style="display: block; transform: scale(0.5); position: relative; right: 10px; bottom: 10px; min-width: 40px; width: 40px; min-height: 40px; height: 40px; background-position: -389px -123px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="ways_desc2" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Total number of winning bet ways for each symbol are calculated by multiplying the number of adjacent winning symbols on each symbols from the leftmost reel to the right.
                                                    </div>
                                                </div>
                                                <div id="from_above_example_01" class="text_box_div" style="color: rgb(255, 255, 255); font-size: 14px; width: fit-content; padding-top: 0px; padding-bottom: 0px;">
                                                    <div align="center">From Above Example:</div>
                                                    <div align="center" style="color: rgb(180, 120, 80);">1 x 3 x 2 = 6</div>
                                                </div>
                                                <div id="ways_desc3" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>The winning symbol payout is multiplied by the number of winning bet ways.
                                                    </div>
                                                </div>
                                                <div id="from_above_example_02" class="grid_div">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle; padding-right: 35px;">
                                                                    <div id="from_above_example_02_table" class="inline_table" style="color: rgb(255, 255, 255); font-size: 14px; padding-bottom: 15px; padding-top: 15px;">
                                                                        <table style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                                        <div style="display: table; border-collapse: collapse; width: 100%; height: fit-content;">
                                                                                            <div id="symbol_icon" style="display: table-cell; vertical-align: middle; padding-right: 6px;">
                                                                                                <div align="center" style="width: 75px;">
                                                                                                    <div style="min-width: 60px; width: 60px; min-height: 60px; height: 60px;">
                                                                                                        <div class="paytable_icon_sprites questionmark" style="display: block; transform: scale(0.5); position: relative; right: 30px; bottom: 30px; min-width: 120px; width: 120px; min-height: 120px; height: 120px; background-position: -389px -1px;"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div id="symbol_payout_data" align="left" style="width: 100%; display: table-cell; vertical-align: middle;">
                                                                                                <table style="border-collapse: collapse;">
                                                                                                    <tbody>
                                                                                                        <tr style="height: 16px;">
                                                                                                            <td style="padding-right: 10px;color:rgb(204, 204, 204)">5</td>
                                                                                                            <td style="color:rgb(204, 204, 204)">500</td>
                                                                                                        </tr>
                                                                                                        <tr style="height: 16px;">
                                                                                                            <td style="padding-right: 10px;color:rgb(204, 204, 204)">4</td>
                                                                                                            <td style="color:rgb(204, 204, 204)">100</td>
                                                                                                        </tr>
                                                                                                        <tr style="height: 16px; color: rgb(180, 120, 80);">
                                                                                                            <td style="padding-right: 10px;">3</td>
                                                                                                            <td style="color:rgb(180, 120, 80)">10</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                                <td align="center" colspan="1" rowspan="1" style="padding-bottom: 0px; vertical-align: middle;">
                                                                    <div id="from_above_example_03" class="text_box_div" style="display: table-cell; color: rgb(255, 255, 255); font-size: 14px; width: fit-content; padding-top: 0px; padding-bottom: 0px;">
                                                                        <div align="center" style="width: 130px;">Total Winnings in this example:</div>
                                                                        <div align="center" style="color: rgb(180, 120, 80); width: 130px;">10 x 6 = 60</div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="ways_desc4" class="list" style="font-size: 14px; color: rgb(204, 204, 204); padding: 0px; margin: 20px 20px 20px 32px; line-height: normal; text-align: left; list-style-position: outside;">
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>After the payout of every round is made, all winning symbols will explode allowing the symbols above them to cascade down for a new round.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 12px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>Additional winning combination will be tallied in every round until no more winning combination can be tallied.
                                                    </div>
                                                    <div style="list-style: none; position: relative; margin-bottom: 0px;">
                                                        <div style="position: absolute; top: 7px; left: -12px; width: 4px; height: 4px; background-color: rgb(204, 204, 204);"></div>All wins shown in cash.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: inherit;">
                        <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding: 10px 11px; height: 43px; background-color: rgb(40, 40, 52); color: rgb(180, 120, 80);">
                            <div class="paytable-rules-button-container" style="width: 25px; height: 25px;"></div>
                            <div style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 70%; text-align: center; font-size: 18px; padding-top: 0px;">Paytable</div>
                            <div class="paytable-rules-button-container" style="width: 25px; height: 25px; padding-top: 0px;">
                                <div class="paytable-rules-dismiss-button" tabindex="-1" style="display: flex; flex-direction: column; place-content: center; width: inherit; height: inherit;">
                                    <div class="cross-stroke left" style="position: absolute; width: inherit; height: 1px; background-color: rgb(150, 150, 150); transition: all 0.3s ease 0s; transform: rotate(45deg);"></div>
                                    <div class="cross-stroke right" style="position: absolute; width: inherit; height: 1px; background-color: rgb(150, 150, 150); transition: all 0.3s ease 0s; transform: rotate(135deg);"></div>
                                </div>
                            </div>
                        </div>
                        <div style="width: inherit; height: 2px; opacity: 0.25; background-image: linear-gradient(black, transparent);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".paytable-rules-dismiss-button").click(function() {
            const data = {
                "action": "close_history"
            }
            // window.parent.C3.Plugins.TegaGame_slotgen_api_connect.Acts.CloseHistories();
            window.parent.postMessage(
                // 👇️ data you want to pass to the other page
                data,
                // 👇️ no preference about the origin of the destination
                '*',
            );
        })
        window.addEventListener('message', event => {
            console.log(event.data)
            var scale = event.data.scale;
            document.documentElement.style
                .setProperty('--construct-scale', scale);
        });
        const data = {
            "action": "load_scale"
        }
        // window.parent.C3.Plugins.TegaGame_slotgen_api_connect.Acts.CloseHistories();
        window.parent.postMessage(
            // 👇️ data you want to pass to the other page
            data,
            // 👇️ no preference about the origin of the destination
            '*',
        );

    });
</script>
<style>
    #game-shell {
        transform: scale(calc(var(--construct-scale) *1.44));
        transform-origin: left top;
    }

    .paytable_wild {
        background-image: url({{$gamePublicFolder}}/1.png);
        background-position: -1px -1px;
        background-repeat: no-repeat;
        background-size: 123px 124px;
        display: inline-block;
        height: 122px;
        min-height: 122px;
        min-width: 121px;
        overflow: hidden;
        width: 121px
    }

    .paytable_symbols {
        background-image: url({{$gamePublicFolder}}/2.png);
        background-repeat: no-repeat;
        background-size: 358px 408px;
        display: inline-block;
        overflow: hidden
    }

    .paytable_symbols.ball2 {
        background-position: -137px -1px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.ball5 {
        background-position: -137px -132px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.bamboo2 {
        background-position: -1px -147px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.bamboo5 {
        background-position: -112px -263px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.char8 {
        background-position: -1px -278px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.green {
        background-position: -223px -263px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.red {
        background-position: -248px -1px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_symbols.scatter {
        background-position: -1px -1px;
        height: 144px;
        min-height: 144px;
        min-width: 134px;
        width: 134px
    }

    .paytable_symbols.white {
        background-position: -248px -132px;
        height: 129px;
        min-height: 129px;
        min-width: 109px;
        width: 109px
    }

    .paytable_icon_sprites {
        background-image: url({{$gamePublicFolder}}/4.png);
        background-repeat: no-repeat;
        background-size: 510px 164px;
        display: inline-block;
        overflow: hidden
    }

    .paytable_icon_sprites.cross {
        background-position: -389px -123px;
        height: 40px;
        min-height: 40px;
        min-width: 40px;
        width: 40px
    }

    .paytable_icon_sprites.img1 {
        background-position: -1px -1px;
        height: 156px;
        min-height: 156px;
        min-width: 192px;
        width: 192px
    }

    .paytable_icon_sprites.img2 {
        background-position: -195px -1px;
        height: 156px;
        min-height: 156px;
        min-width: 192px;
        width: 192px
    }

    .paytable_icon_sprites.questionmark {
        background-position: -389px -1px;
        height: 120px;
        min-height: 120px;
        min-width: 120px;
        width: 120px
    }

    .paytable_icon_sprites.tick {
        background-position: -431px -123px;
        height: 36px;
        min-height: 36px;
        min-width: 48px;
        width: 48px
    }

    .paytable_win_sprites {
        background-image: url({{$gamePublicFolder}}/3.png);
        background-repeat: no-repeat;
        background-size: 602px 1024px;
        display: inline-block;
        overflow: hidden
    }

    .paytable_win_sprites.freespins {
        background-position: -1px -1px;
        height: 528px;
        min-height: 528px;
        min-width: 600px;
        width: 600px
    }

    .paytable_win_sprites.gold-plated-symbols {
        background-position: -1px -531px;
        height: 492px;
        min-height: 492px;
        min-width: 600px;
        width: 600px
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

    .lobby .screen_color {
        background-color: #fff
    }

    #splash {
        background-image: url(blob:https://m.pgsoft-games.com/abbaae74-cbcd-4120-81ee-8f5eb95a7aa7);
        background-position: 50%;
        background-size: cover;
        position: absolute
    }

    #background-img {
        background-image: url(blob:https://m.pgsoft-games.com/fa6e7e0c-af32-4375-b7c2-4040c47a4775);
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
        font-size: 15px;
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
        font-size: 15px;
        font-weight: 900
    }

    .version {
        bottom: 86px;
        font-size: 15px;
        position: absolute;
        text-align: center;
        width: 100%
    }

    .dark .text-port,
    .lobby .text-port {
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

    .dark .animated_text_wrap,
    .lobby .animated_text_wrap {
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
        background-image: url(https://static.pgsoft-games.com/shared/ad52f8ee3c/e2cf6fa310.663ff.png);
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

    .lobby .progress-bar-background {
        background-color: #f5f5f5
    }

    .lobby .border-outer {
        display: none
    }

    .lobby .border-inner {
        border: 1.7px solid #f5f5f5
    }

    .lobby .front-highlight {
        opacity: .5
    }

    .lobby .top-highlight {
        display: none
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
        font-size: 15px;
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
        height: 219.3px
    }

    .footer-mask-container-land {
        height: 140px
    }

    .footer-mask {
        height: 100%;
        position: absolute;
        width: 100%
    }

    .footer-mask-black {
        background-image: linear-gradient(180deg, transparent, rgba(0, 0, 0, .3))
    }

    .footer-mask-color {
        background-image: linear-gradient(180deg, hsla(0, 0%, 100%, 0), #fff)
    }

    .footer-container img {
        height: 117px;
        width: 100%
    }

    .footer-image-container {
        height: 100%;
        overflow: hidden;
        position: absolute;
        width: 100%;
        z-index: 0
    }

    .footer-image-land,
    .footer-image-land-pc,
    .footer-image-port {
        background-image: url(blob:https://m.pgsoft-games.com/28b1364f-4829-4c38-9fcc-9d875776607f);
        background-position: 50%;
        background-size: cover;
        position: absolute
    }

    .footer-image-port {
        height: 126px;
        width: 360px
    }

    .footer-image-land,
    .footer-image-land-pc {
        bottom: 0;
        height: 47px;
        width: 100%
    }

    .footer-tag-port {
        top: -20px;
        z-index: 1
    }

    .footer-tag-port,
    .tag-container {
        height: 40px;
        position: absolute;
        right: 10px;
        width: 40px
    }

    .tag-canvas {
        height: 40px;
        width: 40px
    }

    .lobby .footer-mask-container-port {
        display: none
    }

    .swipeup_text {
        bottom: 40px;
        font-size: 15px
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

    .lobby #canvas-shadow {
        -webkit-filter: drop-shadow(2px 2px 10px rgba(0, 0, 0, .12));
        filter: drop-shadow(2px 2px 10px rgba(0, 0, 0, .12))
    }
</style>


</html>