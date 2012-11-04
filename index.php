<?php

define(GRID_SIZE, 10);

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
      <h1>Superbow Squares</h1>
      <form id="teams" action="javascript:;">
        <input type="text" name="team-1-name" placeholder="Team name 1" />
        <input type="text" name="team-2-name" placeholder="Team name 2" />
      </form>
    </header>

    <div id="page-wrapper"><section>
        <?php
          $tr = array();
          for ($i = 1; $i <= GRID_SIZE; $i++) {
            $td = array();
            for ($ii = 1; $ii <= GRID_SIZE; $ii++) {
              $td[] = '<td class="col-' . $ii . '"></td>';
            }
            $tr[] = "<tr class='row-$i'>\n\t<th></th>\n\t" . implode("\n\t", $td) . '</tr>';
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
                      <?php echo str_repeat('<th></th>', (GRID_SIZE + 1)); ?>
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
                <ol>
                  <li>Tony Legrone</li>
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
          <h2>Quarter 1</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q1-score">
              <label for="team-1-0">Team 1</label>
              <input type="text" id="team-1-0`" name="team-1-0" />
              <label for="team-2-0">Team 2</label>
              <input type="text" id="team-2-0" name="team-2-0" />
            </form>
          </div>
        </aside>
        <aside id="q2">
          <h2>Quarter 2</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q2-score">
              <label for="team-1-1">Team 1</label>
              <input type="text" id="team-1-1" name="team-1-1" />
              <label for="team-2-1">Team 2</label>
              <input type="text" id="team-2-1" name="team-2-1" />
            </form>
          </div>
        </aside>
        <aside id="q3">
          <h2>Quarter 3</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q3-score">
              <label for="team-1-2">Team 1</label>
              <input type="text" id="team-1-2" name="team-1-2" />
              <label for="team-2-2">Team 2</label>
              <input type="text" id="team-2-2" name="team-2-2" />
            </form>
          </div>
        </aside>
        <aside id="q4">
          <h2>Quarter 4</h2>
          <div class="status"></div>
          <div class="score">
            <form action="javascript:;" id="q4-score">
              <label for="team-1-3">Team 1</label>
              <input type="text" id="team-1-3" name="team-1-3" />
              <label for="team-2-3">Team 2</label>
              <input type="text" id="team-2-3" name="team-2-3" />
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
