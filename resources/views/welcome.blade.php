<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('listar_agenda') }}">Painel do Sistema</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Cadastre-se</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="https://1.bp.blogspot.com/-eoIpHfFJvpM/XuKJagds2UI/AAAAAAAAAX8/7Q4PW6WAIu8qWBzCF6x3ijaRLdt2ONi0wCLcBGAsYHQ/s1600/LOGO.png">
                
            </div>
            
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12 pt-5" style="background-color: #ede4e4;">
                    <img src="https://1.bp.blogspot.com/-_sfSzFCxzBo/XuKJeQv5HlI/AAAAAAAAAYI/76icd_oFgM8g8u2NlAVJyTmrm2SK_Rv3wCEwYBhgLKtQDAL1OcqzxEFcTZtP_u8_2uFYEW_dJ6OTgzda_dT3llWQETexIzpiUxTPVyJBWi3dEvnPpB0HkEaLJOe-A-yw_QU5YuC_VqGVwF8Y6fbSfMGkVQh8w68yxuGe54MGi7bcSeBrtYOHe2YhvTARucUGcVCMZ_x44I2pCxG_oD1MSd_b1gPsZ3mPcyMxwWnHtbTtHK0G5HcWTCPuZGb2nOGH6BOPdONMYIdkDwwL_zh7qKK1JZQW-aSnY1Of5gigLb6M9SMw9Vn3WkdIkOwZQ1dSDaig1LCLNLsBHRt7oSI_v_VH_I3lB5gMnXZr3ilzCAMTW8GfFzPimhpiv-NPap8cG-T2-oPgods_HUa8opHwqIiLEcxjH9FQ4Ow-H57yKdrVQ24hz6QINOhkcNcSgB99Qk4KVpC1IIlcSvldbdGugcBKN7a9VAu1YtSDfBM2lDC04OsF2owWDAundPvKF2O5NC1bTF_9-7EumHzboOWQaNzGVDoG9MopgMBBsO8uxt7hNFTBvDZtSBMXee_O5yjM-UkD9Anyne0w1xPhj2Dh8KTnU1LpgkxBhiKpz09gNxgGUcZix555IzYSXF3lNxqa1oh5mYtLm9fbcGY8Rjtswm_oK4-bXMICZivcF/s1600/LOGO2.png">
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

    </body>
</html>
