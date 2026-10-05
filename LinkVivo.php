<?php
/*
Este código pertence a: Vinicius Vieira
GitHub: https://github.com/ViiniiViieiiraa
*/
include 'connect.php';

$f = [];

if(isset($_POST['sub'])) {
    $localId = $_POST['CodLot'];

    $consulta = "SELECT * FROM HOSTS_empresa_PA WHERE site = :localId";
    $stmt = $conn->prepare($consulta);
    $stmt->bindParam(':localId', $localId, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $f = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Circuito VIVO</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/styleDark.css">
      <script src="https://unpkg.com/sweetalert2@7.12.15/dist/sweetalert2.all.js"></script>
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
   </head>
<body>
    <div class="header_sectionVivo">
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
    <div class="container-fluid">
        <div class="row">
            <!-- Formulário 1 -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-info">
                        <h1 style="color:white">Ficha local</h1>
                        <p class="mb-4">Coloque o código da UL para preencher as informações.</p>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Código UL</label>
                                        <input type="text" placeholder="Digite a UL" class="form-control" name="CodLot" value="<?php echo isset($_POST['CodLot']) ? $_POST['CodLot'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Link Principal</label>
                                        <span class="form-control" id="LinkLot"><?php echo isset($f['wan_telco']) ? $f['wan_telco'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Owner</label>
                                        <span class="form-control" id="OwnerLot"><?php echo isset($f['lan_telco']) ? $f['lan_telco'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Nome local</label>
                                        <span class="form-control" id="NomeLot"><?php echo isset($f['nome']) ? $f['nome'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group first">
                                        <label>Tipo</label>
                                        <span class="form-control" id="TipoLot"><?php echo isset($f['site_type']) ? $f['site_type'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group first">
                                        <label>TFL</label>
                                        <span class="form-control" id="TflLot"><?php echo isset($f['tfl']) ? $f['tfl'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Modelo Roteador</label>
                                        <span class="form-control" id="ModelLot"><?php echo isset($f['model']) ? $f['model'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Fornecedor</label>
                                        <span class="form-control" id="VendorLot"><?php echo isset($f['vendor']) ? $f['vendor'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>IP LOOPBACK 1</label>
                                        <span class="form-control" id="IpLot"><?php echo isset($f['ip']) ? $f['ip'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>IP LOOPBACK 10</label>
                                        <span class="form-control" id="IpBkpLot"><?php echo isset($f['ip_bkp']) ? $f['ip_bkp'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <label>IP Rede VLAN</label>
                                        <span class="form-control" id="IpLanLot"><?php echo isset($f['ip_lan']) ? $f['ip_lan'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <label>IP SWITCH</label>
                                        <span class="form-control" id="IpSwLot"><?php echo isset($f['ip_sw']) ? $f['ip_sw'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <label>IP WAN PRIMÁRIO</label>
                                        <span class="form-control" id="IpWanLot"><?php echo isset($f['ip_wan']) ? $f['ip_wan'] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group last mb-3">
                                        <label>IP WAN BACKUP</label>
                                        <span class="form-control" id="IpWanBLot"><?php echo isset($f['ip_wan_b']) ? $f['ip_wan_b'] : ''; ?></span>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-5">
                                <button type="submit" name="sub" id="puxar" class="botoes-bt-my" value="submit"></button>
                                <label for="puxar">Preencher</label>
                            </div>
                            <div class="col-md-3">
                                <a href="LinkVivo.php">
                                    <button type="button" id="reload" class="botoes-bt-my"></button>
                                    <label for="reload">Apagar</label>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="gerar" class="botoes-bt-my" onclick="reescreverScript(), reescreverScriptSwitch()"></button>
                                <label for="gerar">Gerar Script</label>
                            </div>

                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Formulário 2 -->
            <div class="col-lg-6 mb-4">
                <div class="container">
                    <div class="contact_section">
                        <!-- Conteúdo do Formulário 2 -->
                        <div class="row">
                            <h1 class="contact_taital">Chip Do Elsys</h1>
                            <div class="col-md-4">
                                <input type="radio" name="chip" id="chipARQIA" class="botoes-bt" value="chipARQIA" required>
                                <label for="chipARQIA">ARQIA</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="chip" id="chipVIVO" class="botoes-bt" value="chipVIVO" required>
                                <label for="chipVIVO">VIVO</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="chip" id="chipTIM" class="botoes-bt" value="chipTIM" required>
                                <label for="chipTIM">TIM</label>
                            </div>
                        </div>
                        <div class="row">
                            <h1 class="contact_taital">Modelo do router ?</h1>
                            <div class="col-md-4">
                                <input type="radio" name="roteador" id="hp" class="botoes-bt" value="hp" required>
                                <label for="hp">HP</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="roteador" id="huawei" class="botoes-bt" value="huawei" required>
                                <label for="huawei">HUAWEI</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="roteador" id="cisco" class="botoes-bt" value="cisco" required>
                                <label for="cisco">CISCO</label>
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
                        <div class="row">
                            <h1 class="contact_taital">Precisa de switch ?</h1>
                            <div class="col-md-6">
                                <input type="radio" name="switch" id="comSwitch" class="botoes-bt" value="comSwitch" required>
                                <label for="comSwitch">SIM</label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="switch" id="semSwitch" class="botoes-bt" value="semSwitch" required>
                                <label for="semSwitch">NÃO</label>
                            </div>
                        </div>
                        <div id="switchOptions" class="row" style="display: none;">
                            <h1 class="contact_taital">Versão do Switch</h1>
                            <div class="col-md-4">
                                <input type="radio" name="versaoSwitch" id="switch57" class="botoes-bt" value="switch57" required>
                                <label for="switch57">Huawei 5700</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="versaoSwitch" id="switch27" class="botoes-bt" value="switch27" required>
                                <label for="switch27">Huawei 2700 (Quidway)</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="versaoSwitch" id="datacom" class="botoes-bt" value="datacom"
                                    required>
                                <label for="datacom">Datacom</label>
                            </div>
                        </div>
                        <br></br>
                        <form method="post">
                            <div class="row">
                                <h1 class="contact_taital">Insira os IPS</h1>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="codigoUL" value="<?php echo isset($f['site']) ? $f['site'] : ''; ?>">
                                        <label for="codigoUL" class="input-group_label">CODIGO UL</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipLoopback" value="<?php echo isset($f['ip_bkp']) ? $f['ip_bkp'] : ''; ?>">
                                        <label for="ipLoopback" class="input-group_label">IP LOOPBACK10</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipRedeVlan" value="<?php echo isset($f['ip_lan']) ? $f['ip_lan'] : ''; ?>">
                                        <label for="ipRedeVlan" class="input-group_label">IP REDE VLAN</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipSwitch" value="<?php echo isset($f['ip_sw']) ? $f['ip_sw'] : ''; ?>">
                                        <label for="ipSwitch" class="input-group_label">IP SWITCH</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipSwitchRouter">
                                        <label for="ipSwitchRouter" class="input-group_label">IP SWITCH ROUTER (SEN)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipRedeSwitch">
                                        <label for="ipRedeSwitch" class="input-group_label">IP REDE SWITCH</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipLoopbackPrim" value="<?php echo isset($f['ip']) ? $f['ip'] : ''; ?>">
                                        <label for="ipLoopbackPrim" class="input-group_label">IP LOOPBACK PRIM</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="email-bt custom-input" name="Email" id="ipWanPrim" value="<?php echo isset($f['ip_wan']) ? $f['ip_wan'] : ''; ?>">
                                        <label for="ipWanPrim" class="input-group_label">IP WAN PRIMARIO</label>
                                    </div>
                                </div>
                            </div>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="button-container">
        <!-- <button type="button" onclick="reescreverScript(), reescreverScriptSwitch()"><a>Gerar</a></button> -->
        <button type="button" id="copyButtonRouter" onclick="copyScriptRouter()" style="display: none;"><a>Copy Router</a></button>
        <button type="button" id="copyButtonSwitch" onclick="copyScriptSwitch()" style="display: none;"><a>Copy Switch</a></button>
    </div>
    <center>
        <div class="card_gerar col-md-12">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="massage-bt-wrapper">
                <pre class="card-inner" placeholder="SCRIPT REESCRITO" rows="8" id="scriptOutputRouter" name="Massage"></pre>
            </div>
        </div>
        <br></br>
        <div class="card_gerar col-md-12">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="massage-bt-wrapper">
                <pre class="card-inner" placeholder="SCRIPT REESCRITO" rows="8" id="scriptOutputSwitch" name="Massage"></pre>
            </div>
        </div>
    </center>
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
    <!-- START SCRIPTS -->
    <script src="js/FonteLinkVIVO.js"></script>
    <script src="js/JSgeralVIVO.js"></script>
    </body>
    
</html>