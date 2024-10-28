<?php
$agent = "00".rand(0, 7);
$pwd = "iLoveEngland";

if (empty($agent) || empty($pwd)) {
    echo "Error: AgentID en/of wachtwoord mogen niet leeg zijn.";
} else if (substr($agent, 0, 2) !== "00") {
    echo "Error: Alle agenten hebben een ID beginnend met 00!";
} else if ($pwd !== "iLoveEngland") {
    echo "Error: Het wachtwoord is niet correct!";
} else {
    echo "Welkom, Agent {$agent}!";
}