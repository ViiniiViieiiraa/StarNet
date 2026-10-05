<?php
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['searchTerms'])) {
    $searchTerms = $_POST['searchTerms'];

    $conditions = [];
    foreach ($searchTerms as $term) {
        $conditions[] = "site LIKE '%$term%' OR ip_bkp LIKE '%$term%'";
    }

    $sql = "SELECT * FROM HOSTS_empresa_PA WHERE " . implode(" OR ", $conditions);

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='table-responsive'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>CODIGO UL</th>
                        <th>LOOPBACK10</th>
                        <th>VLAN (SUBNET)</th>
                        <th>FORNECEDOR</th>
                        <th>MODELO</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["site"] . "</td>
                        <td class='ipBackupColumn'>" . $row["ip_bkp"] . "</td>
                        <td class='ipVlanColumn'>" . $row["ip_lan"] . "</td>
                        <td class='vendorColumn'>" . $row["vendor"] . "</td>
                        <td>" . $row["model"] . "</td>
                        <td>
                            <div class='btn-group'>
                                <button class='btn btn-success showDetailsButton' onclick='toggleAdditionalInfo(this)'>Informações Adicionais</button>
                                <button class='btn btn-warning comandosButton' onclick='showComandos(this)'>Comandos</button>
                                <div class='btn-group'>
                                    <input type='checkbox' class='btn btn-success comandosCheck' style='width: 36.28px; height: 36.28px;' onchange='updateSelectedIPs(this)'></input>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class='additional-info-row' style='display: none; background-color: #2e2e2e;'>
                        <td colspan='6'>";
                
                    echo "<table>";
                
                    echo "<tr>
                            <th>NOME</th>
                            <th>LOOPBACK1</th>
                            <th>TIPO</th>
                            <th>LINK CONSORCIO</th>
                            <th>OWNER</th>
                            <th>TFL</th>
                        </tr>
                        <tr>
                            <td>" . $row["nome"] . "</td>
                            <td>" . $row["ip"] . "</td>
                            <td>" . $row["site_type"] . "</td>
                            <td>" . $row["wan_telco"] . "</td>
                            <td>" . $row["lan_telco"] . "</td>
                            <td>" . $row["tfl"] . "</td>
                        </tr>
                        <tr>
                            <th>ENDEREÇO</th>
                            <th>IP WAN</th>
                            <th>IP WAN BKP</th>
                            <th>IP SWITCH</th>
                            <th>MUNICIPIO</th>
                            <th>ESTADO</th>
                        </tr>
                        <tr>
                            <td>" . $row["endereco"] . "</td>
                            <td>" . $row["ip_wan"] . "</td>
                            <td>" . $row["ip_wan_b"] . "</td>
                            <td>" . $row["ip_sw"] . "</td>
                            <td>" . $row["municipio"] . "</td>
                            <td>" . $row["UF"] . "</td>
                        </tr>";
                
                    echo "</table>";
                    echo "</td>
                    </tr>";
                }} else {
        echo "No results found";
    }
    
}

$conn->close();
?>