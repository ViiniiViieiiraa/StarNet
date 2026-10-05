<?php

include 'connect.php';

/*
Este código pertence a: Vinicius Vieira
GitHub: https://github.com/ViiniiViieiiraa
*/

$f = [];

if (isset($_POST['sub'])) {
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

<?php
$file = '../torres.csv';
$filteredData = array();

if (($handle = fopen($file, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ';')) !== false) {
        $filteredData[] = $data;
    }
    fclose($handle);
}

if (isset($_GET['uf']) && isset($_GET['municipio'])) {
    $uf = strtolower($_GET['uf']);
    $municipio = strtolower($_GET['municipio']);
    $filteredData = array_filter($filteredData, function ($row) use ($uf, $municipio) {
        return strtolower($row[2]) == $uf && strtolower($row[3]) == $municipio;
    });
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['subject'])) {
    $to = "vinicius.vieira@Empresa.com";
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $fullMessage = "Você recebeu uma nova mensagem de: $email\n\nAssunto: $subject\n\nMensagem:\n$message";
    $headers = "From: noreply@automation.com\r\nContent-Type: text/plain; charset=UTF-8";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "sucesso";
    } else {
        echo "falha";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ficha UL</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleDark.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
    <style>
        .swal2-popup {
            background-color: #001925;
            border-left: 5px solid #ff7a01;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%);
            color: white;
            width: 80%;
            max-width: 800px;
        }

        .swal2-title {
            color: white !important;
        }

        .swal2-content {
            color: #87a4b6;
        }

        .swal2-input {
            max-height: 75px;
        }

        .swal2-input,
        .swal2-textarea {
            color: white;
            margin-bottom: 10px;
            width: 100%;
            height: 250px;
            padding: 10px;
            background-color: #002733;
            border: none;
            outline: none;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
            border-left: 1px solid transparent;
        }

        .swal2-input:focus,
        .swal2-textarea:focus {
            border-left: 5px solid #ff7a01;
        }

        .swal2-actions {
            display: flex;
            justify-content: space-between;
        }

        .swal2-confirm,
        .swal2-cancel {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            outline: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .swal2-confirm {
            color: #001925;
            background-color: #ff7a01;
        }

        .swal2-confirm:hover {
            background-color: transparent;
            border: 1px solid #ff7a01;
            color: #ff7a01;
        }

        .swal2-cancel {
            color: #ff7a01;
            background-color: transparent;
        }

        .swal2-cancel:hover {
            background-color: #ff7a01;
            color: #001925;
        }
    </style>
</head>

<body>

    <div class="top">
        <header>
            <div class="container-new2 py-6 px-3 text-center">
                <h1>AUTOMATION</h1>
                <ul class="nav list-style-none d-flex flex-justify-center f4">
                    <li>
                        <a class="d-inline-block m-2 current" href="index.php">HOME</a>
                    </li>
                    <li>
                        <a class="d-inline-block m-2 current" href="Ficha.php">FICHA UL</a>
                    </li>
                    <li>
                        <a class="d-inline-block m-2 current" href="logs.php">TESTES</a>
                    </li>
                </ul>
            </div>
        </header>
    </div>

    <center>
        <br></br>
        <p class="mb-4">Coloque o código da UL para preencher as informações.</p>
    </center>

    <div class="container mx-auto" style="max-width: 1550px;">
        <div class="card">
            <div class="card-info">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Código UL</label>
                                        <input type="text" placeholder="Digite a UL" class="form-control" name="CodLot"
                                            value="<?php echo isset($_POST['CodLot']) ? $_POST['CodLot'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Link Principal</label>
                                        <span class="form-control" id="LinkLot">
                                            <?php echo isset($f['wan_telco']) ? $f['wan_telco'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Owner</label>
                                        <span class="form-control" id="OwnerLot">
                                            <?php echo isset($f['lan_telco']) ? $f['lan_telco'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Nome local</label>
                                        <span class="form-control" id="NomeLot">
                                            <?php echo isset($f['nome']) ? $f['nome'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Tipo</label>
                                        <span class="form-control" id="TipoLot">
                                            <?php echo isset($f['site_type']) ? $f['site_type'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>TFL</label>
                                        <span class="form-control" id="TflLot">
                                            <?php echo isset($f['tfl']) ? $f['tfl'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Modelo Roteador</label>
                                        <span class="form-control" id="ModelLot">
                                            <?php echo isset($f['model']) ? $f['model'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Fornecedor</label>
                                        <span class="form-control" id="VendorLot">
                                            <?php echo isset($f['vendor']) ? $f['vendor'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>IP LOOPBACK 1</label>
                                        <span class="form-control" id="IpLot">
                                            <?php echo isset($f['ip']) ? $f['ip'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>IP LOOPBACK 10</label>
                                        <span class="form-control" id="IpBkpLot">
                                            <?php echo isset($f['ip_bkp']) ? $f['ip_bkp'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>IP Rede VLAN</label>
                                        <span class="form-control" id="IpLanLot">
                                            <?php echo isset($f['ip_lan']) ? $f['ip_lan'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>IP SWITCH</label>
                                        <span class="form-control" id="IpSwLot">
                                            <?php echo isset($f['ip_sw']) ? $f['ip_sw'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>IP WAN PRIMÁRIO</label>
                                        <span class="form-control" id="IpWanLot">
                                            <?php echo isset($f['ip_wan']) ? $f['ip_wan'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>IP WAN BACKUP</label>
                                        <span class="form-control" id="IpWanBLot">
                                            <?php echo isset($f['ip_wan_b']) ? $f['ip_wan_b'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Estado</label>
                                        <span class="form-control" id="UfLot">
                                            <?php echo isset($f['UF']) ? $f['UF'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Municipio</label>
                                        <span class="form-control" id="MuniLot">
                                            <?php echo isset($f['municipio']) ? $f['municipio'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Endereço</label>
                                        <span class="form-control" id="EndeLot">
                                            <?php echo isset($f['endereco']) ? $f['endereco'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" name="sub" id="puxar" class="botoes-bt-my"
                                        value="submit"></button>
                                    <label for="puxar">Preencher</label>
                                </div>
                                <div class="col-md-4">
                                    <a href="Ficha.php">
                                        <button type="button" id="reload" class="botoes-bt-my"></button>
                                        <label for="reload">Apagar</label>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="copiar" class="botoes-bt-my"
                                        onclick="copiarConteudo()"></button>
                                    <label for="copiar">Copiar Ficha</label>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="buscar" class="botoes-bt-my"></button>
                                    <label for="buscar">Buscar ERBs</label>
                                </div>

                                <div class="col-md-4">
                                    <button type="button" id="emailButton" class="botoes-bt-my-email"></button>
                                    <label for="emailButton">Enviar Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>local Hibrida</label>
                                        <span class="form-control" name="Hibrida" id="Hibrida">
                                            <?php echo isset($f['lot_hibrida']) ? $f['lot_hibrida'] : ''; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Terminais</label>
                                        <input type="text" placeholder="Número de Terminais" class="form-control"
                                            name="Terminais" id="Terminais">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Sera necessário Switch ?</label>
                                        <input type="text" placeholder="Sim ou Não" class="form-control"
                                            name="InstallSw" id="InstallSw">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Serial do Elsys</label>
                                        <input type="text" placeholder="1422 ou 1475" class="form-control" name="Serial"
                                            id="Serial">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Elsys ja instalado ?</label>
                                        <input type="text" placeholder="Sim ou Não" class="form-control" name="Elsys"
                                            id="Elsys">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Chip Elsys</label>
                                        <input type="text" placeholder="Chip do Elsys" class="form-control"
                                            name="ChipEl" id="ChipEl">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Anydesk</label>
                                        <input type="text" placeholder="Anydesk Técnico" class="form-control"
                                            name="Anydesk" id="Anydesk">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Tem Nobreak ?</label>
                                        <input type="text" placeholder="Sim ou Não" class="form-control" name="Nobreak"
                                            id="Nobreak">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group first">
                                        <label>Modelo Switch OI</label>
                                        <input type="text" placeholder="Modelo SW" class="form-control" name="SwOi"
                                            id="SwOi">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Nome do Tecnico</label>
                                        <input type="text" placeholder="Nome Tecnico" class="form-control"
                                            name="Tecnico" id="Tecnico">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Empreiteira</label>
                                        <input type="text" placeholder="Empreiteira" class="form-control"
                                            name="Empreiteira" id="Empreiteira">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>Designador Primario</label>
                                        <span class="form-control" id="circuito">
                                            <?php echo isset($f['desig_circ_pri']) ? $f['desig_circ_pri'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label>SkyEdge</label>
                                        <span class="form-control" id="skyedge">
                                            <?php echo isset($f['mod_skyedge']) ? $f['mod_skyedge'] : ''; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br></br>
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
    <script src="js/Ficha.js"></script>
    <script>
        document.getElementById("buscar").addEventListener("click", function () {
            var uf = document.getElementById("UfLot").innerText.trim();
            var municipio = document.getElementById("MuniLot").innerText.trim();

            if (uf !== '' && municipio !== '') {
                var url = "ERBs.php?uf=" + uf + "&municipio=" + municipio;
                window.open(url, "_blank");
            } else {
                alert("Sem os campos de Estado e Município.");
            }
        });
    </script>
    <script>
        document.getElementById('emailButton').addEventListener('click', function () {
            Swal.fire({
                title: 'Enviar Email',
                html: `
                        <input type="checkbox" style="width:20px; height:20px;" id="desalocacao" name="subject" value="Desalocação" onclick="toggleCheckbox(this)">
                        <label for="desalocacao" style="font-size:22px; color:White;">Desalocação</label>

                        <input type="checkbox" style="width:20px; height:20px;" id="divergencia" name="subject" value="Divergência" onclick="toggleCheckbox(this)">
                        <label for="divergencia" style="font-size:22px; color:White;">Divergência</label>

                        <input type="checkbox" style="width:20px; height:20px;" id="outro" name="subject" value="Outro" onclick="toggleCheckbox(this)">
                        <label for="outro" style="font-size:22px; color:White;">Outro</label>

                        <input id="swal-input1" class="swal2-input" placeholder="Seu e-mail (deve conter @)">
                        <textarea id="swal-input2" class="swal2-textarea" placeholder="Mensagem"></textarea>
                        <div style="text-align: left; margin-top: 10px;"></div>
                    `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                preConfirm: () => {
                    const email = Swal.getPopup().querySelector('#swal-input1').value;
                    const message = Swal.getPopup().querySelector('#swal-input2').value;
                    const desalocacaoChecked = Swal.getPopup().querySelector('#desalocacao').checked;
                    const divergenciaChecked = Swal.getPopup().querySelector('#divergencia').checked;
                    const outroChecked = Swal.getPopup().querySelector('#outro').checked;

                    if (!email.includes('@')) {
                        Swal.showValidationMessage('Você precisa digitar um e-mail válido contendo "@"!');
                        return false;
                    }
                    if (!message) {
                        Swal.showValidationMessage('Você precisa digitar uma mensagem!');
                        return false;
                    }
                    if (!desalocacaoChecked && !divergenciaChecked && !outroChecked) {
                        Swal.showValidationMessage('Você precisa selecionar uma opção de assunto!');
                        return false;
                    }

                    const subject = desalocacaoChecked ? 'Desalocação' : (divergenciaChecked ? 'Divergência' : 'Outro');

                    return fetch('', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        body: `email=${encodeURIComponent(email)}&message=${encodeURIComponent(message)}&subject=${encodeURIComponent(subject)}`
                    })
                        .then(response => response.text())
                        .then(result => {
                            if (result.includes('sucesso')) {
                                Swal.fire('Sucesso!', 'O e-mail foi enviado com sucesso!', 'success');
                            } else {
                                Swal.fire('Erro!', 'Falha ao enviar o e-mail.', 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Erro', 'Falha ao enviar o e-mail.', 'error');
                        });
                }
            });
        });

        function toggleCheckbox(element) {
            var checkboxes = document.getElementsByName('subject');
            checkboxes.forEach((item) => {
                if (item !== element) item.checked = false;
            });
        }
    </script>
</body>

</html>