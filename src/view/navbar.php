<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/navbar.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
  <title>Navbar</title>
</head>
<body>
<nav>
  <div class="products">
    <ul class="menu-items">
      <!-- Main Product Categories -->
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home">
          <i class="material-icons-outlined">category</i>
          <span>All Products</span>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=set">
          <i class="material-icons-outlined">build</i>
          <span>DIY Kit</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&type=set">Built in Set</a></li>
            <li><a href="/KeyQuest/index.php?action=home&type=set">Custom Set</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=keyboard">
          <i class="material-icons-outlined">keyboard</i>
          <span>Keyboards</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=keyboards&type=full">Full (100%)</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keyboards&type=tkl">TKL (80%)</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keyboards&type=75">75%</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keyboards&type=65">65%</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keyboards&type=60">60%</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keyboards&type=other">Others</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=keycaps">
          <i class="material-icons-outlined">extension</i>
          <span>Keycaps</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=keycaps&type=groupby">Group By</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keycaps&type=classic">Keycaps Set</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=keycaps&type=artisanal">Artisanal keycaps</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=switches">
          <i class="material-icons-outlined">settings_remote</i>
          <span>Switches</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=switches&type=linear">Linear switches</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=switches&type=tactile">Tactiles switches</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=switches&type=clicky">Clicky switches</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=switches&type=optical">Optical switches</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=switches&type=other">Other switches</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=case">
          <i class="material-icons-outlined">dns</i>
          <span>Cases</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=cases&type=alluminium">Aluminium cases</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=cases&type=plastic">Plastic cases</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=cases&type=wooden">Wooden cases</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=pcb">
          <i class="material-icons-outlined">memory</i>
          <span>PCBs</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=pcbs&type=north">North Facing PCBs</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=pcbs&type=south">South Facing PCBs</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=pcbs&type=other">Others</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=tool">
          <i class="material-icons-outlined">carpenter</i>
          <span>Tools</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=tools&type=switch_puller">Switch puller</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=tools&type=keycaps_puller">Keycaps puller</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=tools&type=brush">Brushes</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=tools&type=lube">Lube</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=tools&type=switch_opener">Switch opener</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=tools&type=lube_station">Lube station</a></li>
          </ul>
        </a>
      </li>
      <li class="submenu">
        <a href="/KeyQuest/index.php?action=home&type=accessory">
          <i class="material-icons-outlined">devices_other</i>
          <span>Accessories</span>
          <ul class="submenu-items">
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=mouse_pad">Mouse pads</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=wrist_rest">Wrist rest</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=stabilizers">Stabilizers</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=foam">Foam</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=house">House</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=knobs">Knobs</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=buffers">Buffers</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=o_rings">O-rings</a></li>
            <li><a href="/KeyQuest/index.php?action=home&rel=accessories&type=stickers">Stickers</a></li>
          </ul>
        </a>
      </li>
    </ul>
  </div>
  <div class="others">
    <ul class="menu-items">
      <!-- Other Menu Items -->
      <li>
        <i class="material-icons">assessment</i>
        <a href="/KeyQuest/index.php?action=report">
          <span>Report</span>
        </a>
      </li>
      <li>
        <i class="material-icons">info</i>
        <a href="/KeyQuest/index.php?">
          <span>About</span>
        </a>
      </li>
      <li>
        <i class="material-icons">mail</i>
        <a href="/KeyQuest/index.php">
          <span>Contact</span>
        </a>
      </li>
      <li>
        <i class="material-icons">help</i>
        <a href="/KeyQuest/index.php">
          <span>FAQ</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>
