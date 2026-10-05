<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <!-- site metas -->
    <title>Rede Antiga / Vsat</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/styleDark.css">
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
</head>

<body>
    <!-- header section start -->
    <div class="header_sectionVsat">
        <div class="header_main">
            <div class="container-fluid">
                <div class="menu_main">
                    <ul>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br></br>

    <div class="container">
        <div class="">
            <div class="row">
                <h1 class="contact_taital">A local é Hibrida ?</h1>
                <div class="col-md-6">
                    <input type="radio" name="owner" id="SiHibri" class="botoes-bt" value="SiHibri" required>
                    <label for="SiHibri">SIM</label>
                </div>
                <div class="col-md-6">
                    <input type="radio" name="owner" id="NoHibri" class="botoes-bt" value="NoHibri" required>
                    <label for="NoHibri">NÃO</label>
                </div>
            </div>
            <div class="row">
                            <h1 class="contact_taital">Modelo do router ?</h1>
                            <div class="col-md-6">
                                <input type="radio" name="roteador" id="hp" class="botoes-bt" value="hp" required>
                                <label for="hp">HP</label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="roteador" id="huawei" class="botoes-bt" value="huawei" required>
                                <label for="huawei">HUAWEI</label>
                            </div>
                        </div>
                        <div id="huaweiOptions" class="row" style="display: none;">
                            <h1 class="contact_taital">Versão do Huawei</h1>
                            <div class="col-md-6">
                                <input type="radio" name="versaoHuawei" id="v2r10" class="botoes-bt" value="v2r10" required>
                                <label for="v2r10">V2R10</label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="versaoHuawei" id="v2r7" class="botoes-bt" value="v2r7" required>
                                <label for="v2r7">V2R7</label>
                            </div>
                        </div>
            <form method="post">
                <div class="row">
                    <h1 class="contact_taital">Insira os IPS</h1>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="email-bt custom-input" name="Email" id="codigoUL">
                            <label for="codigoUL" class="input-group_label">CODIGO UL</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="email-bt custom-input" name="Email" id="ipLoopback">
                            <label for="ipLoopback" class="input-group_label">IP LOOPBACK10</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="email-bt custom-input" name="Email" id="ipRouterSen">
                            <label for="ipRouterSen" class="input-group_label">IP ROUTER (SEN)</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="email-bt custom-input" name="Email" id="ipRedeVlan">
                            <label for="ipRedeVlan" class="input-group_label">IP VLAN1</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="email-bt custom-input" name="Email" id="ipVsat">
                            <label for="ipVsat" class="input-group_label">IP VSAT</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="button-container">
            <button type="button" id="gerar"
                onclick="reescreverScript(), reescreverScriptSwitch()"><a>Router</a></button>
            <button type="button" id="copyButtonRouter" onclick="copyScriptRouter()" style="display: none;"><a>Copy Router</a></button>
        </div>
        <center>
            <div class="card_gerar col-md-12">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="massage-bt-wrapper">
                    <pre class="card-inner" placeholder="SCRIPT REESCRITO" rows="8" id="scriptOutputRouter"
                        name="Massage"></pre>
                </div>
            </div>
        </center>
        <!--
        Este código pertence a: Vinicius Vieira
        GitHub: https://github.com/ViiniiViieiiraa
        -->
        <!-- START SCRIPTS -->
        <script src="js/FonteVsat.js"></script>
        <script src="js/JSgeralVsat.js"></script>
</body>
</html>