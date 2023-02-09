<?php

$mdp = "aazerty";

$mdpn = "$2y$10$6cX.d7VYKon/FiN0lTr.EeddVluvI5JojFmda0FEU1LBM9PpMbFCG";

$mdp = password_verify($mdp,$mdpn);

echo !!$mdp;