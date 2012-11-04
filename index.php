<?php

define('GRID_SIZE', 10);

?>
<!DOCTYPE html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Superbowl Squares</title>

  <link rel="shortcut icon" href="/favicon.png" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/libraries/jquery-ui-1.9.1/css/ui-lightness/jquery-ui-1.9.1.custom.css" />
  <link rel="stylesheet" href="/styles/global.css" type="text/css" />
 
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>
  <div id="main-wrapper">

    <header>
      <h1>Superbowl Squares</h1>
      <form id="teams" action="javascript:;">
        <input class="team-home" type="text" name="team-home-name" placeholder="Home team" />
        VS
        <input class="team-away" type="text" name="team-away-name" placeholder="Away team" />
      </form>
    </header>

    <div id="page-wrapper"><section>
        <?php
          $tr = array();
          for ($i = 1; $i <= GRID_SIZE; $i++) {
            $td = array();
            for ($ii = 1; $ii <= GRID_SIZE; $ii++) {
              $td[] = "<td class='grid-$i-$ii'></td>";
            }
            $tr[] = "<tr class='row-$i'>\n\t<th class='team-away'></th>\n\t" . implode("\n\t", $td) . '</tr>';
          }
        ?>
      <table id="content">
        <tbody>
          <tr>
            <td id="score-table-wrapper">
              <section>
                <table id="score-table">
                  <thead>
                    <tr>
                      <?php echo str_repeat('<th class="team-home"></th>', (GRID_SIZE + 1)); ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo implode("\n", $tr); ?>
                  </tbody>
                </table>
              </section>
            </td><!-- /#score-table-wrapper -->
            <td class="spacer"></td>
            <td id="players-wrapper">
              <section>
                <form id="add-player" action="javascript:;">
                  <input type="text" id="player-name" name="player-name" placeholder="Add player" />
                  <button>+</button>
                </form>
                <h1>Players</h1>
                <ol id="player-list">
                  
                </ol>
              </section>
            </td><!-- /#players -->
          </tr>
        </tbody>
      </table><!-- /#content -->
    </section></div><!-- /#page-wrapper -->

    <footer>
      <div id="quarters">
        <aside id="q1">
          <h2>Score: Q1</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q1-score">
              <input maxlength="2" class="team-home" type="text" id="team-home-0" name="team-home-0" /> &mdash; 
              <input maxlength="2" class="team-away" type="text" id="team-away-0" name="team-away-0" />
            </form>
          </div>
        </aside>
        <aside id="q2">
          <h2>Score: Q2</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q2-score">
              <input maxlength="2" class="team-home" type="text" id="team-home-1" name="team-home-1" /> &mdash; 
              <input maxlength="2" class="team-away" type="text" id="team-away-1" name="team-away-1" />
            </form>
          </div>
        </aside>
        <aside id="q3">
          <h2>Score: Q3</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q3-score">
              <input maxlength="2" class="team-home" type="text" id="team-home-2" name="team-home-2" /> &mdash; 
              <input maxlength="2" class="team-away" type="text" id="team-away-2" name="team-away-2" />
            </form>
          </div>
        </aside>
        <aside id="q4">
          <h2>Score: Q4</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q4-score">
              <input maxlength="2" class="team-home" type="text" id="team-home-3" name="team-home-3" /> &mdash; 
              <input maxlength="2" class="team-away" type="text" id="team-away-3" name="team-away-3" />
            </form>
          </div>
        </aside>
      </div><!-- /#quarters -->
    </footer>

  </div><!-- /#main-wrapper -->

  <script type="text/javascript" src="/libraries/jquery-ui-1.9.1/js/jquery-1.8.2.js"></script>
  <script type="text/javascript" src="/libraries/jquery-ui-1.9.1/js/jquery-ui-1.9.1.custom.min.js"></script>
  <script type="text/javascript" src="/libraries/json2/json2.js"></script>
  <script type="text/javascript" src="/scripts/global.js"></script>
</body>
</html>
