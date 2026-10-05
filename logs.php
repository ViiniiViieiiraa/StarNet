<!DOCTYPE html>
<html lang="en">
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Logs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        form {
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            color: white;
        }

        textarea.form-control,
        input[type="text"].form-control {
            background-color: #444;
            color: white;
            border: 1px solid #555;
        }

        pre {
            white-space: pre-wrap;
            background-color: #1f2833;
            padding: 10px;
            border-radius: 4px;
            color: #66fcf1;
            overflow-x: auto;
        }

        button {
            padding: 12px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #00d2d3;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        textarea.form-control:focus,
        input[type="text"].form-control:focus {
            background-color: #444 !important;
            color: white;
            border: 1px solid #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 17px;
            color: white;
        }

        table th {
            background-color: #00a8a9;
            color: white;
            padding: 10px;
            text-align: left;
            white-space: nowrap;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #555;
            white-space: nowrap;
        }

        #fecharComandos {
            background-color: #ff6347;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1;
            padding: 0;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            border: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.25);
        }

        .btn:hover {
            background-color: #4f4f4f;
            color: white;
        }

        .btn:active {
            background-color: #003b7a;
            box-shadow: 0 1px 2px rgba(0, 123, 255, 0.5) inset;
        }

        .form-check-label {
            margin-top: 5px;
        }

        .form-check-input {
            margin-top: 10px;
        }

        #loading {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #4b7bec;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
            margin-top: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        .top {
            background: #2e45709f;
            height: 180px;
            border-top: 20px solid #296068;
        }
        .container-new2 {
            background-color: #367a83ec;
        }

        .py-6 {
            padding-top: 40px !important;
            padding-bottom: 40px !important;
        }

        .px-3 {
            padding-right: 16px !important;
            padding-left: 16px !important;
        }

        .text-center {
            text-align: center !important;
        }

        .list-style-none {
            list-style: none !important;
        }

        .d-flex {
            display: flex !important;
        }

        .flex-justify-center {
            justify-content: center !important;
        }

        .f4 {
            font-size: 20px !important;
        }

        .d-inline-block {
            display: inline-block !important;
        }

        .m-2 {
            margin: 8px !important;
        }

        .current {
            color: rgba(255, 255, 255, 0.65);
        }
    </style>
</head>

<body>

    <div class="top">
        <header>
            <div class="container-new2 py-6 px-3 text-center">
                <h1 style="font-size: 35px;">AUTOMATION</h1>
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

    <div class="container mt-5">
        <h2>Search/Logs Page</h2>
        <form id="searchForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="searchTextarea">Search multiple terms (one per line):</label>
                        <textarea class="form-control" id="searchTextarea" rows="4"
                            placeholder="Enter search terms"></textarea>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkInterface">
                                <label class="form-check-label" for="checkInterface">INTERFACES (UP / DOWN)</label>
                            </div>

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkARP">
                                <label class="form-check-label" for="checkARP">DISP ARP</label>
                            </div>

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkVersion">
                                <label class="form-check-label" for="checkVersion">DISP VER</label>
                            </div>

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkVRRP">
                                <label class="form-check-label" for="checkVRRP">DISP VRRP</label>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkPing">
                                <label class="form-check-label" for="checkPing">PING</label>
                            </div>

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkSysName">
                                <label class="form-check-label" for="checkSysName">SYS NAME</label>
                            </div>

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkUptime">
                                <label class="form-check-label" for="checkUptime">SYS UP TIME</label>
                            </div>

                            <div class="form-check form-check-column">
                                <input class="form-check-input" type="checkbox" id="checkIPOIBGP">
                                <label class="form-check-label" for="checkIPOIBGP">LOOPBACK 1 OI</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <table>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="searchMultipleTerms()">Pesquisar</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary infoRouterButton"
                            data-ip-backup="<?php echo $row["ip_bkp"]; ?>" data-vendor="<?php echo $row["vendor"]; ?>">
                            Logs Router
                        </button>
                    </td>
                </tr>
            </table>

        </form>

        <div id="resultTable" class="mt-3"></div>

        <div id="loading">
            <p>Obtendo informações...</p>
            <div class="loader"></div>
        </div>

        <div id="routerInfo"></div>

        <div class="form-group">
            <button id="fecharComandos" type="button" class="btn btn-danger" style="display: none;"
                onclick="closeComandos()">X</button>
            <textarea class="form-control" id="comandosTextarea" rows="11" placeholder="Comandos"></textarea>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script>
        var selectedIPs = [];
        var selectedVENDORs = [];

        function searchMultipleTerms() {
            var checkboxes = document.querySelectorAll('.comandosCheck');
            var countUnchecked = 0;

            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    checkbox.checked = false;
                    countUnchecked++;
                }
            });

            console.log(countUnchecked + " checkboxes foram desmarcadas. (searchMultipleTerms)");

            var searchTerms = document.getElementById('searchTextarea').value.split('\n').map(term => term.trim());

            searchTerms = searchTerms.filter(term => term !== "");

            if (searchTerms.length === 0) {
                console.log("(searchMultipleTerms) Textarea está vazio. Não realizando busca.");
                return;
            }

            $.ajax({
                url: 'router_form.php',
                type: 'POST',
                data: { searchTerms: searchTerms },
                success: function (response) {
                    $('#resultTable').html(response);
                }
            });
        }

        function getRouterInfo() {

            const IpMultiple = selectedIPs.join(',');
            const VendorMultiple = selectedVENDORs.join(',');
            const loadingDiv = document.getElementById('loading');

            const checkPing = document.getElementById('checkPing').checked;
            const checkInterface = document.getElementById('checkInterface').checked;
            const checkSysName = document.getElementById('checkSysName').checked;
            const checkARP = document.getElementById('checkARP').checked;
            const checkVersion = document.getElementById('checkVersion').checked;
            const checkVRRP = document.getElementById('checkVRRP').checked;
            const checkUptime = document.getElementById('checkUptime').checked;
            const checkIPOIBGP = document.getElementById('checkIPOIBGP').checked;

            loadingDiv.style.display = 'block';

            console.log("(getRouterInfo) Valores de 'ip_bkp' enviados para logsv2.php:", IpMultiple);
            console.log("(getRouterInfo) Valores de 'vendor' enviados para logsv2.php:", VendorMultiple);

            var testsToRun = [];
            if (checkPing) testsToRun.push('ping');
            if (checkInterface) testsToRun.push('interface');
            if (checkSysName) testsToRun.push('sysname');
            if (checkARP) testsToRun.push('arp');
            if (checkVersion) testsToRun.push('version');
            if (checkVRRP) testsToRun.push('vrrp');
            if (checkUptime) testsToRun.push('uptime');
            if (checkIPOIBGP) testsToRun.push('ipoibgp');

            var queryString = `logsv2.php?ip=${IpMultiple}&type=${VendorMultiple}&tests=${testsToRun.join(',')}`;

            var xhr = new XMLHttpRequest();
            xhr.open('GET', queryString, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var routerInfoElement = document.getElementById('routerInfo');
                    loadingDiv.style.display = 'none';
                    if (routerInfoElement) {
                        routerInfoElement.innerHTML = xhr.responseText;
                    } else {
                        console.error("Elemento 'routerInfo' não encontrado.");
                    }
                }
            };
            xhr.send();
        }

        function updateSelectedIPs(checkbox) {
            selectedIPs = [];
            selectedVENDORs = [];

            var checkboxes = document.querySelectorAll('.comandosCheck');
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    var ipBackup = checkbox.closest('tr').querySelector('.ipBackupColumn').textContent;
                    selectedIPs.push(ipBackup);

                    var vendorValue = checkbox.closest('tr').querySelector('.vendorColumn').textContent;
                    selectedVENDORs.push(vendorValue);
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            var infoRouterButtons = document.querySelectorAll('.infoRouterButton');
            infoRouterButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var ipBackup = this.getAttribute('data-ip-backup');
                    var vendorValue = this.getAttribute('data-vendor');
                    getRouterInfo(ipBackup, vendorValue);
                });
            });
        });

        function toggleAdditionalInfo(button) {
            var parentRow = button.closest('tr');

            var additionalInfoRow = parentRow.nextElementSibling;

            if (additionalInfoRow.style.display === 'none' || additionalInfoRow.style.display === '') {
                additionalInfoRow.style.display = 'table-row';
            } else {
                additionalInfoRow.style.display = 'none';
            }
        }

        function showComandos(clickedButton) {
            var parentRow = findParentRow(clickedButton, 'tr');

            if (parentRow) {
                var ipBackup = parentRow.querySelector('.ipBackupColumn').textContent;
                var ipVlan = parentRow.querySelector('.ipVlanColumn').textContent;

                var comandosString = "%%%%%%%%%%%%%%%%%%%%%%%% TESTES %%%%%%%%%%%%%%%%%%%%%%%%" + "\n";
                comandosString += "\n";
                comandosString += "### COMUTAÇÃO BGP ###" + "\n";
                comandosString += "ping -c 1000 -a " + ipVlan + "(+1) xxx.xx.xxx.xx" + "\n";
                comandosString += "\n";
                comandosString += "### COMUTAÇÃO VRRP (CTC) ###" + "\n";
                comandosString += "ping vrf empresa_PA " + ipVlan + "(+1) source xxx.xx.xxx.xx repeat 1400 size 1300" + "\n";
                comandosString += "\n";
                comandosString += "### LATENCIA PINCIPAL ###" + "\n";
                comandosString += "ping -c 10 -s 1300 -a " + ipVlan + "(+1) xxx.xx.xxx.xx" + "\n";
                comandosString += "\n";
                comandosString += "### LATENCIA BKP ###" + "\n";
                comandosString += "ping -c 10 -s 1300 -a " + ipBackup + " xxx.xx.xxx.xx" + "\n";
                comandosString += "\n";
                comandosString += "### LATENCIA BKP CISCO ###" + "\n";
                comandosString += "ping xxx.xx.xxx.xx source " + ipBackup + " r 30 s 1300" + "\n";

                var vendorValue = parentRow.querySelector('.vendorColumn').textContent;
                var VendorMultiple = "";
                var validVendors = ["h3c", "hpe", "cisco"];
                if (validVendors.includes(vendorValue.toLowerCase())) {
                    VendorMultiple = "HP";
                } else if (vendorValue.toLowerCase() === "huawei") {
                    VendorMultiple = "HUAWEI";
                } else {
                    console.log("VendorMultiple não retornou (showComandos)");
                }

                if (VendorMultiple === "HP") {
                    comandosString += "\n";
                    comandosString += "### SNMP ###" + "\n";
                    comandosString += "snmpwalk -v 3 -l command " + ipBackup + "\n";
                } else if (VendorMultiple === "HUAWEI") {
                    comandosString += "\n";
                    comandosString += "### SNMP ###" + "\n";
                    comandosString += "snmpwalk -v 3 -l command " + ipBackup + "\n";
                }

                var comandosTextarea = document.getElementById('comandosTextarea');

                if (comandosTextarea) {
                    comandosTextarea.style.display = 'block';
                    document.getElementById('fecharComandos').style.display = 'inline';
                    comandosTextarea.value = comandosString;
                } else {
                    console.error("Elemento 'comandosTextarea' não encontrado.");
                }
            }
        }

        window.addEventListener('load', function () {
            var comandosTextarea = document.getElementById('comandosTextarea');
            if (comandosTextarea) {
                comandosTextarea.style.display = 'none';
            } else {
                console.error("Elemento 'comandosTextarea' não encontrado.");
            }
        });

        function findParentRow(element, tagName) {
            tagName = tagName.toUpperCase();
            while (element && element.tagName !== tagName) {
                element = element.parentNode;
            }
            return element;
        }

        function closeComandos() {
            var comandosTextarea = document.getElementById('comandosTextarea');
            var fecharComandos = document.getElementById('fecharComandos');
            if (comandosTextarea && fecharComandos) {
                comandosTextarea.style.display = 'none';
                fecharComandos.style.display = 'none';
            } else {
                console.error("Elemento 'comandosTextarea' ou 'fecharComandos' não encontrado.");
            }
        }

    </script>
    <!--
    Este código pertence a: Vinicius Vieira
    GitHub: https://github.com/ViiniiViieiiraa
    -->
</body>
<style>

</style>

</html>